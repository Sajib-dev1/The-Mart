@extends('layouts.admin')
@section('content')
    <div class="row">
        <nav class="page-breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">User</a></li>
                <li class="breadcrumb-item active" aria-current="page">User Profile</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-md-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Profie Photo</h6>
                    <form class="forms-sample" action="{{ route('profile.photo.update') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputUsername1">Photo</label>
                            <input type="file" class="form-control" name="photo" id="exampleInputUsername1" autocomplete="off"  onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">
                            @error('photo')
                                <strong class="text-danger">{{ $message }}</strong>
                            @enderror
                        </div>
                        <div class="form-group">
                            <img src="{{ asset('uploads/user') }}/{{ Auth::user()->photo }}" width="150" id="blah" alt="">
                        </div>
                        <button type="submit" class="btn btn-primary mr-2">Submit</button>
                        <a href="{{ route('dashboard') }}" class="btn btn-light">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Profie Information</h6>
                    <form class="forms-sample" action="{{ route('profile.information') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputUsername1">Name</label>
                            <input type="text" class="form-control" name="name" id="exampleInputUsername1" autocomplete="off" placeholder="Name" value="{{ Auth::user()->name }}">
                            @error('name')
                                <strong class="text-danger">{{ $message }}</strong>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email address</label>
                            <input type="email" class="form-control" name="email" id="exampleInputEmail1" placeholder="Email" value="{{ Auth::user()->email }}">
                            @error('email')
                                <strong class="text-danger">{{ $message }}</strong>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Phone</label>
                            <input type="phone" class="form-control" name="phone" id="exampleInputPassword1" autocomplete="off" placeholder="phone" value="{{ Auth::user()->phone }}">
                            @error('phone')
                                <strong class="text-danger">{{ $message }}</strong>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary mr-2">Submit</button>
                        <a href="{{ route('dashboard') }}" class="btn btn-light">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Password Update</h6>
                    <form class="forms-sample" action="{{ route('profile.password') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputUsername1">Old Password</label>
                            <input type="password" class="form-control" name="current_password" id="exampleInputUsername1" autocomplete="off" placeholder="password">
                            @error('name')
                                <strong class="text-danger">{{ $message }}</strong>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">New Password</label>
                            <input type="password" class="form-control" name="password" id="exampleInputEmail1" placeholder="New password">
                            @error('email')
                                <strong class="text-danger">{{ $message }}</strong>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Confirm Password</label>
                            <input type="password" class="form-control" name="password_confirmation" id="exampleInputPassword1" autocomplete="off" placeholder="Confirm password">
                            @error('phone')
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
    @if(Session::has('updated'))
    toastr.options =
    {
        "closeButton" : true,
        "progressBar" : true
    }
        toastr.success("{{ session('updated') }}");
    @endif
</script>
@endsection