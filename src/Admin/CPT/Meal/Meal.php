<?php
namespace Hasinur\MealMap\Admin\CPT\Meal;

use Hasinur\MealMap\Core\Abstracts\CustomPostType;

class Meal extends CustomPostType {

    /**
     * Meal CPT Constructor
     *
     * @return  void
     */
    public function __construct( PriceMetaBox $price_meta_box ) {
        parent::__construct();

        $price_meta_box->register_hooks();
    }

    /**
     * Register all hooks for the class
     *
     * @return  void
     */
    public function register_hooks(): void {
        
    }

    /**
     * Sets the post type slugs
     *
     * @return  void
     */
    public function set_post_type(): void {
        $this->post_type = 'meal-map';
    }

    /**
     * 
     *
     * @return  void
     */
    public function set_args(): void {
        // The $labels describes how the post type apears.
        $labels = [
            'name'                  => __( 'Meals', 'meal-map' ),
            'singular_name'         => __( 'Meal', 'meal-map' ),
            'add_item'              => __( 'Add Meal', 'meal-map' ),
            'new_item'              => __( 'New Meal', 'meal-map' ),
            'add_new_item'          => __( 'Add Meal', 'meal-map' ),
            'edit_item'             => __( 'Edit Meal', 'meal-map' ),
            'featured_image'        => __( 'Meal Image', 'meal-map' ),
            'set_featured_image'    => __( 'Upload Meal Image', 'meal-map' ),
            'remove_featured_image' => __( 'Remove Meal Image', 'meal-map' ),
            'not_found'             => __( 'No Meals Found', 'meal-map' ),
            'not_found_in_trash'    => __( 'No Meals Found In Trash', 'meal-map' ),
            'search_items'          => __( 'Search Meals', 'meal-map' ),
            'view_items'            => __( 'View Meal', 'meal-map' ),
            'view_item'             => __( 'View Meal', 'meal-map' ),
            'item_updated'          => __( 'Meal Updated', 'meal-map' ),
            'item_published'        => __( 'Meal Published', 'meal-map' ),
            'item_scheduled'        => __( 'Meal Shceduled', 'meal-map' ),
        ];

        // The $supports parameter describes what the post type supports.
        $supports = [
            'title',
            'editor',
            'thumbnail',
        ];

        // The $args paramer holds important parameters for the custom post type
        $this->args = [
            'labels'            => $labels,
            'supports'          => $supports,
            'description'       => 'meal-map',
            'taxonomies'        => ['category'],
            'hierarchical'      => false,
            'public'            => true,
            'show_ui'           => true,
            'show_in_menu'      => false,
            'show_in_nav_menus' => false,
            'show_in_admin_bar' => false,
            'menu_position'     => 5,
            'menu_icon'         => false,
            'can_export'        => true,
        ];
    }
}
