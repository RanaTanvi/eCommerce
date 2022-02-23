<?php

namespace App\Http\Controllers;

use App\Repositories\CartItemsRepository;
use Illuminate\Http\Request;
use GuzzleHttp\Client;

/**
 * Class CartController
 */
class CartController extends Controller
{
    /**
     * @var CartItemsRepository
     */
    private $_cartItemsRepository;

    /**
     * CartController constructor.
     * @param CartItemsRepository $CartItemsRepository
     */
    public function __construct( CartItemsRepository $cartItemsRepository )
    {
        $this->_cartItemsRepository = $cartItemsRepository;
    }

    /**
     * Show the cart
     *
     * @return \Illuminate\Http\Response
     */

     public function cart() {

        $cartItems = $this->_cartItemsRepository->getAll();
        $client = new Client();

        if($cartItems->isEmpty()) {
            return view('cart')->withMessage('Your cart is empty');
        }
        $total = $cartItems->sum('product_price');


        return view('cart')->withCartItems($cartItems)->withTotal($total);
     }

     /**
      * Add Product to cart
      *
      * @return \Illuminate\Http\Response
    */
    public function addToCArt( Request $request ) 
    { 
        $cart = $this->_cartItemsRepository->addToCart( $request->all() );

        $cartItemsCount = count($this->_cartItemsRepository->getAll());

        return response()->json( [
            'status' => 'success',
            'message' => 'Product added to cart',
            'cartItemsCount' => $cartItemsCount
        ] );
    }

    /**
     * Remove Product from cart
     * @param int $id
     * @return \Illuminate\Http\Response
     * 
    */
    public function removeFromCart($id) {
       
        $cart = $this->_cartItemsRepository->removeFromCart($id);

        $cartItems = $this->_cartItemsRepository->getAll();
      
        $total = $this->_cartItemsRepository->total();
        
        $cartItemsCount = count($cartItems);   

        return response()->json( [
            'status' => 'success',
            'message' => 'Product removed from cart',
            'cartItemsCount' => $cartItemsCount,
            'total' => $total
        ] );
    }


    
}
