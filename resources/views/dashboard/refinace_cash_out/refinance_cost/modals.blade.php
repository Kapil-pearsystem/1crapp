<div class="modal fade" id="purchaseCostModal" tabindex="-1" role="dialog" aria-labelledby="purchaseCostModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content all_frm_list">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="font-size: 30px;">
                <span aria-hidden="true">&times;</span>
            </button>
            <form id="itemizedPurchasedAmtForm" method="POST">
                <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                <input type="hidden" name="itemizedPurchasedAmtID" id="itemizedPurchasedAmtID" value=""/>
                <input type="hidden" name="itemizedPurchasedAmtType" id="itemizedPurchasedAmtType" value="amount"/>
                <input type="hidden" name="itemizedPurchasedAmtPropertyID" value="<?=$propertyID?>"/>
                <input type="hidden" name="itemizedPurchasedAmtInLoan" id="RefinanceCostsRollIntoLoanCreate" value="0"/>
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="itemizedPurchasedAmtName" id="itemizedPurchasedAmtName" placeholder="Name" value="" />
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
                                <input name="itemizedPurchasedAmtAmount" id="itemizedPurchasedAmtAmount" class="currencyInput" type="text" placeholder="Amount" value="" />
                            </div>
                        </div>        
                        <div id="tab-purchasedpercent" class="tab-content">							
                            <div class="form-group managsss1">
                                <label>Percent </label>
                                <input type="text" name="itemizedPurchasedAmtPercent" id="itemizedPurchasedAmtPercent" placeholder="Percent" value="" />
                                <select class="percentOfClass" name="itemizedPurchasedAmtPercentOf" id="itemizedPurchasedAmtPercentOf">
                                <option value="price">% Of Price</option>
                                <option value="loan">% Of loan</option>
                                </select>
                            </div>
                        </div>        		 
                        <input name="itemizedPurchasedAmtDate" id="itemizedPurchasedAmtDate" type="hidden" placeholder="DD MM YYYY" value="" class="datePickerDefault" />
                        <div class="form-group">
                            <label>Remarks</label>
                            <input name="itemizedPurchasedAmtRemark" id="itemizedPurchasedAmtRemark" type="text" placeholder="Remarks" value=""/>
                        </div>    
                        <div class="form-group managsss1">
                            <div class="roll_lst">
                                <div class="lft_raea">
                                    <label>Roll Into Loan?</label>
                                </div>
                                <div class="rit_raea">
                                    <ul class="ys_no">
                                        <li>
                                            <a id="RefinanceCostsCreateYes" onclick="RollIntoLoan('RefinanceCosts','Create','Yes')">Yes</a>
                                        </li>
                                        <li></li>
                                        <li>
                                            <a id="RefinanceCostsCreateNo" onclick="RollIntoLoan('RefinanceCosts','Create','No')">No</a>
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
                <input type="hidden" name="itemizedPurchasedAmtType" id="itemizedPurchasedAmtTypeEdit" value="amount"/>
                <input type="hidden" name="itemizedPurchasedAmtPropertyID" value="<?=$propertyID?>"/>
                <input type="hidden" name="itemizedPurchasedAmtInLoan" id="RefinanceCostsCreateRollIntoLoanEdit" value="0"/>
                <div class="form-group">
                    <label>Name </label>
                    <input type="text" name="itemizedPurchasedAmtName" id="itemizedPurchasedAmtNameEdit" placeholder="Name" value="" />
                </div>
        	    <div class="tbss_form_lst mt-4">
                    <div class="tab-wrapper">
                        <div class="tbs_hids">Type</div>
                        <ul class="tabs">
                            <li id="tabButton-purchasedamountEdit" class="tabLinkPurchasedAmt active" data-tab="purchasedamount">Set Amount</li>
                            <li id="tabButton-purchasedpercentEdit" class="tabLinkPurchasedAmt" data-tab="purchasedpercent">Percent</li>
                        </ul>
                    </div>
                    <div class="content-wrapper">
                        <div id="tab-purchasedamountEdit" class="tab-content active">							
                            <div class="form-group managsss1">
                                <label>Amount </label>
                                <span class="currencyInputprefix"><?=$currency?></span>
                                <input name="itemizedPurchasedAmtAmount" id="itemizedPurchasedAmtAmountEdit" class="currencyInput" type="text" placeholder="Amount" value="" />
                            </div>
                        </div>
                        <div id="tab-purchasedpercentEdit" class="tab-content">							
                            <div class="form-group managsss1">
                                <label>Percent </label>
                                <input type="text" name="itemizedPurchasedAmtPercent" id="itemizedPurchasedAmtPercentEdit" placeholder="Percent" value="" />
                                <select class="percentOfClass" name="itemizedPurchasedAmtPercentOf" id="itemizedPurchasedAmtPercentOfEdit">
                                <option value="price">% Of Price</option>
                                <option value="loan">% Of loan</option>
                                </select>
                            </div>
                        </div>
    					<input name="itemizedPurchasedAmtDate" id="itemizedPurchasedAmtDateEdit" type="hidden" placeholder="DD MM YYYY" value="" class="datePickerDefault" />
                        <div class="form-group">
                            <label>Remarks</label>
                            <input name="itemizedPurchasedAmtRemark" id="itemizedPurchasedAmtRemarkEdit" type="text" placeholder="Remarks" value=""/>
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