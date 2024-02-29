<?php
namespace Hasinur\MealMap;

use Hasinur\MealMap\Core\Container\Container;

/**
 * Main plugin class.
 *
 * @package Hasinur\MealMap
 */
class MealMap {
    /**
     * Plugin version.
     *
     * @var string
     */
    public static $version;

    /**
     * Plugin file.
     *
     * @var string
     */
    public static $plugin_file;

    /**
     * Plugin directory.
     *
     * @var string
     */
    public static $plugin_directory;

    /**
     * Build url.
     *
     * @var string
     */
    public static $build_url;

    /**
     * Plugin basename.
     *
     * @var string
     */
    public static $basename;

    /**
     * Plugin text directory path.
     *
     * @var string
     */
    public static $text_domain_directory;

    /**
     * Plugin template directory path.
     *
     * @var string
     */
    public static $template_directory;

    /**
     * Plugin assets directory path.
     *
     * @var string
     */
    public static $assets_url;

    /**
     * Plugin url
     *
     * @var string
     */
    public static $plugin_url;

    /**
     * Container that holds all the services.
     *
     * @var Container
     */
    public static $container;

    /**
     * MealMap Constructor
     *
     * @return  void
     */
    public function __construct() {
        $this->init();
        $this->register_lifecycle();
        $this->register_container();

        Bootstrap::run();
    }

    /**
     * Initialize the plugin.
     *
     * @return  void
     */
    protected function init(): void {
        self::$version               = '1.0.0';
        self::$plugin_file           = MEAL_MAP_PLUGIN_STARTER_PLUGIN_FILE;
        self::$plugin_directory      = MEAL_MAP_PLUGIN_STARTER_DIR;
        self::$basename              = plugin_basename( self::$plugin_file );
        self::$text_domain_directory = self::$plugin_directory . '/languages';
        self::$template_directory    = self::$plugin_directory . '/templates';
        self::$plugin_url            = plugins_url( '', self::$plugin_file );
        self::$assets_url            = self::$plugin_url . '/assets';
        self::$build_url             = self::$plugin_url . '/build';

    }

    /**
     * Registers life cycle hooks
     *
     * @return  void
     */
    protected function register_lifecycle(): void {
        register_activation_hook( self::$plugin_file, [Active::class, 'handle'] );
        register_deactivation_hook( self::$plugin_file, [Deactivate::class, 'handle'] );
    }

    /**
     * Initialize the container
     *
     * @return  void
     */
    protected function register_container(): void {
        self::$container = new Container();
    }

    /**
     * Initialize the MealMap class
     *
     * Checks for an existing MealMap instance
     * and if it doesn't find one, creates it.
     *
     * @return  MealMap
     */
    public static function instance(): MealMap {
        static $instance = false;

        if ( ! $instance ) {
            $instance = new self();
        }

        return $instance;
    }
}