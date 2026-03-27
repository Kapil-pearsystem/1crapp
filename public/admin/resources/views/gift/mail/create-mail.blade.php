@extends('layouts.app')
@section('title', isset($details) ? 'Edit Gift Mail' : 'Add Gift Mail')
@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">{{ isset($details) ? 'Edit' : 'Add' }} Gift Mail</h1>
        <a href="{{ route('gift.mail.index') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-arrow-left fa-sm text-white-50"></i> Back</a>
    </div>
    {{-- Alert Messages --}}
    @include('common.alert')
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <form  method="POST" action="{{ route('gift.mail.store') }}">
            @csrf
            <input type="hidden" name="id" value="{{ isset($details) ? $details->id : '' }}">
            <div class="card-body">
                <div class="form-group row">
                    <!-- Name Field -->
                    <div class="col-sm-12 mb-3 mt-3 mb-sm-0">
                        <label><span style="color: red;">*</span> Category</label>
                        <select name="category" id="category" required  class="form-control form-control-user">
                            <option value="">Select Status</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ (old('category') ?? ($details->category ?? '')) == $category->id ? 'selected' : '' }}>{{ $category->title }}</option>
                            @endforeach
                        </select>
                        <span class="text-danger" id="category-error"></span>
                    </div>
                    <div class="col-sm-12 mb-3 mt-3 mb-sm-0">
                        <label><span style="color: red;">*</span> Subject</label>
                        <input type="text" name="subject" id="subject" required value="{{ old('subject') ?? ($details->subject ?? '') }}" placeholder="Enter Subject"  class="form-control form-control-user" />
                        <span class="text-danger" id="subject-error"></span>
                    </div>
                    <div class="col-sm-12 mb-3 mt-3 mb-sm-0">
                        <span style="color: red;">*</span>Content
                        <textarea id="f_content8" name="content" placeholder="Content" class="form-control form-control-user"  rows="4" cols="50">{{ old('content') ?? ($details->content ?? '') }}</textarea>
                        <span class="text-danger" id="content-error"></span>
					</div>
                    <!-- Status Field -->
                    <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                        <label><span style="color: red;">*</span>Status</label>
                        <select name="status" id="status" required  class="form-control form-control-user">
                            <option value="">Select Status</option>
                            <option value="0" {{ (old('status') ?? ($details->status ?? '')) == 0 ? 'selected' : '' }}>Inactive</option>
                            <option value="1" {{ (old('status') ?? ($details->status ?? '')) == 1 ? 'selected' : '' }}>Active</option>
                        </select>
                        <span class="text-danger" id="status-error"></span>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-success btn-user float-right mb-3">
                    {{ isset($details) ? 'Update' : 'Add' }}
                </button>
                <a class="btn btn-primary float-right mr-3 mb-3" href="{{ route('gift.category-list') }}">Cancel</a>
            </div>
        </form>
    </div>
</div>
@endsection
@section('scripts')

<!-- <script>
    document.getElementById('mailForm').addEventListener('submit', function(event) {
        alert('hello');
        // Reset error messages
        document.getElementById('subject-error').innerText = '';
        document.getElementById('content-error').innerText = '';
        document.getElementById('status-error').innerText = '';

        // Client-side validation
        var subject = document.getElementById('subject').value.trim();
        var content = document.getElementById('content').value.trim();
        var status = document.getElementById('status').value;

        var isValid = true;

        if (subject === '') {
            document.getElementById('subject-error').innerText = 'Subject is required';
            isValid = false;
        }

        if (content === '') {
            document.getElementById('content-error').innerText = 'Content is required';
            isValid = false;
        }

        if (status === '') {
            document.getElementById('status-error').innerText = 'Status is required';
            isValid = false;
        }

        // if (!isValid) {
            event.preventDefault(); // Prevent form submission if validation fails
        // }
    });
</script> -->
<script type="text/javascript" src="<?php echo url('ckeditor/ckeditor.js'); ?>"></script>
<script type="text/javascript" src="<?php echo url('ckfinder/ckfinder.js'); ?>"></script>
<script>
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
</script>
@endsection