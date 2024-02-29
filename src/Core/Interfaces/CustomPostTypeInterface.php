<?php
namespace Hasinur\MealMap\Core\Interfaces;

/**
 * Interface CustomPostTypeInterface
 * 
 * @package Hasinur\MealMap
 */
interface CustomPostTypeInterface {

    /**
     * Register the custom post type
     *
     * @return  void
     */
    public function register_post_type(): void;
}