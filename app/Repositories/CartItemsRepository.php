<?php

namespace App\Repositories;

/**
 * Interface CartItemsRepository
 */
interface CartItemsRepository {

    /**
     * Get all products
     */
    public function getAll();

    /**
     * Add product to cart
    */
        public function addToCart( array $data ) ;
}