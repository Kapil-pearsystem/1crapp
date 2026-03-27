@include('front.layouts.header')
<?php
use App\Models\PropertyTypeModel;
$property_type = PropertyTypeModel::select('id', 'title', 'key')
    ->where('key', '!=', 'control-sale') // Use '!=' to exclude 'control-sale'
    ->where('status', 1)
    ->orderBy('priority', 'ASC')
    ->get();
?>
<style>
 .all_frm_list .choss_araes {
    display: inline-block;
    width: 100%;
}
.all_frm_list .choss_araes .lft_cntts {
    float: left;
    width: 85%;
}
.all_frm_list .choss_araes .lft_cntts p {
    margin: 0 0 5px;
    font-size: 16px;
    font-weight: 600;
}.all_frm_list .choss_araes .lft_cntts span {
    font-size: 13px;
}
.all_frm_list .choss_araes .chos_bntt {
    float: left;
    width: 15%;
}
.all_frm_list .choss_araes .chos_bntt .add_on i {
    line-height: 30px;
}
.all_frm_list .choss_araes .chos_bntt .add_on {
    text-align: right;
    height: 30px;
    line-height: 30px;
    cursor: pointer;
}
.all_frm_list.yes_no_fildds {
    background: #f1f7ff;
    border: #f0f0f0 solid 2px;
    padding: 20px 35px;
}
.all_frm_list.yes_no_fildds .lft_cntts {
    line-height: 40px;
}
.all_frm_list.yes_no_fildds .lft_cntts span {
    font-size: 14px;
}
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

.all_frm_list .form-group.managsss1 span.currencyInputprefix_pricess {
    position: absolute;
    bottom: 8px;
    left: 10px;
    font-size: 17px;
}
</style>


<!--PEN HEADER-->
<div class="container mt-5">
    <div class="row mt-4">
        <div class="col-lg-12">
            <div class="lsting_proprty purch_list_conts">
                <div class="mn_lststs">
                    <div class="lft_nw_heds">
                        <h3>New Property</h3>
                    </div>
                    <div class="slt_aressdflt">
                        <select class="slt_areaa">
                            <option value="">Default rental template</option>
                        </select>
                        <div class="prp_bntsss">
                            <ul>
                                <li>
                                    <a href="javascript:void(0);" class="actss"> Setting</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="lit_mainss">
                    <div class="cntentsss">
                        <p>Analyze a property you plan to buy and hold for long-term cash flow, including short-term rentals.</p>
                    </div>
                    <div class="prp_bntsss">
                        <ul>
                            <li>
                                <a href="#" class="actss"> Cancel</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-12">
            <div class="col-lg-3">&nbsp;</div>
            <div class="col-lg-9">
                <div class="property_aresssd">
                    <div class="linss">
                        <a href="javascript:void(0);">Add a new property</a>
                    </div>
                </div>
            </div>
        </div>
        @include('front.layouts.sidebar')
        <!--start full details -->
        <div class="col-12 col-sm-9">
		<div class="lsting_proprty purch_list_conts brcats_listss">
			<h3>Landing (Wholesale) Purchase</h3>
			<p>Use this section to customize the landing/purchase price and closing costs you will need to pay as the underwriter/wholesaler.</p>
		</div>

		<form id="propertyPageForm2" method="POST" action="" enctype="">
		  <div class="all_frm_list">
		   <div class="row">
			<div class="col-md-8">
				<div class="form-group managsss1">
					<label>Total Paid Amount (Part Of BPP)</label>
					<input class="" type="text" id="" placeholder="Please Enter Total Paid Amount" value="" oninput="" required="" />
				</div>
			</div>
		   </div>

		   <div class="row">
			<div class="col-md-8">
				<div class="form-group managsss1">
					<label>Cost For Closing (Landing Deals)</label>
					<input class="" type="text" id="" placeholder="Cost For Closing (Landing Deals)" value="" oninput="" required="" />
					<span class="pursntss" style="right : 25px;">% Of Landing Price</span>
				</div>
			</div>

			<div class="col-md-4">
				<div class="choss_araes">
					<div class="lft_cntts" style="width: 100%;">
						<p>Itemize Purchase Cost</p>
					</div>
					<div class="yesNoButton" style="width: 100%;">
						<input type="checkbox" class="toggle" id="toggle11" autocomplete="off" />
						<label for="toggle11">
							<span class="on">Yes</span>
							<span class="off">No</span>
						</label>
					</div>
				</div>
			</div>
		   </div>


		   <div class="row" id="itemisedPaidAmount" style="display:none;">
			<div class="col-md-8">
				<div class="form-group managsss1">
					<label>Total</label>
					<span class="currencyInputprefix">₹</span>
					<input class="currencyInput" type="text" id="totalPaidAmountInput2" placeholder="Total Purchase Cost" value="" oninput="" required="" />
					<span class="edttt bth_alsss nw_long" style="display: none;" id="totalPaidAmountDiv"> ₹ </span>
				</div>
			</div>

			<div class="col-lg-12">
			 <!-- Itemized purchase Costs  -->
			<div class="itm_cost_prch" >
				<div class="hd_res_listsss">
					<h3>
						Itemized Purchase Cost
						<span class="rit_mg">
							<button type="button" class="bg-transparent border-0 shadow-none" data-toggle="modal" data-target="#paidAmountModal">
								<img src="https://1crapp.allproject.online/img/ad_bk.png" alt="" />
							</button>
						</span>
					</h3>
				</div>
				<div class="all_frm_list" style="padding: 0;" id="itemized_paid_amount_content">
					<div id="paidAmountItemizedDiv"></div>
					<div class="btm_coststs">
						<span class="tltss">Total</span>
						<span class="pricss">
							₹
							<span id="totalItemizedPaidAmt">
								0
							</span>
						</span>
					</div>
				</div>
			</div>
			<!-- End Itemized purchase Costs -->
			</div>
		   </div>


			<div class="row">
				<div class="col-lg-8">
					<div class="form-group managsss1">
						<label>Investor Strategy:</label>
						<select name="state" id="" onchange="" required="" class="slt_areaa_ful">
							<option value="">Select One From Drop Down</option>
                                @foreach($property_type as $type)
                                    <option value="{{ $type->key }}">{{ $type->title }}</option>
                                @endforeach
							<!-- <option value="2"> Buy, Refinnace & Sell</option>
							<option value="3"> Buy & Hold</option>
							<option value="4"> Buy, Hold & Refinance</option> -->
						</select>
					</div>
				</div>
			</div>


	      </div>

		  <div class="backk_bntss">
            <button type="submit" class="btn btn-primary m-b-0 actss" onclick="" style="float: right;">Next Section <i class="fa fa-arrow-right"></i></button>
		  </div>
	    </form>

        </div>
    </div>
