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
            return $this->model->with('orderItems')->get();
        }

        /**
         * Create order.
         * @param array $data
         * 
        */
        public function createOrder( array $data ) {
            $order = new Order();

            $order->total = $data['total'];
            $order->status ='pending';
         

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

        /**
         * Get order by id
         * 
         * @param int $id
         * 
         */
        public function getById( $id ) {
            return $this->model->find($id);
        }

    }  