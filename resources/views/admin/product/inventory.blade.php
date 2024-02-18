@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header">
                <h5>Inventory table</h5>
            </div>
            <div class="card-body">
                <table class="table table-borderd">
                    <thead>
                        <tr>
                            <th>SL</th>
                            <th>Color name</th>
                            <th>Size name</th>
                            <th>Quantity</th>
                            <th>Created At</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ( $inventories as $sl=>$inventory )  
                            <tr>
                                <td>{{ $sl+1 }}</td>
                                <td>{{ $inventory->rel_to_color->color_name }}</td>
                                <td>{{ $inventory->rel_to_size->size_name }}</td>
                                <td>{{ $inventory->quantity }}</td>
                                <td>{{ $inventory->created_at->diffForhumans() }}</td>
                                <td>
                                    <a href="{{ route('inventory.delete',$inventory->id) }}" class="btn btn-danger btn-icon">
                                        <i data-feather="trash"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="card">
            <div class="card-header">
                <h4>Add Inventory for,</h4>
                <input type="text" class="w-100" disabled value="{{ $product_info->product_name }}">
            </div>
            <div class="card-body">
                <form action="{{ route('inventory.store',$product_info->id) }}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="" class="form-label">Coloer Name</label>
                        <select name="color_id" class="form-control @error('color_id')is-invalid @enderror" id="">
                            <option value="">Select Color</option>
                            @foreach ( $colors as $color ) 
                                <option value="{{ $color->id }}">{{ $color->color_name }}</option>
                            @endforeach
                        </select>
                        @error('color_id')
                            <strong class="text-danger">{{ $message }}</strong>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Size Name</label>
                        <select name="size_id" class="form-control @error('size_id')is-invalid @enderror" id="">
                            <option value="">Select size</option>
                            @foreach ( $sizes as $size ) 
                                <option value="{{ $size->id }}">{{ $size->size_name }}</option>
                            @endforeach
                        </select>
                        @error('size_id')
                            <strong class="text-danger">{{ $message }}</strong>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label">Quantity</label>
                        <input type="number" name="quantity" class="form-control @error('quantity')is-invalid @enderror">
                        @error('quantity')
                            <strong class="text-danger">{{ $message }}</strong>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Add Inventory</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>    
@endsection
@section('footer_script')
    <script>
        @if(Session::has('increment'))
        toastr.options =
        {
            "closeButton" : true,
            "progressBar" : true
        }
            toastr.success("{{ session('increment') }}");
        @endif

        @if(Session::has('success'))
        toastr.options =
        {
            "closeButton" : true,
            "progressBar" : true
        }
            toastr.success("{{ session('success') }}");
        @endif

        @if(Session::has('delete'))
        toastr.options =
        {
            "closeButton" : true,
            "progressBar" : true
        }
            toastr.error("{{ session('delete') }}");
        @endif
    </script>
@endsection