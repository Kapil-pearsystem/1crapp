<?php
use Illuminate\Support\Str;
?>
@extends('layouts.app')

@section('title', 'Plan Type List')

<link href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css" rel="stylesheet">
@section('content')
    <div class="container-fluid">
    
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Plan Type List</h1>
            <div class="row">
                <div class="col-md-12">
                    <a href="javascript:void(0);" data-toggle="modal" data-target="#addPlanModal" class="btn btn-sm btn-primary"><i aria-hidden="true" class="fas fa-plus"></i> Add Plan Type</a>
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
                                <th>Title</th>
                                <th>Validity Month</th>
                                <th>Validity Days</th>
                                <th>Discount</th>
                                <th>Date</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($lists as $key => $list)
                            <tr>
                                <td>{{ ++$key }}</td>
                                <td>{{ $list->title }}</td>
                                <td>{{ $list->total_months }} (Months)</td>
                                <td>{{ $list->total_days }} (Days)</td>
                                <td>{{ $list->discount }}%</td>
                                <td>{{ date('M d, Y', strtotime($list->created_at)) }}</td>
                                <td>
                                    @if($list->status == 1)
                                        <span class="badge badge-success">Active</span>
                                    @else
                                        <span class="badge badge-danger">Inactive</span>
                                    @endif
                                </td>
                                <td>
                                    
                                        <a href="javascript:void(0);" 
                                           onclick='editPlan(@json($list))' 
                                           class="btn btn-primary bnt_alsss">
                                           <i class="fa fa-pen"></i>
                                        </a>
                                        <a href="#" class="btn btn-danger bnt_alsss" onclick="if(confirm('Are you sure you want to delete this?')){ window.location.href='{{ route('plan-type.delete', [$list->id]) }}'; }"><i aria-hidden="true" class="fa fa-trash"></i></a>
                                    
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- Button trigger modal -->

    <!-- Modal -->
    <div class="modal fade" id="addPlanModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content" style="border:2px solid blue;">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add Plan Type</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
            <form action="{{ route('plan-type.store') }}" method="post">
                  <div class="modal-body">
                        @csrf
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" name="title" placeholder="Enter Plan title" required>
                        </div>
                          <div class="row">
                            <div class="col">
                                <label for="title">Validity ( In Days )</label>
                              <input type="text" class="form-control" name="total_days" maxlength="4"  placeholder="Validity ( In Days )" required onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))" value="0">
                            </div>
                            <div class="col">
                                <label for="discount">Validity ( In Months )</label>
                              <input type="text" class="form-control" name="total_months" maxlength="4" placeholder="Validity ( In Months )" required onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))" value="0">
                            </div>
                          </div>
                        <div class="form-group">
                            <label for="title">Discount (%)</label>
                             <input type="text" class="form-control" name="discount" maxlength="2" placeholder="Discount" required onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))" value="0">
                        </div>
                        <label for="title">Status</label>
                        <div class="form-group">
                            <div class="form-check form-check-inline">
                              <input class="form-check-input" type="radio" name="status" id="Active" value="1" checked>
                              <label class="form-check-label" for="Active">Active</label>
                            </div>
                            <div class="form-check form-check-inline">
                              <input class="form-check-input" type="radio" name="status" id="Inactive" value="0">
                              <label class="form-check-label" for="Inactive">Inactive</label>
                            </div>
                        </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                  </div>
            </form>
        </div>
      </div>
    </div>
    <div class="modal fade" id="editPlanModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content" style="border:2px solid blue;">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit Plan Type</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
            <form action="{{ route('plan-type.store') }}" method="post">
                  <div class="modal-body">
                        @csrf
                        <input type="hidden" value="" id="plan_id" name="id"/>
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" name="title" id="title" placeholder="Enter Plan title" required>
                        </div>
                         <div class="row">
                            <div class="col">
                                <label for="title">Validity ( In Days )</label>
                              <input type="text" class="form-control" name="total_days" maxlength="4" id="total_days" placeholder="Validity ( In Days )" required onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))" value="0">
                            </div>
                            <div class="col">
                                <label for="discount">Validity ( In Months )</label>
                              <input type="text" class="form-control" name="total_months" maxlength="4" id="total_months" placeholder="Validity ( In Months )" required onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))" value="0">
                            </div>
                          </div>
                        <div class="form-group">
                            <label for="title">Discount (%)</label>
                             <input type="text" class="form-control" name="discount" maxlength="2" id="discount" placeholder="Discount" required onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))" value="0">
                        </div>
                            <label for="title">Status</label>
                        <div class="form-group">
                            <div class="form-check form-check-inline">
                              <input class="form-check-input" type="radio" name="status" id="edit_Active" value="1">
                              <label class="form-check-label" for="edit_Active">Active</label>
                            </div>
                            <div class="form-check form-check-inline">
                              <input class="form-check-input" type="radio" name="status" id="edit_Inactive" value="0">
                              <label class="form-check-label" for="edit_Inactive">Inactive</label>
                            </div>
                        </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Update</button>
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
    <script>
        $(document).ready(function() {
            $('#example-table-theme').DataTable({
                paging: true,
            });
        });
        
        // edit plan
        function editPlan(data) {

            // Reset form first
            $('#editPlanModal form')[0].reset();
        
            $('#plan_id').val(data.id);
            $('#title').val(data.title);
            $('#total_days').val(data.total_days);
            $('#total_months').val(data.total_months);
            $('#discount').val(data.discount);
        
            if (data.status == 1) {
                $('#edit_Active').prop('checked', true);
            } else {
                $('#edit_Inactive').prop('checked', true);
            }
        
            $('#editPlanModal').modal('show');
        }

    </script>
@endsection
