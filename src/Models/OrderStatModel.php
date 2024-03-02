<?php
namespace Hasinur\MealMap\Models;

class OrderStatModel {
    /**
     * Store user id
     *
     * @var int
     */
    protected $user_id;

    /**
     * Store total orders
     *
     * @var int
     */
    protected $total_orders;

    /**
     * Store total price
     *
     * @var string
     */
    protected $total_price;

    /**
     * Get user id
     *
     * @return  int
     */
    public function get_user_id(): int {
        return $this->user_id;
    }

    /**
     * Get total orders
     *
     * @return  int
     */
    public function get_total_orders(): int {
        return $this->total_orders;
    }

    /**
     * Get total price
     *
     * @return  string
     */
    public function get_total_price(): string {
        return $this->total_price;
    }

    /**
     * Set user id
     *
     * @param   int  $user_id
     *
     * @return  OrderStatModel
     */
    public function set_user( int $user_id ): OrderStatModel {
        $this->user_id = $user_id;

        return $this;
    }

    public function set_total_orders( int $total_orders ): OrderStatModel {
        $this->total_orders = $total_orders;

        return $this;
    }

    /**
     * Set total price
     *
     * @param   string $total_price
     *
     * @return  OrderStatModel
     */
    public function set_total_price( string $total_price ): OrderStatModel {
        $this->total_price = $total_price;

        return $this;
    }
}
