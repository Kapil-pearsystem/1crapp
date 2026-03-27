<?php 
 
    $storeRoute = route('cms.update', ['cms' => $cms->id]);
    $cancelRoute = route('cms.index');
 
?>
@extends('layouts.app')

@section('title', 'Agents List')

@section('content')
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit CMS</h1>
        <a href="{{ route('cms.index') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i aria-hidden="true" class="fas fa-arrow-left fa-sm text-white-50"></i> Back</a>
    </div>
    
    {{-- Alert Messages --}}
    @include('common.alert')
    <div class="card shadow mb-4"> 
     <form method="POST" action="{{$storeRoute}}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="card-body">
                <div class="form-group row">
                    <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                        <span style="color: red;">*</span>Title 
						<input type="text" id="name" placeholder="Title" name="name" value="{{ $cms->name }}" class="form-control form-control-user" required="" onkeyup="generatePostUrl(this.value)" />
                    </div>
					<div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                        <span style="color: red;">*</span>Page Url 
						<input type="text" id="page_url" placeholder="Title" name="page_url" value="{{ $cms->slug }}" class="form-control form-control-user" required="" />
                        <small class="text-muted"> Please enter the page path (e.g., about-us, contact-us, services). Do not include the domain or leading slash.</small>
                    </div>
                    
                    
                    <div class="col-sm-6 mb-3 mt-3 mb-sm-0 upldds"> </div>
					
					
					
                    	<div class="col-sm-12 mb-3 mt-3 mb-sm-0">
					 <span style="color: red;">*</span>Description 					 
					 <textarea id="f_content8" name="description" placeholder="Description" class="form-control form-control-user"  rows="4" cols="50" ><?php echo $cms->description; ?></textarea>
					</div>
					

                 <!--   <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
					 <span style="color: red;">*</span>Slug  
					 <input type="text" id="" placeholder="Slug" name="" value="" class="form-control form-control-user" required="" />
					</div>
-->

                    <div class="col-sm-6 mb-3 mt-3 mb-sm-0 upldds">
					  Upload Image  
					 <input type="file" id="" placeholder="File Upload" name="image" value="{{ $cms->image }}" class="form-control form-control-user"  />
					 	 @if($cms->image)
					  <img src="{{ url('img') }}/{{ $cms->image }}" width="100px"/>
					  @endif
					</div>
					
					
					

					

                    <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                        <span style="color: red;">*</span>Status
                         <select class="form-control form-control-user @error('status') is-invalid @enderror" name="status">
                            <option selected disabled>Select Status</option>
                            <option value="1" {{ (($cms->status == 1) ? 'selected' : '') }}>Active</option>
                            <option value="0" {{  (($cms->status == 0) ? 'selected' : '')}}>Inactive</option>
                        </select>
                        @error('status')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
					
					
				
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-success btn-user float-right mb-3">Update</button> 
				<a href="{{ $cancelRoute }}" class="btn btn-primary float-right mr-3 mb-3">Cancel</a>
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
<script>
	function generatePostUrl(postName) {
		var postUrl = postName.toLowerCase().replace(/\s+/g, '-').replace(/[^\w\-]+/g, '');
		document.getElementById("page_url").value = postUrl;
	}
</script>
@endsection
