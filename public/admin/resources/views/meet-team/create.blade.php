@extends('layouts.app')

@section('content')

<div class="card">
    <div class="card-header">
        <h4>
            {{ isset($details) ? 'Edit Meet Team ' : 'Add Meet Team ' }}
        </h4>
    </div>

    <div class="card-body">

        <form action="{{ route('meet-team.store') }}" method="POST">
            @csrf

            <input type="hidden" name="id" value="{{ $details->id ?? '' }}">

            <div class="mb-3">
                <label class="form-label">Title <span class="text-danger">*</span></label>
                <input type="text" 
                       name="title" 
                       class="form-control" 
                       value="{{ old('title', $details->title ?? '') }}" 
                       required>
                @error('title') 
                    <small class="text-danger">{{ $message }}</small> 
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Description <span class="text-danger">*</span></label>
                <textarea name="description" 
                          class="form-control editor" 
                          rows="6" 
                          >{{ old('description', $details->description ?? '') }}</textarea>
                @error('description') 
                    <small class="text-danger">{{ $message }}</small> 
                @enderror
            </div>

            {{-- New Fields --}}
            <div class="mb-3">
                <label class="form-label">Button Title</label>
                <input type="text" name="button_title" class="form-control" 
                       value="{{ old('button_title', $details->button_title ?? '') }}">
            </div>

            <div class="mb-3">
                <label class="form-label">Button Link</label>
                <input type="url" name="button_link" class="form-control" 
                       value="{{ old('button_link', $details->button_link ?? '') }}">
            </div>

            <div class="mb-3">
                <label class="form-label">Short Content</label>
                <textarea name="short_content" class="form-control" rows="2">{{ old('short_content', $details->short_content ?? '') }}</textarea>
            </div>

            <div class="mb-3">
                <label class="form-label">Content</label>
                <textarea name="content" class="form-control editor" rows="6">{{ old('content', $details->content ?? '') }}</textarea>
            </div>

            <div class="mb-3">
                <label class="form-label">Status <span class="text-danger">*</span></label>
                <select name="status" class="form-control" required>
                    <option value="1" {{ (isset($details) && $details->status == 1) ? 'selected' : '' }}>Active</option>
                    <option value="0" {{ (isset($details) && $details->status == 0) ? 'selected' : '' }}>Inactive</option>
                </select>
                @error('status') 
                    <small class="text-danger">{{ $message }}</small> 
                @enderror
            </div>

            <button type="submit" class="btn btn-success">
                {{ isset($details) ? 'Update' : 'Submit' }}
            </button>

            <a href="{{ route('meet-team.index') }}" class="btn btn-secondary">Back</a>

        </form>

    </div>
</div>

@endsection

@section('scripts')
<script src="{{ url('ckeditor/ckeditor.js') }}"></script>
<script>
    // Apply CKEditor to all textareas with class "editor"
    document.querySelectorAll('.editor').forEach(function(textarea){
        CKEDITOR.replace(textarea, {
            height: 150
        });
    });
</script>
@endsection
