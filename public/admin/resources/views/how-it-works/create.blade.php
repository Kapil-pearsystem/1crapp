@extends('layouts.app')

@section('title', isset($details) ? 'Edit How It Works' : 'Add How It Works')

@section('content')
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">{{ isset($details) ? 'Edit' : 'Add' }} How It Works</h1>
        <a href="{{ route('how-it-works.index') }}" class="btn btn-sm btn-primary shadow-sm">
            <i class="fas fa-arrow-left fa-sm text-white-50"></i> Back
        </a>
    </div>

    @include('common.alert')

    <div class="card shadow mb-4">
        <form method="POST" action="{{ route('how-it-works.store') }}" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" value="{{ $details->id ?? '' }}">

            <div class="card-body">
                <div class="form-group row">
                    <div class="col-sm-6 mb-3">
                        <label><span style="color: red;">*</span> Category Name</label>
                        <select name="category" class="form-control" required>
                            <option value="">Select Category</option>
                            <option value="1" {{ old('category', $details->category ?? '') == 1 ? 'selected' : '' }}>How It Works</option>
                            <option value="2" {{ old('category', $details->category ?? '') == 2 ? 'selected' : '' }}>Plus you can</option>
                        </select>
                        @error('category')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="col-sm-6 mb-3">
                        <label><span style="color: red;">*</span> Section Side</label>
                        <select name="section_side" class="form-control" required>
                            <option value="">Select Side</option>
                            <option value="left" {{ old('section_side', $details->section_side ?? '') == 'left' ? 'selected' : '' }}>Left</option>
                            <option value="right" {{ old('section_side', $details->section_side ?? '') == 'right' ? 'selected' : '' }}>Right</option>
                        </select>
                        @error('section_side')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="col-sm-6 mb-3">
                        <label><span style="color: red;">*</span> Step</label>
                        <select name="step" class="form-control" required>
                            <option value="">Select Step</option>
                            @for($i = 1; $i <= 10; $i++)
                                <option value="{{ $i }}" {{ old('step', $details->step ?? '') == $i ? 'selected' : '' }}>{{ $i }}</option>
                                @endfor
                        </select>
                        @error('step')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="col-sm-6 mb-3">
                        <label><span style="color: red;">*</span> Title</label>
                        <input type="text" name="title" class="form-control" required
                            value="{{ old('title', $details->title ?? '') }}" placeholder="Enter title" />
                        @error('title')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="col-sm-6 mb-3">
                        <label><span style="color: red;">*</span> Priority</label>
                        <input type="number" name="priority" class="form-control" required
                            value="{{ old('priority', $details->priority ?? '') }}" placeholder="Enter priority" />
                        @error('priority')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-sm-4 mb-2">
                        <label><span style="color: red;">*</span>Solid Button Link</label>
                        <input type="url" name="btn_link" placeholder="Solid Button Link" required
                            value="{{ old('btn_link', $details->btn_link ?? '') }}" class="form-control" />
                        @error('url')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Open in new tab -->
                    <div class="col-sm-2 mb-2 swich_bntts">
                        <label>Open in New Tab</label>
                        <div class="block_araea mt-1">
                            <label class="switch">
                                <input type="checkbox" name="btn_link_new_tab" value="1" {{ (old('btn_link_new_tab', $details->btn_link_new_tab ?? 0) == 1) ? 'checked' : '' }} />
                                <small></small>
                            </label>
                        </div>
                    </div>

                    <div class="col-sm-12 mb-3">
                        <label><span style="color: red;">*</span> Description</label>
                        <textarea id="f_content8" name="description" class="form-control" rows="4">{{ old('description', $details->description ?? '') }}</textarea>
                        @error('description')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

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

                    <!-- Images -->

                    <div class="col-12">
                        <label><b>Images</b></label>

                        <!-- Image input template to clone -->
                        <div id="image-container">
                            <div class="image-info-section mb-3" id="new-image-template">
                                <div class="row">
                                    <div class="col-lg-10">
                                        <input type="file" name="images[]" class="form-control" accept="image/*" />
                                    </div>
                                    <div class="col-lg-2">
                                        <button type="button" class="btn btn-danger remove-image">Remove</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <button type="button" class="btn btn-primary mt-2" id="add-image-btn">+ Add Image</button>

                        <!-- Existing images -->
                        @if(isset($details) && !empty($details->images))
                        <div class="mt-4">
                            <label><b>Existing Images</b></label>
                            @foreach(explode(',', $details->images) as $img)
                            <div class="image-section mb-3 existing-image">
                                <div class="row">
                                    <div class="col-lg-10">
                                        <img src="{{ asset($img) }}" width="100" class="mb-2" />
                                        <input type="hidden" name="existing_images[]" value="{{ $img }}">
                                    </div>
                                    <div class="col-lg-2">
                                        <button type="button" class="btn btn-danger remove-existing-image">Remove</button>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        @endif

                    </div>

                </div>
            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-success float-right">
                    {{ isset($details) ? 'Update' : 'Add' }}
                </button>
                <a class="btn btn-secondary float-right mr-2" href="{{ route('how-it-works.index') }}">Cancel</a>
            </div>
        </form>
    </div>
</div>
@endsection

@section('scripts')
<!-- Add this in your Blade layout before </body> -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- CKEditor & CKFinder -->
<script src="{{ url('ckeditor/ckeditor.js') }}"></script>
<script src="{{ url('ckfinder/ckfinder.js') }}"></script>

<script>
    CKEDITOR.replace('f_content8', {
        uiColor: '#DAF2FE',
        toolbar: [
            ['Bold', 'Italic', 'Underline'],
            ['NumberedList', 'BulletedList'],
            ['Link', 'Unlink'],
            ['Image', 'Table'],
            ['Font', 'FontSize', 'TextColor', 'BGColor']
        ],
        filebrowserBrowseUrl: '{{ url("ckfinder/ckfinder.html") }}',
        filebrowserImageBrowseUrl: '{{ url("ckfinder/ckfinder.html?Type=Images") }}',
        filebrowserUploadUrl: '{{ url("ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files") }}',
        filebrowserImageUploadUrl: '{{ url("ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images") }}'
    });
</script>

<script>
    $(document).ready(function() {
        // Add new image input by cloning template
        $('#add-image-btn').on('click', function() {
            // alert("hello");
            let template = $('#new-image-template').clone();
            template.removeAttr('id');
            template.find('input[type="file"]').val('');
            $('#image-container').append(template);
        });

        // Remove newly added image input
        $(document).on('click', '.remove-image', function() {
            if ($('#image-container .image-info-section').length > 1) {
                $(this).closest('.image-info-section').remove();
            } else {
                alert('At least one image input is required.');
            }
        });

        // Remove existing image preview (optional: mark for deletion in backend if needed)
        $(document).on('click', '.remove-existing-image', function() {
            $(this).closest('.existing-image').remove();
        });
        $('form').on('submit', function(e) {
            for (instance in CKEDITOR.instances) {
                CKEDITOR.instances[instance].updateElement();
            }
            let desc = $('#f_content8').val().trim();
            if (desc.length === 0) {
                alert('Description is required');
                CKEDITOR.instances['f_content8'].focus();
                e.preventDefault();
            }
        });
    });
</script>
@endsection