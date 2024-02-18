@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-md-8 grid-margin stretch-card m-auto">
        <div class="card">
            <div class="card-body">
                <h6 class="card-title">Trash Category Table</h6>
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
                            @foreach ( $trash_category as $sl=>$category )  
                                <tr>
                                    <th>{{ $sl+1 }}</th>
                                    <td>{{ $category->category_name }}</td>
                                    <td>
                                        <img src="{{ asset('uploads/category') }}/{{ $category->image }}" alt="">
                                    </td>
                                    <td>{{ $category->created_at->diffForhumans() }}</td>
                                    <td>
                                        @can('category_restore')
                                            <a href="{{ route('category.restore',$category->id) }}" class="btn btn-success btn-icon mr-2">
                                                <i data-feather="corner-up-left"></i>
                                            </a>
                                        @endcan
                                        @can('category_delete')
                                            <a href="{{ route('trash.category.delete',$category->id) }}" class="btn btn-danger btn-icon">
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