@extends('layouts.app')
@section('title', isset($details) ? 'Edit Testimonial' : 'Add Testimonial')
@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">{{ isset($details) ? 'Edit' : 'Add' }} Testimonial</h1>
        <a href="{{ route('web.testimonials.index') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-arrow-left fa-sm text-white-50"></i> Back</a>
    </div>
    {{-- Alert Messages --}}
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
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
    <form method="POST" action="{{ route('web.testimonial.store') }}" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="id" value="{{ isset($details) ? $details->id : '' }}">
        <div class="card-body">
            <div class="form-group row">
                <!-- Name Field -->
                <div class="col-sm-6 mb-3">
                    <label><span style="color: red;">*</span> Name</label>
                    <input type="text" name="name" placeholder="Enter Name" value="{{ old('name') ?? ($details->name ?? '') }}" required class="form-control form-control-user" />
                </div>
                <!-- Designation Field -->
                <div class="col-sm-6 mb-3">
                    <label><span style="color: red;">*</span> Designation</label>
                    <input type="text" name="designation" placeholder="Enter Designation" value="{{ old('designation') ?? ($details->designation ?? '') }}" required class="form-control form-control-user" />
                </div>
                <!-- Company Field -->
                <div class="col-sm-6 mb-3">
                    <label><span style="color: red;">*</span> Company</label>
                    <input type="text" name="company" placeholder="Enter Company" value="{{ old('company') ?? ($details->company ?? '') }}" required class="form-control form-control-user" />
                </div>
                <!-- Location Field -->
                <div class="col-sm-6 mb-3">
                    <label><span style="color: red;">*</span> Location</label>
                    <input type="text" name="location" placeholder="Enter Location" value="{{ old('location') ?? ($details->location ?? '') }}" required class="form-control form-control-user" />
                </div>
                <!-- About Field -->
                <div class="col-sm-12 mb-3">
                    <label><span style="color: red;">*</span> About</label>
                    <textarea name="about" placeholder="Enter About Info" required class="form-control form-control-user">{{ old('about') ?? ($details->about ?? '') }}</textarea>
                </div>
                <!-- Rating Field -->
                <div class="col-sm-6 mb-3">
                    <label><span style="color: red;">*</span> Rating</label>
                    <input type="number" name="rating" min="1" max="5" placeholder="Enter Rating" value="{{ old('rating') ?? ($details->rating ?? '') }}" required class="form-control form-control-user" />
                </div>
                <!-- Contact Field -->
                <div class="col-sm-6 mb-3">
                    <label><span style="color: red;">*</span> Contact</label>
                    <input type="text" name="contact" placeholder="Enter Contact" value="{{ old('contact') ?? ($details->contact ?? '') }}" required class="form-control form-control-user" />
                </div>
                <!-- Video Field -->
                <div class="col-sm-6 mb-3">
                    <label><span style="color: red;">{{ isset($details) ? '' : '*' }}</span> Image</label>
                    <input type="hidden" name="old_image" value="{{ isset($details) ? base64_encode($details->image) : '' }}"/>
                    <input type="file" name="image" value="{{ old('image') ?? ($details->image ?? '') }}" {{ isset($details) ? '' : 'required' }} class="form-control form-control-user" />
                </div>
                <!-- Video Field -->
                <div class="col-sm-6 mb-3">
                    <label><span style="color: red;">*</span> Video Link</label>
                    <input type="url" name="video" placeholder="Enter Video Link" value="{{ old('video') ?? ($details->video ?? '') }}" required class="form-control form-control-user" />
                </div>
                <!-- Status Field -->
                <div class="col-sm-6 mb-3">
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
            <a class="btn btn-primary float-right mr-3 mb-3" href="{{ route('web.testimonials.index') }}">Cancel</a>
        </div>
    </form>

    </div>
</div>
@endsection