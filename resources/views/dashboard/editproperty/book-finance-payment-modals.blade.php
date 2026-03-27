

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
                <input type="hidden" name="itemizedPurchasedAmtType" id="itemizedPurchasedAmtType" value="amount"/>
                <input type="hidden" name="itemizedPurchasedAmtPropertyID" value="<?=$propertyID?>"/>
                <input type="hidden" name="itemizedPurchasedAmtInLoan" id="itemizedPurchasedAmtInLoan" value="0"/>
                <div class="form-group">
                    <label>Name </label>
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
                        <div class="form-group">
                            <label>Date</label>
                            <input name="itemizedPurchasedAmtDate" id="itemizedPurchasedAmtDate" type="date" placeholder="DD MM YYYY" value="" class="datePickerDefault" />
                        </div>
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
                                <span class="currencyInputprefix"><?=$currency?></span>
                                <input name="itemizedPaidAmtAmount" id="itemizedPaidAmtAmount" class="currencyInput" type="text" placeholder="Amount" value="" />
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
                            <label>Date</label>
                            <input name="itemizedPaidAmtDate" id="itemizedPaidAmtDate" type="date" placeholder="DD MM YYYY" value="" class="datePickerDefault" />
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
                                <option value="loan">% Of loan</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Date</label>
                            <input name="itemizedPaidAmtDate" id="itemizedPaidAmtDateEdit" type="date" placeholder="DD MM YYYY" value="" class="datePickerDefault" />
                        </div>
                        <div class="form-group">
                            <label>Remarks</label>
                            <input name="itemizedPaidAmtRemark" id="itemizedPaidAmtRemarkEdit" type="text" placeholder="Remarks" value=""/>
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
            <form id="itemizedPurchasedAmtForm" method="POST">
                <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                <input type="hidden" name="itemizedPurchasedAmtID" id="itemizedPurchasedAmtID" value=""/>
                <input type="hidden" name="itemizedPurchasedAmtType" id="itemizedPurchasedAmtType" value="amount"/>
                <input type="hidden" name="itemizedPurchasedAmtPropertyID" value="<?=$propertyID?>"/>
                <input type="hidden" name="itemizedPurchasedAmtInLoan" id="itemizedPurchasedAmtInLoan" value="0"/>
                <div class="form-group">
                    <label>Name </label>
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
                        <div class="form-group">
                            <label>Date</label>
                            <input name="itemizedPurchasedAmtDate" id="itemizedPurchasedAmtDate" type="date" placeholder="DD MM YYYY" value="" class="datePickerDefault" />
                        </div>
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
                <input type="hidden" name="itemizedPurchasedAmtInLoan" id="itemizedPurchasedAmtInLoanEdit" value="0"/>
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

                        <div class="form-group">
                            <label>Date</label>
                            <input name="itemizedPurchasedAmtDate" id="itemizedPurchasedAmtDateEdit" type="date" placeholder="DD MM YYYY" value="" class="datePickerDefault" />
                        </div>

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
                                        <li><a id="PurchasedAmtInLoanEditYes" onclick="PurchaseRollIntoLoan('Edit','Yes')">Yes</a></li>
                                        <li></li>
                                        <li><a id="PurchasedAmtInLoanEditNo" onclick="PurchaseRollIntoLoan('Edit','No')">No</a></li>
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
    $(document).ready(function () {
        const refinance_content = `{!! $view !!}`;
        // console.log(refinance_content);
        $('.refinance_costs_button').prop('checked', true);
        $('.itm_cost_prch').css('display', 'block');
        $('.refinance_cost_content').html(refinance_content);
    });
</script>


