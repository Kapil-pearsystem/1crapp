@include('front.layouts.user-header')

<style>
#brd_none_t {border-top: none !important;}
#brd_none_l {border-left: none !important;}
#brd_none_r {border-right: none !important;}
#brd_none_b {border-bottom: none !important;}
#brd_none {border: none !important;}

.p_mitters canvas#foo {height: 70px !important;}
span.tetx_manags {white-space: nowrap; overflow: hidden; text-overflow: ellipsis; width: 80px; display: block; text-align: left;}
table.table.table-bordered.tst_cam_listst tr td {line-height: 19px; padding: 8px 4px;}

.lin_heihtss{line-height:40px !important;}
.lin_heihtss1{line-height:39px !important;}

#updateStatus{opacity:1;}
#updateStatus:before {background: #00000075; content: ''; width: 100%; height: 100%; position: absolute;}
#updateStatus .modal-dialog.modal-dialog-centered {position:fixed; left:50%; top:50%; transform: translate(-50%, -50%); display: flex; justify-content: center; align-items: center; width:94%; margin:0;}

#updateStatus .all_frm_list .form-group.managsss1 .roll_lst .rit_raea .bntt_cn button {font-size:14px; color:#000; border:#1c5299 solid 1px; padding:5px 25px; display:inline-block; border-radius:50px; margin-right:15px;}

#updateStatus .all_frm_list .form-group.managsss1 .roll_lst .rit_raea {width:auto; margin:0 auto; display:table;}

.questt.als_show_ar .con-tooltip.top {
    margin: 0; position: relative;
}
.questt.als_show_ar .con-tooltip.top p.icoo {
    top: 0;
}
.questt.als_show_ar .con-tooltip.top .tooltip {
    position: fixed;
    top: initial;
    bottom: 13px;
}
.questt.als_show_ar .con-tooltip.top .tooltip:after {
    bottom: -7px;
    top: initial;
    transform: rotate(0deg);
}

.all_suportss .modal-content.all_frm_list {
    padding: 20px 20px;
    position: relative;
}
.all_suportss .modal-content.all_frm_list button.close {
    position: absolute;
    right: 10px;
    top: 10px;
    font-size: 30px;
    opacity: 1;
}
.all_suportss .modal-content.all_frm_list h2 {
    margin: 0 0 15px;
    font-size: 22px;
    font-weight: 600;
}
.all_suportss .modal-content.all_frm_list .both_cotentsss {
    display: flex;	
}
.all_suportss .modal-content.all_frm_list .both_cotentsss form{width:100%; display: flex;}

.all_suportss .modal-content.all_frm_list .both_cotentsss input.inpuuts:focus {
    outline: none;
}

.all_suportss .modal-content.all_frm_list .both_cotentsss input.inpuuts {
    width: 85%;
    padding: 10px;
    border: none;
    border-radius: 4px 0px 0px 4px;
    font-size: 15px;
    color: #000;
}
.all_suportss .modal-content.all_frm_list .both_cotentsss button.saveess {
    width: 15%;
    border: none;
    background: #1c5299;
    color: #fff;
    border-radius: 0px 4px 4px 0px;
    cursor: pointer;
}
.all_suportss .modal-content.all_frm_list .both_cotentsss button.saveess:focus{outline:none;}
.ad_plashshe {
    cursor: pointer;
}

@media (min-width: 481px) and (max-width: 767px) {
table.table.table-bordered.tst_cam_listst tr td {text-wrap-mode: nowrap;}
}
@media (min-width: 320px) and (max-width: 480px) {
table.table.table-bordered.tst_cam_listst tr td {text-wrap-mode: nowrap;}
}

</style>


<div class="modal fade all_suportss" id="current_market_value" tabindex="-1" role="dialog" aria-labelledby="videotutorialmodalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content all_frm_list">
	    <h2>Current Market Value (CMV)</h2>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <div class="both_cotentsss">		 
		 <form action="">
		   <input type="text" class="inpuuts" placeholder="Rs.10000" value="" required="" />
		   <button type="submit" class="saveess" value="">Save</button>
		 </form>
		</div> 
    </div>
  </div>
</div>

