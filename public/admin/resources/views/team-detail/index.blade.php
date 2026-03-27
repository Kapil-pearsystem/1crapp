@extends('layouts.app')

@section('title', 'Team Members List')

<link href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css" rel="stylesheet">

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Team Members List</h1>
        <a href="{{ route('team-detail.create') }}" class="btn btn-sm btn-primary">
            <i class="fas fa-plus"></i> Add Team Member
        </a>
    </div>

    {{-- Alert Messages --}}
    @include('common.alert')

    <!-- DataTables Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="team-detail-table" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Sr No.</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Designation</th>
                            <th>Category</th>
                            <th>Button Title</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($lists as $key => $team)
                        <tr>
                            <td>{{ ++$key }}</td>
                            <td>
                                @if($team->image)
                                    <img src="{{ asset($team->image) }}" style="width:60px; height:60px; object-fit:cover; border-radius:50%;">
                                @else
                                    <img src="{{ asset('assets/images/no-image.png') }}" style="width:60px; height:60px; object-fit:cover; border-radius:50%;">
                                @endif
                            </td>
                            <td>{{ $team->name }}</td>
                            <td>{{ $team->designation }}</td>
                            <td>{{ $team->category->category ?? '-' }}</td>
                            <td>{{ $team->button_title ?? '-' }}</td>
                            <td>
                                @if ($team->status == 1)
                                    <span class="badge badge-success">Active</span>
                                @else
                                    <span class="badge badge-danger">Inactive</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('team-detail.edit', ['id'=>$team->id]) }}" class="btn btn-primary btn-sm">
                                    <i class="fa fa-pen"></i>
                                </a>

                                <a href="#" class="btn btn-danger btn-sm"
                                   onclick="if(confirm('Are you sure you want to delete this?')){ window.location.href='{{ route('team-detail.delete', [$team->id]) }}'; }">
                                    <i class="fa fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
@endsection

@section('scripts')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function() {
        $('#team-detail-table').DataTable({
            paging: true,
            ordering: true,
            searching: true
        });
    });
</script>
@endsection
