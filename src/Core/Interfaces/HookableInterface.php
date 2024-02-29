<?php
namespace Hasinur\MealMap\Core\Interfaces;

/**
 * Interface HookableInterface
 * 
 * @package Hasinur\MealMap
 */
interface HookableInterface {
    /**
     * Registers all the hooks for the class
     *
     * @return  void
     */
    public function register_hooks(): void;
}