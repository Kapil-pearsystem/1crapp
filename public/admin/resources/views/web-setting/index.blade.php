@extends('layouts.app')

@section('title', 'Web Settings')

@section('content')

<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Web Settings</h1>

        <a href="{{ route('web-setting.create') }}" class="btn btn-sm btn-primary shadow-sm">
            <i class="fas fa-plus fa-sm text-white-50"></i> Add Setting
        </a>
    </div>

    @include('common.alert')

    <div class="card shadow mb-4">
        <div class="card-body">

            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead class="thead-light">
                        <tr>
                            <th>#</th>
                            <th>Address</th>
                            <th>Phone</th>
                            <th>Email</th>
                            <th>Google Map</th>
                            <th>Status</th>
                            <th width="15%">Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($lists as $row)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{!! $row->address !!}</td>
                            <td>{{ $row->phone }}</td>
                            <td>{{ $row->email }}</td>
                            <td>
                                <a href="{{ $row->google_map }}" target="_blank" class="btn btn-sm btn-info">View Map</a>
                            </td>
                            <td>
                                @if($row->status == 1)
                                    <span class="badge badge-success">Active</span>
                                @else
                                    <span class="badge badge-danger">Inactive</span>
                                @endif
                            </td>

                            <td>
                                <a href="{{ route('web-setting.edit', $row->id) }}" class="btn btn-sm btn-primary">
                                    <i class="fas fa-edit"></i>
                                </a>

                                <a href="#" class="btn btn-danger btn-sm"
                                   onclick="if(confirm('Are you sure you want to delete this?')){ window.location.href='{{ route('web-setting.delete', [$row->id]) }}'; }">
                                    <i class="fa fa-trash"></i>
                                </a>
                            </td>

                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" class="text-center">No settings found!</td>
                        </tr>
                        @endforelse
                    </tbody>

                </table>
            </div>

        </div>
    </div>

</div>

@endsection
