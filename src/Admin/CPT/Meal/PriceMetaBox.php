<?php
namespace Hasinur\MealMap\Admin\CPT\Meal;

use Hasinur\MealMap\Core\Abstracts\Metabox;
use WP_Post;

class PriceMetaBox extends Metabox {

    /**
     * Store price meta key
     *
     * @var string
     */
    public static $price_meta_key = '_meal_map_price';

    /**
     * Register all hooks for the class
     *
     * @return  void
     */
    public function register_hooks(): void {
        add_action( 'add_meta_boxes', [ $this, 'add_metabox' ] );
        add_action( 'save_post_meal-map', [ $this, 'save_metabox' ] );
    }

    /**
     * Adds the metabox container
     *
     * @return  void
     */
    public function add_metabox( $post_type ): void {
        $post_typess = [
            'meal-map',
        ];

        if ( ! in_array( $post_type, $post_typess ) ) {
            return;
        }

        add_meta_box(
            'meal-map-price-meta-box',
            __( 'Meal Price', 'meal-map' ),
            [$this, 'render_metabox_content'],
            $post_type,
            'side',
            'high'
        );
    }

    /**
     * Render price metabox content
     *
     * @param   WP_Post  $post
     *
     * @return  void
     */
    public function render_metabox_content( WP_Post $post ): void {
        wp_nonce_field('meal_map_price', 'meal_map_price_nonce');
        $price = get_post_meta( $post->ID, self::$price_meta_key, true );
        ?>
            <label for="meal_map_prce_field">
                <input type="text" placeholder="<?php echo esc_attr_e( 'Meal Price', 'meal-map' ); ?>" name="meal_map_price" class="form-control"  style="width: 100%;" value="<?php echo esc_attr( $price ); ?>">
            </label>
        <?php
    }

    /**
     * Save price meta data
     *
     * @param   int  $post_id 
     *
     * @return  void
     */
    public function save_metabox( $post_id ): void {

        if ( ! current_user_can( 'manage_options' ) ) {
            return;
        }

        $nonce = ! empty( $_POST['meal_map_price_nonce'] ) ? sanitize_key( $_POST['meal_map_price_nonce'] ) : '';

        if ( ! wp_verify_nonce( $nonce, 'meal_map_price' ) ) {
            return;
        }

        $price = ! empty( $_POST['meal_map_price'] ) ? sanitize_text_field( $_POST['meal_map_price'] ) : '';

        if ( ! empty( $price ) ) {
            update_post_meta( $post_id, self::$price_meta_key, $price );
        } else {
            delete_post_meta( $post_id, self::$price_meta_key );
        }
    }
}
