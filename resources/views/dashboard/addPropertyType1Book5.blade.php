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
					<h2>Refinace & Cash Out</h2>
					<span class="set_vedioo" data-toggle="modal" data-target="#videotutorialmodal"><a href="javascript:void(0);"><img src="{{ asset('img/video-tutorial-new.png') }}"> </a></span>
				 </div>
				</div>
			
			
                <div class="col-lg-12">
                    <form id="propertyPageForm2" method="POST" action="{{url('savePropertyType1ReFinancingCost')}}" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="propertyID" value="{{ $propertyID }}">
                        <input type="hidden" id="basicPurchasePrice" value="{{ $MainProperty->prop_purchasePrice }}">
                        @if(Session::has('success'))
                            <div class="alert alert-success">
                                {{Session::get('success')}}
                            </div>
                        @endif
                        <!---<div class=" " data-toggle="modal" data-target="#videotutorialmodal"  style="float: right;position: relative;top: -5px;left: 0px;display: inline-block;">
                            <a href="#">
                                <img src="{{ asset('img/video-tutorial-new.png') }}" style="width: 85px;">.
                            </a>
                        </div>--->
                        <!-- Financing (Purchase) -->
                        <div id="financeToggleDiv"  >
                            <div class="hd_res_listsss">
                                <h2>Financing (Refinance)</h2>
                            </div>
                            <div class="all_frm_list loanouterelement loan_block_1">
                                <div class="form-group">
                                    <label>Date of Refinance: <span class="ticck" tooltip="Date of Refinance" flow="down">?</span></label>
                                    <input name="date_of_refinance" id="dateOfRefinance" type="date" required placeholder="DD MM YYYY" value="<?= !empty($MainProperty) ? $MainProperty->date_of_refinance : '';?>" required />
                                </div>

                                <div class="form-group">
                                    <label>Loan Label</label>
                                    <input type="text" class="loan_label_1"  required  name="loan_label" placeholder="Loan Label" value="<?= !empty($ItemPaidAmount) ? $ItemPaidAmount->loan_label : '';?>" />
                                </div>

                                <div class="form-group managsss1">
                                    <label>Refinance After:</label>
                                    <input type="text" name="refinance_after" required onkeypress="return (event.charCode !=8 && event.charCode ==0 || ( event.charCode == 46 || (event.charCode >= 48 && event.charCode <= 57)))" class="loan_term_1" placeholder="Refinance After" value="<?= !empty($ItemPaidAmount) ? $ItemPaidAmount->refinance_after : '';?>" />
                                    <span class="pursntss">Months</span>
                                </div>

                                <div class="form-group">
                                    <label>Current Maket Value- CMS Or Basic Sale Price - BSP <span class="ticck" tooltip="Data Coming Soon" flow="down">?</span></label>
                                    <span class="currencyInputprefix"><?=$currency?></span>
                                    <input readonly class="currencyInput" type="text" placeholder="Current Maket Value- CMS Or Basic Sale Price - BSP" onkeypress="return (event.charCode !=8 && event.charCode ==0 || ( event.charCode == 46 || (event.charCode >= 48 && event.charCode <= 57)))" value="<?=$MainProperty->prop_salePrice?>" name="basicSalePrice" id="basicSalePrice"/>
                                </div>
                                
                                <div class="form-group">
                                    <label>Financing Of</label>
                                    <select class="slt_areaa_ful financingof_1" name="financingof" onchange="handleFinancingSelector(1)">
                                        <option value="Market Value" @if(isset($ItemPaidAmount) && $ItemPaidAmount->financingof == 'Market Value') selected @endif>Market Value</option>
                                        <option value="Custom Amount" @if(isset($ItemPaidAmount) && $ItemPaidAmount->financingof == 'Custom Amount') selected @endif>Custom Amount</option>
                                    </select>
                                </div>
                                <div class="form-group managsss1">
                                    <label class="finance_label_1">Price Financing</label>
                                    <span class="currencyInputprefix finance_currency_1" style="display:none"><?= $currency ?></span>
                                    <input name="price_financing" max="100" class="currencyInputa price_financing_1" onkeyup="exchangerate(this.value,1)" onkeypress="return (event.charCode !=8 && event.charCode ==0 || ( event.charCode == 46 || (event.charCode >= 48 && event.charCode <= 57)))" type="text" placeholder="Price Financing" value="<?= !empty($ItemPaidAmount) ? $ItemPaidAmount->price_financing : '0';?>" />
                                    <span class="pursntss finance_percent_1">% Market Value</span>
                                    @php
                                        $priceFinacing = !empty($ItemPaidAmount) ? $ItemPaidAmount->price_financing : '0';
                                    @endphp
                                    <span class="sm_txtx text-right finance-toggle-text_1" onclick="financetodownconversion(1)">{{ 100 - $priceFinacing }}% Down Payment <i class="fa fa-exchange text-primary"></i></span>
                                    <span class="sm_txtx">Enter The Down Payment On Purchase Price, Or The Percentage Financed. Click Label To Toggle Input.</span>
                                </div>
                                <div class="form-group custom_amount_group_1" style="display:none;">
                                    <label>Enter Custom Financing Amount</label>
                                    <input type="text" name="custom_amount" 
                                           class="form-control custom_amount_input_1" 
                                           placeholder="Enter custom amount" 
                                           value="{{ $ItemPaidAmount->price_financing ?? '' }}"
                                           onkeypress="return (event.charCode !=8 && event.charCode ==0 || ( event.charCode == 46 || (event.charCode >= 48 && event.charCode <= 57)))">
                                </div>
                                <script>
                                document.addEventListener("DOMContentLoaded", function () {
                                    handleFinancingSelector(1);
                                });
                                </script>
                                <div class="tbss_form_lst mt-4">
                                    <div class="tab-wrapper">
                                        <div class="tbs_hids">Loan Type <span class="ticck" tooltip="Data Coming Soon" flow="down">?</span></div>
                                        <!--<div class="tabs">-->
                                        <!--    <div class="tab-link active" onclick="setLoanTypeOptions(1,1)">-->
                                        <!--        <input name="loan_type" class="loan_type_opt1_1" id="loan_type_opt1_1" checked type="radio" value="1" style=" opacity: 0; width: 0;" >-->
                                        <!--        <label for="loan_type_opt1_1">Amortizing</label>-->
                                        <!--    </div>-->
                                        <!--    <div class="tab-link" onclick="setLoanTypeOptions(2,1)">-->
                                        <!--        <input name="loan_type" class="loan_type_opt2_1" id="loan_type_opt2_1" type="radio" value="2" style="opacity: 0;width: 0;"  >-->
                                        <!--        <label for="loan_type_opt2_1">Interest Only</label>-->
                                        <!--    </div>-->
                                        <!--</div>-->
                                        <div class="tabs loan-type-selector" data-item="1">
                                            <div class="tab-link @if(isset($ItemPaidAmount) && $ItemPaidAmount->loan_type==1) active @endif" onclick="setLoanTypeOptions(1, 1)">
                                                <input type="radio" name="loan_type" id="loan_type_opt1_1"
                                                       class="loan_type_radio_1" value="1" 
                                                       @if(isset($ItemPaidAmount) && $ItemPaidAmount->loan_type==1) checked @endif
                                                        style=" opacity: 0; width: 0;">
                                                <label for="loan_type_opt1_1">Amortizing</label>
                                            </div>
                                        
                                            <div class="tab-link @if(isset($ItemPaidAmount) && $ItemPaidAmount->loan_type==2) active @endif" onclick="setLoanTypeOptions(2, 1)">
                                                <input type="radio" name="loan_type" id="loan_type_opt2_1"
                                                       class="loan_type_radio_1" value="2" 
                                                       @if(isset($ItemPaidAmount) && $ItemPaidAmount->loan_type==2) checked @endif
                                                        style=" opacity: 0; width: 0;">
                                                <label for="loan_type_opt2_1">Interest Only</label>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="content-wrapper">
                                        <div id="tab-1" class="tab-content active">
                                            <div class="choss_araes mt-4 mb-5">
                                                <div class="form-group managsss1">
                                                    <label>Interest Rate:</label>
                                                    <input type="text"  class="interest_rate_1" onkeypress="return (event.charCode !=8 && event.charCode ==0 || ( event.charCode == 46 || (event.charCode >= 48 && event.charCode <= 57)))" name="interest_rate" placeholder="Interest Rate" value="<?= !empty($ItemPaidAmount) ? $ItemPaidAmount->interest_rate : '';?>" />
                                                    <span class="pursntss">%</span>
                                                </div>
                                                <div class="form-group managsss1">
                                                    <label>Loan Term: <span class="ticck" tooltip="Data Coming Soon" flow="down">?</span></label>
                                                    <input type="text" name="loan_term" onkeypress="return (event.charCode !=8 && event.charCode ==0 || ( event.charCode == 46 || (event.charCode >= 48 && event.charCode <= 57)))" class="loan_term_1" placeholder="Loan Term" value="<?= !empty($ItemPaidAmount) ? $ItemPaidAmount->loan_term : '';?>" />
                                                    <span class="pursntss">Years</span>
                                                </div>
                                                <?php /*
                                                <div class="mortgagebox_1">
                                                    <div class="lft_cntts">
                                                        <p>Mortgage Insurance (PMI) <span class="ticck" tooltip="Data Coming Soon" flow="down">?</span></p>
                                                        <span>Enable To Ad Private Mortgage Insurance Payments For This Loan.</span>
                                                    </div>
                                                    <div class="chos_bntt">
                                                        <input type="checkbox" class="toggle mortgage_insurance_1" onChange="$('.mortgagebox2_1').toggle()" name="mortgage_insurance" checked   id="toggle1" />
                                                        <label for="toggle1">
                                                        <span class="on">Yes</span>
                                                        <span class="off">No</span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mortgagebox_1 mortgagebox2_1">
                                                <div class="form-group managsss1">
                                                    <label>Upfront</label>
                                                    <input type="text"name="upfront" onkeypress="return (event.charCode !=8 && event.charCode ==0 || ( event.charCode == 46 || (event.charCode >= 48 && event.charCode <= 57)))" class="upfront_1" placeholder="Upfront" value="<?= !empty($ItemPaidAmount) ? $ItemPaidAmount->upfront : '0';?>" />
                                                    <span class="pursntss">% Of Loan</span>
                                                    <span class="sm_txtx">A One Time PMI Payment That Will Be Added To The Starting Loan Amount.</span>
                                                </div>
                                                <div class="form-group managsss1">
                                                    <label>Recurring</label>
                                                    <input type="text" name="recurring" onkeypress="return (event.charCode !=8 && event.charCode ==0 || ( event.charCode == 46 || (event.charCode >= 48 && event.charCode <= 57)))" class="recurring_1" placeholder="Recurring" value="<?= !empty($ItemPaidAmount) ? $ItemPaidAmount->recurring : '0';?>" />
                                                    <span class="pursntss">0 % Of Loan Per Year</span>
                                                    <span class="sm_txtx">A Recurring PMI Payment That Will Be Added To All Loan Payment</span>
                                                </div>
                                            </div>
                                                */ ?>
                                            </div>
                                        </div>
                                        <div id="tab-2" class="tab-content"></div>
                                    </div>
                                </div>
                            </div>
					    </div>
                        @include('dashboard.refinace_cash_out.refinance_cost.refinance_cost_section',['MainProperty' => $MainProperty])

                        <!-- End Loan Label -->
                        <div class="backk_bntss">
    					    @if (request()->is('properties/new-property/*'))
    					    <a href="{{ url('') }}/properties/new-property/rentout-operate/<?=base64_encode($propertyID)?>">
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

