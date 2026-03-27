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
</style>
@include('front.layouts.header')

<style>
.part_boxx_areaa {box-shadow:0 .5rem 1rem rgba(0, 0, 0, .15) !important; background-color:#fff; border-radius:0px; display:inline-block; width:100%; padding:15px 15px 5px; margin-bottom: 20px;}

.part_boxx_areaa h2 {margin: 0 0 10px; font-size: 20px; font-weight: 500; color: #000; display: inline-block; width: 100%;}
.part_boxx_areaa h2 span.link_partsss {float: right;}
.part_boxx_areaa h2 span.link_partsss a {border: #007bff solid 1px; color: #007bff; padding: 2px 15px; display: inline-block; font-size: 12px;
    line-height: 20px; border-radius: 3px; margin-right: 5px;}

.part_boxx_areaa h2 span.link_partsss a.actpartss{background:#007bff; color:#fff;}
.part_boxx_areaa h2 span.link_partsss a:last-child{margin-right:0;}

.part_boxx_areaa .brd_titless {font-size: 16px; font-weight: 500; margin-bottom: 7px; color: #1877f1;}
.part_boxx_areaa .brd_titless span.n_prery {color: #000;}
.part_boxx_areaa p.prp_text {text-transform: uppercase; margin: 0 0 5px; color: #1877f1; font-weight: 600;}

.part_boxx_areaa .prp_textxt {font-size: 12px; display: inline-block; width: 100%; margin-top: 5px;}
.part_boxx_areaa .prp_textxt a{font-size: 12px; color:#007bff;}
.part_boxx_areaa .prp_textxt .titl_textxt {float: left;}
.part_boxx_areaa .prp_textxt .set_vedioo {float: left;}
.part_boxx_areaa .prp_textxt .set_vedioo img {width: 50px; position: relative; top: -4px; left: 10px;}
</style>



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

    @include('front.layouts.detail-sidebar')

        <!--start full details -->
        <div class="col-12 col-sm-9">
            <!--multisteps-form-->
            <div class="part_boxx_areaa">
                <h2>Property Worksheet
                    <span class="link_partsss">
                        <a href="{{ route('properties.projection', ['category' => str_replace('_', '-', $MainProperty->prop_parent_type),'id' => base64_encode($MainProperty->prop_id)]) }}">{{ $category->title }} Projection</a>
                        <a href="{{ route('property.summary', ['category' => str_replace('_', '-', $MainProperty->prop_parent_type),'id' => base64_encode($MainProperty->prop_id)]) }}" class="actpartss">Property Analysis</a>
                </h2>
                <div class="brd_titless">{{ $category->title }} >> {{ isset($MainProperty->prop_name) ? $MainProperty->prop_name : '' }} >> <span class="n_prery">Property Worksheet</span></div>
                <!-- <p class="prp_text">Property Work Sheet</p> -->
                <div class="prp_textxt">
                    <div class="titl_textxt">use this Worksheet to customize the Purchase Cost, Financing, Refinancing, Improvement cost, extra charge, Rentals, Operating Cost, and many other details for {{ $category->title }} Properties <a href="javascript:void(0);">View tutorial <i class="fa fa-external-link"></i></a>
                    </div>
                    <div class="set_vedioo" data-toggle="modal" data-target="#videotutorialmodal"><a href="javascript:void(0);"><img src="{{ asset('img/video-tutorial-new.png') }}"> </a></div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">

                    <form id="propertyPageForm2" method="POST" action="{{ route('update-worksheet') }}" enctype="multipart/form-data">
                        <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                        <input type="hidden" name="propertyID" value="{{ $propertyID }}">
                        <input type="hidden" name="prop_parent_type"   value="{{ isset($MainProperty->prop_parent_type) ? $MainProperty->prop_parent_type : $type}}">
                        @if(Session::has('success'))
                            <div class="alert alert-success">
                                {{Session::get('success')}}
                            </div>
                        @endif
                        <!-- book finance payment -->
                        @include('dashboard.editproperty.book-finance-payment-section')

                        <!-- possession improvement -->
                        @include('dashboard.editproperty.possession-improvement-section')
                        <hr>
                        <!-- rentout-operate -->
                        @include('dashboard.editproperty.rentout_operate.rentout-operate-section')

                        <hr>
                        <!-- refinance cashout -->
                        <!-- @incdsfafslude('dashboard.editproperty.refinance_cashout.refinance-cashout-section') -->


                        <!-- End Loan Label -->
                        <div class="backk_bntss">
                            <button type="submit" class="btn btn-primary m-b-0 actss" style="float: right;">Update </button>
                        </div>
                        <!-- End Itemized purchase Costs  -->
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@include('front.layouts.footer')
<!-- book finance payment -->
@include('dashboard.editproperty.book-finance-payment-modals')

<!-- possession improvement -->
@include('dashboard.editproperty.possession-improvement-modal')

<!-- rentout-operate -->
@include('dashboard.editproperty.rentout_operate.rentout-operate-modal')

<!-- refinance cashout -->
<!-- @incsdfasflude('dashboard.editproperty.refinance_cashout.refinance-cashout-modal') -->