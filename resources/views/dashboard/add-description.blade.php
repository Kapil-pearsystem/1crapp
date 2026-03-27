<?php
// echo "<pre>".print_r($PropertyDescription, true);die;
?>
@include('front.layouts.header')

<style>
    .part_boxx_areaa {
        box-shadow: 0 .5rem 1rem rgba(0, 0, 0, .15) !important;
        background-color: #fff;
        border-radius: 0px;
        display: inline-block;
        width: 100%;
        padding: 15px 15px 5px;
        margin-bottom: 20px;
    }

    .part_boxx_areaa h2 {
        margin: 0 0 10px;
        font-size: 20px;
        font-weight: 500;
        color: #000;
        display: inline-block;
        width: 100%;
    }

    .part_boxx_areaa h2 span.link_partsss {
        float: right;
    }

    .part_boxx_areaa h2 span.link_partsss a {
        border: #007bff solid 1px;
        color: #007bff;
        padding: 2px 15px;
        display: inline-block;
        font-size: 12px;
        line-height: 20px;
        border-radius: 3px;
        margin-right: 5px;
    }

    .part_boxx_areaa h2 span.link_partsss a.actpartss {
        background: #007bff;
        color: #fff;
    }

    .part_boxx_areaa h2 span.link_partsss a:last-child {
        margin-right: 0;
    }

    .part_boxx_areaa .brd_titless {
        font-size: 16px;
        font-weight: 500;
        margin-bottom: 7px;
        color: #1877f1;
    }

    .part_boxx_areaa .brd_titless span.n_prery {
        color: #000;
    }

    .part_boxx_areaa p.prp_text {
        text-transform: uppercase;
        margin: 0 0 5px;
        color: #1877f1;
        font-weight: 600;
    }

    .part_boxx_areaa .prp_textxt {
        font-size: 12px;
        display: inline-block;
        width: 100%;
        margin-top: 5px;
    }

    .part_boxx_areaa .prp_textxt a {
        font-size: 12px;
        color: #007bff;
    }

    .part_boxx_areaa .prp_textxt .titl_textxt {
        float: left;
    }

    .part_boxx_areaa .prp_textxt .set_vedioo {
        float: left;
    }

    .part_boxx_areaa .prp_textxt .set_vedioo img {
        width: 50px;
        position: relative;
        top: -4px;
        left: 10px;
    }
		.hd_res_listsss.bothsss_mng {display: inline-block; width: 100%;}
	.hd_res_listsss.bothsss_mng h2 {display: inline-block; margin: 10px 0 20px; line-height: 40px;}
	.hd_res_listsss.bothsss_mng span.set_vedioo {float: right;}
	.hd_res_listsss.bothsss_mng span.set_vedioo a {display: inline-block; text-align: right;}
	.hd_res_listsss.bothsss_mng span.set_vedioo a img {width: 75%;}
	.ad_all_modalss .modal-dialog {
    max-width: 550px;
    width: 100%;
    position: relative;
}
.ad_all_modalss .modal-dialog .modal-content.all_frm_list {
    padding: 15px;
    border-radius: 10px;
	    position: relative;
}
.ad_all_modalss .modal-dialog .modal-content.all_frm_list .titalsss {
    font-size: 18px;
    font-weight: 600;
    margin-bottom: 10px;
}

.ad_all_modalss .modal-dialog .modal-content.all_frm_list select {
    width: 100%;
    padding: 0px 15px;
    height: 42px;
    line-height: 42px;
    font-size: 15px;
    border: #0e3992 solid 1px;
    border-radius: 10px;
    cursor: pointer;
}
.ad_all_modalss .modal-dialog .modal-content.all_frm_list input.form-control.uploadmg {
    padding-left: 0;
    line-height: 34px;
}
.ad_all_modalss .modal-dialog .modal-content.all_frm_list select:focus{outline:none;}

