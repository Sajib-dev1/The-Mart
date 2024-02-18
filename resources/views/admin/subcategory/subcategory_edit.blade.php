@extends('layouts.admin')
@section('content')
@can('subcategory_edit')
    <div class="row">
        <div class="col-md-8 grid-margin stretch-card m-auto">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Edit Subcategory</h6>
                    <form class="forms-sample" action="{{ route('subcategory.update',$subcategory_info->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputUsername1">Category Name</label>
                            <select name="category_id" class="form-control" id="">
                                <option value="">Select Category</option>
                                @foreach ( $categories as $category )
                                    <option value="{{ $category->id }}" {{ $subcategory_info->category_id == $category->id ?'selected':'' }}>{{ $category->category_name }}</option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <strong class="text-danger">{{ $message }}</strong>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputUsername1">Subcategory Name</label>
                            <input type="text" class="form-control" name="subcategory_name" id="exampleInputUsername1" autocomplete="off" placeholder="Category Name" value="{{ $subcategory_info->subcategory_name }}">
                            @error('subcategory_name')
                                <strong class="text-danger">{{ $message }}</strong>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary mr-2">Submit</button>
                        <a href="{{ route('subcategory.add') }}" class="btn btn-light"><i class="link-icon" data-feather="chevrons-right"></i></a>
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
</script>     
@endsection