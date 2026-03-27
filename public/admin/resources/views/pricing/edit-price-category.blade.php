<?php 

    $storeRoute = route('pricing.updateCategoryPrices');
    $cancelRoute = route('pricing.index');
 
?>
@extends('layouts.app')

@section('title', 'Edit Pricing')

@section('content')

<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Price Category</h1>
        <a href="{{$cancelRoute}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-arrow-left fa-sm text-white-50"></i> Back</a>
    </div>

    {{-- Alert Messages --}}
    @include('common.alert')
   
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Edit Price Category</h6>
        </div>
        <form method="POST" action="{{$storeRoute}}">
            @csrf 

            <div class="card-body">
                <div class="form-group row">
 
                    @foreach($pricing as $list)
                    {{-- Name --}}
                    <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                        <span style="color:red;">*</span>{{ ucfirst($list->title) }} Price (Per Year)</label>
                        <input 
                            type="text" 
                            class="form-control form-control-user @error('amount') is-invalid @enderror" 
                            id="exampleAmount"
                            placeholder="Amount" 
                            name="amount[{{ $list->id }}]"  
                            value="{{ $list->amount }}">

                        @error('amount')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
    
                   @endforeach
    
                   
                   

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