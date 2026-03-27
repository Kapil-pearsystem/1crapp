@extends('layouts.app')
@section('title', isset($gift_category) ? 'Edit Gift Category' : 'Add Gift Category')
@section('content')

<div class="container-fluid">

    <!-- Page Heading -->

    <div class="d-sm-flex align-items-center justify-content-between mb-4">

        <h1 class="h3 mb-0 text-gray-800">{{ isset($gift_category) ? 'Edit' : 'Add' }} Gift Category</h1>

        <a href="{{ route('gift.category-list') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-arrow-left fa-sm text-white-50"></i> Back</a>

    </div>



    {{-- Alert Messages --}}

    @include('common.alert')



    <!-- DataTales Example -->

    <div class="card shadow mb-4">

        <form method="POST" action="{{ route('gift.store-category') }}">

            @csrf

            <input type="hidden" name="id" value="{{ isset($gift_category) ? $gift_category->id : '' }}">

            <div class="card-body">

                <div class="form-group row">

                    <!-- Name Field -->

                    <div class="col-sm-6 mb-3 mt-3 mb-sm-0">

                        <label><span style="color: red;">*</span> Name</label>

                        <input type="text" name="name" value="{{ old('name') ?? ($gift_category->name ?? '') }}" required class="form-control form-control-user" />

                    </div>



                    <!-- Status Field -->

                    <div class="col-sm-6 mb-3 mt-3 mb-sm-0">

                        <label>Status</label>

                        <select name="status" required class="form-control form-control-user">

                            <option value="">Select Status</option>

                            <option value="0" {{ (old('status') ?? ($gift_category->status ?? '')) == 0 ? 'selected' : '' }}>Inactive</option>

                            <option value="1" {{ (old('status') ?? ($gift_category->status ?? '')) == 1 ? 'selected' : '' }}>Active</option>

                        </select>

                    </div>

                </div>

            </div>



            <div class="card-footer">

                <button type="submit" class="btn btn-success btn-user float-right mb-3">

                    {{ isset($gift_category) ? 'Update' : 'Add' }}

                </button>

                <a class="btn btn-primary float-right mr-3 mb-3" href="{{ route('gift.category-list') }}">Cancel</a>

            </div>

        </form>

    </div>



</div>



@endsection

