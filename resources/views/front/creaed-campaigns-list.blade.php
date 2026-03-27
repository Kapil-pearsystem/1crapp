@include('web.common.header')
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

<section class="dash_board_pages">
 <div class="container">
 <div class="h_titless">Creaed Campaigns List</div>
 <div class="table-responsive">          
  <table class="table table-bordered tst_cam_listst">
    <thead>
      <tr>
        <th>Email </th>
        <th>Campaign Name</th>
        <th>Date Time</th>
        <th>Rating</th>
        <th>Embed Code</th>
        <th>Allow</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>info@youname.com</td>
        <td>Demo</td>
        <td>10/20/2022 10:27:49AM</td>
        <td><i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i></td>
        <td><span class="sm_btnsss"><i class="fa fa-link"></i> Generate Link</span></td>
        <td>
		 <input type="checkbox" hidden="hidden" id="username">
         <label class="switch" for="username"></label>
		</td>
        <td>
		 <a href="javascript:void(0);" class="link"><i class="fa fa-cloud-download"></i></a> 
		 <a href="javascript:void(0);" class="link"><i class="fa fa-share-alt-square"></i></a>
		 <a href="javascript:void(0);" class="link"><i class="fa fa-eye"></i></a>
		 <a href="javascript:void(0);" class="link"><i class="fa fa-trash"></i></a> 
		</td>
      </tr>
	  
	 <tr>
        <td>info@youname.com</td>
        <td>Demo</td>
        <td>10/20/2022 10:27:49AM</td>
        <td><i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i></td>
        <td><span class="sm_btnsss"><i class="fa fa-link"></i> Generate Link</span></td>
        <td>
		 <input type="checkbox" hidden="hidden" id="username1">
         <label class="switch" for="username1"></label>
		</td>
        <td>
		 <a href="javascript:void(0);" class="link"><i class="fa fa-cloud-download"></i></a> 
		 <a href="javascript:void(0);" class="link"><i class="fa fa-share-alt-square"></i></a>
		 <a href="javascript:void(0);" class="link"><i class="fa fa-eye"></i></a>
		 <a href="javascript:void(0);" class="link"><i class="fa fa-trash"></i></a> 
		</td>
      </tr>
	  
	<tr>
        <td>info@youname.com</td>
        <td>Demo</td>
        <td>10/20/2022 10:27:49AM</td>
        <td><i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> </td>
        <td><span class="sm_btnsss"><i class="fa fa-link"></i> Generate Link</span></td>
        <td>
		 <input type="checkbox" hidden="hidden" id="username2">
         <label class="switch" for="username2"></label>
		</td>
        <td>
		 <a href="javascript:void(0);" class="link"><i class="fa fa-cloud-download"></i></a> 
		 <a href="javascript:void(0);" class="link"><i class="fa fa-share-alt-square"></i></a>
		 <a href="javascript:void(0);" class="link"><i class="fa fa-eye"></i></a>
		 <a href="javascript:void(0);" class="link"><i class="fa fa-trash"></i></a> 
		</td>
      </tr>
	  
	    <tr>
        <td>info@youname.com</td>
        <td>Demo</td>
        <td>10/20/2022 10:27:49AM</td>
        <td><i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> </td>
        <td><span class="sm_btnsss"><i class="fa fa-link"></i> Generate Link</span></td>
        <td>
		 <input type="checkbox" hidden="hidden" id="username3">
         <label class="switch" for="username3"></label>
		</td>
        <td>
		 <a href="javascript:void(0);" class="link"><i class="fa fa-cloud-download"></i></a> 
		 <a href="javascript:void(0);" class="link"><i class="fa fa-share-alt-square"></i></a>
		 <a href="javascript:void(0);" class="link"><i class="fa fa-eye"></i></a>
		 <a href="javascript:void(0);" class="link"><i class="fa fa-trash"></i></a> 
		</td>
      </tr>
	  
	   
    </tbody>
  </table>
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


