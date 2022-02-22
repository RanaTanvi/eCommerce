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
                    <li><a class="" href="{{route('products')}}"> Products</a></li>
                    <li><a class="" href="{{route('order.list')}}">Orders</a></li>
                </ul>

            </div>
            </div>
            <div class="col-md-4">
            <div class="header_right">

                <div class="cart">
                    <a href="{{route('cart')}}">
                        <i class="fas fa-shopping-cart"></i>
                        <span class="badge badge-light" id="cart-count">{{isset($cartItemsCount) ? $cartItemsCount: 0}}</span>
                    </a>
                    <a class="nav-link dropdown-toggle dropdown-toggle-nocaret waves-effect" style="padding:50px" data-toggle="dropdown" href="#" onclick="markRead()">
                        <i class="fas fa-bell"></i>
                        <span class="badge badge-info badge-up" id="notificationcount">2</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <ul class="list-group list-group-flush" style="max-height: 340px; overflow-x: auto;">
                            @if (true)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                            You have 2 Notifications
                            <span class="badge badge-info">2}}</span>
                            </li>                
                            <li class="list-group-item">
                                <a href="#" style ="color: #dcb000 !important">
                                <div class="media">
                                    <i class="zmdi zmdi-accounts fa-2x mr-3 text-primary"></i>
                                    <div class="media-body">
                                    <h6 class="mt-0 msg-title">title</h6>
                                    <p class="msg-info">name</p>
                                    </div>
                                </div>
                                </a>
                            </li>
                            <li class="list-group-item">
                            <a href="javaScript:void();">See All Notifications</a>
                            </li>                
                            @else 
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                            You have no Notifications
                            <span class="badge badge-info"></span>
                            </li>  
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        
      
    </div>
   
  </nav>
  

