<?php
// echo "<pre>".print_r($PropertyDescription, true);die;
?>
@include('front.layouts.header')

<style>
.part_boxx_areaa {box-shadow:0 .5rem 1rem rgba(0, 0, 0, .15) !important; background-color:#fff; border-radius:0px; display:inline-block; width:100%; padding:15px 15px 5px; margin-bottom: 20px;}

.part_boxx_areaa h2 {margin: 0 0 10px; font-size: 20px; font-weight: 500; color: #000; display: inline-block; width: 100%;}
.part_boxx_areaa h2 span.link_partsss {float: right;}
.part_boxx_areaa h2 span.link_partsss a {border: #007bff solid 1px; color: #007bff; padding: 2px 15px; display: inline-block; font-size: 12px;
    line-height: 20px; border-radius: 3px; margin-right: 5px;}

.part_boxx_areaa h2 span.link_partsss a.actpartss{background:#007bff; color:#fff;}
.part_boxx_areaa h2 span.link_partsss a:last-child{margin-right:0;}

.part_boxx_areaa .brd_titless {font-size: 16px; font-weight: 500; margin-bottom: 7px; color: #1877f1;}
.part_boxx_areaa .brd_titless span.n_prery {color: #000;}
.part_boxx_areaa p.prp_text {text-transform: uppercase; margin: 0 0 5px; color: #1877f1; font-weight: 600;}

.part_boxx_areaa .prp_textxt {font-size: 12px; display: inline-block; width: 100%; margin-top: 5px;}
.part_boxx_areaa .prp_textxt a{font-size: 12px; color:#007bff;}
.part_boxx_areaa .prp_textxt .titl_textxt {float: left;}
.part_boxx_areaa .prp_textxt .set_vedioo {float: left;}
.part_boxx_areaa .prp_textxt .set_vedioo img {width: 50px; position: relative; top: -4px; left: 10px;}
</style>

<!--PEN HEADER-->
<div class="container mt-5">
    <div class="row mt-4">

        @include('front.layouts.detail-sidebar')

        <!--start full details -->
        <div class="col-12 col-sm-9">
		    <div class="part_boxx_areaa">
			 <h2>Property Description
			   <span class="link_partsss">
			   <a href="javascript:void(0);">Records & Listing</a>
			   <a href="javascript:void(0);" class="actpartss">View On Map</a>
			  </h2>
			  <div class="brd_titless">{{ $category->title }} >> {{ isset($MainProperty->prop_name) ? $MainProperty->prop_name : '' }} >> <span class="n_prery">Property Description</span></div>

			</div>


            <div class="row mt-0">
                <div class="col-lg-12">
                    <form id="propertyPageForm" method="POST" action="{{ route('update-property-description') }}" enctype="multipart/form-data">
                    <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">

                    <input type="hidden" name="prop_type"   value="{{ isset($MainProperty->prop_type) ? $MainProperty->prop_type : $property_type}}">
                    <input type="hidden" name="prop_parent_type"   value="{{ isset($MainProperty->prop_parent_type) ? $MainProperty->prop_parent_type : $type}}">
                    <input type="hidden" name="propertyID" value="<?=isset($propertyID) ? $propertyID : 0?>">
                    <input type="hidden" name="propertyImagesVideos" value="<?=isset($MainProperty->imageVideo) ? $MainProperty->imageVideo : 0?>">
                    @if(Session::has('success'))
                    <div class="alert alert-success">
                        {{Session::get('success')}}
                    </div>
                    @endif
				    <!-- Property -->

					<div class="all_frm_list">
                        <div class="form-group managsss1">
                            <label>Property Name:</label>
                            <input type="text" name="property_name" placeholder="Property Name" value="<?=isset($MainProperty->prop_name) ? $MainProperty->prop_name : ''?>" required/>
                        </div>
                        <div class="form-group managsss1">
                            <label>Short Description <span class="ticck" tooltip="Add a short description of this property to display in its reports." flow="down">!</span></label>
							<textarea id="property_description" name="property_description" rows="3" cols="3" placeholder="Short Description" required><?=isset($MainProperty->prop_description) ? $MainProperty->prop_description : ''?></textarea>
                        </div>
						<div class="form-group managsss1">
                            <label>Tags & Labels:</label>
                            <input value="<?=isset($MainProperty->prop_tags) ? $MainProperty->prop_tags : ''?>" id="activate_tagator2" type="text" name="property_tags" class="tagator" placeholder="Tags, Labels" data-tagator-show-all-options-on-focus="true" data-tagator-autocomplete="['My First Property']">


							<span class="sm_txtx">Add Comma Separated Tags To Help You Categorize This Property, Track Its Status And Quickly Find It Later.</span>
                        </div>
                    </div>
					<!-- End Property -->

					<!-- Address -->
					<div class="Address">

					 <div class="hd_res_listsss">
                        <h2 style="float: left;"> Address  <span class="rit_mg"><img src="img/files.png" alt="" /></span></h2>
                        <button type="button" class="btn btn-primary  " onClick="copyPropertyAddress()" style=" float: right;"><i class="fa fa-copy"></i> <span id="cp-text">Copy Address</span></button>
                     </div>
					 <div class="all_frm_list" id="manags_boxss">
					   <div class="row">
					    <div class="col-lg-6 col-12">
					     <div class="form-group managsss1">
                            <label>Unit Number(Optional):</label>
                            <input type="text" name="unit_number" id="cp-unit_number" placeholder="Unit Number" value="<?=isset($PropertyAddress->prop_unitno) ? $PropertyAddress->prop_unitno : ''?>" />
                         </div>
						</div>

						<div class="col-lg-6 col-12">
                        <div class="form-group managsss1">
                            <label>Tower Number(Optional) :</label>
                            <input type="text" name="tower_number" id="cp-tower_number" placeholder="Tower Number" value="<?=isset($PropertyAddress->prop_tower_no) ? $PropertyAddress->prop_tower_no : ''?>" />
                        </div>
                        </div>

						<div class="col-lg-6 col-12">
                        <div class="form-group managsss1">
                            <label>Project Name(Optional) :</label>
                            <input type="text" name="project_name" id="cp-project_name" placeholder="Project Name" value="<?=isset($PropertyAddress->prop_project_name) ? $PropertyAddress->prop_project_name : ''?>" />
                        </div>
                        </div>

						<div class="col-lg-6 col-12">
                        <div class="form-group managsss1">
                            <label>Building Name(Optional):</label>
                            <input type="text" name="building_name" id="cp-building_name" placeholder="Building Name" value="<?=isset($PropertyAddress->prop_building_name) ? $PropertyAddress->prop_building_name : ''?>" />
                        </div>
                        </div>

                        <div class="col-lg-6 col-12">
                        <div class="form-group managsss1">
                            <label>Sector / Street No. / Address:</label>
                            <input type="text" name="street" id="cp-address" placeholder="Street Address" value="<?=isset($PropertyAddress->prop_street) ? $PropertyAddress->prop_street : ''?>" />
                        </div>
                        </div>

						<div class="col-lg-6 col-12">
                        <div class="form-group managsss1">
                            <label>Country:</label>
                            	<select name="pcountry" id="cp-country" onchange="getState(this.value)" required class="slt_areaa_ful">

                             <option value="">N/A</option>
                            	    @foreach($countryList as $list)
                             <option <?php //if(isset($PropertyAddress->prop_country) and $PropertyAddress->prop_country == $list->id) { echo "checked"; } ?> value="{{$list->id}}">{{$list->name}}</option>
                                @endforeach

                            </select>

                        </div>
                        </div>

						<div class="col-lg-6 col-12">
                        <div class="form-group managsss1">
                            <label>State/Region:</label>
                            	<select name="state" id="cp-state" onchange="getCity(this.value)" required class="slt_areaa_ful"></select>

                        </div>
                        </div>

						<div class="col-lg-6 col-12">
                        <div class="form-group managsss1">
                            <label>City:</label>
                            <select name="city" id="cp-city"  required class="slt_areaa_ful"></select>
                        </div>
                        </div>

                      <div class="col-lg-6 col-12">
                        <div class="form-group managsss1">
                            <label>ZIP/Postal Code:</label>
                            <input type="text" name="zip" id="cp-zip"  placeholder="ZIP/Postal Code" value="<?=isset($PropertyAddress->prop_zip) ? $PropertyAddress->prop_zip : ''?>" onkeypress="return (event.charCode !=8 && event.charCode ==0 || ( event.charCode == 46 || (event.charCode >= 48 && event.charCode <= 57)))"/>
                        </div>
                        </div>

                        <div class="col-lg-6 col-12">
                        <div class="form-group managsss1">
                            <label>Property Google Location:</label>
                            <input type="text" name="plocationlink" id="cp-plocationlink"  placeholder="Paste Enbeded Share link(Ex:- https://maps.app.goo.gl/JSbQSpLmKjax8Ghx5)" value="<?=isset($PropertyAddress->prop_google_location) ? $PropertyAddress->prop_google_location : ''?>" onkeypress="return (event.charCode !=8 && event.charCode ==0 || ( event.charCode == 46 || (event.charCode >= 48 && event.charCode <= 57)))"/>
                        </div>
                        </div>

						</div>
                        <div style="opacity:0;hieght:0px;"   id="hiddenaddress"></div>


                     </div>
                    </div>
					<!-- End Address -->

					<!-- Description -->
					<div class="Description">
					 <div class="hd_res_listsss">
                        <h2 style="float:left;">Description <span class="rit_mg"><img src="img/files.png" alt="" /></span></h2>
						<button type="button" class="btn btn-primary  " onClick="copyPropertyAddress()" style=" float: right;"><i class="fa fa-copy"></i> <span id="cp-text">Copy Description</span></button>
                     </div>
					 <div class="all_frm_list">
					    <div class="row">
					    <div class="col-lg-6 col-12">
                        <div class="form-group managsss1">
                            <label>Category:</label>
							<select name="pcategory" id="pcategory" onChange="setOption(this.value)" class="slt_areaa_ful">
                             <option value="">N/A</option>
                             <option value="Residentail">Residentail</option>
                             <option value="Commercial">Commercial</option>
                             <option value="Agriculture">Agriculture</option>
                             <option value="Industrial">Industrial</option>
                            </select>
                        </div>
                        </div>

						 <div class="col-lg-6 col-12">
						  <div class="row">
						    <div class="col-lg-6 col-12">
                        <div class="form-group managsss1">
                            <label>Parking:</label>
                            <select name="parking" id="parking" class="slt_areaa_ful">
                             <option value="Yes">Yes</option>
                             <option value="No">No</option>
                            </select>
                        </div>
                        </div>

						<div class="col-lg-6 col-12">
                        <div class="form-group managsss1">
                            <label>No Parking</label>
                            <select name="parking" id="parking" class="slt_areaa_ful">
                             <option value="Yes">Yes</option>
                             <option value="No">No</option>
                            </select>
                        </div>
                        </div>
						  </div>
						 </div>

                        <div class="col-lg-6 col-12">
                         <div class="form-group managsss1">
                            <label>Type:</label>
							<select name="pcategorytype" id="pcategorytype" class="slt_areaa_ful pcategorytype">
                              <option value="">N/A</option>
                            </select>
                        </div>
                        </div>

						<div class="col-lg-6 col-12">
                        <div class="form-group managsss1 lot_sz">
                            <label>Size:</label>
                            <input type="text" name="lot" placeholder="Size" value="<?=isset($PropertyDescription->desc_lot) ? $PropertyDescription->desc_lot : ''?>" onkeypress="return (event.charCode !=8 && event.charCode ==0 || ( event.charCode == 46 || (event.charCode >= 48 && event.charCode <= 57)))"/>

							<select name="psizetype" id="psizetype" class="pusntttss">
                              <option selected value="Square Feet">Square Feet</option>
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
                        <?php $selectedPtype = isset($PropertyDescription->desc_type) ? $PropertyDescription->desc_type : ''; ?>
                            <label>Units Type:</label>
							<select name="ptype" id="ptype" class="slt_areaa_ful">
                            <option value="">N/A</option>
                            <option value="1" <?= $selectedPtype == '1' ? 'selected' : '' ?>>1 BHK</option>
                            <option value="2" <?= $selectedPtype == '2' ? 'selected' : '' ?>>2 BHK</option>
                            <option value="3" <?= $selectedPtype == '3' ? 'selected' : '' ?>>3 BHK</option>
                            <option value="4" <?= $selectedPtype == '4' ? 'selected' : '' ?>>4 BHK</option>
                            <option value="5" <?= $selectedPtype == '5' ? 'selected' : '' ?>>5 BHK</option>
                            </select>
                        </div>
                        </div>

						<div class="col-lg-6 col-12">
                        <div class="form-group managsss1">
                            <label>Status:</label>
                            <select name="pstatus" id="pstatus" class="slt_areaa_ful">
                             <option value="Ready To Move">Ready To Move</option>
                             <option value="Underconstruction">Underconstruction</option>
                            </select>
                        </div>
                        </div>


						<div class="col-lg-6 col-12">
                        <div class="form-group managsss1">
                            <label>No of bedrooms</label>
                            <?php $selectedbedrooms = isset($PropertyDescription->bedrooms) ? $PropertyDescription->bedrooms : ''; ?>
							<select name="bedrooms" id="bedrooms" class="slt_areaa_ful">
                                <?php for ($i = 1; $i <= 10; $i++): ?>
                                    <option value="<?= $i ?>" <?= $selectedbedrooms == $i ? 'selected' : '' ?>><?= $i ?></option>
                                <?php endfor; ?>
                            </select>
                        </div>
                        </div>

						<div class="col-lg-6 col-12">
                        <div class="form-group managsss1">
                            <label>No of bathrooms</label>
							<select name="bathrooms" id="bathrooms" class="slt_areaa_ful">
                                <?php $selectedbathrooms = isset($PropertyDescription->bathrooms) ? $PropertyDescription->bathrooms : ''; ?>
                                    <?php for ($i = 1; $i <= 10; $i++): ?>
                                        <option value="<?= $i ?>" <?= $selectedbathrooms == $i ? 'selected' : '' ?>><?= $i ?></option>
                                    <?php endfor; ?>
                            </select>
                        </div>
                        </div>


                       <div class="col-lg-6 col-12">
                        <div class="form-group managsss1">
                            <label>Year Built:</label>
                            <input type="text" name="year" placeholder="Year Built" value="<?=isset($PropertyDescription->desc_year) ? $PropertyDescription->desc_year : ''?>" onkeypress="return (event.charCode !=8 && event.charCode ==0 || ( event.charCode == 46 || (event.charCode >= 48 && event.charCode <= 57)))"/>
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
                    </div>
					<!-- End Description -->


					<!-- Property Photos & Video -->
					<div class="property_photos" id="pro_v_alss">
					 <div class="row">
					   <div class="col-lg-4">
						<div class="hd_res_listsss mt-5">
							<h2>Property Photos  <span class="rit_mg"><img src="{{ url('img/glrr.png') }}" alt="" /></span></h2>
						</div>
						<div class="all_frm_list">
							<div class="row">
								<div class="col-lg-12">
									<div class="file-upload-adsss">
										<label for="attachment">
											<div class="icon_f" role="button" aria-disabled="false"><img src="{{ url('img/image-upload-icon.png') }}" style="width: 100px;" alt="" />
											<p>Drag And Drop File Here <span>Or Choose From Your Computer</span></p>
											</div>
										</label>
										<input type="file" name="file[]" accept="image/*, video/*" id="attachment" style="visibility: hidden; position: absolute;" multiple />
									</div>
								</div>
								<div class="col-lg-12">
									<div id="files-area">
										<span id="filesList">
											<span id="files-names">
											    <?php if(isset($MainProperty->imageVideo)){
											    $imageideos = explode(',', $MainProperty->imageVideo);
                                                foreach($imageideos as $imageideo)
                                                { ?>
											    <span class="file-block"><span class="file-delete"><span>+</span></span><span class="name"><?=$imageideo?></span></span>
											    <?php } } ?>
											</span>
										</span>
									</div>
								</div>
							</div>
						</div>
						</div>


						<div class="col-lg-4">
						<div class="hd_res_listsss mt-5">
							<h2>Property Video  <span class="rit_mg"><img src="{{ url('img/glrr.png') }}" alt="" /></span></h2>
						</div>
						<div class="all_frm_list">
							<div class="row">
								<div class="col-lg-12">
									<div class="file-upload-adsss">
										<label>
											<div class="icon_f" role="button" aria-disabled="false"><img src="{{ url('img/video_pla.png') }}" style="width: 100px;" alt="" />
											<p>Drag And Drop File Here <span>Or Choose From Your Computer</span></p>
											</div>
										</label>
									</div>
								</div>
							</div>
						</div>
						</div>


						<div class="col-lg-4">
						<div class="hd_res_listsss mt-5">
							<h2>Additional Details, Information & Recourses  <span class="rit_mg"><img src="{{ url('img/glrr.png') }}" alt="" /></span></h2>
						</div>
						<div class="all_frm_list">
							<div class="row">
								<div class="col-lg-12">
									<div class="file-upload-adsss">
										<label>
											<div class="icon_f" role="button" aria-disabled="false"><img src="{{ url('img/unlink_icon.png') }}" style="width: 100px;" alt="" />
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


					<!-- Nots -->
					<div class="Nots">
					 <div class="hd_res_listsss">
                        <h2>Notes</h2>
                     </div>
					 <div class="all_frm_list">
                        <div class="form-group managsss1 mb-0">
							<textarea id="notes" name="notes" rows="2" cols="2" placeholder="Add Notes About Your Property"><?=isset($MainProperty->prop_notes) ? $MainProperty->prop_notes : ''?></textarea>
                        </div>
                     </div>
                      <div class="backk_bntss">
                            <button type="submit" class="btn btn-primary m-b-0 actss" onclick="if(validate()){this.form.submit(); this.disabled=true;}" style="float: right;">Update </button>
						</div>
                    </div>
					<!-- End Nots -->

					</form>
                </div>
            </div>
        </div>
    </div>
</div>



<!-- Modal -->
<div class="modal fade" id="videotutorialmodal" tabindex="-1" role="dialog" aria-labelledby="videotutorialmodalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document" style="max-width: 720px; width: 640px;">
    <div class="modal-content all_frm_list" style="max-width: 700px;">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="font-size: 30px;">
          <span aria-hidden="true">&times;</span>
        </button>
        <iframe width="560" height="315" src="https://www.youtube.com/embed/mJVuZiK9a6I?si=tWOM4Nh4-zGMGVP1" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
    </div>
  </div>
</div>


@include('front.layouts.footer')
<link rel="stylesheet" href="{{ url('/selecttags/fm.tagator.jquery.css')}}" />
<script src="{{ url('/selecttags/fm.tagator.jquery.js')}}"></script>
<style>


.choices__list--multiple .choices__item{
    background-color: #1c539a;
    border: 1px solid #1c539a;
}

.tagator_tag_remove {
    background: #f15867;
    border-top-right-radius: 5px;
    border-bottom-right-radius: 5px;
}
.tagator_tag {
        margin-top: 8px;
    background: #1977f1;
    border-radius: 5px;
    padding: 4px 20px 4px 10px;
}

input.tagator_input {
    padding: 0 !important;
    border: none !important;
}
#tagator_activate_tagator2 {
    max-width: 100%;
}

.form-group.managsss1.lot_sz .pusntttss {
    background: #4a83cc;
    right: 2px;
    margin: 2px 0 0;
    padding: 9px 15px;
    color: #fff;
    border-radius: 10px;
}

.pusntttss {
    position: absolute;
    right: 150px;
    margin-top: 11px;
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
}
.property_photos#pro_v_alss .hd_res_listsss h2 span.rit_mg {
    position: absolute;
    right: 20px;
}
</style>
<script>


function setOption(cat, callback=null){

if(cat=='Residentail'){
      var newOptions = {"Flat/Apartment": "Flat/Apartment",
      "Duplex": "Duplex",
      "Villas": "Villas",
      "Plot(Approved)": "Plot(Approved)",
      "Plot(Unapproved)": "Plot(Unapproved)",
      "Other": "Other"
    };
}else if(cat=='Commercial'){
      var newOptions = {"Retail/Shops": "Retail/Shops",
          "Office Space": "Office Space",
          "Studio Apartment": "Studio Apartment",
          "Food Court": "Food Court",
          "Virtual Space": "Virtual Space",
          "Other": "Other"
        };
}else if(cat=='Agriculture'){
      var newOptions = {
          "Agriculture": "Agriculture"
        };
}else{
      var newOptions = {
          "Industrial": "Industrial"
        };
}


    var $el = $("#pcategorytype");
    $el.empty(); // remove old options
    $.each(newOptions, function(key,value) {
      $el.append($("<option></option>")
         .attr("value", value).text(key));
    });

    if(callback){
        callback();
    }
}
/*var firstElement = document.getElementById('tag-input1');
const choices1 = new Choices(firstElement, {
                delimiter: ',',
                editItems: true,
                maxItems: 15,
                allowHTML: true,
                removeButton: true
            });
*/
// program to display a text using setTimeout method
function resetAddressText() {
     $('#cp-text').html('Copy Address');
}

function copy_text(element) {
    //Before we copy, we are going to select the text.
    var text = document.getElementById(element);
    var selection = window.getSelection();
    var range = document.createRange();
    range.selectNodeContents(text);
    selection.removeAllRanges();
    selection.addRange(range);
    //add to clipboard.
    document.execCommand('copy');
}

function copyPropertyAddress(){
    var add1 =  $('#cp-unit_number').val();
    var add2 =  $('#cp-tower_number').val();
    var add3 =  $('#cp-project_name').val();
    var add4 =  $('#cp-building_name').val();


    var add5 =  $('#cp-address').val();
    var add6 =  $('#cp-city option:selected').text();
    var add7 =  $('#cp-state option:selected').text();
    var add8 =  $("#cp-country option:selected").text();


    var add9 =  $('#cp-zip').val();

     $('#hiddenaddress').html('Unit No.: '+add1+'</br> Tower No.: '+add2+'</br> Project Name: '+add3+'</br> Building Name: '+add4+'</br> Street Address: '+add5+'</br> City: '+add6+'</br> State: '+add7+'</br> Country: '+add8+'</br> ZipCode: '+add9);


      copy_text('hiddenaddress');

     // var copyText = document.getElementById("hiddenaddress");

 /*      var $temp = $("<input>");
  $("body").append($temp);
  $temp.val($(copyText).html()).select();
  document.execCommand("copy");
  $temp.remove();
  */


  // Select the text field
 /* copyText.select();

  copyText.setSelectionRange(0, 99999); // For mobile devices

   // Copy the text inside the text field
  navigator.clipboard.writeText(copyText.value);*/
  $('#cp-text').html('Copied Address!');
  setTimeout(resetAddressText, 3000);

}



    const dt = new DataTransfer();

    $("#attachment").on('change', function(e) {
        for (var i = 0; i < this.files.length; i++) {
            let fileBloc = $('<span/>', {
                    class: 'file-block'
                }),
                fileName = $('<span/>', {
                    class: 'name',
                    text: this.files.item(i).name
                });
            fileBloc.append('<span class="file-delete"><span>+</span></span>')
                .append(fileName);
            $("#filesList > #files-names").append(fileBloc);
        };
        // Ajout des fichiers dans l'objet DataTransfer
        for (let file of this.files) {
            dt.items.add(file);
        }
        // Mise à jour des fichiers de l'input file après ajout
        this.files = dt.files;

        // EventListener pour le bouton de suppression créé
        $('span.file-delete').click(function() {
            let name = $(this).next('span.name').text();
            // Supprimer l'affichage du nom de fichier
            $(this).parent().remove();
            for (let i = 0; i < dt.items.length; i++) {
                // Correspondance du fichier et du nom
                if (name === dt.items[i].getAsFile().name) {
                    // Suppression du fichier dans l'objet DataTransfer
                    dt.items.remove(i);
                    continue;
                }
            }
            // Mise à jour des fichiers de l'input file après suppression
            document.getElementById('attachment').files = dt.files;
        });
    });


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

// selections fileds
<?php
$country = isset($PropertyAddress->prop_country) ? $PropertyAddress->prop_country : '';
$state = isset($PropertyAddress->prop_state) ? $PropertyAddress->prop_state : '';
$city = isset($PropertyAddress->prop_city) ? $PropertyAddress->prop_city : '';

?>
function selectCountry() {
    let element = document.getElementById('cp-country');
    element.value = '<?=$country?>';
    getState('<?=$country?>', function() {
        selectState();
        });
}
function selectState() {
    // alert(<?=$state?>);
    let element = document.getElementById('cp-state');
    element.value = '<?=$state?>';
    getCity('<?=$state?>', function() {
        selectCity();
        });
}
function selectCity() {
    let element = document.getElementById('cp-city');
    element.value = '<?=$city?>';
}

// functions calls one after the other
selectCountry();

// description dynamic selection
function selectCategory() {
    let element = document.getElementById('pcategory');
    element.value = '<?=isset($PropertyDescription->desc_category) ? $PropertyDescription->desc_category : ''?>';
    setOption('<?=isset($PropertyDescription->desc_category) ? $PropertyDescription->desc_category : ''?>', function() {
        selectElement('pcategorytype', '<?=isset($PropertyDescription->desc_category_type) ? $PropertyDescription->desc_category_type : ''?>');
        });
}

function selectElement(id, valueToSelect) {
    let element = document.getElementById(id);
    element.value = valueToSelect;
}

selectCategory();
selectElement('ptype', '<?=isset($PropertyDescription->desc_type) ? $PropertyDescription->desc_type : ''?>');
selectElement('parking', '<?=isset($PropertyDescription->desc_parking) ? $PropertyDescription->desc_parking : ''?>');
selectElement('psizetype', '<?=isset($PropertyDescription->desc_lot_type) ? $PropertyDescription->desc_lot_type : ''?>');
selectElement('pstatus', '<?=isset($PropertyDescription->desc_status) ? $PropertyDescription->desc_status : ''?>');
selectElement('ptransactiontype', '<?=isset($PropertyDescription->desc_transaction) ? $PropertyDescription->desc_transaction : ''?>');
</script>