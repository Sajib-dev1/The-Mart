@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-lg-8 m-auto">
        <div class="card">
            <div class="card-header">
                <h3>return product </h3>
            </div>
            <div class="card-body">
                <table class="table table-borderd">
                    <tr>
                        <th>SL</th>
                        <th>Order Id</th>
                        <th>Resion</th>
                        <th>Image</th>
                        <th>Created At</th>
                        <th>Action</th>
                    </tr>
                    @foreach ( $returns as $sl=>$return )   
                        <tr>
                            <td>{{ $sl+1 }}</td>
                            <td>{{ $return->order_id }}</td>
                            <td>{{ $return->resion }}</td>
                            <td>
                                <img src="{{ asset('uploads/return_product') }}/{{ $return->image }}" alt="">
                            </td>
                            <td>{{ $return->created_at->format('d-m-Y') }}</td>
                            <td>
                                <a href="{{  route('return.product.accept',$return->id) }}" class="btn btn-primary">Accept</a>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</div>    
@endsection