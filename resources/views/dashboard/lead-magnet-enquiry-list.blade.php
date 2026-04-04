@include('front.layouts.user-header')
@php 
use Carbon\Carbon;
$status = [
    0 => 'Rejected',
    1 => 'Pending',
    2 => 'In Progress',
    3 => 'Closed',
    4 => 'Not Related',
    5 => 'Accelerated'
];
$statusClass = [
    0 => 'danger',
    1 => 'warning',
    2 => 'info',
    3 => 'success',
    4 => 'secondary',
    5 => 'primary'
];
@endphp
<style>
    .message-box {
    position: relative;
}


.view-more {
    display: inline-block;
    margin-top: 4px;
    font-size: 12px;
    color: #2563eb;
    cursor: pointer;
}
.short-text {
    display: -webkit-box;
    -webkit-line-clamp: 2;  /* limit to 2 lines */
    -webkit-box-orient: vertical;
    overflow: hidden;
    white-space: normal;
}
</style>
<section class="tital_mg_cntss">
 <img src="{{ url('home/img/top_al_pgss.png')}}" class="bg_al_cntxt" alt="" />
  <div class="midils_contnts">
   <div class="medilss"><h4>Lead Magnet Enquiry</h4>
    <a href="{{ url('') }}">Home</a> &gt; <span>Lead Magnet Enquiry</span>
   </div>
  </div>
