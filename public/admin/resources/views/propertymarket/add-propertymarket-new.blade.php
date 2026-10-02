
@extends('layouts.app')

@section('title', 'Edit Customer')

@section('content')




<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Add Property Market</h1>
        <a href="{{ route('propertymarket.propertymarketlist') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-arrow-left fa-sm text-white-50"></i> Back</a>
    </div>
    {{-- Alert Messages --}}
    @include('common.alert')
   
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        
        <form method="POST" action="">
            @csrf
            <input type="hidden" name="id" value="{{ isset($property)?$property->id:'' }}"/>
            
			<div class="container">
			 <div class="row">
				<div class="col-lg-6">
					<!-- Address -->
					<div class="Address all_pgs_datats">
						<div class="hd_res_listsss">
							<h2 style="float: left">
								Address <span class="rit_mg"><img src="img/files.png" alt="" /></span>
							</h2>
							<button type="button" class="btn btn-primary" onclick="copyPropertyAddress()" style="float: right">
								<i class="fa fa-copy"></i> <span id="cp-text">Copy Address</span>
							</button>
						</div>
						<div class="all_frm_list half_areea_boxx" id="manags_boxss">
							<div class="row">
								<div class="col-lg-6 col-12">
									<div class="form-group managsss1">
										<label>Unit Number(Optional):</label>
										<input
											type="text"
											name="unit_number"
											id="cp-unit_number"
											placeholder="Unit Number"
											required=""
											value=""
										/>
									</div>
								</div>

								<div class="col-lg-6 col-12">
									<div class="form-group managsss1">
										<label>Tower Number(Optional) :</label>
										<input
											type="text"
											name="tower_number"
											id="cp-tower_number"
											placeholder="Tower Number"
											value=""
										/>
									</div>
								</div>

								<div class="col-lg-6 col-12">
									<div class="form-group managsss1">
										<label>Project Name(Optional) :</label>
										<input
											type="text"
											name="project_name"
											id="cp-project_name"
											placeholder="Project Name"
											value=""
										/>
									</div>
								</div>

								<div class="col-lg-6 col-12">
									<div class="form-group managsss1">
										<label>Building Name(Optional):</label>
										<input
											type="text"
											name="building_name"
											id="cp-building_name"
											placeholder="Building Name"
											value=""
										/>
									</div>
								</div>

								<div class="col-lg-6 col-12">
									<div class="form-group managsss1">
										<label>Sector / Street No. / Address:</label>
										<input type="text" name="street" id="cp-address" placeholder="Street Address" value="" />
									</div>
								</div>

								<div class="col-lg-6 col-12">
									<div class="form-group managsss1">
										<label>Country:</label>
										<select
											name="pcountry"
											id="cp-country"
											onchange="getState(this.value)"
											required=""
											class="slt_areaa_ful"
										>
											<option value="">N/A</option>
											<option value="1">Afghanistan</option>
											<option value="2">Albania</option>
											<option value="3">Algeria</option>
											<option value="4">American Samoa</option>
											<option value="5">Andorra</option>
											<option value="6">Angola</option>
											<option value="7">Anguilla</option>
											<option value="8">Antarctica</option>
											<option value="9">Antigua And Barbuda</option>
											<option value="10">Argentina</option>
											<option value="11">Armenia</option>
											<option value="12">Aruba</option>
											<option value="13">Australia</option>
											<option value="14">Austria</option>
											<option value="15">Azerbaijan</option>
											<option value="16">Bahamas The</option>
											<option value="17">Bahrain</option>
											<option value="18">Bangladesh</option>
											<option value="19">Barbados</option>
											<option value="20">Belarus</option>
											<option value="21">Belgium</option>
											<option value="22">Belize</option>
											<option value="23">Benin</option>
											<option value="24">Bermuda</option>
											<option value="25">Bhutan</option>
											<option value="26">Bolivia</option>
											<option value="27">Bosnia and Herzegovina</option>
											<option value="28">Botswana</option>
											<option value="29">Bouvet Island</option>
											<option value="30">Brazil</option>
											<option value="31">British Indian Ocean Territory</option>
											<option value="32">Brunei</option>
											<option value="33">Bulgaria</option>
											<option value="34">Burkina Faso</option>
											<option value="35">Burundi</option>
											<option value="36">Cambodia</option>
											<option value="37">Cameroon</option>
											<option value="38">Canada</option>
											<option value="39">Cape Verde</option>
											<option value="40">Cayman Islands</option>
											<option value="41">Central African Republic</option>
											<option value="42">Chad</option>
											<option value="43">Chile</option>
											<option value="44">China</option>
											<option value="45">Christmas Island</option>
											<option value="46">Cocos (Keeling) Islands</option>
											<option value="47">Colombia</option>
											<option value="48">Comoros</option>
											<option value="49">Republic Of The Congo</option>
											<option value="50">Democratic Republic Of The Congo</option>
											<option value="51">Cook Islands</option>
											<option value="52">Costa Rica</option>
											<option value="53">Cote D'Ivoire (Ivory Coast)</option>
											<option value="54">Croatia (Hrvatska)</option>
											<option value="55">Cuba</option>
											<option value="56">Cyprus</option>
											<option value="57">Czech Republic</option>
											<option value="58">Denmark</option>
											<option value="59">Djibouti</option>
											<option value="60">Dominica</option>
											<option value="61">Dominican Republic</option>
											<option value="62">East Timor</option>
											<option value="63">Ecuador</option>
											<option value="64">Egypt</option>
											<option value="65">El Salvador</option>
											<option value="66">Equatorial Guinea</option>
											<option value="67">Eritrea</option>
											<option value="68">Estonia</option>
											<option value="69">Ethiopia</option>
											<option value="70">External Territories of Australia</option>
											<option value="71">Falkland Islands</option>
											<option value="72">Faroe Islands</option>
											<option value="73">Fiji Islands</option>
											<option value="74">Finland</option>
											<option value="75">France</option>
											<option value="76">French Guiana</option>
											<option value="77">French Polynesia</option>
											<option value="78">French Southern Territories</option>
											<option value="79">Gabon</option>
											<option value="80">Gambia The</option>
											<option value="81">Georgia</option>
											<option value="82">Germany</option>
											<option value="83">Ghana</option>
											<option value="84">Gibraltar</option>
											<option value="85">Greece</option>
											<option value="86">Greenland</option>
											<option value="87">Grenada</option>
											<option value="88">Guadeloupe</option>
											<option value="89">Guam</option>
											<option value="90">Guatemala</option>
											<option value="91">Guernsey and Alderney</option>
											<option value="92">Guinea</option>
											<option value="93">Guinea-Bissau</option>
											<option value="94">Guyana</option>
											<option value="95">Haiti</option>
											<option value="96">Heard and McDonald Islands</option>
											<option value="97">Honduras</option>
											<option value="98">Hong Kong S.A.R.</option>
											<option value="99">Hungary</option>
											<option value="100">Iceland</option>
											<option value="101">India</option>
											<option value="102">Indonesia</option>
											<option value="103">Iran</option>
											<option value="104">Iraq</option>
											<option value="105">Ireland</option>
											<option value="106">Israel</option>
											<option value="107">Italy</option>
											<option value="108">Jamaica</option>
											<option value="109">Japan</option>
											<option value="110">Jersey</option>
											<option value="111">Jordan</option>
											<option value="112">Kazakhstan</option>
											<option value="113">Kenya</option>
											<option value="114">Kiribati</option>
											<option value="115">Korea North</option>
											<option value="116">Korea South</option>
											<option value="117">Kuwait</option>
											<option value="118">Kyrgyzstan</option>
											<option value="119">Laos</option>
											<option value="120">Latvia</option>
											<option value="121">Lebanon</option>
											<option value="122">Lesotho</option>
											<option value="123">Liberia</option>
											<option value="124">Libya</option>
											<option value="125">Liechtenstein</option>
											<option value="126">Lithuania</option>
											<option value="127">Luxembourg</option>
											<option value="128">Macau S.A.R.</option>
											<option value="129">Macedonia</option>
											<option value="130">Madagascar</option>
											<option value="131">Malawi</option>
											<option value="132">Malaysia</option>
											<option value="133">Maldives</option>
											<option value="134">Mali</option>
											<option value="135">Malta</option>
											<option value="136">Man (Isle of)</option>
											<option value="137">Marshall Islands</option>
											<option value="138">Martinique</option>
											<option value="139">Mauritania</option>
											<option value="140">Mauritius</option>
											<option value="141">Mayotte</option>
											<option value="142">Mexico</option>
											<option value="143">Micronesia</option>
											<option value="144">Moldova</option>
											<option value="145">Monaco</option>
											<option value="146">Mongolia</option>
											<option value="147">Montserrat</option>
											<option value="148">Morocco</option>
											<option value="149">Mozambique</option>
											<option value="150">Myanmar</option>
											<option value="151">Namibia</option>
											<option value="152">Nauru</option>
											<option value="153">Nepal</option>
											<option value="154">Netherlands Antilles</option>
											<option value="155">Netherlands The</option>
											<option value="156">New Caledonia</option>
											<option value="157">New Zealand</option>
											<option value="158">Nicaragua</option>
											<option value="159">Niger</option>
											<option value="160">Nigeria</option>
											<option value="161">Niue</option>
											<option value="162">Norfolk Island</option>
											<option value="163">Northern Mariana Islands</option>
											<option value="164">Norway</option>
											<option value="165">Oman</option>
											<option value="166">Pakistan</option>
											<option value="167">Palau</option>
											<option value="168">Palestinian Territory Occupied</option>
											<option value="169">Panama</option>
											<option value="170">Papua new Guinea</option>
											<option value="171">Paraguay</option>
											<option value="172">Peru</option>
											<option value="173">Philippines</option>
											<option value="174">Pitcairn Island</option>
											<option value="175">Poland</option>
											<option value="176">Portugal</option>
											<option value="177">Puerto Rico</option>
											<option value="178">Qatar</option>
											<option value="179">Reunion</option>
											<option value="180">Romania</option>
											<option value="181">Russia</option>
											<option value="182">Rwanda</option>
											<option value="183">Saint Helena</option>
											<option value="184">Saint Kitts And Nevis</option>
											<option value="185">Saint Lucia</option>
											<option value="186">Saint Pierre and Miquelon</option>
											<option value="187">Saint Vincent And The Grenadines</option>
											<option value="188">Samoa</option>
											<option value="189">San Marino</option>
											<option value="190">Sao Tome and Principe</option>
											<option value="191">Saudi Arabia</option>
											<option value="192">Senegal</option>
											<option value="193">Serbia</option>
											<option value="194">Seychelles</option>
											<option value="195">Sierra Leone</option>
											<option value="196">Singapore</option>
											<option value="197">Slovakia</option>
											<option value="198">Slovenia</option>
											<option value="199">Smaller Territories of the UK</option>
											<option value="200">Solomon Islands</option>
											<option value="201">Somalia</option>
											<option value="202">South Africa</option>
											<option value="203">South Georgia</option>
											<option value="204">South Sudan</option>
											<option value="205">Spain</option>
											<option value="206">Sri Lanka</option>
											<option value="207">Sudan</option>
											<option value="208">Suriname</option>
											<option value="209">Svalbard And Jan Mayen Islands</option>
											<option value="210">Swaziland</option>
											<option value="211">Sweden</option>
											<option value="212">Switzerland</option>
											<option value="213">Syria</option>
											<option value="214">Taiwan</option>
											<option value="215">Tajikistan</option>
											<option value="216">Tanzania</option>
											<option value="217">Thailand</option>
											<option value="218">Togo</option>
											<option value="219">Tokelau</option>
											<option value="220">Tonga</option>
											<option value="221">Trinidad And Tobago</option>
											<option value="222">Tunisia</option>
											<option value="223">Turkey</option>
											<option value="224">Turkmenistan</option>
											<option value="225">Turks And Caicos Islands</option>
											<option value="226">Tuvalu</option>
											<option value="227">Uganda</option>
											<option value="228">Ukraine</option>
											<option value="229">United Arab Emirates</option>
											<option value="230">United Kingdom</option>
											<option value="231">United States</option>
											<option value="232">United States Minor Outlying Islands</option>
											<option value="233">Uruguay</option>
											<option value="234">Uzbekistan</option>
											<option value="235">Vanuatu</option>
											<option value="236">Vatican City State (Holy See)</option>
											<option value="237">Venezuela</option>
											<option value="238">Vietnam</option>
											<option value="239">Virgin Islands (British)</option>
											<option value="240">Virgin Islands (US)</option>
											<option value="241">Wallis And Futuna Islands</option>
											<option value="242">Western Sahara</option>
											<option value="243">Yemen</option>
											<option value="244">Yugoslavia</option>
											<option value="245">Zambia</option>
											<option value="246">Zimbabwe</option>
										</select>
									</div>
								</div>

								<div class="col-lg-6 col-12">
									<div class="form-group managsss1">
										<label>State/Region:</label>
										<select
											name="state"
											id="cp-state"
											onchange="getCity(this.value)"
											required=""
											class="slt_areaa_ful"
										></select>
									</div>
								</div>

								<div class="col-lg-6 col-12">
									<div class="form-group managsss1">
										<label>City:</label>
										<select name="city" id="cp-city" required="" class="slt_areaa_ful"></select>
									</div>
								</div>

								<div class="col-lg-6 col-12">
									<div class="form-group managsss1">
										<label>ZIP/Postal Code:</label>
										<input
											type="text"
											name="zip"
											id="cp-zip"
											placeholder="ZIP/Postal Code"
											value=""
											onkeypress="return (event.charCode !=8 &amp;&amp; event.charCode ==0 || ( event.charCode == 46 || (event.charCode &gt;= 48 &amp;&amp; event.charCode &lt;= 57)))"
										/>
									</div>
								</div>

								<div class="col-lg-6 col-12">
									<div class="form-group managsss1">
										<label>Property Google Location:</label>
										<input
											type="text"
											name="plocationlink"
											id="cp-plocationlink"
											placeholder="Paste Enbeded Share link(Ex:- https://maps.app.goo.gl/JSbQSpLmKjax8Ghx5)"
											value=""
											onkeypress="return (event.charCode !=8 &amp;&amp; event.charCode ==0 || ( event.charCode == 46 || (event.charCode &gt;= 48 &amp;&amp; event.charCode &lt;= 57)))"
										/>
									</div>
								</div>
							</div>
							<div style="opacity: 0; hieght: 0px" id="hiddenaddress"></div>
						</div>
					</div>
					<!-- End Address -->
				</div>
				<div class="col-lg-6">
					<!-- Description -->
					<div class="Description all_pgs_datats">
						<div class="hd_res_listsss">
							<h2 style="float: left">
								Description <span class="rit_mg"><img src="img/files.png" alt="" /></span>
							</h2>
							<button type="button" class="btn btn-primary" onclick="copyPropertyDescription()" style="float: right">
								<i class="fa fa-copy"></i> <span id="desc-copy-msg">Copy Description</span>
							</button>
						</div>
						<div class="all_frm_list half_areea_boxx">
							<div class="row">
								<div class="col-lg-6 col-12">
									<div class="form-group managsss1">
										<label>Category:</label>
										<select
											name="pcategory"
											id="pcategory"
											onchange="setOption(this.value); disableOptionsIndusAgri(this.value);"
											class="slt_areaa_ful"
										>
											<option value="">N/A</option>
											<option value="Residentail">Residentail</option>
											<option value="Commercial">Commercial</option>
											<option value="Agriculture">Agriculture</option>
											<option value="Industrial">Industrial</option>
										</select>
									</div>
								</div>

								<div class="col-lg-6 col-12">
									<div class="row bothmngess">
										<div class="col-lg-6 col-12 left">
											<div class="form-group managsss1">
												<label>Parking:</label>
												<select
													name="parking"
													id="parking"
													class="slt_areaa_ful"
													required=""
													onchange="setNoOfParking(this.value)"
												>
													<option value="" selected="">Select</option>
													<option value="Yes">Yes</option>
													<option value="No">No</option>
												</select>
											</div>
										</div>

										<div class="col-lg-6 col-12 right">
											<div class="form-group managsss1">
												<label>No. of Parking</label>
												<select
													name="no_of_parking"
													id="no_of_parking"
													class="slt_areaa_ful"
													required=""
													disabled=""
												>
													<option value="" selected="">Select</option>
													<option value="1">1</option>
													<option value="2">2</option>
													<option value="3">3</option>
													<option value="4">4</option>
													<option value="5">5</option>
												</select>
											</div>
										</div>
									</div>
								</div>

								<div class="col-lg-6 col-12">
									<div class="form-group managsss1">
										<label>Type:</label>
										<select name="pcategorytype" id="pcategorytype" class="slt_areaa_ful pcategorytype">
											<option value="Industrial">Industrial</option>
										</select>
									</div>
								</div>

								<div class="col-lg-6 col-12">
									<div class="form-group managsss1 lot_sz">
										<label>Size:</label>
										<input
											type="text"
											name="lot"
											placeholder="Size"
											value=""
											onkeypress="return (event.charCode !=8 &amp;&amp; event.charCode ==0 || ( event.charCode == 46 || (event.charCode &gt;= 48 &amp;&amp; event.charCode &lt;= 57)))"
										/>

										<select name="psizetype" id="psizetype" class="pusntttss" required="">
											<option selected="" value="">Select</option>
											<option value="Square Feet">Square Feet</option>
											<option value="Square Yard">Square Yard</option>
											<option value="Meter Feet">Square Meter</option>
											<option value="Bigha">Bigha</option>
											<option value="Acres">Acres</option>
											<option value="Hectre">Hectre</option>
										</select>
									</div>
								</div>

								<div class="col-lg-6 col-12">
									<div class="form-group managsss1">
										<label>Units Type:</label>
										<select name="ptype" id="ptype" class="slt_areaa_ful">
											<option value="">N/A</option>
											<option value="1">1 BHK</option>
											<option value="2">2 BHK</option>
											<option value="3">3 BHK</option>
											<option value="4">4 BHK</option>
											<option value="5">5 BHK</option>
										</select>
									</div>
								</div>

								<div class="col-lg-6 col-12">
									<div class="form-group managsss1">
										<label>Status:</label>
										<select name="pstatus" id="pstatus" class="slt_areaa_ful" required="">
											<option value="" selected="" disabled="">Select</option>
											<option value="Ready To Move">Ready To Move</option>
											<option value="Underconstruction">Underconstruction</option>
										</select>
									</div>
								</div>

								<div class="col-lg-6 col-12">
									<div class="form-group managsss1">
										<label>No. of bedrooms</label>
										<select name="bedrooms" id="bedrooms" class="slt_areaa_ful">
											<option value="1">1</option>
											<option value="2">2</option>
											<option value="3">3</option>
											<option value="4">4</option>
											<option value="5">5</option>
											<option value="6">6</option>
											<option value="7">7</option>
											<option value="8">8</option>
											<option value="9">9</option>
											<option value="10">10</option>
										</select>
									</div>
								</div>

								<div class="col-lg-6 col-12">
									<div class="form-group managsss1">
										<label>No. of barthrooms</label>
										<select name="bathrooms" id="bathrooms" class="slt_areaa_ful">
											<option value="1">1</option>
											<option value="2">2</option>
											<option value="3">3</option>
											<option value="4">4</option>
											<option value="5">5</option>
											<option value="6">6</option>
											<option value="7">7</option>
											<option value="8">8</option>
											<option value="9">9</option>
											<option value="10">10</option>
										</select>
									</div>
								</div>
								<div class="col-lg-6 col-12">
									<div class="form-group managsss1">
										<label>Year Built:</label>
										<input
											type="text"
											name="year"
											placeholder="Year Built"
											value=""
											onkeypress="return (event.charCode !=8 &amp;&amp; event.charCode ==0 || ( event.charCode == 46 || (event.charCode &gt;= 48 &amp;&amp; event.charCode &lt;= 57)))"
										/>
									</div>
								</div>
								<div class="col-lg-6 col-12">
									<div class="form-group managsss1">
										<label>Transaction Type(Optional):</label>
										<select name="ptransactiontype" id="ptransactiontype" class="slt_areaa_ful">
											<option value="">None</option>
											<option value="Direct">Direct</option>
											<option value="Through Agent">Through Agent</option>
											<option value="From Owner">From Owner</option>
										</select>
									</div>
								</div>
							</div>
						</div>
						<div id="hiddenDescription" style="display: none"></div>
					</div>
					<!-- End Description -->
				</div>
				
				
				
				
				<div class="col-lg-12">
					<!-- Description -->
					<div class="Description all_pgs_datats">
						<div class="all_frm_list full_areea_boxx">
							<div class="row">
								<div class="col-lg-3 col-12">
									<div class="form-group managsss1 lot_sz">
										<label>Owner Name <span class="red">*</span></label>
										<input type="text" name="" placeholder="" value="" />
									</div>
								</div>
								
								<div class="col-lg-3 col-12">
									<div class="form-group managsss1 lot_sz">
										<label>Owner Belongs <span class="red">*</span></label>
										<input type="text" name="" placeholder="" value="" />
									</div>
								</div>
								
								
								<div class="col-lg-3 col-12">
									<div class="form-group managsss1 lot_sz">
										<label>Sailing Price To <span class="red">*</span></label>
										<input type="date" name="" placeholder="" value="" />
									</div>
								</div>
								
								<div class="col-lg-3 col-12">
									<div class="form-group managsss1 lot_sz">
										<label>Sailing Price From <span class="red">*</span></label>
										<input type="date" name="" placeholder="" value="" />
									</div>
								</div>
								
								<div class="col-lg-12 col-12">
									<div class="form-group managsss1 lot_sz">
										<label>Feedback <span class="red">*</span></label>
										<input type="text" name="" placeholder="" value="" />
									</div>
								</div>

								
							</div>
						</div>
					</div>
					<!-- End Description -->
				</div>
				
			 </div>
			 

			 
			 <!-- Property Photos & Video -->
             <div class="property_photos" id="pro_v_alss">
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="hd_res_listsss mt-3">
                                        <h2>Property Photos <span class="rit_mg"><img src="https://kapil.1crapp.com/img/glrr.png" alt="" /></span></h2>
                                    </div>
                                    <div class="all_frm_list">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="file-upload-adsss">
                                                    <label>
                                                        <div class="icon_f" role="button" aria-disabled="false">
														    <img src="https://kapil.1crapp.com/img/image-upload-icon.png" style="width: 100px;" alt="">
                                                            <p>Drag And Drop File Here <span>Or Choose From Your Computer</span></p>
                                                        </div>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="col-lg-4">
                                    <div class="hd_res_listsss mt-3">
                                        <h2>Property Video <span class="rit_mg"><img src="https://kapil.1crapp.com/img/glrr.png" alt="" /></span></h2>
                                    </div>
                                    <div class="all_frm_list">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="file-upload-adsss">
                                                    <label for="v_attachment">
                                                        <div class="icon_f" role="button">
                                                            <img src="https://kapil.1crapp.com/img/video_pla.png" style="width: 100px;" alt="">
                                                            <p>Drag And Drop File Here <span>Or Choose From Your Computer</span></p>
                                                        </div>
                                                    </label>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="hd_res_listsss mt-3">
                                        <h2>Additional Details, Information & Resourses <span class="rit_mg"><img src="https://kapil.1crapp.com/img/glrr.png" alt="" /></span></h2>
                                    </div>
                                    <div class="all_frm_list">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="file-upload-adsss">
                                                    <label for="file_input">
                                                        <div class="icon_f" role="button">
                                                            <img src="https://kapil.1crapp.com/img/unlink_icon.png" style="width: 100px;" alt="">
                                                            <p>Drag And Drop File Here <span>Or Choose From Your Computer</span></p>
                                                        </div>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
             </div>                        
             <!-- End Property Photos & Video -->
			 
			 <div class="row">
			  <div class="col-lg-12">
					<!-- Description -->
					<div class="Description all_pgs_datats">
						<div class="all_frm_list full_areea_boxx">
							<div class="row">
								<div class="col-lg-4 col-12">									
									<div class="form-group managsss1">
										<label>Posted By</label>
										<select name="" id="" class="slt_areaa_ful">
											<option value="">Select</option>
										</select>
									</div>
								</div>
								
								<div class="col-lg-4 col-12">									
									<div class="form-group managsss1">
										<label>Status</label>
										<select name="" id="" class="slt_areaa_ful">
											<option value="">Select Status</option>
										</select>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- End Description -->
				</div>
				
			 </div>
			 
			 
			</div> 

			
			
			
            <div class="card-footer">
                <button type="submit" class="btn btn-success btn-user float-right mb-3">Save</button>
                <a class="btn btn-primary float-right mr-3 mb-3" href="{{ route('propertymarket.propertymarketlist') }}">Cancel</a>
            </div>
        </form>
    </div>

