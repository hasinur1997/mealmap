<?php
namespace Hasinur\MealMap\Api;

use WP_REST_Controller;

/**
 * Api class
 * 
 * @package Hasinur\MealMap
 */
class Api {

    /**
     * Register all the necessary controllers for the APIs.
     *
     * @var array
     */
    protected static $controllers = [];

    /**
     * Register services
     *
     * @return  void
     */
    public static function register() {
        foreach ( self::$controllers as $controller ) {
            if ( class_exists( $controller ) ) {
                continue;
            }

            if ( is_subclass_of( $controller, WP_REST_Controller::class ) ) {
                $object = new $controller();
                $object->register_routes();
            }
        }
    }
}