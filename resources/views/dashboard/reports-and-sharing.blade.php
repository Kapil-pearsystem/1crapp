@include('front.layouts.user-header')
<!--PEN HEADER-->
<div class="container mt-5">
    <div class="row mt-4">
        @include('front.layouts.detail-sidebar')
        <!--start full details -->
		<div class="col-12 col-sm-9">
			<div class="row mb-4">
				<div class="col-lg-12">
					<div class="lsting_proprty purch_list_conts" id="alss_pgesss">
						<h3>Property Reports & Sharing</h3>
						<p class="brdsss"><a href="javascript:void(0);">Rentals</a> <span>/</span> <a href="javascript:void(0);">Example: Rental Property</a> <span>/</span> Reports & Sharing</p>


						<p class="viww">Share professional property reports with your lenders, buyers, partners or clients. <a href="javascript:void(0);">View Tutorial</a></p>
					</div>

					<div class="pur_rdo_listtss">
						<h4>INTERACTIVE REPORT</h4>
						<div class="chk_list_araea">
							<div class="all_frm_list">
                        <div class="choss_araes">
                            <div class="lft_cntts">
                                <p>Enable Sharable Link</p>
                                <span>When enabled, you can share this link and allow others to view an interactive property report online.</span>
                            </div>


                            <div class="chos_bntt">
							   <div class="yeno_bx">
                                <input type="checkbox" class="toggle" id="toggle1">
                                <label for="toggle1">
                                    <span class="on">No</span>
                                    <span class="off">Yes</span>
                                </label>
							   </div>
                            </div>
                        </div>

						<div class="all_frm_list_share">
						    <div class="lft_cntts">
                                <p>Interactive Report Link:</p>
                            </div>
							<div class="input-group">
								<input type="text" id="report-input-sharable-link" class="form-control" value="{{ route('properties.reports', ['category' => str_replace('_', '-', $MainProperty->prop_parent_type),'id' => base64_encode($MainProperty->prop_id)]) }}" />
								<div class="input-group-btn">
									<button class="btn btn-default" type="button"><a href="{{ route('properties.reports', ['category' => str_replace('_', '-', $MainProperty->prop_parent_type),'id' => base64_encode($MainProperty->prop_id)]) }}"><i class="icon fa fa-external-link push-down-1"></i></a></button>
									<button class="btn btn-default" type="button" ng-click="copySharableLink()">Copy</button>
								</div>
							</div>
						</div>
                    </div>
						</div>
					</div>

					<div class="pur_rdo_listtss">
						<h4>PDF REPORT</h4>
						<div class="chk_list_araea">
					     <div class="all_frm_list">
                          <div class="rt_portss">
						   <div class="cntss_bx">Report Type:</div>
						   <div class="lnk_titalls">
						    <ul>
							 <li><a href="javascript:void(0);">Complete Report</a></li>
							 <li><a href="javascript:void(0);">One-Page Report</a></li>
							</ul>
						   </div>
						  </div>

						  <div class="rt_portss">
						   <div class="cntss_bx">Create Report:</div>
						   <div class="lnk_titalls lstts">
						    <ul>
							 <li><a href="javascript:void(0);"><i class="fa fa-eye"></i> View</a></li>
							 <li><a href="javascript:void(0);"><i class="fa fa-cloud-download"></i> Download</a></li>
							</ul>
						   </div>
						  </div>
                         </div>
						</div>
					</div>

					<div class="pur_rdo_listtss ">
						<h4>PRIVACY SETTINGS</h4>
						<div class="chk_list_araea">
							<div class="all_frm_list">
                        <div class="choss_araes">
                            <div class="lft_cntts">
                                <p>Hide Property Address</p>
                                <span>Enable to hide the full property address and only show the city and state of this property. Be sure to remove any mentions of the address from the <a href="javascript:void(0);">Property name</a>.
                                </span>
                            </div>

                            <div class="chos_bntt">
							   <div class="yeno_bx">
                                <input type="checkbox" class="toggle" id="toggle2" />
                                <label for="toggle2">
                                    <span class="on">No</span>
                                    <span class="off">Yes</span>
                                </label>
							   </div>
                            </div>
                        </div>
                    </div>
						</div>
					</div>

					<div class="pur_rdo_listtss">
						<h4>REPORT SECTIONS</h4>
						<div class="chk_list_araea bothss">
							<div class="all_frm_list">
								<div class="choss_araes">
									<div class="lft_cntts">
										<p>Include Sales Comps</p>
										<span>Enable to include recent comparable sales and ARV estimates. <a href="javascript:void(0);">Click here</a> to view them.</span>
									</div>

									<div class="chos_bntt">
										<div class="yeno_bx">
											<input type="checkbox" class="toggle" id="toggle3" />
											<label for="toggle3">
												<span class="on">No</span>
												<span class="off">Yes</span>
											</label>
										</div>
									</div>
								</div>
							</div>

							<div class="all_frm_list">
								<div class="choss_araes">
									<div class="lft_cntts">
										<p>Include Rental Comps</p>
										<span>Enable to include comparable rental listings and rent estimates. <a href="javascript:void(0);">Click here</a> to view them.</span>
									</div>

									<div class="chos_bntt">
										<div class="yeno_bx">
											<input type="checkbox" class="toggle" id="toggle4" />
											<label for="toggle4">
												<span class="on">No</span>
												<span class="off">Yes</span>
											</label>
										</div>
									</div>
								</div>
							</div>

							<div class="all_frm_list">
								<div class="choss_araes">
									<div class="lft_cntts">
										<p>Include Purchase Criteria</p>
										<span>Enable to include a breakdown of how this property performs against your <a href="javascript:void(0);">purchase criteria</a>. This setting applies only to PDF reports.</span>
									</div>

									<div class="chos_bntt">
										<div class="yeno_bx">
											<input type="checkbox" class="toggle" id="toggle5" />
											<label for="toggle5">
												<span class="on">No</span>
												<span class="off">Yes</span>
											</label>
										</div>
									</div>
								</div>
							</div>

							<div class="all_frm_list">
								<div class="choss_araes">
									<div class="lft_cntts">
										<p>Include Notes</p>
										<span>Enable to include any property notes you have added. <a href="javascript:void(0);">Click here</a> to edit them.</span>
									</div>

									<div class="chos_bntt">
										<div class="yeno_bx">
											<input type="checkbox" class="toggle" id="toggle6" />
											<label for="toggle6">
												<span class="on">No</span>
												<span class="off">Yes</span>
											</label>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>

					<div class="pur_rdo_listtss">
						<h4>CHARTS, PHOTOS & MAPS</h4>
						<div class="chk_list_araea bothss">
							<div class="all_frm_list">
								<div class="choss_araes">
									<div class="lft_cntts">
										<p>Include Charts</p>
										<span>Enable to include buy & hold projection charts of this property.</span>
									</div>

									<div class="chos_bntt">
										<div class="yeno_bx">
											<input type="checkbox" class="toggle" id="toggle7" />
											<label for="toggle7">
												<span class="on">No</span>
												<span class="off">Yes</span>
											</label>
										</div>
									</div>
								</div>
							</div>

							<div class="all_frm_list">
								<div class="choss_araes">
									<div class="lft_cntts">
										<p>Include Photos</p>
										<span>Enable to include property photos. <a href="javascript:void(0);">Click here</a> to add photos and set a primary photo of this property.</span>
									</div>

									<div class="chos_bntt">
										<div class="yeno_bx">
											<input type="checkbox" class="toggle" id="toggle8" />
											<label for="toggle8">
												<span class="on">No</span>
												<span class="off">Yes</span>
											</label>
										</div>
									</div>
								</div>
							</div>

							<div class="all_frm_list">
								<div class="choss_araes">
									<div class="lft_cntts">
										<p>Include Maps</p>
										<span>Enable to include satellite and street maps of this property.</span>
									</div>

									<div class="chos_bntt">
										<div class="yeno_bx">
											<input type="checkbox" class="toggle" id="toggle9" />
											<label for="toggle9">
												<span class="on">No</span>
												<span class="off">Yes</span>
											</label>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>


					<div class="pur_rdo_listtss">
						<h4>CUSTOM BRANDING</h4>
						<p class="cnttst">The custom branding settings below will automatically apply to all properties and reports.</p>
						<div class="chk_list_araea mt-4">
					<div class="all_frm_list">



						<div class="form-group managsss1">
                            <label>Prepared By:</label>
                            <input type="text" placeholder="Your personal or business name" value="" />
                        </div>
						<span class="sm_txtx">Fill in your personal or business name to display as the creator of the report.</span>



						<div class="form-group managsss1">
                            <label>Website Link:</label>
                            <input type="text" placeholder="Your personal or business website" value="" />
                        </div>
						<span class="sm_txtx">Add a link to your website when someone clicks on your name or logo in the report.</span>

						<div class="form-group managsss1">
                            <label>Contact Information:</label>
                            <textarea rows="3" placeholder="Add your contact information..." ></textarea>
                        </div>
						<span class="sm_txtx">Fill in your contact information to display next to your name. Only the first 5 lines will be shown in PDF reports.</span>


						<div class="form-group managsss1">
                            <label>Primary Color:</label>
                            <input type="text" placeholder="Your brand color" value="" />
                        </div>
						<span class="sm_txtx">Select the color of report headings, sub-totals, borders and other visual elements. This setting applies only to PDF reports.</span>


						<div class="form-group managsss1">
                            <label>Logo:</label>
                            <div class="lgo_fraeaeeas"><img src="img/User-Logo.jpg" alt="" /></div>
                        </div>
						<span class="sm_txtx">Add a logo to display next to your name and contact information. For best results, upload an image at least 150px in height.</span>


                        <div class="choss_araes mt-5">
                            <div class="lft_cntts">
                                <p>Hide DealCheck Branding</p>
                                <span>Enable to remove all references to DealCheck and make the report fully white-labeled. This setting applies only to PDF reports.</span>
                            </div>

                            <div class="chos_bntt">
                                <input type="checkbox" class="toggle" id="toggle_nn">
								<label for="toggle_nn">
								  <span class="on">No</span>
								  <span class="off">Yes</span>
								</label>
                            </div>
                        </div>
                    </div>
                    </div>
					</div>


					<div class="pur_rdo_listtss">
						<h4>AFFILIATE LINK</h4>
						<p class="cnttst">Add your affiliate link to each report to earn a commission for referring new paying users.</p>
						<div class="chk_list_araea mt-4">
							<div class="all_frm_list">
								<div class="form-group managsss1">
									<label>Affiliate Link:</label>
									<input type="text" placeholder="https://dealcheck.io?fp_ref=..." value="" />
								</div>
								<span class="sm_txtx">Enter your full affiliate link from your DealCheck <a href="javascript:void(0);">affiliate dashboard.</a></span>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

    </div>
</div>


@include('front.layouts.footer')