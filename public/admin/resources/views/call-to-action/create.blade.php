@extends('layouts.app')

@section('title', isset($details) ? 'Edit Call to Action' : 'Add Call to Action')

@section('content')
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">{{ isset($details) ? 'Edit' : 'Add' }} Call to Action</h1>
        <a href="{{ route('call-to-action.index') }}" class="btn btn-sm btn-primary shadow-sm">
            <i class="fas fa-arrow-left fa-sm text-white-50"></i> Back
        </a>
    </div>

    @include('common.alert')

    <div class="card shadow mb-4">
        <form method="POST" action="{{ route('call-to-action.store') }}" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="id" value="{{ $details->id ?? '' }}">

    <div class="card-body">
        <div class="form-group row">

            <!-- Title -->
            <div class="col-sm-6 mb-3">
                <label><span style="color: red;">*</span> Title</label>
                <input type="text" name="title" class="form-control" required
                    value="{{ old('title', $details->title ?? '') }}" placeholder="Enter title" />
            </div>

            <!-- Description / URL -->
            <div class="col-sm-6 mb-3">
                <label><span style="color: red;">*</span> Description</label>
                <input type="text" name="description" class="form-control" required
                    value="{{ old('description', $details->description ?? '') }}" placeholder="Enter Description" />
            </div>

            <!-- Left Link Title -->
            <div class="col-sm-4 mb-3">
                <label>Left Link Title</label>
                <input type="text" name="left_link_title" class="form-control"
                    value="{{ old('left_link_title', $details->left_link_title ?? '') }}" placeholder="Left link title" />
            </div>
            
            <!-- Left Link Open in New Tab -->
            <div class="col-sm-2 mb-2 swich_bntts">
                <label> Open in New Tab</label>
                <div class="block_araea mt-1">
                    <label class="switch">
                        <input type="checkbox" name="left_link_new_tab" value="1" {{ (old('left_link_new_tab', $details->left_link_new_tab ?? 0) == 1) ? 'checked' : '' }} />
                        <small></small>
                    </label>
                </div>
            </div>
            <div class="col-sm-6 mb-3">
                <label>Left Link URL</label>
                <input type="url" name="left_link_url" class="form-control"
                    value="{{ old('left_link_url', $details->left_link_url ?? '') }}" placeholder="https://example.com" />
            </div>
            
            
                        <!-- Right Link Title -->
                        <div class="col-sm-4 mb-3">
                            <label>Right Link Title</label>
                            <input type="text" name="right_link_title" class="form-control"
                                value="{{ old('right_link_title', $details->right_link_title ?? '') }}" placeholder="Right link title" />
                        </div>
            
                        <!-- Right Link Open in New Tab -->
                        <div class="col-sm-2 mb-2 swich_bntts">
                <label> Open in New Tab</label>
                <div class="block_araea mt-1">
                    <label class="switch">
                                    <input type="checkbox" name="right_link_new_tab" value="1" {{ (old('right_link_new_tab', $details->right_link_new_tab ?? 0) == 1) ? 'checked' : '' }} />
                                    <small></small>
                                </label>
                            </div>
                        </div>
            <div class="col-sm-6 mb-3">
                <label>Right Link URL</label>
                <input type="url" name="right_link_url" class="form-control"
                    value="{{ old('right_link_url', $details->right_link_url ?? '') }}" placeholder="https://example.com" />
            </div>
                        <!-- First Section (Dropdown) -->
                        <div class="col-sm-6 mb-3">
                <label><span style="color: red;">*</span> Section</label>
                <select name="section" class="form-control" required>
                    <option value="">Select Section</option>
                    <option value="1" {{ old('section', $details->section ?? '') == '1' ? 'selected' : '' }}>1</option>
                    <option value="2" {{ old('section', $details->section ?? '') == '2' ? 'selected' : '' }}>2</option>
                    <option value="3" {{ old('section', $details->section ?? '') == '3' ? 'selected' : '' }}>3</option>
                    <option value="4" {{ old('section', $details->section ?? '') == '4' ? 'selected' : '' }}>4</option>
                    <option value="5" {{ old('section', $details->section ?? '') == '5' ? 'selected' : '' }}>5</option>
                    <option value="6" {{ old('section', $details->section ?? '') == '6' ? 'selected' : '' }}>6</option>
                    <option value="7" {{ old('section', $details->section ?? '') == '7' ? 'selected' : '' }}>7</option>
                </select>
                @error('section')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>


            <!-- Image -->
            <div class="col-sm-6 mb-3">
                <label><span style="color: red;">*</span> Image</label>
                <input type="file" name="image" class="form-control" {{ isset($details) ? '' : 'required' }} />
                @if(isset($details) && $details->image)
                    <div class="mt-2">
                        <img src="{{ asset($details->image) }}" width="100" alt="Current Image">
                        <input type="hidden" name="old_image" value="{{ base64_encode($details->image) }}">
                    </div>
                @endif
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
        <a class="btn btn-secondary float-right mr-2" href="{{ route('need-help.index') }}">Cancel</a>
    </div>
</form>

    </div>
</div>
@endsection