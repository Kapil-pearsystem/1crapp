<?php 

    $storeRoute = route('pricing.update', ['pricing' => $pricing->id]);
    $cancelRoute = route('pricing.index');
 
?>
@extends('layouts.app')

@section('title', 'Edit Pricing')

@section('content')

<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Price & Access Level</h1>
        <a href="{{$cancelRoute}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-arrow-left fa-sm text-white-50"></i> Back</a>
    </div>

    {{-- Alert Messages --}}
    @include('common.alert')
   
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Edit Price & Access Level</h6>
        </div>
        <form method="POST" action="{{$storeRoute}}">
            @csrf
            @method('PUT')

            <div class="card-body">
                <div class="form-group row">

                    {{-- Name --}}
                    <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                        <span style="color:red;">*</span>Name</label>
                        <input 
                            type="text" 
                            class="form-control form-control-user @error('name') is-invalid @enderror" 
                            id="exampleName"
                            placeholder="Name" 
                            name="name" 
                            value="{{ old('name') ?  old('name') : $pricing->name}}">

                        @error('name')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
   
                    {{-- Role --}}
                    <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                        <span style="color:red;">*</span>Category</label>
                        <select class="form-control form-control-user @error('price_cat_id') is-invalid @enderror" name="price_cat_id">
                            <option selected disabled>Select Category</option>
                            @foreach ($PriceModuleCategory as $role)
                                <option value="{{$role->id}}" 
                                    {{old('price_cat_id') ? ((old('price_cat_id') == $role->id) ? 'selected' : '') : (($pricing->price_cat_id == $role->id) ? 'selected' : '')}}>
                                    {{$role->title}}
                                </option>
                            @endforeach
                        </select>
                        @error('price_cat_id')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    {{-- Status --}}
                    <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                        <span style="color:red;">*</span>Status</label>
                        <select class="form-control form-control-user @error('status') is-invalid @enderror" name="status">
                            <option selected disabled>Select Status</option>
                            <option value="1" {{ ($pricing->status == 1) ? 'selected' : '' }}>Active</option>
                            <option value="0" {{ ($pricing->status == 0) ? 'selected' : '' }}>Inactive</option>
                        </select>
                        @error('status')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                </div>
            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-success btn-user float-right mb-3">Update</button>
                <a class="btn btn-primary float-right mr-3 mb-3" href="{{ $cancelRoute }}">Cancel</a>
            </div>
        </form>
    </div>

</div>


@endsection