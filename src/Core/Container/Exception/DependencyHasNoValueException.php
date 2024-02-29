<?php
/**
 * Dependency Exception
 * 
 * @package MealMap
 */
namespace Hasinur\MealMap\Core\Container\Exception;

use Exception;
use Hasinur\MealMap\Core\Container\NotFoundExceptionInterface;

/**
 * Default Value Exception
 */
class DependencyHasNoValueException extends Exception implements NotFoundExceptionInterface {

}
