 

@include('front.layouts.header')



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

<!-- Modal -->
<div class="modal fade" id="purchase_criteria" role="dialog">
    <div class="modal-dialog modal-lg" id="cent_screenss">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Purchase Criteria</h4>
            </div>
            <div class="modal-body" id="modelData">

            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="property_delete_modal" role="dialog">
    <div class="modal-dialog ">
        <div class="modal-content" uib-modal-transclude="">
            <form action="{{ url('delete-property') }}" method="POST">
                @csrf
            <div class="modal-header" style="text-align: center;background: #d9534f;"><i class="fa fa-info-circle" ng-class="(type === 'alertSuccess' || type === 'confirmSuccess') ? 'fa-check-circle' : 'fa-info-circle'" style=" color: #fff;font-size: 32px;"></i>
                <div class="modal-title" style="color: #fff;">Delete this property?</div>
            </div>
            <div class="modal-body"></div>
            <div class="modal-footer"><!---->
                <button type="button" class="btn btn-sm margin-h-10 btn-fixed-width-sm btn-default" data-dismiss="modal" aria-label="Close">Cancel</button>

                 <input type="hidden" name="prop_deleteid" id="prop_deleteid">
                 <button type="submit" class="btn btn-sm margin-h-10 btn-fixed-width-sm btn-danger deleteProperty" >Delete</button></div>
        </form> 
    </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="property_archive_modal" role="dialog">
    <div class="modal-dialog ">
        <div class="modal-content" uib-modal-transclude="">
            <form action="{{ url('archiveProperty') }}" method="POST">
                @csrf
            <div class="modal-header" style="text-align: center;background: #1c5198;"><i class="fa fa-info-circle"  style=" color: #fff;font-size: 32px;"></i>
                <div class="modal-title" style="color: #fff;">Archive this property?
                    <h5>Archived properties are hidden and can be viewed by enabling the Show Archived option from the property list.</h5>
                </div>
            </div>
            <div class="modal-body"></div>
            <div class="modal-footer"><!---->
                <button type="button" class="btn btn-sm margin-h-10 btn-fixed-width-sm btn-default" data-dismiss="modal" aria-label="Close">Cancel</button>

                 <input type="hidden" name="prop_id" id="prop_archiveid">
                 <input type="hidden" name="status" value="1">
                 <button type="submit" class="btn btn-sm margin-h-10 btn-fixed-width-sm btn-dangerss deleteProperty" style="background: #1c5198;color: #fff;">Archive</button></div>
                  </form> 
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="property_restore_modal" role="dialog">
    <div class="modal-dialog ">
        <div class="modal-content" uib-modal-transclude="">
            <form action="{{ url('archiveProperty') }}" method="POST">
                @csrf
            <div class="modal-header" style="text-align: center;background: #1c5198;"><i class="fa fa-info-circle"  style=" color: #fff;font-size: 32px;"></i>
                <div class="modal-title" style="color: #fff;">Restore this property from archive?
                <h5>This will restore this property from archive and show it in the property list.</h5></div>
            </div>
            <div class="modal-body"></div>
            <div class="modal-footer"><!---->
                <button type="button" class="btn btn-sm margin-h-10 btn-fixed-width-sm btn-default" data-dismiss="modal" aria-label="Close">Cancel</button>

                 <input type="hidden" name="prop_id" id="prop_restoreid">
                 <input type="hidden" name="status" value="0">
                 <button type="submit" class="btn btn-sm margin-h-10 btn-fixed-width-sm btn-dangerss deleteProperty" style="background: #1c5198;color: #fff;">Restore</button></div>
                  </form> 
        </div>
    </div>
</div>

    <!--PEN HEADER-->
    <div class="container mt-5">
       

        <div class="row mt-4">
             @include('front.layouts.detail-sidebar')
            <!--start full details -->
            <div class="col-12 col-sm-9 property_desc als_show_ar">
                <div class="lsting_proprty">
                            <h3>Property Analysis</h3>
                             
                            </p>
                        </div>