.ad_all_modalss .modal-dialog .modal-content.all_frm_list button.close {
    position: absolute;
    right: 7px;
    top: 0;
	z-index: 1;
    font-size: 35px;
}
.ad_all_modalss .modal-dialog .modal-content.all_frm_list button.close:focus {
    outline: none;
}
.ad_all_modalss .modal-dialog .modal-content.all_frm_list button.close span {
    font-weight: 100;
    opacity: 1;
}
.ad_all_modalss .modal-dialog .modal-content.all_frm_list .bntt_cn {
    display: inline-block;
    width: 100%;
    text-align: center;
    margin-top: 10px;
}
.ad_all_modalss .modal-dialog .modal-content.all_frm_list .bntt_cn a {
    font-size: 14px;
    color: #4a83cc;
    border: #4a83cc solid 1px;
    padding: 8px 25px;
    display: inline-block;
    border-radius: 50px;
    margin-right: 15px;
}
.ad_all_modalss .modal-dialog .modal-content.all_frm_list .bntt_cn a:hover{background: #4a83cc; color:#fff;}
.ad_all_modalss .modal-dialog .modal-content.all_frm_list .bntt_cn button.actsss {
    background: #4a83cc;
    color: #fff !important;
    border: none;
    padding: 9px 20px;
    font-size: 14px;
    border-radius: 40px;
}

.ad_all_modalss .modal-dialog .modal-content.all_frm_list .panelss {display: none;}
.ad_all_modalss .modal-dialog .modal-content.all_frm_list #file {display: block;}
</style>

<!--PEN HEADER-->
<div class="container mt-5">
    <div class="row mt-4">

        @include('front.layouts.sidebar')

        <!--start full details -->
        <div class="col-12 col-sm-9">
            <div class="part_boxx_areaa">
                <h2>New {{ $property_type }} Property
                    <span class="link_partsss">
                        <a href="javascript:void(0);" onclick="document.referrer ? window.location.href = document.referrer : alert('No previous page found!')">Start Over Again</a>
                        <a href="javascript:void(0);" class="actpartss">Save</a>
                </h2>
                <div class="brd_titless">{{ $category->s_code }} >> <span class="n_prery">New Property</span></div>
                <p class="prp_text">Property Work Sheet</p>
                <div class="prp_textxt">
                    <div class="titl_textxt">Enter as much in information as you have about this property
                        <a href="javascript:void(0);">View tutorial <i class="fa fa-external-link"></i></a>
                    </div>
                    <div class="set_vedioo" data-toggle="modal" data-target="#videotutorialmodal"><a href="javascript:void(0);"><img src="{{ asset('img/video-tutorial-new.png') }}"> </a></div>
                </div>
            </div>

            <!--multisteps-form-->
            <div class="multisteps-form">
                <!--progress bar-->
                <div class="row">
                    <div class="col-12 col-lg-12 my-4">
                        <div class="multisteps-form__progress">
                            <button class="multisteps-form__progress-btn js-active" type="button" title="Property Description">Property Description</button>
                            <button class="multisteps-form__progress-btn" type="button" title="Book & Finance & Payments" disabled>Book & Finance & Payments</button>
                            <button class="multisteps-form__progress-btn" type="button" title="Possesion & Improment" disabled>Possesion & Improment</button>
                            <?php if (
                                (isset($type) && ($type == 'buy-hold' || $type == 'buy-refinance-hold')) ||
                                (isset($MainProperty->prop_type) &&
                                    ($MainProperty->prop_type == 'Buy And Hold' || $MainProperty->prop_type == 'Buy, Refinance And Hold'))
                            ) { ?>
                                <button class="multisteps-form__progress-btn" type="button" title="Rentout & Opearte" disabled>Rentout & Opearte</button>
                            <?php } ?>

                            @if($type=='buy-refinance-hold' || $type=='buy-refinance-sale' || (isset($MainProperty->prop_type) && $MainProperty->prop_type=='Buy, Refinance And Hold') || (isset($MainProperty->prop_type) && $MainProperty->prop_type=='Buy, Refinance And Sale'))
                            <button class="multisteps-form__progress-btn" type="button" title="Refinace & Cash Out" disabled>Refinace & Cash Out</button>
                            @endif
                            <button class="multisteps-form__progress-btn" type="button" title="Sell" disabled>Projection & Sale</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-0">
			<div class="col-lg-12">
				 <div class="hd_res_listsss bothsss_mng">
					<h2>Property Description</h2>
					<span class="set_vedioo" data-toggle="modal" data-target="#videotutorialmodal"><a href="javascript:void(0);"><img src="{{ asset('img/video-tutorial-new.png') }}"> </a></span>
				 </div>
				</div>
			
                <div class="col-lg-12">
                    <form id="propertyPageForm" method="POST" action="{{ route('save-property-description') }}" enctype="multipart/form-data">
                        <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">

                        <input type="hidden" name="prop_type" value="{{ isset($MainProperty->prop_type) ? $MainProperty->prop_type : $property_type}}">
                        <input type="hidden" name="prop_parent_type" value="{{ isset($MainProperty->prop_parent_type) ? $MainProperty->prop_parent_type : $type}}">
                        <input type="hidden" name="propertyID" value="<?= isset($propertyID) ? $propertyID : 0 ?>">
                        <input type="hidden" name="propertyImagesVideos" value="<?= isset($MainProperty->imageVideo) ? $MainProperty->imageVideo : 0 ?>">
                        @if(Session::has('success'))
                        <div class="alert alert-success">
                            {{Session::get('success')}}
                        </div>
                        @endif
                        <!-- Property -->

                        <div class="all_frm_list">
                            <div class="form-group managsss1">
                                <label>Property Name:</label>
                                <input type="text" name="property_name" placeholder="Property Name" value="<?= isset($MainProperty->prop_name) ? $MainProperty->prop_name : '' ?>" required />
                            </div>
                            <div class="form-group managsss1">
                                <label>Short Description <span class="ticck" tooltip="Add a short description of this property to display in its reports." flow="down">!</span></label>
                                <textarea id="property_description" name="property_description" rows="3" cols="3" placeholder="Short Description" required><?= isset($MainProperty->prop_description) ? $MainProperty->prop_description : '' ?></textarea>
                            </div>
                            <div class="form-group managsss1">
                                <label>Tags & Labels:</label>
                                <input value="<?= isset($MainProperty->prop_tags) ? $MainProperty->prop_tags : '' ?>" id="activate_tagator2" type="text" name="property_tags" class="tagator" placeholder="Tags, Labels" data-tagator-show-all-options-on-focus="true" data-tagator-autocomplete="{{ $tagatorAutocomplete }}">
                                <span class="sm_txtx">Add Comma Separated Tags To Help You Categorize This Property, Track Its Status And Quickly Find It Later.</span>
                            </div>
                        </div>
                        <!-- End Property -->

                        <!-- Address -->
                        <div class="Address">

                            <div class="hd_res_listsss">
                                <h2 style="float: left;"> Address <span class="rit_mg"><img src="img/files.png" alt="" /></span></h2>
                                <button type="button" class="btn btn-primary  " onClick="copyPropertyAddress()" style=" float: right;"><i class="fa fa-copy"></i> <span id="cp-text">Copy Address</span></button>
                            </div>
                            <div class="all_frm_list" id="manags_boxss">
                                <div class="row">
                                    <div class="col-lg-6 col-12">
                                        <div class="form-group managsss1">
                                            <label>Unit Number(Optional):</label>
                                            <input type="text" name="unit_number" id="cp-unit_number" placeholder="Unit Number" value="<?= isset($PropertyAddress->prop_unitno) ? $PropertyAddress->prop_unitno : '' ?>" />
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-12">
                                        <div class="form-group managsss1">
                                            <label>Tower Number(Optional) :</label>
                                            <input type="text" name="tower_number" id="cp-tower_number" placeholder="Tower Number" value="<?= isset($PropertyAddress->prop_tower_no) ? $PropertyAddress->prop_tower_no : '' ?>" />
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-12">
                                        <div class="form-group managsss1">
                                            <label>Project Name(Optional) :</label>
                                            <input type="text" name="project_name" id="cp-project_name" placeholder="Project Name" value="<?= isset($PropertyAddress->prop_project_name) ? $PropertyAddress->prop_project_name : '' ?>" />
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-12">
                                        <div class="form-group managsss1">
                                            <label>Building Name(Optional):</label>
                                            <input type="text" name="building_name" id="cp-building_name" placeholder="Building Name" value="<?= isset($PropertyAddress->prop_building_name) ? $PropertyAddress->prop_building_name : '' ?>" />
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-12">
                                        <div class="form-group managsss1">
                                            <label>Sector / Street No. / Address:</label>
                                            <input type="text" name="street" id="cp-address" placeholder="Street Address" value="<?= isset($PropertyAddress->prop_street) ? $PropertyAddress->prop_street : '' ?>" />
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-12">
                                        <div class="form-group managsss1">
                                            <label>Country:</label>
                                            <select name="pcountry" id="cp-country" onchange="getState(this.value)" required class="slt_areaa_ful">
                                                <option value="">N/A</option>
                                                @foreach($countryList as $list)
                                                <option
                                                    value="{{ $list->id }}"
                                                    {{ (old('pcountry', $PropertyAddress->prop_country ?? '') == $list->id) ? 'selected' : '' }}>
                                                    {{ $list->name }}
                                                </option>
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
                                            <select name="city" id="cp-city" required class="slt_areaa_ful"></select>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-12">
                                        <div class="form-group managsss1">
                                            <label>ZIP/Postal Code:</label>
                                            <input type="text" name="zip" id="cp-zip" placeholder="ZIP/Postal Code" value="<?= isset($PropertyAddress->prop_zip) ? $PropertyAddress->prop_zip : '' ?>" onkeypress="return (event.charCode !=8 && event.charCode ==0 || ( event.charCode == 46 || (event.charCode >= 48 && event.charCode <= 57)))" />
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-12">
                                        <div class="form-group managsss1">
                                            <label>Property Google Location:</label>
                                            <input type="text" name="plocationlink" id="cp-plocationlink" placeholder="Paste Enbeded Share link(Ex:- https://maps.app.goo.gl/JSbQSpLmKjax8Ghx5)" value="<?= isset($PropertyAddress->prop_google_location) ? $PropertyAddress->prop_google_location : '' ?>" onkeypress="return (event.charCode !=8 && event.charCode ==0 || ( event.charCode == 46 || (event.charCode >= 48 && event.charCode <= 57)))" />
                                        </div>
                                    </div>

                                </div>
                                <div style="opacity:0;hieght:0px;" id="hiddenaddress"></div>


                            </div>
                        </div>
                        <!-- End Address -->

                        <!-- Description -->
                        <div class="Description">
                            <div class="hd_res_listsss">
                                <h2 style="float:left;">Description <span class="rit_mg"><img src="img/files.png" alt="" /></span></h2>
                                <button type="button" class="btn btn-primary  " onClick="copyPropertyDescription()" style=" float: right;"><i class="fa fa-copy"></i> <span id="desc-copy-msg">Copy Description</span></button>
                            </div>
                            <div class="all_frm_list">
                                <div class="row">
                                    <div class="col-lg-6 col-12">
                                        <div class="form-group managsss1">
                                            <label>Category:</label>
                                            <select name="pcategory" id="pcategory" onChange="setOption(this.value); disableOptionsIndusAgri(this.value);" class="slt_areaa_ful">
                                            <?php $desc_category = isset($PropertyDescription->desc_category) ? $PropertyDescription->desc_category : ''; ?>
                                                <option value="">N/A</option>
                                                <option value="Residentail" <?= $desc_category == 'Residentail' ? 'selected' : '' ?>>Residentail</option>
                                                <option value="Commercial" <?= $desc_category == 'Commercial' ? 'selected' : '' ?>>Commercial</option>
                                                <option value="Agriculture" <?= $desc_category == 'Agriculture' ? 'selected' : '' ?>>Agriculture</option>
                                                <option value="Industrial" <?= $desc_category == 'Industrial' ? 'selected' : '' ?>>Industrial</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-12">
                                        <div class="row">
                                            <div class="col-lg-6 col-12">
                                                <div class="form-group managsss1">
                                                    <label>Parking:</label>
                                                    <select name="parking" id="parking" class="slt_areaa_ful" required onchange="setNoOfParking(this.value)">
                                                    <?php $desc_parking = isset($PropertyDescription->desc_parking) ? $PropertyDescription->desc_parking : ''; ?>
                                                        <option value="" selected>Select</option>
                                                        <option value="Yes" <?= $desc_parking == 'Yes' ? 'selected' : '' ?>>Yes</option>
                                                        <option value="No" <?= $desc_parking == 'No' ? 'selected' : '' ?>>No</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-lg-6 col-12">
                                                <div class="form-group managsss1">
                                                    <label>No. of Parking</label>
                                                    <select name="no_of_parking" id="no_of_parking" class="slt_areaa_ful" <?= $desc_parking == 'Yes' ? '' : 'disabled' ?> required>
                                                    <?php $no_of_parking = isset($PropertyDescription->no_of_parking) ? $PropertyDescription->no_of_parking : ''; ?>
                                                        <option value="" selected>Select</option>
                                                        <?php for ($i = 1; $i <= 5; $i++): ?>
                                                            <option value="<?= $i ?>" <?= $no_of_parking == $i ? 'selected' : '' ?>>
                                                                <?= $i ?>
                                                            </option>
                                                        <?php endfor; ?>
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
                                            <input type="text" name="lot" placeholder="Size" value="<?= isset($PropertyDescription->desc_lot) ? $PropertyDescription->desc_lot : '' ?>" onkeypress="return (event.charCode !=8 && event.charCode ==0 || ( event.charCode == 46 || (event.charCode >= 48 && event.charCode <= 57)))" />

                                            <select name="psizetype" id="psizetype" class="pusntttss" required>
                                            <?php $desc_lot_type = isset($PropertyDescription->desc_lot_type) ? $PropertyDescription->desc_lot_type : ''; ?>
                                                <option selected value="">Select</option>
                                                <option value="Square Feet" <?= $desc_lot_type == 'Square Feet' ? 'selected' : '' ?>>Square Feet</option>
                                                <option value="Square Yard" <?= $desc_lot_type == 'Square Yard' ? 'selected' : '' ?>>Square Yard</option>
                                                <option value="Meter Feet" <?= $desc_lot_type == 'Meter Feet' ? 'selected' : '' ?>>Square Meter</option>
                                                <option value="Bigha" <?= $desc_lot_type == 'Bigha' ? 'selected' : '' ?>>Bigha</option>
                                                <option value="Acres" <?= $desc_lot_type == 'Acres' ? 'selected' : '' ?>>Acres</option>
                                                <option value="Hectre" <?= $desc_lot_type == 'Hectre' ? 'selected' : '' ?>>Hectre</option>

                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-12">
                                        <div class="form-group managsss1">
                                            <label>Units Type:</label>
                                            <select name="ptype" id="ptype" class="slt_areaa_ful">
                                            <?php $selectedPtype = isset($PropertyDescription->desc_type) ? $PropertyDescription->desc_type : ''; ?>
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
                                            <select name="pstatus" id="pstatus" class="slt_areaa_ful" required>
                                            <?php $pstatus = isset($PropertyDescription->pstatus) ? $PropertyDescription->pstatus : ''; ?>
                                                <option value="" selected disabled>Select</option>
                                                <option value="Ready To Move" {{ old('pstatus', $pstatus ?? '') == 'Ready To Move' ? 'selected' : '' }}>Ready To Move</option>
                                                <option value="Underconstruction" {{ old('pstatus', $pstatus ?? '') == 'Underconstruction' ? 'selected' : '' }}>Underconstruction</option>
                                            </select>
                                        </div>
                                    </div>


                                    <div class="col-lg-6 col-12">
                                        <div class="form-group managsss1">
                                            <label>No. of bedrooms</label>
                                            <select name="bedrooms" id="bedrooms" class="slt_areaa_ful">
                                            <?php $selectedbedrooms = isset($PropertyDescription->bedrooms) ? $PropertyDescription->bedrooms : ''; ?>
                                                @for ($i = 1; $i <= 10; $i++)
                                                    <option value="{{ $i }}" {{ old('bedrooms', $selectedbedrooms ?? '') == $i ? 'selected' : '' }}>
                                                        {{ $i }}
                                                    </option>
                                                @endfor

                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-12">
                                        <div class="form-group managsss1">
                                            <label>No. of barthrooms</label>
                                            <select name="bathrooms" id="bathrooms" class="slt_areaa_ful">
                                            <?php $selectedbathrooms = isset($PropertyDescription->bathrooms) ? $PropertyDescription->bathrooms : ''; ?>
                                                @for ($i = 1; $i <= 10; $i++)
                                                    <option value="{{ $i }}" {{ old('bathrooms', $selectedbathrooms ?? '') == $i ? 'selected' : '' }}>
                                                        {{ $i }}
                                                    </option>
                                                @endfor
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-12">
                                        <div class="form-group managsss1">
                                            <label>Year Built:</label>
                                            <input type="text" name="year" placeholder="Year Built" value="<?= isset($PropertyDescription->desc_year) ? $PropertyDescription->desc_year : '' ?>" onkeypress="return (event.charCode !=8 && event.charCode ==0 || ( event.charCode == 46 || (event.charCode >= 48 && event.charCode <= 57)))" />
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
                            <div id="hiddenDescription" style="display:none;"></div>
                        </div>
                        <!-- End Description -->


                        <!-- Property Photos & Video -->
                        <div class="property_photos" id="pro_v_alss">
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="hd_res_listsss mt-5">
                                        <h2>Property Photos <span class="rit_mg"><img src="{{ url('img/glrr.png') }}" alt="" /></span></h2>
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
                                                        <span id="files-names1">
                                                            <?php if (isset($MainProperty->imageVideo)) {
                                                                $imageideos = explode(',', $MainProperty->imageVideo);
                                                                foreach ($imageideos as $imageideo) { ?>
                                                                    <span class="file-block"><span class="file-delete"><span>+</span></span><span class="name"><?= $imageideo ?></span></span>
                                                                <?php }
                                                            } ?>
                                                        </span>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="col-lg-4">
                                    <div class="hd_res_listsss mt-5">
                                        <h2>Property Video <span class="rit_mg"><img src="{{ url('img/glrr.png') }}" alt="" /></span></h2>
                                    </div>
                                    <div class="all_frm_list">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="file-upload-adsss">
                                                    <label for="v_attachment">
                                                        <div class="icon_f" role="button" aria-disabled="false" data-toggle="modal" data-target="#vidiourlss">
                                                            <img src="{{ url('img/video_pla.png') }}" style="width: 100px;" alt="" />
                                                            <p>Drag And Drop File Here <span>Or Choose From Your Computer</span></p>
                                                        </div>
                                                    </label>

                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div id="files-area">
                                                    <span id="filesList">
                                                        <span id="files-names2">
                                                            @if(isset($Propertyvideos))
                                                                @foreach($Propertyvideos as $p_video)
                                                                <span class="file-block">
                                                                    <input type="hidden" name="video_title[]" value="{{ $p_video->title }}" id="v_title">
                                                                    <input type="hidden" name="video_link[]" value="{{ $p_video->link }}" id="v_link">
                                                                    <span class="file-delete"><span>+</span></span>
                                                                    <span class="name">{{ $p_video->title }}</span>
                                                                </span>
                                                                @endforeach
                                                            @endif
                                                        </span>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="hd_res_listsss mt-5">
                                        <h2>Additional Details, Information & Resourses <span class="rit_mg"><img src="{{ url('img/glrr.png') }}" alt="" /></span></h2>
                                    </div>
                                    <div class="all_frm_list">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="file-upload-adsss">
                                                    <label for="file_input">
                                                        <div class="icon_f" role="button" aria-disabled="false"  data-toggle="modal" data-target="#moredetalsuploads">
                                                            <img src="{{ url('img/unlink_icon.png') }}" style="width: 100px;" alt="" />
                                                            <p>Drag And Drop File Here <span>Or Choose From Your Computer</span></p>
                                                        </div>
                                                    </label>
                                                    <!---<input type="file" name="other_resources[]" accept="image/*, video/*" id="file_input" style="visibility: hidden; position: absolute;" multiple />--->
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div id="files-area">
                                                    <span id="filesList">
                                                        <span id="files-names3">
                                                            @if(isset($Propertyresource))
                                                                @foreach($Propertyresource as $p_resource)
                                                                <span class="file-block">
                                                                    <input type="hidden" name="resources_title[]" value="{{ $p_resource->title }}" id="rs_title">
                                                                    <input type="hidden" name="resources_type[]" value="{{ $p_resource->type }}" id="rs_type">
                                                                    <input type="hidden" name="resources_file_type[]" value="{{ $p_resource->file_type }}" id="rs_file_type">
                                                                    <input type="hidden" name="resources_link[]" value="{{ $p_resource->link }}" id="rs_link">
                                                                    <input type="hidden" name="resources_file[]" value="{{ $p_resource->image }}" id="rs_file">
                                                                    <span class="file-delete"><span>+</span></span>
                                                                    <span class="name">{{ $p_resource->title }}</span>
                                                                </span>
                                                                @endforeach
                                                            @endif
                                                        </span>
                                                    </span>
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
                                    <textarea id="notes" name="notes" rows="2" cols="2" placeholder="Add Notes About Your Property"><?= isset($MainProperty->prop_notes) ? $MainProperty->prop_notes : '' ?></textarea>
                                </div>
                            </div>
                            <div class="backk_bntss">
                                <button type="submit" class="btn btn-primary m-b-0 actss" onclick="if(validate()){this.form.submit(); this.disabled=true;}" style="float: right;">Next Section <i class="fa fa-arrow-right"></i></button>
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




<!---- Videos Url/Link ---->
<div class="modal fade ad_all_modalss" id="vidiourlss" tabindex="-1" role="dialog" aria-labelledby="vidiourlssLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content all_frm_list">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <form id="videoForm">
                <div class="col-lg-12">
                    <div class="titalsss">Videos Url/Link</div>
                </div>
                <div class="col-lg-12">
                    <div class="form-group">
                        <label>Title of Video</label>
                        <input type="text" id="videoTitle" class="form-control" placeholder="Enter Name" required />
                    </div>
                    <div class="form-group">
                        <label>URL Link</label>
                        <input type="text" id="videoLink" class="form-control" placeholder="Url Link" required />
                    </div>
                    <div class="form-group">
                        <div class="bntt_cn">
                            <a href="javascript:void(0);" data-dismiss="modal" aria-label="Close">Cancel</a>
                            <button type="button" id="updateVideo" class="actsss">Save</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!---- End Videos Url/Link ---->


<!---- Drop Url ---->
<div class="modal fade ad_all_modalss" id="moredetalsuploads" tabindex="-1" role="dialog" aria-labelledby="moredetalsuploadsLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content all_frm_list">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <form action="">
			  <div class="col-lg-12"><div class="titalsss">For More Details Information & Reouses</div></div>
			  <div class="col-lg-12">
		        <div class="form-group">
                    <label>Particulars</label>
                    <input type="text" name="particulars" value="" class="form-control" placeholder="" required="" />
                </div>

				<div class="form-group">
                    <label>Type</label>
                    <input type="text" name="type" value="" class="form-control" placeholder="" required="" />
                </div>

				<div class="form-group">
                    <label>Select Type</label>
                    <select id="sectionChooser">
					 <option value="file" selected>Upload Images</option>
					 <option value="link">Enter Url</option>
					</select>
                </div>

				<div class="form-group panelss" id="file">
                    <label>Upload Images</label>
                    <input type="file" name="upload_image" value="" class="form-control uploadmg" placeholder="" />
                </div>

				<div class="form-group panelss" id="link">
                    <label>Enter Url</label>
                    <input type="text" name="url_link" value="" class="form-control" placeholder=""  />
                </div>

				<div class="form-group">
				 <div class="bntt_cn">
                   <a href="javascript:void(0);" data-dismiss="modal" aria-label="Close">Cancel</a>
                   <button type="submit" value="Update Now" class="actsss">Save</button>
                 </div>
				</div>

		      </div>
			</form>
        </div>
    </div>
</div>
<!---- End Drop Url ---->


@include('front.layouts.footer')
<link rel="stylesheet" href="{{ url('/selecttags/fm.tagator.jquery.css')}}" />
<script src="{{ url('/selecttags/fm.tagator.jquery.js')}}"></script>
<style>
    .choices__list--multiple .choices__item {
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
    document.getElementById('updateVideo').addEventListener('click', function () {
        // Get the input values
        const videoTitle = document.getElementById('videoTitle').value;
        const videoLink = document.getElementById('videoLink').value;

        if (videoTitle.trim() === "" || videoLink.trim() === "") {
            alert('Both fields are required.');
            return;
        }

        // Create the new block
        const fileBlock = document.createElement('span');
        fileBlock.classList.add('file-block');

        fileBlock.innerHTML = `
            <input type="hidden" name="video_title[]" value="${videoTitle}" />
            <input type="hidden" name="video_link[]" value="${videoLink}" />
            <span class="file-delete"><span>+</span></span>
            <span class="name">${videoTitle}</span>
        `;

        // Append the block to files-names2
        document.getElementById('files-names2').appendChild(fileBlock);

        // Clear the modal fields
        document.getElementById('videoTitle').value = '';
        document.getElementById('videoLink').value = '';

        // Close the modal
        $(this).trigger('reset');
        $('#vidiourlss .close').trigger('click');
    });


    // for other additional details and resources
    $(document).ready(function () {
    // Initially hide both file upload and URL input sections
    $('#file, #link').hide();

    // Show relevant section based on select value
    $('#sectionChooser').change(function () {
        let selectedValue = $(this).val();
        $('.panelss').hide();
        $('#' + selectedValue).show();
    });

    // Pre-select the default value
    $('#sectionChooser').trigger('change');

    // Handle form submission
    $('#moredetalsuploads form').on('submit', function (e) {
        e.preventDefault(); // Prevent form submission

        let particulars = $('input[name="particulars"]').val(); // Adjust if name is defined
        let type = $('input[name="type"]').val();
        let selectedType = $('#sectionChooser').val();
        let link = selectedType === 'link' ? $('#link input').val() : '';
        let file = selectedType === 'file' ? $('#file input.uploadmg')[0].files[0] : '';

        // If a file is selected, upload it
        if (file) {
            upload_file(file).then(function(filePath) {
                // Append data to `#files-names3`
                let blockHtml = `
                    <span class="file-block">
                        <input type="hidden" name="resources_title[]" value="${particulars}" />
                        <input type="hidden" name="resources_type[]" value="${type}" />
                        <input type="hidden" name="resources_file_type[]" value="${selectedType}" />
                        <input type="hidden" name="resources_link[]" value="${link}" />
                        <input type="hidden" name="resources_file[]" value="${filePath}" />
                        <span class="file-delete"><span>+</span></span>
                        <span class="name">${particulars}</span>
                    </span>`;

                $('#files-names3').append(blockHtml);

                // Close the modal
                $('#moredetalsuploads form').trigger('reset');
                $('#moredetalsuploads .close').trigger('click');
            });
        } else {
            // If no file is selected, handle just the URL case
            let blockHtml = `
                <span class="file-block">
                    <input type="hidden" name="resources_title[]" value="${particulars}" />
                    <input type="hidden" name="resources_type[]" value="${type}" />
                    <input type="hidden" name="resources_file_type[]" value="${selectedType}" />
                    <input type="hidden" name="resources_link[]" value="${link}" />
                    <span class="file-delete"><span>+</span></span>
                    <span class="name">${particulars}</span>
                </span>`;

            $('#files-names3').append(blockHtml);

            // Close the modal
            $('#moredetalsuploads form').trigger('reset');
            $('#moredetalsuploads .close').trigger('click');
        }
    });
});

// Upload file via AJAX and return the file path
function upload_file(file) {
    return new Promise(function (resolve, reject) {
        let formData = new FormData();
        formData.append('file', file);
        formData.append('_token', '{{ csrf_token() }}');
       const post_url = '{{ route('store-property-gallery') }}';

        $.ajax({
            url: post_url,
            method: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function (response) {
                if (response.success) {
                    resolve(response.file_path);
                } else {
                    reject('File upload failed');
                }
            },
            error: function (error) {
                console.error('Error:', error);
                reject(error);
            }
        });
    });
}


$(document).ready(function () {
    $(document).on('click', '.file-delete', function () {
        var fileBlock = $(this).closest('.file-block');
        var filePath = fileBlock.find('input[name="resources_file[]"]').val();
        if (filePath) {
            deleteFile(filePath);
        }
        fileBlock.remove();
    });
});
// delete file via AJAX
function deleteFile(filePath) {
    const post_url = '{{ route('delete-property-gallery') }}';
    $.ajax({
        url: post_url,  // Ensure the correct route for this action
        method: 'POST',
        data: {
            _token: '{{ csrf_token() }}',
            file_path: filePath
        },
        success: function(response) {
            if (response.success) {
                alert(response.message);
            } else {
                alert(response.message);
            }
        },
        error: function(error) {
            console.error('Error:', error);
        }
    });
}

</script>
<script>
$('#sectionChooser').change(function(){
    var myID = $(this).val();
    $('.panelss').each(function(){
        myID === $(this).attr('id') ? $(this).show() : $(this).hide();
    });
});
</script>

<script>
    function setNoOfParking(parkingOption) {
        const noOfParkingSelect = document.getElementById('no_of_parking');
        if (parkingOption === 'Yes') {
            noOfParkingSelect.removeAttribute('disabled'); // Enable the dropdown
        } else {
            noOfParkingSelect.setAttribute('disabled', 'true'); // Disable the dropdown
            noOfParkingSelect.value = ''; // Reset the selection
        }
    }
    function setOption(cat, callback = null) {

        if (cat == 'Residentail') {
            var newOptions = {
                "Flat/Apartment": "Flat/Apartment",
                "Duplex": "Duplex",
                "Villas": "Villas",
                "Plot(Approved)": "Plot(Approved)",
                "Plot(Unapproved)": "Plot(Unapproved)",
                "Other": "Other"
            };
        } else if (cat == 'Commercial') {
            var newOptions = {
                "Retail/Shops": "Retail/Shops",
                "Office Space": "Office Space",
                "Studio Apartment": "Studio Apartment",
                "Food Court": "Food Court",
                "Virtual Space": "Virtual Space",
                "Other": "Other"
            };
        } else if (cat == 'Agriculture') {
            var newOptions = {
                "Agriculture": "Agriculture"
            };
        } else {
            var newOptions = {
                "Industrial": "Industrial"
            };
        }


        var $el = $("#pcategorytype");
        $el.empty(); // remove old options
        $.each(newOptions, function(key, value) {
            $el.append($("<option></option>")
                .attr("value", value).text(key));
        });

        if (callback) {
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

    function copyPropertyAddress() {
        var add1 = $('#cp-unit_number').val();
        var add2 = $('#cp-tower_number').val();
        var add3 = $('#cp-project_name').val();
        var add4 = $('#cp-building_name').val();


        var add5 = $('#cp-address').val();
        var add6 = $('#cp-city option:selected').text();
        var add7 = $('#cp-state option:selected').text();
        var add8 = $("#cp-country option:selected").text();


        var add9 = $('#cp-zip').val();

        $('#hiddenaddress').html('Unit No.: ' + add1 + '</br> Tower No.: ' + add2 + '</br> Project Name: ' + add3 + '</br> Building Name: ' + add4 + '</br> Street Address: ' + add5 + '</br> City: ' + add6 + '</br> State: ' + add7 + '</br> Country: ' + add8 + '</br> ZipCode: ' + add9);


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
            $("#filesList > #files-names1").append(fileBloc);
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
    $("#v_attachment").on('change', function(e) {
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
        $("#filesList > #files-names2").append(fileBloc);
    }

    // Create a DataTransfer object to manage the selected files
    let dt = new DataTransfer();
    for (let file of this.files) {
        dt.items.add(file);
    }

    // Update the files of the input after adding files to the DataTransfer object
    this.files = dt.files;

    // EventListener for the delete button
    $('span.file-delete').click(function() {
        let name = $(this).next('span.name').text();
        // Remove the file display block
        $(this).parent().remove();

        // Remove the file from the DataTransfer object
        for (let i = 0; i < dt.items.length; i++) {
            if (name === dt.items[i].getAsFile().name) {
                dt.items.remove(i);
                continue;
            }
        }

        // Update the files in the input after removal
        document.getElementById('v_attachment').files = dt.files;
    });
});
$("#file_input").on('change', function(e) {
    let dt = new DataTransfer();  // Create a DataTransfer object to manage the selected files

    for (var i = 0; i < this.files.length; i++) {
        let fileBloc = $('<span/>', {
                class: 'file-block'
            }),
            fileName = $('<span/>', {
                class: 'name',
                text: this.files.item(i).name
            });

        // Create a delete button for each file
        fileBloc.append('<span class="file-delete"><span>+</span></span>')
            .append(fileName);
        $("#filesList > #files-names3").append(fileBloc);

        // Add the files to the DataTransfer object
        dt.items.add(this.files.item(i));
    }

    // Update the input file with the new files
    this.files = dt.files;

    // EventListener for the delete button
    $('span.file-delete').click(function() {
        let name = $(this).next('span.name').text();
        // Remove the file display block
        $(this).parent().remove();

        // Remove the file from the DataTransfer object
        for (let i = 0; i < dt.items.length; i++) {
            if (name === dt.items[i].getAsFile().name) {
                dt.items.remove(i);
                continue;
            }
        }

        // Update the files in the input after removal
        document.getElementById('file_input').files = dt.files;
    });
});



    function getState(id, callback = null) {
        var URL = '{{url("get-state-by-country")}}/' + id;
        $.ajax({
            url: URL,
            type: "GET",
            success: function(response) {
                $('#cp-state').html(response);
                if (callback) {
                    callback();
                }
            },
            error: function(error) {
                console.log(error);
            }
        });
    }

    function getCity(id, callback = null) {
        var URL = '{{url("get-city-by-state")}}/' + id;
        $.ajax({
            url: URL,
            type: "GET",
            success: function(response) {
                $('#cp-city').html(response);
                if (callback) {
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
        // if not editing property then get selected country from local storage
        let selectedCountry = '<?= $country ?>' || localStorage.getItem('selectedCountry');
        // alert(selectedCountry);
        
        // if no selected country data return function
        if (!selectedCountry) return;
        
        let element = document.getElementById('cp-country');
        element.value = selectedCountry;
        getState(selectedCountry, function() {
            selectState();
        });
    }

    function selectState() {
        // if not editing property then get selected state from local storage
        let selectedState = '<?= $state ?>' || localStorage.getItem('selectedState');
        
        // if no selected state data return function
        if (!selectedState) return;
        
        let element = document.getElementById('cp-state');
        element.value = selectedState;
        getCity(selectedState, function() {
            selectCity();
        });
    }

    function selectCity() {
        // if not editing property then get selected city from local storage
        let selectedCity = '<?= $city ?>' || localStorage.getItem('selectedCity');
        
        // if no selected city data return function
        if (!selectedCity) return;
        
        let element = document.getElementById('cp-city');
        element.value = selectedCity;
    }

    // Call on page load
    $(document).ready(function () {
        // functions calls one after the other
        selectCountry();
    });

    // description dynamic selection
    function selectCategory() {
        let element = document.getElementById('pcategory');
        element.value = '<?= isset($PropertyDescription->desc_category) ? $PropertyDescription->desc_category : '' ?>';
        setOption('<?= isset($PropertyDescription->desc_category) ? $PropertyDescription->desc_category : '' ?>', function() {
            selectElement('pcategorytype', '<?= isset($PropertyDescription->desc_category_type) ? $PropertyDescription->desc_category_type : '' ?>');
        });
    }

    function selectElement(id, valueToSelect) {
        let element = document.getElementById(id);
        element.value = valueToSelect;
    }

    selectCategory();
    selectElement('ptype', '<?= isset($PropertyDescription->desc_type) ? $PropertyDescription->desc_type : '' ?>');
    selectElement('parking', '<?= isset($PropertyDescription->desc_parking) ? $PropertyDescription->desc_parking : '' ?>');
    selectElement('psizetype', '<?= isset($PropertyDescription->desc_lot_type) ? $PropertyDescription->desc_lot_type : '' ?>');
    selectElement('pstatus', '<?= isset($PropertyDescription->desc_status) ? $PropertyDescription->desc_status : '' ?>');
    selectElement('ptransactiontype', '<?= isset($PropertyDescription->desc_transaction) ? $PropertyDescription->desc_transaction : '' ?>');
</script>
<script>
    $('#cp-country').on('change', function () {
        localStorage.setItem('selectedCountry', this.value);
    });
    
    $('#cp-state').on('change', function () {
        localStorage.setItem('selectedState', this.value);
    });
    
    $('#cp-city').on('change', function () {
        localStorage.setItem('selectedCity', this.value);
    });
    
    function copyTextFromHiddenDiv(elementId) {
        var temp = $("<textarea>");
        $("body").append(temp);
        temp.val($('#' + elementId).html().replace(/<br\s*\/?>/gm, '\n')).select();
        document.execCommand("copy");
        temp.remove();
    }

    function copyPropertyDescription() {
        const getVal = (id) => $.trim($(`#${id}`).val());
        const getText = (id) => $.trim($(`#${id} option:selected`).text());
    
        const category = getText('pcategory');
        const type = getText('pcategorytype');
        const parking = getText('parking');
        const noOfParking = getText('no_of_parking');
        const lotSize = getVal('lot');
        const lotType = getText('psizetype');
        const unitType = getText('ptype');
        const status = getText('pstatus');
        const bedrooms = getText('bedrooms');
        const bathrooms = getText('bathrooms');
        const year = getVal('year');
        const transaction = getText('ptransactiontype');
    
        let desc = '';
    
        if (category) desc += `Category: ${category}\n`;
        if (type) desc += `Type: ${type}\n`;
        if (parking) desc += `Parking: ${parking}\n`;
        if (noOfParking && parking === 'Yes') desc += `No. of Parking: ${noOfParking}\n`;
        if (lotSize) desc += `Size: ${lotSize} ${lotType || ''}\n`;
        if (unitType) desc += `Units Type: ${unitType}\n`;
        if (status) desc += `Status: ${status}\n`;
        if (bedrooms) desc += `No. of Bedrooms: ${bedrooms}\n`;
        if (bathrooms) desc += `No. of Bathrooms: ${bathrooms}\n`;
        if (year) desc += `Year Built: ${year}\n`;
        if (transaction) desc += `Transaction Type: ${transaction}`;
    
        // Remove extra whitespace and copy
        $('#hiddenDescription').html(desc.trim().replace(/\n/g, '<br>'));
        
        copyTextFromHiddenDiv('hiddenDescription');
    
        $('#desc-copy-msg').html('Copied Description!');
        setTimeout(() => {
            $('#desc-copy-msg').html('Copy Description');
        }, 3000);
    }
</script>
<script>
function disableOptionsIndusAgri(value) {
    const disabledCategories = ['Industrial', 'Agriculture'];

    const shouldDisable = disabledCategories.includes(value);

    const fieldsToDisable = [
        'parking',
        'no_of_parking',
        'ptype',
        'bedrooms',
        'bathrooms'
    ];

    fieldsToDisable.forEach(function(fieldId) {
        const field = document.getElementById(fieldId);
        if (field) {
            field.disabled = shouldDisable;

            // Reset field value if disabling
            if (shouldDisable) {
                if (field.tagName === 'SELECT') {
                    field.selectedIndex = 0;
                } else {
                    field.value = '';
                }
            }
        }
    });

    // Optionally: handle no_of_parking field based on parking selection
    if (!shouldDisable) {
        const parkingField = document.getElementById('parking');
        if (parkingField.value === 'Yes') {
            document.getElementById('no_of_parking').disabled = false;
        }
    }
}

// Keep parking logic intact
function setNoOfParking(value) {
    const noOfParkingField = document.getElementById('no_of_parking');
    noOfParkingField.disabled = (value !== 'Yes');
    if (value !== 'Yes') {
        noOfParkingField.selectedIndex = 0;
    }
}

// Optional: Initialize on page load
window.onload = function() {
    const categoryField = document.getElementById('pcategory');
    if (categoryField) {
        disableOptionsIndusAgri(categoryField.value);
    }

    const parkingField = document.getElementById('parking');
    if (parkingField) {
        setNoOfParking(parkingField.value);
    }
};
</script>