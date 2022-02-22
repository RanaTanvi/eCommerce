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
            if(!$this->model->where('product_id', $data['product_id'])->exists()) {
               $cartItem  = $this->model->create($data);
            } else {
                $this->model->where('product_id', $data['product_id'])->increment('quantity', $data['quantity']);
            }

                return true;
           
        }

        /**
         * get sum of price of cart items
        */
        public function total() {
            $total = 0;
            $cartItems = $this->model->get();
            foreach($cartItems as $cartItem) {
                $total += $cartItem->product->price * $cartItem->quantity;
            }
            return $total;
        }
        
        /**
         * get total by qunatity of product
         * 
         * @param array $qantity
         * 
         */
        public function getTotalByQuantity($quantity) {
           
            $total = 0;
            foreach($quantity as $key => $value) {
                $total += $key * $value;
            }
            return $total;
        }

        /**
         * Empty cart
        */
        public function emptyCart() {
            $cartItems = $this->model->get();
        
            foreach($cartItems as $cartItem) {
                $cartItem->delete();
            }
            return true;
        }

        /**
        * Remove product from cart
        */
        public function removeFromCart( $id )
        {
            $cartItem = $this->model->find($id);
            if($cartItem) {
                $cartItem->delete();
                return true;
            }
            return false;
        }
    
         
    }  