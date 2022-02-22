
@extends('layouts.app')
@section('title','Order Details')

@section('content')
<div class="container">
   <div class="row">
    <h3>Order Id: {{$order->id}}</h3>
    <h3>Total: ${{$order->total}}</h3>
    <h3>Status: {{$order->status}}</h3>
    <h3>Products:</h3>

    @foreach($orderItems as $orderItem)
    <div class="col-md-3">

    <div class="card" >

    <img class="card-img-top" src="{{asset('images/'.$orderItem->product->image)}}" style="    width: 200px;
    height: 200px;"alt="Card image cap">
    <div class="card-body">
        <h5 class="card-title">{{$orderItem->product->product_name}}</h5>
        <p class="card-text">{{$orderItem->product->description}}</p>
        <p class="card-text">Quantity {{$orderItem->quantity}}</p>

    </div>
    </div>
    </div>

    @endforeach
 
</div>
</div>
@endsection

@push('after-scripts')
<script>

   
    








</script>
@endpush