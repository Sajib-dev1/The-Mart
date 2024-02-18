@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-lg-8 m-auto">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h4>Faq single view</h4>
                <a class="btn btn-primary" href="{{ route('faq.index') }}"><i class="link-icon" data-feather="align-left"></i> Add FAQ Quetion</a>
            </div>
            <div class="card-body">
                <table class="table table-borderd">
                    <tr>
                        <th>Add Quation</th>
                        <td>{{ $faq_info->created_at->format('d-M-Y') }}</td>
                    </tr>
                    <tr>
                        <th>Quation</th>
                        <td>{{ $faq_info->faq_quation }}</td>
                    </tr>
                    <tr>
                        <th>Answer</th>
                        <td>{{ $faq_info->faq_answer }}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>    
@endsection