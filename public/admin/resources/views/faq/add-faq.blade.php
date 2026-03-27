@extends('layouts.app')

@section('title', 'Add FAQ')

@section('content')

<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Add FAQ</h1>
        <a href="{{ route('faq.index') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
            <i class="fas fa-arrow-left fa-sm text-white-50"></i> Back
        </a>
    </div>

    {{-- Alert Messages --}}
    @include('common.alert')

    <!-- FAQ Form Example -->
    <div class="card shadow mb-4">
        <form method="POST" action="{{ route('faq.create.store') }}">
            @csrf
            <div class="card-body">
                <div class="form-group row">

                    <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                        <span style="color: red;">*</span> Category
                        <select name="category_id" class="form-control form-control-user" required>
                            <option value="" disabled selected>Select a Category</option>
                            @foreach($faqcategories as $category)
                            <option value="{{ $category->id }}">{{ $category->title }}</option>
                            @endforeach
                        </select>
                    </div>


                    <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                        <span style="color: red;">*</span> Title
                        <input type="text" name="title" class="form-control form-control-user" required placeholder="Enter the Title">
                    </div>

                    <div class="col-sm-12 mb-3 mt-3 mb-sm-0">
                        <span style="color: red;">*</span> Description
                        <textarea name="description" class="form-control form-control-user" required placeholder="Enter the Description" rows="4"></textarea>
                    </div>



                    <div class="col-sm-6 mb-3 mt-3 mb-sm-0">
                        <span style="color: red;">&nbsp;</span>Status
                        <select name="status" class="form-control form-control-user">
                            <option value="">Select Status</option>
                            <option value="0">Inactive</option>
                            <option value="1" selected="selected">Active</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-success btn-user float-right mb-3">Save</button>
                <a class="btn btn-primary float-right mr-3 mb-3" href="{{ route('faq.index') }}">Cancel</a>
            </div>
        </form>
    </div>

</div>

@endsection