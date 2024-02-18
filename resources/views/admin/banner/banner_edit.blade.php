@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-md-8 grid-margin stretch-card m-auto">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Edit Banner</h6>
                    <form class="forms-sample" action="{{ route('banner.update',$banner_info->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputUsername1">Title</label>
                            <input type="text" class="form-control" name="title" id="exampleInputUsername1" placeholder="Title" autocomplete="off" value="{{ $banner_info->title }}">
                            @error('title')
                                <strong class="text-danger">{{ $message }}</strong>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputUsername1">Product Type</label>
                            <select name="product_type" class="form-control" id="">
                                @foreach ( $product_types as $type )
                                    <option value="{{ $type->id }}" {{ $banner_info->product_type == $type->id ?'selected':'' }}>{{ $type->subcategory_name }}</option>
                                @endforeach
                            </select>
                            @error('product_type')
                                <strong class="text-danger">{{ $message }}</strong>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputUsername1">Image</label>
                            <input type="file" class="form-control" name="image" id="exampleInputUsername1" autocomplete="off" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">
                            @error('image')
                                <strong class="text-danger">{{ $message }}</strong>
                            @enderror
                        </div>
                        <div class="form-group">
                            <img src="{{ asset('uploads/banner') }}/{{ $banner_info->image }}" id="blah" width="150" alt="">
                        </div>
                        <button type="submit" class="btn btn-primary mr-2">Submit</button>
                        <a href="{{ route('banner') }}" class="btn btn-light"><i class="link-icon" data-feather="chevrons-right"></i></a>
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