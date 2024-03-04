<?php

namespace Hasinur\MealMap;

use Hasinur\MealMap\Admin\CPT\Meal\Meal;
use Hasinur\MealMap\Core\Abstracts\CustomPostType;

class CPT {
    /**
     * Hold plugin's CPT classes.
     *
     * @var string[]
     */
    protected static $custom_post_types = [
        Meal::class,
    ];

    /**
     * Loop over the $custom_post_type array and
     *
     * Registers custom post types.
     *
     * @return  void
     */
    public static function register(): void {
        foreach ( self::$custom_post_types as $post_type ) {
            if ( class_exists( $post_type ) && is_subclass_of( $post_type, CustomPostType::class ) ) {
                $cpt = MealMap::$container->get( $post_type );

                $cpt->register_hooks();
            }
        }
    }
}
