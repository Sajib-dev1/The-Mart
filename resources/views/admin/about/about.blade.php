@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-md-6 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h6 class="card-title">Update About Information</h6>
                <form class="forms-sample" action="{{ route('aboutban.update',$about_ban->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputUsername1">Title</label>
                        <input type="text" class="form-control" name="title" id="exampleInputUsername1" placeholder="Title" autocomplete="off" value="{{ $about_ban->title }}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputUsername1">Description</label>
                        <textarea name="description" id="" class="form-control" cols="30" rows="7">{{ $about_ban->description }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputUsername1">Image</label>
                        <input type="file" class="form-control" name="image" id="exampleInputUsername1" autocomplete="off" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">
                    </div>
                    <div class="form-group">
                        <img src="{{ asset('uploads/about') }}/{{ $about_ban->image }}" width="150" id="blah" alt="">
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