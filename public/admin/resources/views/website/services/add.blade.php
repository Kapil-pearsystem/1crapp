@extends('layouts.app')
@section('title', isset($details) ? 'Edit Service' : 'Add Service')
@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">{{ isset($details) ? 'Edit' : 'Add' }} Service</h1>
        <a href="{{ route('web.services.index') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-arrow-left fa-sm text-white-50"></i> Back</a>
    </div>
    {{-- Alert Messages --}}
    @include('common.alert')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
    <form method="POST" action="{{ route('web.service.store') }}" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" value="{{ isset($details) ? $details->id : '' }}">
            <div class="card-body">
                <div class="form-group row">
                    <!-- Name Field -->
                    <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                        <label><span style="color: red;">*</span> Category</label>
                        <select name="category_id" required class="form-control form-control-user">
                            <option value="">Select Category</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ (old('category_id') ?? ($details->category_id ?? '')) == $category->id ? 'selected' : '' }}>{{ $category->title}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                        <label><span style="color: red;">*</span> Title</label>
                        <input type="text" name="title" placeholder="Enter Title" value="{{ old('title') ?? ($details->title ?? '') }}" required class="form-control form-control-user" />
                    </div>
                    <div class="col-sm-4 mb-2 mt-3 mb-sm-0">
                        <label><span style="color: red;">*</span> Get Started Link</label>
                        <input type="url" name="get_started_link" placeholder="Enter Get Started Link" value="{{ old('get_started_link') ?? ($details->get_started_link ?? '') }}" required class="form-control form-control-user" />
                    </div>
                    <div class="col-sm-2 mb-2 mt-3 mb-sm-0 swich_bntts">
                        Open a New Tab
                        <div class="block_araea mt-1">
                            <label class="switch"><input value="1" {{ (old('start_link_new_tab') ?? ($details->start_link_new_tab ?? '')) == 1 ? 'checked' : '' }} type="checkbox" name="start_link_new_tab" /> <small></small></label>
                        </div>
                    </div>
                    <div class="col-sm-4 mb-2 mt-3 mb-sm-0">
                        <label><span style="color: red;">*</span> Explore More Link </label>
                        <input type="url" name="explore_more_link" placeholder="Enter Explore More Link" value="{{ old('explore_more_link') ?? ($details->explore_more_link ?? '') }}" required class="form-control form-control-user" />
                    </div>
                    <div class="col-sm-2 mb-2 mt-3 mb-sm-0 swich_bntts">
                        Open a New Tab
                        <div class="block_araea mt-1">
                            <label class="switch"><input value="1" {{ (old('explore_more_link_new_tab') ?? ($details->explore_more_link_new_tab ?? '')) == 1 ? 'checked' : '' }} type="checkbox" name="explore_more_link_new_tab" /> <small></small></label>
                        </div>
                    </div>
                    <!-- <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                        <label><span style="color: red;">*</span> Link</label>
                        <input type="url" name="link" placeholder="Enter Link" value="{{ isset($details) ? $details->link : '' }}" required class="form-control form-control-user" />
                    </div>
                    <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                        <label><span style="color: red;">*</span>Video Link</label>
                        <input type="url" name="video_link" placeholder="Enter Video Link" value="{{ isset($details) ? $details->video_link : '' }}" required class="form-control form-control-user" />
                    </div> -->
                    <div class="col-sm-12 mb-3 mt-3 mb-sm-0">
                        <span style="color: red;">*</span>Description
                        <textarea id="exampleDescription" placeholder="Description" name="description" class="form-control form-control-user ">{{ old('description') ?? ($details->description ?? '') }}</textarea>
                    </div>
                    <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                        <label><span style="color: red;">{{ isset($details) ? '' : '*' }}</span> Image</label>
                        <input type="hidden" name="old_image" value="{{ isset($details) ? base64_encode($details->image) : '' }}"/>
                        <input type="file" name="image" {{ isset($details) ? '' : 'required' }} class="form-control form-control-user" />
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
                <a class="btn btn-primary float-right mr-3 mb-3" href="{{ route('web.services.index') }}">Cancel</a>
            </div>
        </form>
    </div>
</div>
@endsection