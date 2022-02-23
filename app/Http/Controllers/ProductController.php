<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
/**
 * Class ProductController
 */
class ProductController extends Controller
{
    /**
     * ProductController constructor.
     */
    public function __construct(  )
    {
    }
    

    /**
     * Show the product list.
     *
     * @return \Illuminate\Http\Response
     */ 
    public function index() 
    {        
        $client = new Client();

        $response = $client->request('GET', 'https://mangomart-autocount.myboostorder.com/wp-json/wc/v1/products', ['auth' => ['ck_2682b35c4d9a8b6b6effac552e0bffb315a0', 'cs_cab8c9a729dfb49c50ce801a9ea41b577c00ad71']]);
      
        $products = json_decode($response->getBody()->getContents());
        if($products) {
            return view('product.index')->withProducts($products);

        }
        return view('product.index')->withProducts([]);

    }
  
}
