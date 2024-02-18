@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
              <div class="card-body">
                <div class="container-fluid d-flex justify-content-between">
                  <div class="col-lg-3 pl-0">
                    <a href="#" class="noble-ui-logo d-block mt-3">The<span>Mart</span></a>                 
                    <p class="mt-1 mb-1"><b>Themart Themes</b></p>
                    <p>1205,<br> Dhanmondi,<br>Dhaka.</p>

                    <h5 class="mt-5 mb-2 text-muted">Beling Information :</h5>
                    <div class="div">
                        <p><strong>Name :</strong> {{ $belling_info->first()->fname.' '.$belling_info->first()->lname }}</p>
                        <p><strong>Email :</strong> {{ $belling_info->first()->email }}</p>
                        <p><strong>Phone :</strong> {{ $belling_info->first()->phone }}</p>
                        <p><strong>Address :</strong> {{ $belling_info->first()->address }}</p>
                        <p><strong>Zip :</strong> {{ $belling_info->first()->zip }}</p>
                        <p><strong>City :</strong> {{ $belling_info->first()->rel_to_city->name }}</p>
                        <p><strong>Country :</strong> {{ $belling_info->first()->rel_to_country->name }}</p>
                    </div>
                  </div>
                  <div class="col-lg-3 pr-0">
                    <h4 class="font-weight-medium text-uppercase text-right mt-4 mb-2">invoice</h4>
                    <h6 class="text-right mb-5 pb-4">{{ $order_info->first()->order_id }}</h6>
                    <h5 class="mt-5 mb-2 text-muted">Shipping Information :</h5>
                    <div class="div">
                        <p><strong>Name :</strong> {{ $shipping_info->first()->ship_fname.' '.$shipping_info->first()->ship_lname }}</p>
                        <p><strong>Email :</strong> {{ $shipping_info->first()->ship_email }}</p>
                        <p><strong>Phone :</strong> {{ $shipping_info->first()->ship_phone }}</p>
                        <p><strong>Address :</strong> {{ $shipping_info->first()->ship_address }}</p>
                        <p><strong>Zip :</strong> {{ $shipping_info->first()->ship_zip }}</p>
                        <p><strong>City :</strong> {{ $shipping_info->first()->rel_to_city->name }}</p>
                        <p><strong>Country :</strong> {{ $shipping_info->first()->rel_to_country->name }}</p>
                    </div>
                  </div>
                </div>
                <div class="container-fluid mt-5 d-flex justify-content-center w-100">
                  <div class="table-responsive w-100">
                      <table class="table table-bordered">
                        <thead>
                          <tr>
                              <th>#</th>
                              <th>Product name</th>
                              <th class="text-right">Price</th>
                              <th class="text-right">Quantity</th>
                              <th class="text-right">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                          @php
                            $sub_total = 0;
                          @endphp
                          @foreach ( $order_products as $sl=>$order_product )
                            <tr class="text-right">
                              <td class="text-left">{{ $sl+1 }}</td>
                              <td class="text-left">{{ $order_product->rel_to_product->product_name }}</td>
                              <td>&#2547;{{ $order_product->price }}</td>
                              <td>{{ $order_product->quantity }}</td>
                              <td>&#2547;{{ $order_product->price*$order_product->quantity }}</td>
                            </tr>
                            @php
                              $sub_total += $order_product->price*$order_product->quantity;
                            @endphp
                          @endforeach
                        </tbody>
                      </table>
                    </div>
                </div>
                <div class="container-fluid mt-5 w-100">
                  <div class="row">
                    <div class="col-md-6 ml-auto">
                        <div class="table-responsive">
                          <table class="table">
                              <tbody>
                                <tr>
                                  <td>Sub Total</td>
                                  <td class="text-right">&#2547;{{ $sub_total }}</td>
                                </tr>
                                <tr>
                                  <td>Discount</td>
                                  <td class="text-right">&#2547;{{ $order_info->first()->discount }}</td>
                                </tr>
                                <tr>
                                  <td class="text-bold-800">Delivery Charge</td>
                                  <td class="text-bold-800 text-right"> &#2547;{{ $order_info->first()->delivery }}</td>
                                </tr>
                                <tr>
                                  <td>Total</td>
                                  <td class="text-danger text-right">&#2547;{{ $order_info->first()->total }}</td>
                                </tr>
                              </tbody>
                          </table>
                        </div>
                    </div>
                  </div>
                </div>
                <div class="container-fluid w-100">
                  <a href="#" class="btn btn-primary float-right mt-4 ml-2"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-send mr-3 icon-md"><line x1="22" y1="2" x2="11" y2="13"></line><polygon points="22 2 15 22 11 13 2 9 22 2"></polygon></svg>Send Invoice</a>
                  <a href="#" class="btn btn-outline-primary float-right mt-4"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-printer mr-2 icon-md"><polyline points="6 9 6 2 18 2 18 9"></polyline><path d="M6 18H4a2 2 0 0 1-2-2v-5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-2"></path><rect x="6" y="14" width="12" height="8"></rect></svg>Print</a>
                </div>
              </div>
            </div>
		</div>
    </div>
@endsection