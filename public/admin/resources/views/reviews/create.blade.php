@extends('layouts.app')

@section('title', isset($details) ? 'Edit Review' : 'Add Review')

@section('content')
<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">{{ isset($details) ? 'Edit' : 'Add' }} Review</h1>
        <a href="{{ route('reviews.index') }}" class="btn btn-sm btn-primary shadow-sm">
            <i class="fas fa-arrow-left fa-sm text-white-50"></i> Back
        </a>
    </div>

    @include('common.alert')

    <div class="card shadow mb-4">
        <form method="POST" action="{{ route('reviews.store') }}" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" value="{{ $details->id ?? '' }}">

            <div class="card-body">

                {{-- Name --}}
                <div class="form-group">
                    <label>Name <span class="text-danger">*</span></label>
                    <input type="text" name="name" class="form-control"
                        value="{{ old('name', $details->name ?? '') }}" placeholder="Enter name" required>
                    @error('name')<span class="text-danger">{{ $message }}</span>@enderror
                </div>

                {{-- Rating --}}
                <div class="form-group">
                    <label>Rating (1 to 5) <span class="text-danger">*</span></label>
                    <select name="rating" class="form-control" required>
                        <option value="">Select Rating</option>
                        @for($i=1; $i<=5; $i++)
                            <option value="{{ $i }}" {{ old('rating', $details->rating ?? '') == $i ? 'selected' : '' }}>
                                {{ $i }}
                            </option>
                        @endfor
                    </select>
                    @error('rating')<span class="text-danger">{{ $message }}</span>@enderror
                </div>

                {{-- Review Text --}}
                <div class="form-group">
                    <label>Review Text <span class="text-danger">*</span></label>
                    <textarea name="review_text" id="review_text_editor" class="form-control" rows="5">
                        {{ old('review_text', $details->review_text ?? '') }}
                    </textarea>
                    @error('review_text')<span class="text-danger">{{ $message }}</span>@enderror
                </div>

                {{-- Image --}}
                <div class="form-group">
                    <label>Reviewer Image @if(!isset($details))<span class="text-danger">*</span>@endif</label>
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
                        <option value="1" {{ old('status', $details->status ?? 1) == 1 ? 'selected' : '' }}>Active</option>
                        <option value="0" {{ old('status', $details->status ?? 1) == 0 ? 'selected' : '' }}>Inactive</option>
                    </select>
                </div>

            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-success float-right">
                    {{ isset($details) ? 'Update' : 'Add' }}
                </button>
                <a href="{{ route('reviews.index') }}" class="btn btn-secondary float-right mr-2">Cancel</a>
            </div>

        </form>
    </div>

</div>
@endsection


@section('scripts')

<script src="{{ url('ckeditor/ckeditor.js') }}"></script>
<script src="{{ url('ckfinder/ckfinder.js') }}"></script>

<script type="text/javascript">
    CKEDITOR.replace('review_text_editor', {
        uiColor: '#DAF2FE',
        forcePasteAsPlainText: false,
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
        filebrowserImageUploadUrl: '{{ url('ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images') }}',
        skin: 'kama'
    });
</script>

@endsection
