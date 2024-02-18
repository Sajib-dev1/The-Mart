@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4>Product Single view</h4>
            </div>
            <div class="card-body">
                <table class="table table-borderd">
                    <tr>
                        <th>Product Image :</th>
                        <td>
                            <img src="{{ asset('uploads/product/preview') }}/{{ $product_info->preview }}" width="150" alt="">
                        </td>
                    </tr>
                    <tr>
                        <th>Product Status :</th>
                        <td>
                            @if ($product_info->status == 1)
                            <strong class="bg-success p-2 text-white">Active</strong>
                            @else
                            <strong class="bg-danger p-2 text-white">Deactive</strong> 
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>Product Name :</th>
                        <td>{{ $product_info->product_name }}</td>
                    </tr>
                    <tr>
                        <th>Category Name :</th>
                        <td>{{ $product_info->rel_to_cat->category_name }}</td>
                    </tr>
                    <tr>
                        <th>Subcategory Name :</th>
                        <td>{{ $product_info->rel_to_sub->subcategory_name }}</td>
                    </tr>
                    <tr>
                        <th>Brand Name :</th>
                        <td>
                            @if ($product_info->brand_id == null)
                            @else
                            {{ $product_info->rel_to_brand->brand_name }}
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>Product old Price :</th>
                        <td>{{ $product_info->price }}</td>
                    </tr>
                    <tr>
                        <th>Product discount :</th>
                        <td>{{ $product_info->discount }}</td>
                    </tr>
                    <tr>
                        <th>Product Price :</th>
                        <td>{{ $product_info->after_discount }}</td>
                    </tr>
                    <tr>
                        <th>Product Sku :</th>
                        <td>{{ $product_info->sku }}</td>
                    </tr>
                    <tr>
                        <th>Product Tags :</th>
                        <td></td>
                    </tr>
                    <tr>
                        <th>Product Short Description :</th>
                        <td>{{ $product_info->short_description }}</td>
                    </tr>
                    <tr>
                        <th>Product Long Description :</th>
                        <td>{!!  $product_info->long_description  !!}</td>
                    </tr>
                    <tr>
                        <th>Product Additional Information :</th>
                        <td>{!!  $product_info->additional_information  !!}</td>
                    </tr>
                    <tr>
                        <th>Product Galery :</th>
                        <td>
                            @foreach ( $thumbnails as $thumbnail )
                            <img src="{{ asset('uploads/product/thumbnail') }}/{{ $thumbnail->thumbnail }}" width="200" alt="">
                            @endforeach
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>   
@endsection