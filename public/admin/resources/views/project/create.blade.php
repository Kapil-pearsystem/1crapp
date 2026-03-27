@extends('layouts.app')

@section('title', isset($project) ? 'Edit Project' : 'Add Project')

@section('content')
<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">{{ isset($project) ? 'Edit' : 'Add' }} Project</h1>
        <a href="{{ route('project.index') }}" class="btn btn-sm btn-primary shadow-sm">
            <i class="fas fa-arrow-left fa-sm text-white-50"></i> Back
        </a>
    </div>

    @include('common.alert')

    <div class="card shadow mb-4">
        <form method="POST" action="{{ route('project.store') }}" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" value="{{ $project->id ?? '' }}">

            <div class="card-body">

                <div class="form-group">
                    <label>Category <span class="text-danger">*</span></label>
                    <select name="category_id" class="form-control" required>
                        <option value="">Select Category</option>
                        @foreach($categories as $cat)
                            <option value="{{ $cat->id }}" {{ isset($project) && $project->category_id == $cat->id ? 'selected' : '' }}>{{ $cat->title }}</option>
                        @endforeach
                    </select>
                    @error('category_id')<span class="text-danger">{{ $message }}</span>@enderror
                </div>

                <div class="form-group">
                    <label>Title <span class="text-danger">*</span></label>
                    <input type="text" name="title" class="form-control" placeholder="Enter Title"
                        value="{{ old('title', $project->title ?? '') }}" required>
                    @error('title')<span class="text-danger">{{ $message }}</span>@enderror
                </div>

                <div class="form-group">
                    <label>Description</label>
                    <textarea name="description" class="form-control" rows="5">{{ old('description', $project->description ?? '') }}</textarea>
                    @error('description')<span class="text-danger">{{ $message }}</span>@enderror
                </div>

                <div class="form-group">
                    <label>Status <span class="text-danger">*</span></label>
                    <select name="status" class="form-control" required>
                        <option value="1" {{ old('status', $project->status ?? 1) == 1 ? 'selected' : '' }}>Active</option>
                        <option value="0" {{ old('status', $project->status ?? 1) == 0 ? 'selected' : '' }}>Inactive</option>
                    </select>
                </div>

                <hr>
                <h5>Project Media (Images / Videos)</h5>

                <div id="media-container">
                    @if(isset($project) && $project->media && $project->media->count() > 0)
                        @foreach($project->media as $index => $media)
                            <div class="media-item mb-3">
                                <input type="hidden" name="existing_media_ids[]" value="{{ $media->id }}">
                                <div class="form-row">
                                    <div class="col-md-3">
                                        <label>Media Type</label>
                                        <select name="media_types[]" class="form-control">
                                            <option value="image" {{ $media->media_type=='image' ? 'selected' : '' }}>Image</option>
                                            <option value="video" {{ $media->media_type=='video' ? 'selected' : '' }}>Video</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <label>File</label>
                                        <input type="file" name="media_files[]" class="form-control" accept="image/*,video/*">
                                        @if($media->media_type=='image')
                                            <img src="{{ asset($media->file_path) }}" style="max-width:100px;margin-top:10px;">
                                        @elseif($media->media_type=='video')
                                            @if(filter_var($media->file_path, FILTER_VALIDATE_URL))
                                                <a href="{{ $media->file_path }}" target="_blank">Video Link</a>
                                            @else
                                                <video width="120" controls>
                                                    <source src="{{ asset($media->file_path) }}" type="video/mp4">
                                                </video>
                                            @endif
                                        @endif
                                    </div>
                                    <div class="col-md-3">
                                        <label>Link (Optional)</label>
                                        <input type="text" name="media_links[]" class="form-control" value="{{ $media->link }}">
                                    </div>
                                    <div class="col-md-2">
                                        <label>Status</label>
                                        <select name="media_statuses[]" class="form-control">
                                            <option value="1" {{ $media->status==1 ? 'selected' : '' }}>Active</option>
                                            <option value="0" {{ $media->status==0 ? 'selected' : '' }}>Inactive</option>
                                        </select>
                                    </div>
                                    <div class="col-md-1">
                                        <label>Action</label>
                                        <button type="button" class="btn btn-danger btn-block remove-media">Remove</button>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <!-- Default media field -->
                        <div class="media-item mb-3">
                            <div class="form-row">
                                <div class="col-md-3">
                                    <label>Media Type</label>
                                    <select name="media_types[]" class="form-control">
                                        <option value="image">Image</option>
                                        <option value="video">Video</option>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label>File</label>
                                    <input type="file" name="media_files[]" class="form-control" accept="image/*,video/*">
                                </div>
                                <div class="col-md-3">
                                    <label>Link (Optional)</label>
                                    <input type="text" name="media_links[]" class="form-control">
                                </div>
                                <div class="col-md-2">
                                    <label>Status</label>
                                    <select name="media_statuses[]" class="form-control">
                                        <option value="1" selected>Active</option>
                                        <option value="0">Inactive</option>
                                    </select>
                                </div>
                                <div class="col-md-1">
                                    <label>Action</label>
                                    <button type="button" class="btn btn-danger btn-block remove-media">Remove</button>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>

                <button type="button" class="btn btn-success" id="add-media">Add Media</button>

            </div>

            <div class="card-footer mt-3">
                <button type="submit" class="btn btn-success float-right">{{ isset($project) ? 'Update' : 'Add' }}</button>
                <a class="btn btn-secondary float-right mr-2" href="{{ route('project.index') }}">Cancel</a>
            </div>
        </form>
    </div>
</div>

@endsection
@section('scripts')

<!-- jQuery Include -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
$(document).ready(function () {

    // ADD MEDIA FIELD
    $('#add-media').click(function () {

        let html = `
        <div class="media-item mb-3">
            <div class="form-row">

                <div class="col-md-3">
                    <label>Media Type</label>
                    <select name="media_types[]" class="form-control">
                        <option value="image">Image</option>
                        <option value="video">Video</option>
                    </select>
                </div>

                <div class="col-md-3">
                    <label>File</label>
                    <input type="file" name="media_files[]" class="form-control" accept="image/*,video/*">
                </div>

                <div class="col-md-3">
                    <label>Link (Optional)</label>
                    <input type="text" name="media_links[]" class="form-control">
                </div>

                <div class="col-md-2">
                    <label>Status</label>
                    <select name="media_statuses[]" class="form-control">
                        <option value="1" selected>Active</option>
                        <option value="0">Inactive</option>
                    </select>
                </div>

                <div class="col-md-1">
                    <label>Action</label>
                    <button type="button" class="btn btn-danger btn-block remove-media">Remove</button>
                </div>

            </div>
        </div>`;

        $('#media-container').append(html);
    });

    // REMOVE MEDIA FIELD
    $(document).on('click', '.remove-media', function () {
        $(this).closest('.media-item').remove();
    });

});
</script>
@endsection