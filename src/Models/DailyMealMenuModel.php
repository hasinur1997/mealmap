<?php
namespace Hasinur\MealMap\Models;

use Hasinur\MealMap\Models\MealModel;

/**
 * DailyMealMenuModel
 *
 * @package Hasinur\MealMap
 */
class DailyMealMenuModel {
    /**
     * Store meal menu key
     *
     * @var string
     */
    protected static $daily_menu_key = 'daily_meal_menu';

    /**
     * Store daily menu meta key
     *
     * @var string
     */
    public static $daily_menu_meta_key = '_meal_map_daily_menu';

    /**
     * Store menus
     *
     * @var array
     */
    protected $menus = [];

    /**
     * Get menus
     *
     * @return  array
     */
    public function get_menus(): array {
        return $this->menus;
    }

    /**
     * Set meal menus
     *
     * @param   array  $menus
     *
     * @return  void
     */
    public function set_menus( array $menus ): void {
        $this->menus = $menus;
    }

    /**
     * Create daily menu
     *
     * @param   array  $meal_ids
     *
     * @return  void
     */
    public function create( array $meal_ids ): void {
        update_option(
            self::$daily_menu_meta_key, [
                self::$daily_menu_key = $meal_ids,
            ]
        );
    }

    /**
     * Get daily meals
     *
     * @return  array
     */
    public function get(): array {
        $menu = get_option( self::$daily_menu_meta_key, [] );

        if ( ! isset( $menu[self::$daily_menu_key] ) || empty( $menu[self::$daily_menu_key] ) ) {
            return [];
        }

        $posts = get_posts(
            [
                'post_type' => 'meal-map',
                'post__in'  => $menu[self::$daily_menu_key],
            ]
        );

        foreach ( $posts as $post ) {
            $meal = new MealModel( $post );

            $this->menus[] = [
                'id'              => $meal->get_id(),
                'name'            => $meal->get_name(),
                'description'     => $meal->get_description(),
                'price'           => $meal->get_price(),
                'formatted_price' => $meal->get_formatted_price(),
                'image'           => $meal->get_image(),
            ];
        }

        return $this->menus;
    }
}
