@extends('layouts.app')



@section('title', 'Agents List')



<link href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css" rel="stylesheet">

@section('content')

    <div class="container-fluid">



        <!-- Page Heading -->

        <div class="d-sm-flex align-items-center justify-content-between mb-4">

            <h1 class="h3 mb-0 text-gray-800">Plan List </h1>

            <div class="row">

                <div class="col-md-12">

				    <a href="{{ route('planadd.create') }}" class="btn btn-sm btn-primary"><i aria-hidden="true" class="fas fa-plus"></i> Add Plan </a>

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

                                <th>Sr No.</th>

                                <th>Title</th>

                                <th>Sub Title</th>

                                <th>Monthly Price</th>

                                <th>Discount on Quartly Plan (%)</th>

                                <th>Trial Duration</th>

                                <th>Date</th>
                                <th>Mail Template</th>
                                <th>Status</th>

                                <th>Action</th>

                            </tr>

                        </thead>

                        <tbody>

                           @foreach($subscription_plan as $key=>$list)

						<tr>

							<td>{{ ++$key }}</td>

							<td>{{ $list->title }}</td>

							<td>{{ $list->sub_title }}</td>

							<td>INR {{ $list->monthly_price }}</td>

							<td>{{ $list->discount??'0' }}%</td>

							<td>{{ $list->trial_duration }} Days</td>

							<td>{{ $list->created_at ? date('d-m-Y',strtotime($list->created_at)) : '-' }}</td>

						    <td> {{ ($list->mail_temp_status == 1)?$list->total_mail_temp:'-' }}</td>
						    <td>

                                @if ($list->status == 0)

                                    <span class="badge badge-danger">Inactive</span>

                                @elseif ($list->status == 1)

                                    <span class="badge badge-success">Active</span>

                                @endif

                            </td>

							<td><a href="{{ route('planadd.edit',[$list->id]) }}" class="btn btn-sm btn-primary"><i aria-hidden="true" class="fa fa-pen"></i></a>
                          
                                <a href="{{ route('planadd.delete', [$list->id]) }}"
                                    onclick="return confirm('Are you sure you want to delete this plan?')"
                                    class="btn btn-sm btn-danger">
                                    <i class="fa fa-trash"></i>
                                </a>
                            </td>

						</tr>

						@endforeach

					  </tbody>



                    </table>





                </div>

            </div>

        </div>



    </div>


    <div class="modal fade " id="delete_plan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog " role="document">
        <div class="modal-content">
        <div class="modal-body position-relative">
            <!-- Close Button -->
            <button type="button" class="btn btn-primary rounded-circle border-2 position-absolute close" data-dismiss="modal"  aria-label="Close"
            style="top: 10px; right: 10px; width: 40px; height: 40px;">
            <span aria-hidden="true">&times;</span>
            </button>

            <!-- Tab Content -->
            <h4 class="text-center text-info">Are you sure you want to permanently delete this plan? This action cannot be undone.</h4><hr>
            <div class="tab-content p-3 enquiry_message" style="min-height:200px;">
                <form id="deletePlanForm" action="" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                <button type="submit" class="btn btn-danger">Yes, Delete</button>
            </form>
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





new DataTable( '#example-table-theme', {

    paging: true,



} );

</script>

@endsection

