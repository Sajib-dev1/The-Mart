@extends('layouts.admin')
@section('content')
    @can('brand_access')
            <div class="row">
                <div class="col-md-8 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <h6 class="card-title">Brand Table</h6>
                                <a href="{{ route('trash.brand') }}" class="card-description btn btn-primary text-white"><i class="link-icon" data-feather="align-left"></i>Trashed Brand</a>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Brand Name</th>
                                            <th>Brand Logo</th>
                                            <th>Created At</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ( $brands as $sl=>$brand )  
                                            <tr>
                                                <th>{{ $sl+1 }}</th>
                                                <td>{{ $brand->brand_name }}</td>
                                                <td>
                                                    <img src="{{ asset('uploads/brand') }}/{{ $brand->image }}" alt="">
                                                </td>
                                                <td>{{ $brand->created_at->diffForhumans() }}</td>
                                                <td>
                                                    @can('brand_edit')  
                                                        <a href="{{ route('brand.edit',$brand->id) }}" class="btn btn-primary btn-icon mr-2">
                                                            <i data-feather="edit"></i>
                                                        </a>
                                                    @endcan
                                                    @can('brand_softdelete') 
                                                        <a href="{{ route('brand.delete',$brand->id) }}" class="btn btn-danger btn-icon">
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
                            <h6 class="card-title">Add new Brand</h6>
                            <form class="forms-sample" action="{{ route('brand.store') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="exampleInputUsername1">Brand Name</label>
                                    <input type="text" class="form-control" name="brand_name" id="exampleInputUsername1" placeholder="Brand Name" autocomplete="off">
                                    @error('brand_name')
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