</section>
	<section class="dash_board_pages mt">
		<div class="container">
			<div class="row">
				<div class="col-lg-3">
                    @include('dashboard.includes.sidebar')
				</div>
                <div class="col-lg-9">
                <div class="binng_araes">
                    
                    
                    <div class="tbl_liststs">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h4 class="text-left"> Enquiry List ({{ $lists->total() }}) </h4>
                            <a href="{{ route('lead.export') }}" class="btn btn-primary float-right">Export</a>
                        </div>
                        
                    
                        <div class="table-responsive">
                            <table class="table table-striped ">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Message</th>
                                        <th>Next Steps</th>
                                        <th>Status</th>
                                        <th>Created Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                    
                                <tbody>
                                    @foreach($lists as $key => $list)
                                    <tr>
                                        <td>{{ $lists->firstItem() + $key }}</td>
                                        <td>{{ $list->name }}</td>
                                        <td>{{ $list->email }}</td>
                                        <td>{{ $list->phone }}</td>
                                        <td style="max-width:350px;">
    
                                            <div class="message-box">
    
                                                <span class="short-text">
                                                    {{ $list->message }}
                                                </span>

                                                @if(strlen($list->message) > 80)
                                                    <a href="javascript:void(0)" 
                                                    class="view-more"
                                                    onclick="viewMore(this)" 
                                                    data-message="{{ e($list->message) }}">
                                                    view more
                                                    </a>
                                                @endif

                                            </div>

                                        </td>
                                        <td>
                                            <select onchange="nextStep(this.value ,{{ $list->id }})" class="form-control">
                                                <option value="" selected="selected" disabled="disabled">Take Action</option> 
                                                <option value="1">Send Link via Email</option> 
                                                <option value="2">Send Link On Whatsapp</option>
                                            </select>
                                        </td>
                                        <td>
                                            <span class="badge bg-{{ $statusClass[$list->status] ?? 'secondary' }}" onclick="changeStatus('{{ $list->id }}','{{ $list->status }}')" style="cursor:pointer;">
                                                {{ $status[$list->status] ?? 'Unknown' }}
                                            </span>
                                        </td>
                                        <td>{{ date('d M, Y', strtotime($list->created_at)) }}</td>
                                        <td class="d-flex gap-2 align-items-center">
                                            <a href="javascript:void(0)" onclick='viewDetails(@json($list))'><i class="fa fa-eye text-primary"></i></a>&ensp;
                                            <a href="javascript:void(0)" onclick='editEnquiry(@json($list))'><i class="fa fa-edit text-info"></i></a>&ensp;
                                            <a href="javascript:void(0)" onclick="deleteEnquiry('{{ $list->id }}')" data-id="{{ $list->id }}"><i class="fa fa-trash text-danger"></i></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    
                        {{-- Pagination --}}
                        <div class="d-flex justify-content-center mt-3">
                            {{ $lists->links() }}
                        </div>
                    </div>
                </div>
            </div>
			</div>
		</div>
	</section>
    <div id="messageModal" class="closeModalClass"
        style="display:none; position:fixed; top:0; left:0; width:100%; height:100%; background:rgba(0,0,0,0.5); z-index:99999; justify-content:center; align-items:center;">

        <div style="background:#fff; padding:20px; width:400px; border-radius:10px; position:relative;">

            <span onclick="closePopupModal()" 
                style="position:absolute; right:10px; top:10px; cursor:pointer; font-size:18px;">✖</span>

            <h3 style="margin-bottom:10px; color:#000;">Message</h3>

            <p id="fullMessage" style="white-space: pre-line;"></p>

        </div>
    </div>
    <div id="viewDetailsModal" class="closeModalClass"
        style="display:none; position:fixed; top:0; left:0; width:100%; height:100%; background:rgba(0,0,0,0.5); z-index:99999; justify-content:center; align-items:center;">

        <div style="background:#fff; padding:20px; width:400px; border-radius:10px; position:relative; border:2px solid #0e3992;">
            <div style="display:flex; justify-content:space-between; align-items:center;">
                <h3 style="margin-bottom:10px; color:#000;">View Details</h3>
                <span onclick="closePopupModal()" style="position:absolute; right:10px; top:10px; cursor:pointer; font-size:18px;">✖</span>
            </div>
            <hr>
            <div class="details-content">
                <p><strong>Name:</strong> <span id="detailName"></span></p>
                <p><strong>Email:</strong> <span id="detailEmail"></span></p>
            </div>

        </div>
    </div>
    <div id="editDetailsModal" class="closeModalClass"
        style="display:none; position:fixed; top:0; left:0; width:100%; height:100%; background:rgba(0,0,0,0.5); z-index:99999; justify-content:center; align-items:center;">

        <div style="background:#fff; padding:20px; width:400px; border-radius:10px; position:relative; border:2px solid #0e3992;">
            <div style="display:flex; justify-content:space-between; align-items:center;">
                <h3 style="margin-bottom:10px; color:#000;">Edit Details</h3>
                <span onclick="closePopupModal()" style="position:absolute; right:10px; top:10px; cursor:pointer; font-size:18px;">✖</span>
            </div>
            <hr>
            <div>
                <form action="{{ route('lead.update') }}" method="post">
                    @csrf
                    <input type="hidden" id="editId" name="id">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="name" id="editName" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="email" id="editEmail" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Phone</label>
                        <input type="text" name="phone" id="editPhone" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Message</label>
                        <textarea name="message" id="editMessage" class="form-control" rows="5"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary mt-2">Update</button>

                </form>
            </div>

        </div>
    </div>
    <div id="statusModal"  class="closeModalClass"
        style="display:none; position:fixed; top:0; left:0; width:100%; height:100%; background:rgba(0,0,0,0.5); z-index:99999; justify-content:center; align-items:center;">

        <div style="background:#fff; padding:20px; width:350px; border-radius:10px; position:relative; text-align:center; border:2px solid #0e3992;">

            
            <div style="display:flex; justify-content:space-between; align-items:center;">
                <h3 style="margin-bottom:10px; color:#000;">Change Status</h3>
                <span onclick="closePopupModal()" style="position:absolute; right:10px; top:10px; cursor:pointer; font-size:18px;">✖</span>
            </div>
            <hr>

            <select id="statusDropdown" style="width:100%; padding:8px; margin-bottom:15px;">
                <option value="0">Rejected</option>
                <option value="1">Pending</option>
                <option value="2">In Progress</option>
                <option value="3">Closed</option>
                <option value="4">Not Related</option>
                <option value="5">Accelerated</option>
            </select>

            <button onclick="submitStatus()" 
                    style="background:#2563eb; color:#fff; padding:8px 15px; border:none; border-radius:5px;">
                Update
            </button>

        </div>
    </div>
    <div id="Step1Modal"  class="closeModalClass"
        style="display:none; position:fixed; top:0; left:0; width:100%; height:100%; background:rgba(0,0,0,0.5); z-index:99999; justify-content:center; align-items:center;">

        <div style="background:#fff; padding:20px; border-radius:10px; position:relative; text-align:center; border:2px solid #0e3992;">

            
            <div style="display:flex; justify-content:space-between; align-items:center;">
                <h3 style="margin-bottom:10px; color:#000;">Preview Mail</h3>
                <span onclick="closePopupModal()" style="position:absolute; right:10px; top:10px; cursor:pointer; font-size:18px;">✖</span>
            </div>
            <hr>
            <div id="mail-preview" style="text-align:left; margin-bottom:15px; color:#333; max-height:300px; overflow-y: auto;">
                <!-- Mail preview will be loaded here -->

            </div>
            <form id="sendLinkForm" action="{{ route('lead.resend-mail') }}" method="post">
                @csrf
                <input type="hidden" name="id" id="linkLeadId">
                <button type="submit" 
                        style="background:#2563eb; color:#fff; padding:8px 15px; border:none; border-radius:5px;">
                    Send
                </button>
            </form>

        </div>
    </div>
    <div id="Step2Modal"  class="closeModalClass"
        style="display:none; position:fixed; top:0; left:0; width:100%; height:100%; background:rgba(0,0,0,0.5); z-index:99999; justify-content:center; align-items:center;">

        <div style="background:#fff; width:500px; padding:20px; border-radius:10px; position:relative; border:2px solid #0e3992;">

            
            <div style="display:flex; justify-content:space-between; align-items:center;">
                <h3 style="margin-bottom:10px; color:#000;">Send Link On Whatsapp</h3>
                <span onclick="closePopupModal()" style="position:absolute; right:10px; top:10px; cursor:pointer; font-size:18px;">✖</span>
            </div>
            <hr>
            
            <form action="#" id="whatsappForm" method="post" onsubmit="return getWhatsappLink()" name="wf1">
                @csrf
                <input type="hidden" id="whatsappLeadId" name="id" value="">
               
                <div class="form-group">
                    <label for="media_type">Enter Url</label>
                    <input type="url" id="success_destination" placeholder="Enter URL" name="success_destination" class="form-control form-control-user" required>
                </div>
                <div class="form-group">
                    <label for="message">Enter Message</label>
                    <textarea name="message" id="message" class="form-control" placeholder="Enter Message" rows="4" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary mb-2">Get Link</button>
            </form>

        </div>
    </div>
    <div id="whatsappModal"  class="closeModalClass"
        style="display:none; position:fixed; top:0; left:0; width:100%; height:100%; background:rgba(0,0,0,0.5); z-index:99999; justify-content:center; align-items:center;">

        <div style="background:#fff; width:500px; padding:20px; border-radius:10px; position:relative; border:2px solid #0e3992;">

            
            <div style="display:flex; justify-content:space-between; align-items:center;">
                <h3 style="margin-bottom:10px; color:#000;">Send Link On Whatsapp</h3>
                <span onclick="closePopupModal()" style="position:absolute; right:10px; top:10px; cursor:pointer; font-size:18px;">✖</span>
            </div>
            <hr>
            <div class="whatsapp_data"></div>
        </div>
    </div>
