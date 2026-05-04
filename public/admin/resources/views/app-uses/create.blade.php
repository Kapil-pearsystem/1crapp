@extends('layouts.app')
@section('title', isset($details) ? 'Edit 1CRApp Use' : 'Add 1CRApp Use')
@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">{{ isset($details) ? 'Edit' : 'Add' }} 1CRApp Use</h1>
        <a href="{{ route('user-hero-section.index') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-arrow-left fa-sm text-white-50"></i> Back</a>
    </div>
    {{-- Alert Messages --}}
    @include('common.alert')
    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <form method="POST" action="{{ route('user-hero-section.store') }}" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" value="{{ isset($details) ? $details->id : '' }}">
            <br>
            <h6 class="text-info ml-4">Realtor Information</h6>
            <hr>
            <div class="card-body">
                <div class="form-group row">
                    <!-- Name Field -->
                    <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                        <label>Realtor Title<span style="color: red;">*</span></label>
                        <input type="text" name="realtor_title" placeholder="Enter Realtor Title" value="{{ old('realtor_title') ?? ($details->realtor_title ?? '') }}" required class="form-control form-control-user" />
                    </div>
                    <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                        <label>Realtor Subtitle<span style="color: red;">*</span> </label>
                        <input type="text" name="realtor_subtitle" placeholder="Enter Realtor Subtitle" value="{{ old('realtor_subtitle') ?? ($details->realtor_subtitle ?? '') }}" required class="form-control form-control-user" />
                    </div>

                    
                    <div class="col-sm-12 mb-3 mt-3 mb-sm-0">
                        <label>Realtor Short Description<span style="color: red;">*</span></label>
                        <textarea placeholder="Realtor Short Description" name="realtor_shortdesc" class="form-control form-control-user ">{{ old('realtor_shortdesc') ?? ($details->realtor_shortdesc ?? '') }}</textarea>
                    </div>
                    <div class="col-sm-12 mb-3 mt-3 mb-sm-0">
						<span style="color: red;">*</span>Realtor Description
						<textarea id="f_content1" name="realtor_description" placeholder="Realtor Description" class="form-control form-control-user" rows="4" cols="50">{{ old('realtor_description') ?? ($details->realtor_description ?? '') }}</textarea>
					</div>
                    <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                        <label>Realtor Image<span style="color: red;">{{ isset($details) ? '' : '*' }}</span></label>
                        <input type="hidden" name="old_realtor_image" value="{{ old('realtor_image') ?? (isset($details) ? base64_encode($details->realtor_image) : '') }}"/>
                        <input type="file" name="realtor_image" {{ isset($details) ? '' : 'required' }} class="form-control form-control-user" />
                        <!-- <small class="text-muted">Please upload image with 440x400 dimensions</small> -->
                        @if(isset($details) && $details->realtor_image)
                            <img src="{{ $details->realtor_image }}" alt="Realtor Image" class="mt-2" style="max-width: 200px;">
                        @endif
                    </div>
                    <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                        <label>Realtor Button Text<span style="color: red;">*</span></label>
                        <input type="text" name="realtor_btntext" placeholder="Enter Realtor Button Text" value="{{ old('realtor_btntext') ?? ($details->realtor_btntext ?? '') }}" required class="form-control form-control-user" />
                    </div>
                    <div class="col-sm-10 mb-3 mt-3 mb-sm-0">
                        <label>Realtor Button URL<span style="color: red;">*</span></label>
                        <input type="url" name="realtor_btnlink" placeholder="Enter Realtor Button Url" value="{{ old('realtor_btnlink') ?? ($details->realtor_btnlink ?? '') }}" required class="form-control form-control-user" />
                    </div>
                    
                    <div class="col-sm-2 mb-1 mt-4 mb-sm-0 swich_bntts"> 
                        Open New Tab <div class="block_araea mt-1">
                            <label class="switch"><input value="1" type="checkbox" @isset($details)
                            @if($details->realtor_btnlink_new_tab == 1) checked @endif @endisset
                        name="realtor_btnlink_new_tab"> <small></small></label></div>
                    </div>
                </div>
            </div>
            <br>
             <h6 class="text-info ml-4">Investor Information</h6>
            <hr>
            <div class="card-body">
                <div class="form-group row">
                    <!-- Name Field -->
                    <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                        <label>Investor Title<span style="color: red;">*</span></label>
                        <input type="text" name="investor_title" placeholder="Enter Investor Title" value="{{ old('investor_title') ?? ($details->investor_title ?? '') }}" required class="form-control form-control-user" />
                    </div>
                    <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                        <label>Investor Subtitle<span style="color: red;">*</span> </label>
                        <input type="text" name="investor_subtitle" placeholder="Enter Investor Subtitle" value="{{ old('investor_subtitle') ?? ($details->investor_subtitle ?? '') }}" required class="form-control form-control-user" />
                    </div>

                    
                    <div class="col-sm-12 mb-3 mt-3 mb-sm-0">
                        <label>Investor Short Description<span style="color: red;">*</span></label>
                        <textarea placeholder="Investor Short Description" name="investor_shortdesc" class="form-control form-control-user ">{{ old('investor_shortdesc') ?? ($details->investor_shortdesc ?? '') }}</textarea>
                    </div>
                    <div class="col-sm-12 mb-3 mt-3 mb-sm-0">
						<span style="color: red;">*</span>Investor Description
						<textarea id="f_content2" name="investor_description" placeholder="Investor Description" class="form-control form-control-user" rows="4" cols="50">{{ old('investor_description') ?? ($details->investor_description ?? '') }}</textarea>
					</div>
                    <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                        <label>Investor Image<span style="color: red;">{{ isset($details) ? '' : '*' }}</span></label>
                        <input type="hidden" name="old_investor_image" value="{{ old('investor_image') ?? (isset($details) ? base64_encode($details->investor_image) : '') }}"/>
                        <input type="file" name="investor_image" {{ isset($details) ? '' : 'required' }} class="form-control form-control-user" />
                        <!-- <small class="text-muted">Please upload image with 440x400 dimensions</small> -->
                        @if(isset($details) && $details->investor_image)
                            <img src="{{ $details->investor_image }}" alt="Investor Image" class="mt-2" style="max-width: 200px;">
                        @endif
                    </div>
                    <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                        <label>Investor Button Text<span style="color: red;">*</span></label>
                        <input type="text" name="investor_btntext" placeholder="Enter Investor Button Text" value="{{ old('investor_btntext') ?? ($details->investor_btntext ?? '') }}" required class="form-control form-control-user" />
                    </div>
                    <div class="col-sm-10 mb-3 mt-3 mb-sm-0">
                        <label>Investor Button URL<span style="color: red;">*</span></label>
                        <input type="url" name="investor_btnlink" placeholder="Enter Investor Button Url" value="{{ old('investor_btnlink') ?? ($details->investor_btnlink ?? '') }}" required class="form-control form-control-user" />
                    </div>
                    
                    <div class="col-sm-2 mb-1 mt-4 mb-sm-0 swich_bntts"> 
                        Open New Tab <div class="block_araea mt-1">
                            <label class="switch"><input value="1" type="checkbox" @isset($details)
                            @if($details->investor_btnlink_new_tab == 1) checked @endif @endisset
                        name="investor_btnlink_new_tab"> <small></small></label></div>
                    </div>

                    <!-- Status Field -->
                    <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                        <label>Status</label>
                        <select name="status" required class="form-control form-control-user">
                            <option value="">Select Status</option>
                            <option value="0" {{ (old('status') ?? ($details->status ?? '')) == 0 ? 'selected' : '' }}>Inactive</option>
                            <option value="1" {{ (old('status') ?? ($details->status ?? '')) == 1 ? 'selected' : '' }}>Active</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-success btn-user float-right mb-3">
                    {{ isset($details) ? 'Update' : 'Add' }}
                </button>
                <a class="btn btn-primary float-right mr-3 mb-3" href="{{ route('user-hero-section.index') }}">Cancel</a>
            </div>
        </form>
    </div>
</div>
@endsection

@section('scripts')

<script type="text/javascript" src="<?php echo url('ckeditor/ckeditor.js'); ?>"></script>
<script type="text/javascript" src="<?php echo url('ckfinder/ckfinder.js'); ?>"></script>

<script type="text/javascript">
	//<![CDATA[
	CKEDITOR.replace('f_content1', {
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
	//<![CDATA[
	CKEDITOR.replace('f_content2', {
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
<script>
	function generatePostUrl(postName) {
		var postUrl = postName.toLowerCase().replace(/\s+/g, '-').replace(/[^\w\-]+/g, '');
		document.getElementById("page_url").value = postUrl;
	}
</script>
@endsection