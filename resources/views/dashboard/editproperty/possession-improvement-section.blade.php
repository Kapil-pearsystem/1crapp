<?php
// echo $propertyID;die;
// echo "<pre>".print_r($MainProperty, true);die;
$currency = '₹';
?>
<style>
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

    <input type="hidden" name="propertyPurchasePrice" id="propertyPurchasePrice" value="<?=$MainProperty->prop_purchasePrice?>">
    @if(Session::has('success'))
        <div class="alert alert-success">
            {{Session::get('success')}}
        </div>
    @endif
    <div class=" " data-toggle="modal" data-target="#videotutorialmodal"  style="float: right;position: relative;top: -5px;left: 0px;display: inline-block;">
        <a href="#">
            <img src="https://pearsystem.space/1crapp/public/img/video-tutorial-new.png" style="width: 85px;">
        </a>
    </div>
    <!-- Itemized Extra Charges  -->
    @include('dashboard.editproperty.buy_possession_improvement.extra_charges_possession.extra_charges_possession_section',[
        'MainProperty'   => $MainProperty,
        'ItemExtraCharge'=> $ItemExtraCharge
    ])
    <!-- Itemized Extra Charges  -->
    <!-- Itemized Improvement Cost -->
        @include('dashboard.editproperty.buy_possession_improvement.improvement_cost.improvement_cost_section',[
            'MainProperty'        => $MainProperty,
            'ItemImprovementCost' => ImprovementCosts($MainProperty)
        ])
    <!-- Itemized Improvement Cost -->

    <!-- Itemized Conveyance Deed Cost  -->
    @include('dashboard.buy_possession_improvement.conveyance_deed_cost.conveyance_deed_cost_section',[
        'MainProperty' => $MainProperty
    ])
    @include('dashboard.buy_possession_improvement.holding_cost.holding_cost_section',[
        'MainProperty' => $MainProperty
    ])

