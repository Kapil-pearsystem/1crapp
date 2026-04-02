@include('front.layouts.user-header')
@php 
use Carbon\Carbon;
@endphp
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
                        <h4>
                            Enquiry List for Lead Magnet Pages
                        </h4>
                    
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>S.No.</th>
                                        <th>Page</th>
                                        <th>Form</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Message</th>
                                        <th>Date</th>
                                    </tr>
                                </thead>
                    
                                <tbody>
                                    @foreach($lists as $key => $list)
                                    <tr>
                                        <td>{{ $lists->firstItem() + $key }}</td>
                                        <td>{{ ucfirst($list->page_name) }}</td>
                                        <td>{{ $list->form_name }}</td>
                                        <td>{{ $list->name }}</td>
                                        <td>{{ $list->email }}</td>
                                        <td>{{ $list->phone }}</td>
                                        <td>
                                            {!! \Illuminate\Support\Str::limit(
                                                e($list->message), 
                                                50, 
                                                '... <a href="javascript:void(0)" onclick="viewMore(this)" data-message="'.e($list->message).'">view more</a>'
                                            ) !!}
                                        </td>
                                        <td>{{ date('d M, Y', strtotime($list->created_at)) }}</td>
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
    <div id="messageModal"
        style="display:none; position:fixed; top:0; left:0; width:100%; height:100%; background:rgba(0,0,0,0.5); z-index:99999; justify-content:center; align-items:center;">

        <div style="background:#fff; padding:20px; width:400px; border-radius:10px; position:relative;">

            <span onclick="closeModal()" 
                style="position:absolute; right:10px; top:10px; cursor:pointer; font-size:18px;">✖</span>

            <h3 style="margin-bottom:10px; color:#000;">Message</h3>

            <p id="fullMessage" style="white-space: pre-line;"></p>

        </div>
    </div>
@include('front.layouts.footer')
<script>
function viewMore(el) {
    let message = el.getAttribute('data-message');

    document.getElementById('fullMessage').innerText = message;
    document.getElementById('messageModal').style.display = 'flex';
}

function closeModal() {
    document.getElementById('messageModal').style.display = 'none';
}

// Optional: close on outside click
document.getElementById('messageModal').addEventListener('click', function(e) {
    if (e.target === this) {
        closeModal();
    }
});
</script>