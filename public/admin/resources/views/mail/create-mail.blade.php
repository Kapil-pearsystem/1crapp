@extends('layouts.app')
@section('title', isset($details) ? 'Edit Gift Mail' : 'Add Mail')
@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">{{ isset($details) ? 'Edit' : 'Add' }} Mail</h1>
        <a href="{{ route('mail.index') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-arrow-left fa-sm text-white-50"></i> Back</a>
    </div>
    {{-- Alert Messages --}}
    @include('common.alert')
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <form  method="POST" action="{{ route('mail.store') }}" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" value="{{ isset($details) ? $details->id : '' }}">
            <div class="card-body">
                <div class="form-group row">
                    <!-- Name Field -->

                    <div class="col-sm-4 mb-3 mt-3 mb-sm-0">
                        <label><span style="color: red;">*</span> Category</label>
                        <select name="category" id="category" required  class="form-control form-control-user">
                            <option value="">Select Category</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ (old('category') ?? ($details->category ?? '')) == $category->id ? 'selected' : '' }}>{{ $category->title }}</option>
                            @endforeach
                        </select>
                        <span class="text-danger" id="category-error"></span>
                    </div>
                    <div class="col-sm-4 mb-3 mt-3 mb-sm-0">
                        <label><span style="color: red;">*</span> Template Name</label>
                        <input type="text" name="temp_name" id="title" required value="{{ old('temp_name') ?? ($details->temp_name ?? '') }}" placeholder="Enter Template Name"  class="form-control form-control-user" />
                        <span class="text-danger" id="temp_name-error"></span>
                    </div>
                    <div class="col-sm-4 mb-3 mt-3 mb-sm-0">
                        <label><span style="color: red;">*</span> Title</label>
                        <input type="text" name="title" id="title" required value="{{ old('title') ?? ($details->title ?? '') }}" placeholder="Enter Title"  class="form-control form-control-user" />
                        <span class="text-danger" id="title-error"></span>
                    </div>
                    <div class="col-sm-12 mb-3 mt-3 mb-sm-0">
                        <label><span style="color: red;">*</span> Celebration Title</label>
                        <input type="text" name="celebration_title" id="celebration_title" required value="{{ old('celebration_title') ?? ($details->celebration_title ?? '') }}" placeholder="Enter Celebration Title"  class="form-control form-control-user" />
                        <span class="text-danger" id="celebration_title-error"></span>
                    </div>
                    <div class="col-sm-12 mb-3 mt-3 mb-sm-0">
                        <label><span style="color: red;">*</span> Subject</label>
                        <input type="text" name="subject" id="subject" required value="{{ old('subject') ?? ($details->subject ?? '') }}" placeholder="Enter Subject"  class="form-control form-control-user" />
                        <span class="text-danger" id="subject-error"></span>
                    </div>
                    <div class="col-sm-12 mb-3 mt-3 mb-sm-0">
                        <label><span style="color: red;">*</span>Agent Subject</label>
                        <input type="text" name="agent_subject" id="agent_subject" required value="{{ old('agent_subject') ?? ($details->agent_subject ?? '') }}" placeholder="Enter Agent Subject"  class="form-control form-control-user" />
                        <span class="text-danger" id="agent_subject-error"></span>
                    </div>
                    <div class="col-sm-12 mb-3 mt-3 mb-sm-0">
                        <span style="color: red;">*</span>Content
                        <textarea id="f_content8" name="content" placeholder="Content" class="form-control form-control-user"  rows="4" cols="50">{{ old('content') ?? ($details->content ?? '') }}</textarea>
                        <span class="text-danger" id="content-error"></span>
					</div>
                    <div class="col-sm-2 mb-3 mt-3 mb-sm-0">
                        <label>CTA Enable</label>
                    </div>
                    <div class="col-sm-10 mb-3 mt-3 mb-sm-0 swich_bntts">
                        <div class="block_araea">
                            <label class="switch"><input value="1" type="checkbox" id="ctaCheckbox" name="cta_visible" {{ (old('cta_visible') ?? ($details->cta_visible ?? '')) == 1 ? 'checked' : '' }}/> <small></small></label>
                        </div>
                    </div>
                    <div class="col-sm-4 mb-3 mt-3 mb-sm-0">
                        <label>Type</label>
                        <select name="cta_type" id="cta_type" onchange="setDestination(this.value)" class="form-control form-control-user cta-field">
                            <option value="assets">My Digital Assets</option>
                            <option value="page">Custom Page</option>
                            <option value="custom" selected>Custom URL</option>
                        </select>
                        <span class="text-danger" id="link_from-error"></span>
                    </div>
                    <div class="col-sm-4 mb-3 mt-4 mb-sm-0" id="support_id">
                        Link
                        <input type="url" id="cta_link" placeholder="Enter Support URL" name="success_destination" value="{{ old('cta_link') ?? ($details->cta_link ?? '') }}" class="form-control form-control-user cta-field" />
                        <span class="text-danger" id="cta_link-error"></span>
                    </div>

                    <div class="col-sm-4 mb-3 mt-3 mb-sm-0">
                        <label> Title</label>
                        <input type="text" name="cta_title" id="cta_title" value="{{ old('cta_title') ?? ($details->cta_title ?? '') }}" placeholder="Enter CTA Title"  class="form-control form-control-user cta-field" />
                        <span class="text-danger" id="temp_name-error"></span>
                    </div>
                    <div class="col-sm-12 mb-3 mt-3 mb-sm-0">
                        <label> CTA Text</label>
                        <input type="text" name="cta_text" id="cta_title" value="{{ old('cta_text') ?? ($details->cta_text ?? '') }}" placeholder="Enter CTA Text"  class="form-control form-control-user cta-field" />
                        <span class="text-danger" id="cta_text-error"></span>
                    </div>
                    <!-- Signature -->
                    <div class="col-sm-2 mb-3 mt-3 mb-sm-0">
                        <label>Signature Enable</label>
                    </div>
                    <div class="col-sm-10 mb-3 mt-3 mb-sm-0 swich_bntts">
                        <div class="block_araea">
                            <label class="switch"><input value="1" type="checkbox" id="signatureCheckbox" name="signature_visible" {{ (old('signature_visible') ?? ($details->signature_visible ?? '')) == 1 ? 'checked' : '' }}/> <small></small></label>
                        </div>
                    </div>
                    <div class="col-sm-3 mb-3 mt-3 mb-sm-0">
                        <label> Name</label>
                        <input type="text" name="sign_name" id="sign_name" value="{{ old('sign_name') ?? ($details->sign_name ?? '') }}" placeholder="Enter signature name"  class="form-control form-control-user signature_fields" />
                        <span class="text-danger" id="sign_name-error"></span>
                    </div>
                    <div class="col-sm-3 mb-3 mt-3 mb-sm-0">
                        <label> Web</label>
                        <input type="url" name="sign_web" id="sign_name"  value="{{ old('sign_web') ?? ($details->sign_web ?? '') }}" placeholder="Enter signature web url"  class="form-control form-control-user" />
                        <span class="text-danger" id="sign_web-error"></span>
                    </div>
                    <div class="col-sm-3 mb-3 mt-3 mb-sm-0">
                        <label> Email</label>
                        <input type="email" name="sign_email" id="sign_email" value="{{ old('sign_email') ?? ($details->sign_email ?? '') }}" placeholder="Enter signature email"  class="form-control form-control-user " />
                        <span class="text-danger" id="sign_email-error"></span>
                    </div>
                    <div class="col-sm-3 mb-3 mt-3 mb-sm-0">
                        <label> Phone</label>
                        <input type="text" name="sign_phone" id="sign_phone"  value="{{ old('sign_phone') ?? ($details->sign_phone ?? '') }}" placeholder="Enter signature phone"  class="form-control form-control-user" />
                        <span class="text-danger" id="sign_phone-error"></span>
                    </div>
                    <!-- p.s. -->
                    <div class="col-sm-2 mb-3 mt-3 mb-sm-0">
                        <label>P.S. Enable</label>
                    </div>
                    <div class="col-sm-10 mb-3 mt-3 mb-sm-0 swich_bntts">
                        <div class="block_araea">
                            <label class="switch"><input value="1" type="checkbox" id="psCheckbox" name="ps_visible" {{ (old('ps_visible') ?? ($details->ps_visible ?? '')) == 1 ? 'checked' : '' }}/> <small></small></label>
                        </div>
                    </div>
                    <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                        <label> Title</label>
                        <input type="text" name="ps_title" id="ps_title" value="{{ old('ps_title') ?? ($details->ps_title ?? '') }}" placeholder="Enter P.S. Title"  class="form-control form-control-user ps_fields" />
                        <span class="text-danger" id="ps_title-error"></span>
                    </div>
                    <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                        <label> Link</label>
                        <input type="url" name="ps_link" id="ps_link" value="{{ old('ps_link') ?? ($details->ps_link ?? '') }}" placeholder="Enter P.S. Link"  class="form-control form-control-user" />
                        <span class="text-danger" id="ps_link-error"></span>
                    </div>

                    <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                        <label>Logo</label>
                        <input type="hidden" name="old_logo"  value="{{ isset($details) ?  base64_encode($details->logo) : '' }}"/>
                        <input type="file" name="logo" id="logo" placeholder="Select Logo"  class="form-control form-control-user" />
                        <span class="text-danger" id="logo-error"></span>
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
                <a class="btn btn-primary float-right mr-3 mb-3" href="{{ route('mail.index') }}">Cancel</a>
            </div>
        </form>
    </div>
