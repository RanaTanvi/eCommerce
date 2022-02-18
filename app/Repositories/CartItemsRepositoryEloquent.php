<?php

namespace App\Repositories;

use App\Models\CartItem;

    /**
     * class CartItemsRepositoryEloquent
     */
    class CartItemsRepositoryEloquent implements CartItemsRepository 
    {
        /**
         * @var CartItem
         */
        private $model;

        /** 
         * CartItemsRepositoryEloquent constructor
         * @Param CartItem $model
         * 
         */
        public function __construct()
        {
            $this->model = new CartItem();
        }
      

        /**
         * Get all products
         */
        public function getAll() {
            return $this->model->with('product')->get();
        }

        /**
         * Add product to cart
         */
        public function addToCart( $data ) 
        {
            $cartItem = new CartItem();

            $cartItem->product_id = 1;
            // $cartItem->quantity = 1;
            if($cartItem->save()) {
                return true;
            }
            return false;
        }


    }  