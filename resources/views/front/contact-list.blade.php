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
 <div class="h_titless ads_buttnss">Contact List   <div class="ad_item_lst"><a href="https://1crapp.allproject.online/contact-list-create">Add List</a></div></div>
 <div class="table-responsive">          
  <table class="table table-bordered tst_cam_listst">
    <thead>
      <tr>
        <th>Sr.No</th>
        <th>Name</th>
        <th>Subscribers No.</th>
        <th>List ID</th>
        <th>Date</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>1</td>
        <td>List Name-A</td>
		<td>5 <a href="javascript:void(0);" class="pl-2 pt-1"><i class="fa fa-external-link"></i></a></td>
        <td>1crapp-abc4567</td>
        
        <td>
		 <select>
		  <option value="1">Add New</option>
		  <option value="1">Add Existing</option>
		  <option value="1">Import</option>
		 </select>
		</td>
        <td>
		 <a href="javascript:void(0);" class="link"><i class="fa fa-pencil"></i></a>
		 <a href="javascript:void(0);" class="link"><i class="fa fa-trash"></i></a> 
		 <a href="javascript:void(0);" class="link"><i class="fa fa-database"></i></a>
		</td>
      </tr>

      <tr>
        <td>2</td>
        <td>List Name-A</td>
		<td>5 <a href="javascript:void(0);" class="pl-2 pt-1"><i class="fa fa-external-link"></i></a></td>
        <td>1crapp-abc4567</td>
        
        <td>
		 <select>
		  <option value="1">Add New</option>
		  <option value="1">Add Existing</option>
		  <option value="1">Import</option>
		 </select>
		</td>
        <td>
		 <a href="javascript:void(0);" class="link"><i class="fa fa-pencil"></i></a>
		 <a href="javascript:void(0);" class="link"><i class="fa fa-trash"></i></a> 
		 <a href="javascript:void(0);" class="link"><i class="fa fa-database"></i></a>
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


