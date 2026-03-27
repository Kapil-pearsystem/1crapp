@include('front.layouts.user-header')
 <section class="tital_mg_cntss">
 <img src="{{ url('home/img/top_al_pgss.png')}}" class="bg_al_cntxt" alt="" />
  
  <div class="midils_contnts">
   <div class="medilss"><h4>Personal Financial Freedom Journey ( PFFJ )</h4>
    <a href="{{ url('') }}">Portfolio</a> &gt; <span>Personal Financial Freedom Journey ( PFFJ )</span>
   </div>
  </div>
</section>  


<style>
#bord_0 {border: none !important;}
#bord_t_p {border-top: none !important; border-bottom: none !important;}
#per_fin_fre_jou .tab-content {margin-top: 30px; position:relative;}
#per_fin_fre_jou .tab-content tr td {font-size: 13px;}
#per_fin_fre_jou .tx_sms {font-size: 12px !important;}
#per_fin_fre_jou .tx_sms1 {font-size: 12px !important; text-wrap-mode: nowrap;}
.bg_tetx_red{text-align: center;  background: #f94554;  color: #fff;}
.bg_tetx_blue{text-align: center;  background:#1c5299;  color: #fff;}
.tetx_red{text-align: center;  background: #f94554;  color: #fff;}
.tetx_blue{text-align: center;  background: #1c5299;  color: #fff;}
.yellow_bg{background:#ffff00 !important;}
.greas_bg{background:#d9d9d9 !important;}
.greanns_bg{background:#38c514 !important; color:#fff;}
.black_bg{background:#000 !important; color:#fff;}
#sm_tet_tx{text-align:center;}
.propfixsd.new_propertyy.hollss .table-fixed-labels:first-child {
    width: 20%;
    overflow: visible;
}
.propfixsd.new_propertyy.hollss .table-fixed-labels:last-child {
    width: 80%;
    float: right;
}

#per_fin_fre_jou .tab-content a#dwn_loadss {
    position: absolute;
    right: 0px;
    padding: 3px 10px;
    top: -60px;
    border: #1c5299 solid 1px;
    border-radius: 4px;
    background: #1c5299;
    color: #fff;
    font-weight: 700;
}

.btm_list_areaaas {
    display: inline-block;
    width: 100%;
    margin: 5px 0 10px;
}
.btm_list_areaaas ul {
    display: table;
    margin: 0 auto;
}
.btm_list_areaaas ul li {
    font-weight: 700;
    color: #4a4a4a;
    position: relative;
    padding:5px 15px 5px 20px;
    border: #ccc solid 1px;
    border-radius: 3px;
}
.btm_list_areaaas ul li:before {
    width: 8px;
    height: 8px;
    background: #1c5299;
    content: '';
    position: absolute;
    border-radius: 100px;
    top: 11px;
    left: 7px;
}


@supports (position: sticky) {
  .sticky_und {
    position: sticky;
    top: 120px;
	z-index: 9;
  }
}





</style>

<!-- Tab Section -->
<section class="dash_board_pages" id="per_fin_fre_jou">
    <div class="container">
        <div class="als_pg_bntss">
            <div class="tab-wrapper">
                <ul class="tabs">
                    <li class="tab-link active" data-tab="snap">SNAP OF FFJ OPTIONS</li>
                    <li class="tab-link" data-tab="reluctant">RELUCTANT APPROACH</li>
                    <li class="tab-link" data-tab="mild">MILD APPROACH</li>
                    <li class="tab-link" data-tab="agressive">AGRESSIVE APPROACH</li>
                </ul>
            </div>

            <div class="content-wrapper">
                 <div id="tab-snap" class="tab-content active">
				   <!--- Download --->
				    <a href="javascript:void(0);" id="dwn_loadss">Download <i class="fa fa-download"></i></a>
				   <!--- Download --->
				   
				   <div class="propfixsd new_propertyy hollss p-0 sticky_und">
					<div class="table-responsive table-fixed-labels properties-comparison-table">
						<table class="table table-nowrap table-no-borders table-align-right table-condensed als_show_ar">
							<tbody>
								<tr>
									<td class="text-right p-2 tx_sms1 yellow_bg">Years</td> 
								</tr>
								<tr>
									<td class="text-right p-2 tx_sms1 yellow_bg">&nbsp;</td>
								</tr>
							</tbody>

							<tbody>
								<tr>
									<td class="text-left p-2 tx_sms1">Market Value Of The Portfolio</td>
								</tr>
								<tr>
									<td class="text-left p-2 tx_sms1">Total Networth (Equity)</td>
								</tr>
								<tr>
									<td class="text-left p-2 tx_sms1 blue">Accumulated Down Payment</td>
								</tr>
								<tr>
									<td class="text-left p-2 tx_sms1">Annual Cash Flow (ACF)</td>
								</tr>
								<tr>
									<td class="text-left p-2 tx_sms1">Accumulated Cash Flow (ACCU.CF)</td>
								</tr>
								<tr>
									<td class="text-left p-2 tx_sms1 redss">Total Profit on Sale:</td>
								</tr>
								<tr>
									<td class="text-left p-2 tx_sms1 blue">Return on Investment(%)</td>
								</tr>
								<tr>
									<td class="text-left p-2 tx_sms1">Total ROI</td>
								</tr>
							</tbody>
						</table>
					</div>

					<div class="table-responsive table-fixed-labels properties-comparison-table secendss">
						<table class="table table-nowrap table-no-borders table-align-right table-condensed mb-0 als_show_ar">
							<tbody>
								<tr>
									<td class="p-2 tx_sms1 bg_tetx_red">YEAR-1</td>
									<td class="p-2 tx_sms1 bg_tetx_blue">YEAR-2</td>
									<td class="p-2 tx_sms1 bg_tetx_red">YEAR-3</td>
									<td class="p-2 tx_sms1 bg_tetx_blue">YEAR-4</td>
									<td class="p-2 tx_sms1 bg_tetx_red">YEAR-5</td>
								</tr>
								<tr>
									<td class="p-0 bg_tetx_red" id="bord_0">
										<table width="100%">
											<tbody>
												<tr>
													<td class="p-2 tx_sms1 tetx_red">Reluctant</td>
													<td class="p-2 tx_sms1 tetx_red">Mild</td>
													<td class="p-2 tx_sms1 tetx_red">Aggresive</td>
												</tr>
											</tbody>
										</table>
									</td>

									<td class="p-0" id="bord_0">
										<table width="100%">
											<tbody>
												<tr>
													<td class="p-2 tx_sms1 tetx_blue">Reluctant</td>
													<td class="p-2 tx_sms1 tetx_blue">Mild</td>
													<td class="p-2 tx_sms1 tetx_blue">Aggresive</td>
												</tr>
											</tbody>
										</table>
									</td>

									<td class="p-0 bg_tetx_red" id="bord_0">
										<table width="100%">
											<tbody>
												<tr>
													<td class="p-2 tx_sms1 tetx_red">Reluctant</td>
													<td class="p-2 tx_sms1 tetx_red">Mild</td>
													<td class="p-2 tx_sms1 tetx_red">Aggresive</td>
												</tr>
											</tbody>
										</table>
									</td>

									<td class="p-0" id="bord_0">
										<table width="100%">
											<tbody>
												<tr>
													<td class="p-2 tx_sms1 tetx_blue">Reluctant</td>
													<td class="p-2 tx_sms1 tetx_blue">Mild</td>
													<td class="p-2 tx_sms1 tetx_blue">Aggresive</td>
												</tr>
											</tbody>
										</table>
									</td>

									<td class="p-0" id="bord_0">
										<table width="100%">
											<tbody>
												<tr>
													<td class="p-2 tx_sms1 tetx_red">Reluctant</td>
													<td class="p-2 tx_sms1 tetx_red">Mild</td>
													<td class="p-2 tx_sms1 tetx_red">Aggresive</td>
												</tr>
											</tbody>
										</table>
									</td>
								</tr>
							</tbody>

							<tbody>
								<tr>
									<td class="p-0" id="bord_0">
										<table width="100%">
											<tbody>
												<tr>
													<td class="p-2 tx_sms1 bord-0 tx_sms">₹5,250,000</td>
													<td class="p-2 tx_sms1 bord-0 tx_sms">₹5,250,000</td>
													<td class="p-2 tx_sms1 bord-0 tx_sms">₹5,250,000</td>
												</tr>
											</tbody>
										</table>
									</td>
									
									<td class="p-0" id="bord_0">
										<table width="100%">
											<tbody>
												<tr>
													<td class="p-2 tx_sms1 bord-0 tx_sms">₹5,250,000</td>
													<td class="p-2 tx_sms1 bord-0 tx_sms">₹5,250,000</td>
													<td class="p-2 tx_sms1 bord-0 tx_sms">₹5,250,000</td>
												</tr>
											</tbody>
										</table>
									</td>
									
									<td class="p-0" id="bord_0">
										<table width="100%">
											<tbody>
												<tr>
													<td class="p-2 tx_sms1 bord-0 tx_sms">₹5,250,000</td>
													<td class="p-2 tx_sms1 bord-0 tx_sms">₹5,250,000</td>
													<td class="p-2 tx_sms1 bord-0 tx_sms">₹5,250,000</td>
												</tr>
											</tbody>
										</table>
									</td>
									
									<td class="p-0" id="bord_0">
										<table width="100%">
											<tbody>
												<tr>
													<td class="p-2 tx_sms1 bord-0 tx_sms">₹5,250,000</td>
													<td class="p-2 tx_sms1 bord-0 tx_sms">₹5,250,000</td>
													<td class="p-2 tx_sms1 bord-0 tx_sms">₹5,250,000</td>
												</tr>
											</tbody>
										</table>
									</td>
									
									<td class="p-0" id="bord_0">
										<table width="100%">
											<tbody>
												<tr>
													<td class="p-2 tx_sms1 bord-0 tx_sms">₹5,250,000</td>
													<td class="p-2 tx_sms1 bord-0 tx_sms">₹5,250,000</td>
													<td class="p-2 tx_sms1 bord-0 tx_sms">₹5,250,000</td>
												</tr>
											</tbody>
										</table>
									</td>
								</tr>
								
								<tr>
									<td class="p-0" id="bord_0">
										<table width="100%">
											<tbody>
												<tr>
													<td class="p-2 tx_sms1 bord-0 tx_sms">₹5,250,000</td>
													<td class="p-2 tx_sms1 bord-0 tx_sms">₹5,250,000</td>
													<td class="p-2 tx_sms1 bord-0 tx_sms">₹5,250,000</td>
												</tr>
											</tbody>
										</table>
									</td>
									
									<td class="p-0" id="bord_0">
										<table width="100%">
											<tbody>
												<tr>
													<td class="p-2 tx_sms1 bord-0 tx_sms">₹5,250,000</td>
													<td class="p-2 tx_sms1 bord-0 tx_sms">₹5,250,000</td>
													<td class="p-2 tx_sms1 bord-0 tx_sms">₹5,250,000</td>
												</tr>
											</tbody>
										</table>
									</td>
									
									<td class="p-0" id="bord_0">
										<table width="100%">
											<tbody>
												<tr>
													<td class="p-2 tx_sms1 bord-0 tx_sms">₹5,250,000</td>
													<td class="p-2 tx_sms1 bord-0 tx_sms">₹5,250,000</td>
													<td class="p-2 tx_sms1 bord-0 tx_sms">₹5,250,000</td>
												</tr>
											</tbody>
										</table>
									</td>
									
									<td class="p-0" id="bord_0">
										<table width="100%">
											<tbody>
												<tr>
													<td class="p-2 tx_sms1 bord-0 tx_sms">₹5,250,000</td>
													<td class="p-2 tx_sms1 bord-0 tx_sms">₹5,250,000</td>
													<td class="p-2 tx_sms1 bord-0 tx_sms">₹5,250,000</td>
												</tr>
											</tbody>
										</table>
									</td>
									
									<td class="p-0" id="bord_0">
										<table width="100%">
											<tbody>
												<tr>
													<td class="p-2 tx_sms1 bord-0 tx_sms">₹5,250,000</td>
													<td class="p-2 tx_sms1 bord-0 tx_sms">₹5,250,000</td>
													<td class="p-2 tx_sms1 bord-0 tx_sms">₹5,250,000</td>
												</tr>
											</tbody>
										</table>
									</td>
								</tr>
								
								<tr>
									<td class="p-0" id="bord_0">
										<table width="100%">
											<tbody>
												<tr>
													<td class="p-2 tx_sms1 bord-0 tx_sms">₹5,250,000</td>
													<td class="p-2 tx_sms1 bord-0 tx_sms">₹5,250,000</td>
													<td class="p-2 tx_sms1 bord-0 tx_sms">₹5,250,000</td>
												</tr>
											</tbody>
										</table>
									</td>
									
									<td class="p-0" id="bord_0">
										<table width="100%">
											<tbody>
												<tr>
													<td class="p-2 tx_sms1 bord-0 tx_sms">₹5,250,000</td>
													<td class="p-2 tx_sms1 bord-0 tx_sms">₹5,250,000</td>
													<td class="p-2 tx_sms1 bord-0 tx_sms">₹5,250,000</td>
												</tr>
											</tbody>
										</table>
									</td>
									
									<td class="p-0" id="bord_0">
										<table width="100%">
											<tbody>
												<tr>
													<td class="p-2 tx_sms1 bord-0 tx_sms">₹5,250,000</td>
													<td class="p-2 tx_sms1 bord-0 tx_sms">₹5,250,000</td>
													<td class="p-2 tx_sms1 bord-0 tx_sms">₹5,250,000</td>
												</tr>
											</tbody>
										</table>
									</td>
									
									<td class="p-0" id="bord_0">
										<table width="100%">
											<tbody>
												<tr>
													<td class="p-2 tx_sms1 bord-0 tx_sms">₹5,250,000</td>
													<td class="p-2 tx_sms1 bord-0 tx_sms">₹5,250,000</td>
													<td class="p-2 tx_sms1 bord-0 tx_sms">₹5,250,000</td>
												</tr>
											</tbody>
										</table>
									</td>
									
									<td class="p-0" id="bord_0">
										<table width="100%">
											<tbody>
												<tr>
													<td class="p-2 tx_sms1 bord-0 tx_sms">₹5,250,000</td>
													<td class="p-2 tx_sms1 bord-0 tx_sms">₹5,250,000</td>
													<td class="p-2 tx_sms1 bord-0 tx_sms">₹5,250,000</td>
												</tr>
											</tbody>
										</table>
									</td>
								</tr>
								
								<tr>
									<td class="p-0" id="bord_0">
										<table width="100%">
											<tbody>
												<tr>
													<td class="p-2 tx_sms1 bord-0 tx_sms">₹5,250,000</td>
													<td class="p-2 tx_sms1 bord-0 tx_sms">₹5,250,000</td>
													<td class="p-2 tx_sms1 bord-0 tx_sms">₹5,250,000</td>
												</tr>
											</tbody>
										</table>
									</td>
									
									<td class="p-0" id="bord_0">
										<table width="100%">
											<tbody>
												<tr>
													<td class="p-2 tx_sms1 bord-0 tx_sms">₹5,250,000</td>
													<td class="p-2 tx_sms1 bord-0 tx_sms">₹5,250,000</td>
													<td class="p-2 tx_sms1 bord-0 tx_sms">₹5,250,000</td>
												</tr>
											</tbody>
										</table>
									</td>
									
									<td class="p-0" id="bord_0">
										<table width="100%">
											<tbody>
												<tr>
													<td class="p-2 tx_sms1 bord-0 tx_sms">₹5,250,000</td>
													<td class="p-2 tx_sms1 bord-0 tx_sms">₹5,250,000</td>
													<td class="p-2 tx_sms1 bord-0 tx_sms">₹5,250,000</td>
												</tr>
											</tbody>
										</table>
									</td>
									
									<td class="p-0" id="bord_0">
										<table width="100%">
											<tbody>
												<tr>
													<td class="p-2 tx_sms1 bord-0 tx_sms">₹5,250,000</td>
													<td class="p-2 tx_sms1 bord-0 tx_sms">₹5,250,000</td>
													<td class="p-2 tx_sms1 bord-0 tx_sms">₹5,250,000</td>
												</tr>
											</tbody>
										</table>
									</td>
									
									<td class="p-0" id="bord_0">
										<table width="100%">
											<tbody>
												<tr>
													<td class="p-2 tx_sms1 bord-0 tx_sms">₹5,250,000</td>
													<td class="p-2 tx_sms1 bord-0 tx_sms">₹5,250,000</td>
													<td class="p-2 tx_sms1 bord-0 tx_sms">₹5,250,000</td>
												</tr>
											</tbody>
										</table>
									</td>
								</tr>
								
								<tr>
									<td class="p-0" id="bord_0">
										<table width="100%">
											<tbody>
												<tr>
													<td class="p-2 tx_sms1 bord-0 tx_sms">₹5,250,000</td>
													<td class="p-2 tx_sms1 bord-0 tx_sms">₹5,250,000</td>
													<td class="p-2 tx_sms1 bord-0 tx_sms">₹5,250,000</td>
												</tr>
											</tbody>
										</table>
									</td>
									
									<td class="p-0" id="bord_0">
										<table width="100%">
											<tbody>
												<tr>
													<td class="p-2 tx_sms1 bord-0 tx_sms">₹5,250,000</td>
													<td class="p-2 tx_sms1 bord-0 tx_sms">₹5,250,000</td>
													<td class="p-2 tx_sms1 bord-0 tx_sms">₹5,250,000</td>
												</tr>
											</tbody>
										</table>
									</td>
									
									<td class="p-0" id="bord_0">
										<table width="100%">
											<tbody>
												<tr>
													<td class="p-2 tx_sms1 bord-0 tx_sms">₹5,250,000</td>
													<td class="p-2 tx_sms1 bord-0 tx_sms">₹5,250,000</td>
													<td class="p-2 tx_sms1 bord-0 tx_sms">₹5,250,000</td>
												</tr>
											</tbody>
										</table>
									</td>
									
									<td class="p-0" id="bord_0">
										<table width="100%">
											<tbody>
												<tr>
													<td class="p-2 tx_sms1 bord-0 tx_sms">₹5,250,000</td>
													<td class="p-2 tx_sms1 bord-0 tx_sms">₹5,250,000</td>
													<td class="p-2 tx_sms1 bord-0 tx_sms">₹5,250,000</td>
												</tr>
											</tbody>
										</table>
									</td>
									
									<td class="p-0" id="bord_0">
										<table width="100%">
											<tbody>
												<tr>
													<td class="p-2 tx_sms1 bord-0 tx_sms">₹5,250,000</td>
													<td class="p-2 tx_sms1 bord-0 tx_sms">₹5,250,000</td>
													<td class="p-2 tx_sms1 bord-0 tx_sms">₹5,250,000</td>
												</tr>
											</tbody>
										</table>
									</td>
								</tr>
								
								<tr>
									<td class="p-0" id="bord_0">
										<table width="100%">
											<tbody>
												<tr>
													<td class="p-2 tx_sms1 bord-0 tx_sms">₹5,250,000</td>
													<td class="p-2 tx_sms1 bord-0 tx_sms">₹5,250,000</td>
													<td class="p-2 tx_sms1 bord-0 tx_sms">₹5,250,000</td>
												</tr>
											</tbody>
										</table>
									</td>
									
									<td class="p-0" id="bord_0">
										<table width="100%">
											<tbody>
												<tr>
													<td class="p-2 tx_sms1 bord-0 tx_sms">₹5,250,000</td>
													<td class="p-2 tx_sms1 bord-0 tx_sms">₹5,250,000</td>
													<td class="p-2 tx_sms1 bord-0 tx_sms">₹5,250,000</td>
												</tr>
											</tbody>
										</table>
									</td>
									
									<td class="p-0" id="bord_0">
										<table width="100%">
											<tbody>
												<tr>
													<td class="p-2 tx_sms1 bord-0 tx_sms">₹5,250,000</td>
													<td class="p-2 tx_sms1 bord-0 tx_sms">₹5,250,000</td>
													<td class="p-2 tx_sms1 bord-0 tx_sms">₹5,250,000</td>
												</tr>
											</tbody>
										</table>
									</td>
									
									<td class="p-0" id="bord_0">
										<table width="100%">
											<tbody>
												<tr>
													<td class="p-2 tx_sms1 bord-0 tx_sms">₹5,250,000</td>
													<td class="p-2 tx_sms1 bord-0 tx_sms">₹5,250,000</td>
													<td class="p-2 tx_sms1 bord-0 tx_sms">₹5,250,000</td>
												</tr>
											</tbody>
										</table>
									</td>
									
									<td class="p-0" id="bord_0">
										<table width="100%">
											<tbody>
												<tr>
													<td class="p-2 tx_sms1 bord-0 tx_sms">₹5,250,000</td>
													<td class="p-2 tx_sms1 bord-0 tx_sms">₹5,250,000</td>
													<td class="p-2 tx_sms1 bord-0 tx_sms">₹5,250,000</td>
												</tr>
											</tbody>
										</table>
									</td>
								</tr>
								
								<tr>
									<td class="p-0" id="bord_0">
										<table width="100%">
											<tbody>
												<tr>
													<td class="p-2 tx_sms1 bord-0 tx_sms">₹5,250,000</td>
													<td class="p-2 tx_sms1 bord-0 tx_sms">₹5,250,000</td>
													<td class="p-2 tx_sms1 bord-0 tx_sms">₹5,250,000</td>
												</tr>
											</tbody>
										</table>
									</td>
									
									<td class="p-0" id="bord_0">
										<table width="100%">
											<tbody>
												<tr>
													<td class="p-2 tx_sms1 bord-0 tx_sms">₹5,250,000</td>
													<td class="p-2 tx_sms1 bord-0 tx_sms">₹5,250,000</td>
													<td class="p-2 tx_sms1 bord-0 tx_sms">₹5,250,000</td>
												</tr>
											</tbody>
										</table>
									</td>
									
									<td class="p-0" id="bord_0">
										<table width="100%">
											<tbody>
												<tr>
													<td class="p-2 tx_sms1 bord-0 tx_sms">₹5,250,000</td>
													<td class="p-2 tx_sms1 bord-0 tx_sms">₹5,250,000</td>
													<td class="p-2 tx_sms1 bord-0 tx_sms">₹5,250,000</td>
												</tr>
											</tbody>
										</table>
									</td>
									
									<td class="p-0" id="bord_0">
										<table width="100%">
											<tbody>
												<tr>
													<td class="p-2 tx_sms1 bord-0 tx_sms">₹5,250,000</td>
													<td class="p-2 tx_sms1 bord-0 tx_sms">₹5,250,000</td>
													<td class="p-2 tx_sms1 bord-0 tx_sms">₹5,250,000</td>
												</tr>
											</tbody>
										</table>
									</td>
									
									<td class="p-0" id="bord_0">
										<table width="100%">
											<tbody>
												<tr>
													<td class="p-2 tx_sms1 bord-0 tx_sms">₹5,250,000</td>
													<td class="p-2 tx_sms1 bord-0 tx_sms">₹5,250,000</td>
													<td class="p-2 tx_sms1 bord-0 tx_sms">₹5,250,000</td>
												</tr>
											</tbody>
										</table>
									</td>
								</tr>
								
								<tr>
									<td class="p-0" id="bord_0">
										<table width="100%">
											<tbody>
												<tr>
													<td class="p-2 tx_sms1 bord-0 tx_sms">₹5,250,000</td>
													<td class="p-2 tx_sms1 bord-0 tx_sms">₹5,250,000</td>
													<td class="p-2 tx_sms1 bord-0 tx_sms">₹5,250,000</td>
												</tr>
											</tbody>
										</table>
									</td>
									
									<td class="p-0" id="bord_0">
										<table width="100%">
											<tbody>
												<tr>
													<td class="p-2 tx_sms1 bord-0 tx_sms">₹5,250,000</td>
													<td class="p-2 tx_sms1 bord-0 tx_sms">₹5,250,000</td>
													<td class="p-2 tx_sms1 bord-0 tx_sms">₹5,250,000</td>
												</tr>
											</tbody>
										</table>
									</td>
									
									<td class="p-0" id="bord_0">
										<table width="100%">
											<tbody>
												<tr>
													<td class="p-2 tx_sms1 bord-0 tx_sms">₹5,250,000</td>
													<td class="p-2 tx_sms1 bord-0 tx_sms">₹5,250,000</td>
													<td class="p-2 tx_sms1 bord-0 tx_sms">₹5,250,000</td>
												</tr>
											</tbody>
										</table>
									</td>
									
									<td class="p-0" id="bord_0">
										<table width="100%">
											<tbody>
												<tr>
													<td class="p-2 tx_sms1 bord-0 tx_sms">₹5,250,000</td>
													<td class="p-2 tx_sms1 bord-0 tx_sms">₹5,250,000</td>
													<td class="p-2 tx_sms1 bord-0 tx_sms">₹5,250,000</td>
												</tr>
											</tbody>
										</table>
									</td>
									
									<td class="p-0" id="bord_0">
										<table width="100%">
											<tbody>
												<tr>
													<td class="p-2 tx_sms1 bord-0 tx_sms">₹5,250,000</td>
													<td class="p-2 tx_sms1 bord-0 tx_sms">₹5,250,000</td>
													<td class="p-2 tx_sms1 bord-0 tx_sms">₹5,250,000</td>
												</tr>
											</tbody>
										</table>
									</td>
								</tr>
							
							</tbody>
						</table>
					</div>
				   </div>
				 
				   <!---- Help ---->
				   <section class="al_sec_araea mt_50p pb-0">
					 <div class="row mt-4">
						<div class="col-12 col-sm-12">
							<div class="row mb-4">
								<div class="col-lg-12">
									<div class="alss_pagess" id="alss_pgesss">
										<h3>Need Help?</h3>

										<p>Explore our resources to quickly get started with Flowlu business management software</p>
									</div>
								</div>

								<div class="col-lg-4">
									<div class="hpls_box">
										<div class="ovr_centetent">
											<p>Book online demo</p>

											<a href="javascript:void(0);">Get a demo</a>
										</div>

										<img src="{{ url('home/img/hlp_1.png')}}" alt="" />
									</div>
								</div>

								<div class="col-lg-4">
									<div class="hpls_box">
										<div class="ovr_centetent">
											<p>Find the answers</p>

											<a href="javascript:void(0);">Knowledge base</a>
										</div>

										<img src="{{ url('home/img/hlp_2.png')}}" alt="" />
									</div>
								</div>

								<div class="col-lg-4">
									<div class="hpls_box">
										<div class="ovr_centetent">
											<p>Ask questions</p>

											<a href="javascript:void(0);">Support chat</a>
										</div>

										<img src="{{ url('home/img/hlp_3.png')}}" alt="" />
									</div>
								</div>
							</div>
						</div>
					</div>
				   </section>
				   <!---- Help ---->				 
				 </div>

				 <div id="tab-reluctant" class="tab-content">
				    <!--- Download --->
				     <a href="javascript:void(0);" id="dwn_loadss">Download <i class="fa fa-download"></i></a>
				    <!--- Download --->
					<div class="propfixsd new_propertyy hollss p-0 sticky_und">
						<div class="table-responsive table-fixed-labels properties-comparison-table">
							<table class="table table-nowrap table-no-borders table-align-right table-condensed als_show_ar">
								<tbody>
									<tr>
										<td class="text-right p-2 tx_sms1">Years (starting the year of Rent Out) -></td>
									</tr>
									<tr>
										<td class="text-right p-2 tx_sms1">Property Number Purchased -></td>
									</tr>
									<tr>
										<td class="text-right p-2 tx_sms1">Years -></td>
									</tr>
								</tbody>

								<tbody>
									<tr>
										<td class="text-left p-1 tx_sms1 black_bg">&nbsp;</td>
									</tr>

									<tr>
										<td class="text-left p-2 tx_sms1">Market Value Of The Portfolio</td>
									</tr>
									<tr>
										<td class="text-left p-2 tx_sms1">Total Networth (Equity)</td>
									</tr>
									<tr>
										<td class="text-left p-2 tx_sms1 redss">Down Payment</td>
									</tr>
									<tr>
										<td class="text-left p-2 tx_sms1 blue">Accumulated Down Payment</td>
									</tr>
									<tr>
										<td class="text-left p-2 tx_sms1">Annual Cash Flow (ACF)</td>
									</tr>
									<tr>
										<td class="text-left p-2 tx_sms1">Accumulated Cash Flow (ACCU.CF)</td>
									</tr>
									<tr>
										<td class="text-left p-2 tx_sms1 redss">Total Profit on Sale:</td>
									</tr>
									<tr>
										<td class="text-left p-2 tx_sms1">Return on Investment(%)</td>
									</tr>
									<tr>
										<td class="text-left p-2 tx_sms1 greas_bg">Total Roi (Equity + Cash Flow)</td>
									</tr>
								</tbody>

								<tbody>
									<tr>
										<td class="text-left p-2 tx_sms1 black_bg">01 Accumulation Of Properties</td>
									</tr>
									<tr>
										<td class="text-left p-2 tx_sms1">Total Networth (Equity)</td>
									</tr>
									<tr>
										<td class="text-left p-2 tx_sms1 redss">Down Payment</td>
									</tr>
									<tr>
										<td class="text-left p-2 tx_sms1 blue">Accumulated Down Payment</td>
									</tr>
									<tr>
										<td class="text-left p-2 tx_sms1">Annual Cash Flow (ACF)</td>
									</tr>
									<tr>
										<td class="text-left p-2 tx_sms1">Accumulated Cash Flow (ACCU.CF)</td>
									</tr>
								</tbody>
							</table>
						</div>

						<div class="table-responsive table-fixed-labels properties-comparison-table secendss">
							<table class="table table-nowrap table-no-borders table-align-right table-condensed mb-0">
								<tbody>
									<tr>
										<td class="p-2 tx_sms1 yellow_bg">Year 2012</td>
										<td class="p-2 tx_sms1">Year 2013</td>
										<td class="p-2 tx_sms1">Year 2014</td>
										<td class="p-2 tx_sms1">Year 2015</td>
										<td class="p-2 tx_sms1 yellow_bg">Year 2016</td>
										<td class="p-2 tx_sms1">Year 2017</td>
										<td class="p-2 tx_sms1">Year 2018</td>
										<td class="p-2 tx_sms1 yellow_bg">Year 2019</td>
										<td class="p-2 tx_sms1">Year 2020</td>
										<td class="p-2 tx_sms1">Year 2021</td>
										<td class="p-2 tx_sms1 yellow_bg">Year 2022</td>
										<td class="p-2 tx_sms1">Year 2023</td>
										<td class="p-2 tx_sms1">Year 2024</td>
										<td class="p-2 tx_sms1 yellow_bg">Year 2025</td>
										<td class="p-2 tx_sms1">Year 2026</td>
										<td class="p-2 tx_sms1 yellow_bg">Year 2027</td>
										<td class="p-2 tx_sms1 yellow_bg">Year 2028</td>
										<td class="p-2 tx_sms1 yellow_bg">Year 2029</td>
										<td class="p-2 tx_sms1 yellow_bg">Year 2030</td>
										<td class="p-2 tx_sms1 yellow_bg">Year 2031</td>
										<td class="p-2 tx_sms1 greanns_bg">Year 2031</td>
										<td class="p-2 tx_sms1 greanns_bg">Year 2032</td>
										<td class="p-2 tx_sms1 greanns_bg">Year 2033</td>
									</tr>
									<tr>
										<td class="p-2 tx_sms1 yellow_bg">Property 1</td>
										<td class="p-2 tx_sms1">-</td>
										<td class="p-2 tx_sms1">-</td>
										<td class="p-2 tx_sms1">-</td>
										<td class="p-2 tx_sms1 yellow_bg">Property 2</td>
										<td class="p-2 tx_sms1">-</td>
										<td class="p-2 tx_sms1">-</td>
										<td class="p-2 tx_sms1 yellow_bg">Property 3</td>
										<td class="p-2 tx_sms1">-</td>
										<td class="p-2 tx_sms1">-</td>
										<td class="p-2 tx_sms1 yellow_bg">Property 4</td>
										<td class="p-2 tx_sms1">-</td>
										<td class="p-2 tx_sms1">-</td>
										<td class="p-2 tx_sms1 yellow_bg">Property 5</td>
										<td class="p-2 tx_sms1">-</td>
										<td class="p-2 tx_sms1 yellow_bg">Property 6</td>
										<td class="p-2 tx_sms1 yellow_bg">Property 7</td>
										<td class="p-2 tx_sms1 yellow_bg">Property 9</td>
										<td class="p-2 tx_sms1 yellow_bg">Property 9</td>
										<td class="p-2 tx_sms1 yellow_bg">Property 10</td>
										<td class="p-2 tx_sms1 yellow_bg">&nbsp;</td>
										<td class="p-2 tx_sms1 yellow_bg">&nbsp;</td>
										<td class="p-2 tx_sms1 yellow_bg">&nbsp;</td>
									</tr>
									<tr>
										<td class="p-2 tx_sms1 yellow_bg">1</td>
										<td class="p-2 tx_sms1">2</td>
										<td class="p-2 tx_sms1">3</td>
										<td class="p-2 tx_sms1">4</td>
										<td class="p-2 tx_sms1 yellow_bg">5</td>
										<td class="p-2 tx_sms1">6</td>
										<td class="p-2 tx_sms1">7</td>
										<td class="p-2 tx_sms1 yellow_bg">8</td>
										<td class="p-2 tx_sms1">9</td>
										<td class="p-2 tx_sms1">11</td>
										<td class="p-2 tx_sms1 yellow_bg">11</td>
										<td class="p-2 tx_sms1">12</td>
										<td class="p-2 tx_sms1">13</td>
										<td class="p-2 tx_sms1 yellow_bg">14</td>
										<td class="p-2 tx_sms1">15</td>
										<td class="p-2 tx_sms1 yellow_bg">16</td>
										<td class="p-2 tx_sms1 yellow_bg">17</td>
										<td class="p-2 tx_sms1 yellow_bg">18</td>
										<td class="p-2 tx_sms1 yellow_bg">19</td>
										<td class="p-2 tx_sms1 yellow_bg">20</td>
										<td class="p-2 tx_sms1 greanns_bg">21</td>
										<td class="p-2 tx_sms1 greanns_bg">12</td>
										<td class="p-2 tx_sms1 greanns_bg">23</td>
									</tr>
								</tbody>

								<tbody>
									<tr>
										<td class="p-1 tx_sms1 black_bg">&nbsp;</td>
										<td class="p-1 tx_sms1 black_bg">&nbsp;</td>
										<td class="p-1 tx_sms1 black_bg">&nbsp;</td>
										<td class="p-1 tx_sms1 black_bg">&nbsp;</td>
										<td class="p-1 tx_sms1 black_bg">&nbsp;</td>
										<td class="p-1 tx_sms1 black_bg">&nbsp;</td>
										<td class="p-1 tx_sms1 black_bg">&nbsp;</td>
										<td class="p-1 tx_sms1 black_bg">&nbsp;</td>
										<td class="p-1 tx_sms1 black_bg">&nbsp;</td>
										<td class="p-1 tx_sms1 black_bg">&nbsp;</td>
										<td class="p-1 tx_sms1 black_bg">&nbsp;</td>
										<td class="p-1 tx_sms1 black_bg">&nbsp;</td>
										<td class="p-1 tx_sms1 black_bg">&nbsp;</td>
										<td class="p-1 tx_sms1 black_bg">&nbsp;</td>
										<td class="p-1 tx_sms1 black_bg">&nbsp;</td>
										<td class="p-1 tx_sms1 black_bg">&nbsp;</td>
										<td class="p-1 tx_sms1 black_bg">&nbsp;</td>
										<td class="p-1 tx_sms1 black_bg">&nbsp;</td>
										<td class="p-1 tx_sms1 black_bg">&nbsp;</td>
										<td class="p-1 tx_sms1 black_bg">&nbsp;</td>
										<td class="p-1 tx_sms1 black_bg">&nbsp;</td>
										<td class="p-1 tx_sms1 black_bg">&nbsp;</td>
										<td class="p-1 tx_sms1 black_bg">&nbsp;</td>
									</tr>
									<tr>
										<td class="p-2 tx_sms1">₹5,250,000</td>
										<td class="p-2 tx_sms1">₹5,250,000</td>
										<td class="p-2 tx_sms1">₹5,250,000</td>
										<td class="p-2 tx_sms1">₹5,250,000</td>
										<td class="p-2 tx_sms1">₹5,250,000</td>
										<td class="p-2 tx_sms1">₹5,250,000</td>
										<td class="p-2 tx_sms1">₹5,250,000</td>
										<td class="p-2 tx_sms1">₹5,250,000</td>
										<td class="p-2 tx_sms1">₹5,250,000</td>
										<td class="p-2 tx_sms1">₹5,250,000</td>
										<td class="p-2 tx_sms1">₹5,250,000</td>
										<td class="p-2 tx_sms1">₹5,250,000</td>
										<td class="p-2 tx_sms1">₹5,250,000</td>
										<td class="p-2 tx_sms1">₹5,250,000</td>
										<td class="p-2 tx_sms1">₹5,250,000</td>
										<td class="p-2 tx_sms1">₹5,250,000</td>
										<td class="p-2 tx_sms1">₹5,250,000</td>
										<td class="p-2 tx_sms1">₹5,250,000</td>
										<td class="p-2 tx_sms1">₹5,250,000</td>
										<td class="p-2 tx_sms1">₹5,250,000</td>
										<td class="p-2 tx_sms1">₹5,250,000</td>
										<td class="p-2 tx_sms1">₹5,250,000</td>
										<td class="p-2 tx_sms1">₹5,250,000</td>
									</tr>
									<tr>
										<td class="p-2 tx_sms1">₹1,250,000</td>
										<td class="p-2 tx_sms1">₹1,250,000</td>
										<td class="p-2 tx_sms1">₹1,250,000</td>
										<td class="p-2 tx_sms1">₹1,250,000</td>
										<td class="p-2 tx_sms1">₹1,250,000</td>
										<td class="p-2 tx_sms1">₹1,250,000</td>
										<td class="p-2 tx_sms1">₹1,250,000</td>
										<td class="p-2 tx_sms1">₹1,250,000</td>
										<td class="p-2 tx_sms1">₹1,250,000</td>
										<td class="p-2 tx_sms1">₹1,250,000</td>
										<td class="p-2 tx_sms1">₹1,250,000</td>
										<td class="p-2 tx_sms1">₹1,250,000</td>
										<td class="p-2 tx_sms1">₹1,250,000</td>
										<td class="p-2 tx_sms1">₹1,250,000</td>
										<td class="p-2 tx_sms1">₹1,250,000</td>
										<td class="p-2 tx_sms1">₹1,250,000</td>
										<td class="p-2 tx_sms1">₹1,250,000</td>
										<td class="p-2 tx_sms1">₹1,250,000</td>
										<td class="p-2 tx_sms1">₹1,250,000</td>
										<td class="p-2 tx_sms1">₹1,250,000</td>
										<td class="p-2 tx_sms1">₹1,250,000</td>
										<td class="p-2 tx_sms1">₹1,250,000</td>
										<td class="p-2 tx_sms1">₹1,250,000</td>
									</tr>

									<tr>
										<td class="p-2 tx_sms1 redss">₹1,350,000</td>
										<td class="p-2 tx_sms1 redss">₹1,350,000</td>
										<td class="p-2 tx_sms1 redss">₹1,350,000</td>
										<td class="p-2 tx_sms1 redss">₹1,350,000</td>
										<td class="p-2 tx_sms1 redss">₹1,350,000</td>
										<td class="p-2 tx_sms1 redss">₹1,350,000</td>
										<td class="p-2 tx_sms1 redss">₹1,350,000</td>
										<td class="p-2 tx_sms1 redss">₹1,350,000</td>
										<td class="p-2 tx_sms1 redss">₹1,350,000</td>
										<td class="p-2 tx_sms1 redss">₹1,350,000</td>
										<td class="p-2 tx_sms1 redss">₹1,350,000</td>
										<td class="p-2 tx_sms1 redss">₹1,350,000</td>
										<td class="p-2 tx_sms1 redss">₹1,350,000</td>
										<td class="p-2 tx_sms1 redss">₹1,350,000</td>
										<td class="p-2 tx_sms1 redss">₹1,350,000</td>
										<td class="p-2 tx_sms1 redss">₹1,350,000</td>
										<td class="p-2 tx_sms1 redss">₹1,350,000</td>
										<td class="p-2 tx_sms1 redss">₹1,350,000</td>
										<td class="p-2 tx_sms1 redss">₹1,350,000</td>
										<td class="p-2 tx_sms1 redss">₹1,350,000</td>
										<td class="p-2 tx_sms1 redss">₹1,350,000</td>
										<td class="p-2 tx_sms1 redss">₹1,350,000</td>
										<td class="p-2 tx_sms1 redss">₹1,350,000</td>
									</tr>
									<tr>
										<td class="p-2 tx_sms1 blue">₹5,250,000</td>
										<td class="p-2 tx_sms1 blue">₹5,250,000</td>
										<td class="p-2 tx_sms1 blue">₹5,250,000</td>
										<td class="p-2 tx_sms1 blue">₹5,250,000</td>
										<td class="p-2 tx_sms1 blue">₹5,250,000</td>
										<td class="p-2 tx_sms1 blue">₹5,250,000</td>
										<td class="p-2 tx_sms1 blue">₹5,250,000</td>
										<td class="p-2 tx_sms1 blue">₹5,250,000</td>
										<td class="p-2 tx_sms1 blue">₹5,250,000</td>
										<td class="p-2 tx_sms1 blue">₹5,250,000</td>
										<td class="p-2 tx_sms1 blue">₹5,250,000</td>
										<td class="p-2 tx_sms1 blue">₹5,250,000</td>
										<td class="p-2 tx_sms1 blue">₹5,250,000</td>
										<td class="p-2 tx_sms1 blue">₹5,250,000</td>
										<td class="p-2 tx_sms1 blue">₹5,250,000</td>
										<td class="p-2 tx_sms1 blue">₹5,250,000</td>
										<td class="p-2 tx_sms1 blue">₹5,250,000</td>
										<td class="p-2 tx_sms1 blue">₹5,250,000</td>
										<td class="p-2 tx_sms1 blue">₹5,250,000</td>
										<td class="p-2 tx_sms1 blue">₹5,250,000</td>
										<td class="p-2 tx_sms1 blue">₹5,250,000</td>
										<td class="p-2 tx_sms1 blue">₹5,250,000</td>
										<td class="p-2 tx_sms1 blue">₹5,250,000</td>
									</tr>
									<tr>
										<td class="p-2 tx_sms1">₹1,250,000</td>
										<td class="p-2 tx_sms1">₹1,250,000</td>
										<td class="p-2 tx_sms1">₹1,250,000</td>
										<td class="p-2 tx_sms1">₹1,250,000</td>
										<td class="p-2 tx_sms1">₹1,250,000</td>
										<td class="p-2 tx_sms1">₹1,250,000</td>
										<td class="p-2 tx_sms1">₹1,250,000</td>
										<td class="p-2 tx_sms1">₹1,250,000</td>
										<td class="p-2 tx_sms1">₹1,250,000</td>
										<td class="p-2 tx_sms1">₹1,250,000</td>
										<td class="p-2 tx_sms1">₹1,250,000</td>
										<td class="p-2 tx_sms1">₹1,250,000</td>
										<td class="p-2 tx_sms1">₹1,250,000</td>
										<td class="p-2 tx_sms1">₹1,250,000</td>
										<td class="p-2 tx_sms1">₹1,250,000</td>
										<td class="p-2 tx_sms1">₹1,250,000</td>
										<td class="p-2 tx_sms1">₹1,250,000</td>
										<td class="p-2 tx_sms1">₹1,250,000</td>
										<td class="p-2 tx_sms1">₹1,250,000</td>
										<td class="p-2 tx_sms1">₹1,250,000</td>
										<td class="p-2 tx_sms1">₹1,250,000</td>
										<td class="p-2 tx_sms1">₹1,250,000</td>
										<td class="p-2 tx_sms1">₹1,250,000</td>
									</tr>

									<tr>
										<td class="p-2 tx_sms1">₹1,350,000</td>
										<td class="p-2 tx_sms1">₹1,350,000</td>
										<td class="p-2 tx_sms1">₹1,350,000</td>
										<td class="p-2 tx_sms1">₹1,350,000</td>
										<td class="p-2 tx_sms1">₹1,350,000</td>
										<td class="p-2 tx_sms1">₹1,350,000</td>
										<td class="p-2 tx_sms1">₹1,350,000</td>
										<td class="p-2 tx_sms1">₹1,350,000</td>
										<td class="p-2 tx_sms1">₹1,350,000</td>
										<td class="p-2 tx_sms1">₹1,350,000</td>
										<td class="p-2 tx_sms1">₹1,350,000</td>
										<td class="p-2 tx_sms1">₹1,350,000</td>
										<td class="p-2 tx_sms1">₹1,350,000</td>
										<td class="p-2 tx_sms1">₹1,350,000</td>
										<td class="p-2 tx_sms1">₹1,350,000</td>
										<td class="p-2 tx_sms1">₹1,350,000</td>
										<td class="p-2 tx_sms1">₹1,350,000</td>
										<td class="p-2 tx_sms1">₹1,350,000</td>
										<td class="p-2 tx_sms1">₹1,350,000</td>
										<td class="p-2 tx_sms1">₹1,350,000</td>
										<td class="p-2 tx_sms1">₹1,350,000</td>
										<td class="p-2 tx_sms1">₹1,350,000</td>
										<td class="p-2 tx_sms1">₹1,350,000</td>
									</tr>

									<tr>
										<td class="p-2 tx_sms1 redss">₹5,250,000</td>
										<td class="p-2 tx_sms1 redss">₹5,250,000</td>
										<td class="p-2 tx_sms1 redss">₹5,250,000</td>
										<td class="p-2 tx_sms1 redss">₹5,250,000</td>
										<td class="p-2 tx_sms1 redss">₹5,250,000</td>
										<td class="p-2 tx_sms1 redss">₹5,250,000</td>
										<td class="p-2 tx_sms1 redss">₹5,250,000</td>
										<td class="p-2 tx_sms1 redss">₹5,250,000</td>
										<td class="p-2 tx_sms1 redss">₹5,250,000</td>
										<td class="p-2 tx_sms1 redss">₹5,250,000</td>
										<td class="p-2 tx_sms1 redss">₹5,250,000</td>
										<td class="p-2 tx_sms1 redss">₹5,250,000</td>
										<td class="p-2 tx_sms1 redss">₹5,250,000</td>
										<td class="p-2 tx_sms1 redss">₹5,250,000</td>
										<td class="p-2 tx_sms1 redss">₹5,250,000</td>
										<td class="p-2 tx_sms1 redss">₹5,250,000</td>
										<td class="p-2 tx_sms1 redss">₹5,250,000</td>
										<td class="p-2 tx_sms1 redss">₹5,250,000</td>
										<td class="p-2 tx_sms1 redss">₹5,250,000</td>
										<td class="p-2 tx_sms1 redss">₹5,250,000</td>
										<td class="p-2 tx_sms1 redss">₹5,250,000</td>
										<td class="p-2 tx_sms1 redss">₹5,250,000</td>
										<td class="p-2 tx_sms1 redss">₹5,250,000</td>
									</tr>
									<tr>
										<td class="p-2 tx_sms1">₹1,250,000</td>
										<td class="p-2 tx_sms1">₹1,250,000</td>
										<td class="p-2 tx_sms1">₹1,250,000</td>
										<td class="p-2 tx_sms1">₹1,250,000</td>
										<td class="p-2 tx_sms1">₹1,250,000</td>
										<td class="p-2 tx_sms1">₹1,250,000</td>
										<td class="p-2 tx_sms1">₹1,250,000</td>
										<td class="p-2 tx_sms1">₹1,250,000</td>
										<td class="p-2 tx_sms1">₹1,250,000</td>
										<td class="p-2 tx_sms1">₹1,250,000</td>
										<td class="p-2 tx_sms1">₹1,250,000</td>
										<td class="p-2 tx_sms1">₹1,250,000</td>
										<td class="p-2 tx_sms1">₹1,250,000</td>
										<td class="p-2 tx_sms1">₹1,250,000</td>
										<td class="p-2 tx_sms1">₹1,250,000</td>
										<td class="p-2 tx_sms1">₹1,250,000</td>
										<td class="p-2 tx_sms1">₹1,250,000</td>
										<td class="p-2 tx_sms1">₹1,250,000</td>
										<td class="p-2 tx_sms1">₹1,250,000</td>
										<td class="p-2 tx_sms1">₹1,250,000</td>
										<td class="p-2 tx_sms1">₹1,250,000</td>
										<td class="p-2 tx_sms1">₹1,250,000</td>
										<td class="p-2 tx_sms1">₹1,250,000</td>
									</tr>

									<tr>
										<td class="p-2 tx_sms1 greas_bg">₹1,350,000</td>
										<td class="p-2 tx_sms1 greas_bg">₹1,350,000</td>
										<td class="p-2 tx_sms1 greas_bg">₹1,350,000</td>
										<td class="p-2 tx_sms1 greas_bg">₹1,350,000</td>
										<td class="p-2 tx_sms1 greas_bg">₹1,350,000</td>
										<td class="p-2 tx_sms1 greas_bg">₹1,350,000</td>
										<td class="p-2 tx_sms1 greas_bg">₹1,350,000</td>
										<td class="p-2 tx_sms1 greas_bg">₹1,350,000</td>
										<td class="p-2 tx_sms1 greas_bg">₹1,350,000</td>
										<td class="p-2 tx_sms1 greas_bg">₹1,350,000</td>
										<td class="p-2 tx_sms1 greas_bg">₹1,350,000</td>
										<td class="p-2 tx_sms1 greas_bg">₹1,350,000</td>
										<td class="p-2 tx_sms1 greas_bg">₹1,350,000</td>
										<td class="p-2 tx_sms1 greas_bg">₹1,350,000</td>
										<td class="p-2 tx_sms1 greas_bg">₹1,350,000</td>
										<td class="p-2 tx_sms1 greas_bg">₹1,350,000</td>
										<td class="p-2 tx_sms1 greas_bg">₹1,350,000</td>
										<td class="p-2 tx_sms1 greas_bg">₹1,350,000</td>
										<td class="p-2 tx_sms1 greas_bg">₹1,350,000</td>
										<td class="p-2 tx_sms1 greas_bg">₹1,350,000</td>
										<td class="p-2 tx_sms1 greas_bg">₹1,350,000</td>
										<td class="p-2 tx_sms1 greas_bg">₹1,350,000</td>
										<td class="p-2 tx_sms1 greas_bg">₹1,350,000</td>
									</tr>
								</tbody>

								<tbody>
									<tr>
										<td class="p-2 tx_sms1 black_bg">&nbsp;</td>
										<td class="p-2 tx_sms1 black_bg">&nbsp;</td>
										<td class="p-2 tx_sms1 black_bg">&nbsp;</td>
										<td class="p-2 tx_sms1 black_bg">&nbsp;</td>
										<td class="p-2 tx_sms1 black_bg">&nbsp;</td>
										<td class="p-2 tx_sms1 black_bg">&nbsp;</td>
										<td class="p-2 tx_sms1 black_bg">&nbsp;</td>
										<td class="p-2 tx_sms1 black_bg">&nbsp;</td>
										<td class="p-2 tx_sms1 black_bg">&nbsp;</td>
										<td class="p-2 tx_sms1 black_bg">&nbsp;</td>
										<td class="p-2 tx_sms1 black_bg">&nbsp;</td>
										<td class="p-2 tx_sms1 black_bg">&nbsp;</td>
										<td class="p-2 tx_sms1 black_bg">&nbsp;</td>
										<td class="p-2 tx_sms1 black_bg">&nbsp;</td>
										<td class="p-2 tx_sms1 black_bg">&nbsp;</td>
										<td class="p-2 tx_sms1 black_bg">&nbsp;</td>
										<td class="p-2 tx_sms1 black_bg">&nbsp;</td>
										<td class="p-2 tx_sms1 black_bg">&nbsp;</td>
										<td class="p-2 tx_sms1 black_bg">&nbsp;</td>
										<td class="p-2 tx_sms1 black_bg">&nbsp;</td>
										<td class="p-2 tx_sms1 black_bg">&nbsp;</td>
										<td class="p-2 tx_sms1 black_bg">&nbsp;</td>
										<td class="p-2 tx_sms1 black_bg">&nbsp;</td>
									</tr>
									<tr>
										<td class="p-2 tx_sms1">₹1,250,000</td>
										<td class="p-2 tx_sms1">₹1,250,000</td>
										<td class="p-2 tx_sms1">₹1,250,000</td>
										<td class="p-2 tx_sms1">₹1,250,000</td>
										<td class="p-2 tx_sms1">₹1,250,000</td>
										<td class="p-2 tx_sms1">₹1,250,000</td>
										<td class="p-2 tx_sms1">₹1,250,000</td>
										<td class="p-2 tx_sms1">₹1,250,000</td>
										<td class="p-2 tx_sms1">₹1,250,000</td>
										<td class="p-2 tx_sms1">₹1,250,000</td>
										<td class="p-2 tx_sms1">₹1,250,000</td>
										<td class="p-2 tx_sms1">₹1,250,000</td>
										<td class="p-2 tx_sms1">₹1,250,000</td>
										<td class="p-2 tx_sms1">₹1,250,000</td>
										<td class="p-2 tx_sms1">₹1,250,000</td>
										<td class="p-2 tx_sms1">₹1,250,000</td>
										<td class="p-2 tx_sms1">₹1,250,000</td>
										<td class="p-2 tx_sms1">₹1,250,000</td>
										<td class="p-2 tx_sms1">₹1,250,000</td>
										<td class="p-2 tx_sms1">₹1,250,000</td>
										<td class="p-2 tx_sms1">₹1,250,000</td>
										<td class="p-2 tx_sms1">₹1,250,000</td>
										<td class="p-2 tx_sms1">₹1,250,000</td>
									</tr>

									<tr>
										<td class="p-2 tx_sms1 redss">₹1,350,000</td>
										<td class="p-2 tx_sms1 redss">₹1,350,000</td>
										<td class="p-2 tx_sms1 redss">₹1,350,000</td>
										<td class="p-2 tx_sms1 redss">₹1,350,000</td>
										<td class="p-2 tx_sms1 redss">₹1,350,000</td>
										<td class="p-2 tx_sms1 redss">₹1,350,000</td>
										<td class="p-2 tx_sms1 redss">₹1,350,000</td>
										<td class="p-2 tx_sms1 redss">₹1,350,000</td>
										<td class="p-2 tx_sms1 redss">₹1,350,000</td>
										<td class="p-2 tx_sms1 redss">₹1,350,000</td>
										<td class="p-2 tx_sms1 redss">₹1,350,000</td>
										<td class="p-2 tx_sms1 redss">₹1,350,000</td>
										<td class="p-2 tx_sms1 redss">₹1,350,000</td>
										<td class="p-2 tx_sms1 redss">₹1,350,000</td>
										<td class="p-2 tx_sms1 redss">₹1,350,000</td>
										<td class="p-2 tx_sms1 redss">₹1,350,000</td>
										<td class="p-2 tx_sms1 redss">₹1,350,000</td>
										<td class="p-2 tx_sms1 redss">₹1,350,000</td>
										<td class="p-2 tx_sms1 redss">₹1,350,000</td>
										<td class="p-2 tx_sms1 redss">₹1,350,000</td>
										<td class="p-2 tx_sms1 redss">₹1,350,000</td>
										<td class="p-2 tx_sms1 redss">₹1,350,000</td>
										<td class="p-2 tx_sms1 redss">₹1,350,000</td>
									</tr>
									<tr>
										<td class="p-2 tx_sms1 blue">₹5,250,000</td>
										<td class="p-2 tx_sms1 blue">₹5,250,000</td>
										<td class="p-2 tx_sms1 blue">₹5,250,000</td>
										<td class="p-2 tx_sms1 blue">₹5,250,000</td>
										<td class="p-2 tx_sms1 blue">₹5,250,000</td>
										<td class="p-2 tx_sms1 blue">₹5,250,000</td>
										<td class="p-2 tx_sms1 blue">₹5,250,000</td>
										<td class="p-2 tx_sms1 blue">₹5,250,000</td>
										<td class="p-2 tx_sms1 blue">₹5,250,000</td>
										<td class="p-2 tx_sms1 blue">₹5,250,000</td>
										<td class="p-2 tx_sms1 blue">₹5,250,000</td>
										<td class="p-2 tx_sms1 blue">₹5,250,000</td>
										<td class="p-2 tx_sms1 blue">₹5,250,000</td>
										<td class="p-2 tx_sms1 blue">₹5,250,000</td>
										<td class="p-2 tx_sms1 blue">₹5,250,000</td>
										<td class="p-2 tx_sms1 blue">₹5,250,000</td>
										<td class="p-2 tx_sms1 blue">₹5,250,000</td>
										<td class="p-2 tx_sms1 blue">₹5,250,000</td>
										<td class="p-2 tx_sms1 blue">₹5,250,000</td>
										<td class="p-2 tx_sms1 blue">₹5,250,000</td>
										<td class="p-2 tx_sms1 blue">₹5,250,000</td>
										<td class="p-2 tx_sms1 blue">₹5,250,000</td>
										<td class="p-2 tx_sms1 blue">₹5,250,000</td>
									</tr>
									<tr>
										<td class="p-2 tx_sms1">₹1,250,000</td>
										<td class="p-2 tx_sms1">₹1,250,000</td>
										<td class="p-2 tx_sms1">₹1,250,000</td>
										<td class="p-2 tx_sms1">₹1,250,000</td>
										<td class="p-2 tx_sms1">₹1,250,000</td>
										<td class="p-2 tx_sms1">₹1,250,000</td>
										<td class="p-2 tx_sms1">₹1,250,000</td>
										<td class="p-2 tx_sms1">₹1,250,000</td>
										<td class="p-2 tx_sms1">₹1,250,000</td>
										<td class="p-2 tx_sms1">₹1,250,000</td>
										<td class="p-2 tx_sms1">₹1,250,000</td>
										<td class="p-2 tx_sms1">₹1,250,000</td>
										<td class="p-2 tx_sms1">₹1,250,000</td>
										<td class="p-2 tx_sms1">₹1,250,000</td>
										<td class="p-2 tx_sms1">₹1,250,000</td>
										<td class="p-2 tx_sms1">₹1,250,000</td>
										<td class="p-2 tx_sms1">₹1,250,000</td>
										<td class="p-2 tx_sms1">₹1,250,000</td>
										<td class="p-2 tx_sms1">₹1,250,000</td>
										<td class="p-2 tx_sms1">₹1,250,000</td>
										<td class="p-2 tx_sms1">₹1,250,000</td>
										<td class="p-2 tx_sms1">₹1,250,000</td>
										<td class="p-2 tx_sms1">₹1,250,000</td>
									</tr>

									<tr>
										<td class="p-2 tx_sms1">₹1,350,000</td>
										<td class="p-2 tx_sms1">₹1,350,000</td>
										<td class="p-2 tx_sms1">₹1,350,000</td>
										<td class="p-2 tx_sms1">₹1,350,000</td>
										<td class="p-2 tx_sms1">₹1,350,000</td>
										<td class="p-2 tx_sms1">₹1,350,000</td>
										<td class="p-2 tx_sms1">₹1,350,000</td>
										<td class="p-2 tx_sms1">₹1,350,000</td>
										<td class="p-2 tx_sms1">₹1,350,000</td>
										<td class="p-2 tx_sms1">₹1,350,000</td>
										<td class="p-2 tx_sms1">₹1,350,000</td>
										<td class="p-2 tx_sms1">₹1,350,000</td>
										<td class="p-2 tx_sms1">₹1,350,000</td>
										<td class="p-2 tx_sms1">₹1,350,000</td>
										<td class="p-2 tx_sms1">₹1,350,000</td>
										<td class="p-2 tx_sms1">₹1,350,000</td>
										<td class="p-2 tx_sms1">₹1,350,000</td>
										<td class="p-2 tx_sms1">₹1,350,000</td>
										<td class="p-2 tx_sms1">₹1,350,000</td>
										<td class="p-2 tx_sms1">₹1,350,000</td>
										<td class="p-2 tx_sms1">₹1,350,000</td>
										<td class="p-2 tx_sms1">₹1,350,000</td>
										<td class="p-2 tx_sms1">₹1,350,000</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>

					
					<div class="mt-5">
						<div class="propfixsd new_propertyy hollss">
							<canvas id="ROIROEHoldingPeriod"></canvas>
							<div class="btm_list_areaaas">
								<ul>
									<li>Market Value</li>
									<li>Total Accumulated Equity</li>
									<li>Total Accumulated Cash Flow</li>
								</ul>
							</div>
						</div>
					</div>
					
					 <!---- Help ---->
				    <section class="al_sec_araea mt_50p pb-0">
					 <div class="row mt-4">
						<div class="col-12 col-sm-12">
							<div class="row mb-4">
								<div class="col-lg-12">
									<div class="alss_pagess" id="alss_pgesss">
										<h3>Need Help?</h3>

										<p>Explore our resources to quickly get started with Flowlu business management software</p>
									</div>
								</div>

								<div class="col-lg-4">
									<div class="hpls_box">
										<div class="ovr_centetent">
											<p>Book online demo</p>

											<a href="javascript:void(0);">Get a demo</a>
										</div>

										<img src="{{ url('home/img/hlp_1.png')}}" alt="" />
									</div>
								</div>

								<div class="col-lg-4">
									<div class="hpls_box">
										<div class="ovr_centetent">
											<p>Find the answers</p>

											<a href="javascript:void(0);">Knowledge base</a>
										</div>

										<img src="{{ url('home/img/hlp_2.png')}}" alt="" />
									</div>
								</div>

								<div class="col-lg-4">
									<div class="hpls_box">
										<div class="ovr_centetent">
											<p>Ask questions</p>

											<a href="javascript:void(0);">Support chat</a>
										</div>

										<img src="{{ url('home/img/hlp_3.png')}}" alt="" />
									</div>
								</div>
							</div>
						</div>
					</div>
				    </section>
				    <!---- Help ---->
				</div>

				 <div id="tab-mild" class="tab-content">
				   <!--- Download --->
				    <a href="javascript:void(0);" id="dwn_loadss">Download <i class="fa fa-download"></i></a>
				   <!--- Download --->
                   <div class="propfixsd new_propertyy hollss p-0 sticky_und">
                        <div class="table-responsive table-fixed-labels properties-comparison-table">
                            <table class="table table-nowrap table-no-borders table-align-right table-condensed als_show_ar">
                                <tbody>
                                    <tr>
                                        <td class="text-right p-2 tx_sms1">Years (starting the year of Rent Out) -></td>
                                    </tr>
                                    <tr>
                                        <td class="text-right p-2 tx_sms1">Property Number Purchased -></td>
                                    </tr>
                                    <tr>
                                        <td class="text-right p-2 tx_sms1">Years -></td>
                                    </tr>
                                </tbody>
								
								<tbody>
                                    <tr>
                                        <td class="text-left p-1 tx_sms1 black_bg">&nbsp;</td>
                                    </tr>

									<tr>
                                        <td class="text-left p-2 tx_sms1">Market Value Of The Portfolio</td>
                                    </tr>
                                    <tr>
                                        <td class="text-left p-2 tx_sms1">Total Networth (Equity)</td>
                                    </tr>
                                    <tr>
                                        <td class="text-left p-2 tx_sms1 redss">Down Payment</td>
                                    </tr>
                                    <tr>
                                        <td class="text-left p-2 tx_sms1 blue">Accumulated Down Payment</td>
                                    </tr>
                                    <tr>
                                        <td class="text-left p-2 tx_sms1">Annual Cash Flow (ACF)</td>
                                    </tr>
                                    <tr>
                                        <td class="text-left p-2 tx_sms1">Accumulated Cash Flow (ACCU.CF)</td>
                                    </tr>
                                    <tr>
                                        <td class="text-left p-2 tx_sms1 redss">Total Profit on Sale:</td>
                                    </tr>
                                    <tr>
                                        <td class="text-left p-2 tx_sms1">Return on Investment(%)</td>
                                    </tr>
                                    <tr>
                                        <td class="text-left p-2 tx_sms1 greas_bg">Total Roi (Equity + Cash Flow)</td>
                                    </tr>
                                </tbody>


								<tbody>
                                    <tr>
                                        <td class="text-left p-2 tx_sms1 black_bg">01 Accumulation Of Properties</td>
                                    </tr>
                                    <tr>
                                        <td class="text-left p-2 tx_sms1">Total Networth (Equity)</td>
                                    </tr>
                                    <tr>
                                        <td class="text-left p-2 tx_sms1 redss">Down Payment</td>
                                    </tr>
                                    <tr>
                                        <td class="text-left p-2 tx_sms1 blue">Accumulated Down Payment</td>
                                    </tr>
                                    <tr>
                                        <td class="text-left p-2 tx_sms1">Annual Cash Flow (ACF)</td>
                                    </tr>
                                    <tr>
                                        <td class="text-left p-2 tx_sms1">Accumulated Cash Flow (ACCU.CF)</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <div class="table-responsive table-fixed-labels properties-comparison-table secendss">
                            <table class="table table-nowrap table-no-borders table-align-right table-condensed mb-0">
                                <tbody>
                                    <tr>
                                        <td class="p-2 tx_sms1 yellow_bg">Year 2012</td>
                                        <td class="p-2 tx_sms1">Year 2013</td>
                                        <td class="p-2 tx_sms1">Year 2014</td>
                                        <td class="p-2 tx_sms1">Year 2015</td>
                                        <td class="p-2 tx_sms1 yellow_bg">Year 2016</td>
                                        <td class="p-2 tx_sms1">Year 2017</td>
                                        <td class="p-2 tx_sms1">Year 2018</td>
                                        <td class="p-2 tx_sms1 yellow_bg">Year 2019</td>
                                        <td class="p-2 tx_sms1">Year 2020</td>
                                        <td class="p-2 tx_sms1">Year 2021</td>
                                        <td class="p-2 tx_sms1 yellow_bg">Year 2022</td>
                                        <td class="p-2 tx_sms1">Year 2023</td>
                                        <td class="p-2 tx_sms1">Year 2024</td>
                                        <td class="p-2 tx_sms1 yellow_bg">Year 2025</td>
                                        <td class="p-2 tx_sms1">Year 2026</td>
                                        <td class="p-2 tx_sms1 yellow_bg">Year 2027</td>
                                        <td class="p-2 tx_sms1 yellow_bg">Year 2028</td>
                                        <td class="p-2 tx_sms1 yellow_bg">Year 2029</td>
                                        <td class="p-2 tx_sms1 yellow_bg">Year 2030</td>
                                        <td class="p-2 tx_sms1 yellow_bg">Year 2031</td>
                                        <td class="p-2 tx_sms1 greanns_bg">Year 2031</td>
                                        <td class="p-2 tx_sms1 greanns_bg">Year 2032</td>
                                        <td class="p-2 tx_sms1 greanns_bg">Year 2033</td>
                                    </tr>
                                    <tr>
                                        <td class="p-2 tx_sms1 yellow_bg">Property 1</td>
                                        <td class="p-2 tx_sms1">-</td>
                                        <td class="p-2 tx_sms1">-</td>
                                        <td class="p-2 tx_sms1">-</td>
                                        <td class="p-2 tx_sms1 yellow_bg">Property 2</td>
                                        <td class="p-2 tx_sms1">-</td>
                                        <td class="p-2 tx_sms1">-</td>
                                        <td class="p-2 tx_sms1 yellow_bg">Property 3</td>
                                        <td class="p-2 tx_sms1">-</td>
                                        <td class="p-2 tx_sms1">-</td>
                                        <td class="p-2 tx_sms1 yellow_bg">Property 4</td>
                                        <td class="p-2 tx_sms1">-</td>
                                        <td class="p-2 tx_sms1">-</td>
                                        <td class="p-2 tx_sms1 yellow_bg">Property 5</td>
                                        <td class="p-2 tx_sms1">-</td>
                                        <td class="p-2 tx_sms1 yellow_bg">Property 6</td>
                                        <td class="p-2 tx_sms1 yellow_bg">Property 7</td>
                                        <td class="p-2 tx_sms1 yellow_bg">Property 9</td>
                                        <td class="p-2 tx_sms1 yellow_bg">Property 9</td>
                                        <td class="p-2 tx_sms1 yellow_bg">Property 10</td>
                                        <td class="p-2 tx_sms1 yellow_bg">&nbsp;</td>
                                        <td class="p-2 tx_sms1 yellow_bg">&nbsp;</td>
                                        <td class="p-2 tx_sms1 yellow_bg">&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td class="p-2 tx_sms1 yellow_bg">1</td>
                                        <td class="p-2 tx_sms1">2</td>
                                        <td class="p-2 tx_sms1">3</td>
                                        <td class="p-2 tx_sms1">4</td>
                                        <td class="p-2 tx_sms1 yellow_bg">5</td>
                                        <td class="p-2 tx_sms1">6</td>
                                        <td class="p-2 tx_sms1">7</td>
                                        <td class="p-2 tx_sms1 yellow_bg">8</td>
                                        <td class="p-2 tx_sms1">9</td>
                                        <td class="p-2 tx_sms1">11</td>
                                        <td class="p-2 tx_sms1 yellow_bg">11</td>
                                        <td class="p-2 tx_sms1">12</td>
                                        <td class="p-2 tx_sms1">13</td>
                                        <td class="p-2 tx_sms1 yellow_bg">14</td>
                                        <td class="p-2 tx_sms1">15</td>
                                        <td class="p-2 tx_sms1 yellow_bg">16</td>
                                        <td class="p-2 tx_sms1 yellow_bg">17</td>
                                        <td class="p-2 tx_sms1 yellow_bg">18</td>
                                        <td class="p-2 tx_sms1 yellow_bg">19</td>
                                        <td class="p-2 tx_sms1 yellow_bg">20</td>
                                        <td class="p-2 tx_sms1 greanns_bg">21</td>
                                        <td class="p-2 tx_sms1 greanns_bg">12</td>
                                        <td class="p-2 tx_sms1 greanns_bg">23</td>
                                    </tr>
                                </tbody>
								
								<tbody>
								    <tr>
                                        <td class="p-1 tx_sms1 black_bg">&nbsp;</td>                                          
                                        <td class="p-1 tx_sms1 black_bg">&nbsp;</td>                                          
                                        <td class="p-1 tx_sms1 black_bg">&nbsp;</td>                                          
                                        <td class="p-1 tx_sms1 black_bg">&nbsp;</td>                                          
                                        <td class="p-1 tx_sms1 black_bg">&nbsp;</td>                                          
                                        <td class="p-1 tx_sms1 black_bg">&nbsp;</td>                                          
                                        <td class="p-1 tx_sms1 black_bg">&nbsp;</td>                                          
                                        <td class="p-1 tx_sms1 black_bg">&nbsp;</td>                                          
                                        <td class="p-1 tx_sms1 black_bg">&nbsp;</td>                                          
                                        <td class="p-1 tx_sms1 black_bg">&nbsp;</td>                                          
                                        <td class="p-1 tx_sms1 black_bg">&nbsp;</td>                                          
                                        <td class="p-1 tx_sms1 black_bg">&nbsp;</td>                                          
                                        <td class="p-1 tx_sms1 black_bg">&nbsp;</td>                                          
                                        <td class="p-1 tx_sms1 black_bg">&nbsp;</td>                                          
                                        <td class="p-1 tx_sms1 black_bg">&nbsp;</td>                                          
                                        <td class="p-1 tx_sms1 black_bg">&nbsp;</td>                                          
                                        <td class="p-1 tx_sms1 black_bg">&nbsp;</td>                                          
                                        <td class="p-1 tx_sms1 black_bg">&nbsp;</td>                                          
                                        <td class="p-1 tx_sms1 black_bg">&nbsp;</td>                                          
                                        <td class="p-1 tx_sms1 black_bg">&nbsp;</td>                                          
                                        <td class="p-1 tx_sms1 black_bg">&nbsp;</td>                                          
                                        <td class="p-1 tx_sms1 black_bg">&nbsp;</td>                                          
                                        <td class="p-1 tx_sms1 black_bg">&nbsp;</td>                                          
                                    </tr>
                                    <tr>
                                        <td class="p-2 tx_sms1">₹5,250,000</td>                                        
                                        <td class="p-2 tx_sms1">₹5,250,000</td>                                        
                                        <td class="p-2 tx_sms1">₹5,250,000</td>                                        
                                        <td class="p-2 tx_sms1">₹5,250,000</td>                                        
                                        <td class="p-2 tx_sms1">₹5,250,000</td>                                        
                                        <td class="p-2 tx_sms1">₹5,250,000</td>                                        
                                        <td class="p-2 tx_sms1">₹5,250,000</td>                                        
                                        <td class="p-2 tx_sms1">₹5,250,000</td>                                        
                                        <td class="p-2 tx_sms1">₹5,250,000</td>                                        
                                        <td class="p-2 tx_sms1">₹5,250,000</td>                                        
                                        <td class="p-2 tx_sms1">₹5,250,000</td>                                        
                                        <td class="p-2 tx_sms1">₹5,250,000</td>                                        
                                        <td class="p-2 tx_sms1">₹5,250,000</td>                                        
                                        <td class="p-2 tx_sms1">₹5,250,000</td>                                        
                                        <td class="p-2 tx_sms1">₹5,250,000</td>                                        
                                        <td class="p-2 tx_sms1">₹5,250,000</td>                                        
                                        <td class="p-2 tx_sms1">₹5,250,000</td>                                        
                                        <td class="p-2 tx_sms1">₹5,250,000</td>                                        
                                        <td class="p-2 tx_sms1">₹5,250,000</td>                                        
                                        <td class="p-2 tx_sms1">₹5,250,000</td>                                        
                                        <td class="p-2 tx_sms1">₹5,250,000</td>                                        
                                        <td class="p-2 tx_sms1">₹5,250,000</td>                                        
                                        <td class="p-2 tx_sms1">₹5,250,000</td>                                        
                                    </tr>
                                    <tr>
                                        <td class="p-2 tx_sms1">₹1,250,000</td>                                        
                                        <td class="p-2 tx_sms1">₹1,250,000</td>                                        
                                        <td class="p-2 tx_sms1">₹1,250,000</td>                                        
                                        <td class="p-2 tx_sms1">₹1,250,000</td>                                        
                                        <td class="p-2 tx_sms1">₹1,250,000</td>                                        
                                        <td class="p-2 tx_sms1">₹1,250,000</td>                                        
                                        <td class="p-2 tx_sms1">₹1,250,000</td>                                        
                                        <td class="p-2 tx_sms1">₹1,250,000</td>                                        
                                        <td class="p-2 tx_sms1">₹1,250,000</td>                                        
                                        <td class="p-2 tx_sms1">₹1,250,000</td>                                        
                                        <td class="p-2 tx_sms1">₹1,250,000</td>                                        
                                        <td class="p-2 tx_sms1">₹1,250,000</td>                                        
                                        <td class="p-2 tx_sms1">₹1,250,000</td>                                        
                                        <td class="p-2 tx_sms1">₹1,250,000</td>                                        
                                        <td class="p-2 tx_sms1">₹1,250,000</td>                                        
                                        <td class="p-2 tx_sms1">₹1,250,000</td>                                        
                                        <td class="p-2 tx_sms1">₹1,250,000</td>                                        
                                        <td class="p-2 tx_sms1">₹1,250,000</td>                                        
                                        <td class="p-2 tx_sms1">₹1,250,000</td>                                        
                                        <td class="p-2 tx_sms1">₹1,250,000</td>                                        
                                        <td class="p-2 tx_sms1">₹1,250,000</td>                                        
                                        <td class="p-2 tx_sms1">₹1,250,000</td>                                        
                                        <td class="p-2 tx_sms1">₹1,250,000</td>                                        
                                    </tr>

                                    <tr>
                                        <td class="p-2 tx_sms1 redss">₹1,350,000</td>                                        
                                        <td class="p-2 tx_sms1 redss">₹1,350,000</td>                                        
                                        <td class="p-2 tx_sms1 redss">₹1,350,000</td>                                        
                                        <td class="p-2 tx_sms1 redss">₹1,350,000</td>                                        
                                        <td class="p-2 tx_sms1 redss">₹1,350,000</td>                                        
                                        <td class="p-2 tx_sms1 redss">₹1,350,000</td>                                        
                                        <td class="p-2 tx_sms1 redss">₹1,350,000</td>                                        
                                        <td class="p-2 tx_sms1 redss">₹1,350,000</td>                                        
                                        <td class="p-2 tx_sms1 redss">₹1,350,000</td>                                        
                                        <td class="p-2 tx_sms1 redss">₹1,350,000</td>                                        
                                        <td class="p-2 tx_sms1 redss">₹1,350,000</td>                                        
                                        <td class="p-2 tx_sms1 redss">₹1,350,000</td>                                        
                                        <td class="p-2 tx_sms1 redss">₹1,350,000</td>                                        
                                        <td class="p-2 tx_sms1 redss">₹1,350,000</td>                                        
                                        <td class="p-2 tx_sms1 redss">₹1,350,000</td>                                        
                                        <td class="p-2 tx_sms1 redss">₹1,350,000</td>                                        
                                        <td class="p-2 tx_sms1 redss">₹1,350,000</td>                                        
                                        <td class="p-2 tx_sms1 redss">₹1,350,000</td>                                        
                                        <td class="p-2 tx_sms1 redss">₹1,350,000</td>                                        
                                        <td class="p-2 tx_sms1 redss">₹1,350,000</td>                                        
                                        <td class="p-2 tx_sms1 redss">₹1,350,000</td>                                        
                                        <td class="p-2 tx_sms1 redss">₹1,350,000</td>                                        
                                        <td class="p-2 tx_sms1 redss">₹1,350,000</td>                                        
                                    </tr>
									<tr>
                                        <td class="p-2 tx_sms1 blue">₹5,250,000</td>                                        
                                        <td class="p-2 tx_sms1 blue">₹5,250,000</td>                                        
                                        <td class="p-2 tx_sms1 blue">₹5,250,000</td>                                        
                                        <td class="p-2 tx_sms1 blue">₹5,250,000</td>                                        
                                        <td class="p-2 tx_sms1 blue">₹5,250,000</td>                                        
                                        <td class="p-2 tx_sms1 blue">₹5,250,000</td>                                        
                                        <td class="p-2 tx_sms1 blue">₹5,250,000</td>                                        
                                        <td class="p-2 tx_sms1 blue">₹5,250,000</td>                                        
                                        <td class="p-2 tx_sms1 blue">₹5,250,000</td>                                        
                                        <td class="p-2 tx_sms1 blue">₹5,250,000</td>                                        
                                        <td class="p-2 tx_sms1 blue">₹5,250,000</td>                                        
                                        <td class="p-2 tx_sms1 blue">₹5,250,000</td>                                        
                                        <td class="p-2 tx_sms1 blue">₹5,250,000</td>                                        
                                        <td class="p-2 tx_sms1 blue">₹5,250,000</td>                                        
                                        <td class="p-2 tx_sms1 blue">₹5,250,000</td>                                        
                                        <td class="p-2 tx_sms1 blue">₹5,250,000</td>                                        
                                        <td class="p-2 tx_sms1 blue">₹5,250,000</td>                                        
                                        <td class="p-2 tx_sms1 blue">₹5,250,000</td>                                        
                                        <td class="p-2 tx_sms1 blue">₹5,250,000</td>                                        
                                        <td class="p-2 tx_sms1 blue">₹5,250,000</td>                                        
                                        <td class="p-2 tx_sms1 blue">₹5,250,000</td>                                        
                                        <td class="p-2 tx_sms1 blue">₹5,250,000</td>                                        
                                        <td class="p-2 tx_sms1 blue">₹5,250,000</td>                                        
                                    </tr>
                                    <tr>
                                        <td class="p-2 tx_sms1">₹1,250,000</td>                                        
                                        <td class="p-2 tx_sms1">₹1,250,000</td>                                        
                                        <td class="p-2 tx_sms1">₹1,250,000</td>                                        
                                        <td class="p-2 tx_sms1">₹1,250,000</td>                                        
                                        <td class="p-2 tx_sms1">₹1,250,000</td>                                        
                                        <td class="p-2 tx_sms1">₹1,250,000</td>                                        
                                        <td class="p-2 tx_sms1">₹1,250,000</td>                                        
                                        <td class="p-2 tx_sms1">₹1,250,000</td>                                        
                                        <td class="p-2 tx_sms1">₹1,250,000</td>                                        
                                        <td class="p-2 tx_sms1">₹1,250,000</td>                                        
                                        <td class="p-2 tx_sms1">₹1,250,000</td>                                        
                                        <td class="p-2 tx_sms1">₹1,250,000</td>                                        
                                        <td class="p-2 tx_sms1">₹1,250,000</td>                                        
                                        <td class="p-2 tx_sms1">₹1,250,000</td>                                        
                                        <td class="p-2 tx_sms1">₹1,250,000</td>                                        
                                        <td class="p-2 tx_sms1">₹1,250,000</td>                                        
                                        <td class="p-2 tx_sms1">₹1,250,000</td>                                        
                                        <td class="p-2 tx_sms1">₹1,250,000</td>                                        
                                        <td class="p-2 tx_sms1">₹1,250,000</td>                                        
                                        <td class="p-2 tx_sms1">₹1,250,000</td>                                        
                                        <td class="p-2 tx_sms1">₹1,250,000</td>                                        
                                        <td class="p-2 tx_sms1">₹1,250,000</td>                                        
                                        <td class="p-2 tx_sms1">₹1,250,000</td>                                        
                                    </tr>

                                    <tr>
                                        <td class="p-2 tx_sms1">₹1,350,000</td>                                        
                                        <td class="p-2 tx_sms1">₹1,350,000</td>                                        
                                        <td class="p-2 tx_sms1">₹1,350,000</td>                                        
                                        <td class="p-2 tx_sms1">₹1,350,000</td>                                        
                                        <td class="p-2 tx_sms1">₹1,350,000</td>                                        
                                        <td class="p-2 tx_sms1">₹1,350,000</td>                                        
                                        <td class="p-2 tx_sms1">₹1,350,000</td>                                        
                                        <td class="p-2 tx_sms1">₹1,350,000</td>                                        
                                        <td class="p-2 tx_sms1">₹1,350,000</td>                                        
                                        <td class="p-2 tx_sms1">₹1,350,000</td>                                        
                                        <td class="p-2 tx_sms1">₹1,350,000</td>                                        
                                        <td class="p-2 tx_sms1">₹1,350,000</td>                                        
                                        <td class="p-2 tx_sms1">₹1,350,000</td>                                        
                                        <td class="p-2 tx_sms1">₹1,350,000</td>                                        
                                        <td class="p-2 tx_sms1">₹1,350,000</td>                                        
                                        <td class="p-2 tx_sms1">₹1,350,000</td>                                        
                                        <td class="p-2 tx_sms1">₹1,350,000</td>                                        
                                        <td class="p-2 tx_sms1">₹1,350,000</td>                                        
                                        <td class="p-2 tx_sms1">₹1,350,000</td>                                        
                                        <td class="p-2 tx_sms1">₹1,350,000</td>                                        
                                        <td class="p-2 tx_sms1">₹1,350,000</td>                                        
                                        <td class="p-2 tx_sms1">₹1,350,000</td>                                        
                                        <td class="p-2 tx_sms1">₹1,350,000</td>                                        
                                    </tr>
									
									<tr>
                                        <td class="p-2 tx_sms1 redss">₹5,250,000</td>                                        
                                        <td class="p-2 tx_sms1 redss">₹5,250,000</td>                                        
                                        <td class="p-2 tx_sms1 redss">₹5,250,000</td>                                        
                                        <td class="p-2 tx_sms1 redss">₹5,250,000</td>                                        
                                        <td class="p-2 tx_sms1 redss">₹5,250,000</td>                                        
                                        <td class="p-2 tx_sms1 redss">₹5,250,000</td>                                        
                                        <td class="p-2 tx_sms1 redss">₹5,250,000</td>                                        
                                        <td class="p-2 tx_sms1 redss">₹5,250,000</td>                                        
                                        <td class="p-2 tx_sms1 redss">₹5,250,000</td>                                        
                                        <td class="p-2 tx_sms1 redss">₹5,250,000</td>                                        
                                        <td class="p-2 tx_sms1 redss">₹5,250,000</td>                                        
                                        <td class="p-2 tx_sms1 redss">₹5,250,000</td>                                        
                                        <td class="p-2 tx_sms1 redss">₹5,250,000</td>                                        
                                        <td class="p-2 tx_sms1 redss">₹5,250,000</td>                                        
                                        <td class="p-2 tx_sms1 redss">₹5,250,000</td>                                        
                                        <td class="p-2 tx_sms1 redss">₹5,250,000</td>                                        
                                        <td class="p-2 tx_sms1 redss">₹5,250,000</td>                                        
                                        <td class="p-2 tx_sms1 redss">₹5,250,000</td>                                        
                                        <td class="p-2 tx_sms1 redss">₹5,250,000</td>                                        
                                        <td class="p-2 tx_sms1 redss">₹5,250,000</td>                                        
                                        <td class="p-2 tx_sms1 redss">₹5,250,000</td>                                        
                                        <td class="p-2 tx_sms1 redss">₹5,250,000</td>                                        
                                        <td class="p-2 tx_sms1 redss">₹5,250,000</td>                                        
                                    </tr>
                                    <tr>
                                        <td class="p-2 tx_sms1">₹1,250,000</td>                                        
                                        <td class="p-2 tx_sms1">₹1,250,000</td>                                        
                                        <td class="p-2 tx_sms1">₹1,250,000</td>                                        
                                        <td class="p-2 tx_sms1">₹1,250,000</td>                                        
                                        <td class="p-2 tx_sms1">₹1,250,000</td>                                        
                                        <td class="p-2 tx_sms1">₹1,250,000</td>                                        
                                        <td class="p-2 tx_sms1">₹1,250,000</td>                                        
                                        <td class="p-2 tx_sms1">₹1,250,000</td>                                        
                                        <td class="p-2 tx_sms1">₹1,250,000</td>                                        
                                        <td class="p-2 tx_sms1">₹1,250,000</td>                                        
                                        <td class="p-2 tx_sms1">₹1,250,000</td>                                        
                                        <td class="p-2 tx_sms1">₹1,250,000</td>                                        
                                        <td class="p-2 tx_sms1">₹1,250,000</td>                                        
                                        <td class="p-2 tx_sms1">₹1,250,000</td>                                        
                                        <td class="p-2 tx_sms1">₹1,250,000</td>                                        
                                        <td class="p-2 tx_sms1">₹1,250,000</td>                                        
                                        <td class="p-2 tx_sms1">₹1,250,000</td>                                        
                                        <td class="p-2 tx_sms1">₹1,250,000</td>                                        
                                        <td class="p-2 tx_sms1">₹1,250,000</td>                                        
                                        <td class="p-2 tx_sms1">₹1,250,000</td>                                        
                                        <td class="p-2 tx_sms1">₹1,250,000</td>                                        
                                        <td class="p-2 tx_sms1">₹1,250,000</td>                                        
                                        <td class="p-2 tx_sms1">₹1,250,000</td>                                        
                                    </tr>

                                    <tr>
                                        <td class="p-2 tx_sms1 greas_bg">₹1,350,000</td>                                        
                                        <td class="p-2 tx_sms1 greas_bg">₹1,350,000</td>                                        
                                        <td class="p-2 tx_sms1 greas_bg">₹1,350,000</td>                                        
                                        <td class="p-2 tx_sms1 greas_bg">₹1,350,000</td>                                        
                                        <td class="p-2 tx_sms1 greas_bg">₹1,350,000</td>                                        
                                        <td class="p-2 tx_sms1 greas_bg">₹1,350,000</td>                                        
                                        <td class="p-2 tx_sms1 greas_bg">₹1,350,000</td>                                        
                                        <td class="p-2 tx_sms1 greas_bg">₹1,350,000</td>                                        
                                        <td class="p-2 tx_sms1 greas_bg">₹1,350,000</td>                                        
                                        <td class="p-2 tx_sms1 greas_bg">₹1,350,000</td>                                        
                                        <td class="p-2 tx_sms1 greas_bg">₹1,350,000</td>                                        
                                        <td class="p-2 tx_sms1 greas_bg">₹1,350,000</td>                                        
                                        <td class="p-2 tx_sms1 greas_bg">₹1,350,000</td>                                        
                                        <td class="p-2 tx_sms1 greas_bg">₹1,350,000</td>                                        
                                        <td class="p-2 tx_sms1 greas_bg">₹1,350,000</td>                                        
                                        <td class="p-2 tx_sms1 greas_bg">₹1,350,000</td>                                        
                                        <td class="p-2 tx_sms1 greas_bg">₹1,350,000</td>                                        
                                        <td class="p-2 tx_sms1 greas_bg">₹1,350,000</td>                                        
                                        <td class="p-2 tx_sms1 greas_bg">₹1,350,000</td>                                        
                                        <td class="p-2 tx_sms1 greas_bg">₹1,350,000</td>                                        
                                        <td class="p-2 tx_sms1 greas_bg">₹1,350,000</td>                                        
                                        <td class="p-2 tx_sms1 greas_bg">₹1,350,000</td>                                        
                                        <td class="p-2 tx_sms1 greas_bg">₹1,350,000</td>                                        
                                    </tr>
                                    
                                </tbody>
								
								
								<tbody>
                                    <tr>
                                        <td class="p-2 tx_sms1 black_bg">&nbsp;</td>                                          
                                        <td class="p-2 tx_sms1 black_bg">&nbsp;</td>                                          
                                        <td class="p-2 tx_sms1 black_bg">&nbsp;</td>                                          
                                        <td class="p-2 tx_sms1 black_bg">&nbsp;</td>                                          
                                        <td class="p-2 tx_sms1 black_bg">&nbsp;</td>                                          
                                        <td class="p-2 tx_sms1 black_bg">&nbsp;</td>                                          
                                        <td class="p-2 tx_sms1 black_bg">&nbsp;</td>                                          
                                        <td class="p-2 tx_sms1 black_bg">&nbsp;</td>                                          
                                        <td class="p-2 tx_sms1 black_bg">&nbsp;</td>                                          
                                        <td class="p-2 tx_sms1 black_bg">&nbsp;</td>                                          
                                        <td class="p-2 tx_sms1 black_bg">&nbsp;</td>                                          
                                        <td class="p-2 tx_sms1 black_bg">&nbsp;</td>                                          
                                        <td class="p-2 tx_sms1 black_bg">&nbsp;</td>                                          
                                        <td class="p-2 tx_sms1 black_bg">&nbsp;</td>                                          
                                        <td class="p-2 tx_sms1 black_bg">&nbsp;</td>                                          
                                        <td class="p-2 tx_sms1 black_bg">&nbsp;</td>                                          
                                        <td class="p-2 tx_sms1 black_bg">&nbsp;</td>                                          
                                        <td class="p-2 tx_sms1 black_bg">&nbsp;</td>                                          
                                        <td class="p-2 tx_sms1 black_bg">&nbsp;</td>                                          
                                        <td class="p-2 tx_sms1 black_bg">&nbsp;</td>                                          
                                        <td class="p-2 tx_sms1 black_bg">&nbsp;</td>                                          
                                        <td class="p-2 tx_sms1 black_bg">&nbsp;</td>                                          
                                        <td class="p-2 tx_sms1 black_bg">&nbsp;</td>                                          
                                    </tr>
                                    <tr>
                                        <td class="p-2 tx_sms1">₹1,250,000</td>                                        
                                        <td class="p-2 tx_sms1">₹1,250,000</td>                                        
                                        <td class="p-2 tx_sms1">₹1,250,000</td>                                        
                                        <td class="p-2 tx_sms1">₹1,250,000</td>                                        
                                        <td class="p-2 tx_sms1">₹1,250,000</td>                                        
                                        <td class="p-2 tx_sms1">₹1,250,000</td>                                        
                                        <td class="p-2 tx_sms1">₹1,250,000</td>                                        
                                        <td class="p-2 tx_sms1">₹1,250,000</td>                                        
                                        <td class="p-2 tx_sms1">₹1,250,000</td>                                        
                                        <td class="p-2 tx_sms1">₹1,250,000</td>                                        
                                        <td class="p-2 tx_sms1">₹1,250,000</td>                                        
                                        <td class="p-2 tx_sms1">₹1,250,000</td>                                        
                                        <td class="p-2 tx_sms1">₹1,250,000</td>                                        
                                        <td class="p-2 tx_sms1">₹1,250,000</td>                                        
                                        <td class="p-2 tx_sms1">₹1,250,000</td>                                        
                                        <td class="p-2 tx_sms1">₹1,250,000</td>                                        
                                        <td class="p-2 tx_sms1">₹1,250,000</td>                                        
                                        <td class="p-2 tx_sms1">₹1,250,000</td>                                        
                                        <td class="p-2 tx_sms1">₹1,250,000</td>                                        
                                        <td class="p-2 tx_sms1">₹1,250,000</td>                                        
                                        <td class="p-2 tx_sms1">₹1,250,000</td>                                        
                                        <td class="p-2 tx_sms1">₹1,250,000</td>                                        
                                        <td class="p-2 tx_sms1">₹1,250,000</td>                                        
                                    </tr>

                                    <tr>
                                        <td class="p-2 tx_sms1 redss">₹1,350,000</td>                                        
                                        <td class="p-2 tx_sms1 redss">₹1,350,000</td>                                        
                                        <td class="p-2 tx_sms1 redss">₹1,350,000</td>                                        
                                        <td class="p-2 tx_sms1 redss">₹1,350,000</td>                                        
                                        <td class="p-2 tx_sms1 redss">₹1,350,000</td>                                        
                                        <td class="p-2 tx_sms1 redss">₹1,350,000</td>                                        
                                        <td class="p-2 tx_sms1 redss">₹1,350,000</td>                                        
                                        <td class="p-2 tx_sms1 redss">₹1,350,000</td>                                        
                                        <td class="p-2 tx_sms1 redss">₹1,350,000</td>                                        
                                        <td class="p-2 tx_sms1 redss">₹1,350,000</td>                                        
                                        <td class="p-2 tx_sms1 redss">₹1,350,000</td>                                        
                                        <td class="p-2 tx_sms1 redss">₹1,350,000</td>                                        
                                        <td class="p-2 tx_sms1 redss">₹1,350,000</td>                                        
                                        <td class="p-2 tx_sms1 redss">₹1,350,000</td>                                        
                                        <td class="p-2 tx_sms1 redss">₹1,350,000</td>                                        
                                        <td class="p-2 tx_sms1 redss">₹1,350,000</td>                                        
                                        <td class="p-2 tx_sms1 redss">₹1,350,000</td>                                        
                                        <td class="p-2 tx_sms1 redss">₹1,350,000</td>                                        
                                        <td class="p-2 tx_sms1 redss">₹1,350,000</td>                                        
                                        <td class="p-2 tx_sms1 redss">₹1,350,000</td>                                        
                                        <td class="p-2 tx_sms1 redss">₹1,350,000</td>                                        
                                        <td class="p-2 tx_sms1 redss">₹1,350,000</td>                                        
                                        <td class="p-2 tx_sms1 redss">₹1,350,000</td>                                        
                                    </tr>
									<tr>
                                        <td class="p-2 tx_sms1 blue">₹5,250,000</td>                                        
                                        <td class="p-2 tx_sms1 blue">₹5,250,000</td>                                        
                                        <td class="p-2 tx_sms1 blue">₹5,250,000</td>                                        
                                        <td class="p-2 tx_sms1 blue">₹5,250,000</td>                                        
                                        <td class="p-2 tx_sms1 blue">₹5,250,000</td>                                        
                                        <td class="p-2 tx_sms1 blue">₹5,250,000</td>                                        
                                        <td class="p-2 tx_sms1 blue">₹5,250,000</td>                                        
                                        <td class="p-2 tx_sms1 blue">₹5,250,000</td>                                        
                                        <td class="p-2 tx_sms1 blue">₹5,250,000</td>                                        
                                        <td class="p-2 tx_sms1 blue">₹5,250,000</td>                                        
                                        <td class="p-2 tx_sms1 blue">₹5,250,000</td>                                        
                                        <td class="p-2 tx_sms1 blue">₹5,250,000</td>                                        
                                        <td class="p-2 tx_sms1 blue">₹5,250,000</td>                                        
                                        <td class="p-2 tx_sms1 blue">₹5,250,000</td>                                        
                                        <td class="p-2 tx_sms1 blue">₹5,250,000</td>                                        
                                        <td class="p-2 tx_sms1 blue">₹5,250,000</td>                                        
                                        <td class="p-2 tx_sms1 blue">₹5,250,000</td>                                        
                                        <td class="p-2 tx_sms1 blue">₹5,250,000</td>                                        
                                        <td class="p-2 tx_sms1 blue">₹5,250,000</td>                                        
                                        <td class="p-2 tx_sms1 blue">₹5,250,000</td>                                        
                                        <td class="p-2 tx_sms1 blue">₹5,250,000</td>                                        
                                        <td class="p-2 tx_sms1 blue">₹5,250,000</td>                                        
                                        <td class="p-2 tx_sms1 blue">₹5,250,000</td>                                        
                                    </tr>
                                    <tr>
                                        <td class="p-2 tx_sms1">₹1,250,000</td>                                        
                                        <td class="p-2 tx_sms1">₹1,250,000</td>                                        
                                        <td class="p-2 tx_sms1">₹1,250,000</td>                                        
                                        <td class="p-2 tx_sms1">₹1,250,000</td>                                        
                                        <td class="p-2 tx_sms1">₹1,250,000</td>                                        
                                        <td class="p-2 tx_sms1">₹1,250,000</td>                                        
                                        <td class="p-2 tx_sms1">₹1,250,000</td>                                        
                                        <td class="p-2 tx_sms1">₹1,250,000</td>                                        
                                        <td class="p-2 tx_sms1">₹1,250,000</td>                                        
                                        <td class="p-2 tx_sms1">₹1,250,000</td>                                        
                                        <td class="p-2 tx_sms1">₹1,250,000</td>                                        
                                        <td class="p-2 tx_sms1">₹1,250,000</td>                                        
                                        <td class="p-2 tx_sms1">₹1,250,000</td>                                        
                                        <td class="p-2 tx_sms1">₹1,250,000</td>                                        
                                        <td class="p-2 tx_sms1">₹1,250,000</td>                                        
                                        <td class="p-2 tx_sms1">₹1,250,000</td>                                        
                                        <td class="p-2 tx_sms1">₹1,250,000</td>                                        
                                        <td class="p-2 tx_sms1">₹1,250,000</td>                                        
                                        <td class="p-2 tx_sms1">₹1,250,000</td>                                        
                                        <td class="p-2 tx_sms1">₹1,250,000</td>                                        
                                        <td class="p-2 tx_sms1">₹1,250,000</td>                                        
                                        <td class="p-2 tx_sms1">₹1,250,000</td>                                        
                                        <td class="p-2 tx_sms1">₹1,250,000</td>                                        
                                    </tr>

                                    <tr>
                                        <td class="p-2 tx_sms1">₹1,350,000</td>                                        
                                        <td class="p-2 tx_sms1">₹1,350,000</td>                                        
                                        <td class="p-2 tx_sms1">₹1,350,000</td>                                        
                                        <td class="p-2 tx_sms1">₹1,350,000</td>                                        
                                        <td class="p-2 tx_sms1">₹1,350,000</td>                                        
                                        <td class="p-2 tx_sms1">₹1,350,000</td>                                        
                                        <td class="p-2 tx_sms1">₹1,350,000</td>                                        
                                        <td class="p-2 tx_sms1">₹1,350,000</td>                                        
                                        <td class="p-2 tx_sms1">₹1,350,000</td>                                        
                                        <td class="p-2 tx_sms1">₹1,350,000</td>                                        
                                        <td class="p-2 tx_sms1">₹1,350,000</td>                                        
                                        <td class="p-2 tx_sms1">₹1,350,000</td>                                        
                                        <td class="p-2 tx_sms1">₹1,350,000</td>                                        
                                        <td class="p-2 tx_sms1">₹1,350,000</td>                                        
                                        <td class="p-2 tx_sms1">₹1,350,000</td>                                        
                                        <td class="p-2 tx_sms1">₹1,350,000</td>                                        
                                        <td class="p-2 tx_sms1">₹1,350,000</td>                                        
                                        <td class="p-2 tx_sms1">₹1,350,000</td>                                        
                                        <td class="p-2 tx_sms1">₹1,350,000</td>                                        
                                        <td class="p-2 tx_sms1">₹1,350,000</td>                                        
                                        <td class="p-2 tx_sms1">₹1,350,000</td>                                        
                                        <td class="p-2 tx_sms1">₹1,350,000</td>                                        
                                        <td class="p-2 tx_sms1">₹1,350,000</td>                                        
                                    </tr>
									
									
                                </tbody>
                            </table>
                        </div>
                    </div>
              
				   
				   <div class="mt-5">
				     <div class="propfixsd new_propertyy hollss">
				      <canvas id="ProfitHoldingPeriod"></canvas>
					  <div class="btm_list_areaaas">
					   <ul>
					    <li>Market Value</li>
					    <li>Total Accumulated Equity</li>
					    <li>Total Accumulated Cash Flow</li>
					   </ul>
					  </div>
				     </div>
		            </div>
					
					 <!---- Help ---->
				    <section class="al_sec_araea mt_50p pb-0">
					 <div class="row mt-4">
						<div class="col-12 col-sm-12">
							<div class="row mb-4">
								<div class="col-lg-12">
									<div class="alss_pagess" id="alss_pgesss">
										<h3>Need Help?</h3>

										<p>Explore our resources to quickly get started with Flowlu business management software</p>
									</div>
								</div>

								<div class="col-lg-4">
									<div class="hpls_box">
										<div class="ovr_centetent">
											<p>Book online demo</p>

											<a href="javascript:void(0);">Get a demo</a>
										</div>

										<img src="{{ url('home/img/hlp_1.png')}}" alt="" />
									</div>
								</div>

								<div class="col-lg-4">
									<div class="hpls_box">
										<div class="ovr_centetent">
											<p>Find the answers</p>

											<a href="javascript:void(0);">Knowledge base</a>
										</div>

										<img src="{{ url('home/img/hlp_2.png')}}" alt="" />
									</div>
								</div>

								<div class="col-lg-4">
									<div class="hpls_box">
										<div class="ovr_centetent">
											<p>Ask questions</p>

											<a href="javascript:void(0);">Support chat</a>
										</div>

										<img src="{{ url('home/img/hlp_3.png')}}" alt="" />
									</div>
								</div>
							</div>
						</div>
					</div>
				    </section>
				    <!---- Help ---->
			   </div>
                
				 <div id="tab-agressive" class="tab-content">
				    <!--- Download --->
				     <a href="javascript:void(0);" id="dwn_loadss">Download <i class="fa fa-download"></i></a>
				    <!--- Download --->
                     <div class="propfixsd new_propertyy hollss p-0 sticky_und">
                        <div class="table-responsive table-fixed-labels properties-comparison-table">
                            <table class="table table-nowrap table-no-borders table-align-right table-condensed als_show_ar">
                                <tbody>
                                    <tr>
                                        <td class="text-right p-2 tx_sms1">Years (starting the year of Rent Out) -></td>
                                    </tr>
                                    <tr>
                                        <td class="text-right p-2 tx_sms1">Property Number Purchased -></td>
                                    </tr>
                                    <tr>
                                        <td class="text-right p-2 tx_sms1">Years -></td>
                                    </tr>
                                </tbody>
								
								<tbody>
                                    <tr>
                                        <td class="text-left p-1 tx_sms1 black_bg">&nbsp;</td>
                                    </tr>

									<tr>
                                        <td class="text-left p-2 tx_sms1">Market Value Of The Portfolio</td>
                                    </tr>
                                    <tr>
                                        <td class="text-left p-2 tx_sms1">Total Networth (Equity)</td>
                                    </tr>
                                    <tr>
                                        <td class="text-left p-2 tx_sms1 redss">Down Payment</td>
                                    </tr>
                                    <tr>
                                        <td class="text-left p-2 tx_sms1 blue">Accumulated Down Payment</td>
                                    </tr>
                                    <tr>
                                        <td class="text-left p-2 tx_sms1">Annual Cash Flow (ACF)</td>
                                    </tr>
                                    <tr>
                                        <td class="text-left p-2 tx_sms1">Accumulated Cash Flow (ACCU.CF)</td>
                                    </tr>
                                    <tr>
                                        <td class="text-left p-2 tx_sms1 redss">Total Profit on Sale:</td>
                                    </tr>
                                    <tr>
                                        <td class="text-left p-2 tx_sms1">Return on Investment(%)</td>
                                    </tr>
                                    <tr>
                                        <td class="text-left p-2 tx_sms1 greas_bg">Total Roi (Equity + Cash Flow)</td>
                                    </tr>
                                </tbody>


								<tbody>
                                    <tr>
                                        <td class="text-left p-2 tx_sms1 black_bg">01 Accumulation Of Properties</td>
                                    </tr>
                                    <tr>
                                        <td class="text-left p-2 tx_sms1">Total Networth (Equity)</td>
                                    </tr>
                                    <tr>
                                        <td class="text-left p-2 tx_sms1 redss">Down Payment</td>
                                    </tr>
                                    <tr>
                                        <td class="text-left p-2 tx_sms1 blue">Accumulated Down Payment</td>
                                    </tr>
                                    <tr>
                                        <td class="text-left p-2 tx_sms1">Annual Cash Flow (ACF)</td>
                                    </tr>
                                    <tr>
                                        <td class="text-left p-2 tx_sms1">Accumulated Cash Flow (ACCU.CF)</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <div class="table-responsive table-fixed-labels properties-comparison-table secendss">
                            <table class="table table-nowrap table-no-borders table-align-right table-condensed mb-0">
                                <tbody>
                                    <tr>
                                        <td class="p-2 tx_sms1 yellow_bg">Year 2012</td>
                                        <td class="p-2 tx_sms1">Year 2013</td>
                                        <td class="p-2 tx_sms1">Year 2014</td>
                                        <td class="p-2 tx_sms1">Year 2015</td>
                                        <td class="p-2 tx_sms1 yellow_bg">Year 2016</td>
                                        <td class="p-2 tx_sms1">Year 2017</td>
                                        <td class="p-2 tx_sms1">Year 2018</td>
                                        <td class="p-2 tx_sms1 yellow_bg">Year 2019</td>
                                        <td class="p-2 tx_sms1">Year 2020</td>
                                        <td class="p-2 tx_sms1">Year 2021</td>
                                        <td class="p-2 tx_sms1 yellow_bg">Year 2022</td>
                                        <td class="p-2 tx_sms1">Year 2023</td>
                                        <td class="p-2 tx_sms1">Year 2024</td>
                                        <td class="p-2 tx_sms1 yellow_bg">Year 2025</td>
                                        <td class="p-2 tx_sms1">Year 2026</td>
                                        <td class="p-2 tx_sms1 yellow_bg">Year 2027</td>
                                        <td class="p-2 tx_sms1 yellow_bg">Year 2028</td>
                                        <td class="p-2 tx_sms1 yellow_bg">Year 2029</td>
                                        <td class="p-2 tx_sms1 yellow_bg">Year 2030</td>
                                        <td class="p-2 tx_sms1 yellow_bg">Year 2031</td>
                                        <td class="p-2 tx_sms1 greanns_bg">Year 2031</td>
                                        <td class="p-2 tx_sms1 greanns_bg">Year 2032</td>
                                        <td class="p-2 tx_sms1 greanns_bg">Year 2033</td>
                                    </tr>
                                    <tr>
                                        <td class="p-2 tx_sms1 yellow_bg">Property 1</td>
                                        <td class="p-2 tx_sms1">-</td>
                                        <td class="p-2 tx_sms1">-</td>
                                        <td class="p-2 tx_sms1">-</td>
                                        <td class="p-2 tx_sms1 yellow_bg">Property 2</td>
                                        <td class="p-2 tx_sms1">-</td>
                                        <td class="p-2 tx_sms1">-</td>
                                        <td class="p-2 tx_sms1 yellow_bg">Property 3</td>
                                        <td class="p-2 tx_sms1">-</td>
                                        <td class="p-2 tx_sms1">-</td>
                                        <td class="p-2 tx_sms1 yellow_bg">Property 4</td>
                                        <td class="p-2 tx_sms1">-</td>
                                        <td class="p-2 tx_sms1">-</td>
                                        <td class="p-2 tx_sms1 yellow_bg">Property 5</td>
                                        <td class="p-2 tx_sms1">-</td>
                                        <td class="p-2 tx_sms1 yellow_bg">Property 6</td>
                                        <td class="p-2 tx_sms1 yellow_bg">Property 7</td>
                                        <td class="p-2 tx_sms1 yellow_bg">Property 9</td>
                                        <td class="p-2 tx_sms1 yellow_bg">Property 9</td>
                                        <td class="p-2 tx_sms1 yellow_bg">Property 10</td>
                                        <td class="p-2 tx_sms1 yellow_bg">&nbsp;</td>
                                        <td class="p-2 tx_sms1 yellow_bg">&nbsp;</td>
                                        <td class="p-2 tx_sms1 yellow_bg">&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td class="p-2 tx_sms1 yellow_bg">1</td>
                                        <td class="p-2 tx_sms1">2</td>
                                        <td class="p-2 tx_sms1">3</td>
                                        <td class="p-2 tx_sms1">4</td>
                                        <td class="p-2 tx_sms1 yellow_bg">5</td>
                                        <td class="p-2 tx_sms1">6</td>
                                        <td class="p-2 tx_sms1">7</td>
                                        <td class="p-2 tx_sms1 yellow_bg">8</td>
                                        <td class="p-2 tx_sms1">9</td>
                                        <td class="p-2 tx_sms1">11</td>
                                        <td class="p-2 tx_sms1 yellow_bg">11</td>
                                        <td class="p-2 tx_sms1">12</td>
                                        <td class="p-2 tx_sms1">13</td>
                                        <td class="p-2 tx_sms1 yellow_bg">14</td>
                                        <td class="p-2 tx_sms1">15</td>
                                        <td class="p-2 tx_sms1 yellow_bg">16</td>
                                        <td class="p-2 tx_sms1 yellow_bg">17</td>
                                        <td class="p-2 tx_sms1 yellow_bg">18</td>
                                        <td class="p-2 tx_sms1 yellow_bg">19</td>
                                        <td class="p-2 tx_sms1 yellow_bg">20</td>
                                        <td class="p-2 tx_sms1 greanns_bg">21</td>
                                        <td class="p-2 tx_sms1 greanns_bg">12</td>
                                        <td class="p-2 tx_sms1 greanns_bg">23</td>
                                    </tr>
                                </tbody>
								
								<tbody>
								    <tr>
                                        <td class="p-1 tx_sms1 black_bg">&nbsp;</td>                                          
                                        <td class="p-1 tx_sms1 black_bg">&nbsp;</td>                                          
                                        <td class="p-1 tx_sms1 black_bg">&nbsp;</td>                                          
                                        <td class="p-1 tx_sms1 black_bg">&nbsp;</td>                                          
                                        <td class="p-1 tx_sms1 black_bg">&nbsp;</td>                                          
                                        <td class="p-1 tx_sms1 black_bg">&nbsp;</td>                                          
                                        <td class="p-1 tx_sms1 black_bg">&nbsp;</td>                                          
                                        <td class="p-1 tx_sms1 black_bg">&nbsp;</td>                                          
                                        <td class="p-1 tx_sms1 black_bg">&nbsp;</td>                                          
                                        <td class="p-1 tx_sms1 black_bg">&nbsp;</td>                                          
                                        <td class="p-1 tx_sms1 black_bg">&nbsp;</td>                                          
                                        <td class="p-1 tx_sms1 black_bg">&nbsp;</td>                                          
                                        <td class="p-1 tx_sms1 black_bg">&nbsp;</td>                                          
                                        <td class="p-1 tx_sms1 black_bg">&nbsp;</td>                                          
                                        <td class="p-1 tx_sms1 black_bg">&nbsp;</td>                                          
                                        <td class="p-1 tx_sms1 black_bg">&nbsp;</td>                                          
                                        <td class="p-1 tx_sms1 black_bg">&nbsp;</td>                                          
                                        <td class="p-1 tx_sms1 black_bg">&nbsp;</td>                                          
                                        <td class="p-1 tx_sms1 black_bg">&nbsp;</td>                                          
                                        <td class="p-1 tx_sms1 black_bg">&nbsp;</td>                                          
                                        <td class="p-1 tx_sms1 black_bg">&nbsp;</td>                                          
                                        <td class="p-1 tx_sms1 black_bg">&nbsp;</td>                                          
                                        <td class="p-1 tx_sms1 black_bg">&nbsp;</td>                                          
                                    </tr>
                                    <tr>
                                        <td class="p-2 tx_sms1">₹5,250,000</td>                                        
                                        <td class="p-2 tx_sms1">₹5,250,000</td>                                        
                                        <td class="p-2 tx_sms1">₹5,250,000</td>                                        
                                        <td class="p-2 tx_sms1">₹5,250,000</td>                                        
                                        <td class="p-2 tx_sms1">₹5,250,000</td>                                        
                                        <td class="p-2 tx_sms1">₹5,250,000</td>                                        
                                        <td class="p-2 tx_sms1">₹5,250,000</td>                                        
                                        <td class="p-2 tx_sms1">₹5,250,000</td>                                        
                                        <td class="p-2 tx_sms1">₹5,250,000</td>                                        
                                        <td class="p-2 tx_sms1">₹5,250,000</td>                                        
                                        <td class="p-2 tx_sms1">₹5,250,000</td>                                        
                                        <td class="p-2 tx_sms1">₹5,250,000</td>                                        
                                        <td class="p-2 tx_sms1">₹5,250,000</td>                                        
                                        <td class="p-2 tx_sms1">₹5,250,000</td>                                        
                                        <td class="p-2 tx_sms1">₹5,250,000</td>                                        
                                        <td class="p-2 tx_sms1">₹5,250,000</td>                                        
                                        <td class="p-2 tx_sms1">₹5,250,000</td>                                        
                                        <td class="p-2 tx_sms1">₹5,250,000</td>                                        
                                        <td class="p-2 tx_sms1">₹5,250,000</td>                                        
                                        <td class="p-2 tx_sms1">₹5,250,000</td>                                        
                                        <td class="p-2 tx_sms1">₹5,250,000</td>                                        
                                        <td class="p-2 tx_sms1">₹5,250,000</td>                                        
                                        <td class="p-2 tx_sms1">₹5,250,000</td>                                        
                                    </tr>
                                    <tr>
                                        <td class="p-2 tx_sms1">₹1,250,000</td>                                        
                                        <td class="p-2 tx_sms1">₹1,250,000</td>                                        
                                        <td class="p-2 tx_sms1">₹1,250,000</td>                                        
                                        <td class="p-2 tx_sms1">₹1,250,000</td>                                        
                                        <td class="p-2 tx_sms1">₹1,250,000</td>                                        
                                        <td class="p-2 tx_sms1">₹1,250,000</td>                                        
                                        <td class="p-2 tx_sms1">₹1,250,000</td>                                        
                                        <td class="p-2 tx_sms1">₹1,250,000</td>                                        
                                        <td class="p-2 tx_sms1">₹1,250,000</td>                                        
                                        <td class="p-2 tx_sms1">₹1,250,000</td>                                        
                                        <td class="p-2 tx_sms1">₹1,250,000</td>                                        
                                        <td class="p-2 tx_sms1">₹1,250,000</td>                                        
                                        <td class="p-2 tx_sms1">₹1,250,000</td>                                        
                                        <td class="p-2 tx_sms1">₹1,250,000</td>                                        
                                        <td class="p-2 tx_sms1">₹1,250,000</td>                                        
                                        <td class="p-2 tx_sms1">₹1,250,000</td>                                        
                                        <td class="p-2 tx_sms1">₹1,250,000</td>                                        
                                        <td class="p-2 tx_sms1">₹1,250,000</td>                                        
                                        <td class="p-2 tx_sms1">₹1,250,000</td>                                        
                                        <td class="p-2 tx_sms1">₹1,250,000</td>                                        
                                        <td class="p-2 tx_sms1">₹1,250,000</td>                                        
                                        <td class="p-2 tx_sms1">₹1,250,000</td>                                        
                                        <td class="p-2 tx_sms1">₹1,250,000</td>                                        
                                    </tr>

                                    <tr>
                                        <td class="p-2 tx_sms1 redss">₹1,350,000</td>                                        
                                        <td class="p-2 tx_sms1 redss">₹1,350,000</td>                                        
                                        <td class="p-2 tx_sms1 redss">₹1,350,000</td>                                        
                                        <td class="p-2 tx_sms1 redss">₹1,350,000</td>                                        
                                        <td class="p-2 tx_sms1 redss">₹1,350,000</td>                                        
                                        <td class="p-2 tx_sms1 redss">₹1,350,000</td>                                        
                                        <td class="p-2 tx_sms1 redss">₹1,350,000</td>                                        
                                        <td class="p-2 tx_sms1 redss">₹1,350,000</td>                                        
                                        <td class="p-2 tx_sms1 redss">₹1,350,000</td>                                        
                                        <td class="p-2 tx_sms1 redss">₹1,350,000</td>                                        
                                        <td class="p-2 tx_sms1 redss">₹1,350,000</td>                                        
                                        <td class="p-2 tx_sms1 redss">₹1,350,000</td>                                        
                                        <td class="p-2 tx_sms1 redss">₹1,350,000</td>                                        
                                        <td class="p-2 tx_sms1 redss">₹1,350,000</td>                                        
                                        <td class="p-2 tx_sms1 redss">₹1,350,000</td>                                        
                                        <td class="p-2 tx_sms1 redss">₹1,350,000</td>                                        
                                        <td class="p-2 tx_sms1 redss">₹1,350,000</td>                                        
                                        <td class="p-2 tx_sms1 redss">₹1,350,000</td>                                        
                                        <td class="p-2 tx_sms1 redss">₹1,350,000</td>                                        
                                        <td class="p-2 tx_sms1 redss">₹1,350,000</td>                                        
                                        <td class="p-2 tx_sms1 redss">₹1,350,000</td>                                        
                                        <td class="p-2 tx_sms1 redss">₹1,350,000</td>                                        
                                        <td class="p-2 tx_sms1 redss">₹1,350,000</td>                                        
                                    </tr>
									<tr>
                                        <td class="p-2 tx_sms1 blue">₹5,250,000</td>                                        
                                        <td class="p-2 tx_sms1 blue">₹5,250,000</td>                                        
                                        <td class="p-2 tx_sms1 blue">₹5,250,000</td>                                        
                                        <td class="p-2 tx_sms1 blue">₹5,250,000</td>                                        
                                        <td class="p-2 tx_sms1 blue">₹5,250,000</td>                                        
                                        <td class="p-2 tx_sms1 blue">₹5,250,000</td>                                        
                                        <td class="p-2 tx_sms1 blue">₹5,250,000</td>                                        
                                        <td class="p-2 tx_sms1 blue">₹5,250,000</td>                                        
                                        <td class="p-2 tx_sms1 blue">₹5,250,000</td>                                        
                                        <td class="p-2 tx_sms1 blue">₹5,250,000</td>                                        
                                        <td class="p-2 tx_sms1 blue">₹5,250,000</td>                                        
                                        <td class="p-2 tx_sms1 blue">₹5,250,000</td>                                        
                                        <td class="p-2 tx_sms1 blue">₹5,250,000</td>                                        
                                        <td class="p-2 tx_sms1 blue">₹5,250,000</td>                                        
                                        <td class="p-2 tx_sms1 blue">₹5,250,000</td>                                        
                                        <td class="p-2 tx_sms1 blue">₹5,250,000</td>                                        
                                        <td class="p-2 tx_sms1 blue">₹5,250,000</td>                                        
                                        <td class="p-2 tx_sms1 blue">₹5,250,000</td>                                        
                                        <td class="p-2 tx_sms1 blue">₹5,250,000</td>                                        
                                        <td class="p-2 tx_sms1 blue">₹5,250,000</td>                                        
                                        <td class="p-2 tx_sms1 blue">₹5,250,000</td>                                        
                                        <td class="p-2 tx_sms1 blue">₹5,250,000</td>                                        
                                        <td class="p-2 tx_sms1 blue">₹5,250,000</td>                                        
                                    </tr>
                                    <tr>
                                        <td class="p-2 tx_sms1">₹1,250,000</td>                                        
                                        <td class="p-2 tx_sms1">₹1,250,000</td>                                        
                                        <td class="p-2 tx_sms1">₹1,250,000</td>                                        
                                        <td class="p-2 tx_sms1">₹1,250,000</td>                                        
                                        <td class="p-2 tx_sms1">₹1,250,000</td>                                        
                                        <td class="p-2 tx_sms1">₹1,250,000</td>                                        
                                        <td class="p-2 tx_sms1">₹1,250,000</td>                                        
                                        <td class="p-2 tx_sms1">₹1,250,000</td>                                        
                                        <td class="p-2 tx_sms1">₹1,250,000</td>                                        
                                        <td class="p-2 tx_sms1">₹1,250,000</td>                                        
                                        <td class="p-2 tx_sms1">₹1,250,000</td>                                        
                                        <td class="p-2 tx_sms1">₹1,250,000</td>                                        
                                        <td class="p-2 tx_sms1">₹1,250,000</td>                                        
                                        <td class="p-2 tx_sms1">₹1,250,000</td>                                        
                                        <td class="p-2 tx_sms1">₹1,250,000</td>                                        
                                        <td class="p-2 tx_sms1">₹1,250,000</td>                                        
                                        <td class="p-2 tx_sms1">₹1,250,000</td>                                        
                                        <td class="p-2 tx_sms1">₹1,250,000</td>                                        
                                        <td class="p-2 tx_sms1">₹1,250,000</td>                                        
                                        <td class="p-2 tx_sms1">₹1,250,000</td>                                        
                                        <td class="p-2 tx_sms1">₹1,250,000</td>                                        
                                        <td class="p-2 tx_sms1">₹1,250,000</td>                                        
                                        <td class="p-2 tx_sms1">₹1,250,000</td>                                        
                                    </tr>

                                    <tr>
                                        <td class="p-2 tx_sms1">₹1,350,000</td>                                        
                                        <td class="p-2 tx_sms1">₹1,350,000</td>                                        
                                        <td class="p-2 tx_sms1">₹1,350,000</td>                                        
                                        <td class="p-2 tx_sms1">₹1,350,000</td>                                        
                                        <td class="p-2 tx_sms1">₹1,350,000</td>                                        
                                        <td class="p-2 tx_sms1">₹1,350,000</td>                                        
                                        <td class="p-2 tx_sms1">₹1,350,000</td>                                        
                                        <td class="p-2 tx_sms1">₹1,350,000</td>                                        
                                        <td class="p-2 tx_sms1">₹1,350,000</td>                                        
                                        <td class="p-2 tx_sms1">₹1,350,000</td>                                        
                                        <td class="p-2 tx_sms1">₹1,350,000</td>                                        
                                        <td class="p-2 tx_sms1">₹1,350,000</td>                                        
                                        <td class="p-2 tx_sms1">₹1,350,000</td>                                        
                                        <td class="p-2 tx_sms1">₹1,350,000</td>                                        
                                        <td class="p-2 tx_sms1">₹1,350,000</td>                                        
                                        <td class="p-2 tx_sms1">₹1,350,000</td>                                        
                                        <td class="p-2 tx_sms1">₹1,350,000</td>                                        
                                        <td class="p-2 tx_sms1">₹1,350,000</td>                                        
                                        <td class="p-2 tx_sms1">₹1,350,000</td>                                        
                                        <td class="p-2 tx_sms1">₹1,350,000</td>                                        
                                        <td class="p-2 tx_sms1">₹1,350,000</td>                                        
                                        <td class="p-2 tx_sms1">₹1,350,000</td>                                        
                                        <td class="p-2 tx_sms1">₹1,350,000</td>                                        
                                    </tr>
									
									<tr>
                                        <td class="p-2 tx_sms1 redss">₹5,250,000</td>                                        
                                        <td class="p-2 tx_sms1 redss">₹5,250,000</td>                                        
                                        <td class="p-2 tx_sms1 redss">₹5,250,000</td>                                        
                                        <td class="p-2 tx_sms1 redss">₹5,250,000</td>                                        
                                        <td class="p-2 tx_sms1 redss">₹5,250,000</td>                                        
                                        <td class="p-2 tx_sms1 redss">₹5,250,000</td>                                        
                                        <td class="p-2 tx_sms1 redss">₹5,250,000</td>                                        
                                        <td class="p-2 tx_sms1 redss">₹5,250,000</td>                                        
                                        <td class="p-2 tx_sms1 redss">₹5,250,000</td>                                        
                                        <td class="p-2 tx_sms1 redss">₹5,250,000</td>                                        
                                        <td class="p-2 tx_sms1 redss">₹5,250,000</td>                                        
                                        <td class="p-2 tx_sms1 redss">₹5,250,000</td>                                        
                                        <td class="p-2 tx_sms1 redss">₹5,250,000</td>                                        
                                        <td class="p-2 tx_sms1 redss">₹5,250,000</td>                                        
                                        <td class="p-2 tx_sms1 redss">₹5,250,000</td>                                        
                                        <td class="p-2 tx_sms1 redss">₹5,250,000</td>                                        
                                        <td class="p-2 tx_sms1 redss">₹5,250,000</td>                                        
                                        <td class="p-2 tx_sms1 redss">₹5,250,000</td>                                        
                                        <td class="p-2 tx_sms1 redss">₹5,250,000</td>                                        
                                        <td class="p-2 tx_sms1 redss">₹5,250,000</td>                                        
                                        <td class="p-2 tx_sms1 redss">₹5,250,000</td>                                        
                                        <td class="p-2 tx_sms1 redss">₹5,250,000</td>                                        
                                        <td class="p-2 tx_sms1 redss">₹5,250,000</td>                                        
                                    </tr>
                                    <tr>
                                        <td class="p-2 tx_sms1">₹1,250,000</td>                                        
                                        <td class="p-2 tx_sms1">₹1,250,000</td>                                        
                                        <td class="p-2 tx_sms1">₹1,250,000</td>                                        
                                        <td class="p-2 tx_sms1">₹1,250,000</td>                                        
                                        <td class="p-2 tx_sms1">₹1,250,000</td>                                        
                                        <td class="p-2 tx_sms1">₹1,250,000</td>                                        
                                        <td class="p-2 tx_sms1">₹1,250,000</td>                                        
                                        <td class="p-2 tx_sms1">₹1,250,000</td>                                        
                                        <td class="p-2 tx_sms1">₹1,250,000</td>                                        
                                        <td class="p-2 tx_sms1">₹1,250,000</td>                                        
                                        <td class="p-2 tx_sms1">₹1,250,000</td>                                        
                                        <td class="p-2 tx_sms1">₹1,250,000</td>                                        
                                        <td class="p-2 tx_sms1">₹1,250,000</td>                                        
                                        <td class="p-2 tx_sms1">₹1,250,000</td>                                        
                                        <td class="p-2 tx_sms1">₹1,250,000</td>                                        
                                        <td class="p-2 tx_sms1">₹1,250,000</td>                                        
                                        <td class="p-2 tx_sms1">₹1,250,000</td>                                        
                                        <td class="p-2 tx_sms1">₹1,250,000</td>                                        
                                        <td class="p-2 tx_sms1">₹1,250,000</td>                                        
                                        <td class="p-2 tx_sms1">₹1,250,000</td>                                        
                                        <td class="p-2 tx_sms1">₹1,250,000</td>                                        
                                        <td class="p-2 tx_sms1">₹1,250,000</td>                                        
                                        <td class="p-2 tx_sms1">₹1,250,000</td>                                        
                                    </tr>

                                    <tr>
                                        <td class="p-2 tx_sms1 greas_bg">₹1,350,000</td>                                        
                                        <td class="p-2 tx_sms1 greas_bg">₹1,350,000</td>                                        
                                        <td class="p-2 tx_sms1 greas_bg">₹1,350,000</td>                                        
                                        <td class="p-2 tx_sms1 greas_bg">₹1,350,000</td>                                        
                                        <td class="p-2 tx_sms1 greas_bg">₹1,350,000</td>                                        
                                        <td class="p-2 tx_sms1 greas_bg">₹1,350,000</td>                                        
                                        <td class="p-2 tx_sms1 greas_bg">₹1,350,000</td>                                        
                                        <td class="p-2 tx_sms1 greas_bg">₹1,350,000</td>                                        
                                        <td class="p-2 tx_sms1 greas_bg">₹1,350,000</td>                                        
                                        <td class="p-2 tx_sms1 greas_bg">₹1,350,000</td>                                        
                                        <td class="p-2 tx_sms1 greas_bg">₹1,350,000</td>                                        
                                        <td class="p-2 tx_sms1 greas_bg">₹1,350,000</td>                                        
                                        <td class="p-2 tx_sms1 greas_bg">₹1,350,000</td>                                        
                                        <td class="p-2 tx_sms1 greas_bg">₹1,350,000</td>                                        
                                        <td class="p-2 tx_sms1 greas_bg">₹1,350,000</td>                                        
                                        <td class="p-2 tx_sms1 greas_bg">₹1,350,000</td>                                        
                                        <td class="p-2 tx_sms1 greas_bg">₹1,350,000</td>                                        
                                        <td class="p-2 tx_sms1 greas_bg">₹1,350,000</td>                                        
                                        <td class="p-2 tx_sms1 greas_bg">₹1,350,000</td>                                        
                                        <td class="p-2 tx_sms1 greas_bg">₹1,350,000</td>                                        
                                        <td class="p-2 tx_sms1 greas_bg">₹1,350,000</td>                                        
                                        <td class="p-2 tx_sms1 greas_bg">₹1,350,000</td>                                        
                                        <td class="p-2 tx_sms1 greas_bg">₹1,350,000</td>                                        
                                    </tr>
                                    
                                </tbody>
								
								
								<tbody>
                                    <tr>
                                        <td class="p-2 tx_sms1 black_bg">&nbsp;</td>                                          
                                        <td class="p-2 tx_sms1 black_bg">&nbsp;</td>                                          
                                        <td class="p-2 tx_sms1 black_bg">&nbsp;</td>                                          
                                        <td class="p-2 tx_sms1 black_bg">&nbsp;</td>                                          
                                        <td class="p-2 tx_sms1 black_bg">&nbsp;</td>                                          
                                        <td class="p-2 tx_sms1 black_bg">&nbsp;</td>                                          
                                        <td class="p-2 tx_sms1 black_bg">&nbsp;</td>                                          
                                        <td class="p-2 tx_sms1 black_bg">&nbsp;</td>                                          
                                        <td class="p-2 tx_sms1 black_bg">&nbsp;</td>                                          
                                        <td class="p-2 tx_sms1 black_bg">&nbsp;</td>                                          
                                        <td class="p-2 tx_sms1 black_bg">&nbsp;</td>                                          
                                        <td class="p-2 tx_sms1 black_bg">&nbsp;</td>                                          
                                        <td class="p-2 tx_sms1 black_bg">&nbsp;</td>                                          
                                        <td class="p-2 tx_sms1 black_bg">&nbsp;</td>                                          
                                        <td class="p-2 tx_sms1 black_bg">&nbsp;</td>                                          
                                        <td class="p-2 tx_sms1 black_bg">&nbsp;</td>                                          
                                        <td class="p-2 tx_sms1 black_bg">&nbsp;</td>                                          
                                        <td class="p-2 tx_sms1 black_bg">&nbsp;</td>                                          
                                        <td class="p-2 tx_sms1 black_bg">&nbsp;</td>                                          
                                        <td class="p-2 tx_sms1 black_bg">&nbsp;</td>                                          
                                        <td class="p-2 tx_sms1 black_bg">&nbsp;</td>                                          
                                        <td class="p-2 tx_sms1 black_bg">&nbsp;</td>                                          
                                        <td class="p-2 tx_sms1 black_bg">&nbsp;</td>                                          
                                    </tr>
                                    <tr>
                                        <td class="p-2 tx_sms1">₹1,250,000</td>                                        
                                        <td class="p-2 tx_sms1">₹1,250,000</td>                                        
                                        <td class="p-2 tx_sms1">₹1,250,000</td>                                        
                                        <td class="p-2 tx_sms1">₹1,250,000</td>                                        
                                        <td class="p-2 tx_sms1">₹1,250,000</td>                                        
                                        <td class="p-2 tx_sms1">₹1,250,000</td>                                        
                                        <td class="p-2 tx_sms1">₹1,250,000</td>                                        
                                        <td class="p-2 tx_sms1">₹1,250,000</td>                                        
                                        <td class="p-2 tx_sms1">₹1,250,000</td>                                        
                                        <td class="p-2 tx_sms1">₹1,250,000</td>                                        
                                        <td class="p-2 tx_sms1">₹1,250,000</td>                                        
                                        <td class="p-2 tx_sms1">₹1,250,000</td>                                        
                                        <td class="p-2 tx_sms1">₹1,250,000</td>                                        
                                        <td class="p-2 tx_sms1">₹1,250,000</td>                                        
                                        <td class="p-2 tx_sms1">₹1,250,000</td>                                        
                                        <td class="p-2 tx_sms1">₹1,250,000</td>                                        
                                        <td class="p-2 tx_sms1">₹1,250,000</td>                                        
                                        <td class="p-2 tx_sms1">₹1,250,000</td>                                        
                                        <td class="p-2 tx_sms1">₹1,250,000</td>                                        
                                        <td class="p-2 tx_sms1">₹1,250,000</td>                                        
                                        <td class="p-2 tx_sms1">₹1,250,000</td>                                        
                                        <td class="p-2 tx_sms1">₹1,250,000</td>                                        
                                        <td class="p-2 tx_sms1">₹1,250,000</td>                                        
                                    </tr>

                                    <tr>
                                        <td class="p-2 tx_sms1 redss">₹1,350,000</td>                                        
                                        <td class="p-2 tx_sms1 redss">₹1,350,000</td>                                        
                                        <td class="p-2 tx_sms1 redss">₹1,350,000</td>                                        
                                        <td class="p-2 tx_sms1 redss">₹1,350,000</td>                                        
                                        <td class="p-2 tx_sms1 redss">₹1,350,000</td>                                        
                                        <td class="p-2 tx_sms1 redss">₹1,350,000</td>                                        
                                        <td class="p-2 tx_sms1 redss">₹1,350,000</td>                                        
                                        <td class="p-2 tx_sms1 redss">₹1,350,000</td>                                        
                                        <td class="p-2 tx_sms1 redss">₹1,350,000</td>                                        
                                        <td class="p-2 tx_sms1 redss">₹1,350,000</td>                                        
                                        <td class="p-2 tx_sms1 redss">₹1,350,000</td>                                        
                                        <td class="p-2 tx_sms1 redss">₹1,350,000</td>                                        
                                        <td class="p-2 tx_sms1 redss">₹1,350,000</td>                                        
                                        <td class="p-2 tx_sms1 redss">₹1,350,000</td>                                        
                                        <td class="p-2 tx_sms1 redss">₹1,350,000</td>                                        
                                        <td class="p-2 tx_sms1 redss">₹1,350,000</td>                                        
                                        <td class="p-2 tx_sms1 redss">₹1,350,000</td>                                        
                                        <td class="p-2 tx_sms1 redss">₹1,350,000</td>                                        
                                        <td class="p-2 tx_sms1 redss">₹1,350,000</td>                                        
                                        <td class="p-2 tx_sms1 redss">₹1,350,000</td>                                        
                                        <td class="p-2 tx_sms1 redss">₹1,350,000</td>                                        
                                        <td class="p-2 tx_sms1 redss">₹1,350,000</td>                                        
                                        <td class="p-2 tx_sms1 redss">₹1,350,000</td>                                        
                                    </tr>
									<tr>
                                        <td class="p-2 tx_sms1 blue">₹5,250,000</td>                                        
                                        <td class="p-2 tx_sms1 blue">₹5,250,000</td>                                        
                                        <td class="p-2 tx_sms1 blue">₹5,250,000</td>                                        
                                        <td class="p-2 tx_sms1 blue">₹5,250,000</td>                                        
                                        <td class="p-2 tx_sms1 blue">₹5,250,000</td>                                        
                                        <td class="p-2 tx_sms1 blue">₹5,250,000</td>                                        
                                        <td class="p-2 tx_sms1 blue">₹5,250,000</td>                                        
                                        <td class="p-2 tx_sms1 blue">₹5,250,000</td>                                        
                                        <td class="p-2 tx_sms1 blue">₹5,250,000</td>                                        
                                        <td class="p-2 tx_sms1 blue">₹5,250,000</td>                                        
                                        <td class="p-2 tx_sms1 blue">₹5,250,000</td>                                        
                                        <td class="p-2 tx_sms1 blue">₹5,250,000</td>                                        
                                        <td class="p-2 tx_sms1 blue">₹5,250,000</td>                                        
                                        <td class="p-2 tx_sms1 blue">₹5,250,000</td>                                        
                                        <td class="p-2 tx_sms1 blue">₹5,250,000</td>                                        
                                        <td class="p-2 tx_sms1 blue">₹5,250,000</td>                                        
                                        <td class="p-2 tx_sms1 blue">₹5,250,000</td>                                        
                                        <td class="p-2 tx_sms1 blue">₹5,250,000</td>                                        
                                        <td class="p-2 tx_sms1 blue">₹5,250,000</td>                                        
                                        <td class="p-2 tx_sms1 blue">₹5,250,000</td>                                        
                                        <td class="p-2 tx_sms1 blue">₹5,250,000</td>                                        
                                        <td class="p-2 tx_sms1 blue">₹5,250,000</td>                                        
                                        <td class="p-2 tx_sms1 blue">₹5,250,000</td>                                        
                                    </tr>
                                    <tr>
                                        <td class="p-2 tx_sms1">₹1,250,000</td>                                        
                                        <td class="p-2 tx_sms1">₹1,250,000</td>                                        
                                        <td class="p-2 tx_sms1">₹1,250,000</td>                                        
                                        <td class="p-2 tx_sms1">₹1,250,000</td>                                        
                                        <td class="p-2 tx_sms1">₹1,250,000</td>                                        
                                        <td class="p-2 tx_sms1">₹1,250,000</td>                                        
                                        <td class="p-2 tx_sms1">₹1,250,000</td>                                        
                                        <td class="p-2 tx_sms1">₹1,250,000</td>                                        
                                        <td class="p-2 tx_sms1">₹1,250,000</td>                                        
                                        <td class="p-2 tx_sms1">₹1,250,000</td>                                        
                                        <td class="p-2 tx_sms1">₹1,250,000</td>                                        
                                        <td class="p-2 tx_sms1">₹1,250,000</td>                                        
                                        <td class="p-2 tx_sms1">₹1,250,000</td>                                        
                                        <td class="p-2 tx_sms1">₹1,250,000</td>                                        
                                        <td class="p-2 tx_sms1">₹1,250,000</td>                                        
                                        <td class="p-2 tx_sms1">₹1,250,000</td>                                        
                                        <td class="p-2 tx_sms1">₹1,250,000</td>                                        
                                        <td class="p-2 tx_sms1">₹1,250,000</td>                                        
                                        <td class="p-2 tx_sms1">₹1,250,000</td>                                        
                                        <td class="p-2 tx_sms1">₹1,250,000</td>                                        
                                        <td class="p-2 tx_sms1">₹1,250,000</td>                                        
                                        <td class="p-2 tx_sms1">₹1,250,000</td>                                        
                                        <td class="p-2 tx_sms1">₹1,250,000</td>                                        
                                    </tr>

                                    <tr>
                                        <td class="p-2 tx_sms1">₹1,350,000</td>                                        
                                        <td class="p-2 tx_sms1">₹1,350,000</td>                                        
                                        <td class="p-2 tx_sms1">₹1,350,000</td>                                        
                                        <td class="p-2 tx_sms1">₹1,350,000</td>                                        
                                        <td class="p-2 tx_sms1">₹1,350,000</td>                                        
                                        <td class="p-2 tx_sms1">₹1,350,000</td>                                        
                                        <td class="p-2 tx_sms1">₹1,350,000</td>                                        
                                        <td class="p-2 tx_sms1">₹1,350,000</td>                                        
                                        <td class="p-2 tx_sms1">₹1,350,000</td>                                        
                                        <td class="p-2 tx_sms1">₹1,350,000</td>                                        
                                        <td class="p-2 tx_sms1">₹1,350,000</td>                                        
                                        <td class="p-2 tx_sms1">₹1,350,000</td>                                        
                                        <td class="p-2 tx_sms1">₹1,350,000</td>                                        
                                        <td class="p-2 tx_sms1">₹1,350,000</td>                                        
                                        <td class="p-2 tx_sms1">₹1,350,000</td>                                        
                                        <td class="p-2 tx_sms1">₹1,350,000</td>                                        
                                        <td class="p-2 tx_sms1">₹1,350,000</td>                                        
                                        <td class="p-2 tx_sms1">₹1,350,000</td>                                        
                                        <td class="p-2 tx_sms1">₹1,350,000</td>                                        
                                        <td class="p-2 tx_sms1">₹1,350,000</td>                                        
                                        <td class="p-2 tx_sms1">₹1,350,000</td>                                        
                                        <td class="p-2 tx_sms1">₹1,350,000</td>                                        
                                        <td class="p-2 tx_sms1">₹1,350,000</td>                                        
                                    </tr>
									
									
                                </tbody>
                            </table>
                        </div>
                    </div>
                
				    
					 
					 <div class="mt-5">
				     <div class="propfixsd new_propertyy hollss">
				      <canvas id="EquityOverTime"></canvas>
					  <div class="btm_list_areaaas">
					   <ul>
					    <li>Market Value</li>
					    <li>Total Accumulated Equity</li>
					    <li>Total Accumulated Cash Flow</li>
					   </ul>
					  </div>
				     </div>
		            </div>
					
					 <!---- Help ---->
				    <section class="al_sec_araea mt_50p pb-0">
					 <div class="row mt-4">
						<div class="col-12 col-sm-12">
							<div class="row mb-4">
								<div class="col-lg-12">
									<div class="alss_pagess" id="alss_pgesss">
										<h3>Need Help?</h3>

										<p>Explore our resources to quickly get started with Flowlu business management software</p>
									</div>
								</div>

								<div class="col-lg-4">
									<div class="hpls_box">
										<div class="ovr_centetent">
											<p>Book online demo</p>

											<a href="javascript:void(0);">Get a demo</a>
										</div>

										<img src="{{ url('home/img/hlp_1.png')}}" alt="" />
									</div>
								</div>

								<div class="col-lg-4">
									<div class="hpls_box">
										<div class="ovr_centetent">
											<p>Find the answers</p>

											<a href="javascript:void(0);">Knowledge base</a>
										</div>

										<img src="{{ url('home/img/hlp_2.png')}}" alt="" />
									</div>
								</div>

								<div class="col-lg-4">
									<div class="hpls_box">
										<div class="ovr_centetent">
											<p>Ask questions</p>

											<a href="javascript:void(0);">Support chat</a>
										</div>

										<img src="{{ url('home/img/hlp_3.png')}}" alt="" />
									</div>
								</div>
							</div>
						</div>
					</div>
				    </section>
				    <!---- Help ---->
					
				</div>
            </div>
        </div>
		
		
		
		
		
		
    </div>
</section>
<!-- END Tab Section -->



   
	 
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>	 




		<script src='https://bernii.github.io/gauge.js/dist/gauge.min.js'></script>
		
		
		<script src='https://cdn2.hubspot.net/hubfs/476360/Chart.js'></script>

<script>
$(window).scroll(function(){
    if ($(window).scrollTop() >= 300) {
        $('new_propertyy').addClass('fixed-header');
        $('disticky_und').addClass('visible-title');
    }
    else {
        $('new_propertyy').removeClass('fixed-header');
        $('disticky_und').removeClass('visible-title');
    }
});
</script>

<script>
const xValues = [1,2,3,4,5,6];

new Chart("ROIROEHoldingPeriod", {
  type: "line",
  data: {
    labels: xValues,
    datasets: [{ 
      data: [100,200,300,400,500,600],
      borderColor: "red",
	  label: 'Market Value',
      fill: false
    }, { 
      data: [100,150,250,300,350,400],
      borderColor: "blue",
	  label: 'Total Accumulated Equity',
      fill: false
    },{ 
      data: [50,50,150,100,250,200],
      borderColor: "yellow",
	  label: 'Total Accumulated Cash Flow',
      fill: false
    },]
  },
  options: {
    legend: {display: false},
	title: {
      display: true,
      text: "Multi-Year Financial Model Graphical Overview: 15 Properties Over 20 Years",
      fontSize: 16
    },
	scales: {
		  xAxes: [{
			display: true,
            scaleLabel: {
            display: true,
            labelString: ''
          },
		  }],
	}
  }
});


const xValues1 = [1,2,3,4,5,6];

new Chart("ProfitHoldingPeriod", {
  type: "line",
  data: {
    labels: xValues,
    datasets: [{ 
      data: [100,200,300,400,500,600],
      borderColor: "red",
	  label: 'Market Value',
      fill: false
    }, { 
      data: [100,150,250,300,350,400],
      borderColor: "blue",
	  label: 'Total Accumulated Equity',
      fill: false
    },{ 
      data: [50,50,150,100,250,200],
      borderColor: "yellow",
	  label: 'Total Accumulated Cash Flow',
      fill: false
    },]
  },
  options: {
    legend: {display: false},
	title: {
      display: true,
      text: "Multi-Year Financial Model Graphical Overview: 15 Properties Over 20 Years",
      fontSize: 16
    },
	scales: {
		  xAxes: [{
			display: true,
            scaleLabel: {
            display: true,
            labelString: ''
          },
		  }],
	}
  }
});



const xValues2 = [2,4,6,8,10,12,14,16,18,20,22,24,26,28,30];

new Chart("EquityOverTime", {
  type: "line",
  data: {
    labels: xValues2,
    datasets: [{ 
      data: [50,70,100,120,150,180,200,220,300,400,450,500,550,600,650],
      borderColor: "blue",
	  label: 'Property Value',
      fill: false
    }, { 
      data: [100,170,200,220,250,280,300,320,350,500,550,600,650,700,750],
      borderColor: "red",
	  label: 'Loan Balance',
      fill: false
    },{
      data: [200,270,300,320,350,380,350,420,650,700,850,900,950,1000,1150],
      borderColor: "green",
	  label: 'Total Equity',
      fill: false
    }]
  },
  options: {
    legend: {display: false},
	title: {
      display: true,
      text: "Multi-Year Financial Model Graphical Overview: 15 Properties Over 20 Years",
      fontSize: 16
    },
	scales: {
		  xAxes: [{
			display: true,
            scaleLabel: {
            display: true,
            labelString: ''
          },
		  }],
	}
  }
});


const xValues3 = [2,4,6,8,10,12,14,16,18,20,22,24,26,28,30];

new Chart("CashFlowOverTime", {
  type: "line",
  data: {
    labels: xValues3,
    datasets: [{ 
      data: [50,70,100,120,150,180,200,220,300,400,450,500,550,600,650],
      borderColor: "blue",
	  label: 'Operating Income',
      fill: false
    }, { 
      data: [100,170,200,220,250,280,300,320,350,500,550,600,650,700,750],
      borderColor: "red",
	  label: 'Operating Expenses',
      fill: false
    },{
      data: [200,270,300,320,350,380,350,420,650,700,850,900,950,1000,1150],
      borderColor: "green",
	  label: 'Cash Flow',
      fill: false
    }]
  },
  options: {
    legend: {display: false},
	title: {
      display: true,
      text: "Cash Flow Over Time",
      fontSize: 16
    },
	scales: {
		  xAxes: [{
			display: true,
            scaleLabel: {
            display: true,
            labelString: 'Holding Period (Years)'
          },
		  }],
	}
  }
});

</script>
		
		
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


@include('front.layouts.footer')


