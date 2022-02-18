
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
                    <input type="number" class="form-control text-center" value="{{$cartItem->quantity}}">
                </td>
                <td data-th="Subtotal" class="text-center">{{$cartItem->product->price * $cartItem->quantity}}</td>
                <td class="actions" data-th="">
                    <button class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>								
                </td>
            </tr>
            @endforeach
            
        </tbody>
        <tfoot>
            <tr class="visible-xs">
                <td class="text-center"><strong class="total">Total 1.99</strong></td>
            </tr>
            <tr>
                <td><a href="#" class="btn btn-warning"><i class="fa fa-angle-left"></i> Continue Shopping</a></td>
                <td colspan="2" class="hidden-xs"></td>
                <td class="hidden-xs text-center"><strong>Total ${{$total}}</strong></td>
                <td><a href="#" class="btn btn-success btn-block">Submit Order <i class="fa fa-angle-right"></i></a></td>
            </tr>
        </tfoot>
	</table>
</div>
@endsection

@push('after-scripts')
<script>
</script>
@endpush