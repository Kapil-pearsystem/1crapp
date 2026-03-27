
@extends('layouts.app')

@section('title', 'Edit Customer')

@section('content')

<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Trigger & Notification</h1>
        <a href="{{ route('triggernotification.triggernotificationlist') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-arrow-left fa-sm text-white-50"></i> Back</a>
    </div>
   {{-- Alert Messages --}}
    @include('common.alert')
   
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        
        <form method="POST" action="{{ route('triggernotification.update',['trigger'=>$trigger->id]) }}">
  @csrf
            @method('PUT') 
              <div class="card-body">
                <div class="form-group row">
				    <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
						<span style="color: red;">&nbsp;</span>Catagory
						<select name="type" id="select_box" required class="form-control form-control-user">
							<option value="" >Select Catagory</option>
							<option @if($trigger->type=="trigger") selected @endif  value="trigger">Trigger</option>
							<option @if($trigger->type=="notification") selected @endif value="notification">Notification</option>
						</select>
					</div>
				 
					 <input type="hidden" id="" placeholder="" required name="trigger_if" value="if" class="form-control form-control-user" />
				 
					<div class="col-sm-6 mb-3 mt-3 mb-sm-0">
						<span style="color: red;">&nbsp;</span>If Condition
						<select name="trigger_roe" id="select_box" required class="form-control form-control-user">
							<option value="" >Select Roe</option>
							<option  @if($trigger->trigger_roe=="roi") selected @endif  value="roi">RoI</option>
							<option  @if($trigger->trigger_roe=="property_update") selected @endif  value="property_update">Property Update</option>
							<option  @if($trigger->trigger_roe=="return_ratios") selected @endif  value="return_ratios">Return & Ratios</option>
							<option  @if($trigger->trigger_roe=="property_criterias") selected @endif  value="property_criterias">Property Criterias</option>
						</select>
					</div>
					
					<div class="col-sm-6 mb-3 mt-3 mb-sm-0">
					 <span style="color: red;">*</span>IS
						<select name="trigger_is" id="select_box" required class="form-control form-control-user">
							<option value="">Select</option>
							<option  @if($trigger->trigger_is==">") selected @endif  value=">"> > </option>
							<option  @if($trigger->trigger_is=="<") selected @endif  value="<"> < </option>
							<option  @if($trigger->trigger_is=="<=") selected @endif  value="<="> <= </option>
							<option  @if($trigger->trigger_is==">=") selected @endif  value=">="> >= </option>
						</select>
					</div>
					
					<div class="col-sm-6 mb-3 mt-3 mb-sm-0">
						<span style="color: red;">&nbsp;</span>Then Trigger
						<select name="trigger_greater_than" id="select_box" required class="form-control form-control-user">
							<option vaue="">Select</option>
							<option  @if($trigger->trigger_greater_than=="manual_action_at_my_portfolio") selected @endif value="manual_action_at_my_portfolio"> Manual Action at MY PORTFOLIO </option>
							<option  @if($trigger->trigger_greater_than=="manual_action_at_market_place") selected @endif value="manual_action_at_market_place"> Manual Action at market place </option>
							<option @if($trigger->trigger_greater_than=="manual_action_at_service_section") selected @endif value="manual_action_at_service_section"> Manual Action at Services section </option> 
						</select>
					</div>
					
					<div class="col-sm-6 mb-3 mt-3 mb-sm-0">
					 <span style="color: red;">*</span>Target
					 <input type="text" id="" placeholder="" name="target" required value="{{ $trigger->target }}" class="form-control form-control-user" />
					</div>
					
					<div class="col-sm-6 mb-3 mt-3 mb-sm-0">
    					 <span style="color: red;">*</span>Video Link
    					 <input type="url" id="" placeholder="" name="link" required value="{{ $trigger->link }}" class="form-control form-control-user" />
					</div>
					<div class="col-sm-12 mb-3 mt-3 mb-sm-0">
    					 <span style="color: red;">*</span>Description
    					 <textarea name="description" required class="form-control form-control-user">{{ $trigger->description }}</textarea>
					</div>
					
					<div class="col-sm-6 mb-3 mt-3 mb-sm-0">
						<span style="color: red;">&nbsp;</span>Status
						<select name="status" class="form-control form-control-user">
							<option>Select Status</option>
							<option value="0" @if($trigger->status==0) selected @endif >Inactive</option>
							<option value="1" @if($trigger->status==1) selected @endif >Active</option>
						</select>
					</div>
				</div>
            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-success btn-user float-right mb-3">Update</button>
                <a class="btn btn-primary float-right mr-3 mb-3" href="{{ route('triggernotification.triggernotificationlist') }}">Cancel</a>
            </div>
        </form>
    </div>

</div>


@endsection