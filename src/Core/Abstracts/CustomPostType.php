<?php
namespace Hasinur\MealMap\Abstracts;

use Hasinur\MealMap\Interfaces\CustomPostTypeInterface;
use Hasinur\MealMap\Interfaces\HookableInterface;

/**
 * Class CPT
 * 
 * @package Hasinur\MealMap\Abstracts
 */
abstract class CustomPostType implements CustomPostTypeInterface, HookableInterface {
    /**
     * Store post type
     *
     * @var string
     */
    protected $post_type;

    /**
     * Post types args
     *
     * @var array
     */
    protected $args = [];

    /**
     * Custom post constructor
     *
     * @return  void
     */
    public function __construct() {
        $this->set_post_type();
        $this->set_args();
        $this->register_post_type();
    }

    /**
     * Register the post type
     *
     * @return  void
     */
    public function register_post_type(): void {
        if ( ! $this->post_type || empty( $this->args ) ) {
            return;
        }

        register_post_type( $this->post_type, $this->args );
    }

    /**
     * Set the post type slug
     *
     * @return  void
     */
    abstract protected function set_post_type(): void;

    /**
     * Set the post type arguments
     *
     * @return  void
     */
    abstract protected function set_args(): void;
}