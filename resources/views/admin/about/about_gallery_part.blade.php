
@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-md-8 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h6 class="card-title">About Service Table</h6>
                <p class="card-description">Add class <code>.table-hover</code></p>
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>SL</th>
                                <th>Image</th>
                                <th>Created at</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ( $about_gallarys as $sl=>$about_gallary ) 
                                <tr>
                                    <td>{{ $sl+1 }}</td>
                                    <td>
                                        <img src="{{ asset('uploads/about') }}/{{ $about_gallary->big_image }}" alt="">
                                    </td>
                                    <td>{{ $about_gallary->created_at->diffForHumans() }}</td>
                                    <td>
                                        <a href="{{ route('about.gallery.delete',$about_gallary->id) }}" class="btn btn-danger btn-icon">
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
                <h6 class="card-title">Add About Gallery</h6>
                <form class="forms-sample" action="{{ route('about.galery.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputUsername1">image</label>
                        <input type="file" class="form-control" name="big_image" id="exampleInputUsername1" autocomplete="off" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">
                        @error('big_image')
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