</div>



@include('front.layouts.footer')


<!-- Modal -->
    <div class="modal fade" id="paidAmountModal" tabindex="-1" role="dialog" aria-labelledby="paidAmountModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content all_frm_list">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="font-size: 30px;">
                <span aria-hidden="true">&times;</span>
                </button>
                <form action="" id="" method="POST">
                    <div class="form-group">
                        <label>Name </label>
                        <input type="text" name="itemizedPaidAmtName" id="itemizedPaidAmtName" placeholder="Name" value="" />
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
                                    <span class="currencyInputprefix_pricess">₹</span>
                                    <input name="itemizedPaidAmtAmount" id="itemizedPaidAmtAmount" class="" type="text" placeholder="Amount" value="" />
                                </div>
                            </div>
                            <div id="tab-percent" class="tab-content">
                                <div class="form-group managsss1">
                                    <label>Percent </label>
                                    <input type="text" name="itemizedPaidAmtPercent" id="itemizedPaidAmtPercent" placeholder="Percent" value="" />
                                    <select class="percentOfClass" name="itemizedPaidAmtPercentOf" id="itemizedPaidAmtPercentOf">
                                    <option value="price">% Of Price</option>
                                    <option value="loan">% Of loan</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Remarks</label>
                                <input name="itemizedPaidAmtRemark" id="itemizedPaidAmtRemark" type="text" placeholder="Remarks" value=""/>
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


<link rel="stylesheet" href="/selecttags/fm.tagator.jquery.css" />
<script src="/selecttags/fm.tagator.jquery.js"></script>
<style>
    /* Custom styles here */
</style>
<script>
    function opencontractsellmodal() {
        $('#contractsellmodal').modal('show');
    }

    $('.tabLinkPaidAmtEdit').click(function() {
        var tabID = $(this).attr('data-tab');
        $(this).addClass('active').siblings().removeClass('active');
        $('#tab-' + tabID + 'Edit').addClass('active').siblings().removeClass('active');
        $("#itemizedPaidAmtTypeEdit").val(tabID);
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