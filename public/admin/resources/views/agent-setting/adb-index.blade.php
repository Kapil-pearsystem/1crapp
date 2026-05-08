<?php

use Illuminate\Support\Str;
?>
@extends('layouts.app')

@section('title', 'Agent Settings')

<link href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css" rel="stylesheet">
@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Agent Settings</h1>
        <div class="row">
            <div class="col-md-12">
                <a href="javascript:void(0);" data-toggle="modal" data-target="#addCommunityModal" class="btn btn-sm btn-primary"><i aria-hidden="true" class="fas fa-plus"></i> Add Community</a>
                <a href="javascript:void(0);" onclick="window.history.back();" class="btn btn-sm btn-secondary"><i aria-hidden="true" class="fas fa-arrow-left"></i> Back</a>
            </div>
        </div>
    </div>

    {{-- Alert Messages --}}
    @include('common.alert')

    <!-- DataTables Example -->
     <div class="row">
        <div class="col-md-12 col-sm-12">
            <div class="card shadow mb-4">
                <div class="card-body">
                    <div class="table-responsive swich_bntts">
                        <table class="table table-bordered" id="example-table-theme" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Icon</th>
                                    <th>Title</th>
                                    <!-- <th>Content</th> -->
                                    <th>Button</th>
                                    <th>Date</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($communities as $index => $community)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td><i class="fa {{ $community->icon }}"></i></td>
                                    <td>{{ $community->title }}</td>
                                    <!-- <td>{{ Str::limit($community->content, 100) }}</td> -->
                                    <td><a href="{{ $community->btn_link }}" target="_blank" class="btn btn-sm btn-primary">{{ $community->btn_text }}</a></td>
                                    <td>{{ $community->created_at->format('Y-m-d') }}</td>
                                    <td>
                                        @if($community->status == 1)
                                            <span class="badge badge-success">Active</span>
                                        @else
                                            <span class="badge badge-danger">Inactive</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="javascript:void(0);" onclick='editCommunity(@json($community))'  class="btn btn-sm btn-info"><i class="fas fa-edit"></i></a>
                                        <a href="{{ route('adb-setting.delete', $community->id) }}" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this community?');"><i class="fas fa-trash"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12 col-sm-12">
            <div class="card shadow mb-4">
                <form method="POST" action="{{ route('adb-setting.store')}}" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" value="{{ $settings->id ?? '' }}">

                    <div class="card-body">
                        <div class="form-group row">
                            <div class="col-sm-10 mb-3">
                                <label> Demo Video Link<span style="color: red;">*</span></label>
                                <input type="url" name="demo_link" placeholder="Enter Video Link" value="{{ old('demo_link', $settings->demo_link ?? '') }}" required class="form-control" />
                                @error('demo_link')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-sm-2 mb-2 mt-3 mb-sm-0 swich_bntts">
                                Enable
                                <div class="block_araea mt-1">
                                    <label class="switch"><input value="1" {{ (old('demo_link_enable') ?? ($settings->demo_link_enable ?? '')) == 1 ? 'checked' : '' }} type="checkbox" name="demo_link_enable" /> <small></small></label>
                                </div>
                            </div>
                            <div class="col-sm-10 mb-3">
                                <label>Chatbot Code<span style="color: red;">*</span></label>
                                <textarea name="chatbot_code" id="chatbot_code" rows="4" class="form-control" placeholder="Enter Chatbot Code">{{ old('chatbot_code') ?? (isset($settings)?$settings->chatbot_code: '') }}</textarea>
                            </div>
                            <div class="col-sm-2 mb-2 mt-3 mb-sm-0 swich_bntts">
                                Enable
                                <div class="block_araea mt-1">
                                    <label class="switch"><input value="1" {{ (old('chatbot_code_enable') ?? ($settings->chatbot_code_enable ?? '')) == 1 ? 'checked' : '' }} type="checkbox" name="chatbot_code_enable" /> <small></small></label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-success float-right">
                            {{ isset($settings) ? 'Update' : 'Add' }}
                        </button>
                        <a class="btn btn-secondary float-right mr-2" href="{{ route('agent-setting.index') }}">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
     </div>
    
</div>
<!-- // Modal for add/edit agent community -->
<div class="modal fade" id="addCommunityModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Add Community</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="communityForm" method="POST" action="{{ route('adb-setting.store-community') }}">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <span class="form-text text-muted">Please enter fontawesome icon classes only like <code>fa-check</code> for <i class="fa fa-check"></i> To get icons got to <a href="https://fontawesome.com/v4/icons/" target="_blank">Font Awesome Icons <i class="fas fa-external-link-alt"></i></a></span>
                        <hr>
                        <input type="text" class="form-control" placeholder="Enter Icon Class" name="icon" required>
                    </div>
                    <div class="form-group">
                        <input type="text" placeholder="Enter Title" class="form-control" name="title" required>
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" placeholder="Enter Content" name="content" required></textarea>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Enter Button Text" name="btn_text" required/>
                    </div>
                    <div class="form-group">
                        <input type="url" class="form-control" placeholder="Enter Button Link" name="btn_link" required/>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Enter Priority" name="priority" required onkeypress="return (event.charCode !=8 && event.charCode ==0 || ( event.charCode == 46 || (event.charCode >= 48 && event.charCode <= 57)))"/>
                    </div>
                    <div class="form-group">
                        <select class="form-control" name="status" required>
                            <option value="">Select Status</option>
                            <option value="1">Active</option>
                            <option value="0">Inactive</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-success">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="editCommunityModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Edit Community</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="communityForm" method="POST" action="{{ route('adb-setting.store-community') }}">
                @csrf
                <input type="hidden" name="id" id="id" value=""/>
                <div class="modal-body">
                    <div class="form-group">
                        <span class="form-text text-muted">Please enter fontawesome icon classes only like <code>fa-check</code> for <i class="fa fa-check"></i> To get icons got to <a href="https://fontawesome.com/v4/icons/" target="_blank">Font Awesome Icons <i class="fas fa-external-link-alt"></i></a></span>
                        <hr>
                        <input type="text" class="form-control" id="icon" placeholder="Enter Icon Class" name="icon" required>
                    </div>
                    <div class="form-group">
                        <input type="text" placeholder="Enter Title" class="form-control" id="title" name="title" required>
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" placeholder="Enter Content" id="contentData" name="content" required></textarea>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Enter Button Text" id="btn_text" name="btn_text" required/>
                    </div>
                    <div class="form-group">
                        <input type="url" class="form-control" placeholder="Enter Button Link" id="btn_link" name="btn_link" required/>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Enter Priority" id="priority" name="priority" required onkeypress="return (event.charCode !=8 && event.charCode ==0 || ( event.charCode == 46 || (event.charCode >= 48 && event.charCode <= 57)))"/>
                    </div>
                    <div class="form-group">
                        <select class="form-control" id="status" name="status" required>
                            <option value="">Select Status</option>
                            <option value="1">Active</option>
                            <option value="0">Inactive</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-success">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
    $(document).ready(function() {
        $('#example-table-theme').DataTable({
            paging: true,
        });
    });

    function editCommunity(data) {
        $('#editCommunityModal').modal('show');
        $('#id').val(data.id);
        $('#icon').val(data.icon);
        $('#title').val(data.title);
        $('#contentData').val(data.content);
        $('#btn_text').val(data.btn_text);
        $('#btn_link').val(data.btn_link);
        $('#priority').val(data.priority);
        $('#status').val(data.status);
    }
</script>
@endsection