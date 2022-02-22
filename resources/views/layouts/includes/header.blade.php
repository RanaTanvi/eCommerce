<nav class="navbar navbar-light bg-light justify-content-between">
    <div class="header">
        <div class="row">
            <div class="col-md-1">
                <div class="logo">
                    <a href="{{route('products')}}">
                        <img src="{{asset('images/logo.jpg')}}" alt="logo">
                    </a>
                </div>
            </div>
            <div class="col-md-6">
            <div class="header_left">

                <ul>
                    <li><a class="right" href="{{route('products')}}"> Products</a></li>
                    <li><a class="right" href="{{route('order.list')}}">Orders</a></li>
                </ul>

            </div>
            </div>
            <div class="col-md-4">
            <div class="header_right">

                <div class="">
                    <ul>
                    @if(session('notification') !== null)
                    <li>
                        <a class=""  href="{{route('order.show',session('notification')->id)}}" style="color:#0c5797" title="Order Status has been updated">
                            <i class="fas fa-bell"></i>
                        </a>
                    </li>
                    @endif
                    <li>
                        <a href="{{route('cart')}}">
                        <span class="badge badge-info badge-up" id="cart-count">{{isset($cartItemsCount) ? $cartItemsCount: 0}}</span>
                            <i class="fas fa-shopping-cart"></i>
                        </a>
                    </li>
                    
                </ul>
                    
                </div>
            </div>
        </div>

        
      
    </div>
   
  </nav>
  

