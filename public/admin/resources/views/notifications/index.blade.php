<?php

$createRoute = route('notification.create');

?>
@extends('layouts.app')

@section('title', 'Notification List')
<link href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css" rel="stylesheet">

@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Notifications</h1>
            <div class="row">
                <div class="col-md-12">
                    <a href="{{ $createRoute }}" class="btn btn-sm btn-primary">
                        <i class="fas fa-plus"></i> Add Notification
                    </a>
                </div>


            </div>

        </div>

        {{-- Alert Messages --}}
        @include('common.alert')

        <!-- DataTales Example -->
        <div class="card shadow mb-4">

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="example-table-theme" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Type</th>
                                <th>Date</th>
                                <th>Description</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($Notification as $list)
                                <tr>
                                    <td>{{ substr($list->title,0,50) }}</td>
                                    <td>{{ $list->category_name }}</td>
									<td>{{ $list->created_at ? date('d-m-Y',strtotime($list->created_at)) : '-' }}</td>
                                    <td>{{ substr($list->description,0,50) }}...</td>
                                    <td>
                                        @if ($list->status == 0)
                                            <span class="badge badge-danger">Inactive</span>
                                        @elseif ($list->status == 1)
                                            <span class="badge badge-success">Active</span>
                                        @endif
                                    </td>
                                    <td style="display: flex">
                                        <?php
                                            $s1Route = route('notification.status', ['notification_id' => $list->id, 'status' => 1]);
                                            $s2Route = route('notification.status', ['notification_id' => $list->id, 'status' => 0]);
                                            $editRoute = route('notification.edit', ['notification' => $list->id]);

                                        ?>
                                        @if ($list->status == 0)
                                            <a href="<?=$s1Route?>"
                                                class="btn btn-success m-2">
                                                <i class="fa fa-check"></i>
                                            </a>
                                        @elseif ($list->status == 1)


                                            <a href="<?=$s2Route?>"
                                                class="btn btn-danger m-2">
                                                <i class="fa fa-ban"></i>
                                            </a>

                                        @endif
                                        <a href="{{ route('notification.destroy',$list->id) }}" 
                                           class="btn btn-danger bnt_alsss delete-btn">
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
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
document.querySelectorAll('.delete-btn').forEach(function(button) {
    button.addEventListener('click', function(e) {
        e.preventDefault();
        let url = this.getAttribute('href');

        Swal.fire({
            title: 'Are you sure?',
            text: "This record will be deleted permanently!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = url;
            }
        });
    });
});
</script>
<script>


new DataTable( '#example-table-theme', {
    paging: true,
} );
</script>
@endsection
