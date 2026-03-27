
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>My Profile</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css'>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:opsz,wght@6..12,200;6..12,300;6..12,400;6..12,500;6..12,600;6..12,700;6..12,800;6..12,900&display=swap" rel="stylesheet">
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css'>
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.css'>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css">

  <link rel='stylesheet' href="{{ url('home/css/style.css')}}">
</head>

<!-- Video Modal -->
<div class="modal fade" id="youtubeVideo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog set_y_vdo">
    <div class="modal-content">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><img src="{{ url('home/img/close.svg')}}" alt="" /></span></button>
      <div class="modal-body"> 
	  <iframe width="100%" height="500" src="https://www.youtube.com/embed/Bw-HJ-SUfUs?si=ONYzyvHZAE1RdK-o" frameborder="0" allowfullscreen></iframe>	
      </div>
    </div>
  </div>
</div>
<!-- End Video Modal -->

<body>

<style>
.row.copy_addresss {
    border:none;
    margin: 0 0 15px;
    padding: 12px 0 5px;
}


.copy_btnns a {
    background: #5b87e1;
    padding: 5px 10px;
    display: inline-block;
    color: #fff;
    border-radius: 4px;
    font-size: 13px;
}
.copy_btnns a:hover{color:#fff; text-decoration:underline;}
.copy_btnns {
    display: inline-block;
    width: 100%;
    margin-bottom: 10px;
    text-align: right;
}
</style>


<!--- Header Part ---->
<section class="shadow" id="myHeader">
    <div class="top_menuues">
        <div class="container">
            <div class="top_sec_menu cnt_parts">
                <ul>
                    <li><i class="fa fa-whatsapp"></i> <span>+91-9966680133</span></li>
                    <li><a href="{{ url('about-us') }}"><i class="fa fa-user"></i> <span>About Us</span></a></li>
                    <li><a href="{{ url('help') }}"><i class="fa fa-phone"></i> <span>Help ?</span></a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="main_header_area animated">
            <nav id="navigation1" class="navigation">
                <!-- Logo Area Start -->
                <div class="nav-header">
                    <a class="nav-brand" href="{{ url('') }}"><img class="logo" src="{{ url('home/img/logo 1.png')}}" alt="Logo" /></a>
                    <div class="nav-toggle"></div>

                    <div class="lg_sig_up_arass desktop_view">
                        <a href="{{ url('login') }}" class="bg_red">Login</a>
                        <a href="{{ url('registration') }}" class="bg_blues">Register Free</a>
                    </div>
                </div>
				<!-- End Logo Area Start -->
				
                <!-- Main Menus Wrapper -->
                <div class="nav-menus-wrapper">
                    <ul class="nav-menu align-to-right">
                        <li>
                            <a href="javascript:void(0);">1CR APP</a>
                            <ul class="nav-dropdown">
                                <li><a href="javascript:void(0);">How it Works</a></li>
                                <li><a href="{{ url('features') }}">Features</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="javascript:void(0);">Market Place</a>
                            <ul class="nav-dropdown">
                                <li><a href="{{ url('market-place-list') }}">PE Market Place</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="javascript:void(0);">Resourses & Tools</a>
                            <ul class="nav-dropdown">
                                <li><a href="{{ url('resources-tools') }}">Resourses & Tools</a></li>
                                <li><a href="{{ url('media') }}">Media</a></li>
                                <li><a href="{{ url('plp-introduction') }}">PLP Introduction</a></li>
                                <li><a href="{{ url('join-as-affiliate') }}">Join As Affiliates</a></li>
                                <li><a href="{{ url('thank-you-affiliates') }}">Thank you for Interest in Affiliate</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="javascript:void(0);">Company</a>
                            <ul class="nav-dropdown">
                                <li><a href="{{ url('company') }}">Company 1CRAPP</a></li>
                                <li><a href="{{ url('meet-team') }}">Meet Our Team</a></li>
                                <li><a href="{{ url('join-the-team') }}">Join us Carrer</a></li>
                                <li><a href="{{ url('reviews') }}">100+ Reviews</a></li>
                                <li><a href="{{ url('landing-page') }}">1CR APP Landing Page</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="javascript:void(0);">FAQ's</a>
                            <ul class="nav-dropdown">
                                <li><a href="{{ url('faq') }}">1CR APP FAQ's</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="javascript:void(0);">Price</a>
                            <ul class="nav-dropdown">
                                <li><a href="{{ url('price') }}">Price-1CR APP</a></li>
                            </ul>
                        </li>
                        <li class="lgo_space"><a href="{{ url('login') }}" id="activess">Login</a></li>
                        <li class="clr_cngs"><a href="{{ url('registration') }}" id="activess">Register Free</a></li>
                    </ul>
                </div>
                <!-- End Main Menus Wrapper -->
			</nav>
        </div>
    </div>
</section>
<!---- End Header Part ---->     



 <section class="tital_mg_cntss">
 <img src="{{ url('home/img/top_al_pgss.png')}}" class="bg_al_cntxt" alt="" />
  
  <div class="midils_contnts">
   <div class="medilss"><h4>My Profile</h4>
    <a href="{{ url('') }}">Home</a> &gt; <span>My Profile</span>
   </div>
  </div>
</section> 



	<section class="dash_board_pages mt">

		<div class="container">

			<div class="row">

				<div class="col-lg-3">

					<div class="profll_area">

						<div class="user_proff">

							<div class="mg_ares"><img src="{{ url('home/img/user_mg_f.png')}}" alt="" /></div>

							<h3>Ramjee Meena</h3>

							<p>Free Startrer</p>

						</div>



						<div class="user_liststst">

							<ul>

								<li>

									<a href="my-profile.html" class="actet"><img src="{{ url('home/img/my-profile.png')}}" alt="" /> My profile</a>

								</li>

								<li>

									<a href="billing.html"><img src="{{ url('home/img/billing.png')}}" alt="" /> Billing </a>

								</li>

								<li>

									<a href="javascript:void(0);"><img src="{{ url('home/img/help.png')}}" alt="" /> Help/support tickets</a>

								</li>

								<li>

									<a href="earn-with-us.html"><img src="{{ url('home/img/earn.png')}}" alt="" /> Earn With Us</a>

								</li>

							</ul>

						</div>

					</div>

				</div>



				<div class="col-lg-9">

					<div class="binng_araes my_proffs">
						<div class="al_frm_bx">
							<form action="#">
								<h5>User Information</h5>

								<div class="row">
								   <div class="col-lg-12">
											 <div class="copy_btnns">
											  <a href="javascript:void(0);"><i class="fa fa-files-o"></i> Copy Address</a>
											 </div>
											</div>
									<div class="col-lg-4">
										<div class="form-group">
											<label>User Name<span class="red">*</span></label>

											<input type="text" placeholder="incomeplusindia@gmail.com" name="memberid" class="inp_araea" value="{{ $user->memberid }}" required="" />
										</div>
									</div>

									<div class="col-lg-4">
										<div class="form-group">
											<label>User Email<span class="red">*</span></label>

											<input type="text" placeholder="incomeplusindia@gmail.com" class="inp_araea" name="email" value="{{ $user->email }}" required="" />
										</div>
									</div>

									<div class="col-lg-4">
										<div class="form-group">
											<label>User Package<span class="red">*</span></label>

											<input type="text" placeholder="Free_portal" class="inp_araea" value="" required="" />
										</div>
									</div>

									<div class="col-lg-4">
										<div class="form-group">
											<label>Fist Name<span class="red">*</span></label>

											<input type="text" placeholder="incomeplusindia" class="inp_araea" name="first_name" value="{{ $user->first_name }}" required="" />
										</div>
									</div>

									<div class="col-lg-4">
										<div class="form-group">
											<label>Second</label>

											<input type="text" placeholder="incomeplusindia" class="inp_araea" name="middle_name" value="{{ $user->middle_name }}" required="" />
										</div>
									</div>

									<div class="col-lg-4">
										<div class="form-group">
											<label>Last Name<span class="red">*</span></label>

											<input type="text" placeholder="Free_portal" class="inp_araea" name="last_name" value="{{ $user->last_name }}" required="" />
										</div>
									</div>

									<div class="col-lg-4">
										<div class="form-group">
											<label>Phone<span class="red">*</span></label>
                                            <input type="text" id="mobile_code" class="inp_araea" placeholder="Phone Number" name="mobile" value="{{ $user->mobile }}" />
											<span class="ad_linkss"><a href="javascript:void(0);">+Add Phone</a></span>
										</div>
									</div>

									<div class="col-lg-4">
										<div class="form-group">
											<label>Official Email</label>
											<input type="email" placeholder="Enter Email ID" class="inp_araea" name="official_email" value="" required="" />
										</div>
									</div>

									<div class="col-lg-4">
										<div class="form-group">
											<label>Personal Website</label>
											<input type="text" placeholder="www.1cr.com" class="inp_araea" value="" required="" />
										</div>
									</div>

									<!------ Copy Address ---->
									<div class="col-lg-12">
										<div class="row copy_addresss">
										    <div class="col-lg-12">
											 <div class="copy_btnns">
											  <a href="javascript:void(0);"><i class="fa fa-files-o"></i> Copy Address</a>
											 </div>
											</div>
											
											<div class="col-lg-4">
												<div class="form-group">
													<label>Fist Name<span class="red">*</span></label>

													<input type="text" placeholder="incomeplusindia" class="inp_araea" value="{{ $user->first_name }}" required="" />
												</div>
											</div>

											<div class="col-lg-4">
												<div class="form-group">
													<label>Second</label>

													<input type="text" placeholder="incomeplusindia" class="inp_araea" value="{{ $user->middle_name }}" required="" />
												</div>
											</div>

											<div class="col-lg-4">
												<div class="form-group">
													<label>Last Name<span class="red">*</span></label>

													<input type="text" placeholder="Free_portal" class="inp_araea" value="{{ $user->last_name }}" required="" />
												</div>
											</div>

											<div class="col-lg-4">
												<div class="form-group">
													<label>City<span class="red">*</span></label>
													<select class="slt_areaa">
														<option value="1"></option>
													</select>
												</div>
											</div>

											<div class="col-lg-4">
												<div class="form-group">
													<label>Sector/ Street No. / Address:</label>
													<input type="text" placeholder="Street/Address" class="inp_araea" value="" required="" />
												</div>
											</div>

											<div class="col-lg-4">
												<div class="form-group">
													<label>State/Region:</label>
													<select class="slt_areaa">
														<option value="1"></option>
													</select>
												</div>
											</div>

											<div class="col-lg-4">
												<div class="form-group">
													<label>Country</label>
													<select class="slt_areaa">
														<option value="1"></option>
													</select>
												</div>
											</div>

											<div class="col-lg-4">
												<div class="form-group">
													<label>ZIP Postal Code:</label>
													<input type="text" placeholder="ZIP Postal" class="inp_araea" value="" required="" />
												</div>
											</div>

											<div class="col-lg-4">
												<div class="form-group">
													<label>Phone <span class="red">*</span></label>
													<input type="text" placeholder="" class="inp_araea" value="{{ $user->mobile }}" required="" />
												</div>
											</div>
										</div>
									</div>
									<!------ End Copy Address ---->

									<div class="col-lg-12">
										<div class="bith_frmss">
											<div class="ons_frmss text_ctc">
												<div class="form-group">
													<label>&nbsp;</label>

													<span>Date Of Birth</span>
												</div>
											</div>

											<div class="ons_frmss">
												<div class="form-group">
													<label>Self<span class="red">*</span></label>

													<input type="text" placeholder="Self" class="inp_araea" value="13.12.1982" required="" />
												</div>
											</div>

											<div class="ons_frmss">
												<div class="form-group">
													<label>Spouse<span class="red">*</span></label>

													<input type="text" placeholder="Spouse" class="inp_araea" value="13.12.1982" required="" />
												</div>
											</div>

											<div class="ons_frmss">
												<div class="form-group">
													<label>Anniversary<span class="red">*</span></label>

													<input type="text" placeholder="Anniversary" class="inp_araea" value="13.12.1982" required="" />
												</div>
											</div>

											<div class="ons_frmss">
												<div class="form-group">
													<label>No of chiderns<span class="red">*</span></label>

													<select class="slt_areaa">
														<option value="1">2</option>
													</select>
												</div>
											</div>

											<div class="ons_frmss slt_bxx">
												<div class="form-group">
													<label>Working in<span class="red">*</span></label>

													<select class="slt_areaa">
														<option value="1">Indian oil corporetion</option>
													</select>
												</div>
											</div>
										</div>
									</div>

									<div class="col-lg-4">
										<div class="form-group">
											<label>Profile Pic<span class="red">*</span></label>

											<input type="file" placeholder="" class="inp_araea files" value="" required="" />
										</div>
									</div>

									<div class="col-lg-12">
										<div class="lnk_s_bntt">
											<button type="submit" value="submit" class="bntss blue_bg">Save Personal Details</button>
										</div>
									</div>
								</div>
							</form>
						</div>



						<div class="al_frm_bx">

							<form action="#">

								<h5>Company Details</h5>

								<p>Company details settings in this section are common across lead magnet and raports.</p>

								<div class="row">

									<div class="col-lg-12">

										<div class="bith_frmss">

											<div class="row">

												<div class="col-lg-4">

													<div class="ons_frmss full_widths">

														<div class="form-group">

															<label>Company Name<span class="red">*</span></label>

															<input type="text" placeholder="Ramjee Enter Rises" class="inp_araea" value="" required="" />

														</div>

													</div>

												</div>

												<div class="col-lg-4">

													<div class="ons_frmss half_widths">

														<div class="form-group">

															<label>Company Email<span class="red">*</span></label>

															<input type="text" placeholder="Add Email" class="inp_araea" value="" required="" />

															<select class="slt_areaa">

																<option value="1">Work</option>

															</select>

														</div>

													</div>

												</div>

												<div class="col-lg-4">

													<div class="ons_frmss half_widths">

														<div class="form-group">

															<label>Company Phone<span class="red">*</span></label>

															<input type="text" placeholder="Phone" class="inp_araea" value="" required="" />

															<select class="slt_areaa">

																<option value="1">Work</option>

															</select>

															<span class="ad_linkss"><a href="javascript:void(0);">+Add Phone</a></span>

														</div>

													</div>

												</div>

											</div>

										</div>

									</div>



									<div class="col-lg-4">

										<div class="form-group">

											<label>Company Address<span class="red">*</span></label>

											<input type="text" placeholder="G-01, green view" class="inp_araea" value="" required="" />

										</div>

									</div>



									<div class="col-lg-4">

										<div class="form-group">

											<label>Company Website<span class="red">*</span></label>

											<input type="text" placeholder="WWW.ramjeemeena.com" class="inp_araea" value="" required="" />

										</div>

									</div>



									<div class="col-lg-4">

										<div class="form-group">

											<label>Company Logo<span class="red">*</span></label>

											<input type="file" placeholder="" class="inp_araea files" value="" required="" />

										</div>

									</div>



									<div class="col-lg-12">

										<div class="proff_mgss">

											<img src="img/profl_mgss.png" alt="" />

											<img src="img/closss.png" class="crlss" alt="" />

										</div>

									</div>



									<div class="col-lg-12">

										<div class="lnk_s_bntt">

											<button type="submit" value="submit" class="bntss blue_bg">Save Personal Details</button>

										</div>

									</div>

								</div>

							</form>

						</div>



						<div class="al_frm_bx">

							<form action="#">

								<h5>Change Password</h5>

								<div class="row">

									<div class="col-lg-4">

										<div class="form-group">

											<label>Current Password<span class="red">*</span></label>

											<input type="password" placeholder="Enter the current password" class="inp_araea" value="" required="" />

										</div>

									</div>

									<div class="col-lg-4">

										<div class="form-group">

											<label>New<span class="red">*</span></label>

											<input type="password" placeholder="New password" class="inp_araea" value="" required="" />

										</div>

									</div>

									<div class="col-lg-4">

										<div class="form-group">

											<label>Confirm password<span class="red">*</span></label>

											<input type="password" placeholder="Confirm new password" class="inp_araea" value="" required="" />

										</div>

									</div>



									<div class="col-lg-12">

										<div class="lnk_s_bntt">

											<button type="submit" value="submit" class="bntss blue_bg">Save Personal Details</button>

										</div>

									</div>

								</div>

							</form>

						</div>



						<div class="al_frm_bx">

							<form action="#">

								<h5>Social Network</h5>

								<div class="row">

									<div class="col-lg-4">

										<div class="form-group">

											<label>Facebook</label>

											<input type="text" placeholder="Nickname" class="inp_araea" value="" />

										</div>

									</div>

									<div class="col-lg-4">

										<div class="form-group">

											<label>Youtube</label>

											<input type="text" placeholder="Nickname" class="inp_araea" value="" />

										</div>

									</div>

									<div class="col-lg-4">

										<div class="form-group">

											<label>LinkedIn</label>

											<input type="text" placeholder="Nickname" class="inp_araea" value="" />

										</div>

									</div>

									<div class="col-lg-4">

										<div class="form-group">

											<label>Twitter</label>

											<input type="text" placeholder="Nickname" class="inp_araea" value="" />

										</div>

									</div>

									<div class="col-lg-4">

										<div class="form-group">

											<label>Telegram</label>

											<input type="text" placeholder="Nickname" class="inp_araea" value="" />

										</div>

									</div>

									<div class="col-lg-4">

										<div class="form-group">

											<label>Skype</label>

											<input type="text" placeholder="Nickname" class="inp_araea" value="" />

										</div>

									</div>

									<div class="col-lg-4">

										<div class="form-group">

											<label>Instagram</label>

											<input type="text" placeholder="Nickname" class="inp_araea" value="" />

										</div>

									</div>

									<div class="col-lg-4">

										<div class="form-group">

											<label>Any Other</label>

											<input type="text" placeholder="Nickname" class="inp_araea" value="" />

										</div>

									</div>



									<div class="col-lg-12">

										<div class="lnk_s_bntt">

											<button type="submit" value="submit" class="bntss blue_bg">Save Social Profile</button>

										</div>

									</div>

								</div>

							</form>

						</div>

					</div>

				</div>

			</div>

		</div>

	</section>




@include('front.layouts.footer')