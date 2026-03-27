
@extends('layouts.app')

@section('title', 'Edit Customer')

@section('content')

<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Add Ticket</h1>
        <a href="{{ route('ticketscustomercare.ticketscustomercarelist') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-arrow-left fa-sm text-white-50"></i> Back</a>
    </div>

      {{-- Alert Messages --}}
        @include('common.alert')
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
      
       <form action="{{ route('ticketscustomercare.addTicket') }}" method="post" enctype="multipart/form-data">
			 {{ csrf_field() }}	
            <div class="card-body">
                <div class="form-group row">			
					<div class="col-sm-12 mb-3 mt-3 mb-sm-0">
					 <span style="color: red;">*</span>Member ID 
					 <input type="text" id="memberid" placeholder="" name="memberid" value="{{ old('memberid') }}" class="form-control form-control-user" required="required" />
					</div>
								
					<div class="col-sm-12 mb-3 mt-3 mb-sm-0">
					 <span style="color: red;">*</span>Subject 
					 <input type="text" id="" placeholder="" name="subject" value="{{ old('subject') }}" class="form-control form-control-user" required="required" />
					</div>
					
					<div class="col-sm-12 mb-3 mt-3 mb-sm-0">
					 <span style="color: red;">*</span>Description 
					 <textarea id="" name="description" class="form-control form-control-user" rows="6" cols="50" required="required" >{{ old('description') }}</textarea>
					</div>
					
					<div class="col-sm-12 mb-3 mt-3 mb-sm-0 upldds">
					 <span style="color: red;">&nbsp;</span>Attach Files (Only Image) 
					 <input type="file" accept="image/x-png,image/gif,image/jpeg" id="inbox_gallery" placeholder="Attach Files" name="inbox_gallery[]" multiple value="" class="form-control form-control-user"  >
					</div>
				</div>
            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-success btn-user float-right mb-3">Save</button>
                <a class="btn btn-primary float-right mr-3 mb-3" href="{{ route('ticketscustomercare.ticketscustomercarelist') }}">Cancel</a>
            </div>
        </form>
    </div>

</div>



@endsection