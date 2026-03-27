
@extends('layouts.app')

@section('title', 'Edit Customer')

@section('content')

<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Add Trigger & Notification</h1>
        <a href="{{ route('triggernotification.triggernotificationlist') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-arrow-left fa-sm text-white-50"></i> Back</a>
    </div>

      {{-- Alert Messages --}}
    @include('common.alert')
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
         
        <form method="POST" action="{{ route('triggernotification.store') }}">
            @csrf
            <div class="card-body">
                <div class="form-group row">
				    <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
						<span style="color: red;">&nbsp;</span>Catagory
						<select name="type" id="select_box" required class="form-control form-control-user">
							<option value="">Select Catagory</option>
							<option value="trigger">Trigger</option>
							<option value="notification">Notification</option>
						</select>
					</div>
				 
					 <input type="hidden" id="" placeholder="" required name="trigger_if" value="if" class="form-control form-control-user" />
				 
					<div class="col-sm-6 mb-3 mt-3 mb-sm-0">
						<span style="color: red;">&nbsp;</span>If Condition
						<select name="trigger_roe" id="select_box" required class="form-control form-control-user">
							<option value="">Select Roe</option>
							<option value="roi">RoI</option>
							<option value="property_update">Property Update</option>
							<option value="return_ratios">Return & Ratios</option>
							<option value="property_criterias">Property Criterias</option>
						</select>
					</div>
					
					<div class="col-sm-6 mb-3 mt-3 mb-sm-0">
					 <span style="color: red;">*</span>IS
						<select name="trigger_is" id="select_box" required class="form-control form-control-user">
							<option value="">Select</option>
							<option value=">"> > </option>
							<option value="<"> < </option>
							<option value="<="> <= </option>
							<option value=">="> >=</option>
						</select>
					</div>
					
					<div class="col-sm-6 mb-3 mt-3 mb-sm-0">
						<span style="color: red;">&nbsp;</span>Then Trigger
						<select name="trigger_greater_than" id="select_box" required class="form-control form-control-user">
							<option value="">Select</option>
							<option value="manual_action_at_my_portfolio"> Manual Action at MY PORTFOLIO </option>
							<option value="manual_action_at_market_place"> Manual Action at market place </option>
							<option value="manual_action_at_service_section"> Manual Action at Services section </option> 
						</select>
					</div>
					
					<div class="col-sm-6 mb-3 mt-3 mb-sm-0">
    					 <span style="color: red;">*</span>Target
    					 <input type="text" id="" placeholder="" name="target" required value="" class="form-control form-control-user" />
					</div>
					<div class="col-sm-6 mb-3 mt-3 mb-sm-0">
    					 <span style="color: red;">*</span>Video Link
    					 <input type="url" id="" placeholder="" name="link" required value="" class="form-control form-control-user" />
					</div>
					<div class="col-sm-12 mb-3 mt-3 mb-sm-0">
    					 <span style="color: red;">*</span>Description
    					 <textarea name="description" required class="form-control form-control-user"></textarea>
					</div>
					
					
					
					
					
				
					
					
					<div class="col-sm-6 mb-3 mt-3 mb-sm-0">
						<span style="color: red;">&nbsp;</span>Status
						<select name="status" class="form-control form-control-user">
							<option value="">Select Status</option>
							<option value="0" selected="selected">Inactive</option>
							<option value="1" >Active</option>
						</select>
					</div>
				</div>
            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-success btn-user float-right mb-3">Save</button>
                <a class="btn btn-primary float-right mr-3 mb-3" href="{{ route('triggernotification.triggernotificationlist') }}">Cancel</a>
            </div>
        </form>
    </div>

</div>



@endsection