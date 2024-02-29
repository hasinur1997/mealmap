<?php
/**
 * Plugin Name: MealMap
 * Description: A meal tracker solution
 * URI: https://hasinur.co
 * Author: Hasinur Rahman
 * Author URI: https://hasinur.co
 * Version: 1.0.0
 * License: GPL2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: meal-map
 */

namespace Hasinur\MealMap;

defined( 'ABSPATH' ) || exit;

if ( ! class_exists( MealMap::class ) && is_readable( __DIR__ . '/vendor/autoload.php') ) {
    require_once __DIR__ . '/vendor/autoload.php';
}

if ( ! defined( 'MEAL_MAP_PLUGIN_STARTER_PLUGIN_FILE' ) ) {
    define( 'MEAL_MAP_PLUGIN_STARTER_PLUGIN_FILE', __FILE__ );
}

if ( ! defined( 'MEAL_MAP_PLUGIN_STARTER_DIR' ) ) {
    define( 'MEAL_MAP_PLUGIN_STARTER_DIR', __FILE__ );
}

class_exists( MealMap::class ) && MealMap::instance();