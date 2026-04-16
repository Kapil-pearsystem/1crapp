@extends('layouts.app')

@section('title', 'Homework List')

<link href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css" rel="stylesheet">

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Homework List</h1>
        <div class="row">
            <div class="col-md-12">
                <a href="{{ route('appointment-homework.create') }}" class="btn btn-sm btn-primary">
                    <i class="fas fa-plus"></i> Add Homework
                </a>
            </div>
        </div>
    </div>

    {{-- Alert --}}
    @include('common.alert')

    <!-- Table -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive swich_bntts">

                <table class="table table-bordered" id="homework-table">
                    <thead>
                        <tr>
                            <th>Sr No.</th>
                            <th>Name of the Page</th>
                            <!-- <th>Media</th> -->
                            <th>Video Type</th>
                            <th>Embed Code</th>
                            <th>Download Button</th>
                            <th>Lead Form Name</th>
                            <!-- <th>Slug</th> -->
                            <th>Status</th>
                            <th>Created Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($lists as $key => $item)
                        <tr>
                            <td>{{ ++$key }}</td>

                            <td>{{ $item->page_name }} <a href="{{ request()->getSchemeAndHttpHost() }}/homework/{{ $item->slug }}"> <i aria-hidden="true" class="fas fa-external-link-alt"></i></a></td>

                            {{-- Media Preview --}}
                            <!-- <td>
                                @if($item->media_type == 'image' && $item->media_path)
                                    <img src="{{ $item->media_path }}" style="max-width:70px;">
                                @elseif($item->media_type == 'video' && $item->media_path)
                                    <a href="{{ $item->media_path }}" target="_blank">View Video</a>
                                @elseif($item->media_type == 'embed_code')
                                    <span class="badge badge-info">Embed</span>
                                @else
                                    —
                                @endif
                            </td> -->

                            <td>
                                <span class="badge badge-secondary">
                                    {{ ucwords(str_replace('_', ' ',$item->media_type)) }} 
                                    
                                </span>
                                <a href="{{ $item->media_path }}"> <i aria-hidden="true" class="fas fa-external-link-alt"></i></a>
                            </td>

                            <!-- <td>
                                <code>{{ $item->slug }}</code>
                            </td> -->
                            <td>
                                {{ $item->embed_code?'Yes':'No' }}
                            </td>
                            <td>
                                <label class="switch">
								  <input id="fd_status" onchange="setStatus(this,{{ $item->id}})" type="checkbox"  @if($item->fd_visible==1) checked @endif>
								  <small></small>
								</label>
                            </td>
                            <td>
                                {{ $item->form_name }}
                            </td>
                            <td>
                                @if ($item->status == 1)
                                    <span class="badge badge-success">Active</span>
                                @else
                                    <span class="badge badge-danger">Inactive</span>
                                @endif
                            </td>

                            <td>{{ date('M d, Y', strtotime($item->created_at)) }}</td>

                            <td>
                                <a href="javascript:void(0);" onclick='viewDetails(@json($item))'
                                   class="btn btn-info btn-sm">
                                    <i class="fa fa-eye"></i>
                                </a>
                                <!-- Edit -->
                                <a href="{{ route('appointment-homework.edit', $item->id) }}"
                                   class="btn btn-primary btn-sm">
                                    <i class="fa fa-pen"></i>
                                </a>

                                <!-- Delete -->
                                <a href="#" class="btn btn-danger btn-sm"
                                   onclick="if(confirm('Are you sure?')) {
                                       window.location.href='{{ route('appointment-homework.delete', $item->id) }}';
                                   }">
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
<div id="detailsModal" class="modal fade " role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                 <h4 class="modal-title">View Details</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body text-left">

                <p><strong>Title:</strong> <span id="title"></span></p>
                <p><strong>Sub Title:</strong> <span id="sub_title"></span></p>

                <hr>

                <p><strong>Media Type:</strong> <span id="media_type"></span></p>
                <p><strong>Media:</strong></p>
                <div id="media_preview"></div>

                <p><strong>Media Visible:</strong> <span id="media_visible"></span></p>

                <hr>

                <p><strong>Short Description:</strong> <span id="sort_description"></span></p>

                <hr>

                <p><strong>Embed Code:</strong></p>
                <div id="embed_code" style="background:#f5f5f5; padding:10px;"></div>

                <p><strong>Embed Visible:</strong> <span id="ec_visible"></span></p>

                <hr>

                <p><strong>Drive Visible:</strong> <span id="fd_visible"></span></p>

                <hr>

                <p><strong>Form:</strong> <span id="form_id"></span></p>
                <p><strong>Form Visible:</strong> <span id="form_visible"></span></p>

                <hr>

                <p><strong>Status:</strong> <span id="status"></span></p>

            </div>
        </div>
    </div>
</div>
<p class="fd_success_btn" data-toggle="modal" data-target="#marketstatus_success" style="opacity:0;"></p>
<p id="detailsModal_btn" data-toggle="modal" data-target="#detailsModal" style="opacity:0;"></p>

@endsection
@section('scripts')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>

<script>
    $(document).ready(function () {
        $('#homework-table').DataTable({
            paging: true,
            order: [[0, 'desc']]
        });
    });
    // update file status
    function setStatus(thiss,id) {
        var status = thiss.checked ? 1 : 0;
        $.ajax({
            type: "GET",
            cache: false,
            url: "{{url('appointment-homework/fd-status')}}/"+id+'/'+status,
            success: function (response) {
                $('.fd_success_btn').click();
            }
        });
    }
    // view details
    function viewDetails(data){

        document.getElementById('title').innerHTML = data.title ?? '';
        document.getElementById('sub_title').innerHTML = data.sub_title ?? '';

        document.getElementById('media_type').innerHTML = data.media_type ?? '';

        // ✅ MEDIA PREVIEW
        let mediaHTML = '';

        if (data.media_type === 'image' && data.media_path) {
            mediaHTML = `<img src="${data.media_path}" style="max-width:100%; height:auto;">`;
        } 
        else if (data.media_type === 'video' && data.media_path) {
            mediaHTML = `<video controls style="width:100%">
                            <source src="${data.media_path}" type="video/mp4">
                        </video>`;
        } 
        else if (data.media_type === 'embed_code') {
            mediaHTML = data.media_path ?? '';
        }

        document.getElementById('media_preview').innerHTML = mediaHTML;

        document.getElementById('media_visible').innerHTML = data.media_visible == 1 ? 'Yes' : 'No';

        document.getElementById('sort_description').innerHTML = data.sort_description ?? '';

        document.getElementById('embed_code').innerHTML = data.embed_code ?? '';
        document.getElementById('ec_visible').innerHTML = data.ec_visible == 1 ? 'Yes' : 'No';

        document.getElementById('fd_visible').innerHTML = data.fd_visible == 1 ? 'Yes' : 'No';

        document.getElementById('form_id').innerHTML = data.form_name ?? '';
        document.getElementById('form_visible').innerHTML = data.form_visible == 1 ? 'Yes' : 'No';

        document.getElementById('status').innerHTML = data.status == 1 ? 'Active' : 'Inactive';

        // 🔥 Open modal
        $('#detailsModal_btn').click();
    }
</script>
@endsection