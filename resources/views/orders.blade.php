
@extends('layouts.app')
@section('title','Orders')

@section('content')
<div class="container">
   <h3>Order List</h3>
	<table id="cart" class="table table-hover table-condensed">
        <thead>
            <tr>
                <th style="width:50%">Order Id</th>
                <th style="width:10%">Total</th>
                <th style="width:8%">Products</th>
                <th style="width:22%" class="text-center">Status</th>
                <th style="width:10%">Update Status </th>
                <th style="width:10%">Actions </th>
            </tr>
        </thead>
        <tbody>
            @if($orders->isNotEmpty())
            @foreach ($orders as $order)
            <tr>
                <td data-th="Product">
                    
                      
                        <span>{{$order->id}}</span>
                      
                    
                </td>
                
                <td data-th="Price">${{$order->total}}</td>
                <td data-th="Products">
                    <span>{{count($order->orderItems)}}</span>
                </td>
                <td data-th="status" class="text-center status_case">{{$order->status}}</td>
                <td class="actions" data-th="">
                    <div class="dialog-confirm" >
                        @if($order->status == 'pending')
                            <form action="{{route('order.update',$order->id)}}" method="POST" name="statusForm">
                                @csrf
                                <input type="hidden" name="status" value="processing">
                                <button type="submit"  data-status="Processing" class="btn btn-primary btn-sm" title="Update status to Processing?">Processing</button>
                            </form>
                        @elseif($order->status == 'processing')
                            <form action="{{route('order.update',$order->id)}}" method="POST" name="statusForm">
                                @csrf
                                <input type="hidden" name="status" value="completed">
                                <button type="submit" data-status="Completed" class="btn btn-success btn-sm" title="Update status to Completed?">Completed</button>
                            </form>
                        @elseif($order->status == 'completed')
                            <form action="{{route('order.update',$order->id)}}" method="POST" name="statusForm">
                                @csrf
                                <input type="hidden" name="status" value="cancelled">
                                <button type="submit"  data-status="cancelled" class="btn btn-danger btn-sm" title="Update status to Cancelled?">Cancelled</button>
                            </form>
                        @else
                            <form action="{{route('order.update',$order->id)}}" method="POST" name="statusForm">
                                @csrf
                                <input type="hidden" name="status" value="pending">
                                <button type="submit"  data-status="pending" class="btn btn-warning btn-sm" title="Update status to Pending?">Pending</button>
                            </form>

                        @endif
                    </div>							
                </td>
                <td><a class="btn btn-info" href="{{route('order.show',$order->id)}}"><i class="fas fa-eye">View</i></a></td>
            </tr>
            @endforeach
            @else
            <tr>
                <td colspan="6">
                    <p>No orders found</p>
                </td>
            </tr>
            @endif
           
            
        </tbody>
	</table>
</div>
@endsection

@push('after-scripts')
<script>

    $(function() {
    $(".dialog-confirm").on('click', function(e){
        var status = $(e.target).data('status');
        console.log(status);
        if (confirm('Are you Sure you want to update the status to '+status+'?')) {
            return true;
        } else {
            return false;
        }
    });

    



});




</script>
@endpush