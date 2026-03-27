@extends('layouts.app')



@section('title', 'Assets List')



<link href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css" rel="stylesheet">

@section('content')

    <div class="container-fluid">



        <!-- Page Heading -->

        <div class="d-sm-flex align-items-center justify-content-between mb-4">

            <h1 class="h3 mb-0 text-gray-800">Assets </h1>

            <div class="row">

                <div class="col-md-12">

				    <a href="{{ route('assets.add') }}" class="btn btn-sm btn-primary"><i aria-hidden="true" class="fas fa-plus"></i> Add Assets</a>

                    <!--<a href="{{ route('customer.export') }}" class="btn btn-sm btn-success">

                        <i class="fas fa-check"></i> Export To Excel

                    </a>-->

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

                                <th>Page Type</th>
                                <th>Url</th>
                                
                                <th>New Tab</th> 

                                <th>Date</th>

                                <th>Status</th>

                                <th>Action</th>

                            </tr>

                        </thead>

                        <tbody>

                            @foreach($data as $key=>$list)

						<tr>

							<td>{{ ++$key }}</td>

							<td>{{ $list->title }}</td> 

							<td>{{ $list->page_type }}</td> 
							<td>{{ $list->url }}</td> 
							<td>
							    @if($list->new_tab == 1) 
                                    <span class="badge badge-success">Yes</span>
                                @else
                                    <span class="badge badge-danger">No</span>
                                @endif
						    </td> 

							<td>{{ date('F d, Y',strtotime($list->created_at)) }}</td>

							<td>

                            <label class="switch">

                                <input type="checkbox" class="status-toggle page-status" data-id="{{ $list->id }}" @if($list->status == 1) checked @endif>

                                <small></small>

                            </label>

							</td>

							<td>

								<a href="{{ route('assets.edit',[$list->id]) }}" class="btn btn-primary bnt_alsss"><i aria-hidden="true" class="fa fa-pen"></i></a>

								<a class="btn btn-danger m-2 deleteBtn" 
                                   href="#" 
                                   data-url="{{ route('assets.delete', $list->id) }}"
                                   data-toggle="modal" 
                                   data-target="#deleteModal">
                                    <i class="fas fa-trash"></i></a>

							</td>

						</tr>

						@endforeach

					  </tbody>



                    </table>



                

                </div>

            </div>

        </div>



    </div>

 


<!-- Delete Confirmation Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                
                <div class="modal-header bg-danger text-white">
                    <h5 class="modal-title">Confirm Delete</h5>
                    <button type="button" class="close" data-dismiss="modal">
                        <span>&times;</span>
                    </button>
                </div>
    
                <div class="modal-body">
                    Are you sure you want to delete this record?
                </div>
    
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                        Cancel
                    </button>
    
                    
                        <a href="" id="delete-path"><button type="submit" class="btn btn-danger">
                            Yes, Delete
                        </button></a>
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

<script>
    $(document).on("click", ".deleteBtn", function () {
        var url = $(this).data("url");
        $("#delete-path").attr("href", url);
    });
</script>

<script>

    $(document).ready(function () {

        $('.page-status').on('change', function () {

            var page_id = $(this).data('id');

            var status = $(this).is(':checked') ? 1 : 0;

            $.ajax({

                url: '{{ route('assets.update-status') }}', 

                type: 'POST',

                data: {

                    _token: '{{ csrf_token() }}',

                    id: page_id,

                    status: status

                },

                success: function (response) {

                    // alert(response.message); // Success message or perform some action

                },

                error: function (xhr) {

                    alert('Something went wrong!');

                }

            });

        });

    });

</script>

@endsection