<div class="modal fade all_suportss" id="balance_debt_date" tabindex="-1" role="dialog" aria-labelledby="videotutorialmodalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content all_frm_list">
	    <h2>Balance Debt As on Date</h2>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <div class="both_cotentsss">		 
		 <form action="">
		   <input type="text" class="inpuuts" placeholder="Rs.10000" value="" required="" />
		   <button type="submit" class="saveess" value="">Save</button>
		 </form>
		</div> 
    </div>
  </div>
</div>

<div class="modal fade all_suportss" id="annual_cash_flow_date" tabindex="-1" role="dialog" aria-labelledby="videotutorialmodalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content all_frm_list">
	    <h2>Annual Cash Flow on Date</h2>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <div class="both_cotentsss">		 
		 <form action="">
		   <input type="text" class="inpuuts" placeholder="Rs.10000" value="" required="" />
		   <button type="submit" class="saveess" value="">Save</button>
		 </form>
		</div> 
    </div>
  </div>
</div>

 <section class="tital_mg_cntss">
 <img src="{{ url('home/img/top_al_pgss.png')}}" class="bg_al_cntxt" alt="" />

  <div class="midils_contnts">
   <div class="medilss"><h4>My Portfolio</h4>
    <a href="{{ url('') }}">Portfolio</a> &gt; <span>Properties List</span>
   </div>
  </div>
</section>

