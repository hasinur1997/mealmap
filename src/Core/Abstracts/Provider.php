<?php
namespace Hasinur\MealMap\Core\Abstracts;

use Hasinur\MealMap\Core\Interfaces\HookableInterface;
use Hasinur\MealMap\Core\Interfaces\ProviderInterface;
use Hasinur\MealMap\MealMap;

/**
 * Handle instiation of services
 *
 * @package Hasinur\MealMap
 */
abstract class Provider implements ProviderInterface {
    /**
     * Holds classes that should be instantiated
     *
     * @var array
     */
    protected $services = [];

    /**
     * Service provider
     *
     * @param  array  $services
     *
     * @return  void
     */
    public function __construct( $services = [] ) {
        if ( ! empty( $services ) ) {
            $this->services = $services;
        }

        $this->register();
    }

    /**
     * Register services
     *
     * @return  void
     */
    public function register(): void {
        foreach ( $this->services as $service ) {
            if ( ! class_exists( $service ) || ! $this->can_be_registered() ) {
                continue;
            }

            $service = MealMap::$container->get( $service );

            if ( $service instanceof HookableInterface ) {
                $service->register_hooks();
            }
        }
    }

    /**
     * Checks a provider service should be registered.
     *
     * @return  bool
     */
    abstract protected function can_be_registered(): bool;
}