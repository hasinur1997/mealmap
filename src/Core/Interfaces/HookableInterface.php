<?php
namespace Hasinur\MealMap\Interfaces;

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