<section class="dash_board_pages">
    <div class="container">
        <div class="table-responsive">
            <table class="table table-bordered tst_cam_listst">
                <tbody>
                    <tr>
                        <td width="15%" colspan="6" class="yellowe_bg">My Properties</td>
                        <td width="40%" class="yellowe_bg"><a href="javascript:void(0);"><i class="fa fa-share-alt"></i></a> Share & Download
						 <a href="javascript:void(0);" class="sm_right_vdooos"  data-toggle="modal" data-target="#videotutorialmodal"><img src="https://1crapp.allproject.online/img/video-tutorial-new.png"> </a>
						</td>
                        <td width="15%" class="yellowe_bg  add_paymmntss"><a href="{{ route('add-portfolio-property') }}" target="_blank">+ Add Property </a></td>
                    </tr>

                    <tr>
                        <td colspan="8" class="p-0">
                            <table class="table table-bordered tst_cam_listst mb-0">
                                <tr>
                                    <td width="11%" class="p-0">
                                        <div class="p_mitters">
                                            <canvas id="foo"></canvas>
                                        </div>
                                    </td>

                                    <td width="7%" class="p-0">
                                        <table class="table table-bordered tst_cam_listst mb-0">
                                            <tr>
                                                <td>Gross Purchase</td>
                                            </tr>
                                            <tr>
                                                <td id="main_gross_total">{{ $totalGrossPayment }}</td>
                                            </tr>
                                        </table>
                                    </td>

                                    <td width="12%" class="p-0">
                                        <table class="table table-bordered tst_cam_listst mb-0">
                                            <tr>
                                                <td>Gross Market Value (Current)</td>
                                            </tr>
                                            <tr>
                                                <td>{{ $totalGrossCurrentMarketValue }}</td>
                                            </tr>
                                        </table>
                                    </td>

                                    <td width="11%" class="p-0">
                                        <table class="table table-bordered tst_cam_listst mb-0">
                                            <tr>
                                                <td>Gross Debt Balance</td>
                                            </tr>
                                            <tr>
                                                <td>{{ $totalGrossCurrentDebtBalance }}</td>
                                            </tr>
                                        </table>
                                    </td>
                                    <td width="11%" class="p-0">
                                        <table class="table table-bordered tst_cam_listst mb-0">
                                            <tr>
                                                <td>Gross Current Equiry</td>
                                            </tr>
                                            <tr>
                                                <td>{{ $totalGrossAccumulatedBalance }}</td>
                                            </tr>
                                        </table>
                                    </td>
                                    <td width="11%" class="p-0">
                                        <table class="table table-bordered tst_cam_listst mb-0">
                                            <tr>
                                                <td>Gross Annual cash Flow</td>
                                            </tr>
                                            <tr>
                                                <td>{{ $totalGrossAnnualCashFlow }}</td>
                                            </tr>
                                        </table>
                                    </td>

                                    

                                    <!--<td width="9%" class="p-0">-->
                                    <!--    <table class="table table-bordered tst_cam_listst mb-0">-->
                                    <!--        <tr>-->
                                    <!--            <td>Gross Profit (Current)</td>-->
                                    <!--        </tr>-->
                                    <!--        <tr>-->
                                    <!--            <td>1,704,000.00</td>-->
                                    <!--        </tr>-->
                                    <!--    </table>-->
                                    <!--</td>-->

                                    <td width="14.3%" class="reds_bg tx_white">Alerts.Dont Ignore Them</td>
                                </tr>
                            </table>
                        </td>
                    </tr>

                    <tr>
                        <td colspan="8" class="p-0 brd_none">
                            <table class="table table-bordered tst_cam_listst mb-0">
                                <tr>
                                    <td class="grea_bg" width="3.2%">
                                        S.No
                                    </td>

                                    <td class="grea_bg" width="11.7%">
                                        Property ID
                                    </td>

                                    <td class="grea_bg manages_widthsss">
                                        Avallable In PSU Employees Property Market (PPM)?
                                    </td>

                                    <td class="p-0 grea_bg" width="30%">
                                        <table class="table table-bordered tst_cam_listst mb-0" style="border: none;">
                                            <tr>
                                                <td class="grea_bg lin_heihtss" style="border:none; border-left:#e9e9e9 solid 1px;">Property</td>
                                            </tr>
                                            <tr>
                                                <td class="p-0" style="border: none; border-left:#e9e9e9 solid 1px;" style="border: none;">
                                                    <table class="table table-bordered tst_cam_listst mb-0" style="border: none;">
                                                        <tr>
                                                            <td class="grea_bg lin_heihtss1" width="25%">Property Name</td>
                                                            <td class="grea_bg" width="25%">Type</td>
                                                            <td class="grea_bg" width="25%">On the name of</td>
                                                            <td class="grea_bg" width="25%">Location</td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>

                                    <td class="grea_bg">
                                        Purchase Date
                                    </td>

                                    <td class="grea_bg">
                                        Purchase cost (Total)
                                    </td>
									
									<td class="grea_bg">
                                        Paid Payment
                                    </td>

                                    <td class="grea_bg">
                                        Merket Price (CMV)
                                    </td>

                                    <td class="p-0 grea_bg" width="25%">
                                        <table class="table table-bordered tst_cam_listst mb-0">
                                            <tr>
                                                <td class="grea_bg">Returns</td>
                                            </tr>
                                            <td class="p-0 grea_bg">
                                                <table class="table table-bordered tst_cam_listst mb-0">
                                                    <tr>
                                                        <td class="grea_bg" width="33.333%">Balance Debit</td>
                                                        <td class="grea_bg" width="33.333%">Accunnulated Enquty</td>
                                                        <td class="grea_bg" width="33.333%">Annual Cash Flow</td>
                                                        <td class="grea_bg" width="33.333%">Action</td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>

                    <tr>
                        <td colspan="8" class="p-0 brd_none">
                            <table class="table table-bordered tst_cam_listst mb-0">
                                @php
                                    $total_amount = 0;
                                @endphp
                                @foreach($properties as $key=>$property)
                               @php
                                $total_amount += \App\Models\PropertyMarketPriceModel::where('property_market_id', $property->id)->sum('amount');
                               @endphp
                                <tr>
                                    <td class="fnt_size" width="3.2%">{{ ++$key }}</td>
                                    <td class="p-0 brd_none" width="11.7%">
                                        <table class="table table-bordered tst_cam_listst mb-0">
                                            <tr>
                                                <td class="fnt_size tx_bluess">{{ $property->property_id }}</td>
                                                <td class="fnt_size">
												 <select>
												  <option value="1"></option>
												 </select>
												</td>
                                            </tr>
                                        </table>
                                    </td>
                                    <td class="fnt_size p-0" width="8%">
                                        <input type="checkbox"
                                                class="property_status"
                                               hidden="hidden"
                                               data-tab="{{ $property->property_id }}"
                                               id="property_status_{{ $property->property_id }}"
                                               @if($property->status == 1) checked @endif/>
                                        <label class="switch" for="property_status_{{ $property->property_id }}"></label>
                                    </td>

                                    <td class="p-0 brd_none" width="30%">
                                        <table class="table table-bordered tst_cam_listst mb-0">
                                            <tr>
                                                <td class="fnt_size" width="25%"><span class="tetx_manags">{{ $property->project_name }}</span></td>
                                                <td class="fnt_size" width="25%"><span class="tetx_manags">{{ $property->property_type }} - {{ optional($property->details)->category_type }}</span></td>
                                                <td class="fnt_size" width="25%"><span class="tetx_manags">{{ $property->owner_name }}</span></td>
                                                <td class="fnt_size" width="25%"><span class="tetx_manags">{{ $property->location }}</span></td>
                                            </tr>
                                        </table>
                                    </td>
                                    <td class="fnt_size">{{ $property->details?date('d-m-Y', strtotime(optional($property->details)->date_of_booking)):'-' }}</td>
                                    
                                    <td class="fnt_size tx_bluess">
									{{ \App\Models\PropertyMarketPriceModel::where('property_market_id', $property->id)->sum('amount') }} <br> ( {{ $property->payments_count ?? 0 }} ) <a href="{{ route('payment-details',$property->property_id) }}" target="_blank"><i class="icon fa fa-external-link push-down-1"></i></a>
									<!--<span class="ad_plashshe"><i class="fa fa-plus-circle"></i></span>--->
									</td>


									<td class="fnt_size tx_bluess questt als_show_ar ">
									 <div class="con-tooltip top">
                                                <p class="icoo"><i class="fa fa-question"></i></p>
                                                <div class="tooltip">
                                                    <p>Your Gross Purchase Price amount does not match with the total entry you made in payment details page. kindly check. <a href="javascript:void(0);">Click Here</a></p>
                                                </div>
                                            </div>
									</td>
                                   

                                    <td class="fnt_size">
									 {{ optional($property->details)->current_market_value }}
									 <span class="ad_plashshe" data-toggle="modal" data-target="#current_market_value"><i class="fa fa-plus-circle"></i></span>
									</td>
                                    <td class="p-0 brd_none" width="25%">
                                        <table class="table table-bordered tst_cam_listst mb-0">
                                            <tr>
                                                <td class="fnt_size" width="20.333%">{{ optional($property->details)->current_debt_balance }} <span class="ad_plashshe" data-toggle="modal" data-target="#balance_debt_date"><i class="fa fa-plus-circle"></i></span></td>
                                                @php
                                                    $accumulated = optional($property->details)->current_market_value - optional($property->details)->current_debt_balance;
                                                @endphp
                                                 <td class="fnt_size" width="23.333%">{{ $accumulated }}</td>
                                                 <td class="fnt_size tx_bluess" width="23.333%">
												  {{ optional($property->details)->annual_cash_flow }}
												  <span class="ad_plashshe" data-toggle="modal" data-target="#annual_cash_flow_date"><i class="fa fa-plus-circle"></i></span>
												 </td> 
                                                <td class="fnt_size tx_bluess" width="23.333%"><a href="{{ route('download.property.pdf', $property->id) }}" target="_blank" >
                                                    <i class="fa fa-download"></i>
                                                </a>
                                                <a href="{{ route('add-portfolio-property.edit', $property->id) }}" target="_blank" >
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                               <a href="{{ route('delete.marketplace', $property->id) }}" 
   onclick="return confirm('Are you sure you want to delete this property?')">
   <i class="fa fa-trash"></i> 
