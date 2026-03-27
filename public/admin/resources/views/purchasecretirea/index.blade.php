
@extends('layouts.app')

@section('title', 'Edit Customer')

@section('content')

<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Purchase Criteria</h1>
    </div>
   {{-- Alert Messages --}}
    @include('common.alert')
   
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
         
        <form method="POST" action="{{ route('purchasecretirea.updatePurchaseCriteria') }}">
            @csrf
             
            
            
            <div class="card-body">
                <div class="form-group row pur_titaalss">
                    <div class="col-sm-12 mb-3 mt-0 mb-sm-0">
					 <h5 class="mb-0"><strong>Purchase Price</strong></h5>
					</div>				
					<div class="col-sm-6 mb-3 mt-3 mb-sm-0">
					 <span style="color: red;">*</span>Content  
					 <input type="text" id="" placeholder="" name="purchase_price_content" value="{{ old('purchase_price_content') ? old('purchase_price_content') : @$data->purchase_price_content }}" class="form-control form-control-user" required="required" />
					</div>
					
					<div class="col-sm-6 mb-3 mt-3 mb-sm-0">
					 <span style="color: red;">*</span>Video Link
					 <input type="text" id="" placeholder="" name="purchase_price_link" value="{{ old('purchase_price_link') ? old('purchase_price_link') : @$data->purchase_price_content }}" class="form-control form-control-user" required="required" />
					</div>
				</div>
				
				
				<div class="form-group row pur_titaalss">
                    <div class="col-sm-12 mb-3 mt-0 mb-sm-0">
					 <h5 class="mb-0"><strong>Total Cash Needed</strong></h5>
					</div>				
					<div class="col-sm-6 mb-3 mt-3 mb-sm-0">
					 <span style="color: red;">*</span>Content  
					 <input type="text" id="" placeholder="" name="total_cash_needed_content" value="{{ old('total_cash_needed_content') ? old('total_cash_needed_content') : @$data->total_cash_needed_content }}" class="form-control form-control-user" required="required" />
					</div>
					
					<div class="col-sm-6 mb-3 mt-3 mb-sm-0">
					 <span style="color: red;">*</span>Video Link
					 <input type="text" id="" placeholder="" name="total_cash_needed_link" value="{{ old('total_cash_needed_link') ? old('total_cash_needed_link') : @$data->total_cash_needed_link }}" class="form-control form-control-user" required="required" />
					</div>
				</div>
            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-success btn-user float-right mb-3">Update</button>
                <a class="btn btn-primary float-right mr-3 mb-3" href="javascript:void(0);">Cancel</a>
            </div>
        </form>
    </div>

</div>



@endsection