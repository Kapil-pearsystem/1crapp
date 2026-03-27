@include('web.common.header')

<style>
#brd_box {
    border: #254dc0 solid 1px;
    padding: 10px 0px 20px;
    background: #0e3992;
    margin: 0 0 15px;
}
#brd_box div {
    color: #fff;
}
.form-control {
display: block;
    width: 100%;
    height: 38px;
    padding: 7px;
    font-size: 15px;
    font-weight: 400;
    line-height: 1.5;
    color: #6e707e;
    background-color: #fff;
    background-clip: padding-box;
    border: 1px solid #d1d3e2;
    border-radius: .35rem;
    transition: border-color .15s ease-in-out, box-shadow .15s ease-in-out;
}
span.tx_title {
    font-size: 20px;
    font-weight: 600;
    text-transform: uppercase;
    line-height: 59px;
}

.sub_tim_adds {
    background: #fff;
    padding: 10px;
    border-radius: 5px;
    margin-top: 5px;
	text-align:center;
}
.sub_tim_adds a {
    background: #e74a3b;
    padding: 8px 25px;
    display: inline-block;
    border-radius: 5px;
    font-weight: 700;
    color: #fff;
}
</style>


<section class="tital_mg_cntss">
    <img src="{{ url('home/img/top_al_pgss.png')}}" class="bg_al_cntxt" alt="" />
    <div class="midils_contnts">
        <div class="medilss">
            <h4>Form</h4>
            <a href="{{ url('') }}">Home</a> &gt; <span>Form</span>
        </div>
    </div>