</a>
                                            </td> 
                                                


                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                @endforeach
        <!--                        <tr>-->
        <!--                            <td class="fnt_size" width="3.6%">1</td>-->
        <!--                            <td class="p-0 brd_none" width="9%">-->
        <!--                                <table class="table table-bordered tst_cam_listst mb-0">-->
        <!--                                    <tr>-->
        <!--                                        <td class="fnt_size tx_bluess">FY-202034</td>-->
        <!--                                        <td class="fnt_size">-->
								<!--				 <select>-->
								<!--				  <option value="1"></option>-->
								<!--				 </select>-->
								<!--				</td>-->
        <!--                                    </tr>-->
        <!--                                </table>-->
        <!--                            </td>-->
        <!--                            <td class="fnt_size p-0" width="8%">-->
        <!--                                <input type="checkbox" hidden="hidden" id="username" />-->
        <!--                                <label class="switch" for="username"></label>-->
        <!--                            </td>-->
        <!--                            <td class="p-0 brd_none" width="40%">-->
        <!--                                <table class="table table-bordered tst_cam_listst mb-0">-->
        <!--                                    <tr>-->
        <!--                                        <td class="fnt_size">201,B S Buildetch</td>-->
        <!--                                        <td class="fnt_size">Commercial - Retails (Droop Down)</td>-->
        <!--                                        <td class="fnt_size">Ramawtar Meena</td>-->
        <!--                                        <td class="fnt_size">Noida</td>-->
        <!--                                    </tr>-->
        <!--                                </table>-->
        <!--                            </td>-->
        <!--                            <td class="fnt_size">15-01-2024</td>-->
        <!--                            <td class="fnt_size tx_bluess">450000</td>-->
        <!--                            <td class="fnt_size">550000</td>-->

        <!--                            <td class="p-0 brd_none">-->
        <!--                                <table class="table table-bordered tst_cam_listst mb-0">-->
        <!--                                    <tr>-->
        <!--                                        <td class="fnt_size">300000</td>-->
        <!--                                        <td class="fnt_size">550000</td>-->
        <!--                                        <td class="fnt_size tx_bluess">450000</td>-->
        <!--                                    </tr>-->
        <!--                                </table>-->
        <!--                            </td>-->
        <!--                        </tr>-->

								<!--<tr>-->
        <!--                            <td class="fnt_size">2</td>-->
        <!--                            <td class="p-0 brd_none">-->
        <!--                                <table class="table table-bordered tst_cam_listst mb-0">-->
        <!--                                    <tr>-->
        <!--                                        <td class="fnt_size tx_bluess">FY-202034</td>-->
        <!--                                        <td class="fnt_size">-->
								<!--				 <select>-->
								<!--				  <option value="1"></option>-->
								<!--				 </select>-->
								<!--				</td>-->
        <!--                                    </tr>-->
        <!--                                </table>-->
        <!--                            </td>-->
        <!--                            <td class="fnt_size p-0">-->
        <!--                                <input type="checkbox" hidden="hidden" id="username1" />-->
        <!--                                <label class="switch" for="username1"></label>-->
        <!--                            </td>-->
        <!--                            <td class="p-0 brd_none">-->
        <!--                                <table class="table table-bordered tst_cam_listst mb-0">-->
        <!--                                    <tr>-->
        <!--                                        <td class="fnt_size">201,B S Buildetch</td>-->
        <!--                                        <td class="fnt_size">Commercial - Retails (Droop Down)</td>-->
        <!--                                        <td class="fnt_size">Ramawtar Meena</td>-->
        <!--                                        <td class="fnt_size">Noida</td>-->
        <!--                                    </tr>-->
        <!--                                </table>-->
        <!--                            </td>-->
        <!--                            <td class="fnt_size">15-01-2024</td>-->
        <!--                            <td class="fnt_size tx_bluess">450000</td>-->
        <!--                            <td class="fnt_size">550000</td>-->

        <!--                            <td class="p-0 brd_none">-->
        <!--                                <table class="table table-bordered tst_cam_listst mb-0">-->
        <!--                                    <tr>-->
        <!--                                        <td class="fnt_size">300000</td>-->
        <!--                                        <td class="fnt_size">550000</td>-->
        <!--                                        <td class="fnt_size tx_bluess">450000</td>-->
        <!--                                    </tr>-->
        <!--                                </table>-->
        <!--                            </td>-->
        <!--                        </tr>-->


								 <tr>
                                    <td class="arow_rt_parts">&nbsp;</td>
                                    <td colspan="5" class="arow_rt_parts tx_read">Gross Total =</td>

                                    <td class="arow_rt_parts tx_read" id="gross_total">{{ $total_amount }}</td>
                                    <td class="arow_rt_parts tx_read">{{ $totalGrossCurrentMarketValue }}</td>



                                    <td class="p-0 brd_none">
                                        <table class="table table-bordered tst_cam_listst mb-0">
                                            <tr>
                                                <td class="arow_rt_parts tx_read" width="20.333%">{{ $totalGrossCurrentDebtBalance }}</td>
                                                <td class="arow_rt_parts tx_read" width="23.333%">{{ $totalGrossAccumulatedBalance }}</td>
                                                <td class="arow_rt_parts tx_read" width="23.333%">{{ $totalGrossAnnualCashFlow }}</td>
                                                <td class="arow_rt_parts tx_read" width="23.333%"></td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>

                            </table>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

	   <div class="tanksss">
	    <div class="ftr_thknsss">
	     <div class="lgo_partss"><img src="https://1crapp.allproject.online/home/img/logo 1.png" alt=""></div>
	     <p>Prepared using 1CRAPP.COM , Just with Few Click You Too Can Create it.. lt's Free! <a href="javascript:void(0);" class="ex_btn_areaa">Explore More <i class="fa fa-chevron-circle-right"></i></a></p>
	    </div>
	    </div>
	</div>
