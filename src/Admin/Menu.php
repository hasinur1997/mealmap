<?php
namespace Hasinur\MealMap\Admin;

use Hasinur\MealMap\Admin\CPT\Meal\Capability;
use Hasinur\MealMap\Core\Interfaces\HookableInterface;

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
    protected $submenus;

    /**
     * Menu class constructor
     *
     * @return  void
     */
    public function __construct( Capability $capability ) {
        $capability->register_hooks();
        $this->page_title = __( 'Meal Map', 'meal-map' );
        $this->menu_title = __( 'Meal Map', 'meal-map' );
        $this->base_capability = 'read';
        $this->menu_slug = 'meal-map';
        $this->icon = 'dashicons-food';
        $this->position = 57;
        $this->submenus = [
            [
                'title' => __( 'Dashboard', 'meal-map' ),
                'capability' => $this->base_capability,
                'url'   => "admin.php?page={$this->menu_slug}/#dashboard",
            ],
            [
                'title' => __( 'Orders', 'meal-map' ),
                'capability' => $this->base_capability,
                'url'   => "admin.php?page={$this->menu_slug}/#orders",
            ],
            [
                'title' => __( 'Reports', 'meal-map' ),
                'capability' => $this->base_capability,
                'url'   => "admin.php?page={$this->menu_slug}/#reports",
            ],
            [
                'title' => __( 'All Meals', 'meal-map' ),
                'capability' => $this->base_capability,
                'url'   => "edit.php?post_type=meal-map",
            ],
            [
                'title' => __( 'Add Meal', 'meal-map' ),
                'capability' => $this->base_capability,
                'url'   => "post-new.php?post_type=meal-map",
            ],
        ];
    }

    /**
     * Register all the hooks for the class
     *
     * @return  void
     */
    public function register_hooks(): void {
        add_action( 'admin_menu', [ $this, 'register_menu' ] );
        add_action( 'admin_enqueue_scripts', [ $this, 'register_scripts' ] );
        add_action( 'admin_head', [ $this, 'cleanup_admin_notices' ] );
    }

    /**
     * Register admin menu
     *
     * @since   1.0.0
     *
     * @return  void
     */
    public function register_menu() {
        global $submenu;

        add_menu_page(
            $this->page_title,
            $this->menu_title,
            $this->base_capability,
            $this->menu_slug,
            [$this, 'render_menu_page'],
            $this->icon,
            $this->position,
        );

        foreach ( $this->submenus as $item ) {
            $submenu[$this->menu_slug][] = [$item['title'], $item['capability'], $item['url']];
        }
    }

    /**
     * Renders the admin page
     * 
     * @since 1.0.0
     *
     * @return  void
     */
    public function render_menu_page() {
        echo '<div id="meal-map">Meal Map Page</div>';
    }

    /**
     * Register admin scripts
     *
     * @return  void
     */
    public function register_scripts(): void {

    } 

    /**
     * Cleans admin notice for meal-map page.
     * 
     * @since 1.0.0
     *
     * @return  void
     */
    public function cleanup_admin_notices() {
        if ( 'toplevel_page_meal-map' === get_current_screen()->id ) {
            remove_all_actions( 'admin_notices' );
        }
    }
}
