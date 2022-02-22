<?php

namespace App\Repositories;

use App\Models\Product;

    /**
     * class ProductsRepositoryEloquent
     */
    class ProductsRepositoryEloquent implements ProductsRepository 
    {
        /**
         * @var Product
         */
        private $model;

        /** 
         * ProductsRepositoryEloquent constructor
         * @Param Product $model
         * 
         */
        public function __construct()
        {
            $this->model = new Product();
        }
      

        /**
         * Get all products
         */
        public function getAll() {
            return $this->model->all();
        }

    }  