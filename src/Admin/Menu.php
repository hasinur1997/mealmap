<?php
namespace Hasinur\MealMap\Admin;

use Hasinur\MealMap\Interfaces\HookableInterface;

/**
 * Admin menu class.
 * 
 * @since 1.0.0
 */
class Menu implements HookableInterface {
    /**
     * Menu page title.
     *
     * @var string
     */
    protected $page_title;

    /**
     * Menu title
     *
     * @var string
     */
    protected $menu_title;

    /**
     * Menu page base capability.
     *
     * @var string
     */
    protected $base_capability;

    /**
     * Menu page cabality.
     *
     * @var string
     */
    protected $capability;

    /**
     * Menu page slug.
     *
     * @var string
     */
    protected $menu_slug;

    /**
     * Menu page icon url.
     *
     * @var string
     */
    protected $icon;

    /**
     * Menu page position
     *
     * @var int
     */
    protected $position;

    /**
     * Submenu pages.
     *
     * @var array
     */
    protected $sub_menus;

    /**
     * Menu class constructor
     *
     * @return  void
     */
    public function __construct( $capability ) {
        
    }

    /**
     * Register all the hooks for the class
     *
     * @return  void
     */
    public function register_hooks(): void {
        
    }


}