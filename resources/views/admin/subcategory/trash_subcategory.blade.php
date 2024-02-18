@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-md-8 grid-margin stretch-card m-auto">
        <div class="card">
            <div class="card-body">
                <h6 class="card-title">Trash Subcategory Table</h6>
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
                            @foreach ( $trush_subcategory as $sl=>$subcategory )  
                                <tr>
                                    <th>{{ $sl+1 }}</th>
                                    <td>{{ $subcategory->rel_to_cat->category_name }}</td>
                                    <td>{{ $subcategory->subcategory_name }}</td>
                                    <td>{{ $subcategory->created_at->diffForhumans() }}</td>
                                    <td>
                                        <a href="{{ route('subcategory.restore',$subcategory->id) }}" class="btn btn-success btn-icon mr-2">
                                            <i data-feather="corner-up-left"></i>
                                        </a>
                                        @can('subcategory_delete')  
                                            <a href="{{ route('trash.subcategory.delete',$subcategory->id) }}" class="btn btn-danger btn-icon">
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