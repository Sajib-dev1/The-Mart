@extends('layouts.admin')
@section('content')
<div class="page-content mt-0">
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Tables</a></li>
            <li class="breadcrumb-item active" aria-current="page">Product Table</li>
        </ol>
    </nav>
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">product Table</h6>
                    <div class="table-responsive">
                        <table id="dataTableExample" class="table">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Preview</th>
                                    <th>Product Name</th>
                                    <th>sku</th>
                                    <th>Discount(%)</th>
                                    <th>Price</th>
                                    <th>Status</th>
                                    <th>Status(UP)</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ( $products as $sl=>$product ) 
                                    <tr>
                                        <td>{{ $sl+1 }}</td>
                                        <td>
                                            <img src="{{ asset('uploads/product/preview') }}/{{ $product->preview }}" alt="">
                                        </td>
                                        <td class="text-wrap">{{ $product->product_name }}</td>
                                        <td>{{ $product->sku }}</td>
                                        <td>{{ $product->discount }}</td>
                                        <td>{{ $product->after_discount }}</td>
                                        <td class="toogle_btn text-center">
                                            <label class="checkbox-inline">
                                                <input type="checkbox" {{ $product->status == 1?'checked':'' }} data-id="{{ $product->id }}" class="status" data-toggle="toggle" value="{{ $product->status }}">
                                            </label>
                                        </td>
                                        <td class="toogle_btn text-center">
                                            <label class="checkbox-inline">
                                                <input type="checkbox" {{ $product->upcomming_status == 1?'checked':'' }} data-id="{{ $product->id }}" class="upcomming_status" data-toggle="toggle" value="{{ $product->upcomming_status }}">
                                            </label>
                                        </td>

                                        <td class="d-flex">
                                            <a href="{{ route('product.show',$product->id) }}" class="btn btn-success btn-icon mr-2">
                                                <i data-feather="eye"></i>
                                            </a>
                                            <a href="{{ route('inventory',$product->id) }}" class="btn btn-info btn-icon mr-2">
                                                <i data-feather="layers"></i>
                                            </a>
                                            <a href="{{ route('product.delete',$product->id) }}" class="btn btn-danger btn-icon mr-2">
                                                <i data-feather="trash"></i>
                                            </a>
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
@section('footer_script')
    <script>
        $('.status').change(function(){
            if($(this).val() != 1){
                $(this).attr('value',1);
            }
            else{
                $(this).attr('value',0);
            }
            var product_id = $(this).attr('data-id');
            var status = $(this).val();


            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });


            $.ajax({
                type: "POST",
                url: '/getproductstatus',
                data: { 'product_id':product_id,'status':status },
                success: function( data ) {
                }
            });
        })
    </script>
    <script>
        @if(Session::has('delete'))
        toastr.options =
        {
            "closeButton" : true,
            "progressBar" : true
        }
            toastr.error("{{ session('delete') }}");
        @endif
    </script>
    <script>
        $('.upcomming_status').change(function(){
            if($(this).val() != 1){
                $(this).attr('value',1);
            }
            else{
                $(this).attr('value',0);
            }
            var product_id = $(this).attr('data-id');
            var status = $(this).val();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });


            $.ajax({
                type: "POST",
                url: '/getupcommingproductstatus',
                data: { 'product_id':product_id,'status':status },
                success: function( data ) {
                }
            });
        })
    </script>
@endsection