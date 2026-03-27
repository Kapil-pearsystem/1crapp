@extends('layouts.app')

@section('title', 'Edit FAQ Category')

@section('content')

<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit FAQ Category</h1>
        <a href="{{ route('faq.category.index') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
            <i class="fas fa-arrow-left fa-sm text-white-50"></i> Back to Category List
        </a>
    </div>

    {{-- Alert Messages --}}
    @include('common.alert')

    <!-- Edit FAQ Category Form -->
    <div class="card shadow mb-4">

            <form action="{{ route('faq.category.update', $category->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="card-body">
                <div class="form-group row">
                <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                    <span style="color: red;">*</span> Title
                    <input type="text" class="form-control @error('title') is-invalid @enderror" placeholder="Enter Title" id="title" name="title" value="{{ old('title', $category->title) }}" required>
                    @error('title')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                    <span style="color: red;">*</span> Priority
                    <input type="text" class="form-control @error('title') is-invalid @enderror"  placeholder="Enter priority" id="priority" name="priority" value="{{ old('priority', $category->priority) }}" required onkeypress="return (event.charCode !=8 && event.charCode ==0 || ( event.charCode == 46 || (event.charCode >= 48 && event.charCode <= 57)))">
                    @error('title')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-sm-12 mb-3 mt-3 mb-sm-0">
                    <span style="color: red;">*</span> Status
                    <select class="form-control @error('status') is-invalid @enderror" id="status" name="status" required>
                        <option value="1" {{ old('status', $category->status) == 1 ? 'selected' : '' }}>Active</option>
                        <option value="0" {{ old('status', $category->status) == 0 ? 'selected' : '' }}>Inactive</option>
                    </select>
                    @error('status')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="card-footer">
                <button type="submit" class="btn btn-success btn-user float-right mb-3">Save Changes</button>
                <a class="btn btn-primary float-right mr-3 mb-3" href="{{ route('faq.category.index') }}">Cancel</a>
            </div>
            </form>
        </div>
    </div>

</div>

@endsection