@include('front.layouts.footer')
<script>
function viewMore(el) {
    let message = el.getAttribute('data-message');

    document.getElementById('fullMessage').innerText = message;
    document.getElementById('messageModal').style.display = 'flex';
}

function closePopupModal() {
    document.querySelectorAll('.closeModalClass').forEach(el => {
        el.style.display = 'none';
    });
}

// Optional: close on outside click
document.getElementById('messageModal').addEventListener('click', function(e) {
    if (e.target === this) {
        closePopupModal();
    }
});

function viewDetails(list) {
    var content = `
        <p><strong>Name:</strong> ${list.name}</p>
        <p><strong>Email:</strong> ${list.email}</p>
    `;
    if(list.phone) {
        content += `<p><strong>Phone:</strong> ${list.phone}</p>`;
    }
    if(list.message) {
        content += `<p><strong>Message:</strong><br>${list.message.replace(/\n/g, '<br>')}</p>`;
    }
    document.getElementsByClassName('details-content')[0].innerHTML = content;
    document.getElementById('viewDetailsModal').style.display = 'flex';
}

function editEnquiry(list) {
    // Example: fill form
    document.getElementById('editId').value = list.id ?? '';
    document.getElementById('editName').value = list.name ?? '';
    document.getElementById('editEmail').value = list.email ?? '';
    document.getElementById('editPhone').value = list.phone ?? '';
    document.getElementById('editMessage').value = list.message ?? '';
    // open modal
    document.getElementById('editDetailsModal').style.display = 'flex';
}
function deleteEnquiry(id) {
    if(confirm('Are you sure you want to delete this enquiry?')) {
        var url = "{{ url('/lead/delete') }}/" + id;
        window.location.href = url;
    }
}
let selectedId = null;

