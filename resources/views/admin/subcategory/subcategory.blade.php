@extends('layouts.admin')
@section('content')
    @can('subcategory_access')
        <div class="row">
            <div class="col-md-8 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">Subcategory Table</h6>
                        <p class="card-description">Add class <code>.table-hover</code></p>
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Category Name</th>
                                        <th>Subcategory Name</th>
                                        <th>Created At</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ( $subcategories as $sl=>$subcategory )  
                                        <tr>
                                            <th>{{ $sl+1 }}</th>
                                            <td>{{ $subcategory->rel_to_cat->category_name }}</td>
                                            <td>{{ $subcategory->subcategory_name }}</td>
                                            <td>{{ $subcategory->created_at->diffForhumans() }}</td>
                                            <td>
                                                @can('subcategory_edit')  
                                                    <a href="{{ route('subcategory.edit',$subcategory->id) }}" class="btn btn-primary btn-icon mr-2">
                                                        <i data-feather="edit"></i>
                                                    </a>
                                                @endcan
                                                @can('subcategory_softdelete')  
                                                    <a href="{{ route('subcategory.delete',$subcategory->id) }}" class="btn btn-danger btn-icon">
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
                        <h6 class="card-title">Add new subcategory</h6>
                        <form class="forms-sample" action="{{ route('subcategory.store') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputUsername1">Category Name</label>
                                <select name="category_id" class="form-control" id="">
                                    <option value="">Select Category</option>
                                    @foreach ( $categories as $category )
                                        <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputUsername1">Subcategory Name</label>
                                <input type="text" class="form-control" name="subcategory_name" id="exampleInputUsername1" placeholder="Subcategory Name" autocomplete="off">
                                @error('subcategory_name')
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