</div>
@endsection
@section('scripts')


<style>

.container{
    max-width:1240px;
	width:100%;
}

.all_pgs_datats {
    margin-top: 20px;
}

.all_frm_list {
display: inline-block;
    width: 100%;
    background: #bedaff;
    padding: 20px 20px;
    border-radius: 15px;
    margin-bottom: 30px;
    position: relative;
}
.all_pgs_datats .hd_res_listsss {
    margin-top: 0px;
}

.all_pgs_datats .hd_res_listsss h2 {
    font-size: 22px;
    margin-top: 0;
    font-weight: 600;
    color: #000;
    margin-bottom: 15px;
}

.all_pgs_datats .hd_res_listsss button.btn.btn-primary {
    font-size: 12px;
}

.all_frm_list .form-group label {
    display: block;
    margin: 0 0 2px;
    font-size: 14px;
	font-weight: 600;
    color: #000;
}
.all_frm_list .form-group input {
    width: 100%;
    padding: 0px 22px;
    height: 42px;
    line-height: 42px;
    font-size: 15px;
    border: #0e3992 solid 1px;
    border-radius: 10px;
}

.all_frm_list .form-group select.slt_areaa_ful {
    width: 100%;
    padding: 0px 15px;
    height: 42px;
    line-height: 42px;
    font-size: 15px;
    border: #0e3992 solid 1px;
    border-radius: 10px;
}

