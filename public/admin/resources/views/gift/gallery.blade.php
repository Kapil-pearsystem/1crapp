@extends('layouts.app')
@section('title','Gift Group')
@section('content')
<?php
    use Illuminate\Support\Str;
    $cart_ct = 0;
    $tyc_id = '';
    $collection_id = '';
    $s_mail_ids = array();
    $s_gift_ids = array();
    if(isset($collection) && !empty($collection->mail_ids)){
        $s_mail_ids = explode(',',$collection->mail_ids);
        $cart_ct += count($s_mail_ids);

    }
    if(isset($collection) && !empty($collection->gift_ids)){
        $s_gift_ids = explode(',',$collection->gift_ids);
        $cart_ct += count($s_gift_ids);

    }
    if(isset($collection) && !empty($collection->id)){
        $collection_id = $collection->id;
        $tyc_id = $collection->tyc_id;

    }
?>
<div class="slider-modal" id="al_supportss">
  <div class="close-icon modal-close"></div>
  <h5 class="title">&nbsp;</h5>
  <div class="slides" id="slider_data">
    <div class="nav-arrow left"></div>
    <div class="nav-arrow right"></div>
    <!-- <div class="slide active" title="Image 1" style="background-image: url('https://unsplash.it/601/502')"> </div>
    <div class="slide" title="Image 2" style="background-image: url('https://unsplash.it/600/502')"> </div>
    <div class="slide" title="Image 3" style="background-image: url('https://unsplash.it/601/504')"> </div>
    <div class="slide" title="Image 4" style="background-image: url('https://unsplash.it/601/503')"> </div>
    <div class="slide" title="Image 5" style="background-image: url('https://unsplash.it/601/506')"> </div> -->
  </div>
</div>

