
@extends('layouts.app')

@section('title', 'Edit Customer')

@section('content')

<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Add Product Services</h1>
        <a href="{{ route('productservices.productsslist') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-arrow-left fa-sm text-white-50"></i> Back</a>
    </div>

   {{-- Alert Messages --}}
    @include('common.alert')
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        
        <form method="POST" action="{{ route('productservices.store') }}">
        @csrf
            <div class="card-body">
                <div class="form-group row">
					<div class="col-sm-6 mb-3 mt-3 mb-sm-0">
					 <span style="color: red;">*</span>Product 
					 <input type="text" id="" placeholder="" name="prod_name" value="{{ old('prod_name')}}" required  class="form-control form-control-user" />
					</div>
					
					<div class="col-sm-6 mb-3 mt-3 mb-sm-0">
					 <span style="color: red;">*</span>Catagory 
					 
					 	<select name="prod_category" required class="form-control form-control-user">
							<option value="">Select Catagory</option> 
							@foreach($productcategory as $list)
							<option value="{{ $list->id }}" >{{ $list->name }}</option>
							@endforeach
						</select>
				 
					</div>
					
					<div class="col-sm-6 mb-3 mt-3 mb-sm-0">
					 <span style="color: red;">*</span>MRP
					 <input type="text" id="" placeholder="" name="prod_price" value="{{ old('prod_price')}}" required class="form-control form-control-user" />
					</div>
					
					<div class="col-sm-6 mb-3 mt-3 mb-sm-0">
					 <span style="color: red;">*</span>RATE 
					 <input type="text" id="" placeholder="" name="prod_rate" value="{{ old('prod_rate')}}" required class="form-control form-control-user" />
					</div>
					
				 <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                     <span style="color: red;">*</span>Discount Percent
                     <input type="text" id="" placeholder="" name="discount_percent" value="{{ old('discount_percent')}}" class="form-control form-control-user" />
                    </div>
                   
                    <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                     <span style="color: red;">*</span>Expiry Date
                     <input type="date" id="" placeholder="" name="expiry_date" value="{{ old('expiry_date')}}" class="form-control form-control-user" />
                    </div>
					
					<div class="col-sm-6 mb-3 mt-3 mb-sm-0">
						<span style="color: red;">&nbsp;</span>Status
						<select name="status" required class="form-control form-control-user">
							<option>Select Status</option>
							<option value="0" selected="selected" >Inactive</option>
							<option value="1" >Active</option>>
						</select>
					</div>
				</div>
            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-success btn-user float-right mb-3">Save</button>
                <a class="btn btn-primary float-right mr-3 mb-3" href="{{ route('productservices.productsslist') }}">Cancel</a>
            </div>
        </form>
    </div>

</div>


@endsection