@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <h4 class="mb-3 mb-md-0">Welcome to dashboard <strong class="text-primary">-{{ Auth::user()->name }}</strong></h4> 
    </div>
</div> 
<div class="row mt-5">
    <div class="col-12 col-xl-12 stretch-card">
      <div class="row flex-grow">
        <div class="col-md-4 grid-margin stretch-card">
          <div class="card bg-primary p-4">
            <div class="card-body">
                <div class="mt-4">
                    <h4 class="text-center text-light">TOTAL USERS</h4>
                    <h4 class="text-center text-light mt-3">{{ $users->count() }}</h4>
                </div>
            </div>
          </div>
        </div>
        <div class="col-md-4 grid-margin stretch-card">
          <div class="card bg-success p-4">
            <div class="card-body">
                <div class="mt-4">
                    <h4 class="text-center text-light">TOTAL Customers</h4>
                    <h4 class="text-center text-light mt-3">{{ $customers->count() }}</h4>
                </div>
            </div>
          </div>
        </div>
        <div class="col-md-4 grid-margin stretch-card">
          <div class="card bg-warning p-4">
            <div class="card-body">
                <div class="mt-4">
                    <h4 class="text-center text-light">TOTAL Orders</h4>
                    <h4 class="text-center text-light mt-3">{{ $orders->count() }}</h4>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>  
@endsection
