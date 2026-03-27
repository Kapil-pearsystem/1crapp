@include('web.common.header')

<style>




#tsts_mlts .it_emms {
    display: inline-block;
    width: 100%;
}

#tsts_mlts .it_emms input {
  padding: 0;
  height: initial;
  width: initial;
  margin-bottom: 0;
  display: none;
  cursor: pointer;
}

#tsts_mlts .it_emms label {
    cursor: pointer;
    position: relative;
    right: -7px;
    float: right;
}

#tsts_mlts .it_emms label:before {
    content: '';
    -webkit-appearance: none;
    background-color: transparent;
    border: 2px solid #0079bf;
    box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05), inset 0px -15px 10px -12px rgba(0, 0, 0, 0.05);
    padding: 10px;
    display: inline-block;
    position: absolute;
    vertical-align: middle;
    cursor: pointer;
    right: 0;
    margin-right: 5px;
}

#tsts_mlts .it_emms input:checked + label:after {
    content: '';
    display: block;
    position: absolute;
    top: 2px;
    right: 14px;
    width: 6px;
    height: 14px;
    border: solid #0079bf;
    border-width: 0 2px 2px 0;
    transform: rotate(45deg);
}



.plp_slt_readlt .plp_sc_step {
    display: inline-block;
    width: 100%;
    margin-bottom: 30px;
}
.plp_slt_readlt .plp_sc_step ul {
    list-style: none;
    margin: 0 auto;
    display: table;
}
.plp_slt_readlt .plp_sc_step ul li{
    float:left;
    margin-right: 20px;
}
.plp_slt_readlt .plp_sc_step ul li:last-child{margin-right:0;}
.plp_slt_readlt .plp_sc_step ul li {
    float: left;
    margin-right: 20px;
    border: #ccc solid 1px;
    padding: 7px 30px;
    display: inline-block;
    border-radius: 4px;
    font-weight: 600;
    font-size: 16px;
}
.plp_slt_readlt .plp_sc_step ul li.act_typess {
    border: #20b450 solid 1px;
    color: #ffffff;
    background: #20b450;
}

.plp_slt_readlt .stp_contetnt {
    text-align: center;
    margin-bottom: 30px;
}
.plp_slt_readlt .stp_contetnt p {
    font-size: 24px;
    font-weight: 500;
    margin-bottom: 20px;
}
.plp_slt_readlt .stp_contetnt p span.nxt_block {
    display: block;
}
.plp_slt_readlt .stp_contetnt h2 {
    font-size: 24px;
    font-weight: 700;
    max-width: 720px;
    width: 100%;
    margin: 0 auto;
    line-height: 30px;
    margin-bottom: 0;
}
.plp_slt_readlt .stp_contetnt .sm_tx_colr {
    font-size: 15px;
    color: #b1a9a9;
}

.clk_btnns_plp {
    margin-top: 30px;
    text-align: center;
    margin-bottom: 25px;
}
.clk_btnns_plp a {
    background: #fb6554;
    padding: 10px 60px 10px 40px;
    display: inline-block;
    color: #fff;
    border-radius: 50px;
    position: relative;
    font-size: 18px;
    font-weight: 600;
    max-width: max-content;
    width: 100%;
}
.clk_btnns_plp a span {
    display: block;
    font-size: 13px;
    color: #ffdf00;
}
.clk_btnns_plp a i {
    position: absolute;
    top: 19px;
    right: 20px;
    font-size: 25px;
}




.paginettoin {
    display: inline-block;
    width: 100%;
    margin-top: 30px;
}
.paginettoin ul {
    background: #fff;
    list-style: none;
    padding: 10px 20px;
    margin: 0 auto;
    display: table;
    border-radius: 5px;
}
.paginettoin ul li {
    float: left;
    margin-right: 25px;
}
.paginettoin ul li a {
    font-size: 16px;
    line-height: 27px;
    font-weight: 600;
}
.paginettoin ul li a i {
    font-size: 25px;
    -webkit-text-stroke: 1px #ffffff;
}


.paginettoin ul li:last-child {
    margin-right:0px;
}

.blk_araes{display:block;}
.mngss {
    width: auto !important;
}
.red_tx {color:#f94554 !important;}
.blues_tx {color:#1c5299 !important;}
.grenss_tx {color:#20b450 !important;}
.yel_txt {color: #ddb806 !important;}
.cut_pricess {text-decoration: line-through; margin-right: 2px;}
.bg_red {
    background: #e46050 !important;
}

.ribbon-wrap {
    width: 150px;
    height: 150px;
    position: absolute;
    top: -1px;
    left: -1px;
    pointer-events: none;
}
.ribbon {
    width: 160px;
    font-size: 13px;
    text-align: center;
    padding: 8px 0;
    color: #fff;
    position: absolute;
    transform: rotate(-45deg);
    right: -17px;
    top: 9%;
    left: -47px;
}

.hd_listst {
    margin-bottom: 12px;
    display: inline-block;
    width: 100%;
    font-size: 17px;
    font-weight: 700;
}
.hd_listst span.cartss {
    float: right;
    font-size: 16px;
    background: #1c5299;
    color: #fff;
    padding: 3px 15px;
    display: inline-block;
    border-radius: 30px;
}
.hd_listst span.cartss span.countss {
    display: inline-block;
    text-align: center;
    border-radius: 50px;
    font-size: 14px;
}

.plp_slt_readlt .stp_contetnt#tsts_mlts .it_emms {
    margin: 0;
    padding: 0;
    border: none;
}

.plp_slt_readlt .stp_contetnt#tsts_mlts {
    display: inline-block;
    width: 100%;
    text-align: left;
    margin:10px 0 0;
}
.plp_slt_readlt .stp_contetnt#tsts_mlts ul {
    margin: 0;
    padding: 0;
}
.plp_slt_readlt .stp_contetnt#tsts_mlts ul li {
    float: left;
    margin-right:30px;
	list-style: none;
}
.plp_slt_readlt .stp_contetnt#tsts_mlts ul li span.titalss {
    font-size: 16px;
    text-transform: uppercase;
    color: #db2433;
    font-weight: 700;
    line-height: 31px;
}
.plp_slt_readlt .stp_contetnt#tsts_mlts ul li select.al_slt_partss {
    width: 168px;
    border: #ccc solid 1px;
    font-size: 14px;
    padding: 5px 5px;
    font-weight: 600;
    border-radius: 4px;
	cursor:pointer;
}
.plp_slt_readlt .stp_contetnt#tsts_mlts ul li label {
    margin: 0;
    padding-left: 30px;
    position: relative;
}
.plp_slt_readlt .stp_contetnt#tsts_mlts ul li label:before {
    left: 0;
    width: 22px;
    top: -1px;
}
.plp_slt_readlt .stp_contetnt#tsts_mlts ul li label:after {
    left: 9px;
}


#tsts_mlts .it_emms .add-read-more.show-less-content .second-section,
#tsts_mlts .it_emms .add-read-more.show-less-content .read-less {
   display: none;
}

#tsts_mlts .it_emms .add-read-more.show-more-content .read-more {
   display: none;
}

#tsts_mlts .it_emms .add-read-more .read-more,
#tsts_mlts .it_emms .add-read-more .read-less {
font-weight: 600;
    margin-left: 2px;
    color: #f94554;
    cursor: pointer;
}

