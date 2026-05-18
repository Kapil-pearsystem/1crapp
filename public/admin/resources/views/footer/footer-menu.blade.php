@extends('layouts.app')
@section('title', 'Footer Menu List')
<link href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css" rel="stylesheet">
@section('content')
@php 
$categories = array(
    1=>'Platform',
    2=>'Use Cases',
    3=>'Resources',
    4=>'Company'
);
@endphp
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Footer Menu List</h1>
        <div class="row">
            <div class="col-md-12">
                <a href="{{ route('footer-top.index') }}" class="btn btn-sm btn-dark" ><i aria-hidden="true" class="fa fa-angle-double-left "></i> Back</a>
                <a href="#" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#addComplance"><i aria-hidden="true" class="fas fa-plus"></i> ADD</a>
            </div>
        </div>
    </div>
    {{-- Alert Messages --}}
    @include('common.alert')
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive swich_bntts">
                <table class="table table-bordered" id="example-table-theme" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Category</th>
                            <th>Title</th>
                            <th>Link</th>
                            <th>Status</th>
                            <th>Created Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($lists as $key=> $list)
                        <tr>
                            <td>{{ ++$key }}</td>
                            <td>{{ $categories[$list->category] ?? 'N/A' }}</td>
                            <td>{{ $list->title }}</td>
                            <td>{{ $list->link }}</td>
                            <td>{{ $list->status == 1 ? 'Active' : 'Inactive' }}</td>
                            <td>{{ $list->created_at->format('Y-m-d H:i') }}</td>
                            <td>
                                <a href="javascript:void(0);"
                                class="btn btn-primary btn-sm editComplianceBtn"
                                data-comp='@json($list)'>

                                    <i class="fa fa-pen fa-lg"></i>

                                </a>
                                <form action="{{ route('footer-top.menu.destroy', $list->id) }}" method="POST" class="d-inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this Menu?')">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="addComplance" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Menu</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" action="{{ route('footer-top.menu.save') }}">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col">
                            <label>Category <span class="text-danger">*</span></label>
                            <select class="form-control" name="category" required>
                                <option value="">Select</option>
                                <option value="1">Platform</option>
                                <option value="2">Use Cases</option>
                                <option value="3">Resources</option>
                                <option value="4">Company</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label>Title <span class="text-danger">*</span></label>
                            <input type="text" name="title" class="form-control" placeholder="Enter Title" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label>Link <span class="text-danger">*</span></label>
                            <input type="url" name="link" class="form-control" placeholder="Enter Link" required>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col swich_bntts">
                            <label>Open new tab</label>
                            <div class="block_araea">
                                <label class="switch">
                                    <input type="checkbox" name="new_tab" value="1" {{ (old('new_tab', $details->new_tab ?? 0) == 1) ? 'checked' : '' }} />
                                    <small></small>
                                </label>
                            </div>
                        </div>
                        <div class="col">
                            <label>Status</label><br>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="status" id="inlineRadio1" value="1" checked>
                                <label class="form-check-label" for="inlineRadio1">Active</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="status" id="inlineRadio2" value="0">
                                <label class="form-check-label" for="inlineRadio2">Inactive</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Save</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="editComplance" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    Edit Menu
                </h5>
                <button type="button"
                    class="close"
                    data-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>
            <form method="post"
                action="{{ route('footer-top.menu.save') }}">
                @csrf
                <input type="hidden" name="id" id="menu_id">
                <div class="modal-body">
                    <div class="row">
                        <div class="col">
                            <label>Category <span class="text-danger">*</span></label>
                            <select class="form-control" name="category" id="category" required>
                                <option value="">Select</option>
                                <option value="1">Platform</option>
                                <option value="2">Use Cases</option>
                                <option value="3">Resources</option>
                                <option value="4">Company</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label>Title <span class="text-danger">*</span></label>
                            <input type="text" name="title" id="title" class="form-control" placeholder="Enter Title" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label>Link <span class="text-danger">*</span></label>
                            <input type="url" name="link" id="link" class="form-control" placeholder="Enter Link" required>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col swich_bntts">
                            <label>Open new tab</label>
                            <div class="block_araea">
                                <label class="switch">
                                    <input type="checkbox" id="new_tab" name="new_tab" value="1" {{ (old('new_tab', $details->new_tab ?? 0) == 1) ? 'checked' : '' }} />
                                    <small></small>
                                </label>
                            </div>
                        </div>
                        <div class="col">
                            <label>Status</label>
                            <br>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="status" value="1" id="status_active">
                                <label class="form-check-label" for="status_active"> Active </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="status" value="0" id="status_inactive">
                                <label class="form-check-label" for="status_inactive"> Inactive </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary"> Save </button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"> Close</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" ></script>
<script>
    new DataTable('#example-table-theme', {
        paging: true,
    });
</script><script>
$(document).on('click', '.editComplianceBtn', function () {
    let data = $(this).data('comp');
    $('#menu_id').val(data.id);
    $('#category').val(data.category);
    $('#title').val(data.title);
    $('#link').val(data.link);
    $('#new_tab').prop('checked', data.new_tab == 1);
    $('input[name="status"][value="' + data.status + '"]').prop('checked', true);
    $('#editComplance').modal('show');

});
</script>
@endsection