<div class="container-fluid">
    <!-- Page Heading -->

    <div class="d-sm-flex align-items-center justify-content-between mb-4">

        <h1 class="h3 mb-0 text-gray-800"> Gift Group</h1>

        <a href="{{ route('gift.category-list') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-arrow-left fa-sm text-white-50"></i> Back</a>

    </div>



    @include('common.alert')



    <!-- DataTales Example -->

    <div id="stap_fildess">
    <div class="multisteps-form">
            <!--progress bar-->
            <div class="row">
                <div class="col-12 col-lg-12 ml-auto mr-auto mb-4">
                    <div class="multisteps-form__progress">
                        <button class="multisteps-form__progress-btn js-active" type="button" title="Select Gifts">Select Gifts <span class="cnt_numbbers">1</span></button>
                        <button class="multisteps-form__progress-btn" type="button" title="Than You Note">Than You Note <span class="cnt_numbbers">2</span></button>
                        <button class="multisteps-form__progress-btn" type="button" title="Edit Cart">Edit Cart <span class="cnt_numbbers">3</span></button>
                        <button class="multisteps-form__progress-btn" type="button" title="Make Payment">Summary <span class="cnt_numbbers">4</span></button>
                    </div>
                </div>
            </div>
            <!--form panels-->
            <div class="row">
                <div class="col-12 col-lg-12 m-auto">
                    <form class="multisteps-form__form" action="{{ route('gift.save-gift-collection') }}" method="post">
                        @csrf
                        <input type="hidden" name="collection_id" value="{{ $collection_id }}">
                        <!-- ONE STEP -->
                        <div class="multisteps-form__panel shadow p-4 rounded bg-white js-active" data-animation="scaleIn">
                            <div class="multisteps-form__content">
                                <div class="plp_slt_readlt">
                                    <div class="stp_contetnt" id="tsts_mlts">
                                        <!--- Mobile View Filtter ---->
                                        <div id="flt_mblss">
                                            <div class="filletrr fitter">
                                                <a href="javascript:void(0);">Filter <i class="fa fa-bars"></i></a>
                                            </div>

                                            <div class="it_emms sort_lisrtst show_data">
                                                <ul>
                                                    <li>
                                                        <span class="titalss">Short By</span>
                                                    </li>
                                                    <li>
                                                        <select class="al_slt_partss">
                                                            <option>Category</option>
                                                        </select>
                                                    </li>
                                                    <li>
                                                        <select class="al_slt_partss">
                                                            <option>Availability</option>
                                                        </select>
                                                    </li>
                                                    <li>
                                                        <select class="al_slt_partss">
                                                            <option>Discount</option>
                                                        </select>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <!--- Mobile View Filtter ---->

                                        <div class="row">
                                            <div class="col-lg-8 col-4">
                                                <div class="it_emms sort_lisrtst mb_view_none">
                                                    <ul>
                                                        <li>
                                                            <span class="titalss">Short By</span>
                                                        </li>
                                                        <li>
                                                            <select class="al_slt_partss filter_class"  id="category_id" >
                                                                <option  value="">Category</option>
                                                                @foreach($gift_category as $category)
                                                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </li>
                                                        <li>
                                                            <select class="al_slt_partss filter_class" id="availability_id">
                                                                <option value="">Availability</option>
                                                                <option value="available">Yes</option>
                                                                <option value="sold out">No</option>
                                                            </select>
                                                        </li>
                                                        <li>
                                                            <select class="al_slt_partss filter_class" id="discount_id">
                                                                <option  value="">Discount</option>
                                                                @foreach($gift_discount as $discount)
                                                                    <option value="{{ $discount }}">{{ $discount }}%</option>
                                                                @endforeach
                                                            </select>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>

                                            <div class="col-lg-4 col-8">
                                                <div class="hd_listst">
                                                    <span class="srcc_barsss">Search: <input type="text" class="sr_tabds" placeholder="Enter text" id="search_box"/></span>
                                                    <span class="cartss"><i class="fa fa-shopping-cart"></i> <span class="countss" id="selected_gift">{{ $cart_ct?$cart_ct:0 }}</span></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mt-3">
                                        <div class="mt-4" id="tsts_mlts">
                                            <div class="qu_bx_partss">
                                            <div class="row" id="mail-items">
                                                    <!--- Item List --->

                                                    @foreach($mails as $key=>$mail)
                                                        <div class="col-lg-4">
                                                            <div class="it_emms">
                                                                <div class="ribbon-wrap">
                                                                    <div class="ribbon">Available</div>
                                                                </div>
                                                                <input type="checkbox" class="ck_bx_box gift_mail_ids" id="ck_{{$key}}"  name="mail_id[]" value="{{ $mail->id }}" @if(in_array($mail->id, $s_mail_ids)) checked @endif/>
                                                                <label for="ck_{{$key}}"></label>
                                                                <div class="usr_mgss othr_gf"><img src="{{url('uploads')}}/gift/1729910772_mail-thumbnail.png" /></div>
                                                                <h3>{{ $mail->subject }}</h3>
                                                                {!! Str::words($mail->content, 30)  !!}
                                                                <p class="mb-2"><span class="red_tx cut_pricess">Rs.199</span> FREE </p>
                                                                <p class="mb-3 blues_tx"><strong>For Very Limited Time</strong></p>
                                                                <!-- <div class="snd_btnns"><a href="javascript:void(0);" class="click_m">View Gallery & Video</a></div> -->
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                    <!--- End Item List --->


                                                </div>
                                                <div class="row" id="gift-items">
                                                    <!--- Item List --->
                                                    <!-- <div class="col-lg-4">
                                                        <div class="it_emms">
                                                            <div class="ribbon-wrap">
                                                                <div class="ribbon bg_red">Sold Out</div>
                                                            </div>
                                                            <input type="checkbox" class="ck_bx_box" id="ck_1" name="" />
                                                            <label for="ck_1"></label>
                                                            <div class="usr_mgss othr_gf"><img src="{{url('admin')}}/img/user_testi.jpg" /></div>
                                                            <h3>Gift Name / Titile</h3>
                                                            <p class="add-read-more show-less-content">
                                                                As there are many languages in the World, you can choose from a variety of base texts so you cover not only normal letters but also accents.
                                                            </p>
                                                            <p class="mb-2"><span class="red_tx cut_pricess">Rs.299</span> Rs.199 <span class="red_tx">(Save Rs. 100/)</span></p>
                                                            <p class="mb-3 blues_tx"><strong>For Very Limited Time</strong></p>
                                                            <div class="snd_btnns"><a href="javascript:void(0);" class="click_m">View Gallery & Video</a></div>
                                                        </div>
                                                    </div> -->
                                                    <!--- End Item List --->


                                                </div>

                                                <div class="paginettoin">
                                                    <ul>
                                                        <li><a href="javascript:void(0);" class="load_more">Load More</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="button-row d-flex mt-4">
                                    <button class="btn btn-primary ml-auto js-btn-next first_step" type="button" title="Next">Next</button>
                                </div>
                            </div>
                        </div>
                        <!-- End ONE STEP -->

                        <!-- SECEND STEP -->
                        <div class="multisteps-form__panel shadow p-4 rounded bg-white" data-animation="scaleIn">
                            <div class="multisteps-form__content">
                                <div class="qu_bx_partss p-4 pageform_t" id="stapone">
                                    <div class="titalsss">
                                        <h3>Watch This Video Before Go to next Step</h3>
                                        <div class="aroo_parts">
                                            <span class="down_aroo"><i class="fa fa-long-arrow-down"></i></span>
                                            <span class="down_aroo"><i class="fa fa-long-arrow-down"></i></span>
                                            <span class="down_aroo"><i class="fa fa-long-arrow-down"></i></span>
                                        </div>
                                    </div>

                                    <div class="you_tb_arra">
                                        <iframe
                                            width="100%"
                                            height="350"
                                            src="https://www.youtube.com/embed/Bw-HJ-SUfUs?si=3Pz5abevP5nb7UmH"
                                            title="YouTube video player"
                                            frameborder="0"
                                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                            referrerpolicy="strict-origin-when-cross-origin"
                                            allowfullscreen=""
                                        ></iframe>
                                    </div>

                                    <div class="clk_btnns_plp">
                                        <a href="javascript:void(0);" onclick="openstapone1()">
                                            Yes. Please Add the Thank You Card With Gifts.
                                            <i class="fa fa-chevron-circle-right"></i>
                                        </a>
                                        <span class="nxt_stapss js-btn-next">No, i don't want to send a thank you letter with the gifts.</span>
                                    </div>
                                </div>

                                <div class="pageform_t" id="stapone1" style="display: none;">
                                    <div class="stp_contetnt" id="tsts_mlts">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="hd_listst">
                                                    Add Personal Thanks You Letter <span class="cartss"><i class="fa fa-shopping-cart"></i> <span class="countss">1</span></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div id="tsts_mlts">
                                        <div class="qu_bx_partss">
                                            <div class="al_text_box">
                                                <div class="ad_personnals">
                                                    <div class="owl-carousel owl-theme" id="testimonials">

                                                        @foreach($thankyou_card as $card)
                                                        <div class="item">
                                                            <div class="it_emms giftts" id="bx1">
                                                                <!---- Tages ---->
                                                                <div class="ribbon-wrap">
                                                                    <div class="ribbon">Available</div>
                                                                </div>
                                                                <!---- End Tages ---->
                                                                <div class="boths_gfts">
                                                                    <div class="giftss"><img src="{{url('admin')}}/img/gift_crd.png" alt="" /></div>
                                                                    <div id="tsts_mlts" class="gf_listst">
																	 <div class="radio">
                                                                        <input id="thank_you_card" name="thank_you_card" value="{{ $card->id }}" type="radio" @if($tyc_id == $card->id) checked @endif/>
                                                                     </div>
                                                                    </div>


                                                                    <div class="qerrst"><img src="{{url('admin')}}/img/b_qr_pay_1cr.png" alt="" /></div>
                                                                </div>
                                                                <div class="thk_arara">
                                                                    <h2>Thanks You</h2>
                                                                    <p class="grenss_tx">XXXXXX (Name)</p>
                                                                </div>
                                                                <p> {{ Str::words($card->description, 20) }}</p>

                                                                <div class="usr_mgss"><img src="{{url('admin')}}/img/user_testi.jpg" /></div>
                                                                <h5>Thanks You</h5>
                                                                <h3>Mr. Amit Kumar Yadav</h3>
                                                                <p class="blues_tx mb-0"><strong>www.ramjeemena.com</strong></p>
                                                                <p class="red_tx mb-3"><strong>Ramjee Enterprises</strong></p>

                                                                <div class="w_numbber">
                                                                    <a target="_blank" href="https://api.whatsapp.com/send/?phone=%2B911234567890&amp;text=Hi&amp;app_absent=0"> <i class="fa fa-whatsapp"></i> +91 1234 5678 90</a>
                                                                </div>

                                                                <div class="pric_txtx">Rs.{{ $card->price }}/Peice</div>
                                                            </div>
                                                        </div>
                                                        @endforeach
                                                       {{-- <div class="item">
                                                            <div class="it_emms giftts" id="bx2">
                                                                <!---- Tages ---->
                                                                <div class="ribbon-wrap">
                                                                    <div class="ribbon bg_red">Sold Out</div>
                                                                </div>
                                                                <!---- End Tages ---->
                                                                <div class="boths_gfts">
                                                                    <div class="giftss"><img src="{{url('admin')}}/img/gift_crd.png" alt="" /></div>
                                                                    <div id="tsts_mlts" class="gf_listst">
                                                                        <div class="radio">
                                                                            <input id="radio-2" name="radio" type="radio">
                                                                        </div>
                                                                    </div>
                                                                    <div class="qerrst"><img src="{{url('admin')}}/img/b_qr_pay_1cr.png" alt="" /></div>
                                                                </div>
                                                                <div class="thk_arara">
                                                                    <h2>Thanks You</h2>
                                                                    <p class="grenss_tx">XXXXXX (Name)</p>
                                                                </div>
                                                                <p>
                                                                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown
                                                                    printer took a galley of type and scrambled it to make a type specimen book.
                                                                </p>

                                                                <div class="usr_mgss"><img src="{{url('admin')}}/img/user_testi.jpg" /></div>
                                                                <h5>Thanks You</h5>
                                                                <h3>Mr. Amit Kumar Yadav</h3>
                                                                <p class="blues_tx mb-0"><strong>www.ramjeemena.com</strong></p>
                                                                <p class="red_tx mb-3"><strong>Ramjee Enterprises</strong></p>

                                                                <div class="w_numbber">
                                                                    <a target="_blank" href="https://api.whatsapp.com/send/?phone=%2B911234567890&amp;text=Hi&amp;app_absent=0"> <i class="fa fa-whatsapp"></i> +91 1234 5678 90</a>
                                                                </div>

                                                                <div class="pric_txtx">Rs.10/Peice</div>
                                                            </div>
                                                        </div>

                                                        <div class="item">
                                                            <div class="it_emms giftts" id="bx3">
                                                                <!---- Tages ---->
                                                                <div class="ribbon-wrap">
                                                                    <div class="ribbon">Available</div>
                                                                </div>
                                                                <!---- End Tages ---->
                                                                <div class="boths_gfts">
                                                                    <div class="giftss"><img src="{{url('admin')}}/img/gift_crd.png" alt="" /></div>
                                                                    <div id="tsts_mlts" class="gf_listst">
                                                                        <div class="radio">
                                                                             <input id="radio-3" name="radio" type="radio">
                                                                        </div>
                                                                    </div>
                                                                    <div class="qerrst"><img src="{{url('admin')}}/img/b_qr_pay_1cr.png" alt="" /></div>
                                                                </div>
                                                                <div class="thk_arara">
                                                                    <h2>Thanks You</h2>
                                                                    <p class="grenss_tx">XXXXXX (Name)</p>
                                                                </div>
                                                                <p>
                                                                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown
                                                                    printer took a galley of type and scrambled it to make a type specimen book.
                                                                </p>

                                                                <div class="usr_mgss"><img src="{{url('admin')}}/img/user_testi.jpg" /></div>
                                                                <h5>Thanks You</h5>
                                                                <h3>Mr. Amit Kumar Yadav</h3>
                                                                <p class="blues_tx mb-0"><strong>www.ramjeemena.com</strong></p>
                                                                <p class="red_tx mb-3"><strong>Ramjee Enterprises</strong></p>

                                                                <div class="w_numbber">
                                                                    <a target="_blank" href="https://api.whatsapp.com/send/?phone=%2B911234567890&amp;text=Hi&amp;app_absent=0"> <i class="fa fa-whatsapp"></i> +91 1234 5678 90</a>
                                                                </div>

                                                                <div class="pric_txtx">Rs.10/Peice</div>
                                                            </div>
                                                        </div>

                                                        <div class="item">
                                                            <div class="it_emms giftts" id="bx4">
                                                                <!---- Tages ---->
                                                                <div class="ribbon-wrap">
                                                                    <div class="ribbon">Available</div>
                                                                </div>
                                                                <!---- End Tages ---->
                                                                <div class="boths_gfts">
                                                                    <div class="giftss"><img src="{{url('admin')}}/img/gift_crd.png" alt="" /></div>
                                                                    <div id="tsts_mlts" class="gf_listst">
                                                                        <div class="radio">
                                                                             <input id="radio-4" name="radio" type="radio">
                                                                        </div>
                                                                    </div>
                                                                    <div class="qerrst"><img src="{{url('admin')}}/img/b_qr_pay_1cr.png" alt="" /></div>
                                                                </div>
                                                                <div class="thk_arara">
                                                                    <h2>Thanks You</h2>
                                                                    <p class="grenss_tx">XXXXXX (Name)</p>
                                                                </div>
                                                                <p>
                                                                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown
                                                                    printer took a galley of type and scrambled it to make a type specimen book.
                                                                </p>

                                                                <div class="usr_mgss"><img src="{{url('admin')}}/img/user_testi.jpg" /></div>
                                                                <h5>Thanks You</h5>
                                                                <h3>Mr. Amit Kumar Yadav</h3>
                                                                <p class="blues_tx mb-0"><strong>www.ramjeemena.com</strong></p>
                                                                <p class="red_tx mb-3"><strong>Ramjee Enterprises</strong></p>

                                                                <div class="w_numbber">
                                                                    <a target="_blank" href="https://api.whatsapp.com/send/?phone=%2B911234567890&amp;text=Hi&amp;app_absent=0"> <i class="fa fa-whatsapp"></i> +91 1234 5678 90</a>
                                                                </div>

                                                                <div class="pric_txtx">Rs.10/Peice</div>
                                                            </div>
                                                        </div>

                                                        <div class="item">
                                                            <div class="it_emms giftts" id="bx5">
                                                                <!---- Tages ---->
                                                                <div class="ribbon-wrap">
                                                                    <div class="ribbon">Available</div>
                                                                </div>
                                                                <!---- End Tages ---->
                                                                <div class="boths_gfts">
                                                                    <div class="giftss"><img src="{{url('admin')}}/img/gift_crd.png" alt="" /></div>
                                                                    <div id="radio" class="gf_listst">
                                                                        <input id="radio-5" name="radio" type="radio">
                                                                    </div>
                                                                    <div class="qerrst"><img src="{{url('admin')}}/img/b_qr_pay_1cr.png" alt="" /></div>
                                                                </div>
                                                                <div class="thk_arara">
                                                                    <h2>Thanks You</h2>
                                                                    <p class="grenss_tx">XXXXXX (Name)</p>
                                                                </div>
                                                                <p>
                                                                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown
                                                                    printer took a galley of type and scrambled it to make a type specimen book.
                                                                </p>

                                                                <div class="usr_mgss"><img src="{{url('admin')}}/img/user_testi.jpg" /></div>
                                                                <h5>Thanks You</h5>
                                                                <h3>Mr. Amit Kumar Yadav</h3>
                                                                <p class="blues_tx mb-0"><strong>www.ramjeemena.com</strong></p>
                                                                <p class="red_tx mb-3"><strong>Ramjee Enterprises</strong></p>

                                                                <div class="w_numbber">
                                                                    <a target="_blank" href="https://api.whatsapp.com/send/?phone=%2B911234567890&amp;text=Hi&amp;app_absent=0"> <i class="fa fa-whatsapp"></i> +91 1234 5678 90</a>
                                                                </div>

                                                                <div class="pric_txtx">Rs.10/Peice</div>
                                                            </div>
                                                        </div> --}}

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="button-row d-flex mt-4">
                                        <button class="btn btn-primary js-btn-prev" type="button" title="Prev">Prev</button>
                                        <button class="third_step btn btn-primary ml-auto js-btn-next "  type="button" title="Next">Next</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End SECEND STEP -->

                        <!-- Thards -->
                        <div class="multisteps-form__panel shadow p-4 rounded bg-white" data-animation="scaleIn">
                            <div class="multisteps-form__content">
                                <div class="qu_bx_partss">
                                    <div class="table-responsive">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>S.No.</th>
                                                    <th>Gift Items <span class="ques_top" data-toggle="tooltip" data-placement="right" title="Hooray!">?</span></th>
                                                    <th>Price</th>
                                                    <th>TYC Item <span class="ques_top" data-toggle="tooltip" data-placement="right" title="Hooray!">?</span></th>
                                                    <th>Price</th>
                                                    <th>Delivery Schedule <span class="ques_top" data-toggle="tooltip" data-placement="right" title="Hooray!">?</span></th>
                                                </tr>
                                            </thead>
                                            <tbody id="selected_gift_list">
                                                <!---- Table List ---->

                                                <!---- End Table List ---->
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="button-row d-flex mt-4 col-12">
                                        <button class="btn btn-primary js-btn-prev" type="button" title="Prev">Prev</button>
                                        <button class="fourth_step btn btn-primary ml-auto js-btn-next" type="button" title="Next">Next</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Thards -->

                        <div class="multisteps-form__panel shadow p-4 rounded bg-white" data-animation="scaleIn">
                            <div class="multisteps-form__content">
                                <div class="qu_bx_partss">
                                    <div class="table-responsive" id="gift_summary_id">

                                    </div>
                                </div>
                                <div class="row">
                                    <div class="button-row d-flex mt-4 col-12">
                                        <button class="btn btn-primary js-btn-prev" type="button" title="Prev">Prev</button>
                                        <button class="btn btn-primary ml-auto" type="submit" title="" id="formButton">Submit</button>
                                    </div>

									<div id="form1">
									  <a href="javascript:void(0);" class="pay_btnn">Pay Direct</a>
									  <a href="javascript:void(0);" class="pay_btnn">Pay From Wallet</a>
									</div>
								</div>
                            </div>
                        </div>
                        <!--single form panel-->

					</form>
                </div>
            </div>
    </div>
