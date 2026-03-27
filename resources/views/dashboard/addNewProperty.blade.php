<?php
// echo "<pre>".print_r($PropertyDescription, true);die;
$currency = '₹'
?>
@include('front.layouts.header')


<!--PEN HEADER-->
<div class="container mt-5">
    <div class="row mt-4">
	       <div class="col-lg-12">
		 <div class="lsting_proprty purch_list_conts">
		  <div class="mn_lststs">
		   <div class="lft_nw_heds"><h3>New {{ $property_type }} Property</h3></div>
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
		    <p>Analyze a ane property you plan to buy and hold for long- term cash flow, including short- term rentals.</p>
		   </div>
		   <div class="prp_bntsss">
              <ul>
                <li>
                 <a href="{{url('properties/')}}/{{ $type }}/list" class="actss"> Cancel</a>
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
		  <div class="property_aresssd">
		   <div class="row">
		    <div class="col-lg-4">
			 <div class="proprt_bxss" style="background: #eee;box-shadow: 0px 0px 2px #c6d7ed;">
			  <h5>Import property data </h5>
			  <p>Import property data from public records and active listings. Available in India only.</p>
			  <div class="linss_btnss"><a href="javascript:void(0);">Coming Soon...</a></div>
			 </div>
			</div>
		    <div class="col-lg-4">
			 <div class="proprt_bxss">
			  <h5>Enter Manually</h5>
			  <p>Fill in property information manually. We'll guide you through the process.</p>
			  @if($type=='contract_and_sell')
			  <div class="linss_btnss"><a href="javascript:void(0);" onclick="opencontractsellmodal()">Enter Data</a></div>
			  @else
			  <div class="linss_btnss"><a href="{{ route('properties.new-property.description') }}">Enter Data</a></div>
			  @endif
			 </div>
			</div>
		    <div class="col-lg-4">
			 <div class="proprt_bxss">
			  <h5>Copy Property</h5>
			  <p>Copy one of your existing properties to quickly analyze alternative scenarios.</p>
			  <div class="linss_btnss"><a href="javascript:void(0);">Copy Property</a></div>
			 </div>
			</div>
		   </div>
		  </div>
        </div>
	   </div>
    </div>




<div class="modal fade" id="contractsellmodal" tabindex="-1" role="dialog" aria-labelledby="paidAmountModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content all_frm_list">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="font-size: 30px;">
          <span aria-hidden="true">&times;</span>
        </button>
        <form action="{{ url('addContractInitialData')}}"   method="POST">
            <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
            <input type="hidden" name="dealer_closing_cost_type" id="itemizedPaidAmtTypeEdit" value="amount"/>
            <div class="hd_res_listsss">
                <h2>Add New Property</h2>
            </div>
        	<div class="form-group">
                <label>Property Name </label>
                <input type="text" name="prop_name" placeholder="Property Name" required value="" />
            </div>

               <div class="form-group">
                            <label>Purchase Price<span class="ticck" tooltip="Data Coming Soon" flow="down">?</span></label>
                            <span class="currencyInputprefix"><?=$currency?></span>
                            <input class="currencyInput" type="text" placeholder="Purchase Price" value="0" required onkeypress="return (event.charCode !=8 && event.charCode ==0 || ( event.charCode == 46 || (event.charCode >= 48 && event.charCode <= 57)))" name="dealer_purchase_price" id="dealer_purchase_price"/>
                        </div>

        	<div class="tbss_form_lst mt-4">

 <div class="tab-wrapper">
                    <div class="tbs_hids">Closing Cost Type</div>
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
                            <input name="dealer_closing_cost" id="dealer_closing_cost" class="currencyInput" type="text" placeholder="Amount" value="0" />
                        </div>
                    </div>

                    <div id="tab-percentEdit" class="tab-content">
                        <div class="form-group managsss1">
                            <label>Percent </label>
                            <input type="text" name="dealer_closing_cost_percent" id="dealer_closing_cost_percent" placeholder="Percent" value="" />
                            <select class="percentOfClass" name="dealer_closing_cost_percentof" id="itemizedPaidAmtPercentOfEdit">
                              <option value="price">% Of Price</option>
                            </select>
                        </div>
    				</div>




                </div>
            </div>




             <div class="form-group managsss1">
                            <label>Investor Strategy </label>

                            <select class="slt_areaa_ful" name="prop_type" required id="prop_type">
	                              <option value="Buy And Sell">Buy & Sell</option>
	                              <option value="Buy And Hold">Buy And Hold</option>
	                              <option value="Buy, Hold And Refinance">Buy, Hold And Refinance</option>
                            </select>
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

        </form>
    </div>
  </div>
</div>




@include('front.layouts.footer')
<link rel="stylesheet" href="{{ url('/selecttags/fm.tagator.jquery.css')}}" />
<script src="{{ url('/selecttags/fm.tagator.jquery.js')}}"></script>
<style>
.choices__list--multiple .choices__item{
    background-color: #1c539a;
    border: 1px solid #1c539a;
}

.tagator_tag_remove {
    background: #f15867;
    border-top-right-radius: 5px;
    border-bottom-right-radius: 5px;
}
.tagator_tag {
        margin-top: 8px;
    background: #1977f1;
    border-radius: 5px;
    padding: 4px 20px 4px 10px;
}

input.tagator_input {
    padding: 0 !important;
    border: none !important;
}
#tagator_activate_tagator2 {
    max-width: 100%;
}

.form-group.managsss1.lot_sz .pusntttss {
    background: #4a83cc;
    right: 2px;
    margin: 2px 0 0;
    padding: 9px 15px;
    color: #fff;
    border-radius: 10px;
}

.pusntttss {
    position: absolute;
    right: 150px;
    margin-top: 11px;
    font-size: 14px;
}

</style>

 <script>
 	function opencontractsellmodal(){
 		$('#contractsellmodal').modal('show');
 	}

 	$('.tabLinkPaidAmtEdit').click(function() {
    var tabID = $(this).attr('data-tab');
    $(this).addClass('active').siblings().removeClass('active');
    $('#tab-' + tabID + 'Edit').addClass('active').siblings().removeClass('active');

    // update hidden value of paid amount form
    $("#itemizedPaidAmtTypeEdit").val(tabID);
});


 </script>