<nav class="navbar navbar-light bg-light justify-content-between">
    <div class="header">
        <div class="header_left">
            <a class="navbar-brand">Navbar</a>
            <a href={{route('products')}}>Products</a>
            {{-- <ul>
                <li><a href={{route('products')}}>Products</a></li>
            </ul> --}}
        </div>
        <div class="header_right">
           
            <a class="navbar-brand" href="{{route('cart')}}"><i class="fas fa-shopping-cart"></i> Cart<label id="cart-count">{{$cartItemsCount}}
            </label></a>

            {{-- <a class="navbar-brand" href="#"><i class="fas fa-shopping-cart"></i> Cart</a> --}}
        </div>
    </div>
   
  </nav>