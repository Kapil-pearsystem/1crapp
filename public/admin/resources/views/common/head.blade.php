<head>



    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <meta name="description" content="">

    <meta name="author" content="">



    <!-- CSRF Token -->

    <meta name="csrf-token" content="{{ csrf_token() }}">



    <title>1CR APP Admin</title>



    {{-- ICON --}}

    <link rel="shortcut icon" type="image/jpg" href="{{ asset('images/icon.png') }}"/>



    <!-- Font Awesome UI KIT-->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">


    <!-- <script src="https://kit.fontawesome.com/f75ab26951.js" crossorigin="anonymous"></script> -->



    <link

        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"

        rel="stylesheet">



    <!-- Custom styles for this template-->

    <link href="{{asset('css/app.css')}}" rel="stylesheet">

    <link href="{{asset('admin/css/sb-admin-2.min.css?v=8.1')}}" rel="stylesheet">

    <style>

    input.razorpay-payment-button {

    background: #337ab7;

    display: block;

    text-align: center;

    padding: 6px 0;

    color: #fff;

    border-radius: 35px;

    font-size: 14px;

    font-weight: 700;

    width: 100%;

    border: none;

}



.prc_box_listst .als_list_pricess {



    text-align: center;

}

.excelButton {

   background-color: #00d889 !important;

    color: #ffffff !important;

}

.feature-scroll {
    text-align: left;
    max-height: 220px;        /* Controls scroll height */
    overflow-y: auto;         /* Vertical scroll only */
    overflow-x: hidden;       /* Hide horizontal scroll */
    padding-right: 8px;
    margin-top: 10px;
}

.feature-scroll ul {
    padding-left: 0;
    list-style: none;
    margin-bottom: 0;
}

.feature-scroll li {
    font-size: 14px;
    margin-bottom: 8px;
    display: flex;
    align-items: center;
}

.feature-scroll li i {
    min-width: 18px;
}
.billing-toggle {
    display: inline-flex;
    border: 1px solid #4e73df;
    border-radius: 50px;
    overflow: hidden;
}

.toggle-btn {
    padding: 8px 20px;
    border: none;
    background: white;
    cursor: pointer;
    font-weight: 600;
}

.toggle-btn.active {
    background: #4e73df;
    color: white;
}


</style>



</head>



<div id="bi_view_dlts" class="modal fade all_pages_covrss" role="dialog">

    <div class="modal-dialog">

        <!-- Modal content-->

        <div class="modal-content">

            <div class="modal-header">

                <button type="button" class="close" data-dismiss="modal">&times;</button>

                <h4 class="modal-title">View Details</h4>

            </div>

            <div class="modal-body">

                              <div class="table-responsive">

                    <table class="table table-bordered" id="" width="100%" cellspacing="0">

                        <tbody id="plandetail">



                                <tr>

                                    <th>Product</th>

                                    <td>1CR</td>

                                </tr>



								<tr>

                                    <th>Amount</th>

                                    <td>₹. 1500</td>

                                </tr>

								<tr>

                                    <th>Date</th>

                                    <td>09-02-2024</td>

                                </tr>

								<tr>

                                    <th>Ref.No</th>

                                    <td>1CR-2023-066</td>

                                </tr>

								<tr>

                                    <th>Paid Via</th>

                                    <td>Phonepay</td>

                                </tr>

                        </tbody>

                    </table>

                </div>

            </div>

        </div>

    </div>

</div>
@php
	$subscription_plan = App\Models\SubscriptionPlan::where('status',1)->get();
	$plan_feature = App\Models\PlanFeature::get();
