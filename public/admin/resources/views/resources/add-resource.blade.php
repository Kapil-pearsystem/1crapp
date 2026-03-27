@extends('layouts.app')

@section('title', isset($resource) ? 'Edit Resource' : 'Add Resource')

@section('content')

<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">{{ isset($resource) ? 'Edit' : 'Add' }} Resource</h1>
        <a href="{{ route('resources-and-tools.index') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-arrow-left fa-sm text-white-50"></i> Back</a>
    </div>

    {{-- Alert Messages --}}
    @include('common.alert')

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <form method="POST" action="{{ route('resources-and-tools.store') }}" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" value="{{ isset($resource) ? $resource->id : '' }}">
            <div class="card-body">
                <div class="form-group row">
                    <!-- Name Field -->
                     <!-- Status Field -->
                    <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                        <label><span style="color: red;">*</span> Category</label>
                        <select name="category" required class="form-control form-control-user">
                            <option value="">Select Category</option>
                            @foreach($resources_category as $category)
                                <option value="{{ $category->id }}"
                                    {{ old('category') == $category->id || (isset($resource) && $resource->category == $category->id) ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                        <label><span style="color: red;">*</span> Title</label>
                        <input type="text" name="title" value="{{ old('title') ?? ($resource->title ?? '') }}" required class="form-control form-control-user" />
                    </div>
                    <div class="col-sm-12 mb-3 mt-3 mb-sm-0">
                        <span style="color: red;">*</span>Description 					 
                        <textarea id="" name="description" placeholder="Description" class="form-control form-control-user"  rows="4" cols="50">{{ old('description') ?? ($resource->description ?? '') }}</textarea>
					</div>
                    <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                        <label><span style="color: red;">*</span> Link </label>
                        <input type="url" name="link" value="{{ old('link') ?? ($resource->link ?? '') }}" required class="form-control form-control-user" />
                    </div>
                    <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                        <label><span style="color: red;">*</span>Authorization</label>
                        <select name="authorization" required class="form-control form-control-user">
                            <option value="">Select Status</option>
                            <option value="0" {{ (old('authorization') ?? ($resource->authorization ?? '')) == 0 ? 'selected' : '' }}>No</option>
                            <option value="1" {{ (old('authorization') ?? ($resource->authorization ?? '')) == 1 ? 'selected' : '' }}>Yes</option>
                        </select>
                    </div>
                    <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                        <label><span style="color: red;">*</span>Ribbon</label>
                        <select name="ribbon" required class="form-control form-control-user">
                            <option value="">Select Ribbon</option>
                            <option value="HOT" {{ (old('ribbon') ?? ($resource->ribbon ?? '')) == 'HOT' ? 'selected' : '' }}>HOT</option>
                            <!-- <option value="2" {{ (old('ribbon') ?? ($resource->ribbon ?? '')) == 2 ? 'selected' : '' }}>Yes</option> -->
                        </select>
                    </div>
                    <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                        <label><span style="color: red;">*</span>Status</label>
                        <select name="status" required class="form-control form-control-user">
                            <option value="">Select Status</option>
                            <option value="0" {{ (old('status') ?? ($resource->status ?? '')) == 0 ? 'selected' : '' }}>Inactive</option>
                            <option value="1" {{ (old('status') ?? ($resource->status ?? '')) == 1 ? 'selected' : '' }}>Active</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-success btn-user float-right mb-3">
                    {{ isset($resource) ? 'Update' : 'Add' }}
                </button>
                <a class="btn btn-primary float-right mr-3 mb-3" href="{{ route('resources-and-tools.index') }}">Cancel</a>
            </div>
        </form>
    </div>

</div>

@endsection