@extends('layouts.app')

@section('title', 'Quickly Analyze')

<link href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css" rel="stylesheet">
@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Quickly Analyze</h1>
            <div class="row">
                <div class="col-md-12">
                    <a href="{{ route('web.quickly-analyze.create') }}" class="btn btn-sm btn-primary"><i aria-hidden="true" class="fas fa-plus"></i> Add Quickly Analyze</a>
                </div>
            </div>
        </div>

        {{-- Alert Messages --}}
        @include('common.alert')

        <!-- Data Table Example -->
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="table-responsive swich_bntts">
                    <table class="table table-bordered" id="example-table-theme" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Sr No.</th>
                                <th>Title</th>
                                <!-- <th>Slug</th> -->
                                <th>Description</th>
                                <th>Image</th>
                                <th>Status</th>
                                <th>Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($lists as $key => $analyze)
                            <tr>
                                <td>{{ ++$key }}</td>
                                <td>{{ $analyze->title }}</td>
                                <!-- <td>{{ $analyze->slug }}</td> -->
                                <td>{{ Str::limit($analyze->description, 50) }}</td>
                                <td>
                                    <img src="{{ asset($analyze->image) }}" alt="Analyze Image" height="50" width="50" />
                                </td>
                                <td>
                                    <label class="switch">
                                        <input type="checkbox" @if($analyze->status == 1) checked @endif>
                                        <small></small>
                                    </label>
                                </td>
                                <td>{{ date('d M, Y', strtotime($analyze->created_at)) }}</td>
                                <td>
                                    <a href="{{ route('web.quickly-analyze.edit', [$analyze->id]) }}" class="btn btn-primary">
                                        <i class="fa fa-pen" aria-hidden="true"></i>
                                    </a>
                                    <a href="#" class="btn btn-danger" onclick="if(confirm('Are you sure you want to delete this?')) { window.location.href='{{ route('web.quickly-analyze.delete', [$analyze->id]) }}'; }">
                                        <i class="fa fa-trash" aria-hidden="true"></i>
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
        new DataTable('#example-table-theme', {
            paging: true,
        });
    </script>
@endsection
