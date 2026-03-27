<!-- <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> -->


<div class="modal fade" id="paidAmountModal21" tabindex="-1" role="dialog" aria-labelledby="paidAmountModalLabel">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content all_frm_list">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="font-size: 30px;">
                <span aria-hidden="true">&times;</span>
            </button>
            <form id="itemizedPaidAmtForm21" method="POST">
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
                        <input type="text" name="itemizedPaidAmtName" id="itemizedPaidAmtName" placeholder="Name" value="" />
                    </div>

                    <div class="tbss_form_lst mt-4">
                        <div class="tab-wrapper">
                            <div class="tbs_hids">Type</div>
                            <ul class="tabs">
                                <li id="tabButton-amount" class="tabLinkPaidAmt active" data-tab="amount21">Set Amount</li>
                                <li id="tabButton-percent" class="tabLinkPaidAmt" data-tab="percent21">Percent</li>
                            </ul>
                        </div>
                        <div class="content-wrapper">
                            <div id="tab-amount21" class="tab-content active">
                                <div class="form-group managsss1">
                                    <label>Amount </label>
                                    <span class="currencyInputprefix"><?=$currency?></span>
                                    <input name="itemizedPaidAmtAmount" id="itemizedPaidAmtAmount" class="currencyInput" type="text" placeholder="Amount" value="" />
                                </div>
                            </div>
                            <div id="tab-percent21" class="tab-content">
                                <div class="form-group managsss1">
                                    <label>Percent </label>
                                    <input type="text" name="itemizedPaidAmtPercent" id="itemizedPaidAmtPercent" placeholder="Percent" value="" />
                                    <select class="percentOfClass" name="itemizedPaidAmtPercentOf" id="itemizedPaidAmtPercentOf">
                                    <option value="price">% Of Price</option>
                                    <!--<option value="loan">% Of loan</option>-->
                                    </select>
                                </div>
                            </div>
                            <div class="form-group managsss1">
                                <label>Date</label>
                                <input name="itemizedPaidAmtDate" id="itemizedPaidAmtDate" type="date" placeholder="DD MM YYYY" value="" class="datePickerDefault" />
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
                    <input type="text" name="itemizedPaidAmtName" id="itemizedPaidAmtNameEdit" placeholder="Name" value="" />
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
                                <input name="itemizedPaidAmtAmount" id="itemizedPaidAmtAmountEdit" class="currencyInput" type="text" placeholder="Amount" value="" />
                            </div>
                        </div>
                        <div id="tab-percentEdit" class="tab-content">
                            <div class="form-group managsss1">
                                <label>Percent </label>
                                <input type="text" name="itemizedPaidAmtPercent" id="itemizedPaidAmtPercentEdit" placeholder="Percent" value="" />
                                <select class="percentOfClass" name="itemizedPaidAmtPercentOf" id="itemizedPaidAmtPercentOfEdit">
                                <option value="price">% Of Price</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group managsss1">
                            <label>Date</label>
                            <input name="itemizedPaidAmtDate" id="itemizedPaidAmtDateEdit" type="date" placeholder="DD MM YYYY" value="" class="datePickerDefault" />
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
                        <input type="text" name="itemizedPaidAmtName" id="itemizedPaidAmtName" placeholder="Name" value="" />
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
                                    <input name="itemizedPaidAmtAmount" id="itemizedPaidAmtAmount" class="currencyInput" type="text" placeholder="Amount" value="" />
                                </div>
                            </div>
                            <div id="tabImprovementCost-percent" class="tab-content">
                                <div class="form-group managsss1">
                                    <label>Percent </label>
                                    <input type="text" name="itemizedPaidAmtPercent" id="itemizedPaidAmtPercent" placeholder="Percent" value="" />
                                    <select class="percentOfClass" name="itemizedPaidAmtPercentOf" id="itemizedPaidAmtPercentOf">
                                    <option value="price">% Of Price</option>
                                    <!--<option value="loan">% Of loan</option>-->
                                    </select>
                                </div>
                            </div>
                            <div class="form-group managsss1">
                                <label>Date</label>
                                <input name="itemizedPaidAmtDate" id="itemizedPaidAmtDate" type="date" placeholder="DD MM YYYY" value="" class="datePickerDefault" />
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
                                            <button type="button" onclick="submititemizedHoldingCostForm()" class="actsss">Save</button>
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
                    <input type="text" name="itemizedPaidAmtName" id="itemizedImprovementCostNameEdit" placeholder="Name" value="" />
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
                                <input name="itemizedPaidAmtAmount" id="itemizedImprovementCostAmountEdit" class="currencyInput" type="text" placeholder="Amount" value="" />
                            </div>
                        </div>
                        <div id="tabImprovementCost-percentEdit" class="tab-content">
                            <div class="form-group managsss1">
                                <label>Percent </label>
                                <input type="text" name="itemizedPaidAmtPercent" id="itemizedImprovementCostPercentEdit" placeholder="Percent" value="" />
                                <select class="percentOfClass" name="itemizedPaidAmtPercentOf" id="itemizedPaidAmtPercentOfEdit">
                                <option value="price">% Of Price</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group managsss1">
                            <label>Date</label>
                            <input name="itemizedPaidAmtDate" id="itemizedImprovementCostDateEdit" type="date" placeholder="DD MM YYYY" value="" class="datePickerDefault" />
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
                        <input type="text" name="itemizedPaidAmtName" id="itemizedPaidAmtName" placeholder="Name" value="" />
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
                                    <input name="itemizedPaidAmtAmount" id="itemizedPaidAmtAmount" class="currencyInput" type="text" placeholder="Amount" value="" />
                                </div>
                            </div>
                            <div id="tabConvDeed-percent" class="tab-content">
                                <div class="form-group managsss1">
                                    <label>Percent </label>
                                    <input type="text" name="itemizedPaidAmtPercent" id="itemizedPaidAmtPercent" placeholder="Percent" value="" />
                                    <select class="percentOfClass" name="itemizedPaidAmtPercentOf" id="itemizedPaidAmtPercentOf">
                                    <option value="price">% Of Price</option>
                                    <!--<option value="loan">% Of loan</option>-->
                                    </select>
                                </div>
                            </div>
                            <div class="form-group managsss1">
                                <label>Date</label>
                                <input name="itemizedPaidAmtDate" id="itemizedPaidAmtDate" type="date" placeholder="DD MM YYYY" value="" class="datePickerDefault" />
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
                    <input type="text" name="itemizedPaidAmtName" id="itemizedConvDeedNameEdit" placeholder="Name" value="" />
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
                                <input name="itemizedPaidAmtAmount" id="itemizedConvDeedAmountEdit" class="currencyInput" type="text" placeholder="Amount" value="" />
                            </div>
                        </div>
                        <div id="tabConvDeed-percentEdit" class="tab-content">
                            <div class="form-group managsss1">
                                <label>Percent </label>
                                <input type="text" name="itemizedPaidAmtPercent" id="itemizedConvDeedPercentEdit" placeholder="Percent" value="" />
                                <select class="percentOfClass" name="itemizedPaidAmtPercentOf" id="itemizedPaidAmtPercentOfEdit">
                                <option value="price">% Of Price</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group managsss1">
                            <label>Date</label>
                            <input name="itemizedPaidAmtDate" id="itemizedConvDeedDateEdit" type="date" placeholder="DD MM YYYY" value="" class="datePickerDefault" />
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
@include('dashboard.buy_possession_improvement.holding_cost.modals',[
        'propertyID' => $propertyID, 'currency' => $currency
    ])
