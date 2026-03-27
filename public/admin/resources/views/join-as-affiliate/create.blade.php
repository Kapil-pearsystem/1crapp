@extends('layouts.app')

@section('title', isset($details) ? 'Edit Join As Affiliate' : 'Add Join As Affiliate')

@section('content')
<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">{{ isset($details) ? 'Edit' : 'Add' }} Join As Affiliate</h1>
        <a href="{{ route('join-as-affiliate.index') }}" class="btn btn-sm btn-primary shadow-sm">
            <i class="fas fa-arrow-left fa-sm text-white-50"></i> Back
        </a>
    </div>

    @include('common.alert')

    <div class="card shadow mb-4">
        <form method="POST" action="{{ route('join-as-affiliate.store') }}" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" value="{{ $details->id ?? '' }}">

            <div class="card-body">

                <!-- TITLE -->
                <div class="form-group">
                    <label>Title <span class="text-danger">*</span></label>
                    <input type="text" name="title" class="form-control" required
                           value="{{ old('title', $details->title ?? '') }}">
                </div>

                <!-- SHORT DESCRIPTION -->
                <div class="form-group">
                    <label>Short Description</label>
                    <textarea name="short_description" class="form-control" rows="3">{{ old('short_description', $details->short_description ?? '') }}</textarea>
                </div>

                <!-- DESCRIPTION -->
                <div class="form-group">
                    <label>Description</label>
                    <textarea name="description" id="description_editor" class="form-control" rows="5">{{ old('description', $details->description ?? '') }}</textarea>
                </div>

                <hr>

                <!-- MAIN IMAGE -->
                <div class="form-row align-items-end">

                    <div class="col-md-6">
                        <label>Main Image Title</label>
                        <input type="text" name="image_title" class="form-control"
                            value="{{ old('image_title', $details->image_title ?? '') }}">
                    </div>

                    <div class="col-md-6">
                        <label>Main Image</label>
                        <input type="file" name="image" accept="image/*" class="form-control">
                        @if(!empty($details->image))
                            <img src="{{ $details->image }}" class="img-thumbnail mt-2" style="max-width: 180px;">
                        @endif
                    </div>

                </div>

                <hr>

                <!-- IMAGE BLOCK 1 -->
                <div class="form-row align-items-end">

                    <div class="col-md-6">
                        <label>Image Title 1</label>
                        <input type="text" name="image_title1" class="form-control"
                               value="{{ old('image_title1', $details->image_title1 ?? '') }}">
                    </div>

                    <div class="col-md-6">
                        <label>Image 1</label>
                        <input type="file" name="image1" accept="image/*" class="form-control">
                        @if(!empty($details->image1))
                            <img src="{{ $details->image1 }}" class="img-thumbnail mt-2" style="max-width: 180px;">
                        @endif
                    </div>

                </div>

                <hr>

                <!-- IMAGE BLOCK 2 -->
                <div class="form-row align-items-end">

                    <div class="col-md-6">
                        <label>Image Title 2</label>
                        <input type="text" name="image_title2" class="form-control"
                               value="{{ old('image_title2', $details->image_title2 ?? '') }}">
                    </div>

                    <div class="col-md-6">
                        <label>Image 2</label>
                        <input type="file" name="image2" accept="image/*" class="form-control">
                        @if(!empty($details->image2))
                            <img src="{{ $details->image2 }}" class="img-thumbnail mt-2" style="max-width: 180px;">
                        @endif
                    </div>

                </div>

                <hr>

                <!-- VIDEO SECTION -->
                <div class="form-row mt-4">

                    <div class="col-md-4">
                        <label>Video Title</label>
                        <input type="text" name="video_title" class="form-control"
                               value="{{ old('video_title', $details->video_title ?? '') }}">
                    </div>

                    <div class="col-md-4">
                        <label>Video Subtitle</label>
                        <input type="text" name="video_subtitle" class="form-control"
                               value="{{ old('video_subtitle', $details->video_subtitle ?? '') }}">
                    </div>

                    <div class="col-md-4">
                        <label>YouTube Video URL</label>
                        <input type="text" name="video_url" class="form-control"
                               placeholder="https://www.youtube.com/embed/xxxx"
                               value="{{ old('video_url', $details->video_url ?? '') }}">
                    </div>

                </div>

                <hr>

                <!-- STATUS -->
                <div class="form-group mt-3">
                    <label>Status <span class="text-danger">*</span></label>
                    <select name="status" class="form-control">
                        <option value="1" {{ old('status', $details->status ?? 1) == 1 ? 'selected' : '' }}>Active</option>
                        <option value="0" {{ old('status', $details->status ?? 1) == 0 ? 'selected' : '' }}>Inactive</option>
                    </select>
                </div>

            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-success float-right">
                    {{ isset($details) ? 'Update' : 'Add' }}
                </button>
                <a href="{{ route('join-as-affiliate.index') }}" class="btn btn-secondary float-right mr-2">Cancel</a>
            </div>

        </form>
    </div>

</div>
@endsection

@section('scripts')
<script src="{{ url('ckeditor/ckeditor.js') }}"></script>
<script src="{{ url('ckfinder/ckfinder.js') }}"></script>

<script>
    CKEDITOR.replace('description_editor', {
        uiColor: '#DAF2FE',
        filebrowserBrowseUrl: '{{ url("ckfinder/ckfinder.html") }}',
        filebrowserImageBrowseUrl: '{{ url("ckfinder/ckfinder.html?Type=Images") }}',
        filebrowserUploadUrl: '{{ url("ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files") }}',
        filebrowserImageUploadUrl: '{{ url("ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images") }}',
        skin: 'kama'
    });
</script>
@endsection
