<?php
use Illuminate\Support\Str;
?>
@extends('layouts.app')

@section('title', 'CDB Permissions List')

<link href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css" rel="stylesheet">
@section('content')
    <div class="container-fluid">
    
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">CDB Permissions ( {{$plan->title }} )</h1>
            <div class="row">
                <div class="col-md-12">
                    <a href="{{ route('cdb-plan.index') }}" class="btn btn-sm btn-dark"><< Back</a>
                    <a href="{{ route('cdb-plan.reload-permission') }}" class="btn btn-sm btn-dark"><i class="fa fa-refresh"></i> Refresh Permission</a>
                </div>
            </div>
        </div>

        {{-- Alert Messages --}}
        @include('common.alert')

        <!-- DataTables Example -->
        <div class="card shadow mb-4">
            <div class="card-body">
        
                <form action="{{ route('cdb-plan.permissions.update') }}" method="POST">
                    @csrf
                    <input type="hidden" name="plan_id" value="{{ $plan->id }}">
        
                    <div class="table-responsive swich_bntts">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th colspan="2" class="text-center">Permissions</th>
                                </tr>
                            </thead>
        
                            <tbody>
                                @foreach($features->chunk(2) as $chunk)
                                    <tr>
                                        @foreach($chunk as $feature)
                                            <td>
                                                <div class="d-flex justify-content-between align-items-center">
        
                                                    <label for="feature_{{ $feature->id }}" class="mb-0">
                                                        {{ $feature->title }}
                                                    </label>
        
                                                    <input type="checkbox"
                                                           id="feature_{{ $feature->id }}"
                                                           name="permissions[{{ $feature->path }}]"
                                                           value="1"
                                                           {{ in_array($feature->path, $existingPermissions ?? []) ? 'checked' : '' }}>
                                                </div>
                                            </td>
                                        @endforeach
        
                                        {{-- Fill empty columns if needed --}}
                                        @for($i = $chunk->count(); $i < 2; $i++)
                                            <td></td>
                                        @endfor
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
        
                    <div class="text-right mt-3">
                        <button type="submit" class="btn btn-success">
                            Save Permissions
                        </button>
                    </div>
        
                </form>
        
            </div>
        </div>

    </div>
@endsection

@section('scripts')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    
@endsection
