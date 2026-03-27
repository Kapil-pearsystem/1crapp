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

.ad_form_su_allls a.btn-submit2 {
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
.ad_form_su_allls a.btn-submit3 {
    background: #333;
    border: none;
    color: #fff;
    padding: 8px 25px;
    border-radius: 2px;
    font-size: 14px;
    font-weight: 600;
    margin-top: 15px;
}
.ad_form_su_allls a.btn-submit4 {
    background: #eb740d;
    border: none;
    color: #fff;
    padding: 8px 25px;
    border-radius: 2px;
    font-size: 14px;
    font-weight: 600;
    margin-top: 15px;
}


#full_dbydds .ad_form_su_allls {
    padding: 20px;
    border: #e7e7e7 solid 1px;
    box-shadow: 0px 0px 10px #dddddd;
    max-width: 600px;
    margin: 0;
    width: 100%;
}


#full_dbydds .ratingW {position: relative;  margin: 0; float: right;}
#full_dbydds .ratingW li {display:inline-block; margin:0px;}
#full_dbydds .ratingW li a {display:block; position:relative;}

#full_dbydds .avatar-upload {max-width: 100%;}
#full_dbydds .avatar-upload .avatar-edit {right: 10px; top: initial; bottom: -50px;}
#full_dbydds .avatar-upload .avatar-preview {margin: 0 auto;}
#full_dbydds .avatar-upload .avatar-edit input + label {
    padding: 0 10px;
    color: #fff;
    font-size: 13px;
    font-weight: 600;
    border-radius: 6px;
}
#full_dbydds .vdiio {
    display: inline-block;
    width: 100%;
}
#full_dbydds .vdiio .vioooo {
    background: #000;
    padding: 5px;
    height: 220px;
    margin-bottom: 10px;
    overflow: hidden;
    border-radius: 5px;
	    color: #fff;
}
#full_dbydds .vdiio .btn_stsrst a{
    background: #1c5299;
    padding: 10px;
    text-align: center;
    color: #fff;
    font-weight: 600;
	display:inline-block;
}

#full_dbydds .ad_form_su_allls h4 {
    margin-top: 0;
    font-weight: 700;
    font-size: 22px;
    text-align: center;
	margin-bottom:6px;
}
#full_dbydds .ad_form_su_allls p {
    margin: 0 0 30px;
    font-weight: 500;
    font-size: 15px;
    text-align: center;
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

.add-read-more.show-less-content .second-section,
.add-read-more.show-less-content .read-less {
   display: none;
}

.add-read-more.show-more-content .read-more {
   display: none;
}

.add-read-more .read-more,
.add-read-more .read-less {
   font-weight: bold;
   margin-left: 2px;
   color: blue;
   cursor: pointer;
}

.add-read-more{
  max-width: 600px;
  width: 100%;
  margin: 0 auto;
}

.w_full{width: 100% !important;}

.star {
  position: relative;
  display: inline-block;
  width: 0;
  height: 0;
  margin-left: .9em;
  margin-right: .9em;
  margin-bottom: 1.2em;
  border-right: .3em solid transparent;
  border-bottom: .7em  solid #ddd;
  border-left: .3em solid transparent;
  font-size:12px;
}
.star:before, .star:after {
  content: '';
  display: block;
  width: 0;
  height: 0;
  position: absolute;
  top: .6em;
  left: -1em;
  border-right: 1em solid transparent;
  border-bottom: .7em  solid #ddd;
  border-left: 1em solid transparent;
  -webkit-transform: rotate(-35deg);
          transform: rotate(-35deg);
}
.star:after {
  -webkit-transform: rotate(35deg);
          transform: rotate(35deg);
}


.ratingW li.on .star {
  position: relative;
  display: inline-block;
  width: 0;
  height: 0;
  margin-left: .9em;
  margin-right: .9em;
  margin-bottom: 1.2em;
  border-right: .3em solid transparent;
  border-bottom: .7em  solid #FC0;
  border-left: .3em solid transparent;
  font-size: 12px;
}
.ratingW li.on .star:before, .ratingW li.on .star:after {
  content: '';
  display: block;
  width: 0;
  height: 0;
  position: absolute;
  top: .6em;
  left: -1em;
  border-right: 1em solid transparent;
  border-bottom: .7em  solid #FC0;
  border-left: 1em solid transparent;
  -webkit-transform: rotate(-35deg);
          transform: rotate(-35deg);
}
.ratingW li.on .star:after {
  -webkit-transform: rotate(35deg);
          transform: rotate(35deg);
}
</style>

