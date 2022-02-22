
@extends('layouts.app')
@section('content')
<div class="container">
   
	<table id="cart" class="table table-hover table-condensed">
        <thead>
            <tr>
                <th style="width:50%">Order Id</th>
                <th style="width:10%">Total</th>
                <th style="width:8%">Products</th>
                <th style="width:22%" class="text-center">Status</th>
                <th style="width:10%">Update Status </th>
            </tr>
        </thead>
        <tbody>
            @if($orders->isNotEmpty())
            @foreach ($orders as $order)
            <tr>
                <td data-th="Product">
                    <div class="row">
                        <div class="col-sm-10">
                            <p>{{$order->id}}</p>
                        </div>
                    </div>
                </td>
                <td data-th="Price">${{$order->total}}</td>
                <td data-th="Products">
                    <span>{{count($order->products)}}</span>
                </td>
                <td data-th="status" class="text-center">{{$order->status}}</td>
                <td class="actions" data-th="">
                    <div class="dialog-confirm" >
                        @if($order->status == 'pending')
                            <form action="{{route('order.update',$order->id)}}" method="POST" name="statusForm">
                                @csrf
                                <input type="hidden" name="status" value="processing">
                                <button type="submit"  data-status="Completed" class="btn btn-primary btn-sm" title="Update status to Completed?">Processing</button>
                            </form>
                        @elseif($order->status == 'processing')
                            <form action="{{route('order.update',$order->id)}}" method="POST" name="statusForm">
                                @csrf
                                <input type="hidden" name="status" value="completed">
                                <button type="submit" data-status="Cancelled" class="btn btn-success btn-sm" title="Update status to Cancelled?">Completed</button>
                            </form>
                        @elseif($order->status == 'completed')
                            <form action="{{route('order.update',$order->id)}}" method="POST" name="statusForm">
                                @csrf
                                <input type="hidden" name="status" value="cancelled">
                                <button type="submit"  data-status="Pending" class="btn btn-danger btn-sm" title="Update status to Pending?">Cancelled</button>
                            </form>
                        @else
                            <form action="{{route('order.update',$order->id)}}" method="POST" name="statusForm">
                                @csrf
                                <input type="hidden" name="status" value="pending">
                                <button type="submit"  data-status="Processing" class="btn btn-warning btn-sm" title="Update status to Processing?">Pending</button>
                            </form>

                        @endif
                    </div>							
                </td>
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