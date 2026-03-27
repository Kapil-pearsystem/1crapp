
@include('web.common.header')

<style>
.rev_contents {text-align:center; max-width:800px; font-size:34px; margin:0 auto; font-weight:800; text-transform:uppercase; width:100%; margin-bottom:30px;}

.rvu_hediidngs {display: inline-block; width: 100%;}
.rvu_hediidngs h3 {margin:0 0 10px; font-size:22px; font-weight:600; color:#000;}
.rvu_hediidngs p {font-size:15px; margin:0;}

.rev_btnns {display: inline-block; width: 100%;}
.rev_btnns a {background:#1c5299; display:inline-block; width:100%; text-align:center; padding:10px 10px; color:#fff; font-size:16px; font-weight:600;
    border-radius:6px;}
	
	
.rv_box_araea {
    border: #e5e5e5 solid 1px;
    border-radius: 10px;
    box-shadow: 0px 0px 10px #e9e9e9;
    padding: 15px;
    display: inline-block;
    width: 100%;
	margin-top:30px;
}
.rv_box_araea .tp_area_sorts {
    display: inline-block;
    width: 100%;
    margin-bottom: 15px;
}
.rv_box_araea .tp_area_sorts .mg_areas {
    width: 40px;
    height: 40px;
    overflow: hidden;
    border: #ebebeb solid 1px;
    border-radius: 90px;
	float: left;
    margin-right: 10px;
}
.rv_box_araea .tp_area_sorts .mg_areas img {
    width: 100%;
}	

.rv_box_araea .tp_area_sorts .usr_cnt_partss {
    float: left;
    max-width: 200px;
    width: 100%;
}
.rv_box_araea .tp_area_sorts .usr_cnt_partss h4 {
    margin: 0 0 3px;
    font-size: 16px;
    font-weight: 700;
}
.rv_box_araea .tp_area_sorts .usr_cnt_partss p {
    margin: 0;
    font-weight: 500;
    font-size: 13px;
}

.rv_box_araea .tp_area_sorts .rt_silogan_parts {
    float: right;
	width: 40px;
    height: 40px;
    overflow: hidden;
    border: #ebebeb solid 1px;
    border-radius: 90px;
}
.rv_box_araea .tp_area_sorts .rt_silogan_parts img {
    width: 100%;
}	

.rv_box_araea .txt_btmss {
    display: inline-block;
    width: 100%;
}
.rv_box_araea .txt_btmss .rv_str {
    margin-bottom: 5px;
    margin-top:1px;
}
.rv_box_araea .txt_btmss .rv_str i {
    color: #ffc747;
    font-size: 15px;
}
.rv_box_araea .txt_btmss p {
    margin: 0;
}

.rv_paginetions {
    display: inline-block;
    width: 100%;
    margin-top: 30px;
}
.rv_paginetions ul {
    display: table;
    margin: 0 auto;
    background: #1c5299;
    padding: 7px 15px;
	list-style: none;
}
.rv_paginetions ul li {
    float: left;
    margin-right: 10px;
}
.rv_paginetions ul li:last-child {
    margin-right: 0px;
}
.rv_paginetions ul li a {
    background: #fff;
    padding: 4px 12px;
    display: inline-block;
    font-size: 16px;
    font-weight: 500;
    width: 30px;
    height: 30px;
    line-height: 23px;
}

.rv_paginetions ul li a:hover {
    background: #f94554;
    color: #fff;
}

.rv_paginetions ul li a:hover i {
    background: #f94554;
    color: #fff;
}
.rv_paginetions ul li a i {
    position: relative;
    top: 2px;
}


.blk_araes{display:block;}
.mngss {width: auto !important;}
.red_tx {color:#f94554 !important;}
.blues_tx {color:#1c5299 !important;}
.grenss_tx {color:#20b450 !important;}
.yel_txt {color: #ddb806 !important;}
</style>

<section class="tital_mg_cntss">
    <img src="{{ url('home/img/top_al_pgss.png')}}" class="bg_al_cntxt" alt="" />
    <div class="midils_contnts">
        <div class="medilss">
            <h4>Google & Trust Pilot Reviews</h4>
            <a href="{{ url('') }}">Home</a> &gt; <span>Reviews</span>
        </div>
    </div>
</section>


<div class="plp_scriptss">
    <div class="container mt-5">
        <div class="rev_contents">
		 Here you can see, how our Customers are <span class="red_tx"><u>Happy</u></span> and <span class="red_tx"><u>Satisfied</u></span> with 1CR APP. 
		</div>
    </div>
	
	<div class="container mt-5">
	 <div class="row">
	  <div class="col-lg-10">
	   <div class="rvu_hediidngs">
	    <h3>Thousands of Raving Customers</h3>
		<p>4.9 rating of 39 reviews</p>
	   </div>
	  </div>
	  <div class="col-lg-2">
	   <div class="rev_btnns">
	    <a href="javascript:void(0);">Write a review</a>
	   </div>
	  </div>
	 </div>
	 
	 <div class="row mt-2">
	  <!--- Reviews List ---->
	  <div class="col-lg-4">
	   <div class="rv_box_araea">
	    <div class="tp_area_sorts">
	     <div class="mg_areas"><img src="{{ url('home/img/user_testi.jpg')}}" alt="" /></div>
		 <div class="usr_cnt_partss">
		  <h4>Maria Kosgaard</h4>
		  <p>15/08/2021</p>
		 </div>
		 <div class="rt_silogan_parts"><img src="{{ url('home/img/logo 1.png')}}" alt="" /></div>
		</div>
		<div class="txt_btmss">
		<div class="rv_str">
		 <i class="fa fa-star"></i>
		 <i class="fa fa-star"></i>
		 <i class="fa fa-star"></i>
		 <i class="fa fa-star"></i>
		 <i class="fa fa-star-o"></i>
		</div>
		<p>The host was waiting for us and was very polite and helpful. Apartments are amazing?</p>
		</div>
	   </div>
	  </div>
	  <!--- End Reviews List ---->

	  <!--- Reviews List ---->
	  <div class="col-lg-4">
	   <div class="rv_box_araea">
	    <div class="tp_area_sorts">
	     <div class="mg_areas"><img src="{{ url('home/img/user_testi.jpg')}}" alt="" /></div>
		 <div class="usr_cnt_partss">
		  <h4>Maria Kosgaard</h4>
		  <p>15/08/2021</p>
		 </div>
		 <div class="rt_silogan_parts"><img src="{{ url('home/img/logo 1.png')}}" alt="" /></div>
		</div>
		<div class="txt_btmss">
		<div class="rv_str">
		 <i class="fa fa-star"></i>
		 <i class="fa fa-star"></i>
		 <i class="fa fa-star"></i>
		 <i class="fa fa-star"></i>
		 <i class="fa fa-star-o"></i>
		</div>
		<p>The host was waiting for us and was very polite and helpful. Apartments are amazing?</p>
		</div>
	   </div>
	  </div>
	  <!--- End Reviews List ---->

	  <!--- Reviews List ---->
	  <div class="col-lg-4">
	   <div class="rv_box_araea">
	    <div class="tp_area_sorts">
	     <div class="mg_areas"><img src="{{ url('home/img/user_testi.jpg')}}" alt="" /></div>
		 <div class="usr_cnt_partss">
		  <h4>Maria Kosgaard</h4>
		  <p>15/08/2021</p>
		 </div>
		 <div class="rt_silogan_parts"><img src="{{ url('home/img/logo 1.png')}}" alt="" /></div>
		</div>
		<div class="txt_btmss">
		<div class="rv_str">
		 <i class="fa fa-star"></i>
		 <i class="fa fa-star"></i>
		 <i class="fa fa-star"></i>
		 <i class="fa fa-star"></i>
		 <i class="fa fa-star-o"></i>
		</div>
		<p>The host was waiting for us and was very polite and helpful. Apartments are amazing?</p>
		</div>
	   </div>
	  </div>
	  <!--- End Reviews List ---->

	  <!--- Reviews List ---->
	  <div class="col-lg-4">
	   <div class="rv_box_araea">
	    <div class="tp_area_sorts">
	     <div class="mg_areas"><img src="{{ url('home/img/user_testi.jpg')}}" alt="" /></div>
		 <div class="usr_cnt_partss">
		  <h4>Maria Kosgaard</h4>
		  <p>15/08/2021</p>
		 </div>
		 <div class="rt_silogan_parts"><img src="{{ url('home/img/logo 1.png')}}" alt="" /></div>
		</div>
		<div class="txt_btmss">
		<div class="rv_str">
		 <i class="fa fa-star"></i>
		 <i class="fa fa-star"></i>
		 <i class="fa fa-star"></i>
		 <i class="fa fa-star"></i>
		 <i class="fa fa-star-o"></i>
		</div>
		<p>The host was waiting for us and was very polite and helpful. Apartments are amazing?</p>
		</div>
	   </div>
	  </div>
	  <!--- End Reviews List ---->

	  <!--- Reviews List ---->
	  <div class="col-lg-4">
	   <div class="rv_box_araea">
	    <div class="tp_area_sorts">
	     <div class="mg_areas"><img src="{{ url('home/img/user_testi.jpg')}}" alt="" /></div>
		 <div class="usr_cnt_partss">
		  <h4>Maria Kosgaard</h4>
		  <p>15/08/2021</p>
		 </div>
		 <div class="rt_silogan_parts"><img src="{{ url('home/img/logo 1.png')}}" alt="" /></div>
		</div>
		<div class="txt_btmss">
		<div class="rv_str">
		 <i class="fa fa-star"></i>
		 <i class="fa fa-star"></i>
		 <i class="fa fa-star"></i>
		 <i class="fa fa-star"></i>
		 <i class="fa fa-star-o"></i>
		</div>
		<p>The host was waiting for us and was very polite and helpful. Apartments are amazing?</p>
		</div>
	   </div>
	  </div>
	  <!--- End Reviews List ---->

	  <!--- Reviews List ---->
	  <div class="col-lg-4">
	   <div class="rv_box_araea">
	    <div class="tp_area_sorts">
	     <div class="mg_areas"><img src="{{ url('home/img/user_testi.jpg')}}" alt="" /></div>
		 <div class="usr_cnt_partss">
		  <h4>Maria Kosgaard</h4>
		  <p>15/08/2021</p>
		 </div>
		 <div class="rt_silogan_parts"><img src="{{ url('home/img/logo 1.png')}}" alt="" /></div>
		</div>
		<div class="txt_btmss">
		<div class="rv_str">
		 <i class="fa fa-star"></i>
		 <i class="fa fa-star"></i>
		 <i class="fa fa-star"></i>
		 <i class="fa fa-star"></i>
		 <i class="fa fa-star-o"></i>
		</div>
		<p>The host was waiting for us and was very polite and helpful. Apartments are amazing?</p>
		</div>
	   </div>
	  </div>
	  <!--- End Reviews List ---->

	  <!--- Reviews List ---->
	  <div class="col-lg-4">
	   <div class="rv_box_araea">
	    <div class="tp_area_sorts">
	     <div class="mg_areas"><img src="{{ url('home/img/user_testi.jpg')}}" alt="" /></div>
		 <div class="usr_cnt_partss">
		  <h4>Maria Kosgaard</h4>
		  <p>15/08/2021</p>
		 </div>
		 <div class="rt_silogan_parts"><img src="{{ url('home/img/logo 1.png')}}" alt="" /></div>
		</div>
		<div class="txt_btmss">
		<div class="rv_str">
		 <i class="fa fa-star"></i>
		 <i class="fa fa-star"></i>
		 <i class="fa fa-star"></i>
		 <i class="fa fa-star"></i>
		 <i class="fa fa-star-o"></i>
		</div>
		<p>The host was waiting for us and was very polite and helpful. Apartments are amazing?</p>
		</div>
	   </div>
	  </div>
	  <!--- End Reviews List ---->

	  <!--- Reviews List ---->
	  <div class="col-lg-4">
	   <div class="rv_box_araea">
	    <div class="tp_area_sorts">
	     <div class="mg_areas"><img src="{{ url('home/img/user_testi.jpg')}}" alt="" /></div>
		 <div class="usr_cnt_partss">
		  <h4>Maria Kosgaard</h4>
		  <p>15/08/2021</p>
		 </div>
		 <div class="rt_silogan_parts"><img src="{{ url('home/img/logo 1.png')}}" alt="" /></div>
		</div>
		<div class="txt_btmss">
		<div class="rv_str">
		 <i class="fa fa-star"></i>
		 <i class="fa fa-star"></i>
		 <i class="fa fa-star"></i>
		 <i class="fa fa-star"></i>
		 <i class="fa fa-star-o"></i>
		</div>
		<p>The host was waiting for us and was very polite and helpful. Apartments are amazing?</p>
		</div>
	   </div>
	  </div>
	  <!--- End Reviews List ---->

	  <!--- Reviews List ---->
	  <div class="col-lg-4">
	   <div class="rv_box_araea">
	    <div class="tp_area_sorts">
	     <div class="mg_areas"><img src="{{ url('home/img/user_testi.jpg')}}" alt="" /></div>
		 <div class="usr_cnt_partss">
		  <h4>Maria Kosgaard</h4>
		  <p>15/08/2021</p>
		 </div>
		 <div class="rt_silogan_parts"><img src="{{ url('home/img/logo 1.png')}}" alt="" /></div>
		</div>
		<div class="txt_btmss">
		<div class="rv_str">
		 <i class="fa fa-star"></i>
		 <i class="fa fa-star"></i>
		 <i class="fa fa-star"></i>
		 <i class="fa fa-star"></i>
		 <i class="fa fa-star-o"></i>
		</div>
		<p>The host was waiting for us and was very polite and helpful. Apartments are amazing?</p>
		</div>
	   </div>
	  </div>
	  <!--- End Reviews List ---->
	 </div>
	 
	 <div class="rv_paginetions">
	  <ul>
	   <li><a href="javascript:void(0);"><i class="fa fa-angle-double-left"></i></a></li>
	   <li><a href="javascript:void(0);">1</a></li>
	   <li><a href="javascript:void(0);">2</a></li>
	   <li><a href="javascript:void(0);">3</a></li>
	   <li><a href="javascript:void(0);">4</a></li>
	   <li><a href="javascript:void(0);"><i class="fa fa-angle-double-right"></i></a></li>
	  </ul>
	 </div>
	 
	</div>
</div>

<!--- What clients are saying about our 1cr app --->
    @include('web.pages.what-client-are-saying')
<!--- End What clients are saying about our 1cr app --->


<!---- Get Started. It's Free ---->
<section class="get_nd_blogss mt-0">
 <div class="container">
  <div class="get_strs">
   <h4><a href="javascript:void(0);">Get Started. It's Free.</a></h4>
   <p>No Credit Card required. Free Forever. no trial Period.</p>
   <p>Join Now. 500+ People Are Alredy Part Of This Amazing Tools.</p>
  </div>
  </div>
</section>
<!---- End Get Started. It's Free ---->



<!---- Help ---->
<section class="al_sec_araea mt_50p pb-0">
<div class="container">
    <div class="row mt-4">
        <div class="col-12 col-sm-12">
            <div class="row mb-4">
                <div class="col-lg-12">
                    <div class="alss_pagess" id="alss_pgesss">
                        <h3>Need Help?</h3>

                        <p>Explore our resources to quickly get started with Flowlu business management software</p>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="hpls_box">
                        <div class="ovr_centetent">
                            <p>Book online demo</p>

                            <a href="javascript:void(0);">Get a demo</a>
                        </div>

                        <img src="{{ url('home/img/hlp_1.png')}}" alt="" />
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="hpls_box">
                        <div class="ovr_centetent">
                            <p>Find the answers</p>

                            <a href="javascript:void(0);">Knowledge base</a>
                        </div>

                        <img src="{{ url('home/img/hlp_2.png')}}" alt="" />
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="hpls_box">
                        <div class="ovr_centetent">
                            <p>Ask questions</p>

                            <a href="javascript:void(0);">Support chat</a>
                        </div>

                        <img src="{{ url('home/img/hlp_3.png')}}" alt="" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</section>
<!---- Help ---->




<script>
 //DOM elements
const DOMstrings = {
  stepsBtnClass: 'multisteps-form__progress-btn',
  stepsBtns: document.querySelectorAll(`.multisteps-form__progress-btn`),
  stepsBar: document.querySelector('.multisteps-form__progress'),
  stepsForm: document.querySelector('.multisteps-form__form'),
  stepsFormTextareas: document.querySelectorAll('.multisteps-form__textarea'),
  stepFormPanelClass: 'multisteps-form__panel',
  stepFormPanels: document.querySelectorAll('.multisteps-form__panel'),
  stepPrevBtnClass: 'js-btn-prev',
  stepNextBtnClass: 'js-btn-next' };


//remove class from a set of items
const removeClasses = (elemSet, className) => {

  elemSet.forEach(elem => {

    elem.classList.remove(className);

  });

};

//return exect parent node of the element
const findParent = (elem, parentClass) => {

  let currentNode = elem;

  while (!currentNode.classList.contains(parentClass)) {
    currentNode = currentNode.parentNode;
  }

  return currentNode;

};

//get active button step number
const getActiveStep = elem => {
  return Array.from(DOMstrings.stepsBtns).indexOf(elem);
};

//set all steps before clicked (and clicked too) to active
const setActiveStep = activeStepNum => {

  //remove active state from all the state
  removeClasses(DOMstrings.stepsBtns, 'js-active');

  //set picked items to active
  DOMstrings.stepsBtns.forEach((elem, index) => {

    if (index <= activeStepNum) {
      elem.classList.add('js-active');
    }

  });
};

//get active panel
const getActivePanel = () => {

  let activePanel;

  DOMstrings.stepFormPanels.forEach(elem => {

    if (elem.classList.contains('js-active')) {

      activePanel = elem;

    }

  });

  return activePanel;

};

//open active panel (and close unactive panels)
const setActivePanel = activePanelNum => {

  //remove active class from all the panels
  removeClasses(DOMstrings.stepFormPanels, 'js-active');

  //show active panel
  DOMstrings.stepFormPanels.forEach((elem, index) => {
    if (index === activePanelNum) {

      elem.classList.add('js-active');

      setFormHeight(elem);

    }
  });

};

//set form height equal to current panel height
const formHeight = activePanel => {

  const activePanelHeight = activePanel.offsetHeight;

  DOMstrings.stepsForm.style.height = `${activePanelHeight}px`;

};

const setFormHeight = () => {
  const activePanel = getActivePanel();

  formHeight(activePanel);
};

//STEPS BAR CLICK FUNCTION
DOMstrings.stepsBar.addEventListener('click', e => {

  //check if click target is a step button
  const eventTarget = e.target;

  if (!eventTarget.classList.contains(`${DOMstrings.stepsBtnClass}`)) {
    return;
  }

  //get active button step number
  const activeStep = getActiveStep(eventTarget);

  //set all steps before clicked (and clicked too) to active
  setActiveStep(activeStep);

  //open active panel
  setActivePanel(activeStep);
});

//PREV/NEXT BTNS CLICK
DOMstrings.stepsForm.addEventListener('click', e => {

  const eventTarget = e.target;

  //check if we clicked on `PREV` or NEXT` buttons
  if (!(eventTarget.classList.contains(`${DOMstrings.stepPrevBtnClass}`) || eventTarget.classList.contains(`${DOMstrings.stepNextBtnClass}`)))
  {
    return;
  }

  //find active panel
  const activePanel = findParent(eventTarget, `${DOMstrings.stepFormPanelClass}`);

  let activePanelNum = Array.from(DOMstrings.stepFormPanels).indexOf(activePanel);

  //set active step and active panel onclick
  if (eventTarget.classList.contains(`${DOMstrings.stepPrevBtnClass}`)) {
    activePanelNum--;

  } else {

    activePanelNum++;

  }

  setActiveStep(activePanelNum);
  setActivePanel(activePanelNum);

});

//SETTING PROPER FORM HEIGHT ONLOAD
window.addEventListener('load', setFormHeight, false);

//SETTING PROPER FORM HEIGHT ONRESIZE
window.addEventListener('resize', setFormHeight, false);

//changing animation via animation select !!!YOU DON'T NEED THIS CODE (if you want to change animation type, just change form panels data-attr)

const setAnimationType = newType => {
  DOMstrings.stepFormPanels.forEach(elem => {
    elem.dataset.animation = newType;
  });
};

//selector onchange - changing animation
const animationSelect = document.querySelector('.pick-animation__select');

animationSelect.addEventListener('change', () => {
  const newAnimationType = animationSelect.value;

  setAnimationType(newAnimationType);
});
</script>

@include('front.layouts.footer')