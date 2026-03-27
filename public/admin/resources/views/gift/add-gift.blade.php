@extends('layouts.app')

@section('title', isset($gift) ? 'Edit Gift' : 'Add Gift')

@section('content')

<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">{{ isset($gift) ? 'Edit' : 'Add' }} Gift</h1>
        <a href="{{ route('gift.index') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-arrow-left fa-sm text-white-50"></i> Back</a>
    </div>

    {{-- Alert Messages --}}
    @include('common.alert')

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <form method="POST" action="{{ route('gift.store') }}" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" value="{{ isset($gift) ? $gift->id : '' }}">
            <div class="card-body">
                <div class="form-group row">
                    <!-- Name Field -->
                     <!-- Status Field -->
                    <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                        <label><span style="color: red;">*</span> Category</label>
                        <select name="category" required class="form-control form-control-user">
                            <option value="">Select Category</option>
                            @foreach($gift_category as $category)
                                <option value="{{ $category->id }}"
                                    {{ old('category') == $category->id || (isset($gift) && $gift->category == $category->id) ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                        <label><span style="color: red;">*</span> Title</label>
                        <input type="text" name="title" value="{{ old('title') ?? ($gift->title ?? '') }}" required class="form-control form-control-user" />
                    </div>
                    <div class="col-sm-12 mb-3 mt-3 mb-sm-0">
                        <span style="color: red;">*</span>Description
                        <textarea id="f_content8" name="description" placeholder="Description" class="form-control form-control-user"  rows="4" cols="50">{{ old('description') ?? ($gift->description ?? '') }}</textarea>
					</div>
                    <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                        <label><span style="color: red;">*</span> MRP</label>
                        <input type="number" name="mrp" value="{{ old('mrp') ?? ($gift->mrp ?? '') }}" required class="form-control form-control-user" />
                    </div>
                    <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                        <label><span style="color: red;">*</span>MRP Discount in(%)</label>
                        <input type="number" name="discount" value="{{ old('discount') ?? ($gift->discount ?? '') }}" required class="form-control form-control-user" />
                    </div>
                    <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                        <label><span style="color: red;">*</span> Coupon Expire Date</label>
                        <input type="date" name="coupon_expire_date" value="{{ old('coupon_expire_date') ?? ($gift->coupon_expire_date ?? '') }}" required class="form-control form-control-user" />
                    </div>
                    <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                        <label><span style="color: red;">*</span>Coupon Discount in(%)</label>
                        <input type="number" name="coupon_discount" value="{{ old('coupon_discount') ?? ($gift->coupon_discount ?? '') }}" required class="form-control form-control-user" />
                    </div>
                    <!-- Status Field -->
                    <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                        <label><span style="color: red;">*</span>Coupon Code Status</label>
                        <select name="coupon_status" required class="form-control form-control-user">
                            <option value="">Select Status</option>
                            <option value="0" {{ (old('status') ?? ($gift->coupon_status ?? '')) == 0 ? 'selected' : '' }}>Inactive</option>
                            <option value="1" {{ (old('status') ?? ($gift->coupon_status ?? '')) == 1 ? 'selected' : '' }}>Active</option>
                        </select>
                    </div>
                    <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                        <label><span style="color: red;">*</span> Images</label>
                        <input type="file" name="images[]" multiple {{ isset($gift) ? ' ' : 'required' }} class="form-control form-control-user" />
                        <input type="hidden" name="old_images" value="{{ isset($gift)?base64_encode($gift->image):'' }}"/>

                    </div>
                    <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                        <label><span style="color: red;">*</span> Thumbnail</label>
                        <input type="file" name="thumbnail"  {{ isset($gift) ? ' ' : 'required' }} class="form-control form-control-user" />
                        <input type="hidden" name="old_thumbnail" value="{{ isset($gift)?base64_encode($gift->thumbnail):'' }}"/>

                    </div>
                    <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                        <label><span style="color: red;">*</span>Ribbon</label>
                        <select name="ribbon" required class="form-control form-control-user">
                            <option value="">Select Ribbon</option>
                            <option value="available" {{ (old('ribbon') ?? ($gift->ribbon ?? '')) == 'available' ? 'selected' : '' }}>Available</option>
                            <option value="sold out" {{ (old('ribbon') ?? ($gift->ribbon ?? '')) == 'sold out' ? 'selected' : '' }}>Sold Out</option>
                        </select>
                    </div>
                    <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                        <label><span style="color: red;">*</span>Gift Status</label>
                        <select name="status" required class="form-control form-control-user">
                            <option value="">Select Status</option>
                            <option value="0" {{ (old('status') ?? ($gift->status ?? '')) == 0 ? 'selected' : '' }}>Inactive</option>
                            <option value="1" {{ (old('status') ?? ($gift->status ?? '')) == 1 ? 'selected' : '' }}>Active</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-success btn-user float-right mb-3">
                    {{ isset($gift) ? 'Update' : 'Add' }}
                </button>
                <a class="btn btn-primary float-right mr-3 mb-3" href="{{ route('gift.index') }}">Cancel</a>
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