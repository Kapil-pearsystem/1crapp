@include('front.layouts.user-header')
@php 
use Carbon\Carbon;
@endphp
	<section class="dash_board_pages mt">
		<div class="container">
			<div class="row">
				<div class="col-lg-3">
                    @include('dashboard.includes.sidebar')
				</div>
                <div class="col-lg-9">
                <div class="binng_araes">
                    <div class="bl_hedignss">
                        your free subscription trial is almost over.
                    </div>
                    <div class="crent_lt_ares">
                        <h3>Currently you anr on free account with limited features</h3>
                        <div class="crt_liststs">
                            <ul>
                               @if(!empty($active_features) && $active_features->count() > 0)

                                    @foreach($active_features as $feature)
                                
                                        @php
                                            $formattedPermission = str_replace(['/', '-'], [' >> ', ' '], $feature->permission);
                                            $formattedPermission = ucwords($formattedPermission);
                                        @endphp
                                
                                        <li>
                                            <img src="{{ url('home/img/ticck.png') }}" alt="" />
                                            {{ $formattedPermission }}
                                        </li>
                                
                                    @endforeach
                                
                                @else
                                
                                    <li><img src="{{ url('home/img/ticck.png') }}" alt="" /> Unlimited Projects & Tasks</li>
                                    <li><img src="{{ url('home/img/ticck.png') }}" alt="" /> Unlimited Contacts</li>
                                    <li><img src="{{ url('home/img/ticck.png') }}" alt="" /> CRM Automation</li>
                                    <li><img src="{{ url('home/img/ticck.png') }}" alt="" /> 1 Project Template</li>
                                    <li><img src="{{ url('home/img/ticck.png') }}" alt="" /> Invoicing & Online Payments</li>
                                    <li><img src="{{ url('home/img/ticck.png') }}" alt="" /> Expense Tracking</li>
                                    <li><img src="{{ url('home/img/ticck.png') }}" alt="" /> Purchase Offer Calculator</li>
                                    <li><img src="{{ url('home/img/ticck.png') }}" alt="" /> 1 Knowledge Base</li>
                                
                                @endif
                            </ul>
                        </div>
                        <div class="lnk_s_bntt">
                            <a href="{{ route('price') }}" class="bntss">Try premium features free</a>
                            <p>
                                Upgrade your plan to analyze unlimited properties, calculate offer prices and create
                                <span>branded PDF reports. <a href="{{ route('price') }}">Click here</a> to view available upgrade options.</span>
                            </p>
                        </div>
                    </div>
                    <!--<div class="crent_lt_ares">-->
                    <!--    <div class="accordion" id="accordionExample">-->
                    <!--        <div class="accordion-item">-->
                    <!--            <h2 class="accordion-header" id="headingOne">-->
                    <!--                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">Starter <i class="fa fa-angle-down"></i></button>-->
                    <!--            </h2>-->
                    <!--            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">-->
                    <!--                <div class="accordion-body">-->
                    <!--                    <div class="crt_liststs threer">-->
                    <!--                        <ul>-->
                    <!--                            <li><img src="{{ url('home/img/ticck.png')}}" alt="" /> Up to 15 Saved Properties</li>-->
                    <!--                            <li><img src="{{ url('home/img/ticck.png')}}" alt="" /> Up to 5 Property Photos</li>-->
                    <!--                            <li><img src="{{ url('home/img/ticck.png')}}" alt="" /> Up to 5 Sales & Rental Comps</li>-->
                    <!--                            <li><img src="{{ url('home/img/ticck.png')}}" alt="" /> Up to 5 Property Templates</li>-->
                    <!--                            <li><img src="{{ url('home/img/crosss.png')}}" alt="" /> View Updated Property Records & Listings</li>-->
                    <!--                            <li><img src="{{ url('home/img/crosss.png')}}" alt="" /> Purchase Offer Calculator</li>-->
                    <!--                            <li><img src="{{ url('home/img/crosss.png')}}" alt="" /> Unlock All Purchase Criteria</li>-->
                    <!--                            <li><img src="{{ url('home/img/crosss.png')}}" alt="" /> Customize Sales & Rental Comps</li>-->
                    <!--                            <li><img src="{{ url('home/img/crosss.png')}}" alt="" /> Property Owner Lookup</li>-->
                    <!--                            <li><img src="{{ url('home/img/crosss.png')}}" alt="" /> Property Reports with Custom Branding</li>-->
                    <!--                        </ul>-->
                    <!--                    </div>-->
                    <!--                </div>-->
                    <!--            </div>-->
                    <!--        </div>-->
                    <!--    </div>-->
                    <!--    <div class="lnk_s_bntt">-->
                    <!--        <a href="javascript:void(0);" class="bntss">Try premium features free</a>-->
                    <!--    </div>-->
                    @if(!is_null($agent_details))
                    <hr>
                    <div class="crent_lt_ares">
                        
                        <div class="lnk_s_bntt">
                            @php
                            $domain = $agent_details->custom_domain 
                                ? $agent_details->custom_domain 
                                : 'https://'.$agent_details->subdomain.'.1crapp.com/admin/login';
                            @endphp
                            <a href="{{ $domain }}" target="_blank" class="bntss bg-info">Login to Backend Dashboard</a>
                        </div>
                    </div>
                    @endif
                    <div class="tbl_liststs">
                        <h4>
                            Transition Details
                        </h4>
                    
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>S.No.</th>
                                        <th>Product</th>
                                        <th>Plan</th>
                                        <th>Amount</th>
                                        <th>Date</th>
                                        <th>Ref.No</th>
                                        <th>Paid Via</th>
                                    </tr>
                                </thead>
                    
                                <tbody>
                                    @foreach($transacrions as $key => $tr_row)
                                    <tr>
                                        <td>{{ $transacrions->firstItem() + $key }}</td>
                                        <td>Customer Subscription Plan</td>
                                        <td>{{ $tr_row->plan_name }} ( {{ ucfirst($tr_row->plan_type_title) }} )</td>
                                        <td>₹{{ $tr_row->amount }}</td>
                                        <td>{{ date('d M, Y', strtotime($tr_row->created_at)) }}</td>
                                        <td>{{ $tr_row->txn_id }}</td>
                                        <td>{{ ucfirst($tr_row->payment_mode) }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                <hr>
                                <tbody>
                                    @foreach($adb_transacrions as $key => $adbtr_row)
                                    <tr>
                                        <td>{{ $adb_transacrions->firstItem() + $key }}</td>
                                        <td>Agent Subscription Plan</td>
                                        <td>{{ $adbtr_row->plan_name }} ( {{ ucfirst($adbtr_row->plan_type_title) }} )</td>
                                        <td>₹{{ $adbtr_row->amount }}</td>
                                        <td>{{ date('d M, Y', strtotime($adbtr_row->created_at)) }}</td>
                                        <td>{{ $adbtr_row->r_payment_id }}</td>
                                        <td>{{ ucfirst($adbtr_row->method) }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    
                        {{-- Pagination --}}
                        <div class="d-flex justify-content-center mt-3">
                            {{ $transacrions->links() }}
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