@extends('layouts.app')

@section('title', isset($details) ? 'Edit Team Member' : 'Add Team Member')

@section('content')
<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">{{ isset($details) ? 'Edit' : 'Add' }} Team Member</h1>
        <a href="{{ route('team-detail.index') }}" class="btn btn-sm btn-primary shadow-sm">
            <i class="fas fa-arrow-left fa-sm text-white-50"></i> Back
        </a>
    </div>

    @include('common.alert')

    <div class="card shadow mb-4">
        <form method="POST" action="{{ route('team-detail.store') }}" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" value="{{ $details->id ?? '' }}">
            <input type="hidden" name="old_image" value="{{ $details->image ?? '' }}">

            <div class="card-body">
                <div class="form-group">
                    <label>Category <span class="text-danger">*</span></label>
                    <select name="category_id" class="form-control" required>
                        <option value="">Select Category</option>
                        @foreach($categories as $cat)
                            <option value="{{ $cat->id }}" {{ (old('category_id', $details->category_id ?? '') == $cat->id) ? 'selected' : '' }}>
                                {{ $cat->category }}
                            </option>
                        @endforeach
                    </select>
                    @error('category_id')<span class="text-danger">{{ $message }}</span>@enderror
                </div>

                <div class="form-group">
                    <label>Name <span class="text-danger">*</span></label>
                    <input type="text" name="name" class="form-control" placeholder="Enter Name"
                           value="{{ old('name', $details->name ?? '') }}" required>
                    @error('name')<span class="text-danger">{{ $message }}</span>@enderror
                </div>

                <div class="form-group">
                    <label>Designation <span class="text-danger">*</span></label>
                    <input type="text" name="designation" class="form-control" placeholder="Enter Designation"
                           value="{{ old('designation', $details->designation ?? '') }}" required>
                    @error('designation')<span class="text-danger">{{ $message }}</span>@enderror
                </div>

                <div class="form-group">
                    <label>Description</label>
                    <textarea name="description" class="form-control" rows="5">{{ old('description', $details->description ?? '') }}</textarea>
                    @error('description')<span class="text-danger">{{ $message }}</span>@enderror
                </div>

                <div class="form-group">
                    <label>Button Title</label>
                    <input type="text" name="button_title" class="form-control"
                           value="{{ old('button_title', $details->button_title ?? '') }}">
                    @error('button_title')<span class="text-danger">{{ $message }}</span>@enderror
                </div>

                <div class="form-group">
                    <label>Button Link</label>
                    <input type="url" name="button_link" class="form-control"
                           value="{{ old('button_link', $details->button_link ?? '') }}">
                    @error('button_link')<span class="text-danger">{{ $message }}</span>@enderror
                </div>

                <div class="form-group">
                    <label>Image @if(!isset($details))<span class="text-danger">*</span>@endif</label>
                    <input type="file" name="image" class="form-control" accept="image/*" onchange="previewImage(this)">
                    @if(!empty($details->image))
                        <img id="previewImg" src="{{ asset($details->image) }}" style="max-width:150px;margin-top:10px;">
                    @else
                        <img id="previewImg" style="max-width:150px;margin-top:10px; display:none;">
                    @endif
                    @error('image')<span class="text-danger">{{ $message }}</span>@enderror
                </div>

                {{-- Social Links --}}
                <div class="form-group">
                    <label>Facebook</label>
                    <input type="url" name="facebook" class="form-control" value="{{ old('facebook', $details->facebook ?? '') }}">
                </div>
                <div class="form-group">
                    <label>Instagram</label>
                    <input type="url" name="instagram" class="form-control" value="{{ old('instagram', $details->instagram ?? '') }}">
                </div>
                <div class="form-group">
                    <label>Youtube</label>
                    <input type="url" name="youtube" class="form-control" value="{{ old('youtube', $details->youtube ?? '') }}">
                </div>
                <div class="form-group">
                    <label>Linkedin</label>
                    <input type="url" name="linkedin" class="form-control" value="{{ old('linkedin', $details->linkedin ?? '') }}">
                </div>
                <div class="form-group">
                    <label>Twitter</label>
                    <input type="url" name="twitter" class="form-control" value="{{ old('twitter', $details->twitter ?? '') }}">
                </div>
                <div class="form-group">
                    <label>Whatsapp</label>
                    <input type="text" name="whatsapp" class="form-control" value="{{ old('whatsapp', $details->whatsapp ?? '') }}">
                </div>
                <div class="form-group">
                    <label>Google</label>
                    <input type="url" name="google" class="form-control" value="{{ old('google', $details->google ?? '') }}">
                </div>

                <div class="form-group">
                    <label>Status <span class="text-danger">*</span></label>
                    <select name="status" class="form-control" required>
                        <option value="1" {{ old('status', $details->status ?? 1) == 1 ? 'selected' : '' }}>Active</option>
                        <option value="0" {{ old('status', $details->status ?? 1) == 0 ? 'selected' : '' }}>Inactive</option>
                    </select>
                </div>

            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-success float-right">
                    {{ isset($details) ? 'Update' : 'Add' }}
                </button>
                <a href="{{ route('team-detail.index') }}" class="btn btn-secondary float-right mr-2">Cancel</a>
            </div>
        </form>
    </div>
</div>
@endsection

@section('scripts')
<script>
    function previewImage(input) {
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = function(e) {
                const img = document.getElementById('previewImg');
                img.src = e.target.result;
                img.style.display = 'block';
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
@endsection
