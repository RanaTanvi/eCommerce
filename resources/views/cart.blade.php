
@extends('layouts.app')
@section('title','Cart')
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
        <form action="{{route('order.create')}}">
        <tbody>
            @foreach ($cartItems as $cartItem)
            <tr>
                <td data-th="Product">
                    <div class="row">
                       
                        <div class="col-sm-10">
                            <h4 class="nomargin">{{$cartItem->product_name}}</h4>
                            <input type="hidden" name="product_name" class="form-control text-center"   value="{{$cartItem->product_name}}">
                            <input type="hidden" name="product_image" class="form-control text-center"   value="{{$cartItem->product_image}}">

                        </div>
                    </div>
                </td>
                <td data-th="Price">${{$cartItem->product_price}}</td>
                <input type="hidden" name="product_price" class="form-control text-center"   value="{{$cartItem->product_price}}">

                <td data-th="Quantity">
                    <input type="number" data-price="{{$cartItem->product_price}}"  name="Quantity[{{$cartItem->product_price}}]" min=1 class="form-control text-center quantity_input"   value="{{$cartItem->quantity}}">
                </td>
                <td data-th="Subtotal" id = "subtotal" data-subtotal="{{$cartItem->product_price * $cartItem->quantity}}" class="text-center">{{$cartItem->product_price * $cartItem->quantity}}</td>
                <td class="actions" data-th="">
                    <a class="btn btn-danger btn-sm removeItem" id="item_{{$cartItem->id}}" data-id ="{{$cartItem->id}}" href ="{{route('cart.remove',$cartItem->id)}}"><i class="fas fa-trash"></i></a>								
                </td>
            </tr>
            @endforeach
        </tbody>
        
        <tfoot>
            <tr>
                <td><a href="{{route('products')}}" class="btn btn-warning"><i class="fa fa-angle-left"></i> Continue Shopping</a></td>
                <td colspan="2" class="hidden-xs"></td>
                
                <?php $total = 0; 
                    foreach($cartItems as $cartItem){
                        $total += $cartItem->product_price * $cartItem->quantity;
                    }
                ?>
                <td class="hidden-xs text-center total" data-th="Total" data-total= "{{$total}}" ><strong id="total">Total ${{$total}}</strong></td>
                <input type="hidden" name="total" class="form-control text-center"   value="{{$total}}">

                <td>
                    <button type="submit" class="btn btn-success btn-block">
                        Submit Order <i class="fa fa-angle-right"></i>
                    </button>
                </td>
            </tr>
        </tfoot>
        </form> 
        @else 
        <tbody class="no_item">
            <tr>
                <td colspan="5" class="text-center">No items in cart 
                    <br/>
                    <a href="{{route('products')}}" class="btn btn-warning"><i class="fa fa-angle-left"></i> Continue Shopping</a></td>
            </tr>
           
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
        total = parseFloat(total) - parseFloat(old_subtotal) + parseFloat(new_subtotal);
    } else {
        total = parseFloat(total) + parseFloat(price);
    }

    console.log(new_subtotal, total);
    $(e.target).parent().parent().find('td[data-th="Subtotal"]').data('subtotal', new_subtotal);
    $(e.target).parent().parent().find('td[data-th="Subtotal"]').text( new_subtotal);
   

    $('#cart').find('tfoot').find('td[data-th="Total"]').data('total', total);
    $('#cart').find('tfoot').find('td[data-th="Total"]').text('$'+ total);
    


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
                    console.log("here");
                    $('#item_'+item_id).closest('tr').remove();
                    $('.alert-success').html('<strong>Success!</strong>Product removed from cart successfully');
                    $('.alert-success').show();   
                    if(response.cartItemsCount == 0) {
                        console.log("hersse");

                        $('.btn-block').hide();
                        $('#total').hide();
                    } else {
                        console.log("hsfere");

                        $('.total').html('<strong id="total">Total $'+response.total+'</strong>');
                        $('.btn-block').show();
                        $('#total').show();
                    }
                    
                }
                $('#cart-count').text(response.cartItemsCount);
            }
    });
});
    
</script>
@endpush