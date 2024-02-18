@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-md-8 grid-margin stretch-card m-auto">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Edit Color</h6>
                    <form class="forms-sample" action="{{ route('color.update',$color_info->id) }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputUsername1">Color Name</label>
                            <input type="text" class="form-control" name="color_name" id="exampleInputUsername1" placeholder="Color Name" autocomplete="off" value="{{ $color_info->color_name }}">
                            @error('color_name')
                                <strong class="text-danger">{{ $message }}</strong>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputUsername1">Color Code</label>
                            <input type="text" class="form-control" name="color_code" id="exampleInputUsername1" placeholder="Color Code" autocomplete="off" value="{{ $color_info->color_code }}">
                            @error('color_code')
                                <strong class="text-danger">{{ $message }}</strong>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary mr-2">Submit</button>
                        <a href="{{ route('color') }}" class="btn btn-light"><i class="link-icon" data-feather="chevrons-right"></i></a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('footer_script')
<script>
    @if(Session::has('update'))
    toastr.options =
    {
        "closeButton" : true,
        "progressBar" : true
    }
        toastr.success("{{ session('update') }}");
    @endif
</script>    
@endsection