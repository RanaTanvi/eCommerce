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
            return $this->model->all();
        }

    }  