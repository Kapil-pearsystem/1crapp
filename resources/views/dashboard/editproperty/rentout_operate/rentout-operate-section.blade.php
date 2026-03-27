
<style>
    #successModal .modal-lg {
      width: auto;
      max-width: fit-content;
    }

/* .all_frm_list .form-group.managsss1 span.currencyInputprefix.percentOfSpan {
    position: absolute;
    right: 96px;
    font-size: 14px;
    background: #e2ebf7;
    border-radius: 9px 0px 0px 9px;
    padding: 10px 10px;
    margin-top: 1px;
} */


 /* .all_frm_list .form-group.managsss1 input.currencyInput.pecentOfInput {
        position: relative;
        top: -24px;
    } */
/* .all_frm_list .form-group.managsss1 span.edttt {
  margin-top: -23px;
} */
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
</style>
<!-- start -->
<div class=" " data-toggle="modal" data-target="#videotutorialmodal" style="float: right;position: relative;top: -5px;left: 0px;display: inline-block;"><a href="#"><img src="{{ url('') }}/img/video-tutorial-new.png" style="width: 85px;"></a> </div>
<div class="hd_res_listsss">
    <h2>Rental Income</h2>
</div>
<div class="all_frm_list loanform">
    <div class="form-group managsss1 lot_sz">
        <label>Date of Rentout <span class="ticck" tooltip="Data Of Rentout" flow="down">?</span></label>
        <input type="date" placeholder="Rentout Date" onChange="updateRentData(<?= $propertyID ?>)" name="date_of_rentout" value="<?= trim($MainProperty->date_of_rentout); ?>" id="RentoutDate">
    </div>
    <div class="form-group managsss1 lot_sz">
        <label>Gross Rent <span class="ticck" tooltip="Data Coming Soon" flow="down">?</span></label>
        <span class="currencyInputprefix"><?= $currency ?></span>
        <input type="number" placeholder="Gross Rent" onChange="updateRentData(<?= $propertyID ?>)" name="grossrent" value="<?= trim($MainProperty->grossrent); ?>" onkeypress="return (event.charCode !=8 && event.charCode ==0 || ( event.charCode == 46 || (event.charCode >= 48 && event.charCode <= 57)))" class="currencyInput" id="GrossRent">
        <span class="pusntttss">
            <select name="grossrent_type" id="GrossrentType" onChange="updateRentData(<?= $propertyID ?>)" style=" background: #4a83cc;">
                <option <?= $MainProperty->grossrent_type == 'day' ? 'selected' : '' ?> value="day">Per Day</option>
                <option <?= $MainProperty->grossrent_type == 'week' ? 'selected' : '' ?> value="week">Per Week</option>
                <option <?= $MainProperty->grossrent_type == 'month' ? 'selected' : '' ?> value="month">Per Month</option>
                <option <?= $MainProperty->grossrent_type == 'quarter' ? 'selected' : '' ?> value="quarter">Per Quarter</option>
                <option <?= $MainProperty->grossrent_type == 'year' ? 'selected' : '' ?> value="year">Per Year</option>
            </select>
        </span>
    </div>
    <div class="form-group managsss1">
        <label>Vacancy Rate <span class="ticck" tooltip="Data Coming Soon" flow="down">?</span></label>
        <input type="number" name="vacancy_rate" onChange="updateRentData(<?= $propertyID ?>)" placeholder="Vacancy Rate" value="<?= $MainProperty->vacancy_rate ?>" class="" id="vacancyRate">
        <span class="pursntss">%</span>
        <!-- <span class="sm_txtx"><a href="javascript:void(0);">+Add Year-Sepecific Value</a></span> -->
    </div>
    <div class="row">
        <div class="form-group managsss1 col-md-9">
            <label>Other Income <span class="ticck" tooltip="Data Coming Soon" flow="down">?</span></label>
            <div class="pce_amount">
                <span class="currencyInputprefix"><?= $currency ?></span>
                <input class="currencyInput" onChange="updateRentData(<?= $propertyID ?>)"
                <?php if (count($ItemPaidAmount)) { echo 'readonly'; } else {} ?>
                type="number" id="totalPaidAmountInputrentoutoperate" placeholder="Other Income" value="<?= trim($MainProperty->other_income_price); ?>">
            </div>
        </div>
        <div class="choss_araes col-md-3" style="padding: 0;">
            <div class="ri_lft_araeassd" style="width: 100%;">
                <label>Itemize Other Income</label>
                <div class="yesNoButton">
                    <input type="checkbox" class="toggle" id="togglerentoutoperate" autocomplete="off" checked />
                    <label for="togglerentoutoperate">
                        <span class="on">Yes</span>
                        <span class="off">No</span>
                    </label>
                </div>
            </div>
        </div>
    </div>
    <!-- End Total Paid Amount (Part Of BPP) -->
    <!-- Itemized purchase Costs  -->
    <div class="itm_cost_prch" id="itemisedrentoutoperate" <?php if (!count($ItemPaidAmount)) { echo 'style="display: none;"'; } ?>>
        <div class="hd_res_listsss">
            <h2>Itemized Other Income <span class="rit_mg">
            <button type="button" class="bg-transparent border-0 shadow-none" data-toggle="modal" data-target="#paidrentoutoperateAmountModal">
                <img src="{{url('')}}/img/ad_bk.png" alt="" />
            </button></span></h2>
        </div>
        <div class="all_frm_list" style="padding: 0;">
            <?php $totalPaidAmt = 0;
            foreach ($ItemPaidAmount as $itemPA) { ?>
                <div class="form-group managsss1 item_parst" id="IPA<?= $itemPA->id ?>">
                    <label><?= $itemPA->paid_name ?></label>
                    <?php
                    $AmtType = $itemPA->paid_type == 'month' ? $itemPA->paid_amount : $itemPA->paid_amount / 12;
                    $totalPaidAmt += round($AmtType); ?>
                    <span class="currencyInputprefix"><?= $currency ?></span>
                    <input class="currencyInput" type="text" value="<?= $itemPA->paid_amount ?>" readonly />
                    <span class="pursntss">Per <?= $itemPA->paid_type ?></span>
                    <span class="edttt bth_alsss">
                        <a onclick="editIPA(<?= $itemPA->id ?>,<?= $itemPA->prop_id ?>,'<?= $itemPA->paid_name ?>','<?= $itemPA->paid_type ?>',<?= $itemPA->paid_amount ?>);" style="cursor: pointer;"><img src="{{url('')}}/img/edit.png" alt="edit" /></a>
                        <a onclick="deleteIPA(<?= $itemPA->id ?>,<?= $itemPA->paid_amount ?>)" style="cursor: pointer;"><i class="fa fa-trash"></i></a>
                    </span>
                </div>
            <?php } ?>
            <div id="rentoutpaidAmountItemizedDiv"></div>
            <div class="btm_coststs"><span class="tltss">Total</span> <span class="pricss"><?= $currency ?> <span id="totalItemizedPaidAmt"><?= $totalPaidAmt ?></span> Per Month (<?= $currency ?> <span id="totalItemizedPaidAmtyearly"><?= $totalPaidAmt * 12 ?></span> Per Year)</span></span></div>
        </div>
    </div>
    <!-- End Itemized purchase Costs  -->
