@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-md-8 grid-margin stretch-card m-auto">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Edit Brand</h6>
                    <form class="forms-sample" action="{{ route('brand.update',$brand_info->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputUsername1">Brand Name</label>
                            <input type="text" class="form-control" name="brand_name" id="exampleInputUsername1" autocomplete="off" placeholder="Brand Name" value="{{ $brand_info->brand_name }}">
                            @error('brand_name')
                                <strong class="text-danger">{{ $message }}</strong>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Image</label>
                            <input type="file" class="form-control" name="image" id="exampleInputEmail1" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">
                            @error('image')
                                <strong class="text-danger">{{ $message }}</strong>
                            @enderror
                        </div>
                        <div class="form-group">
                            <img src="{{ asset('uploads/brand') }}/{{ $brand_info->image }}" width="150" id="blah" alt="">
                        </div>
                        <button type="submit" class="btn btn-primary mr-2">Submit</button>
                        <a href="{{ route('brand.add') }}" class="btn btn-light"><i class="link-icon" data-feather="chevrons-right"></i></a>
                    </form>
                </div>
            </div>
        </div>
    </div>   
@endsection
@section('footer_script')
<script>
    @if(Session::has('updated'))
    toastr.options =
    {
        "closeButton" : true,
        "progressBar" : true
    }
        toastr.success("{{ session('updated') }}");
    @endif
</script>     
@endsection