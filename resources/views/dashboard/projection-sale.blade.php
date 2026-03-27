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
.all_frm_list .form-group.managsss1 span.currencyInputprefix.rupess {
    position: relative;
    bottom: -9px;
    left: 20px;
    font-size: 17px;
}
.all_frm_list .form-group.managsss1 span.currencyInputprefix.rupess1 {
    position: relative;
    bottom: -1px;
    left: 10px;
    font-size: 17px;
}
.seliings_araeas.otherss .all_frm_list .form-group.managsss1 label {
    overflow: inherit !important;
}
.all_frm_list .form-group label span.ticck {
    width: 20px;
    height: 20px;
    background: #e2efff;
    display: inline-block;
    text-align: center;
    font-size: 14px;
    border-radius: 50px;
    line-height: 20px;
}

.form-group.managsss1.lot_sz .pusntttss {
    background: #4a83cc;
    right: 2px;
    margin: 2px 0 0;
    padding: 9px 15px;
    color: #fff;
    border-radius: 10px;
}

.pusntttss {
    position: absolute;
    right: 150px;
    margin-top: 11px;
    font-size: 14px;
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
			
			
            <div class="row mt-0">
			<div class="col-lg-12">
				 <div class="hd_res_listsss bothsss_mng">
					<h2>Projection & Sale</h2>
					<span class="set_vedioo" data-toggle="modal" data-target="#videotutorialmodal"><a href="javascript:void(0);"><img src="{{ asset('img/video-tutorial-new.png') }}"> </a></span>
				 </div>
				</div>
				
                <div class="col-lg-12">
                    <form id="propertyPageForm6" method="POST" action="{{url('savePropertyType1longTermProjection')}}" enctype="multipart/form-data">
                        <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                        <input type="hidden" name="propertyID" value="{{ $propertyID }}">
                        <input type="hidden" name="propertySalePrice" id="propertySalePrice" value="<?=$MainProperty->prop_salePrice?>">
                        @if(Session::has('success'))
                            <div class="alert alert-success">
                                {{Session::get('success')}}
                            </div>
                        @endif
                        <!--<div class=" " data-toggle="modal" data-target="#videotutorialmodal"  style="float: right;position: relative;top: -5px;left: 0px;display: inline-block;">
                            <a href="#">
                                <img src="https://pearsystem.space/1crapp/public/img/video-tutorial-new.png" style="width: 85px;">
                            </a>
                        </div>--->
                        <div class="lsting_proprty purch_list_conts brcats_listss">
                            <h3>Long Term Projection</h3>
                        </div>
                        <!-- Itemized Purchase Costs -->
                        <div class="all_frm_list">
                            <div class="form-group managsss1">
                                <label>Date of Sale: <span class="ticck" tooltip="Date of Sale" flow="down">?</span></label>
                                <input name="DateOfSale" id="DateOfSale" type="date" placeholder="DD MM YYYY" value="<?=$MainProperty->prop_dateOfSale?>" required />
                            </div>
                            <div class="form-group managsss1">
                                <label>Appreciation: <span class="ticck" tooltip="Appreciation" flow="down">?</span></label>
                                <input type="text" name="appreciationImput" id="appreciationImput" placeholder="Appreciation" value="<?=$MainProperty->prop_appreciationPercent?>" />
                                <span class="edttt bth_alsss nw_long"> % Per Year </span>
                                <div class="ads_fldds">+ Add Year-Specific Value</div>
                            </div>
                            <div class="form-group managsss1">
                                <label>Income Increase: <span class="ticck" tooltip="Income Increase" flow="down">?</span></label>
                                <input type="text" name="incomeincreaseImput" id="incomeIncreaseImput" placeholder="Income Increase" value="<?=$MainProperty->prop_incomeIncreasePercent?>" />
                                <span class="edttt bth_alsss nw_long"> % Per Year </span>
                                <div class="ads_fldds">+ Add Year-Specific Value</div>
                            </div>
                            <div class="form-group managsss1">
                                <label>Expense Increase: <span class="ticck" tooltip="Expense Increase" flow="down">?</span></label>
                                <input type="text" name="expenseIncreaseImput" id="expenseIncreaseImput" placeholder="Expense Increase" value="<?=$MainProperty->prop_expenseIncreasePercent?>" />
                                <span class="edttt bth_alsss nw_long"> % Per Year </span>
                                <div class="ads_fldds">+ Add Year-Specific Value</div>
                            </div>
                        </div>
                    </div>

					<div class="col-lg-12">
                        <div class="all_frm_list">
                            @include('dashboard.sell.sell_cost_section',['MainProperty' => $MainProperty, 'itemSellingCost' => $itemSellingCost, 'sellingCostData' => $sellingCostData])
                        </div>
                    </div>

					<div class="col-lg-12">
					<div class="otherss">
                        <?php
                            $depreciation = \App\Models\PropertyDepreciation::where('prop_id', $MainProperty->prop_id)->first();
                        ?>
                        <div class="hd_res_listsss mt-5">
                            <h2>Depreciation</h2>
                        </div>

                        <div class="all_frm_list">
                            <div class="choss_araes mb-5">
                                <div class="lft_cntts">
                                    <p>Add Depreciation Deduction</p>
                                    <span>Enable to include depreciation tax deduction in the Buy & Hold projection.</span>
                                </div>
                                <div class="yesNoButton">
                                    <input type="checkbox" class="toggle" id="toggle1" name="enable_depreciation"
                                        <?php if($depreciation){ echo "checked"; } ?> />
                                    <label for="toggle1">
                                        <span class="on">Yes</span>
                                        <span class="off">No</span>
                                    </label>
                                </div>
                            </div>

                            <div id="depreciationDeduction" <?php if(!$depreciation){ echo 'style="display:none;"'; } ?>>
                                <div class="form-group managsss1">
                                    <label>Depreciation Period:</label>
                                    <input type="text" name="depreciation_period" placeholder="Years"
                                        value="<?= $depreciation->depreciation_period ?? '' ?>" />
                                    <span class="pusntttss" style="right: 2px !important;">Years</span>
                                </div>

                                <div class="tbss_form_lst mt-5">
                                    <div class="tab-wrapper">
                                        <div class="tbs_hids">Land Value Type</div>
                                        <ul class="tabs">
                                            <li id="tabButton-amount" class="tabLinkPaidAmt <?= ($depreciation && $depreciation->land_value_type == 'amount') ? 'active' : '' ?>" data-tab="amount">Set Amount</li>
                                            <li id="tabButton-percent" class="tabLinkPaidAmt <?= ($depreciation && $depreciation->land_value_type == 'percent') ? 'active' : '' ?>" data-tab="percent">Percent</li>
                                        </ul>
                                    </div>
                                    <div class="content-wrapper">
                                        <div id="tab-amount" class="tab-content <?= ($depreciation && $depreciation->land_value_type == 'amount') ? 'active' : '' ?>">
                                            <div class="form-group managsss1">
                                                <label>Amount</label>
                                                <span class="currencyInputprefix rupess"><?= $currency ?></span>
                                                <input name="land_value_amount" type="text" placeholder="Amount"
                                                    value="<?= $depreciation->land_value_amount ?? '' ?>" />
                                            </div>
                                        </div>
                                        <div id="tab-percent" class="tab-content <?= ($depreciation && $depreciation->land_value_type == 'percent') ? 'active' : '' ?>">
                                            <div class="form-group managsss1">
                                                <label>Percent</label>
                                                <input type="text" name="land_value_percent" placeholder="Percent"
                                                    value="<?= $depreciation->land_value_percent ?? '' ?>" />
                                                <select name="land_value_percent_of">
                                                    <option value="price" <?= ($depreciation && $depreciation->land_value_percent_of == 'price') ? 'selected' : '' ?>>% of Sales Price</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group managsss1">
                                    <label>Taxes Rate</label>
                                    <input type="text" name="tax_rate" placeholder="i.e 20%" value="<?= $depreciation->tax_rate ?? '' ?>" />
                                </div>
                                <span class="sm_txtx">Enter the land value of this property to improve the accuracy of the depreciation deduction.</span>
                            </div>
                        </div>



						<div class="m_and_o_charges">
							<div class="lsting_proprty purch_list_conts brcats_listss">
								<h3>M & O Charges ?</h3>
							</div>

							<!-- <form id="propertyPageForm2" method="POST" action="" enctype=""> -->
								<div class="all_frm_list">
									<div class="row">
										<div class="col-md-8">
											<div class="form-group managsss1 lot_sz">
												<label>Total</label>
												<!--<span class="currencyInputprefix rupess1">₹</span>-->
												<input class="currencyInput" type="text" name="prop_miscellaneousChargesPercent" value="<?=$MainProperty->prop_miscellaneousChargesPercent?>" id="totalmiscellaneousChargesPercentInput" placeholder="Total Miscellaneous Charges" <?php if(count($Itemmiscellaneous_charges)){ echo "readonly";} ?> />
												<select name="psizetype" id="psizetype" class="pusntttss">
													<option selected="" value="Square Feet">% of Price</option>
												</select>
											</div>
										</div>

										<div class="col-md-4">
											<div class="choss_araes">
												<div class="lft_cntts" style="width: 100%;">
													<p>Itemize of M & O Charges</p>
												</div>
												<div class="yesNoButton" style="width: 100%;">
													<input type="checkbox" name="miscellaneousChargesitemizedToggle" class="toggle" id="toggle12" <?php if(count($Itemmiscellaneous_charges)){ ?> checked <?php } ?> autocomplete="off" />
													<label for="toggle12">
														<span class="on">Yes</span>
														<span class="off">No</span>
													</label>
												</div>
											</div>
										</div>
									</div>

									<div class="itm_cost_prch" id="miscellaneousCharges_sectiontop" <?php if(!count($Itemmiscellaneous_charges)){ ?> style="display: none;" <?php } ?> >
                                        <div class="hd_res_listsss">
                                            <h2>
                                                <span class="rit_mg">
                                                    <button type="button" class="bg-transparent border-0 shadow-none" data-toggle="modal" data-target="#miscellaneousChargesModal">
                                                    <img src="{{url('')}}/img/ad_bk.png" alt="" />
                                                    </button>
                                                </span>
                                            </h2>
                                        </div>
                                        <div id="miscellaneousCharges_section">
                                            <div class="btm_coststs">
                                                <span class="tltss">Total</span>
                                                <span class="pricss">
                                                    {{$currency}}
                                                    <span id="totalItemizedPaidAmt">0</span>
                                                    <span id="totalItemizedmiscellaneousChargesHidden" style="display: none">0</span>
                                                </span>
                                            </div>
                                        </div>
									</div>
								</div>
							<!-- </form> -->
						</div>



                        <div class="backk_bntss">
    					    @if (request()->is('properties/new-property/*'))
    					    <a href="{{ url('') }}/properties/new-property/buy-possession-improvement/<?=base64_encode($propertyID)?>">
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
    </div>
</div>
<div class="modal fade" id="sellingCostModal" tabindex="-1" role="dialog" aria-labelledby="sellingCostModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content all_frm_list">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="font-size: 30px;">
            <span aria-hidden="true">&times;</span>
            </button>
            <form id="itemizedsellingCostForm" method="POST">
                <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                <input type="hidden" name="itemizedPaidAmtID" id="itemizedPaidAmtID" value=""/>
                <input type="hidden" name="itemizedPaidAmtType" id="itemizedsellingCostType" value="amount"/>
                <input type="hidden" name="itemizedPaidAmtPropertyID" value="<?=$propertyID?>"/>
                <input type="hidden" name="itemizedPaidAmtInLoan" id="itemizedsellingCostInLoan" value="0"/>
                <div class="hd_res_listsss">
                    <h2>Add Selling Cost</h2>
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
                                <li id="tabButton-amount" class="tabLinksellingCost active" data-tab="amount">Set Amount</li>
                                <li id="tabButton-percent" class="tabLinksellingCost" data-tab="percent">Percent</li>
                            </ul>
                        </div>
                        <div class="content-wrapper">
                            <div id="tabsellingCost-amount" class="tab-content active">
                                <div class="form-group managsss1">
                                    <label>Amount </label>
                                    <span class="currencyInputprefix"><?=$currency?></span>
                                    <input name="itemizedPaidAmtAmount" id="itemizedPaidAmtAmount" class="currencyInput validateFloatInput" type="text" placeholder="Amount" value="" />
                                </div>
                            </div>
                            <div id="tabsellingCost-percent" class="tab-content">
                                <div class="form-group managsss1">
                                    <label>Percent </label>
                                    <input type="text" name="itemizedPaidAmtPercent" id="itemizedPaidAmtPercent" placeholder="Percent" value="" class="validateFloatInput" />
                                    <select class="percentOfClass" name="itemizedPaidAmtPercentOf" id="itemizedPaidAmtPercentOf">
                                    <option value="price">% of Sales Price</option>
                                    <!--<option value="loan">% Of loan</option>-->
                                    </select>
                                </div>
                            </div>
                            <div class="form-group managsss1">
                                <label>Date</label>
                                <input name="itemizedPaidAmtDate" id="itemizedPaidAmtDate" type="date" placeholder="DD MM YYYY" value="" class="datePickerDefault" required/>
                            </div>
                            <div class="form-group managsss1">
                                <div class="roll_lst">
                                    <div class="lft_raea">
                                        <label>Roll Into Loan?</label>
                                    </div>
                                    <div class="rit_raea">
                                        <ul class="ys_no">
                                            <li>
                                                <a id="sellingCostRollIntoLoanCreateYes" onclick="RollIntoLoanAll('sellingCost','Create','Yes')">Yes</a>
                                            </li>
                                            <li></li>
                                            <li>
                                                <a id="sellingCostRollIntoLoanCreateNo" onclick="RollIntoLoanAll('sellingCost','Create','No')">No</a>
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

<div class="modal fade" id="sellingCostEditModal" tabindex="-1" role="dialog" aria-labelledby="sellingCostEditModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content all_frm_list">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="font-size: 30px;">
            <span aria-hidden="true">&times;</span>
            </button>
            <form id="itemizedsellingCostFormEdit" method="POST">
                <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                <input type="hidden" name="itemizedPaidAmtID" id="itemizedsellingCostIDEdit" value=""/>
                <input type="hidden" name="itemizedPaidAmtType" id="itemizedsellingCostTypeEdit" value="amount"/>
                <input type="hidden" name="itemizedPaidAmtPropertyID" value="<?=$propertyID?>"/>
                <input type="hidden" name="itemizedPaidAmtInLoan" id="itemizedsellingCostInLoanEdit" value="0"/>
                <div class="hd_res_listsss">
                    <h2>Edit Selling Cost</h2>
                </div>
                <div class="all_frm_list">
                    <div class="form-group">
                        <label>Name </label>
                        <input type="text" name="itemizedPaidAmtName" id="itemizedsellingCostNameEdit" placeholder="Name" value="" required/>
                    </div>
                    <div class="tbss_form_lst mt-4">
                        <div class="tab-wrapper">
                            <div class="tbs_hids">Type</div>
                            <ul class="tabs">
                                <li id="tabButtonsellingCostEdit-amount" class="tabLinksellingCostEdit active" data-tab="amount">Set Amount</li>
                                <li id="tabButtonsellingCostEdit-percent" class="tabLinksellingCostEdit" data-tab="percent">Percent</li>
                            </ul>
                        </div>
                        <div class="content-wrapper">
                            <div id="tabsellingCostEdit-amount" class="tab-content active">
                                <div class="form-group managsss1">
                                    <label>Amount </label>
                                    <span class="currencyInputprefix"><?=$currency?></span>
                                    <input name="itemizedPaidAmtAmount" id="itemizedsellingCostAmountEdit" class="currencyInput validateFloatInput" type="text" placeholder="Amount" value="" />
                                </div>
                            </div>
                            <div id="tabsellingCostEdit-percent" class="tab-content">
                                <div class="form-group managsss1">
                                    <label>Percent </label>
                                    <input type="text" name="itemizedPaidAmtPercent" id="itemizedsellingCostPercentEdit" placeholder="Percent" value="" class="validateFloatInput" />
                                    <select class="percentOfClass" name="itemizedPaidAmtPercentOf" id="itemizedsellingCostPercentOfEdit">
                                    <option value="price">% of Sales Price</option>
                                    <!--<option value="loan">% Of loan</option>-->
                                    </select>
                                </div>
                            </div>
                            <div class="form-group managsss1">
                                <label>Date</label>
                                <input name="itemizedPaidAmtDate" id="itemizedsellingCostDateEdit" type="date" placeholder="DD MM YYYY" value="" class="datePickerDefault" required/>
                            </div>
                            <div class="form-group managsss1">
                                <div class="roll_lst">
                                    <div class="lft_raea">
                                        <label>Roll Into Loan?</label>
                                    </div>
                                    <div class="rit_raea">
                                        <ul class="ys_no">
                                            <li>
                                                <a id="sellingCostRollIntoLoanYesEdit" onclick="RollIntoLoanAll('sellingCost','Edit','Yes')">Yes</a>
                                            </li>
                                            <li></li>
                                            <li>
                                                <a id="sellingCostRollIntoLoanNoEdit" onclick="RollIntoLoanAll('sellingCost','Edit','No')">No</a>
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

<div class="modal fade" id="miscellaneousChargesModal" tabindex="-1" role="dialog" aria-labelledby="miscellaneousChargesModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content all_frm_list">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="font-size: 30px;">
            <span aria-hidden="true">&times;</span>
            </button>
            <form id="itemizedmiscellaneousChargesForm" method="POST">
                <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                <input type="hidden" name="itemizedPaidAmtID" id="itemizedPaidAmtID" value=""/>
                <input type="hidden" name="itemizedPaidAmtType" id="itemizedmiscellaneousChargesType" value="amount"/>
                <input type="hidden" name="itemizedPaidAmtPropertyID" value="<?=$propertyID?>"/>
                <input type="hidden" name="itemizedPaidAmtInLoan" id="itemizedmiscellaneousChargesInLoan" value="0"/>
                <div class="hd_res_listsss">
                    <h2>Add Miscellaneous & other Charges</h2>
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
                                <li id="tabButton-amount" class="tabLinkmiscellaneousCharges active" data-tab="amount">Set Amount</li>
                                <li id="tabButton-percent" class="tabLinkmiscellaneousCharges" data-tab="percent">Percent</li>
                            </ul>
                        </div>
                        <div class="content-wrapper">
                            <div id="tabmiscellaneousCharges-amount" class="tab-content active">
                                <div class="form-group managsss1">
                                    <label>Amount </label>
                                    <span class="currencyInputprefix"><?=$currency?></span>
                                    <input name="itemizedPaidAmtAmount" id="itemizedPaidAmtAmount" class="currencyInput validateFloatInput" type="text" placeholder="Amount" value="" />
                                </div>
                            </div>
                            <div id="tabmiscellaneousCharges-percent" class="tab-content">
                                <div class="form-group managsss1">
                                    <label>Percent </label>
                                    <input type="text" name="itemizedPaidAmtPercent" id="itemizedPaidAmtPercent" placeholder="Percent" value="" class="validateFloatInput" />
                                    <select class="percentOfClass" name="itemizedPaidAmtPercentOf" id="itemizedPaidAmtPercentOf">
                                    <option value="price">% of Price</option>
                                    <option value="loan">% Of loan</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group managsss1">
                                <label>Date</label>
                                <input name="itemizedPaidAmtDate" id="itemizedPaidAmtDate" type="date" placeholder="DD MM YYYY" value="" class="datePickerDefault" required/>
                            </div>
                            <div class="form-group managsss1">
                                <div class="roll_lst">
                                    <div class="lft_raea">
                                        <label>Roll Into Loan?</label>
                                    </div>
                                    <div class="rit_raea">
                                        <ul class="ys_no">
                                            <li>
                                                <a id="miscellaneousChargesRollIntoLoanCreateYes" onclick="RollIntoLoanAll('miscellaneousCharges','Create','Yes')">Yes</a>
                                            </li>
                                            <li></li>
                                            <li>
                                                <a id="miscellaneousChargesRollIntoLoanCreateNo" onclick="RollIntoLoanAll('miscellaneousCharges','Create','No')">No</a>
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

<div class="modal fade" id="miscellaneousChargesEditModal" tabindex="-1" role="dialog" aria-labelledby="miscellaneousChargesEditModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content all_frm_list">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="font-size: 30px;">
            <span aria-hidden="true">&times;</span>
            </button>
            <form id="itemizedmiscellaneousChargesFormEdit" method="POST">
                <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                <input type="hidden" name="itemizedPaidAmtID" id="itemizedmiscellaneousChargesIDEdit" value=""/>
                <input type="hidden" name="itemizedPaidAmtType" id="itemizedmiscellaneousChargesTypeEdit" value="amount"/>
                <input type="hidden" name="itemizedPaidAmtPropertyID" value="<?=$propertyID?>"/>
                <input type="hidden" name="itemizedPaidAmtInLoan" id="itemizedmiscellaneousChargesInLoanEdit" value="0"/>
                <div class="hd_res_listsss">
                    <h2>Edit Miscellaneous & other Charges</h2>
                </div>
                <div class="all_frm_list">
                    <div class="form-group">
                        <label>Name </label>
                        <input type="text" name="itemizedPaidAmtName" id="itemizedmiscellaneousChargesNameEdit" placeholder="Name" value="" required/>
                    </div>
                    <div class="tbss_form_lst mt-4">
                        <div class="tab-wrapper">
                            <div class="tbs_hids">Type</div>
                            <ul class="tabs">
                                <li id="tabButtonmiscellaneousChargesEdit-amount" class="tabLinkmiscellaneousChargesEdit active" data-tab="amount">Set Amount</li>
                                <li id="tabButtonmiscellaneousChargesEdit-percent" class="tabLinkmiscellaneousChargesEdit" data-tab="percent">Percent</li>
                            </ul>
                        </div>
                        <div class="content-wrapper">
                            <div id="tabmiscellaneousChargesEdit-amount" class="tab-content active">
                                <div class="form-group managsss1">
                                    <label>Amount </label>
                                    <span class="currencyInputprefix"><?=$currency?></span>
                                    <input name="itemizedPaidAmtAmount" id="itemizedmiscellaneousChargesAmountEdit" class="currencyInput validateFloatInput" type="text" placeholder="Amount" value="" />
                                </div>
                            </div>
                            <div id="tabmiscellaneousChargesEdit-percent" class="tab-content">
                                <div class="form-group managsss1">
                                    <label>Percent </label>
                                    <input type="text" name="itemizedPaidAmtPercent" id="itemizedmiscellaneousChargesPercentEdit" placeholder="Percent" value="" class="validateFloatInput" />
                                    <select class="percentOfClass" name="itemizedPaidAmtPercentOf" id="itemizedmiscellaneousChargesPercentOfEdit">
                                    <option value="price">% of Price</option>
                                    <option value="loan">% Of loan</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group managsss1">
                                <label>Date</label>
                                <input name="itemizedPaidAmtDate" id="itemizedmiscellaneousChargesDateEdit" type="date" placeholder="DD MM YYYY" value="" class="datePickerDefault" required/>
                            </div>
                            <div class="form-group managsss1">
                                <div class="roll_lst">
                                    <div class="lft_raea">
                                        <label>Roll Into Loan?</label>
                                    </div>
                                    <div class="rit_raea">
                                        <ul class="ys_no">
                                            <li>
                                                <a id="miscellaneousChargesRollIntoLoanYesEdit" onclick="RollIntoLoanAll('miscellaneousCharges','Edit','Yes')">Yes</a>
                                            </li>
                                            <li></li>
                                            <li>
                                                <a id="miscellaneousChargesRollIntoLoanNoEdit" onclick="RollIntoLoanAll('miscellaneousCharges','Edit','No')">No</a>
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
    // =========================== SELLING COST ===========================
    // =========================== SELLING COST ===========================
    $("#toggle1").on('change', function() {
        $("#depreciationDeduction").toggle();
        $('#depreciationPeriodImput').val('');
        $('#depreciationLandValueImput').val('');
    });
    $("#toggle11").on('change', function() {
        $("#itemisedPaidAmount").toggle();
    
        if ($(this).is(":checked")) {
            // Toggle is ON – make input readonly
            $("#totalSellingCostPercentInput").prop("readonly", true);
            
            // Get text from span and trim it
            let updateTotalValue = parseFloat($("#totalItemizedSellingCostPercentHidden").text().replace(/,/g, '').trim()) || 0;
            
            // Update input with the value from span
            if(updateTotalValue){
                $("#totalSellingCostPercentInput").val(updateTotalValue);
            }
        } else {
            // Toggle is OFF – make input editable
            $("#totalSellingCostPercentInput").prop("readonly", false);
        }
    });

    $("#toggle12").on('change', function() {
        $("#miscellaneousCharges_sectiontop").toggle();
    
        if ($(this).is(":checked")) {
            // Toggle is ON – make input readonly
            $("#totalmiscellaneousChargesPercentInput").prop("readonly", true);
            
            // Get text from span and trim it
            let updateTotalValue = parseFloat($("#totalItemizedmiscellaneousChargesHidden").text().replace(/,/g, '').trim()) || 0;
            
            // Update input with the value from span
            if(updateTotalValue){
                $("#totalmiscellaneousChargesPercentInput").val(updateTotalValue);
            }
        } else {
            // Toggle is OFF – make input editable
            $("#totalmiscellaneousChargesPercentInput").prop("readonly", false);
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
    $('#itemizedPaidAmtInLoanEdit').val(paid_inLoan);
    if(paid_inLoan == 1){
        $('#SellingCostRollIntoLoanEditYes').css('color','blue');
        $('#SellingCostRollIntoLoanEditNo').css('color','black');
    }
    if(paid_inLoan == 0){
        $('#SellingCostRollIntoLoanEditYes').css('color','black');
        $('#SellingCostRollIntoLoanEditNo').css('color','blue');
    }
    $('#paidAmountModalEdit').modal('show');
}




function updatePaidAmount(val, id) {
    paidAmtURL = '{{url('')}}' + '/EditSellingCostMainProperty';
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



    function updateTotalPaidAmountDivAllItemized(val, percent){
        $("#totalItemizedPaidAmt").text(val);

        // update percent of price
        $('#totalSellingCostPercentInput').val(percent);
    }
    
    // Selling Cost
    $('.tabLinksellingCost').click(function() {
        var tabID = $(this).attr('data-tab');
        $(this).addClass('active').siblings().removeClass('active');
        $('#tabsellingCost-' + tabID).addClass('active').siblings().removeClass('active');

        // update hidden value of paid amount form
        $("#itemizedsellingCostType").val(tabID);
    });
    
    $('.tabLinksellingCostEdit').click(function() {
        var tabID = $(this).attr('data-tab');
        $(this).addClass('active').siblings().removeClass('active');
        $('#tabsellingCostEdit-' + tabID).addClass('active').siblings().removeClass('active');

        // update hidden value of paid amount form
        $("#itemizedsellingCostTypeEdit").val(tabID);
    });
    
    function RollIntoLoanAll(section, formAction, action){
        if(formAction == 'Create'){
            if(action == 'Yes'){
                $('#itemized' + section + 'InLoan').val(1);
                $('#' + section + 'RollIntoLoanCreateYes').css('color','blue');
                $('#' + section + 'RollIntoLoanCreateNo').css('color','black');
            }
            if(action == 'No'){
                $('#itemized' + section + 'InLoan').val(0);
                $('#' + section + 'RollIntoLoanCreateYes').css('color','black');
                $('#' + section + 'RollIntoLoanCreateNo').css('color','blue');
            }
        }
        if(formAction == 'Edit'){
            if(action == 'Yes'){
                $('#itemized' + section + 'InLoanEdit').val(1);
                $('#' + section + 'RollIntoLoanYesEdit').css('color','blue');
                $('#' + section + 'RollIntoLoanNoEdit').css('color','black');
            }
            if(action == 'No'){
                $('#itemized' + section + 'InLoanEdit').val(0);
                $('#' + section + 'RollIntoLoanYesEdit').css('color','black');
                $('#' + section + 'RollIntoLoanNoEdit').css('color','blue');
            }
        }
    }
    
    // Get the form element by id
    var formsellingCost = document.getElementById("itemizedsellingCostForm");
    // Add a submit event listener to the form element
    formsellingCost.addEventListener("submit", function(event) {
        // Prevent the default form submission behavior
        event.preventDefault();

        const submitBtn = formsellingCost.querySelector("button[type='submit']");
        if (submitBtn) {
            submitBtn.disabled = true;
            submitBtn.innerText = 'Saving...';
        }

        // Get the form data as an object
        var data = {};
        var inputs = formsellingCost.querySelectorAll("input, textarea, select");
        for (var i = 0; i < inputs.length; i++) {
            data[inputs[i].name] = inputs[i].value;
        }

        paidAmtURL = '{{url('')}}' + '/addItemizedSellingCost';
        // Send the form data using ajax
        $.ajax({
            url: paidAmtURL,
            type: formsellingCost.method,
            dataType: "json",
            data: data,
            success: function(response) {
                $('#selling_cost_section').html(response.view);
                $('#totalSellingCostPercentInput').val(response.percentOfPrice);
                
                $('#sellingCostModal .close').click();
            
                document.getElementById("itemizedsellingCostForm").reset();
            },
            error: function(error) {
                alert('Something went wrong!');
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
    var formsellingCostEdit = document.getElementById("itemizedsellingCostFormEdit");
    // Add a submit event listener to the form element
    formsellingCostEdit.addEventListener("submit", function(event) {
        // Prevent the default form submission behavior
        event.preventDefault();

        const submitBtn = formsellingCostEdit.querySelector("button[type='submit']");
        if (submitBtn) {
            submitBtn.disabled = true;
            submitBtn.innerText = 'Saving...';
        }

        // Get the form data as an object
        var data = {};
        var inputs = formsellingCostEdit.querySelectorAll("input, textarea, select");
        for (var i = 0; i < inputs.length; i++) {
            data[inputs[i].name] = inputs[i].value;
        }

        // set the current total percent
        // data['oldTotalPercent'] = $('#totalSellingCostPercentInput').val();
        // data['propertySalePrice'] = $("#propertySalePrice").val();
        // data['totalItemizedPaidAmt'] = parseFloat($("#totalItemizedPaidAmt").text());

        paidAmtURL = '{{url('')}}' + '/EditItemizedSellingCost';
        // Send the form data using ajax
        $.ajax({
            url: paidAmtURL,
            type: formsellingCostEdit.method,
            dataType: "json",
            data: data,
            success: function(response) {
                $('#selling_cost_section').html(response.view);
                $('#totalSellingCostPercentInput').val(response.percentOfPrice);
                
                $('#sellingCostEditModal .close').click();
            
                document.getElementById("itemizedsellingCostFormEdit").reset();
            },
            error: function(error) {
                alert('Something went wrong!');
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
    function deletesellingCost(id, amount){
        if(confirm('do you want to delete this entry?')){
            paidAmtURL = '{{url('')}}' + '/deleteSellingCostMainProperty';
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
                    $('#selling_cost_section').html(response.view);
                    $('#totalSellingCostPercentInput').val(response.percentOfPrice);
                },
                error: function(error) {
                    console.log(error);
                    alert('Something went wrong!');
                }
            });
        }
    }

    function editsellingCost(id, prop_id, paid_name, paid_type, paid_amount, paid_percentOf, paid_date, paid_inLoan){
        $('#itemizedsellingCostIDEdit').val(id);
        // $('#itemizedPaidAmtPropertyIDEdit').val(prop_id);
        $('#itemizedsellingCostNameEdit').val(paid_name);
        $('#itemizedsellingCostTypeEdit').val(paid_type);
    
        if(paid_type == 'amount'){
            $('#itemizedsellingCostAmountEdit').val(paid_amount);
            document.getElementById("tabButtonsellingCostEdit-amount").classList.add("active");
            document.getElementById("tabButtonsellingCostEdit-percent").classList.remove("active");
            document.getElementById("tabsellingCostEdit-amount").classList.add("active");
            document.getElementById("tabsellingCostEdit-percent").classList.remove("active");
        }
        else{
            $('#itemizedsellingCostPercentEdit').val(paid_amount);
            $("#itemizedsellingCostPercentOfEdit").children('[value="'+paid_percentOf+'"]').attr('selected', true);
            document.getElementById("tabButtonsellingCostEdit-amount").classList.remove("active");
            document.getElementById("tabButtonsellingCostEdit-percent").classList.add("active");
            document.getElementById("tabsellingCostEdit-amount").classList.remove("active");
            document.getElementById("tabsellingCostEdit-percent").classList.add("active");
        }
    
        $('#itemizedsellingCostDateEdit').val(paid_date);
        $('#itemizedsellingCostInLoanEdit').val(paid_inLoan);
        if(paid_inLoan == 1){
            $('#sellingCostRollIntoLoanYesEdit').css('color','blue');
            $('#sellingCostRollIntoLoanNoEdit').css('color','black');
        }
        if(paid_inLoan == 0){
            $('#sellingCostRollIntoLoanYesEdit').css('color','black');
            $('#sellingCostRollIntoLoanNoEdit').css('color','blue');
        }
    }
    
    ////////////////////////////////////////////////////////////////////////////
    // Miscellaneous & other Charges (M & O Charges)
    $('.tabLinkmiscellaneousCharges').click(function() {
        var tabID = $(this).attr('data-tab');
        $(this).addClass('active').siblings().removeClass('active');
        $('#tabmiscellaneousCharges-' + tabID).addClass('active').siblings().removeClass('active');

        // update hidden value of paid amount form
        $("#itemizedmiscellaneousChargesType").val(tabID);
    });
    
    $('.tabLinkmiscellaneousChargesEdit').click(function() {
        var tabID = $(this).attr('data-tab');
        $(this).addClass('active').siblings().removeClass('active');
        $('#tabmiscellaneousChargesEdit-' + tabID).addClass('active').siblings().removeClass('active');

        // update hidden value of paid amount form
        $("#itemizedmiscellaneousChargesTypeEdit").val(tabID);
    });
    
    // Get the form element by id
    var formmiscellaneousCharges = document.getElementById("itemizedmiscellaneousChargesForm");
    // Add a submit event listener to the form element
    formmiscellaneousCharges.addEventListener("submit", function(event) {
        // Prevent the default form submission behavior
        event.preventDefault();

        const submitBtn = formmiscellaneousCharges.querySelector("button[type='submit']");
        if (submitBtn) {
            submitBtn.disabled = true;
            submitBtn.innerText = 'Saving...';
        }

        // Get the form data as an object
        var data = {};
        var inputs = formmiscellaneousCharges.querySelectorAll("input, textarea, select");
        for (var i = 0; i < inputs.length; i++) {
            data[inputs[i].name] = inputs[i].value;
        }

        paidAmtURL = '{{url('')}}' + '/addItemizedmiscellaneousCharges';
        // Send the form data using ajax
        $.ajax({
            url: paidAmtURL,
            type: formmiscellaneousCharges.method,
            dataType: "json",
            data: data,
            success: function(response) {
                $('#miscellaneousCharges_section').html(response.view);
                $('#totalmiscellaneousChargesPercentInput').val(response.percentOfPrice);
                
                $('#miscellaneousChargesModal .close').click();
            
                document.getElementById("itemizedmiscellaneousChargesForm").reset();
            },
            error: function(error) {
                alert('Something went wrong!');
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
    var formmiscellaneousChargesEdit = document.getElementById("itemizedmiscellaneousChargesFormEdit");
    // Add a submit event listener to the form element
    formmiscellaneousChargesEdit.addEventListener("submit", function(event) {
        // Prevent the default form submission behavior
        event.preventDefault();

        const submitBtn = formmiscellaneousChargesEdit.querySelector("button[type='submit']");
        if (submitBtn) {
            submitBtn.disabled = true;
            submitBtn.innerText = 'Saving...';
        }

        // Get the form data as an object
        var data = {};
        var inputs = formmiscellaneousChargesEdit.querySelectorAll("input, textarea, select");
        for (var i = 0; i < inputs.length; i++) {
            data[inputs[i].name] = inputs[i].value;
        }

        paidAmtURL = '{{url('')}}' + '/EditItemizedmiscellaneousCharges';
        // Send the form data using ajax
        $.ajax({
            url: paidAmtURL,
            type: formmiscellaneousChargesEdit.method,
            dataType: "json",
            data: data,
            success: function(response) {
                $('#miscellaneousCharges_section').html(response.view);
                $('#totalmiscellaneousChargesPercentInput').val(response.percentOfPrice);
                
                $('#miscellaneousChargesEditModal .close').click();
            
                document.getElementById("itemizedmiscellaneousChargesFormEdit").reset();
            },
            error: function(error) {
                alert('Something went wrong!');
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
    function deletemiscellaneousCharges(id, amount){
        if(confirm('do you want to delete this entry?')){
            paidAmtURL = '{{url('')}}' + '/deletemiscellaneousChargesMainProperty';
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
                    $('#miscellaneousCharges_section').html(response.view);
                    $('#totalmiscellaneousChargesPercentInput').val(response.percentOfPrice);
                },
                error: function(error) {
                    console.log(error);
                    alert('Something went wrong!');
                }
            });
        }
    }

    function editmiscellaneousCharges(id, prop_id, paid_name, paid_type, paid_amount, paid_percentOf, paid_date, paid_inLoan){
        $('#itemizedmiscellaneousChargesIDEdit').val(id);
        $('#itemizedmiscellaneousChargesNameEdit').val(paid_name);
        $('#itemizedmiscellaneousChargesTypeEdit').val(paid_type);
    
        if(paid_type == 'amount'){
            $('#itemizedmiscellaneousChargesAmountEdit').val(paid_amount);
            document.getElementById("tabButtonmiscellaneousChargesEdit-amount").classList.add("active");
            document.getElementById("tabButtonmiscellaneousChargesEdit-percent").classList.remove("active");
            document.getElementById("tabmiscellaneousChargesEdit-amount").classList.add("active");
            document.getElementById("tabmiscellaneousChargesEdit-percent").classList.remove("active");
        }
        else{
            $('#itemizedmiscellaneousChargesPercentEdit').val(paid_amount);
            $("#itemizedmiscellaneousChargesPercentOfEdit").val(paid_percentOf).trigger('change');
            document.getElementById("tabButtonmiscellaneousChargesEdit-amount").classList.remove("active");
            document.getElementById("tabButtonmiscellaneousChargesEdit-percent").classList.add("active");
            document.getElementById("tabmiscellaneousChargesEdit-amount").classList.remove("active");
            document.getElementById("tabmiscellaneousChargesEdit-percent").classList.add("active");
        }
    
        $('#itemizedmiscellaneousChargesDateEdit').val(paid_date);
        $('#itemizedmiscellaneousChargesInLoanEdit').val(paid_inLoan);
        if(paid_inLoan == 1){
            $('#miscellaneousChargesRollIntoLoanYesEdit').css('color','blue');
            $('#miscellaneousChargesRollIntoLoanNoEdit').css('color','black');
        }
        if(paid_inLoan == 0){
            $('#miscellaneousChargesRollIntoLoanYesEdit').css('color','black');
            $('#miscellaneousChargesRollIntoLoanNoEdit').css('color','blue');
        }
    }

    <?php if(count($Itemmiscellaneous_charges)){ ?>
    function loadmiscellaneousChargesItemized(){
        $.ajax({
            url: '{{url('')}}' + '/loadmiscellaneousChargesItemized',
            type: "POST",
            dataType: "json",
            data: {
                _token: '{{ csrf_token() }}',
                propertyID: <?=$propertyID?>
            },
            success: function(response) {
                    $('#miscellaneousCharges_section').html(response.view);
                    $('#totalmiscellaneousChargesPercentInput').val(response.percentOfPrice);
            },
            error: function(error) {
                console.log(error);
            }
        });
    }
    $(document).ready(function() {
        loadmiscellaneousChargesItemized();
    });
    <?php } ?>
    
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