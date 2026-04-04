@include('front.layouts.user-header')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

<style>
    .shadow.othr_pgss_lde .top_menuues {
        margin: 0;
        padding: 5px 5px;
        background: {{ $page->header_footer_bg_color?? '#000000' }};
    }
    .shadow.othr_pgss_lde .top_menuues .top_sec_menu.cnt_parts {
        margin: 0 0 0px;
        padding: 5px 0;
        float: right;
    }
    .shadow.othr_pgss_lde .top_menuues .top_sec_menu.cnt_parts ul li a {
        padding: 14px 10px;
        display: inline-block;
    }
    .shadow.othr_pgss_lde .top_menuues .top_sec_menu.cnt_parts li.callss {
        padding: 15px 10px;
    }
    .shadow.othr_pgss_lde .top_menuues .top_sec_menu.cnt_parts ul li a.gt_it_nnw {
        background: {{ !empty($page->button_bg_color) ? $page->button_bg_color : '#e82626' }};
        padding: 8px 20px;
        display: inline-block;
        border-radius: 100px;
        font-weight: 700;
        position: relative;
        top: 6px;
    }
    .you_tb_arra iframe {
        border-radius: 10px;
    }
    .new_ar_tring {
        text-align: center;
        display: inline-block;
        width: 100%;
    }
    .new_ar_tring h2 {
        font-size: 24px;
        margin: 0 0 14px;
        font-weight: 600;
    }
    .new_ar_tring h2.bnt_rundds {
        background: #f5cb8d;
        padding: 12px 25px;
        color: #000000;
        font-size: 13px;
        font-weight: 300;
        border-radius: 10px;
        display: inline-block;
    }
    .new_ar_tring h3 {
        margin: 10px 0 20px;
        font-size: 22px;
        font-weight: 700;
    }
    .new_ar_tring p {
        font-size: 14px;
        font-weight: 600;
        max-width: 700px;
        margin: 0 auto;
        width: 100%;
    }
    .v_part_liststs {
        display: inline-block;
        width: 100%;
    }
    .v_part_liststs ul {
        list-style: none;
        padding: 0;
        margin: 0;
    }
    .v_part_liststs ul li {
        margin-bottom: 12px;
        font-weight: 300;
        font-size: 12px;
        color: #000;
    }
    .v_part_liststs ul li i {
        color: {{ !empty($page->header_footer_bg_color) ? $page->header_footer_bg_color : '#000000' }};
        font-size: 18px;
        -webkit-text-stroke: 1px #ffffff;
    }
    .v_part_liststs ul li strong {
        font-weight: 600;
    }
    .you_tb_arra {
        height: 200px;
    }
    .v_part_liststs .bk_pert_sh {
        margin-top: 30px;
        padding: 15px;
        background: #fff;
        border: #f5bcbc dashed 1px;
        border-radius: 10px;
    }
    .v_part_liststs .bk_pert_sh p {
        text-align: center;
        color: #000;
        margin: 0 0 20px;
        font-size: 14px;
    }
    .v_part_liststs .bk_pert_sh a {
        background: #ff0000;
        display: block;
        text-align: center;
        color: #fff;
        padding: 15px 10px;
        border-radius: 5px;
    }
    .v_part_liststs .bk_pert_sh a h5 {
        margin: 0px 0 5px;
        font-size: 18px;
        font-weight: 700;
    }
    .v_part_liststs .bk_pert_sh a span {
        font-size: 12px;
    }
    .v_part_liststs .tx_v_ars {
        margin-top: 15px;
        text-align: center;
        font-size: 15px;
        font-weight: 600;
    }
    .what_tst .qu_bx_partss {
        background: #f9f9f9;
        padding: 0px 30px 30px;
        position: relative;
    }
    .what_tst #testimonials .owl-nav.disabled button.owl-prev {
        position: absolute;
        left: -30px;
        margin: 0;
    }
    .what_tst #testimonials .owl-nav.disabled button.owl-prev i {
        font-size: 35px;
        -webkit-text-stroke: 3px #f9f9f9;
    }
    .what_tst #testimonials .owl-nav.disabled button.owl-next {
        position: absolute;
        right: 30px;
        margin: 0;
    }
    .what_tst #testimonials .owl-nav.disabled button.owl-next i {
        font-size: 35px;
        -webkit-text-stroke: 3px #f9f9f9;
    }
    .what_tst .qu_bx_partss#testimonials .owl-nav button.owl-next {
        position: absolute;
        right: 27px;
        margin: 0;
    }
    .what_tst .qu_bx_partss#testimonials .owl-nav button.owl-prev i {
        font-size: 36px;
        -webkit-text-stroke: 5px #f9f9f9;
    }
    .what_tst .qu_bx_partss#testimonials .owl-nav button.owl-next i {
        font-size: 36px;
        -webkit-text-stroke: 5px #f9f9f9;
    }
    .wtch_txt {
        margin-bottom: 10px;
        font-size: 14px;
        font-weight: 700;
        color: #000000;
    }
    .ftr_new_other {
        background: #000;
    }
    .ftr_new_other {
        margin-top: 30px;
    }
    .ftr_new_other .ftr_content {
        background: {{ !empty($page->header_footer_bg_color) ? $page->header_footer_bg_color : '#000000' }};
        padding: 15px;
        text-align: center;
    }
    .ftr_new_other .ftr_content .lgo {
        margin-bottom: 25px;
    }
    .ftr_new_other .ftr_content .lgo a {
        display: inline-block;
    }
    .ftr_new_other .ftr_content .menu_ftrr {
        margin-bottom: 25px;
    }
    .ftr_new_other .ftr_content .menu_ftrr a {
        color: #fff;
        margin-right: 20px;
        font-size: 12px;
    }
    .ftr_new_other .ftr_content .menu_ftrr a:last-child {
        margin-right: 0px;
    }
    .ftr_new_other .ftr_content .crt_arar {
        color: {{ !empty($page->header_footer_text_color) ? $page->header_footer_text_color : '#ffffff' }};
        margin-top: 20px;
        display: inline-block;
        font-size: 12px;
    }
    .ftr_new_other .ftr_content .crt_arar img.logo {
        margin-right: 15px;
    }
    .mdl_mg_arar img {
        width: 100%;
        height: 100%;
        object-fit: contain;
    }
    .mdl_mg_arar {
        width: 100%;
        height: 378px;
        overflow: hidden;
        border-radius: 5px;
    }
    #sub_m_al_frms .modal-content.othr_ledss .modal-header {
        background: #fff;
        border: none;
    }
    #sub_m_al_frms .modal-content.othr_ledss .modal-header h4.modal-title {
        color: #ff0000;
    }
    #sub_m_al_frms .modal-content.othr_ledss .modal-header h4.modal-title {
        color: #ff0000;
        text-align: center;
        font-size: 22px;
        text-transform: capitalize;
    }
    #sub_m_al_frms .modal-content.othr_ledss .modal-body {
        padding-top: 0;
    }
    #sub_m_al_frms .modal-content.othr_ledss .modal-body p {
        text-align: center;
        font-size: 15px;
        margin-bottom: 15px;
    }
    .arow_downss {
        text-align: center;
        margin-top: 20px;
        display: inline-block;
        width: 100%;
    }
    .arow_downss span.ar_bntss {
        background: {{ !empty($page->header_footer_bg_color) ? $page->header_footer_bg_color : '#000000' }};
        width: 40px;
        display: inline-block;
        height: 40px;
        color: #fff;
        line-height: 40px;
        margin-right: 5px;
    }
    .arow_downss span.ar_bntss:last-child {
        margin-right: 0;
    }
    .arow_downss span.ar_bntss i {
        position: relative;
        top: 11px;
    }
    #countdown {
        display: inline-block;
        margin: 40px 0 0;
        width: 100%;
    }
    #countdown ul {
        list-style: none;
        margin: 0 auto;
        display: table;
        max-width: 450px;
        width: 100%;
    }
    #countdown ul li {
        margin-right: 10px;
        float: left;
        background: {{ !empty($page->header_footer_bg_color) ? $page->header_footer_bg_color : '#f71c1c' }};
        padding: 20px 20px;
        width: 23.3%;
        border-radius: 10px;
        color: #fff;
        font-weight: 700;
        text-align: center;
        font-size: 13px;
    }
    #countdown ul li span {
        display: block;
        font-size: 18px;
        font-weight: 800;
    }
    #countdown ul li:last-child {
        margin: 0;
    }
    .ftr_new_other .ftr_content .crt_arar a.ck_cliess {
        background: #ff0000;
        padding: 7px 10px;
        display: inline-block;
        font-size: 12px;
        border-radius: 2px;
        color:{{ !empty($page->header_footer_text_color) ? $page->header_footer_text_color : '#ffffff' }};
    }
    .ftr_new_other .ftr_content .crt_arar a {
        font-size: 12px;
        text-decoration: underline;
        color: {{ !empty($page->header_footer_text_color) ? $page->header_footer_text_color : '#ffffff' }};
    }
    @media (min-width: 481px) and (max-width: 767px) {
        .what_tst .qu_bx_partss {
            padding: 10px 10px 10px !important;
        }
        #testimonials .owl-nav button.owl-next {
            right: 5px;
        }
        .mdl_mg_arar {
            display: none;
        }
        .shadow.othr_pgss_lde .top_menuues .top_sec_menu.cnt_parts {
            padding: 0px 0 5px;
        }
        .shadow.othr_pgss_lde .top_menuues .top_sec_menu.cnt_parts ul li {
            margin-right: 7px !important;
        }
        .shadow.othr_pgss_lde .top_menuues .top_sec_menu.cnt_parts ul li:last-child {
            margin-right: 0px !important;
        }
        .shadow.othr_pgss_lde .top_menuues .top_sec_menu.cnt_parts ul li a {
            padding: 14px 5px;
            font-size: 12px;
        }
        .shadow.othr_pgss_lde .top_menuues .top_sec_menu.cnt_parts li.callss {
            padding: 15px 5px;
        }
        .shadow.othr_pgss_lde .top_menuues .top_sec_menu.cnt_parts li.callss {
            padding: 15px 5px;
            font-size: 12px;
        }
        .shadow.othr_pgss_lde#myHeader .othr_logges img.logo {
            height: 30px;
            position: relative;
            top: 12px;
        }
        .shadow.othr_pgss_lde .top_menuues .top_sec_menu.cnt_parts ul li a.gt_it_nnw {
            padding: 5px 8px;
            top: 8px;
        }
        .v_part_liststs .bk_pert_sh a h5 {
            font-size: 16px;
        }
        .new_ar_tring.mt_50p {
            margin-top: 25px;
        }
        .new_ar_tring h2 {
            font-size: 18px;
            margin: 0 0 10px;
            line-height: 24px;
        }
        .new_ar_tring h3 {
            margin: 15px 0 15px;
            font-size: 24px;
            font-weight: 700;
        }
        .new_ar_tring p {
            font-size: 15px;
        }
        .v_part_liststs {
            margin-top: 20px;
        }
        .ftr_new_other .ftr_content .menu_ftrr a {
            margin-right: 10px;
            font-size: 13px;
        }
        .ftr_new_other .ftr_content .crt_arar {
            font-size: 13px;
        }
        .ftr_new_other .ftr_content .crt_arar img.logo {
            margin-right: 0;
            margin: 0 auto;
            display: block;
            margin-bottom: 10px;
        }
    }
    @media (min-width: 320px) and (max-width: 480px) {
        .mess_form_fildss {
            margin-bottom: 30px;
        }
        #countdown {
            margin: 0px 0 0;
        }
        .part_both_arraea .add_area_parts_show .sm_box_sizesss ul {
            list-style: none;
            margin: 0;
            display: flex;
            width: 100%;
            overflow-x: scroll;
            overflow-y: hidden;
            white-space: nowrap;
            padding: 0;
            flex-wrap: inherit;
        }
        .part_both_arraea .add_area_parts_show .sm_box_sizesss ul li {
            width: 100% !important;
        }
        .what_tst .qu_bx_partss {
            padding: 10px 10px 10px !important;
        }
        #testimonials .owl-nav button.owl-next {
            right: 5px;
        }
        .mdl_mg_arar {
            display: none;
        }
        .shadow.othr_pgss_lde .top_menuues .top_sec_menu.cnt_parts {
            padding: 0px 0 5px;
        }
        .shadow.othr_pgss_lde .top_menuues .top_sec_menu.cnt_parts ul li {
            margin-right: 3px !important;
        }
        .shadow.othr_pgss_lde .top_menuues .top_sec_menu.cnt_parts ul li:last-child {
            margin-right: 0px !important;
        }
        .shadow.othr_pgss_lde .top_menuues .top_sec_menu.cnt_parts ul li a {
            padding: 14px 5px;
            font-size: 12px;
        }
        .shadow.othr_pgss_lde .top_menuues .top_sec_menu.cnt_parts li.callss {
            padding: 15px 5px;
        }
        .shadow.othr_pgss_lde .top_menuues .top_sec_menu.cnt_parts li.callss {
            padding: 15px 5px;
            font-size: 12px;
        }
        .shadow.othr_pgss_lde#myHeader .othr_logges img.logo {
            height: 30px;
            position: relative;
            top: 12px;
        }
        .shadow.othr_pgss_lde .top_menuues .top_sec_menu.cnt_parts ul li a.gt_it_nnw {
            padding: 5px 5px;
            top: 10px;
            font-size: 10px;
        }
        .v_part_liststs .bk_pert_sh a h5 {
            font-size: 16px;
        }
        .new_ar_tring.mt_50p {
            margin-top: 25px;
        }
        .new_ar_tring h2 {
            font-size: 18px;
            margin: 0 0 10px;
            line-height: 24px;
        }
        .new_ar_tring h3 {
            margin: 15px 0 15px;
            font-size: 24px;
            font-weight: 700;
        }
        .new_ar_tring p {
            font-size: 15px;
        }
        .v_part_liststs {
            margin-top: 35px;
        }
        .ftr_new_other .ftr_content .menu_ftrr a {
            margin-right: 10px;
            font-size: 13px;
        }
        .ftr_new_other .ftr_content .crt_arar {
            font-size: 13px;
        }
        .ftr_new_other .ftr_content .crt_arar img.logo {
            margin-right: 0;
            margin: 0 auto;
            display: block;
            margin-bottom: 10px;
        }
        .n_thiks a {
            padding: 10px;
            font-size: 14px;
        }
        .new_ar_tring h2.bnt_rundds {
            font-size: 14px;
        }
        .v_part_liststs.opt_in_pg {
            margin-top: 0;
        }
        .yr_awer_pro .new_ar_tring h3 {
            font-size: 22px;
        }
        .new_ar_tring .pert_listst ul li {
            width: 100%;
        }
        #countdown ul li {
            margin-right: 7px;
            padding: 15px 5px;
        }
    }
    #full_dbydds .avatar-upload {
        max-width: 100%;
    }
    #full_dbydds .avatar-upload .avatar-edit {
        right: 10px;
        top: initial;
        bottom: -50px;
    }
    #full_dbydds .avatar-upload .avatar-preview {
        margin: 0 auto;
    }
    #full_dbydds .avatar-upload .avatar-edit input+label {
        padding: 0 10px;
        color: #fff;
        font-size: 13px;
        font-weight: 600;
        border-radius: 6px;
    }
    #full_dbydds .ad_form_su_allls .up_imagess {
        width: 100%;
        height: 400px;
        overflow: hidden;
        margin-bottom: 20px;
    }
    #full_dbydds .ad_form_su_allls .up_imagess img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
    #full_dbydds .ad_form_su_allls .lgo_partsss {
        max-width: 200px;
        height: 120px;
        overflow: hidden;
        margin: 0 auto;
        border: #1c5299 solid 2px;
        margin-bottom: 20px;
        text-align: center;
    }
    #full_dbydds .ad_form_su_allls .lgo_partsss img {
        width: 60%;
        margin: 0 auto;
    }
    .avatar-upload {
        position: relative;
        max-width: 50%;
        margin: 20px 0 0;
    }
    .avatar-upload .avatar-edit input {
        display: none;
    }
    .avatar-upload .avatar-edit input+label {
        display: inline-block;
        width: auto;
        height: 34px;
        line-height: 32px;
        margin-bottom: 0;
        border-radius: 0%;
        background: #f94554;
        border: 1px solid transparent;
        box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.12);
        cursor: pointer;
        font-weight: normal;
        transition: all 0.2s ease-in-out;
        padding: 0 20px;
        color: #fff;
        font-size: 14px;
    }
    .avatar-upload .avatar-edit input+label:hover {
        background: #f94554;
        border-color: #d6d6d6;
    }
    .avatar-upload .avatar-preview {
        width: 120px;
        height: 120px;
        position: relative;
        border-radius: 5%;
        border: 3px solid #F8F8F8;
        box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.1);
    }
    .avatar-upload .avatar-preview>div {
        width: 100%;
        height: 100%;
        border-radius: 5%;
        background-size: cover;
        background-repeat: no-repeat;
        background-position: center;
    }
    .binng_araes.my_proffs#full_dbydds .al_frm_bx {
        padding: 15px;
    }
    .binng_araes.my_proffs#full_dbydds .al_frm_bx .form-group label {
        font-weight: 600;
        font-size: 14px;
    }
    .binng_araes.my_proffs#full_dbydds .al_frm_bx input.inp_araea {
        height: 38px;
        padding: 0px 10px;
        font-size: 12px;
        line-height: 30px;
    }
    .binng_araes.my_proffs#full_dbydds .al_frm_bx input.inp_araea:focus {
        outline: none;
    }
    .binng_araes.my_proffs#full_dbydds .al_frm_bx .bith_frmss .ons_frmss.half_widths select.slt_areaa {
        width: 47%;
        height: 38px;
        padding: 0px 5px;
        font-size: 12px;
    }
    .binng_araes.my_proffs#full_dbydds .al_frm_bx .bith_frmss .ons_frmss.half_widths input.inp_araea {
        width: 48%;
        margin-right: 2%;
    }
    .binng_araes.my_proffs#full_dbydds .al_frm_bx .form-group input.inp_araea.files {
        padding-left: 0;
    }
    .binng_araes.my_proffs#full_dbydds .al_frm_bx.tx_sm_sizess .form-group label {
        font-weight: 600;
        font-size: 12px;
        height: 34px;
    }
    .binng_araes.my_proffs#full_dbydds .al_frm_bx.tx_sm_sizess .form-group .clr_tx_pickks {
        background: #1c539a;
        padding: 7px;
        font-size: 14px;
        border-radius: 4px;
        color: #fff;
    }
    .part_both_arraea .add_area_parts_show {
        display: inline-block;
        width: 100%;
        background: #c7c7c7;
        padding: 10px;
    }
    .part_both_arraea .add_area_parts_show .sm_box_sizesss {
        display: inline-block;
        width: 100%;
        margin-bottom: 10px;
    }
    .part_both_arraea .add_area_parts_show .sm_box_sizesss ul {
        list-style: none;
        padding: 0;
        margin: 0;
    }
    .part_both_arraea .add_area_parts_show .sm_box_sizesss ul li {
        background: #000;
        float: left;
        margin-right: 2px;
        padding: 5px 6px;
        font-size: 10px;
        color: #fff;
        width: 19.6%;
        text-align: center;
    }
    .part_both_arraea .add_area_parts_show .ads_boxx_araessa {
        background: #000;
        margin-right: 2px;
        padding: 5px 6px;
        font-size: 10px;
        color: #fff;
        text-align: center;
    }
    .part_both_arraea .add_area_parts_show .sm_box_sizesss ul li:last-child {
        margin-right: 0;
    }
    .part_both_arraea .add_area_parts_show .prof_imgsss {
        width: 80px;
        height: 80px;
        overflow: hidden;
        margin: 0 auto;
        margin-bottom: 20px;
    }
    .part_both_arraea .add_area_parts_show .prof_imgsss img.logo {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
    .ld_headdingss {
        font-size: 22px;
        font-weight: 700;
        margin-bottom: 10px;
        color: #000;
    }
    .part_both_arraea {
        padding-top: 25px;
    }
    .part_both_arraea .binng_araes.my_proffs .al_frm_bx h5 {
        font-size: 20px;
        margin: 0 0 10px;
    }
    .mess_form_fildss {
        margin-top: 20px;
        display: inline-block;
        width: 100%;
    }
    .mess_form_fildss p {
        background: #fbd5d5;
        padding: 10px;
        margin: 0;
        font-size: 11px;
    }
    .mess_form_fildss p a {
        font-size: 12px;
        font-weight: 700;
    }
    .mess_form_fildss .link_fildss {
        text-align: center;
        margin-top: 15px;
    }
    .mess_form_fildss .link_fildss a:hover {
        background: #0e3992;
        color: #fff;
    }
    .mess_form_fildss .link_fildss a {
        border: #0e3992 solid 2px;
        padding: 7px 15px;
        display: inline-block;
        font-size: 16px;
        font-weight: 600;
        color: #0e3992;
        border-radius: 4px;
    }
    .shadow .top_menuues .top_sec_menu.cnt_parts li{
        color: {{ !empty($page->header_footer_text_color) ? $page->header_footer_text_color : '#ffffff' }};
    }
    .shadow .top_menuues .top_sec_menu.cnt_parts li a{
        color: {{ !empty($page->header_footer_text_color) ? $page->header_footer_text_color : '#ffffff' }};
    }
    .prof_imgsss{
        text-align: center;
        margin: 5px;
    }
    .add_area_parts_show {
        background: #e5e5e5;
        padding: 10px;
    }
    .ads_boxx_araessa {
        background: #000;
        margin-right: 2px;
        padding: 5px 6px;
        font-size: 10px;
        color: #fff;
        text-align: center;
    }
</style>

<!-- Form Modal -->
 @if($page && $page->popup_enable)
<div id="sub_m_al_frms" class="modal " role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content othr_ledss">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                @if($formdata && $formdata->title)
                <h4 class="modal-title">{{ $formdata->title ?? '' }}</h4>
                @endif
            </div>
            <div class="modal-body" id="othr_ledss">
                @if($formdata && $formdata->content)
                <p>{{ $formdata->content ?? '' }}</p>
                @endif
                <div class="row">
                    @if($formdata && $formdata->image_visible && $formdata->file_path)
                    <div class="col-lg-6">
                        <div class="mdl_mg_arar"><img src="{{ asset($formdata->file_path)}}" alt="" /></div>
                    </div>
                    @endif
                    @if($formdata && $formdata->image_visible && $formdata->file_path)
                    <div class="col-lg-6 mt-4">
                        @else
                    <div class="col-lg-12 mt-4">
                        @endif
                        {{-- VALIDATION ERRORS --}}
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul style="margin:0; padding-left:15px;">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="frm_al_suprtsss">
                            @if($page && $page->popup_type == 2)
                                {!! $page->form_embed_code !!}
                            @else
                            <form action="{{ route('save-lets-connect') }}" method="post">
                                @csrf
                                <input type="hidden" name="form_id" value="{{ base64_encode($formdata->id ?? '') }}">
                                <div class="form-group marges_ic">
                                    <i class="fa fa-user"></i>
                                    <input type="text" name="name" value="{{ old('name') }}" class="form-control" placeholder="First Name" />
                                </div>
                                <div class="form-group marges_ic">
                                    <i class="fa fa-envelope"></i>
                                    <input type="text" name="email" value="{{ old('email') }}" class="form-control" placeholder="Email ID" />
                                </div>
                                @if($formdata && $formdata->contact_field)
                                <div class="form-group marges_ic">
                                    <i class="fa fa-phone"></i>
                                    <input type="text" name="phone" value="{{ old('phone') }}" class="form-control" placeholder="Contact No" />
                                </div>
                                @endif
                                @if($formdata && $formdata->msg_field)
                                <div class="form-group marges_ic">
                                    <i class="fa fa-server"></i>
                                    <textarea name="message" id="" cols="3" rows="3" class="form-control" placeholder="Message">{{ old('message') }}</textarea>
                                </div>
                                @endif
                                <div class="form-group">
                                    <button type="submit" value="Submit Now" class="btn-submit2">{{ $formdata->cta_btn_text ?? 'Submit Now' }}</button>
                                </div>
                            </form>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endif
 <section class="tital_mg_cntss">
 <img src="{{ url('home/img/top_al_pgss.png')}}" class="bg_al_cntxt" alt="" />
  <div class="midils_contnts">
   <div class="medilss"><h4>Lead Magnet View</h4>
    <a href="{{ url('') }}">Home</a> &gt; <span>Lead Magnet View</span>
   </div>
  </div>
</section>
	<section class="dash_board_pages mt">
		<div class="container">
			<div class="row">
				<div class="col-lg-3">
                    @include('dashboard.includes.sidebar')
				</div>
				<div class="col-lg-9">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h3>lead Magnet Page Preview</h3>
                        <a href="{{ route('lead-magnet-form') }}">
                            <button class="btn btn-primary"><i class="fa fa-edit"></i> Edit Page</button>
                        </a>
                    </div>
                  <!--- Header Part ---->
                    <section class="shadow othr_pgss_lde" id="myHeader">
                        <div class="top_menuues">
                            <div class="he_tp_parttts">
                                <div class="row">
                                    <div class="col-lg-2 col-2">
                                        <div class="othr_logges">
                                            <a class="nav-brand" href="javascript:void(0);"><img class="logo" src="{{ url('home/img/logo 1.png')}}" alt="Logo" /></a>
                                        </div>
                                    </div>
                                    <div class="col-lg-10 col-10">
                                        <div class="top_sec_menu cnt_parts">
                                            <ul>
                                                <li>
                                                    <a href="{{ url('help') }}"><i class="fa fa-phone"></i> <span>Help ?</span></a>
                                                </li>
                                                <li class="callss"><i class="fa fa-whatsapp"></i> <span>+91-9966680133</span></li>
                                                <li><a href="javascript:void(0);" class="gt_it_nnw" style="background-color: {{ !empty($page->button_bg_color) ? $page->button_bg_color : '#e82626' }}; color: {{ !empty($page->button_text_color) ? $page->button_text_color : '#ffffff' }};">Get it now</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <!---- End Header Part ---->
                    <!--- New On-Demand Training ---->
                    <div class="New-On-Demand">
                        <div class="new_ar_tring mt_50p">
                            @if($page && $page->pre_headline_visible)<h2 class="bnt_rundds">{!! $page->pre_headline !!}</h2> @endif
                            @if($page && $page->headline_visible)<h3>{!! $page->headline !!}</h3>@endif
                            @if($page && $page->post_headline_visible)<p>{!! $page->post_headline !!}</p>@endif
                        </div>
                    </div>
                    <!--- End New On-Demand Training ---->
                    <div class="Watch-This-Vedeo mt-5">
                        <div class="row mt-4">
                            @if($page && $page->media_visible)
                            <div class="col-lg-6">
                                <div class="wtch_txt">Watch This Vedeo Before You Sign Up</div>
                                <div class="you_tb_arra">
                                    @if(isset($page->media_path) && !empty($page->media_path))
                                            {{-- ✅ IMAGE --}}
                                            @if(($page->media_type ?? '') == 'image' && !empty($page->media_path))
                                                <img src="{{ asset($page->media_path) }}" width="100%" height="100%" style="border-radius:8px;">

                                            {{-- ✅ VIDEO --}}
                                            @elseif(($page->media_type ?? '') == 'video' && !empty($page->media_path))
                                                
                                                <video width="100%" height="100%" controls style="border-radius:8px;">
                                                    <source src="{{ asset($page->media_path) }}" type="video/mp4">
                                                    Your browser does not support video.
                                                </video>

                                            {{-- ✅ LINK (YouTube / Embed) --}}
                                            @elseif(($page->media_type ?? '') == 'link' && !empty($page->media_path))

                                                <iframe
                                                    width="100%"
                                                    height="100%"
                                                    src="{{ $page->media_path }}"
                                                    frameborder="0"
                                                    allowfullscreen
                                                    style="border-radius:8px;">
                                                </iframe>

                                            @endif

                                    @endif
                                </div>
                            </div>
                            @endif
                            <div class="col-lg-6">
                                <div class="v_part_liststs mt-4">
                                    <br>
                                    <ul>
                                        @if($page && $page->bullet_status)
                                            @for($i = 1; $i <= 6; $i++)
                                                @if(isset($page->{"bullet{$i}"}))
                                                    <li><i class="fa fa-check"></i> {!! $page->{"bullet{$i}"} !!}</li>
                                                @endif
                                            @endfor
                                        @endif
                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="v_part_liststs">
                                    @if($page && $page->countdown_visible && $page->countdown_datetime && \Carbon\Carbon::parse($page->countdown_datetime)->isFuture())
                                    <div id="countdown">
                                        <ul>
                                            <li><span id="days"></span>days</li>
                                            <li><span id="hours"></span>Hours</li>
                                            <li><span id="minutes"></span>Minutes</li>
                                            <li><span id="seconds"></span>Seconds</li>
                                        </ul>
                                    </div>
                                    @endif
                                    <div class="arow_downss">
                                        <span class="ar_bntss"><i class="fa fa-long-arrow-down"></i></span>
                                        <span class="ar_bntss"><i class="fa fa-long-arrow-down"></i></span>
                                        <span class="ar_bntss"><i class="fa fa-long-arrow-down"></i></span>
                                    </div>
                                    <div class="bk_pert_sh">
                                        @if($page && $page->pre_cta_visible)
                                            <p>{{ $page->pre_cta }}</p>
                                        @endif
                                        @if($page && $page->cta_title || $page->cta_sub_title)
                                        @if($page && $page->popup_enable)
                                          <a href="javascript:void(0);" id="openModalBtn" data-toggle="modal" data-target="#sub_m_al_frms">
                                        @else
                                            <a href="{{ $page->page_cta_url }}" @if($page && $page->page_new_tab) target="_blank" @endif>
                                        @endif
                                        
                                            <h5>{{ $page->cta_title }}</h5>
                                            <span>{{ $page->cta_sub_title }}</span>
                                        </a>
                                        @endif
                                    </div>
                                    @if($page && $page->ps_text_visible)
                                    <div class="tx_v_ars">{{ $page->ps_text }}</div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="add_area_parts_show mt-5">
                        @if($page && $page->company_logo)
                        <div class="prof_imgsss">
                            <img class="logo" src="{{ asset($page->company_logo) }}" alt="Logo" />
                        </div>
                        @endif

                        <table class="table table-bordered">
                            <tr class="bg-dark text-white">
                                <th>Company Name</th>
                                <th>Website</th>
                                <th>Email ID</th>
                                <th>Phone Number</th>
                            </tr>
                            <tr>
                                <td>{{ $page->company_name ?? 'N/A' }}</td>
                                <td>{{ $page->company_website ?? 'N/A' }}</td>
                                <td>{{ $page->company_email ?? 'N/A' }}</td>
                                <td>{{ $page->company_phone ?? 'N/A' }}</td>
                                
                            </tr>

                        </table>
                        <div class="ads_boxx_araessa">Address</div>
                        <p class="text-center">{{ $page->company_address ?? 'N/A' }}</p>
                    </div>
                    <section class="ftr_new_other">
                        <div class="frt_partsss">
                            <div class="ftr_content">
                                <div class="lgo">
                                    <a href="javascript:void(0);"><img class="logo" src="{{ url('home/img/logo 1.png')}}" alt="Logo" /></a>
                                </div>
                                <div class="crt_arar mt-0 mb-4">
                                    1CR App : Creating Your Own Lead Magnet is Easy & Fast Now With 1CR App. Try Il It's <a href="javascript:void(0);">Free</a>
                                </div>
                                <div class="crt_arar mt-0">
                                    <a href="javascript:void(0);" class="ck_cliess" style="background-color: {{ !empty($page->button_bg_color) ? $page->button_bg_color : '#e82626' }}; color: {{ !empty($page->button_text_color) ? $page->button_text_color : '#ffffff' }};">Check this for idea</a>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
			</div>
		</div>
	</section>
@include('front.layouts.footer')


    @if($page && $page->countdown_visible && $page->countdown_datetime && \Carbon\Carbon::parse($page->countdown_datetime)->isFuture())

    <script>
        const countdownDate = "{{ $page->countdown_datetime }}";
    </script>
    <script>
    (function () {

        const second = 1000,
            minute = second * 60,
            hour   = minute * 60,
            day    = hour * 24;

        // ✅ Convert Laravel datetime to JS format
        let countDown = new Date(countdownDate.replace(' ', 'T')).getTime();

        let x = setInterval(function () {

            let now = new Date().getTime();
            let distance = countDown - now;

            if (distance <= 0) {
                clearInterval(x);

                document.getElementById("headline").innerText = "Time's up!";
                document.getElementById("countdown").style.display = "none";

                return;
            }

            document.getElementById("days").innerText =
                Math.floor(distance / day);

            document.getElementById("hours").innerText =
                Math.floor((distance % day) / hour);

            document.getElementById("minutes").innerText =
                Math.floor((distance % hour) / minute);

            document.getElementById("seconds").innerText =
                Math.floor((distance % minute) / second);

        }, 1000); // ✅ update every second

    })();
    </script>
    @endif

    <script>
        var owl = $('#testimonials');
        owl.owlCarousel({
            margin: 30,
            loop: true,
            dots: false,
            nav: true,
            navText: [
                "<i class='fa fa-chevron-left'></i>",
                "<i class='fa fa-chevron-right'></i>"
            ],
            autoplay: false,
            autoplayHoverPause: true,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 1
                },
                1000: {
                    items: 2
                },
                1200: {
                    items: 2
                }
            }
        });
    </script>
    <script>
        $(document).ready(function() {
            //toggle the component with class accordion_body
            $(".accordion_head").click(function() {
                if ($('.accordion_body').is(':visible')) {
                    $(".accordion_body").slideUp(300);
                    $(".plusminus").text('+');
                    $('.accordion_head').removeClass('clr_tx');
                }
                if ($(this).next(".accordion_body").is(':visible')) {
                    $(this).next(".accordion_body").slideUp(300);
                    $(this).children(".plusminus").text('+');
                } else {
                    $(this).next(".accordion_body").slideDown(300);
                    $(this).addClass('clr_tx').siblings().removeClass('clr_tx');
                    $(this).children(".plusminus").text('-');
                }
            });
        });
    </script>
<script>
    $(document).ready(function () {
        @if(session('open_modal'))
            $('#sub_m_al_frms').modal('show');
        @endif
    });
    
    $(document).on('click', '.close', function () {
        $('#sub_m_al_frms').modal('hide');
    });

    $(document).ready(function () {

        @if(session('success'))

            // Hide title if needed
            $('.modal-title').hide();

            // Show modal
            

            // Show success message immediately
            const alertHtml = `<div class="alert alert-success">{{ session('success') }}</div>`;
            $('#othr_ledss').html(alertHtml); // FIX: class selector
            $('#sub_m_al_frms').modal('show');
            // Auto close modal after 5 sec
            setTimeout(function () {
                $('#sub_m_al_frms').modal('hide');
            }, 5000);

        @endif

    });
</script>


