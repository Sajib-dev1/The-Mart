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
                                <th>name</th>
                                <th>title</th>
                                <th>Image</th>
                                <th>Created_at</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ( $about_services as $sl=>$about_service ) 
                                <tr>
                                    <td>{{ $sl+1 }}</td>
                                    <td>{{ $about_service->name }}</td>
                                    <td>{{ $about_service->title }}</td>
                                    <td>
                                        <img src="{{ asset('uploads/about') }}/{{ $about_service->image }}" alt="">
                                    </td>
                                    <td>{{ $about_service->created_at->diffForHumans() }}</td>
                                    <td>
                                        <a href="{{ route('about.service.delete',$about_service->id) }}" class="btn btn-danger btn-icon">
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
                <h6 class="card-title">Add About service</h6>
                <form class="forms-sample" action="{{ route('about.service.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputUsername1">Service Name</label>
                        <input type="text" class="form-control" name="name" id="exampleInputUsername1" placeholder="Service Name" autocomplete="off">
                        @error('name')
                            <strong class="text-danger">{{ $message }}</strong>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputUsername1">Service Title</label>
                        <input type="text" class="form-control" name="title" id="exampleInputUsername1" placeholder="Service Title" autocomplete="off">
                        @error('title')
                            <strong class="text-danger">{{ $message }}</strong>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputUsername1">image</label>
                        <input type="file" class="form-control" name="image" id="exampleInputUsername1" autocomplete="off" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">
                        @error('image')
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