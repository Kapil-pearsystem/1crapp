@extends('layouts.app')
@section('title', isset($details) ? 'Edit Thank You Card' : 'Add Thank You Card')
@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">{{ isset($details) ? 'Edit' : 'Add' }} Thank You Card</h1>
        <a href="{{ route('gift.category-list') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-arrow-left fa-sm text-white-50"></i> Back</a>
    </div>
    {{-- Alert Messages --}}
    @include('common.alert')
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <form method="POST" action="{{ route('gift.store-thank-you-card') }}">
            @csrf
            <input type="hidden" name="id" value="{{ isset($details) ? $details->id : '' }}">
            <div class="card-body">
                <div class="form-group row">
                    <!-- Name Field -->
                    <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                        <label><span style="color: red;">*</span> Name</label>
                        <input type="text" name="name" value="{{ old('name') ?? ($details->name ?? '') }}" required class="form-control form-control-user" />
                    </div>
                    <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                        <label><span style="color: red;">*</span> Price</label>
                        <input type="text" name="price" value="{{ old('price') ?? ($details->price ?? '') }}" required class="form-control form-control-user" />
                    </div>
                    <div class="col-sm-12 mb-3 mt-3 mb-sm-0">
                        <label><span style="color: red;">*</span> Description</label>
                        <textarea name="description" required class="form-control form-control-user" row="4">{{ old('description') ?? ($details->description ?? '') }}</textarea>
                    </div>
                    <!-- Status Field -->
                    <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                        <label>Status</label>
                        <select name="status" required class="form-control form-control-user">
                            <option value="">Select Status</option>
                            <option value="0" {{ (old('status') ?? ($details->status ?? '')) == 0 ? 'selected' : '' }}>Inactive</option>
                            <option value="1" {{ (old('status') ?? ($details->status ?? '')) == 1 ? 'selected' : '' }}>Active</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-success btn-user float-right mb-3">
                    {{ isset($details) ? 'Update' : 'Add' }}
                </button>
                <a class="btn btn-primary float-right mr-3 mb-3" href="{{ route('gift.category-list') }}">Cancel</a>
            </div>
        </form>
    </div>
</div>
@endsection