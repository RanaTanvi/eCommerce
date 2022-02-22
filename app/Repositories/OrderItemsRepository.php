<?php

namespace App\Repositories;

/**
 * Interface OrderItemsRepository
 */
interface OrderItemsRepository {

    /**
     * Get all orders
     */
    public function getAll();

    /**
     * Create order.
     * @param order_id
     * @param array $data
     * 
     */
    public function createOrderItems( $order_id, array $data );
}