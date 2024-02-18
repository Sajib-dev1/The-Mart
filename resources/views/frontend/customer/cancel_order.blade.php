@extends('frontend.master')
@section('title')
    Cancel Order
@endsection
@section('content')
<section class="wpo-page-title">
    <h2 class="d-none">Hide</h2>
    <div class="container">
        <div class="row">
            <div class="col col-xs-12">
                <div class="wpo-breadcumb-wrap">
                    <ol class="wpo-breadcumb-wrap">
                        {{-- @include('breadcomponet'); --}}
                    </ol>
                </div>
            </div>
        </div> <!-- end row -->
    </div> <!-- end container -->
</section>
<div class="container">
    <div class="row my-5">
        <div class="col-lg-9">
            <div class="card">
                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif
                <div class="card-header p-2 customer">
                    <h3>Cancel order request</h3>
                    <p><strong>Order ID :</strong> {{ $order_info->order_id }}</p>
                </div>
                <div class="card-body">
                    <form action="{{ route('cancel.order.store') }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <input type="hidden" name="order_id" value="{{ $order_info->order_id }}">
                            <label for="" class="form-label">resion</label>
                            <textarea name="resion" class="form-control" id="" cols="30" rows="5"></textarea>
                            @error('resion')
                                <strong class="text-danger">{{ $message }}</strong>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>  
@endsection