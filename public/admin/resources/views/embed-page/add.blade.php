@extends('layouts.app')

@section('title', isset($details) ? 'Edit Embed Page' : 'Add Embed Page')

@section('content')

<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">{{ isset($details) ? 'Edit Embed Page' : 'Add Embed Page' }}</h1>
        <a href="{{ route('embed-page.index') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
            <i class="fas fa-arrow-left fa-sm text-white-50"></i> Back
        </a>
    </div>

    {{-- Alert Messages --}}
    @include('common.alert')

    <!-- Embed Page Form -->
    <div class="card shadow mb-4">
        <form method="POST" action="{{ route('embed-page.store') }}" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" value="{{ $details->id ?? '' }}">
            <div class="card-body">
                <div class="form-group row">

                    <!-- Title -->
                    <div class="col-sm-12 mb-3 mt-3 mb-sm-0">
                        <span style="color: red;">*</span> Title
                        <input type="text" name="title" class="form-control form-control-user"
                            placeholder="Enter the Title"
                            value="{{ old('title', $details->title ?? '') }}" required>
                        @error('title')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                   

                    <!-- Embed Link -->
                    <div class="col-sm-12 mb-3 mt-3 mb-sm-0">
                        <span style="color: red;">*</span> Embed Link
                        <input type="url" name="embed_link"  class="form-control form-control-user" value="{{ old('embed_link', $details->embed_link ?? '') }}"
                            placeholder="Paste the Embed Code here..."  required/>
                        @error('embed_link')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <!-- 🔹 New Field: Login Status -->
                    <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                        <span style="color: red;">*</span> Login Status
                        <select name="login_status" class="form-control form-control-user" required>
                            <option value="">Select Login Type</option>
                            <option value="1" {{ old('login_status', $details->login_status ?? '') == 1 ? 'selected' : '' }}>Pre-Login</option>
                            <option value="2" {{ old('login_status', $details->login_status ?? '') == 2 ? 'selected' : '' }}>Post-Login</option>
                        </select>
                        @error('login_status')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <!-- Status -->
                    <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                        <span style="color: red;">*</span> Status
                        <select name="status" class="form-control form-control-user" required>
                            <option value="">Select Status</option>
                            <option value="active" {{ old('status', $details->status ?? '') == 'active' ? 'selected' : '' }}>Active</option>
                            <option value="inactive" {{ old('status', $details->status ?? '') == 'inactive' ? 'selected' : '' }}>Inactive</option>
                        </select>
                        @error('status')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                </div>
            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-success btn-user float-right mb-3">
                    {{ isset($details) ? 'Update' : 'Save' }}
                </button>
                <a class="btn btn-primary float-right mr-3 mb-3" href="{{ route('embed-page.index') }}">Cancel</a>
            </div>
        </form>
    </div>

</div>

@endsection
