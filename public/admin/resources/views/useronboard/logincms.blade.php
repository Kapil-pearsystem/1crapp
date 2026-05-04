@extends('layouts.app')

@section('title', isset($details) ? 'Login CMS' : 'Add Login CMS')

@section('content')
<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">{{ isset($details) ? 'Edit' : 'Add' }} Login CMS</h1>
        <a href="#" onclick="window.history.back();" class="btn btn-sm btn-primary shadow-sm">
            <i class="fas fa-arrow-left fa-sm text-white-50"></i> Back
        </a>
    </div>

    @include('common.alert')
    
    <div class="card shadow mb-4">
        <form method="POST" action="{{ route('user-onboard-cms.login.save') }}" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" value="{{ $details->id ?? '' }}">
            <div class="card-body row">



                {{-- Tagline --}}
                <div class="col-sm-8 mb-3">
                    <div class="form-group">
                        <label>Tagline Text</label>
                        <input type="text" name="tagline_text" class="form-control" placeholder="Please Enter Tagline"
                            value="{{ old('tagline_text', $details->tagline_text ?? '') }}">
                    </div>
                </div>

                <div class="col-sm-4 mb-3 swich_bntts">
                    Tagline Visible
                    <div class="block_araea mt-1">
                        <label class="switch">
                            <input type="checkbox" name="tagline_visible" value="1"
                                {{ old('tagline_visible', $details->tagline_visible ?? 1) == 1 ? 'checked' : '' }}>
                            <small></small>
                        </label>
                    </div>
                </div>

                <div class="col-sm-2 mb-3 swich_bntts">
                    File Visible
                    <div class="block_araea mt-1">
                        <label class="switch">
                            <input type="checkbox" name="file_visible" value="1"
                                {{ old('file_visible', $details->file_visible ?? 1) == 1 ? 'checked' : '' }}>
                            <small></small>
                        </label>
                    </div>
                </div>
                {{-- File Upload --}}
                <div class="col-sm-4 mb-3">
                    <div class="form-group">
                        <label>File Type</label>
                        <select name="file_type" id="file_type" class="form-control form-control-user"
                            onchange="setMedia(this.value)">
                            <option selected="selected" disabled="disabled">Select Media Type</option>
                            <option value="1"
                                {{ (old('file_type') ?? ($details->file_type ?? '')) == 1 ? 'selected' : '' }}>Image
                            </option>
                            <option value="2"
                                {{ (old('file_type') ?? ($details->file_type ?? '')) == 2 ? 'selected' : '' }}>Embed
                                Link</option>
                            <option value="3"
                                {{ (old('file_type') ?? ($details->file_type ?? '')) == 3 ? 'selected' : '' }}>Video
                            </option>
                        </select>
                    </div>
                </div>
                <div class="col-sm-6 mb-2 mt-1 mb-sm-0" id="media_type_file" <?php if ((old("file_type") ?? ($details->file_type ?? "")) != 1) { ?> style="display:none;" <?php } ?>>
                     Media File
                    <input type="file" id="" placeholder="Enter Media File" name="file_path" value="{{ old('file_path')}}" {{ isset($details)?'' : ''}} class="form-control form-control-user" /> 
                    <input type="hidden" name="old_media_file" value="{{ isset($details)?$details->file_path : ''}}" />
                    @if(isset($details) && !empty($details->file_path) && ($details->file_type == 1))
                        <img src="{{ asset($details->file_path) }}" alt="Media File" class="img-thumbnail mt-2" style="max-width: 100px; max-height: 100px;" >
                    @endif
                </div>
                <div class="col-sm-6 mb-2 mt-1 mb-sm-0" id="media_type_link" <?php if ((old("file_type") ?? ($details->file_type ?? "")) == 2) { ?> style="display:block;" <?php } else { ?>style="display:none;" <?php } ?>>
                    Enter Embeded Link
                    <input type="url" id="media_link" placeholder="Enter Embeded Link.. " name="media_link" value="{{ old('media_link')??($details->file_path ?? '')}}" {{ isset($details)?'' : ''}} class="form-control form-control-user" />
                    <span id="mediaLinkError" class="err text-danger"></span> @if(session('media_link_error')) <span class="text-danger"> {{ session('media_link_error') }} </span> @endif
                    @if(isset($details) && !empty($details->file_path) && ($details->file_type == 2))
                        <div class="embed-responsive embed-responsive-16by9 mt-2" style="max-width: 100px; height: auto;">
                            <iframe class="embed-responsive-item" src="{{ $details->file_path }}" allowfullscreen></iframe>
                        </div>
                    @endif
                </div>
                <div class="col-sm-6 mb-2 mt-1 mb-sm-0" id="video_link" <?php if ((old("file_type") ?? ($details->file_type ?? "")) ==3) { ?> style="display:block;" <?php } else { ?>style="display:none;" <?php } ?>>
                    Enter URL or Link
                    <input type="url" id="media_link" placeholder="Enter URL or Link" name="media_link" value="{{ old('media_link')??($details->file_path ?? '')}}" {{ isset($details)?'' : ''}} class="form-control form-control-user" />
                    <span id="mediaLinkError" class="err text-danger"></span> @if(session('media_link_error')) <span class="text-danger"> {{ session('media_link_error') }} </span> @endif
                    @if(isset($details) && !empty($details->file_path) && ($details->file_type == 3))
                        <div class="embed-responsive embed-responsive-16by9 mt-2" style="max-width: 100px; max-height: 100px;">
                            <iframe class="embed-responsive-item" src="{{ $details->file_path }}" allowfullscreen></iframe>
                        </div>
                    @endif
                </div>
                <div class="col-sm-12">
                </div>
                <div class="col-sm-10 mb-3">
                    <label for="description">Content</label>
                    <textarea name="content" class="form-control" placeholder="Please Enter Description"
                        rows="2">{{ old('content', $details->content ?? '') }}</textarea>
                </div>
                <div class="col-sm-2 mb-3 swich_bntts">
                    Content Visible
                    <div class="block_araea mt-1">
                        <label class="switch">
                            <input type="checkbox" name="content_visible" value="1"
                                {{ old('content_visible', $details->content_visible ?? 1) == 1 ? 'checked' : '' }}>
                            <small></small>
                        </label>
                    </div>
                </div>
                <div class="col-sm-2 mb-3 swich_bntts">
                    Got it Visible
                    <div class="block_araea mt-1">
                        <label class="switch">
                            <input type="checkbox" name="gotit_visible" value="1"
                                {{ old('gotit_visible', $details->gotit_visible ?? 1) == 1 ? 'checked' : '' }}>
                            <small></small>
                        </label>
                    </div>
                </div>
                <div class="col-sm-4 mb-2 mt-1 mb-sm-0">
                    Got it Image
                    <input type="file" id="" placeholder="Enter Media File" name="gotit_image" value="{{ old('gotit_image')}}" class="form-control form-control-user" /> 
                    <input type="hidden" name="old_gotit_image" value="{{ isset($details)?$details->gotit_image : ''}}" />
                    @if(isset($details) && !empty($details->gotit_image))
                        <img src="{{ $details->gotit_image }}" alt="Got it Image" class="img-thumbnail mt-2" style="max-width: 100px;">
                    @endif
                </div>
                <div class="col-sm-6 mb-2 mt-1 mb-sm-0" >
                    Enter Got it URL or Link
                    <input type="url" placeholder="Pest URL or Link" name="gotit_link" value="{{ old('gotit_link')??($details->gotit_link ?? '')}}" class="form-control form-control-user" />
                    <span id="gotitLinkError" class="err text-danger"></span> @if(session('gotit_link_error')) <span class="text-danger"> {{ session('gotit_link_error') }} </span> @endif
                </div>

                {{-- Logo Visible --}}
                <div class="col-sm-2 mb-3 swich_bntts">
                    Logo Visible
                    <div class="block_araea mt-1">
                        <label class="switch">
                            <input type="checkbox" name="logo_visible" value="1"
                                {{ old('logo_visible', $details->logo_visible ?? 1) == 1 ? 'checked' : '' }}>
                            <small></small>
                        </label>
                    </div>
                </div>
                {{-- Status --}}
                <div class="col-sm-6 mb-3">
                    <div class="form-group">
                        <label>Status</label>
                        <select name="status" class="form-control">
                            <option value="1" {{ old('status', $details->status ?? 1) == 1 ? 'selected' : '' }}>Active</option>
                            <option value="0" {{ old('status', $details->status ?? 1) == 0 ? 'selected' : '' }}>Inactive</option>
                        </select>
                    </div>
                </div>

            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-success float-right">
                    {{ isset($details) ? 'Update' : 'Add' }}
                </button>
            </div>
        </form>
    </div>
</div>
@endsection

@section('scripts')
<script>
    function setMedia(media_type) {
        if (media_type == 2) {
            $('#video_link').attr('style', 'display: none !important');
            $('#media_type_file').attr('style', 'display: none !important');
            $('#media_type_link').attr('style', 'display: block !important');
        } else if (media_type == 3) {
            $('#video_link').attr('style', 'display: block !important');
            $('#media_type_file').attr('style', 'display: none !important');
            $('#media_type_link').attr('style', 'display: none !important');
        } else {
            $('#video_link').attr('style', 'display: none !important');
            $('#media_type_file').attr('style', 'display: block !important');
            $('#media_type_link').attr('style', 'display: none !important');
        }
    }
</script>
@endsection