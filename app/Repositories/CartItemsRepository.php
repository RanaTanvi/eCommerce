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

    /**
     * Remove product from cart
     */
    public function removeFromCart( $id );

    /**
     * get total by qunatity of product
     * 
     * @param array $qantity
     * 
     */
    public function getTotalByQuantity($quantity);
}