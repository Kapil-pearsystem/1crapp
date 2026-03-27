<div class="modal fade" id="HoldingCostModal" tabindex="-1" role="dialog" aria-labelledby="HoldingCostModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content all_frm_list">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="font-size: 30px;">
                <span aria-hidden="true">&times;</span>
            </button>
            <form id="itemizedHoldingCostForm" method="POST">
                <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                <input type="hidden" name="itemizedPaidAmtID" id="itemizedHoldingCostID" value=""/>
                <input type="hidden" name="itemizedPaidAmtType" id="itemizedHoldingCostType" value="amount"/>
                <input type="hidden" name="itemizedPaidAmtPropertyID" value="<?=$propertyID?>"/>
                <input type="hidden" name="itemizedPaidAmtInLoan" id="holdingCostRollInLoanCreate" value="0"/>
                <div class="hd_res_listsss">
                    <h2>Add Holding Cost</h2>
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
                                <li id="tabButton-amount" class="tabLinkHoldingCost active" data-tab="amount">Set Amount</li>
                                <li id="tabButton-percent" class="tabLinkHoldingCost" data-tab="percent">Percent</li>
                            </ul>
                        </div>
                        <div class="content-wrapper">
                            <div id="tabHoldingCost-amount" class="tab-content active">
                                <div class="form-group managsss1">
                                    <label>Amount </label>
                                    <span class="currencyInputprefix"><?=$currency?></span>
                                    <input name="itemizedPaidAmtAmount" id="itemizedPaidAmtAmount" class="currencyInput" type="text" placeholder="Amount" value="" />
                                </div>
                            </div>
                            <div id="tabHoldingCost-percent" class="tab-content">
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
                                            <li><a id="holdingCostRollInLoanCreateYes" onclick="RollIntoLoan('HoldingCost','Create','Yes')">Yes</a></li>
                                            <li></li>
                                            <li><a id="holdingCostRollInLoanCreateNo" onclick="RollIntoLoan('HoldingCost','Create','No')">No</a></li>
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
<div class="modal fade" id="HoldingCostModalEdit" tabindex="-1" role="dialog" aria-labelledby="HoldingCostModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content all_frm_list">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="font-size: 30px;">
                <span aria-hidden="true">&times;</span>
            </button>
            <form id="itemizedHoldingCostFormEdit" method="POST">
                <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                <input type="hidden" name="itemizedPaidAmtID" id="itemizedHoldingCostIDEdit" value=""/>
                <input type="hidden" name="itemizedPaidAmtType" id="itemizedHoldingCostTypeEdit" value="amount"/>
                <input type="hidden" name="itemizedPaidAmtPropertyID" value="<?=$propertyID?>"/>
                <input type="hidden" name="itemizedPaidAmtInLoan" id="holdingCostRollInLoanEdit" value="0"/>
                <div class="hd_res_listsss">
                    <h2>Edit Holding Cost</h2>
                </div>
                <div class="form-group">
                    <label>Name </label>
                    <input type="text" name="itemizedPaidAmtName" id="itemizedHoldingCostNameEdit" placeholder="Name" value="" />
                </div>
                <div class="tbss_form_lst mt-4">
                    <div class="tab-wrapper">
                        <div class="tbs_hids">Type</div>
                        <ul class="tabs">
                            <li id="tabButtonHoldingCost-amountEdit" class="tabLinkHoldingCostEdit active" data-tab="amount">Set Amount</li>
                            <li id="tabButtonHoldingCost-percentEdit" class="tabLinkHoldingCostEdit" data-tab="percent">Percent</li>
                        </ul>
                    </div>
                    <div class="content-wrapper">
                        <div id="tabHoldingCost-amountEdit" class="tab-content active">
                            <div class="form-group managsss1">
                                <label>Amount </label>
                                <span class="currencyInputprefix"><?=$currency?></span>
                                <input name="itemizedPaidAmtAmount" id="itemizedHoldingCostAmountEdit" class="currencyInput" type="text" placeholder="Amount" value="" />
                            </div>
                        </div>
                        <div id="tabHoldingCost-percentEdit" class="tab-content">
                            <div class="form-group managsss1">
                                <label>Percent </label>
                                <input type="text" name="itemizedPaidAmtPercent" id="itemizedHoldingCostPercentEdit" placeholder="Percent" value="" />
                                <select class="percentOfClass" name="itemizedPaidAmtPercentOf" id="itemizedPaidAmtPercentOfEdit">
                                <option value="price">% Of Price</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group managsss1">
                            <label>Date</label>
                            <input name="itemizedPaidAmtDate" id="itemizedHoldingCostDateEdit" type="date" placeholder="DD MM YYYY" value="" class="datePickerDefault" />
                        </div>
                        <div class="form-group managsss1">
                            <div class="roll_lst">
                                <div class="lft_raea">
                                    <label>Roll Into Loan?</label>
                                </div>
                                <div class="rit_raea">
                                    <ul class="ys_no">
                                        <li>
                                            <a id="holdingCostRollInLoanEditYes" onclick="RollIntoLoan('HoldingCost','Edit','Yes')">Yes</a>
                                        </li>
                                        <li></li>
                                        <li>
                                            <a id="holdingCostRollInLoanEditNo" onclick="RollIntoLoan('HoldingCost','Edit','No')">No</a>
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