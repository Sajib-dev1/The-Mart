@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-md-8 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h6 class="card-title">Color Table</h6>
                <p class="card-description">Add class <code>.table-hover</code></p>
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Color Name</th>
                                <th>Color Code</th>
                                <th>Created At</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ( $colors as $sl=>$color )  
                                <tr>
                                    <th>{{ $sl+1 }}</th>
                                    <td>{{ $color->color_name }}</td>
                                    <td>
                                        @if ($color->color_code == '')
                                            <span>NA</span>
                                        @else
                                        <div class="badge p-2 text-light" style="background: {{ $color->color_code }}">{{ $color->color_name }}</div>
                                        @endif
                                    </td>
                                    <td>{{ $color->created_at->diffForhumans() }}</td>
                                    <td>
                                        <a href="{{ route('color.edit',$color->id) }}" class="btn btn-primary btn-icon mr-2">
                                            <i data-feather="edit"></i>
                                        </a>
                                        <a href="{{ route('color.delete',$color->id) }}" class="btn btn-danger btn-icon">
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
                <h6 class="card-title">Add new Color</h6>
                <form class="forms-sample" action="{{ route('color.store') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputUsername1">Color Name</label>
                        <input type="text" class="form-control" name="color_name" id="exampleInputUsername1" placeholder="Color Name" autocomplete="off">
                        @error('color_name')
                            <strong class="text-danger">{{ $message }}</strong>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputUsername1">Color Code</label>
                        <input type="text" class="form-control" name="color_code" id="exampleInputUsername1" placeholder="Color Code" autocomplete="off">
                        @error('color_code')
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