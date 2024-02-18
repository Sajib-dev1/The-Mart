@extends('layouts.admin')
@section('content')
 <div class="row">
    <div class="col-lg-10 m-auto">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h4>FAQ Quation</h4>
                <a class="btn btn-primary" href="{{ route('faq.create') }}"><i class="link-icon" data-feather="plus"></i> Add FAQ Quetion</a>
            </div>
            <div class="card-body">
                <table class="table table-border">
                    <tr>
                        <th>SL</th>
                        <th>Quation</th>
                        <th>Answer</th>
                        <th>Created At</th>
                        <th>Action</th>
                    </tr>
                    @foreach ( $faq_lists as $sl=>$faq_list ) 
                        <tr>
                            <td>{{ $sl+1 }}</td>
                            <td class="text-wrap">{{ $faq_list->faq_quation }}</td>
                            <td class="text-wrap">{{ $faq_list->faq_answer }}</td>
                            <td>{{ $faq_list->created_at->diffForHumans() }}</td>
                            <td class="d-flex">
                                <a href="{{ route('faq.show',$faq_list->id) }}" class="btn btn-success btn-icon mr-2">
                                    <i data-feather="eye"></i>
                                </a>
                                <a href="{{ route('faq.edit',$faq_list->id) }}" class="btn btn-primary btn-icon mr-2">
                                    <i data-feather="edit"></i>
                                </a>
                                <form action="{{ route('faq.destroy',$faq_list->id) }}" method="post">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="btn btn-danger btn-icon">
                                        <i data-feather="trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</div>   
@endsection
@section('footer_script')
    <script>
        @if(Session::has('delete'))
        toastr.options =
        {
            "closeButton" : true,
            "progressBar" : true
        }
            toastr.success("{{ session('delete') }}");
        @endif
    </script>
@endsection