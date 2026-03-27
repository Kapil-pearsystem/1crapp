@extends('layouts.app')
@section('title', isset($details) ? 'Edit Quickly Analyze' : 'Add Quickly Analyze')
@section('content')
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">{{ isset($details) ? 'Edit' : 'Add' }} Quickly Analyze</h1>
        <a href="{{ route('web.quickly-analyze.index') }}" class="btn btn-sm btn-primary shadow-sm"><i class="fas fa-arrow-left"></i> Back</a>
    </div>
    @include('common.alert')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="card shadow mb-4">
        <form method="POST" action="{{ route('web.quickly-analyze.store') }}" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" value="{{ isset($details) ? $details->id : '' }}">
            <div class="card-body">
                <div class="form-group row">
                    <!-- Title -->
                    <div class="col-sm-12 mb-3">
                        <label><span style="color: red;">*</span> Title</label>
                        <input type="text" name="title" placeholder="Enter Title" value="{{ old('title') ?? ($details->title ?? '') }}" required class="form-control" />
                    </div>
                    <!-- Description -->
                    <div class="col-sm-12 mb-3">
                        <label><span style="color: red;">*</span> Description</label>
                        <textarea name="description" placeholder="Enter Description" class="form-control" required>{{ old('description') ?? ($details->description ?? '') }}</textarea>
                    </div>

                    <!-- Image -->
                    <div class="col-sm-6 mb-3">
                        <label><span style="color: red;">{{ isset($details) ? '' : '*' }}</span> Image</label>
                        <input type="hidden" name="old_image" value="{{ isset($details) ? base64_encode($details->image) : '' }}">
                        <input type="file" name="image" class="form-control" {{ isset($details) ? '' : 'required' }} />
                    </div>
                    <!-- Status -->
                    <div class="col-sm-6 mb-3">
                        <label>Status</label>
                        <select name="status" required class="form-control">
                            <option value="">Select Status</option>
                            <option value="1" {{ (old('status') ?? ($details->status ?? '')) == 1 ? 'selected' : '' }}>Active</option>
                            <option value="0" {{ (old('status') ?? ($details->status ?? '')) == 0 ? 'selected' : '' }}>Inactive</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-success float-right">
                    {{ isset($details) ? 'Update' : 'Add' }}
                </button>
                <a class="btn btn-primary float-right mr-3" href="{{ route('web.quickly-analyze.index') }}">Cancel</a>
            </div>
        </form>
    </div>
</div>
@endsection