<!-- Modal -->
 <!-- Refinance cost modal -->
 <div class="modal fade" id="financeCostModal" tabindex="-1" role="dialog" aria-labelledby="financeCostModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content all_frm_list">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="font-size: 30px;">
                    <span aria-hidden="true">&times;</span>
                </button>
                <form id="itemizedfinanceAmtForm" method="POST">
                    <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                    <input type="hidden" name="itemizedPurchasedAmtID" id="itemizedPurchasedAmtID" value=""/>
                    <input type="hidden" name="itemizedPurchasedAmtType" id="itemizedPurchasedAmtType" value="amount"/>
                    <input type="hidden" name="itemizedPurchasedAmtPropertyID" value="<?=$propertyID?>"/>
                    <input type="hidden" name="itemizedPurchasedAmtInLoan" id="itemizedPurchasedAmtInLoan" value="0"/>
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="itemizedPurchasedAmtName" id="itemizedPurchasedAmtName" placeholder="Name" value="" required/>
                    </div>
                    <div class="tbss_form_lst mt-4">
                        <div class="tab-wrapper">
                            <div class="tbs_hids">Type</div>
                            <ul class="tabs">
                                <li id="tabButton-amount" class="tabLinkPurchasedAmt active" data-tab="purchasedamount">Set Amount</li>
                                <li id="tabButton-percent" class="tabLinkPurchasedAmt" data-tab="purchasedpercent">Percent</li>
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
                                    <input type="text" name="itemizedPurchasedAmtPercent" id="itemizedPurchasedAmtPercent" placeholder="Percent" value="" class="validateFloatInput" />
                                    <select class="percentOfClass" name="itemizedPurchasedAmtPercentOf" id="itemizedPurchasedAmtPercentOf">
                                    <option value="price">% Of Market Price</option>
                                    <option value="loan">% Of Refinance Loan</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Date</label>
                                <input name="itemizedPurchasedAmtDate" id="" type="date" placeholder="DD MM YYYY" value="" class="" required/>
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
                                                <a id="PurchasedAmtInLoanCreateYes" onclick="PurchaseRollIntoLoan('Create','Yes')">Yes</a>
                                            </li>
                                            <li></li>
                                            <li>
                                                <a id="PurchasedAmtInLoanCreateNo" onclick="PurchaseRollIntoLoan('Create','No')">No</a>
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
                    <input type="hidden" name="itemizedfinanceCostAmtType" id="itemizedfinanceCostAmtTypeEdit" value="amount"/>
                    <input type="hidden" name="itemizedfinanceCostAmtPropertyID" value="<?=$propertyID?>"/>
                    <input type="hidden" name="itemizedfinanceCostAmtInLoan" id="RefinanceCostsCreateRollIntoLoanEdit" value="0"/>
                    <div class="form-group">
                        <label>Name </label>
                        <input type="text" name="itemizedfinanceCostAmtName" id="itemizedfinanceCostAmtNameEdit" placeholder="Name" value="" required/>
                    </div>
                    <div class="tbss_form_lst mt-4">
                        <div class="tab-wrapper">
                            <div class="tbs_hids">Type</div>
                            <ul class="tabs">
                                <li id="tabButton-rc-amount" class="tabLinkPaidAmt active" data-tab="rc-amount">Set Amount</li>
                                <li id="tabButton-rc-percent" class="tabLinkPaidAmt" data-tab="rc-percent">Percent</li>
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
                                    <input type="text" name="itemizedfinanceCostAmtPercent" id="itemizedfinanceCostAmtPercentEdit" placeholder="Percent" value="" class="validateFloatInput" />
                                    <select class="percentOfClass" name="itemizedfinanceCostAmtPercentOf" id="itemizedfinanceCostAmtPercentOfEdit">
                                    <option value="price">% Of Market Price</option>
                                    <option value="loan">% Of Refinance Loan</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Date</label>
                                <input name="itemizedfinanceCostAmtDate" id="itemizedfinanceCostAmtDateEdit" type="date" placeholder="DD MM YYYY" value="" class="" required/>
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
                                                <a id="RefinanceCostsRollIntoLoanEditYes" onclick="RollIntoLoan('RefinanceCosts','Edit','Yes')">Yes</a>
                                            </li>
                                            <li></li>
                                            <li>
                                                <a id="RefinanceCostsRollIntoLoanEditNo" onclick="RollIntoLoan('RefinanceCosts','Edit','No')">No</a>
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
<!-- Modal -->

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
    // =================================== REFINACE COSTS ===================================
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
            paidAmtURL = '{{url('')}}' + '/addItemizedReFinancingCost';
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
            paidAmtURL = '{{url('')}}' + '/EditItemizedReFinancingCost';
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
                paidAmtURL = '{{url('')}}' + '/deleteReFinancingCostMainProperty';
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
    
    function editFinanceCost(id, prop_id, paid_name, paid_type, paid_amount, paid_percentOf, paid_date, paid_remarks, paid_inLoan){
        // alert(paid_remarks);
        $('#itemizedfinanceCostAmtIDEdit').val(id);
        $('#itemizedfinanceCostAmtPropertyIDEdit').val(prop_id);
        $('#itemizedfinanceCostAmtNameEdit').val(paid_name);
        $('#itemizedfinanceCostAmtTypeEdit').val(paid_type);
    
        if(paid_type == 'amount'){
            $('#itemizedfinanceCostAmtAmountEdit').val(paid_amount);
            document.getElementById("tabButton-rc-amount").classList.add("active");
            document.getElementById("tabButton-rc-percent").classList.remove("active");
            document.getElementById("tab-rc-amount").classList.add("active");
            document.getElementById("tab-rc-percent").classList.remove("active");
        }else{
            $('#itemizedfinanceCostAmtPercentEdit').val(paid_amount);
            // $("#itemizedfinanceCostAmtPercentOfEdit").children('[value="'+paid_percentOf+'"]').attr('selected', true);
            $("#itemizedfinanceCostAmtPercentOfEdit").val(paid_percentOf).trigger('change');
            document.getElementById("tabButton-rc-amount").classList.remove("active");
            document.getElementById("tabButton-rc-percent").classList.add("active");
            document.getElementById("tab-rc-amount").classList.remove("active");
            document.getElementById("tab-rc-percent").classList.add("active");
        }
    
        $('#itemizedfinanceCostAmtDateEdit').val(paid_date);
        $('#itemizedfinanceCostAmtRemarkEdit').val(paid_remarks);
        $('#itemizedfinanceCostAmtInLoanEdit').val(paid_inLoan);
        if(paid_inLoan == 1){
            $('#financeCostAmtInLoanEditYes').css('color','blue');
            $('#financeCostAmtInLoanEditNo').css('color','black');
        }
        if(paid_inLoan == 0){
            $('#financeCostAmtInLoanEditYes').css('color','black');
            $('#financeCostAmtInLoanEditNo').css('color','blue');
        }
    }
    // =================================== REFINACE COSTS ===================================

    function RollIntoLoan(section,formAction,action){
        if(section == 'RefinanceCosts'){
            if(formAction == 'Create'){
                if(action == 'Yes'){
                    $('#RefinanceCostsRollIntoLoanCreate').val(1);
                    $('#RefinanceCostsCreateYes').css('color','blue');
                    $('#RefinanceCostsCreateNo').css('color','black');
                }
                if(action == 'No'){
                    $('#RefinanceCostsRollIntoLoanCreate').val(0);
                    $('#RefinanceCostsCreateYes').css('color','black');
                    $('#RefinanceCostsCreateNo').css('color','blue');
                }
            }
            if(formAction == 'Edit'){
                if(action == 'Yes'){
                    $('#RefinanceCostsCreateRollIntoLoanEdit').val(1);
                    $('#RefinanceCostsRollIntoLoanEditYes').css('color','blue');
                    $('#RefinanceCostsRollIntoLoanEditNo').css('color','black');
                }
                if(action == 'No'){
                    $('#RefinanceCostsCreateRollIntoLoanEdit').val(0);
                    $('#RefinanceCostsRollIntoLoanEditYes').css('color','black');
                    $('#RefinanceCostsRollIntoLoanEditNo').css('color','blue');
                }
            }
        }
    }
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
            vals = 100;
        }

        if(vals<0){
            $('.price_financing_'+row).val(0);
            vals = 0;
        }
        var reverse_amount = 100 - vals;
        var labelfinance = $('.finance_label_'+row).text();
        if(labelfinance=='Price Financing'){
            $('.finance-toggle-text_'+row).html(reverse_amount+'% Down Payment <i class="  fa  fa-exchange text-primary"></i>');
        }else{
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
    });
    $("#toggle13").on('change', function() {
        $("#itemisedPurchaseCost").toggle();
        $(".pce_amount").toggle();
        $(".pce_percent").toggle();
        // $("#prop_refinance_percent_input").val(0);
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

<?php /*
    // Get the form element by id
    var form = document.getElementById("itemizedPaidAmtForm");
    // Add a submit event listener to the form element
    form.addEventListener("submit", function(event) {
        // Prevent the default form submission behavior
        event.preventDefault();
        // Get the form data as an object
        var data = {};
        var inputs = form.querySelectorAll("input, textarea, select");
        for (var i = 0; i < inputs.length; i++) {
            data[inputs[i].name] = inputs[i].value;
        }
        // console.log(data);
        // var divText = '<div class="form-group managsss1"><label>'+data['itemizedPaidAmtPercent']+'</label><span class="currencyInputprefix"><?=$currency?></span><input class="currencyInput" type="text" placeholder="" value="'+data['itemizedPaidAmtAmount']+'" /><span class="edttt bth_alsss"><a href="javascript:void(0);"><img src="'+'{{url('')}}'+'/img/edit.png"/></a><a href="javascript:void(0);"><i class="fa fa-trash"></i></a></span></div>';
        // console.log(divText);
        paidAmtURL = '{{url('')}}' + '/addItemizedPaidAmount';
        // Send the form data using ajax
        $.ajax({
            url: paidAmtURL,
            type: form.method,
            dataType: "json",
            data: data,
            success: function(response) {
                console.log(response);
                console.log(response);
                // If the response is successful, add a div with a message
                if(data['itemizedPaidAmtType'] == 'percent'){
                    // var divText = `<div class="form-group managsss1">
                    //                 <label>`+data['itemizedPaidAmtName']+`</label>
                    //                 <span class="currencyInputprefix"><?=$currency?></span>
                    //                 <input class="currencyInput pecentOfInput" type="text" value="`+data['itemizedPaidAmtPercent']+`" readonly/>
                    //                 <span class="currencyInputprefix percentOfSpan">% of `+data['itemizedPaidAmtPercentOf']+`</span>
                    //                 <span class="edttt bth_alsss">
                    //                     <a href="javascript:void(0);"><img src="`+`{{url('')}}`+`/img/edit.png"/></a>
                    //                     <a href="javascript:void(0);"><i class="fa fa-trash"></i></a>
                    //                 </span>
                    //             </div>`;
                    var divText = '<div class="form-group managsss1" id="IPA'+response.id+'"><label>'+data['itemizedPaidAmtName']+'</label><span class="currencyInputprefix"><?=$currency?></span><input class="currencyInput pecentOfInput" type="text" value="'+data['itemizedPaidAmtPercent']+'" readonly/><span class="currencyInputprefix percentOfSpan">% of '+data['itemizedPaidAmtPercentOf']+'</span><span class="edttt bth_alsss"><a onclick="'+response.editFun+'" style="cursor: pointer;"><img src="'+'{{url('')}}'+'/img/edit.png"/></a><a onclick="'+response.deleteFun+'" style="cursor: pointer;"><i class="fa fa-trash"></i></a></span></div>';
                }
                else{
                    var divText = '<div class="form-group managsss1" id="IPA'+response.id+'"><label>'+data['itemizedPaidAmtName']+'</label><span class="currencyInputprefix"><?=$currency?></span><input class="currencyInput" type="text" placeholder="" value="'+data['itemizedPaidAmtAmount']+'" readonly/><span class="edttt bth_alsss"><a onclick="'+response.editFun+'" style="cursor: pointer;"><img src="'+'{{url('')}}'+'/img/edit.png"/></a><a onclick="'+response.deleteFun+'" style="cursor: pointer;"><i class="fa fa-trash"></i></a></span></div>';
                }
                $("#paidAmountItemizedDiv").append(divText);

                // update total value
                var prevTotal = $("#totalItemizedPaidAmt").text();

                if(data['itemizedPaidAmtType'] == 'percent'){
                    if(data['itemizedPaidAmtPercentOf'] == 'price'){
                        var prevTotal = parseFloat(numeral(prevTotal).value());
                        var newTotal = data['itemizedPaidAmtPercent'] / 100 * parseInt($("#basicPurchasePrice").val());
                        newTotal = Math.round((newTotal + prevTotal) * 100) / 100;
                    }
                    else{
                        var prevTotal = parseInt(numeral(prevTotal).value());
                        var newTotal = data['itemizedPaidAmtPercent'] / 100 * 0; // todo loan amount
                        newTotal = Math.round((newTotal + prevTotal) * 100) / 100;
                    }
                }
                else{
                    var newTotal = numeral(prevTotal).add(data['itemizedPaidAmtAmount']).value();
                }

                // update total in fields
                updateTotalPaidAmountDivAllItemized(newTotal);

                // update total in db
                updatePaidAmount(newTotal, <?=$propertyID?>);
                // $("#totalItemizedPaidAmt").text(newTotal);

                // Close the modal popup
                $("#paidAmountModal").modal("hide");
            },
            error: function(error) {
                // If the response is an error, add a div with a message
                // var div = document.createElement("div");
                // div.className = "alert alert-danger";
                // div.innerHTML = "Form save failed: " + error.message;
                // form.appendChild(div);
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
            $("#itemizedPaidAmtPercentOfEdit").children('[value="'+paid_percentOf+'"]').attr('selected', true);
            document.getElementById("tabButton-amountEdit").classList.remove("active");
            document.getElementById("tabButton-percentEdit").classList.add("active");
            document.getElementById("tab-amountEdit").classList.remove("active");
            document.getElementById("tab-percentEdit").classList.add("active");
        }

        $('#itemizedPaidAmtDateEdit').val(paid_date);
        $('#itemizedPaidAmtRemarkEdit').val(paid_remarks);
        $('#itemizedPaidAmtInLoanEdit').val(paid_inLoan);

        $('#financeCostModalEdit').modal('show');
    }
    // Get the form element by id
    var formEdit = document.getElementById("itemizedPaidAmtFormEdit");
    // Add a submit event listener to the form element
    formEdit.addEventListener("submit", function(event) {
        // Prevent the default form submission behavior
        event.preventDefault();
        // Get the form data as an object
        var data = {};
        var inputs = formEdit.querySelectorAll("input, textarea, select");
        for (var i = 0; i < inputs.length; i++) {
            data[inputs[i].name] = inputs[i].value;
        }
        // console.log(data);
        paidAmtURL = '{{url('')}}' + '/EditItemizedPaidAmount';
        // Send the form data using ajax
        $.ajax({
            url: paidAmtURL,
            type: form.method,
            dataType: "json",
            data: data,
            success: function(response) {
                // If the response is successful, add a div with a message
                if(data['itemizedPaidAmtType'] == 'percent'){
                    var divText = '<label>'+data['itemizedPaidAmtName']+'</label><span class="currencyInputprefix"><?=$currency?></span><input class="currencyInput pecentOfInput" type="text" value="'+data['itemizedPaidAmtPercent']+'" readonly/><span class="currencyInputprefix percentOfSpan">% of '+data['itemizedPaidAmtPercentOf']+'</span><span class="edttt bth_alsss"><a onclick="'+response.editFun+'" style="cursor: pointer;"><img src="'+'{{url('')}}'+'/img/edit.png"/></a><a onclick="'+response.deleteFun+'" style="cursor: pointer;"><i class="fa fa-trash"></i></a></span>';
                }
                else{
                    var divText = '<label>'+data['itemizedPaidAmtName']+'</label><span class="currencyInputprefix"><?=$currency?></span><input class="currencyInput" type="text" placeholder="" value="'+data['itemizedPaidAmtAmount']+'" readonly/><span class="edttt bth_alsss"><a  onclick="'+response.editFun+'" style="cursor: pointer;"><img src="'+'{{url('')}}'+'/img/edit.png"/></a><a onclick="'+response.deleteFun+'" style="cursor: pointer;"><i class="fa fa-trash"></i></a></span>';
                }
                $("#IPA"+response.id).html(divText);

                // update total value
                var prevTotal = $("#totalItemizedPaidAmt").text();

                if(data['itemizedPaidAmtType'] == 'percent'){
                    if(data['itemizedPaidAmtPercentOf'] == 'price'){
                        var prevTotal = parseFloat(numeral(prevTotal).value());



                        var newTotal = parseInt(data['itemizedPaidAmtPercent']) / 100 * parseInt($("#basicPurchasePrice").val());

                        if(newTotal > (response.oldAmt / 100 * parseInt($("#basicPurchasePrice").val())))
                        newTotal = newTotal - (response.oldAmt / 100 * parseInt($("#basicPurchasePrice").val()));


                        newTotal = Math.round((newTotal + prevTotal) * 100) / 100;

                    }
                    else{
                        var prevTotal = parseInt(numeral(prevTotal).value());
                        var newTotal = data['itemizedPaidAmtPercent'] / 100 * 0; // todo loan amount
                        newTotal = newTotal - (response.oldAmt / 100 * parseInt($("#basicPurchasePrice").val()));
                        newTotal = Math.round((newTotal + prevTotal) * 100) / 100;
                    }
                }
                else{
                    var newTotal = numeral(prevTotal).add(parseFloat(response.newAmt)).value();
                    newTotal = newTotal - response.oldAmt;
                }

                // update total in fields
                updateTotalPaidAmountDivAllItemized(newTotal);

                // update total in db
                updatePaidAmount(newTotal, <?=$propertyID?>);
                // $("#totalItemizedPaidAmt").text(newTotal);

                // Close the modal popup
                $("#financeCostModalEdit").modal("hide");
            },
            error: function(error) {
                // If the response is an error, add a div with a message
                // var div = document.createElement("div");
                // div.className = "alert alert-danger";
                // div.innerHTML = "Form save failed: " + error.message;
                // form.appendChild(div);
            }
        });
    });

    function updatePaidAmount(val, id) {
        paidAmtURL = '{{url('')}}' + '/EditPaidAmountMainProperty';
        $.ajax({
            url: paidAmtURL,
            type: "POST",
            dataType: "json",
            data: {
                _token: '{{ csrf_token() }}',
                paidAmt: val,
                propertyID: id
            },
            success: function(response) {
            },
            error: function(error) {
                console.log(error);
            }
        });
    }

    function deleteIPA(id, amount){
        if(confirm('do you want to delete this entry?')){
            paidAmtURL = '{{url('')}}' + '/deletePaidAmountMainProperty';
        $.ajax({
            url: paidAmtURL,
            type: "POST",
            dataType: "json",
            data: {
                _token: '{{ csrf_token() }}',
                id: id,
                propertyID: <?=$propertyID?>
            },
            success: function(response) {
                // update total value
                var prevTotal = $("#totalItemizedPaidAmt").text();
                var newTotal = numeral(prevTotal).value();
                newTotal = newTotal - amount;

                // update total in fields
                updateTotalPaidAmountDivAllItemized(newTotal);

                // update total in db
                updatePaidAmount(newTotal, <?=$propertyID?>);

                // remove html
                $("#IPA"+id).remove();
            },
            error: function(error) {
                console.log(error);
            }
        });
        }

    }
    */ ?>
    
    $('.tabLinkPurchasedAmt').click(function() {
        var tabID = $(this).attr('data-tab');
        $(this).addClass('active').siblings().removeClass('active');
        $('#tab-' + tabID).addClass('active').siblings().removeClass('active');

        // update hidden value of paid amount form
        if(tabID=='purchasedamount'){
            tabID = 'amount';
        }else{
            tabID = 'percent';
        }
        $("#itemizedPurchasedAmtType").val(tabID);
    });
    
    function getFinanceCoust(){
        var paidAmtURL = '{{url('')}}' + '/getItemizedReFinancingCost';
    
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
    <?php if(count($itemRefinanceCost)) { ?>
    $(document).ready(function() {
        getFinanceCoust();
    });
    <?php } ?>
    // function calculateLoanAmount(){
    //     return <?=$totalLoanAmount?>;
    // }
    
    function calculateLoanAmount() {
        let totalLoanAmount = 0;
    
        // Get base values for calculations
        const basicSalePrice = parseFloat($("input[name='basicSalePrice']").val()) || 0;
        let loanAmount = 0;
        
        // Loop through each loan entry using price financing percent
        $("input[name='price_financing']").each(function(index) {
            const financingPercent = parseFloat($(this).val()) || 0;
            const loanType = $("select[name='financingof']").eq(index).val();
    
            let baseAmount = 0;
            // alert("Loan type: "+loanType);
    
            switch (loanType) {
                case 'Market Value':
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
@include('front.layouts.footer')