<div class="analysis-subtitle">This page shows the purchase breakdown, cash flow and investment returns for this property.</div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-xs-6">
                                        <div class="panel panel-default">
                                            <div class="panel-body padding-h-20 padding-v-15">
                                                <div class="text-uppercase font-size-12 gray property-quick-stats-label">Cash Needed</div>
                                                <div class="blue property-quick-stats-value">
                                                    <span class="bold">$ 29,300</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xs-6">
                                        <div class="panel panel-default">
                                            <div class="panel-body padding-h-20 padding-v-15">
                                                <div class="text-uppercase font-size-12 gray property-quick-stats-label">
                                                    <!----><span  >Cash Flow</span><!----> 
                                                    <!---->
                                                </div>
                                                <div class="property-quick-stats-value">
                                                    <!----><span  class="blue">
                                                        <span class="bold">$ 211/mo</span> 
                                                    </span><!---->
                                                    <!---->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-xs-6">
                                        <div class="panel panel-default">
                                            <div class="panel-body padding-h-20 padding-v-15">
                                                <div class="text-uppercase font-size-12 gray property-quick-stats-label">
                                                    <!----><span>Cap Rate</span><!----> 
                                                    <!----></div><div class="property-quick-stats-value"><!---->
                                                        <span class="blue">
                                                            <span class="bold">7.2%</span> 
                                                        </span><!---->
                                                        <!---->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xs-6">
                                            <div class="panel panel-default">
                                                <div class="panel-body padding-h-20 padding-v-15">
                                                    <div class="text-uppercase font-size-12 gray property-quick-stats-label"><!---->
                                                        <span >COC</span><!----> <!---->
                                                    </div>
                                                    <div class="property-quick-stats-value"><!---->
                                                        <span class="blue">
                                                            <span class="bold">8.6%</span> 
                                                        </span><!----><!---->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                <div class="proprt_box_sec bothss full_areaa" style="margin-top: 10px;">
                    <h3>Purchase</h3>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="dibydss_cntss filttere">
                                 <div class="table-responsive11">
                                  <div class="lists_tablssts">
                                   <div class="mn_ulderss">                                 
                                    <div class="unddrlstt">
                                     
                                     <h6>
                                       <!-- Tolltip -->
                                       <div class="con-tooltip top">
                                        <p class="icoo"> <i class="fa fa-question" ></i> </p>
                                        <div class="tooltip ">
                                         <h5>Purchase Price</h5>
                                         <p>The amount you're paying to purchase a property.</p>
                                        </div>
                                      </div>
                                      <!-- End Tolltip -->                                    
                                     <span class="cnt_aressss"><div class="managess_cnts">Basic Purchase Price</div></span>   <span class="price_lststs">₹ 3,060,000</span></h6>
                                    </div>
                                   </div>   
                                    
                                   <div class="mn_ulderss duboolss">
                                    <div class="unddrlstt">
                                     <h6>
                                     <!-- Tolltip -->
                                       <div class="con-tooltip top">
                                        <p class="icoo"> <i class="fa fa-question" ></i> </p>
                                        <div class="tooltip ">
                                         <h5>Purchase Price</h5>
                                         <p>The amount you're paying to purchase a property.</p>
                                        </div>
                                      </div>
                                      <!-- End Tolltip -->
                                     <span class="cnt_aressss"><div class="managess_cnts">Amount financed</div> <span class="mnss_fldss">-</span></span>  <span class="price_lststs">₹ 2,448,000</span> </h6>
                                    </div>
                                   </div>
                                   
                                   <div class="mn_ulderss">
                                    <div class="unddrlstt">
                                     <h6 class="bluuuue">
                                     <!-- Tolltip -->
                                       <div class="con-tooltip top">
                                        <p class="icoo"> <i class="fa fa-question" ></i> </p>
                                        <div class="tooltip ">
                                         <h5>Purchase Price</h5>
                                         <p>The amount you're paying to purchase a property.</p>
                                        </div>
                                      </div>
                                      <!-- End Tolltip -->
                                     <span class="cnt_aressss"><div class="managess_cnts">Down Payment </div> <span class="mnss_fldss">=</span></span><span class="price_lststs">₹ 612,000</span> </h6>
                                    </div>
                                   </div>
                                   
                                   
                                   
                                   
                                    
                                   <div class="mn_ulderss acr_liststst">
                                        <div class="accordion" id="accordionExample">
                                            <div class="accordion-item">
                                                <div class="unddrlstt accordion-header" id="headingOne">
                                                    <h6 class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                    
                                                    <!-- Tolltip -->
                                       <div class="con-tooltip top">
                                        <p class="icoo"> <i class="fa fa-question" ></i> </p>
                                        <div class="tooltip ">
                                         <h5>Purchase Price</h5>
                                         <p>The amount you're paying to purchase a property.</p>
                                        </div>
                                      </div>
                                      <!-- End Tolltip -->
                                                        <span class="cnt_aressss"><div class="managess_cnts">Services & Misclanious Cost - ( S & M Cost )</div> <i class="fa fa-angle-down"></i>   <span class="mnss_fldss plsh">+</span></span> <span class="price_lststs">₹ 330,840</span> 
                                                    </h6>

                                                    <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                                        <div class="accordion-body">
                                                            <div class="mn_ulderss">
                                                                <div class="unddrlstt">
                                                                    <h6>Services1 <span class="price_lststs">₹ 330,840</span></h6>
                                                                </div>
                                                            </div>

                                                            <div class="mn_ulderss">
                                                                <div class="unddrlstt">
                                                                    <h6>Services2 <span class="price_lststs">₹ 330,840</span></h6>
                                                                </div>
                                                            </div>

                                                            <div class="mn_ulderss">
                                                                <div class="unddrlstt">
                                                                    <h6>Services3 <span class="price_lststs">₹ 330,840</span></h6>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="accordion-item">
                                                <div class="unddrlstt accordion-header" id="headingOne">
                                                    <h6 class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne1" aria-expanded="true" aria-controls="collapseOne1">
                                                    
                                                    <!-- Tolltip -->
                                       <div class="con-tooltip top">
                                        <p class="icoo"> <i class="fa fa-question" ></i> </p>
                                        <div class="tooltip ">
                                         <h5>Purchase Price</h5>
                                         <p>The amount you're paying to purchase a property.</p>
                                        </div>
                                      </div>
                                      <!-- End Tolltip -->
                                                    <span class="cnt_aressss"><div class="managess_cnts">Pre EMI Costs  <i class="fa fa-angle-down"></i></div>  <span class="mnss_fldss plsh">+</span></span> <span class="price_lststs">₹ 176,437</span> 
                                                    </h6>

                                                    <div id="collapseOne1" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                                        <div class="accordion-body">
                                                            <div class="mn_ulderss">
                                                                <div class="unddrlstt">
                                                                    <h6>Pre EMI Costs1 <span class="price_lststs">₹ 330,840</span></h6>
                                                                </div>
                                                            </div>

                                                            <div class="mn_ulderss">
                                                                <div class="unddrlstt">
                                                                    <h6>Pre EMI Costs2 <span class="price_lststs">₹ 330,840</span></h6>
                                                                </div>
                                                            </div>

                                                            <div class="mn_ulderss">
                                                                <div class="unddrlstt">
                                                                    <h6>Pre EMI Costs3 <span class="price_lststs">₹ 330,840</span></h6>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="accordion-item">
                                                <div class="unddrlstt accordion-header" id="headingOne">
                                                    <h6 class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne2" aria-expanded="true" aria-controls="collapseOne2">
                                                    <!-- Tolltip -->
                                       <div class="con-tooltip top">
                                        <p class="icoo"> <i class="fa fa-question" ></i> </p>
                                        <div class="tooltip ">
                                         <h5>Purchase Price</h5>
                                         <p>The amount you're paying to purchase a property.</p>
                                        </div>
                                      </div>
                                      <!-- End Tolltip -->
                                                    <span class="cnt_aressss"><div class="managess_cnts">Extra Charges - EC    <i class="fa fa-angle-down"></i></div>  <span class="mnss_fldss plsh">+</span></span> <span class="price_lststs">&nbsp;</span> 
                                                    </h6>

                                                    <div id="collapseOne2" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                                        <div class="accordion-body">
                                                            <div class="mn_ulderss">
                                                                <div class="unddrlstt">
                                                                    <h6>Extra Charges1 <span class="price_lststs">₹ 330,840</span></h6>
                                                                </div>
                                                            </div>

                                                            <div class="mn_ulderss">
                                                                <div class="unddrlstt">
                                                                    <h6>Extra Charges2 <span class="price_lststs">₹ 330,840</span></h6>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="accordion-item">
                                                <div class="unddrlstt accordion-header" id="headingOne">
                                                    <h6 class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne3" aria-expanded="true" aria-controls="collapseOne3">
                                                    <!-- Tolltip -->
                                       <div class="con-tooltip top">
                                        <p class="icoo"> <i class="fa fa-question" ></i> </p>
                                        <div class="tooltip ">
                                         <h5>Purchase Price</h5>
                                         <p>The amount you're paying to purchase a property.</p>
                                        </div>
                                      </div>
                                      <!-- End Tolltip -->
                                                    <span class="cnt_aressss"><div class="managess_cnts">Improvement Cost -IC   <i class="fa fa-angle-down"></i></div> <span class="mnss_fldss plsh">+</span></span> <span class="price_lststs">&nbsp;</span> 
                                                    </h6>

                                                    <div id="collapseOne3" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                                        <div class="accordion-body">
                                                            <div class="mn_ulderss">
                                                                <div class="unddrlstt">
                                                                    <h6>Improvement1 <span class="price_lststs">₹ 330,840</span></h6>
                                                                </div>
                                                            </div>

                                                            <div class="mn_ulderss">
                                                                <div class="unddrlstt">
                                                                    <h6>Improvement2 <span class="price_lststs">₹ 330,840</span></h6>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="accordion-item">
                                                <div class="unddrlstt accordion-header" id="headingOne">
                                                    <h6 class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne4" aria-expanded="true" aria-controls="collapseOne4">
                                                    <!-- Tolltip -->
                                       <div class="con-tooltip top">
                                        <p class="icoo"> <i class="fa fa-question" ></i> </p>
                                        <div class="tooltip ">
                                         <h5>Purchase Price</h5>
                                         <p>The amount you're paying to purchase a property.</p>
                                        </div>
                                      </div>
                                      <!-- End Tolltip -->
                                                    
                                                    <span class="cnt_aressss">
                                                    <div class="managess_cnts">Holding Cost For XXX Months  <i class="fa fa-angle-down"></i> </div> <span class="mnss_fldss plsh">+</span></span> <span class="price_lststs">₹ 164,867 </span> 
                                                    </h6>

                                                    <div id="collapseOne4" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                                        <div class="accordion-body">
                                                            <div class="mn_ulderss">
                                                                <div class="unddrlstt">
                                                                    <h6>Holding1 <span class="price_lststs">₹ 330,840</span></h6>
                                                                </div>
                                                            </div>

                                                            <div class="mn_ulderss">
                                                                <div class="unddrlstt">
                                                                    <h6>Holding2 <span class="price_lststs">₹ 330,840</span></h6>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="accordion-item">
                                                <div class="unddrlstt accordion-header" id="headingOne">
                                                    <h6 class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne5" aria-expanded="true" aria-controls="collapseOne5">
                                                    <!-- Tolltip -->
                                       <div class="con-tooltip top">
                                        <p class="icoo"> <i class="fa fa-question" ></i> </p>
                                        <div class="tooltip ">
                                         <h5>Purchase Price</h5>
                                         <p>The amount you're paying to purchase a property.</p>
                                        </div>
                                      </div>
                                      <!-- End Tolltip -->
                                                    
                                                    <span class="cnt_aressss"><div class="managess_cnts"> Other Charges(if any)  <i class="fa fa-angle-down"></i> </div> <span class="mnss_fldss plsh">+</span></span>
                                                    <span class="price_lststs">₹ 1000000 </span> 
                                                    </h6>

                                                    <div id="collapseOne5" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                                        <div class="accordion-body">
                                                            <div class="mn_ulderss">
                                                                <div class="unddrlstt">
                                                                    <h6>Other1 <span class="price_lststs">₹ 330,840</span></h6>
                                                                </div>
                                                            </div>

                                                            <div class="mn_ulderss">
                                                                <div class="unddrlstt">
                                                                    <h6>Other2 <span class="price_lststs">₹ 330,840</span></h6>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    

                                    
                                   
                                   
                                   <div class="mn_ulderss duboolss_top">    
                                    <div class="unddrlstt">
                                     <h6>Total cast needed   <span class="price_lststs">₹ 2,634,144</span></h6>
                                    </div>
                                   </div>
                                  </div> 
                                
                               </div>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="dibydss_cntss puchsssse">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div id="piechart"><div style="position: relative;"><div dir="ltr" style="position: relative; width: 255px; height: 280px;"><div aria-label="A chart." style="position: absolute; left: 0px; top: 0px; width: 100%; height: 100%;"><svg width="255" height="280" aria-label="A chart." style="overflow: hidden;"><defs id="_ABSTRACT_RENDERER_ID_0"></defs><rect x="0" y="0" width="255" height="280" stroke="none" stroke-width="0" fill="#ffffff"></rect><g><rect x="185" y="50" width="10" height="74" stroke="none" stroke-width="0" fill-opacity="0" fill="#ffffff"></rect><g><rect x="185" y="50" width="10" height="10" stroke="none" stroke-width="0" fill-opacity="0" fill="#ffffff"></rect><circle cx="190" cy="55" r="5" stroke="none" stroke-width="0" fill="#ff3169"></circle></g><g><rect x="185" y="66" width="10" height="10" stroke="none" stroke-width="0" fill-opacity="0" fill="#ffffff"></rect><circle cx="190" cy="71" r="5" stroke="none" stroke-width="0" fill="#00b4b0"></circle></g><g><rect x="185" y="82" width="10" height="10" stroke="none" stroke-width="0" fill-opacity="0" fill="#ffffff"></rect><circle cx="190" cy="87" r="5" stroke="none" stroke-width="0" fill="#ffa523"></circle></g><g><rect x="185" y="98" width="10" height="10" stroke="none" stroke-width="0" fill-opacity="0" fill="#ffffff"></rect><circle cx="190" cy="103" r="5" stroke="none" stroke-width="0" fill="#9f49a3"></circle></g><g><rect x="185" y="114" width="10" height="10" stroke="none" stroke-width="0" fill-opacity="0" fill="#ffffff"></rect><circle cx="190" cy="119" r="5" stroke="none" stroke-width="0" fill="#00a0cf"></circle></g></g><g><path d="M111.10448819275616,156.80668919319308L111.10448819275616,87.80668919319308A69,69,0,0,1,177.033852767951,177.1615138475851L111.10448819275616,156.80668919319308A0,0,0,0,0,111.10448819275616,156.80668919319308" stroke="#ffffff" stroke-width="1" fill="#ff3169"></path><text text-anchor="start" x="133.00087944074713" y="133.82097591832175" font-family="Arial" font-size="10" stroke="none" stroke-width="0" fill="#ffffff">29.8%</text></g><g><path d="M100,165L32.156208592187085,152.4214481193911A69,69,0,0,1,100,96L100,165A0,0,0,0,0,100,165" stroke="#ffffff" stroke-width="1" fill="#00a0cf"></path><text text-anchor="start" x="56.76812216890022" y="133.35022118122114" font-family="Arial" font-size="10" stroke="none" stroke-width="0" fill="#ffffff">22.1%</text></g><g><path d="M100,165L40.070060727748306,199.19652582974217A69,69,0,0,1,32.156208592187085,152.4214481193911L100,165A0,0,0,0,0,100,165" stroke="#ffffff" stroke-width="1" fill="#9f49a3"></path><text text-anchor="start" x="42.315812817796264" y="175.89090590427037" font-family="Arial" font-size="10" stroke="none" stroke-width="0" fill="#ffffff">11.2%</text></g><g><path d="M100,165L96.7470334838776,233.9232776995188A69,69,0,0,1,40.070060727748306,199.19652582974217L100,165A0,0,0,0,0,100,165" stroke="#ffffff" stroke-width="1" fill="#ffa523"></path><text text-anchor="start" x="64.28789994430228" y="210.46430463247418" font-family="Arial" font-size="10" stroke="none" stroke-width="0" fill="#ffffff">16%</text></g><g><path d="M100,165L165.92936457519482,185.35482465439202A69,69,0,0,1,96.7470334838776,233.9232776995188L100,165A0,0,0,0,0,100,165" stroke="#ffffff" stroke-width="1" fill="#00b4b0"></path><text text-anchor="start" x="118.10981603746154" y="208.54044761756745" font-family="Arial" font-size="10" stroke="none" stroke-width="0" fill="#ffffff">21%</text></g><g></g></svg><div aria-label="A tabular representation of the data in the chart." style="position: absolute; left: -10000px; top: auto; width: 1px; height: 1px; overflow: hidden;"><table><thead><tr><th>Crash Type</th><th>2014</th></tr></thead><tbody><tr><td></td><td>1,844</td></tr><tr><td></td><td>1,300</td></tr><tr><td></td><td>991</td></tr><tr><td></td><td>692</td></tr><tr><td></td><td>1,368</td></tr></tbody></table></div></div></div><div aria-hidden="true" style="display: none; position: absolute; top: 290px; left: 265px; white-space: nowrap; font-family: Arial; font-size: 10px;">22.1%</div><div></div></div></div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div id="para_gr">
                                            <div class="un_listststs">
                                                <ul>
                                                    <li>
                                                        PRE HOLDING COST - PHC <a href="javascript:void(0);"><i class="fa fa-pencil"></i></a>
                                                    </li>
                                                    <li>
                                                        EXTRA COST - EC <a href="javascript:void(0);"><i class="fa fa-pencil"></i></a>
                                                    </li>
                                                    <li>
                                                        SERVICES &amp; MISCLANIOUS COST - SMC <a href="javascript:void(0);"><i class="fa fa-pencil"></i></a>
                                                    </li>
                                                    <li>
                                                        IMPRVEMENT COST - IC <a href="javascript:void(0);"><i class="fa fa-pencil"></i></a>
                                                    </li>
                                                    <li>
                                                        HOLDING COST- HC <a href="javascript:void(0);"><i class="fa fa-pencil"></i></a>
                                                    </li>
                                                    <li>
                                                        OTHER CHARGES - OC <a href="javascript:void(0);"><i class="fa fa-pencil"></i></a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    @include('front.layouts.footer')

    @include('front.layouts.footer_new')
    <script>
        function deleteProperty(id){
            $('#prop_deleteid').val(id);
            $('#property_delete_modal').modal('show');
        }

        function archiveProperty(id){
            $('#prop_archiveid').val(id);
            $('#property_archive_modal').modal('show');
        }

        function restoreProperty(id){
            $('#prop_restoreid').val(id);
            $('#property_restore_modal').modal('show');
        }
        

    @if(Session::has('success'))
    function load(){
        $('#successModal').modal('show');
    }
    window.onload = load;
    @endif

 

    </script>



