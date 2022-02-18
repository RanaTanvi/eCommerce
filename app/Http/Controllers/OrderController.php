<?php

namespace App\Http\Controllers;

use App\Repositories\ProductsRepository;
use Illuminate\Http\Request;

/**
 * Class OrderController
 */
class OrderController extends Controller
{
    /**
     * @var ProductRepository
     */
    private $_productRepository;

    /**
     * ProductController constructor.
     * @param ProductRepository $productRepository
     */
    public function __construct( ProductsRepository $productRepository )
    {
        $this->_productRepository = $productRepository;
    }
    

    /**
     * Show the product list.
     *
     * @return \Illuminate\Http\Response
     */ 
    public function index() 
    {
        $products = $this->_productRepository->getAll();
        return view('product.index')->withProducts($products);
    }
  
}
