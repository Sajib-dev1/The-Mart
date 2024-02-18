@extends('layouts.admin')
@section('content')
@can('category_edit')
    <div class="row">
        <div class="col-md-8 grid-margin stretch-card m-auto">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Edit Category</h6>
                    <form class="forms-sample" action="{{ route('category.update',$category_info->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputUsername1">Category Name</label>
                            <input type="text" class="form-control" name="category_name" id="exampleInputUsername1" autocomplete="off" placeholder="Category Name" value="{{ $category_info->category_name }}">
                            @error('category_name')
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
                            <img src="{{ asset('uploads/category') }}/{{ $category_info->image }}" width="150" id="blah" alt="">
                        </div>
                        <button type="submit" class="btn btn-primary mr-2">Submit</button>
                        <a href="{{ route('category.add') }}" class="btn btn-light"><i class="link-icon" data-feather="chevrons-right"></i></a>
                    </form>
                </div>
            </div>
        </div>
    </div> 
    @else
    <h3 class="text-warning">You dont have to access this page</h3>
@endcan  
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