#tsts_mlts .it_emms .add-read-more{
    max-width: 100%;
    width: 100%;
    margin: 0 auto;
    margin-bottom: 10px;
    font-weight: 600;
}
#tsts_mlts .it_emms .usr_mgss.othr_gf {
    border-radius: 0;
}



.slider-modal#al_supportss {
  display: none;
  opacity: 0;
  border-top: 2px solid #083;
  position: fixed;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%) scale(1) translateZ(0);
  max-width: 575px;
  width: 100%;
  background: #fff;
  z-index: 9001;
  box-shadow: 0px 5px 10px rgba(0,0,0,0.4), 0px 0px 0px 3000px rgba(0,0,0,0.25);
      border-radius: 10px;
    overflow: hidden;
    border: #ffffff solid 2px;
}
.slider-modal#al_supportss.modal-active {
  display: block;
  -webkit-animation-name: modal-enter;
          animation-name: modal-enter;
  -webkit-animation-duration: 0.3s;
          animation-duration: 0.3s;
  animation-iterations: 1;
  -webkit-animation-fill-mode: forwards;
          animation-fill-mode: forwards;
  -webkit-animation-timing-function: ease-in-out;
          animation-timing-function: ease-in-out;
}
.slider-modal.modal-close {
  -webkit-animation-name: modal-leave;
          animation-name: modal-leave;
  -webkit-animation-duration: 0.2s;
          animation-duration: 0.2s;
  animation-iterations: 1;
  -webkit-animation-fill-mode: forwards;
          animation-fill-mode: forwards;
  -webkit-animation-timing-function: ease-in-out;
          animation-timing-function: ease-in-out;
}
.slider-modal#al_supportss .title {
    padding: 0;
    margin: 0;
    position: absolute;
}
.slider-modal#al_supportss .slides {
  position: relative;
  overflow: hidden;
  height:400px;
  width: 100%;
}
.slider-modal#al_supportss .slide {
  position: absolute;
  width: 100%;
  height: 400px;
  background-size: cover;
  background-position: center center;
  display: inline-block;
  z-index: 1;
}
.slider-modal#al_supportss .slide.active {
  z-index: 3;
}
.slider-modal#al_supportss .slider-image-caption {
  text-align: center;
  font-size: 14px;
  color: #777;
}
.slider-modal#al_supportss .close-icon {
  position: absolute;
  right: 10px;
  top: 8px;
  background: transparent;
  height: 33px;
  width: 33px;
  border-radius: 50%;
  transition: all 0.2s;
  cursor: pointer;
      z-index: 9;
    background: #fff;
}
.slider-modal#al_supportss .close-icon:before,
.slider-modal#al_supportss .close-icon:after {
  position: absolute;
  content: "";
  height: 20px;
  width: 2px;
  background: #d00;
  left: 50%;
  top: 50%;
  margin-top: calc(20px / -2);
  margin-left: calc(2px / -2);
}
.slider-modal#al_supportss .close-icon:before {
  transform: rotate(45deg);
}
.slider-modal#al_supportss .close-icon:after {
  transform: rotate(-45deg);
}
.slider-modal#al_supportss .close-icon:active {
  background: rgba(0,0,0,0.1);
}
.slider-modal#al_supportss .nav-arrow {
  opacity: 0.3;
  position: absolute;
  background: #fff;
  height: 30px;
  width: 30px;
  box-shadow: 0px 2px 4px rgba(0,0,0,0.2);
  border-radius: 50%;
  z-index: 10;
  top: 50%;
  margin-top: -15px;
  cursor: pointer;
  transition: all 0.2s ease-out;
}
.slider-modal#al_supportss .nav-arrow:hover {
  opacity: 0.8;
}
.slider-modal#al_supportss .nav-arrow:before,
.slider-modal#al_supportss .nav-arrow:after {
  content: "";
  width: 2px;
  height: 10px;
  background: #000;
  position: absolute;
  left: 9px;
  top: 10px;
}
.slider-modal#al_supportss .nav-arrow:before {
  transform: rotate(50deg) translateY(-50%);
}
.slider-modal#al_supportss .nav-arrow:after {
  transform: rotate(-50deg) translateY(50%);
}
.slider-modal#al_supportss .nav-arrow.right {
  right: 20px;
  transform: rotate(180deg);
}
.slider-modal#al_supportss .nav-arrow.left {
  left: 20px;
}
@-webkit-keyframes modal-enter {
  0% {
    opacity: 0;
    transform: translate(-50%, -50%) scale(0.5);
  }
  70% {
    transform: translate(-50%, -50%) scale(1.1);
  }
  100% {
    opacity: 1;
    transform: translate(-50%, -50%) scale(1);
  }
}
@keyframes modal-enter {
  0% {
    opacity: 0;
    transform: translate(-50%, -50%) scale(0.5);
  }
  70% {
    transform: translate(-50%, -50%) scale(1.1);
  }
  100% {
    opacity: 1;
    transform: translate(-50%, -50%) scale(1);
  }
}
@-webkit-keyframes modal-leave {
  0% {
    opacity: 1;
    transform: translate(-50%, -50%) scale(1);
  }
  100% {
    opacity: 0;
    transform: translate(-50%, -50%) scale(0.8);
  }
}
@keyframes modal-leave {
  0% {
    opacity: 1;
    transform: translate(-50%, -50%) scale(1);
  }
  100% {
    opacity: 0;
    transform: translate(-50%, -50%) scale(0.8);
  }
}



