@extends('layouts.app')

@section('title', 'Agents List')

<link href="https://cdn.datatables.net/2.0.3/css/dataTables.dataTables.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/buttons/3.0.1/css/buttons.dataTables.min.css" rel="stylesheet">

<style>
 .flt_liststs {
    float: right;
    display: flex;
}
.flt_liststs .flttrres {
    margin-right: 10px;
}
.flt_liststs .flttrres a {
    background: #f94554;
    padding: 5px 10px;
    color: #fff;
    font-size: 15px;
    border-radius: 4px;
    display: inline-block;
}
.flt_liststs .ftl_selctsss {
    margin-right: 10px;
}
.flt_liststs .ftl_selctsss:last-child {
    margin-right:0px;
}
.flt_liststs .ftl_selctsss select {
    padding: 4px;
    border: #ccc solid 1px;
    border-radius: 4px;
    font-size: 15px;
    cursor: pointer;
}
.flt_liststs .ftl_selctsss select:focus{outline:none;}


@media (min-width: 481px) and (max-width: 767px) {
	.flt_liststs {float: inherit; display: inline-block; margin-top: 10px; width: 100%;}
	.flt_liststs .flttrres {float: left;}
	.flt_liststs .ftl_selctsss:last-child {width: 100%; margin-top: 10px;}
	.flt_liststs .ftl_selctsss:last-child select {width: 100%;}
}

@media (min-width: 320px) and (max-width: 480px) {
	.flt_liststs {float: inherit; display: inline-block; margin-top: 10px; width: 100%;}
	.flt_liststs .flttrres {float: left;}
	.flt_liststs .ftl_selctsss:last-child {width: 100%; margin-top: 10px;}
	.flt_liststs .ftl_selctsss:last-child select {width: 100%;}
}
</style>
@section('content')
    <div class="container-fluid">
         <!-- Page Heading -->
		    <div class="row mb-4">
                <div class="col-lg-4">
                    <h1 class="h3 mb-0 text-gray-800">Customer List @if(request('agent')) (Agent : {{ @$agentdetail->first_name }} {{ @$agentdetail->last_name }}) @endif</h1>
                </div>
		        <div class="col-lg-8">
                    <div class="flt_liststs">
                        <div class="flttrres">
                            <a class="btn text-light" onclick="window.history.back();"><i class="fas fa-solid fa-arrow-left"></i> Back</a>
                        </div>
                        <div class="flttrres">
                                <a href="javascript:void(0);">Filters</a>
                        </div>
                        <div class="ftl_selctsss">
                                <select>
                                    <option value="">Add New Contacts</option>
                                    <option value="1">Add single contact</option>
                                    <option value="2">Import contacts</option>
                                </select>
                        </div>
                        <div class="ftl_selctsss">
                                <select>
                                    <option value="">Bulk Action</option>
                                    <option value="1">Select All  Contacts</option>
                                    <option value="2">Deselect All Contacts</option>
                                    <option value="3">Export Contacts</option>
                                    <option value="4">Delete Contacts</option>
                                    <option value="5">Add List/Lists</option>
                                    <option value="6">Add Tag/Tags</option>
                                </select>
                        </div>
                    </div>
			    </div>
			<span class="text-center text-success" id="msg_id"></span>
		   </div>

        {{-- Alert Messages --}}
        @include('common.alert')

        <!-- DataTales Example -->
        <div class="card shadow mb-4">

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="example-table-theme" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th class="text-left">&nbsp;<input type="checkbox" id="" name="" value=""></th>
                                <th>Sr No.</th>
                                <th>Name</th>
                                @if(!request('userid') && Auth()->user()->hasrole('Master Admin'))
                                <th>Agent Name (Member ID)</th>
                                @endif
                                <th>Email</th>
                                <th>Mobile Number</th>
                                <th>Registration Date</th>
                                <th>List Name</th>
                                <th>Tag Name</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $key=>$user)
                                <tr>
                                    <td class="text-left"><input type="checkbox" id="" name="" value=""></td>
                                    <td>{{ ++$key }}</td>
                                    <td>{{ $user->name ? $user->name : '-' }}</td>
                                     @if(!request('userid')  && Auth()->user()->hasrole('Master Admin'))
                                     <td>{{ $user->first_name ? $user->first_name : '-' }} {{ $user->last_name ? $user->last_name : '-' }} {{ $user->company_id ? '('.$user->company_id.')' : '' }} </td>
                                     @endif
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->mobile ? $user->mobile : '-' }}</td>
									<td>{{ $user->created_at ? date('d-m-Y',strtotime($user->created_at)) : '-' }}</td>
                                    <td>{{ $user->list_name }}</td>
                                    <td>{{ $user->tag_name }}</td>
                                    <td>
                                        @if ($user->status == 0)
                                            <span class="badge badge-danger">Inactive</span>
                                        @elseif ($user->status == 1)
                                            <span class="badge badge-success">Active</span>
                                        @endif
                                    </td>
                                    <?php  $editRoute = route('customer.edit', ['user' => $user->id]);
                                            $deleteRoute = route('customer.destroy', ['user' => $user->id]);
                                    ?>
									 <td>
                                            <a href="{{ $editRoute }}" class="btn btn-primary bnt_alsss"><i class="fa fa-pen"></i></a>
                                            <a href="{{ $deleteRoute }}" class="btn btn-danger bnt_alsss delete-btn"><i class="fa fa-trash"></i></a>
                                        <!--@if(!request('userid') && Auth()->user()->hasrole('Master Admin'))-->
                                        <!--@endif-->
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
<script type="text/javascript" src="https://cdn.datatables.net/2.0.3/js/dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/3.0.1/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/3.0.1/js/buttons.html5.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/3.0.1/js/buttons.print.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
document.querySelectorAll('.delete-btn').forEach(function(button) {
    button.addEventListener('click', function(e) {
        e.preventDefault();
        let url = this.getAttribute('href');

        Swal.fire({
            title: 'Are you sure?',
            text: "This record will be deleted permanently!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = url;
            }
        });
    });
});
</script>
<script>
$('#example-table-theme').DataTable( {
    layout: {
        topStart: 'buttons'
    },
    buttons:
    [{ extend: 'csv', text: 'Export',className: 'excelButton' ,exportOptions: {
        columns: [1,2,3,4,5]
    } }]
} );
</script>
@endsection
