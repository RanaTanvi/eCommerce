<?php

namespace App\Repositories;

/**
 * Interface OrdersRepository
 */
interface OrdersRepository {

    /**
     * Get all orders
     */
    public function getAll();

    /**
     * Create order.
     * @param array $data
     * 
     */
    public function createOrder( array $data );

    /**
     * Update status of order
     * 
     * @param int $id
     * @param string $status
     * 
     */
    public function updateStatus(  $id, $status );

    /**
     * Get order by id
     * 
     * @param int $id
     * 
     */
    public function getById( $id );
}