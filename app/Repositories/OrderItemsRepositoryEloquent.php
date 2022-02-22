<?php

namespace App\Repositories;

use App\Models\OrderItem;

    /**
     * class OrdersRepositoryEloquent
     */
    class OrderItemsRepositoryEloquent implements OrderItemsRepository 
    {
        /**
         * @var OrderItem
         */
        private $model;

        /** 
         * OrdersRepositoryEloquent constructor
         * @Param OrderItem $model
         * 
         */
        public function __construct()
        {
            $this->model = new OrderItem();
        }
      

        /**
         * Get all orders
         */
        public function getAll() {
            return $this->model->all();
        }

        /**
         * Create order Items.
         * @param array $data
         * 
        */
        public function createOrderItems( $order_id, array $data ) 
        {
            $result = false;
            foreach ($data as $key => $value) {
                $order_item = new OrderItem();

                $order_item->order_id = $order_id;
                $order_item->product_id = $value['product_id'];
                $order_item->quantity = $value['quantity'];
                $order_item->price = $value['product']['price']*$value['quantity'];

                if( $order_item->save() ) {
                    $result = true;
                }
            }
            return $result;
           
        }

    }  