@include('web.common.header')
   
<style>
table.table.table-bordered.tst_cam_listst tr th {
    border-top: #dddddd solid 1px;
}
table.table.table-bordered.tst_cam_listst tr td {
    vertical-align: middle;
    font-size: 13px;
}
table.table.table-bordered.tst_cam_listst span.sm_btnsss {
    background: #000;
    color: #fff;
    padding: 2px 5px;
    border-radius: 5px;
}
table.table.table-bordered.tst_cam_listst tr td a.link {
    margin-right: 6px;
}
table.table.table-bordered.tst_cam_listst tr td a.link:last-child{margin-right:0px;}
table.table.table-bordered.tst_cam_listst tr td i.fa.fa-star {
    color: #ffbf00;
}
.h_titless {
    margin-bottom: 15px;
    font-size: 22px;
    font-weight: 700;
    color: #000;
}

.switch {
    display: inline-block;
    position: relative;
    width: 50px;
    height: 25px;
    border-radius: 20px;
    background: #ff0000;
    transition: background 0.28s cubic-bezier(0.4, 0, 0.2, 1);
    vertical-align: middle;
    cursor: pointer;
    margin: 0;
}
.switch::before {
    content: '';
    position: absolute;
    top: 1px;
    left: 2px;
    width: 22px;
    height: 22px;
    background: #fafafa;
    border-radius: 50%;
    transition: left 0.28s cubic-bezier(0.4, 0, 0.2, 1), background 0.28s cubic-bezier(0.4, 0, 0.2, 1), box-shadow 0.28s cubic-bezier(0.4, 0, 0.2, 1);
}
.switch:active::before {
    box-shadow: 0 2px 8px rgba(0,0,0,0.28), 0 0 0 20px rgba(128,128,128,0.1);
}
input:checked + .switch {
    background: #72da67;
}
input:checked + .switch::before {
    left: 27px;
    background: #fff;
}
input:checked + .switch:active::before {
    box-shadow: 0 2px 8px rgba(0,0,0,0.28), 0 0 0 20px rgba(0,150,136,0.2);
}
.h_titless.ads_buttnss {
    display: block;
    width: 100%;
    position: relative;
}
.h_titless.ads_buttnss .ad_item_lst {
    float: right;
}
.h_titless.ads_buttnss .ad_item_lst a {
    background: #1c5299;
    padding: 5px 20px;
    display: inline-block;
    color: #fff;
    border-radius: 4px;
}
</style>


<section class="dash_board_pages">
  <div class="container">
    <div class="main_part_con_lis_cret pageform_t" id="stapone">
    <div class="h_titless">Contact List Create</div> 
	<div class="con_lis_box_cre">
	  <div class="un_titlss_bx">
	   <h4>Add List</h4>
	   <div class="form-group">
         <label>Title</label>
         <input type="text" name="" value="" class="form-control part_parsentss" placeholder="List Name" required="">
       </div>
	   <a href="javascript:void(0);" class="click_saveeses" onclick="openstapone1()">Save</a>
	  </div>	  
	</div>
	</div>
	
	
	
    <div class="main_part_con_lis_cret pageform_t" id="stapone1" style="display:none;">
    <div class="h_titless">Home / Add Contacts To List</div> 
	<div class="con_lis_box_cre">
	  <div class="un_titlss_bx">
	   <h4>Add Contacts To List - List Name-A</h4>
	   <div class="form-group">
         <label>Tags</label>
		 <div class="ck_bx_etemss">
          <input type="checkbox" id="dem_1" name="Demo" value="">
		  <label for="dem_1"> Demo Tag Now</label>
		  <input type="checkbox" id="dem_2" name="Demo" value="">
		  <label for="dem_2"> Demo Tag Ramjee</label>
		  <input type="checkbox" id="dem_3" name="Demo" value="">
		  <label for="dem_3"> Exlude Tags</label>
		 </div> 
       </div>
<div class="row">
 <div class="col-lg-6">
  <div class="form-group">
         <label>Registered After</label>
         <input type="date" name="" value="" class="form-control part_parsentss" placeholder="List Name" required="">
       </div>
 </div>

 <div class="col-lg-6">
  <div class="form-group">
         <label>Registered Before</label>
         <input type="date" name="" value="" class="form-control part_parsentss" placeholder="List Name" required="">
       </div>
 </div>
 
  <div class="col-lg-6">
<div class="form-group">
         <label>Show Items</label>
         <select class="form-control part_parsentss">
		  <option value="1">10</option>
		 </select>
       </div>
</div>

 <div class="col-lg-6">
<div class="form-group">
         <label>Sort By</label>
         <select class="form-control part_parsentss">
		  <option value="1">Name Ascending</option>
		  <option value="2">Name Descending</option>
		  <option value="3">Last Update Ascending</option>
		  <option value="4">Last Descending Ascending</option>
		 </select>
       </div>
</div>

 <div class="col-lg-6">
	   <div class="form-group">
         <label>Filter By Name</label>
         <select class="form-control part_parsentss">
		  <option value="1">COD</option>
		  <option value="2">Active</option>
		  <option value="3">Inactive</option>
		 </select>
       </div>
</div>


<div class="col-lg-12 mt-4">
  <a href="javascript:void(0);" class="click_saveeses" onclick="openstapone2()">Search</a>
</div> 
</div>







</div>
	   

	   

	   

	   
	   

	  
	  </div>	  
	</div>

	
	
	<div class="main_part_con_lis_cret pageform_t mt-5" id="stapone2" style="display:none;">
     <div class="h_titless con_ti_d_show"><span class="slt_alls">Select All</span>
	 
	 <div id="divcheck" style="display:none;">
	  <a href="https://1crapp.allproject.online/contact-list" class="ad_cnt_lisstst">
	   Add Contacts To List
	  </a>
	</div>
	 </div> 
	 <div class="con_lis_box_cre">
	  <div class="table-responsive">
		<table class="table table-bordered tst_cam_listst mb-0" style="background: #fff;">
			<tbody>
				<tr>
					<td><input type="checkbox" id="" name="Demo" value="" onclick="checkMe(this.checked);" /></td>
					<td><strong>1CRAPP-00025<strong></td>
					<td>Mr.Ramraj Meena</td>
					<td>ramraj17@gmail.com</td>
					<td>1234567890</td>
					<td>IOCL PNP Refinery</td>                
				</tr>

				<tr>
					<td><input type="checkbox" id="" name="Demo" value=""></td>
					<td><strong>1CRAPP-00025<strong></td>
					<td>Mr.Ramraj Meena</td>
					<td>ramraj17@gmail.com</td>
					<td>1234567890</td>
					<td>IOCL PNP Refinery</td>                
				</tr>
			</tbody>
		</table>
	  </div>
	 </div>
	</div>
	


  </div>
</section>

<script>
function checkMe(selected) {
    if (selected) {
        document.getElementById("divcheck").style.display = "";
    } else {
        document.getElementById("divcheck").style.display = "none";
    }
}
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
 $('#stapone1').show();
 
}

function openstapone3() {
 $('.pageform_t').hide();
 $('#stapone3').show();
}

</script>




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