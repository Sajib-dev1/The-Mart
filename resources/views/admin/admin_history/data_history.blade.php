@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-md-10 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h6 class="card-title">Data History Info</h6>
                <p class="card-description">Add class <code>.table-hover</code></p>
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>User</th>
                                <th>Model</th>
                                <th>Data</th>
                                <th>Action</th>
                                <th>Created At</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ( $historys as $sl=>$history )  
                                <tr>
                                    <th>{{ $sl+1 }}</th>
                                    <td>{{ $history->rel_to_user->name }}</td>
                                    <td>{{ $history->model }}</td>
                                    <td>{{ $history->data }}</td>
                                    <td>
                                        @if ($history->action == 'Category inserterd')
                                            <div class="badge badge-success">{{ $history->action }}</div>
                                            @elseif ($history->action == 'Category Updated')
                                            <div class="badge badge-info">{{ $history->action }}</div>
                                            @elseif ($history->action == 'Category Soft deleted')
                                            <div class="badge badge-warning">{{ $history->action }}</div>
                                            @elseif ($history->action == 'Category Restore')
                                            <div class="badge badge-primary">{{ $history->action }}</div>
                                            @elseif ($history->action == 'Category permaently deleted')
                                            <div class="badge badge-danger">{{ $history->action }}</div>
                                            @else
                                            <div class="badge badge-secondary">{{ $history->action }}</div>
                                        @endif
                                    </td>
                                    {{-- <td>{{ $history->action }}</td> --}}
                                    <td>{{ $history->created_at->diffForhumans() }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
          </div>
    </div>
</div> 
@endsection