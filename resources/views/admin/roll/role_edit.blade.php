@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-md-8 m-auto grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Edit Role</h6>
                    <form class="forms-sample" action="{{ route('role.update',$role_info->id) }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputUsername1">Rol Name</label>
                            <input type="text" class="form-control" name="rol_name" id="exampleInputUsername1" placeholder="permission Name" autocomplete="off" value="{{ $role_info->name }}">
                        </div>
                        <div class="form-group">
                            <div class="mb-3">
                                @foreach ( $permissions as $permission )
                                    <div class="form-check form-check-inline">
                                            <input type="checkbox" name="permission[]" class="form-check-input" style="margin-top: -7px;" {{ $role_info->hasPermissionTo($permission->name)?'checked':'' }} id="checkInlineChecked" value="{{ $permission->name }}">
                                        <label class="form-check-label ml-0" for="checkInlineChecked">
                                            {{ $permission->name }}
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary mr-2">Submit</button>
                        <a href="{{ route('dashboard') }}" class="btn btn-light">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection