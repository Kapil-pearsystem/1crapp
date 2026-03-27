@extends('layouts.app')

@section('title', isset($details) ? 'Edit Agent' : 'Add Agent Setting')

@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">{{ isset($details) ? 'Edit' : 'Add' }} Agent Setting</h1>
        <a href="{{ route('agent-setting.index') }}" class="btn btn-sm btn-primary shadow-sm">
            <i class="fas fa-arrow-left fa-sm text-white-50"></i> Back
        </a>
    </div>

    @include('common.alert')

    <div class="card shadow mb-4">
        <form method="POST" action="{{ route('agent-setting.store')}}" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" value="{{ $details->id ?? '' }}">

            <div class="card-body">
                <div class="form-group row">
                    <!-- Category -->
                    <div class="col-sm-12 mb-3">
                        <label><span style="color: red;">*</span> Category</label>
                        <select name="category" class="form-control" required>
                            <option value="">Select Category</option>

                            <option value="1" {{ (old('category', $details->category ?? '') == 1) ? 'selected' : '' }}>Payment Gatewayes</option>
                            <option value="2" {{ (old('category', $details->category ?? '') == 2) ? 'selected' : '' }}>Brandings</option>
                            <option value="3" {{ (old('category', $details->category ?? '') == 3) ? 'selected' : '' }}>SMTP</option>
                            <option value="4" {{ (old('category', $details->category ?? '') == 4) ? 'selected' : '' }}>Domain</option>

                        </select>
                        @error('category')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>


                    <!-- Tutorial Link -->
                    <div class="col-sm-10 mb-2 mt-3 mb-sm-0">
                        <label><span style="color: red;">*</span> Tutorial Link</label>
                        <input type="text" name="tutorial_link" placeholder="Enter Tutorial Link" value="{{ old('tutorial_link', $details->tutorial_link ?? '') }}" required class="form-control" />
                    </div>
                    <div class="col-sm-2 mb-2 mt-3 mb-sm-0 swich_bntts">
                        Open a New Tab
                        <div class="block_araea mt-1">
                            <label class="switch"><input value="1" {{ (old('tutorial_link_new_tab') ?? ($details->tutorial_link_new_tab ?? '')) == 1 ? 'checked' : '' }} type="checkbox" name="tutorial_link_new_tab" /> <small></small></label>
                        </div>
                    </div>



                    <!-- Video Link -->
                    <div class="col-sm-10 mb-2 mt-3 mb-sm-0">
                        <label><span style="color: red;">*</span> Video Link</label>
                        <input type="url" name="video_link" placeholder="Enter Video Link" value="{{ old('video_link', $details->video_link ?? '') }}" required class="form-control" />
                    </div>
                    <div class="col-sm-2 mb-2 mt-3 mb-sm-0 swich_bntts">
                        Open a New Tab
                        <div class="block_araea mt-1">
                            <label class="switch"><input value="1" {{ (old('video_link_new_tab') ?? ($details->video_link_new_tab ?? '')) == 1 ? 'checked' : '' }} type="checkbox" name="video_link_new_tab" /> <small></small></label>
                        </div>
                    </div>


                    <!-- Status -->
                    <div class="col-sm-6 mb-3">
                        <label><span style="color: red;">*</span> Status</label>
                        <select name="status" class="form-control" required>
                            <option value="">Select Status</option>
                            <option value="1" {{ old('status', $details->status ?? 1) == 1 ? 'selected' : '' }}>Active</option>
                            <option value="0" {{ old('status', $details->status ?? 1) == 0 ? 'selected' : '' }}>Inactive</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-success float-right">
                    {{ isset($details) ? 'Update' : 'Add' }}
                </button>
                <a class="btn btn-secondary float-right mr-2" href="{{ route('agent-setting.index') }}">Cancel</a>
            </div>
        </form>
    </div>
</div>
@endsection