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
    public function createOrderItems( $order_id, array $data, $quantity);

    /**
     * Get order items by order_id
     * 
     * @param int $order_id
     * 
     */
    public function getByOrderId( $order_id ) ;
}