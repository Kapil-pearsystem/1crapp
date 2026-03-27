@extends('layouts.app')

@section('title', 'Affiliate Enquiry List')

<link href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css" rel="stylesheet">

@section('content')
<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Affiliate Enquiry List</h1>
    </div>

    @include('common.alert')

    <div class="card shadow mb-4">
        <div class="card-body table-responsive">

            <table class="table table-bordered" id="affiliate-enquiry-table" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Sr No.</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Contact No.</th>
                        <th>Monthly Referrals</th>
                        <th>Message</th>
                        <th>Date</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($lists as $key => $item)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $item->first_name }}</td>
                        <td>{{ $item->email }}</td>
                        <td>{{ $item->contact_no }}</td>
                        <td>{{ $item->monthly_referrals }}</td>
                        <td>{{ Str::limit($item->message, 40) }}</td>
                        <td>{{ date('M d, Y', strtotime($item->created_at)) }}</td>
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
    $('#affiliate-enquiry-table').DataTable({
        paging: true
    });
});
</script>
@endsection
