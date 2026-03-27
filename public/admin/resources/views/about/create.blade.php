@extends('layouts.app')

@section('title', isset($details) ? 'Edit About Us' : 'Add About Us')

@section('content')
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">{{ isset($details) ? 'Edit' : 'Add' }} About Us</h1>
        <a href="{{ route('about-us.index') }}" class="btn btn-sm btn-primary shadow-sm">
            <i class="fas fa-arrow-left fa-sm text-white-50"></i> Back
        </a>
    </div>

    @include('common.alert')

    <div class="card shadow mb-4">
        <form method="POST" action="{{ route('about-us.store')}}" enctype="multipart/form-data">
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
    <label>Description <span class="text-danger">*</span></label>
<textarea name="description" id="f_content8" class="form-control" rows="5">{{ old('description', $details->description ?? '') }}</textarea>    @error('description')<span class="text-danger">{{ $message }}</span>@enderror
</div>


                <div class="form-group">
                    <label>Leadership</label>
                    <input type="text" name="leadership" class="form-control" placeholder="Enter Leadership Info"
                        value="{{ old('leadership', $details->leadership ?? '') }}">
                </div>

                <div class="form-group">
                    <label>Leadership Image @if(!isset($details)) <span class="text-danger">*</span> @endif</label>
                    <input type="file" name="leadership_image" class="form-control" accept="image/*">
                    @if(!empty($details->leadership_image))
                        <input type="hidden" name="old_image" value="{{ $details->leadership_image }}">
                        <img src="{{ asset($details->leadership_image) }}" style="max-width:150px;margin-top:10px;">
                    @endif
                    @error('leadership_image')<span class="text-danger">{{ $message }}</span>@enderror
                </div>

                <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="name" class="form-control" placeholder="Enter Name"
                        value="{{ old('name', $details->name ?? '') }}">
                </div>

                <div class="form-group">
                    <label>Designation</label>
                    <input type="text" name="designation" class="form-control" placeholder="Enter Designation"
                        value="{{ old('designation', $details->designation ?? '') }}">
                </div>

                <!-- <div class="form-group">
                    <label>Meta Title</label>
                    <input type="text" name="meta_title" class="form-control" placeholder="Enter Meta Title"
                        value="{{ old('meta_title', $details->meta_title ?? '') }}">
                </div>

                <div class="form-group">
                    <label>Meta Keyword</label>
                    <input type="text" name="meta_keyword" class="form-control" placeholder="Enter Meta Keyword"
                        value="{{ old('meta_keyword', $details->meta_keyword ?? '') }}">
                </div>

                <div class="form-group">
                    <label>Meta Description</label>
                    <textarea name="meta_description" id="meta_description_editor" class="form-control" rows="3">{{ old('meta_description', $details->meta_description ?? '') }}</textarea>
                </div> -->
                <div class="form-group">
                    <label>Footer Content</label>
                    <textarea name="footer_content" id="footer_content_editor" class="form-control" rows="5">{{ old('footer_content', $details->footer_content ?? '') }}</textarea>
                    @error('footer_content')<span class="text-danger">{{ $message }}</span>@enderror
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
                <a class="btn btn-secondary float-right mr-2" href="{{ route('about-us.index') }}">Cancel</a>
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
<script type="text/javascript">
    // Footer Content Editor
    CKEDITOR.replace('footer_content_editor', {
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
        filebrowserFlashBrowseUrl: '{{ url('ckfinder/ckfinder.html?Type=Flash') }}',
        filebrowserUploadUrl: '{{ url('ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files') }}',
        filebrowserImageUploadUrl: '{{ url('ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images') }}',
        filebrowserFlashUploadUrl: '{{ url('ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash') }}',
        skin: 'kama'
    });
</script>
@endsection
