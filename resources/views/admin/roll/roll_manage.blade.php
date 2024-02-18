@extends('layouts.admin')
@section('content')
    <div class="row">
        {{-- <div class="col-md-4 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Add New Permition</h6>
                    <form class="forms-sample" action="{{ route('permition.store') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputUsername1">Permition Name</label>
                            <input type="text" class="form-control" name="permition_name" id="exampleInputUsername1" placeholder="Permition Name" autocomplete="off">
                        </div>
                        <button type="submit" class="btn btn-primary mr-2">Submit</button>
                        <a href="{{ route('dashboard') }}" class="btn btn-light">Cancel</a>
                    </form>
                </div>
            </div>
        </div> --}}


        <div class="col-md-8 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Assine Role Table</h6>
                    <p class="card-description">Add class <code>.table-hover</code></p>
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>User</th>
                                    <th>Role</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ( $users as $sl=>$user )  
                                    <tr>
                                        <th>{{ $sl+1 }}</th>
                                        <td>{{ $user->name }}</td>
                                        <td class="text-wrap">
                                            @forelse ( $user->getRoleNames() as $role )
                                                <div class="badge badge-primary mt-2">{{ $role }}</div>
                                            @empty
                                                <div class="badge badge-light mt-2">Not assigned</div>
                                            @endforelse
                                        </td>
                                        <td>
                                            <a href="{{ route('role.remove',$user->id) }}" class="btn btn-danger btn-icon">
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
                    <h6 class="card-title">Asign Role</h6>
                    <form class="forms-sample" action="{{ route('assain.role') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputUsername1">User Name</label>
                            <select name="user_id"  class="form-control" id="exampleInputUsername1" autocomplete="off">
                                <option value=""disabled selected>Select User</option>
                                @foreach ( $users as $user )
                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputUsername1">Role Name</label>
                            <select name="role"  class="form-control" id="exampleInputUsername1" autocomplete="off">
                                <option value="" disabled selected>Select Role</option>
                                @foreach ( $roles as $role )
                                    <option value="{{ $role->name }}">{{ $role->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary mr-2">Submit</button>
                        <a href="{{ route('dashboard') }}" class="btn btn-light">Cancel</a>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-8 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Role Table</h6>
                    <p class="card-description">Add class <code>.table-hover</code></p>
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Role</th>
                                    <th>Permission</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ( $roles as $sl=>$role )  
                                    <tr>
                                        <th>{{ $sl+1 }}</th>
                                        <td>{{ $role->name }}</td>
                                        <td class="text-wrap">
                                            @foreach ( $role->getPermissionNames() as $permission )
                                                <div class="badge badge-primary mt-2">{{ $permission }}</div>
                                            @endforeach
                                        </td>
                                        <td>
                                            <a href="{{ route('role.edit',$role->id) }}" class="btn btn-primary btn-icon mr-2">
                                                <i data-feather="edit"></i>
                                            </a>
                                            <a href="{{ route('role.delete',$role->id) }}" class="btn btn-danger btn-icon">
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
                    <h6 class="card-title">Add New Role</h6>
                    <form class="forms-sample" action="{{ route('rol.store') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputUsername1">Rol Name</label>
                            <input type="text" class="form-control" name="rol_name" id="exampleInputUsername1" placeholder="permission Name" autocomplete="off">
                        </div>
                        <div class="form-group">
                            <div class="mb-3">
                                @foreach ( $permissions as $permission )
                                    <div class="form-check form-check-inline">
                                            <input type="checkbox" name="permission[]" class="form-check-input" style="margin-top: -7px;" id="checkInlineChecked" value="{{ $permission->name }}">
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