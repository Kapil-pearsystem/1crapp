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
    span.pusntttss {
        right: 100px !important;
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
					<h2>Possesion & Improment</h2>
					<span class="set_vedioo" data-toggle="modal" data-target="#videotutorialmodal"><a href="javascript:void(0);"><img src="{{ asset('img/video-tutorial-new.png') }}"> </a></span>
				 </div>
				</div>
                <div class="col-lg-12">
                    <form id="propertyPageForm3" method="POST" action="{{url('savePropertyType1possession')}}" enctype="multipart/form-data">
                        <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                        <input type="hidden" name="propertyID" value="{{ $propertyID }}">
                        <input type="hidden" name="propertyPurchasePrice" id="propertyPurchasePrice" value="<?=$MainProperty->prop_purchasePrice?>">
                        @if(Session::has('success'))
                            <div class="alert alert-success">
                                {{Session::get('success')}}
                            </div>
                        @endif
                        <!---<div class=" " data-toggle="modal" data-target="#videotutorialmodal"  style="float: right;position: relative;top: -5px;left: 0px;display: inline-block;">
                            <a href="#">
                                <img src="{{ url('') }}/img/video-tutorial-new.png" style="width: 85px;">
                            </a>
                        </div>-->
                        <!-- Itemized Extra Charges  -->
                        @include('dashboard.buy_possession_improvement.extra_charges_possession.extra_charges_possession_section',[
                            'MainProperty'   => $MainProperty,
                            'ItemExtraCharge'=> $ItemExtraCharge
                        ])
                        <!-- Itemized Extra Charges  -->
                        <!-- Itemized Improvement Cost -->
                            @include('dashboard.buy_possession_improvement.improvement_cost.improvement_cost_section',[
                                'MainProperty'        => $MainProperty,
                                'ItemImprovementCost' => ImprovementCosts($MainProperty)
                            ])
                        <!-- Itemized Improvement Cost -->



					<!-- Itemized Conveyance Deed Cost  -->
                    @include('dashboard.buy_possession_improvement.conveyance_deed_cost.conveyance_deed_cost_section',[
                        'MainProperty' => $MainProperty
                    ])




                    <!-- End Itemized Extra Charges -->
					<div class="backk_bntss">
					    @if (request()->is('properties/new-property/*'))
					    <a href="{{ url('') }}/properties/new-property/book-finance-payment/<?=base64_encode($propertyID)?>">
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
					</form>
                </div>
            </div>
        </div>
    </div>
</div>


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
                <input type="hidden" name="itemizedPaidAmtInLoan" id="itemizedExtraCostAmtInLoanCreate" value="0"/>
                <div class="hd_res_listsss">
                    <h2>Add Extra Cost</h2>
                </div>
                <div class="all_frm_list">
                    <div class="form-group">
                        <label>Name </label>
                        <input type="text" name="itemizedPaidAmtName" id="itemizedPaidAmtName" placeholder="Name" value="" required/>
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
                                    <!--<option value="loan">% Of loan</option>-->
                                    </select>
                                </div>
                            </div>
                            <div class="form-group managsss1">
                                <label>Date</label>
                                <input name="itemizedPaidAmtDate" id="itemizedPaidAmtDate" type="date" placeholder="DD MM YYYY" value="" class="datePickerDefault" required />
                            </div>
                            <div class="form-group managsss1">
                                <div class="roll_lst">
                                    <div class="lft_raea">
                                        <label>Roll Into Loan?</label>
                                    </div>
                                    <div class="rit_raea">
                                        <ul class="ys_no">
                                            <li>
                                                <a id="ExtraCostAmtInLoanCreateYes" onclick="RollIntoLoan('ExtraCost','Create','Yes')">Yes</a>
                                            </li>
                                            <li></li>
                                            <li>
                                                <a id="ExtraCostAmtInLoanCreateNo" onclick="RollIntoLoan('ExtraCost','Create','No')">No</a>
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
                <input type="hidden" name="itemizedPaidAmtInLoan" id="itemizedExtraCostAmtInLoanEdit" value="0"/>
                <div class="hd_res_listsss">
                    <h2>Edit Extra Cost</h2>
                </div>
                <div class="form-group">
                    <label>Name </label>
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
                                </select>
                            </div>
                        </div>
                        <div class="form-group managsss1">
                            <label>Date</label>
                            <input name="itemizedPaidAmtDate" id="itemizedPaidAmtDateEdit" type="date" placeholder="DD MM YYYY" value="" class="datePickerDefault" required />
                        </div>
                        <div class="form-group managsss1">
                            <div class="roll_lst">
                                <div class="lft_raea">
                                    <label>Roll Into Loan?</label>
                                </div>
                                <div class="rit_raea">
                                    <ul class="ys_no">
                                        <li>
                                            <a id="ExtraCostAmtInLoanEditYes" onclick="RollIntoLoan('ExtraCost','Edit','Yes')">Yes</a>
                                        </li>
                                        <li></li>
                                        <li>
                                            <a id="ExtraCostAmtInLoanEditNo" onclick="RollIntoLoan('ExtraCost','Edit','No')">No</a>
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

<div class="modal fade" id="improvementCostModal" tabindex="-1" role="dialog" aria-labelledby="improvementCostModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content all_frm_list">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="font-size: 30px;">
                <span aria-hidden="true">&times;</span>
            </button>
            <form id="itemizedImprovementCostForm" method="POST">
                <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                <input type="hidden" name="itemizedPaidAmtID" id="itemizedImprovementCostID" value=""/>
                <input type="hidden" name="itemizedPaidAmtType" id="itemizedImprovementCostType" value="amount"/>
                <input type="hidden" name="itemizedPaidAmtPropertyID" value="<?=$propertyID?>"/>
                <input type="hidden" name="itemizedPaidAmtInLoan" id="improvementCostRollInLoanCreate" value="0"/>
                <div class="hd_res_listsss">
                    <h2>Add Improvement Cost</h2>
                </div>
                <div class="all_frm_list">
                    <div class="form-group">
                        <label>Name </label>
                        <input type="text" name="itemizedPaidAmtName" id="itemizedPaidAmtName" placeholder="Name" value="" required />
                    </div>
                    <div class="tbss_form_lst mt-4">
                        <div class="tab-wrapper">
                            <div class="tbs_hids">Type</div>
                            <ul class="tabs">
                                <li id="tabButton-amount" class="tabLinkImprovementCost active" data-tab="amount">Set Amount</li>
                                <li id="tabButton-percent" class="tabLinkImprovementCost" data-tab="percent">Percent</li>
                            </ul>
                        </div>
                        <div class="content-wrapper">
                            <div id="tabImprovementCost-amount" class="tab-content active">
                                <div class="form-group managsss1">
                                    <label>Amount </label>
                                    <span class="currencyInputprefix"><?=$currency?></span>
                                    <input name="itemizedPaidAmtAmount" id="itemizedPaidAmtAmount" class="currencyInput validateFloatInput" type="text" placeholder="Amount" value="" />
                                </div>
                            </div>
                            <div id="tabImprovementCost-percent" class="tab-content">
                                <div class="form-group managsss1">
                                    <label>Percent </label>
                                    <input type="text" name="itemizedPaidAmtPercent" id="itemizedPaidAmtPercent" placeholder="Percent" value="" class="validateFloatInput" />
                                    <select class="percentOfClass" name="itemizedPaidAmtPercentOf" id="itemizedPaidAmtPercentOf">
                                    <option value="price">% Of Price</option>
                                    <!--<option value="loan">% Of loan</option>-->
                                    </select>
                                </div>
                            </div>
                            <div class="form-group managsss1">
                                <label>Date</label>
                                <input name="itemizedPaidAmtDate" id="itemizedPaidAmtDate" type="date" placeholder="DD MM YYYY" value="" class="datePickerDefault" required />
                            </div>
                            <div class="form-group managsss1">
                                <div class="roll_lst">
                                    <div class="lft_raea">
                                        <label>Roll Into Loan?</label>
                                    </div>
                                    <div class="rit_raea">
                                        <ul class="ys_no">
                                            <li><a id="ImprovementCostCreateYes" onclick="RollIntoLoan('ImprovementCost','Create','Yes')">Yes</a></li>
                                            <li></li>
                                            <li><a id="ImprovementCostCreateNo" onclick="RollIntoLoan('ImprovementCost','Create','No')">No</a></li>
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
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="improvementCostModalEdit" tabindex="-1" role="dialog" aria-labelledby="improvementCostModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content all_frm_list">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="font-size: 30px;">
                <span aria-hidden="true">&times;</span>
            </button>
            <form id="itemizedImprovementCostFormEdit" method="POST">
                <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                <input type="hidden" name="itemizedPaidAmtID" id="itemizedImprovementCostIDEdit" value=""/>
                <input type="hidden" name="itemizedPaidAmtType" id="itemizedImprovementCostTypeEdit" value="amount"/>
                <input type="hidden" name="itemizedPaidAmtPropertyID" value="<?=$propertyID?>"/>
                <input type="hidden" name="itemizedPaidAmtInLoan" id="improvementCostRollInLoanEdit" value="0"/>
                <div class="hd_res_listsss">
                    <h2>Edit Improvement Cost</h2>
                </div>
                <div class="form-group">
                    <label>Name </label>
                    <input type="text" name="itemizedPaidAmtName" id="itemizedImprovementCostNameEdit" placeholder="Name" value="" required />
                </div>
                <div class="tbss_form_lst mt-4">
                    <div class="tab-wrapper">
                        <div class="tbs_hids">Type</div>
                        <ul class="tabs">
                            <li id="tabButtonImprovementCost-amountEdit" class="tabLinkImprovementCostEdit active" data-tab="amount">Set Amount</li>
                            <li id="tabButtonImprovementCost-percentEdit" class="tabLinkImprovementCostEdit" data-tab="percent">Percent</li>
                        </ul>
                    </div>
                    <div class="content-wrapper">
                        <div id="tabImprovementCost-amountEdit" class="tab-content active">
                            <div class="form-group managsss1">
                                <label>Amount </label>
                                <span class="currencyInputprefix"><?=$currency?></span>
                                <input name="itemizedPaidAmtAmount" id="itemizedImprovementCostAmountEdit" class="currencyInput validateFloatInput" type="text" placeholder="Amount" value="" />
                            </div>
                        </div>
                        <div id="tabImprovementCost-percentEdit" class="tab-content">
                            <div class="form-group managsss1">
                                <label>Percent </label>
                                <input type="text" name="itemizedPaidAmtPercent" id="itemizedImprovementCostPercentEdit" placeholder="Percent" value="" class="validateFloatInput" />
                                <select class="percentOfClass" name="itemizedPaidAmtPercentOf" id="itemizedPaidAmtPercentOfEdit">
                                <option value="price">% Of Price</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group managsss1">
                            <label>Date</label>
                            <input name="itemizedPaidAmtDate" id="itemizedImprovementCostDateEdit" type="date" placeholder="DD MM YYYY" value="" class="datePickerDefault" required />
                        </div>
                        <div class="form-group managsss1">
                            <div class="roll_lst">
                                <div class="lft_raea">
                                    <label>Roll Into Loan?</label>
                                </div>
                                <div class="rit_raea">
                                    <ul class="ys_no">
                                        <li>
                                            <a id="ImprovementCostEditYes" onclick="RollIntoLoan('ImprovementCost','Edit','Yes')">Yes</a>
                                        </li>
                                        <li></li>
                                        <li>
                                            <a id="ImprovementCostEditNo" onclick="RollIntoLoan('ImprovementCost','Edit','No')">No</a>
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

<div class="modal fade" id="ConvDeedModal" tabindex="-1" role="dialog" aria-labelledby="ConvDeedModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content all_frm_list">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="font-size: 30px;">
                <span aria-hidden="true">&times;</span>
            </button>
            <form id="itemizedConvDeedForm" method="POST">
                <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                <input type="hidden" name="itemizedPaidAmtID" id="itemizedConvDeedID" value=""/>
                <input type="hidden" name="itemizedPaidAmtType" id="itemizedConvDeedType" value="amount"/>
                <input type="hidden" name="itemizedPaidAmtPropertyID" value="<?=$propertyID?>"/>
                <input type="hidden" name="itemizedPaidAmtInLoan" id="conveyanceDeedCostRollInLoanCreate" value="0"/>
                <div class="hd_res_listsss">
                    <h2>Add Conveyance Deed Cost</h2>
                </div>
                <div class="all_frm_list">
                    <div class="form-group">
                        <label>Name </label>
                        <input type="text" name="itemizedPaidAmtName" id="itemizedPaidAmtName" placeholder="Name" value="" required />
                    </div>
                    <div class="tbss_form_lst mt-4">
                        <div class="tab-wrapper">
                            <div class="tbs_hids">Type</div>
                            <ul class="tabs">
                                <li id="tabButton-amount" class="tabLinkConvDeed active" data-tab="amount">Set Amount</li>
                                <li id="tabButton-percent" class="tabLinkConvDeed" data-tab="percent">Percent</li>
                            </ul>
                        </div>
                        <div class="content-wrapper">
                            <div id="tabConvDeed-amount" class="tab-content active">
                                <div class="form-group managsss1">
                                    <label>Amount </label>
                                    <span class="currencyInputprefix"><?=$currency?></span>
                                    <input name="itemizedPaidAmtAmount" id="itemizedPaidAmtAmount" class="currencyInput validateFloatInput" type="text" placeholder="Amount" value="" />
                                </div>
                            </div>
                            <div id="tabConvDeed-percent" class="tab-content">
                                <div class="form-group managsss1">
                                    <label>Percent </label>
                                    <input type="text" name="itemizedPaidAmtPercent" id="itemizedPaidAmtPercent" placeholder="Percent" value="" class="validateFloatInput" />
                                    <select class="percentOfClass" name="itemizedPaidAmtPercentOf" id="itemizedPaidAmtPercentOf">
                                    <option value="price">% Of Price</option>
                                    <!--<option value="loan">% Of loan</option>-->
                                    </select>
                                </div>
                            </div>
                            <div class="form-group managsss1">
                                <label>Date</label>
                                <input name="itemizedPaidAmtDate" id="itemizedPaidAmtDate" type="date" placeholder="DD MM YYYY" value="" class="datePickerDefault" required />
                            </div>
                            <div class="form-group managsss1">
                                <div class="roll_lst">
                                    <div class="lft_raea">
                                        <label>Roll Into Loan?</label>
                                    </div>
                                    <div class="rit_raea">
                                        <ul class="ys_no">
                                            <li>
                                                <a id="conveyanceDeedCostCreateYes" onclick="RollIntoLoan('ConveyanceDeedCost','Create','Yes')">Yes</a>
                                            </li>
                                            <li></li>
                                            <li>
                                                <a id="conveyanceDeedCostCreateNo" onclick="RollIntoLoan('ConveyanceDeedCost','Create','No')">No</a>
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
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="ConvDeedModalEdit" tabindex="-1" role="dialog" aria-labelledby="ConvDeedModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content all_frm_list">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="font-size: 30px;">
                <span aria-hidden="true">&times;</span>
            </button>
            <form id="itemizedConvDeedFormEdit" method="POST">
                <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                <input type="hidden" name="itemizedPaidAmtID" id="itemizedConvDeedIDEdit" value=""/>
                <input type="hidden" name="itemizedPaidAmtType" id="itemizedConvDeedTypeEdit" value="amount"/>
                <input type="hidden" name="itemizedPaidAmtPropertyID" value="<?=$propertyID?>"/>
                <input type="hidden" name="itemizedPaidAmtInLoan" id="conveyanceDeedCostRollInLoanEdit" value="0"/>
                <div class="hd_res_listsss">
                    <h2>Edit Conveyance Deed Cost</h2>
                </div>
                <div class="form-group">
                    <label>Name </label>
                    <input type="text" name="itemizedPaidAmtName" id="itemizedConvDeedNameEdit" placeholder="Name" value="" required />
                </div>
                <div class="tbss_form_lst mt-4">
                    <div class="tab-wrapper">
                        <div class="tbs_hids">Type</div>
                        <ul class="tabs">
                            <li id="tabButtonConvDeed-amountEdit" class="tabLinkConvDeedEdit active" data-tab="amount">Set Amount</li>
                            <li id="tabButtonConvDeed-percentEdit" class="tabLinkConvDeedEdit" data-tab="percent">Percent</li>
                        </ul>
                    </div>
                    <div class="content-wrapper">
                        <div id="tabConvDeed-amountEdit" class="tab-content active">
                            <div class="form-group managsss1">
                                <label>Amount </label>
                                <span class="currencyInputprefix"><?=$currency?></span>
                                <input name="itemizedPaidAmtAmount" id="itemizedConvDeedAmountEdit" class="currencyInput validateFloatInput" type="text" placeholder="Amount" value="" />
                            </div>
                        </div>
                        <div id="tabConvDeed-percentEdit" class="tab-content">
                            <div class="form-group managsss1">
                                <label>Percent </label>
                                <input type="text" name="itemizedPaidAmtPercent" id="itemizedConvDeedPercentEdit" placeholder="Percent" value="" class="validateFloatInput" />
                                <select class="percentOfClass" name="itemizedPaidAmtPercentOf" id="itemizedPaidAmtPercentOfEdit">
                                <option value="price">% Of Price</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group managsss1">
                            <label>Date</label>
                            <input name="itemizedPaidAmtDate" id="itemizedConvDeedDateEdit" type="date" placeholder="DD MM YYYY" value="" class="datePickerDefault" required />
                        </div>
                        <div class="form-group managsss1">
                            <div class="roll_lst">
                                <div class="lft_raea">
                                    <label>Roll Into Loan?</label>
                                </div>
                                <div class="rit_raea">
                                    <ul class="ys_no">
                                        <li>
                                            <a id="conveyanceDeedCostEditYes" onclick="RollIntoLoan('ConveyanceDeedCost','Edit','Yes')">Yes</a>
                                        </li>
                                        <li></li>
                                        <li>
                                            <a id="conveyanceDeedCostEditNo" onclick="RollIntoLoan('ConveyanceDeedCost','Edit','No')">No</a>
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
@include('front.layouts.footer')
<script src="//cdnjs.cloudflare.com/ajax/libs/numeral.js/2.0.6/numeral.min.js"></script>
<script>
    function RollIntoLoan(section,formAction,action){
        if(section == 'ExtraCost'){
            if(formAction == 'Create'){
                if(action == 'Yes'){
                    $('#itemizedExtraCostAmtInLoanCreate').val(1);
                    $('#ExtraCostAmtInLoanCreateYes').css('color', 'blue');
                    $('#ExtraCostAmtInLoanCreateNo').css('color', 'black');
                }
                if(action == 'No'){
                    $('#itemizedExtraCostAmtInLoanCreate').val(0);
                    $('#ExtraCostAmtInLoanCreateYes').css('color', 'black');
                    $('#ExtraCostAmtInLoanCreateNo').css('color', 'blue');
                }
            }
            if(formAction == 'Edit'){
                if(action == 'Yes'){
                    $('#itemizedExtraCostAmtInLoanEdit').val(1);
                    $('#ExtraCostAmtInLoanEditYes').css('color', 'blue');
                    $('#ExtraCostAmtInLoanEditNo').css('color', 'black');
                }
                if(action == 'No'){
                    $('#itemizedExtraCostAmtInLoanEdit').val(0);
                    $('#ExtraCostAmtInLoanEditYes').css('color', 'black');
                    $('#ExtraCostAmtInLoanEditNo').css('color', 'blue');
                }
            }
        }

        if(section == 'ImprovementCost'){
            if(formAction == 'Create'){
                if(action == 'Yes'){
                    $('#improvementCostRollInLoanCreate').val(1);
                    $('#ImprovementCostCreateYes').css('color', 'blue');
                    $('#ImprovementCostCreateNo').css('color', 'black');
                }
                if(action == 'No'){
                    $('#improvementCostRollInLoanCreate').val(0);
                    $('#ImprovementCostCreateYes').css('color', 'black');
                    $('#ImprovementCostCreateNo').css('color', 'blue');
                }
            }
            if(formAction == 'Edit'){
                if(action == 'Yes'){
                    $('#improvementCostRollInLoanEdit').val(1);
                    $('#ImprovementCostEditYes').css('color', 'blue');
                    $('#ImprovementCostEditNo').css('color', 'black');
                }
                if(action == 'No'){
                    $('#improvementCostRollInLoanEdit').val(0);
                    $('#ImprovementCostEditYes').css('color', 'black');
                    $('#ImprovementCostEditNo').css('color', 'blue');
                }
            }
        }

        if(section == 'ConveyanceDeedCost'){
            if(formAction == 'Create'){
                if(action == 'Yes'){
                    $('#conveyanceDeedCostRollInLoanCreate').val(1);
                    $('#conveyanceDeedCostCreateYes').css('color','blue');
                    $('#conveyanceDeedCostCreateNo').css('color','black');
                }
                if(action == 'No'){
                    $('#conveyanceDeedCostRollInLoanCreate').val(0);
                    $('#conveyanceDeedCostCreateYes').css('color','black');
                    $('#conveyanceDeedCostCreateNo').css('color','blue');
                }
            }
            if(formAction == 'Edit'){
                if(action == 'Yes'){
                    $('#conveyanceDeedCostRollInLoanEdit').val(1);
                    $('#conveyanceDeedCostEditYes').css('color','blue');
                    $('#conveyanceDeedCostEditNo').css('color','black');
                }
                if(action == 'No'){
                    $('#conveyanceDeedCostRollInLoanEdit').val(0);
                    $('#conveyanceDeedCostEditYes').css('color','black');
                    $('#conveyanceDeedCostEditNo').css('color','blue');
                }
            }
        }

        if(section == 'HoldingCost'){
            if(formAction == 'Create'){
                if(action == 'Yes'){
                    $('#holdingCostRollInLoanCreate').val(1);
                    $('#holdingCostRollInLoanCreateYes').css('color','blue');
                    $('#holdingCostRollInLoanCreateNo').css('color','black');
                }
                if(action == 'No'){
                    $('#holdingCostRollInLoanCreate').val(0);
                    $('#holdingCostRollInLoanCreateYes').css('color','black');
                    $('#holdingCostRollInLoanCreateNo').css('color','blue');
                }
            }
            if(formAction == 'Edit'){
                if(action == 'Yes'){
                    $('#holdingCostRollInLoanEdit').val(1);
                    $('#holdingCostRollInLoanEditYes').css('color','blue');
                    $('#holdingCostRollInLoanEditNo').css('color','black');
                }
                if(action == 'No'){
                    $('#holdingCostRollInLoanEdit').val(0);
                    $('#holdingCostRollInLoanEditYes').css('color','black');
                    $('#holdingCostRollInLoanEditNo').css('color','blue');
                }
            }
        }
    }

    // ===================================== EXTRA CHARGES POSSESSION =====================================
        var form1 = document.getElementById("itemizedPaidAmtForm");
        form1.addEventListener("submit", function(event) {
            // Prevent the default form submission behavior
            event.preventDefault();

            const submitBtn = form1.querySelector("button[type='submit']");
            if (submitBtn) {
                submitBtn.disabled = true;
                submitBtn.innerText = 'Saving...';
            }

            // Get the form data as an object
            var data = {};
            var inputs = form1.querySelectorAll("input, textarea, select");
            for (var i = 0; i < inputs.length; i++) {
                data[inputs[i].name] = inputs[i].value;
            }
            console.log(data);
            paidAmtURL = '{{url('')}}' + '/addItemizedExtraCharge';
            $.ajax({
                url: paidAmtURL,
                type: form1.method,
                dataType: "json",
                data: data,
                success: function(response) {
                    $('#extra_charges_possession_items_content').html(response.view);
                    $('#totalextraChargePercentInput').val(response.percentOfPrice);
                    // $("#paidAmountModal").modal("hide");
                    document.getElementById("itemizedPaidAmtForm").reset();
                    $('#paidAmountModal .close').click();
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
        function deleteIPA(id, amount){
            if(confirm('do you want to delete this entry?')){
                paidAmtURL = '{{url('')}}' + '/deleteExtraChargeMainProperty';
                $.ajax({
                    url: paidAmtURL,
                    type: "POST",
                    dataType: "json",
                    data: {
                        _token: '{{ csrf_token() }}',
                        id: id,
                        propertyID: <?=$propertyID?>,
                        oldTotalPercent: $('#totalextraChargePercentInput').val(),
                        propertyPurchasePrice: $("#propertyPurchasePrice").val(),
                        totalItemizedPaidAmt: parseFloat($("#totalItemizedPaidAmt").text())
                    },
                    success: function(response) {
                        $('#extra_charges_possession_items_content').html(response.view);
                        $('#totalextraChargePercentInput').val(response.percentOfPrice);
                    },
                    error: function(error) {
                        console.log(error);
                    }
                });
            }

        }

        var formEdit1 = document.getElementById("itemizedPaidAmtFormEdit");
        formEdit1.addEventListener("submit", function(event) {
            event.preventDefault();

            const submitBtn = formEdit1.querySelector("button[type='submit']");
            if (submitBtn) {
                submitBtn.disabled = true;
                submitBtn.innerText = 'Saving...';
            }

            var data = {};
            var inputs = formEdit1.querySelectorAll("input, textarea, select");
            for (var i = 0; i < inputs.length; i++) {
                data[inputs[i].name] = inputs[i].value;
            }

            // set the current total percent
            data['oldTotalPercent'] = $('#totalextraChargePercentInput').val();
            data['propertyPurchasePrice'] = $("#propertyPurchasePrice").val();
            data['totalItemizedPaidAmt'] = parseFloat($("#totalItemizedPaidAmt").text());

            paidAmtURL = '{{url('')}}' + '/EditItemizedExtraCharge';
            $.ajax({
                url: paidAmtURL,
                type: formEdit1.method,
                dataType: "json",
                data: data,
                success: function(response) {
                    $('#extra_charges_possession_items_content').html(response.view);
                    $('#totalextraChargePercentInput').val(response.percentOfPrice);
                    $('.modal .close').click();
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
    // ===================================== EXTRA CHARGES POSSESSION =====================================
    // =====================================     IMPROVEMENT COST     =====================================
        var form2 = document.getElementById("itemizedImprovementCostForm");
        form2.addEventListener("submit", function(event) {
            event.preventDefault();

            const submitBtn = form2.querySelector("button[type='submit']");
            if (submitBtn) {
                submitBtn.disabled = true;
                submitBtn.innerText = 'Saving...';
            }

            // Get the form data as an object
            var data = {};
            var inputs = form2.querySelectorAll("input, textarea, select");
            for (var i = 0; i < inputs.length; i++) {
                data[inputs[i].name] = inputs[i].value;
            }

            paidAmtURL = '{{url('')}}' + '/addItemizedImprovementCost';
            $.ajax({
                url: paidAmtURL,
                type: form2.method,
                dataType: "json",
                data: data,
                success: function(response) {
                    $('#improvement_cost_content').html(response.view);
                    $('#totalImprovementCostPInput').val(response.percentOfPrice);

                    document.getElementById("itemizedImprovementCostForm").reset();
                    $('.modal .close').click();
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

        var formEdit2 = document.getElementById("itemizedImprovementCostFormEdit");
        formEdit2.addEventListener("submit", function(event) {
            event.preventDefault();

            const submitBtn = formEdit2.querySelector("button[type='submit']");
            if (submitBtn) {
                submitBtn.disabled = true;
                submitBtn.innerText = 'Saving...';
            }

            var data = {};
            var inputs = formEdit2.querySelectorAll("input, textarea, select");
            for (var i = 0; i < inputs.length; i++) {
                data[inputs[i].name] = inputs[i].value;
            }

            // set the current total percent
            data['oldTotalPercent'] = $('#totalImprovementCostPInput').val();
            data['propertyPurchasePrice'] = $("#propertyPurchasePrice").val();
            data['totalItemizedPaidAmt'] = parseFloat($("#totalItemizedImprovementCost").text());

            paidAmtURL = '{{url('')}}' + '/EditItemizedImprovementCost';
            $.ajax({
                url: paidAmtURL,
                type: formEdit2.method,
                dataType: "json",
                data: data,
                success: function(response) {
                    $('#improvement_cost_content').html(response.view);
                    $('#totalImprovementCostPInput').val(response.percentOfPrice);
                    $('.modal .close').click();
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

        function editIC(id, prop_id, paid_name, paid_type, paid_amount, paid_percentOf, paid_date, paid_inLoan){
            $('#itemizedImprovementCostIDEdit').val(id);
            $('#itemizedImprovementCostPropertyIDEdit').val(prop_id);
            $('#itemizedImprovementCostNameEdit').val(paid_name);
            $('#itemizedImprovementCostTypeEdit').val(paid_type);

            if(paid_type == 'amount'){
                $('#itemizedImprovementCostAmountEdit').val(paid_amount);
                document.getElementById("tabButtonImprovementCost-amountEdit").classList.add("active");
                document.getElementById("tabButtonImprovementCost-percentEdit").classList.remove("active");
                document.getElementById("tabImprovementCost-amountEdit").classList.add("active");
                document.getElementById("tabImprovementCost-percentEdit").classList.remove("active");
            }
            else{
                $('#itemizedImprovementCostPercentEdit').val(paid_amount);
                $("#itemizedImprovementCostPercentOfEdit").children('[value="'+paid_percentOf+'"]').attr('selected', true);
                document.getElementById("tabButtonImprovementCost-amountEdit").classList.remove("active");
                document.getElementById("tabButtonImprovementCost-percentEdit").classList.add("active");
                document.getElementById("tabImprovementCost-amountEdit").classList.remove("active");
                document.getElementById("tabImprovementCost-percentEdit").classList.add("active");
            }

            $('#itemizedImprovementCostDateEdit').val(paid_date);
            $('#itemizedImprovementCostInLoanEdit').val(paid_inLoan);
            if(paid_inLoan == 1){
                $('#ImprovementCostEditYes').css('color', 'blue');
                $('#ImprovementCostEditNo').css('color', 'black');
            }
            if(paid_inLoan == 0){
                $('#ImprovementCostEditYes').css('color', 'black');
                $('#ImprovementCostEditNo').css('color', 'blue');
            }
            // $('#improvementCostModalEdit').modal('show');
        }
        function deleteIC(id, amount){
            if(confirm('do you want to delete this entry?')){
                paidAmtURL = '{{url('')}}' + '/deleteImprovementCostMainProperty';
                $.ajax({
                    url: paidAmtURL,
                    type: "POST",
                    dataType: "json",
                    data: {
                        _token: '{{ csrf_token() }}',
                        id: id,
                        propertyID: "{{ $propertyID }}",
                        oldTotalPercent: $('#totalImprovementCostPInput').val(),
                        propertyPurchasePrice: $("#propertyPurchasePrice").val(),
                        totalItemizedPaidAmt: parseFloat($("#totalItemizedImprovementCost").text())
                    },
                    success: function(response) {
                        $('#improvement_cost_content').html(response.view);
                        $('#totalImprovementCostPInput').val(response.percentOfPrice);
                    },
                    error: function(error) {
                        console.log(error);
                    }
                });
            }
        }
    // =====================================     IMPROVEMENT COST     =====================================
    // =====================================   CONVEYANCE DEED COST     ===================================
        var form3 = document.getElementById("itemizedConvDeedForm");
        // Add a submit event listener to the form element
        form3.addEventListener("submit", function(event) {
            event.preventDefault();

            const submitBtn = form3.querySelector("button[type='submit']");
            if (submitBtn) {
                submitBtn.disabled = true;
                submitBtn.innerText = 'Saving...';
            }

            var data = {};
            var inputs = form3.querySelectorAll("input, textarea, select");
            for (var i = 0; i < inputs.length; i++) {
                data[inputs[i].name] = inputs[i].value;
            }

            paidAmtURL = '{{url('')}}' + '/addItemizedConvDeed';
            $.ajax({
                url: paidAmtURL,
                type: form3.method,
                dataType: "json",
                data: data,
                success: function(response) {
                    $('#conveyance_deed_cost_content').html(response.view);
                    $('#totalConvDeedPInput').val(response.percentOfPrice);
                    document.getElementById("itemizedConvDeedForm").reset();
                    $('.modal .close').click();
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
        var formEdit3 = document.getElementById("itemizedConvDeedFormEdit");
        // Add a submit event listener to the form element
        formEdit3.addEventListener("submit", function(event) {
            // Prevent the default form submission behavior
            event.preventDefault();

            const submitBtn = formEdit3.querySelector("button[type='submit']");
            if (submitBtn) {
                submitBtn.disabled = true;
                submitBtn.innerText = 'Saving...';
            }

            // Get the form data as an object
            var data = {};
            var inputs = formEdit3.querySelectorAll("input, textarea, select");
            for (var i = 0; i < inputs.length; i++) {
                data[inputs[i].name] = inputs[i].value;
            }

            // set the current total percent
            data['oldTotalPercent'] = $('#totalConvDeedPInput').val();
            data['propertyPurchasePrice'] = $("#propertyPurchasePrice").val();
            data['totalItemizedPaidAmt'] = parseFloat($("#totalItemizedConvDeed").text());

            paidAmtURL = '{{url('')}}' + '/EditItemizedConvDeed';
            // Send the form data using ajax
            $.ajax({
                url: paidAmtURL,
                type: formEdit3.method,
                dataType: "json",
                data: data,
                success: function(response) {
                    $('#conveyance_deed_cost_content').html(response.view);
                    $('#totalConvDeedPInput').val(response.percentOfPrice);
                    $('.modal .close').click();
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

        function editCDC(id, prop_id, paid_name, paid_type, paid_amount, paid_percentOf, paid_date, paid_inLoan) {
            // Set hidden input values
            $('#itemizedConvDeedIDEdit').val(id);
            $('#itemizedConvDeedTypeEdit').val(paid_type);
            $('#itemizedConvDeedNameEdit').val(paid_name);
            $('#itemizedConvDeedAmountEdit').val('');
            $('#itemizedConvDeedPercentEdit').val('');
            $('#itemizedPaidAmtPercentOfEdit').val('');

            // Set the type tabs (amount or percent)
            if (paid_type === 'amount') {
                $('#itemizedConvDeedAmountEdit').val(paid_amount);
                document.getElementById("tabButtonConvDeed-amountEdit").classList.add("active");
                document.getElementById("tabButtonConvDeed-percentEdit").classList.remove("active");
                document.getElementById("tabConvDeed-amountEdit").classList.add("active");
                document.getElementById("tabConvDeed-percentEdit").classList.remove("active");
            } else if (paid_type === 'percent') {
                $('#itemizedConvDeedPercentEdit').val(paid_amount);
                $("#itemizedPaidAmtPercentOfEdit").children('[value="' + paid_percentOf + '"]').attr('selected', true);
                document.getElementById("tabButtonConvDeed-amountEdit").classList.remove("active");
                document.getElementById("tabButtonConvDeed-percentEdit").classList.add("active");
                document.getElementById("tabConvDeed-amountEdit").classList.remove("active");
                document.getElementById("tabConvDeed-percentEdit").classList.add("active");
            }

            // Set date
            $('#itemizedConvDeedDateEdit').val(paid_date);

            // Handle "Roll Into Loan" selection
            $('#conveyanceDeedCostRollInLoanEdit').val(paid_inLoan);
            if (paid_inLoan == 1) {
                $('#conveyanceDeedCostEditYes').css('color', 'blue');
                $('#conveyanceDeedCostEditNo').css('color', 'black');
            } else if (paid_inLoan == 0) {
                $('#conveyanceDeedCostEditYes').css('color', 'black');
                $('#conveyanceDeedCostEditNo').css('color', 'blue');
            }
        }
        function deleteCDC(id, amount){
            if(confirm('do you want to delete this entry?')){
                paidAmtURL = '{{url('')}}' + '/deleteConvDeedMainProperty';
                $.ajax({
                    url: paidAmtURL,
                    type: "POST",
                    dataType: "json",
                    data: {
                        _token: '{{ csrf_token() }}',
                        id: id,
                        propertyID: <?=$propertyID?>,
                        oldTotalPercent: $('#totalConvDeedPInput').val(),
                        propertyPurchasePrice: $("#propertyPurchasePrice").val(),
                        totalItemizedPaidAmt: parseFloat($("#totalItemizedConvDeed").text())
                    },
                    success: function(response) {
                        $('#conveyance_deed_cost_content').html(response.view);
                        $('#totalConvDeedPInput').val(response.percentOfPrice);
                    },
                    error: function(error) {
                        console.log(error);
                    }
                });
            }

        }
    // =====================================   CONVEYANCE DEED COST     ===================================


    $("#toggle11").on('change', function() {
        $("#itemisedPaidAmount").toggle();

        if($("#toggle11").is(":checked")){
            $('#totalextraChargePercentInput').attr("readonly", "readonly");
            
            // Get text from span and trim it
            let updateTotalValue = parseFloat($("#totalExtraChargesPercentHidden").text().replace(/,/g, '').trim()) || 0;
            
            // Update input with the value from span
            if(updateTotalValue){
                $("#totalextraChargePercentInput").val(updateTotalValue);
            }
        }else{
            $('#totalextraChargePercentInput').removeAttr("readonly");
        }
    });
    $("#toggle2").on('change', function() {
        $("#itemisedImprovementCost").toggle();

        if($("#toggle2").is(":checked")){
            $('#totalImprovementCostPInput').attr("readonly", "readonly");
            
            // Get text from span and trim it
            let updateTotalValue = parseFloat($("#totalImprovementCostPercentHidden").text().replace(/,/g, '').trim()) || 0;
            
            // Update input with the value from span
            if(updateTotalValue){
                $("#totalImprovementCostPInput").val(updateTotalValue);
            }
        }else{
            $('#totalImprovementCostPInput').removeAttr("readonly");
        }
    });
    $("#toggle3").on('change', function() {
        $("#itemisedConvDeed").toggle();

        if($("#toggle3").is(":checked")){
            $('#totalConvDeedPInput').attr("readonly", "readonly");
            
            // Get text from span and trim it
            let updateTotalValue = parseFloat($("#totalConvDeedPercentHidden").text().replace(/,/g, '').trim()) || 0;
            
            // Update input with the value from span
            if(updateTotalValue){
                $("#totalConvDeedPInput").val(updateTotalValue);
            }
        }else{
            $('#totalConvDeedPInput').removeAttr("readonly");
        }
    });


    // success modal
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

    function editIPA(id, prop_id, paid_name, paid_type, paid_amount, paid_percentOf, paid_date, paid_inLoan){
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
        $('#itemizedExtraCostAmtInLoanEdit').val(paid_inLoan);
        if(paid_inLoan == 1){
            $('#ExtraCostAmtInLoanEditYes').css('color', 'blue');
            $('#ExtraCostAmtInLoanEditNo').css('color', 'black');
        }
        if(paid_inLoan == 0){
            $('#ExtraCostAmtInLoanEditYes').css('color', 'black');
            $('#ExtraCostAmtInLoanEditNo').css('color', 'blue');
        }

        // $('#paidAmountModalEdit').modal('show');
    }
</script>

<script>
// Improvement Cost
    $('.tabLinkImprovementCost').click(function() {
        var tabID = $(this).attr('data-tab');
        $(this).addClass('active').siblings().removeClass('active');
        $('#tabImprovementCost-' + tabID).addClass('active').siblings().removeClass('active');

        // update hidden value of paid amount form
        $("#itemizedImprovementCostType").val(tabID);
    });

    $('.tabLinkImprovementCostEdit').click(function() {
        var tabID = $(this).attr('data-tab');
        $(this).addClass('active').siblings().removeClass('active');
        $('#tabImprovementCost-' + tabID + 'Edit').addClass('active').siblings().removeClass('active');

        // update hidden value of paid amount form
        $("#itemizedImprovementCostTypeEdit").val(tabID);
    });
</script>

<script>
// Conveyance Deed Cost
    $('.tabLinkConvDeed').click(function() {
        var tabID = $(this).attr('data-tab');
        $(this).addClass('active').siblings().removeClass('active');
        $('#tabConvDeed-' + tabID).addClass('active').siblings().removeClass('active');

        // update hidden value of paid amount form
        $("#itemizedConvDeedType").val(tabID);
    });

    $('.tabLinkConvDeedEdit').click(function() {
        var tabID = $(this).attr('data-tab');
        $(this).addClass('active').siblings().removeClass('active');
        $('#tabConvDeed-' + tabID + 'Edit').addClass('active').siblings().removeClass('active');

        // update hidden value of paid amount form
        $("#itemizedConvDeedTypeEdit").val(tabID);
    });
</script>

<script>
// Holding Cost
    $('.tabLinkHoldingCost').click(function() {
        var tabID = $(this).attr('data-tab');
        $(this).addClass('active').siblings().removeClass('active');
        $('#tabHoldingCost-' + tabID).addClass('active').siblings().removeClass('active');

        // update hidden value of paid amount form
        $("#itemizedHoldingCostType").val(tabID);
    });

    $('.tabLinkHoldingCostEdit').click(function() {
        var tabID = $(this).attr('data-tab');
        $(this).addClass('active').siblings().removeClass('active');
        $('#tabHoldingCost-' + tabID + 'Edit').addClass('active').siblings().removeClass('active');

        // update hidden value of paid amount form
        $("#itemizedHoldingCostTypeEdit").val(tabID);
    });
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