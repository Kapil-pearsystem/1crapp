@extends('layouts.app')

@section('title', 'Page List')
<?php
use Illuminate\Support\Str;

$scheme = request()->getScheme();
$host   = request()->getHost(); // admin.1crapp.com

if (str_starts_with($host, 'admin.')) {
    $host = substr($host, 6); // remove 'admin.'
}

$finalUrl = $scheme . '://' . $host;
?>
<style>
    .copy-icon {
        cursor: pointer; /* Change cursor to pointer on hover */
        font-size: 18px;
        color: #333;
    }
    .copy-icon:hover {
        color: #007bff; /* Change color on hover */
    }
</style>
<link href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css" rel="stylesheet">
@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Page List </h1>
            <div class="row">
                <div class="col-md-12">
				    <a href="{{ route('page.add') }}" class="btn btn-sm btn-primary"><i aria-hidden="true" class="fas fa-plus"></i> Add Page</a>
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
                                <th>#</th>
                                <th>Page Name</th> 
                                <th>List</th> 
                                <th>Tag</th> 
                                <!-- <th>Pre Heading</th> 
                                <th>Pre Heading Status</th> 
                                <th>Title</th> 
                                <th>Title Status</th> 
                                <th>Sub Title</th> 
                                <th>Sub Title Status</th> 
                                <th>Bullets</th> 
                                <th>Sub Title Status</th> 
                                <th>Media File</th> 
                                <th>Media File Status</th> 
                                <th>Popup Status</th>
                                <th>Popup Destination</th>
                                <th>Popup Destination Status</th>
                                <th>Popup New Tab</th>
                                <th>Addination CTA</th>
                                <th>Addination CTA New Tab</th>
                                <th>Popup Content</th>
                                <th>Popup Image</th> -->
                                <th>Date</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $key=>$list)
						<tr>
							<td>{{ ++$key }}</td>
							<td>
                                {{ $list->page_name }} |&ensp;  
                                <i class="fa fa-copy copy-icon" data-url="{{ $finalUrl.'/page/'.$list->slug }}" aria-hidden="true"></i>&ensp; |&ensp;  
                                <a href="{{ $finalUrl.'/page/'.$list->slug }}" target="_blank" class="text-right">
                                    <i class="fas fa-external-link-alt" aria-hidden="true"></i>
                                </a>
                            </td>
							<td>{{ $list->list_name }}</td> 
							<td>{{ $list->tag_name }}</td> 
							<!-- <td>{{ $list->pre_heading }}</td>  -->
							<!-- <td>
                                <label class="switch">
                                    <input type="checkbox" class="status-toggle coupon-status" data-id="{{ $list->id }}" @if($list->pre_heading_status == 1) checked @endif>
                                    <small></small>
                                </label>
                            </td>  -->
							<!-- <td>{{ $list->title }}</td> 
							<td>
                                <label class="switch">
                                    <input type="checkbox" class="status-toggle coupon-status" data-id="{{ $list->id }}" @if($list->title_status == 1) checked @endif>
                                    <small></small>
                                </label>
                            </td> 
							<td>{{ $list->subtitle }}</td> 
							<td>
                                <label class="switch">
                                    <input type="checkbox" class="status-toggle coupon-status" data-id="{{ $list->id }}" @if($list->subtitle_status == 1) checked @endif>
                                    <small></small>
                                </label>
                            </td> 
							<td>
                                <table>
                                <tr>
                                    <td>
                                        <ul>
                                            <li>{{ $list->bullet1 }}</li>
                                            <li>{{ $list->bullet2 }}</li>
                                            <li>{{ $list->bullet3 }}</li>
                                        </ul>
                                    </td>
                                    <td>
                                        <ul>
                                            <li>{{ $list->bullet4 }}</li>
                                            <li>{{ $list->bullet5 }}</li>
                                            <li>{{ $list->bullet6 }}</li>
                                        </ul>
                                    </td>
                                </tr>
                                </table>
                            </td> 
							<td>
                                <label class="switch">
                                    <input type="checkbox" class="status-toggle coupon-status" data-id="{{ $list->id }}" @if($list->bullet_status == 1) checked @endif>
                                    <small></small>
                                </label>
                            </td> 
                            <td><img src="{{ asset('').'/'.$list->media_file}}" height="80px"/></td> 
							<td>
                                <label class="switch">
                                    <input type="checkbox" class="status-toggle coupon-status" data-id="{{ $list->id }}" @if($list->media_file_status == 1) checked @endif>
                                    <small></small>
                                </label>
                            </td> 
							<td>
                                <label class="switch">
                                    <input type="checkbox" class="status-toggle coupon-status" data-id="{{ $list->id }}" @if($list->popup_status == 1) checked @endif>
                                    <small></small>
                                </label>
                            </td> 
                            <td>{{ $list->popup_destination }}</td> 
                            <td>
                                <label class="switch">
                                    <input type="checkbox" class="status-toggle coupon-status" data-id="{{ $list->id }}" @if($list->popup_destination_status == 1) checked @endif>
                                    <small></small>
                                </label>
                            </td> 
                            <td>
                                <label class="switch">
                                    <input type="checkbox" class="status-toggle coupon-status" data-id="{{ $list->id }}" @if($list->open_new_tab == 1) checked @endif>
                                    <small></small>
                                </label>
                            </td> 
                            <td>{{ $list->addination_cta }}</td> 
                            <td>
                                <label class="switch">
                                    <input type="checkbox" class="status-toggle coupon-status" data-id="{{ $list->id }}" @if($list->addination_cta_new_tab == 1) checked @endif>
                                    <small></small>
                                </label>
                            </td>
                            <td style="white-space:normal;">{{ Str::words($list->popup_content, 10) }}</td> 
                            <td><img src="{{ asset('').'/'.$list->popup_image}}" height="80px"/></td>  -->
						
							<td>{{ date('F d, Y',strtotime($list->created_at)) }}</td>
							<td>
                            <label class="switch">
                                <input type="checkbox" class="status-toggle gift-status" data-id="{{ $list->id }}" @if($list->status == 1) checked @endif>
                                <small></small>
                            </label>
							</td>
							<td>
								<a href="#" data-toggle="modal" data-target="#page_model"  data-id="{{ $list->id }}" class="btn btn-info bnt_alsss page_model"><i aria-hidden="true" class="fa fa-eye"></i></a>
								<a href="{{ route('page.edit',['id'=>$list->id])}}" class="btn btn-primary bnt_alsss"><i aria-hidden="true" class="fa fa-pen"></i></a>
								<a href="{{ route('page.delete',['id'=>$list->id])}}" class="btn btn-danger bnt_alsss" onclick="return confirm('Are you sure you want to delete this page?')"><i aria-hidden="true" class="fa fa-trash-o"></i></a>
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