function changeStatus(id, currentStatus) {
    selectedId = id;

    // Set current value
    document.getElementById('statusDropdown').value = currentStatus;

    // Open modal
    document.getElementById('statusModal').style.display = 'flex';
}

function closeStatusModal() {
    document.getElementById('statusModal').style.display = 'none';
}

function submitStatus() {

    let newStatus = document.getElementById('statusDropdown').value;

    if(newStatus === '') {
        alert('Please select status');
        return;
    }

    var url = "{{ route('lead.update-status') }}";

    var formData = new FormData();
    formData.append('id', selectedId);
    formData.append('status', newStatus);
    formData.append('_token', '{{ csrf_token() }}');

    fetch(url, {
        method: 'POST',
        body: formData,
        dataType: 'json',
    })
    .then(res => res.json())
    .then(data => {
        if(data.success) {
            closeStatusModal();
            alert('Status updated successfully!');
            location.reload();
        } else {
            alert('Failed to update status.');
        }
    })
    .catch(err => {
        console.error(err);
        alert('Error occurred');
    });
}

function nextStep(stepValue, id){
    
    selectedId = id;

    if(stepValue === '') {
        alert('Please select an action');
        return;
    }
    if(!selectedId) {
        alert('Invalid selection');
        return;
    }
    if(stepValue == '1') {
        previewMail(id);
        $('#linkLeadId').val(selectedId);
        document.getElementById('Step1Modal').style.display = 'flex';
    } else if(stepValue == '2') {
        document.getElementById('whatsappForm').reset();
        document.getElementById('whatsappLeadId').value = selectedId;
        document.getElementById('Step2Modal').style.display = 'flex';
    }
}
function previewMail(id){
    // alert(status);
    $.ajax({
        url: "{{ route('lead.mail-preview') }}", // Define the correct route
        type: 'POST',
        data: {
            _token: '{{ csrf_token() }}',
            id: id,
            status: status
        },
        success: function (response) {
            if(response.success) {
                $('#mail-preview').html(response.data);
            } else {
                $('#mail-preview').html(response.data);
            }
            // alert(response.message); // Success message or perform some action
        },
        error: function (xhr) {
            alert('Something went wrong!');
        }
    });
}
function getWhatsappLink(){
    var id = document.wf1.id.value;
    var link = document.wf1.success_destination.value;
    var message = document.wf1.message.value;
    $.ajax({
        url: "{{ route('lead.get-whatsapp-link') }}",
        type: 'POST',
        data: {
            _token: '{{ csrf_token() }}',
            message: message,
            link: link,
            id: id,
        },
        success: function (response) {
            if(response.status == true){
                document.getElementById('whatsappModal').style.display = 'flex';
                $('.whatsapp_data').html(response.data);
            }else{
                document.getElementById('whatsappModal').style.display = 'flex';
                $('.whatsapp_data').html(response.msg);
            }
        },
        error: function (xhr) {
            alert('Something went wrong!');
        }
    });
    return false;
}
</script>