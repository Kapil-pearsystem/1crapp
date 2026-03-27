@include('front.layouts.header')
<div class="container mt-5">
    <div class="row mt-4">
        @include('front.layouts.detail-sidebar')
        <!--Start full details -->
        <div class="col-12 col-sm-9">
            <div class="row mb-4">
                <div class="col-lg-12">
                    <div class="lsting_proprty purch_list_conts al_prt_biths" id="alss_pgesss">
                        <div class="prt_lft_araea">
                            <h3>Rental Comps &amp; Rent Estimates</h3>
                            <p class="brdsss"><a href="javascript:void(0);">Rentals</a> <span>/</span> <a href="javascript:void(0);">Example: Rental Property</a> <span>/</span> Rental Comps &amp; Rent</p>
                        </div>
                        <div class="prts_rt">
                            <div class="prp_bntsss">
                                <ul>
                                    <li>
                                        <a href="{{ route('properties.new-property.description', ['id'=>base64_encode($MainProperty->prop_id)]) }}"><i class="fa fa-pencil"></i> Edit Property </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('property.summary', ['category' => str_replace('_', '-', $MainProperty->prop_parent_type),'id' => base64_encode($MainProperty->prop_id)]) }}"><i class="fa fa-pie-chart"></i> Property Analysis </a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <p class="viww">View recent comparable rental listings to help you estimate the rent of this property. <a href="javascript:void(0);">View Tutorial</a></p>
                    </div>
                </div>
            </div>

            <div class="row mt-5">
                {{-- <div class="col-lg-6">
                    <form action="#" method="post">
                        <div class="pur_rdo_listtss als_show_ar rec_sale_areaea">
                            <div class="slt_als_ck_bx">
                                <div class="lft_area_ck bothss">
                                    <span class="heedingd">RentCast Estimate</span>
                                    <div class="con-tooltip top">
                                        <p class="icoo"><i class="fa fa-question"></i></p>
                                        <div class="tooltip">
                                            <h5>RentCast Estimate</h5>
                                            <p>The amount you're paying to purchase a property.</p>
                                        </div>
                                    </div>
                                </div>

                                <h5>$ 245,000 <span>($ 233/sq.ft.)</span></h5>
                                <p>$ 190,000 - <span>$ 300,000</span></p>
                                <p>$ 181/sq.ft. - <span>$ 286/sq.ft.</span></p>
                            </div>

                            <div class="slt_als_ck_bx">
                                <div class="lft_area_ck">
                                    <h4>Average Listed Rent</h4>
                                    <h5>$ 201,600 <span>($ 172/sq.ft.)</span></h5>
                                    <p>$ 90,000 - <span>$ 290,000</span></p>
                                    <p>$ 85/sq.ft. - <span>$ 233/sq.ft.</span></p>
                                </div>
                            </div>

                            <div class="pur_rdo_listtss als_show_ar rec_sale_areaea partss">
                                <div class="lft_area_ck bothss fullss">
                                    <span class="heedingd">Estimated Rent Based on Average Rent/Sq.Ft.</span>
                                    <div class="con-tooltip top">
                                        <p class="icoo"><i class="fa fa-question"></i></p>
                                        <div class="tooltip">
                                            <h5>Estimated ARV Based on Average Price/Sq.Ft.</h5>
                                            <p>The amount you're paying to purchase a property.</p>
                                        </div>
                                    </div>
                                </div>

                                <h5>$ 181,000</h5>
                                <p>Current Gross Rent</p>

                                <div class="inp_vlueee">
                                    <input type="text" value="" placeholder="$ 125,000">
									<select class="n_brdd">
									<option value="1">Per Day</option>
									<option value="2">Per Week</option>
									<option value="3">Per Month</option>
									<option value="4">Per Quarter</option>
									<option value="5">Per Year</option>
								   </select>
                                </div>
                            </div>
                        </div>
                    </form>
                </div> --}}
                {!! $averageSalePriceSection !!}
                <div class="col-lg-6">
                    <div class="mapss recntts">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d224357.50124370036!2d77.23701163846438!3d28.522102347779786!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390ce5a43173357b%3A0x37ffce30c87cc03f!2sNoida%2C%20Uttar%20Pradesh!5e0!3m2!1sen!2sin!4v1699103268200!5m2!1sen!2sin" width="100%" height="100%" style="border: 0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
            </div>

			<div class="row mt-5">
				<div class="col-lg-12">
					<div class="pur_rdo_listtss">
					    <div class="bothss_lists_managss">
						    <h4>COMPARABLE SALES</h4>
                            <div class="bh_sltt_right">
                                <ul>
                                    <li><a href="javascript:void(0);"><i class="fa fa-cloud-download"></i> Export</a></li>
                                    <li>Sort by:</li>
                                    <li>
                                        <select class="n_brdd" id="sort_by_select">
                                            {{-- <option value="1">Similarity</option> --}}
                                            <option value="Distance">Distance</option>
											<option value="Price">Price</option>
											<option value="Price Sq Ft">Price/Sq.Ft.</option>
											<option value="Listed">Date Listed</option>
                                        </select>
                                    </li>
                                </ul>
                            </div>
					   </div>
                       <div id="prop_list">{!! $propertyListView !!}</div>
						</div>
					</div>
				</div>
			</div>
        </div>
    </div>
</div>
@include('front.layouts.footer')
<script>
	// $('#sort_by_select').change(function(){
	$("#sort_by_select").on('change', function() {
		var sortBy = $(this).val();
		$.ajax({
        url: "{{ route('recent.comps.rent.sortby') }}",
        type: "POST",
        dataType: "JSON",
        data: {
            _token: '{{ csrf_token() }}',
			propID : "{{ $MainProperty->prop_id }}",
            sortBy: sortBy,
        },
        success: function(response) {
			$('#prop_list').html(response.view);
        },
        error: function(error) {
            console.log(error);
        }
    });
	})
</script>