</section>
 <!-- Modal -->
<div class="modal fade" id="videotutorialmodal" role="dialog" aria-labelledby="videotutorialmodalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content all_frm_list">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="font-size: 30px;">
          <span aria-hidden="true">&times;</span>
        </button>
        <iframe width="100%" height="315" src="https://www.youtube.com/embed/mJVuZiK9a6I?si=tWOM4Nh4-zGMGVP1" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
    </div>
  </div>
 </div>
 <!-- Modal -->
<div class="modal fade" id="updateStatus" role="dialog" aria-labelledby="updateStatus" aria-hidden="true" style="op">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content all_frm_list">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <div class="frm_filedds">
		  <form action="{{ route('myproperty.status.update' )}}" id="" method="POST">
            @csrf
		      <input type="hidden" name="prop_id" id="property_market_id" value="{{ $property->id ?? '' }}">
              <input type="hidden" name="status" value="1">
                <div class="hd_res_listsss">
                    <h2>Update Property Status</h2>
                </div>
                <div class="all_frm_list p-0 mb-0">
				    <div class="row">
					 <div class="col-lg-12">
					  <div class="form-group managsss1">
                        <label>Sailing Price From </label>
                        <span class="currencyInputprefix">₹</span>
                        <input name="price_from" id="" class="currencyInput" type="text" placeholder="Amount" value="" required="" />
                      </div>
					 </div>
					  <div class="col-lg-12">
					  <div class="form-group managsss1">
                        <label>Sailing Price To </label>
                        <span class="currencyInputprefix">₹</span>
                        <input name="price_to" id="" class="currencyInput" type="text" placeholder="Amount" value="" required="" />
                      </div>
					 </div>

					 <div class="col-lg-12">
					  <div class="form-group managsss1">
                       <label>Remarks</label>
                       <input name="remarks" id="" type="text" placeholder="Enter here the Purpose for Making This payment or any Remarks" value="" />
                      </div>
					 </div>

					 <div class="col-lg-12 mt-4">
					        <div class="form-group managsss1 mb-0">
                                <div class="roll_lst">
                                    <div class="rit_raea">
                                        <div class="bntt_cn">
                                            <a href="javascript:void(0);" class="close" data-dismiss="modal" aria-label="Close" >Cancel</a>
                                            <button type="submit" class="actsss yellowe_bg tx_blak">Update</button>
                                            <!-- <button type="submit" class="actsss">Save & Exit</button> -->
                                        </div>
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
 </div>

