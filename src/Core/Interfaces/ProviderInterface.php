<?php
namespace Hasinur\MealMap\Interfaces;

/**
 * Provider Interface
 * 
 * @package Hasinur\MealMap
 */
interface ProviderInterface {
    /**
     * Register the services provided by  the provider
     *
     * @return  void
     */
    public function register(): void;
}