<style>
    #successModal .modal-lg {
      width: auto;
      max-width: fit-content;
    }

    button.btn.btn-clear.list-controls-btn-compact.blue {
    background: #0e3992;
    width: 100%;
    color: #fff;
}
button.btn.btn-clear.list-controls-btn-compact {
    background: #cccccc;
    width: 100%;
    color: #fff;
}

button.btn.btn-clear.list-controls-btn-compact:focus {
    outline: 0px auto-webkit-focus-ring-color !important;
}

.btn_sltss .ex_prt {
    background: #0e3992;
    width: 100%;
    padding: 4px 30px;
    color: #fff;
    font-size: 16px;
    border-radius: 3px;
    border: 0;
}
.proprt_box_sec h3 {
    background: #1c539a;
    text-align: center;
    padding: 2px 0;
    margin: 0;
    color: #fff;
    font-size: 20px;
}
.blue.property-quick-stats-value {
    font-size: 14px;
}
.text-uppercase.font-size-12.gray.property-quick-stats-label {
    font-size: 14px;
    color: #1c539a;
    font-weight: bold;
}
.als_show_ar .lists_tablssts .unddrlstt h6 p.icoo i {
    font-size: 13px;
    position: relative;
    top: -9px;
    line-height: 15px;
}
.analysis-subtitle {
    font-size: 14px;
    color: #5e5151;
    margin-bottom: 40px;
}
</style>