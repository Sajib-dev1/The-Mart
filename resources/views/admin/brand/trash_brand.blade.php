@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-md-8 grid-margin stretch-card m-auto">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <h6 class="card-title">Trash Brand Table</h6>
                    <a href="{{ route('brand.add') }}" class="card-description btn btn-primary text-light"><i class="link-icon" data-feather="plus"></i>Add Brand</a>
                </div>
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Brand Name</th>
                                <th>Brand Image</th>
                                <th>Created At</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ( $trash_brand as $sl=>$brand )  
                                <tr>
                                    <th>{{ $sl+1 }}</th>
                                    <td>{{ $brand->brand_name }}</td>
                                    <td>
                                        <img src="{{ asset('uploads/brand') }}/{{ $brand->image }}" alt="">
                                    </td>
                                    <td>{{ $brand->created_at->diffForhumans() }}</td>
                                    <td>
                                        <a href="{{ route('brand.restore',$brand->id) }}" class="btn btn-success btn-icon mr-2">
                                            <i data-feather="corner-up-left"></i>
                                        </a>
                                        <a href="{{ route('trash.brand.delete',$brand->id) }}" class="btn btn-danger btn-icon">
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
@endsection
@section('footer_script')
<script>
    @if(Session::has('delete'))
    toastr.options =
    {
        "closeButton" : true,
        "progressBar" : true
    }
        toastr.error("{{ session('delete') }}");
    @endif

    @if(Session::has('restore'))
    toastr.options =
    {
        "closeButton" : true,
        "progressBar" : true
    }
        toastr.success("{{ session('restore') }}");
    @endif
</script>     
@endsection