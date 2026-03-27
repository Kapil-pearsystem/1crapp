@extends('layouts.app')

@section('title', isset($details) ? 'Edit Landing Banner' : 'Add Landing Banner')

@section('content')
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">{{ isset($details) ? 'Edit' : 'Add' }} Landing Banner</h1>
        <a href="{{ route('landing-banner.index') }}" class="btn btn-sm btn-primary shadow-sm">
            <i class="fas fa-arrow-left fa-sm text-white-50"></i> Back
        </a>
    </div>

    @include('common.alert')

    <div class="card shadow mb-4">
        <form method="POST" action="{{ route('landing-banner.store') }}" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" value="{{ $details->id ?? '' }}">

            <div class="card-body">
                <div class="row">
                    {{-- Title --}}
                    <div class="col-md-6 form-group">
                        <label>Title <span class="text-danger">*</span></label>
                        <input type="text" name="title" class="form-control" placeholder="Enter Title"
                               value="{{ old('title', $details->title ?? '') }}" required>
                        @error('title')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>

                    {{-- Subtitle --}}
                    <div class="col-md-6 form-group">
                        <label>Subtitle</label>
                        <input type="text" name="subtitle" class="form-control" placeholder="Enter Subtitle"
                               value="{{ old('subtitle', $details->subtitle ?? '') }}">
                    </div>

                    {{-- Main Banner Image --}}
                    <div class="col-md-6 form-group">
                        <label>Main Banner Image 
                            @if(!isset($details)) <span class="text-danger">*</span> @endif
                        </label>
                        <input type="file" name="main_image" class="form-control" accept="image/*">
                        @if(!empty($details->main_image))
                            <input type="hidden" name="old_main_image" value="{{ $details->main_image }}">
                            <img src="{{ $details->main_image }}" style="max-width:150px;margin-top:10px;">
                        @endif
                        @error('main_image')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>

                    {{-- Launch Date --}}
                    <div class="col-md-6 form-group">
                        <label>Launch Date</label>
                        <input type="date" name="launch_date" class="form-control" 
                               value="{{ old('launch_date', $details->launch_date ?? '') }}">
                    </div>

                    {{-- Expiry Date --}}
                    <div class="col-md-6 form-group">
                        <label>Expiry Date</label>
                        <input type="date" name="expiry_date" class="form-control" 
                               value="{{ old('expiry_date', $details->expiry_date ?? '') }}">
                    </div>

                    {{-- REPA Number --}}
                    <div class="col-md-6 form-group">
                        <label>REPA Number</label>
                        <input type="text" name="repa_number" class="form-control" placeholder="Enter REPA Number"
                               value="{{ old('repa_number', $details->repa_number ?? '') }}">
                    </div>

                    {{-- Promo Video URL --}}
                    <div class="col-md-6 form-group">
                        <label>Promo Video URL</label>
                        <input type="text" name="promo_video_url" class="form-control"
                               placeholder="Enter Video URL"
                               value="{{ old('promo_video_url', $details->promo_video_url ?? '') }}">
                    </div>

                    {{-- CTA Button Text --}}
                    <div class="col-md-6 form-group">
                        <label>Button Text</label>
                        <input type="text" name="cta_button_text" class="form-control"
                               placeholder="Enter Button Text"
                               value="{{ old('cta_button_text', $details->cta_button_text ?? '') }}">
                    </div>

                    {{-- Status --}}
                    <div class="col-md-6 form-group">
                        <label>Status <span class="text-danger">*</span></label>
                        <select name="status" class="form-control" required>
                            <option value="1" {{ old('status', $details->status ?? 1) == 1 ? 'selected' : '' }}>Active</option>
                            <option value="0" {{ old('status', $details->status ?? 1) == 0 ? 'selected' : '' }}>Inactive</option>
                        </select>
                    </div>
                </div>

                {{-- Slider Images --}}
                <div class="form-group mt-4">
                    <label>Slider Images</label>
                    <small class="text-muted d-block mb-2">Upload multiple images with priority. </small>

                    <div id="slider-images-wrapper">
                        {{-- Existing Images --}}
                        @if(isset($details->images) && count($details->images) > 0)
                            @foreach($details->images as $img)
                                <div class="row mb-3 slider-image-item">
                                    <div class="col-md-5">
                                        
                                        <img src="{{ $img->image_url }}" style="width:100%; height:120px; object-fit:cover;">
                                        <input type="hidden" name="old_image[{{ $img->id }}]" value="{{ $img->image_url }}">
                                    </div>
                                    <div class="col-md-3">
                                        <label>Priority</label>
                                        <input type="number" name="old_priority[{{ $img->id }}]" class="form-control" value="{{ $img->priority }}">
                                    </div>
                                    <div class="col-md-2 d-flex align-items-end">
                                        <a href="{{ route('landing-banner.image.delete', $img->id) }}" onclick="return confirm('Delete this image?')" class="btn btn-danger btn-block">Remove</a>
                                    </div>
                                </div>
                            @endforeach
                        @else
                        {{-- Default first slider image input --}}
                        <div class="row mb-3 slider-image-item">
                            <div class="col-md-5">
                                <label>Image</label>
                                <input type="file" name="slider_images[]" class="form-control" accept="image/*">
                            </div>
                            <div class="col-md-3">
                                <label>Priority</label>
                                <input type="number" name="priority_new[]" class="form-control" value="0">
                            </div>
                            <div class="col-md-2 d-flex align-items-end">
                                <button type="button" class="btn btn-danger btn-block remove-slider-image">Remove</button>
                            </div>
                        </div>
                        @endif
                    </div>

                    {{-- Button to Add New Slider Image --}}
                    <button type="button" id="add-slider-image" class="btn btn-primary btn-sm mt-2">Add Image</button>
                </div>

            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-success float-right">
                    {{ isset($details) ? 'Update' : 'Add' }}
                </button>
                <a class="btn btn-secondary float-right mr-2" href="{{ route('landing-banner.index') }}">Cancel</a>
            </div>
        </form>
    </div>
</div>
@endsection

@section('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {
    const wrapper = document.getElementById('slider-images-wrapper');
    const addBtn = document.getElementById('add-slider-image');

    function addSliderRow() {
        const div = document.createElement('div');
        div.classList.add('row', 'mb-3', 'slider-image-item');
        div.innerHTML = `
            <div class="col-md-5">
                <label>Image</label>
                <input type="file" name="slider_images[]" class="form-control" accept="image/*">
            </div>
            <div class="col-md-3">
                <label>Priority</label>
                <input type="number" name="priority_new[]" class="form-control" value="0">
            </div>
            <div class="col-md-2 d-flex align-items-end">
                <button type="button" class="btn btn-danger btn-block remove-slider-image">Remove</button>
            </div>
        `;
        wrapper.appendChild(div);

        // Remove button functionality
        div.querySelector('.remove-slider-image').addEventListener('click', function () {
            div.remove();
        });
    }

    // Add more image
    addBtn.addEventListener('click', addSliderRow);

    // Existing remove buttons
    document.querySelectorAll('.remove-slider-image').forEach(btn => {
        btn.addEventListener('click', function () {
            btn.closest('.slider-image-item').remove();
        });
    });
});
</script>
@endsection
