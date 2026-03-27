@extends('layouts.app')

@section('title', isset($details) ? 'Edit Media' : 'Add Media')

@section('content')
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">{{ isset($details) ? 'Edit' : 'Add' }} Media</h1>
        <a href="{{ route('media.index') }}" class="btn btn-sm btn-primary shadow-sm">
            <i class="fas fa-arrow-left fa-sm text-white-50"></i> Back
        </a>
    </div>

    @include('common.alert')

    <div class="card shadow mb-4">

        <!-- IMPORTANT: enctype added -->
        <form method="POST" action="{{ route('media.store') }}" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" value="{{ $details->id ?? '' }}">

            <div class="card-body">

                <!-- TITLE -->
                <div class="form-group">
                    <label>Title <span class="text-danger">*</span></label>
                    <input type="text" name="title" class="form-control" placeholder="Enter Title"
                        value="{{ old('title', $details->title ?? '') }}" required>
                    @error('title')<span class="text-danger">{{ $message }}</span>@enderror
                </div>

                <!-- SHORT DESCRIPTION -->
                <div class="form-group">
                    <label>Short Description</label>
                    <textarea name="short_description" class="form-control" rows="3"
                        placeholder="Enter short description">{{ old('short_description', $details->short_description ?? '') }}</textarea>
                    @error('short_description')<span class="text-danger">{{ $message }}</span>@enderror
                </div>

                <!-- DESCRIPTION (CKEDITOR) -->
                <div class="form-group">
                    <label>Description</label>
                    <textarea name="description" id="media_description_editor" class="form-control" rows="5">
                        {{ old('description', $details->description ?? '') }}
                    </textarea>
                    @error('description')<span class="text-danger">{{ $message }}</span>@enderror
                </div>

                <!-- DATE -->
                <div class="form-group">
                    <label>Date</label>
                    <input type="date" name="date" class="form-control"
                        value="{{ old('date', $details->date ?? '') }}">
                    @error('date')<span class="text-danger">{{ $message }}</span>@enderror
                </div>

                <!-- IMAGE -->
                <div class="form-group">
                    <label>Image {{ isset($details) ? '' : '*' }}</label>
                    <input type="file" name="image" class="form-control">

                    @error('image')<span class="text-danger">{{ $message }}</span>@enderror

                    @if(!empty($details->image))
                        <div class="mt-2">
                            <p>Old Image:</p>
                            <img src="{{ $details->image }}" alt="Media Image" width="150" class="img-thumbnail">
                        </div>
                    @endif
                </div>

                <!-- STATUS -->
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
                <a class="btn btn-secondary float-right mr-2" href="{{ route('media.index') }}">Cancel</a>
            </div>
        </form>
    </div>
</div>
@endsection

@section('scripts')

<script src="{{ url('ckeditor/ckeditor.js') }}"></script>
<script src="{{ url('ckfinder/ckfinder.js') }}"></script>

<script type="text/javascript">
    CKEDITOR.replace('media_description_editor', {
        uiColor: '#DAF2FE',
        forcePasteAsPlainText: false,
        toolbar: [
            ['Source', '-', '-'],
            ['PasteFromWord', '-', 'SpellChecker'],
            ['SelectAll', 'RemoveFormat'],
            ['ImageButton'],
            ['Bold', 'Italic', 'Underline', '-', 'Subscript', 'Superscript'],
            ['NumberedList', 'BulletedList', '-', 'Blockquote'],
            ['JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock'],
            ['Link', 'Unlink', 'Anchor'],
            ['Image', 'Flash', 'Table', 'HorizontalRule', 'SpecialChar', 'PageBreak', 'Format', 'Font', 'FontSize', 'TextColor', 'BGColor']
        ],
        filebrowserBrowseUrl: '{{ url('ckfinder/ckfinder.html') }}',
        filebrowserImageBrowseUrl: '{{ url('ckfinder/ckfinder.html?Type=Images') }}',
        filebrowserUploadUrl: '{{ url('ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files') }}',
        filebrowserImageUploadUrl: '{{ url('ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images') }}',
        skin: 'kama'
    });
</script>

@endsection