#checkout-progress {
  width: 90%;
  margin: 0px auto;
  font-size: 2.5em;
  font-weight: 900;
  position: relative;
}
@media (max-width: 767px) {
  #checkout-progress {
    font-size: 1.5em;
  }
}
#checkout-progress:before {
  content: "";
  position: absolute;
  left: 0;
  top: 50%;
  height: 20px;
  width: 100%;
  background-color: #ccc;
  transform: translateY(-50%) perspective(1000px);
}
#checkout-progress:after {
  content: "";
  position: absolute;
  left: 0;
  top: 50%;
  height: 20px;
  width: 100%;
  background-color: #2C3E50;
  transform: scaleX(0) translateY(-50%) perspective(1000px);
  transform-origin: left center;
  transition: transform 0.5s ease;
}
#checkout-progress.step-2:after {
  transform: scaleX(0.333) translateY(-50%) perspective(1000px);
}
#checkout-progress.step-3:after {
  transform: scaleX(0.666) translateY(-50%) perspective(1000px);
}
#checkout-progress.step-4:after {
  transform: scaleX(1) translateY(-50%) perspective(1000px);
}
#checkout-progress.step-5:after {
  transform: scaleX(1) translateY(-50%) perspective(1000px);
}
#checkout-progress .progress-bar {
  width: 100%;
  display: flex;
  height: 100px;
  justify-content: space-between;
  align-items: center;
}
#checkout-progress .progress-bar .step {
  z-index: 2;
  position: relative;
}
#checkout-progress .progress-bar .step .step-label {
  position: absolute;
  top: calc(100% + 25px);
  left: 50%;
  transform: translateX(-50%) perspective(1000px);
  white-space: nowrap;
  font-size: 0.4em;
  font-weight: 600;
  color: #ccc;
  transition: 0.3s ease;
}
@media (max-width: 767px) {
  #checkout-progress .progress-bar .step .step-label {
    top: calc(100% + 15px);
  }
}
#checkout-progress .progress-bar .step span {
  color: #ccc;
  transition: 0.3s ease;
  display: block;
  transform: translate3d(0, 0, 0) scale(1) perspective(1000px);
}
#checkout-progress .progress-bar .step .fa-check {
  color: #fff;
  position: absolute;
  left: 50%;
  top: 50%;
  transition: transform 0.3s ease;
  transform: translate3d(-50%, -50%, 0) scale(0) perspective(1000px);
}
#checkout-progress .progress-bar .step.active span, #checkout-progress .progress-bar .step.active .step-label {
  color: #2C3E50;
}
#checkout-progress .progress-bar .step.valid .fa-check {
  transform: translate3d(-50%, -50%, 0) scale(1) perspective(1000px);
}
#checkout-progress .progress-bar .step.valid span {
  color: #2C3E50;
  transform: translate3d(0, 0, 0) scale(2) perspective(1000px);
}
#checkout-progress .progress-bar .step.valid .step-label {
  color: #2C3E50 !important;
}
#checkout-progress .progress-bar .step:after {
  content: "";
  position: absolute;
  z-index: -1;
  left: 50%;
  top: 50%;
  transform: translate(-50%, -50%) perspective(1000px);
  width: 75px;
  height: 75px;
  background-color: #fff;
  border-radius: 50%;
  border: 5px solid #ccc;
  transition: 0.3s ease;
}
@media (max-width: 767px) {
  #checkout-progress .progress-bar .step:after {
    width: 40px;
    height: 40px;
  }
}
#checkout-progress .progress-bar .step.active:after {
  border: 5px solid #2C3E50;
}
#checkout-progress .progress-bar .step.valid:after {
  background-color: #2C3E50;
  border: 5px solid #2C3E50;
}

.button-container {
  display: flex;
  flex-wrap: wrap;
  justify-content: space-around;
  width: 100%;
  margin: 100px auto 0px;
}
.button-container .btn {
  display: inline-block;
  background-color: #2C3E50;
  color: #fff;
  padding: 10px 15px;
  border-radius: 10px;
  text-transform: uppercase;
  font-weight: 900;
  border: 3px solid #2C3E50;
  transition: 0.3s ease;
  cursor: pointer;
  text-align: center;
}
@media (max-width: 767px) {
  .button-container .btn {
    width: 100%;
    margin-bottom: 15px;
  }
}
.button-container .btn:hover {
  background-color: transparent;
  color: #2C3E50;
  transform: scale(1.02) perspective(1000px);
}

#stap_fildess{margin-top:50px;}

#stap_fildess .multisteps-form__progress-btn{padding-top:30px;}

#stap_fildess .multisteps-form__progress button.multisteps-form__progress-btn {
    font-size: 15px;
    font-weight: 700;
    position: relative;
    text-align: center;
}
#stap_fildess .multisteps-form__progress button.multisteps-form__progress-btn span.cnt_numbbers {
    position: absolute;
    top: -5px;
    left: 0;
    right: 0;
    margin: 0 auto;
    z-index: 9;
    width: 20px;
    height: 20px;
    color: #333;
}
.multisteps-form__progress-btn.js-active span.cnt_numbbers {
    color: #fff !important;
}
#stap_fildess .multisteps-form__progress button.multisteps-form__progress-btn:before {
width: 30px;
    height: 30px;
    top: -10px;
}
#stap_fildess .multisteps-form .button-row button.btn.btn-primary {
    padding: 8px 30px !important;
    font-weight: 700;
    border: #1c5299 solid 1px;
    background: #1c5299;
}
#stap_fildess .multisteps-form .button-row button.btn.btn-primary:hover {
    background: #e3182a;
    color: #fff;
    border: #e3182a solid 1px;
}


/* ------- Gift Area --------   */
#tsts_mlts .it_emms .add-read-more.show-less-content .second-section,
#tsts_mlts .it_emms .add-read-more.show-less-content .read-less {
   display: none;
}

#tsts_mlts .it_emms .add-read-more.show-more-content .read-more {
   display: none;
}

#tsts_mlts .it_emms .add-read-more .read-more,
#tsts_mlts .it_emms .add-read-more .read-less {
font-weight: 600;
    margin-left: 2px;
    color: #f94554;
    cursor: pointer;
}

#tsts_mlts .it_emms .add-read-more{
    max-width: 100%;
    width: 100%;
    margin: 0 auto;
    margin-bottom: 10px;
    font-weight: 600;
}

#tsts_mlts .it_emms .thk_arara {
    text-align: center;
}
#tsts_mlts .it_emms .thk_arara h2 {
    margin: 0 0 7px;
    font-weight: 700;
    font-size: 24px;
}
#tsts_mlts .it_emms .thk_arara p.grenss_tx {
    font-size: 17px;
    font-weight: 600;
}

#tsts_mlts .it_emms .boths_gfts {
    display: inline-block;
    width: 100%;
	margin-bottom:22px;
}
#tsts_mlts .it_emms .boths_gfts .giftss img {
    width: 62px;
    height: 42px;
}
#tsts_mlts .it_emms .boths_gfts .giftss {
    float: left;
    width: 50%;
}
#tsts_mlts .it_emms .boths_gfts .giftss i {
    font-size: 52px;
    color: #ffa700;
    position: relative;
    top: -6px;
}

#tsts_mlts .it_emms .boths_gfts .qerrst {
    float: left;
    width: 50%;
    text-align: right;
}
#tsts_mlts .it_emms .boths_gfts .qerrst img {
    max-width: 42px;
    float: right;
}

.al_text_box .ad_personnals div#testimonials .owl-stage-outer {
    padding-bottom: 10px;
}

#tsts_mlts .it_emms.giftts {
    border-radius: 6px;
    border: #a6c5ed solid 2px;
}
#bx1{box-shadow: rgba(50, 50, 93, 0.25) 0px 30px 60px -12px inset, rgba(0, 0, 0, 0.3) 0px 18px 36px -18px inset;}
#bx2{box-shadow: rgb(156 173 67 / 48%) 0px 30px 60px -12px inset, rgb(237 204 76 / 78%) 0px 18px 36px -18px inset;}
#bx3{box-shadow: rgb(217 94 20 / 54%) 0px 30px 60px -12px inset, rgb(155 27 27 / 42%) 0px 18px 36px -18px inset;}
#bx4{box-shadow: rgb(14 14 165 / 38%) 0px 30px 60px -12px inset, rgb(56 111 183 / 44%) 0px 18px 36px -18px inset;}
#bx5{box-shadow: rgb(51 175 29 / 46%) 0px 30px 60px -12px inset, rgb(27 171 33 / 64%) 0px 18px 36px -18px inset;}

