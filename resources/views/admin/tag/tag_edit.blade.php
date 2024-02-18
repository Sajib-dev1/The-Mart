@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-md-4 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Edit Tag</h6>
                    <form class="forms-sample" action="{{ route('tag.update',$tag_info->id) }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputUsername1">Tag Name</label>
                            <input type="text" class="form-control" name="tag" id="exampleInputUsername1" placeholder="Tag Name" autocomplete="off" value="{{ $tag_info->tag }}">
                            @error('tag')
                                <strong class="text-danger">{{ $message }}</strong>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary mr-2">Submit</button>
                        <a href="{{ route('tag') }}" class="btn btn-light"><i class="link-icon" data-feather="chevrons-right"></i></a>
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