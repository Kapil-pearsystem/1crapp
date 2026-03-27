@extends('layouts.app')

@section('title', isset($details) ? 'Edit Location' : 'Add Location')

@section('content')
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">{{ isset($details) ? 'Edit' : 'Add' }} Landing Location</h1>
        <a href="{{ route('landing-location.index') }}" class="btn btn-sm btn-primary shadow-sm">
            <i class="fas fa-arrow-left fa-sm text-white-50"></i> Back
        </a>
    </div>

    @include('common.alert')

    <div class="card shadow mb-4">
        <form method="POST" action="{{ route('landing-location.store') }}" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" value="{{ $details->id ?? '' }}">

            <div class="card-body">
                <div class="form-group">
                    <label>Title <span class="text-danger">*</span></label>
                    <input type="text" name="title" class="form-control" placeholder="Enter Title" 
                           value="{{ old('title', $details->title ?? '') }}" required>
                    @error('title')<span class="text-danger">{{ $message }}</span>@enderror
                </div>

                <div class="form-group">
                    <label>Image 
                        @if(!isset($details)) <span class="text-danger">*</span> @endif
                    </label>
                    <input type="file" name="image" class="form-control" accept="image/*">
                    @if(!empty($details->image))
                        <input type="hidden" name="old_image" value="{{ $details->image }}">
                        <img src="{{ $details->image }}" style="max-width:150px; margin-top:10px;">
                    @endif
                    @error('image')<span class="text-danger">{{ $message }}</span>@enderror
                </div>

                <div class="form-group">
    <label>Description <span class="text-danger">*</span></label>
<textarea name="description" id="f_content8" class="form-control" rows="5">{{ old('description', $details->description ?? '') }}</textarea>    @error('description')<span class="text-danger">{{ $message }}</span>@enderror
</div>

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
                <a href="{{ route('landing-location.index') }}" class="btn btn-secondary float-right mr-2">Cancel</a>
            </div>
        </form>
    </div>
</div>
@endsection

@section('scripts')

<script src="{{ url('ckeditor/ckeditor.js') }}"></script>
<script src="{{ url('ckfinder/ckfinder.js') }}"></script>


<script type="text/javascript">
	//<![CDATA[
	CKEDITOR.replace('f_content8', {
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
		filebrowserBrowseUrl: '<?php echo url('') ?>ckfinder/ckfinder.html',
		filebrowserImageBrowseUrl: '<?php echo url('') ?>ckfinder/ckfinder.html?Type=Images',
		filebrowserFlashBrowseUrl: '<?php echo url('') ?>ckfinder/ckfinder.html?Type=Flash',
		filebrowserUploadUrl: '<?php echo url('') ?>ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
		filebrowserImageUploadUrl: '<?php echo url('') ?>ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
		filebrowserFlashUploadUrl: '<?php echo url('') ?>ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',
		skin: 'kama'
	});
	//]]>
</script>

@endsection
