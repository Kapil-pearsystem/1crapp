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


#onecrappfeedback .h_titless {
    text-align: center;
    margin-bottom: 25px;
}
#onecrappfeedback .h_titless h3 {
    margin: 0 0 10px;
    font-size: 26px;
    font-weight: 700;
}
#onecrappfeedback .h_titless p {
    margin: 0 0 10px;
    font-size: 18px;
    font-weight: 500;
}
#onecrappfeedback .ra_stapsss {
    background: #f94554;
    font-size: 12px;
    color: #fff;
    text-align: center;
    padding: 10px 0;
    margin-bottom: 30px;
}

.numeric_numer {
    margin-bottom: 40px;
}
.numeric_numer .input-box {
  display: block;
  text-align: left;
}
.numeric_numer h2 {
  display: none;
    font-size: 16px;
    font-weight: 600;
    text-align: center;
    margin: 0;
}
.numeric_numer .sr_medilss {
    display: table;
    width: auto;
    margin: 0 auto;
	    font-weight: 700;
}
.numeric_numer .sr_medilss h2 {
    float: right;
    position: relative;
    top: 4px;
    left: 5px;
}
.numeric_numer tr th{text-align:center;}
.numeric_numer tr td {width: 25%; text-align:center;}
.numeric_numer tr td label {width: 100%; text-align:center; cursor: pointer; font-size: 16px;  color: #000; margin: 0;}
.numeric_numer tr td label input {opacity: 0;}
.red_bg {background: #FF0000;}
.yl_bg {background: #FFA500;}
.gr_l_bg {background: #96CD32;}
.gr_d_bg {background: #5A9B5A;}

.al_sp_cl_btn {
    display: inline-block;
    width: 100%;
}
.al_sp_cl_btn .btn-submit2 {
    background: #ffff;
    padding: 7px 20px;
    color: #1c5299;
    font-weight: 700;
    border: #1c5299 solid 2px;
}
.al_sp_cl_btn .btn-submit2:hover{background:#1c5299; color:#fff;}



.graph_select {
    display: inline-block;
    width: 100%;
}
.graph_select ul.ratingW {
    margin: 0 auto;
    display: table;
    width: auto;
    border: #9d9d9d solid 1px;
    padding: 0;
}
.graph_select .ratingW {position:relative; margin:10px 0 0;}
.graph_select .ratingW li {
    display: inline-block;
    margin: 0px;
    width: 45px;
    height: 40px;
    text-align: center;
    float: left;
	border-right: #e5e5e5 solid 1px;
}
.graph_select .ratingW li:last-child{border-right:none;}
.graph_select .ratingW li a {
    display: block;
    position: relative;
    width: 45px;
    height: 40px;
    line-height: 40px;
}

.graph_select .star {
    position: relative;
    display: inline-block;
    font-size: 18px;
	font-weight:600;
    width: 45px;
    height: 40px;
}




.graph_select .ratingW li.on .star {
    position: relative;
    display: inline-block;
    font-size: 18px;
	font-weight:600;
    width: 45px;
    height: 40px;
	color:#fff;
}
.slt_arara_2 p.counterW {
    text-align: center;
    margin: 10px 0 0;
    font-size: 16px;
    font-weight: 700;
}
.slt_arara_2 {
    margin-bottom: 40px;
}
</style>

<section class="dash_board_pages">
 <div class="container">
 <form action=""  id="onecrappfeedback"> 
 <div class="h_titless">
  <h3>Welcome to 1CR APP</h3>
  <p>Ramjee Meena <span class="red">{XXXX}</span></p>
 </div>
 
 <div class="ra_stapsss">
  We at 1R Group highly care About the Customers like you and would love to hear about your experience with 1CR APP. Kindly Leave a Honest Feedback to help us 
to serve you better for next time
 </div>
 
 
 <div class="numeric_numer">
  <div class="titlss">1. How was your overall experience with 1CR APP?</div>
    <div class="table-responsive">
        <table class="table table-bordered tst_cam_listst">
            <thead>
                <tr>
                    <th>Poor</th>
                    <th>Average</th>
                    <th>Good</th>
                    <th>Outstanding</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="red_bg">
                        <div class="input-box">
                            <label> <input type="radio" id="form-user1" name="field_user1" value="onepartss" class="form-radio" /> 1 </label>
                        </div>
                    </td>

                    <td class="yl_bg">
                        <div class="input-box">
                            <label> <input type="radio" id="form-user2" name="field_user1" value="secntsparts" class="form-radio" /> 2 </label>
                        </div>
                    </td>

                    <td class="gr_l_bg">
                        <div class="input-box">
                            <label> <input type="radio" id="form-user3" name="field_user1" value="threeparts" class="form-radio" /> 3 </label>
                        </div>
                    </td>

                    <td class="gr_d_bg">
                        <div class="input-box">
                            <label> <input type="radio" id="form-user4" name="field_user1" value="forthpart" class="form-radio" /> 4 </label>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="sr_medilss">
        Selected Rating:
        <h2 class="onepart">1</h2>
        <h2 class="twopart">2</h2>
        <h2 class="threepart">3</h2>
        <h2 class="frrepart">4</h2>
    </div>
</div>









  
  <div class="slt_arara_2">
   <p>2. Based on your experiince with 1CR APP, how likely are you to recommend 1CR APP to Your Friends, Colleagues, & family Members on a scale of 0-10? (0 being the lowest rating & 10 being the hightest rating)</p>
   
   <div class="graph_select">   
    <ul class="ratingW">
	  <li class="startMe red_bg"><a data-value="1" href="javascript:void(0);" ><div class="star">1</div></a></li>
	  <li class="startMe red_bg"><a data-value="2" href="javascript:void(0);"><div class="star">2</div></a></li>
	  <li class="startMe red_bg"><a data-value="3" href="javascript:void(0);"><div class="star">3</div></a></li>
	  <li class="startMe red_bg"><a data-value="4" href="javascript:void(0);"><div class="star">4</div></a></li>
	  <li class="startMe red_bg"><a data-value="5" href="javascript:void(0);"><div class="star">5</div></a></li>
	  <li class="startMe red_bg"><a data-value="6" href="javascript:void(0);"><div class="star">6</div></a></li>
	  <li class="startMe yl_bg"><a data-value="7" href="javascript:void(0);"><div class="star">7</div></a></li>
	  <li class="startMe gr_l_bg"><a data-value="8" href="javascript:void(0);"><div class="star">8</div></a></li>
	  <li class="startMe gr_l_bg"><a data-value="9" href="javascript:void(0);"><div class="star">9</div></a></li>
	  <li class="startMe gr_d_bg"><a data-value="10" href="javascript:void(0);"><div class="star">10</div></a></li>
	</ul>
	<p class="counterW">Selected Rating: <span class="scoreNow"></span></p>
   </div>
  </div>

  <div class="slt_arara_2">
   <p>3. Whether the 1CR APP mode it easy for you to analyse, decide, Manage & handle your properties easy (1 being Strongly disagree & 7 being Strongly Agree)</p>
   
   <div class="graph_select">   
     <ul class="ratingW">
	  <li class="startMe1 red_bg"><a data-value="1" href="javascript:void(0);" ><div class="star">1</div></a></li>
	  <li class="startMe1 red_bg"><a data-value="2" href="javascript:void(0);"><div class="star">2</div></a></li>
	  <li class="startMe1 red_bg"><a data-value="3" href="javascript:void(0);"><div class="star">3</div></a></li>
	  <li class="startMe1 red_bg"><a data-value="4" href="javascript:void(0);"><div class="star">4</div></a></li>
	  <li class="startMe1 yl_bg"><a data-value="5" href="javascript:void(0);"><div class="star">5</div></a></li>
	  <li class="startMe1 gr_l_bg"><a data-value="6" href="javascript:void(0);"><div class="star">6</div></a></li>
	  <li class="startMe1 gr_d_bg"><a data-value="7" href="javascript:void(0);"><div class="star">7</div></a></li>
	</ul>
	<p class="counterW">Selected Rating: <span class="scoreNow1"></span></p>
   </div>
  </div>

  <div class="slt_arara_2">
   <p>4. Any suggestion that we can incorporate to improve this even further please take few seconds and write us your valuble suggestion below (Optinal)</p>
   
   <div class="form-group">
     <textarea name="" id="" cols="6" rows="6" class="form-control" placeholder="Please enter your suggestion for further improvement" required=""></textarea>
   </div>
   
   	<div class="form-group">
	<div class="al_sp_cl_btn text-center">
	 <button type="submit" value="SUBMIT" class="btn-submit2">SUBMIT </button> &nbsp; 
	 <button type="text" value="NEXT TIME" class="btn-submit2">NEXT TIME</button>
	</div>
	</div>
  </div>
  </form>
 </div>
</section>	  
     
	 
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>	 

<script>
 $('.form-radio').change(function() {
  if (this.value == 'onepartss') {
    $(".onepart").show();
    $(".twopart").hide();
	$(".threepart").hide();
	$(".frrepart").hide();
  }
  else if (this.value == 'secntsparts') {
    $(".onepart").hide();
    $(".twopart").show();
	$(".threepart").hide();
	$(".frrepart").hide();
  }
  if (this.value == 'threeparts') {
    $(".threepart").show();
    $(".frrepart").hide();
	$(".twopart").hide();
	$(".onepart").hide();
  }
  else if (this.value == 'forthpart') {
    $(".threepart").hide();
    $(".frrepart").show();
	$(".twopart").hide();
	$(".onepart").hide();
  }
});
</script>

<script>
 $(".startMe").click(function(){ 
    const value = $(this).find('a').data('value'); // Select the 'a' element within the clicked 'li'
    $(".scoreNow").html(value);
    $(".startMe").removeClass('on');
    $(this).addClass('on');
})

 $(".startMe1").click(function(){ 
    const value = $(this).find('a').data('value'); // Select the 'a' element within the clicked 'li'
    $(".scoreNow1").html(value);
    $(".startMe1").removeClass('on');
    $(this).addClass('on');
})
</script>

<script>
 $('[name=tab]').each(function(i,d){
  var p = $(this).prop('checked');
//   console.log(p);
  if(p){
    $('article').eq(i)
      .addClass('on');
  }    
});  

$('[name=tab]').on('change', function(){
  var p = $(this).prop('checked');
  
  // $(type).index(this) == nth-of-type
  var i = $('[name=tab]').index(this);
  
  $('article').removeClass('on');
  $('article').eq(i).addClass('on');
});
</script>

<script>
 function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $('#imagePreview').css('background-image', 'url('+e.target.result +')');
            $('#imagePreview').hide();
            $('#imagePreview').fadeIn(650);
        }
        reader.readAsDataURL(input.files[0]);
    }
}
$("#imageUpload").change(function() {
    readURL(this);
});
</script>

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