<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>




		<script src='https://bernii.github.io/gauge.js/dist/gauge.min.js'></script>
		<script>
		 var opts = {
  angle: 0, // The span of the gauge arc
  lineWidth: 0.3, // The line thickness
  radiusScale: 0.9, // Relative radius
  pointer: {
    length: 0.42, // // Relative to gauge radius
    strokeWidth: 0.029, // The thickness
    color: '#000000' // Fill color
  },
  limitMax: true,     // If false, max value increases automatically if value > maxValue
  limitMin: true,     // If true, the min value of the gauge will be fixed
  colorStart: '#6F6EA0',   // Colors
  colorStop: '#C0C0DB',    // just experiment with them
  strokeColor: '#EEEEEE',  // to see which ones work best for you
  generateGradient: true,
  highDpiSupport: true,     // High resolution support
  // renderTicks is Optional
  // renderTicks: {
  //   divisions: 0,
  //   divWidth: 0.1,
  //   divLength: 0.41,
  //   divColor: '#333333',
  //   subDivisions: 0,
  //   subLength: 0.14,
  //   subWidth: 3.1,
  //   subColor: '#ffffff'
  // },
  staticZones: [
   {strokeStyle: "#F03E3E", min: 70, max: 80}, // Red from 70 to 80
   {strokeStyle: "#FFDD00", min: 80, max: 90}, // Yellow 80 to 90
   {strokeStyle: "#30B32D", min: 90, max: 100}, // Green 90 to 100
  ],
  staticLabels: {
  font: "10px sans-serif",  // Specifies font
  labels: [10, 80, 90, 100],  // Print labels at these values
  color: "#000000",  // Optional: Label text color
  fractionDigits: 0  // Optional: Numerical precision. 0=round off.
},

};
var target = document.getElementById('foo'); // your canvas element
var gauge = new Gauge(target).setOptions(opts); // create sexy gauge!
gauge.maxValue = 100; // set max gauge value
gauge.setMinValue(70);  // Prefer setter over gauge.minValue = 0
gauge.animationSpeed = 10; // set animation speed (32 is default value)
gauge.set(92); // set actual value
		</script>

