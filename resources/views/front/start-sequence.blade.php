@include('web.common.header')

<style>
.ad_form_su_allls {
    padding: 20px;
    border: #e7e7e7 solid 1px;
    box-shadow: 0px 0px 10px #dddddd;
    max-width: 600px;
    margin: 0 auto;
}
.ad_form_su_allls h3{
	margin: 0 0 25px;
    font-size: 22px;
    font-weight: 800;
    color: #0e3992;
    border-bottom: #0e39923d solid 1px;
    padding-bottom: 15px;
    position: relative;
}
.ad_form_su_allls h3:before {
    content: '';
    position: absolute;
    bottom: 0;
    width: 29%;
    height: 3px;
    background: #0e39923d;
}
.ad_form_su_allls input.form-control {
    height: 40px;
	font-size:14px;
}
.ad_form_su_allls select.form-control {
    height: 40px;
	width:100%;
	font-size:14px;
}
.ad_form_su_allls article{
  display: none;
}
.ad_form_su_allls article.on{
    display: block;
    padding-bottom: 10px;
    border-bottom: #e3e3e3 solid 1px;
    margin-bottom: 20px;
}


.ad_form_su_allls .rediobtn {
    display: inline-block;
    width: 100%;
    margin-bottom: 10px;
}

.ad_form_su_allls .rediobtn [type="radio"]:checked,
.ad_form_su_allls .rediobtn [type="radio"]:not(:checked) {
    position: absolute;
    left: -9999px;
}
.ad_form_su_allls .rediobtn [type="radio"]:checked + label,
.ad_form_su_allls .rediobtn [type="radio"]:not(:checked) + label
{
position: relative;
    padding-left: 28px;
    cursor: pointer;
    line-height: 20px;
    display: inline-block;
    color: #666;
    font-weight: 500;
    font-size: 14px;
}
.ad_form_su_allls .rediobtn [type="radio"]:checked + label:before,
.ad_form_su_allls .rediobtn [type="radio"]:not(:checked) + label:before {
    content: '';
    position: absolute;
    left: 0;
    top: 0;
    width: 18px;
    height: 18px;
    border: 1px solid #ddd;
    border-radius: 100%;
    background: #fff;
}
.ad_form_su_allls .rediobtn [type="radio"]:checked + label:after,
.ad_form_su_allls .rediobtn [type="radio"]:not(:checked) + label:after {
    content: '';
    width: 12px;
    height: 12px;
    background: #f94554;
    position: absolute;
    top: 3px;
    left: 3px;
    border-radius: 100%;
    -webkit-transition: all 0.2s ease;
    transition: all 0.2s ease;
}
.ad_form_su_allls .rediobtn [type="radio"]:not(:checked) + label:after {
    opacity: 0;
    -webkit-transform: scale(0);
    transform: scale(0);
}
.ad_form_su_allls .rediobtn [type="radio"]:checked + label:after {
    opacity: 1;
    -webkit-transform: scale(1);
    transform: scale(1);
}

