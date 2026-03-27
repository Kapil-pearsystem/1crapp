
@extends('layouts.app')

@section('title', 'Edit Customer')

@section('content')

<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Product Services</h1>
        <a href="{{ route('productservices.productsslist') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-arrow-left fa-sm text-white-50"></i> Back</a>
    </div>

   {{-- Alert Messages --}}
    @include('common.alert')
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        
        <form method="POST" action="{{ route('productservices.update',['product'=>$product->id]) }}">
             @csrf
            @method('PUT') 
            <div class="card-body">
                <div class="form-group row">
					<div class="col-sm-6 mb-3 mt-3 mb-sm-0">
					 <span style="color: red;">*</span>Product 
					 <input type="text" id="" placeholder="" name="prod_name" required value="{{ $product->prod_name }}" class="form-control form-control-user" />
					</div>
					
					<div class="col-sm-6 mb-3 mt-3 mb-sm-0">
					 <span style="color: red;">*</span>Catagory  
					 	<select name="prod_category" required class="form-control form-control-user">
							<option value="">Select Catagory</option> 
							@foreach($productcategory as $list)
							<option @if( $product->prod_category ==$list->id ) selected="selected" @endif value="{{ $list->id }}" >{{ $list->name }}</option>
							@endforeach
						</select>
						
					</div>
					
					<div class="col-sm-6 mb-3 mt-3 mb-sm-0">
					 <span style="color: red;">*</span>MRP
					 <input type="text" id="" placeholder="" name="prod_price" required value="{{ $product->prod_price }}" class="form-control form-control-user" />
					</div>
					
					<div class="col-sm-6 mb-3 mt-3 mb-sm-0">
					 <span style="color: red;">*</span>RATE 
					 <input type="text" id="" placeholder="" name="prod_rate" required value="{{ $product->prod_rate }}" class="form-control form-control-user" />
					</div>
					<div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                     <span style="color: red;">*</span>Discount Percent
                     <input type="text" id="" placeholder="" name="discount_percent" value="{{ $product->discount_percent }}" class="form-control form-control-user" />
                    </div>
                   
                    <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                     <span style="color: red;">*</span>Expiry Date
                     <input type="date" id="" placeholder="" name="expiry_date" value="{{ $product->expiry_date }}" class="form-control form-control-user" />
                    </div>
					 
					<div class="col-sm-6 mb-3 mt-3 mb-sm-0">
						<span style="color: red;">&nbsp;</span>Status
						<select name="status" required class="form-control form-control-user">
							<option>Select Status</option>
							<option value="1" @if( $product->status ==1 ) selected="selected" @endif>Active</option>
							<option value="0" @if( $product->status ==0 ) selected="selected" @endif>Inactive</option>
						</select>
					</div>
				</div>
            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-success btn-user float-right mb-3">Update</button>
                <a class="btn btn-primary float-right mr-3 mb-3" href="{{ route('productservices.productsslist') }}">Cancel</a>
            </div>
        </form>
    </div>

</div>


@endsection