<script>
 $('[name=tab]').each(function(i,d){
  var p = $(this).prop('checked');
//   console.log(p);
  if(p){
    $('article').eq(i)
      .addClass('on');
  }
});

$('[name=tab]').on('change', function(){
  var p = $(this).prop('checked');

  // $(type).index(this) == nth-of-type
  var i = $('[name=tab]').index(this);

  $('article').removeClass('on');
  $('article').eq(i).addClass('on');
});
</script>

<script>
 function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $('#imagePreview').css('background-image', 'url('+e.target.result +')');
            $('#imagePreview').hide();
            $('#imagePreview').fadeIn(650);
        }
        reader.readAsDataURL(input.files[0]);
    }
}
$("#imageUpload").change(function() {
    readURL(this);
});
</script>

<script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();
});
</script>




<script>
 var $el = $(".fitter");
var $ee = $(".show_data");
$el.click(function(e){
  e.stopPropagation();
  $(".show_data").toggleClass('active');
});
$(document).on('click',function(e){
  if(($(e.target) != $el) && ($ee.hasClass('active'))){
  $ee.removeClass('active');
  // console.log("yes");
}
});
</script>


<script>
function openstapone() {
  $('.pageform_t').hide();
  $('#stapone').show();
}

function openstapone1() {
 $('.pageform_t').hide();
 $('#stapone1').show();
}

function opensprossnav() {
 $('.pageform_t').hide();
  $('#stapone1').show();
 $('#pross_nevs').show();
}

function openstapone2() {
 $('.pageform_t').hide();
 $('#stapone2').show();
}

function openstapone3() {
 $('.pageform_t').hide();
 $('#stapone3').show();
}

</script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    var checkboxes = document.querySelectorAll('input[type="checkbox"][id^="property_status_"]');

    checkboxes.forEach(function(checkbox) {
        checkbox.addEventListener('change', function() {
            var propertyId = checkbox.getAttribute('data-tab');
            console.log("✅ Property ID:", propertyId);

            var marketInput = document.getElementById('property_market_id');
            if (marketInput) {
                marketInput.value = propertyId;
            }

            if (checkbox.checked) {
                // ✅ Disable the checkbox permanently
                checkbox.disabled = true;

                // Show modal
                var modalElement = document.getElementById('updateStatus');
                if (modalElement) {
                    console.log("✅ Modal found, opening...");
                    var modal = new bootstrap.Modal(modalElement);
                    modal.show();
                } else {
                    console.log("❌ Modal with id 'updateStatus' not found!");
                }
            } else {
                alert('Property status is now inactive!');
            }
        });
    });

    // ✅ Optional: Disable already-checked checkboxes on page load
    checkboxes.forEach(function(checkbox) {
        if (checkbox.checked) {
            checkbox.disabled = true;
        }
    });
});

document.addEventListener('DOMContentLoaded', function() {
    var total = document.getElementById('gross_total').innerHTML;
    document.getElementById('main_gross_total').innerHTML = total;
});

document.addEventListener('DOMContentLoaded', function() {
    var closeButtons = document.querySelectorAll('.close');

    closeButtons.forEach(function(button) {
        button.addEventListener('click', function() {
            var modalElement = this.closest('#updateStatus');
            if (modalElement) {
                var modalInstance = bootstrap.Modal.getInstance(modalElement);
                if (!modalInstance) {
                    modalInstance = new bootstrap.Modal(modalElement);
                }
                modalInstance.hide();
            }
        });
    });
});
</script>




@include('front.layouts.footer')


