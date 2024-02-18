@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-md-8 grid-margin stretch-card m-auto">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Edit Sub Product</h6>
                    <form class="forms-sample" action="{{ route('sub.product.update',$sub_product_info->id) }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputUsername1">Sub Product Name</label>
                            <input type="text" class="form-control" name="sub_product" id="exampleInputUsername1" placeholder="Size Name" autocomplete="off" value="{{ $sub_product_info->sub_product }}">
                            @error('sub_product')
                                <strong class="text-danger">{{ $message }}</strong>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary mr-2">Submit</button>
                        <a href="{{ route('sub.product') }}" class="btn btn-light"><i class="link-icon" data-feather="chevrons-right"></i></a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('footer_script')
<script>
    @if(Session::has('update'))
    toastr.options =
    {
        "closeButton" : true,
        "progressBar" : true
    }
        toastr.success("{{ session('update') }}");
    @endif
</script>    
@endsection