@extends('layouts.app')

@section('title', isset($details) ? 'Edit Appointment Booking' : 'Appointment Booking')

@section('content')
<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">
            {{ isset($details) ? 'Edit' : 'Add' }} Appointment Booking
        </h1>

        <a href="{{ route('appointment-thankyou.index') }}" class="btn btn-sm btn-primary">
            <i class="fas fa-arrow-left"></i> Back
        </a>
    </div>

    @include('common.alert')

    <div class="card shadow mb-4">
        <form method="POST" action="{{ route('appointment-thankyou.store') }}" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" value="{{ $details->id ?? '' }}">

            <div class="card-body">
                <div class="row">

                    {{-- Title --}}
                    <div class="col-sm-6 mb-3">
                        <label>Title *</label>
                        <input type="text" name="title" class="form-control" placeholder="Enter Title"
                            value="{{ old('title', $details->title ?? '') }}" required>
                    </div>
                     <div class="col-sm-6 mb-3">
                        <label>Page Name *</label>
                        <input type="text" name="page_name" class="form-control" placeholder="Enter Page Name"
                            value="{{ old('page_name', $details->page_name ?? '') }}" required>
                    </div>


                    <!-- {{-- Calendar Code --}}
                    <div class="col-sm-6 mb-3">
                        <label>Calendar Code</label>
                        <input type="text" name="calender_code" class="form-control"
                            value="{{ old('calender_code', $details->calender_code ?? '') }}">
                    </div> -->

                    {{-- Logo --}}
                    <div class="col-sm-6 mb-3">
                        <label>Logo</label>
                        <input type="file" name="logo" class="form-control">

                        @if(!empty($details->logo))
                            <input type="hidden" name="old_logo" value="{{ $details->logo }}">
                            <img src="{{ $details->logo }}" style="max-width:100px;margin-top:10px;">
                        @endif
                    </div>

                    {{-- Logo Visible (Switch) --}}
                    <div class="col-sm-6 mb-3 swich_bntts">
                        <label>Logo Visible</label>
                        <div class="block_araea mt-1">
                            <label class="switch">
                                <input type="checkbox" name="logo_visible" value="1"
                                    {{ (old('logo_visible', $details->logo_visible ?? 0) == 1) ? 'checked' : '' }}>
                                <small></small>
                            </label>
                        </div>
                    </div>

                    {{-- Sub Title --}}
                    <div class="col-sm-6 mb-3">
                        <label>Sub Title</label>
                        <input type="text" name="sub_title" class="form-control" placeholder="Enter Sub Title"
                            value="{{ old('sub_title', $details->sub_title ?? '') }}">
                    </div>

                    {{-- Sub Title Color --}}
                    <div class="col-sm-6 mb-3">
                        <label>Sub Title Color</label>
                        <input type="color" name="sub_title_color" class="form-control"
                            value="{{ old('sub_title_color', $details->sub_title_color ?? '#000000') }}">
                    </div>

                    {{-- Short Description --}}
                    <div class="col-sm-6 mb-3">
                        <label>Short Description</label>
                        <textarea name="sortdescription" placeholder="Enter Short Description" class="form-control">{{ old('sortdescription', $details->sortdescription ?? '') }}</textarea>
                    </div>

                    {{-- Description 1 --}}
                    <div class="col-sm-12 mb-3">
                        <label>Description 1</label>
                        <textarea name="description1" id="description_editor" class="form-control">{{ old('description1', $details->description1 ?? '') }}</textarea>
                    </div>

                    

                    {{-- Description 2 --}}
                    <div class="col-sm-12 mb-3">
                        <label>Description 2</label>
                        <textarea name="description2" placeholder="Enter Description 2" id="description_editor1" class="form-control">{{ old('description2', $details->description2 ?? '') }}</textarea>
                    </div>
                    {{-- Description 3 --}}
                    <div class="col-sm-12 mb-3">
                        <label>Description 3</label>
                        <textarea name="description3" id="description_editor2" class="form-control">{{ old('description3', $details->description3 ?? '') }}</textarea>
                    </div>
                    {{-- Show Description 1 --}}
                    <div class="col-sm-4 mb-3 swich_bntts">
                        <label>Show Description 1</label>
                        <div class="block_araea mt-1">
                            <label class="switch">
                                <input type="checkbox" name="des_is_visible1" value="1"
                                    {{ (old('des_is_visible1', $details->des_is_visible1 ?? 0) == 1) ? 'checked' : '' }}>
                                <small></small>
                            </label>
                        </div>
                    </div>

                    {{-- Show Description 2 --}}
                    <div class="col-sm-4 mb-3 swich_bntts">
                        <label>Show Description 2</label>
                        <div class="block_araea mt-1">
                            <label class="switch">
                                <input type="checkbox" name="des_is_visible2" value="1"
                                    {{ (old('des_is_visible2', $details->des_is_visible2 ?? 0) == 1) ? 'checked' : '' }}>
                                <small></small>
                            </label>
                        </div>
                    </div>

                    

                    {{-- Show Description 3 --}}
                    <div class="col-sm-4 mb-3 swich_bntts">
                        <label>Show Description 3</label>
                        <div class="block_araea mt-1">
                            <label class="switch">
                                <input type="checkbox" name="des_is_visible3" value="1"
                                    {{ (old('des_is_visible3', $details->des_is_visible3 ?? 0) == 1) ? 'checked' : '' }}>
                                <small></small>
                            </label>
                        </div>
                    </div>

                    {{-- Join Title --}}
                    <div class="col-sm-6 mb-3">
                        <label>Join Title</label>
                        <input type="text" name="join_title" class="form-control" placeholder="Enter Join Title"
                            value="{{ old('join_title', $details->join_title ?? '') }}">
                    </div>
                    {{-- Join Title --}}
                    <div class="col-sm-6 mb-3">
                        <label>Assets Title</label>
                        <input type="text" name="assets_title" class="form-control" placeholder="Enter Assets Title"
                            value="{{ old('assets_title', $details->assets_title ?? '') }}">
                    </div>

                    {{-- Join Subtitle --}}
                    <div class="col-sm-6 mb-3">
                        <label>Assets Subtitle</label>
                        <input type="text" name="join_subtitle" class="form-control" placeholder="Enter Assets Subtitle"
                            value="{{ old('join_subtitle', $details->join_subtitle ?? '') }}">
                    </div>

                    {{-- CTA Text --}}
                    <div class="col-sm-6 mb-3">
                        <label>CTA Text</label>
                        <input type="text" name="cta_text" class="form-control" placeholder="Enter CTA Text"
                            value="{{ old('cta_text', $details->cta_text ?? '') }}">
                    </div>

                    {{-- CTA Page ID --}}
                    <div class="col-sm-6 mb-3">
                        <label>CTA Page</label>
                        <select name="cta_page_id" class="form-control" placeholder="Select Page">
                            <option value="">Select Page</option>
                            @foreach($pages as $id => $name)
                                <option value="{{ $id }}"
                                    {{ old('cta_page_id', $details->cta_page_id ?? '') == $id ? 'selected' : '' }}>
                                    {{ $name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    {{-- CTA BG Color --}}
                    <div class="col-sm-6 mb-3">
                        <label>CTA Background Color</label>
                        <input type="color" name="header_footer_cta_bg_color" class="form-control"
                            value="{{ old('header_footer_cta_bg_color', $details->header_footer_cta_bg_color ?? '#000000') }}">
                    </div>

                    {{-- CTA Text Color --}}
                    <div class="col-sm-6 mb-3">
                        <label>CTA Text Color</label>
                        <input type="color" name="header_footer_cta_text_color" class="form-control"
                            value="{{ old('header_footer_cta_text_color', $details->header_footer_cta_text_color ?? '#ffffff') }}">
                    </div>

                    {{-- Status --}}
                    <div class="col-sm-6 mb-3">
                        <label>Status</label>
                        <select name="status" class="form-control">
                            <option value="1" {{ old('status', $details->status ?? 1) == 1 ? 'selected' : '' }}>Active</option>
                            <option value="0" {{ old('status', $details->status ?? 1) == 0 ? 'selected' : '' }}>Inactive</option>
                        </select>
                    </div>

                    <div class="col-sm-6 mb-3 swich_bntts">
                        <label>Social Media Visible</label>
                        <div class="block_araea mt-1">
                            <label class="switch">
                                <input type="checkbox" name="sm_visible" value="1"
                                    {{ (old('sm_visible', $details->sm_visible ?? 0) == 1) ? 'checked' : '' }}>
                                <small></small>
                            </label>
                        </div>
                    </div>
                    <div class="col-sm-6 mb-3 swich_bntts">
                        <label>Next Funnel Visible</label>
                        <div class="block_araea mt-1">
                            <label class="switch">
                                <input type="checkbox" name="nf_visible" value="1"
                                    {{ (old('nf_visible', $details->nf_visible ?? 0) == 1) ? 'checked' : '' }}>
                                <small></small>
                            </label>
                        </div>
                    </div>

                </div>

                {{-- SOCIAL LINKS --}}
                <hr>
                <h5>Social Links</h5>

                <div id="socialWrapper">
                    @if(isset($details) && $details->socialLinks->count())
                        @foreach($details->socialLinks as $link)
                        <div class="row mb-2 socialRow">
                            <div class="col-md-5">
                                <input type="text" name="social_title[]" class="form-control"
                                    value="{{ $link->title }}" placeholder="Title">
                            </div>
                            <div class="col-md-5">
                                <input type="text" name="social_url[]" class="form-control"
                                    value="{{ $link->url }}" placeholder="URL">
                            </div>
                            <div class="col-md-2">
                                <button type="button" class="btn btn-danger removeRow">X</button>
                            </div>
                        </div>
                        @endforeach
                    @else
                        <div class="row mb-2 socialRow">
                            <div class="col-md-5">
                                <input type="text" name="social_title[]" class="form-control" placeholder="Title">
                            </div>
                            <div class="col-md-5">
                                <input type="text" name="social_url[]" class="form-control" placeholder="URL">
                            </div>
                            <div class="col-md-2">
                                <button type="button" class="btn btn-danger removeRow">X</button>
                            </div>
                        </div>
                    @endif
                </div>

                <button type="button" class="btn btn-primary mt-2" id="addSocial">+ Add More</button>
                
                
            </div>
            
            <div class="card-footer">
                <button type="submit" class="btn btn-success float-right">
                    {{ isset($details) ? 'Update' : 'Add' }}
                </button>
                <a href="{{ route('appointment-thankyou.index') }}" class="btn btn-secondary float-right mr-2">Cancel</a>
            </div>

        </form>
    </div>

</div>
@endsection

@section('scripts')
<script>
document.getElementById('addSocial').addEventListener('click', function () {

    let html = `
    <div class="row mb-2 socialRow">
        <div class="col-md-5">
            <input type="text" name="social_title[]" class="form-control" placeholder="Title">
        </div>
        <div class="col-md-5">
            <input type="text" name="social_url[]" class="form-control" placeholder="URL">
        </div>
        <div class="col-md-2">
            <button type="button" class="btn btn-danger removeRow">X</button>
        </div>
    </div>`;

    document.getElementById('socialWrapper').insertAdjacentHTML('beforeend', html);
});

// remove row
document.addEventListener('click', function(e) {
    if (e.target.classList.contains('removeRow')) {

        let rows = document.querySelectorAll('.socialRow');

        // ❌ agar sirf 1 row bachi hai
        if (rows.length <= 1) {
            alert('At least one social link is required!');
            return;
        }

        e.target.closest('.socialRow').remove();
    }
});
</script>
<script src="{{ url('ckeditor/ckeditor.js') }}"></script>
<script src="{{ url('ckfinder/ckfinder.js') }}"></script>

<script>
    function initEditor(id) {
        CKEDITOR.replace(id, {
            uiColor: '#DAF2FE',
            height: 200,
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
    }

    // 🔥 Apply editor to all 3 descriptions
    initEditor('description_editor');
    initEditor('description_editor1');
    initEditor('description_editor2');
</script>


@endsection