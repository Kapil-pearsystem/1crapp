@extends('layouts.app')

@section('title', 'Homework List')

<link href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css" rel="stylesheet">

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Homework List</h1>
        <div class="row">
            <div class="col-md-12">
                <a href="{{ route('appointment-homework.create') }}" class="btn btn-sm btn-primary">
                    <i class="fas fa-plus"></i> Add Homework
                </a>
            </div>
        </div>
    </div>

    {{-- Alert --}}
    @include('common.alert')

    <!-- Table -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">

                <table class="table table-bordered" id="homework-table">
                    <thead>
                        <tr>
                            <th>Sr No.</th>
                            <th>Title</th>
                            <th>Media</th>
                            <th>Media Type</th>
                            <th>Slug</th>
                            <th>Status</th>
                            <th>Created Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($lists as $key => $item)
                        <tr>
                            <td>{{ ++$key }}</td>

                            <td>{{ $item->title }}</td>

                            {{-- Media Preview --}}
                            <td>
                                @if($item->media_type == 'image' && $item->media_path)
                                    <img src="{{ $item->media_path }}" style="max-width:70px;">
                                @elseif($item->media_type == 'video' && $item->media_path)
                                    <a href="{{ $item->media_path }}" target="_blank">View Video</a>
                                @elseif($item->media_type == 'embed_code')
                                    <span class="badge badge-info">Embed</span>
                                @else
                                    —
                                @endif
                            </td>

                            <td>
                                <span class="badge badge-secondary">
                                    {{ ucfirst($item->media_type) }}
                                </span>
                            </td>

                            <td>
                                <code>{{ $item->slug }}</code>
                            </td>

                            <td>
                                @if ($item->status == 1)
                                    <span class="badge badge-success">Active</span>
                                @else
                                    <span class="badge badge-danger">Inactive</span>
                                @endif
                            </td>

                            <td>{{ date('M d, Y', strtotime($item->created_at)) }}</td>

                            <td>
                                <!-- Edit -->
                                <a href="{{ route('appointment-homework.edit', $item->id) }}"
                                   class="btn btn-primary btn-sm">
                                    <i class="fa fa-pen"></i>
                                </a>

                                <!-- Delete -->
                                <a href="#" class="btn btn-danger btn-sm"
                                   onclick="if(confirm('Are you sure?')) {
                                       window.location.href='{{ route('appointment-homework.delete', $item->id) }}';
                                   }">
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
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>

<script>
    $(document).ready(function () {
        $('#homework-table').DataTable({
            paging: true,
            order: [[0, 'desc']]
        });
    });
</script>
@endsection