@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-md-8 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h6 class="card-title">Sub Product Table</h6>
                <p class="card-description">Add class <code>.table-hover</code></p>
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Sub product Name</th>
                                <th>Created At</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ( $sub_products as $sl=>$sub_product )  
                                <tr>
                                    <th>{{ $sl+1 }}</th>
                                    <td>{{ $sub_product->sub_product }}</td>
                                    <td>{{ $sub_product->created_at->diffForhumans() }}</td>
                                    <td>
                                        <a href="{{ route('sub.product.edit',$sub_product->id) }}" class="btn btn-primary btn-icon mr-2">
                                            <i data-feather="edit"></i>
                                        </a>
                                        <a href="{{ route('sub.product.delete',$sub_product->id) }}" class="btn btn-danger btn-icon">
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
    <div class="col-md-4 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h6 class="card-title">Add new Sub Product</h6>
                <form class="forms-sample" action="{{ route('sub.product.store') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputUsername1">Sub Product Name</label>
                        <input type="text" class="form-control" name="sub_product" id="exampleInputUsername1" placeholder="Sub Product Name" autocomplete="off">
                        @error('sub_product')
                            <strong class="text-danger">{{ $message }}</strong>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    <a href="{{ route('dashboard') }}" class="btn btn-light">Cancel</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@section('footer_script')
<script>
    @if(Session::has('success'))
    toastr.options =
    {
        "closeButton" : true,
        "progressBar" : true
    }
        toastr.success("{{ session('success') }}");
    @endif

    @if(Session::has('delete'))
    toastr.options =
    {
        "closeButton" : true,
        "progressBar" : true
    }
        toastr.error("{{ session('delete') }}");
    @endif
</script>    
@endsection