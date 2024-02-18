@extends('layouts.admin')
@section('content')
<style>
    .selectize-input {
        border: 1px solid #e8ebf1;
        padding: 8px 8px;
        display: inline-block;
        width: 100%;
        position: relative;
        z-index: 1;
        box-sizing: border-box;
        box-shadow: rgb(187, 220, 230);
        border-radius: 3px;
    }
</style>
    <div class="row">
        <div class="col-md-12 stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Add New Product</h6>
                    <form action="{{ route('product.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="control-label">Category Name</label>
                                    <select name="category_id" class="form-control category" id="">
                                        <option value="">Select Category</option>
                                        @foreach ($categories as $category )
                                            <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                        @endforeach
                                    </select>
                                    @error('category_id')
                                        <strong class="text-danger">Category is required</strong>
                                    @enderror
                                </div>
                            </div><!-- Col -->
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="control-label">Subcategory Name</label>
                                    <select name="subcategory_id" class="form-control subcategory" id="">
                                        <option value="">Select Subcategory</option>
                                        @foreach ($subcategories as $subcategory )
                                            <option value="{{ $subcategory->id }}">{{ $subcategory->subcategory_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div><!-- Col -->
                        </div><!-- Row -->
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label class="control-label">Product Name</label>
                                    <input type="text" name="product_name" class="form-control" placeholder="Product Name">
                                    @error('product_name')
                                        <strong class="text-danger">{{ $message }}</strong>
                                    @enderror
                                </div>
                            </div><!-- Col -->
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label class="control-label">Sub Product Name</label>
                                    <select name="product_sub_id" class="form-control" id="">
                                        <option value="">Select Sub Product</option>
                                        @foreach ( $sub_products as $sub_product )
                                            <option value="{{ $sub_product->id }}">{{ $sub_product->sub_product }}</option>
                                        @endforeach
                                    </select>

                                </div>
                            </div><!-- Col -->
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label class="control-label">Brand Name</label>
                                    <select name="brand_id" class="form-control" id="">
                                        <option value="">Select Brand Name</option>
                                        @foreach ( $brands as $brand )
                                            <option value="{{ $brand->id }}">{{ $brand->brand_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div><!-- Col -->
                        </div><!-- Row -->
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="control-label">Product Price</label>
                                    <input type="number" name="price" class="form-control" placeholder="Price">
                                </div>
                            </div><!-- Col -->
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="control-label">Product Discount(%)</label>
                                    <input type="number" name="discount" class="form-control" autocomplete="off" placeholder="Product Discount %">
                                </div>
                            </div><!-- Col -->
                        </div><!-- Row -->
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label class="control-label">Product Tag</label>
                                    <select name="tags[]" id="input-tags" multiple>
                                        <option value="">Select Tag</option>
                                        @foreach ( $tags as $tag )
                                            <option value="{{ $tag->id }}">{{ $tag->tag }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div><!-- Col -->
                        </div><!-- Row -->
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label class="control-label">Short Description</label>
                                    <textarea name="short_description"  class="form-control" id="summernote" cols="30" rows="10"></textarea>
                                </div>
                            </div><!-- Col -->
                        </div><!-- Row -->
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label class="control-label">Long Description</label>
                                    <textarea name="long_description"  class="form-control" id="summernote1" cols="30" rows="10"></textarea>
                                </div>
                            </div><!-- Col -->
                        </div><!-- Row -->
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label class="control-label">Additional Information</label>
                                    <textarea name="additional_information"  class="form-control" id="summernote2" cols="30" rows="10"></textarea>
                                </div>
                            </div><!-- Col -->
                        </div><!-- Row -->
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="control-label">Preview</label>
                                    <input type="file" name="preview" class="form-control">
                                </div>
                            </div><!-- Col -->
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="control-label">Thumbnail</label>
                                    <input type="file" name="thumbnail[]" class="form-control" autocomplete="off" multiple>
                                </div>
                            </div><!-- Col -->
                        </div><!-- Row -->
                        <button type="submit" class="btn btn-primary submit">Submit form</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('footer_script')
    <script>
        $('.category').change(function (){
            var category_id = $(this).val();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "POST",
                url: '/getsubcategory',
                data: { 'category_id':category_id },
                success: function( data ) {
                    $('.subcategory').html(data);
                }
            });
        })
    </script>
    <script>
        $("#input-tags").selectize({
        delimiter: ",",
        persist: false,
        create: function (input) {
            return {
                value: input,
                text: input,
            };
        },
        });
    </script>
    <script>
    $(document).ready(function() {
        $('#summernote').summernote();
    });
    $(document).ready(function() {
        $('#summernote1').summernote();
    });
    $(document).ready(function() {
        $('#summernote2').summernote();
    });
    </script>

<script>
    @if(Session::has('success'))
    toastr.options =
    {
        "closeButton" : true,
        "progressBar" : true
    }
        toastr.success("{{ session('success') }}");
    @endif
</script>
@endsection