</div>
</div>
@endsection
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>



<script>
$(document).ready(function(){
    $("#formButton").click(function(){
        $("#form1").toggle(hide);
    });
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
var $el = $(".paynow");
var $ee = $(".pay_show_data");
$el.click(function(e){
  e.stopPropagation();
  $(".pay_show_data").toggleClass('active');
});
$(document).on('click',function(e){
  if(($(e.target) != $el) && ($ee.hasClass('active'))){
  $ee.removeClass('active');
  // console.log("yes");
}
});
</script>
<script>

$(document).on('click', '.load_more', function() {
    let total_gift = $('#total_gift').val(); // Track the current number of loaded items
    let page = $(this).data('page') || 1; // Track the page being loaded
    get_gift_item(total_gift, page); // Pass total gifts and current page number
});

function get_gift_item(total_gift = 1, page = 1){
    let category_id = $('#category_id').val();
    let collection_id = '{{ $collection_id }}';
    let availability_id = $('#availability_id').val();
    let discount_id = $('#discount_id').val();
    let search = $('#search_box').val();

    $.ajax({
        url: '{{ route('gift.gallery-items') }}',
        type: 'POST',
        data: {
            _token: '{{ csrf_token() }}',
            collection_id: collection_id,
            category_id: category_id,
            availability_id: availability_id,
            discount_id: discount_id,
            total_gift: total_gift,
            search: search,
            page: page, // Send the current page number
        },
        success: function (response) {
            if(response.status == true){
                $('#gift-items').append(response.data); // Append new items instead of replacing
                $('#total_gift').val(parseInt(total_gift) + 6); // Increment total_gift
                if (response.limit > total_gift) {
                    $('.load_more').show();
                    $('.load_more').data('page', page + 1); // Update page number for next load
                } else {
                    $('.load_more').hide();
                }
            } else {
                let notfound = '<div class="col-lg-12"><div class="it_emms"><h3>No More Gift Items Found!</h3></div></div>';
                $('#gift-items').append(notfound);
                $('.load_more').hide();
            }
        },
        error: function (xhr) {
            alert('Something went wrong!');
        }
    });
}



    // Call get_gift_item() when the document is ready
    $(document).ready(function () {
        get_gift_item();
    });

    // When any checkbox with class 'ck_bx_box' changes, count checked boxes
    $(document).on('change', '.ck_bx_box', function() {
        countChecked();
    });

    // Count checked checkboxes
    function countChecked() {
        var checkedCount = document.querySelectorAll('.ck_bx_box:checked').length;
        $('#selected_gift').text(checkedCount);
    }

    // Trigger get_gift_item() when any filter changes (class 'filter_class')
    $(document).on('change', '.filter_class', function() {
        $('#gift-items').html('');
        get_gift_item();
    });
    // $(document).on('click', '.load_more', function() {
    //     let total_gift = $('#total_gift').val();
    //     let page = $(this).data('page') || 1;
    //     get_gift_item(total_gift, page);
    // });
</script>

<script>
    $(document).ready(function() {
        $('#search_box').on('keyup', function(event) {
            // alert('hello');
            //if (event.key === 'Enter') {
                var inputValue = $(this).val();
                // alert(inputValue);
                $('#gift-items').html('');
                get_gift_item();
            //}
        });
    });
</script>
<script>

    $(document).ready(function() {
    // When any checkbox is clicked, update the list of selected values
    $('.first_step').on('click', function() {
        getSelectedValues(); // Call function to get selected values
    });
    $('.third_step').on('click', function() {
        let sel_gift_id = getSelectedgifts();
        let collection_id = '{{ $collection_id }}';
        // console.log(sel_gift_id);
        let sel_mail_id = getSelectedMails();
        // alert(sel_mail_id);
        var sel_count = sel_gift_id.length;
        // var tyc_id = $('#thank_you_card').val();
        const tyc_id = document.querySelector('input[name="thank_you_card"]:checked')?.value;
        if(sel_count > 0){
            // alert(sel_count);
            $.ajax({
            url: '{{ route('gift.get-selected-gifts') }}',
            type: 'POST',
            data: {
                _token: '{{ csrf_token() }}',
                collection_id: collection_id,
                gift_ids: sel_gift_id.join(', '),
                mail_ids: sel_mail_id,
                tyc_id: tyc_id
            },
            success: function (response) {
                // console.log(response);
                if(response.status == true){
                    $('#selected_gift_list').html(response.data);
                } else {
                    let notfound = '<div class="col-lg-12"><div class="it_emms"><h3>No More Gift Items Found!</h3></div></div>';
                }
            },
            error: function (xhr) {
                alert('Something went wrong!');
            }
        });
        }
    });
    // Function to get all selected checkbox values
    function getSelectedValues() {
        var selectedValues = [];
        // Loop through all checkboxes and check if they are checked
        $('.ck_bx_box:checked').each(function() {
            selectedValues.push($(this).val()); // Add checked checkbox value to array
        });
        var selectedCount = selectedValues.length;
        if(selectedCount > 0){
            return selectedValues;
            // return selectedValues.join(', ');
        }
        console.log(selectedValues);
    }
    // selected gifts
    function getSelectedgifts() {
        var selectedValues = [];
        $('.gift_items_id:checked').each(function() {
            selectedValues.push($(this).val());
        });
        var selectedCount = selectedValues.length;
        console.log(selectedValues);
        if(selectedCount > 0){
            return selectedValues;
        }
        // console.log(selectedValues);
    }
    // selected mails
    function getSelectedMails() {
        var selectedValues = [];
        $('.gift_mail_ids:checked').each(function() {
            selectedValues.push($(this).val());
        });
        var selectedCount = selectedValues.length;
        if(selectedCount > 0){
            return selectedValues.join(', ');
        }else{
            return false;
        }
        // console.log(selectedValues);
    }


});

</script>
<script>
$(document).ready(function() {
    $('.fourth_step').on('click', function() {
        // Create arrays to hold the values
        const giftIds = [];
        const mailIds = [];
        const giftPriorities = [];
        const tycDesigns = [];
        const days = [];

        // Get all the hidden gift IDs
        $('input[name="gift_ids[]"]').each(function() {
            giftIds.push($(this).val());
        });
        $('input[name="mail_ids[]"]').each(function() {
            mailIds.push($(this).val());
        });

        // Get all the selected gift priorities
        $('select[name="priority[]"]').each(function() {
            giftPriorities.push($(this).val());
        });

        // Get all the selected TYC designs
        $('select[name="tyc_design[]"]').each(function() {
            tycDesigns.push($(this).val());
        });

        let thank_you_card = $('input[name="thank_you_card"]:checked').val();
        // alert(thank_you_card);
        // Get all the values of days
        $('input[name="days[]"]').each(function() {
            days.push($(this).val());
        });

        const collection_id = '{{ $collection_id }}';
        const gift_ids = giftIds.join(', ');
        const mail_ids = mailIds.join(', ');
        const priority = giftPriorities.join(', ');
        const template_id = tycDesigns.join(', ');
        const schedule_days = days.join(', ');
        $.ajax({
            url: '{{ route('gift.get-gift-summary') }}',
            type: 'POST',
            data: {
                _token: '{{ csrf_token() }}',
                collection_id: collection_id,
                gift_ids:gift_ids,
                mail_ids:mail_ids,
                priority:priority,
                template_id:template_id,
                schedule_days:schedule_days,
                thank_you_card:thank_you_card,
            },
            success: function (response) {
                if(response.status == true){
                    $('#gift_summary_id').html(response.data);
                } else {
                    let notfound = '<div class="col-lg-12"><div class="it_emms"><h3>No More Gift Items Found!</h3></div></div>';
                }
            },
            error: function (xhr) {
                alert('Something went wrong!');
            }
        });
        // Now you have arrays with all the collected values
        // console.log("Gift IDs: ", gift_ids);
        // console.log("Gift Priorities: ", priority);
        // console.log("TYC Designs: ", template_id);
        // console.log("Days: ", schedule_days);

        // You can proceed to process this data as needed (e.g., send via AJAX)
    });
});
</script>
<script>
    function show_gift_images(id){
    $.ajax({
        url: '{{ route('gift.show-gift-images') }}',
        type: 'POST',
        data: {
            _token: '{{ csrf_token() }}',
            id: id,
        },
        success: function (response) {
            if(response.status == true){
                $('#slider_data').html(response.data);
            } else {
                let notfound = '<div class="col-lg-12"><div class="it_emms"><h3>No More Gift Items Found!</h3></div></div>';
            }
        },
        error: function (xhr) {
            alert('Something went wrong!');
        }
    });
}

</script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('.addbtns_plss').forEach(function(wrapper) {
        const index = wrapper.getAttribute('data-index');

        const minusButton = wrapper.querySelector(`button[data-quantity="minus"][data-index="${index}"]`);
        const plusButton = wrapper.querySelector(`button[data-quantity="plus"][data-index="${index}"]`);
        const quantityField = wrapper.querySelector(`.quantity-field[data-index="${index}"]`);

        minusButton.addEventListener('click', function() {
            let currentValue = parseInt(quantityField.value) || 0;
            if (currentValue > 0) {
                quantityField.value = currentValue - 1;
            }
        });

        plusButton.addEventListener('click', function() {
            let currentValue = parseInt(quantityField.value) || 0;
            quantityField.value = currentValue + 1;
        });
    });
});

</script>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const minusButton = document.querySelector('button[data-quantity="minus"]');
        const plusButton = document.querySelector('button[data-quantity="plus"]');
        const quantityInput = document.querySelector('input[name="no_of_customers"]');


        minusButton.addEventListener("click", function() {
            const currentValue = parseInt(quantityInput.value) || 0;
            if (currentValue > 1) { // Set minimum limit
                quantityInput.value = currentValue - 1;
                alert(quantityInput.value);
            }
        });

        plusButton.addEventListener("click", function() {
            const currentValue = parseInt(quantityInput.value) || 0;
            quantityInput.value = currentValue + 1;
            alert(quantityInput.value);
        });
    });
</script>


