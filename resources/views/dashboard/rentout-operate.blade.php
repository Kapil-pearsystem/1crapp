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

span.pursntss {
    margin-right: 100px;
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
					<h2>Rentout & Opearte</h2>
					<span class="set_vedioo" data-toggle="modal" data-target="#videotutorialmodal"><a href="javascript:void(0);"><img src="{{ asset('img/video-tutorial-new.png') }}"> </a></span>
				 </div>
				</div>
			
                <div class="col-lg-12">
                    <form id="propertyPageForm2" method="POST" action="{{url('savePropertyType1RentOutOperate')}}" enctype="multipart/form-data">
                    <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                    <input type="hidden" name="propertyID" value="{{ $propertyID }}">
                    <input type="hidden" id="basicPurchasePrice" value="{{ $MainProperty->prop_purchasePrice }}">
                    @if(Session::has('success'))
                    <div class="alert alert-success">
                        {{Session::get('success')}}
                    </div>
                    @endif
                        <!---<div class=" " data-toggle="modal" data-target="#videotutorialmodal"  style="float: right;position: relative;top: -5px;left: 0px;display: inline-block;"><a href="#"><img src="{{ url('') }}/img/video-tutorial-new.png" style="width: 85px;"></a> </div>--->

                      <div class="hd_res_listsss">
                        <h2>Rental Income</h2>
                    </div>

                    <div class="all_frm_list loanform">

                        <div class="form-group managsss1 lot_sz">
                            <label>Date of Rentout <span class="ticck" tooltip="Data Of Rentout" flow="down">?</span></label>
                            <input type="date" placeholder="Rentout Date" onChange="updateRentData(<?=$propertyID?>)" name ="date_of_rentout" value="<?=trim($MainProperty->date_of_rentout);?>" id="RentoutDate" required>

                        </div>
                        <div class="form-group managsss1 lot_sz">
                            <label>Monthly Rent <span class="ticck" tooltip="Data Coming Soon" flow="down">?</span></label>
                            <span class="currencyInputprefix"><?=$currency?></span>
                            <input type="number" placeholder="Gross Rent" onChange="updateRentData(<?=$propertyID?>)" name ="grossrent" value="<?=trim($MainProperty->grossrent);?>" onkeypress="return (event.charCode !=8 && event.charCode ==0 || ( event.charCode == 46 || (event.charCode >= 48 && event.charCode <= 57)))" class="currencyInput" id="GrossRent">
                            <span class="pusntttss">
                             <select name="grossrent_type" id="GrossrentType" onChange="updateRentData(<?=$propertyID?>)" style=" background: #4a83cc;">
                                  <option <?=$MainProperty->grossrent_type=='day' ? 'selected' : '' ?> value="day">Per Day</option>
                                  <option <?=$MainProperty->grossrent_type=='week' ? 'selected' : '' ?> value="week">Per Week</option>
                                  <option <?=$MainProperty->grossrent_type=='month' ? 'selected' : '' ?> value="month">Per Month</option>
                                  <option <?=$MainProperty->grossrent_type=='quarter' ? 'selected' : '' ?> value="quarter">Per Quarter</option>
                                  <option <?=$MainProperty->grossrent_type=='year' ? 'selected' : '' ?> value="year">Per Year</option>
                             </select>
                            </span>
                        </div>

                       <div class="form-group managsss1">
                            <label>Vacancy Rate <span class="ticck" tooltip="Data Coming Soon" flow="down">?</span></label>
                            <input type="number" name="vacancy_rate" onChange="updateRentData(<?=$propertyID?>)" placeholder="Vacancy Rate" value="<?=$MainProperty->vacancy_rate?>" class="" id="vacancyRate">
                            <span class="pursntss">%</span>
                            <!-- <span class="sm_txtx"><a href="javascript:void(0);">+Add Year-Sepecific Value</a></span> -->
                        </div>

                        <div class="row">
                        <div class="form-group managsss1 col-md-9">
                            <label>Other Income <span class="ticck" tooltip="Data Coming Soon" flow="down">?</span></label>
                             <div class="pce_amount">
                             <span class="currencyInputprefix"><?=$currency?></span>
                            <input class="currencyInput" <?php if(count($ItemPaidAmount)){ echo 'readonly';}else{ } ?> type="number" id="totalOtherIncomeYearly" name="totalOtherIncomeYearly" placeholder="Other Income" value="<?=trim($MainProperty->other_income_price);?>" >
                            <span class="pursntss">Per Month</span>

                            </div>

                        </div>

                          <div class="choss_araes col-md-3" style="padding: 0;">

                            <div class="ri_lft_araeassd" style="width: 100%;">
                                <label>Itemize Other Income</label>
								<div class="yesNoButton">
                                <input type="checkbox" class="toggle" id="toggle11" autocomplete="off" <?php if(count($ItemPaidAmount)){ echo "checked";} ?> name="otherIncomeitemizedToggle"/>
                                <label for="toggle11">
                                  <span class="on">Yes</span>
                                  <span class="off">No</span>
                                </label>
                            </div>
                            </div>
                        </div>

                        </div>



                    <!-- End Total Paid Amount (Part Of BPP) -->

                    <!-- Itemized purchase Costs  -->
                    <div class="itm_cost_prch" id="itemisedPaidAmount" <?php if(!count($ItemPaidAmount)){ echo 'style="display: none;"';} ?>>
                    <div class="hd_res_listsss">
                        <h2>Itemized Other Income <span class="rit_mg">
                            <button type="button" class="bg-transparent border-0 shadow-none" data-toggle="modal" data-target="#itemizedOtherIncomeModal">
                              <img src="{{url('')}}/img/ad_bk.png" alt="" />
                            </button></span></h2>
                    </div>
                    <div class="all_frm_list" style="padding: 0;" id="OtherIncomeItemizedDiv">
                        <div class="btm_coststs">
                            <span class="tltss">Total</span>
                            <span class="pricss"><?=$currency?>
                                <span id="totalItemizedOtherIncomeMonthly">0</span>
                                Per Month (<?=$currency?>
                                <span id="totalItemizedOtherIncomeYearly">0</span>
                                Per Year)
                            </span>
                        </div>
                    </div>
                    </div>
                    <!-- End Itemized purchase Costs  -->


                    </div>


                    
                    <!-- Itemized Holding Cost -->
                    @include('dashboard.buy_possession_improvement.holding_cost.holding_cost_section',[
                        'MainProperty'        => $MainProperty,
                        'ItemHoldingCost' => HoldingCost($MainProperty)
                    ])
                    <!-- Itemized Holding Cost -->



					<!-- Purchase costs -->
					<div class="lsting_proprty purch_list_conts brcats_listss mt-4">
                        <h3>Operating Expenses <span class="ticck" tooltip="Data Coming Soon" flow="down">?</span></h3>
                    </div>
					<div class="all_frm_list">
                        <div class="choss_araes row">
                            <div class="lft_cntts col-md-10">
                                   <div class="form-group managsss1">
                                        <label>Total</label>
                                         <div class="pce_amount"<?php if(count($ItemPurchaseCost)){ }else{ echo 'style="display: none;"';} ?>>
                                         <span class="currencyInputprefix"><?=$currency?></span>
                                        <input class="currencyInput" readonly type="number" id="totalOperatingExpenseInput" placeholder="Total Purchase Cost" value="<?=$MainProperty->operating_expense_price?>" name="operating_expense_price">
                                        <span class="pursntss">Per Month</span>

                                        </div>
                                        <div class="pce_percent" <?php if(count($ItemPurchaseCost)==0){ }else{ echo 'style="display: none;"';} ?>>
                                        <input type="text" id="operating_expense_percent_input" placeholder="0" value="<?=$MainProperty->operating_expense_percent ? $MainProperty->operating_expense_percent : '0' ?>" name="operating_expense_percent"/>
                                        <span class="pursntss">% Of Rent</span>
                                        </div>
                                    </div>
                            </div>

                            <div class="ri_lft_araeassd">
                                 <label>Itemize</label>
								 <div class="yesNoButton">
                                <input type="checkbox" @if(count($ItemPurchaseCost)) checked @endif class="toggle" id="toggle13" autocomplete="off" name="operatingExpenseitemizedToggle"/>
								<label for="toggle13">
								  <span class="on">Yes</span>
								  <span class="off">No</span>
								</label>
                            </div>
                            </div>
                        </div>

                            <!-- Itemized purchase Costs  -->
                    <div class="itm_cost_prch" id="itemisedPurchaseCost" <?php if(count($ItemPurchaseCost)){ }else{ echo 'style="display: none;"';} ?>>
                    <div class="hd_res_listsss">
                        <h3>Itemized Operating Expenses <span class="rit_mg">
                            <button type="button" class="bg-transparent border-0 shadow-none" data-toggle="modal" data-target="#purchaseCostModal">
                              <img src="{{url('')}}/img/ad_bk.png" alt="" />
                            </button></span></h3>
                    </div>
                    <div class="all_frm_list" style="padding: 0;" id="OperatingExpenseItemizedDiv">
                        <div class="btm_coststs">
                            <span class="tltss">Total</span>
                            <span class="pricss">
                                <?=$currency?>
                                <span id="totalItemizedOperatingExpenseMonthly">0</span> Per Month (<?=$currency?> 
                                <span id="totalItemizedOperatingExpenseYearly">0</span>
                                Per Year)
                            </span>
                        </div>
                    </div>
                    <!-- End Itemized purchase Costs  -->

                    </div>
                    <!-- End Purchase costs -->





					<div class="backk_bntss">
					    @if (request()->is('properties/new-property/*'))
					    <a href="{{ url('') }}/properties/new-property/possession-improvement/<?=base64_encode($propertyID)?>">
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
<div class="modal fade" id="itemizedOtherIncomeModal" tabindex="-1" role="dialog" aria-labelledby="paidAmountModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content all_frm_list">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="font-size: 30px;">
                <span aria-hidden="true">&times;</span>
            </button>
            <div class="modal-header" style="background: transparent;margin-right: 250px;border-bottom: 3px solid #ff002f;margin-bottom: 10px;padding: 0;font-weight: bold;">Add Income Source</div>
                <form id="itemizedOtherIncomeForm" method="POST">
                    <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                    <input type="hidden" name="itemizedPaidAmtID" id="itemizedPaidAmtID" value=""/>
                    <input type="hidden" name="itemizedPaidAmtType" id="itemizedPaidAmtType" class="item-type" value="amount"/>
                    <input type="hidden" name="itemizedPaidAmtPropertyID" value="<?=$propertyID?>"/>
                    <input type="hidden" name="itemizedFutureExpense" id="itemizedPaidAmtFutureExpense" value="0"/>
                    <input type="hidden" name="itemizedAfterVacancy" id="itemizedPaidAmtAfterVacancy" value="0"/>
                    <div class="form-group">
                        <label>Name </label>
                        <input type="text" name="itemizedPaidAmtName" id="itemizedPaidAmtName" placeholder="Name" value="" required/>
                    </div>

					<div class="tbss_form_lst mt-4">
                    <div class="tab-wrapper">
                        <div class="tbs_hids">Type</div>
                        <ul class="tabs">
                            <li id="tabButton-amount" class="tabLinkPurchasedAmt  percent_amount_button active" data-tab="purchasedamount">Set Amount</li>
                            <li id="tabButton-percent" class="tabLinkPurchasedAmt percent_amount_button" data-tab="purchasedpercent">Percent</li>
                        </ul>
                    </div>
                    <div class="content-wrapper">
                        <div id="tab-purchasedamount" class="tab-content active">
                            <div class="form-group managsss1">
                                <label>Amount </label>
                                <span class="currencyInputprefix"><?=$currency?></span>
                                <input name="itemizedPurchasedAmtAmount" id="itemizedPurchasedAmtAmount" class="currencyInput validateFloatInput" type="text" placeholder="Amount" value="" />
                                <select class="percentOfClass" name="itemizedPurchasedAmtOf" id="itemizedPurchasedAmtOf">
                                    <option value="Week">Per Week</option>
                                    <option value="month">Per Month</option>
                                    <option value="year">Per Year</option>
                                </select>
                            </div>
                        </div>
                        <div id="tab-purchasedpercent" class="tab-content">
                            <div class="form-group managsss1">
                                <label>Percent </label>
                                <input type="text" name="itemizedPurchasedAmtPercent" id="itemizedPurchasedAmtPercent" placeholder="Percent" value="" class="validateFloatInput" />
                                <select class="percentOfClass" name="itemizedPurchasedAmtPercentOf" id="itemizedPurchasedAmtPercentOf">
                                <option value="rent">% Of Rent</option>
                                <option value="price">% Of Price</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group managsss1 aftervacancyblock" style="display:none;">
                            <div class="roll_lst">
                                <div class="lft_raea">
                                    <label>After Vacancy?</label>
                                </div>
                                <div class="rit_raea">
                                    <ul class="ys_no">
                                        <li><a id="itemizedAfterVacancyYes" onclick="$('#itemizedPaidAmtAfterVacancy').val(1);$(this).css('color', 'blue');$('#itemizedAfterVacancyNo').css('color', 'black');">Yes</a></li>
                                        <li></li>
                                        <li><a id="itemizedAfterVacancyNo" onclick="$('#itemizedPaidAmtAfterVacancy').val(0);$(this).css('color', 'blue');$('#itemizedAfterVacancyYes').css('color', 'black');">No</a></li>
                                        <li></li>
                                    </ul>
                                    <p>Select whether this amount should be calculated <span>before or after subtracting vacancy from gross rent.</span></p>
                                </div>
                            </div>
                        </div>
                        <div class="form-group managsss1">
                            <div class="roll_lst">
                                <div class="lft_raea">
                                    <label>Future Expense?</label>
                                </div>
                                <div class="rit_raea">
                                    <ul class="ys_no">
                                        <li>
                                            <a id="itemizedFutureExpenseYes" onclick="$('#itemizedFutureExpense').val(1);$(this).css('color', 'blue');$('#itemizedFutureExpenseNo').css('color', 'black');">Yes</a>
                                        </li>
                                        <li></li>
                                        <li>
                                            <a id="itemizedFutureExpenseNo" onclick="$('#itemizedFutureExpense').val(0);$(this).css('color', 'blue');$('#itemizedFutureExpenseYes').css('color', 'black');">No</a>
                                        </li>
                                        <li></li>
                                    </ul>
                                    <p>Select whether this is an ongoing expense, or a <span>future expense you will pay during specific years.</span></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                    <div class="tbss_form_lst mt-4">
                        <div class="content-wrapper">
                            <div class="form-group managsss1">
                                <div class="roll_lst">
                                    <div class="rit_raea">
                                        <div class="bntt_cn">
                                            <a href="javascript:void(0);" data-dismiss="modal" aria-label="Close" >Cancel</a>
                                            <button type="submit" class="actsss">Add</button>
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
<div class="modal fade" id="itemizedOtherIncomeModalEdit" tabindex="-1" role="dialog" aria-labelledby="paidAmountModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content all_frm_list">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="font-size: 30px;">
                <span aria-hidden="true">&times;</span>
            </button>
            <div class="modal-header" style="background: transparent;margin-right: 250px;border-bottom: 3px solid #ff002f;margin-bottom: 10px;padding: 0;font-weight: bold;">Edit Income Source</div>
            <form id="itemizedOtherIncomeFormEdit" method="POST">
                <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                <input type="hidden" name="itemizedPaidAmtID" id="itemizedPaidAmtIDEdit" value=""/>
                <input type="hidden" name="itemizedPaidAmtType" id="itemizedPaidAmtTypeEdit" class="item-type" value="amount"/>
                <input type="hidden" name="itemizedPaidAmtPropertyIDEdit" value="<?=$propertyID?>"/>
                <input type="hidden" name="itemizedFutureExpense" id="itemizedOtherIncomeFutureExpenseEdit" value="0"/>
                <input type="hidden" name="itemizedAfterVacancy" id="itemizedOtherIncomeAfterVacancyEdit" value="0"/>
                <div class="form-group">
                    <label>Name </label>
                    <input type="text" name="itemizedPaidAmtName" id="itemizedPaidAmtNameEdit" placeholder="Name" value="" required/>
                </div>

                <div class="tbss_form_lst mt-4">
                <div class="tab-wrapper">
                    <div class="tbs_hids">Type</div>
                    <ul class="tabs">
                        <li id="tabButton-amount" class="tabLinkPurchasedAmt  purchased_amount_button active" data-tab="amount">Set Amount</li>
                        <li id="tabButton-percent" class="tabLinkPurchasedAmt purchased_amount_button" data-tab="percent">Percent</li>
                    </ul>
                </div>
                <div class="content-wrapper">
                    <div id="tab-amount" class="tab-content active">
                        <div class="form-group managsss1">
                            <label>Amount </label>
                            <span class="currencyInputprefix"><?=$currency?></span>
                            <input name="itemizedPurchasedAmtAmount" id="itemizedIncomeAmtAmountEdit" class="currencyInput validateFloatInput" type="text" placeholder="Amount" value="" />
                            <select class="percentOfClass" name="itemizedPurchasedAmtOf" id="itemizedOtherIncomeAmountofEdit">
                                <option value="Week">Per Week</option>
                                <option value="month">Per Month</option>
                                <option value="year">Per Year</option>
                            </select>
                        </div>
                    </div>
                    <div id="tab-percent" class="tab-content">
                        <div class="form-group managsss1">
                            <label>Percent </label>
                            <input type="text" name="itemizedPurchasedAmtPercent" id="itemizedIncomeAmtPercentEdit" placeholder="Percent" value="" class="validateFloatInput" />
                            <select class="percentOfClass" name="itemizedPurchasedAmtPercentOf" id="itemizedOtherIncomePercentOfEdit">
                            <option value="rent">% Of Rent</option>
                            <option value="price">% Of Price</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group managsss1 aftervacancyblock" style="display:none;">
                        <div class="roll_lst">
                            <div class="lft_raea">
                                <label>After Vacancy?</label>
                            </div>
                            <div class="rit_raea">
                                <ul class="ys_no">
                                    <li><a id="itemizedOtherIncomeAfterVacancyYes" onclick="$('#itemizedOtherIncomeAfterVacancyEdit').val(1);$(this).css('color', 'blue');$('#itemizedAfterVacancyNo').css('color', 'black');">Yes</a></li>
                                    <li></li>
                                    <li><a id="itemizedOtherIncomeAfterVacancyNo" onclick="$('#itemizedOtherIncomeAfterVacancyEdit').val(0);$(this).css('color', 'blue');$('#itemizedAfterVacancyYes').css('color', 'black');">No</a></li>
                                    <li></li>
                                </ul>
                                <p>Select whether this amount should be calculated <span>before or after subtracting vacancy from gross rent.</span></p>
                            </div>
                        </div>
                    </div>
                    <div class="form-group managsss1">
                        <div class="roll_lst">
                            <div class="lft_raea">
                                <label>Future Expense?</label>
                            </div>
                            <div class="rit_raea">
                                <ul class="ys_no">
                                    <li>
                                        <a id="itemizedOtherIncomeFutureExpenseYes" onclick="$('#itemizedOtherIncomeFutureExpenseEdit').val(1);$(this).css('color', 'blue');$('#itemizedOtherIncomeFutureExpenseNo').css('color', 'black');">Yes</a>
                                    </li>
                                    <li></li>
                                    <li>
                                        <a id="itemizedOtherIncomeFutureExpenseNo" onclick="$('#itemizedOtherIncomeFutureExpenseEdit').val(0);$(this).css('color', 'blue');$('#itemizedOtherIncomeFutureExpenseYes').css('color', 'black');">No</a>
                                    </li>
                                    <li></li>
                                </ul>
                                <p>Select whether this is an ongoing expense, or a <span>future expense you will pay during specific years.</span></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


                <div class="tbss_form_lst mt-4">
                    <div class="content-wrapper">
                        <div class="form-group managsss1">
                            <div class="roll_lst">
                                <div class="rit_raea">
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
<div class="modal fade" id="purchaseCostModal" tabindex="-1" role="dialog" aria-labelledby="purchaseCostModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content all_frm_list">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="font-size: 30px;">
                <span aria-hidden="true">&times;</span>
            </button>
            <div class="modal-header" style="background: transparent;margin-right: 235px;border-bottom: 3px solid #ff002f;margin-bottom: 10px;padding: 0;font-weight: bold;">Add Operating Expense</div>
            <form id="itemizedOperatingExpenseAmtForm" method="POST">
                <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                <input type="hidden" name="itemizedPurchasedAmtID" id="itemizedPurchasedAmtID" value=""/>
                <input type="hidden" name="itemizedPurchasedAmtType" id="itemizedOperatingExpenseType" value="amount"/>
                <input type="hidden" name="itemizedPurchasedAmtPropertyID" value="<?=$propertyID?>"/>
                <input type="hidden" name="itemizedFutureExpense" id="itemizedFutureExpense" value="0"/>
                <input type="hidden" name="itemizedAfterVacancy" id="itemizedAfterVacancy" value="0"/>
                <div class="form-group">
                    <label>Name </label>
                    <input type="text" name="itemizedPurchasedAmtName" id="itemizedPurchasedAmtName" placeholder="Name" value="" required/>
                </div>
                <div class="tbss_form_lst mt-4">
                    <div class="tab-wrapper">
                        <div class="tbs_hids">Type</div>
                        <ul class="tabs">
                            <li id="tabButton-amount" class="tabLinkPurchasedAmt  OperatingExpensePercent_amount_button active" data-tab="amount">Set Amount</li>
                            <li id="tabButton-percent" class="tabLinkPurchasedAmt OperatingExpensePercent_amount_button" data-tab="percent">Percent</li>
                        </ul>
                    </div>
                    <div class="content-wrapper">
                        <div id="tabOperatingExpense-amount" class="tab-content active">
                            <div class="form-group managsss1">
                                <label>Amount </label>
                                <span class="currencyInputprefix"><?=$currency?></span>
                                <input name="itemizedPurchasedAmtAmount" id="itemizedPurchasedAmtAmount" class="currencyInput validateFloatInput" type="text" placeholder="Amount" value="" />
                                <select class="percentOfClass" name="itemizedPurchasedAmtOf" id="itemizedPurchasedAmtOf">
                                    <option value="month">Per Month</option>
                                    <option value="year">Per Year</option>
                                </select>
                            </div>
                        </div>
                        <div id="tabOperatingExpense-percent" class="tab-content">
                            <div class="form-group managsss1">
                                <label>Percent </label>
                                <input type="text" name="itemizedPurchasedAmtPercent" id="itemizedPurchasedAmtPercent" placeholder="Percent" value="" class="validateFloatInput" />
                                <select class="percentOfClass" name="itemizedPurchasedAmtPercentOf" id="itemizedPurchasedAmtPercentOf">
                                <option value="rent">% Of Rent</option>
                                <option value="price">% Of Price</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group managsss1 aftervacancyblock" style="display:none;">
                            <div class="roll_lst">
                                <div class="lft_raea">
                                    <label>After Vacancy?</label>
                                </div>
                                <div class="rit_raea">
                                    <ul class="ys_no">
                                        <li><a id="itemizedAfterVacancyYes" onclick="$('#itemizedAfterVacancy').val(1);$(this).css('color', 'blue');$('#itemizedAfterVacancyNo').css('color', 'black');">Yes</a></li>
                                        <li></li>
                                        <li><a id="itemizedAfterVacancyNo" onclick="$('#itemizedAfterVacancy').val(0);$(this).css('color', 'blue');$('#itemizedAfterVacancyYes').css('color', 'black');">No</a></li>
                                        <li></li>
                                    </ul>
                                    <p>Select whether this amount should be calculated <span>before or after subtracting vacancy from gross rent.</span></p>
                                </div>
                            </div>
                        </div>
                        <div class="form-group managsss1">
                            <div class="roll_lst">
                                <div class="lft_raea">
                                    <label>Future Expense?</label>
                                </div>
                                <div class="rit_raea">
                                    <ul class="ys_no">
                                        <li>
                                            <a id="itemizedFutureExpenseYes" onclick="$('#itemizedFutureExpense').val(1);$(this).css('color', 'blue');$('#itemizedFutureExpenseNo').css('color', 'black');">Yes</a>
                                        </li>
                                        <li></li>
                                        <li>
                                            <a id="itemizedFutureExpenseNo" onclick="$('#itemizedFutureExpense').val(0);$(this).css('color', 'blue');$('#itemizedFutureExpenseYes').css('color', 'black');">No</a>
                                        </li>
                                        <li></li>
                                    </ul>
                                    <p>Select whether this is an ongoing expense, or a <span>future expense you will pay during specific years.</span></p>
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
<div class="modal fade" id="EditOperatingExpense" tabindex="-1" role="dialog" aria-labelledby="PurchasedAmountModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content all_frm_list">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="font-size: 30px;">
                <span aria-hidden="true">&times;</span>
            </button>
            <div class="modal-header" style="background: transparent;margin-right: 235px;border-bottom: 3px solid #ff002f;margin-bottom: 10px;padding: 0;font-weight: bold;">Edit Operating Expense</div>
            <form id="itemizedOperatingExpenseFormEdit" method="POST">
                <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                <input type="hidden" name="itemizedPurchasedAmtID" id="itemizedPurchasedAmtIDEdit" value=""/>
                <input type="hidden" name="itemizedPurchasedAmtType" id="itemizedOperatingExpenseTypeEdit" value="amount"/>
                <input type="hidden" name="itemizedPurchasedAmtPropertyID" value="<?=$propertyID?>"/>
                <input type="hidden" name="itemizedFutureExpense" id="itemizedFutureExpenseEdit" value="0"/>
                <input type="hidden" name="itemizedAfterVacancy" id="itemizedAfterVacancyEdit" value="0"/>
                <div class="form-group">
                    <label>Name </label>
                    <input type="text" name="itemizedPurchasedAmtName" id="itemizedPurchasedAmtNameEdit" placeholder="Name" value="" required/>
                </div>
                <div class="tbss_form_lst mt-4">
                    <div class="tab-wrapper">
                        <div class="tbs_hids">Type</div>
                        <ul class="tabs">
                            <li id="tabButton-purchasedamountEdit" class="tabLinkPurchasedAmt OperatingExpensePercent_amount_button_edit active" data-tab="purchasedamountEdit">Set Amount</li>
                            <li id="tabButton-purchasedpercentEdit" class="tabLinkPurchasedAmt OperatingExpensePercent_amount_button_edit" data-tab="purchasedpercentEdit">Percent</li>
                        </ul>
                    </div>
                    <div class="content-wrapper">
                        <div id="tab-purchasedamountEdit" class="tab-content active">
                            <div class="form-group managsss1">
                                <label>Amount </label>
                                <span class="currencyInputprefix"><?=$currency?></span>
                                <input name="itemizedPurchasedAmtAmount" id="itemizedPurchasedAmtAmountEdit" class="currencyInput validateFloatInput" type="text" placeholder="Amount" value="" />
                                <select class="percentOfClass" name="itemizedPurchasedAmtOf" id="itemizedPurchasedAmtOfEdit">
                                    <option value="month">Per Month</option>
                                    <option value="year">Per Year</option>
                                </select>
                            </div>
                        </div>
                        <div id="tab-purchasedpercentEdit" class="tab-content">
                            <div class="form-group managsss1">
                                <label>Percent </label>
                                <input type="text" name="itemizedPurchasedAmtPercent" id="itemizedPurchasedAmtPercentEdit" placeholder="Percent" value="" class="validateFloatInput" />
                                <select class="percentOfClass" name="itemizedPurchasedAmtPercentOf" id="itemizedPurchasedAmtPercentOfEdit">
                                    <option value="rent">% Of Rent</option>
                                    <option value="price">% Of Price</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group managsss1 aftervacancyblock" style="display:none;">
                            <div class="roll_lst">
                                <div class="lft_raea">
                                    <label>After Vacancy?</label>
                                </div>
                                <div class="rit_raea">
                                    <ul class="ys_no">
                                        <li><a id="itemizedAfterVacancyEditYes" onclick="$('#itemizedAfterVacancyEdit').val(1);$(this).css('color', 'blue');$('#itemizedAfterVacancyEditNo').css('color', 'black');">Yes</a></li>
                                        <li></li>
                                        <li><a id="itemizedAfterVacancyEditNo" onclick="$('#itemizedAfterVacancyEdit').val(0);$(this).css('color', 'blue');$('#itemizedAfterVacancyEditYes').css('color', 'black');">No</a></li>
                                        <li></li>
                                    </ul>
                                    <p>Select whether this amount should be calculated <span>before or after subtracting vacancy from gross rent.</span></p>
                                </div>
                            </div>
                        </div>
                        <div class="form-group managsss1">
                            <div class="roll_lst">
                                <div class="lft_raea">
                                    <label>Future Expense?</label>
                                </div>
                                <div class="rit_raea">
                                    <ul class="ys_no">
                                        <li>
                                            <a id="itemizedFutureExpenseEditYes" onclick="$('#itemizedFutureExpenseEdit').val(1);$(this).css('color', 'blue');$('#itemizedFutureExpenseEditNo').css('color', 'black');">Yes</a>
                                        </li>
                                        <li></li>
                                        <li>
                                            <a id="itemizedFutureExpenseEditNo" onclick="$('#itemizedFutureExpenseEdit').val(0);$(this).css('color', 'blue');$('#itemizedFutureExpenseEditYes').css('color', 'black');">No</a>
                                        </li>
                                        <li></li>
                                    </ul>
                                    <p>Select whether this is an ongoing expense, or a <span>future expense you will pay during specific years.</span></p>
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


<!--Holding cost-->
@include('dashboard.buy_possession_improvement.holding_cost.modals',[
    'holdingCostData' => HoldingCost($MainProperty)
])


<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/numeral.js/2.0.6/numeral.min.js"></script>

<script>
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
    function setLoanTypeOptions(vals,option){
        /* if(vals=='1'){
            $('.mortgagebox_'+option).show();
        }else{
            $('.mortgagebox_'+option).hide();
        }*/
    }
    $(function(){
        $(".datePickerDefault").datepicker();
    });
    $("#toggle").on('change', function() {
        $("#financeToggleDiv").toggle();
    });
    $("#toggle11").on('change', function() {
        $("#itemisedPaidAmount").toggle();

        if($("#toggle11").is(":checked")){
            $('#totalOtherIncomeYearly').attr("readonly", "readonly");
            
            // Get text from span and trim it
            let updateTotalValue = parseFloat($("#totalItemizedOtherIncomeMonthly").text().replace(/,/g, '').trim()) || 0;
            
            // Update input with the value from span
            if(updateTotalValue){
                $("#totalOtherIncomeYearly").val(updateTotalValue);
            }
        }else{
            $('#totalOtherIncomeYearly').removeAttr("readonly");
        }
    });
    $("#toggle13").on('change', function() {
        $("#itemisedPurchaseCost").toggle();
        $(".pce_amount").toggle();
        $(".pce_percent").toggle();
    });
    function updateTotalPaidAmountDiv(val){
        $('#totalPaidAmountDiv').text('₹ ' + val)
        $('#totalPaidAmountInput').val(val)
    }

    function updateTotalPaidAmountDivAllItemized(val){
        console.log('val-test',val);
        $('#totalPaidAmountDiv').text('₹ ' + val)
        $('#totalPaidAmountInput').val(val)
        $('#totalOtherIncomeYearly').val(val)
        $("#totalItemizedPaidAmt").text(val);
        $("#totalItemizedPaidAmtyearly").text(val * 12);
    }

    function updateTotalPurchasedAmountDiv(val){
        $('#totalPurchasedAmountInput').val(val)
    }

    function updateTotalPurchasedAmountDivAllItemized(val){
        $('#totalPurchasedAmountInput').val(val)
        $('#totalOperatingExpenseInput').val(val)
        $("#totalItemizedPurchasedAmt").text(val);
        $("#totalItemizedPurchasedAmtyearly").text(val * 12);
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

    // Get the form element by id
    var form = document.getElementById("itemizedOtherIncomeForm");
    // Add a submit event listener to the form element
    form.addEventListener("submit", function(event) {
        // Prevent the default form submission behavior
        event.preventDefault();

        const submitBtn = form.querySelector("button[type='submit']");
        if (submitBtn) {
            submitBtn.disabled = true;
            submitBtn.innerText = 'Saving...';
        }

        // Get the form data as an object
        var data = {};
        var inputs = form.querySelectorAll("input, textarea, select");
        for (var i = 0; i < inputs.length; i++) {
            data[inputs[i].name] = inputs[i].value;
        }
        var amount = 0;
        //  console.log(data);
        paidAmtURL = '{{url('')}}' + '/addItemizedOtherIncome';
        // Send the form data using ajax
        $.ajax({
            url: paidAmtURL,
            type: form.method,
            dataType: "json",
            data: data,
            success: function(response) {
                $('#OtherIncomeItemizedDiv').html(response.divText);
                
                // update total on all fields for monthly and yearly
                $('#totalItemizedOtherIncomeMonthly').html(response.newAmt.monthly);
                $('#totalItemizedOtherIncomeYearly').html(response.newAmt.yearly);
                
                $('#totalOtherIncomeYearly').val(response.newAmt.monthly);
                
                // Close the modal popup
                $('#itemizedOtherIncomeModal .close').click();
                document.getElementById("itemizedOtherIncomeForm").reset();
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

    // function editIPA(id, prop_id, paid_name, paid_type, paid_amount){
    //     $('#itemizedPaidAmtIDEdit').val(id);
    //     $('#itemizedPaidAmtPropertyIDEdit').val(prop_id);
    //     $('#itemizedPaidAmtNameEdit').val(paid_name);
    //     $('#itemizedPaidAmtTypeEdit').val(paid_type);
    //     // $("#itemizedPaidAmtTypeEdit").children('[value="'+paid_type+'"]').attr('selected', true);
    //     $('#itemizedOtherIncomeModalEdit').modal('show');
    //     if(paid_type == 'amount'){
    //         $('#itemizedIncomeAmtAmountEdit').val(paid_amount);
    //     }else{
    //         $('#itemizedIncomeAmtPercentEdit').val(paid_amount);
    //     }
    // }
    function editIPA(id, prop_id, paid_name, paid_type, paid_amount, paid_percentOf, paid_amountOf, paid_infuture, paid_aftervacancy) {
        console.log(id, prop_id, paid_name, paid_type, paid_amount, paid_percentOf, paid_amountOf, paid_infuture,paid_aftervacancy);
        // Set form field values
        $('#itemizedPaidAmtIDEdit').val(id);
        $('#itemizedPaidAmtPropertyIDEdit').val(prop_id);
        $('#itemizedPaidAmtNameEdit').val(paid_name);
        $('#itemizedPaidAmtTypeEdit').val(paid_type);

        // Show the modal
        $('#itemizedOtherIncomeModalEdit').modal('show');

        // Handle type-specific logic
        if (paid_type === 'amount') {
            // Activate amount tab and set value
            $('#itemizedIncomeAmtAmountEdit').val(paid_amount);
            $('#tabButton-amount').addClass('active');
            $('#tabButton-percent').removeClass('active');
            $('#tab-amount').addClass('active');
            $('#tab-percent').removeClass('active');
            
            $("#itemizedOtherIncomeAmountofEdit").val(paid_amountOf).trigger('change');
            $('.aftervacancyblock').hide();
        } else {
            // Activate percent tab and set value
            $('#itemizedIncomeAmtPercentEdit').val(paid_amount);
            $('#tabButton-amount').removeClass('active');
            $('#tabButton-percent').addClass('active');
            $('#tab-amount').removeClass('active');
            $('#tab-percent').addClass('active');
            
            $("#itemizedOtherIncomePercentOfEdit").val(paid_percentOf).trigger('change');
            $('.aftervacancyblock').show();
        }
        
        $('#itemizedOtherIncomeFutureExpenseEdit').val(paid_infuture);
        $('#itemizedOtherIncomeAfterVacancyEdit').val(paid_aftervacancy);
        if(paid_infuture==1){
            $('#itemizedOtherIncomeFutureExpenseYes').click();
        }else{
            $('#itemizedOtherIncomeFutureExpenseNo').click();
        }

        if(paid_aftervacancy==1){
            $('#itemizedOtherIncomeAfterVacancyYes').click();
        }else{
            $('#itemizedOtherIncomeAfterVacancyNo').click();
        }
    }

    // Get the form element by id
    var formEdit = document.getElementById("itemizedOtherIncomeFormEdit");
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
        var data = {};
        var inputs = formEdit.querySelectorAll("input, textarea, select");
        for (var i = 0; i < inputs.length; i++) {
            data[inputs[i].name] = inputs[i].value;
        }
        // console.log(data);
        paidAmtURL = '{{url('')}}' + '/EditItemizedOtherIncome';
        // Send the form data using ajax
        $.ajax({
            url: paidAmtURL,
            type: form.method,
            dataType: "json",
            data: data,
            success: function(response) {
                $('#OtherIncomeItemizedDiv').html(response.divText);
                
                // update total on all fields for monthly and yearly
                $('#totalItemizedOtherIncomeMonthly').html(response.newAmt.monthly);
                $('#totalItemizedOtherIncomeYearly').html(response.newAmt.yearly);
                
                $('#totalOtherIncomeYearly').val(response.newAmt.monthly);
                
                $('#itemizedOtherIncomeModalEdit .close').click();
                $('#itemizedOtherIncomeModalEdit').modal('hide');
                document.getElementById("itemizedOtherIncomeFormEdit").reset();
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

    function updatePaidAmount(val, id) {
        paidAmtURL = '{{url('')}}' + '/EditOtherIncomeMainProperty';
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
            paidAmtURL = '{{url('')}}' + '/deleteOtherIncomeMainProperty';
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
                    $('#OtherIncomeItemizedDiv').html(response.divText);
                    
                    // update total on all fields for monthly and yearly
                    $('#totalItemizedOtherIncomeMonthly').html(response.newAmt.monthly);
                    $('#totalItemizedOtherIncomeYearly').html(response.newAmt.yearly);
                    
                    $('#totalOtherIncomeYearly').val(response.newAmt.monthly);
                },
                error: function(error) {
                    console.log(error);
                }
            });
        }
    }
</script>


<script>
    $('.percent_amount_button').click(function() {
        var tabID = $(this).attr('data-tab');
        $(this).addClass('active').siblings().removeClass('active');
        $('#tab-' + tabID).addClass('active').siblings().removeClass('active');

        // update hidden value of paid amount form
        if(tabID=='purchasedamount' || tabID=='amount'){
            tabID = 'amount';
            $('.aftervacancyblock').hide();
        }else{
            tabID = 'percent';
            $('.aftervacancyblock').show();
        }
        $("#itemizedPurchasedAmtType").val(tabID);
        $(".item-type").val(tabID);
    });
    $('.purchased_amount_button').click(function() {
        var tabID = $(this).attr('data-tab');
        $(this).addClass('active').siblings().removeClass('active');
        $('#tab-' + tabID).addClass('active').siblings().removeClass('active');

        // update hidden value of paid amount form
        if(tabID=='purchasedamount' || tabID=='amount'){
            tabID = 'amount';
            $('.aftervacancyblock').hide();
        }else{
            tabID = 'percent';
            $('.aftervacancyblock').show();
        }
        $("#itemizedPaidAmtType").val(tabID);
        $(".item-type").val(tabID);
    });

    $('.percent_amount_button_edit').click(function() {
        var tabID = $(this).attr('data-tab');
        $(this).addClass('active').siblings().removeClass('active');
        $('#tab-' + tabID).addClass('active').siblings().removeClass('active');

        // update hidden value of paid amount form
        if(tabID=='purchasedamountEdit'){
            tabID = 'amount';
            $('.aftervacancyblock').hide();
        }else{
            tabID = 'percent';
            $('.aftervacancyblock').show();
        }
        $("#itemizedPurchasedAmtType").val(tabID);
    });
    
    
    $('.OperatingExpensePercent_amount_button').click(function() {
        var tabID = $(this).attr('data-tab');
        $(this).addClass('active').siblings().removeClass('active');
        $('#tabOperatingExpense-' + tabID).addClass('active').siblings().removeClass('active');

        // update hidden value of paid amount form
        if(tabID=='purchasedamount' || tabID=='amount'){
            tabID = 'amount';
            $('.aftervacancyblock').hide();
        }else{
            tabID = 'percent';
            $('.aftervacancyblock').show();
        }
        $("#itemizedOperatingExpenseType").val(tabID);
        $(".item-type").val(tabID);
    });
    
    $('.OperatingExpensePercent_amount_button_edit').click(function() {
        var tabID = $(this).attr('data-tab');
        $(this).addClass('active').siblings().removeClass('active');
        $('#tab-' + tabID).addClass('active').siblings().removeClass('active');

        // update hidden value of paid amount form
        if(tabID=='purchasedamount' || tabID=='amount'){
            tabID = 'amount';
            $('.aftervacancyblock').hide();
        }else{
            tabID = 'percent';
            $('.aftervacancyblock').show();
        }
        $("#itemizedOperatingExpenseTypeEdit").val(tabID);
        $(".item-type").val(tabID);
    });

    // Get the form element by id
    var pform = document.getElementById("itemizedOperatingExpenseAmtForm");
// Add a submit event listener to the form element
    pform.addEventListener("submit", function (event) {
        // Prevent the default form submission behavior
        event.preventDefault();

        const submitBtn = pform.querySelector("button[type='submit']");
        if (submitBtn) {
            submitBtn.disabled = true;
            submitBtn.innerText = 'Saving...';
        }

        // Get the form data as an object
        var data = {};
        var inputs = pform.querySelectorAll("input, textarea, select");
        for (var i = 0; i < inputs.length; i++) {
            data[inputs[i].name] = inputs[i].value;
        }

        paidAmtURL = '{{url('')}}' + '/addItemizedOperativeExpense';
        // Send the form data using AJAX
        $.ajax({
            url: paidAmtURL,
            type: pform.method,
            dataType: "json",
            data: data,
            success: function (response) {
                $('#OperatingExpenseItemizedDiv').html(response.divText);
                
                // update total on all fields for monthly and yearly
                $('#totalItemizedOperatingExpenseMonthly').html(response.newAmt.monthly);
                $('#totalItemizedOperatingExpenseYearly').html(response.newAmt.yearly);
                
                $('#totalOperatingExpenseInput').val(response.newAmt.monthly);
                
                // update the operating expense in percent of rent
                // $('#operating_expense_percent_input').val(response.newAmt.percent);
                
                document.getElementById("itemizedOperatingExpenseAmtForm").reset();
                
                // Close the modal popup
                $('.modal .close').click();
            },
            error: function (error) {
                console.error("Error saving data:", error);
                alert("An error occurred while processing your request.");
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


    function editIPURA(id, prop_id, paid_name, paid_type, paid_amount, paid_percentOf, paid_infuture,paid_aftervacancy,paid_of){
        // console.log(id, prop_id, paid_name, paid_type, paid_amount, paid_percentOf, paid_infuture,paid_aftervacancy,paid_of);
        $('#itemizedPurchasedAmtIDEdit').val(id);
        $('#itemizedPurchasedAmtPropertyIDEdit').val(prop_id);
        $('#itemizedPurchasedAmtNameEdit').val(paid_name);
        $('#itemizedOperatingExpenseTypeEdit').val(paid_type);
        if(paid_type == 'amount'){
            $('#itemizedPurchasedAmtAmountEdit').val(paid_amount);
            document.getElementById("tabButton-purchasedamountEdit").classList.add("active");
            document.getElementById("tabButton-purchasedpercentEdit").classList.remove("active");
            document.getElementById("tab-purchasedamountEdit").classList.add("active");
            document.getElementById("tab-purchasedpercentEdit").classList.remove("active");
            $("#itemizedPurchasedAmtOfEdit").val(paid_of).trigger('change');
            $('.aftervacancyblock').hide();
        }
        else{
            $('#itemizedPurchasedAmtPercentEdit').val(paid_amount);
            $("#itemizedPurchasedAmtPercentOfEdit").val(paid_percentOf).trigger('change');
            document.getElementById("tabButton-purchasedamountEdit").classList.remove("active");
            document.getElementById("tabButton-purchasedpercentEdit").classList.add("active");
            document.getElementById("tab-purchasedamountEdit").classList.remove("active");
            document.getElementById("tab-purchasedpercentEdit").classList.add("active");
            $('.aftervacancyblock').show();
        }

        // $("#itemizedPurchasedAmtPercentOfEdit").children('[value="'+paid_percentOf+'"]').attr('selected', true);
        // $("#itemizedPurchasedAmtOfEdit").children('[value="'+paid_of+'"]').attr('selected', true);
        // $('#itemizedPurchasedAmtInLoanEdit').val(paid_inLoan);
        $('#itemizedFutureExpenseEdit').val(paid_infuture);
        $('#itemizedAfterVacancyEdit').val(paid_aftervacancy);
        if(paid_infuture==1){
            $('#itemizedFutureExpenseEditYes').click();
        }else{
            $('#itemizedFutureExpenseEditNo').click();
        }

        if(paid_aftervacancy==1){
            $('#itemizedAfterVacancyEditYes').click();
        }else{
            $('#itemizedAfterVacancyEditNo').click();
        }
        // $('#EditOperatingExpense').modal('show');
    }


    // Get the form element by id
    var pformEdit = document.getElementById("itemizedOperatingExpenseFormEdit");
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
        var data = {};
        var inputs = pformEdit.querySelectorAll("input, textarea, select");
        for (var i = 0; i < inputs.length; i++) {
            data[inputs[i].name] = inputs[i].value;
        }
        // console.log(data);
        paidAmtURL = '{{url('')}}' + '/EditItemizedOperativeExpense';
        // Send the form data using ajax
        $.ajax({
            url: paidAmtURL,
            type: pformEdit.method,
            dataType: "json",
            data: data,
            success: function(response) {
                $('#OperatingExpenseItemizedDiv').html(response.divText);
                
                // update total on all fields for monthly and yearly
                $('#totalItemizedOperatingExpenseMonthly').html(response.newAmt.monthly);
                $('#totalItemizedOperatingExpenseYearly').html(response.newAmt.yearly);
                
                $('#totalOperatingExpenseInput').val(response.newAmt.monthly);
                
                // update the operating expense in percent of rent
                // $('#operating_expense_percent_input').val(response.newAmt.percent);
                
                document.getElementById("itemizedOperatingExpenseFormEdit").reset();
                
                // Close the modal popup
                $('.modal .close').click();
            },
            error: function(error) {
                console.error("Error saving data:", error);
                alert("An error occurred while processing your request.");
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

    function updatePurchasedAmount(val, id) {
        paidAmtURL = '{{url('')}}' + '/EditOperativeExpenseMainProperty';
        var prop_costPurchasePrice = $('#totalOperatingExpenseInput').val();
        $.ajax({
            url: paidAmtURL,
            type: "POST",
            dataType: "json",
            data: {
                _token: '{{ csrf_token() }}',
                paidAmt: val,
                prop_costPurchasePrice:prop_costPurchasePrice,
                propertyID: id
            },
            success: function(response) {
            },
            error: function(error) {
                console.log(error);
            }
        });
    }

    function deleteIPURA(id, amount){
        if(confirm('do you want to delete this entry?')){
            paidAmtURL = '{{url('')}}' + '/deleteOperativeExpenseMainProperty';
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
                $('#OperatingExpenseItemizedDiv').html(response.divText);
                
                // update total on all fields for monthly and yearly
                $('#totalItemizedOperatingExpenseMonthly').html(response.newAmt.monthly);
                $('#totalItemizedOperatingExpenseYearly').html(response.newAmt.yearly);
                
                $('#totalOperatingExpenseInput').val(response.newAmt.monthly);
                
                // update the operating expense in percent of rent
                // $('#operating_expense_percent_input').val(response.newAmt.percent);
            },
            error: function(error) {
                console.log(error);
            }
        });
        }

    }

    function updateRentData(id) {
        paidAmtURL = '{{url('')}}' + '/EditOperativeExpenseMainProperty';
        var RentoutDate = $('#RentoutDate').val();
        var GrossRent = $('#GrossRent').val();
        var GrossrentType = $('#GrossrentType').val();
        var vacancyRate = $('#vacancyRate').val();
        $.ajax({
            url: paidAmtURL,
            type: "POST",
            dataType: "json",
            data: {
                _token: '{{ csrf_token() }}',
                RentoutDate: RentoutDate,
                GrossRent:GrossRent,
                GrossrentType:GrossrentType,
                vacancyRate:vacancyRate,
                propertyID: id
            },
            success: function(response) {
            },
            error: function(error) {
                console.log(error);
            }
        });
    }
    
    <?php if(count($ItemPaidAmount)){ ?>
    function loadOtherIncomeItemized(){
        $.ajax({
            url: '{{url('')}}' + '/loadOtherIncomeItemized',
            type: "POST",
            dataType: "json",
            data: {
                _token: '{{ csrf_token() }}',
                propertyID: <?=$propertyID?>
            },
            success: function(response) {
                $('#OtherIncomeItemizedDiv').html(response.divText);
                
                // update total on all fields for monthly and yearly
                $('#totalItemizedOtherIncomeMonthly').html(response.newAmt.monthly);
                $('#totalItemizedOtherIncomeYearly').html(response.newAmt.yearly);
                
                $('#totalOtherIncomeYearly').val(response.newAmt.monthly);
            },
            error: function(error) {
                console.log(error);
            }
        });
    }
    $(document).ready(function() {
        loadOtherIncomeItemized();
    });
    <?php } ?>
    
    <?php if(count($ItemPurchaseCost)){ ?>
    function loadOperatingExpenseItemized(){
        $.ajax({
            url: '{{url('')}}' + '/loadOperatingExpenseItemized',
            type: "POST",
            dataType: "json",
            data: {
                _token: '{{ csrf_token() }}',
                propertyID: <?=$propertyID?>
            },
            success: function(response) {
                $('#OperatingExpenseItemizedDiv').html(response.divText);
                
                // update total on all fields for monthly and yearly
                $('#totalItemizedOperatingExpenseMonthly').html(response.newAmt.monthly);
                $('#totalItemizedOperatingExpenseYearly').html(response.newAmt.yearly);
                
                $('#totalOperatingExpenseInput').val(response.newAmt.monthly);
            },
            error: function(error) {
                console.log(error);
            }
        });
    }
    $(document).ready(function() {
        loadOperatingExpenseItemized();
    });
    <?php } ?>
</script>

<script>
// Holding Cost
    $("#toggle4").on('change', function() {
        $("#itemisedHoldingCost").toggle();

        if($("#toggle4").is(":checked")){
            $('#totalHoldingCostPInput').attr("readonly", "readonly");
            
            // Get text from span and trim it
            let updateTotalValue = parseFloat($("#totalHoldingCostPercentHidden").text().replace(/,/g, '').trim()) || 0;
            
            // Update input with the value from span
            if(updateTotalValue){
                $("#totalHoldingCostPInput").val(updateTotalValue);
            }
        }else{
            $('#totalHoldingCostPInput').removeAttr("readonly");
        }
    });
    
    function RollIntoLoan(section,formAction,action){
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
    
    // =====================================        HOLDING COST         ===================================
        // Get the form element by id
        var form4 = document.getElementById("itemizedHoldingCostForm");
        // Add a submit event listener to the form element
        form4.addEventListener("submit", function(event) {
            // Prevent the default form submission behavior
            event.preventDefault();

            const submitBtn = form4.querySelector("button[type='submit']");
            if (submitBtn) {
                submitBtn.disabled = true;
                submitBtn.innerText = 'Saving...';
            }
            
            // Get the form data as an object
            var data = {};
            var inputs = form4.querySelectorAll("input, textarea, select");
            for (var i = 0; i < inputs.length; i++) {
                data[inputs[i].name] = inputs[i].value;
            }

            paidAmtURL = '{{url('')}}' + '/addItemizedHoldingCost';
            // Send the form data using ajax
            $.ajax({
                url: paidAmtURL,
                type: form4.method,
                dataType: "json",
                data: data,
                success: function(response) {
                    $('#holding_cost_content').html(response.view);
                    $('#totalHoldingCostPInput').val(response.percentOfPrice);
                    document.getElementById("itemizedHoldingCostForm").reset();
                    $('#HoldingCostModal .close').click();
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
        var formEdit4 = document.getElementById("itemizedHoldingCostFormEdit");
        // Add a submit event listener to the form element
        formEdit4.addEventListener("submit", function(event) {
            // Prevent the default form submission behavior
            event.preventDefault();

            const submitBtn = formEdit4.querySelector("button[type='submit']");
            if (submitBtn) {
                submitBtn.disabled = true;
                submitBtn.innerText = 'Saving...';
            }
            
            // Get the form data as an object
            var data = {};
            var inputs = formEdit4.querySelectorAll("input, textarea, select");
            for (var i = 0; i < inputs.length; i++) {
                data[inputs[i].name] = inputs[i].value;
            }

            // set the current total percent
            data['oldTotalPercent'] = $('#totalHoldingCostPInput').val();
            data['propertyPurchasePrice'] = $("#propertyPurchasePrice").val();
            data['totalItemizedPaidAmt'] = parseFloat($("#totalItemizedHoldingCost").text());

            paidAmtURL = '{{url('')}}' + '/EditItemizedHoldingCost';
            // Send the form data using ajax
            $.ajax({
                url: paidAmtURL,
                type: formEdit4.method,
                dataType: "json",
                data: data,
                success: function(response) {
                    $('#holding_cost_content').html(response.view);
                    $('#totalHoldingCostPInput').val(response.percentOfPrice);
                    
                    $('#HoldingCostModalEdit .close').click();
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

        function editHC(id, prop_id, paid_name, paid_type, paid_amount, paid_percentOf, paid_date, paid_inLoan){
            console.log(id, prop_id, paid_name, paid_type, paid_amount, paid_percentOf, paid_date, paid_inLoan);
            $('#itemizedHoldingCostIDEdit').val(id);
            $('#itemizedHoldingCostPropertyIDEdit').val(prop_id);
            $('#itemizedHoldingCostNameEdit').val(paid_name);
            $('#itemizedHoldingCostTypeEdit').val(paid_type);

            if(paid_type == 'amount'){
                $('#itemizedHoldingCostAmountEdit').val(paid_amount);
                document.getElementById("tabButtonHoldingCost-amountEdit").classList.add("active");
                document.getElementById("tabButtonHoldingCost-percentEdit").classList.remove("active");
                document.getElementById("tabHoldingCost-amountEdit").classList.add("active");
                document.getElementById("tabHoldingCost-percentEdit").classList.remove("active");
            }
            else{
                $('#itemizedHoldingCostPercentEdit').val(paid_amount);
                $("#itemizedHoldingCostPercentOfEdit").children('[value="'+paid_percentOf+'"]').attr('selected', true);
                document.getElementById("tabButtonHoldingCost-amountEdit").classList.remove("active");
                document.getElementById("tabButtonHoldingCost-percentEdit").classList.add("active");
                document.getElementById("tabHoldingCost-amountEdit").classList.remove("active");
                document.getElementById("tabHoldingCost-percentEdit").classList.add("active");
            }

            $('#itemizedHoldingCostDateEdit').val(paid_date);
            $('#holdingCostRollInLoanEdit').val(paid_inLoan);
            if(paid_inLoan == 1){
                $('#holdingCostRollInLoanEditYes').css('color','blue');
                $('#holdingCostRollInLoanEditNo').css('color','black');
            }
            if(paid_inLoan == 0){
                $('#holdingCostRollInLoanEditYes').css('color','black');
                $('#holdingCostRollInLoanEditNo').css('color','blue');
            }
            // $('#HoldingCostModalEdit').modal('show');
        }

        function deleteHC(id, amount){
            if(confirm('do you want to delete this entry?')){
                paidAmtURL = '{{url('')}}' + '/deleteHoldingCostMainProperty';
                $.ajax({
                    url: paidAmtURL,
                    type: "POST",
                    dataType: "json",
                    data: {
                        _token: '{{ csrf_token() }}',
                        id: id,
                        propertyID: <?=$propertyID?>,
                        oldTotalPercent: $('#totalHoldingCostPInput').val(),
                        propertyPurchasePrice: $("#propertyPurchasePrice").val(),
                        totalItemizedPaidAmt: parseFloat($("#totalItemizedHoldingCost").text())
                    },
                    success: function(response) {
                        $('#holding_cost_content').html(response.view);
                        $('#totalHoldingCostPInput').val(response.percentOfPrice);
                    },
                    error: function(error) {
                        console.log(error);
                    }
                });
            }

        }
    // =====================================        HOLDING COST         ===================================
    
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
@include('front.layouts.footer')