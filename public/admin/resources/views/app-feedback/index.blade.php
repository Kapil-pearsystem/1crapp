@extends('layouts.app')

@section('title', 'Feedback List')

<link href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css" rel="stylesheet">

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Feedback List</h1>
    </div>

    {{-- Alert Messages --}}
    @include('common.alert')

    <!-- DataTables Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="feedback-table" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Sr No.</th>
                            <th>Overall Experience</th>
                            <th>Recommend Rating</th>
                            <th>Easy to Manage</th>
                            <th>Suggestion</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($feedbacks as $key => $fb)
                        <tr>
                            <td>{{ ++$key }}</td>

                            <td>
                                <span class="badge 
                                    @if($fb->overall_experience == 1) badge-danger
                                    @elseif($fb->overall_experience == 2) badge-warning
                                    @elseif($fb->overall_experience == 3) badge-info
                                    @elseif($fb->overall_experience == 4) badge-success
                                    @endif
                                ">
                                    {{ $fb->overall_experience }}
                                </span>
                            </td>

                            <td>{{ $fb->recommend_rating }}</td>

                            <td>{{ $fb->easy_to_manage }}</td>

                            <td>{{ $fb->suggestion ?? '-' }}</td>

                            <td>{{ date('M d, Y', strtotime($fb->created_at)) }}</td>
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
        $('#feedback-table').DataTable({
            paging: true,
        });
    });
</script>
@endsection
