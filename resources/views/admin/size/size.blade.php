@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-md-8 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h6 class="card-title">Size Table</h6>
                <p class="card-description">Add class <code>.table-hover</code></p>
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Size Name</th>
                                <th>Created At</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ( $sizes as $sl=>$size )  
                                <tr>
                                    <th>{{ $sl+1 }}</th>
                                    <td>{{ $size->size_name }}</td>
                                    <td>{{ $size->created_at->diffForhumans() }}</td>
                                    <td>
                                        <a href="{{ route('size.edit',$size->id) }}" class="btn btn-primary btn-icon mr-2">
                                            <i data-feather="edit"></i>
                                        </a>
                                        <a href="{{ route('size.delete',$size->id) }}" class="btn btn-danger btn-icon">
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
    <div class="col-md-4 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h6 class="card-title">Add new Size</h6>
                <form class="forms-sample" action="{{ route('size.store') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputUsername1">Size Name</label>
                        <input type="text" class="form-control" name="size_name" id="exampleInputUsername1" placeholder="Size Name" autocomplete="off">
                        @error('size_name')
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