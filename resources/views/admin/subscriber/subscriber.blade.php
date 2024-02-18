@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-md-8 grid-margin stretch-card m-auto">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Subscriber Table</h6>
                    <p class="card-description">Add class <code>.table-hover</code></p>
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Email</th>
                                    <th>Created At</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ( $subscribers as $sl=>$subscriber )  
                                    <tr>
                                        <th>{{ $sl+1 }}</th>
                                        <td>{{ $subscriber->subscriber }}</td>
                                        <td>{{ $subscriber->created_at->diffForhumans() }}</td>
                                        <td>
                                            <a href="" class="btn btn-success">Send Offer</a>
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
@endsection