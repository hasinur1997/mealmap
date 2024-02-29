<?php 

namespace Hasinur\MealMap;

/**
 * Activation class.
 * 
 * @package Hasinur\MealMap
 */
class Activate {
    /**
     * Activation hook.
     *
     * @return  void
     */
    public static function handle(): void {
        Installer::run();
    }
}
