
@extends('layouts.app')

@section('title', 'Edit Customer')

@section('content')

<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Customer</h1>
        <a href="{{ route('customermanagement.customerlist') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-arrow-left fa-sm text-white-50"></i> Back</a>
    </div>

   
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        
        <form method="POST" action="">

            <div class="card-body">
                <div class="form-group row">
					<div class="col-sm-6 mb-3 mt-3 mb-sm-0">
					 <span style="color: red;">*</span>Name 
					 <input type="text" id="exampleName" placeholder="Name" name="name" value="" class="form-control form-control-user" />
					</div>
					
					<div class="col-sm-6 mb-3 mt-3 mb-sm-0">
					 <span style="color: red;">*</span>Email 
					 <input type="email" id="exampleEmail" placeholder="Email" name="email" value="" class="form-control form-control-user" />
					</div>
					
					<div class="col-sm-6 mb-3 mt-3 mb-sm-0">
					 <span style="color: red;">*</span>Mobile Number 
					 <input type="text" id="exampleMobile" placeholder="Mobile Number" name="mobile" value="" class="form-control form-control-user" />
					</div>

					<div class="col-sm-6 mb-3 mt-3 mb-sm-0">
					 <span style="color: red;">*</span>Registration Date
					 <input type="date" id="birthday" placeholder="" name="" value="" class="form-control form-control-user">
					</div>
					
					
					
					<div class="col-sm-6 mb-3 mt-3 mb-sm-0">
						<span style="color: red;">*</span>Status
						<select name="status" class="form-control form-control-user">
							<option>Select Status</option>
							<option value="1" selected="selected">Active</option>
							<option value="0">Inactive</option>
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