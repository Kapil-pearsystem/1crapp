@extends('layouts.app')

@section('title', isset($contact) ? 'Edit Contact' : 'Add Contact')

@section('content')

<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">{{ isset($contact) ? 'Edit Contact' : 'Add Contact' }}</h1>
        <a href="{{ route('lists.index') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
            <i class="fas fa-arrow-left fa-sm text-white-50"></i> Back
        </a>
    </div>

   {{-- Alert Messages --}}
    @include('common.alert')
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <form method="POST" action="{{ route('lists.store') }}">
            @csrf
                <input type="hidden" name="id" value="{{ isset($contact) ? $contact->id : '' }}"/>

            <div class="card-body">
                <div class="form-group row">
                    <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                        <span style="color: red;">*</span> Name
                        <input type="text" id="" placeholder="" name="name" value="{{ old('name', $contact->name ?? '') }}" required class="form-control form-control-user" />
                    </div>
                    <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                        <span style="color: red;">&nbsp;</span> Status
                        <select name="status" required class="form-control form-control-user">
                            <option value="">Select Status</option>
                            <option value="0" {{ old('status', $contact->status ?? '') == '0' ? 'selected' : '' }}>Inactive</option>
                            <option value="1" {{ old('status', $contact->status ?? '') == '1' ? 'selected' : '' }}>Active</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-success btn-user float-right mb-3">{{ isset($contact) ? 'Update' : 'Add' }}</button>
                <a class="btn btn-primary float-right mr-3 mb-3" href="{{ route('lists.index') }}">Cancel</a>
            </div>
        </form>
    </div>

</div>

@endsection
