@extends('layouts.app')

@section('title', isset($details) ? 'Edit Web Setting' : 'Add Web Setting')

@section('content')

<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">{{ isset($details) ? 'Edit' : 'Add' }} Web Setting</h1>

        <a href="{{ route('web-setting.index') }}" class="btn btn-sm btn-primary shadow-sm">
            <i class="fas fa-arrow-left fa-sm text-white-50"></i> Back
        </a>
    </div>

    @include('common.alert')

    <div class="card shadow mb-4">
        
        <form action="{{ route('web-setting.store') }}" method="POST">
            @csrf

            <input type="hidden" name="id" value="{{ $details->id ?? '' }}">

            <div class="card-body">

                <div class="form-group">
                    <label>Address</label>
                    <textarea name="address" id="address_editor" class="form-control" rows="4">{{ old('address', $details->address ?? '') }}</textarea>
                    @error('address') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                <div class="form-group">
                    <label>Phone No</label>
                    <input type="text" name="phone" class="form-control"
                        value="{{ old('phone', $details->phone ?? '') }}"
                        placeholder="Enter phone number">
                    @error('phone') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                <div class="form-group">
                    <label>Email ID</label>
                    <input type="email" name="email" class="form-control"
                        value="{{ old('email', $details->email ?? '') }}"
                        placeholder="Enter Email">
                    @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                <div class="form-group">
                    <label>Google Map Embed Code</label>
                    <textarea name="google_map" class="form-control" rows="4"
                        placeholder="Paste Google Map iframe code here">{{ old('google_map', $details->google_map ?? '') }}</textarea>
                    @error('google_map') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                <div class="form-group">
                    <label>Status <span class="text-danger">*</span></label>
                    <select class="form-control" name="status" required>
                        <option value="1" {{ old('status', $details->status ?? '') == 1 ? 'selected' : '' }}>Active</option>
                        <option value="0" {{ old('status', $details->status ?? '') == 0 ? 'selected' : '' }}>Inactive</option>
                    </select>
                </div>

            </div>

            <div class="card-footer">
                <button class="btn btn-success float-right">{{ isset($details) ? 'Update' : 'Add' }}</button>
                <a href="{{ route('web-setting.index') }}" class="btn btn-secondary float-right mr-2">Cancel</a>
            </div>

        </form>

    </div>

</div>

@endsection

@section('scripts')

<script src="{{ url('ckeditor/ckeditor.js') }}"></script>

<script>
    CKEDITOR.replace('address_editor', {
    uiColor: '#eef1f6',
    allowedContent: true,
    extraAllowedContent: 'iframe[*]'
});

</script>

@endsection