</div>
<!-- Purchase costs -->
<div class="lsting_proprty purch_list_conts brcats_listss mt-4">
    <h3>Operating Expenses <span class="ticck" tooltip="Data Coming Soon" flow="down">?</span></h3>
</div>
<div class="all_frm_list">
    <div class="choss_araes row">
        <div class="lft_cntts col-md-10">
            <div class="form-group managsss1">
                <label>Total</label>
                <div class="pce_amount" <?php if (count($ItemPurchaseCost)) {
                                        } else {
                                            echo 'style="display: none;"';
                                        } ?>>
                    <span class="currencyInputprefix"><?= $currency ?></span>
                    <input class="currencyInput" readonly type="number" id="ro_totalPurchasedAmountInput2" placeholder="Total Purchase Cost" value="<?= $MainProperty->operating_expense_price ?>">
                    <span class="pursntss">Per Month</span>
                </div>
                <div class="pce_percent" <?php if (count($ItemPurchaseCost) == 0) {
                                            } else {
                                                echo 'style="display: none;"';
                                            } ?>>
                    <input type="number" placeholder="0" value="<?= $MainProperty->operating_expense_percent ? $MainProperty->operating_expense_percent : '3' ?>" name="closingCostEstimatePercent" />
                    <span class="pursntss">% Of Rent</span>
                </div>
            </div>
        </div>
        <div class="ri_lft_araeassd">
            <label>Itemize</label>
            <div class="yesNoButton">
                <input type="checkbox"  checked class="toggle" id="Operatingtoggle13" autocomplete="off" />
                <label for="Operatingtoggle13">
                    <span class="on">Yes</span>
                    <span class="off">No</span>
                </label>
            </div>
        </div>
    </div>
    <!-- Itemized purchase Costs  -->
    <div class="itm_cost_prch" id="OperatingitemisedPurchaseCost" <?php if (count($ItemPurchaseCost)) { } else {  echo 'style="display: none;"'; } ?>>
        <div class="hd_res_listsss">
            <h3>Itemized Operating Expenses <span class="rit_mg">
                    <button type="button" class="bg-transparent border-0 shadow-none" data-toggle="modal" data-target="#OperatingpurchaseCostModal">
                        <img src="{{url('')}}/img/ad_bk.png" alt="" />
                    </button></span></h3>
        </div>
        <div class="all_frm_list" style="padding: 0;">
            <?php $totalPurchasedAmount = 0;
            foreach ($ItemPurchaseCost as $itemPA) {
            ?>
                <div class="form-group managsss1" id="IPURA<?= $itemPA->id ?>">
                    {{-- <label>{{ $itemPA->paid_name }}</label> --}}
                    <?php
                    if ($itemPA->paid_type == 'amount') {
                        if ($itemPA->paid_of == 'month') {
                            $totalPurchasedAmount += $itemPA->paid_amount;
                            $amount = $itemPA->paid_amount;
                        } else {
                            $totalPurchasedAmount += $itemPA->paid_amount / 12; // todo loan amount update
                            $amount = $itemPA->paid_amount / 12;
                        }
                    ?>
                        <label>{{ $itemPA->paid_name }}</label>
                        <span class="currencyInputprefix"><?= $currency ?></span>
                        <input class="currencyInput" type="number" value="<?= $itemPA->paid_amount ?>" readonly />
                        <span class="currencyInputprefix percentOfSpan">Per <?= $itemPA->paid_of ?></span>
                    <?php
                    } else {
                        if ($itemPA->paid_percentOf == 'price') {
                            $totalPurchasedAmount += $itemPA->paid_amount * $MainProperty->prop_purchasePrice / 100;
                            $amount = $itemPA->paid_amount * $MainProperty->prop_purchasePrice / 100;
                        } else {
                            $totalPurchasedAmount += $itemPA->paid_amount * $MainProperty->grossrent / 100; // todo rent amount update
                            $amount = $itemPA->paid_amount * $MainProperty->grossrent / 100;
                        }
                        if ($itemPA->paid_name == 'Property Management') {
                            // $amount = $itemPA->paid_amount * $MainProperty->grossrent;
                        }
                    ?>
                        <label>{{ $itemPA->paid_name }}</label>
                        <input class="currencyInput pecentOfInput" type="number" value="<?= $itemPA->paid_amount ?>" readonly />
                        <span class="currencyInputprefix percentOfSpan">% of <?= $itemPA->paid_percentOf ?></span>
                    <?php
                    } ?>
                    <span class="edttt bth_alsss">
                        <a onclick="editIPURA(<?= $itemPA->id ?>,<?= $itemPA->prop_id ?>,'<?= $itemPA->paid_name ?>','<?= $itemPA->paid_type ?>',<?= $itemPA->paid_amount ?>,'<?= $itemPA->paid_percentOf ?>','<?= $itemPA->paid_infuture ?>','<?= $itemPA->paid_aftervacancy ?>','<?= $itemPA->paid_of ?>');" style="cursor: pointer;"><img src="{{url('')}}/img/edit.png" alt="edit" /></a>
                        <a onclick="deleteIPURA(<?= $itemPA->id ?>,<?= $itemPA->paid_amount ?>)" style="cursor: pointer;"><i class="fa fa-trash"></i></a>
                    </span>
                </div>
            <?php
            } ?>
            <div id="ro_purchasedAmountItemizedDiv" style="margin-top: 15px;"></div>
            <div class="btm_coststs">
                <span class="tltss">Total</span>
                <span class="pricss"><?= $currency ?>
                    <span id="totalItemizedPurchasedAmt">
                        {{ round($totalPurchasedAmount) }}
                    </span> Per Month (<?= $currency ?>
                    <span id="totalItemizedPurchasedAmtyearly">
                        <?= $totalPurchasedAmount * 12 ?>
                    </span> Per Year)
                </span>
                </span>
            </div>
        </div>
    </div>
</div>
<!-- end -->