#testimonials .it_emms.giftts .pric_txtx {
    position: absolute;
    right: -37px;
    background: #fb0200;
    color: #fff;
    padding: 3px 10px;
    bottom: 37px;
    transform: rotate(-90deg);
}
#tsts_mlts .it_emms.giftts .ribbon-wrap {
    top: inherit;
    bottom: -24px;
    transform: rotate(-90deg);
    width: 100px;
    left: 25px;
}
#tsts_mlts .it_emms.giftts .ribbon-wrap .ribbon {
    transform: matrix(1, 0, 0, 1, 0, 0);
    left: 0;
    right: 0;
    top: 0;
    width: auto;
    height: auto;
}

.qu_bx_partss table {
    margin: 0;
    margin-top: 25px;
}
.qu_bx_partss table tr th {
    background: #1c5299;
    color: #fff;
}

.qu_bx_partss table tr td {
    color: #000;
	position:relative;
}
.qu_bx_partss table tr td .p_cuss {
    text-decoration: line-through;
    font-weight: 600;
}
.qu_bx_partss table tr td .slt_typess {
    position: absolute;
    right: 5px;
    top: 5px;
}
.qu_bx_partss table tr td .slt_typess select {
    border: none;
    font-size: 12px;
    padding: 2px 6px;
    cursor: pointer;
}
.qu_bx_partss table tr td .slt_typess select:focus{outline:none;}


.qu_bx_partss table tr td #dataadss {
    position: absolute;
    right: 6px;
    top: 8px;
}
.qu_bx_partss table tr td #dataadss .bell i {
    font-size: 20px;
}

.qu_bx_partss table tr td #dataadss .bell {
    background: #fff;
    padding: 2px 10px;
    font-size: 12px;
    font-weight: 600;
    position: relative;
    top: -2px;
    cursor: pointer;
}

.qu_bx_partss table tr td #dataadss .scope {
    display: none;
}

.qu_bx_partss table tr td #dataadss .scope.active {
    display: flex;
    position: absolute;
    top: -2px;
    right:40px;
    background: #1c5299;
    padding: 3px 5px;
    font-size: 10px;
    font-weight: 600;
    line-height: 17px;
    color: #fff;
}
.qu_bx_partss table tr td #dataadss .scope.active span.tx {
    width: 50px;
    font-size: 12px;
    margin: 0 6px;
}

.qu_bx_partss table tr td #dataadss .scope.active span.tx input.inp_unddds {
    width: 100%;
    border: #ccc solid 1px;
    margin: 0;
    text-align: center;
	color:#333;
}
.qu_bx_partss table tr td #dataadss .scope.active span.tx input.inp_unddds:focus{outline:none;}
/* ------- End Gift Area --------   */

.qu_bx_partss .you_tb_arra {
    width: 100%;
    max-width: 550px;
    margin: 0 auto;
    padding-top: 10px;
}

.qu_bx_partss .clk_btnns_plp {
    margin-top:30px;
    text-align: center;
    margin-bottom: 25px;
}
.qu_bx_partss .clk_btnns_plp a {
    background: #fb6554;
    padding: 10px 60px 10px 40px;
    display: inline-block;
    color: #fff;
    border-radius: 50px;
    position: relative;
    font-size: 18px;
    font-weight: 600;
    max-width: max-content;
    width: 100%;
}
.qu_bx_partss .clk_btnns_plp a span {
    display: block;
    font-size: 13px;
    color: #ffdf00;
}
.qu_bx_partss .clk_btnns_plp a i {
    position: absolute;
    top: 10px;
    right: 20px;
    font-size: 25px;
}
.qu_bx_partss .clk_btnns_plp span.nxt_stapss {
    display: block;
    margin-top: 15px;
	    cursor: pointer;
}
.qu_bx_partss .titalsss {
    text-align: center;
    margin-bottom: 30px;
    margin-top: 20px;
}
.qu_bx_partss .titalsss h3 {
    margin: 0 0 10px;
    font-size: 28px;
    font-weight: 700;
}
.qu_bx_partss .titalsss .aroo_parts {
    display: inline-block;
    width: 100%;
}
.qu_bx_partss .titalsss .aroo_parts span.down_aroo {
    width: 37px;
    display: inline-block;
    height: 33px;
    background: #1c5299;
    line-height: 30px;
    color: #fff;
    margin-right: 5px;
    border: #fff solid 1px;
}
.qu_bx_partss .titalsss .aroo_parts span.down_aroo:last-child{margin-right:0;}
.qu_bx_partss .titalsss .aroo_parts span.down_aroo i {
    position: relative;
    top: 7px;
}

.qu_bx_partss table tr th span.ques_top {
    float: right;
    width: 20px;
    height: 20px;
    border: #ffffff solid 1px;
    border-radius: 40px;
    text-align: center;
    cursor: pointer;
}
.qu_bx_partss table tr td span.ques_top {
    float: right;
    width: 20px;
    height: 20px;
    border: #ffffff solid 1px;
    border-radius: 40px;
    text-align: center;
    cursor: pointer;
	margin-left:10px;
	color:#fff;
}

.plp_scriptss .stp_contetnt p {
    font-size: 24px;
    font-weight: 500;
    margin-bottom: 20px;
}
.plp_scriptss .stp_contetnt p span.nxt_block {
    display: block;
}
.plp_scriptss .stp_contetnt h5 {
    font-size: 16px;
    max-width: 550px;
    margin: 0 auto;
    line-height: 20px;
}
.nxt_block {
    display: block;
}

.sco_tx_cnt {
    text-align: center;
    max-width: 500px;
    margin: 0 auto;
	margin-bottom:30px;
}
.sco_tx_cnt p {
    font-size: 16px;
    margin-bottom: 10px;
    font-weight: 500;
}
.social_lk_partss a {
    width: 28px;
    height: 28px;
    display: inline-block;
    color: #fff;
    background: #000;
    text-align: center;
    border-radius: 30px;
    margin-right: 1px;
}
.social_lk_partss a i {
    position: relative;
    top: 7px;
    font-size: 13px;
}


#tsts_mlts.gf_listst {
    display: inline-block;
    margin: 0 auto;
    position: absolute;
    top: 30px;
	z-index:9;
}
#tsts_mlts.gf_listst .it_emms {
    width: 22px;
    border: none;
    padding: 0;
    margin: 0;
}

#flt_mblss {position: relative; display:none !important;}

