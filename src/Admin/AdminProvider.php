<?php
namespace Hasinur\MealMap\Admin;

use Hasinur\MealMap\Abstracts\Provider;

/**
 * Class AdminProvider.
 * 
 * Provides the admin functionality of the plugin.
 * 
 * @package Hasinur\MealMap\Admin
 */
class AdminProvider extends Provider {
    /**
     * Register all the necessary services for the admin.
     *
     * @var array
     */
    protected  $services = [];
    
    /**
     * Checks if a service should be registered.
     *
     * @return  bool
     */
    protected function can_be_registered(): bool {
        return is_admin();
    }
}