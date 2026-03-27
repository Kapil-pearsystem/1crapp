

@extends('layouts.app')



@section('title', isset($details)?'Assets List':'Add Assets')



@section('content')

<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">

        <h1 class="h3 mb-0 text-gray-800"> {{ isset($details)?'Edit ':'Add ' }}Assets</h1>

    </div>

       {{-- Alert Messages --}}

    @include('common.alert')

    <div class="card shadow mb-4"> 

        <form method="POST" action="{{ route('assets.store') }}">

             @csrf

             <input type="hidden" name="id" value="{{ isset($details)?$details->id:'' }}">

            <div class="card-body">

                <div class="form-group row">

                    <div class="col-sm-12 mb-6 mt-1 mb-sm-0">

                        <span style="color: red;">*</span>Assets Title 

						<input type="text" id="" placeholder="" name="title" value="{{ old('title') ? old('title') :  @$details->title }}" class="form-control form-control-user" required="" />

                    </div>

                    <div class="col-sm-10 mb-6 mt-1 mb-sm-0">
                        <span style="color: red;">*</span>Assets Url 
                        <input type="url" id="" placeholder="" name="url" value="{{ old('url') ? old('url') :  @$details->url }}" class="form-control form-control-user" required="" />
                        <!--<small class="text-muted">Please enter only URL path like: ( https://1crapp.com/how-it-works -> how-it-works) </small>-->
					</div>  
					<div class="col-sm-2 mb-6 mt-1 mb-sm-0 swich_bntts">
                        Open on new tab
                        <div class="block_araea mt-1">
                            <label class="switch"><input value="1" type="checkbox" name="new_tab" {{ (old('new_tab') ?? ($details->new_tab  ?? '')) == 1 ? 'checked' : '' }}/> <small></small></label>
                        </div>
                    </div>
                      <!-- Page Type -->
                    <div class="col-sm-6 mb-3">
                        <label><span style="color:red;">*</span> Page Type</label>
                        <select class="form-control" name="page_type" id="page_type" required>
                            <option value="">Select Page Type</option>
                            <option value="Hero Page" {{ (isset($details) && $details->page_type == 'Hero Page') ? 'selected' : '' }}>Hero Page</option>
                            <option value="Navigation Title" {{ (isset($details) && $details->page_type == 'Navigation Title') ? 'selected' : '' }}>Navigation Title</option>
                            <option value="Custom Page" {{ (isset($details) && $details->page_type == 'Custom Page') ? 'selected' : '' }}>Custom Page</option>
                        </select>
                    </div>
 
                    <!-- Open in New Tab -->
                    <!--<div class="col-sm-3 mb-3">-->
                    <!--    <label>Open in new tab</label><br>-->
                    <!--    <label class="switch">-->
                    <!--        <input type="checkbox" name="open_in_new_tab" value="1"-->
                    <!--               {{ (isset($details) && $details->open_in_new_tab == 1) ? 'checked' : '' }}>-->
                    <!--        <span class="slider round"></span>-->
                    <!--    </label>-->
                    <!--</div>-->

                    <div class="col-sm-6 mb-3 mt-1 mb-sm-0">

                        <span style="color: red;">*</span>Status

                        <select class="form-control" name="status" required id="exampleFormControlSelect1">

                            <option value="" selected >Select Status</option>

                            <option value="0" {{ (isset($details) && $details->status == 0) ? 'selected' : '' }}>Inactive</option>

                            <option value="1" {{ (isset($details) && $details->status == 1) ? 'selected' : '' }}>Active</option>

                        </select>

					</div>

                </div>

            </div>

            <div class="card-footer">

                <button type="submit" class="btn btn-success btn-user float-right mb-3">{{ isset($details)?'Update ':'Save ' }}</button> 

				<a href="{{ route('assets.index') }}" class="btn btn-primary float-right mr-3 mb-3">Cancel</a>

            </div>

        </form>

    </div>

</div>



						

						





@endsection



@section('scripts')

    

@endsection

