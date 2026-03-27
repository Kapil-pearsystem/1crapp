@extends('layouts.app')

@section('title', 'Edit Easy to Share')

@section('content')

<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Easy to Share Content</h1>
        <a href="{{ route('easytoshare.index') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
            <i class="fas fa-arrow-left fa-sm text-white-50"></i> Back
        </a>
    </div>

    {{-- Alert Messages --}}
    @include('common.alert')

    <!-- Edit Form -->
    <div class="card shadow mb-4">
        <form method="POST" action="{{ route('easytoshare.update', $item->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="card-body">
                <div class="form-group row">

                    <!-- Title Field -->
                    <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                        <span style="color: red;">*</span> Title
                        <input type="text" name="title" class="form-control form-control-user" required placeholder="Enter the Title" value="{{ old('title', $item->title) }}">
                        @error('title')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Description Field -->
                    <div class="col-sm-12 mb-3 mt-3 mb-sm-0">
                        <span style="color: red;">*</span> Description
                        <textarea name="description" class="form-control form-control-user" required placeholder="Enter the Description" rows="4">{{ old('description', $item->description) }}</textarea>
                        @error('description')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Image Upload -->
                    <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                        <span style="color: red;">*</span> Image
                        <input type="file" name="image" class="form-control form-control-user" accept="image/*">
                        <small>Current Image:</small><br>
                        <img src="{{ asset('').$item->image }}" alt="{{ $item->title }}" style="width: 100px;">
                        @error('image')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Status Field -->
                    <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                        <span style="color: red;">*</span> Status
                        <select name="status" class="form-control form-control-user" required>
                            <option value="0" {{ old('status', $item->status) == 0 ? 'selected' : '' }}>Inactive</option>
                            <option value="1" {{ old('status', $item->status) == 1 ? 'selected' : '' }}>Active</option>
                        </select>
                        @error('status')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                </div>
            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-success btn-user float-right mb-3">Save Changes</button>
                <a class="btn btn-primary float-right mr-3 mb-3" href="{{ route('easytoshare.index') }}">Cancel</a>
            </div>
        </form>
    </div>

</div>

@endsection
