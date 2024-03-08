<?php
namespace Hasinur\MealMap\Models;

/**
 * Order Report Model
 */
class OrderReportModel {
    /**
     * Store user_id
     *
     * @var int
     */
    protected $user_id;

    /**
     * Store start date
     *
     * @var string
     */
    protected $start_date;

    /**
     * Store end date
     *
     * @var string
     */
    protected $end_date;

    /**
     * Store order_stat_model
     *
     * @var OrderStatModel
     */
    protected $order_stat_model;

    /**
     * Store order_overview_model
     *
     * @var OrderOverviewModel
     */
    protected $order_overview_model;

    /**
     * Initialize
     *
     * @param   OrderStatModel      $order_stat_model
     * @param   OrderOverviewModel  $order_overview_model
     *
     * @return  void
     */
    public function __construct( OrderStatModel $order_stat_model, OrderOverviewModel $order_overview_model ) {
        $this->order_stat_model     = $order_stat_model;
        $this->order_overview_model = $order_overview_model;
    }

    // Getters

    /**
     * Get user id
     *
     * @return  int
     */
    public function get_user_id(): int {
        return $this->user_id;
    }

    /**
     * Get start date
     *
     * @return  string
     */
    public function get_start_date(): string {
        return $this->start_date;
    }

    /**
     * Get end date
     *
     * @return  string
     */
    public function get_end_date(): string {
        return $this->end_date;
    }

    // Setters.

    /**
     * Set user id
     *
     * @param   int $user_id
     *
     * @return  OrderReportModel
     */
    public function set_user_id( int $user_id ): OrderReportModel {
        $this->user_id = $user_id;

        return $this;
    }

    /**
     * Set start date
     *
     * @param   string $start_date
     *
     * @return  OrderReportModel
     */
    public function set_start_date( string $start_date ): OrderReportModel {
        $this->start_date = $start_date;

        return $this;
    }

    /**
     * Set end date
     *
     * @param   string $end_date
     *
     * @return  OrderReportModel
     */
    public function set_end_date( string $end_date ): OrderReportModel {
        $this->end_date = $end_date;

        return $this;
    }
    
    /**
     * Get order overview
     *
     * @return  array
     */
    public function get_order_overview(): array {
        global $wpdb;

        $overview = [];
        $total_order_count = 0;

        $results = $wpdb->get_results(
            $wpdb->preppare(
                'SELECT
                meal_id, price, COUNT(*) as order_count
                FROM wp_meal_map_orders
                WHERE created_at >= CURDATE()
                AND created_at < CURDATE() + INTERVAL 1 DAY
                GROUP BY 
                    meal_id;
                '
            )
        );

        foreach($results as $result) {
            $this->order_overview_model
                ->set_meal_id((int) $result->meal_id)
                ->set_order_count((int) $result->order_count);
            $overview['details'][] = [
                'meal_id'   => $this->order_overview_model->get_meal_id(),
                'meal_name' => $this->order_overview_model->get_meal_name(),
                'order_count'   => $this->order_overview_model->get_order_count()
            ];

            $total_order_count += (int)$result->order_count;
        }

        $overview['total_order_count'] = $total_order_count;

        return $overview;
    }
}
