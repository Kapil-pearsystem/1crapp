@extends('layouts.app')

@section('title', isset($details) ? 'Edit Need Help' : 'Add Need Help')

@section('content')
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">{{ isset($details) ? 'Edit' : 'Add' }} Need Help</h1>
        <a href="{{ route('need-help.index') }}" class="btn btn-sm btn-primary shadow-sm">
            <i class="fas fa-arrow-left fa-sm text-white-50"></i> Back
        </a>
    </div>

    @include('common.alert')

    <div class="card shadow mb-4">
        <form method="POST" action="{{ route('need-help.store') }}" enctype="multipart/form-data">
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

                    <div class="col-sm-4 mb-2">
                        <label><span style="color: red;">*</span> URL</label>
                        <input type="url" name="url" placeholder="Enter URL" required
                            value="{{ old('url', $details->url ?? '') }}" class="form-control" />
                        @error('url')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Open in new tab -->
                    <div class="col-sm-2 mb-2 swich_bntts">
                        <label>Open in New Tab</label>
                        <div class="block_araea mt-1">
                            <label class="switch">
                                <input type="checkbox" name="url_new_tab" value="1" {{ (old('url_new_tab', $details->url_new_tab ?? 0) == 1) ? 'checked' : '' }} />
                                <small></small>
                            </label>
                        </div>
                    </div>
                    <div class="col-sm-6 mb-3">
                        <label><span style="color: red;">*</span> Link Name</label>
                        <input type="text" name="link_name" class="form-control" required
                            value="{{ old('link_name', $details->link_name ?? '') }}" placeholder="Enter title" />
                        @error('link_name')
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

                    <!-- Image Upload -->
                    <div class="col-sm-6 mb-2">
                        <label><span style="color: red;">*</span> Image</label>
                        <input type="file" name="image" class="form-control" {{ isset($details) ? '' : 'required' }} />

                        @if(isset($details) && $details->image)
                        <div class="mt-2">
                            <img src="{{ asset($details->image) }}" width="100" alt="Current Image">
                            <input type="hidden" name="old_image" value="{{ base64_encode($details->image) }}">
                        </div>
                        @endif

                        @error('image')
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
                <a class="btn btn-secondary float-right mr-2" href="{{ route('need-help.index') }}">Cancel</a>
            </div>
        </form>
    </div>
</div>
@endsection