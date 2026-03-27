@include('front.layouts.user-header')
@php
    $referralLink = route('register') . '?referral_code=' . Auth::user()->memberid;
@endphp

	<section class="dash_board_pages mt">
		<div class="container">
			<div class="row">
				<div class="col-lg-3">
                    @include('dashboard.includes.sidebar')
				</div>
				<div class="col-lg-9">
                    <div class="binng_araes earn_area">
                        <div class="earn_bx">
                            <h4>Create a new income stream for yourself</h4>
                            <p>Give your network access to the best property tools and help your network <span>make informed property decisions and you get paid in the process</span></p>
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="earn_bxx">
                                        <img src="{{ url('home/img/join_bx.png')}}" alt="" />
                                        <span class="cntss_araea">Join</span>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="earn_bxx">
                                        <img src="{{ url('home/img/promote_bx.png')}}" alt="" />
                                        <span class="cntss_araea">Promote</span>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="earn_bxx">
                                        <img src="{{ url('home/img/earn_bx.png')}}" alt="" />
                                        <span class="cntss_araea">Earn</span>
                                    </div>
                                </div>
                            </div>
                            <div class="lnk_s_bntt">
                                <a href="javascript:void(0);" class="bntss blue_bg">Generate affiliate link</a>
                            </div>
                        </div>
                        <div class="share_araea">
                            <h4>Share your your link</h4>
                            <ul>
                                <li>
                                    <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode($referralLink) }}" target="_blank">
                                        <img src="{{ url('home/img/facebook.png')}}" alt="Facebook" />
                                    </a>
                                </li>
                                <li>
                                    <a href="https://twitter.com/intent/tweet?url={{ urlencode($referralLink) }}&text=Join%20me%20on%20this%20awesome%20platform!" target="_blank">
                                        <img src="{{ url('home/img/twitter.png')}}" alt="Twitter" />
                                    </a>
                                </li>
                                <li>
                                    <a href="https://api.whatsapp.com/send?text={{ urlencode($referralLink) }}" target="_blank">
                                        <img src="{{ url('home/img/what-up.png')}}" alt="WhatsApp" />
                                    </a>
                                </li>
                                <li>
                                    <a href="https://www.facebook.com/dialog/send?link={{ urlencode($referralLink) }}&app_id=YOUR_FB_APP_ID&redirect_uri={{ urlencode($referralLink) }}" target="_blank">
                                        <img src="{{ url('home/img/messanger.png')}}" alt="Messenger" />
                                    </a>
                                </li>
                            </ul>
                            <div class="shr_linkss">
                                <input type="text" class="" placeholder="" id="referral_link" value="{{ $referralLink }}" />
                                <button id="copyButton" onclick="copyReferralLink()">Copy & share</button>
                            </div>
                        </div>
                        <div class="tbl_liststs earn_lists">
                            <div class="row">
                                <div class="col-lg-5">
                                    <h4>Affiliate transactions</h4>
                                </div>
                                <div class="col-lg-7">
                                    <div class="dt_both_area">
                                        <div class="datess"><span class="tx_datess">Start Date:-</span> <input type="text" class="datePickerDefault1" /> <span class="to">To</span> <input type="text" class="datePickerDefault2" /></div>
                                        <div class="demo_shwchs">
                                            <div class="chos_bntt">
                                                <span class="dm_moddlss">Demo mode</span>
                                                <input type="checkbox" class="toggle" id="toggle" />
                                                <label for="toggle">
                                                    <span class="on">No</span>
                                                    <span class="off">Yes</span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr class="blu_dkss">
                                            <th>Customer name</th>
                                            <th>Product details</th>
                                            <th>Date & time</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="greaa_bg">
                                            <td>Customer name</td>
                                            <td>Product name Price point Price</td>
                                            <td>Date time</td>
                                        </tr>
                                        <tr>
                                            <td>Ralph Edwards</td>
                                            <td><span class="onss">Clickdesigns Profes...</span> <span class="onss1">1 - Clickdesigns Profes...</span> <span class="onss2">₹2235.00</span></td>
                                            <td>21 Feb 2023 02:25 pm EST</td>
                                        </tr>
                                        <tr>
                                            <td>Marvin McKinney</td>
                                            <td><span class="onss">Clickdesigns Commerc...</span> <span class="onss1">1 - Clickdesigns Commerc...</span> <span class="onss2">₹1024.00</span></td>
                                            <td>21 Feb 2023 02:35 pm EST</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tbl_liststs earn_lists">
                            <div class="row">
                                <div class="col-lg-5">
                                    <h4>Affiliate transactions</h4>
                                </div>
                                <div class="col-lg-7">
                                    <div class="dt_both_area">
                                        <div class="datess"><span class="tx_datess">Start Date:-</span> <input type="text" class="datePickerDefault3" /> <span class="to">To</span> <input type="text" class="datePickerDefault4" /></div>
                                        <div class="demo_shwchs">
                                            <div class="chos_bntt">
                                                <span class="dm_moddlss">Demo mode</span>
                                                <input type="checkbox" class="toggle" id="toggle1" />
                                                <label for="toggle1">
                                                    <span class="on">No</span>
                                                    <span class="off">Yes</span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr class="blu_dkss">
                                            <th>Customer name</th>
                                            <th>Product details</th>
                                            <th>Date & time</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="greaa_bg">
                                            <td>Customer name</td>
                                            <td>Product name Price point Price</td>
                                            <td>Date time</td>
                                        </tr>
                                        <tr>
                                            <td>Ralph Edwards</td>
                                            <td><span class="onss">Clickdesigns Profes...</span> <span class="onss1">1 - Clickdesigns Profes...</span> <span class="onss2">₹2235.00</span></td>
                                            <td>21 Feb 2023 02:25 pm EST</td>
                                        </tr>
                                        <tr>
                                            <td>Marvin McKinney</td>
                                            <td><span class="onss">Clickdesigns Commerc...</span> <span class="onss1">1 - Clickdesigns Commerc...</span> <span class="onss2">₹1024.00</span></td>
                                            <td>21 Feb 2023 02:35 pm EST</td>
                                        </tr>
                                    </tbody>
                                </table>
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