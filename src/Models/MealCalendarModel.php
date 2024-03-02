<?php
namespace Hasinur\MealMap\Models;

/**
 * Meal Calendar Class
 * 
 * @package Hasinur\MealMap\Models
 */
class MealCalendar {
    /**
     * Store date
     *
     * @var string
     */
    protected $date;

    /**
     * Store meal id
     *
     * @var int
     */
    protected $meal_id;

    /**
     * Store meal name
     *
     * @var string
     */
    protected $meal_name;

    /**
     * Get emal id
     *
     * @return  int
     */
    public function get_meal_id(): int {
        return $this->meal_id;
    }

    /**
     * Get date
     *
     * @return  string
     */
    public function get_date(): string {
        return $this->date;
    }
    
    /**
     * Get meal name
     *
     * @return  string
     */
    public function get_meal_name(): string {
        return $this->meal_name;
    }

    // setters.

    /**
     * Set meal id
     *
     * @param   int $meal_id
     *
     * @return  MealCalendar
     */
    public function set_meal_id( int $meal_id ): MealCalendar {
        $this->meal_id = $meal_id;

        return $this;
    }

    /**
     * Set meal date
     *
     * @param   string $date
     *
     * @return  MealCalendar
     */
    public function set_meal_date( string $date ): MealCalendar {
        $this->date = $date;

        return $this;
    }

    /**
     * Set meal name
     *
     * @param   string $meal_name
     *
     * @return  MealCalendar
     */
    public function set_meal_name( string $meal_name ): MealCalendar {
        $this->meal_name = $meal_name;

        return $this;
    }
}
