<?php

namespace App\Repositories;

use App\Models\Order;

    /**
     * class OrdersRepositoryEloquent
     */
    class OrdersRepositoryEloquent implements OrdersRepository 
    {
        /**
         * @var Order
         */
        private $model;

        /** 
         * OrdersRepositoryEloquent constructor
         * @Param Order $model
         * 
         */
        public function __construct()
        {
            $this->model = new Order();
        }
      

        /**
         * Get all orders
         */
        public function getAll() {
            return $this->model->with('products')->get();
        }

        /**
         * Create order.
         * @param array $data
         * 
        */
        public function createOrder( array $data ) {
            $order = new Order();

            $order->total = $data['total'];
            $order->status = $data['status'];

            if( $order->save() ) {
                return $order;
            }
            return false;
        }

        /**
         * Update status of order
         * 
         * @param int $id
         * @param string $status
         * 
        */
        public function updateStatus(  $id, $status ) 
        {
            $order = $this->model->find($id);
            if($order) {
                $order->status = $status;
                if( $order->save() ) {
                    return $order;
                }
                return false;
            }
        }

    }  