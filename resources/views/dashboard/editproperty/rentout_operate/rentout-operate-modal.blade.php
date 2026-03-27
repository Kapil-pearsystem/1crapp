

<!-- Modal -->
<div class="modal fade" id="paidrentoutoperateAmountModal" tabindex="-1" role="dialog" aria-labelledby="paidrentoutoperateAmountModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content all_frm_list">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="font-size: 30px;">
                <span aria-hidden="true">&times;</span>
            </button>
            <div class="modal-header" style="background: transparent;margin-right: 250px;border-bottom: 3px solid #ff002f;margin-bottom: 10px;padding: 0;font-weight: bold;">Add Income Source</div>
                <form id="rentoutitemizedPaidAmtForm" method="POST">
                    <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                    <input type="hidden" name="itemizedPaidAmtID" id="itemizedPaidAmtID" value=""/>
                    <input type="hidden" name="itemizedPaidAmtPropertyID" value="<?=$propertyID?>"/>
                    <div class="form-group">
                        <label>Name </label>
                        <input type="text" name="itemizedPaidAmtName" id="itemizedPaidAmtName" placeholder="Name" value="" />
                    </div>

					<div class="tbss_form_lst mt-4">
                    <div class="tab-wrapper">
                        <div class="tbs_hids">Type</div>
                        <ul class="tabs">
                            <li id="tabButton-amount" class="tabLinkPurchasedAmt  percent_amount_button active" data-tab="rentoutoperatepurchasedamount">Set Amount</li>
                            <li id="tabButton-percent" class="tabLinkPurchasedAmt percent_amount_button" data-tab="rentoutoperatepurchasedpercent">Percent</li>
                        </ul>
                    </div>
                    <div class="content-wrapper">
                        <div id="tab-rentoutoperatepurchasedamount" class="tab-content active">
                            <div class="form-group managsss1">
                                <label>Amount </label>
                                <span class="currencyInputprefix"><?=$currency?></span>
                                <input name="itemizedPaidAmtAmount" id="itemizedPurchasedAmtAmount" class="currencyInput" type="text" placeholder="Amount" value="" />

                                <select class="percentOfClass" name="itemizedPaidAmtType" id="itemizedPurchasedAmtOf">
								    <option value="week">Per Week</option>
                                    <option value="month">Month</option>
                                    <option value="year">Year</option>
                                </select>
                            </div>
                        </div>
                        <div id="tab-rentoutoperatepurchasedpercent" class="tab-content">
                            <div class="form-group managsss1">
                                <label>Percent </label>
                                <input type="text" name="itemizedPurchasedAmtPercent" id="itemizedPurchasedAmtPercent" placeholder="Percent" value="" />
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
<div class="modal fade" id="paidrentoutoperateAmountModalEdit" tabindex="-1" role="dialog" aria-labelledby="paidrentoutoperateAmountModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content all_frm_list">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="font-size: 30px;">
                <span aria-hidden="true">&times;</span>
            </button>
            <div class="modal-header" style="background: transparent;margin-right: 250px;border-bottom: 3px solid #ff002f;margin-bottom: 10px;padding: 0;font-weight: bold;">Edit Income Source</div>
            <form id="rentoutitemizedPaidAmtFormEdit" method="POST">
                <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                <input type="hidden" name="itemizedPaidAmtID" id="itemizedPaidAmtIDEdit" value=""/>
                <input type="hidden" name="itemizedPaidAmtPropertyID" value="<?=$propertyID?>"/>
                <div class="form-group">
                    <label>Name </label>
                    <input type="text" name="itemizedPaidAmtName" id="itemizedPaidAmtNameEdit" placeholder="Name" value="" />
                </div>
                <div class="tbss_form_lst mt-4">
                    <div class="content-wrapper">
                        <div id="tab-amountEdit" class="tab-content active">
                            <div class="form-group managsss1">
                                <label>Amount </label>
                                <span class="currencyInputprefix"><?=$currency?></span>
                                <input name="itemizedPaidAmtAmount" id="itemizedPaidAmtAmountEdit" class="currencyInput" type="text" placeholder="Amount" value="" />
                                <select class="percentOfClass" name="itemizedPaidAmtType" id="itemizedPaidAmtTypeEdit">
								    <option value="Week">Per Week</option>
                                    <option value="month">Month</option>
                                    <option value="year">Year</option>
                                </select>
                            </div>
                        </div>
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
<div class="modal fade" id="OperatingpurchaseCostModal" tabindex="-1" role="dialog" aria-labelledby="OperatingpurchaseCostModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content all_frm_list">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="font-size: 30px;">
                <span aria-hidden="true">&times;</span>
            </button>
            <div class="modal-header" style="background: transparent;margin-right: 235px;border-bottom: 3px solid #ff002f;margin-bottom: 10px;padding: 0;font-weight: bold;">Add Operating Expense</div>
            <form id="rentoutoperateitemizedPurchasedAmtForm" method="POST">
                <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                <input type="hidden" name="itemizedPurchasedAmtID" id="itemizedPurchasedAmtID" value=""/>
                <input type="hidden" name="itemizedPurchasedAmtType" id="operating_itemizedPurchasedAmtType" value="amount"/>
                <input type="hidden" name="itemizedPurchasedAmtPropertyID" value="<?=$propertyID?>"/>
                <input type="hidden" name="itemizedFutureExpense" id="itemizedFutureExpense" value="0"/>
                <input type="hidden" name="itemizedAfterVacancy" id="itemizedAfterVacancy" value="0"/>
                <div class="form-group">
                    <label>Name </label>
                    <input type="text" name="itemizedPurchasedAmtName" id="itemizedPurchasedAmtName" placeholder="Name" value="" />
                </div>
                <div class="tbss_form_lst mt-4">
                    <div class="tab-wrapper">
                        <div class="tbs_hids">Type</div>
                        <ul class="tabs">
                            <li id="tabButton-amount" class="tabLinkPurchasedAmt  purchase_cost_modal active" data-tab="Operatingpurchasedamount">Set Amount</li>
                            <li id="tabButton-percent" class="tabLinkPurchasedAmt purchase_cost_modal" data-tab="Operatingpurchasedpercent">Percent</li>
                        </ul>
                    </div>

                    <div class="content-wrapper">
                        <div id="tab-Operatingpurchasedamount" class="tab-content active">
                            <div class="form-group managsss1">
                                <label>Amount </label>
                                <span class="currencyInputprefix"><?=$currency?></span>
                                <input name="itemizedPurchasedAmtAmount" id="itemizedPurchasedAmtAmount" class="currencyInput" type="text" placeholder="Amount" value="" />
                                <select class="percentOfClass" name="itemizedPurchasedAmtOf" id="itemizedPurchasedAmtOf">
                                    <option value="month">Per Month</option>
                                    <option value="year">Per Year</option>
                                </select>
                            </div>
                        </div>
                        <div id="tab-Operatingpurchasedpercent" class="tab-content">
                            <div class="form-group managsss1">
                                <label>Percent </label>
                                <input type="text" name="itemizedPurchasedAmtPercent" id="itemizedPurchasedAmtPercent" placeholder="Percent" value="" />
                                <select class="percentOfClass" name="itemizedPurchasedAmtPercentOf" id="itemizedPurchasedAmtPercentOf">
                                <option value="rent">% Of Rent</option>
                                <option value="price">% Of Price</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group managsss1 operating_aftervacancyblock" style="display:none;">
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
<div class="modal fade" id="PurchasedAmountModalEdit" tabindex="-1" role="dialog" aria-labelledby="PurchasedAmountModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content all_frm_list">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="font-size: 30px;">
                <span aria-hidden="true">&times;</span>
            </button>
            <div class="modal-header" style="background: transparent;margin-right: 235px;border-bottom: 3px solid #ff002f;margin-bottom: 10px;padding: 0;font-weight: bold;">Edit Operating Expense</div>
            <form id="rentoutoperateitemizedPurchasedAmtFormEdit" method="POST">
                <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                <input type="hidden" name="itemizedPurchasedAmtID" id="itemizedPurchasedAmtIDEdit" value=""/>
                <input type="hidden" name="itemizedPurchasedAmtType" id="itemizedPurchasedAmtTypeEdit" value="amount"/>
                <input type="hidden" name="itemizedPurchasedAmtPropertyID" value="<?=$propertyID?>"/>
                <input type="hidden" name="itemizedFutureExpense" id="itemizedFutureExpenseEdit" value="0"/>
                <input type="hidden" name="itemizedAfterVacancy" id="itemizedAfterVacancyEdit" value="0"/>
                <div class="form-group">
                    <label>Name </label>
                    <input type="text" name="itemizedPurchasedAmtName" id="itemizedPurchasedAmtNameEdit" placeholder="Name" value="" />
                </div>
                <div class="tbss_form_lst mt-4">
                    <div class="tab-wrapper">
                        <div class="tbs_hids">Type</div>
                        <ul class="tabs">
                            <li id="tabButton-purchasedamountEdit" class="tabLinkPurchasedAmt percent_amount_button_edit active" data-tab="purchasedamountEdit">Set Amount</li>
                            <li id="tabButton-purchasedpercentEdit" class="tabLinkPurchasedAmt percent_amount_button_edit" data-tab="purchasedpercentEdit">Percent</li>
                        </ul>
                    </div>
                    <div class="content-wrapper">
                        <div id="tab-purchasedamountEdit" class="tab-content active">
                            <div class="form-group managsss1">
                                <label>Amount </label>
                                <span class="currencyInputprefix"><?=$currency?></span>
                                <input name="itemizedPurchasedAmtAmount" id="itemizedPurchasedAmtAmountEdit" class="currencyInput" type="text" placeholder="Amount" value="" />
                                <select class="percentOfClass" name="itemizedPurchasedAmtOf" id="itemizedPurchasedAmtOfEdit">
                                    <option value="month">Per Month</option>
                                    <option value="year">Per Year</option>
                                </select>
                            </div>
                        </div>
                        <div id="tab-purchasedpercentEdit" class="tab-content">
                            <div class="form-group managsss1">
                                <label>Percent </label>
                                <input type="text" name="itemizedPurchasedAmtPercent" id="itemizedPurchasedAmtPercentEdit" placeholder="Percent" value="" />
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
    $("#togglerentoutoperate").on('change', function() {
        $("#itemisedrentoutoperate").toggle();

        if($("#togglerentoutoperate").is(":checked")){
            $('#totalPaidAmountInputrentoutoperate').attr("readonly", "readonly");
        }else{
            $('#totalPaidAmountInputrentoutoperate').removeAttr("readonly");
        }
    });
    $("#Operatingtoggle13").on('change', function() {
        $("#OperatingitemisedPurchaseCost").toggle();
        $(".pce_amount").toggle();
        $(".pce_percent").toggle();
    });
    function updateTotalPaidAmountDiv(val){
        $('#totalPaidAmountDiv').text('₹ ' + val)
        $('#totalPaidAmountInput').val(val)
    }

    function updateTotalPaidAmountDivAllItemized(val){
        console.log('val',val);
        $('#totalPaidAmountDiv').text('₹ ' + val)
        $('#totalPaidAmountInput').val(val)
        $('#totalPaidAmountInputrentoutoperate').val(val)
        $("#totalItemizedPaidAmt").text(val);
        $("#totalItemizedPaidAmtyearly").text(val * 12);
    }

    function updateTotalPurchasedAmountDiv(val){
        $('#totalPurchasedAmountInput').val(val)
    }

    function updateTotalPurchasedAmountDivAllItemized(val){
        $('#totalPurchasedAmountInput').val(val)
        $('#ro_totalPurchasedAmountInput2').val(val)
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
    var form = document.getElementById("rentoutitemizedPaidAmtForm");
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
        paidAmtURL = '{{url('')}}' + '/addItemizedOtherIncome';
        // Send the form data using ajax
        $.ajax({
            url: paidAmtURL,
            type: form.method,
            dataType: "json",
            data: data,
            success: function(response) {
                // console.log(response);
                // If the response is successful, add a div with a message

                var divText = '<div class="form-group managsss1" id="IPA'+response.id+'"><label>'+data['itemizedPaidAmtName']+'</label><span class="currencyInputprefix"><?=$currency?></span><input class="currencyInput" type="text" placeholder="" value="'+data['itemizedPaidAmtAmount']+'" readonly/><span class="pursntss">Per '+data['itemizedPaidAmtType']+'</span><span class="edttt bth_alsss"><a onclick="'+response.editFun+'" style="cursor: pointer;"><img src="'+'{{url('')}}'+'/img/edit.png"/></a><a onclick="'+response.deleteFun+'" style="cursor: pointer;"><i class="fa fa-trash"></i></a></span></div>';
                $("#rentoutpaidAmountItemizedDiv").append(divText);

                // update total value
                var prevTotal = $("#totalItemizedPaidAmt").text();
                var newamount = data['itemizedPaidAmtType'] == 'month' ? data['itemizedPaidAmtAmount'] : data['itemizedPaidAmtAmount']/12;
                var newTotal = numeral(prevTotal).add(newamount).value();

                // update total in fields
                updateTotalPaidAmountDivAllItemized(Math.round(newTotal));

                // update total in db
                updatePaidAmount(Math.round(newTotal), <?=$propertyID?>);
                // $("#totalItemizedPaidAmt").text(newTotal);

                // Close the modal popup
                document.getElementById("rentoutitemizedPaidAmtForm").reset();
                $('#paidrentoutoperateAmountModal .close').click();
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

    function editIPA(id, prop_id, paid_name, paid_type, paid_amount){
        $('#itemizedPaidAmtIDEdit').val(id);
        $('#itemizedPaidAmtPropertyIDEdit').val(prop_id);
        $('#itemizedPaidAmtNameEdit').val(paid_name);
        $("#itemizedPaidAmtTypeEdit").children('[value="'+paid_type+'"]').attr('selected', true);
        $('#paidrentoutoperateAmountModalEdit').modal('show');
        $('#itemizedPaidAmtAmountEdit').val(paid_amount);
    }
    // Get the form element by id
    var formEdit = document.getElementById("rentoutitemizedPaidAmtFormEdit");
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
        paidAmtURL = '{{url('')}}' + '/EditItemizedOtherIncome';
        // Send the form data using ajax
        $.ajax({
            url: paidAmtURL,
            type: form.method,
            dataType: "json",
            data: data,
            success: function(response) {
                // If the response is successful, add a div with a message
                var divText = '<label>'+data['itemizedPaidAmtName']+'</label>\
                <span class="currencyInputprefix">\
                    <?=$currency?>\
                </span>\
                <input class="currencyInput" type="text" placeholder="" value="'+data['itemizedPaidAmtAmount']+'" readonly/>\
                <span class="pursntss">Per '+data['itemizedPaidAmtType']+'</span>\
                <span class="edttt bth_alsss">\
                    <a  onclick="'+response.editFun+'" style="cursor: pointer;">\
                        <img src="'+'{{url('')}}'+'/img/edit.png"/>\
                    </a>\
                    <a onclick="'+response.deleteFun+'" style="cursor: pointer;">\
                        <i class="fa fa-trash"></i>\
                    </a>\
                </span>';
                $("#IPA"+response.id).html(divText);
                // update total value
                var prevTotal = $("#totalItemizedPaidAmt").text();
                var newamount = data['itemizedPaidAmtType'] == 'month' ? data['itemizedPaidAmtAmount'] : data['itemizedPaidAmtAmount']/12;
                var oldamount = response.oldAmtType == 'month' ? response.oldAmt : response.oldAmt/12;
                var newTotal = numeral(prevTotal).add(parseFloat(newamount)).value();
                newTotal = newTotal - oldamount;

                // update total in fields
                updateTotalPaidAmountDivAllItemized(Math.round(newTotal));

                // update total in db
                updatePaidAmount(Math.round(newTotal), <?=$propertyID?>);
                // $("#totalItemizedPaidAmt").text(newTotal);

                // Close the modal popup
                $("#paidrentoutoperateAmountModalEdit").modal("hide");
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
</script>


<script>
    $('.percent_amount_button').click(function() {
        var tabID = $(this).attr('data-tab');
        $(this).addClass('active').siblings().removeClass('active');
        $('#tab-' + tabID).addClass('active').siblings().removeClass('active');

        // update hidden value of paid amount form
        if(tabID=='rentoutoperatepurchasedamount'){
            tabID = 'amount';
            $('.aftervacancyblock').hide();
        }else{
            tabID = 'percent';
            $('.aftervacancyblock').show();
        }
        $("#itemizedPurchasedAmtType").val(tabID);
    });
    $('.purchase_cost_modal').click(function() {
        var tabID = $(this).attr('data-tab');
        $(this).addClass('active').siblings().removeClass('active');
        $('#tab-' + tabID).addClass('active').siblings().removeClass('active');

        // update hidden value of paid amount form
        if(tabID=='Operatingpurchasedamount'){
            tabID = 'amount';
            $('.operating_aftervacancyblock').hide();
        }else{
            tabID = 'percent';
            $('.operating_aftervacancyblock').show();
        }
        $("#operating_itemizedPurchasedAmtType").val(tabID);
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

    // Get the form element by id
    var pform = document.getElementById("rentoutoperateitemizedPurchasedAmtForm");
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
        // console.log(data);
        // exit();
        // var divText = '<div class="form-group managsss1"><label>'+data['itemizedPaidAmtPercent']+'</label><span class="currencyInputprefix"><?=$currency?></span><input class="currencyInput" type="text" placeholder="" value="'+data['itemizedPaidAmtAmount']+'" /><span class="edttt bth_alsss"><a href="javascript:void(0);"><img src="'+'{{url('')}}'+'/img/edit.png"/></a><a href="javascript:void(0);"><i class="fa fa-trash"></i></a></span></div>';
        // console.log(divText);
        paidAmtURL = '{{url('')}}' + '/addItemizedOperativeExpense';
        // Send the form data using ajax
        $.ajax({
            url: paidAmtURL,
            type: pform.method,
            dataType: "json",
            data: data,
            success: function(response) {
                // console.log(response);
                // console.log(response);
                // If the response is successful, add a div with a message
                if(data['itemizedPurchasedAmtType'] == 'percent'){

                    var divText = '<div class="form-group managsss1" id="IPURA'+response.id+'"><label>'+data['itemizedPurchasedAmtName']+'</label><span class="currencyInputprefix"><?=$currency?></span><input class="currencyInput pecentOfInput" type="text" value="'+data['itemizedPurchasedAmtPercent']+'" readonly/><span class="currencyInputprefix percentOfSpan">% of '+data['itemizedPurchasedAmtPercentOf']+'</span><span class="edttt bth_alsss"><a onclick="'+response.editFun+'" style="cursor: pointer;"><img src="'+'{{url('')}}'+'/img/edit.png"/></a><a onclick="'+response.deleteFun+'" style="cursor: pointer;"><i class="fa fa-trash"></i></a></span></div>';
                }
                else{
                    var divText = '<div class="form-group managsss1" id="IPURA'+response.id+'"><label>'+data['itemizedPurchasedAmtName']+'</label><span class="currencyInputprefix"><?=$currency?></span><input class="currencyInput" type="text" placeholder="" value="'+data['itemizedPurchasedAmtAmount']+'" readonly/><span class="currencyInputprefix percentOfSpan">Per '+data['itemizedPurchasedAmtOf']+'</span><span class="edttt bth_alsss"><a onclick="'+response.editFun+'" style="cursor: pointer;"><img src="'+'{{url('')}}'+'/img/edit.png"/></a><a onclick="'+response.deleteFun+'" style="cursor: pointer;"><i class="fa fa-trash"></i></a></span></div>';
                }
                $("#ro_purchasedAmountItemizedDiv").append(divText);

                // update total value
                var prevTotal = $("#totalItemizedPurchasedAmt").text();

                if(data['itemizedPurchasedAmtType'] == 'percent'){
                    if(data['itemizedPurchasedAmtPercentOf'] == 'price'){
                        var prevTotal = parseFloat(numeral(prevTotal));
                        var newTotal = data['itemizedPurchasedAmtPercent'] / 100 * parseInt($("#basicPurchasePrice").val());
                        newTotal = Math.round((newTotal + prevTotal) * 100) / 100;
                    }
                    else{
                        var prevTotal = parseInt(numeral(prevTotal));
                        var newTotal = data['itemizedPurchasedAmtPercent'] / 100 * parseInt($("#GrossRent").val()); // todo rent amount
                        newTotal = Math.round((newTotal + prevTotal) * 100) / 100;
                    }
                }
                else{


                    var newamount = data['itemizedPurchasedAmtOf'] == 'month' ? data['itemizedPurchasedAmtAmount'] : data['itemizedPurchasedAmtAmount']/12;
                    var newTotal = numeral(prevTotal).add(newamount).value();


                }

                // update total in fields
                updateTotalPurchasedAmountDivAllItemized(newTotal);

                // update total in db
                updatePurchasedAmount(newTotal, <?=$propertyID?>);
                // $("#totalItemizedPaidAmt").text(newTotal);

                // Close the modal popup
                document.getElementById("rentoutoperateitemizedPurchasedAmtForm").reset();
                $('#OperatingpurchaseCostModal .close').click();
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

    function editIPURA(id, prop_id, paid_name, paid_type, paid_amount, paid_percentOf, paid_infuture,paid_aftervacancy,paid_of){
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
            $("#itemizedPurchasedAmtPercentOfEdit").children('[value="'+paid_of+'"]').attr('selected', true);
            $('.aftervacancyblock').hide();
        }
        else{
            $('#itemizedPurchasedAmtPercentEdit').val(paid_amount);
            $("#itemizedPurchasedAmtPercentOfEdit").children('[value="'+paid_percentOf+'"]').attr('selected', true);
            document.getElementById("tabButton-purchasedamountEdit").classList.remove("active");
            document.getElementById("tabButton-purchasedpercentEdit").classList.add("active");
            document.getElementById("tab-purchasedamountEdit").classList.remove("active");
            document.getElementById("tab-purchasedpercentEdit").classList.add("active");
            $('.aftervacancyblock').show();
        }

        $("#itemizedPurchasedAmtPercentOfEdit").children('[value="'+paid_percentOf+'"]').attr('selected', true);
        $("#itemizedPurchasedAmtOfEdit").children('[value="'+paid_of+'"]').attr('selected', true);
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
        $('#PurchasedAmountModalEdit').modal('show');
    }


    // Get the form element by id
    var pformEdit = document.getElementById("rentoutoperateitemizedPurchasedAmtFormEdit");
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
        // console.log(data);
        paidAmtURL = '{{url('')}}' + '/EditItemizedOperativeExpense';
        // Send the form data using ajax
        $.ajax({
            url: paidAmtURL,
            type: pformEdit.method,
            dataType: "json",
            data: data,
            success: function(response) {
                // If the response is successful, add a div with a message

                if(data['itemizedPurchasedAmtType'] == 'percent'){

                    var divText = '<label>'+data['itemizedPurchasedAmtName']+'</label><span class="currencyInputprefix"><?=$currency?></span><input class="currencyInput pecentOfInput" type="text" value="'+data['itemizedPurchasedAmtPercent']+'" readonly/><span class="currencyInputprefix percentOfSpan">% of '+data['itemizedPurchasedAmtPercentOf']+'</span><span class="edttt bth_alsss"><a onclick="'+response.editFun+'" style="cursor: pointer;"><img src="'+'{{url('')}}'+'/img/edit.png"/></a><a onclick="'+response.deleteFun+'" style="cursor: pointer;"><i class="fa fa-trash"></i></a></span>';
                }
                else{
                    var divText = '<label>'+data['itemizedPurchasedAmtName']+'</label><span class="currencyInputprefix"><?=$currency?></span><input class="currencyInput" type="text" placeholder="" value="'+data['itemizedPurchasedAmtAmount']+'" readonly/><span class="currencyInputprefix percentOfSpan">Per '+data['itemizedPurchasedAmtOf']+'</span><span class="edttt bth_alsss"><a onclick="'+response.editFun+'" style="cursor: pointer;"><img src="'+'{{url('')}}'+'/img/edit.png"/></a><a onclick="'+response.deleteFun+'" style="cursor: pointer;"><i class="fa fa-trash"></i></a></span>';
                }
                $("#IPURA"+response.id).html(divText);

                // update total value
                var prevTotal = $("#totalItemizedPurchasedAmt").text();

                if(data['itemizedPurchasedAmtType'] == 'percent'){
                    if(data['itemizedPurchasedAmtPercentOf'] == 'price'){
                        var prevTotal = parseFloat(numeral(prevTotal));
                        var newTotal = data['itemizedPurchasedAmtPercent'] / 100 * parseInt($("#basicPurchasePrice").val());
                        console.log('newTotal',newTotal);
                        newTotal = newTotal - (response.oldAmt / 100 * parseInt($("#basicPurchasePrice").val()));
                        console.log('newTotal2',newTotal);
                        newTotal = Math.round((newTotal + prevTotal) * 100) / 100;
                        console.log('newTotal3',newTotal);
                    }
                    else{
                        var prevTotal = parseInt(numeral(prevTotal));
                        var newTotal = data['itemizedPurchasedAmtPercent'] / 100 * parseInt($("#GrossRent").val()); // todo rent amount
                        newTotal = newTotal - (response.oldAmt / 100 * parseInt($("#GrossRent").val()));
                        newTotal = Math.round((newTotal + prevTotal) * 100) / 100;

                    }
                }
                else{


                    var newamount = data['itemizedPurchasedAmtOf'] == 'month' ? data['itemizedPurchasedAmtAmount'] : data['itemizedPurchasedAmtAmount']/12;
                    var newTotal = numeral(prevTotal).add(newamount).value();
                    newTotal = newTotal - response.oldAmt;


                }




                // update total in fields
                updateTotalPurchasedAmountDivAllItemized(newTotal);

                // update total in db
                updatePurchasedAmount(newTotal, <?=$propertyID?>);
                // $("#totalItemizedPaidAmt").text(newTotal);

                // Close the modal popup
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

    function updatePurchasedAmount(val, id) {
        paidAmtURL = '{{url('')}}' + '/EditOperativeExpenseMainProperty';
        var prop_costPurchasePrice = $('#ro_totalPurchasedAmountInput2').val();
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
                // update total value
                var prevTotal = $("#totalItemizedPurchasedAmt").text();
                var newTotal = numeral(prevTotal).value();
                newTotal = newTotal - amount;

                // update total in fields
                updateTotalPurchasedAmountDivAllItemized(newTotal);

                // update total in db
                updatePurchasedAmount(newTotal, <?=$propertyID?>);

                // remove html
                $("#IPURA"+id).remove();
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
</script>
