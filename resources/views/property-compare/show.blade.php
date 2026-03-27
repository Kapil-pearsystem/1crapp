@include('front.layouts.header')
<div class="container mt-5">
    <div class="row mt-4">
        <div class="col-lg-12">
            <div class="lsting_proprty purch_list_conts compare">
                <div class="mn_lststs">
                    <div class="lft_nw_heds">
                        <span class="top_lvkss">
                            <a href="{{ url()->previous() }}"><i class="fa fa-long-arrow-left"></i> View all Properties</a>
                        </span>
                        <h3>Compare Properties</h3>
                        <p>Compare properties side-by-side to help you find the best deals. <a href="javascript:void(0);">View tutorial</a></p>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-12">
            <div class="propfixsd new_propertyy prop_comparess">
			   <div class="table-responsive table-fixed-labels properties-comparison-table">
					<table class="table table-nowrap table-no-borders table-align-right table-condensed als_show_ar">
						<thead class="mb_view_nn">
							<tr>
								<th>&nbsp;</th>
							</tr>
						</thead>
						<tbody>
							<tr class="table-sub-heading blue">
								<td class="text-left">Property Description</td>
							</tr>
							<tr>
								<td class="text-left">Property Type:</td>
							</tr>
							<tr>
								<td class="text-left">Beds / Baths:</td>
							</tr>
							<tr>
								<td class="text-left">
									<span>Square Footage:</span>
								</td>
							</tr>
							<tr>
								<td class="text-left">Year Built:</td>
							</tr>
							<tr>
								<td class="text-left">Parking:</td>
							</tr>
							<tr class="table-row-padded">
								<td class="text-left">Lot Size:</td>
							</tr>
						</tbody>
						<tbody>
							<tr class="table-sub-heading blue">
								<td class="text-left">Purchase &amp; Rehab</td>
							</tr>
							<tr>
								<td class="text-left qr_tp_areaaa">
								    <div class="con-tooltip top">
										<p class="icoo"> <i class="fa fa-question"></i> </p>
										<div class="tooltip ">
										 <h5>Purchase Price</h5>
										 <p>The amount you're paying to purchase a property.</p>
										</div>
									  </div>
									Purchase Price:
								</td>
							</tr>
							<tr>
								<td class="text-left qr_tp_areaaa">
								    <div class="con-tooltip top">
										<p class="icoo"> <i class="fa fa-question"></i> </p>
										<div class="tooltip ">
										 <h5>Purchase Price</h5>
										 <p>The amount you're paying to purchase a property.</p>
										</div>
									  </div>
									Amount Financed:
								</td>
							</tr>
							<tr class="table-row-total">
								<td class="text-left blue">Down Payment:</td>
							</tr>
							<tr>
								<td class="text-left qr_tp_areaaa">
								    <div class="con-tooltip top">
										<p class="icoo"> <i class="fa fa-question"></i> </p>
										<div class="tooltip ">
										 <h5>Purchase Price</h5>
										 <p>The amount you're paying to purchase a property.</p>
										</div>
									  </div>
									Purchase Costs:
								</td>
							</tr>
							{{-- <tr>
								<td class="text-left qr_tp_areaaa">
								    <div class="con-tooltip top">
										<p class="icoo"> <i class="fa fa-question"></i> </p>
										<div class="tooltip ">
										 <h5>Purchase Price</h5>
										 <p>The amount you're paying to purchase a property.</p>
										</div>
									  </div>
									Rehab Costs:
								</td>
							</tr> --}}
							<tr class="table-row-total table-row-padded bold">
								<td class="text-left blue qr_tp_areaaa">
								    <div class="con-tooltip top">
										<p class="icoo"> <i class="fa fa-question"></i> </p>
										<div class="tooltip ">
										 <h5>Purchase Price</h5>
										 <p>The amount you're paying to purchase a property.</p>
										</div>
									  </div>
									Total Cash Needed:
								</td>
							</tr>
						</tbody>
						<tbody>
							<tr class="table-sub-heading blue">
								<td class="text-left">
									Financing
									<span class="margin-l-5 text-normal">(Purchase)</span>
								</td>
							</tr>
							<tr>
								<td class="text-left">Loan Amount:</td>
							</tr>
							<tr>
								<td class="text-left qr_tp_areaaa">
								    <div class="con-tooltip top">
										<p class="icoo"> <i class="fa fa-question"></i> </p>
										<div class="tooltip ">
										 <h5>Purchase Price</h5>
										 <p>The amount you're paying to purchase a property.</p>
										</div>
									  </div>
									Loan to Cost:
								</td>
							</tr>
							<tr>
								<td class="text-left qr_tp_areaaa">
								    <div class="con-tooltip top">
										<p class="icoo"> <i class="fa fa-question"></i> </p>
										<div class="tooltip ">
										 <h5>Purchase Price</h5>
										 <p>The amount you're paying to purchase a property.</p>
										</div>
									  </div>
									Loan to Value:
								</td>
							</tr>
							<tr>
								<td class="text-left">Financing Of:</td>
							</tr>
							<tr>
								<td class="text-left">Loan Type:</td>
							</tr>
							<tr>
								<td class="text-left">Interest Rate:</td>
							</tr>
							<tr class="table-row-padded">
								<td class="text-left qr_tp_areaaa">
								    <div class="con-tooltip top">
										<p class="icoo"> <i class="fa fa-question"></i> </p>
										<div class="tooltip ">
										 <h5>Purchase Price</h5>
										 <p>The amount you're paying to purchase a property.</p>
										</div>
									  </div>
									Mortgage Insurance:
								</td>
							</tr>
						</tbody>
						<tbody>
							<tr class="table-sub-heading blue">
								<td class="text-left">Valuation</td>
							</tr>
							<tr>
								<td class="text-left qr_tp_areaaa">
								    <div class="con-tooltip top">
										<p class="icoo"> <i class="fa fa-question"></i> </p>
										<div class="tooltip ">
										 <h5>Purchase Price</h5>
										 <p>The amount you're paying to purchase a property.</p>
										</div>
									  </div>
									After Repair Value:
								</td>
							</tr>
							<tr>
								<td class="text-left">
									<span>ARV Per Square Foot:</span>
								</td>
							</tr>
							<tr>
								<td class="text-left">
									<span>Price Per Square Foot:</span>
								</td>
							</tr>
							<tr>
								<td class="text-left">Price Per Unit:</td>
							</tr>
							<tr class="table-row-padded">
								<td class="text-left">
									<span>Rehab Per Square Foot:</span>
								</td>
							</tr>
						</tbody>
						<tbody>
							<tr class="table-sub-heading blue">
								<td class="text-left">
									Cash Flow <span class="margin-l-5 text-normal">(Monthly, Year 1)</span>
								</td>
							</tr>
							<tr>
								<td class="text-left qr_tp_areaaa">
								    <div class="con-tooltip top">
										<p class="icoo"> <i class="fa fa-question"></i> </p>
										<div class="tooltip ">
										 <h5>Purchase Price</h5>
										 <p>The amount you're paying to purchase a property.</p>
										</div>
									  </div>
									Gross Rent:
								</td>
							</tr>
							<tr class="table-row-with-sub-value">
								<td class="text-left qr_tp_areaaa">
								    <div class="con-tooltip top">
										<p class="icoo"> <i class="fa fa-question"></i> </p>
										<div class="tooltip ">
										 <h5>Purchase Price</h5>
										 <p>The amount you're paying to purchase a property.</p>
										</div>
									  </div>
									Vacancy:
								</td>
							</tr>
							<tr>
								<td class="text-left qr_tp_areaaa">
								    <div class="con-tooltip top">
										<p class="icoo"> <i class="fa fa-question"></i> </p>
										<div class="tooltip ">
										 <h5>Purchase Price</h5>
										 <p>The amount you're paying to purchase a property.</p>
										</div>
									  </div>
									Other Income:
								</td>
							</tr>
							<tr class="table-row-total blue">
								<td class="text-left qr_tp_areaaa">
								    <div class="con-tooltip top">
										<p class="icoo"> <i class="fa fa-question"></i> </p>
										<div class="tooltip ">
										 <h5>Purchase Price</h5>
										 <p>The amount you're paying to purchase a property.</p>
										</div>
									  </div>
									Operating Income:
								</td>
							</tr>
							<tr class="table-row-with-sub-value">
								<td class="text-left qr_tp_areaaa">
								    <div class="con-tooltip top">
										<p class="icoo"> <i class="fa fa-question"></i> </p>
										<div class="tooltip ">
										 <h5>Purchase Price</h5>
										 <p>The amount you're paying to purchase a property.</p>
										</div>
									  </div>
									Operating Expenses:
								</td>
							</tr>
							<tr class="table-row-total blue table-row-with-sub-value" ng-class="{'table-row-with-sub-value': showMultiFamilyInfo()}">
								<td class="text-left qr_tp_areaaa">
								    <div class="con-tooltip top">
										<p class="icoo"> <i class="fa fa-question"></i> </p>
										<div class="tooltip ">
										 <h5>Purchase Price</h5>
										 <p>The amount you're paying to purchase a property.</p>
										</div>
									  </div>
									Net Operating Income:
								</td>
							</tr>
							<tr>
								<td class="text-left qr_tp_areaaa">
								    <div class="con-tooltip top">
										<p class="icoo"> <i class="fa fa-question"></i> </p>
										<div class="tooltip ">
										 <h5>Purchase Price</h5>
										 <p>The amount you're paying to purchase a property.</p>
										</div>
									  </div>
									Loan Payments:
								</td>
							</tr>
							<tr class="table-row-total bold blue table-row-with-sub-value">
								<td class="text-left qr_tp_areaaa">
								    <div class="con-tooltip top">
										<p class="icoo"> <i class="fa fa-question"></i> </p>
										<div class="tooltip ">
										 <h5>Purchase Price</h5>
										 <p>The amount you're paying to purchase a property.</p>
										</div>
									  </div>
									Cash Flow:
								</td>
							</tr>
							<tr class="table-row-padded table-row-with-sub-value">
								<td class="text-left qr_tp_areaaa">
								    <div class="con-tooltip top">
										<p class="icoo"> <i class="fa fa-question"></i> </p>
										<div class="tooltip ">
										 <h5>Purchase Price</h5>
										 <p>The amount you're paying to purchase a property.</p>
										</div>
									  </div>
									Post-Tax Cash Flow:
								</td>
							</tr>
							<tr class="table-sub-heading blue">
								<td class="text-left">
									Investment Returns <span class="margin-l-5 text-normal">(Year 1)</span>
								</td>
							</tr>
							<tr>
								<td class="text-left qr_tp_areaaa">
								    <div class="con-tooltip top">
										<p class="icoo"> <i class="fa fa-question"></i> </p>
										<div class="tooltip ">
										 <h5>Purchase Price</h5>
										 <p>The amount you're paying to purchase a property.</p>
										</div>
									  </div>
									Cap Rate (Purchase Price):
								</td>
							</tr>
							<tr>
								<td class="text-left qr_tp_areaaa">
								    <div class="con-tooltip top">
										<p class="icoo"> <i class="fa fa-question"></i> </p>
										<div class="tooltip ">
										 <h5>Purchase Price</h5>
										 <p>The amount you're paying to purchase a property.</p>
										</div>
									  </div>
									Cap Rate (Market Value):
								</td>
							</tr>
							<tr>
								<td class="text-left qr_tp_areaaa">
								    <div class="con-tooltip top">
										<p class="icoo"> <i class="fa fa-question"></i> </p>
										<div class="tooltip ">
										 <h5>Purchase Price</h5>
										 <p>The amount you're paying to purchase a property.</p>
										</div>
									  </div>
									Cash on Cash Return:
								</td>
							</tr>
							<tr>
								<td class="text-left qr_tp_areaaa">
								    <div class="con-tooltip top">
										<p class="icoo"> <i class="fa fa-question"></i> </p>
										<div class="tooltip ">
										 <h5>Purchase Price</h5>
										 <p>The amount you're paying to purchase a property.</p>
										</div>
									  </div>
									Return on Equity:
								</td>
							</tr>
							<tr>
								<td class="text-left qr_tp_areaaa">
								    <div class="con-tooltip top">
										<p class="icoo"> <i class="fa fa-question"></i> </p>
										<div class="tooltip ">
										 <h5>Purchase Price</h5>
										 <p>The amount you're paying to purchase a property.</p>
										</div>
									  </div>
									Return on Investment:
								</td>
							</tr>
							<tr class="table-row-padded">
								<td class="text-left qr_tp_areaaa">
								    <div class="con-tooltip top">
										<p class="icoo"> <i class="fa fa-question"></i> </p>
										<div class="tooltip ">
										 <h5>Purchase Price</h5>
										 <p>The amount you're paying to purchase a property.</p>
										</div>
									  </div>
									Internal Rate of Return:
								</td>
							</tr>
							<tr class="table-sub-heading blue">
								<td class="text-left">
									Financial Ratios
									<span class="margin-l-5 text-normal" ng-if="getPropertyType(true) === 'rental'">(At Purchase)</span>
								</td>
							</tr>
							<tr>
								<td class="text-left qr_tp_areaaa">
								    <div class="con-tooltip top">
										<p class="icoo"> <i class="fa fa-question"></i> </p>
										<div class="tooltip ">
										 <h5>Purchase Price</h5>
										 <p>The amount you're paying to purchase a property.</p>
										</div>
									  </div>
									Rent to Value:
								</td>
							</tr>
							<tr>
								<td class="text-left qr_tp_areaaa">
								    <div class="con-tooltip top">
										<p class="icoo"> <i class="fa fa-question"></i> </p>
										<div class="tooltip ">
										 <h5>Purchase Price</h5>
										 <p>The amount you're paying to purchase a property.</p>
										</div>
									  </div>
									Gross Rent Multiplier:
								</td>
							</tr>
							<tr>
								<td class="text-left qr_tp_areaaa">
								    <div class="con-tooltip top">
										<p class="icoo"> <i class="fa fa-question"></i> </p>
										<div class="tooltip ">
										 <h5>Purchase Price</h5>
										 <p>The amount you're paying to purchase a property.</p>
										</div>
									  </div>
									Equity Multiple:
								</td>
							</tr>
							<tr>
								<td class="text-left qr_tp_areaaa">
								    <div class="con-tooltip top">
										<p class="icoo"> <i class="fa fa-question"></i> </p>
										<div class="tooltip ">
										 <h5>Purchase Price</h5>
										 <p>The amount you're paying to purchase a property.</p>
										</div>
									  </div>
									Break Even Ratio:
								</td>
							</tr>
							<tr>
								<td class="text-left qr_tp_areaaa">
								    <div class="con-tooltip top">
										<p class="icoo"> <i class="fa fa-question"></i> </p>
										<div class="tooltip ">
										 <h5>Purchase Price</h5>
										 <p>The amount you're paying to purchase a property.</p>
										</div>
									  </div>
									Debt Coverage Ratio:
								</td>
							</tr>
							<tr class="table-row-padded">
								<td class="text-left qr_tp_areaaa">
								    <div class="con-tooltip top">
										<p class="icoo"> <i class="fa fa-question"></i> </p>
										<div class="tooltip ">
										 <h5>Purchase Price</h5>
										 <p>The amount you're paying to purchase a property.</p>
										</div>
									  </div>
									Debt Yield:
								</td>
							</tr>
						</tbody>
						<tbody>
							<tr class="table-sub-heading blue">
								<td class="text-left">Purchase Criteria</td>
							</tr>
							<tr>
								<td class="text-left">&nbsp;</td>
							</tr>
						</tbody>
					</table>
				</div>			   
			   <div class="table-responsive table-fixed-labels properties-comparison-table secendss">
					<table class="table table-nowrap table-no-borders table-align-right table-condensed">
						<thead>
							<tr>
								<form id="property_compare_form" action="{{ route('property.compare.post') }}" method="post">
									@csrf
									<input type="hidden" name="action" id="action_input">
									<input type="hidden" name="remove_property" id="remove_property_input">
									<th>
										<div class="removedd">
											@if(!is_null($firstProperty))
												<span class="rmss_vv" id="first_property_remove_button" style="cursor: pointer;" data-id="{{$firstProperty->prop_id}}">
													<i class="fa fa-times"></i> Remove
												</span>
											@endif
											<div class="prop_ly_ad_listt">
												<div class="extr_adsss">
													<div class="mg_bx_araea">
														<img src="img/image-new-property.png" alt="">
													</div>
													<div class="show_areaa">
														<div class="sho_mg_araea">
															@php
																if(!is_null($firstProperty) && !is_null($firstProperty->imageVideo)){
																	$imagePath = public_path($firstProperty->imageVideo);
																	if (File::exists($imagePath)) {
																		$imagePath = asset($firstProperty->imageVideo);
																	} else {
																		$imagePath = asset('img/image-new-property.png');
																	}
																}else{
																	$imagePath = asset('img/image-new-property.png');
																}
															@endphp
															<img src="{{$imagePath}}" alt="">

															{{-- <div class="are_bxxx">
																<div class="croosss" data-toggle="modal" data-target="#purchase_criteria" style="cursor:pointer;">
																	<i class="fa fa-times language-title"></i>											
																</div>
															</div> --}}
														</div>
													</div>
												</div>
	
												<div class="slt_bx_area_user">
													<div class="slt_bxxs">
														<select id="property_select_dropdown1" name="first_property">
															<option value="">Select Property</option>
															<optgroup label="Buy And Sell">
																@foreach ($buyAnSellProperty as $item)
																	<option @if(isset($requests['first_property']) && $requests['first_property'] == $item->prop_id) selected @endif value="{{ $item->prop_id }}">{{ $item->prop_name }}</option>
																@endforeach
															</optgroup>

															<optgroup label="Buy And Hold">
																@foreach ($buyAnHoldProperty as $item)
																	<option @if(isset($requests['first_property']) && $requests['first_property'] == $item->prop_id) selected @endif value="{{ $item->prop_id }}">{{ $item->prop_name }}</option>
																@endforeach
															</optgroup>

															<optgroup label="Buy, Hold And Refinance">
																@foreach ($buyHoldRefinanceProperty as $item)
																	<option @if(isset($requests['first_property']) && $requests['first_property'] == $item->prop_id) selected @endif value="{{ $item->prop_id }}">{{ $item->prop_name }}</option>
																@endforeach
															</optgroup>
														</select>
													</div>
													@if (!is_null($firstProperty))
														@php
															$propertyAddress = App\Models\PropertyAddress::where('prop_id',$firstProperty->prop_id)->with(['city','state'])->first();
														@endphp
														<div class="slt_are_metrr" id="property_address1">
															<p>{{ $propertyAddress?->prop_street }}</p>
															<p>{{ $propertyAddress?->city?->name.' '.$propertyAddress?->state?->name.' '.$propertyAddress?->prop_zip }}</p>

															<p><a href="javascript:void(0);"><span class="blue">View <i class="fa fa-long-arrow-right"></i></span></a></p>
														</div>
													@endif													
												</div>
											</div>
										</div>
									</th>
									<th>
										<div class="removedd">
											@if(!is_null($secondProperty))
												<span class="rmss_vv" id="second_property_remove_button" style="cursor: pointer;" data-id="{{$secondProperty->prop_id}}">
													<i class="fa fa-times"></i> Remove
												</span>
											@endif
											<div class="prop_ly_ad_listt">
												<div class="extr_adsss">
													<div class="mg_bx_araea">
														<img src="{{ asset('img/image-new-property.png') }}" alt="">
													</div>
													<div class="show_areaa">
														<div class="sho_mg_araea">
															@php
																if(!is_null($secondProperty) && !is_null($secondProperty->imageVideo)){
																	$imagePath = public_path($secondProperty->imageVideo);
																	if (File::exists($imagePath)) {
																		$imagePath = asset($secondProperty->imageVideo);
																	} else {
																		$imagePath = asset('img/image-new-property.png');
																	}
																}else{
																	$imagePath = asset('img/image-new-property.png');
																}
															@endphp
															<img src="{{$imagePath}}" alt="">

															{{-- <div class="are_bxxx">
																<div class="croosss" data-toggle="modal" data-target="#purchase_criteria" style="cursor:pointer;">
																	<i class="fa fa-times language-title"></i>											
																</div>
															</div> --}}
														</div>
													</div>
												</div>

												<div class="slt_bx_area_user">
													<div class="slt_bxxs">
														<select id="property_select_dropdown2" name="second_property">
															<option value="">Select Property</option>
															<optgroup label="Buy And Sell">
																@foreach ($buyAnSellProperty as $item)
																	<option @if(isset($requests['second_property']) && $requests['second_property'] == $item->prop_id) selected @endif value="{{ $item->prop_id }}">{{ $item->prop_name }}</option>
																@endforeach
															</optgroup>

															<optgroup label="Buy And Hold">
																@foreach ($buyAnHoldProperty as $item)
																	<option @if(isset($requests['second_property']) && $requests['second_property'] == $item->prop_id) selected @endif value="{{ $item->prop_id }}">{{ $item->prop_name }}</option>
																@endforeach
															</optgroup>

															<optgroup label="Buy, Hold And Refinance">
																@foreach ($buyHoldRefinanceProperty as $item)
																	<option @if(isset($requests['second_property']) && $requests['second_property'] == $item->prop_id) selected @endif value="{{ $item->prop_id }}">{{ $item->prop_name }}</option>
																@endforeach
															</optgroup>
														</select>
													</div>

													@if (!is_null($secondProperty))
														@php
															$propertyAddress = App\Models\PropertyAddress::where('prop_id',$secondProperty->prop_id)->with(['city','state'])->first();
															// dd($propertyAddress);
														@endphp
														<div class="slt_are_metrr" id="property_address2">
															<p>{{ $propertyAddress?->prop_street }}</p>
															<p>{{ $propertyAddress?->city?->name.' '.$propertyAddress?->state?->name.' '.$propertyAddress?->prop_zip }}</p>

															<p><a href="javascript:void(0);"><span class="blue">View <i class="fa fa-long-arrow-right"></i></span></a></p>
														</div>
													@endif
												</div>
											</div>
										</div>
									</th>
									<th>
									<div class="removedd">
										@if(!is_null($thirdProperty))
											<span class="rmss_vv" id="third_property_remove_button" style="cursor: pointer;" data-id="{{$thirdProperty->prop_id}}">
												<i class="fa fa-times"></i> Remove
											</span>
										@endif
										<div class="prop_ly_ad_listt">
												<div class="extr_adsss">
													<div class="mg_bx_araea">
														@php
															if (!is_null($thirdProperty) && !is_null($thirdProperty->imageVideo)){
																$imagePath = public_path($thirdProperty->imageVideo);
																if(!is_null($thirdProperty->imageVideo)){
																	if (File::exists($imagePath)) {
																		$imagePath = asset($thirdProperty->imageVideo);
																	} else {
																		$imagePath = asset('img/image-new-property.png');
																	}
																}else{
																	$imagePath = asset('img/image-new-property.png');
																}
															}else{
																$imagePath = asset('img/image-new-property.png');
															}
														@endphp
														<img src="{{$imagePath}}" alt="">
													</div>
												</div>

												<div class="slt_bx_area_user">
													<div class="slt_bxxs">
														<select id="property_select_dropdown3" name="third_property">
															<option value="">Select Property</option>
															<optgroup label="Buy And Sell">
																@foreach ($buyAnSellProperty as $item)
																	<option @if(isset($requests['third_property']) && ($requests['third_property'] == $item->prop_id)) selected @endif value="{{ $item->prop_id }}">{{ $item->prop_name }}</option>
																@endforeach
															</optgroup>

															<optgroup label="Buy And Hold">
																@foreach ($buyAnHoldProperty as $item)
																	<option @if(isset($requests['third_property']) && ($requests['third_property'] == $item->prop_id)) selected @endif value="{{ $item->prop_id }}">{{ $item->prop_name }}</option>
																@endforeach
															</optgroup>

															<optgroup label="Buy, Hold And Refinance">
																@foreach ($buyHoldRefinanceProperty as $item)
																	<option @if(isset($requests['third_property']) && ($requests['third_property'] == $item->prop_id)) selected @endif value="{{ $item->prop_id }}">{{ $item->prop_name }}</option>
																@endforeach
															</optgroup>
														</select>
													</div>
													@if (!is_null($thirdProperty))
														@php
															$propertyAddress = App\Models\PropertyAddress::where('prop_id',$thirdProperty->prop_id)->with(['city','state'])->first();
															// dd($propertyAddress);
														@endphp
														<div class="slt_are_metrr" id="property_address3">
															<p>{{ $propertyAddress?->prop_street }}</p>
															<p>{{ $propertyAddress?->city?->name.' '.$propertyAddress?->state?->name.' '.$propertyAddress?->prop_zip }}</p>

															<p><a href="javascript:void(0);"><span class="blue">View <i class="fa fa-long-arrow-right"></i></span></a></p>
														</div>
													@endif
												</div>
											</div>
										</div>
									</th>
								</form>
							</tr>
						</thead>
						<tbody id="compare_content1">
							<tr class="table-sub-heading blue">
								<td colspan="2">&nbsp;</td>
							</tr>
							<tr>
								<td>&nbsp;@if(!is_null($firstPropertyDescription)) {{ $firstPropertyDescription->prop_type }} @endif</td>
								<td>&nbsp;@if(!is_null($secondPropertyDescription)) {{ $secondPropertyDescription->prop_type }} @endif</td>
								<td>&nbsp;@if(!is_null($thirdPropertyDescription)) {{ $thirdPropertyDescription->prop_type }} @endif</td>
							</tr>
							<tr>
								<td>
									@if(!is_null($firstProperty))
										<span>
											<span>4<span>BR</span>/ 4 BA</span>
										</span>
									@endif
								</td>
								<td>
									@if(!is_null($secondProperty))
										<span>
											<span>1 Unit</span>
										</span>
									@endif
								</td>
								<td>
									@if(!is_null($thirdProperty))
										<span>
											<span>4<span>BR</span>/ 4 BA</span>
										</span>
									@endif
								</td>
							</tr>
							<tr>
								<td>
                                    @if(!is_null($firstPropertyDescription))
									    <span>&nbsp;{{ $firstPropertyDescription->desc_lot }} </span>
                                    @endif
								</td>
								<td>
                                    @if(!is_null($secondPropertyDescription))
									    <span>&nbsp;{{ $secondPropertyDescription->desc_lot }} </span>
                                    @endif
								</td>
								<td>
                                    @if(!is_null($thirdPropertyDescription))
									    <span>&nbsp;{{ $thirdPropertyDescription->desc_lot }} </span>
                                    @endif
								</td>
							</tr>
							<tr>
								<td>
                                    @if(!is_null($firstPropertyDescription))
									    <span>&nbsp;{{ $firstPropertyDescription->desc_year }} </span>
                                    @endif
								</td>
								<td>
                                    @if(!is_null($secondPropertyDescription))
									    <span>&nbsp;{{ $secondPropertyDescription->desc_year }} </span>
                                    @endif
								</td>
								<td>
                                    @if(!is_null($thirdPropertyDescription))
									    <span>&nbsp;{{ $thirdPropertyDescription->desc_year }} </span>
                                    @endif
								</td>
							</tr>
							<tr>                                
                                <td>@if(!is_null($firstPropertyDescription)) &nbsp; Car Port @endif</td>                                
								<td>@if(!is_null($secondPropertyDescription)) &nbsp; Car Port @endif</td>
								<td>@if(!is_null($thirdPropertyDescription)) &nbsp; Car Port @endif</td>
							</tr>
							<tr class="table-row-padded">
								<td>
                                    @if(!is_null($firstPropertyDescription))
									    <span>&nbsp; {{ $firstPropertyDescription->desc_lot  }} <span>sq.ft.</span></span>
                                    @endif
								</td>
								<td>
                                    @if(!is_null($secondPropertyDescription))
									    <span>&nbsp;{{ $secondPropertyDescription->desc_lot }} <span>sq.ft.</span></span>
                                    @endif
								</td>
								<td>
                                    @if(!is_null($thirdPropertyDescription))
									    <span>&nbsp;{{ $thirdPropertyDescription->desc_lot }} <span>sq.ft.</span></span>
                                    @endif
								</td>
							</tr>
						</tbody>
						<tbody id="compare_content2">
							<tr class="table-sub-heading blue">
								<td colspan="2">&nbsp;</td>
							</tr>
							<tr>
								<td>@if(!is_null($firstProperty)) ₹ {{ $firstProperty->prop_purchasePrice }} @endif</td>
								<td>@if(!is_null($secondProperty)) ₹ {{ $secondProperty->prop_purchasePrice }} @endif</td>
								<td>@if(!is_null($thirdProperty)) ₹ {{ $thirdProperty->prop_purchasePrice }} @endif</td>
							</tr>
							{{-- =================================================== Amount Financed =================================================== --}}
							<tr>
								<td>
                                    @if(!is_null($firstProperty))
                                        @php
                                            $firstPropertyLoans = TotalLoanAmount($firstProperty);
                                        @endphp
									    <span><span class="table-math-symbol">-</span> ₹ {{ $firstPropertyLoans['totalAmount'] }} </span>
                                    @endif
								</td>
								<td>
                                    @if(!is_null($secondProperty))
                                        @php
                                            $secondPropertyLoans = TotalLoanAmount($secondProperty);
                                        @endphp
									    <span><span class="table-math-symbol">-</span> ₹ {{ $secondPropertyLoans['totalAmount'] }} </span>
                                    @endif
								</td>
								<td>
                                    @if(!is_null($thirdProperty))
                                        @php
                                            $thirdPropertyLoans = TotalLoanAmount($thirdProperty);
                                        @endphp
									    <span><span class="table-math-symbol">-</span> ₹ {{ $thirdPropertyLoans['totalAmount'] }} </span>
                                    @endif
								</td>
							</tr>
							{{-- =================================================== Down Payment =================================================== --}}
							<tr class="table-row-total blue">
								<td>
                                    @if(!is_null($firstProperty))
									    <span><span class="table-math-symbol">=</span> ₹ {{ $firstProperty->prop_purchasePrice - $firstPropertyLoans['totalAmount'] }} </span>
                                    @endif
								</td>
								<td>
                                    @if(!is_null($secondProperty))
									    <span><span class="table-math-symbol">=</span> ₹ {{ $secondProperty->prop_purchasePrice - $secondPropertyLoans['totalAmount'] }} </span>
                                    @endif
								</td>
								<td>
                                    @if(!is_null($thirdProperty))
									    <span><span class="table-math-symbol">=</span> ₹ {{ $thirdProperty->prop_purchasePrice - $thirdPropertyLoans['totalAmount'] }} </span>
                                    @endif
								</td>
							</tr>
							{{-- =================================================== Purchase Costs =================================================== --}}
							<tr>
								<td>
                                    @if(!is_null($firstProperty))
                                        @php
                                            $firstPropertyPurchesCost = PurchaseCostsHelper($firstProperty)
                                        @endphp
                                        <span class="table-math-symbol">+</span> ₹ {{ $firstPropertyPurchesCost['TotalAmount'] }}
                                    @endif
                                </td>
								<td>
                                    @if(!is_null($secondProperty))
                                        @php
                                            $secondPropertyPurchesCost = PurchaseCostsHelper($secondProperty)
                                        @endphp
                                        <span class="table-math-symbol">+</span> ₹ {{ $secondPropertyPurchesCost['TotalAmount'] }}
                                    @endif
                                </td>
								<td>
                                    @if(!is_null($thirdProperty))
                                        @php
                                            $thirdPropertyPurchesCost = PurchaseCostsHelper($thirdProperty)
                                        @endphp
                                        <span class="table-math-symbol">+</span> ₹ {{ $thirdPropertyPurchesCost['TotalAmount'] }}
                                    @endif
                                </td>
							</tr>
							{{-- =================================================== Total Cash Needed =================================================== --}}
							<tr class="table-row-total table-row-padded bold blue">
								<td>
									@if(!is_null($firstProperty)) 
										@php
											$firstPropertyLoans = TotalLoanAmount($firstProperty);
											$firstPropertyPurchesCost = PurchaseCostsHelper($firstProperty);
											$TotalCashNeeded = $firstProperty->prop_purchasePrice - $firstPropertyLoans['totalAmount'] + $firstPropertyPurchesCost['TotalAmount'];
										@endphp
										<span class="table-math-symbol">=</span> ₹ {{ $TotalCashNeeded }} 
									@endif
								</td>
								<td>
									@if(!is_null($secondProperty)) 
										@php
											$secondPropertyLoans = TotalLoanAmount($secondProperty);
											$secondPropertyPurchesCost = PurchaseCostsHelper($secondProperty);
											$TotalCashNeeded = $secondProperty->prop_purchasePrice - $secondPropertyLoans['totalAmount'] + $secondPropertyPurchesCost['TotalAmount'];
										@endphp
										<span class="table-math-symbol">=</span> ₹ {{ $TotalCashNeeded }} 
									@endif
								</td>
								<td>
									@if(!is_null($thirdProperty)) 
										@php
											// dd($thirdProperty);
											$thirdPropertyLoans = TotalLoanAmount($thirdProperty);
											$thirdPropertyPurchesCost = PurchaseCostsHelper($thirdProperty);
											$TotalCashNeeded = $thirdProperty->prop_purchasePrice - $thirdPropertyLoans['totalAmount'] + $thirdPropertyPurchesCost['TotalAmount'];
										@endphp
										<span class="table-math-symbol">=</span> ₹ {{ $TotalCashNeeded }} 
									@endif
								</td>
							</tr>
						</tbody>
						<tbody id="compare_content3">
							<tr class="table-sub-heading blue">
								<td colspan="2">&nbsp;</td>
							</tr>
                            @php
								if(!is_null($firstProperty)){
									$firstPropertyLoans = PropertyLoans($firstProperty);
								}
                                if(!is_null($secondProperty)){
                                	$secondPropertyLoans = PropertyLoans($secondProperty);
								}
                            @endphp
							{{-- =================================================== Loan Amount =================================================== --}}
							<tr>
								<td>
									@if(!is_null($firstProperty))
										@php
											$PropertyLoansCount = App\Models\PropertyLoan::where('property_id',$firstProperty->prop_id)->count();
											$LoanData = TotalLoanAmount($firstProperty);
											$TotalPurchaseCostsAmount = PurchaseCosts($firstProperty);
											$totalLoanAmount = array_sum($LoanData['loanWithMortgageIns']);
										@endphp
									 	<span>&nbsp;₹ {{ $totalLoanAmount }}</span>
									@endif
								</td>
								<td>
									@if(!is_null($secondProperty)) 
										@php
											$PropertyLoansCount = App\Models\PropertyLoan::where('property_id',$secondProperty->prop_id)->count();
											$LoanData = TotalLoanAmount($secondProperty);
											$TotalPurchaseCostsAmount = PurchaseCosts($secondProperty);
											$totalLoanAmount = array_sum($LoanData['loanWithMortgageIns']);
										@endphp
										<span>&nbsp;₹ {{ $totalLoanAmount }}</span>
									@endif
								</td>
								<td>
									@if(!is_null($thirdProperty)) 
										@php
											$PropertyLoansCount = App\Models\PropertyLoan::where('property_id',$thirdProperty->prop_id)->count();
											$LoanData = TotalLoanAmount($thirdProperty);
											$TotalPurchaseCostsAmount = PurchaseCosts($thirdProperty);
											$totalLoanAmount = array_sum($LoanData['loanWithMortgageIns']);
										@endphp
										<span>&nbsp;₹ {{ $totalLoanAmount + $TotalPurchaseCostsAmount }}</span>
									@endif
								</td>
							</tr>
							{{-- =================================================== Loan To Cost =================================================== --}}
							<tr ng-if="!prefix">
								<td>
									@if(!is_null($firstProperty))
										@php
											$LoanData = TotalLoanAmount($firstProperty);
											$PropertyLoansCount = App\Models\PropertyLoan::where('property_id',$firstProperty->prop_id)->count();
										@endphp
										<span>{{ $LoanData['loanPercent'] }}%</span>                                  	
									@endif
								</td>
								<td>
                                    @if(!is_null($secondProperty))
										@php
											$LoanData = TotalLoanAmount($secondProperty);
											$PropertyLoansCount = App\Models\PropertyLoan::where('property_id',$secondProperty->prop_id)->count();
										@endphp
										<span>{{ $LoanData['loanPercent'] }}%</span>                              	
									@endif
								</td>
								<td>
                                    @if(!is_null($thirdProperty))
										@php
											$LoanData = TotalLoanAmount($thirdProperty);
											$PropertyLoansCount = App\Models\PropertyLoan::where('property_id',$thirdProperty->prop_id)->count();
										@endphp
										<span>{{ $LoanData['loanPercent'] }}%</span>                              	
									@endif
								</td>
							</tr>
							{{-- =================================================== Loan To Value =================================================== --}}
							<tr>
								<td>
									@if (!is_null($firstProperty))
										@php
											$totalLoanAmount = TotalLoanAmount($firstProperty);
											$marketValue = $firstProperty->prop_salePrice;
											try {
												$LoanToValue = $totalLoanAmount['totalAmount'] / $marketValue * 100;
												$LoanToValue = number_format($LoanToValue,1);
											} catch (\Throwable $th) {
												$LoanToValue = 0;
											}
										@endphp
										<span>{{ $LoanToValue }} % </span>
									@endif
								</td>
								<td>
									@if (!is_null($secondProperty))
										@php
											$totalLoanAmount = TotalLoanAmount($secondProperty);
											$marketValue = $secondProperty->prop_salePrice;											
											try {
												$LoanToValue = $totalLoanAmount['totalAmount'] / $marketValue * 100;
												$LoanToValue = number_format($LoanToValue,1);
											} catch (\Throwable $th) {
												$LoanToValue = 0;
											}
										@endphp
										<span>{{ $LoanToValue }} % </span>
									@endif
								</td>
								<td>
									@if (!is_null($thirdProperty))
										@php
											$totalLoanAmount = TotalLoanAmount($thirdProperty);
											$marketValue = $thirdProperty->prop_salePrice;
											try {
												$LoanToValue = $totalLoanAmount['totalAmount'] / $marketValue * 100;
												$LoanToValue = number_format($LoanToValue,1);
											} catch (\Throwable $th) {
												$LoanToValue = 0;
											}
										@endphp
										<span>{{ $LoanToValue }} % </span>
									@endif
								</td>
							</tr>
							{{-- =================================================== Financing Of =================================================== --}}
							<tr ng-if="!prefix">
								<td>
									@if(!is_null($firstProperty))
										@php
											$PropertyLoansCount = App\Models\PropertyLoan::where('property_id',$firstProperty->prop_id)->count();
										@endphp
										@if ($PropertyLoansCount > 1)
											<span>Multiple Loans ({{$PropertyLoansCount}}) </span>
										@else
											@php
												$PropertyLoans = App\Models\PropertyLoan::where('property_id',$firstProperty->prop_id)->first();
											@endphp
											@if(!is_null($PropertyLoans))
												<span>Price ({{ $PropertyLoans->price_financing }}) % </span>
											@endif
										@endif                                    	
									@endif
								</td>
								<td>
                                    @if(!is_null($secondProperty))
										@php
											$PropertyLoansCount = App\Models\PropertyLoan::where('property_id',$secondProperty->prop_id)->count();
										@endphp
										@if ($PropertyLoansCount > 1)
											<span>Multiple Loans ({{$PropertyLoansCount}}) </span>
										@else
											@php
												$PropertyLoans = App\Models\PropertyLoan::where('property_id',$secondProperty->prop_id)->first();
											@endphp
											@if(!is_null($PropertyLoans))
												<span>Price ({{ $PropertyLoans->price_financing }}) % </span>
											@endif
										@endif                                    	
									@endif
								</td>
								<td>
                                    @if(!is_null($thirdProperty))
										@php
											$PropertyLoansCount = App\Models\PropertyLoan::where('property_id',$thirdProperty->prop_id)->count();
										@endphp
										@if ($PropertyLoansCount > 1)
											<span>Multiple Loans ({{$PropertyLoansCount}}) </span>
										@else
											@php
												$PropertyLoans = App\Models\PropertyLoan::where('property_id',$thirdProperty->prop_id)->first();
											@endphp
											@if(!is_null($PropertyLoans))
												<span>Price ({{ $PropertyLoans->price_financing }}) % </span>
											@endif
										@endif                                    	
									@endif
								</td>
							</tr>
							{{-- =================================================== Loan Type =================================================== --}}
							<tr ng-if="!prefix">
								<td>
									@if(!is_null($firstProperty))
										@php
											$PropertyLoansCount = App\Models\PropertyLoan::where('property_id',$firstProperty->prop_id)->count();
										@endphp
										@if ($PropertyLoansCount > 1)
											<span>Multiple Loans ({{$PropertyLoansCount}}) </span>
										@else
											@php
												$PropertyLoans = App\Models\PropertyLoan::where('property_id',$firstProperty->prop_id)->first();
											@endphp
											@if(!is_null($PropertyLoans))
												@if ($PropertyLoans->loan_type == 1)
													<span>Amortizing, {{ $PropertyLoans->loan_term }} Year </span>
												@else
													<span>Interest-Only, {{ $PropertyLoans->loan_term }} Year </span>
												@endif
											@endif
										@endif                                    	
									@endif
								</td>
								<td>
                                    @if(!is_null($secondProperty))
										@php
											$PropertyLoansCount = App\Models\PropertyLoan::where('property_id',$secondProperty->prop_id)->count();
										@endphp
										@if ($PropertyLoansCount > 1)
											<span>Multiple Loans ({{$PropertyLoansCount}}) </span>
										@else
											@php
												$PropertyLoans = App\Models\PropertyLoan::where('property_id',$secondProperty->prop_id)->first();
											@endphp
											@if(!is_null($PropertyLoans))
												@if ($PropertyLoans->loan_type == 1)
													<span>Amortizing, {{ $PropertyLoans->loan_term }} Year </span>
												@else
													<span>Interest-Only, {{ $PropertyLoans->loan_term }} Year </span>
												@endif
											@endif
										@endif
									@endif
								</td>
								<td>
                                    @if(!is_null($thirdProperty))
										@php
											$PropertyLoansCount = App\Models\PropertyLoan::where('property_id',$thirdProperty->prop_id)->count();
										@endphp
										@if ($PropertyLoansCount > 1)
											<span>Multiple Loans ({{$PropertyLoansCount}}) </span>
										@else
											@php
												$PropertyLoans = App\Models\PropertyLoan::where('property_id',$thirdProperty->prop_id)->first();
											@endphp
											@if(!is_null($PropertyLoans))
												@if ($PropertyLoans->loan_type == 1)
													<span>Amortizing, {{ $PropertyLoans->loan_term }} Year </span>
												@else
													<span>Interest-Only, {{ $PropertyLoans->loan_term }} Year </span>
												@endif
											@endif
										@endif
									@endif
								</td>
							</tr>
							{{-- =================================================== Interest Rate =================================================== --}}
							<tr>								
								<td>
									@if (!is_null($firstProperty))
										@php
											$PropertyLoansCount = App\Models\PropertyLoan::where('property_id',$firstProperty->prop_id)->count();
										@endphp

										@if($PropertyLoansCount > 1)
											<span>Multiple Loans ({{$PropertyLoansCount}}) </span>
										@else
											@php
												$PropertyLoans = App\Models\PropertyLoan::where('property_id',$firstProperty->prop_id)->first();
											@endphp
											@if(!is_null($PropertyLoans))
												<span>{{ $PropertyLoans->interest_rate }} % </span>
											@endif
										@endif
									@endif										
								</td>
								<td>
									@if (!is_null($secondProperty))
										@php
											$PropertyLoansCount = App\Models\PropertyLoan::where('property_id',$secondProperty->prop_id)->count();
										@endphp
										@if($PropertyLoansCount > 1)
											<span>Multiple Loans ({{$PropertyLoansCount}}) </span>
										@else
											@php
												$PropertyLoans = App\Models\PropertyLoan::where('property_id',$secondProperty->prop_id)->first();
											@endphp
											@if(!is_null($PropertyLoans))
												<span>{{ $PropertyLoans->interest_rate }} % </span>
											@endif
										@endif
									@endif
								</td>
								<td>
									@if (!is_null($thirdProperty))
										@php
											$PropertyLoansCount = App\Models\PropertyLoan::where('property_id',$thirdProperty->prop_id)->count();
										@endphp
										@if($PropertyLoansCount > 1)
											<span>Multiple Loans ({{$PropertyLoansCount}}) </span>
										@else
											@php
												$PropertyLoans = App\Models\PropertyLoan::where('property_id',$thirdProperty->prop_id)->first();
											@endphp
											@if(!is_null($PropertyLoans))
												<span>{{ $PropertyLoans->interest_rate }} % </span>
											@endif
										@endif
									@endif
								</td>
							</tr>
							{{-- =================================================== Mortgage Insurance =================================================== --}}
							<tr class="table-row-padded">
								<td>
									@if (!is_null($firstProperty))
										@php
											$PropertyLoansCount = App\Models\PropertyLoan::where('property_id',$firstProperty->prop_id)->count();
										@endphp
										@if($PropertyLoansCount > 1)
											<span>Multiple Loans ({{$PropertyLoansCount}}) </span>
										@else											
											@php
												$totalLoanAmount = TotalLoanAmount($firstProperty);
											@endphp
											<span>₹ {{ $totalLoanAmount['MortgageInsurance'] }} Upfront / ₹ {{ $totalLoanAmount['PMI'] }} Per Month</span>
										@endif
									@endif
								</td>
								<td>
									@if (!is_null($secondProperty))
										@php
											$PropertyLoansCount = App\Models\PropertyLoan::where('property_id',$secondProperty->prop_id)->count();
										@endphp
										@if($PropertyLoansCount > 1)
											<span>Multiple Loans ({{$PropertyLoansCount}}) </span>
										@else
											@php
												$totalLoanAmount = TotalLoanAmount($secondProperty);
											@endphp
											<span>₹ {{ $totalLoanAmount['MortgageInsurance'] }} Upfront / ₹ {{ $totalLoanAmount['PMI'] }} Per Month</span>
										@endif
									@endif
								</td>
								<td>
									@if (!is_null($thirdProperty))
										@php
											$PropertyLoansCount = App\Models\PropertyLoan::where('property_id',$thirdProperty->prop_id)->count();
										@endphp
										@if($PropertyLoansCount > 1)
											<span>Multiple Loans ({{$PropertyLoansCount}}) </span>
										@else
											@php
												$totalLoanAmount = TotalLoanAmount($thirdProperty);
											@endphp
											<span>₹ {{ $totalLoanAmount['MortgageInsurance'] }} Upfront / ₹ {{ $totalLoanAmount['PMI'] }} Per Month</span>
										@endif
									@endif
								</td>
							</tr>
						</tbody>
						<tbody id="compare_content4">
							<tr class="table-sub-heading blue">
								<td colspan="2">&nbsp;</td>
							</tr>
							{{-- ===================================================  After Repair Value =================================================== --}}
							<tr>
								<td>@if(!is_null($firstProperty)) ₹ {{ $firstProperty->prop_salePrice }} @endif</td>
								<td>@if(!is_null($secondProperty)) ₹ {{ $secondProperty->prop_salePrice }} @endif</td>
								<td>@if(!is_null($thirdProperty)) ₹ {{ $thirdProperty->prop_salePrice }} @endif</td>
							</tr>
							{{-- =================================================== ARV Per Square Foot =================================================== --}}
							<tr>

								<td>
                                    @if(!is_null($firstProperty)) 
                                       @php
                                           $ARVPerSquareFoot = ARVPerSquareFoot($firstProperty);
                                       @endphp
                                       ₹ {{ $ARVPerSquareFoot }}
                                    @endif
                                </td>
								<td>
                                    @if(!is_null($secondProperty)) 
                                        @php
                                            $ARVPerSquareFoot = ARVPerSquareFoot($secondProperty);
                                        @endphp
                                        ₹ {{ $ARVPerSquareFoot }}
                                    @endif
                                </td>
								<td>
                                    @if(!is_null($thirdProperty)) 
                                        @php
                                            $ARVPerSquareFoot = ARVPerSquareFoot($thirdProperty);
                                        @endphp
                                        ₹ {{ $ARVPerSquareFoot }}
                                    @endif
                                </td>
							</tr>
							{{-- =================================================== Price Per Square Foot =================================================== --}}
							<tr>
                                <td>
                                    @if(!is_null($firstProperty)) 
                                        @php
                                            $totalSquareFeet = TotalSquareFoot($firstProperty);
											try {
												$ARVPerSquareFootPrice = $firstProperty->prop_purchasePrice / $totalSquareFeet;
												$ARVPerSquareFootPrice = round($ARVPerSquareFootPrice);
											} catch (\Throwable $th) {
												$ARVPerSquareFootPrice = 0;
											}
											
                                        @endphp
                                        ₹ {{ $ARVPerSquareFootPrice }}
                                    @endif
                                </td>
								<td>
                                    @if(!is_null($secondProperty)) 
                                        @php
                                            $totalSquareFeet = TotalSquareFoot($secondProperty);
											try {
												$ARVPerSquareFootPrice = $secondProperty->prop_purchasePrice / $totalSquareFeet;
												$ARVPerSquareFootPrice = round($ARVPerSquareFootPrice);
											} catch (\Throwable $th) {
												$ARVPerSquareFootPrice = 0;
											}
											
                                        @endphp
                                        ₹ {{ $ARVPerSquareFootPrice }}
                                    @endif
                                </td>
								<td>
                                    @if(!is_null($thirdProperty)) 
                                        @php
                                            $totalSquareFeet = TotalSquareFoot($thirdProperty);
											try {
												$ARVPerSquareFootPrice = $thirdProperty->prop_purchasePrice / $totalSquareFeet;
												$ARVPerSquareFootPrice = round($ARVPerSquareFootPrice);
											} catch (\Throwable $th) {
												//throw $th;
											}
											
                                        @endphp
                                        ₹ {{ $ARVPerSquareFootPrice }}
                                    @endif
                                </td>
							</tr>
							<tr>
								<td style="color: red;">
									@if(!is_null($firstProperty))
										<span>N/A</span>
									@endif
								</td>
								<td style="color: red;">
									@if(!is_null($secondProperty))
										<span>₹ 5,000,000</span>
									@endif
								</td>
								<td style="color: red;">
									@if(!is_null($thirdProperty))
										<span>₹ 5,000,000</span>
									@endif
								</td>
							</tr>
							<tr class="table-row-padded">
								<td style="color: red;">
									@if(!is_null($firstProperty))
										<span>N/A</span>
									@endif
								</td>
								<td style="color: red;">
									@if(!is_null($secondProperty))
										<span>₹ 5,000,000</span>
									@endif
								</td>
								<td style="color: red;">
									@if(!is_null($thirdProperty))
										<span>₹ 5,000,000</span>
									@endif
								</td>
							</tr>
						</tbody>
						<tbody id="compare_content5">
							<tr class="table-sub-heading blue">
								<td colspan="2">&nbsp;</td>
							</tr>
							{{-- ============================ Gross Rent ============================ --}} 
							<tr>
								<td>
                                    @if(!is_null($firstProperty))
                                        ₹ {{ $firstProperty->grossrent }}
                                    @endif
                                </td>
								<td>
                                    @if(!is_null($secondProperty))
                                        ₹ {{ $secondProperty->grossrent }}
                                    @endif
                                </td>
								<td>
                                    @if(!is_null($thirdProperty))
                                        ₹ {{ $thirdProperty->grossrent }}
                                    @endif
                                </td>
							</tr>
							{{-- ============================ Vacancy ============================ --}} 
							<tr class="table-row-with-sub-value">
								<td>
                                    @if (!is_null($firstProperty))
                                        @php
                                            $vacancy = round($firstProperty->grossrent * $firstProperty->vacancy_rate / 100);
                                        @endphp
                                        <span class="table-math-symbol">-</span> {{ $vacancy }}<br>
                                        <span class="table-sub-value">{{ $firstProperty->vacancy_rate }} % of Rent</span>
                                    @endif
								</td>
								<td>
                                    @if (!is_null($secondProperty))
                                        @php
                                            $vacancy = round($secondProperty->grossrent * $secondProperty->vacancy_rate / 100);
                                        @endphp
                                        <span class="table-math-symbol">-</span> {{ $vacancy }}<br>
                                        <span class="table-sub-value">{{ $secondProperty->vacancy_rate }}% of Rent</span>
                                    @endif
								</td>
								<td>
                                    @if (!is_null($thirdProperty))
                                        @php
                                            $vacancy = round($thirdProperty->grossrent * $thirdProperty->vacancy_rate / 100);
                                        @endphp
                                        <span class="table-math-symbol">-</span> {{ $vacancy }}<br>
                                        <span class="table-sub-value">{{ $thirdProperty->vacancy_rate }}% of Rent</span>
                                    @endif
								</td>
							</tr>
							{{-- ============================ Other Income ============================ --}} 
							<tr>
								<td>
									@if (!is_null($firstProperty))
                                        @php
											$otherIncome = OtherIncome($firstProperty);
                                        @endphp
										<span class="table-math-symbol">+</span> ₹ {{ $otherIncome['monthlyTotalAmount'] }}
									@endif
								</td>
								<td>
									@if (!is_null($secondProperty))
                                        @php
											$otherIncome = OtherIncome($secondProperty);
                                        @endphp
										<span class="table-math-symbol">+</span> ₹ {{ $otherIncome['monthlyTotalAmount'] }}
									@endif
								</td>
								<td>
									@if (!is_null($thirdProperty))
                                        @php
											$otherIncome = OtherIncome($thirdProperty);
                                        @endphp
										<span class="table-math-symbol">+</span> ₹ {{ $otherIncome['monthlyTotalAmount'] }}
									@endif
								</td>
							</tr>
							{{-- ============================ Operating Income ============================ --}} 
							<tr class="table-row-total blue">
								<td>
									@if (!is_null($firstProperty))
                                        @php
											$grossRent = $firstProperty->grossrent;
                                            $vacancy = round($firstProperty->grossrent * $firstProperty->vacancy_rate / 100);
											$otherIncome = OtherIncome($firstProperty);
											$otherIncome = $otherIncome['monthlyTotalAmount'];
											$OperatingIncome = ($grossRent - $vacancy) + $otherIncome;
                                        @endphp
										<span class="table-math-symbol">=</span> ₹ {{ $OperatingIncome }}
									@endif
								</td>
								<td>
									@if (!is_null($secondProperty))
                                        @php
											$grossRent = $secondProperty->grossrent;
                                            $vacancy = round($secondProperty->grossrent * $secondProperty->vacancy_rate / 100);
											$otherIncome = OtherIncome($secondProperty);
											$otherIncome = $otherIncome['monthlyTotalAmount'];
											$OperatingIncome = ($grossRent - $vacancy) + $otherIncome;
                                        @endphp
										<span class="table-math-symbol">=</span> ₹ {{ $OperatingIncome }}
									@endif
								</td>
								<td>
									@if (!is_null($thirdProperty))
                                        @php
											$grossRent = $thirdProperty->grossrent;
                                            $vacancy = round($thirdProperty->grossrent * $thirdProperty->vacancy_rate / 100);
											$otherIncome = OtherIncome($thirdProperty);
											$otherIncome = $otherIncome['monthlyTotalAmount'];
											$OperatingIncome = ($grossRent - $vacancy) + $otherIncome;
                                        @endphp
										<span class="table-math-symbol">=</span> ₹ {{ $OperatingIncome }}
									@endif
								</td>
							</tr>
							{{-- ============================ Operating Expenses ============================ --}} 
							<tr class="table-row-with-sub-value">
								<td>
									@if (!is_null($firstProperty))
										@php
											$OperatingExpenses = ItemOperativeExpense($firstProperty);
											$totalOperatingExpenses = $OperatingExpenses['monthly'];
										@endphp
										<span class="table-math-symbol">-</span> ₹ {{ round($totalOperatingExpenses) }}
									@endif
								</td>
								<td>
									@if (!is_null($secondProperty))
										@php
											$OperatingExpenses = ItemOperativeExpense($secondProperty);
											$totalOperatingExpenses = $OperatingExpenses['monthly'];
										@endphp
										<span class="table-math-symbol">-</span> ₹ {{ round($totalOperatingExpenses) }}
									@endif
								</td>
								<td>
									@if (!is_null($thirdProperty))
										@php
											$OperatingExpenses = ItemOperativeExpense($thirdProperty);
											$totalOperatingExpenses = $OperatingExpenses['monthly'];
										@endphp
										<span class="table-math-symbol">-</span> ₹ {{ round($totalOperatingExpenses) }}
									@endif
								</td>
							</tr>
							{{-- ============================ Net Operating Income ============================ --}} 
							<tr class="table-row-total table-row-with-sub-value">
								<td class="red">
									@if (!is_null($firstProperty))
										@php
											$grossRent = $firstProperty->grossrent;
											$vacancy = round($firstProperty->grossrent * $firstProperty->vacancy_rate / 100);
											$otherIncome = OtherIncome($firstProperty);
											$otherIncome = $otherIncome['monthlyTotalAmount'];
											$OperatingIncome = ($grossRent - $vacancy) + $otherIncome;

											$OperatingExpenses = ItemOperativeExpense($firstProperty);
											$totalOperatingExpenses = $OperatingExpenses['monthly'];
											
											$NetOperatingIncome = $OperatingIncome - $totalOperatingExpenses;
										@endphp
										<span class="table-math-symbol">=</span> ₹ {{ $NetOperatingIncome }}
									@endif
								</td>
								<td class="red">
									@if (!is_null($secondProperty))
										@php
											$grossRent = $secondProperty->grossrent;
											$vacancy = round($secondProperty->grossrent * $secondProperty->vacancy_rate / 100);
											$otherIncome = OtherIncome($secondProperty);
											$otherIncome = $otherIncome['monthlyTotalAmount'];
											$OperatingIncome = ($grossRent - $vacancy) + $otherIncome;

											$OperatingExpenses = ItemOperativeExpense($secondProperty);
											$totalOperatingExpenses = $OperatingExpenses['monthly'];

											$NetOperatingIncome = $OperatingIncome - $totalOperatingExpenses;
										@endphp
										<span class="table-math-symbol">=</span> ₹ {{ $NetOperatingIncome }}
										{{-- <span class="table-sub-value">-₹ 1,460 Per Unit</span> --}}
									@endif
								</td>
								<td class="red">
									@if (!is_null($thirdProperty))
										@php
											$grossRent = $thirdProperty->grossrent;
											$vacancy = round($thirdProperty->grossrent * $thirdProperty->vacancy_rate / 100);
											$otherIncome = OtherIncome($thirdProperty);
											$otherIncome = $otherIncome['monthlyTotalAmount'];
											$OperatingIncome = ($grossRent - $vacancy) + $otherIncome;

											$OperatingExpenses = ItemOperativeExpense($thirdProperty);
											$totalOperatingExpenses = $OperatingExpenses['monthly'];

											$NetOperatingIncome = $OperatingIncome - $totalOperatingExpenses;
										@endphp
										<span class="table-math-symbol">=</span> ₹ {{ $NetOperatingIncome }}
										{{-- <span class="table-sub-value">-₹ 1,460 Per Unit</span> --}}
									@endif
								</td>
							</tr>
							{{-- ============================ Loan Payments ============================ --}}
							<tr>
								<td>
									@if(!is_null($firstProperty))
										@php
											$PropertyLoans = App\Models\PropertyLoan::where('property_id',$firstProperty->prop_id)->get();											
											foreach ($PropertyLoans as $value) {
												$principal = $firstProperty->prop_purchasePrice * $value->price_financing / 100;
												$calculateEMI = EMIcalculate($principal, $value->interest_rate, $value->loan_term);
											}
											
										@endphp
										<span class="table-math-symbol">-</span> ₹ 52,097
									@endif
								</td>
								<td>
									@if(!is_null($secondProperty))
										<span class="table-math-symbol">-</span> ₹ 53,333
									@endif
								</td>
								<td>
									@if(!is_null($thirdProperty))
										<span class="table-math-symbol">-</span> ₹ 53,333
									@endif
								</td>
							</tr>
							{{-- ============================ Cash Flow ============================ --}}
							<tr class="table-row-total bold table-row-with-sub-value">
								<td class="red">
									@if(!is_null($firstProperty))
										<span class="table-math-symbol">=</span> -₹ 1,219,430
									@endif
								</td>
								<td class="red">
									@if(!is_null($secondProperty))
										<span class="table-math-symbol">=</span> -₹ 54,793<br>
										<span class="table-sub-value">-₹ 54,793 Per Unit</span>
									@endif
								</td>
								<td class="red">
									@if(!is_null($thirdProperty))
										<span class="table-math-symbol">=</span> -₹ 54,793<br>
										<span class="table-sub-value">-₹ 54,793 Per Unit</span>
									@endif
								</td>
							</tr>
							{{-- ============================ Post-Tax Cash Flow ============================ --}}
							<tr class="table-row-padded table-row-with-sub-value">
								<td class="red">
									@if(!is_null($firstProperty))
										-₹ 1,219,430
									@endif
								</td>
								<td class="red">
									@if(!is_null($secondProperty))
										-₹ 54,793<br>
										<span class="table-sub-value">-₹ 54,793 Per Unit</span>
									@endif
								</td>
								<td class="red">
									@if(!is_null($thirdProperty))
										-₹ 54,793<br>
										<span class="table-sub-value">-₹ 54,793 Per Unit</span>
									@endif
								</td>
							</tr>
							{{-- ============================ Investment Returns ============================ --}}
							<tr class="table-sub-heading blue">
								<td colspan="2">&nbsp;</td>
							</tr>
							{{-- ============================ Cap Rate (Purchase Price) ============================ --}}
							<tr>
								<td class="red">
									@if (!is_null($firstProperty))
										@php
											$capRate = CapRatePurchasePrice($firstProperty,'Purchase Price');
										@endphp
										{{ round($capRate) }}%
									@endif
								</td>
								<td class="red">
									@if (!is_null($secondProperty))
										@php
											$capRate = CapRatePurchasePrice($secondProperty,'Purchase Price');
										@endphp
										{{ round($capRate) }}%
									@endif
								</td>
								<td class="red">
									@if (!is_null($thirdProperty))
										@php
											$capRate = CapRatePurchasePrice($thirdProperty,'Purchase Price');
										@endphp
										{{ round($capRate) }}%
									@endif
								</td>
							</tr>
							{{-- ============================ Cap Rate (Market Price) ============================ --}}							
							<tr>
								<td class="red">
									@if (!is_null($firstProperty))
										@php
											$capRate = CapRatePurchasePrice($firstProperty,'Market Price');
										@endphp
										{{ round($capRate) }}%
									@endif
								</td>
								<td class="red">
									@if (!is_null($secondProperty))
										@php
											$capRate = CapRatePurchasePrice($secondProperty,'Market Price');
										@endphp
										{{ round($capRate) }}%
									@endif
								</td>
								<td class="red">
									@if (!is_null($thirdProperty))
										@php
											$capRate = CapRatePurchasePrice($thirdProperty,'Market Price');
										@endphp
										{{ round($capRate) }}%
									@endif
								</td>
							</tr>
							{{-- ============================ Cash on Cash Return ============================ --}}
							<tr>
								<td class="red">
									@if (!is_null($firstProperty))
										@php
											$capRate = CashOnCashReturn($firstProperty);
										@endphp
										{{ round($capRate) }}%
									@endif
								</td>
								<td class="red">
									@if (!is_null($secondProperty))
										@php
											$capRate = CashOnCashReturn($secondProperty);
										@endphp
										{{ round($capRate) }}%
									@endif
								</td>
								<td class="red">
									@if (!is_null($thirdProperty))
										@php
											$capRate = CashOnCashReturn($thirdProperty);
										@endphp
										{{ round($capRate) }}%
									@endif
								</td>
							</tr>
							{{-- ============================ Return on Equity ============================ --}}
							<tr>
								<td class="red">
									@if (!is_null($firstProperty))
										@php
											$capRate = ReturnOnEquity($firstProperty);
										@endphp
										{{ round($capRate) }}%
									@endif
								</td>
								<td class="red">
									@if (!is_null($secondProperty))
										@php
											$capRate = ReturnOnEquity($secondProperty);
										@endphp
										{{ round($capRate) }}%
									@endif
								</td>
								<td class="red">
									@if (!is_null($thirdProperty))
										@php
											$capRate = ReturnOnEquity($thirdProperty);
										@endphp
										{{ round($capRate) }}%
									@endif
								</td>
							</tr>
							{{-- ============================ Return on Investment ============================ --}}
							<tr>
								<td class="red">
									@if (!is_null($firstProperty))
										@php
											$capRate = ReturnOnInvestment($firstProperty);
										@endphp
										{{ round($capRate) }}%
									@endif
								</td>
								<td class="red">
									@if (!is_null($secondProperty))
										@php
											$capRate = ReturnOnInvestment($secondProperty);
										@endphp
										{{ round($capRate) }}%
									@endif
								</td>
								<td class="red">
									@if (!is_null($thirdProperty))
										@php
											$capRate = ReturnOnInvestment($thirdProperty);
										@endphp
										{{ round($capRate) }}%
									@endif
								</td>
							</tr>
							{{-- ============================ Internal Rate of Return ============================ --}}
							<tr class="table-row-padded">
								<td class="red">
									@if (!is_null($firstProperty))
										@php
											$capRate = InternalRateOfReturn($firstProperty);
										@endphp
										{{ round($capRate) }}%
									@endif
								</td>
								<td class="red">
									@if (!is_null($secondProperty))
										@php
											$capRate = InternalRateOfReturn($secondProperty);
											// dd($capRate);
										@endphp
										{{ round($capRate) }}%
									@endif
								</td>
								<td class="red">
									@if (!is_null($thirdProperty))
										@php
											$capRate = InternalRateOfReturn($thirdProperty);
										@endphp
										{{ $capRate }}%
									@endif
								</td>
							</tr>
							<tr class="table-sub-heading blue">
								<td colspan="2">&nbsp;</td>
							</tr>
							{{-- ============================ Rent to Value ============================ --}}
							<tr>
								<td>
									@if (!is_null($firstProperty))
										@php
											$capRate = RentToValue($firstProperty);
										@endphp
										{{ round($capRate) }}%
									@endif
								</td>
								<td>
									@if (!is_null($secondProperty))
										@php
											$capRate = RentToValue($secondProperty);
										@endphp
										{{ round($capRate) }}%
									@endif
								</td>
								<td>
									@if (!is_null($thirdProperty))
										@php
											$capRate = RentToValue($thirdProperty);
										@endphp
										{{ round($capRate) }}%
									@endif
								</td>
							</tr>
							{{-- ============================ Gross Rent Multiplier ============================ --}}
							<tr>
								<td>
									@if (!is_null($firstProperty))
										@php
											$capRate = GrossRentMultiplier($firstProperty);
										@endphp
										{{ round($capRate) }}%
									@endif
								</td>
								<td>
									@if (!is_null($secondProperty))
										@php
											$capRate = GrossRentMultiplier($secondProperty);
										@endphp
										{{ round($capRate) }}%
									@endif
								</td>
								<td>
									@if (!is_null($thirdProperty))
										@php
											$capRate = GrossRentMultiplier($thirdProperty);
										@endphp
										{{ round($capRate) }}%
									@endif
								</td>
							</tr>
							{{-- ============================ Equity Multiple ============================ --}}
							<tr>
								<td class="red">
									@if (!is_null($firstProperty))
										@php
											$capRate = EquityMultiple($firstProperty);
										@endphp
										{{ round($capRate) }}%
									@endif
								</td>
								<td class="red">
									@if (!is_null($secondProperty))
										@php
											$capRate = EquityMultiple($secondProperty);
										@endphp
										{{ round($capRate) }}%
									@endif
								</td>
								<td class="red">
									@if (!is_null($thirdProperty))
										@php
											$capRate = EquityMultiple($thirdProperty);
										@endphp
										{{ round($capRate) }}%
									@endif
								</td>
							</tr>
							{{-- ============================ Break Even Ratio ============================ --}}
							<tr>
								<td class="red">
									@if (!is_null($firstProperty))
										@php
											$capRate = BreakEvenRatio($firstProperty);
										@endphp
										{{ round($capRate) }}%
									@endif
								</td>
								<td>
									@if (!is_null($secondProperty))
										@php
											$capRate = BreakEvenRatio($secondProperty);
										@endphp
										{{ round($capRate) }}%
									@endif
								</td>
								<td>
									@if (!is_null($thirdProperty))
										@php
											$capRate = BreakEvenRatio($thirdProperty);
										@endphp
										{{ round($capRate) }}%
									@endif
								</td>
							</tr>
							{{-- ============================ Debt Coverage Ratio ============================ --}}
							<tr>
								<td>
									<span class="red">
										@if (!is_null($firstProperty))
											@php
												$capRate = DebtCoverageRatio($firstProperty);
											@endphp
											{{ round($capRate) }}%
										@endif
									</span>
								</td>
								<td>
									<span class="red">
										@if (!is_null($secondProperty))
											@php
												$capRate = DebtCoverageRatio($secondProperty);
											@endphp
											{{ round($capRate) }}%
										@endif
									</span>
								</td>
								<td>
									<span class="red">
										@if (!is_null($thirdProperty))
											@php
												$capRate = DebtCoverageRatio($thirdProperty);
											@endphp
											{{ round($capRate) }}%
										@endif
									</span>
								</td>
							</tr>
							{{-- ============================ Debt Yield ============================ --}}
							<tr class="table-row-padded">
								<td>
									<span class="red">
										@if (!is_null($firstProperty))
											@php
												$capRate = DebtYield($firstProperty);
											@endphp
											{{ round($capRate) }}%
										@endif
									</span>
								</td>
								<td>
									<span class="red">
										@if (!is_null($secondProperty))
											@php
												$capRate = DebtYield($secondProperty);
											@endphp
											{{ round($capRate) }}%
										@endif
									</span>
								</td>
								<td>
									<span class="red">
										@if (!is_null($thirdProperty))
											@php
												$capRate = DebtYield($thirdProperty);
											@endphp
											{{ round($capRate) }}%
										@endif
									</span>
								</td>
							</tr>
						</tbody>
						<tbody id="compare_content6">
							<tr class="table-sub-heading blue">
								<td colspan="2">&nbsp;</td>
							</tr>
							<tr>
								<td>
									<div ng-if="criteriaDetails.items.length > 0">
										<div class="margin-b-5">
											Price <span class="red">greater than ₹250,000</span>
										</div>
										<div class="margin-b-5">
											Cash Needed <span class="red">greater than ₹50,000</span>
										</div>
										<div class="margin-b-5">
											<span class="red">Fails 50% Rule </span>
										</div>
										<div class="margin-b-5">
											Price/Sq.Ft. <span class="red">greater than ₹100</span>
										</div>
										<div class="margin-b-5">
											ARV/Sq.Ft. <span class="red">greater than ₹100</span>
										</div>
										<div class="margin-b-5">
											<span class="green">Passes 1% Rule </span>
										</div>
										<div class="margin-b-5">
											<span class="green">Passes 2% Rule </span>
										</div>
										<div class="margin-b-5">
											<span class="red">Fails 50% Rule </span>
										</div>
										<div>
											Cash Flow <span class="red">less than ₹200</span>
										</div>
									</div>
								</td>
								<td ng-repeat="property in selectedProperties track by property.$id" ng-controller="PropertyCriteriaCtrl">
									<div ng-if="criteriaDetails.items.length > 0">
										<div class="margin-b-5">
											Price <span class="red">greater than ₹250,000</span>
										</div>
										<div class="margin-b-5">
											Cash Needed <span class="red">greater than ₹50,000</span>
										</div>
										<div class="margin-b-5">
											<span class="red">Fails 50% Rule </span>
										</div>
										<div class="margin-b-5">
											Price/Sq.Ft. <span class="red">greater than ₹100</span>
										</div>
										<div class="margin-b-5">
											Price/Unit <span class="red">greater than ₹5,000</span>
										</div>
										<div class="margin-b-5">
											ARV/Sq.Ft. <span class="red">greater than ₹100</span>
										</div>
										<div class="margin-b-5">
											<span class="red">Fails 1% Rule </span>
										</div>
										<div class="margin-b-5">
											<span class="red">Fails 2% Rule </span>
										</div>
										<div class="margin-b-5">
											<span class="red">Fails 50% Rule </span>
										</div>
										<div class="margin-b-5">
											Cash Flow <span class="red">less than ₹200</span>
										</div>
										<div>
											Cash Flow/Unit <span class="red">less than ₹10,000</span>
										</div>
									</div>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
            </div>
        </div>
    </div>
