@extends('layouts.app')

@section('title', 'Join As Affiliate List')

<link href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css" rel="stylesheet">

@section('content')
<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Join As Affiliate List</h1>
        <a href="{{ route('join-as-affiliate.create') }}" class="btn btn-sm btn-primary">
            <i class="fas fa-plus"></i> Add New
        </a>
    </div>

    @include('common.alert')

    <div class="card shadow mb-4">
        <div class="card-body table-responsive">
            <table class="table table-bordered" id="join-affiliate-table" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Sr No.</th>
                        <th>Title</th>
                        <!-- <th>Short Description</th> -->
                        <th>Image Title</th>
                        <th>Image</th>
                        <th>Status</th>
                        <th>Created At</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($lists as $key => $item)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $item->title }}</td>
                        <!-- <td>{{ $item->short_description }}</td> -->
                        <td>{{ $item->image_title }}</td>
                        <td>
                            @if($item->image)
                                <img src="{{ $item->image }}" alt="Image" style="width: 100px; height: auto;">
                            @else
                                N/A
                            @endif
                        </td>
                        <td>
                            @if($item->status == 1)
                                <span class="badge badge-success">Active</span>
                            @else
                                <span class="badge badge-danger">Inactive</span>
                            @endif
                        </td>
                        <td>{{ date('M d, Y', strtotime($item->created_at)) }}</td>
                        <td>
                            <a href="{{ route('join-as-affiliate.edit', $item->id) }}" class="btn btn-primary btn-sm">
                                <i class="fa fa-pen"></i>
                            </a>
                            <a href="#" class="btn btn-danger btn-sm"
                                   onclick="if(confirm('Are you sure you want to delete this?')){ window.location.href='{{ route('join-as-affiliate.delete', [$item->id]) }}'; }">
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
@endsection

@section('scripts')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<script>
$(document).ready(function() {
    $('#join-affiliate-table').DataTable({
        paging: true,
    });
});
</script>
@endsection
