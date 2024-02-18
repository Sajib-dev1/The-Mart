@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-lg-8 m-auto">
        <div class="card">
            <div class="card-header">
                <h4>Customer Faq quation List</h4>
            </div>
            <div class="card-body">
                <table class="table table-borderd">
                    <tr>
                        <th>SL</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Quation</th>
                        <th>Action</th>
                    </tr>
                    @foreach ( $faq_customers as $sl=>$faq_customer )   
                        <tr>
                            <td>{{ $sl+1 }}</td>
                            <td>{{ $faq_customer->name }}</td>
                            <td>{{ $faq_customer->email }}</td>
                            <td>{{ $faq_customer->phone }}</td>
                            <td>{{ $faq_customer->note }}</td>
                            <td>
                                <a href="submit" class="btn btn-danger btn-icon">
                                    <i data-feather="trash"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</div>    
@endsection