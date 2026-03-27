@extends('layouts.app')
@section('title', isset($details) ? 'Edit Banner' : 'Add Banner')
@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">{{ isset($details) ? 'Edit' : 'Add' }} Banner</h1>
        <a href="{{ route('banner.index') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-arrow-left fa-sm text-white-50"></i> Back</a>
    </div>
    {{-- Alert Messages --}}
    @include('common.alert')
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <form method="POST" action="{{ route('banner.store') }}" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" value="{{ isset($details) ? $details->id : '' }}">
            <div class="card-body">
                <div class="form-group row">
                    <!-- Name Field -->
                    <div class="col-sm-12 mb-3 mt-3 mb-sm-0">
                        <label><span style="color: red;">*</span> Title</label>
                        <input type="text" name="title" placeholder="Enter Title" value="{{ old('title') ?? ($details->title ?? '') }}" required class="form-control form-control-user" />
                    </div>
                    <div class="col-sm-4 mb-2 mt-3 mb-sm-0">
                        <label><span style="color: red;">*</span> Start Free Trial Link</label>
                        <input type="url" name="start_free_trial_link" placeholder="Enter Start Free Trial Link" value="{{ old('start_free_trial_link') ?? ($details->start_free_trial_link ?? '') }}" required class="form-control form-control-user" />
                    </div>
                    <div class="col-sm-2 mb-2 mt-3 mb-sm-0 swich_bntts">
                        Open a New Tab
                        <div class="block_araea mt-1">
                            <label class="switch"><input value="1" {{ (old('start_link_new_tab') ?? ($details->start_link_new_tab ?? '')) == 1 ? 'checked' : '' }} type="checkbox" name="start_link_new_tab" /> <small></small></label>
                        </div>
                    </div>
                    <div class="col-sm-4 mb-2 mt-3 mb-sm-0">
                        <label><span style="color: red;">*</span> Talk To an Expert Link </label>
                        <input type="url" name="talk_to_expert_link" placeholder="Enter Talk To an Expert Link" value="{{ old('talk_to_expert_link') ?? ($details->talk_to_expert_link ?? '') }}" required class="form-control form-control-user" />
                    </div>
                    <div class="col-sm-2 mb-2 mt-3 mb-sm-0 swich_bntts">
                        Open a New Tab
                        <div class="block_araea mt-1">
                            <label class="switch"><input value="1" {{ (old('talk_to_expert_link_new_tab') ?? ($details->talk_to_expert_link_new_tab ?? '')) == 1 ? 'checked' : '' }} type="checkbox" name="talk_to_expert_link_new_tab" /> <small></small></label>
                        </div>
                    </div>

                    <div class="col-sm-12 mb-3 mt-3 mb-sm-0">
                        <span style="color: red;">*</span>Description
                        <textarea id="exampleDescription" placeholder="Description" name="description" class="form-control form-control-user ">{{ old('description') ?? ($details->description ?? '') }}</textarea>
                    </div>
                    <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                        <label><span style="color: red;">{{ isset($details) ? '' : '*' }}</span> Left Image</label>
                        <input type="hidden" name="old_left_image" value="{{ old('left_image') ?? (isset($details) ? base64_encode($details->left_image) : '') }}"/>
                        <input type="file" name="left_image" {{ isset($details) ? '' : 'required' }} class="form-control form-control-user" />
                        <small class="text-muted">Please upload image with 440x400 dimensions</small>
                    </div>
                    <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                        <label><span style="color: red;">{{ isset($details) ? '' : '*' }}</span> Right Image</label>
                        <input type="hidden" name="old_right_image" value="{{ old('right_image') ?? (isset($details) ? base64_encode($details->right_image) : '') }}"/>
                        <input type="file" name="right_image"  {{ isset($details) ? '' : 'required' }} class="form-control form-control-user" />
                        <small class="text-muted">Please upload image with 440x400 dimensions</small>
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
                <a class="btn btn-primary float-right mr-3 mb-3" href="{{ route('gift.category-list') }}">Cancel</a>
            </div>
        </form>
    </div>
</div>
@endsection