@extends('layouts.app')
@section('title','Products')
@section('content')

<section class="section-products">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">
                    <div class="page-header">
                            <h2>Popular Products</h2>
                    </div>
            </div>
        </div>

        <div class="row products" >
            @if(count($products) > 0) 
                @foreach($products as $product)

            <div class="col-md-6 col-lg-4 col-xl-3" >
                <div id="product-4" class="single-product">
                    <div class="part-1">
                        <div id="my-pics" class="carousel slide" data-ride="carousel" style="width:300px;margin:auto;">
                            <ol class="carousel-indicators">
                                <li data-target="#my-pics" data-slide-to="0" class="active"></li>
                                <li data-target="#my-pics" data-slide-to="1"></li>
                                <li data-target="#my-pics" data-slide-to="2"></li>
                            </ol>
                            <div class="carousel-inner" role="listbox">

                                @foreach($product->images as $image)
                            
                                <div class="item active">
                                    <img src="{{$image->src}}" alt="Sunset over beach">
                                </div>
                                @endforeach
                            </div>

                            <a class="left carousel-control" href="#my-pics" role="button" data-slide="prev">
                                <span class="icon-prev" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="right carousel-control" href="#my-pics" role="button" data-slide="next">
                                <span class="icon-next" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>

                        <ul>
                            @if($product->in_stock || (isset($product->variations[0]) && $product->variations[0]->regular_price != '' ))
                            <li class="add_to_cart" data-product-id = "{{$product->id}}"  data-product-name = "{{$product->name}}" 
                            data-product-price = "{{isset($product->variations[0])? $product->variations[0]->regular_price: ''}}" data-product-image="{{$product->images[0]->src}} "><span class="" ><i class="fas fa-shopping-cart"></i> <i class="fas fa-spinner fa-spin" style="display: none;"></i>Add To Cart </span></li>
                            @else
                            <li><span>Out of Stock</span></li>

                            @endif
                        </ul>
                    </div>
                    <div class="part-2">
                        <h3 class="product-title">{{$product->name}}</h3>
                        <!-- <p class="product-title">{!! $product->description !!}</p> -->

                        <h3 class="product-price">{{isset($product->variations[0])? $product->variations[0]->regular_price: ''}}</h3>
                    </div>
                </div>
            </div>
            @endforeach
            @else
            <h5>No Products Found</h3>
            @endif
        </div>
        <div class="row loader_row">
            <div class="col-md-12">
                <span>
                    <i class=" fas fa-spinner fa-spin loader" style="display: none;"></i>
                </span>
            </div>
        </div>
    </div>
</section>


  

@endsection

@push('after-scripts')
<script>
    $('.products').on('click','.add_to_cart', function(e) {

        var product_id = $(e.target).parent().attr('data-product-id');
        var product_name = $(e.target).parent().attr('data-product-name');
        var product_price = $(e.target).parent().attr('data-product-price');
        var product_image = $(e.target).parent().attr('data-product-image');

        if(product_id) {
            $.ajax({
            url: '/cart/add',
            type: 'POST',
            data: {
                product_id: product_id,
                product_name: product_name,
                product_price: product_price,
                product_image: product_image,
                quantity: 1,
                _token: '{{csrf_token()}}'
            },
            beforeSend: function() {
                $(e.target).find('.fa-shopping-cart').hide();
              
               $(e.target).find('.fa-spinner').show();
            },
            success: function(response) {
                console.log(response);
                if(response.status == 'success') {
                    $('.alert-success').html('<strong>Success!</strong>Product added to cart successfully');
                    $('.alert-success').show();                    
                    $(e.target).find('.fa-shopping-cart').show();
              
                $(e.target).find('.fa-spinner').hide();
                }
                $('#cart-count').text(response.cartItemsCount);
            }
        });
        } else {
            console.log('No product id found');
        }
        

    });

    var stop  = 0;
        var page  =1;
        $(window).scroll( function() {  
           if ( $(window).scrollTop() + $(window).height() >= $(document).height() ) {
               page++; 
               if(!stop) {
                loadReviews();
               }
           }
       });
       const loadReviews = function() {
        $.ajax({
            url: 'https://mangomart-autocount.myboostorder.com/wp-json/wc/v1/products',
            method: 'GET', 
            beforeSend: function (xhr) {
                $('.loader').show();
                xhr.setRequestHeader ("Authorization", "Basic " + btoa('ck_2682b35c4d9a8b6b6effac552e0bffb315a0' + ":" + 'cs_cab8c9a729dfb49c50ce801a9ea41b577c00ad71'));
            },
            data: { page: page },
            success: function(res,  textStatus, request) {
                $('.loader').hide();
                if(res.totalPages == page) {
                    $('.loader').hide();

                    stop = 1;
                }
                var html = '';
                
                $.each(res, function(index, value) {
                    console.log(request.getResponseHeader('X-WP-TotalPages'));

                    var price = value.variations.length > 0 ? value.variations[0].regular_price : value.regular_price;

                    html +=  '<div class="col-md-6 col-lg-4 col-xl-3" ><div id="product-4" class="single-product"><div class="part-1"><span class="new">new</span>';
                    $.each(value.images, function(index, image) {
                        html += '<img src="'+image.src+'" alt="'+image.alt+'" style="width: 100%;background-repeat:no-repeat">';
                    });
                    if(value.in_stock) {
                        html += '<ul><li class="add_to_cart" data-product-id = "'+value.id+'"  data-product-name = "'+value.name+'" data-product-price = "'+price+'"  data-product-image="'+value.images[0].src+'  " ><span class="" ><i class="fas fa-shopping-cart"></i> <i class="fas fa-spinner fa-spin" style="display: none;"></i>Add To Cart </span></li></ul>';
                    } else {
                        html += '<ul><li ><span class="" >Out of Stock</li></ul>';
                    }
                    html += '</div><div class="part-2"><h3 class="product-title">'+value.name+'</h3><h3 class="product-price">'+value.regular_price+'</h3></div></div></div>';
                });           
                $('.products').append(html);

               
            },
            error: function(err) {
                console.log('error final', err);
            }
        });
    }

</script>
@endpush
