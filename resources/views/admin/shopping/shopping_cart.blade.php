@extends('layouts.admin')
@section('content')
<div class="page-content mt-0">
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Tables</a></li>
            <li class="breadcrumb-item active" aria-current="page">User Table</li>
        </ol>
    </nav>
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">User Table</h6>
                    <div class="table-responsive">
                        <table id="dataTableExample" class="table">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Order Id</th>
                                    <th>Customer Name</th>
                                    <th>Sub total</th>
                                    <th>Discount</th>
                                    <th>Delivery</th>
                                    <th>total</th>
                                    <th>Payment Method</th>
                                    <th>Order Status</th>
                                    <th>Created At</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ( $orders as $sl=>$order )
                                    <tr>
                                        <td>{{ $sl+1 }}</td>
                                        <td>{{ $order->order_id }}</td>
                                        <td>{{ $order->rel_to_customer->fname.' '.$order->rel_to_customer->lname }}</td>
                                        <td>{{ $order->sub_total }}</td>
                                        <td>{{ $order->discount }}</td>
                                        <td>{{ $order->delivery }}</td>
                                        <td>{{ $order->total }}</td>
                                        <td>
                                            @if ($order->payment_method == 1)
                                                <span class="btn btn-success">Cash on delibery</span>
                                            @elseif ($order->payment_method == 2)
                                                <span class="btn btn-success">Ssl Commerch</span>
                                            @elseif ($order->payment_method == 3)
                                                <span class="btn btn-success">Stripe</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if ($order->status == 0)
                                               <span class="badge bg-secondary">placed</span>
                                            @elseif ($order->status == 1)
                                               <span class="badge bg-primary">processing</span>
                                            @elseif ($order->status == 2)
                                               <span class="badge bg-warning">Shipping</span>
                                            @elseif ($order->status == 3)
                                               <span class="badge bg-info">Ready for deliver</span>
                                            @elseif ($order->status == 4)
                                               <span class="badge bg-success">Delivery</span>
                                            @elseif ($order->status == 5)
                                               <span class="badge bg-danger">Cancel</span>
                                            @endif
                                        </td>
                                        <td>{{ $order->created_at->diffForHumans() }}</td>
                                        <td class="d-flex">
                                            <div>
                                                <a href="{{ route('shopping.invoice',$order->id) }}" class="btn btn-primary btn-icon">
                                                    <i data-feather="eye"></i>
                                                </a>
                                            </div> 
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>     
@endsection