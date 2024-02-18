@extends('layouts.admin')
@section('content')
<div class="page-content mt-0">
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Tables</a></li>
            <li class="breadcrumb-item active" aria-current="page">Category Table</li>
        </ol>
    </nav>
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Category Table</h6>
                    <div class="table-responsive">
                        <table id="dataTableExample" class="table">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Photo</th>
                                    <th>Name</th>
                                    <th>Created At</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ( $categories as $sl=>$category )
                                    <tr>
                                        <td>{{ $sl+1 }}</td>
                                        <td>
                                            <img src="{{ asset('uploads/category') }}/{{ $category->image }}" alt="">
                                        </td>
                                        <td>{{ $category->category_name }}</td>
                                        <td>{{ $category->created_at->diffForHumans() }}</td>
                                        <td class="d-flex">
                                            <a href="{{ route('category.show',$category->id) }}" class="btn btn-success btn-icon mr-2">
                                                <i data-feather="eye"></i>
                                            </a>
                                            <a href="{{ route('category.edit',$category->id) }}" class="btn btn-primary btn-icon mr-2">
                                                <i data-feather="edit"></i>
                                            </a>
                                            <form action="{{ route('category.destroy',$category->id) }}" method="post">
                                                @method('DELETE')
                                                @csrf
                                                <button type="submit" class="btn btn-danger btn-icon">
                                                    <i data-feather="trash"></i>
                                                </button>
                                            </form>
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
</script>     
@endsection