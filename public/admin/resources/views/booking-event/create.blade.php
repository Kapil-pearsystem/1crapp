@extends('layouts.app')

@section('title', isset($details) ? 'Edit Booking Event' : 'Add Booking Event')

@section('content')
<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">
            {{ isset($details) ? 'Edit' : 'Add' }} Booking Event
        </h1>
        <a href="{{ route('booking-event.index') }}" class="btn btn-sm btn-primary shadow-sm">
            <i class="fas fa-arrow-left fa-sm text-white-50"></i> Back
        </a>
    </div>

    @include('common.alert')

    <div class="card shadow mb-4">
        <form method="POST" action="{{ route('booking-event.store') }}" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" value="{{ $details->id ?? '' }}">

            <div class="card-body">

                {{-- Step --}}
                <div class="form-group">
                    <label>Step <span class="text-danger">*</span></label>
                    <input type="number" name="step" class="form-control"
                        value="{{ old('step', $details->step ?? '') }}"
                        placeholder="Enter step number" required>
                    @error('step')<span class="text-danger">{{ $message }}</span>@enderror
                </div>

                {{-- Title --}}
                <div class="form-group">
                    <label>Title <span class="text-danger">*</span></label>
                    <input type="text" name="title" class="form-control"
                        value="{{ old('title', $details->title ?? '') }}"
                        placeholder="Enter title" required>
                    @error('title')<span class="text-danger">{{ $message }}</span>@enderror
                </div>

                {{-- Description --}}
                <div class="form-group">
                    <label>Description</label>
                    <textarea name="description" id="description_editor" class="form-control" rows="5">
                        {{ old('description', $details->description ?? '') }}
                    </textarea>
                    @error('description')<span class="text-danger">{{ $message }}</span>@enderror
                </div>

                {{-- Video Link --}}
                <div class="form-group">
                    <label>Video Link</label>
                    <input type="url" name="video_link" class="form-control"
                        value="{{ old('video_link', $details->video_link ?? '') }}"
                        placeholder="https://example.com/video">
                    @error('video_link')<span class="text-danger">{{ $message }}</span>@enderror
                </div>

                {{-- Image --}}
                <div class="form-group">
                    <label>Image @if(!isset($details))<span class="text-danger">*</span>@endif</label>
                    <input type="file" name="image" class="form-control" accept="image/*">

                    @if(!empty($details->image))
                        <input type="hidden" name="old_image" value="{{ $details->image }}">
                        <img src="{{ $details->image }}" style="max-width:150px;margin-top:10px;">
                    @endif

                    @error('image')<span class="text-danger">{{ $message }}</span>@enderror
                </div>

                {{-- Status --}}
                <div class="form-group">
                    <label>Status <span class="text-danger">*</span></label>
                    <select name="status" class="form-control" required>
                        <option value="1" {{ old('status', $details->status ?? 1) == 1 ? 'selected' : '' }}>
                            Active
                        </option>
                        <option value="0" {{ old('status', $details->status ?? 1) == 0 ? 'selected' : '' }}>
                            Inactive
                        </option>
                    </select>
                </div>

            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-success float-right">
                    {{ isset($details) ? 'Update' : 'Add' }}
                </button>
                <a href="{{ route('booking-event.index') }}" class="btn btn-secondary float-right mr-2">
                    Cancel
                </a>
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
        toolbar: [
            ['Source'],
            ['Bold', 'Italic', 'Underline'],
            ['NumberedList', 'BulletedList'],
            ['JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock'],
            ['Link', 'Unlink'],
            ['Image', 'Table', 'HorizontalRule'],
            ['Format', 'Font', 'FontSize', 'TextColor']
        ],
        filebrowserBrowseUrl: '{{ url('ckfinder/ckfinder.html') }}',
        filebrowserImageBrowseUrl: '{{ url('ckfinder/ckfinder.html?Type=Images') }}',
        filebrowserUploadUrl: '{{ url('ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files') }}',
        filebrowserImageUploadUrl: '{{ url('ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images') }}'
    });
</script>

@endsection
