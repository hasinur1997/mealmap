<?php
namespace Hasinur\MealMap\Models;

/**
 * Order Model
 */
class OrderModel {
    /**
     * Store id
     *
     * @var int
     */
    protected $id;

    /**
     * Store id
     *
     * @var int
     */
    protected $user_id;

    /**
     * Store meal id
     *
     * @var int
     */
    protected $meal_id;

    /**
     * Store order status
     *
     * @var string
     */
    protected $status;

    /**
     * Store order price
     *
     * @var float
     */
    protected $price;

    /**
     * Store formatted price
     *
     * @var string
     */
    protected $formatted_price;

    /**
     * Store created date
     *
     * @var string
     */
    protected $created_at;

    /**
     * Store updated date
     *
     * @var
     */
    protected $updated_at;

    // getters.

    /**
     * Get order id
     *
     * @return  int
     */
    public function get_id(): int {
        return $this->id;
    }

    /**
     * Get user id
     *
     * @return  int
     */
    public function get_user_id(): int {
        return $this->user_id;
    }

    /**
     * Get meal id
     *
     * @return  int
     */
    public function get_meal_id(): int {
        return $this->meal_id;
    }

    /**
     * Get status
     *
     * @return  string
     */
    public function get_status(): string {
        return $this->status;
    }

    /**
     * Get order price
     *
     * @return  float
     */
    public function get_price(): float {
        return $this->price;
    }

    /**
     * Get formatted price
     *
     * @return  string
     */
    public function get_formatted_price(): string {
        return $this->formatted_price;
    }

    /**
     * Get order created date
     *
     * @return  string
     */
    public function get_created_at(): string {
        return $this->created_at;
    }

    /**
     * Get order updated date
     *
     * @return  string
     */
    public function get_updated_at(): string {
        return $this->updated_at;
    }

    // setters.
    /**
     * Set order id
     *
     * @param   int $id
     *
     * @return  OrderModel
     */
    public function set_id( int $id ): OrderModel {
        $this->id = $id;

        return $this;
    }

    /**
     * Set user id
     *
     * @param   int $user_id
     *
     * @return  OrderModel
     */
    public function set_user_id( int $user_id ): OrderModel {
        $this->user_id = $user_id;

        return $this;
    }

    /**
     * Set meal id
     *
     * @param   int $meal_id
     *
     * @return  OrderModel
     */
    public function set_meal_id( int $meal_id ): OrderModel {
        $this->meal_id = $meal_id;

        return $this;
    }

    /**
     * Set status
     *
     * @param   string $status
     *
     * @return  OrderModel
     */
    public function set_status( string $status ): OrderModel {
        $this->status = $status;

        return $this;
    }

    /**
     * Set price
     *
     * @param   float $price
     *
     * @return  OrderModel
     */
    public function set_price( float $price ): OrderModel {
        $this->price = $price;

        return $this;
    }

    /**
     * Set formatted price
     *
     * @param   string $formatted_price
     *
     * @return  OrderModel
     */
    public function set_formatted_price( string $formatted_price ): OrderModel {
        $this->formatted_price = $formatted_price;

        return $this;
    }

    /**
     * Set created at
     *
     * @param   string $created_at
     *
     * @return  OrderModel
     */
    public function set_created_at( string $created_at ): OrderModel {
        $this->created_at = $created_at;

        return $this;
    }

    /**
     * Set updated at
     *
     * @param   string $updated_at
     *
     * @return  OrderModel
     */
    public function set_updated_at( string $updated_at ): OrderModel {
        $this->updated_at = $updated_at;

        return $this;
    }

    /**
     * Get orders
     *
     * @return  array
     */
    public function get_orders(): array {
        global $wpdb;

        $orders = [];

        $results = $wpdb->get_results(
            "SELECT *
            FROM {$wpdb->prefix}meal_map_orders
            "
        );

        foreach ( $results as $result ) {
            $this->set_id( $result->id )
                ->set_user_id( $result->user_id )
                ->set_meal_id( $result->meal_id )
                ->set_price( $result->price )
                ->set_status( $result->status )
                ->set_created_at( $result->created_at ?? '' )
                ->set_updated_at( $result->updated_at ?? '' );

            $meal = new MealModel();
            $meal->set_id( $this->get_meal_id() );

            $orders[] = [
                'id'              => $this->get_id(),
                'user_id'         => $this->get_user_id(),
                'user_name'       => get_userdata( $this->get_user_id() )->display_name,
                'meal_id'         => $this->get_meal_id(),
                'meal_name'       => $meal->get_name(),
                'price'           => $this->get_price(),
                'formatted_price' => $this->get_formatted_price(),
                'status'          => $this->get_status(),
                'created_at'      => current_datetime()->modify( $this->get_created_at() )->format('d-m-y'),
                'updated_at'    => current_datetime()->modify($this->get_updated_at())->format('d-m-y'),
            ];
        }

        return $orders;
    }
}