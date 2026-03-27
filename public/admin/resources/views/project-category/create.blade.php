@extends('layouts.app')

@section('title', isset($details) ? 'Edit Project Category' : 'Add Project Category')

@section('content')
<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">{{ isset($details) ? 'Edit' : 'Add' }} Project Category</h1>
        <a href="{{ route('project-category.index') }}" class="btn btn-sm btn-primary shadow-sm">
            <i class="fas fa-arrow-left fa-sm text-white-50"></i> Back
        </a>
    </div>

    @include('common.alert')

    <div class="card shadow mb-4">
        <form method="POST" action="{{ route('project-category.store') }}" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" value="{{ $details->id ?? '' }}">

            <div class="card-body">

                {{-- Title --}}
                <div class="form-group">
                    <label>Title <span class="text-danger">*</span></label>
                    <input type="text" name="title" class="form-control" placeholder="Enter Title"
                        value="{{ old('title', $details->title ?? '') }}" required>
                    @error('title')<span class="text-danger">{{ $message }}</span>@enderror
                </div>

                {{-- Description --}}
                <div class="form-group">
                    <label>Description</label>
                    <textarea name="description" id="description_editor" class="form-control" rows="5">{{ old('description', $details->description ?? '') }}</textarea>
                    @error('description')<span class="text-danger">{{ $message }}</span>@enderror
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
                <a class="btn btn-secondary float-right mr-2" href="{{ route('project-category.index') }}">Cancel</a>
            </div>

        </form>
    </div>

</div>
@endsection

@section('scripts')

{{-- CKEditor --}}
<script src="{{ url('ckeditor/ckeditor.js') }}"></script>
<script src="{{ url('ckfinder/ckfinder.js') }}"></script>

<script type="text/javascript">
    CKEDITOR.replace('description_editor', {
        uiColor: '#DAF2FE',
        forcePasteAsPlainText: false,
        toolbar: [
            ['Source', '-', '-'],
            ['PasteFromWord', '-', 'SpellChecker'],
            ['SelectAll', 'RemoveFormat'],
            ['Bold', 'Italic', 'Underline', '-', 'Subscript', 'Superscript'],
            ['NumberedList', 'BulletedList', '-', 'Blockquote'],
            ['JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock'],
            ['Link', 'Unlink'],
            ['Image', 'Flash', 'Table', 'HorizontalRule', 'SpecialChar'],
            ['Font', 'FontSize', 'TextColor', 'BGColor']
        ],
        filebrowserBrowseUrl: '{{ url('ckfinder/ckfinder.html') }}',
        filebrowserImageBrowseUrl: '{{ url('ckfinder/ckfinder.html?Type=Images') }}',
        filebrowserUploadUrl: '{{ url('ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files') }}',
        filebrowserImageUploadUrl: '{{ url('ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images') }}',
        skin: 'kama'
    });
</script>

@endsection
