
@extends('layouts.app')
@section('content')
<div class="container">
   
	<table id="cart" class="table table-hover table-condensed">
        <thead>
            <tr>
                <th style="width:50%">Product</th>
                <th style="width:10%">Price</th>
                <th style="width:8%">Quantity</th>
                <th style="width:22%" class="text-center">Subtotal</th>
                <th style="width:10%"></th>
            </tr>
        </thead>
        @if(isset($cartItems) && $cartItems->isNotEmpty())
        <tbody>
         
            @foreach ($cartItems as $cartItem)
            <tr>
                <td data-th="Product">
                    <div class="row">
                        <div class="col-sm-2 hidden-xs"><img src="{{asset('images/'.$cartItem->product->image)}}" alt="..." class="img-responsive"/></div>
                        <div class="col-sm-10">
                            <h4 class="nomargin">{{$cartItem->product->product_name}}</h4>
                            <p>{{$cartItem->product->description}}</p>
                        </div>
                    </div>
                </td>
                <td data-th="Price">${{$cartItem->product->price}}</td>
                <td data-th="Quantity">
                    <input type="number" data-price="{{$cartItem->product->price}}"  min=1 class="form-control text-center quantity_input"   value="{{$cartItem->quantity}}">
                </td>
                <td data-th="Subtotal" id = "subtotal" data-subtotal="{{$cartItem->product->price * $cartItem->quantity}}" class="text-center">{{$cartItem->product->price * $cartItem->quantity}}</td>
                <td class="actions" data-th="">
                    <a class="btn btn-danger btn-sm removeItem" id="item_{{$cartItem->id}}" data-id ="{{$cartItem->id}}" href ="{{route('cart.remove',$cartItem->id)}}"><i class="fas fa-trash"></i></a>								
                </td>
            </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <td><a href="#" class="btn btn-warning"><i class="fa fa-angle-left"></i> Continue Shopping</a></td>
                <td colspan="2" class="hidden-xs"></td>
                <td class="hidden-xs text-center total" data-th="Total" data-total= "{{$total}}" ><strong>Total ${{$total}}</strong></td>
                <td><a href="{{route('order.create')}}" class="btn btn-success btn-block">Submit Order <i class="fa fa-angle-right"></i></a></td>
            </tr>
        </tfoot>
        @else 
        <tbody>
            <tr>
                <td colspan="5" class="text-center">No items in cart 
                    <br/>
                    <a href="{{route('products')}}" class="btn btn-warning"><i class="fa fa-angle-left"></i> Continue Shopping</a></td>
            </tr>
            <tfoot>
            
           
        </tfoot>
        </tbody>
            @endif
	</table>
</div>
@endsection

@push('after-scripts')
<script>
$('.quantity_input').on('change', function(e){

    var q = $(e.target).val();
    var price = $(e.target).data('price');

    var old_subtotal =  $(e.target).parent().parent().find('td[data-th="Subtotal"]').data('subtotal');
    var new_subtotal = q * price;
    var total = $('#cart').find('tfoot').find('td[data-th="Total"]').data('total');
    if(old_subtotal >= new_subtotal) {
        total = parseInt(total) - parseInt(old_subtotal) + parseInt(new_subtotal);
    } else {
        total = parseInt(total) + parseInt(price);
    }

    console.log(new_subtotal, total);
    $(e.target).parent().parent().find('td[data-th="Subtotal"]').data('subtotal', new_subtotal);
    $(e.target).parent().parent().find('td[data-th="Subtotal"]').text( new_subtotal);
   

    $('#cart').find('tfoot').find('td[data-th="Total"]').data('total', total);
    $('#cart').find('tfoot').find('td[data-th="Total"]').text( total);
    


});

$('.removeItem').on('click',function(e){
    e.preventDefault();
    var item_id = $(this).data('id');

    $.ajax({
        url: '/cart/remove/'+item_id,
        type: 'GET',
        success: function(response) {
                console.log(response);
                if(response.status == 'success') {
                    $('.total').html('<strong>Total $'+response.total+'</strong>');
                    $('#item_'+item_id).closest('tr').remove();
                    $('.alert-success').html('<strong>Success!</strong>Product removed from cart successfully');
                    $('.alert-success').show();   
                    
                }
                $('#cart-count').text(response.cartItemsCount);
            }
    });
});
    
</script>
@endpush