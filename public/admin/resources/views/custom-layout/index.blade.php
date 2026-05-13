<?php

use Illuminate\Support\Str;
?>
@extends('layouts.app')

@section('title', 'Custom Layouts')

<link href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css" rel="stylesheet">
@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Custom Layouts</h1>
        <div class="row">
            <div class="col-md-12">
                <a href="javascript:void(0);" data-toggle="modal" data-target="#addCommunityModal" class="btn btn-sm btn-primary"><i aria-hidden="true" class="fas fa-plus"></i> Add </a>
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
                                    <th>Title</th>
                                    <th>Parent Menu</th>
                                    <th>Type</th>
                                    <th>Date</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($menus as $index => $menu)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>@if($menu->icon)<i class="fa {{ $menu->icon }}"></i>@endif {{ $menu->title }}</td>
                                    <td>{{ $menu->parent_title }}</td>
                                    <td>{{ ($menu->type == 1)?'Headet':'Footer' }}</td>
                                    <td>{{ $menu->created_at->format('Y-m-d') }}</td>
                                    <td>
                                        @if($menu->status == 1)
                                            <span class="badge badge-success">Active</span>
                                        @else
                                            <span class="badge badge-danger">Inactive</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="javascript:void(0);" onclick='editCommunity(@json($menu))'  class="btn btn-sm btn-info"><i class="fas fa-edit"></i></a>
                                        <a href="{{ route('custom-layout.menu.delete', $menu->id) }}" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this community?');"><i class="fas fa-trash"></i></a>
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
                <form method="POST" action="{{ route('custom-layout.save')}}" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" value="{{ $layout->id ?? '' }}">

                    <div class="card-body">
                        <div class="form-group row">
                            <div class="col-sm-6 mb-3">
                                <label>Logo<span style="color: red;">*</span></label>
                                <input type="file" name="logo" placeholder="Upload Logo" value="{{ old('logo', $layout->logo ?? '') }}" @if(!$layout->logo) required @endif class="form-control" />
                                @error('logo')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                @if($layout->logo)
                                    <img src="{{ $layout->logo }}" alt="logo" height="100px">
                                @endif
                            </div>
                            <div class="col-sm-6 mb-3">
                                <label>Button Text<span style="color: red;">*</span></label>
                                <input type="text" name="btn_text" placeholder="Button Text" value="{{ old('btn_text', $layout->btn_text ?? '') }}" required class="form-control" />
                                @error('btn_text')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-sm-6 mb-3">
                                <label>Button Background Color<span style="color: red;">*</span></label>
                                <input type="color" name="btn_bg_color" placeholder="" value="{{ old('btn_bg_color', $layout->btn_bg_color ?? '') }}" required class="form-control" />
                                @error('btn_bg_color')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-sm-6 mb-3">
                                <label>Button Text Color<span style="color: red;">*</span></label>
                                <input type="color" name="btn_text_color" placeholder="" value="{{ old('btn_text_color', $layout->btn_text_color ?? '') }}" required class="form-control" />
                                @error('btn_text_color')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-sm-6 mb-3">
                                <label>Button Link<span style="color: red;">*</span></label>
                                <input type="color" name="btn_link" placeholder="" value="{{ old('btn_link', $layout->btn_link ?? '') }}" required class="form-control" />
                                @error('btn_link')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-sm-2 mb-2 mt-3 mb-sm-0 swich_bntts">
                                Open New Tab
                                <div class="block_araea mt-1">
                                    <label class="switch"><input value="1" {{ (old('open_new_tab') ?? ($layout->open_new_tab ?? '')) == 1 ? 'checked' : '' }} type="checkbox" name="open_new_tab" /> <small></small></label>
                                </div>
                            </div>
                            <div class="col-sm-12 mb-3">
                                <label>Copyright Text<span style="color: red;">*</span></label>
                                <textarea name="copyright_text" id="copyright_text" rows="2" class="form-control" placeholder="Enter Copyright Text">{{ old('copyright_text') ?? (isset($layout)?$layout->copyright_text: '') }}</textarea>
                            </div>
                        </div>
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-success float-right">
                            {{ isset($layout) ? 'Update' : 'Add' }}
                        </button>
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
                <h5 class="modal-title" id="deleteModalLabel">Add Menu</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="communityForm" method="POST" action="{{ route('custom-layout.menu.save') }}">
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
                        <select class="form-control" name="parent_id">
                            <option value="">Parent Menu</option>
                            @foreach($parents as $p_menu)
                                <option value="{{ $p_menu->id }}">{{ $p_menu->title }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <select class="form-control" name="type" required>
                            <option value="">Type</option>
                            <option value="1">Header</option>
                            <option value="2">Footer</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <select class="form-control" name="open_new_tab" required>
                            <option value="">Open New Tab</option>
                            <option value="1">Yes</option>
                            <option value="0">No</option>
                        </select>
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
                <h5 class="modal-title" id="deleteModalLabel">Edit Menu</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="communityForm" method="POST" action="{{ route('custom-layout.menu.save') }}">
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
                        <select class="form-control" id="parent_id" name="parent_id">
                            <option value="">Parent Menu</option>
                            @foreach($parents as $p_menu)
                                <option value="{{ $p_menu->id }}">{{ $p_menu->title }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <select class="form-control" id="type" name="type" required>
                            <option value="">Type</option>
                            <option value="1">Header</option>
                            <option value="2">Footer</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <select class="form-control" id="open_new_tab" name="open_new_tab" required>
                            <option value="">Open New Tab</option>
                            <option value="1">Yes</option>
                            <option value="0">No</option>
                        </select>
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
        $('#parent_id').val(data.parent_id);
        $('#type').val(data.type);
        $('#open_new_tab').val(data.open_new_tab);
        $('#status').val(data.status);
    }
</script>
@endsection