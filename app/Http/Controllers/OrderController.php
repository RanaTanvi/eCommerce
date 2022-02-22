<?php

namespace App\Http\Controllers;

use App\Repositories\OrdersRepository;
use App\Repositories\CartItemsRepository;
use App\Repositories\OrderItemsRepository;
use Illuminate\Http\Request;
use DB;

/**
 * Class OrderController
 */
class OrderController extends Controller
{
    /**
     * @var OrdersRepository
     */
    private $_ordersRepository;

    /**
     * @var CartItemsRepository
    */
    private $_cartItemsRepository;

    /**
     * @var OrderItemsRepository
     */
    private $_orderItemsRepository;

    /**
     * OrderController constructor.
     * @param OrdersRepository $ordersRepository
     * @param CartItemsRepository $cartItemsRepository
     */
    public function __construct( OrdersRepository $ordersRepository, CartItemsRepository $cartItemsRepository, OrderItemsRepository $orderItemsRepository )
    {
        $this->_ordersRepository = $ordersRepository;
        $this->_cartItemsRepository = $cartItemsRepository;
        $this->_orderItemsRepository = $orderItemsRepository;
    }

    /**
     * Show the product list.
     *
     * @return \Illuminate\Http\Response
     */ 
    public function index() 
    {
        $orders = $this->_ordersRepository->getAll();
        // dd($orders);
        return view('orders')->withOrders($orders);
    }

    /**
     * Create order.
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * 
     */
    public function create( Request $request )
    {
        try{
            
        DB::beginTransaction();
        $total =  $this->_cartItemsRepository->total();
        $order = $this->_ordersRepository->createOrder(['total' => $total, 'status' => 'pending']);

        if( $order ) {
            $cartItems = $this->_cartItemsRepository->getAll()->toArray();
            
            $oderItems = $this->_orderItemsRepository->createOrderItems($order->id, $cartItems);

            $cart = $this->_cartItemsRepository->emptyCart();
            if( $cart ) {
                Db::commit();
                return redirect()->route('products')->with('success', 'Order created successfully');
            }
        }

        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error', $e->getMessage());
        }
        
    }
    
    /**
     * Update status of order
     * 
     * @param Request $request
     * @param int $id
     * 
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateStatus(int $id, Request $request) 
    {
        try{
            $order = $this->_ordersRepository->updateStatus($id, $request->status);
            if( $order ) {
                return redirect()->back()->with('success', 'Order status updated successfully');
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