</section>


        <div class="container">
            <div class="card-body mt-5" style="background: rgb(190, 218, 253);">
            <div id="brd_box" class="form-group row">
        <div class="col-sm-4 mb-2 mt-1 mb-sm-0"><span style="color: red;">*</span>Form Name <input type="text" id="" placeholder="Enter Form Name" name="page_name" value="" required="required" class="form-control form-control-user" /></div>


        <div class="col-sm-4 mb-3 mt-1 mb-sm-0">
            <span style="color: red;">*</span>Tag
            <select name="tag_id" id="tag_id" required="required" class="form-control">
                <option value="">Select Tag</option>
            </select>
        </div>
        <div class="col-sm-4 mb-3 mt-1 mb-sm-0">
            <span style="color: red;">*</span>List
            <select name="list_id" id="list_id" required="required" class="form-control">
                <option value="">Select List</option>
            </select>
        </div>

		        <div class="col-lg-7">
            <div class="row">
                <div class="col-sm-9 mb-2 mt-1 mb-sm-0">
				 Subscribe to Sequence
				 <select name="list_id" id="list_id" required="required" class="form-control">
                  <option value="">Select</option>
                 </select>
				</div>
                <div class="col-sm-3 mb-2 mt-1 mb-sm-0 swich_bntts">
                    Visible
                    <div class="block_araea mt-1">
                        <label class="switch"><input value="1" type="checkbox" name="pre_heading_status" /> <small></small></label>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-5">
            <div class="row">
                <div class="col-sm-12 mb-2 mt-1 mb-sm-0">
				  <span style="color: red;">*</span>Source
            <select name="list_id" id="list_id" required="required" class="form-control">
                <option value="">Select Source</option>
            </select>
				</div>
            </div>
        </div>
    </div>
    <div id="brd_box" class="form-group row">
          <div class="col-lg-6">
            <div class="row">
                <div class="col-sm-9 mb-2 mt-1 mb-sm-0">Title <input type="text" id="" placeholder="Enter Title" name="" value="" class="form-control form-control-user" /></div>
                <div class="col-sm-3 mb-2 mt-1 mb-sm-0 swich_bntts">
                    Visible
                    <div class="block_araea mt-1">
                        <label class="switch"><input value="1" type="checkbox" name="pre_heading_status" /> <small></small></label>
                    </div>
                </div>
            </div>
        </div>

		<div class="col-lg-6">
            <div class="row">
                <div class="col-sm-9 mb-2 mt-1 mb-sm-0">Webcome Email
				 <select name="list_id" id="list_id" required="required" class="form-control">
                   <option value="">Select Email Templates</option>
                 </select>
				</div>
                <div class="col-sm-3 mb-2 mt-1 mb-sm-0 swich_bntts">
                    Visible
                    <div class="block_araea mt-1">
                        <label class="switch"><input value="1" type="checkbox" name="pre_heading_status" /> <small></small></label>
                    </div>
                </div>
            </div>
        </div>
    </div>




    <div id="brd_box" class="form-group row">
        <div class="col-sm-3 mb-3 mt-1 mb-sm-0">
		 <span class="tx_title">Visibility :</span>
		</div>

        <div class="col-sm-9 mb-3 mt-1 mb-sm-0">
		 <div class="row">
		  <div class="col-lg-4">
		   <div class="mb-3 mt-1 mb-sm-0 swich_bntts">
             CDO Filed
             <div class="block_araea mt-1">
                <label class="switch"><input value="1" type="checkbox" name="bullet_status" /> <small></small></label>
             </div>
           </div>
		  </div>

		  <div class="col-lg-4">
		   <div class="mb-3 mt-1 mb-sm-0 swich_bntts">
             Phone No.
             <div class="block_araea mt-1">
                <label class="switch"><input value="1" type="checkbox" name="bullet_status" /> <small></small></label>
             </div>
           </div>
		  </div>

		  <div class="col-lg-4">
		   <div class="mb-3 mt-1 mb-sm-0 swich_bntts">
             Message Box
             <div class="block_araea mt-1">
                <label class="switch"><input value="1" type="checkbox" name="bullet_status" /> <small></small></label>
             </div>
           </div>
		  </div>
		 </div>
		</div>

    </div>


	    <div id="brd_box" class="form-group row">
          <div class="col-lg-6">
            <div class="row">
                <div class="col-sm-9 mb-2 mt-1 mb-sm-0">Files to Deliver:
				 <select name="list_id" id="list_id" required="required" class="form-control">
                   <option value="">Select File to Deliver at Email</option>
                 </select>
				</div>
                <div class="col-sm-3 mb-2 mt-1 mb-sm-0 swich_bntts">
                    Visible
                    <div class="block_araea mt-1">
                        <label class="switch"><input value="1" type="checkbox" name="pre_heading_status" /> <small></small></label>
                    </div>
                </div>
            </div>
        </div>

		<div class="col-lg-6">
            <div class="row">
                <div class="col-sm-9 mb-2 mt-1 mb-sm-0">Forward Responses to:
				 <select name="list_id" id="list_id" required="required" class="form-control">
                   <option value="">Select Email to forward the lead ?</option>
                 </select>
				</div>
                <div class="col-sm-3 mb-2 mt-1 mb-sm-0 swich_bntts">
                    Visible
                    <div class="block_araea mt-1">
                        <label class="switch"><input value="1" type="checkbox" name="pre_heading_status" /> <small></small></label>
                    </div>
                </div>
            </div>
        </div>
    </div>

	<div id="brd_box" class="form-group row">
        <div class="col-sm-12 mt-1 mb-3 mb-sm-0">
            CTA Title
            <div class="sub_tim_adds"><a href="javascript:void(0);">Yes Wisit To Apply Now!</a></div>
        </div>
    </div>

    <div id="brd_box" class="form-group row">
        <div class="col-sm-6 mt-1 mb-3 mb-sm-0">
            Success / Destination Page or URL
            <select name="media_type" id="media_type" onchange="setMedia(this.value)" class="form-control form-control-user">
                <option selected="selected" disabled="disabled">Select Post Submission Page/URL</option>
            </select>
        </div>

		<div class="col-sm-4 mt-1 mb-3 mb-sm-0">
            Status
            <select name="media_type" id="media_type" onchange="setMedia(this.value)" class="form-control form-control-user">
                <option selected="selected" disabled="disabled">Active</option>
            </select>
        </div>
    </div>



	<div class="card-footer" style="display: inline-block; width: 100%; background: transparent; border: none; text-align: center; padding-bottom: 0px;">
        <a href="javascript:void(0);" class="btn btn-primary mb-3 mr-3">Cancel</a> <button type="submit" class="btn btn-success btn-user mb-3">Update</button>
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


