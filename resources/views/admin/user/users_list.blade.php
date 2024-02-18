@extends('layouts.admin')
@section('content')
    @can('user_access')
        <div class="page-content mt-0">
            <nav class="page-breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Tables</a></li>
                    <li class="breadcrumb-item active" aria-current="page">User Table</li>
                </ol>
            </nav>
            <div class="row">
                <div class="col-md-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h6 class="card-title">User Table</h6>
                            <div class="table-responsive">
                                <table id="dataTableExample" class="table">
                                    <thead>
                                        <tr>
                                            <th>SL</th>
                                            <th>Photo</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>Created At</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ( $users as $sl=>$user )
                                            <tr>
                                                <td>{{ $sl+1 }}</td>
                                                <td>
                                                    @if ($user->photo == null)
                                                    <img src="{{ Avatar::create( $user->name )->toBase64() }}" />
                                                    {{-- <div class="rounded-circle bg-success text-center text-light" style="width: 40px; height:40px; line-height:40px; font-size:20px;">{{ Str::substr($user->name,0,2) }}</div> --}}
                                                    @else 
                                                        <img src="{{ asset('uploads/user') }}/{{ $user->photo }}" alt=""> 
                                                    @endif
                                                </td>
                                                <td>{{ $user->name }}</td>
                                                <td>{{ $user->email }}</td>
                                                <td>{{ $user->phone }}</td>
                                                <td>{{ $user->created_at->diffForHumans() }}</td>
                                                <td>
                                                    @can('user_delete')
                                                        
                                                    <a href="{{ route('user.delete',$user->id) }}" class="btn btn-danger btn-icon">
                                                        <i data-feather="trash"></i>
                                                    </a>
                                                    @endcan
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @else
        <h3 class="text-warning">You dont have to access this page</h3>
    @endcan   
@endsection