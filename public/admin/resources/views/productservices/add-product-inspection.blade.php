@extends('layouts.app')

@section('title', isset($inspection) ? 'Edit Product Inspection' : 'Add Product Inspection')

@section('content')
<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">
            {{ isset($inspection) ? 'Edit Product Inspection' : 'Add Product Inspection' }}
        </h1>

        <a href="{{ route('productservices.inspection.list', $product_id) }}"
           class="btn btn-sm btn-primary shadow-sm">
            <i class="fas fa-arrow-left fa-sm text-white-50"></i> Back
        </a>
    </div>

    @include('common.alert')

    <div class="card shadow mb-4">
        <form method="POST" action="{{ route('productservices.inspection.store') }}">
            @csrf

            {{-- Hidden Fields --}}
            <input type="hidden" name="id" value="{{ $inspection->id ?? '' }}">
            <input type="hidden" name="product_id" value="{{ $product_id }}">

            <div class="card-body">
                <div class="form-group row">

                    {{-- Bullet 1 --}}
                    <div class="col-sm-6 mb-3">
                        Bullet 1
                        <input type="text" name="bullet1"
                               value="{{ old('bullet1', $inspection->bullet1 ?? '') }}"
                               class="form-control form-control-user">
                    </div>

                    {{-- Bullet 2 --}}
                    <div class="col-sm-6 mb-3">
                        Bullet 2
                        <input type="text" name="bullet2"
                               value="{{ old('bullet2', $inspection->bullet2 ?? '') }}"
                               class="form-control form-control-user">
                    </div>

                    {{-- Bullet 3 --}}
                    <div class="col-sm-6 mb-3">
                        Bullet 3
                        <input type="text" name="bullet3"
                               value="{{ old('bullet3', $inspection->bullet3 ?? '') }}"
                               class="form-control form-control-user">
                    </div>

                    {{-- Bullet 4 --}}
                    <div class="col-sm-6 mb-3">
                        Bullet 4
                        <input type="text" name="bullet4"
                               value="{{ old('bullet4', $inspection->bullet4 ?? '') }}"
                               class="form-control form-control-user">
                    </div>

                    {{-- Bullet 5 --}}
                    <div class="col-sm-6 mb-3">
                        Bullet 5
                        <input type="text" name="bullet5"
                               value="{{ old('bullet5', $inspection->bullet5 ?? '') }}"
                               class="form-control form-control-user">
                    </div>

                    {{-- Bullet 6 --}}
                    <div class="col-sm-6 mb-3">
                        Bullet 6
                        <input type="text" name="bullet6"
                               value="{{ old('bullet6', $inspection->bullet6 ?? '') }}"
                               class="form-control form-control-user">
                    </div>

                    
                    {{-- YouTube Embed Link --}}
                    <div class="col-sm-6 mb-3">
                        YouTube Embed Link
                        <input type="text" name="youtube_embed_link"
                               placeholder="https://www.youtube.com/embed/XXXX"
                               value="{{ old('youtube_embed_link', $inspection->youtube_embed_link ?? '') }}"
                               class="form-control form-control-user">
                    </div>
                    {{--  Title --}}
                    <div class="col-sm-6 mb-3">
                         Title
                        <input type="text" name="title"
                               value="{{ old('title', $inspection->title ?? '') }}"
                               class="form-control form-control-user">
                    </div>


                    {{-- Title Link --}}
                    <div class="col-sm-6 mb-3">
                         Title Link
                        <input type="text" name="title_link"
                               value="{{ old('title_link', $inspection->title_link ?? '') }}"
                               class="form-control form-control-user">
                    </div>

                    {{-- Status --}}
                    <div class="col-sm-6 mb-3">
                        Status
                        <select name="status" class="form-control form-control-user" required>
                            <option value="1" {{ (old('status', $inspection->status ?? 1) == 1) ? 'selected' : '' }}>
                                Active
                            </option>
                            <option value="0" {{ (old('status', $inspection->status ?? 1) == 0) ? 'selected' : '' }}>
                                Inactive
                            </option>
                        </select>
                    </div>

                </div>
            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-success btn-user float-right mb-3">
                    {{ isset($inspection) ? 'Update' : 'Save' }}
                </button>

                <a class="btn btn-primary float-right mr-3 mb-3"
                   href="{{ route('productservices.inspection.list', $product_id) }}">
                    Cancel
                </a>
            </div>

        </form>
    </div>
</div>
@endsection
