@extends('layouts.app')

@section('title', isset($cdo) ? 'Edit CDO' : 'Add CDO')

@section('content')

<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">{{ isset($cdo) ? 'Edit' : 'Add' }} CDO</h1>
        <a href="{{ route('cdo.index') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-arrow-left fa-sm text-white-50"></i> Back</a>
    </div>

    {{-- Alert Messages --}}
    @include('common.alert')

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <form method="POST" action="{{ route('cdo.store') }}" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" value="{{ isset($cdo) ? $cdo->id : '' }}">
            <div class="card-body">
                <div class="form-group row">
                    <!-- Name Field -->
                     <!-- Status Field -->
                    <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                        <label><span style="color: red;">*</span> Category</label>
                        <select name="category" required class="form-control form-control-user">
                            <option value="">Select Category</option>
                            @foreach($cdo_category as $category)
                                <option value="{{ $category->id }}"
                                    {{ old('category') == $category->id || (isset($cdo) && $cdo->category == $category->id) ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                        <label><span style="color: red;">*</span>CDO Name</label>
                        <input type="text" name="name" value="{{ old('name') ?? ($cdo->name ?? '') }}" required class="form-control form-control-user" />
                    </div>
                    <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                        <label><span style="color: red;">*</span> Business</label>
                        <input type="text" name="business" value="{{ old('business') ?? ($cdo->business ?? '') }}" required class="form-control form-control-user" />
                    </div>
                    <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                        <label><span style="color: red;">*</span>Status</label>
                        <select name="status" required class="form-control form-control-user">
                            <option value="">Select Status</option>
                            <option value="0" {{ (old('status') ?? ($cdo->status ?? '')) == 0 ? 'selected' : '' }}>Inactive</option>
                            <option value="1" {{ (old('status') ?? ($cdo->status ?? '')) == 1 ? 'selected' : '' }}>Active</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-success btn-user float-right mb-3">
                    {{ isset($cdo) ? 'Update' : 'Add' }}
                </button>
                <a class="btn btn-primary float-right mr-3 mb-3" href="{{ route('cdo.index') }}">Cancel</a>
            </div>
        </form>
    </div>

</div>

@endsection