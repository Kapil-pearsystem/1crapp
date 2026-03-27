@extends('layouts.app')

@section('title', 'Landing Locations')

@section('content')
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Landing Locations</h1>
        <a href="{{ route('landing-location.create') }}" class="btn btn-primary btn-sm shadow-sm">
            <i class="fas fa-plus"></i> Add Location
        </a>
    </div>

    @include('common.alert')

    <div class="card shadow mb-4">
        <div class="card-body">
            @if($locations->count())
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Image</th>
                            <th>Description</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($locations as $loc)
                            <tr>
                                <td>{{ $loc->title }}</td>
                                <td>
                                    @if($loc->image)
                                        <img src="{{ $loc->image }}" alt="Image" style="width: 100px; height: auto;">
                                    @endif
                                </td>
                                <td>{!! \Illuminate\Support\Str::limit(strip_tags($loc->description), 50) !!}</td>
                                <td>
                                    @if($loc->status)
                                        <span class="badge badge-success">Active</span>
                                    @else
                                        <span class="badge badge-secondary">Inactive</span>
                                    @endif
                                </td>
                                <td>
                                     <a href="{{ route('landing-location.edit', ['id'=>$loc->id]) }}" class="btn btn-primary btn-sm">
                                    <i class="fa fa-pen"></i>
                                </a>

                                <a href="#" class="btn btn-danger btn-sm"
                                   onclick="if(confirm('Are you sure you want to delete this?')){ window.location.href='{{ route('landing-location.delete', [$loc->id]) }}'; }">
                                    <i class="fa fa-trash"></i>
                                </a>
                                </td>
                            </tr>
                        @endforeach
                        @else
                <p>No locations found.</p>
            @endif
                    </tbody>
                </table>
            
        </div>
    </div>
</div>
@endsection
