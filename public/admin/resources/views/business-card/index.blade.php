<?php

use Illuminate\Support\Str;
?>
@extends('layouts.app')
@section('title', 'Business Card List')
<link href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css" rel="stylesheet">
@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Business Card List</h1>
        <div class="row">
            <div class="col-md-12">
                <a href="{{ route('business-card.create') }}" class="btn btn-sm btn-primary"><i aria-hidden="true" class="fas fa-plus"></i> Add Business Card</a>
            </div>
        </div>
    </div>
    {{-- Alert Messages --}}
    @include('common.alert')
    <!-- DataTables Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive swich_bntts">
                <table class="table table-bordered" id="example-table-theme" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Sr No.</th>
                            <th>Photo</th>
                            <th>Link Name</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Telephone</th>
                            <th>Organization</th>
                            <th>Location</th>
                            <th>Is Public</th>
                            <th>Status</th>
                            <th>Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($lists as $key => $list)
                        <tr>
                            <td>{{ $lists->firstItem() + $key }}</td>
                            <td>
                                @if(!empty($list->photo))
                                <img src="{{ asset($list->photo) }}"
                                    width="50"
                                    height="50"
                                    style="object-fit: cover; border-radius: 5px;">
                                @else
                                N/A
                                @endif
                            </td>
                            <td>{{ $list->link_name }}</td>
                            <td>
                                {{ $list->first_name }} {{ $list->last_name }}
                            </td>
                            <td>{{ $list->email }}</td>
                            <td>{{ $list->telephone }}</td>
                            <td>{{ $list->organization }}</td>
                            <td>
                                {{ $list->city_name ?? 'N/A' }}, {{ $list->state_name ?? 'N/A' }},
                                {{ $list->country_name ?? 'N/A' }}
                            </td>
                            <td>
                                @if($list->is_public == 1)
                                <span class="badge badge-success">Yes</span>
                                @else
                                <span class="badge badge-secondary" onclick="makePublic('{{ $list->id }}')" style="cursor: pointer;">No</span>
                                @endif
                            </td>
                            <td>
                                <label class="switch">
                                    <input type="checkbox"
                                        @if($list->status == 1) checked @endif>
                                    <small></small>
                                </label>
                            </td>
                            <td>
                                {{ date('M d, Y', strtotime($list->created_at)) }}
                            </td>
                            <td>
                                <a href="{{ route('business-card.edit', ['id' => $list->id]) }}"
                                    class="btn btn-primary bnt_alsss">
                                    <i aria-hidden="true" class="fa fa-pen"></i>
                                </a>
                                <a href="#"
                                    class="btn btn-danger bnt_alsss"
                                    onclick="if(confirm('Are you sure you want to delete this?')){ window.location.href='{{ route('business-card.delete', [$list->id]) }}'; }">
                                    <i aria-hidden="true" class="fa fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="11" class="text-center">
                                No Record Found
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
                <!-- Pagination -->
                <div class="mt-3">
                    {{ $lists->links() }}
                </div>
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
        $('#example-table-theme').DataTable({
            paging: true,
        });
    });

    function makePublic(id) {
        if (confirm('Are you sure you want to change the public status of this business card?')) {
            $.ajax({
                url: '{{ route("business-card.make-public") }}',
                type: 'POST',
                data: {
                    id: id,
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    if(response.status) {
                        alert(response.message);
                        location.reload();
                    } else {
                        alert(response.message);
                    }
                },
                error: function(error) {
                    console.log(error);
                    alert('Something went wrong.');
                }
            });
        }
    }
</script>
@endsection