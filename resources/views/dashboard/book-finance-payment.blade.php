<?php
// echo $propertyID;die;
// echo "<pre>".print_r($MainProperty, true);die;
$currency = '₹';
?>
<style>
	.part_boxx_areaa {box-shadow:0 .5rem 1rem rgba(0, 0, 0, .15) !important; background-color:#fff; border-radius:0px; display:inline-block; width:100%; padding:15px 15px 5px; margin-bottom:20px;}

	.part_boxx_areaa h2 {margin: 0 0 10px; font-size: 20px; font-weight: 500; color: #000; display: inline-block; width: 100%;}
	.part_boxx_areaa h2 span.link_partsss {float: right;}
	.part_boxx_areaa h2 span.link_partsss a {border:#007bff solid 1px; color:#007bff; padding:2px 15px; display:inline-block; font-size:12px; line-height:20px;
			border-radius:3px; margin-right:5px;}
	.part_boxx_areaa h2 span.link_partsss a.actpartss {background: #007bff; color: #fff;}
	.part_boxx_areaa h2 span.link_partsss a:last-child {margin-right: 0;}
	.part_boxx_areaa .brd_titless {font-size: 16px; font-weight: 500; margin-bottom: 7px; color: #1877f1;}
	.part_boxx_areaa .brd_titless span.n_prery {color: #000;}
	.part_boxx_areaa p.prp_text {text-transform: uppercase; margin: 0 0 5px; color: #1877f1; font-weight: 600;}
	.part_boxx_areaa .prp_textxt {font-size: 12px; display: inline-block;  width: 100%;  margin-top: 5px;}
	.part_boxx_areaa .prp_textxt a {font-size: 12px; color: #007bff;}
	.part_boxx_areaa .prp_textxt .titl_textxt {float: left;}
	.part_boxx_areaa .prp_textxt .set_vedioo {float: left;}
	.part_boxx_areaa .prp_textxt .set_vedioo img {width: 50px; position: relative; top: -4px; left: 10px;}
	.hd_res_listsss.bothsss_mng {display: inline-block; width: 100%;}
	.hd_res_listsss.bothsss_mng h2 {display: inline-block; margin: 10px 0 20px; line-height: 40px;}
	.hd_res_listsss.bothsss_mng span.set_vedioo {float: right;}
	.hd_res_listsss.bothsss_mng span.set_vedioo a {display: inline-block; text-align: right;}
	.hd_res_listsss.bothsss_mng span.set_vedioo a img {width: 75%;}

    #successModal .modal-lg {
      width: auto;
      max-width: fit-content;
    }

    .all_frm_list .form-group.managsss1 span.currencyInputprefix.percentOfSpan {
        position: absolute;
        right: 96px;
        font-size: 14px;
        background: #e2ebf7;
        border-radius: 9px 0px 0px 9px;
        padding: 10px 10px;
        margin-top: 1px;
    }

    .all_frm_list .form-group.managsss1 input.currencyInput.pecentOfInput {
        position: relative;
        right: -14px;
    }

    /*Yes No Button Design*/
    .ys_no li {
        cursor: pointer;
    }
    .yesNoButton input[type="checkbox"].toggle {
        opacity: 0;
        position: absolute;
        left: -99999px;
    }
    .yesNoButton input[type="checkbox"].toggle + label {
        height: 40px;
        line-height: 40px;
        background-color: red;
        padding: 0px 16px;
        border-radius: 60px;
        display: inline-block;
        position: relative;
        cursor: pointer;
        -moz-transition: all 0.25s ease-in;
        -o-transition: all 0.25s ease-in;
        -webkit-transition: all 0.25s ease-in;
        transition: all 0.25s ease-in;
        -moz-box-shadow: inset 0px 0px 2px rgba(0, 0, 0, 0.5);
        -webkit-box-shadow: inset 0px 0px 2px rgba(0, 0, 0, 0.5);
        box-shadow: inset 0px 0px 2px rgba(0, 0, 0, 0.5);
    }
.yesNoButton input[type="checkbox"].toggle + label:before, input[type="checkbox"].toggle + label:hover:before {
  content: ' ';
  position: absolute;
  top: 2px;
  left: 2px;
  width: 46px;
  height: 36px;
  background: #fff;
  z-index: 2;
  -moz-transition: all 0.25s ease-in;
  -o-transition: all 0.25s ease-in;
  -webkit-transition: all 0.25s ease-in;
  transition: all 0.25s ease-in;
  -moz-border-radius: 50px;
  -webkit-border-radius: 50px;
  border-radius: 50px;
}
.yesNoButton input[type="checkbox"].toggle + label .off, .yesNoButton input[type="checkbox"].toggle + label .on {
  color: #fff;
}
.yesNoButton input[type="checkbox"].toggle + label .off {
  margin-left: 46px;
  display: inline-block;
}
.yesNoButton input[type="checkbox"].toggle + label .on {
  display: none;
}
.yesNoButton input[type="checkbox"].toggle:checked + label .off {
  display: none;
}
.yesNoButton input[type="checkbox"].toggle:checked + label .on {
  margin-right: 46px;
  display: inline-block;
}
.yesNoButton input[type="checkbox"].toggle:checked + label, .yesNoButton input[type="checkbox"].toggle:focus:checked + label {
    background-color: #4a83cc;
}
.yesNoButton input[type="checkbox"].toggle:checked + label:before, .yesNoButton input[type="checkbox"].toggle:checked + label:hover:before, .yesNoButton input[type="checkbox"].toggle:focus:checked + label:before, .yesNoButton input[type="checkbox"].toggle:focus:checked + label:hover:before {
  background-position: 0 0;
  top: 2px;
  left: 100%;
  margin-left: -48px;
}
</style>
@include('front.layouts.header')



<!-- Modal -->
<div class="modal fade" id="videotutorialmodal" tabindex="-1" role="dialog" aria-labelledby="videotutorialmodalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document" style="max-width: 720px; width: 640px;">
    <div class="modal-content all_frm_list" style="max-width: 700px;">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="font-size: 30px;">
          <span aria-hidden="true">&times;</span>
        </button>
        <iframe width="560" height="315" src="https://www.youtube.com/embed/mJVuZiK9a6I?si=tWOM4Nh4-zGMGVP1" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
    </div>
  </div>
</div>


<!--PEN HEADER-->
<div class="container mt-5">
    <div class="row mt-4">

        @if (request()->is('properties/new-property/*'))
            @include('front.layouts.sidebar')
        @elseif (request()->is('properties/edit/*'))
            @include('front.layouts.detail-sidebar')
        @endif

        <!--start full details -->
        <div class="col-12 col-sm-9">
            @if (request()->is('properties/new-property/*'))
						    <div class="part_boxx_areaa">
                <h2>New Buy And Sale Property
                    <span class="link_partsss">
                        <a href="javascript:void(0);" onclick="document.referrer ? window.location.href = document.referrer : alert('No previous page found!')">Start Over Again</a>
                        <a href="javascript:void(0);" class="actpartss">Save</a>
                </h2>
                <div class="brd_titless">BS >> <span class="n_prery">New Property</span></div>
                <p class="prp_text">Property Work Sheet</p>
                <div class="prp_textxt">
                    <div class="titl_textxt">Enter as much in information as you have about this property
                        <a href="javascript:void(0);">View tutorial <i class="fa fa-external-link"></i></a>
                    </div>
                    <div class="set_vedioo" data-toggle="modal" data-target="#videotutorialmodal"><a href="javascript:void(0);"><img src="{{ asset('img/video-tutorial-new.png') }}"> </a></div>
                </div>
            </div>
            <!--multisteps-form-->
            <div class="multisteps-form">
                <!--progress bar-->
                @include('front.layouts.progress_bar')
            </div>
            @else
			<div class="row property_desc als_show_ar prp_analyes mb-3">
				<div class="col-lg-5">
					<div class="lsting_proprty purch_list_conts" id="alss_pgesss">
						<h3>Purchase Worksheet</h3>
						<p class="brdsss"><a href="javascript:void(0);">Rentals</a> <span>/</span> Buy Hold Projection</p>
					</div>
				</div>

				<div class="col-lg-7">
					<div class="prp_bntsss">
						<ul>
							<li>
								<a href="javascript:void(0);"><i class="fa fa-bar-chart"></i> Buy & Hold Projection </a>
							</li>
							<li>
								<a href="javascript:void(0);"><i class="fa fa-pie-chart"></i> Property Analysis </a>
							</li>
						</ul>
					</div>
				</div>
				
				<div class="col-lg-12">
                 <div class="titlss_partss" id="alss_pgesss">
				    <p class="viww">View recent comparable sales to help you estimate the ARV of this property. 
					<a href="javascript:void(0);">View Tutorial</a> &nbsp; 
					<a href="javascript:void(0);"><img src="https://1crapp.com/home/img/v_t_orials.png" alt="" /></a>
					</p>
				 </div>
				</div>				
			</div>
                @include('front.layouts.property_worksheet_bar')
            @endif
			


			
            <div class="row">
                <div class="col-lg-12">
				 <div class="hd_res_listsss bothsss_mng">
					<h2>Book & Finance & Payments</h2>
					<span class="set_vedioo" data-toggle="modal" data-target="#videotutorialmodal"><a href="javascript:void(0);"><img src="{{ asset('img/video-tutorial-new.png') }}"> </a></span>
				 </div>
				</div>
                <div class="col-lg-12">
                    <form id="propertyPageForm2" method="POST" action="{{ route('save-book-finance-payment') }}" enctype="multipart/form-data">
                    <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                    <input type="hidden" name="propertyID" value="{{ $propertyID }}">
                    @if(Session::has('success'))
                        <div class="alert alert-success">
                            {{Session::get('success')}}
                        </div>
                    @endif
                    <div class=" " data-toggle="modal" data-target="#videotutorialmodal"  style="float: right;position: relative;top: -5px;left: 0px;display: inline-block;">
                        <a href="#">
                            {{-- <img src="https://pearsystem.space/1crapp/public/img/video-tutorial-new.png" style="width: 85px;"> --}}
                        </a>
                    </div>
                    <div class="all_frm_list loanform">
                        <div class="form-group">
                            <label>Date of Booking: <span class="ticck" tooltip="Date of Booking" flow="down">?</span></label>
    					    <input name="DateOfBooking" id="DateOfBooking" type="date" placeholder="DD MM YYYY" value="<?=$MainProperty->prop_dateOfBooking?>" required />
                        </div>
                        <div class="form-group">
                            <label>Basic Purchase Price - BPP <span class="ticck" tooltip="Data Coming Soon" flow="down">?</span></label>
                            <span class="currencyInputprefix"><?=$currency?></span>
                            <input class="currencyInput" type="text" placeholder="Basic Purchase Price - BPP" value="<?=$MainProperty->prop_purchasePrice?>" onkeyup="updatePrice()" onkeypress="return (event.charCode !=8 && event.charCode ==0 || ( event.charCode == 46 || (event.charCode >= 48 && event.charCode <= 57)))" name="basicPurchasePrice" id="basicPurchasePrice"/>
                        </div>
                        <div class="form-group">
                            <label>Actual Paid Amount (Part Of BPP) <span class="ticck" tooltip="Data Coming Soon" flow="down">?</span></label>
                            <span class="currencyInputprefix"><?=$currency?></span>
                            <input class="currencyInput" id="totalPaidAmountInput" type="text" placeholder="Actual Paid Amount (Part Of BPP)" value="<?=$MainProperty->prop_paidAmount?>" name="actualPaidAmount" onkeyup="updatePrice()" readonly/>
                        </div>
                        <div class="form-group">
                            <label>Current Maket Value- CMS Or Basic Sale Price - BSP <span class="ticck" tooltip="Data Coming Soon" flow="down">?</span></label>
                            <span class="currencyInputprefix"><?=$currency?></span>
                            <input class="currencyInput" type="text" placeholder="Current Maket Value- CMS Or Basic Sale Price - BSP" onkeypress="return (event.charCode !=8 && event.charCode ==0 || ( event.charCode == 46 || (event.charCode >= 48 && event.charCode <= 57)))" value="<?=$MainProperty->prop_salePrice?>" name="basicSalePrice" id="basicSalePrice" onkeyup="updatePrice()"/>
                        </div>
                        <div class="form-group managsss1">
                            <label>Purchase Discount <span class="ticck" tooltip="Data Coming Soon" flow="down">?</span></label>
                            {{-- <span class="currencyInputprefix"><?=$currency?></span> --}}
                            <input type="text" placeholder="Sale Discount - Bsp" onkeypress="return (event.charCode !=8 && event.charCode ==0 || ( event.charCode == 46 || (event.charCode >= 48 && event.charCode <= 57)))" value="<?=$MainProperty->prop_sale_discount?>" name="prop_sale_discount" id="prop_sale_discount" onkeyup="updatePrice()"/>
                            <span class="pursntss" style="right : 25px;">%</span>
                        </div>
                        <!--<div class="form-group managsss1">
                            <label>EMI Cost Rate - Bsp <span class="ticck" tooltip="Data Coming Soon" flow="down">?</span></label>
                            {{-- <span class="currencyInputprefix"><?=$currency?></span> --}}
                            <input type="text" placeholder="EMI Cost Rate - Bsp" onkeypress="return (event.charCode !=8 && event.charCode ==0 || ( event.charCode == 46 || (event.charCode >= 48 && event.charCode <= 57)))" value="<?=$MainProperty->prop_emi_cost_rate?>" name="emi_cost_rate"/>
                            <span class="pursntss" style="right : 25px;">%</span>
                        </div>--->
                    </div>

                    <!-- Financing (Purchase) -->
                    <div class="hd_res_listsss">
                        <h2>Financing (Purchase)</h2>
                    </div>
                    <div class="all_frm_list">
                        <div class="choss_araes">
                            <div class="lft_cntts">
                                <p>Use Financing</p>
                                <span>Enable To Use Financing To Purchase This Proprty. Disable For Cash Purchases.</span>
                            </div>

                            <div class="yesNoButton">
                                <input type="checkbox" class="toggle" @if(count($ItemPropertyLoan)) checked @endif  id="toggle" autocomplete="off"/>
								<label for="toggle">
								  <span class="on">Yes</span>
								  <span class="off">No</span>
								</label>
                            </div>
                        </div>
                    </div>
                    <!-- End Financing (Purchase) -->


					<!-- Financing (Purchase) -->
                    <div id="financeToggleDiv" @if(count($ItemPropertyLoan)==0) style="display: none;" @endif>
                        <div class="hd_res_listsss">
                            <h2>Financing (Purchase)</h2>
                        </div>

                        @if(count($ItemPropertyLoan))
                        @foreach($ItemPropertyLoan as $key=>$loandata)
                        @php
                            $item_no = 1;
                        @endphp
                        <div class="all_frm_list loanouterelement loan_block_{{ $item_no }}">

                            <div class="form-group">
                                <label>Loan Label</label>
                                <input type="text" class="loan_label_{{ $item_no }}"    name="loan_label[]" placeholder="Loan Label" value="{{ $loandata->loan_label }}" />
                            </div>

                            <div class="form-group">
                                <label>Financing Of</label>
                                <select class="slt_areaa_ful financingof_{{ $item_no }}" name="financingof[]" onchange="handleFinancingSelector({{ $item_no }})">
                                    <option value="Purchase Price" @if($loandata->financingof == 'Purchase Price') selected @endif>After Discount Purchase Price</option>
                                    <option value="Improvement Cost" disabled @if($loandata->financingof == 'Improvement Cost') selected @endif>Improvement Cost</option>
                                    <option value="Price and Improvement Cost" disabled @if($loandata->financingof == 'Price and Improvement Cost') selected @endif>Price and Improvement Cost</option>
                                    <option value="Basic Sale Price" @if($loandata->financingof == 'Basic Sale Price') selected @endif>Basic Sale Price</option>
                                    <option value="Custom Amount" @if($loandata->financingof == 'Custom Amount') selected @endif>Custom Amount</option>
                                </select>
                            </div>

                            <div class="form-group managsss1">
                                <label class="finance_label_{{ $item_no }}">Price Financing</label>
                                <span class="currencyInputprefix finance_currency_{{ $item_no }}" style="display:none"><?=$currency?></span>
                                <input name="price_financingShow[]" max="100" class="currencyInputa price_financing_{{ $item_no }}" onkeyup="exchangerate(this.value,1)" onkeypress="return (event.charCode !=8 && event.charCode ==0 || ( event.charCode == 46 || (event.charCode >= 48 && event.charCode <= 57)))" type="text" placeholder="Price Financing" value="{{ $loandata->price_financing }}" />
                                <input name="price_financing[]" max="100" id="price_financing_{{ $item_no }}" type="hidden" value="{{ $loandata->price_financing }}" />
                                <span class="pursntss finance_percent_{{ $item_no }}">%</span>
                                <span class="sm_txtx text-right finance-toggle-text_{{ $item_no }}" style="float: right;" onclick="financetodownconversion(1)">{{ 100 - $loandata->price_financing }}% Down Payment <i class="  fa  fa-exchange text-primary"></i></span>
                                <span class="sm_txtx">Enter The Down Payment On Purchase Price, Or The Percentage Financed. Click Label To Toggle Input.</span>
                            </div>
                            <div class="form-group custom_amount_group_{{ $item_no }}" style="display:none;">
                                <label>Enter Custom Financing Amount</label>
                                <input type="text" name="custom_amount[]" 
                                       class="form-control custom_amount_input_{{ $item_no }}" 
                                       placeholder="Enter custom amount" 
                                       value="{{ $loandata->price_financing ?? '' }}"
                                       onkeypress="return (event.charCode !=8 && event.charCode ==0 || ( event.charCode == 46 || (event.charCode >= 48 && event.charCode <= 57)))">
                            </div>
                            <script>
                            document.addEventListener("DOMContentLoaded", function () {
                                handleFinancingSelector({{ $item_no }});
                            });
                            </script>



                            <div class="tbss_form_lst mt-4">
                                <div class="tab-wrapper">
                                    <div class="tbs_hids">Loan Type <span class="ticck" tooltip="Data Coming Soon" flow="down">?</span></div>

                                    <!--<div class="tabs">-->
                                    <!--    <div class="tab-link @if($loandata->loan_type==1) active @endif" onclick="setLoanTypeOptions(1,{{ $item_no }})">-->
                                    <!--        <input name="loan_type[{{ $item_no }}]" class="loan_type_opt1_{{ $item_no }}" id="loan_type_opt1_{{ $item_no }}" @if($loandata->loan_type==1) checked @endif  type="radio" value="1" style=" opacity: 0; width: 0;" >-->
                                    <!--        <label for="loan_type_opt1_{{ $item_no }}">Amortizing</label>-->
                                    <!--    </div>-->
                                    <!--    <div class="tab-link @if($loandata->loan_type==2) active @endif" onclick="setLoanTypeOptions(2,{{ $item_no }})">-->
                                    <!--        <input name="loan_type[{{ $item_no }}]" @if($loandata->loan_type==2) checked @endif  class="loan_type_opt2_{{ $item_no }}" id="loan_type_opt2_{{ $item_no }}" type="radio" value="2" style="opacity: 0;width: 0;"  >-->
                                    <!--        <label for="loan_type_opt2_{{ $item_no }}">Interest Only</label>-->
                                    <!--    </div>-->
                                    <!--</div>-->
                                    <div class="tabs loan-type-selector" data-item="{{ $item_no }}">
                                        <div class="tab-link @if($loandata->loan_type==1) active @endif" onclick="setLoanTypeOptions(1, {{ $item_no }})">
                                            <input type="radio" name="loan_type[{{ $item_no }}]" id="loan_type_opt1_{{ $item_no }}"
                                                   class="loan_type_radio_{{ $item_no }}" value="1" 
                                                   @if($loandata->loan_type==1) checked @endif
                                                    style=" opacity: 0; width: 0;">
                                            <label for="loan_type_opt1_{{ $item_no }}">Amortizing</label>
                                        </div>
                                    
                                        <div class="tab-link @if($loandata->loan_type==2) active @endif" onclick="setLoanTypeOptions(2, {{ $item_no }})">
                                            <input type="radio" name="loan_type[{{ $item_no }}]" id="loan_type_opt2_{{ $item_no }}"
                                                   class="loan_type_radio_{{ $item_no }}" value="2" 
                                                   @if($loandata->loan_type==2) checked @endif
                                                    style=" opacity: 0; width: 0;">
                                            <label for="loan_type_opt2_{{ $item_no }}">Interest Only</label>
                                        </div>
                                    </div>


                                  <!--  <ul class="tabs">
                                        <li class="tab-link active" data-tab="1">Amortizing</li>
                                        <li class="tab-link" data-tab="2">Interest Only</li>
                                    </ul>-->
                                </div>

                                <div class="content-wrapper">
                                    <div id="tab-1" class="tab-content active">
                                         <div class="choss_araes mt-4 mb-5">

                                        <div class="form-group managsss1">
                                            <label>Interest Rate:</label>
                                            <input type="text"  class="interest_rate_{{ $item_no }}" onkeypress="return (event.charCode !=8 && event.charCode ==0 || ( event.charCode == 46 || (event.charCode >= 48 && event.charCode <= 57)))" name="interest_rate[]" placeholder="Interest Rate" value="{{ $loandata->interest_rate }}" />
                                            <span class="pursntss">%</span>
                                        </div>

                                        <div class="form-group managsss1">
                                            <label>Loan Term: <span class="ticck" tooltip="Data Coming Soon" flow="down">?</span></label>
                                            <input type="text" name="loan_term[]" onkeypress="return (event.charCode !=8 && event.charCode ==0 || ( event.charCode == 46 || (event.charCode >= 48 && event.charCode <= 57)))" class="loan_term_{{ $item_no }}" placeholder="Loan Term" value="{{ $loandata->loan_term }}" />
                                            <span class="pursntss">Years</span>
                                        </div>


                                          <!-- <div class="mortgagebox_{{ $item_no }}">
                                            <div class="lft_cntts">
                                                <p>Mortgage Insurance (PMI) <span class="ticck" tooltip="Data Coming Soon" flow="down">?</span></p>
                                                <span>Enable To Ad Private Mortgage Insurance Payments For This Loan.</span>
                                            </div>
                                            <div class="yesNoButton">
                                                <input type="checkbox" class="toggle mortgage_insurance_{{ $item_no }}" onChange="$('.mortgagebox2_{{ $item_no }}').toggle()" name="mortgage_insurance[]" @if($loandata->mortgage_insurance==1) checked @endif     id="toggle{{ $item_no }}" />
                                                <label for="toggle1">
                                                  <span class="on">Yes</span>
                                                  <span class="off">No</span>
                                                </label>
                                            </div>
                                          </div> -->

                                        </div>

                                        <!-- <div class="mortgagebox_{{ $item_no }} mortgagebox2_{{ $item_no }}" @if($loandata->mortgage_insurance!=1) style="display:none;" @endif  >
                                            <div class="form-group managsss1">
                                                <label>Upfront</label>
                                                <input type="text"name="upfront[]" onkeypress="return (event.charCode !=8 && event.charCode ==0 || ( event.charCode == 46 || (event.charCode >= 48 && event.charCode <= 57)))" class="upfront_{{ $item_no }}" placeholder="Upfront" value="{{ $loandata->upfront }}" />
                                                <span class="pursntss">% Of Loan</span>
                                                <span class="sm_txtx">A One Time PMI Payment That Will Be Added To The Starting Loan Amount.</span>
                                            </div>

                                        <div class="form-group managsss1">
                                            <label>Recurring</label>
                                            <input type="text" name="recurring[]" onkeypress="return (event.charCode !=8 && event.charCode ==0 || ( event.charCode == 46 || (event.charCode >= 48 && event.charCode <= 57)))" class="recurring_{{ $item_no }}" placeholder="Recurring" value="{{ $loandata->upfront }}" />
                                            <span class="pursntss">0 % Of Loan Per Year</span>
                                            <span class="sm_txtx">A Recurring PMI Payment That Will Be Added To All Loan Payment</span>
                                        </div>
                                    </div> -->

                                    </div>

                                    <div id="tab-2" class="tab-content">
									 <div class="choss_araes mt-4 mb-5">

                                        <div class="form-group managsss1">
                                            <label>Interest Rate:</label>
                                            <input type="text"  class="interest_rate_{{ $item_no }}" onkeypress="return (event.charCode !=8 && event.charCode ==0 || ( event.charCode == 46 || (event.charCode >= 48 && event.charCode <= 57)))" name="interest_rate[]" placeholder="Interest Rate" value="{{ $loandata->interest_rate }}" />
                                            <span class="pursntss">%</span>
                                        </div>

                                        <div class="form-group managsss1">
                                            <label>Loan Term: <span class="ticck" tooltip="Data Coming Soon" flow="down">?</span></label>
                                            <input type="text" name="loan_term[]" onkeypress="return (event.charCode !=8 && event.charCode ==0 || ( event.charCode == 46 || (event.charCode >= 48 && event.charCode <= 57)))" class="loan_term_{{ $item_no }}" placeholder="Loan Term" value="{{ $loandata->loan_term }}" />
                                            <span class="pursntss">Years</span>
                                        </div>
										<?php /*

                                          <div class="mortgagebox_{{ $item_no }}">
                                            <div class="lft_cntts">
                                                <p>Mortgage Insurance (PMI) <span class="ticck" tooltip="Data Coming Soon" flow="down">?</span></p>
                                                <span>Enable To Ad Private Mortgage Insurance Payments For This Loan.</span>
                                            </div>
                                            <div class="yesNoButton">
                                                <input type="checkbox" class="toggle mortgage_insurance_{{ $item_no }}" onChange="$('.mortgagebox2_{{ $item_no }}').toggle()" name="mortgage_insurance[]" @if($loandata->mortgage_insurance==1) checked @endif     id="toggle{{ $item_no }}" />
                                                <label for="toggle1">
                                                  <span class="on">Yes</span>
                                                  <span class="off">No</span>
                                                </label>
                                            </div>
                                          </div>
                                           */?>
                                        </div>
                                    <?php /*
                                    <div class="mortgagebox_{{ $item_no }} mortgagebox2_{{ $item_no }}" @if($loandata->mortgage_insurance!=1) style="display:none;" @endif  >
                                        <div class="form-group managsss1">
                                            <label>Upfront</label>
                                            <input type="text"name="upfront[]" onkeypress="return (event.charCode !=8 && event.charCode ==0 || ( event.charCode == 46 || (event.charCode >= 48 && event.charCode <= 57)))" class="upfront_{{ $item_no }}" placeholder="Upfront" value="{{ $loandata->upfront }}" />
                                            <span class="pursntss">% Of Loan</span>
                                            <span class="sm_txtx">A One Time PMI Payment That Will Be Added To The Starting Loan Amount.</span>
                                        </div>

                                        <div class="form-group managsss1">
                                            <label>Recurring</label>
                                            <input type="text" name="recurring[]" onkeypress="return (event.charCode !=8 && event.charCode ==0 || ( event.charCode == 46 || (event.charCode >= 48 && event.charCode <= 57)))" class="recurring_{{ $item_no }}" placeholder="Recurring" value="{{ $loandata->upfront }}" />
                                            <span class="pursntss">0 % Of Loan Per Year</span>
                                            <span class="sm_txtx">A Recurring PMI Payment That Will Be Added To All Loan Payment</span>
                                        </div>
                                    </div>
									*/?>
									</div>
                                </div>
                            </div>


							<div class="lsting_proprty purch_list_conts brcats_listss mt-4">
								<h3>Finance Costs <span class="ticck" tooltip="Data Coming Soon" flow="down">?</span></h3>
							</div>
							<div class="all_frm_list p-0">
								<div class="row">
									<div class="col-md-8">
										<div class="form-group managsss1">
											<label>Total</label>
											<div class="rfc_amount" @if(!count($itemRefinanceCost)) style="display: none;" @endif>
												<span class="currencyInputprefix">₹</span>
												<input class="currencyInput" readonly type="text" id="totalFinanceAmountInput2" name="totalFinanceAmountInput2" placeholder="Total Refinance Cost" value="<?= $MainProperty->prop_refinance_cost ?>" />
											</div>
											<div class="rfc_percent" @if(count($itemRefinanceCost)) style="display: none;" @endif>
												<input 
    												type="text" 
    												placeholder="Refinance Cost's Estimate Percent" 
    												max="100" 
    												value="<?=$MainProperty->prop_costPercent?>" 
    												name="prop_costPercent" 
    												id="prop_costPercent_input" 
    												oninput="if (parseFloat(this.value) > 100) this.value = 100;"
												/>
												<span class="pursntss">% Of Financed Amount</span>
											</div>
										</div>
									</div>
									<div class="col-md-4">
										<div class="choss_araes">
											<div class="lft_cntts" style="width: 100%;">
												<p>Itemize Finance Costs</p>
											</div>
											<div class="yesNoButton" style="width: 100%;">
												<input type="checkbox" class="toggle" id="toggle14" @if(count($itemRefinanceCost)) checked @endif autocomplete="off" name="financialCostitemizedToggle"/>
												<label for="toggle14">
													<span class="on">Yes</span>
													<span class="off">No</span>
												</label>
											</div>
										</div>
									</div>
								</div>
								<!-- Itemized purchase Costs   -->
								<div class="itm_cost_prch" id="itemisedRefinanceCost" @if(!count($itemRefinanceCost)) style="display: none;" @endif>
									<div class="hd_res_listsss">
										<h3>
											Itemized Finance Costs
											<span class="rit_mg">
												<button type="button" class="bg-transparent border-0 shadow-none" data-toggle="modal" data-target="#financeCostModal">
													<img src="{{ url('') }}/img/ad_bk.png" alt="" />
												</button>
											</span>
										</h3>
									</div>
									<div class="all_frm_list" style="padding: 0;" id="refinance_cost_content">
										<div id="purchasedAmountItemizedDiv"></div>
										<div class="btm_coststs">
											<span class="tltss">Total</span>
											<span class="pricss">
												₹
												<span id="totalItemizedPurchasedAmt">0</span>
											</span>
										</div>
									</div>
								</div>
								<!-- End Itemized purchase Costs  -->
							</div>
                            @if($key>0)
                                <div class="text-center" style=""><button type="button" class="btn btn-outline btn-danger btn-sm btn-icon" onClick="$('.loan_block_{{ $item_no }}').remove()" ><i class="icon ion-trash-b"></i> Remove Loan</button></div>
                            @endif
                        </div>
                        <!-- End Financing (Purchase) -->
                         @php
                            $item_no++;
                        @endphp
                        @endforeach
                        @else

                        <div class="all_frm_list loanouterelement loan_block_1">

    						<div class="form-group">
                                <label>Loan Label</label>
                                <input type="text" class="loan_label_1"  name="loan_label[]" placeholder="Loan Label" value="" />
                            </div>

    						<div class="form-group">
                                <label>Financing Of</label>
    							<select class="slt_areaa_ful financingof_1" name="financingof[]" onchange="handleFinancingSelector(1)">
                                  <option value="Purchase Price">After Discount Purchase Price</option>
                                  <option value="Improvement Cost" disabled>Improvement Cost</option>
                                  <option value="Price and Improvement Cost" disabled>Price and Improvement Cost</option>
                                  <option value="Basic Sale Price">Basic Sale Price</option>
                                  <option value="Custom Amount">Custom Amount</option>

                                </select>
                            </div>
    						<div class="form-group managsss1">
                                <label class="finance_label_1">Price Financing</label>
                                <span class="currencyInputprefix finance_currency_1" style="display:none"><?=$currency?></span>
                                <input name="price_financingShow[]" max="100" class="currencyInputa price_financing_1" onkeyup="exchangerate(this.value,1)" onkeypress="return (event.charCode !=8 && event.charCode ==0 || ( event.charCode == 46 || (event.charCode >= 48 && event.charCode <= 57)))" type="text" placeholder="Price Financing" value="0" />
                                <input name="price_financing[]" max="100" id="price_financing_1" type="hidden" value="0" />
                                <!--<input name="price_financing[]" class="currencyInputa price_financing_1" onkeyup="exchangerate(this.value,1)" onkeypress="return (event.charCode !=8 && event.charCode ==0 || ( event.charCode == 46 || (event.charCode >= 48 && event.charCode <= 57)))" type="text" placeholder="Price Financing" value="" />-->
                           <span class="pursntss finance_percent_1">%</span>
                            <span class="sm_txtx text-right finance-toggle-text_1" style="float: right;" onclick="financetodownconversion(1)">100% Down Payment <i class="fa fa-exchange text-primary"></i></span>
                            <span class="sm_txtx">Enter The Down Payment On Purchase Price, Or The Percentage Financed. Click Label To Toggle Input.</span>
                            </div>
                            <div class="form-group custom_amount_group_1" style="display:none;">
                                <label>Enter Custom Financing Amount</label>
                                <input type="text" name="custom_amount[]" 
                                       class="form-control custom_amount_input_1" 
                                       placeholder="Enter custom amount" 
                                       value="0"
                                       onkeypress="return (event.charCode !=8 && event.charCode ==0 || ( event.charCode == 46 || (event.charCode >= 48 && event.charCode <= 57)))">
                            </div>



    						<div class="tbss_form_lst mt-4">
                                <div class="tab-wrapper">
                                    <div class="tbs_hids">Loan Type <span class="ticck" tooltip="Data Coming Soon" flow="down">?</span></div>

                                    <div class="tabs">
                                        <div class="tab-link active" onclick="setLoanTypeOptions(1,1)">
                                            <input name="loan_type[1]" class="loan_type_opt1_1" id="loan_type_opt1_1" checked type="radio" value="1" style=" opacity: 0; width: 0;" >
                                            <label for="loan_type_opt1_1">Amortizing</label>
                                        </div>
                                        <div class="tab-link" onclick="setLoanTypeOptions(2,1)">
                                            <input name="loan_type[1]" class="loan_type_opt2_1" id="loan_type_opt2_1" type="radio" value="2" style="opacity: 0;width: 0;"  >
                                            <label for="loan_type_opt2_1">Interest Only</label>
                                        </div>
                                    </div>

                                  <!--  <ul class="tabs">
                                        <li class="tab-link active" data-tab="1">Amortizing</li>
                                        <li class="tab-link" data-tab="2">Interest Only</li>
                                    </ul>-->
                                </div>

                                <div class="content-wrapper">
                                    <div id="tab-1" class="tab-content active">
    								     <div class="choss_araes mt-4 mb-5">

                                        <div class="form-group managsss1">
                                            <label>Interest Rate:</label>
                                            <input type="text"  class="interest_rate_1" onkeypress="return (event.charCode !=8 && event.charCode ==0 || ( event.charCode == 46 || (event.charCode >= 48 && event.charCode <= 57)))" name="interest_rate[]" placeholder="Interest Rate" value="" />
    										<span class="pursntss">%</span>
                                        </div>

                                        <div class="form-group managsss1">
                                            <label>Loan Term: <span class="ticck" tooltip="Data Coming Soon" flow="down">?</span></label>
                                            <input type="text" name="loan_term[]" onkeypress="return (event.charCode !=8 && event.charCode ==0 || ( event.charCode == 46 || (event.charCode >= 48 && event.charCode <= 57)))" class="loan_term_1" placeholder="Loan Term" value="" />
    										<span class="pursntss">Years</span>
                                        </div>
                                        </div>

    								<div class="mortgagebox_1 mortgagebox2_1">

                                    </div>
                                    </div>

                                    <div id="tab-2" class="tab-content"></div>
                                </div>
                            </div>
                            <div class="lsting_proprty purch_list_conts brcats_listss mt-4">
								<h3>Finance Costs <span class="ticck" tooltip="Data Coming Soon" flow="down">?</span></h3>
							</div>
							<div class="all_frm_list p-0">
								<div class="row">
									<div class="col-md-8">
										<div class="form-group managsss1">
											<label>Total</label>
											<div class="rfc_amount" style="display: none;">
												<span class="currencyInputprefix">₹</span>
												<input class="currencyInput" readonly type="text" id="totalFinanceAmountInput2" name="totalFinanceAmountInput2" placeholder="Total Refinance Cost" value="0" />
											</div>
											<div class="rfc_percent">
												<input type="text" placeholder="Refinance Cost's Estimate Percent" value="3" name="closingCostEstimatePercent" id="closingCostEstimatePercent"/>
												<span class="pursntss">% Of Financed Amount</span>
											</div>
										</div>
									</div>
									<div class="col-md-4">
										<div class="choss_araes">
											<div class="lft_cntts" style="width: 100%;">
												<p>Itemize Finance Costs</p>
											</div>
											<div class="yesNoButton" style="width: 100%;">
												<input type="checkbox" class="toggle" id="toggle14" autocomplete="off" />
												<label for="toggle14" class="itemize-button">
													<span class="on">Yes</span>
													<span class="off">No</span>
												</label>
											</div>
										</div>
									</div>
								</div>
								<!-- Itemized purchase Costs   -->
								<div class="itm_cost_prch" id="itemisedRefinanceCost" style="display: none;">
									<div class="hd_res_listsss">
										<h3>
											Itemized Refinance Costs
											<span class="rit_mg">
												<button type="button" class="bg-transparent border-0 shadow-none" data-toggle="modal" data-target="#financeCostModal">
													<img src="https://1crapp.allproject.online/img/ad_bk.png" alt="" />
												</button>
											</span>
										</h3>
									</div>
									<div class="all_frm_list" style="padding: 0;" id="refinance_cost_content">

										<div id="purchasedAmountItemizedDiv"></div>
										<div class="btm_coststs">
											<span class="tltss">Total</span>
											<span class="pricss">
												₹
												<span id="totalItemizedPurchasedAmt">0</span>
											</span>
										</div>
									</div>
								</div>
								<!-- End Itemized purchase Costs  -->
							</div>
                        </div>
                        <!-- End Financing (Purchase) -->
                        @endif

    					<!-- Add A Loan -->
    					<div class="addmoreloanbtn add_on_ctntsxt">
                         <div class="all_frm_list">
                            <div class="choss_araes">
                                <div class="lft_cntts">
                                    <p>Add A Loan</p>
                                </div>

                                <div class="chos_bntt">
                                    <div class="add_on" onclick="addmoreloan()" ><i class="fa fa-plus"></i></div>
                                </div>
                            </div>
                         </div>
    					 <p class="ads_bmss">You Can Add Loan Points. Underwriting Fees And Other Lender Costs On The <span>Purchase Costs Worksheet.</span></p>
    					</div>
                        <!-- End Add A Loan -->
					</div>

					<!-- Total Paid Amount (Part Of Bpp) -->
                        @include('dashboard.buysell_book_pre_hold.itemized_paid_amount.paid_amount_section',[
                            'MainProperty'  => $MainProperty,
                            'ItemPaidAmount'=> $ItemPaidAmount
                        ])
					<!-- End Total Paid Amount (Part Of BPP) -->
					<!-- Purchase costs -->
                    @include('dashboard.buysell_book_pre_hold.itemized_purchase_costs.purchase_cost_section',[
                        'MainProperty'  => $MainProperty
                    ])
                    <!-- End Loan Label -->
					<div class="backk_bntss">
					    @if (request()->is('properties/new-property/*'))
					    <a href="{{ url('') }}/properties/new-property/description/<?=base64_encode($propertyID)?>">
                            <i class="fa fa-arrow-left"></i> Previous Section
                        </a>
                        @else
                        <input type="hidden" name="redirect_back_edit_url" value="{{ Route::currentRouteName() }}">
                        @endif
                        <button type="submit" class="btn btn-primary m-b-0 actss" onclick="if(validate()){this.form.submit(); this.disabled=true;}" style="float: right;">
                            @if (request()->is('properties/new-property/*'))
                            Next Section
                            @else
                            Submit
                            @endif
                            <i class="fa fa-arrow-right"></i>
                        </button>
					</div>
					<!-- End Itemized purchase Costs  -->
					</form>
                </div>
            </div>
        </div>
    </div>
</div>
 <!-- finance cost modal -->
 <div class="modal fade" id="financeCostModal" tabindex="-1" role="dialog" aria-labelledby="financeCostModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content all_frm_list">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="font-size: 30px;">
                    <span aria-hidden="true">&times;</span>
                </button>
                <form id="itemizedfinanceAmtForm" method="POST">
                    <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                    <input type="hidden" name="itemizedPurchasedAmtID" id="itemizedPurchasedAmtID" value=""/>
                    <input type="hidden" name="itemizedPurchasedAmtType" id="itemizedFinancialCostType" value="amount"/>
                    <input type="hidden" name="itemizedPurchasedAmtPropertyID" value="<?=$propertyID?>"/>
                    <input type="hidden" name="itemizedPurchasedAmtInLoan" id="itemizedfinanceCostInLoan" value="0"/>
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="itemizedPurchasedAmtName" id="itemizedPurchasedAmtName" placeholder="Name" value="" required/>
                    </div>
                    <div class="tbss_form_lst mt-4">
                        <div class="tab-wrapper">
                            <div class="tbs_hids">Type</div>
                            <ul class="tabs">
                                <li id="tabButton-amount" class="tabLinkFinancialCost active" data-tab="purchasedamount">Set Amount</li>
                                <li id="tabButton-percent" class="tabLinkFinancialCost" data-tab="purchasedpercent">Percent</li>
                            </ul>
                        </div>
                        <div class="content-wrapper">
                            <div id="tab-purchasedamount" class="tab-content active">
                                <div class="form-group managsss1">
                                    <label>Amount </label>
                                    <span class="currencyInputprefix"><?=$currency?></span>
                                    <input name="itemizedPurchasedAmtAmount" id="itemizedPurchasedAmtAmount" class="currencyInput validateFloatInput" type="text" placeholder="Amount" value="" />
                                </div>
                            </div>
                            <div id="tab-purchasedpercent" class="tab-content">
                                <div class="form-group managsss1">
                                    <label>Percent </label>
                                    <input type="text" name="itemizedPurchasedAmtPercent" id="itemizedPurchasedAmtPercent" placeholder="Percent" value="" class="validateFloatInput"/>
                                    <select class="percentOfClass" name="itemizedPurchasedAmtPercentOf" id="itemizedPurchasedAmtPercentOf">
                                    <option value="price">% Of Price</option>
                                    <option value="loan">% Of loan</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Date</label>
                                <input name="itemizedPurchasedAmtDate" id="" type="date" placeholder="DD MM YYYY" value="" class="" required />
                            </div>
                            <div class="form-group">
                                <label>Remarks</label>
                                <input name="itemizedPurchasedAmtRemark" id="itemizedPurchasedAmtRemark" type="text" placeholder="Remarks" value="" required/>
                            </div>
                            <div class="form-group managsss1">
                                <div class="roll_lst">
                                    <div class="lft_raea">
                                        <label>Roll Into Loan?</label>
                                    </div>
                                    <div class="rit_raea">
                                        <ul class="ys_no">
                                            <li>
                                                <a id="financeCostInLoanCreateYes" onclick="financeCostRollIntoLoan('Create','Yes')">Yes</a>
                                            </li>
                                            <li></li>
                                            <li>
                                                <a id="financeCostInLoanCreateNo" onclick="financeCostRollIntoLoan('Create','No')">No</a>
                                            </li>
                                            <li></li>
                                        </ul>
                                        <p>Select Whether Your Will Pay This Cost Upfront Or Add <span>It To The Starting Loan Amount.</span></p>
                                        <div class="bntt_cn">
                                            <a href="javascript:void(0);" data-dismiss="modal" aria-label="Close" >Cancel</a>
                                            <button type="submit" class="actsss">Save</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="financeCostModalEdit" tabindex="-1" role="dialog" aria-labelledby="financeCostModalEditLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content all_frm_list">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="font-size: 30px;">
                    <span aria-hidden="true">&times;</span>
                </button>
                <form id="itemizedfinanceAmtFormEdit" method="POST">
                    <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                    <input type="hidden" name="itemizedfinanceCostAmtID" id="itemizedfinanceCostAmtIDEdit" value=""/>
                    <input type="hidden" name="itemizedfinanceCostAmtType" id="itemizedFinancialCostTypeEdit" value="amount"/>
                    <input type="hidden" name="itemizedfinanceCostAmtPropertyID" value="<?=$propertyID?>"/>
                    <input type="hidden" name="itemizedfinanceCostAmtInLoan" id="financeCostInLoanEdit" value="0"/>
                    <div class="form-group">
                        <label>Name </label>
                        <input type="text" name="itemizedfinanceCostAmtName" id="itemizedfinanceCostAmtNameEdit" placeholder="Name" value="" required />
                    </div>
                    <div class="tbss_form_lst mt-4">
                        <div class="tab-wrapper">
                            <div class="tbs_hids">Type</div>
                            <ul class="tabs">
                                <li id="tabButton-rc-amount" class="tabLinkFinancialCostEdit active" data-tab="rc-amount">Set Amount</li>
                                <li id="tabButton-rc-percent" class="tabLinkFinancialCostEdit" data-tab="rc-percent">Percent</li>
                            </ul>
                        </div>
                        <div class="content-wrapper">
                            <div id="tab-rc-amount" class="tab-content active">
                                <div class="form-group managsss1">
                                    <label>Amount </label>
                                    <span class="currencyInputprefix"><?=$currency?></span>
                                    <input name="paid_amount" id="itemizedfinanceCostAmtAmountEdit" class="currencyInput validateFloatInput" type="text" placeholder="Amount" value="" />
                                </div>
                            </div>
                            <div id="tab-rc-percent" class="tab-content">
                                <div class="form-group managsss1">
                                    <label>Percent </label>
                                    <input type="text" name="itemizedfinanceCostAmtPercent" id="itemizedfinanceCostAmtPercentEdit" placeholder="Percent" value="" class="validateFloatInput"/>
                                    <select class="percentOfClass" name="itemizedfinanceCostAmtPercentOf" id="itemizedfinanceCostAmtPercentOfEdit">
                                    <option value="price">% Of Price</option>
                                    <option value="loan">% Of loan</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Date</label>
                                <input name="itemizedfinanceCostAmtDate" id="itemizedfinanceCostAmtDateEdit" type="date" placeholder="DD MM YYYY" value="" class="" required />
                            </div>
                            <!--<input name="itemizedfinanceCostAmtDate" id="itemizedfinanceCostAmtDateEdit" type="hidden" placeholder="DD MM YYYY" value="" class="datePickerDefault" />-->
                            <div class="form-group">
                                <label>Remarks</label>
                                <input name="itemizedfinanceCostAmtRemark" id="itemizedfinanceCostAmtRemarkEdit" type="text" placeholder="Remarks" value="" required/>
                            </div>
                            <div class="form-group managsss1">
                                <div class="roll_lst">
                                    <div class="lft_raea">
                                        <label>Roll Into Loan?</label>
                                    </div>
                                    <div class="rit_raea">
                                        <ul class="ys_no">
                                            <li>
                                                <a id="financeCostInLoanEditYes" onclick="financeCostRollIntoLoan('Edit','Yes')">Yes</a>
                                            </li>
                                            <li></li>
                                            <li>
                                                <a id="financeCostInLoanEditNo" onclick="financeCostRollIntoLoan('Edit','No')">No</a>
                                            </li>
                                            <li></li>
                                        </ul>

                                        <p>Select Whether Your Will Pay This Cost Upfront Or Add <span>It To The Starting Loan Amount.</span></p>
                                        <div class="bntt_cn">
                                            <a href="javascript:void(0);" data-dismiss="modal" aria-label="Close" >Cancel</a>
                                            <button type="submit" class="actsss">Save</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- reinance cost modal -->

{{-- ========================================================= PAID AMOUNT MODAL ================================================================== --}}
    <!-- Modal -->
    <div class="modal fade" id="paidAmountModal" tabindex="-1" role="dialog" aria-labelledby="paidAmountModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content all_frm_list">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="font-size: 30px;">
                <span aria-hidden="true">&times;</span>
                </button>
                <form id="itemizedPaidAmtForm" method="POST">
                    <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                    <input type="hidden" name="itemizedPaidAmtID" id="itemizedPaidAmtID" value=""/>
                    <input type="hidden" name="itemizedPaidAmtType" id="itemizedPaidAmtType" value="amount"/>
                    <input type="hidden" name="itemizedPaidAmtPropertyID" value="<?=$propertyID?>"/>
                    <input type="hidden" name="itemizedPaidAmtInLoan" id="itemizedPaidAmtInLoan" value="0"/>
                    <div class="form-group">
                        <label>Name </label>
                        <input type="text" name="itemizedPaidAmtName" id="itemizedPaidAmtName" placeholder="Name" value="" required />
                    </div>
                    <div class="tbss_form_lst mt-4">
                        <div class="tab-wrapper">
                            <div class="tbs_hids">Type</div>
                            <ul class="tabs">
                                <li id="tabButton-amount" class="tabLinkPaidAmt active" data-tab="amount">Set Amount</li>
                                <li id="tabButton-percent" class="tabLinkPaidAmt" data-tab="percent">Percent</li>
                            </ul>
                        </div>
                        <div class="content-wrapper">
                            <div id="tab-amount" class="tab-content active">
                                <div class="form-group managsss1">
                                    <label>Amount </label>
                                    <span class="currencyInputprefix"><?=$currency?></span>
                                    <input name="itemizedPaidAmtAmount" id="itemizedPaidAmtAmount" class="currencyInput validateFloatInput" type="text" placeholder="Amount" value="" />
                                </div>
                            </div>
                            <div id="tab-percent" class="tab-content">
                                <div class="form-group managsss1">
                                    <label>Percent </label>
                                    <input type="text" name="itemizedPaidAmtPercent" id="itemizedPaidAmtPercent" placeholder="Percent" value="" class="validateFloatInput" />
                                    <select class="percentOfClass" name="itemizedPaidAmtPercentOf" id="itemizedPaidAmtPercentOf">
                                    <option value="price">% Of Price</option>
                                    <option value="loan">% Of loan</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Date</label>
                                <input name="itemizedPaidAmtDate" id="itemizedPaidAmtDate" type="date" placeholder="DD MM YYYY" value="" class="" required />
                            </div>
                            <div class="form-group">
                                <label>Remarks</label>
                                <input name="itemizedPaidAmtRemark" id="itemizedPaidAmtRemark" type="text" placeholder="Remarks" value="" required/>
                            </div>
                            <div class="form-group managsss1">
                                <div class="roll_lst">
                                    <div class="lft_raea">
                                        <label>Roll Into Loan?</label>
                                    </div>
                                    <div class="rit_raea">
                                        <ul class="ys_no">
                                            <li><a id="paidAmtInLoanYesCreate" onclick="RollIntoLoan('Create','Yes')">Yes</a></li>
                                            <li></li>
                                            <li><a id="paidAmtInLoanNoCreate" onclick="RollIntoLoan('Create','No')">No</a></li>
                                            <li></li>
                                        </ul>
                                        <p>Select Whether Your Will Pay This Cost Upfront Or Add <span>It To The Starting Loan Amount.</span></p>
                                        <div class="bntt_cn">
                                            <a href="javascript:void(0);" data-dismiss="modal" aria-label="Close" >Cancel</a>
                                            <button type="submit" class="actsss">Save</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="paidAmountModalEdit" tabindex="-1" role="dialog" aria-labelledby="paidAmountModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content all_frm_list">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="font-size: 30px;">
                <span aria-hidden="true">&times;</span>
                </button>
                <form id="itemizedPaidAmtFormEdit" method="POST">
                    <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                    <input type="hidden" name="itemizedPaidAmtID" id="itemizedPaidAmtIDEdit" value=""/>
                    <input type="hidden" name="itemizedPaidAmtType" id="itemizedPaidAmtTypeEdit" value="amount"/>
                    <input type="hidden" name="itemizedPaidAmtPropertyID" value="<?=$propertyID?>"/>
                    <input type="hidden" name="itemizedPaidAmtInLoan" id="itemizedPaidAmtInLoanEdit" value="0"/>
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="itemizedPaidAmtName" id="itemizedPaidAmtNameEdit" placeholder="Name" value="" required />
                    </div>
                    <div class="tbss_form_lst mt-4">
                        <div class="tab-wrapper">
                            <div class="tbs_hids">Type</div>
                            <ul class="tabs">
                                <li id="tabButton-amountEdit" class="tabLinkPaidAmtEdit active" data-tab="amount">Set Amount</li>
                                <li id="tabButton-percentEdit" class="tabLinkPaidAmtEdit" data-tab="percent">Percent</li>
                            </ul>
                        </div>

                        <div class="content-wrapper">
                            <div id="tab-amountEdit" class="tab-content active">
                                <div class="form-group managsss1">
                                    <label>Amount </label>
                                    <span class="currencyInputprefix"><?=$currency?></span>
                                    <input name="itemizedPaidAmtAmount" id="itemizedPaidAmtAmountEdit" class="currencyInput validateFloatInput" type="text" placeholder="Amount" value="" />
                                </div>
                            </div>
                            <div id="tab-percentEdit" class="tab-content">
                                <div class="form-group managsss1">
                                    <label>Percent </label>
                                    <input type="text" name="itemizedPaidAmtPercent" id="itemizedPaidAmtPercentEdit" placeholder="Percent" value="" class="validateFloatInput" />
                                    <select class="percentOfClass" name="itemizedPaidAmtPercentOf" id="itemizedPaidAmtPercentOfEdit">
                                    <option value="price">% Of Price</option>
                                    <option value="loan">% Of loan</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Date</label>
                                <input name="itemizedPaidAmtDate" id="itemizedPaidAmtDateEdit" type="date" placeholder="DD MM YYYY" value="" class="" required />
                            </div>
                            <div class="form-group">
                                <label>Remarks</label>
                                <input name="itemizedPaidAmtRemark" id="itemizedPaidAmtRemarkEdit" type="text" placeholder="Remarks" value="" required/>
                            </div>
                            <div class="form-group managsss1">
                                <div class="roll_lst">
                                    <div class="lft_raea">
                                        <label>Roll Into Loan?</label>
                                    </div>
                                    <div class="rit_raea">
                                        <ul class="ys_no">
                                            <li><a id="paidAmtInLoanYesEdit" onclick="RollIntoLoan('Edit','Yes')">Yes</a></li>
                                            <li></li>
                                            <li><a id="paidAmtInLoanNoEdit" onclick="RollIntoLoan('Edit','No')">No</a></li>
                                            <li></li>
                                        </ul>

                                        <p>Select Whether Your Will Pay This Cost Upfront Or Add <span>It To The Starting Loan Amount.</span></p>
                                        <div class="bntt_cn">
                                            <a href="javascript:void(0);" data-dismiss="modal" aria-label="Close" >Cancel</a>
                                            <button type="submit" class="actsss">Save</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
{{-- ========================================================= PAID AMOUNT MODAL ================================================================== --}}

{{-- ========================================================= PURCHASE COST MODAL ================================================================== --}}
    <div class="modal fade" id="purchaseCostModal" tabindex="-1" role="dialog" aria-labelledby="purchaseCostModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content all_frm_list">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="font-size: 30px;">
                    <span aria-hidden="true">&times;</span>
                </button>
                <form id="itemizedPurchasedAmtForm" method="POST" name="ipaf">
                    <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                    <input type="hidden" name="itemizedPurchasedAmtID" id="itemizedPurchasedAmtID" value=""/>
                    <input type="hidden" name="itemizedPurchasedAmtType" class="itemizedPurchasedcostAmtType" id="purchaseCostTypeID" value="amount"/>
                    <input type="hidden" name="itemizedPurchasedAmtPropertyID" value="<?=$propertyID?>"/>
                    <input type="hidden" name="itemizedPurchasedAmtInLoan" id="itemizedpurchaseCostInLoan" value="0"/>
                    <div class="form-group">
                        <label>Name </label>
                        <input type="text" name="itemizedPurchasedAmtName" id="itemizedPurchasedAmtName" placeholder="Name" value="" required />
                    </div>
                    <div class="tbss_form_lst mt-4">
                        <div class="tab-wrapper">
                            <div class="tbs_hids">Type</div>
                            <ul class="tabs">
                                <li id="tabButton-pc-amount" class="tabLinkPurchasedAmt pc_add active" data-tab="pc-amount">Set Amount</li>
                                <li id="tabButton-pc-percent" class="tabLinkPurchasedAmt pc_add" data-tab="pc-percent">Percent</li>
                            </ul>
                        </div>
                        <div class="content-wrapper">
                            <div id="tab-pc-amount" class="tab-content active">
                                <div class="form-group managsss1">
                                    <label>Amount </label>
                                    <span class="currencyInputprefix"><?=$currency?></span>
                                    <input name="itemizedPurchasedAmtAmount" id="itemizedPurchasedAmtAmount" class="currencyInput validateFloatInput" type="text" placeholder="Amount" value="" />
                                </div>
                            </div>
                            <div id="tab-pc-percent" class="tab-content">
                                <div class="form-group managsss1">
                                    <label>Percent </label>
                                    <input type="text" name="itemizedPurchasedAmtPercent" id="itemizedPurchasedAmtPercent" placeholder="Percent" value="" class="validateFloatInput" />
                                    <select class="percentOfClass" name="itemizedPurchasedAmtPercentOf" id="itemizedPurchasedAmtPercentOf">
                                    <option value="price">% Of Price</option>
                                    <option value="loan">% Of loan</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Date</label>
                                <input name="itemizedPurchasedAmtDate" id="" type="date" placeholder="DD MM YYYY" value="" class="" required />
                            </div>
                            <div class="form-group">
                                <label>Remarks</label>
                                <input name="itemizedPurchasedAmtRemark" id="itemizedPurchasedAmtRemark" type="text" placeholder="Remarks" value="" required/>
                            </div>
                            <div class="form-group managsss1">
                                <div class="roll_lst">
                                    <div class="lft_raea">
                                        <label>Roll Into Loan?</label>
                                    </div>
                                    <div class="rit_raea">
                                        <ul class="ys_no">
                                            <li>
                                                <a id="purchaseCostInLoanCreateYes" onclick="purchaseCostRollIntoLoan('Create','Yes')">Yes</a>
                                            </li>
                                            <li></li>
                                            <li>
                                                <a id="purchaseCostInLoanCreateNo" onclick="purchaseCostRollIntoLoan('Create','No')">No</a>
                                            </li>
                                            <li></li>
                                        </ul>
                                        <p>Select Whether Your Will Pay This Cost Upfront Or Add <span>It To The Starting Loan Amount.</span></p>
                                        <div class="bntt_cn">
                                            <a href="javascript:void(0);" data-dismiss="modal" aria-label="Close" >Cancel</a>
                                            <button type="submit" class="actsss">Save</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="PurchasedAmountModalEdit" tabindex="-1" role="dialog" aria-labelledby="PurchasedAmountModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content all_frm_list">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="font-size: 30px;">
                    <span aria-hidden="true">&times;</span>
                </button>
                <form id="itemizedPurchasedAmtFormEdit" method="POST">
                    <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                    <input type="hidden" name="itemizedPurchasedAmtID" id="itemizedPurchasedAmtIDEdit" value=""/>
                    <input type="hidden" name="itemizedPurchasedAmtType" class="itemizedPurchasedcostAmtType" id="purchaseCostTypeEditID" value="amount"/>
                    <input type="hidden" name="itemizedPurchasedAmtPropertyID" value="<?=$propertyID?>"/>
                    <input type="hidden" name="itemizedPurchasedAmtInLoan" id="itemizedpurchaseCostInLoanEdit" value="0"/>
                    <div class="form-group">
                        <label>Name </label>
                        <input type="text" name="itemizedPurchasedAmtName" id="itemizedPurchasedAmtNameEdit" placeholder="Name" value="" required />
                    </div>
                    <div class="tbss_form_lst mt-4">
                        <div class="tab-wrapper">
                            <div class="tbs_hids">Type</div>
                            <ul class="tabs">
                                <li id="tabButton-cost-amount" class="tabLinkPurchasedAmt tabLinkPurchasedCostAmt active" data-tab="cost-amount">Set Amount</li>
                                <li id="tabButton-cost-percent" class="tabLinkPurchasedAmt tabLinkPurchasedCostAmt" data-tab="cost-percent">Percent</li>
                            </ul>
                        </div>

                        <div class="content-wrapper">
                            <div id="tab-cost-amount" class="tab-content active">
                                <div class="form-group managsss1">
                                    <label>Amount </label>
                                    <span class="currencyInputprefix"><?=$currency?></span>
                                    <input name="itemizedPurchasedAmtAmount" id="itemizedPurchasedAmtAmountEdit" class="currencyInput validateFloatInput" type="text" placeholder="Amount" value="" />
                                </div>
                            </div>

                            <div id="tab-cost-percent" class="tab-content">
                                <div class="form-group managsss1">
                                    <label>Percent </label>
                                    <input type="text" name="itemizedPurchasedAmtPercent" id="itemizedPurchasedAmtPercentEdit" placeholder="Percent" value="" class="validateFloatInput" />
                                    <select class="percentOfClass" name="itemizedPurchasedAmtPercentOf" id="itemizedPurchasedAmtPercentOfEdit">
                                    <option value="price">% Of Price</option>
                                    <option value="loan">% Of loan</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Date</label>
                                <input name="itemizedPurchasedAmtDate" id="itemizedPurchasedAmtDateEdit" type="date" placeholder="DD MM YYYY" value="" class="" required />
                            </div>

                            <div class="form-group">
                                <label>Remarks</label>
                                <input name="itemizedPurchasedAmtRemark" id="itemizedPurchasedAmtRemarkEdit" type="text" placeholder="Remarks" value="" required/>
                            </div>

                            <div class="form-group managsss1">
                                <div class="roll_lst">
                                    <div class="lft_raea">
                                        <label>Roll Into Loan?</label>
                                    </div>
                                    <div class="rit_raea">
                                        <ul class="ys_no">
                                            <li><a id="purchaseCostInLoanEditYes" onclick="purchaseCostRollIntoLoan('Edit','Yes')">Yes</a></li>
                                            <li></li>
                                            <li><a id="purchaseCostInLoanEditNo" onclick="purchaseCostRollIntoLoan('Edit','No')">No</a></li>
                                            <li></li>
                                        </ul>

                                        <p>Select Whether Your Will Pay This Cost Upfront Or Add <span>It To The Starting Loan Amount.</span></p>
                                        <div class="bntt_cn">
                                            <a href="javascript:void(0);" data-dismiss="modal" aria-label="Close" >Cancel</a>
                                            <button type="submit" class="actsss">Save</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
{{-- ========================================================= PURCHASE COST MODAL ================================================================== --}}
<div class="modal fade" id="successModal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content alert alert-success">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="text-align: right;">
          <span aria-hidden="true">&times;</span>
        </button>
        <svg class="checkmark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52">
            <circle class="checkmark__circle" cx="26" cy="26" r="25" fill="none"/>
            <path class="checkmark__check" fill="none" d="M14.1 27.2l7.1 7.2 16.7-16.8"/>
        </svg>
        @if(Session::has('success'))
            {{Session::get('success')}}
        @endif
    </div>
  </div>
</div>

<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/numeral.js/2.0.6/numeral.min.js"></script>

<script>
    // =================================== PAID AMOUNT COST ===================================
        var form = document.getElementById("itemizedPaidAmtForm");
        form.addEventListener("submit", function(event) {
            // Prevent the default form submission behavior
            event.preventDefault();

            const submitBtn = form.querySelector("button[type='submit']");
            if (submitBtn) {
                submitBtn.disabled = true;
                submitBtn.innerText = 'Saving...';
            }

            // Get the form data as an object
            const TotalLoanAmount = calculateLoanAmount();
            var data = {"TotalLoanAmount" : TotalLoanAmount};
            var inputs = form.querySelectorAll("input, textarea, select");
            for (var i = 0; i < inputs.length; i++) {
                data[inputs[i].name] = inputs[i].value;
            }
            
            // check if the loans exists for calculating items amount on the basis of % of loans
            if(data["itemizedPaidAmtPercentOf"] == "loan" && TotalLoanAmount <= 0){
                alert("No Loan Found for % of Loan calculation");
                return;
            }
            
            paidAmtURL = '{{url('')}}' + '/addItemizedPaidAmount';
            // Send the form data using ajax
            $.ajax({
                url: paidAmtURL,
                type: form.method,
                dataType: "json",
                data: data,
                success: function(response) {
                    updateTotalPaidAmountDivAllItemized(response.totalAmount)
                    $('#itemized_paid_amount_content').html(response.view);
                    // $('#totalPaidAmountInput2').val(response.totalAmount);
                    // $('#totalPaidAmountInput').val(response.totalAmount);
                    document.getElementById("itemizedPaidAmtForm").reset();
                    $('#paidAmountModal .close').click();
                },
                error: function(error) {

                },
                complete: function () {
                    // Re-enable button after AJAX completes (success or error)
                    if (submitBtn) {
                        submitBtn.disabled = false;
                        submitBtn.innerText = 'Save';
                    }
                }
            });
        });

        function editIPA(id, prop_id, paid_name, paid_type, paid_amount, paid_percentOf, paid_date, paid_remarks, paid_inLoan){
            $('#itemizedPaidAmtIDEdit').val(id);
            $('#itemizedPaidAmtPropertyIDEdit').val(prop_id);
            $('#itemizedPaidAmtNameEdit').val(paid_name);
            $('#itemizedPaidAmtTypeEdit').val(paid_type);

            if(paid_type == 'amount'){
                $('#itemizedPaidAmtAmountEdit').val(paid_amount);
                document.getElementById("tabButton-amountEdit").classList.add("active");
                document.getElementById("tabButton-percentEdit").classList.remove("active");
                document.getElementById("tab-amountEdit").classList.add("active");
                document.getElementById("tab-percentEdit").classList.remove("active");
            }
            else{
                $('#itemizedPaidAmtPercentEdit').val(paid_amount);
                $("#itemizedPaidAmtPercentOfEdit").val(paid_percentOf).trigger('change');
                document.getElementById("tabButton-amountEdit").classList.remove("active");
                document.getElementById("tabButton-percentEdit").classList.add("active");
                document.getElementById("tab-amountEdit").classList.remove("active");
                document.getElementById("tab-percentEdit").classList.add("active");
            }

            $('#itemizedPaidAmtDateEdit').val(paid_date);
            $('#itemizedPaidAmtRemarkEdit').val(paid_remarks);
            $('#itemizedPaidAmtInLoanEdit').val(paid_inLoan);
            if(paid_inLoan == 1){
                $('#paidAmtInLoanYesEdit').css('color','blue');
                $('#paidAmtInLoanNoEdit').css('color','black');
            }
            if(paid_inLoan == 0){
                $('#paidAmtInLoanYesEdit').css('color','black');
                $('#paidAmtInLoanNoEdit').css('color','blue');
            }

            // $('#paidAmountModalEdit').modal('show');
        }

        // Get the form element by id
        var formEdit = document.getElementById("itemizedPaidAmtFormEdit");
        // Add a submit event listener to the form element
        formEdit.addEventListener("submit", function(event) {
            // Prevent the default form submission behavior
            event.preventDefault();

            const submitBtn = formEdit.querySelector("button[type='submit']");
            if (submitBtn) {
                submitBtn.disabled = true;
                submitBtn.innerText = 'Saving...';
            }

            // Get the form data as an object
            const TotalLoanAmount = calculateLoanAmount();
            var data = {"TotalLoanAmount" : TotalLoanAmount};
            var inputs = formEdit.querySelectorAll("input, textarea, select");
            for (var i = 0; i < inputs.length; i++) {
                data[inputs[i].name] = inputs[i].value;
            }
            
            // check if the loans exists for calculating items amount on the basis of % of loans
            if(data["itemizedPaidAmtPercentOf"] == "loan" && TotalLoanAmount <= 0){
                alert("No Loan Found for % of Loan calculation");
                return;
            }
            
            paidAmtURL = '{{url('')}}' + '/EditItemizedPaidAmount';
            // Send the form data using ajax
            $.ajax({
                url: paidAmtURL,
                type: form.method,
                dataType: "json",
                data: data,
                success: function(response) {
                    updateTotalPaidAmountDivAllItemized(response.totalAmount)
                    // $('#totalPaidAmountInput2').val(response.totalAmount);
                    $('#itemized_paid_amount_content').html(response.view);
                    // Close the modal popup
                    document.getElementById("itemizedPaidAmtFormEdit").reset();
                    $('#paidAmountModalEdit .close').click();
                },
                error: function(error) {
                },
                complete: function () {
                    // Re-enable button after AJAX completes (success or error)
                    if (submitBtn) {
                        submitBtn.disabled = false;
                        submitBtn.innerText = 'Save';
                    }
                }
            });
        });

        function deleteIPA(id, amount,paidInLoan){
            if(confirm('do you want to delete this entry?')){
                paidAmtURL = '{{url('')}}' + '/deletePaidAmountMainProperty';
                $.ajax({
                    url: paidAmtURL,
                    type: "POST",
                    dataType: "json",
                    data: {
                        _token: '{{ csrf_token() }}',
                        id: id,
                        propertyID: <?=$propertyID?>,
                        TotalLoanAmount: calculateLoanAmount()
                    },
                    success: function(response) {
                        updateTotalPaidAmountDivAllItemized(response.totalAmount)
                        // $('#totalPaidAmountInput2').val(response.totalAmount);
                        $('#itemized_paid_amount_content').html(response.view);
                    },
                    error: function(error) {
                        console.log(error);
                    }
                });
            }
        }

        function RollIntoLoan(formAction,action){
            if(formAction == 'Edit'){
                if(action == 'Yes'){
                    $('#itemizedPaidAmtInLoanEdit').val(1);
                    $('#paidAmtInLoanYesEdit').css('color', 'blue');
                    $('#paidAmtInLoanNoEdit').css('color', 'black');
                }
                if(action == 'No'){
                    $('#itemizedPaidAmtInLoanEdit').val(0);
                    $('#paidAmtInLoanNoEdit').css('color', 'blue');
                    $('#paidAmtInLoanYesEdit').css('color', 'black');
                }
            }

            if(formAction == 'Create'){
                if(action == 'Yes'){
                    $('#itemizedPaidAmtInLoan').val(1);
                    $('#paidAmtInLoanYesCreate').css('color', 'blue');
                    $('#paidAmtInLoanNoCreate').css('color', 'black');
                }

                if(action == 'No'){
                    $('#itemizedPaidAmtInLoan').val(0);
                    $('#paidAmtInLoanNoCreate').css('color', 'blue');
                    $('#paidAmtInLoanYesCreate').css('color', 'black');
                }
            }
        }
    // =================================== PAID AMOUNT COST ===================================

    // =================================== PURCHASE AMOUNT COST ===============================
        function financeCostRollIntoLoan(formAction,action){
            if(formAction == 'Create'){
                if(action == 'Yes'){
                    $('#itemizedfinanceCostInLoan').val(1);
                    $('#financeCostInLoanCreateYes').css('color', 'blue');
                    $('#financeCostInLoanCreateNo').css('color', 'black');
                }
                if(action == 'No'){
                    $('#itemizedfinanceCostInLoan').val(0);
                    $('#financeCostInLoanCreateYes').css('color', 'black');
                    $('#financeCostInLoanCreateNo').css('color', 'blue');
                }
            }

            if(formAction == 'Edit'){
                if(action == 'Yes'){
                    $('#financeCostInLoanEdit').val(1);
                    $('#financeCostInLoanEditYes').css('color', 'blue');
                    $('#financeCostInLoanEditNo').css('color', 'black');
                }
                if(action == 'No'){
                    $('#financeCostInLoanEdit').val(0);
                    $("#financeCostInLoanEditNo").css('color', 'blue');
                    $('#financeCostInLoanEditYes').css('color', 'black');
                }
            }
        }
        
        
        function purchaseCostRollIntoLoan(formAction,action){
            if(formAction == 'Create'){
                if(action == 'Yes'){
                    $('#itemizedpurchaseCostInLoan').val(1);
                    $('#purchaseCostInLoanCreateYes').css('color', 'blue');
                    $('#purchaseCostInLoanCreateNo').css('color', 'black');
                }
                if(action == 'No'){
                    $('#itemizedpurchaseCostInLoan').val(0);
                    $('#purchaseCostInLoanCreateYes').css('color', 'black');
                    $('#purchaseCostInLoanCreateNo').css('color', 'blue');
                }
            }

            if(formAction == 'Edit'){
                if(action == 'Yes'){
                    $('#itemizedpurchaseCostInLoanEdit').val(1);
                    $('#purchaseCostInLoanEditYes').css('color', 'blue');
                    $('#purchaseCostInLoanEditNo').css('color', 'black');
                }
                if(action == 'No'){
                    $('#itemizedpurchaseCostInLoanEdit').val(0);
                    $("#purchaseCostInLoanEditNo").css('color', 'blue');
                    $('#purchaseCostInLoanEditYes').css('color', 'black');
                }
            }
        }

        // Get the form element by id
        var pformEdit = document.getElementById("itemizedPurchasedAmtFormEdit");
        // Add a submit event listener to the form element
        pformEdit.addEventListener("submit", function(event) {
            // Prevent the default form submission behavior
            event.preventDefault();

            const submitBtn = pformEdit.querySelector("button[type='submit']");
            if (submitBtn) {
                submitBtn.disabled = true;
                submitBtn.innerText = 'Saving...';
            }

            // Get the form data as an object
            const TotalLoanAmount = calculateLoanAmount();
            var data = {"TotalLoanAmount" : TotalLoanAmount};
            var inputs = pformEdit.querySelectorAll("input, textarea, select");
            for (var i = 0; i < inputs.length; i++) {
                data[inputs[i].name] = inputs[i].value;
            }
            
            // check if the loans exists for calculating items amount on the basis of % of loans
            if(data["itemizedPaidAmtPercentOf"] == "loan" && TotalLoanAmount <= 0){
                alert("No Loan Found for % of Loan calculation");
                return;
            }
            
            paidAmtURL = '{{url('')}}' + '/EditItemizedPurchasedAmount';
            // Send the form data using ajax
            $.ajax({
                url: paidAmtURL,
                type: pformEdit.method,
                dataType: "json",
                data: data,
                success: function(response) {
                    $('#itemized_purchase_amount_content').html(response.view);
                    $('#totalPurchasedAmountInput2').val(response.totalAmount);
                    document.getElementById("itemizedPurchasedAmtFormEdit").reset();
                    $('#PurchasedAmountModalEdit .close').click();
                    $('#PurchasedAmountModalEdit').modal('hide');
                },
                error: function(error) {
                    // If the response is an error, add a div with a message
                    // var div = document.createElement("div");
                    // div.className = "alert alert-danger";
                    // div.innerHTML = "Form save failed: " + error.message;
                    // form.appendChild(div);
                },
                complete: function () {
                    // Re-enable button after AJAX completes (success or error)
                    if (submitBtn) {
                        submitBtn.disabled = false;
                        submitBtn.innerText = 'Save';
                    }
                }
            });
        });

        // Get the form element by id
        var pform = document.getElementById("itemizedPurchasedAmtForm");
        // Add a submit event listener to the form element
        pform.addEventListener("submit", function(event) {
            // Prevent the default form submission behavior
            event.preventDefault();

            const submitBtn = pform.querySelector("button[type='submit']");
            if (submitBtn) {
                submitBtn.disabled = true;
                submitBtn.innerText = 'Saving...';
            }

            // Get the form data as an object
            var form = document.forms["ipaf"]; // Access the form by its name attribute
            const TotalLoanAmount = calculateLoanAmount();
            var data = {"TotalLoanAmount" : TotalLoanAmount};
            for (var i = 0; i < form.elements.length; i++) {
                var input = form.elements[i];
                if (input.name) { // Ensure the input has a 'name' attribute
                    data[input.name] = input.value;
                }
            }
            
            // check if the loans exists for calculating items amount on the basis of % of loans
            if(data["itemizedPaidAmtPercentOf"] == "loan" && TotalLoanAmount <= 0){
                alert("No Loan Found for % of Loan calculation");
                return;
            }
            
            // console.log(data);
            paidAmtURL = '{{url('')}}' + '/addItemizedPurchasedAmount';
            // Send the form data using ajax
            $.ajax({
                url: paidAmtURL,
                type: pform.method,
                dataType: "json",
                data: data,
                success: function(response) {
                    $('#itemized_purchase_amount_content').html(response.view);
                    $('#totalPurchasedAmountInput2').val(response.totalAmount);
                    document.getElementById("itemizedPurchasedAmtForm").reset();
                    $('#purchaseCostModal .close').click();
                },
                error: function(error) {
                    // If the response is an error, add a div with a message
                    // var div = document.createElement("div");
                    // div.className = "alert alert-danger";
                    // div.innerHTML = "Form save failed: " + error.message;
                    // form.appendChild(div);
                },
                complete: function () {
                    // Re-enable button after AJAX completes (success or error)
                    if (submitBtn) {
                        submitBtn.disabled = false;
                        submitBtn.innerText = 'Save';
                    }
                }
            });
        });

        function deleteDPAMP(id, amount) {
        if (confirm('Do you want to delete this entry?')) {
            var paidAmtURL = "{{ url('deletePurchasedAmountMainProperty') }}"; // Corrected URL generation

            $.ajax({
                url: paidAmtURL,
                type: "POST",
                dataType: "json",
                data: {
                    _token: '{{ csrf_token() }}', // CSRF token for security
                    id: id,
                    propertyID: {{ $propertyID }}, // Pass the property ID dynamically
                    TotalLoanAmount: calculateLoanAmount()
                },
                success: function(response) {
                    if (response.success) {
                        // Update the content and inputs based on the response
                        $('#itemized_purchase_amount_content').html(response.view);
                        $('#totalPurchasedAmountInput2').val(response.totalAmount);
                    } else {
                        alert(response.message || 'An error occurred while processing your request.');
                    }
                },
                error: function(xhr, status, error) {
                    console.error('Error:', xhr.responseText || error);
                    alert('An error occurred. Please try again.');
                }
            });
        }
    }

    // =================================== PURCHASE AMOUNT COST ===============================

    function financetodownconversion(row){
        var labelfinance = $('.finance_label_'+row).text();
        var price_financing =  $('.price_financing_'+row).val();
        var reverse_amount = 100 - price_financing;
        if(labelfinance=='Price Financing'){
            $('.finance_label_'+row).text('Price Down Payment');
            $('.finance-toggle-text_'+row).html(price_financing+'% Financed <i class="  fa  fa-exchange text-primary"></i>');
            $('.price_financing_'+row).val(reverse_amount);
        }else{
                $('.finance_label_'+row).text('Price Financing');

            $('.finance-toggle-text_'+row).html(price_financing+'% Down Payment <i class="  fa  fa-exchange text-primary"></i>');
            $('.price_financing_'+row).val(reverse_amount);

        }
    }

    function exchangerate(vals,row){
        if(vals>100){
            $('.price_financing_'+row).val(100);
            $('#price_financing_'+row).val(100);
            vals = 100;
        }

        if(vals<0){
            $('.price_financing_'+row).val(0);
            $('#price_financing_'+row).val(0);
            vals = 0;
        }
        var reverse_amount = 100 - vals;
        var labelfinance = $('.finance_label_'+row).text();
        if(labelfinance=='Price Financing'){
            // update loan percent amount in hidden field too, for consistency while saving loan amount in database
            $('#price_financing_'+row).val(vals);
            
            $('.finance-toggle-text_'+row).html(reverse_amount+'% Down Payment <i class="  fa  fa-exchange text-primary"></i>');
        }else{
            // update loan percent reverse amount in hidden field too
            $('#price_financing_'+row).val(reverse_amount);
            
            $('.finance-toggle-text_'+row).html(reverse_amount+'% Financed <i class="  fa  fa-exchange text-primary"></i>');
        }
        
    }

    function addmoreloan(){
        var divcount = $('.loanouterelement').length;
        divcount = divcount+1;
        paidAmtURL = '{{url('')}}' + '/get-new-loanblock/'+divcount;
        // Send the form data using ajax
        $.ajax({
            url: paidAmtURL,
            type: 'Get',
            success: function(response) {
                $('.addmoreloanbtn').prepend(response);
            },
            error: function(error) {
                // If the response is an error, add a div with a message
                // var div = document.createElement("div");
                // div.className = "alert alert-danger";
                // div.innerHTML = "Form save failed: " + error.message;
                // form.appendChild(div);
            }
        });
    }

    // function setLoanTypeOptions(vals,option){
    //   /* if(vals=='1'){
    //         $('.mortgagebox_'+option).show();
    //     }else{
    //         $('.mortgagebox_'+option).hide();
    //     }*/
    // }

    $(function(){
        $(".datePickerDefault").datepicker();
    });
    $("#toggle").on('change', function() {
        $("#financeToggleDiv").toggle();
    });
    
    $("#toggle11").on('change', function() {
        $("#itemisedPaidAmount").toggle();
    
        if ($(this).is(":checked")) {
            // Toggle is ON – make input readonly
            $("#totalPaidAmountInput2").prop("readonly", true);
            
            // Get text from span and trim it
            let updateTotalValue = parseFloat($("#totalItemizedPaidAmt").text().replace(/,/g, '').trim()) || 0;
            
            // Update input with the value from span
            if(updateTotalValue){
                $("#totalPaidAmountInput2").val(updateTotalValue);
            }
        } else {
            // Toggle is OFF – make input editable
            $("#totalPaidAmountInput2").prop("readonly", false);
        }
    });
    
    $("#toggle13").on('change', function() {
        $("#itemisedPurchaseCost").toggle();
        $(".pce_amount").toggle();
        $(".pce_percent").toggle();
    });
    $("#toggle14").on('change', function() {
        $("#itemisedRefinanceCost").toggle();
        $(".rfc_amount").toggle();
        $(".rfc_percent").toggle();
        $("#prop_costPercent_input").val(0);
        getFinanceCoust();
    });

    function updateTotalPaidAmountDiv(val){
        $('#totalPaidAmountDiv').text('₹ ' + val)
        $('#totalPaidAmountInput').val(val)
    }

    function updateTotalPaidAmountDivAllItemized(val){
        $('#totalPaidAmountDiv').text('₹ ' + val)
        $('#totalPaidAmountInput').val(val)
        $('#totalPaidAmountInput2').val(val)
        $("#totalItemizedPaidAmt").text(val);
    }

    function updateTotalPurchasedAmountDiv(val){
        $('#totalPurchasedAmountInput').val(val)
    }

    @if(Session::has('success'))
        function load(){
            $('#successModal').modal('show');
        }
        window.onload = load;
    @endif
</script>
<script>
    $('.tabLinkPaidAmt').click(function() {
        var tabID = $(this).attr('data-tab');
        $(this).addClass('active').siblings().removeClass('active');
        $('#tab-' + tabID).addClass('active').siblings().removeClass('active');

        // update hidden value of paid amount form
        $("#itemizedPaidAmtType").val(tabID);
    });

    $('.tabLinkPaidAmtEdit').click(function() {
        var tabID = $(this).attr('data-tab');
        $(this).addClass('active').siblings().removeClass('active');
        $('#tab-' + tabID + 'Edit').addClass('active').siblings().removeClass('active');

        // update hidden value of paid amount form
        $("#itemizedPaidAmtTypeEdit").val(tabID);
    });

</script>

<script>
    $('.tabLinkPurchasedAmt').click(function() {
        var tabID = $(this).attr('data-tab');
        $(this).addClass('active').siblings().removeClass('active');
        $('#tab-' + tabID).addClass('active').siblings().removeClass('active');

        // update hidden value of paid amount form
        if(tabID=='purchasedamount'){
            tabID = 'amount';
        }
        else{
            tabID = 'percent';
        }
            $("#itemizedPurchasedAmtType").val(tabID);
    });
    
    // financial cost type switcher
    $('.tabLinkFinancialCost').click(function() {
        var tabID = $(this).attr('data-tab');
        $(this).addClass('active').siblings().removeClass('active');
        $('#tab-' + tabID).addClass('active').siblings().removeClass('active');

        // update hidden value of paid amount form
        if(tabID=='purchasedamount'){
            tabID = 'amount';
        }else{
            tabID = 'percent';
        }
        $("#itemizedFinancialCostType").val(tabID);
    });
    $('.tabLinkFinancialCostEdit').click(function() {
        var tabID = $(this).attr('data-tab');
        $(this).addClass('active').siblings().removeClass('active');
        $('#tab-' + tabID).addClass('active').siblings().removeClass('active');

        // update hidden value of paid amount form
        if(tabID=='rc-amount'){
            tabID = 'amount';
        }else{
            tabID = 'percent';
        }
        $("#itemizedFinancialCostTypeEdit").val(tabID);
    });
    
    // purchased cost type switcher
    $('.tabLinkPurchasedCostAmt').click(function() {
        var tabID = $(this).attr('data-tab');
        $(this).addClass('active').siblings().removeClass('active');
        $('#tab-' + tabID).addClass('active').siblings().removeClass('active');

        // update hidden value of paid amount form
        if(tabID=='cost-amount'){
            tabID = 'amount';
        }else{
            tabID = 'percent';
        }
        $("#purchaseCostTypeEditID").val(tabID);
    });
    $('.pc_add').click(function() {
        var tabID = $(this).attr('data-tab');
        $(this).addClass('active').siblings().removeClass('active');
        $('#tab-' + tabID).addClass('active').siblings().removeClass('active');

        // update hidden value of paid amount form
        if(tabID=='pc-amount'){
            tabID = 'amount';
        }else{
            tabID = 'percent';
        }
        $("#purchaseCostTypeID").val(tabID);
    });



function editFinanceCost(id, prop_id, paid_name, paid_type, paid_amount, paid_percentOf, paid_date, paid_remarks, paid_inLoan){
    // alert(paid_remarks);
    $('#itemizedfinanceCostAmtIDEdit').val(id);
    $('#itemizedfinanceCostAmtPropertyIDEdit').val(prop_id);
    $('#itemizedfinanceCostAmtNameEdit').val(paid_name);
    $('#itemizedFinancialCostTypeEdit').val(paid_type);
    $('#itemizedfinanceCostAmtDateEdit').val(paid_date);

    if(paid_type == 'amount'){
        $('#itemizedfinanceCostAmtAmountEdit').val(paid_amount);
        document.getElementById("tabButton-rc-amount").classList.add("active");
        document.getElementById("tabButton-rc-percent").classList.remove("active");
        document.getElementById("tab-rc-amount").classList.add("active");
        document.getElementById("tab-rc-percent").classList.remove("active");
    }else{
        $('#itemizedfinanceCostAmtPercentEdit').val(paid_amount);
        $("#itemizedfinanceCostAmtPercentOfEdit").val(paid_percentOf).trigger('change');
        document.getElementById("tabButton-rc-amount").classList.remove("active");
        document.getElementById("tabButton-rc-percent").classList.add("active");
        document.getElementById("tab-rc-amount").classList.remove("active");
        document.getElementById("tab-rc-percent").classList.add("active");
    }

    // $('#itemizedfinanceCostAmtDateEdit').val(paid_date);
    $('#itemizedfinanceCostAmtRemarkEdit').val(paid_remarks);
    $('#financeCostInLoanEdit').val(paid_inLoan);
    if(paid_inLoan == 1){
        $('#financeCostInLoanEditYes').css('color','blue');
        $('#financeCostInLoanEditNo').css('color','black');
    }
    if(paid_inLoan == 0){
        $('#financeCostInLoanEditYes').css('color','black');
        $('#financeCostInLoanEditNo').css('color','blue');
    }

    // var modalElement = document.getElementById('financeCostModalEdit');
    // var modalInstance = new bootstrap.Modal(modalElement, {
    //     backdrop: 'static', // Optional: prevents closing by clicking outside the modal
    //     keyboard: false     // Optional: prevents closing with the ESC key
    // });
    // modalInstance.show();
}







</script>

<script>
    // ===================================GET FINACE COSTS ===================================
    function getFinanceCoust(){
    var paidAmtURL = '{{url('')}}' + '/getItemizedFinancingCost';

    // Send the form data using ajax with GET request
    $.ajax({
        url: paidAmtURL,
        type: "POST", // Set method to GET
        dataType: "json",
        data: {
            _token: '{{ csrf_token() }}',
            property_id: <?=$propertyID?>,
            TotalLoanAmount: calculateLoanAmount()
        },
        success: function(response) {
            // Update the UI with the response data
            $('#refinance_cost_content').html(response.view);
            // $('#totalFinanceAmountInput2').val(response.totalAmount);
                    
            // update total on all fields
            $('#totalItemizedFinancialCostAmt').val(response.totalAmount);
            $('#totalFinanceAmountInput2').val(response.totalAmount);
        },
        error: function(error) {
            console.error("Error occurred:", error);
        }
    });

     }
    // ===================================GET FINACE COSTS ===================================
    // =================================== FINACE COSTS ===================================
        // Get the form element by id
        var pform = document.getElementById("itemizedfinanceAmtForm");
        // Add a submit event listener to the form element
        pform.addEventListener("submit", function(event) {
            // Prevent the default form submission behavior
            event.preventDefault();

            const submitBtn = pform.querySelector("button[type='submit']");
            if (submitBtn) {
                submitBtn.disabled = true;
                submitBtn.innerText = 'Saving...';
            }

            // Get the form data as an object
            var data = {"TotalLoanAmount" : calculateLoanAmount()};
            var inputs = pform.querySelectorAll("input, textarea, select");
            for (var i = 0; i < inputs.length; i++) {
                data[inputs[i].name] = inputs[i].value;
            }
            paidAmtURL = '{{url('')}}' + '/addItemizedFinancingCost';
            // Send the form data using ajax
            $.ajax({
                url: paidAmtURL,
                type: pform.method,
                dataType: "json",
                data: data,
                success: function(response) {
                    $('#refinance_cost_content').html(response.view);
                    
                    // update total on all fields
                    $('#totalItemizedFinancialCostAmt').val(response.totalAmount);
                    $('#totalFinanceAmountInput2').val(response.totalAmount);
            
                    document.getElementById("itemizedfinanceAmtForm").reset();
                    $('#financeCostModal .close').click();
                },
                error: function(error) {
                },
                complete: function () {
                    // Re-enable button after AJAX completes (success or error)
                    if (submitBtn) {
                        submitBtn.disabled = false;
                        submitBtn.innerText = 'Save';
                    }
                }
            });
        });
        // Get the form element by id

        var rc_formEdit = document.getElementById("itemizedfinanceAmtFormEdit");
        // Add a submit event listener to the form element
        rc_formEdit.addEventListener("submit", function(event) {
            // Prevent the default form submission behavior
            event.preventDefault();

            const submitBtn = rc_formEdit.querySelector("button[type='submit']");
            if (submitBtn) {
                submitBtn.disabled = true;
                submitBtn.innerText = 'Saving...';
            }

            // Get the form data as an object
            var data = {"TotalLoanAmount" : calculateLoanAmount()};
            var inputs = rc_formEdit.querySelectorAll("input, textarea, select");
            for (var i = 0; i < inputs.length; i++) {
                data[inputs[i].name] = inputs[i].value;
            }
            // console.log(data);
            paidAmtURL = '{{url('')}}' + '/EditItemizedFinancingCost';
            // Send the form data using ajax
            $.ajax({
                url: paidAmtURL,
                type: rc_formEdit.method,
                dataType: "json",
                data: data,
                success: function(response) {
                    $('#refinance_cost_content').html(response.view);
                    $('#totalfinanceCostAmountInput2').val(response.totalAmount);
                    
                    // update total on all fields
                    $('#totalItemizedFinancialCostAmt').val(response.totalAmount);
                    $('#totalFinanceAmountInput2').val(response.totalAmount);
                    
                    $('#financeCostModalEdit .close').click();
                },
                error: function(error) {
                    // If the response is an error, add a div with a message
                    // var div = document.createElement("div");
                    // div.className = "alert alert-danger";
                    // div.innerHTML = "Form save failed: " + error.message;
                    // form.appendChild(div);
                },
                complete: function () {
                    // Re-enable button after AJAX completes (success or error)
                    if (submitBtn) {
                        submitBtn.disabled = false;
                        submitBtn.innerText = 'Save';
                    }
                }
            });
        });
        function deleteIPURA(id, amount){
            if(confirm('do you want to delete this entry?')){
                paidAmtURL = '{{url('')}}' + '/deleteFinancingCostMainProperty';
            $.ajax({
                url: paidAmtURL,
                type: "POST",
                dataType: "json",
                data: {
                    _token: '{{ csrf_token() }}',
                    id: id,
                    propertyID: <?=$propertyID?>,
                    TotalLoanAmount: calculateLoanAmount()
                },
                success: function(response) {
                    $('#refinance_cost_content').html(response.view);
                    
                    // update total on all fields
                    $('#totalItemizedFinancialCostAmt').val(response.totalAmount);
                    $('#totalFinanceAmountInput2').val(response.totalAmount);
                },
                error: function(error) {
                    console.log(error);
                }
            });
            }

        }

        function editDPAMP(id, prop_id, paid_name, paid_type, paid_amount, paid_percentOf, paid_date, paid_remarks, paid_inLoan){
            // alert(prop_id);
            $('#itemizedPurchasedAmtIDEdit').val(id);
            $('#itemizedPurchasedAmtPropertyIDEdit').val(prop_id);
            $('#itemizedPurchasedAmtNameEdit').val(paid_name);
            $('.itemizedPurchasedcostAmtType').val(paid_type);

            if(paid_type == 'amount'){
                $('#itemizedPurchasedAmtAmountEdit').val(paid_amount);
                document.getElementById("tabButton-cost-amount").classList.add("active");
                document.getElementById("tabButton-cost-percent").classList.remove("active");
                document.getElementById("tab-cost-amount").classList.add("active");
                document.getElementById("tab-cost-percent").classList.remove("active");
            }
            else{
                $('#itemizedPurchasedAmtPercentEdit').val(paid_amount);
                $("#itemizedPurchasedAmtPercentOfEdit").val(paid_percentOf).trigger('change');
                document.getElementById("tabButton-cost-amount").classList.remove("active");
                document.getElementById("tabButton-cost-percent").classList.add("active");
                document.getElementById("tab-cost-amount").classList.remove("active");
                document.getElementById("tab-cost-percent").classList.add("active");
            }

            $('#itemizedPurchasedAmtDateEdit').val(paid_date);
            $('#itemizedPurchasedAmtRemarkEdit').val(paid_remarks);
            $('#itemizedpurchaseCostInLoanEdit').val(paid_inLoan);
            if(paid_inLoan == 1){
                $('#purchaseCostInLoanEditYes').css('color','blue');
                $('#purchaseCostInLoanEditNo').css('color','black');
            }
            if(paid_inLoan == 0){
                $('#purchaseCostInLoanEditYes').css('color','black');
                $('#purchaseCostInLoanEditNo').css('color','blue');
            }

            $('#PurchasedAmountModalEdit').modal('show');
        }
    // =================================== Purchase COSTS ===================================
</script>

@include('front.layouts.footer')
<script>
    function updatePrice(){
        var post_url = '{{url('')}}' + '/update-finance-price';
        var basicPurchasePrice = $('#basicPurchasePrice').val();
        var actualPaidAmount = $('#totalPaidAmountInput').val();
        var basicSalePrice = $('#basicSalePrice').val();
        var prop_sale_discount = $('#prop_sale_discount').val();
        var closingCostEstimatePercent = $('#closingCostEstimatePercent').val();
        // alert(basicPurchasePrice);
        // alert(prop_sale_discount);
        $.ajax({
            url: post_url,
            type: "POST",
            dataType: "json",
            data: {
                _token: '{{ csrf_token() }}',
                basicPurchasePrice: basicPurchasePrice,
                actualPaidAmount: actualPaidAmount,
                basicSalePrice: basicSalePrice,
                prop_sale_discount: prop_sale_discount,
                closingCostEstimatePercent: closingCostEstimatePercent,
                prop_id: <?=$propertyID?>
            },
            success: function(response) {
                // $('#refinance_cost_content').html(response.view);
                // $('#totalFinanceAmountInput2').val(response.totalAmount)
            },
            error: function(error) {
                console.log(error);
            }
        });
    }
    
    function calculateLoanAmount() {
        let totalLoanAmount = 0;
    
        // Get base values for calculations
        const basicPurchasePrice = parseFloat($("input[name='basicPurchasePrice']").val()) || 0;
        const prop_sale_discount = parseFloat($("input[name='prop_sale_discount']").val()) || 0;
        
        // Calculate discount amount and subtract from base price
        const actualPurchasePrice = basicPurchasePrice * (1 - ((prop_sale_discount / 100)));

        const basicSalePrice = parseFloat($("input[name='basicSalePrice']").val()) || 0;
        let loanAmount = 0;
        // Loop through each loan entry using price financing percent
        $("input[name='price_financing[]']").each(function(index) {
            const financingPercent = parseFloat($(this).val()) || 0;
            const loanType = $("select[name='financingof[]']").eq(index).val();
    
            let baseAmount = 0;
    
            switch (loanType) {
                case 'Purchase Price':
                    baseAmount = actualPurchasePrice;
                    loanAmount = (baseAmount * financingPercent) / 100;
                    break;
                case 'Improvement Cost':
                case 'Price and Improvement Cost':
                    alert(`Loan ${index + 1}: Improvement Cost calculation is not yet available.`);
                    return;
                case 'Basic Sale Price':
                    baseAmount = basicSalePrice;
                    loanAmount = (baseAmount * financingPercent) / 100;
                    break;
                case 'Custom Amount':
                    let customAmountInput = document.querySelector(`.custom_amount_input_${index + 1}`);
                    loanAmount = customAmountInput ? parseFloat(customAmountInput.value) : 0;
                    break;
                default:
                    alert(`Loan ${index + 1}: Unknown loan type.`);
                    return;
            }
    
            // take tha base amount for each loan and use price_financing percent to calculate Total Loan amount
            // console.log("loanAmount: " + loanAmount);
            totalLoanAmount += loanAmount;
            // console.log("totalLoanAmount: " + totalLoanAmount);
        });
    
        console.log("Total Loan Amount: " + totalLoanAmount.toFixed(2));
        return totalLoanAmount.toFixed(2);
    }
    
    <?php if(count($itemRefinanceCost)) { ?>
    $(document).ready(function() {
        getFinanceCoust();
    });
    <?php } ?>
    
    
    function setLoanTypeOptions(type, itemNo) {
        // Select the correct radio button and check it manually
        const radioId = `loan_type_opt${type}_${itemNo}`;
        const radio = document.getElementById(radioId);
        if (radio) {
            radio.checked = true;
        }
    
        // Remove 'active' class from both tab links
        const container = document.querySelector(`.loan-type-selector[data-item="${itemNo}"]`);
        if (container) {
            const tabs = container.querySelectorAll('.tab-link');
            tabs.forEach(tab => tab.classList.remove('active'));
    
            // Add active class to the selected tab
            const selectedTab = document.querySelector(`#${radioId}`).closest('.tab-link');
            if (selectedTab) selectedTab.classList.add('active');
        }
    }

</script>
<script>
function handleFinancingSelector(itemNo) {
    const select = document.querySelector(`.financingof_${itemNo}`);
    const priceFinancingGroup = document.querySelector(`.price_financing_${itemNo}`).closest('.form-group');
    const customAmountGroup = document.querySelector(`.custom_amount_group_${itemNo}`);

    if (select.value === "Custom Amount") {
        if (priceFinancingGroup) priceFinancingGroup.style.display = "none";
        if (customAmountGroup) customAmountGroup.style.display = "block";
    } else {
        if (priceFinancingGroup) priceFinancingGroup.style.display = "block";
        if (customAmountGroup) customAmountGroup.style.display = "none";
    }
}
</script>
<script>
    $(document).ready(function () {
        // Restrict input to only valid float numbers
        $(document).on('input', '.validateFloatInput', function () {
            let val = $(this).val();

            // Allow only numbers and at most one decimal point
            // remove non-numeric and non-dot
            val = val.replace(/[^0-9.]/g, '')
                    // allow only 1 dot
                    .replace(/(\..*?)\..*/g, '$1');

            $(this).val(val);
        });

        // remove extra leading zeros
        $(document).on('blur', '.validateFloatInput', function () {
            let val = $(this).val();
            if (val && !isNaN(val)) {
                $(this).val(parseFloat(val));
            }
        });
    });
</script>