</div>
@include('front.layouts.footer')
@include('front.layouts.footer_new')
<script>
	$('#first_property_remove_button').click(function(){
		var propertyID = $(this).data('id');
		var firstProperty = $('#property_select_dropdown1').val();
		var secondProperty = $('#property_select_dropdown2').val();
		var thirdProperty = $('#property_select_dropdown3').val();
		$('#action_input').val('remove');
		$('#remove_property_input').val('First');
		formSubmit(firstProperty,secondProperty,thirdProperty,'First','remove');
	})
	$('#second_property_remove_button').click(function(){
		var propertyID = $(this).data('id');
		var firstProperty = $('#property_select_dropdown1').val();
		var secondProperty = $('#property_select_dropdown2').val();
		var thirdProperty = $('#property_select_dropdown3').val();
		$('#action_input').val('remove');
		$('#remove_property_input').val('Second');
		formSubmit(firstProperty,secondProperty,thirdProperty,'Second','remove');
	})
	$('#third_property_remove_button').click(function(){
		var propertyID = $(this).data('id');
		var firstProperty = $('#property_select_dropdown1').val();
		var secondProperty = $('#property_select_dropdown2').val();
		var thirdProperty = $('#property_select_dropdown3').val();
		$('#action_input').val('remove');
		$('#remove_property_input').val('Third');
		formSubmit(firstProperty,secondProperty,thirdProperty,'Third','remove');
	})

	$('#property_select_dropdown1').change(function(){
		var firstProperty = $(this).val();
		var secondProperty = $('#property_select_dropdown2').val();
		var thirdProperty = $('#property_select_dropdown3').val();
		$('#action_input').val('add');
		formSubmit(firstProperty,secondProperty,thirdProperty,'First','add');
	})
	$('#property_select_dropdown2').change(function(){
		var firstProperty = $('#property_select_dropdown1').val();
		var secondProperty = $(this).val();
		var thirdProperty = $('#property_select_dropdown3').val();
		$('#action_input').val('add');
		formSubmit(firstProperty,secondProperty,thirdProperty,'Second','add');
	})
	$('#property_select_dropdown3').change(function(){
		var firstProperty = $('#property_select_dropdown1').val();
		var secondProperty = $('#property_select_dropdown2').val();
		var thirdProperty = $(this).val();
		$('#action_input').val('add');
		formSubmit(firstProperty,secondProperty,thirdProperty,'Third','add');
	})

	function formSubmit(firstProperty,secondProperty,thirdProperty,lastSelect,action){
		$.ajax({
            url  : "{{ route('validate.property.compare') }}",
            type : 'POST',
            data : { first_property_id : firstProperty, second_property_id : secondProperty, third_property_id : thirdProperty, last_select : lastSelect, action : action,  '_token' : "{{ csrf_token() }}" },
            dataType : 'JSON',
            success: function(response) {
                /*if(lastSelect == 'First'){
                    $('#first-property-small-desc').html(response.view);
                }
                if(lastSelect == 'Second'){
                    $('#second-property-small-desc').html(response.view);
                }*/

                if(response.compareStatus == false){
                    // $('.submit-btn').attr('disabled','disabled');
                    if(lastSelect == 'First'){
                        $("#property_select_dropdown2").prop('selectedIndex', 0);
                        $("#property_select_dropdown3").prop('selectedIndex', 0);
                        $('#compare_content1').html('');
                        $('#compare_content2').html('');
                        $('#compare_content3').html('');
                        $('#compare_content4').html('');
                        $('#compare_content5').html('');
                        $('#compare_content6').html('');
                        $('#property_address1').html('');
                        $('#property_address2').html('');
                        $('#property_address3').html('');
                    }
                    if(lastSelect == 'Second'){
                        $("#property_select_dropdown1").prop('selectedIndex', 0);
                        $("#property_select_dropdown3").prop('selectedIndex', 0);
                        $('#compare_content1').html('');
                        $('#compare_content2').html('');
                        $('#compare_content3').html('');
                        $('#compare_content4').html('');
                        $('#compare_content5').html('');
                        $('#compare_content6').html('');
                        $('#property_address1').html('');
                        $('#property_address2').html('');
                        $('#property_address3').html('');
                    }
					if(lastSelect == 'Third'){
						$("#property_select_dropdown1").prop('selectedIndex', 0);
                        $("#property_select_dropdown2").prop('selectedIndex', 0);
						$('#compare_content1').html('');
                        $('#compare_content2').html('');
                        $('#compare_content3').html('');
                        $('#compare_content4').html('');
                        $('#compare_content5').html('');
                        $('#compare_content6').html('');
                        $('#property_address1').html('');
                        $('#property_address2').html('');
                        $('#property_address3').html('');
					}
                }
                if(response.compareStatus == true){
                    $('#property_compare_form').submit();
                }
            },
            error: function(error) {
                
            }
        });  
	}
</script>