 @foreach($properties as $property)
   <div class="col-lg-4">
                    <div class="list_box_area">
                        <div class="img_area">
                            <div class="ribbon-wrap"><div class="ribbon">Available</div></div>

                            <div class="owl-carousel owl-theme slider-prop" >
                                <!----- Slider Item ---->
                                <div class="item" id="vdo_playss">
								    <i class="fa fa-play-circle cursore"></i>
                                    <img src="{{ url('home/img/propertys.jpg')}}" alt="" />
									<span class="play_lsts">
									 <img src="{{ url('home/img/live_tv.png')}}" alt="" />
									</span>
                                </div>
                                <!----- End Slider Item ---->

                                <!----- Slider Item ---->
                                <div class="item" id="vdo_playss">
								    <i class="fa fa-play-circle cursore"></i>
                                    <img src="{{ url('home/img/propertys.jpg')}}" alt="" />
									<span class="play_lsts">
									 <img src="{{ url('home/img/live_tv.png')}}" alt="" />
									</span>
                                </div>
                                <!----- End Slider Item ---->

                                <!----- Slider Item ---->

                                <div class="item" id="vdo_playss">
								    <i class="fa fa-play-circle cursore"></i>
                                    <img src="{{ url('home/img/propertys.jpg')}}" alt="" />
									<span class="play_lsts">
									 <img src="{{ url('home/img/live_tv.png')}}" alt="" />
									</span>
                                </div>

                                <!----- End Slider Item ---->
                            </div>
                        </div>

                        <div class="ic_area">
                            <div class="croosss" data-toggle="modal" data-target="#purchase_criteria">
                                <i class="fa fa-times"></i>
                            </div>

                            <ul>
                                <li>
                                    <a href="javascript:void(0);"><i class="fa fa-share"></i></a>
                                </li>

                                <li>
                                    <span class="flt_alsss">Flat</span>
                                </li>

                                <li>
                                    <span class="flt_alsss">3 Bhk</span>
                                </li>
                            </ul>
                        </div>

                        <div class="cnt_boxxs">
                            <h4>Example: Rental Property</h4>

                            <p><i class="fa fa-map-marker"></i> City, Locality</p>

                            <p><i class="fa fa-street-view"></i> Area (Like South Delhi)</p>

                            <p><i class="fa fa-building"></i> Project or Buider Name</p>

                            <p><i class="fa fa-inr"></i> 5-Lacs - 20-Lacs</p>

							<div class="proprty_lgo_area">
							 <div class="bg_agrea"><div class="mg_setss"><img src="{{ url('home/img/post_by_owner_icn.png')}}" alt="" /></div></div>
							 <div class="sm_agrea"><div class="mg_setss"><img src="{{ url('home/img/and_posted_by_agent_icn.png')}}" alt="" /></div></div>
							</div>
							

                            <div class="rd_likss boths_links">
							  <a href="javascript:void(0);" class="rdm_link" data-toggle="modal" data-target="#veioo_criteria">Read More</a>
							  <a href="javascript:void(0);" class="clr_chnagess"><i class="fa fa-share"></i> Share</a>
							</div>
                        </div>
                    </div>
                </div>
@endforeach
