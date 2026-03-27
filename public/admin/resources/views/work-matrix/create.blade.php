@extends('layouts.app')

@section('title', isset($details) ? 'Edit Work Matrix' : 'Add Work Matrix')

@section('content')
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">{{ isset($details) ? 'Edit' : 'Add' }} Work Matrix</h1>
        <a href="{{ route('work-matrix.index') }}" class="btn btn-sm btn-primary shadow-sm">
            <i class="fas fa-arrow-left fa-sm text-white-50"></i> Back
        </a>
    </div>

    @include('common.alert')

    <div class="card shadow mb-4">
        <form method="POST" action="{{ route('work-matrix.store') }}" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" value="{{ $details->id ?? '' }}">

            <div class="card-body">
                <div class="form-group row">

                    <div class="col-sm-6 mb-3">
                        <label><span style="color: red;">*</span> Title</label>
                        <input type="text" name="title" class="form-control" required
                            value="{{ old('title', $details->title ?? '') }}" placeholder="Enter title" />
                        @error('title')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="col-sm-6 mb-2">
                        <label><span style="color: red;">*</span> Description</label>
                        <input type="text" name="description" placeholder="Enter description" required
                            value="{{ old('description', $details->description ?? '') }}" class="form-control" />
                        @error('description')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Image Upload -->
                    <div class="col-sm-6 mb-2">
                        <label><span style="color: red;">*</span> Image</label>
                        <input type="file" name="image" class="form-control" {{ isset($details) ? '' : 'required' }} />

                        @if(isset($details) && $details->image)
                        <div class="mt-2">
                            <img src="{{ asset($details->image) }}" width="100" alt="Current Image">
                            <input type="hidden" name="old_image" value="{{ $details->image }}">
                        </div>
                        @endif

                        @error('image')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-sm-6 mb-3">
    <label><span style="color: red;">*</span> Priority</label>
    <input type="number" name="priority" class="form-control" required value="{{ old('priority', $details->priority ?? '') }}" placeholder="Enter priority (e.g. 1, 2, 3)" />
    @error('priority')
    <span class="text-danger">{{ $message }}</span>
    @enderror
</div>

                    <!-- Status -->
                    <div class="col-sm-6 mb-3">
                        <label><span style="color: red;">*</span> Status</label>
                        <select name="status" class="form-control" required>
                            <option value="">Select Status</option>
                            <option value="1" {{ old('status', $details->status ?? 1) == 1 ? 'selected' : '' }}>Active</option>
                            <option value="0" {{ old('status', $details->status ?? 1) == 0 ? 'selected' : '' }}>Inactive</option>
                        </select>
                        @error('status')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                </div>
            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-success float-right">
                    {{ isset($details) ? 'Update' : 'Add' }}
                </button>
                <a class="btn btn-secondary float-right mr-2" href="{{ route('work-matrix.index') }}">Cancel</a>
            </div>
        </form>
    </div>
</div>
@endsection