.avatar-upload {
    position: relative;
    max-width: 50%;
    margin: 20px 0 0;
}
.avatar-upload .avatar-edit {
    position: absolute;
    right: 12px;
    z-index: 1;
    top: 0;
}
.avatar-upload .avatar-edit input {
  display: none;
}
.avatar-upload .avatar-edit input + label {
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
.avatar-upload .avatar-edit input + label:hover {
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
.avatar-upload .avatar-preview > div {
  width: 100%;
  height: 100%;
  border-radius: 5%;
  background-size: cover;
  background-repeat: no-repeat;
  background-position: center;
}

.ad_form_su_allls button.btn-submit2 {
    background: #1c5299;
    border: none;
    color: #fff;
    padding: 8px 25px;
    border-radius: 2px;
    font-size: 14px;
    font-weight: 600;
    margin-top: 15px;
    margin-right: 10px;
}
.ad_form_su_allls button.btn-submit3 {
    background: #333;
    border: none;
    color: #fff;
    padding: 8px 25px;
    border-radius: 2px;
    font-size: 14px;
    font-weight: 600;
    margin-top: 15px;
}
.ad_form_su_allls a.btn-submit5 {
    background: #1c5299;
    border: none;
    color: #fff;
    padding: 8px 25px;
    border-radius: 2px;
    font-size: 14px;
    font-weight: 600;
    margin-top: 15px;
}

.ad_form_su_allls#mdl_popupss {
    padding: 0;
    border: none;
    box-shadow: none;
}
.ad_form_su_allls span.sm_txtx {
    font-size: 12px;
    display: block;
    text-align: right;
    float: right;
    margin: 4px 0;
    font-weight: 600;
    color: #999;
}
.ad_form_su_allls .managess_box {
    position: relative;
    display: inline-block;
    width: 100%;
    border: #ccc solid 1px;
    padding: 10px;
    border-radius: 4px;
    margin-top: 10px;
    margin-bottom: 10px;
}
.ad_form_su_allls .managess_box .tittls {
    float: left;
    width: 65%;
    font-weight: 700;
	    line-height: 40px;
}
.ad_form_su_allls .managess_box .inp_bxxx {
    float: left;
    width: 35%;
    position: relative;
}
.ad_form_su_allls .managess_box .inp_bxxx span.rp_text {
    position: absolute;
    left: 0;
    top: 9px;
    font-size: 15px;
    font-weight: 700;
    padding-left: 10px;
}
.ad_form_su_allls .managess_box .inp_bxxx span.qs_text {
    position: absolute;
    right: 10px;
    bottom: 10px;
    border: #ccc solid 1px;
    width: 20px;
    height: 20px;
    text-align: center;
    border-radius: 10px;
    font-size: 14px;
    font-weight: 700;
    cursor: pointer;
}
</style>

<div id="ScheduleModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Schedule</h4>
      </div>
      <div class="modal-body">
        <form action="">
		  <div class="row ad_form_su_allls" id="mdl_popupss">
		   <div class="col-lg-12">
		        <div class="form-group">
                    <label>Date</label>
                    <input type="date" name="" value="" class="form-control" placeholder="" required="" />
                </div>
		   </div>
		  
		   <div class="col-lg-6">
		    <div class="form-group">
                    <label>Time of day</label>
                    <select class="form-control">
                        <option value="">10 PM</option>
                    </select>
                </div>
		   </div>
		   <div class="col-lg-6">
		    <div class="form-group">
                    <label>&nbsp;</label>
                    <select class="form-control">
                        <option value="">00</option>
                    </select>
                </div>
		   </div>
		   <div class="col-lg-12">
		   <div class="form-group text-center">
                    <button type="submit" value="START NOW" class="btn-submit2">Schedule</button>
                </div>
                </div>
		   
		  </div>
                
		</form>		
      </div>
    </div>

  </div>
</div>

<section class="dash_board_pages">
    <div class="container">
        <div class="ad_form_su_allls">
            <h3>Select who you wish to assign this Sequence to!</h3>
            <form action="">
                <div class="form-group">
                    <label>Select Contact List</label>
                    <select class="form-control">
                        <option value="">Select Contact List</option>
                    </select>
					<span class="sm_txtx">Total Contact : 105</span>
                </div>

                <div class="form-group">
                    <label>Select Tags</label>
                    <select class="form-control">
                        <option value="">Select Tags</option>
                    </select>
					<span class="sm_txtx">Tag Selectted : 60</span>
                </div>

                <div class="form-group">
                    <label>Exclude Tags</label>
                    <select class="form-control">
                        <option value="">Exclude Tags</option>
                    </select>
					<span class="sm_txtx">Tags Excluded : 20</span>
                </div>

				<div class="form-group managess_box">
                    <div class="tittls">Total Contacts In Sequence</div>
                    <div class="inp_bxxx"><input type="text" name="" value="" class="form-control text-center" placeholder="40" /></div>
                </div>

				<div class="form-group managess_box">
                    <div class="tittls">Cost of Delivery For 1 Sequence  =</div>
                    <div class="inp_bxxx"><span class="rp_text">Rs.</span>
					 <input type="text" name="" value="" class="form-control text-center" placeholder="1250/-" />
					 <span class="qs_text">?</span>
					</div>
                </div>

				<div class="form-group managess_box tx_red">
                    <div class="tittls">Gross Cast for xx (40) Sequences = </div>
                    <div class="inp_bxxx"><span class="rp_text">Rs.</span>
					 <input type="text" name="" value="" class="form-control text-center" placeholder="50000/-" />
					 <span class="qs_text">?</span>
					</div>
                </div>

                <div class="form-group">
                    <a href="javascript:void(0);" class="btn-submit5" data-toggle="modal" data-target="#ScheduleModal">SCHEDULE</a>
                    <button type="submit" value="START NOW" class="btn-submit3">START NOW</button>
                </div>
            </form>
        </div>
    </div>
</section>
  
     
	 
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>	 
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


