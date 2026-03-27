
@extends('layouts.app')

@section('title', 'Edit Customer')

@section('content')

<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Add Resources</h1>
        <a href="{{ route('resources.resourceslist') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-arrow-left fa-sm text-white-50"></i> Back</a>
    </div>
 {{-- Alert Messages --}}
    @include('common.alert')
   
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
     
        <form method="POST" action="{{ route('resources.store')}}">
            @csrf
            <div class="card-body">
                <div class="form-group row">
					<div class="col-sm-6 mb-3 mt-3 mb-sm-0">
					 <span style="color: red;">*</span>Title of Video/Image 
					 <input type="text" id="" placeholder="" name="title" value="{{ old('title')}}" required class="form-control form-control-user" />
					</div>
					
					<div class="col-sm-6 mb-3 mt-3 mb-sm-0">
					 <span style="color: red;">*</span>Sub Title 
					 <input type="" id="" placeholder="" name="subtitle" value="{{ old('subtitle')}}" required  class="form-control form-control-user" />
					</div>
					
					<div class="col-sm-6 mb-3 mt-3 mb-sm-0">
					 <span style="color: red;">*</span>CTA Text
					 <input type="text" id="" placeholder="" name="cta_text" value="{{ old('cta_text')}}" required class="form-control form-control-user" />
					</div>
					
					<div class="col-sm-6 mb-3 mt-3 mb-sm-0 upldds swich_bntts">
					 <span style="color: red;">*</span>Video  <span class="rigt_post"><label class="switch"><input type="checkbox"> <small></small></label></span>
					 <input type="text" id="" placeholder="Enter Video URL" name="video_url" required value="{{ old('video_url')}}" class="form-control form-control-user" />
					</div>
					
					
					<div class="col-sm-6 mb-3 mt-3 mb-sm-0 swich_bntts">
					 <span style="color: red;">*</span>Open in New Tab? 
					 <div class="block_araea"><label class="switch"><input value="1" type="checkbox"  @if( old('openinnewtab')==1) selected @endif name="openinnewtab"> <small></small></label></div>
					</div>
					
					
					
					<div class="col-sm-6 mb-3 mt-3 mb-sm-0">
						<span style="color: red;">&nbsp;</span>Post Form Submission
						<select name="postformotion" id="select_box" class="form-control form-control-user" required onchange="$('#postformvalue').removeClass('hide')">
							<option>Select</option>
							<option value="facebook">Facebook Group</option>
							<option value="whatsapp">Whatsapp Group</option>
							<option value="telegram">Telegram Group</option>
							<option value="landing page">Or they may wish to send them on landing page</option>
							<option value="phone number">They may ask to call directly in that case they can be give phone no diretcly.</option>
							<option value="calendly meeting">They can be asked to schdule a call and book a calndly meeting  give them link so there may be tone of options in drop down just take a note.</option>
						</select>
						
						<div id="postformvalue"  >
						 <div class="row">
						  <div class="col-sm-12 mb-3 mt-3 mb-sm-0">
						   <input type="text" id="" value="{{ old('postformvalue')}}" required name="postformvalue" placeholder="Enter post form submission option value" class="form-control form-control-user" />
						  </div>
						 </div>
						</div>
					</div>
					
					
					<div class="col-sm-6 mb-3 mt-3 mb-sm-0">
						<span style="color: red;">&nbsp;</span>Status
						<select name="status" required class="form-control form-control-user">
							<option value="" >Select Status</option>
							<option value="0"  selected="selected">Inactive</option>
							<option value="1">Active</option>
						</select>
					</div>
				</div>
            </div>
            
             <div class="card-body">
                <h4>Resource Bullets</h4>
                <div class="form-group row">
                    @php 
                    $list = ['First','Second','Third','Fourth','Fifth','Sixth'];
                    @endphp
				 @foreach($list as $datas)
					
					<div class="col-sm-6 mb-3 mt-3 mb-sm-0">
					 <span style="color: red;">*</span>{{ $datas }} Bullet 
					 <input type="" id="" placeholder="" name="bullets[]" value=""   class="form-control form-control-user" />
					</div>
					
				 
				 @endforeach
					
				 
					
					
				 
				</div>
            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-success btn-user float-right mb-3">Save</button>
                <a class="btn btn-primary float-right mr-3 mb-3" href="javascript:void(0);">Cancel</a>
            </div>
        </form>
    </div>

</div>



@endsection