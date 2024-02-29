<?php
namespace Hasinur\MealMap\Core\Container\Exception;

use Exception;
use Hasinur\MealMap\Core\Container\ContainerExceptionInterface;

/**
 * Dependency intanstantiable exception
 * 
 * @package Hasinur\MealMap\Container
 */
class DependencyIsNotInstantiableException extends Exception implements ContainerExceptionInterface {

}
