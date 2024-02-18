@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-lg-8 m-auto">
        <div class="card">
            <div class="card-header">
                <h3>Cancel order request</h3>
            </div>
            <div class="card-body">
                <table class="table table-border">
                    <tr>
                        <th>SL</th>
                        <th>Order Id</th>
                        <th>Reason</th>
                        <th>Action</th>
                    </tr>
                    @foreach ( $cancel_orders as $sl=>$cancel_order ) 
                        <tr>
                            <td>{{ $sl+1 }}</td>
                            <td>{{ $cancel_order->order_id }}</td>
                            <td>{{ $cancel_order->resion }}</td>
                            <td>
                                <a href="{{ route('cancel.order.accept',$cancel_order->id) }}" class="btn btn-danger">Accept</a>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</div>
@endsection