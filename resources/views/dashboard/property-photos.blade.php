@include('front.layouts.user-header')
<style>
.chk_list_araea .upload__img-wrap {display:inline-block; float:left; width:100%;}
.chk_list_araea .upload__img-box {width:32%; height:160px; padding:0;  margin:5px; overflow:hidden; background:#a5a5a5; border-radius:8px; float:left;}
.pur_rdo_listtss .chk_list_araea {padding:10px;}
.chk_list_araea .upload__img-box .img-bg {background-size: contain;}
.chk_list_araea .upload__img-wrap .upload__mgss {position: absolute; right: 41px; top: 6px; color: #fff; cursor: pointer; font-size: 22px;}
.chk_list_araea .upload__img-wrap .upload__mgss:hover {color: #a9e3ff;}
.chk_list_araea .upload__img-close:after {
    content: "✖";
    font-size: 14px;
    color: white;
}
</style>
<link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/@fancyapps/fancybox@3.5.6/dist/jquery.fancybox.min.css'>
<!--PEN HEADER-->
<div class="container mt-5">
    <div class="row mt-4">
        @include('front.layouts.detail-sidebar')
        <!--start full details -->
        <div class="col-12 col-sm-9">
            <div class="row">
                <div class="col-lg-12">
                    <div class="lsting_proprty purch_list_conts al_prt_biths" id="alss_pgesss">
                        <div class="prt_lft_araea">
                            <h3>Photos</h3>
                            <p class="brdsss"><a href="javascript:void(0);">Rentals</a> <span>/</span> <a href="javascript:void(0);">New Rental</a> <span>/</span> Photos</p>
                        </div>
                        <div class="prts_rt">
                            <div class="prp_bntsss">
                                <ul>
                                    <li>
                                        <a href="javascript:void(0);"><i class="fa fa-pencil"></i> Edit Photos </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);"><i class="fa fa-plus"></i> Add Photos </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <p class="viww">Upload interior or exterior photos, floor plans, marketing materials or other images.</p>
                    </div>
                    <div class="pur_rdo_listtss als_show_ar">
                        <div class="chk_list_araea">
                            <div class="upload__box">
                                <div class="upload__img-wrap">
								 <a href="https://1crapp.allproject.online/home/img/logo 1.png" data-fancybox="images">
								 <div class="upload__img-box"><div style="background-image: url('https://1crapp.allproject.online/home/img/logo 1.png'); background-size: contain;" data-number="0" data-file="about_sm_areaa.png" class="img-bg"><div class="upload__mgss"><i class="fa fa-star"></i></div><div class="upload__img-close"></div></div></div>
								 </a>
								
								</div>
								
								
								
								
                                <div class="upload__btn-box">
                                    <label class="upload__btn">
                                        <p><i class="fa fa-cloud-upload"></i></p>
                                        <p>Drop new photos here</p>
                                        <span>Or Click To Pick Manually</span> <input type="file" multiple="" data-max_length="20" class="upload__inputfile" />
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('front.layouts.footer')