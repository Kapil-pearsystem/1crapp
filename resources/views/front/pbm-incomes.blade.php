<tr>
    <td width="12%">(1)</td>
    <td width="88%" colspan="4" class="tx_right p-0">
        <div class="proprt_box_sec bothss full_areaa bh_bs_shteets" id="suport_al_areaa">
        <div class="dibydss_cntss filttere" id="two_boths_prtss">
            <div class="table-responsive11" id="both_ar_parts">
                <div class="lists_tablssts purrssch">
                    <!----- Sub Holding Cost ---->
                    <div class="mn_ulderss acr_liststst">
                        <div class="accordion" id="accordionExample">
                            <div class="accordion-item">
                                <div class="unddrlstt accordion-header" id="headingOne">
                                    <h6>
                                        <span class="cnt_aressss">
                                            <span class="managess_cnts">Active Earning </span>
                                            <i class="fa fa-angle-down accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOnestp1" aria-expanded="true" aria-controls="collapseOnestp1"></i>
                                        </span>
                                        <span class="price_lststs">1Rs. {{ $active_sum }}/- </span>
                                        
                                    </h6>

                                    <div id="collapseOnestp1" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            @foreach($active_incomes as $act_inc)
                                            <div class="mn_ulderss">
                                                <div class="unddrlstt">
                                                    <h6>
                                                        <span class="manag_space_areaa">{{ $act_inc->income_source }}</span> <span class="price_lststs">₹{{ $act_inc->amount }}
                                                            <span style="float:right;"><a href="javascript:void(0);" onclick="editIncome('{{ $act_inc->id }}')"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a> &nbsp; <a href="javascript:void(0);" onclick="deleteIncome('{{ $act_inc->id }}')"  class="text-end"><i class="fa fa-trash"></i></a></span>
                                                        </span>
                                                    </h6>
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!----- End Sub Holding Cost ---->
                </div>
            </div>
        </div>
        </div>									 
    </td> 								
</tr>

<tr>
    <td width="12%">(2)</td>
    <td width="88%" colspan="4" class="tx_right p-0">
        <div class="proprt_box_sec bothss full_areaa bh_bs_shteets" id="suport_al_areaa">
        <div class="dibydss_cntss filttere" id="two_boths_prtss">
            <div class="table-responsive11" id="both_ar_parts">
                <div class="lists_tablssts purrssch">
                    <!----- Sub Holding Cost ---->
                    <div class="mn_ulderss acr_liststst">
                        <div class="accordion" id="accordionExample1">
                            <div class="accordion-item">
                                <div class="unddrlstt accordion-header" id="headingOne">
                                    <h6>
                                        <span class="cnt_aressss">
                                            <span class="managess_cnts">Passive Earning </span>
                                            <i class="fa fa-angle-down accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOnestp2" aria-expanded="true" aria-controls="collapseOnestp2"></i>
                                        </span>
                                        <span class="price_lststs">Rs. {{ $passive_sum }}/-</span>
                                    </h6>

                                    <div id="collapseOnestp2" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample1">
                                        <div class="accordion-body">
                                             @foreach($passive_incomes as $psv_inc)
                                            <div class="mn_ulderss">
                                                <div class="unddrlstt">
                                                    <h6>
                                                        <span class="manag_space_areaa">{{ $psv_inc->income_source }}</span> <span class="price_lststs">₹{{ $psv_inc->amount }}
                                                            <span style="float:right;"><a href="javascript:void(0);" onclick="editIncome('{{ $psv_inc->id }}')"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a> &nbsp; <a href="javascript:void(0);" onclick="deleteIncome('{{ $psv_inc->id }}')"  class="text-end"><i class="fa fa-trash"></i></a></span>
                                                        </span>
                                                    </h6>
                                                    <!-- <h6><span class="manag_space_areaa">{{ $psv_inc->income_source }}</span> <span class="price_lststs">₹{{ $psv_inc->amount }}</span></h6> -->
                                                </div>
                                            </div>
                                            @endforeach
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!----- End Sub Holding Cost ---->
                </div>
            </div>
        </div>
        </div>
    </td>                               
</tr>

<tr>
    <td colspan="6" class="p-0 brd_none">
        <table class="table table-bordered tst_cam_listst mb-0 brd_none">
            <tr>
                <td colspan="4" class="tx_right" width="53.2%"><b>Gross Monthly Earing (GME)</b></td>
                <td width="14.9%">₹{{ $total_income }}</td>   								
            </tr>
        </table>
    </td>
</tr>