</div>
@endsection
@section('scripts')
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

<script>
    function setDestination(type){
    $.ajax({
        url: '{{ route('form.get-destination') }}',
        type: 'POST',
        data: {
            _token: '{{ csrf_token() }}',
            type: type,
        },
        success: function (response) {
            if(response.status == true){
                $('#support_id').html(response.data);
            } else {
                let notfound = '<div class="col-lg-12"><div class="it_emms"><h3>No More Gift Items Found!</h3></div></div>';
            }
        },
        error: function (xhr) {
            alert('Something went wrong!');
        }
    });
}

</script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const checkbox = document.getElementById("ctaCheckbox");
        const fields = document.querySelectorAll(".cta-field");

        function toggleRequiredFields() {
            const isChecked = checkbox.checked;
            fields.forEach(field => {
                if (isChecked) {
                    field.setAttribute("required", "required");
                } else {
                    field.removeAttribute("required");
                }
            });
        }

        // Initial check on page load
        toggleRequiredFields();

        // Add event listener to the checkbox
        checkbox.addEventListener("change", toggleRequiredFields);
    });
    document.addEventListener("DOMContentLoaded", function () {
        const checkbox = document.getElementById("signatureCheckbox");
        const fields = document.querySelectorAll(".signature_fields");

        function toggleRequiredFields() {
            const isChecked = checkbox.checked;
            fields.forEach(field => {
                if (isChecked) {
                    field.setAttribute("required", "required");
                } else {
                    field.removeAttribute("required");
                }
            });
        }

        // Initial check on page load
        toggleRequiredFields();

        // Add event listener to the checkbox
        checkbox.addEventListener("change", toggleRequiredFields);
    });
    document.addEventListener("DOMContentLoaded", function () {
        const checkbox = document.getElementById("psCheckbox");
        const fields = document.querySelectorAll(".ps_fields");

        function toggleRequiredFields() {
            const isChecked = checkbox.checked;
            fields.forEach(field => {
                if (isChecked) {
                    field.setAttribute("required", "required");
                } else {
                    field.removeAttribute("required");
                }
            });
        }

        // Initial check on page load
        toggleRequiredFields();

        // Add event listener to the checkbox
        checkbox.addEventListener("change", toggleRequiredFields);
    });
</script>
@endsection