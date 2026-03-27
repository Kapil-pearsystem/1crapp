@extends('layouts.app')

@section('title', 'Mail List')

<link href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css" rel="stylesheet">
@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Mail </h1>
            <div class="row">
                <div class="col-md-12">
				    <a href="{{ route('mail.create') }}" class="btn btn-sm btn-primary"><i aria-hidden="true" class="fas fa-plus"></i> Add Mail</a>
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
                                <th>Category</th>
                                <th>Template</th>
                                <th>Title</th>
                                <th>Subject</th>
                                <th>Logo</th>
                                <th>Date</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($lists as $key=>$list)
						<tr>
							<td>{{ ++$key }}</td>
							<td>{{ $list->category_name }}</td>
							<td>{{ $list->temp_name }}</td>
							<td>{{ $list->title }}</td>
							<td>{{ $list->subject }}</td>
							<td><img src="{{ asset($list->logo) }}" alt="Logo" height="50"/></td>
							<td>{{ date('d-m-Y',strtotime($list->created_at)) }}</td>
							<td>
							     <label class="switch">
								  <input @if($list->status==1) checked @endif  type="checkbox">
								  <small></small>
								</label>
							</td>
							<td>
								<a href="{{ route('mail.view-mail',[$list->id]) }}" target="_blank" class="btn btn-info bnt_alsss"><i aria-hidden="true" class="fa fa-eye"></i></a>
								<a href="{{ route('mail.edit-mail',[$list->id]) }}" class="btn btn-primary bnt_alsss"><i aria-hidden="true" class="fa fa-pen"></i></a>
								<a href="{{ route('mail.delete-mail',[$list->id]) }}" onclick="return confirm('Are you sure you want to delete this mail?');" class="btn btn-danger bnt_alsss"><i aria-hidden="true" class="fas fa-trash-alt"></i></a>
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

<script type="text/javascript" src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<script>


new DataTable( '#example-table-theme', {
    paging: true,

} );
</script>
@endsection