@endphp
<div id="price_listst" class="modal fade all_pages_covrss" role="dialog">
	<div class="modal-dialog modal-lg">
		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Pricing Plans</h4>
			</div>
			<div class="modal-body">
			    <div class="text-center mb-4">
                    <div class="billing-toggle">
                        <button type="button" class="toggle-btn active" data-type="monthly">Monthly</button>
                        <button type="button" class="toggle-btn" data-type="yearly">Yearly</button>
                    </div>
                </div>
				<div id="plan-list-data" class="prc_box_listst monthly">
					
					@foreach($subscription_plan as $list)
					<!---- List ----->
					<div class="als_list_pricess">
						<h4>{{ $list->title }}</h4>
						<p>{{ $list->sub_title }}</p>
						<h2>₹{{ $list->monthly_price }}/month</h2>
						<!--
					  <div class="str_bnt_area"><a href="javascript:void(0);">Start Free Trial</a></div>-->
						@if($list->monthly_price==0)
						<form action="{{ route('billing.buyfreeplan') }}" method="POST" class="str_bnt_area">
							@csrf
							<input type="hidden" name="description" value="{{ $list->title }}">
							<input type="hidden" name="plan_id" value="{{ $list->id }}">
							<input type="submit" value="Buy Now" class="razorpay-payment-button">
						</form>
						@else
						<form action="{{ route('billing.upgrade-agent-plan') }}" method="POST" class="str_bnt_area">
							@csrf
							<script src="https://checkout.razorpay.com/v1/checkout.js"
								data-key="{{ env('RAZORPAY_KEY') }}"
								data-amount="{{ $list->monthly_price * 100 }}"
								data-buttontext="Buy Now"
								data-name="1CRAPP"
								data-description="{{ $list->title }}||{{ $list->id }}"
								data-image="{{ url('admin/img/logo.png') }}"
								data-prefill.name="{{ Auth()->user()->first_name??''; }}"
								data-prefill.email="{{ Auth()->user()->email??''; }}"
								data-notes.plan="{{ $list->id }}"
                                data-notes.plan_type="monthly"
                                data-notes.agent_id="{{ $agent->id??'' }}"
								data-theme.color="#4e73df">
							</script>
						</form>
						@endif
						<div class="data_listst" style="text-align:left; max-height:450px; overflow-y:auto; overflow-x:hidden;">

							<ul>
								@php
								$featureset = explode(',',$list->features);
								@endphp
								@foreach($plan_feature as $list2)
								<li>
									@if(in_array($list2->id,$featureset))
									<i class="fa fa-check-circle" aria-hidden="true" style="color: green; padding-right: 5px;"></i>
									@else
									<i class="fa fa-times-circle" aria-hidden="true" style="color: red; padding-right: 5px;"></i>
									@endif
									{{ $list2->title }}
								</li>
								@endforeach
							</ul>
						</div>
					</div>
					<!---- End List ----->
					@endforeach
				</div>
				<div id="plan-list-data" class="prc_box_listst yearly">
					@foreach($subscription_plan as $list)
					<!---- List ----->
					<div class="als_list_pricess">
						<h4>{{ $list->title }}</h4>
						<p>{{ $list->sub_title }}</p>
						<h2>₹{{ $list->yearly_price }}/year</h2>
						<!--
					  <div class="str_bnt_area"><a href="javascript:void(0);">Start Free Trial</a></div>-->
						@if($list->monthly_price==0)
						<form action="{{ route('billing.buyfreeplan') }}" method="POST" class="str_bnt_area">
							@csrf
							<input type="hidden" name="description" value="{{ $list->title }}">
							<input type="hidden" name="plan_id" value="{{ $list->id }}">
							<input type="submit" value="Buy Now" class="razorpay-payment-button">
						</form>
						@else
						<form action="{{ route('billing.upgrade-agent-plan') }}" method="POST" class="str_bnt_area">
							@csrf
							<script src="https://checkout.razorpay.com/v1/checkout.js"
								data-key="{{ env('RAZORPAY_KEY') }}"
								data-amount="{{ $list->yearly_price * 100 }}"
								data-buttontext="Buy Now"
								data-name="1CRAPP"
								data-description="{{ $list->title }}||{{ $list->id }}"
								data-image="{{ url('admin/img/logo.png') }}"
								data-prefill.name="{{ Auth()->user()->first_name??''; }}"
								data-prefill.email="{{ Auth()->user()->email??''; }}"
								data-notes.plan="{{ $list->id }}"
                                data-notes.plan_type="yearly"
                                data-notes.agent_id="{{ $agent->id??'' }}"
								data-theme.color="#4e73df">
							</script>
						</form>
						@endif
						<div class="data_listst" style="text-align:left; max-height:450px; overflow-y:auto; overflow-x:hidden;">

							<ul>
								@php
								$featureset = explode(',',$list->features);
								@endphp
								@foreach($plan_feature as $list2)
								<li>
									@if(in_array($list2->id,$featureset))
									<i class="fa fa-check-circle" aria-hidden="true" style="color: green; padding-right: 5px;"></i>
									@else
									<i class="fa fa-times-circle" aria-hidden="true" style="color: red; padding-right: 5px;"></i>
									@endif
									{{ $list2->title }}
								</li>
								@endforeach
							</ul>
						</div>
					</div>
					<!---- End List ----->
					@endforeach
				</div>
			</div>
		</div>
	</div>
