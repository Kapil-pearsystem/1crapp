@include('front.layouts.user-header')

<style>
.binng_araes.my_proffs .al_frm_bx .bith_frmss .ons_frmss input.inp_araea {
    font-size: 14px;
    padding: 0 5px;
}
</style>
 <section class="tital_mg_cntss">
 <img src="{{ url('home/img/top_al_pgss.png')}}" class="bg_al_cntxt" alt="" />
  <div class="midils_contnts">
   <div class="medilss"><h4>Updates</h4>
    <a href="{{ url('') }}">Home</a> &gt; <span>Updates</span>
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
                    <div class="binng_araes nto_lisstts">
                        <h4>Updates</h4>
                        @foreach($notifications as $notification)
                        <div class="notif_liststs" id="notification_{{ $notification->id }}">
                            <div class="noti_ico"><i class="fa {{ $notification->icon }}" aria-hidden="true"></i>
                            </div>
                                <div class="noti_txtx">
                                    <h5>{{ $notification->title }}<span class="ml-4 text-info"><i class="fa fa-calendar-o "></i> 12 jan 2002</span> <span class="badge badge-secondary bg-primary">{{ $notification->category }}</span> <span class="dlt_iconns" onclick="ReadNotification(this, '{{ $notification->id }}')"><i class="fa fa-trash"></i></span></h5>
                                    <p>{{ $notification->description }}</p>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
			</div>
		</div>
	</section>
@include('front.layouts.footer')
<script>
	function copyReferralLink() {
		// alert('hello')
    // Get the referral link input element
    var copyText = document.getElementById("referral_link");

    // Copy the text inside the input to the clipboard using the clipboard API
    navigator.clipboard.writeText(copyText.value).then(function() {
        // Change button text and color after copying
        var copyButton = document.getElementById("copyButton");
        copyButton.textContent = "Copied!";
        copyButton.style.backgroundColor = "green";
        copyButton.style.color = "white";

        // Optional: Reset button text and color after 3 seconds

    }).catch(function(error) {
        console.error("Failed to copy text: ", error);
    });
}

</script>
<script>
    function ReadNotification(noti, noti_id) {
        $.ajax({
            url: "{{ route('notification.read') }}",
            type: "POST",
            data: {
                notification_id: noti_id,
                _token: "{{ csrf_token() }}"
            },
            success: function(response) {
                if (response.success) {
                    $('#notification_' + noti_id).animate(
                        {
                            right: '-100%'
                        },
                        500,
                        function() {
                            $(this).remove();
                        }
                    );
                    // alert(response.message);
                } else {
                    alert("Something went wrong!");
                }
            },
            error: function(xhr, status, error) {
                console.error("Error:", error);
                alert("Failed to mark the notification as read. Please try again.");
            }
        });
    }
</script>