.all_frm_list .form-group.managsss1 {
    position: relative;
    width: 100%;
}

.all_frm_list .form-group.managsss1.lot_sz .pusntttss {
background: #4a83cc;
    right: 2px;
    padding: 10px 10px;
    color: #fff;
    border-radius: 10px;
    position: absolute;
    margin: 0px -1px 0 0;
    font-size: 14px;
}

.property_photos#pro_v_alss .all_frm_list {
        padding: 10px;
    }

    .property_photos#pro_v_alss .hd_res_listsss h2 {
        font-size: 18px;
        margin-top: 0;
        margin-bottom: 15px;
        display: flex;
        width: 100%;
        position: relative;
        padding-right: 50px;
        height: 40px;
        align-items: center;
        justify-content: left;
		color: #000;
    }

    .property_photos#pro_v_alss .hd_res_listsss h2 span.rit_mg {
        position: absolute;
        right: 20px;
    }
	
	
	.property_photos#pro_v_alss .file-upload-adsss {
    border: #0e3992 dashed 1px;
    min-height: 200px;
    border-radius: 10px;
    text-align: center;
    display: flex;
    align-items: center;
    justify-content: center;
	padding: 15px;
}

.property_photos#pro_v_alss .file-upload-adsss .icon_f p {
    margin: 10px 0 0;
    font-weight: 600;
    font-size: 14px;
    color: #000;
    line-height: 20px;
}
</style>