@section('modals')
<!-- Modal -->
<!-- Button trigger modal -->

<!-- Modal -->
<div class="modal fade" id="page_model" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Page Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body swich_bntts" id="page_data">
      </div>
    </div>
  </div>
</div>
@endsection
@section('scripts')
<script>
new DataTable( '#example-table-theme', {
    paging: true,
    
} );
</script> 
<script>

    $('.page_model').on('click', function () {
    var id = $(this).data('id');
        $.ajax({
            url: '{{ route('page.get-info') }}', 
            type: 'POST',
            data: {
                _token: '{{ csrf_token() }}',
                id: id
            },
            success: function (response) {
                $('#page_data').html(response.data);
            },
            error: function (xhr) {
                alert('Something went wrong!');
            }
        });
    });
</script>
<script>
    // Select all elements with the 'copy-icon' class
    document.querySelectorAll('.copy-icon').forEach(function(icon) {
        icon.addEventListener('click', function() {
            const urlToCopy = this.getAttribute('data-url'); // Get URL from the data attribute
            navigator.clipboard.writeText(urlToCopy).then(() => {
                this.classList.remove('fa-copy'); // Remove copy icon class
                this.classList.add('fa-check', 'text-success'); // Add checkmark icon class

                // Optional: Reset the icon after a few seconds
                setTimeout(() => {
                    this.classList.remove('fa-check', 'text-success'); // Remove checkmark icon class
                    this.classList.add('fa-copy'); // Add copy icon class back
                }, 10000);
            }).catch(err => {
                console.error('Error copying text: ', err);
            });
        });
    });
</script>
@endsection