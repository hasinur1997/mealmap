<?php
/**
 * MealController
 *
 * @package Hasinur\MealMap
 */
namespace Hasinur\MealMap\Api\Controllers;

use Hasinur\MealMap\Models\MealModel;
use WP_REST_Controller;
use WP_REST_Server;

class MealController extends WP_REST_Controller {
    /**
     * Store namespace
     *
     * @var string
     */
    protected $namespace = 'meal-map';

    /**
     * Store route restbase
     *
     * @var string
     */
    protected $rest_base = 'meals';

    /**
     * Store MealModel instance
     *
     * @var MealModel $meal_model
     */
    protected $meal_model;

    /**
     * Initialize the class
     *
     * @param   MealModel  $meal_model
     *
     * @return  void
     */
    public function __construct( MealModel $meal_model ) {
        $this->meal_model = $meal_model;
    }

    /**
     * Registers the routes for the objects of the controller.
     *
     * @return void
     */
    public function register_routes() {
        register_rest_route(
            $this->namespace,
            '/' . $this->rest_base . '/(?P<id>[\d]+)',
            [
                'args'   => [
                    'id' => [
                        'description' => __( 'Unique identifier for the meal.', 'meal-map' ),
                        'type'        => 'integer',
                    ],
                ],
                [
                    'methods'             => WP_REST_Server::READABLE,
                    'callback'            => [$this, 'get_item'],
                    'permission_callback' => [$this, 'get_item_permissions_check'],
                    'args'                => [],
                ],
                'schema' => [$this, 'get_public_item_schema'],
            ]
        );

        register_rest_route(
            $this->namespace,
            '/' . $this->rest_base,
            [
                'args'   => [],
                [
                    'methods'             => WP_REST_Server::READABLE,
                    'callback'            => [$this, 'get_items'],
                    'permission_callback' => [$this, 'get_items_permissions_check'],
                    'args'                => [
                        'ids'    => [
                            'description' => __( 'Unique identifier for the meal.', 'meal-map' ),
                            'required'    => false,
                            'type'        => 'array',
                            'items'       => [
                                'type'              => 'integer',
                                'sanitize_callback' => 'absint',
                            ],
                        ],
                        'search' => [
                            'description'       => __( 'Search term.', 'meal-map' ),
                            'required'          => false,
                            'type'              => 'string',
                            'sanitize_callback' => 'sanitize_text_field',
                        ],
                    ],
                ],
                'schema' => [$this, 'get_public_item_schema'],
            ]
        );
    }

    /**
     * Retrieves a single meal.
     *
     * @param WP_REST_Request $request Full details about the request.
     *
     * @return WP_REST_Response|WP_Error Response object on success, or WP_Error object on failure.
     */
    public function get_item( $request ) {
        $meals = $this->meal_model
            ->get( [$request->get_param( 'id' )] );

        return rest_ensure_response( $meals );
    }

    /**
     * Retrieves a collection of meals.
     *
     * @param WP_REST_Request $request Full details about the request.
     *
     * @return WP_REST_Response|WP_Error Response object on success, or WP_Error object on failure.
     */
    public function get_items( $request ) {
        $ids    = $request->get_param( 'ids' ) ?? [];
        $search = $request->get_param( 'search' ) ?? '';

        $meals = $this->meal_model->get( $ids, $search );

        return rest_ensure_response( $meals );
    }

    /**
     * Checks if a given request has access to get item.
     *
     * @param WP_REST_Request $request
     *
     * @return bool
     */
    public function get_item_permissions_check( $request ): bool {
        return is_user_logged_in() && current_user_can( 'read' );
    }

    /**
     * Checks if a given request has access to get items.
     *
     * @param WP_REST_Request $request
     *
     * @return bool
     */
    public function get_items_permissions_check( $request ): bool {
        return is_user_logged_in() && current_user_can( 'read' );
    }
}
