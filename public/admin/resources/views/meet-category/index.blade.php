@extends('layouts.app')

@section('title', 'Meet Category List')

<link href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css" rel="stylesheet">

@section('content')
<div class="container-fluid">

    <!-- Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Meet Category List</h1>

        <a href="{{ route('meet-category.create') }}" class="btn btn-sm btn-primary">
            <i class="fas fa-plus"></i> Add Category
        </a>
    </div>

    @include('common.alert')

    <!-- Table -->
    <div class="card shadow mb-4">
        <div class="card-body">

            <div class="table-responsive">
                <table class="table table-bordered" id="category-table" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Sr No.</th>
                            <th>Category</th>
                            <th>Date</th>
                            <th>Status</th>
                            <th width="90">Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($lists as $key => $item)
                        <tr>
                            <td>{{ $key + 1 }}</td>

                            <td>{{ $item->category }}</td>

                            <td>{{ date('M d, Y', strtotime($item->created_at)) }}</td>

                            <td>
                                @if ($item->status == 1)
                                    <span class="badge badge-success">Active</span>
                                @else
                                    <span class="badge badge-danger">Inactive</span>
                                @endif
                            </td>

                            <td>
                                <a href="{{ route('meet-category.edit', $item->id) }}"
                                   class="btn btn-primary btn-sm">
                                    <i class="fa fa-pen"></i>
                                </a>

                                <a href="#"
                                   class="btn btn-danger btn-sm"
                                   onclick="if(confirm('Are you sure you want to delete this category?')){ window.location.href='{{ route('meet-category.delete', $item->id) }}'; }">
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
$(document).ready(function() {
    $('#category-table').DataTable({
        paging: true
    });
});
</script>
@endsection
