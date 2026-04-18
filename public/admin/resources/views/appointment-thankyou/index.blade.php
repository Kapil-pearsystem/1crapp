@extends('layouts.app')

@section('title', 'Appointment Thank You List')

<link href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css" rel="stylesheet">

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Appointment Thank You List</h1>
        <div class="row">
            <div class="col-md-12">
                <a href="{{ route('appointment-thankyou.create') }}" class="btn btn-sm btn-primary">
                    <i class="fas fa-plus"></i> Add 
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

                <table class="table table-bordered" id="booking-calender-table">
                    <thead>
                        <tr>
                            <th>Sr. No.</th>
                            <th>Name of the Page</th>
                            <th>Logo</th>
                            <th>Social Media Links</th>
                            <th>To Next Funnels</th>
                            <th>Next Funnel Name</th>
                            <th>Status</th>
                            <th>Created Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($lists as $key => $item)
                        <tr>
                            <td>{{ ++$key }}</td>
                            <td>{{ $item->page_name }}
                                   |&ensp;  
                                <i class="fa fa-copy copy-icon" data-url="{{ request()->getSchemeAndHttpHost() }}/appointments/thankyou/{{ $item->slug }}" aria-hidden="true" style="cursor:pointer;"></i>&ensp; |&ensp; <a href="{{ request()->getSchemeAndHttpHost() }}/appointments/thankyou/{{ $item->slug }}"> <i aria-hidden="true" class="fas fa-external-link-alt"></i></a>
                            </td>
                            <td>
                                @if($item->logo)
                                    <img src="{{ $item->logo }}" style="max-width:70px;">
                                @else
                                    —
                                @endif
                            </td>

                            <td>
                                <label class="switch">
								  <input id="sm_status" onchange="setsmStatus(this,{{ $item->id}})" type="checkbox"  @if($item->sm_visible==1) checked @endif>
								  <small></small>
								</label>
                            </td>

                            <td>
                                <label class="switch">
								  <input id="nf_status" onchange="setnfStatus(this,{{ $item->id}})" type="checkbox"  @if($item->nf_visible==1) checked @endif>
								  <small></small>
								</label>
                            </td>
                            <td>{{ $item->join_title ?? '' }}</td>

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
                                <a href="{{ route('appointment-thankyou.edit', $item->id) }}"
                                   class="btn btn-primary btn-sm">
                                    <i class="fa fa-pen"></i>
                                </a>

                                <!-- Delete -->
                                <a href="#" class="btn btn-danger btn-sm"
                                   onclick="if(confirm('Are you sure?')) {
                                       window.location.href='{{ route('appointment-thankyou.delete', $item->id) }}';
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
                <p><strong>Sub Title:</strong> <span id="sub_title"></span></p>
                <p><strong>Sub Title Color:</strong> <span id="sub_title_color"></span></p>
                <hr>
                <p><strong>Short Description:</strong> <span id="sortdescription"></span></p>
                <hr>
                <p><strong>Description 1:</strong> <span id="description1"></span></p>
                <p><strong>Visible 1:</strong> <span id="des_is_visible1"></span></p>
                <p><strong>Description 2:</strong> <span id="description2"></span></p>
                <p><strong>Visible 2:</strong> <span id="des_is_visible2"></span></p>
                <p><strong>Description 3:</strong> <span id="description3"></span></p>
                <p><strong>Visible 3:</strong> <span id="des_is_visible3"></span></p>
                <hr>
                <p><strong>Join Title:</strong> <span id="join_title"></span></p>
                <p><strong>Join Subtitle:</strong> <span id="join_subtitle"></span></p>
                <hr>
                <p><strong>CTA Text:</strong> <span id="cta_text"></span></p>
                <p><strong>CTA Page:</strong> <span id="cta_page_id"></span></p>
                <hr>
                <p><strong>CTA BG Color:</strong> <span id="cta_bg_color"></span></p>
                <p><strong>CTA Text Color:</strong> <span id="cta_text_color"></span></p>
                <hr>
                <p><strong>Assets Title:</strong> <span id="assets_title"></span></p>
                <p><strong>Social Media Visible:</strong> <span id="sm_visible"></span></p>
                <p><strong>Newsletter Visible:</strong> <span id="nf_visible"></span></p>
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
        $('#booking-calender-table').DataTable({
            paging: true,
            order: [[0, 'desc']]
        });
    });
     // update file status
    function setsmStatus(thiss,id) {
        var status = thiss.checked ? 1 : 0;
        $.ajax({
            type: "GET",
            cache: false,
            url: "{{url('appointment-thankyou/sm-status')}}/"+id+'/'+status,
            success: function (response) {
                $('.fd_success_btn').click();
            }
        });
    }
     // update file status
    function setnfStatus(thiss,id) {
        var status = thiss.checked ? 1 : 0;
        $.ajax({
            type: "GET",
            cache: false,
            url: "{{url('appointment-thankyou/nf-status')}}/"+id+'/'+status,
            success: function (response) {
                $('.fd_success_btn').click();
            }
        });
    }
    // view details
    function viewDetails(data){

    document.getElementById('sub_title').innerHTML = data.sub_title ?? '';
    document.getElementById('sub_title_color').innerHTML = data.sub_title_color ?? '';

    document.getElementById('sortdescription').innerHTML = data.sortdescription ?? '';

    document.getElementById('description1').innerHTML = data.description1 ?? '';
    document.getElementById('des_is_visible1').innerHTML = data.des_is_visible1 == 1 ? 'Yes' : 'No';

    document.getElementById('description2').innerHTML = data.description2 ?? '';
    document.getElementById('des_is_visible2').innerHTML = data.des_is_visible2 == 1 ? 'Yes' : 'No';

    document.getElementById('description3').innerHTML = data.description3 ?? '';
    document.getElementById('des_is_visible3').innerHTML = data.des_is_visible3 == 1 ? 'Yes' : 'No';

    document.getElementById('join_title').innerHTML = data.join_title ?? '';
    document.getElementById('join_subtitle').innerHTML = data.join_subtitle ?? '';

    document.getElementById('cta_text').innerHTML = data.cta_text ?? '';
    document.getElementById('cta_page_id').innerHTML = data.cta_page_name ?? data.cta_page_id ?? '';

    document.getElementById('cta_bg_color').innerHTML = data.header_footer_cta_bg_color ?? '';
    document.getElementById('cta_text_color').innerHTML = data.header_footer_cta_text_color ?? '';

    document.getElementById('assets_title').innerHTML = data.assets_title ?? '';

    document.getElementById('sm_visible').innerHTML = data.sm_visible == 1 ? 'Yes' : 'No';
    document.getElementById('nf_visible').innerHTML = data.nf_visible == 1 ? 'Yes' : 'No';

    document.getElementById('status').innerHTML = data.status == 1 ? 'Active' : 'Inactive';

    // 🔥 Open modal
        $('#detailsModal_btn').click();
    }
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