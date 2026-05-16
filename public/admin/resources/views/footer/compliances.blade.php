@extends('layouts.app')
@section('title', 'Compliance List')
<link href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css" rel="stylesheet">
@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Compliance List</h1>
        <div class="row">
            <div class="col-md-12">
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
                            <th>Title</th>
                            <th>Link</th>
                            <th>Status</th>
                            <th>Created Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($compliances as $key=> $comp)
                        <tr>
                            <td>{{ ++$key }}</td>
                            <td>{{ $comp->title }}</td>
                            <td>{{ $comp->link }}</td>
                            <td>{{ $comp->status == 1 ? 'Active' : 'Inactive' }}</td>
                            <td>{{ $comp->created_at->format('Y-m-d H:i') }}</td>
                            <td>
                                <a href="javascript:void(0);"
                                class="btn btn-primary btn-sm editComplianceBtn"
                                data-comp='@json($comp)'>

                                    <i class="fa fa-pen fa-lg"></i>

                                </a>
                                <form action="{{ route('compliances.destroy', $comp->id) }}" method="POST" class="d-inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this Compliance?')">
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
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Complance</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" action="{{ route('compliances.save') }}">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col">
                            <label>Title</label>
                            <input type="text" name="title" class="form-control" placeholder="Enter Title" required>
                        </div>
                        <div class="col">
                            <label>Link</label>
                            <input type="url" name="link" class="form-control" placeholder="Enter Link" required>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col">
                            <label>Priority</label>
                            <input type="number" min="1" name="priority" class="form-control" placeholder="Enter priority" required>
                        </div>
                        <div class="col swich_bntts">
                            <label>Open new tab</label>
                            <div class="block_araea">
                                <label class="switch">
                                    <input type="checkbox" name="new_tab" value="1" {{ (old('new_tab', $details->new_tab ?? 0) == 1) ? 'checked' : '' }} />
                                    <small></small>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-4">
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
<div class="modal fade"
    id="editComplance"
    tabindex="-1"
    role="dialog"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    Edit Complance
                </h5>
                <button type="button"
                    class="close"
                    data-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>
            <form method="post"
                action="{{ route('compliances.save') }}">
                @csrf
                <input type="hidden"
                    name="id"
                    id="compliance_id">
                <div class="modal-body">
                    <div class="row">
                        <!-- Title -->
                        <div class="col">
                            <label>Title</label>
                            <input type="text"
                                name="title"
                                id="compliance_title"
                                class="form-control"
                                placeholder="Enter Title"
                                required>
                        </div>
                        <!-- Link -->
                        <div class="col">
                            <label>Link</label>
                            <input type="url"
                                name="link"
                                id="compliance_link"
                                class="form-control"
                                placeholder="Enter Link"
                                required>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <!-- Priority -->
                        <div class="col">
                            <label>Priority</label>
                            <input type="number"
                                min="1"
                                name="priority"
                                id="compliance_priority"
                                class="form-control"
                                placeholder="Enter Priority"
                                required>
                        </div>
                        <!-- New Tab -->
                        <div class="col swich_bntts">
                            <label>Open new tab</label>
                            <div class="block_araea">
                                <label class="switch">
                                    <input type="checkbox"
                                        name="new_tab"
                                        id="compliance_new_tab"
                                        value="1">
                                    <small></small>
                                </label>
                            </div>
                        </div>
                    </div>
                    <!-- Status -->
                    <div class="row mt-4">
                        <div class="col">
                            <label>Status</label>
                            <br>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input"
                                    type="radio"
                                    name="status"
                                    value="1"
                                    id="status_active">
                                <label class="form-check-label"
                                    for="status_active">
                                    Active
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input"
                                    type="radio"
                                    name="status"
                                    value="0"
                                    id="status_inactive">
                                <label class="form-check-label"
                                    for="status_inactive">
                                    Inactive
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit"
                        class="btn btn-primary">
                        Save
                    </button>
                    <button type="button"
                        class="btn btn-secondary"
                        data-dismiss="modal">
                        Close
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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" ></script>
<script>
    new DataTable('#example-table-theme', {
        paging: true,
    });
</script><script>
$(document).on('click', '.editComplianceBtn', function () {

    let data = $(this).data('comp');

    $('#compliance_id').val(data.id);

    $('#compliance_title').val(data.title);

    $('#compliance_link').val(data.link);

    $('#compliance_priority').val(data.priority);

    $('#compliance_new_tab').prop('checked', data.new_tab == 1);

    $('input[name="status"][value="' + data.status + '"]')
        .prop('checked', true);

    $('#editComplance').modal('show');

});
</script>
@endsection