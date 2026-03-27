@extends('layouts.app')

@section('title', 'Project List')

<link href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css" rel="stylesheet">

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Project List</h1>
        <div class="row">
            <div class="col-md-12">
                <a href="{{ route('project.create') }}" class="btn btn-sm btn-primary"><i class="fas fa-plus"></i> Add Project</a>
            </div>
        </div>
    </div>

    {{-- Alert Messages --}}
    @include('common.alert')

    <!-- DataTables Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="project-table" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Sr No.</th>
                            <th>Title</th>
                            <th>Category</th>
                            <th>Media Count</th>
                            <th>Date</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($projects as $key => $project)
                        <tr>
                            <td>{{ ++$key }}</td>
                            <td>{{ $project->title }}</td>
                            <td>{{ $project->category->name ?? '-' }}</td>
                            <td>{{ $project->media->count() }}</td>
                            <td>{{ date('M d, Y', strtotime($project->created_at)) }}</td>
                            <td>
                                @if ($project->status == 0)
                                    <span class="badge badge-danger">Inactive</span>
                                @elseif ($project->status == 1)
                                    <span class="badge badge-success">Active</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('project.edit', ['id'=>$project->id]) }}" class="btn btn-primary btn-sm"><i class="fa fa-pen"></i></a>

                                <a href="#" class="btn btn-danger btn-sm"
                                   onclick="if(confirm('Are you sure you want to delete this?')){ window.location.href='{{ route('project.delete', [$project->id]) }}'; }">
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
        $('#project-table').DataTable({
            paging: true,
        });
    });
</script>
@endsection