<section class="dash_board_pages" id="full_dbydds">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
			  <div class="ad_form_su_allls">
                    <h4>MBB Free Reprots</h4>
					<div class="up_imagess"><img src="{{ url('home/img/trusted_bg.png')}}" alt="" /></div>
					
					<div class="mooore">
					 <p class="add-read-more show-less-content">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>
					</div>
					
					<div class="t_ltss_mro">
					 <h4>Testimonial 1CR APP</h4>
                     <p>09/24/2024 9:43:PM</p>
					</div>
					
					<div class="lgo_partsss">
					 <img src="{{ url('home/img/logo 1.png')}}" alt="" />
					</div>
			  </div>		
			</div>
            <div class="col-lg-6">
                <div class="ad_form_su_allls">
                    <h4>Submit Your Testimonial</h4>
                    <p>Fill out the following form to submit your review.</p>
                    <form action="">
					  <div class="row">
					   <div class="col-lg-8">
					    <div class="form-group">
                            <label>Full Name </label>
                            <input type="text" name="" value="" class="form-control" placeholder="" required="" />
                        </div>							

                        <div class="form-group">
                            <label>Company Name</label>
                            <select class="form-control">
                                <option value="">Select Name</option>
                            </select>
                        </div>
						
						<div class="form-group">
                            <label>Designation</label>
                            <input type="text" name="" value="" class="form-control" placeholder="" required="" />
                        </div>
						
						<div class="form-group">
                            <label>Location</label>
                            <input type="text" name="" value="" class="form-control" placeholder="" required="" />
                        </div>
						
						<div class="form-group">
                            <label>Phone No</label>
                            <input type="text" name="" value="" class="form-control" placeholder="" required="" />
                        </div>
						
						<div class="form-group">
                            <label>Email</label>
                            <input type="text" name="" value="" class="form-control" placeholder="" required="" />
                        </div>
					   </div>
					   <div class="col-lg-4">
					    <div class="form-group">
                            <div class="avatar-upload">
                                <div class="avatar-edit">
                                    <input type="file" id="imageUpload" accept=".png, .jpg, .jpeg" />
                                    <label for="imageUpload">Upload a Images</label>
                                </div>
                                <div class="avatar-preview">
                                    <div id="imagePreview" style="background-image: url({{ url('home/img/edtpro.jpg')}});"></div>
                                </div>
                            </div>
                        </div>
					   </div>					  
					  </div>
                        

                        <div class="form-group">
                            <label>Comment</label>
                            <textarea name="" id="" cols="6" rows="6" class="form-control" placeholder="" required=""></textarea>
                        </div>
						
						<div class="form-group mt-5" id="rating_slt">
                           <label>Rating :</label>
						   <ul class="ratingW">
						    <li><a href="javascript:void(0);"><div class="star"></div></a></li>
						    <li><a href="javascript:void(0);"><div class="star"></div></a></li>
						    <li><a href="javascript:void(0);"><div class="star"></div></a></li>
						    <li><a href="javascript:void(0);"><div class="star"></div></a></li>
						    <li><a href="javascript:void(0);"><div class="star"></div></a></li>
						   </ul>
                        </div>

                        <div class="form-group">                            
                            <div class="rediobtn">
                                <input type="radio" id="tab1" name="tab" checked />
                                <label for="tab1">Enter YourTube URL</label>
								&nbsp;
                                <input type="radio" id="tab2" name="tab" />
                                <label for="tab2">Record Live Testimonial</label>
                            </div>
                            <article>
                                <div class="form-group">
                                    <input type="text" name="" value="" class="form-control" placeholder="Please Your URL Here" required="" />
                                </div>
								<div class="form-group">
                                  <button type="submit" value="Finish" class="btn-submit3 w_full">Finish</button>
                                </div>
                            </article>
                            <article>
                                <div class="row">
								 <div class="col-lg-6">
								  <div class="form-group">
									<select class="form-control">
										<option value="">Microphone</option>
									</select>
								  </div>
								 </div>

								 <div class="col-lg-6">
								  <div class="form-group">
									<select class="form-control">
										<option value="">Default Resolution</option>
									</select>
								  </div>
								 </div>
								 
								 <div class="col-lg-12 mt-4">
								  <div class="form-group text-center">
								   <a href="javascript:void(0);" class="btn-submit4">Start Recording</a>
								  </div>
								  
								  <div class="vdiio">
								   <div class="vioooo">Video Status: inactive</div>
								   <div class="btn_stsrst"><a href="javascript:void(0);" class="w_full">Record Your Video to Submit</a></div>
								  </div>
								 </div>
								</div>
                            </article>
                        </div>

                       
                        

                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
  
     
	 
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>	


<script>
 function ratingStar(star){
	star.click(function(){
		var stars = $('.ratingW').find('li')
		stars.removeClass('on');
		var thisIndex = $(this).parents('li').index();
		for(var i=0; i <= thisIndex; i++){
			stars.eq(i).addClass('on');
		}
    putScoreNow(thisIndex+1);
	});
 }

 function putScoreNow(i){
	  $('.scoreNow').html(i);
 }


 $(function(){
	if($('.ratingW').length > 0){
		ratingStar($('.ratingW li a'));
	}
 });
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