<script>
        // =================================== PAID AMOUNT COST ===================================
        var form = document.getElementById("itemizedPaidAmtForm");
        form.addEventListener("submit", function(event) {
            // Prevent the default form submission behavior
            event.preventDefault();
            // Get the form data as an object
            var data = {};
            var inputs = form.querySelectorAll("input, textarea, select");
            for (var i = 0; i < inputs.length; i++) {
                data[inputs[i].name] = inputs[i].value;
            }
            paidAmtURL = '{{url('')}}' + '/addItemizedPaidAmount';
            // Send the form data using ajax
            $.ajax({
                url: paidAmtURL,
                type: form.method,
                dataType: "json",
                data: data,
                success: function(response) {
                    $('#itemized_paid_amount_content').html(response.view);
                    $('#totalPaidAmountInput2').val(response.totalAmount);
                    $("#paidAmountModal").modal("hide");
                },
                error: function(error) {

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
            if(paid_inLoan == 1){
                $('#paidAmtInLoanYesEdit').css('color','blue');
                $('#paidAmtInLoanNoEdit').css('color','black');
            }
            if(paid_inLoan == 0){
                $('#paidAmtInLoanYesEdit').css('color','black');
                $('#paidAmtInLoanNoEdit').css('color','blue');
            }

            $('#paidAmountModalEdit').modal('show');
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
            paidAmtURL = '{{url('')}}' + '/EditItemizedPaidAmount';
            // Send the form data using ajax
            $.ajax({
                url: paidAmtURL,
                type: form.method,
                dataType: "json",
                data: data,
                success: function(response) {
                    $('#totalPaidAmountInput2').val(response.totalAmount);
                    $('#itemized_paid_amount_content').html(response.view);
                    // Close the modal popup
                    $("#paidAmountModalEdit").modal("hide");
                },
                error: function(error) {
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
                        propertyID: <?=$propertyID?>
                    },
                    success: function(response) {
                        $('#totalPaidAmountInput2').val(response.totalAmount);
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
        function PurchaseRollIntoLoan(formAction,action){
            if(formAction == 'Create'){
                if(action == 'Yes'){
                    $('#itemizedPurchasedAmtInLoan').val(1);
                    $('#PurchasedAmtInLoanCreateYes').css('color', 'blue');
                    $('#PurchasedAmtInLoanCreateNo').css('color', 'black');
                }
                if(action == 'No'){
                    $('#itemizedPurchasedAmtInLoan').val(0);
                    $('#PurchasedAmtInLoanCreateYes').css('color', 'black');
                    $('#PurchasedAmtInLoanCreateNo').css('color', 'blue');
                }
            }

            if(formAction == 'Edit'){
                if(action == 'Yes'){
                    $('#itemizedPurchasedAmtInLoanEdit').val(1);
                    $('#PurchasedAmtInLoanEditYes').css('color', 'blue');
                    $('#PurchasedAmtInLoanEditNo').css('color', 'black');
                }
                if(action == 'No'){
                    $('#itemizedPurchasedAmtInLoanEdit').val(0);
                    $("#PurchasedAmtInLoanEditNo").css('color', 'blue');
                    $('#PurchasedAmtInLoanEditYes').css('color', 'black');
                }
            }
        }

        // Get the form element by id
        var pformEdit = document.getElementById("itemizedPurchasedAmtFormEdit");
        // Add a submit event listener to the form element
        pformEdit.addEventListener("submit", function(event) {
            // Prevent the default form submission behavior
            event.preventDefault();
            // Get the form data as an object
            var data = {};
            var inputs = pformEdit.querySelectorAll("input, textarea, select");
            for (var i = 0; i < inputs.length; i++) {
                data[inputs[i].name] = inputs[i].value;
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
                    $("#PurchasedAmountModalEdit").modal("hide");
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

        // Get the form element by id
        var pform = document.getElementById("itemizedPurchasedAmtForm");
        // Add a submit event listener to the form element
        pform.addEventListener("submit", function(event) {
            // Prevent the default form submission behavior
            event.preventDefault();
            // Get the form data as an object
            var data = {};
            var inputs = pform.querySelectorAll("input, textarea, select");
            for (var i = 0; i < inputs.length; i++) {
                data[inputs[i].name] = inputs[i].value;
            }
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
                    $("#purchaseCostModal").modal("hide");
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

        function deleteIPURA(id, amount){
            if(confirm('do you want to delete this entry?')){
                paidAmtURL = '{{url('')}}' + '/deletePurchasedAmountMainProperty';
            $.ajax({
                url: paidAmtURL,
                type: "POST",
                dataType: "json",
                data: {
                    _token: '{{ csrf_token() }}',
                    id: id,
                    propertyID: {{$propertyID}}
                },
                success: function(response) {
                    $('#itemized_purchase_amount_content').html(response.view);
                    $('#totalPurchasedAmountInput2').val(response.totalAmount);
                    // $('#totalItemizedPurchasedAmt').html(response.totalAmount);
                },
                error: function(error) {
                    console.log(error);
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
    });
    $("#toggle13").on('change', function() {
        $("#itemisedPurchaseCost").toggle();
        $(".pce_amount").toggle();
        $(".pce_percent").toggle();
    });
    // $("#toggle14").on('change', function() {
    //     // alert('hello');
    //     $("#itemisedRefinanceCost").toggle();
    //     $(".rfc_amount").toggle();
    //     $(".rfc_percent").toggle();
    // });
    $(document).on('change', '.refinance_costs_button', function() {
        // Get the closest .all_frm_list container for the clicked button
        const parentSection = $(this).closest('.all_frm_list');

        // Toggle elements within this specific section
        parentSection.find("#itemisedRefinanceCost").toggle();
        parentSection.find(".rfc_amount").toggle();
        parentSection.find(".rfc_percent").toggle();
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



function editIPURA(id, prop_id, paid_name, paid_type, paid_amount, paid_percentOf, paid_date, paid_remarks, paid_inLoan){
    $('#itemizedPurchasedAmtIDEdit').val(id);
    $('#itemizedPurchasedAmtPropertyIDEdit').val(prop_id);
    $('#itemizedPurchasedAmtNameEdit').val(paid_name);
    $('#itemizedPurchasedAmtTypeEdit').val(paid_type);

    if(paid_type == 'amount'){
        $('#itemizedPurchasedAmtAmountEdit').val(paid_amount);
        document.getElementById("tabButton-purchasedamountEdit").classList.add("active");
        document.getElementById("tabButton-purchasedpercentEdit").classList.remove("active");
        document.getElementById("tab-purchasedamountEdit").classList.add("active");
        document.getElementById("tab-purchasedpercentEdit").classList.remove("active");
    }
    else{
        $('#itemizedPurchasedAmtPercentEdit').val(paid_amount);
        $("#itemizedPurchasedAmtPercentOfEdit").children('[value="'+paid_percentOf+'"]').attr('selected', true);
        document.getElementById("tabButton-purchasedamountEdit").classList.remove("active");
        document.getElementById("tabButton-purchasedpercentEdit").classList.add("active");
        document.getElementById("tab-purchasedamountEdit").classList.remove("active");
        document.getElementById("tab-purchasedpercentEdit").classList.add("active");
    }

    $('#itemizedPurchasedAmtDateEdit').val(paid_date);
    $('#itemizedPurchasedAmtRemarkEdit').val(paid_remarks);
    $('#itemizedPurchasedAmtInLoanEdit').val(paid_inLoan);
    if(paid_inLoan == 1){
        $('#PurchasedAmtInLoanEditYes').css('color','blue');
        $('#PurchasedAmtInLoanEditNo').css('color','black');
    }
    if(paid_inLoan == 0){
        $('#PurchasedAmtInLoanEditYes').css('color','black');
        $('#PurchasedAmtInLoanEditNo').css('color','blue');
    }

    $('#PurchasedAmountModalEdit').modal('show');
}





    // =================================== REFINACE COSTS ===================================
        // Get the form element by id
        var pform = document.getElementById("itemizedfinanceAmtForm");
        // Add a submit event listener to the form element
        pform.addEventListener("submit", function(event) {
            // Prevent the default form submission behavior
            event.preventDefault();
            // Get the form data as an object
            var data = {};
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
                    $('.refinance_cost_content').html(response.view);
                    $('#totalFinanceAmountInput2').val(response.totalAmount)
                    $("#purchaseCostModal").modal("hide");
                },
                error: function(error) {
                }
            });
        });
        // Get the form element by id
        var pformEdit = document.getElementById("itemizedfinanceAmtFormEdit");
        // Add a submit event listener to the form element
        pformEdit.addEventListener("submit", function(event) {
            // Prevent the default form submission behavior
            event.preventDefault();
            // Get the form data as an object
            var data = {};
            var inputs = pformEdit.querySelectorAll("input, textarea, select");
            for (var i = 0; i < inputs.length; i++) {
                data[inputs[i].name] = inputs[i].value;
            }
            paidAmtURL = '{{url('')}}' + '/EditItemizedReFinancingCost';
            // Send the form data using ajax
            $.ajax({
                url: paidAmtURL,
                type: pformEdit.method,
                dataType: "json",
                data: data,
                success: function(response) {
                    $('.refinance_cost_content').html(response.view);
                    $('#totalPurchasedAmountInput2').val(response.totalAmount);
                    $("#PurchasedAmountModalEdit").modal("hide");
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
                    propertyID: <?=$propertyID?>
                },
                success: function(response) {
                    $('.refinance_cost_content').html(response.view);
                    $('#totalFinanceAmountInput2').val(response.totalAmount)
                },
                error: function(error) {
                    console.log(error);
                }
            });
            }

        }

        function editIPURA(id, prop_id, paid_name, paid_type, paid_amount, paid_percentOf, paid_date, paid_remarks, paid_inLoan){
            $('#itemizedPurchasedAmtIDEdit').val(id);
            $('#itemizedPurchasedAmtPropertyIDEdit').val(prop_id);
            $('#itemizedPurchasedAmtNameEdit').val(paid_name);
            $('#itemizedPurchasedAmtTypeEdit').val(paid_type);

            if(paid_type == 'amount'){
                $('#itemizedPurchasedAmtAmountEdit').val(paid_amount);
                document.getElementById("tabButton-purchasedamountEdit").classList.add("active");
                document.getElementById("tabButton-purchasedpercentEdit").classList.remove("active");
                document.getElementById("tab-purchasedamountEdit").classList.add("active");
                document.getElementById("tab-purchasedpercentEdit").classList.remove("active");
            }
            else{
                $('#itemizedPurchasedAmtPercentEdit').val(paid_amount);
                $("#itemizedPurchasedAmtPercentOfEdit").children('[value="'+paid_percentOf+'"]').attr('selected', true);
                document.getElementById("tabButton-purchasedamountEdit").classList.remove("active");
                document.getElementById("tabButton-purchasedpercentEdit").classList.add("active");
                document.getElementById("tab-purchasedamountEdit").classList.remove("active");
                document.getElementById("tab-purchasedpercentEdit").classList.add("active");
            }

            $('#itemizedPurchasedAmtDateEdit').val(paid_date);
            $('#itemizedPurchasedAmtRemarkEdit').val(paid_remarks);
            $('#itemizedPurchasedAmtInLoanEdit').val(paid_inLoan);
            if(paid_inLoan == 1){
                $('#RefinanceCostsRollIntoLoanEditYes').css('color','blue');
                $('#RefinanceCostsRollIntoLoanEditNo').css('color','black');
            }
            if(paid_inLoan == 0){
                $('#RefinanceCostsRollIntoLoanEditYes').css('color','black');
                $('#RefinanceCostsRollIntoLoanEditNo').css('color','blue');
            }

            $('#PurchasedAmountModalEdit').modal('show');
        }
    // =================================== REFINACE COSTS ===================================
</script>