<script>
   function getTypes(cat){
       var property_type = "{{ isset($property)?$property->property_type:'' }}";
        $.ajax({
            url: '{{ route('property-type.get-by-category') }}',
            type: 'POST',
            data: {
                _token: '{{ csrf_token() }}',
                cat_id: cat,
            },
            success: function (response) {
                if(response.status === true){
                    let options = '<option value="">Select Type</option>';
                    response.data.forEach(function(type){
                        if(property_type == type.id){
                            options += '<option selected value="'+type.id+'">'+type.title+'</option>';
                        }else{
                            options += '<option value="'+type.id+'">'+type.title+'</option>';
                        }
                    });
                    $('#property_type').html(options);
                } else {
                    $('#property_type').html('<option value="">No types found</option>');
                    // alert(response.msg);
                }
            },
            error: function () {
                alert('Something went wrong!');
            }
        });
    }


</script>

<script>
	getcountry();
	function getcountry(callback=null) {
    var URL = '{{url("get-country")}}';
    $.ajax({
        url: URL,
        type: "GET",
        success: function(response) {
            $('#cp-country').html(response);
			selectCountry();
            if(callback){
                callback();
            }
        },
        error: function(error) {
            console.log(error);
        }
    });
    return 1;
}
function getState(id, callback=null) {
    var URL = '{{url("get-state-by-country")}}/'+id;
    $.ajax({
        url: URL,
        type: "GET",
        success: function(response) {
            $('#cp-state').html(response);
            if(callback){
                callback();
            }
        },
        error: function(error) {
            console.log(error);
        }
    });
}

