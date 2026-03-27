
@extends('layouts.app')

@section('title', 'Edit Customer')

@section('content')

<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Property Market</h1>
        <a href="{{ route('propertymarket.propertymarketlist') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-arrow-left fa-sm text-white-50"></i> Back</a>
    </div>

       {{-- Alert Messages --}}
    @include('common.alert')
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
         
        <form method="POST" action="{{ route('propertymarket.update',['propertymarket'=>$propertymarket->id]) }}">
                @csrf
            @method('PUT') 
           <div class="card-body">
                <div class="form-group row">
					<div class="col-sm-6 mb-3 mt-3 mb-sm-0">
					 <span style="color: red;">*</span>Property 
					 <input type="text" id="" placeholder="" name="property" value="{{ $propertymarket->property }}" class="form-control form-control-user" />
					</div>
					 
					
					<div class="col-sm-6 mb-3 mt-3 mb-sm-0">
					 <span style="color: red;">*</span>Owner Name 
					 <input type="" id="" placeholder="" name="owner_name" required value="{{ $propertymarket->owner_name }}" class="form-control form-control-user" />
					</div>
					
					<div class="col-sm-6 mb-3 mt-3 mb-sm-0">
					 <span style="color: red;">*</span>Owner Belongs
					 <input type="text" id="" placeholder="" required name="owner_belong" value="{{ $propertymarket->owner_belong }}" class="form-control form-control-user" />
					</div>
					
					<div class="col-sm-6 mb-3 mt-3 mb-sm-0">
					 <span style="color: red;">*</span>Property Type 
					 <select name="property_type" required class="form-control form-control-user">
                         <option  value="">Select Property</option>
                         <option @if($propertymarket->property_type=="Residentail") selected @endif value="Residentail">Residentail</option>
                         <option @if($propertymarket->property_type=="Commercial") selected @endif value="Commercial">Commercial</option>
                         <option @if($propertymarket->property_type=="Agriculture") selected @endif value="Agriculture">Agriculture</option>
                         <option @if($propertymarket->property_type=="Industrial") selected @endif value="Industrial">Industrial</option>
                    </select>
                            
				 
					</div>
					
					<div class="col-sm-6 mb-3 mt-3 mb-sm-0">
					 <span style="color: red;">*</span>Project/Builder Name
					 <input type="text" id="" placeholder="" required name="project_name" value="{{ $propertymarket->project_name }}" class="form-control form-control-user" />
					</div>
					
					<div class="col-sm-6 mb-3 mt-3 mb-sm-0">
					 <span style="color: red;">*</span>Location
					 <input type="text" id="" placeholder="" required name="location" value="{{ $propertymarket->location }}" class="form-control form-control-user" />
					</div>
					
				 
					
					<div class="col-sm-6 mb-3 mt-3 mb-sm-0">
					 <span style="color: red;">*</span>Feedback
					 <input type="text" id="" placeholder="" required name="feedback" value="{{ $propertymarket->feedback }}" class="form-control form-control-user" />
					</div>
					
					<div class="col-sm-6 mb-3 mt-3 mb-sm-0">
					 <span style="color: red;">*</span>Current Status
					 <input type="text" id="" placeholder="" required name="current_status" value="{{ $propertymarket->current_status }}" class="form-control form-control-user" />
					</div>
					
			 
			 
					<div class="col-sm-6 mb-3 mt-3 mb-sm-0">
						<span style="color: red;">&nbsp;</span>Posted BY
						<select name="posted_by"required  class="form-control form-control-user">
							<option>Select Status</option>
							<option value="Agent" @if($propertymarket->posted_by == 'Agent' ) selected   @endif >Agent</option>
							<option value="Owner" @if($propertymarket->posted_by == 'Owner' ) selected @endif >Owner</option>
						</select>
					</div>
					
					<div class="col-sm-6 mb-3 mt-3 mb-sm-0">
						<span style="color: red;">&nbsp;</span>Status
						<select name="status"required  class="form-control form-control-user">
							<option>Select Status</option>
							<option value="0" @if($propertymarket->status==0) selected @endif >Inactive</option>
							<option value="1" @if($propertymarket->status==1) selected @endif >Active</option>
						</select>
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