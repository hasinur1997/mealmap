<?php
namespace Hasinur\MealMap\Models;

/**
 * OverviewModel
 */
class OrderOverviewModel {
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
     * Store order count
     *
     * @var int
     */
    protected $order_count;

    /**
     * Get meail id
     *
     * @return  int
     */
    public function get_meal_id(): int {
        return $this->meal_id;
    }

    /**
     * Get meal name
     *
     * @return  string
     */
    public function get_meal_name(): string {
        return $this->meal_name;
    }

    /**
     * Get order count
     *
     * @return  int
     */
    public function get_order_count(): int {
        return $this->order_count;
    }

    /**
     * Set meal id
     *
     * @param   int
     *
     * @return  OrderOverviewModel
     */
    public function set_meal_id(int $meal_id): OrderOverviewModel {
        $this->meal_id = $meal_id;

        return $this;
    }

    /**
     * Set meal name
     *
     * @param   string
     *
     * @return  OrderOverviewModel
     */
    public function  set_meal_name(string $meal_name): OrderOverviewModel {
        $this->meal_name = $meal_name;

        return $this;
    }

    /**
     * Set order count
     *
     * @param   int
     *
     * @return  OrderOverviewModel
     */
    public function set_order_count(int $order_count): OrderOverviewModel {
        $this->order_count = $order_count;

        return $this;
    }
}
