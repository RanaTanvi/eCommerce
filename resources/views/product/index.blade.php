@extends('layouts.app')
@section('content')
<section class="section-products">
    <div class="container">
        <div class="row justify-content-center text-center">
                <div class="col-md-8 col-lg-6">
                        <div class="header">
                                <h3>Featured Product</h3>
                                <h2>Popular Products</h2>
                        </div>
                </div>
        </div>
        <div class="row">
            @forelse ($products as $product)
            <div class="col-md-6 col-lg-4 col-xl-3" >
                <div id="product-4" class="single-product">
                    <div class="part-1">
                        <span class="new">new</span>
                        <img src="{{asset('images/'.$product->image)}}" alt="" style="width: 100%;background-repeat:no-repeat">
                        <ul>
                            <li><span class="add_to_cart" data-product-id = {{$product->id}}><i class="fas fa-shopping-cart"></i> <i class="fas fa-spinner fa-spin" style="display: none;"></i> </span></li>
                            <li><span ><i class="fas fa-plus"></i></span></li>
                        </ul>
                    </div>
                    <div class="part-2">
                        <h3 class="product-title">{{$product->product_name}}</h3>
                        <h3 class="product-price">${{$product->price}}</h3>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-md-8 col-lg-6 col-xl-6" >
                <span>No products found</span>
            </div>
            @endforelse
           
           
        </div>

    </div>
</section>
@endsection

@push('after-scripts')
<script>
    $('.add_to_cart').on('click', function(e) {
        var product_id = $(e.target).parent().attr('data-product-id');
        console.log(product_id);
        if(product_id) {
            $.ajax({
            url: '/cart/add',
            type: 'POST',
            data: {
                product_id: product_id,
                _token: '{{csrf_token()}}'
            },
            beforeSend: function() {
                $(e.target).hide();
                $(e.target).next().show();
            },
            success: function(response) {
                console.log(response);
                if(response.status == 'success') {
                    // toastr.success(response.message);
                    $(e.target).show();
                    $(e.target).next().hide();
                }
                $('#cart-count').text(response.cartItemsCount);
            }
        });
        } else {
            console.log('No product id found');
        }
        

    });
</script>
@endpush
