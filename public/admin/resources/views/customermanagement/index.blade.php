@extends('layouts.app')

@section('title', 'Agents List')

<link href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css" rel="stylesheet">
@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Customers</h1>
            <div class="row">
                <div class="col-md-12">
				    <a href="{{ route('customermanagement.addcustomer') }}" class="btn btn-sm btn-primary"><i aria-hidden="true" class="fas fa-plus"></i> Add Customers</a>
                    <a href="{{ route('customer.export') }}" class="btn btn-sm btn-success">
                        <i class="fas fa-check"></i> Export To Excel
                    </a>
                </div>

            </div>

        </div>



        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">All Customers</h6>

            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="example-table-theme" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Sr No.</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Mobile Number</th>
                                <th>Registration Date</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
						<tr>
							<td>1</td>
							<td>Dr. Anju Meena</td>
							<td>ramjee1@ramjeemeena.com</td>
							<td>08295500152</td>
							<td>09-02-2024</td>
							<td><span class="badge badge-success">Active</span></td>
							<td>
								<a href="{{ route('customermanagement.editcustomer') }}" class="btn btn-primary bnt_alsss"><i aria-hidden="true" class="fa fa-pen"></i></a>
							</td>
						</tr>

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


new DataTable( '#example-table-theme', {
    paging: true,

} );
</script>
@endsection