<!-- <script src="//cdnjs.cloudflare.com/ajax/libs/numeral.js/2.0.6/numeral.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> -->

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
        var form1 = document.getElementById("itemizedPaidAmtForm21");
        form1.addEventListener("submit", function(event) {
            // Prevent the default form submission behavior
            event.preventDefault();
            // Get the form data as an object
            var data = {};
            var inputs = form1.querySelectorAll("input, textarea, select");
            for (var i = 0; i < inputs.length; i++) {
                data[inputs[i].name] = inputs[i].value;
            }
            // console.log(data);
            paidAmtURL = '{{url('')}}' + '/addItemizedExtraCharge';
            $.ajax({
                url: paidAmtURL,
                type: form1.method,
                dataType: "json",
                data: data,
                success: function(response) {
                    $('#extra_charges_possession_items_content').html(response.view);
                    $('#totalextraChargePercentInput').val(response.percentOfPrice);
                    // $('#totalextraChargePercentInput').val(response.TotalAmount);
                    // alert(response.TotalAmount);
                    document.getElementById("itemizedPaidAmtForm21").reset();
                    $('#paidAmountModal21 .close').click();
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
                    $("#paidAmountModalEdit").modal("hide");
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
    // ===================================== EXTRA CHARGES POSSESSION =====================================
    // =====================================     IMPROVEMENT COST     =====================================
        var form2 = document.getElementById("itemizedImprovementCostForm");
        form2.addEventListener("submit", function(event) {
            event.preventDefault();
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
                    $('#improvementCostModal .close').click();
                },
                error: function(error) {
                }
            });
        });

        var formEdit2 = document.getElementById("itemizedImprovementCostFormEdit");
        formEdit2.addEventListener("submit", function(event) {
            event.preventDefault();
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
                    $("#improvementCostModalEdit").modal("hide");
                },
                error: function(error) {
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
            $('#improvementCostModalEdit').modal('show');
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
                    $('#ConvDeedModal .close').click();
                },
                error: function(error) {
                }
            });
        });

        // Get the form element by id
        var formEdit3 = document.getElementById("itemizedConvDeedFormEdit");
        // Add a submit event listener to the form element
        formEdit3.addEventListener("submit", function(event) {
            // Prevent the default form submission behavior
            event.preventDefault();
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
                    $("#ConvDeedModalEdit").modal("hide");
                },
                error: function(error) {
                }
            });
        });
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
    // =====================================        HOLDING COST         ===================================
        // Get the form element by id
        var form4 = document.getElementById("itemizedHoldingCostForm");
        // Add a submit event listener to the form element
        form4.addEventListener("submit", function(event) {
            // Prevent the default form submission behavior
            event.preventDefault();
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
                }
            });
        });

        // Get the form element by id
        var formEdit4 = document.getElementById("itemizedHoldingCostFormEdit");
        // Add a submit event listener to the form element
        formEdit4.addEventListener("submit", function(event) {
            // Prevent the default form submission behavior
            event.preventDefault();
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
                    $("#HoldingCostModalEdit").modal("hide");
                },
                error: function(error) {
                }
            });
        });

        function editHC(id, prop_id, paid_name, paid_type, paid_amount, paid_percentOf, paid_date, paid_inLoan){
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
            $('#HoldingCostModalEdit').modal('show');
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

    $("#toggle21").on('change', function() {
        $("#itemisedPaidAmount").toggle();
    });
    $("#toggle2").on('change', function() {
        $("#itemisedImprovementCost").toggle();
    });
    $("#toggle3").on('change', function() {
        $("#itemisedConvDeed").toggle();
    });
    $("#toggle4").on('change', function() {
        $("#itemisedHoldingCost").toggle();
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

        $('#paidAmountModalEdit').modal('show');
    }
</script>

<!-- // Improvement Cost -->
<script>
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

<!-- // Conveyance Deed Cost -->
<script>
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

<!-- // Holding Cost -->
<script>
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