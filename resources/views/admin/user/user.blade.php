@extends('layouts.admin')
@section('content')
    @can('add_user')
        <div class="row">
            <div class="col-md-8 grid-margin stretch-card m-auto">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">Add New User</h6>
                        <form class="forms-sample" action="{{ route('user.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputUsername1">Name</label>
                                <input type="text" class="form-control" name="name" id="exampleInputUsername1" autocomplete="off" placeholder="Name">
                                @error('name')
                                    <strong class="text-danger">{{ $message }}</strong>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email</label>
                                <input type="email" class="form-control" name="email" id="exampleInputEmail1" placeholder="Email">
                                @error('email')
                                    <strong class="text-danger">{{ $message }}</strong>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Password</label>
                                <input type="password" class="form-control" name="password" id="exampleInputPassword1" autocomplete="off" placeholder="password">
                                @error('password')
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
    @else
    <h3 class="text-warning">You dont have to access this page</h3>
    @endcan 
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
</script>    
@endsection