function getCity(id, callback=null) {
    var URL = '{{url("get-city-by-state")}}/'+id;
    $.ajax({
        url: URL,
        type: "GET",
        success: function(response) {
            $('#cp-city').html(response);
            if(callback){

                callback();
            }
        },
        error: function(error) {
            console.log(error);
        }
    });
    return 1;
}

<?php
$country = isset($details->country) ? $details->country : '';
$state = isset($details->state) ? $details->state : '';
$city = isset($details->city) ? $details->city : '';

?>
function selectCountry() {
    let element = document.getElementById('cp-country');
    var country_id = "{{ isset($details)?$details->prop_country:'' }}";
    element.value = country_id;

    getState(country_id, function() {
        selectState();

        });
}
function selectState() {
    // alert(<?=$state?>);
    var state_id = "{{ isset($details)?$details->prop_state:'' }}";
    let element = document.getElementById('cp-state');
    element.value = state_id;
    getCity(state_id, function() {
        selectCity();
        });
}
function selectCity() {
    var city_id = "{{ isset($details)?$details->prop_city:'' }}";
    let element = document.getElementById('cp-city');
    element.value = city_id;
}

</script>
<script>
document.addEventListener("DOMContentLoaded", function() {
   

    // Add more rows
    document.getElementById('addMoreBtn').addEventListener('click', function() {
        let lastRow = document.querySelector('.fileRow:last-of-type');
        let newRow = lastRow.cloneNode(true);

        // Reset selects and inputs
        newRow.querySelector('.fileTypeSelect').value = '';
        newRow.querySelector('.inputContainer').innerHTML = `
            <span style="color: red;">*</span> Upload
            <input type="file" name="images[]" class="form-control form-control-user" required />
        `;

        // Show remove button
        newRow.querySelector('.removeRowBtn').style.display = 'inline-block';

        document.getElementById('fileRows').appendChild(newRow);
        fileIndex++;
    });

    // Handle type change
    document.addEventListener('change', function(e) {
        if(e.target && e.target.classList.contains('fileTypeSelect')) {
            let container = e.target.closest('.fileRow').querySelector('.inputContainer');
            let selectedType = e.target.value;

            if(selectedType === 'video_link') {
                container.innerHTML = `
                    <span style="color: red;">*</span> Video Link
                    <input type="url" name="video_links[]" class="form-control form-control-user" required placeholder="Enter video URL" />
                `;
            } else if(selectedType === 'images') {
                container.innerHTML = `
                    <span style="color: red;">*</span> Upload
                    <input type="file" name="images[]" class="form-control form-control-user" required />
                `;
            }
        }
    });

    // Remove row
    document.addEventListener('click', function(e) {
        if(e.target && e.target.classList.contains('removeRowBtn')) {
            e.preventDefault();
            let row = e.target.closest('.fileRow');
            row.remove();
        }
    });
});
</script>


<script>
var property_category = "{{ isset($property)?$property->property_category:'' }}";
if(property_category){
    getTypes(property_category);
}

$('.inputContainer input[type="file"]').on('change', function() {
    // alert('hello');
    $(this).closest('.inputContainer').find('input[name="old_images[]"]').val('');
});

</script>
@endsection
