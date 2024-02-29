<?php
namespace Hasinur\MealMap;

use Hasinur\MealMap\Admin\AdminProvider;
use Hasinur\MealMap\Core\Interfaces\ProviderInterface;

/**
 * Class Bootstrap
 *
 * Handles the plugins bootstrap process.
 *
 * @package Hasinur\MealMap
 */
class Bootstrap {
    /**
     * Hold plugin's providers classes.
     *
     * @var string[]
     */
    protected static $providers = [
        AdminProvider::class,
    ];

    /**
     * Runs plugin bootstrap
     *
     * @return  void
     */
    public static function run(): void {
        add_action( 'init', [CPT::class, 'register'] );
        add_action( 'rest_api_init', [Api::class, 'register'] );
        add_action( 'plugins_loaded', [self::class, 'init'] );
    }

    /**
     * Bootstrap the plugin. Load  all the necessary providers.
     *
     * @return  void
     */
    public static function init(): void {
        self::register_providers();
    }

    /**
     * Registers providers
     *
     * @return  void
     */
    protected static function register_providers(): void {
        foreach ( self::$providers as $provider ) {
            if ( class_exists( $provider ) && is_subclass_of( $provider, ProviderInterface::class ) ) {
                new $provider();
            }
        }
    }
}