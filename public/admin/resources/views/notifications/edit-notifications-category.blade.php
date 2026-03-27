

@extends('layouts.app')



@section('title', 'Edit Customer')



@section('content')



<div class="container-fluid">



    <!-- Page Heading -->

    <div class="d-sm-flex align-items-center justify-content-between mb-4">

        <h1 class="h3 mb-0 text-gray-800">Edit Notification Category</h1>

        <a href="{{ route('notification.categorylist') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-arrow-left fa-sm text-white-50"></i> Back</a>

    </div>



   {{-- Alert Messages --}}

    @include('common.alert')

    <!-- DataTales Example -->

    <div class="card shadow mb-4">



        <form method="POST" action="{{ route('notification.updatecategory',['product'=>$product->id]) }}">

             @csrf

            @method('PUT')

            <div class="card-body">

                <div class="form-group row">

					<div class="col-sm-6 mb-3 mt-3 mb-sm-0">

					 <span style="color: red;">*</span>Name

					 <input type="text" id="" placeholder="" name="name" required value="{{ $product->name }}" class="form-control form-control-user" />

					</div>
					<div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                        <span style="color: red;">*</span>Icon
                        <input type="text" id="" placeholder="" name="icon" value="{{ $product->icon }}" required  class="form-control form-control-user" />
                        <small id="emailHelp" class="form-text text-muted">Please Enter only class name e.g.<strong> fa-calendar-o </strong> to <i class="fa fa-calendar-o "></i></small>
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

                <a class="btn btn-primary float-right mr-3 mb-3" href="{{ route('notification.categorylist') }}">Cancel</a>

            </div>

        </form>

    </div>



</div>





@endsection