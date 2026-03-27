@extends('layouts.app')

@section('content')

<div class="card">
    <div class="card-header d-flex justify-content-between">
        <h4>Meet Team List</h4>
        <a href="{{ route('meet-team.create') }}" class="btn btn-primary btn-sm">Add New</a>
    </div>

    <div class="card-body">

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th width="5%">#</th>
                    <th width="25%">Title</th>
                    <th>Description</th>
                    <th width="10%">Status</th>
                    <th width="18%">Action</th>
                </tr>
            </thead>

            <tbody>
                @forelse($lists as $key => $row)
                    <tr>
                        <td>{{ $key+1 }}</td>
                        <td>{{ $row->title }}</td>
                        <td>{!! Str::limit($row->description, 80) !!}</td>
                        <td>
                                @if ($row->status == 0)
                                    <span class="badge badge-danger">Inactive</span>
                                @elseif ($row->status == 1)
                                    <span class="badge badge-success">Active</span>
                                @endif
                            </td>
                        
                        <td>
                                <a href="{{ route('meet-team.edit', ['id'=>$row->id]) }}" class="btn btn-primary btn-sm"><i class="fa fa-pen"></i></a>

                                <a href="#" class="btn btn-danger btn-sm"
                                   onclick="if(confirm('Are you sure you want to delete this?')){ window.location.href='{{ route('meet-team.delete', [$row->id]) }}'; }">
                                    <i class="fa fa-trash"></i>
                                </a>
                            </td>
                    </tr>

                @empty
                    <tr>
                        <td colspan="5" class="text-center">No Team Members Found</td>
                    </tr>

                @endforelse
            </tbody>
        </table>

    </div>
</div>

@endsection
