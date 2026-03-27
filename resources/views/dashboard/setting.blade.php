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
   <div class="medilss"><h4>Settings</h4>
    <a href="{{ url('my-profile') }}">Home</a> &gt; <span>Settings</span>
   </div>
  </div>
</section>
	<section class="dash_board_pages mt">
		<div class="container">
			<div class="row">
				<div class="col-lg-3">
                    @include('dashboard.includes.sidebar')
				</div>

                <div class="col-12 col-sm-9">
                    <div class="row mb-4">
                        <div class="col-lg-12">
                            <div class="lsting_proprty purch_list_conts" id="alss_pgesss">
                                <h3>Settings</h3>

                            </div>

                            <div class="pur_rdo_listtss">
                                <h4>TAGS & LABELS</h4>
                                <p>Use tags and labels to help you organize your properties, track their status and quickly find them later.</p>
                                <div class="chk_list_araea">
                                 <div class="all_frm_list">

                                  <div class="rt_portss">
                                   <div class="cntss_bx">Manage Tags:</div>
                                   <div class="lnk_titalls lstts">
                                    <ul>
                                     <li><a href="javascript:void(0);"><i class="fa fa-tags"></i>&nbsp; Manage</a></li>
                                    </ul>
                                   </div>
                                  </div>
                                 </div>
                                </div>
                            </div>

                            <div class="pur_rdo_listtss">
                                <h4>REPORTS & BRANDING</h4>
                                <p>Configure the default report settings for new properties and add custom branding to your reports.</p>
                                <div class="chk_list_araea">
                                 <div class="all_frm_list">

                                  <div class="rt_portss">
                                   <div class="cntss_bx">Report Settings:</div>
                                   <div class="lnk_titalls lstts">
                                    <ul>
                                     <li><a href="javascript:void(0);"><i class="fa fa-tags"></i>&nbsp; Customize</a></li>
                                    </ul>
                                   </div>
                                  </div>
                                 </div>
                                </div>
                            </div>

                            <div class="pur_rdo_listtss">
                                <h4>PROPERTY TEMPLATES</h4>
                                <p>Customize and save property templates to help you quickly analyze new deals.</p>
                                <div class="chk_list_araea">
                                 <div class="all_frm_list">

                                  <div class="rt_portss">
                                   <div class="cntss_bx">Rentals:</div>
                                   <div class="lnk_titalls lstts">
                                    <ul>
                                     <li><a href="javascript:void(0);"><i class="fa fa-key"></i>&nbsp; Manage</a></li>
                                    </ul>
                                   </div>
                                  </div>

                                  <div class="rt_portss">
                                   <div class="cntss_bx">Buy & Sell:</div>
                                   <div class="lnk_titalls lstts">
                                    <ul>
                                     <li><a href="javascript:void(0);"><i class="fa fa-cubes"></i>&nbsp; Manage</a></li>
                                    </ul>
                                   </div>
                                  </div>

                                  <div class="rt_portss">
                                   <div class="cntss_bx">Buy & Hold:</div>
                                   <div class="lnk_titalls lstts">
                                    <ul>
                                     <li><a href="javascript:void(0);"><i class="fa fa-exclamation-circle"></i>&nbsp; Manage</a></li>
                                    </ul>
                                   </div>
                                  </div>

                                  <div class="rt_portss">
                                   <div class="cntss_bx">Buy, Refinance & Hold:</div>
                                   <div class="lnk_titalls lstts">
                                    <ul>
                                     <li><a href="javascript:void(0);"><i class="fa fa-circle-o-notch"></i>&nbsp; Manage</a></li>
                                    </ul>
                                   </div>
                                  </div>
                                 </div>
                                </div>
                            </div>

                            <div class="pur_rdo_listtss ">
                                <h4>DISPLAY PREFERENCES</h4>
                                <div class="chk_list_araea">
                                    <div class="all_frm_list">
                                <div class="choss_araes">
                                    <div class="lft_cntts">
                                        <p>Hide Live Chat Button</p>
                                        <span>Enable to hide the live chat button in the bottom right corner. You can still contact us from the help menu at the top of the page.</span>
                                    </div>

                                    <div class="chos_bntt">
                                       <div class="yeno_bx">
                                        <input type="checkbox" class="toggle" id="toggle2" />
                                        <label for="toggle2">
                                            <span class="on">No</span>
                                            <span class="off">Yes</span>
                                        </label>
                                       </div>
                                    </div>
                                </div>
                            </div>
                                </div>
                            </div>


                        </div>
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
