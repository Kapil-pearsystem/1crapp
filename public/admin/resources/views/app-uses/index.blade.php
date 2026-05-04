<?php
use Illuminate\Support\Str;
?>
@extends('layouts.app')

@section('title', '1CRApp Uses')

<link href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css" rel="stylesheet">
@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">1CRApp Uses</h1>
            <div class="row">
                <div class="col-md-12">
                    <a href="{{ route('user-hero-section.create') }}" class="btn btn-sm btn-primary"><i aria-hidden="true" class="fas fa-plus"></i> Add 1CRApp Use</a>
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
                                <th>Sr. No.</th>
                                <th>Realtor/Investor Title</th>
                                <th>Realtor/Investor Subtitle</th>
                                <th>Realtor/Investor Short Description</th>
                                <th>Realtor/Investor Button Text</th>
                                <th>Date</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($lists as $key => $list)
                            <tr class="text-left">
                                <td>{{ ++$key }}</td>
                                <td>
                                    <ul>
                                        @if($list->realtor_title)
                                            <li>Realtor: {{ $list->realtor_title }}</li>
                                        @endif
                                        @if($list->investor_title)
                                            <li>Investor: {{ $list->investor_title }}</li>
                                        @endif
                                    </ul>
                                </td>
                                <td>
                                    <ul>
                                        @if($list->realtor_subtitle)
                                            <li>Realtor: {{ $list->realtor_subtitle }}</li>
                                        @endif
                                        @if($list->investor_subtitle)
                                            <li>Investor: {{ $list->investor_subtitle }}</li>
                                        @endif
                                    </ul>
                                </td>
                                <td>
                                    <ul>
                                        @if($list->realtor_shortdesc)
                                            <li>Realtor: {{ $list->realtor_shortdesc }}</li>
                                        @endif
                                        @if($list->investor_shortdesc)
                                            <li>Investor: {{ $list->investor_shortdesc }}</li>
                                        @endif
                                    </ul>
                                </td>
                                <td>
                                    <ul>
                                        @if($list->realtor_btntext)
                                            <li>Realtor: {{ $list->realtor_btntext }}</li>
                                        @endif
                                        @if($list->investor_btntext)
                                            <li>Investor: {{ $list->investor_btntext }}</li>
                                        @endif
                                    </ul>
                                </td>
                                <td>{{ date('M d, Y', strtotime($list->created_at)) }}</td>
                                <td>
                                    <label class="switch">
                                        <input @if($list->status == 1) checked @endif type="checkbox">
                                        <small></small>
                                    </label>
                                </td>
                                <td>
                                    <a href="{{ route('user-hero-section.edit', ['id'=>$list->id]) }}" class="btn btn-primary bnt_alsss"><i aria-hidden="true" class="fa fa-pen"></i></a>
                                    <a href="#" class="btn btn-danger bnt_alsss" onclick="if(confirm('Are you sure you want to delete this?')){ window.location.href='{{ route('user-hero-section.delete', [$list->id]) }}'; }"><i aria-hidden="true" class="fa fa-trash"></i></a>
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
            $('#example-table-theme').DataTable({
                paging: true,
            });
        });
    </script>
@endsection
