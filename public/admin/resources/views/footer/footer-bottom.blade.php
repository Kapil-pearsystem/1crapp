@extends('layouts.app')
@section('title', isset($details) ? 'Edit Footer Bottom' : 'Add Footer Bottom')
@section('content')
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">{{ isset($details) ? 'Edit' : 'Add' }} Footer Bottom</h1>
        <a href="#" onclick="window.history.back()" class="btn btn-sm btn-primary shadow-sm">
            <i class="fas fa-arrow-left fa-sm text-white-50"></i> Back
        </a>
    </div>

    @include('common.alert')

    <div class="card shadow mb-4">
        <form method="POST" action="{{ route('footer-bottom.save') }}" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" value="{{ $details->id ?? '' }}">

            <div class="card-body">
                <div class="form-group row">
                    <!-- Image Upload -->
                    <div class="col-sm-5 mb-2">
                        <label>Image</label>
                        <input type="file" name="image" class="form-control" />
                        @if(isset($details) && $details->image)
                        <div class="mt-2">
                            <img src="{{ asset($details->image) }}" width="100" alt="Current image">
                            <input type="hidden" name="old_image" value="{{ base64_encode($details->image) }}">
                        </div>
                        @endif
                        @error('image')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-sm-1 mb-2 swich_bntts">
                        <label>Visible</label>
                        <div class="block_araea mt-1">
                            <label class="switch">
                                <input type="checkbox" name="image_visible" value="1" {{ (old('image_visible', $details->image_visible ?? 0) == 1) ? 'checked' : '' }} />
                                <small></small>
                            </label>
                        </div>
                    </div>

                    <div class="col-sm-5 mb-3">
                        <label>Button CTA Text</label>
                        <input type="text" name="btn_text" class="form-control" 
                            value="{{ old('btn_text', $details->btn_text ?? '') }}" placeholder="Enter Button CTA Text" />
                        @error('btn_text')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="col-sm-5 mb-2">
                        <label>Button Link</label>
                        <input type="url" name="btn_link" placeholder="Enter Button Link" 
                            value="{{ old('btn_link', $details->btn_link ?? '') }}" class="form-control" />
                        @error('btn_link')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <!-- Open in new tab -->
                    <div class="col-sm-2 mb-2 swich_bntts">
                        <label>Left Section Enable</label>
                        <div class="block_araea mt-1">
                            <label class="switch">
                                <input type="checkbox" name="left_enable" value="1" {{ (old('left_enable', $details->left_enable ?? 0) == 1) ? 'checked' : '' }} />
                                <small></small>
                            </label>
                        </div>
                    </div>
                    <hr>
                    <div class="col-sm-6 mb-3">
                        <label>Title</label>
                        <input type="text" name="title" class="form-control" 
                            value="{{ old('title', $details->title ?? '') }}" placeholder="Enter title" />
                        @error('title')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-sm-6 mb-3">
                        <label>Description</label>
                        <textarea name="description" placeholder="Enter Description" class="form-control" id="">{{ old('description', $details->description ?? '') }}</textarea>
                        @error('description')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Image Upload -->
                    <div class="col-sm-5 mb-2">
                        <label>Google Review Image</label>
                        <input type="file" name="google_review_image" class="form-control" />

                        @if(isset($details) && $details->google_review_image)
                        <div class="mt-2">
                            <img src="{{ asset($details->google_review_image) }}" width="100" alt="Current google review image">
                            <input type="hidden" name="old_google_review_image" value="{{ base64_encode($details->google_review_image) }}">
                        </div>
                        @endif

                        @error('image')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-sm-5 mb-3">
                        <label>Google Review Link</label>
                        <input type="text" name="google_review_url" class="form-control" 
                            value="{{ old('google_review_url', $details->google_review_url ?? '') }}" placeholder="Enter google Review Url" />
                        @error('google_review_url')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <!-- Open in new tab -->
                    <div class="col-sm-2 mb-2 swich_bntts">
                        <label>Enable</label>
                        <div class="block_araea mt-1">
                            <label class="switch">
                                <input type="checkbox" name="google_review_enable" value="1" {{ (old('google_review_enable', $details->google_review_enable ?? 0) == 1) ? 'checked' : '' }} />
                                <small></small>
                            </label>
                        </div>
                    </div>
                    
                    <!-- Image Upload -->
                    <div class="col-sm-5 mb-2">
                        <label>Trust Pilot Image</label>
                        <input type="file" name="trust_pilot_image" class="form-control" />
                        @if(isset($details) && $details->trust_pilot_image)
                        <div class="mt-2">
                            <img src="{{ asset($details->trust_pilot_image) }}" width="100" alt="Current trust pilot image">
                            <input type="hidden" name="old_trust_pilot_image" value="{{ base64_encode($details->trust_pilot_image) }}">
                        </div>
                        @endif
                        @error('trust_pilot_image')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-sm-5 mb-3">
                        <label>Trust Pilot Link</label>
                        <input type="text" name="trust_pilot_url" class="form-control" 
                            value="{{ old('trust_pilot_url', $details->trust_pilot_url ?? '') }}" placeholder="Enter Trust Pilot Url" />
                        @error('trust_pilot_url')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <!-- Open in new tab -->
                    <div class="col-sm-2 mb-2 swich_bntts">
                        <label>Enable</label>
                        <div class="block_araea mt-1">
                            <label class="switch">
                                <input type="checkbox" name="trust_pilot_enable" value="1" {{ (old('trust_pilot_enable', $details->trust_pilot_enable ?? 0) == 1) ? 'checked' : '' }} />
                                <small></small>
                            </label>
                        </div>
                    </div>
                    <hr>
                    <div class="col-sm-6 mb-3">
                        <label>Subscribe Title</label>
                        <input type="text" name="subscribe_title" class="form-control" 
                            value="{{ old('subscribe_title', $details->subscribe_title ?? '') }}" placeholder="Enter sub title" />
                        @error('subscribe_title')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-sm-6 mb-3">
                        <label>Subscribe Content</label>
                        <textarea name="subscribe_content" placeholder="Enter Subscribe Content" class="form-control"  id="">{{ old('subscribe_content', $details->subscribe_content ?? '') }}</textarea>
                        @error('subscribe_content')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-sm-10 mb-3">
                        <label>Subscribe Embed Code</label>
                        <textarea name="subscribe_embededcode" placeholder="Enter Subscribe Embeded code" class="form-control" id="">{{ old('subscribe_embededcode', $details->subscribe_embededcode ?? '') }}</textarea>
                        @error('subscribe_embededcode')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    
                    <!-- Open in new tab -->
                    <div class="col-sm-2 mb-2 swich_bntts">
                        <label>Subscribe Enable</label>
                        <div class="block_araea mt-1">
                            <label class="switch">
                                <input type="checkbox" name="subscribe_enable" value="1" {{ (old('subscribe_enable', $details->subscribe_enable ?? 0) == 1) ? 'checked' : '' }} />
                                <small></small>
                            </label>
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