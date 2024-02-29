<?php
namespace Hasinur\MealMap\Core\Container;

use Exception;
use Hasinur\MealMap\Core\Container\Exception\DependencyHasNoValueException;
use Hasinur\MealMap\Core\Container\Exception\DependencyIsNotInstantiableException;
use ReflectionClass;

class Container {
    protected $instances = [];

    public function get( string $id ): object {
        if ( ! $this->hash($id) ) {
            $this->set($id);
        }

        $instance = $this->instances[$id];

        return $this->resolve($id);
    }

    /**
     * Sets an entry of the container by its identifier
     *
     * @param   string  $id
     * @param   object|null  $instance
     *
     * @return  void
     */
    public function set( string $id, object $instance = null ): void {
        if ( null === $instance ) {
            $instance = $id;
        }

        $this->instances[$id] = $instance;
    }

    /**
     * Return true if the container can return an entry for the given identifier
     * Return false otherwise
     *
     * @param   string  $id  Identifier of the entry to look for.
     *
     * @return  bool
     */
    public function hash( $id ) {
        return isset( $this->instances[$id] );
    }

    /**
     * Resolve the service object by its name.
     *
     * @param   string  $class_name
     *
     * @return  object
     */
    public function resolve( string $class_name ): object {
        if ( ! class_exists( $class_name ) ) {
            throw new Exception( "Class: {$class_name} does not exist" );
        }

        $reflection_class = new ReflectionClass( $class_name );

        if ( ! $reflection_class->isInstantiable() ) {
            throw new DependencyIsNotInstantiableException( "Class: {$class_name} is not instantiable" );
        }

        if ( null == $reflection_class->getConstructor() ) {
            return $reflection_class->newInstance();
        }

        $parameters = $reflection_class->getConstructor()->getParameters();

        $dependencies = $this->build_dependencies( $parameters );

        return $reflection_class->newInstanceArgs( $dependencies );
    }

    /**
     * Build the dependencies for the given parameters
     *
     * @param   array  $parameters
     *
     * @return  array
     */
    public function build_dependencies( array $parameters ): array {
        $dependencies = [];

        foreach ( $parameters as $parameter ) {
            $dependency = $parameter->getType() ? $parameter->getType()->getName() : null;

            if ( is_null( $dependency ) ) {
                if ( $parameter->isDefaultValueAvailable() ) {
                    $dependencies[] = $parameter->getDefaultValue();
                } else {
                    throw new DependencyHasNoValueException( "Class {$parameter->name}dependency can not be resolved" );
                }
            } else {
                $dependencies[] = $this->get( $dependency );
            }

        }

        return $dependencies;
    }
}
