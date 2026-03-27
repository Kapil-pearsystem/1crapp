<?php 
if($admin){
    $storeRoute = route('notification.store');
    $cancelRoute = route('notification.index');
} 
?>
@extends('layouts.app')

@section('title', 'Add Users')

@section('content')

<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Add Notification</h1>
        <a href="{{$cancelRoute}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-arrow-left fa-sm text-white-50"></i> Back</a>
    </div>

    {{-- Alert Messages --}}
    @include('common.alert')
   
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
      
        <form method="POST" action="{{$storeRoute}}">
            @csrf
            <div class="card-body">
                <div class="form-group row">

                    {{-- First Name --}}
                    <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                        <span style="color:red;">*</span>Title</label>
                        <input 
                            type="text" 
                            class="form-control form-control-user @error('title') is-invalid @enderror" 
                            id="exampleTitle"
                            placeholder="Title" 
                            name="title" 
                            value="{{ old('title') }}">

                        @error('title')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    {{-- First Name --}}
                    <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                        <span style="color:red;">*</span>Type</label>
                        <select name="type" required class="form-control form-control-user">
							<option value="">Select Type</option> 
							@foreach($notificationscategory as $list)
							<option value="{{ $list->id }}" >{{ $list->name }}</option>
							@endforeach
						</select>
						
                       

                        @error('type')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
					
					
					 <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                        <span style="color:red;">*</span>Date</label>
						<input type="date" id="" placeholder="Date" name="date" value="{{ old('date')}}" class="form-control form-control-user" required="" />
					</div>	

                       

                    {{-- Category --}}
                    <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                        <span style="color:red;">*</span>Description</label>
                        <textarea  
                            id="exampleDescription"
                            placeholder="Description" 
                            name="description"  class="form-control form-control-user @error('description') is-invalid @enderror">{{ old('description') }}</textarea>
                        
                        @error('description')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    {{-- Status --}}
                    <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                        <span style="color:red;">*</span>Status</label>
                        <select class="form-control form-control-user @error('status') is-invalid @enderror" name="status">
                            <option   disabled>Select Status</option>
                            <option value="0" selected>Inactive</option>
                            <option value="1" >Active</option>
                        </select>
                        @error('status')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                </div>
            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-success btn-user float-right mb-3">Save</button>
                <a class="btn btn-primary float-right mr-3 mb-3" href="{{ $cancelRoute }}">Cancel</a>
            </div>
        </form>
    </div>

</div>


@endsection