
@extends('layouts.app')

@section('title', 'Edit Customer')

@section('content')

<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Resources</h1>
        <a href="{{ route('resources.resourceslist') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-arrow-left fa-sm text-white-50"></i> Back</a>
    </div>

    {{-- Alert Messages --}}
    @include('common.alert')
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
         
        
        <form method="POST" action="{{ route('resources.update',['resource'=>$resource->id]) }}">
              @csrf
            @method('PUT') 

            <div class="card-body">
                <div class="form-group row">
					<div class="col-sm-6 mb-3 mt-3 mb-sm-0">
					 <span style="color: red;">*</span>Title of Video/Image 
					 <input type="text" id="" placeholder="" name="title" value="{{ $resource->title }}" required class="form-control form-control-user" />
					</div>
					
					<div class="col-sm-6 mb-3 mt-3 mb-sm-0">
					 <span style="color: red;">*</span>Sub Title 
					 <input type="" id="" placeholder="" name="subtitle" value="{{ $resource->subtitle }}"  required class="form-control form-control-user" />
					</div>
					
					<div class="col-sm-6 mb-3 mt-3 mb-sm-0">
					 <span style="color: red;">*</span>CTA Text
					 <input type="text" id="" placeholder="" name="cta_text" required value="{{ $resource->cta_text }}" class="form-control form-control-user" />
					</div>
					
					<div class="col-sm-6 mb-3 mt-3 mb-sm-0 upldds swich_bntts">
					 <span style="color: red;">*</span>Video  <span class="rigt_post"><label class="switch"><input type="checkbox" @if($resource->video_url) checked @endif> <small></small></label></span>
					 <input type="text" id="" placeholder="Enter Video URL" name="video_url" required value="{{ $resource->video_url }}" class="form-control form-control-user" />
					</div>
					
					
					<div class="col-sm-6 mb-3 mt-3 mb-sm-0 swich_bntts">
					 <span style="color: red;">*</span>Open in New Tab? 
					 <div class="block_araea"><label class="switch"><input name="openinnewtab" value="1" type="checkbox" @if($resource->openinnewtab) checked @endif > <small></small></label></div>
					</div>
					
					
					
					<div class="col-sm-6 mb-3 mt-3 mb-sm-0">
						<span style="color: red;">&nbsp;</span>Post Form Submission
						<select name="postformotion" id="select_box" required class="form-control form-control-user">
							<option>Select</option>
							<option @if($resource->postformotion =="facebook" )selected="selected" @endif value="facebook">Facebook Group</option>
							<option @if($resource->postformotion =="whatsapp" )selected="selected" @endif value="whatsapp">Whatsapp Group</option>
							<option @if($resource->postformotion =="telegram" )selected="selected" @endif value="telegram">Telegram Group</option>
							<option @if($resource->postformotion =="landing page" )selected="selected" @endif value="landing page">Or they may wish to send them on landing page</option>
							<option @if($resource->postformotion =="phone number" )selected="selected" @endif value="phone number">They may ask to call directly in that case they can be give phone no diretcly.</option>
							<option @if($resource->postformotion =="calendly meeting" )selected="selected" @endif value="calendly meeting">They can be asked to schdule a call and book a calndly meeting  give them link so there may be tone of options in drop down just take a note.</option>
						</select>
						
						<div id="postformvalue" >
						 <div class="row">
						  <div class="col-sm-12 mb-3 mt-3 mb-sm-0">
						   <input type="text" id="" placeholder="" name="postformvalue" required value="{{ $resource->postformvalue}}" class="form-control form-control-user" />
						  </div>
						 </div>
						</div>
					</div>
					
					
					<div class="col-sm-6 mb-3 mt-3 mb-sm-0">
						<span style="color: red;">&nbsp;</span>Status
						<select name="status" class="form-control form-control-user" required>
							<option value="">Select Status</option>
							<option value="0" @if($resource->status ==0 )selected="selected" @endif >Inactive</option>
							<option value="1" @if($resource->status ==1 )selected="selected" @endif >Active</option>
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
				 @foreach($list as $key=>$datas)
					
					<div class="col-sm-6 mb-3 mt-3 mb-sm-0">
					 <span style="color: red;">*</span>{{ $datas }} Bullet 
					 <input type="" id="" placeholder="" name="bullets[]" value="{{ (@$resourceBullet && @$resourceBullet[$key]) ?  @$resourceBullet[$key]->title : ''  }}"   class="form-control form-control-user" />
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