<?php
namespace Hasinur\MealMap\Models;

use stdClass;

/**
 * Meal Model
 * 
 * @package Hasinur\MealMap\Models
 */
class MealModel {
    /**
     * Store MealModel
     *
     * @var WP_Post
     */
    protected $meal;

    /**
     * Store meal id
     *
     * @var int
     */
    protected $id;

    /**
     * Store meal name
     *
     * @var string
     */
    protected $name;

    /**
     * Store meal description
     *
     * @var string
     */
    protected $description;

    /**
     * Store meal price
     *
     * @var float
     */
    protected $price;

    /**
     * Store meal formatted price
     *
     * @var string
     */
    protected $formatted_price;

    /**
     * Store image url
     *
     * @var string
     */
    protected $image;

    /**
     * MealModel Constructor
     *
     * @param   MealModel  $meal
     *
     * @return  void
     */
    public function __construct( $meal = null ) {
        $this->meal = $meal;
    }

    // getters

    /**
     * Get meal id
     *
     * @return  int
     */
    public function get_id(): int {
        return $this->id ?? $this->meal->ID;
    }

    /**
     * Get meal name
     *
     * @return  string
     */
    public function get_name(): string {
        $this->name = $this->meal->post_title ?? get_the_title( $this->id );

        return $this->name;
    }

    /**
     * Get meal description
     *
     * @return  string
     */
    public function get_description(): string {
        $this->description = wp_strip_all_tags( $this->meal->post_content );

        return $this->description;
    }

    /**
     * Get meal price
     *
     * @return  float
     */
    public function get_price(): float {
        $this->price = floatval( get_post_meta( $this->meal->ID, 'price', true ) );

        return $this->price;
    }

    /**
     * Get formatted price
     *
     * @return  string
     */
    public function get_formatted_price(): string {
        $this->formatted_price = $this->get_price();

        return $this->formatted_price;
    }

    /**
     * Get image url
     *
     * @param   string     $size
     * @param   thumbnail
     *
     * @return  string
     */
    public function get_image( $size = 'thumbnail' ): string {
        $this->image = get_the_post_thumbnail( $this->meal->ID, $size );

        return $this->image;
    }

    // setters.

    /**
     *
     * @param   int        $id
     *
     * @return  MealModel
     */
    public function set_id( int $id ): MealModel {
        $this->id = $id;

        return $this;
    }

    /**
     * @param   string
     *
     * @return  MealModel
     */
    public function set_name( string $name ): MealModel {
        $this->name = $name;

        return $this;
    }

    /**
     * @param   string
     *
     * @return  MealModel
     */
    public function set_description( string $description ): MealModel {
        $this->description = $description;

        return $this;
    }

    /**
     * @param   float      $price
     *
     * @return  MealModel
     */
    public function set_price( float $price ): MealModel {
        $this->price = $price;

        return $this;
    }

    /**
     * @param   string     $formatted_price
     *
     * @return  MealModel
     */
    public function set_formatted_price( string $formatted_price ): MealModel {
        $this->formatted_price = $formatted_price;

        return $this;
    }

    /**
     * @param   string     $image
     *
     * @return  MealModel
     */
    public function set_image( string $image ): MealModel {
        $this->image = $image;

        return $this;
    }

    /**
     * Gets the meal object based on the argumensts
     *
     * @param   array   $ids
     * @param   string  $search
     *
     * @return  array
     */
    public function get( array $ids = [], string $search = '' ): array {
        $defaults = [
            'post_type'   => 'meal-map',
            'post_status' => 'publish',
            'orderby'     => 'title',
            'order'       => 'ASC',
            's'           => '',
            'numberposts' => 5,
        ];

        $args = [
            'post__in' => array_map( 'intval', $ids ),
            's'        => sanitize_text_field( $search ),
        ];
        
        $posts = get_posts( wp_parse_args( $args, $defaults ) );

        foreach ( $posts as $post ) {
            $meal = new MealModel( $post );

            $result = [];

            $object = new stdClass;

            $object->id              = $meal->get_id();
            $object->name            = $meal->get_name();
            $object->description     = $meal->get_description();
            $object->price           = $meal->get_price();
            $object->formatted_price = $meal->get_formatted_price();
            $object->image           = $meal->get_image();

            $result[] = $object;
        }

        return $result;
    }
}