</div>





<div id="upgrade_md" class="modal fade all_pages_covrss" role="dialog">

    <div class="modal-dialog">

        <!-- Modal content-->

        <div class="modal-content">

            <div class="modal-header">

                <button type="button" class="close" data-dismiss="modal">&times;</button>

                <h4 class="modal-title">Subscription Update</h4>

            </div>

            <div class="modal-body">



			   <div class="form-group row">



					<div class="col-sm-12 mb-3 mb-sm-0">

                        <div class="pls_liststs"><strong>Premium Plan : </strong><span>Premium</span></div>

                        <div class="pls_liststs"><strong>Plan Amount : </strong><span>₹ 1000 Per Month</span></div>

                    </div>



					<div class="col-sm-12 mb-3 mt-3 mb-sm-0">

					 <div class="text-center">

						  <form action="{{ route('billing.upgrade') }}" method="POST" >

                            @csrf

                            <script src="https://checkout.razorpay.com/v1/checkout.js"

                                    data-key="{{ env('RAZORPAY_KEY') }}"

                                    data-amount="100000"

                                    data-buttontext="Pay Now"

                                    data-name="1CRAPP"

                                    data-description="Premium||3"

                                    data-image="{{ url('admin/img/logo.png') }}"

                                    data-prefill.name="{{ Auth()->user()->first_name??''; }}"

                                    data-prefill.email="{{ Auth()->user()->email??''; }}"

                                    data-notes.plan="3"

                                    data-theme.color="#4e73df">

                            </script>

                        </form>

					 </div>

					</div>

				</div>



            </div>

        </div>

    </div>

</div>







<div id="deletss" class="modal fade all_pages_covrss" role="dialog">

    <div class="modal-dialog">

        <!-- Modal content-->

        <div class="modal-content">

            <div class="modal-header">

                <button type="button" class="close" data-dismiss="modal">&times;</button>

                <h4 class="modal-title">Detail</h4>

            </div>

            <div class="modal-body text-center">

             <p>Are you sure do you want to delete</p>



			 <div class="text-center mt-4 mb-3">

                <button class="btn btn-danger" type="button" data-dismiss="modal">NO</button>

                <a class="btn btn-success" href="javascript:void(0);" onclick=""> YES </a>

             </div>

            </div>

        </div>

    </div>

</div>



<div id="marketstatus_success" class="modal fade " role="dialog">

    <div class="modal-dialog">

        <!-- Modal content-->

        <div class="modal-content">

            <div class="modal-header">

                 <h4 class="modal-title">Success</h4>

                <button type="button" class="close" data-dismiss="modal">&times;</button>



            </div>

            <div class="modal-body text-center">

             <p>Market Status Updated Successfully!</p>



			 <div class="text-center mt-4 mb-3">

                <button class="btn btn-primary" type="button" data-dismiss="modal">Close</button>

             </div>

            </div>

        </div>

    </div>

</div>
<script>
document.addEventListener("DOMContentLoaded", function () {

    const toggleButtons = document.querySelectorAll(".toggle-btn");
    const monthlySection = document.querySelector(".prc_box_listst.monthly");
    const yearlySection = document.querySelector(".prc_box_listst.yearly");

    // Default state
    monthlySection.style.display = "block";
    yearlySection.style.display = "none";

    toggleButtons.forEach(button => {
        button.addEventListener("click", function () {

            // Toggle active button
            toggleButtons.forEach(btn => btn.classList.remove("active"));
            this.classList.add("active");

            const type = this.getAttribute("data-type");

            if (type === "monthly") {
                monthlySection.style.display = "block";
                yearlySection.style.display = "none";
            } else {
                monthlySection.style.display = "none";
                yearlySection.style.display = "block";
            }

        });
    });

});
</script>








