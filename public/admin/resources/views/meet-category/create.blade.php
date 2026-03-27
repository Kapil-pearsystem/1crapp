@extends('layouts.app')

@section('title', isset($details) ? 'Edit Category' : 'Add Category')

@section('content')
<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">{{ isset($details) ? 'Edit' : 'Add' }} Category</h1>
        <a href="{{ route('meet-category.index') }}" class="btn btn-sm btn-primary shadow-sm">
            <i class="fas fa-arrow-left fa-sm text-white-50"></i> Back
        </a>
    </div>

    @include('common.alert')

    <div class="card shadow mb-4">
        <form method="POST" action="{{ route('meet-category.store') }}">
            @csrf
            <input type="hidden" name="id" value="{{ $details->id ?? '' }}">

            <div class="card-body">

                {{-- CATEGORY --}}
                <div class="form-group">
                    <label>Category Name <span class="text-danger">*</span></label>
                    <input type="text" name="category" class="form-control" placeholder="Enter Category Name"
                        value="{{ old('category', $details->category ?? '') }}" required>
                    @error('category')<span class="text-danger">{{ $message }}</span>@enderror
                </div>

                {{-- STATUS --}}
                <div class="form-group">
                    <label>Status <span class="text-danger">*</span></label>
                    <select name="status" class="form-control" required>
                        <option value="1" {{ old('status', $details->status ?? 1) == 1 ? 'selected' : '' }}>Active</option>
                        <option value="0" {{ old('status', $details->status ?? 1) == 0 ? 'selected' : '' }}>Inactive</option>
                    </select>
                </div>

            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-success float-right">
                    {{ isset($details) ? 'Update' : 'Add' }}
                </button>
                <a class="btn btn-secondary float-right mr-2" href="{{ route('meet-category.index') }}">Cancel</a>
            </div>

        </form>
    </div>
</div>
@endsection