@media (min-width: 481px) and (max-width: 767px) {
	.plp_slt_readlt .stp_contetnt#tsts_mlts ul li {margin-right: 17px; margin-bottom: 17px; width: 46%;}
	.plp_slt_readlt .stp_contetnt#tsts_mlts ul li:first-child {width: 100%; margin: 0 0 5px;}
	.plp_slt_readlt .stp_contetnt#tsts_mlts ul li:last-child {width: 100%; margin: 0 0 5px;}
	.plp_slt_readlt .stp_contetnt#tsts_mlts ul li:last-child select.al_slt_partss {width: 98%;}
		
	.multisteps-form__progress-btn {text-indent: 0;}
	#stap_fildess .multisteps-form__progress button.multisteps-form__progress-btn {font-size: 10px; line-height: 12px;}
	#stap_fildess .multisteps-form__progress button.multisteps-form__progress-btn span.cnt_numbbers {top: -1px; font-size: 12px;}
	
    #flt_mblss {position: relative; display:block !important;}
	.filletrr.fitter {border: #ccc solid 1px;  text-align: center; border-radius: 4px; display: block !important; width: 90px; position: absolute; top:0px; z-index:9;}
	.filletrr.fitter a {font-weight: 700; font-size: 15px; display: block; padding: 3px 0;}
	.mb_view_none {display: none !important;}

	.plp_slt_readlt .stp_contetnt#tsts_mlts .it_emms.sort_lisrtst.show_data {display: none !important;}
	.plp_slt_readlt .stp_contetnt#tsts_mlts .it_emms.sort_lisrtst.show_data.active {display: block !important; background: #fff; position: absolute; z-index: 9; width: 100%;
		top: 30px; border: #e7e7e7 solid 1px; padding: 10px 10px 0px;}

	.plp_slt_readlt .stp_contetnt#tsts_mlts .hd_listst {display: flex;}
	.plp_slt_readlt .stp_contetnt#tsts_mlts .hd_listst span.srcc_barsss {float: left; font-size: 14px;}
	.plp_slt_readlt .stp_contetnt#tsts_mlts .hd_listst span.srcc_barsss input.sr_tabds {width:65%;}

	.plp_slt_readlt .stp_contetnt#tsts_mlts .hd_listst span.cartss {font-size: 15px; padding: 3px 10px; display: flex;}

	.plp_slt_readlt .stp_contetnt#tsts_mlts ul li select.al_slt_partss {width: 100%;}
	
		.qu_bx_partss .clk_btnns_plp a {font-size: 12px;}
	.qu_bx_partss .titalsss h3 {font-size: 20px;}
	.hd_listst {font-size: 14px;}
	.qu_bx_partss table tr th span.ques_top {float: initial; display: inline-block;}
}

@media (min-width: 320px) and (max-width: 480px) {
	.plp_slt_readlt .stp_contetnt#tsts_mlts ul li {margin-right:0px; margin-bottom: 10px; width: 100%;}
	.plp_slt_readlt .stp_contetnt#tsts_mlts ul li:nth-child(3) {margin: 0;}
	.plp_slt_readlt .stp_contetnt#tsts_mlts ul li:first-child {width: 100%; margin: 0 0 5px;}
	.plp_slt_readlt .stp_contetnt#tsts_mlts ul li:last-child {width: 100%; margin: 10px 0 10px;}
	.plp_slt_readlt .stp_contetnt#tsts_mlts ul li:last-child select.al_slt_partss {width:100%;}
    .slider-modal#al_supportss .slides {height: 300px;}
    .slider-modal#al_supportss .slide {height: 300px;}
    
	.multisteps-form__progress-btn {text-indent: 0;}
	#stap_fildess .multisteps-form__progress button.multisteps-form__progress-btn {font-size: 10px; line-height: 12px;}
	#stap_fildess .multisteps-form__progress button.multisteps-form__progress-btn span.cnt_numbbers {top: -1px; font-size: 12px;}
	
	
	#flt_mblss {position: relative; display:block !important;}
	.filletrr.fitter {border: #ccc solid 1px;  text-align: center; border-radius: 4px; display: block !important; width: 90px; position: absolute; top:0px; z-index:9;}
	.filletrr.fitter a {font-weight: 700; font-size: 15px; display: block; padding: 3px 0;}
	.mb_view_none {display: none !important;}

	.plp_slt_readlt .stp_contetnt#tsts_mlts .it_emms.sort_lisrtst.show_data {display: none !important;}
	.plp_slt_readlt .stp_contetnt#tsts_mlts .it_emms.sort_lisrtst.show_data.active {display: block !important;  background: #e5e5e5; position: absolute; z-index: 9;
        width: 90%; top: 35px; border: #e7e7e7 solid 1px; padding: 10px 10px 0px; left: 15px;}
		.plp_slt_readlt .stp_contetnt#tsts_mlts ul li:nth-child(1){display:none !important;}

	.plp_slt_readlt .stp_contetnt#tsts_mlts .hd_listst {display: flex;}
	.plp_slt_readlt .stp_contetnt#tsts_mlts .hd_listst span.srcc_barsss {float: left; font-size: 14px;}
	.plp_slt_readlt .stp_contetnt#tsts_mlts .hd_listst span.srcc_barsss input.sr_tabds {width: 58%;}

	.plp_slt_readlt .stp_contetnt#tsts_mlts .hd_listst span.cartss {font-size: 15px; padding: 3px 10px; display: flex;}

	.plp_slt_readlt .stp_contetnt#tsts_mlts ul li select.al_slt_partss {width: 100%;}
	
	.qu_bx_partss .clk_btnns_plp a {font-size: 12px;}
	.qu_bx_partss .titalsss h3 {font-size: 20px;}
	.hd_listst {font-size: 14px;}
	.qu_bx_partss table tr th span.ques_top {float: initial; display: inline-block;}
	.multisteps-form__content .mr_c_test.mt-0 {margin-top: 20px !important;}
	.multisteps-form__content #tsts_mlts {margin-top: 20px;}
}
</style>

<div class="slider-modal" id="al_supportss">
  <div class="close-icon modal-close"></div>
  <h5 class="title">&nbsp;</h5>
  <div class="slides">
    <div class="nav-arrow left"></div>
    <div class="nav-arrow right"></div>
    <div class="slide active" title="Image 1" style="background-image: url('https://unsplash.it/601/502')"> </div>
    <div class="slide" title="Image 2" style="background-image: url('https://unsplash.it/600/502')"> </div>
    <div class="slide" title="Image 3" style="background-image: url('https://unsplash.it/601/504')"> </div>
    <div class="slide" title="Image 4" style="background-image: url('https://unsplash.it/601/503')"> </div>
    <div class="slide" title="Image 5" style="background-image: url('https://unsplash.it/601/506')"> </div>
  </div>
</div>
<section class="tital_mg_cntss">
    <img src="{{ url('home/img/top_al_pgss.png')}}" class="bg_al_cntxt" alt="" />
    <div class="midils_contnts">
        <div class="medilss">
            <h4>Gift</h4>
            <a href="{{ url('') }}">Home</a> &gt; <span>Gift List</span>
        </div>
    </div>
</section>

<div id="stap_fildess">
<div class="multisteps-form">
 <div class="container">
        <!--progress bar-->
        <div class="row">
          <div class="col-12 col-lg-12 ml-auto mr-auto mb-4">
            <div class="multisteps-form__progress">
              <button class="multisteps-form__progress-btn js-active" type="button" title="Select Gifts">Select Gifts <span class="cnt_numbbers">1</span></button>
              <button class="multisteps-form__progress-btn" type="button" title="Than You Note">Than You Note <span class="cnt_numbbers">2</span></button>
              <button class="multisteps-form__progress-btn" type="button" title="Edit Cart">Edit Cart <span class="cnt_numbbers">3</span></button>
              <button class="multisteps-form__progress-btn" type="button" title="Make Payment">Make Payment <span class="cnt_numbbers">4</span></button>
              <button class="multisteps-form__progress-btn" type="button" title="Done">Done <span class="cnt_numbbers">5</span></button>
            </div>
          </div>
        </div>
        <!--form panels-->
        <div class="row">
          <div class="col-12 col-lg-12 m-auto">
            <form class="multisteps-form__form">
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

									<div class="col-lg-4 col-8">
										<div class="hd_listst">
										    <span class="srcc_barsss">Search: <input type="text" class="sr_tabds" placeholder="" /></span>
											<span class="cartss"><i class="fa fa-shopping-cart"></i> <span class="countss">1</span></span>
										</div>
									</div>
								</div>
							</div>

							<div class="mt-3">
								<div class="mt-4" id="tsts_mlts">
									<div class="qu_bx_partss">
										<div class="row">
											<!--- Item List --->
											<div class="col-lg-4">
												<div class="it_emms">
													<div class="ribbon-wrap">
														<div class="ribbon bg_red">Sold Out</div>
													</div>
													<input type="checkbox" class="ck_bx_box" id="ck_1" name="" />
													<label for="ck_1"></label>
													<div class="usr_mgss othr_gf"><img src="{{ url('home/img/user_testi.jpg')}}" alt="" /></div>
													<h3>Gift Name / Titile</h3>
													<p class="add-read-more show-less-content">As there are many languages in the World, you can choose from a variety of base texts so you cover not only normal letters but also accents.</p>
													<p class="mb-2"><span class="red_tx cut_pricess">Rs.299</span> Rs.199 <span class="red_tx">(Save Rs. 100/)</span></p>
													<p class="mb-3 blues_tx"><strong>For Very Limited Time</strong></p>
													<div class="snd_btnns"><a href="javascript:void(0);" class="click_m">View Gallery & Video</a></div>
												</div>
											</div>
											<!--- End Item List --->

											<!--- Item List --->
											<div class="col-lg-4">
												<div class="it_emms">
													<div class="ribbon-wrap">
														<div class="ribbon">Available</div>
													</div>
													<input type="checkbox" class="ck_bx_box" id="ck_2" name="" />
													<label for="ck_2"></label>
													<div class="usr_mgss othr_gf"><img src="{{ url('home/img/user_testi.jpg')}}" alt="" /></div>
													<h3>Gift Name / Titile</h3>
													<p class="add-read-more show-less-content">As there are many languages in the World, you can choose from a variety of base texts so you cover not only normal letters but also accents.</p>
													<p class="mb-2"><span class="red_tx cut_pricess">Rs.299</span> Rs.199 <span class="red_tx">(Save Rs. 100/)</span></p>
													<p class="mb-3 blues_tx"><strong>For Very Limited Time</strong></p>
													<div class="snd_btnns"><a href="javascript:void(0);" class="click_m">View Gallery & Video</a></div>
												</div>
											</div>
											<!--- End Item List --->

											<!--- Item List --->
											<div class="col-lg-4">
												<div class="it_emms">
													<div class="ribbon-wrap">
														<div class="ribbon bg_red">Sold Out</div>
													</div>
													<input type="checkbox" class="ck_bx_box" id="ck_3" name="" />
													<label for="ck_3"></label>
													<div class="usr_mgss othr_gf"><img src="{{ url('home/img/user_testi.jpg')}}" alt="" /></div>
													<h3>Gift Name / Titile</h3>
													<p class="add-read-more show-less-content">As there are many languages in the World, you can choose from a variety of base texts so you cover not only normal letters but also accents.</p>
													<p class="mb-2"><span class="red_tx cut_pricess">Rs.299</span> Rs.199 <span class="red_tx">(Save Rs. 100/)</span></p>
													<p class="mb-3 blues_tx"><strong>For Very Limited Time</strong></p>
													<div class="snd_btnns"><a href="javascript:void(0);" class="click_m">View Gallery & Video</a></div>
												</div>
											</div>
											<!--- End Item List --->

											<!--- Item List --->
											<div class="col-lg-4">
												<div class="it_emms">
													<div class="ribbon-wrap">
														<div class="ribbon">Available</div>
													</div>
													<input type="checkbox" class="ck_bx_box" id="ck_4" name="" />
													<label for="ck_4"></label>
													<div class="usr_mgss othr_gf"><img src="{{ url('home/img/user_testi.jpg')}}" alt="" /></div>
													<h3>Gift Name / Titile</h3>
													<p class="add-read-more show-less-content">As there are many languages in the World, you can choose from a variety of base texts so you cover not only normal letters but also accents.</p>
													<p class="mb-2"><span class="red_tx cut_pricess">Rs.299</span> Rs.199 <span class="red_tx">(Save Rs. 100/)</span></p>
													<p class="mb-3 blues_tx"><strong>For Very Limited Time</strong></p>
													<div class="snd_btnns"><a href="javascript:void(0);" class="click_m">View Gallery & Video</a></div>
												</div>
											</div>
											<!--- End Item List --->

											<!--- Item List --->
											<div class="col-lg-4">
												<div class="it_emms">
													<div class="ribbon-wrap">
														<div class="ribbon bg_red">Sold Out</div>
													</div>
													<input type="checkbox" class="ck_bx_box" id="ck_5" name="" />
													<label for="ck_5"></label>
													<div class="usr_mgss othr_gf"><img src="{{ url('home/img/user_testi.jpg')}}" alt="" /></div>
													<h3>Gift Name / Titile</h3>
													<p class="add-read-more show-less-content">As there are many languages in the World, you can choose from a variety of base texts so you cover not only normal letters but also accents.</p>
													<p class="mb-2"><span class="red_tx cut_pricess">Rs.299</span> Rs.199 <span class="red_tx">(Save Rs. 100/)</span></p>
													<p class="mb-3 blues_tx"><strong>For Very Limited Time</strong></p>
													<div class="snd_btnns"><a href="javascript:void(0);" class="click_m">View Gallery & Video</a></div>
												</div>
											</div>
											<!--- End Item List --->

											<!--- Item List --->
											<div class="col-lg-4">
												<div class="it_emms">
													<div class="ribbon-wrap">
														<div class="ribbon">Available</div>
													</div>
													<input type="checkbox" class="ck_bx_box" id="ck_6" name="" />
													<label for="ck_6"></label>
													<div class="usr_mgss othr_gf"><img src="{{ url('home/img/user_testi.jpg')}}" alt="" /></div>
													<h3>Gift Name / Titile</h3>
													<p class="add-read-more show-less-content">As there are many languages in the World, you can choose from a variety of base texts so you cover not only normal letters but also accents.</p>
													<p class="mb-2"><span class="red_tx cut_pricess">Rs.299</span> Rs.199 <span class="red_tx">(Save Rs. 100/)</span></p>
													<p class="mb-3 blues_tx"><strong>For Very Limited Time</strong></p>
													<div class="snd_btnns"><a href="javascript:void(0);" class="click_m">View Gallery & Video</a></div>
												</div>
											</div>
											<!--- End Item List --->
										</div>

										<div class="paginettoin">
											<ul>
												<li><a href="javascript:void(0);">Load More</a></li>
											</ul>
										</div>
									</div>

								</div>
							</div>
						</div>

						<div class="button-row d-flex mt-4">
							<button class="btn btn-primary ml-auto js-btn-next" type="button" title="Next">Next</button>
						</div>
					</div>
				</div>
			  <!-- End ONE STEP -->
			  
              <!-- SECEND STEP -->
              <div class="multisteps-form__panel shadow p-4 rounded bg-white" data-animation="scaleIn" >
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
				    <iframe width="100%" height="350" src="https://www.youtube.com/embed/Bw-HJ-SUfUs?si=3Pz5abevP5nb7UmH" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen=""></iframe>
				   </div>
				   
				   <div class="clk_btnns_plp">
					<a href="javascript:void(0);" onclick="openstapone1()">
					 Yes. Please Add the Thank You Card With Gifts.
					 <i class="fa fa-chevron-circle-right"></i>
					</a>
					<span class="nxt_stapss js-btn-next">No, i don't want to send a thank you letter with the gifts.</span>
				   </div>
				 </div>
				
				
				 <div class="pageform_t" id="stapone1" style="display:none;">
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
									<div class="item">
										<div class="it_emms giftts" id="bx1">
										    <!---- Tages ----> 										   
										    <div class="ribbon-wrap">
											 <div class="ribbon">Available</div>
											</div>
										    <!---- End Tages ---->
											<div class="boths_gfts">
												<div class="giftss"><img src="{{ url('home/img/gift_crd.png')}}" alt="" /></div>
												  <div id="tsts_mlts" class="gf_listst">
												   <div class="it_emms">
												   <input type="checkbox" class="ck_bx_box" id="ck_1gift" name="" />
												   <label for="ck_1gift">&nbsp;</label>
												   </div>	
												  </div>	
												<div class="qerrst"><img src="{{ url('home/img/b_qr_pay_1cr.png')}}" alt="" /></div>
											</div>
											<div class="thk_arara">
												<h2>Thanks You</h2>
												<p class="grenss_tx">XXXXXX (Name)</p>
											</div>
											<p>
												Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and
												scrambled it to make a type specimen book.
											</p>

											<div class="usr_mgss"><img src="https://1crapp.allproject.online/home/img/user_testi.jpg" alt="" /></div>
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
										<div class="it_emms giftts" id="bx2">
										    <!---- Tages ----> 										   
										    <div class="ribbon-wrap">
											 <div class="ribbon bg_red">Sold Out</div>
											</div>
										    <!---- End Tages ---->
											<div class="boths_gfts">
												<div class="giftss"><img src="{{ url('home/img/gift_crd.png')}}" alt="" /></div>
												<div id="tsts_mlts" class="gf_listst">
												   <div class="it_emms">
												   <input type="checkbox" class="ck_bx_box" id="ck_2gift" name="" />
												   <label for="ck_2gift">&nbsp;</label>
												   </div>	
												  </div>
												<div class="qerrst"><img src="{{ url('home/img/b_qr_pay_1cr.png')}}" alt="" /></div>
											</div>
											<div class="thk_arara">
												<h2>Thanks You</h2>
												<p class="grenss_tx">XXXXXX (Name)</p>
											</div>
											<p>
												Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and
												scrambled it to make a type specimen book.
											</p>

											<div class="usr_mgss"><img src="https://1crapp.allproject.online/home/img/user_testi.jpg" alt="" /></div>
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
												<div class="giftss"><img src="{{ url('home/img/gift_crd.png')}}" alt="" /></div>
												<div id="tsts_mlts" class="gf_listst">
												   <div class="it_emms">
												   <input type="checkbox" class="ck_bx_box" id="ck_3gift" name="" />
												   <label for="ck_3gift">&nbsp;</label>
												   </div>	
												  </div>
												<div class="qerrst"><img src="{{ url('home/img/b_qr_pay_1cr.png')}}" alt="" /></div>
											</div>
											<div class="thk_arara">
												<h2>Thanks You</h2>
												<p class="grenss_tx">XXXXXX (Name)</p>
											</div>
											<p>
												Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and
												scrambled it to make a type specimen book.
											</p>

											<div class="usr_mgss"><img src="https://1crapp.allproject.online/home/img/user_testi.jpg" alt="" /></div>
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
												<div class="giftss"><img src="{{ url('home/img/gift_crd.png')}}" alt="" /></div>
												<div id="tsts_mlts" class="gf_listst">
												   <div class="it_emms">
												   <input type="checkbox" class="ck_bx_box" id="ck_4gift" name="" />
												   <label for="ck_4gift">&nbsp;</label>
												   </div>	
												  </div>
												<div class="qerrst"><img src="{{ url('home/img/b_qr_pay_1cr.png')}}" alt="" /></div>
											</div>
											<div class="thk_arara">
												<h2>Thanks You</h2>
												<p class="grenss_tx">XXXXXX (Name)</p>
											</div>
											<p>
												Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and
												scrambled it to make a type specimen book.
											</p>

											<div class="usr_mgss"><img src="https://1crapp.allproject.online/home/img/user_testi.jpg" alt="" /></div>
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
												<div class="giftss"><img src="{{ url('home/img/gift_crd.png')}}" alt="" /></div>
												<div id="tsts_mlts" class="gf_listst">
												   <div class="it_emms">
												   <input type="checkbox" class="ck_bx_box" id="ck_5gift" name="" />
												   <label for="ck_5gift">&nbsp;</label>
												   </div>	
												  </div>
												<div class="qerrst"><img src="{{ url('home/img/b_qr_pay_1cr.png')}}" alt="" /></div>
											</div>
											<div class="thk_arara">
												<h2>Thanks You</h2>
												<p class="grenss_tx">XXXXXX (Name)</p>
											</div>
											<p>
												Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and
												scrambled it to make a type specimen book.
											</p>

											<div class="usr_mgss"><img src="https://1crapp.allproject.online/home/img/user_testi.jpg" alt="" /></div>
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
								</div>
							</div>
						</div>
					</div>
				  </div>
				 				  

                  
                  <div class="button-row d-flex mt-4">
                    <button class="btn btn-primary js-btn-prev" type="button" title="Prev">Prev</button>
                    <button class="btn btn-primary ml-auto js-btn-next" type="button" title="Next">Next</button>
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
									<tbody>
										<!---- Table List ---->
										<tr>
											<td>1</td>
											<td>
												Gift-01 Water Glass Designer
												<div class="slt_typess">
													<select>
														<option value="1">1</option>
														<option value="2">2</option>
														<option value="3">3</option>
														<option value="4">4</option>
														<option value="5">5</option>
														<option value="6">6</option>
													</select>
												</div>
											</td>
											<td>
												<span class="p_cuss">Rs.590</span> <span class="red_tx"><strong>Rs.300</strong></span>
											</td>
											<td>
												TYC Design -1
												<div class="slt_typess">
													<select>
														<option value="1">1</option>
														<option value="2">2</option>
														<option value="3">3</option>
														<option value="4">4</option>
														<option value="5">5</option>
														<option value="6">6</option>
													</select>
												</div>
											</td>
											<td>
												<span class="p_cuss">Rs.10</span> <span class="red_tx"><strong>Rs.7</strong></span>
											</td>
											<td>
												<span class="add_data">&nbsp;</span>
												<div id="dataadss">
													<div class="bell"><i class="fa fa-angle-down"></i></div>
													<div class="scope">
														After <span class="tx"><input type="text" class="inp_unddds" placeholder="XXX" /></span> Days
													</div>
												</div>
											</td>
										</tr>
										<!---- End Table List ---->
									</tbody>
								</table>
							</div>
						</div>
						<div class="row">
							<div class="button-row d-flex mt-4 col-12">
								<button class="btn btn-primary js-btn-prev" type="button" title="Prev">Prev</button>
								<button class="btn btn-primary ml-auto js-btn-next" type="button" title="Next">Next</button>
							</div>
						</div>
					</div>
				</div>
			  <!-- End Thards -->
			  
			  <div class="multisteps-form__panel shadow p-4 rounded bg-white" data-animation="scaleIn">
                <div class="multisteps-form__content">
                  <div class="qu_bx_partss">
							<div class="table-responsive">
								<table class="table table-bordered">
									<thead>
										<tr>
											<th>S.No.</th>
											<th>Items </th>
											<th>QTY Per Customer <span class="ques_top" data-toggle="tooltip" data-placement="right" title="Hooray!">?</span></th>
											<th>No of Customer <span class="ques_top" data-toggle="tooltip" data-placement="right" title="Hooray!">?</span></th>
											<th>Item Prices <span class="ques_top" data-toggle="tooltip" data-placement="right" title="Hooray!">?</span></th>
										</tr>
									</thead>
									<tbody>
										<!---- Table List ---->
										<tr>
											<td>1</td>
											<td>Gift</td>
											<td>6</td>
											
											<td>
												<span class="add_data">&nbsp;</span>
												<div id="dataadss">
													<div class="bell"><i class="fa fa-angle-down"></i></div>
													<div class="scope">
													<span class="tx"><input type="text" class="inp_unddds" placeholder="XXX" /></span> 
													</div>
												</div>
											</td>
											<td>
												Rs. 4.100.00
											</td>
										</tr>
										<!---- End Table List ---->
										
										<!---- Table List ---->
										<tr>
											<td>2</td>
											<td>Gift</td>
											<td>6</td>
											
											<td>
												&nbsp;
											</td>
											<td>
												Rs. 1200.00
											</td>
										</tr>
										<!---- End Table List ---->

										<!---- Table List ---->
										<tr>
											<td colspan="3" align="right"><strong>Sub Total</strong></td>
											
											<td>
												&nbsp;
											</td>
											<td>
												Rs. 41000.00
											</td>
										</tr>
										<!---- End Table List ---->

										<!---- Table List ---->
										<tr>
											<td colspan="4" align="right"><strong>Pay Now only (For Limited Time Offer) </strong></td>
											
											<td>
												<span class="p_cuss">Rs.41000.00</span> <span class="red_tx"><strong>Rs.29000</strong></span>
											</td>
										</tr>
										<!---- End Table List ---->
										
										<!---- Table List ---->
										<tr>
											<td colspan="4" align="right" class="red_tx"><strong>Your Total Saving for Today</strong> </td>
											<td class="red_tx">
												<strong>Rs. 1.233</strong>
											</td>
										</tr>
										<!---- End Table List ---->
										
										<!---- Table List ---->
										<tr>
											<td colspan="4" align="right">GST Taxes (18%) <span class="ques_top" data-toggle="tooltip" data-placement="right" title="Hooray!">?</span></td>
											<td>
												Rs. 530
											</td>
										</tr>
										<!---- End Table List ---->
										
										<!---- Table List ---->
										<tr>
											<td colspan="4" align="right">Courier Charges <span class="ques_top" data-toggle="tooltip" data-placement="right" title="Hooray!">?</span></td>
											<td>
												Rs. 300
											</td>
										</tr>
										<!---- End Table List ---->
										
										<!---- Table List ---->
										<tr>
											<td colspan="4" align="right">Handing Charges <span class="ques_top" data-toggle="tooltip" data-placement="right" title="Hooray!">?</span></td>										
											<td>
												Rs. 211
											</td>
										</tr>
										<!---- End Table List ---->
										
										<tr>
											<th colspan="4" class="text-right" align="right">Gross Amount Payable Now </th>
											<th>Rs. 4,036 </th>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
						<div class="row">
							<div class="button-row d-flex mt-4 col-12">
								<button class="btn btn-primary js-btn-prev" type="button" title="Prev">Prev</button>
								<button class="btn btn-primary ml-auto js-btn-next" type="button" title="Next">Next</button>
							</div>
						</div>
                </div>
              </div>
              <!--single form panel-->
              <div class="multisteps-form__panel shadow p-4 rounded bg-white" data-animation="scaleIn">
                <div class="multisteps-form__content">
					<div class="plp_scriptss">
						<div class="container mt-5">
							<div class="stp_contetnt mb-0 text-center">
								<div class="congrat_mgs"><img src="{{ url('home/img/congra_mgs.jpg')}}" alt="" /></div>
								<p><span class="nxt_block grenss_tx">Congratulations</span> <span class="red_tx">Mr. YYYYYYYYYYY</span></p>
								<h5>Your PLP Has Been Sent to Realtors. they are woking on it to find your best properties and offer you the best Proposal.</h5>
							</div>
						</div>

						<!-- Video Elements -->
						<section class="vedioo plp_introlls" id="tsts_mlts">
							<div class="container">
								<h4 class="mb-4"><span class="nxt_block red_tx mb-3">What Next?</span> Please watch the Vedio Below.</h4>

								<div class="video_parts">
									<video id="video" controls="controls" preload="none" poster="{{ url('home/img/vdo_mg.png')}}">
										<source id="mp4" src="{{ url('home/img/vdiio.mp4')}}" type="video/mp4" />
									</video>
								</div>
							</div>
							<div class="mr_c_test mt-0">
								<a href="{{ url('login') }}" class="alluser">Visit Your Dashboard <i class="fa fa-arrow-circle-o-right"></i></a>
							</div>
						</section>
						<!-- End Video Elements -->

						<div class="container">
							<div class="sco_tx_cnt">
								<p>Please Jion & Follow us best insights, tips, tricks and Strategies on Real Estate Cash Flow properties & Inside Investments Mastery related Knowledge.</p>

								<div class="social_lk_partss">
									<a href="javascript:void(0);"><i class="fa fa-facebook"></i></a>
									<a href="javascript:void(0);"><i class="fa fa-instagram"></i></a>
									<a href="javascript:void(0);"><i class="fa fa-youtube-play"></i></a>
									<a href="javascript:void(0);"><i class="fa fa-linkedin"></i></a>
									<a href="javascript:void(0);"><i class="fa fa-twitter"></i></a>
									<a href="javascript:void(0);"><i class="fa fa-whatsapp"></i></a>
									<a href="javascript:void(0);"><i class="fa fa-google-plus"></i></a>
								</div>
							</div>
						</div>
					</div>	
                  <!---<div class="button-row d-flex mt-4">
                    <button class="btn btn-primary js-btn-prev" type="button" title="Prev">Prev</button>
                    <button class="btn btn-success ml-auto" type="button" title="Send">Send</button>
                  </div>--->
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
      </div>
</div>

<script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();   
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
function openstapone() {
  $('.pageform_t').hide();
  $('#stapone').show();
}

function openstapone1() {
 $('.pageform_t').hide();
 $('#stapone1').show();
}

function opensprossnav() {
 $('.pageform_t').hide();
  $('#stapone1').show();
 $('#pross_nevs').show();
}

function openstapone2() {
 $('.pageform_t').hide();
 $('#stapone2').show();
}

function openstapone3() {
 $('.pageform_t').hide();
 $('#stapone3').show();
}

</script>


@include('front.layouts.footer')


