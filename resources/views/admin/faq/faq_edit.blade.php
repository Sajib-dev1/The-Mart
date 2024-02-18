@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-lg-8 m-auto">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h4>Faq Update</h4>
                <a class="btn btn-primary" href="{{ route('faq.index') }}"><i class="link-icon" data-feather="align-left"></i> FAQ List</a>
            </div>
            <div class="card-body">
                <form action="{{ route('faq.update',$faq_info->id ) }}" method="post">
                    @method('PUT')
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Faq Quation</label>
                        <input type="text" name="faq_quation" class="form-control @error('faq_quation')is-invalid @enderror" value="{{ $faq_info->faq_quation }}">
                        @error('faq_quation')
                            <strong class="text-danger">{{ $message }}</strong>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label">Faq Answew</label>
                        <textarea name="faq_answer" class="form-control @error('faq_answer')is-invalid @enderror" id="" cols="30" rows="7">{{ $faq_info->faq_quation }}</textarea>
                        @error('faq_answer')
                            <strong class="text-danger">{{ $message }}</strong>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Update FAQ</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>    
@endsection
@section('footer_script')
    <script>
        @if(Session::has('update'))
        toastr.options =
        {
            "closeButton" : true,
            "progressBar" : true
        }
            toastr.success("{{ session('update') }}");
        @endif
    </script>
@endsection