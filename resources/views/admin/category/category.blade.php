@extends('layouts.admin')
@section('content')
@can('category_access')
    <div class="row">
        <div class="col-md-8 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Category Table</h6>
                    <p class="card-description">Add class <code>.table-hover</code></p>
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Category Name</th>
                                    <th>Category Image</th>
                                    <th>Created At</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ( $categories as $sl=>$category )  
                                    <tr>
                                        <th>{{ $sl+1 }}</th>
                                        <td>{{ $category->category_name }}</td>
                                        <td>
                                            <img src="{{ asset('uploads/category') }}/{{ $category->image }}" alt="">
                                        </td>
                                        <td>{{ $category->created_at->diffForhumans() }}</td>
                                        <td>
                                            @can('category_edit') 
                                            <a href="{{ route('category.edit',$category->id) }}" class="btn btn-primary btn-icon mr-2">
                                                <i data-feather="edit"></i>
                                            </a>
                                            @endcan
                                            @can('category_softdelete')  
                                            <a href="{{ route('category.delete',$category->id) }}" class="btn btn-danger btn-icon">
                                                <i data-feather="trash"></i>
                                            </a>
                                            @endcan
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
                    <h6 class="card-title">Add new category</h6>
                    <form class="forms-sample" action="{{ route('category.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputUsername1">Category Name</label>
                            <input type="text" class="form-control" name="category_name" id="exampleInputUsername1" placeholder="Category Name" autocomplete="off">
                            @error('category_name')
                                <strong class="text-danger">{{ $message }}</strong>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputUsername1">Image</label>
                            <input type="file" class="form-control" name="image" id="exampleInputUsername1" placeholder="Image" autocomplete="off"  onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">
                            @error('image')
                                <strong class="text-danger">{{ $message }}</strong>
                            @enderror
                        </div>
                        <div class="form-group">
                            <img src="" width="150" id="blah" alt="">
                        </div>
                        <button type="submit" class="btn btn-primary mr-2">Submit</button>
                        <a href="{{ route('dashboard') }}" class="btn btn-light">Cancel</a>
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