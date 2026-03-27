@include('front.layouts.header')
<div class="modal fade" id="successModal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content alert alert-success">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="text-align: right;">
          <span aria-hidden="true">&times;</span>
        </button>
        <svg class="checkmark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52">
            <circle class="checkmark__circle" cx="26" cy="26" r="25" fill="none"/>
            <path class="checkmark__check" fill="none" d="M14.1 27.2l7.1 7.2 16.7-16.8"/>
        </svg>
        @if(Session::has('success'))
            {{Session::get('success')}}
        @endif
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="purchase_criteria" role="dialog">
    <div class="modal-dialog modal-lg" id="cent_screenss">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Purchase Criteria</h4>
            </div>
            <div class="modal-body" id="modelData">

            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="property_delete_modal" role="dialog">
    <div class="modal-dialog ">
        <div class="modal-content" uib-modal-transclude="">
            <form action="{{ url('delete-property') }}" method="POST">
                @csrf
            <div class="modal-header" style="text-align: center;background: #d9534f;"><i class="fa fa-info-circle" ng-class="(type === 'alertSuccess' || type === 'confirmSuccess') ? 'fa-check-circle' : 'fa-info-circle'" style=" color: #fff;font-size: 32px;"></i>
                <div class="modal-title" style="color: #fff;">Delete this property?</div>
            </div>
            <div class="modal-body"></div>
            <div class="modal-footer"><!---->
                <button type="button" class="btn btn-sm margin-h-10 btn-fixed-width-sm btn-default" data-dismiss="modal" aria-label="Close">Cancel</button>

                 <input type="hidden" name="prop_deleteid" id="prop_deleteid">
                 <button type="submit" class="btn btn-sm margin-h-10 btn-fixed-width-sm btn-danger deleteProperty" >Delete</button></div>
        </form>
    </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="property_archive_modal" role="dialog">
    <div class="modal-dialog ">
        <div class="modal-content" uib-modal-transclude="">
            <form action="{{ url('archiveProperty') }}" method="POST">
                @csrf
            <div class="modal-header" style="text-align: center;background: #1c5198;"><i class="fa fa-info-circle"  style=" color: #fff;font-size: 32px;"></i>
                <div class="modal-title" style="color: #fff;">Archive this property?
                    <h5>Archived properties are hidden and can be viewed by enabling the Show Archived option from the property list.</h5>
                </div>
            </div>
            <div class="modal-body"></div>
            <div class="modal-footer"><!---->
                <button type="button" class="btn btn-sm margin-h-10 btn-fixed-width-sm btn-default" data-dismiss="modal" aria-label="Close">Cancel</button>

                 <input type="hidden" name="prop_id" id="prop_archiveid">
                 <input type="hidden" name="status" value="1">
                 <button type="submit" class="btn btn-sm margin-h-10 btn-fixed-width-sm btn-dangerss deleteProperty" style="background: #1c5198;color: #fff;">Archive</button></div>
                  </form>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="property_restore_modal" role="dialog">
    <div class="modal-dialog ">
        <div class="modal-content" uib-modal-transclude="">
            <form action="{{ url('archiveProperty') }}" method="POST">
                @csrf
            <div class="modal-header" style="text-align: center;background: #1c5198;"><i class="fa fa-info-circle"  style=" color: #fff;font-size: 32px;"></i>
                <div class="modal-title" style="color: #fff;">Restore this property from archive?
                <h5>This will restore this property from archive and show it in the property list.</h5></div>
            </div>
            <div class="modal-body"></div>
            <div class="modal-footer"><!---->
                <button type="button" class="btn btn-sm margin-h-10 btn-fixed-width-sm btn-default" data-dismiss="modal" aria-label="Close">Cancel</button>

                 <input type="hidden" name="prop_id" id="prop_restoreid">
                 <input type="hidden" name="status" value="0">
                 <button type="submit" class="btn btn-sm margin-h-10 btn-fixed-width-sm btn-dangerss deleteProperty" style="background: #1c5198;color: #fff;">Restore</button></div>
                  </form>
        </div>
    </div>
</div>

    <!--PEN HEADER-->
    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-12 mb-5">

                <div class="row">
                    <div class="col-lg-8">
                        <div class="lsting_proprty">
                            <h3>{{ $property_type }} Properties</h3>
                            <p>Properties you plan to buy hold for long-term cash flow, including short-term rentals.
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="prp_bntsss">
                            <ul>
                                <li><a href="{{ route('property.compare.index') }}"><i class="fa fa-exchange"></i> Compare</a></li>
                                <li><a  href="javascript:void(0);" onclick="addProperty('{{ $type }}')" class="actss"><i class="fa fa-plus"></i> Add
                                        Property</a></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <form action="{{ url('exportProperty') }}" method="POST">
                @csrf


             <input type="hidden" value="{{$property_type}}" name="property_type" />
             <input type="hidden" value="{{ $type }}" name="prop_parent_type" />
                <div class="row mt-5">
                    <div class="col-lg-6">
                        <div class="row">
                            <div class="col-lg-4 col-4">
                                <div class="filsts_srch">
                                    <select class="tb_bxxes" id="tags" name="tags" onchange="getFilteredList()">
                                        <option value="">Tags</option>
                                        @foreach($usertags as $list)
                                        <option value="{{ $list->tag_name }}">{{ $list->tag_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-8 col-8">
                                <div class="sear_ch">
                                    <form action="#">
                                        <input type="text" value="" name="title" id="searchfull" onkeyup="getByTitle(this.value,'{{ $property_type }}')"
                                            placeholder="Search" />
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-12">
                        <div class="btn_sltss">
                            <ul>
                                <li>
                                    <button type="submit"  class="ex_prt">Export</button>
                                </li>
                                <li><button type="button" class="btn btn-clear list-controls-btn-compact" onclick="$(this).toggleClass('blue'),$('#property-archived').toggle()" >Show Archived</button></li>

                                <li>
                                    <span class="srt">Sort By:</span>
                                    <select class="tb_bxxes" id="sortby" onchange="getFilteredList()">
                                        <option value="main_properties.prop_name">Name</option>
                                        <option value="property_description.desc_category_type">Property Type</option>
                                        <option value="rk_cities.name">City</option>
                                        <option value="rk_states.name">State/Region</option>
                                        <option value="property_address.prop_zip">ZIP/Postal Code</option>
                                        <option value="main_properties.prop_purchasePrice">Purchase Price</option><!--
                                        <option value="3">Total Cash Needed</option>
                                        <option value="3">Cash Flow</option>
                                        <option value="3">Cap Rate</option>
                                        <option value="3">Cash On Cash Return</option>
                                        <option value="3">Purchase Criteria</option> -->
                                        <option value="main_properties.created_at">Added Date</option>
                                        <option value="main_properties.updated_at">Date Last Updated</option>
                                    </select>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                </form>

            </div>
        </div>

        <div class="row mt-4">
             @include('front.layouts.sidebar')
            <!--start full details -->
            <div class="col-12 col-sm-9">
                @if(count($property_list)==0)
                    <div class="row" id="property_datas" style="float: none;text-align: center;display: block;margin: auto;padding-top: 80px;">
                        <div class="col-lg-4" style="float: none;margin: auto;">
                            <div class="list_box_area">
                                <div class="img_area">
                                    <a href="{{url('add-new-property/')}}/{{ $type }}" >
                                        <img src="https://app.dealcheck.io/img/image-new-property.png" alt="">
                                    </a>
                                </div>
                            </div>
                        </div>
                        <h2>Add a New {{ $property_type }} Property</h2>
                        <h5 class=" ">
                            <span>Click above to analyze a new {{ $property_type }} property or copy an existing one.</span>
                        </h5>
                    </div>
                @else
                <div class="row" id="property_data">

                </div>
                <div class="property_aresssd" id="property-archived" style="display:none;">
                   <div class="linss">
                    <h3 style="color: #1c539a;">ARCHIVED PROPERTIES</h3>
                   </div>
                    <div class="row" id="archive_property_data">
                    </div>

                    </div>
                @endif
				
				
				<div class="paginatiosss">
				 <div class="row">
				  <div class="col-lg-3">
				   <div class="sho_liststs">
				    <span class="cnt_showss">Show</span>
					<select class="slt_areaa">
					 <option value="">10</option>
					 <option value="">15</option>
					 <option value="">20</option>
					</select>
					<span class="cnt_showss">Entries</span>
				   </div>
				  </div>
				  <div class="col-lg-9">
				   <div class="pgs_listtss">
				    <ul>
					 <li><a href="javascript:void(0);"><i class="fa fa-angle-left"></i></a></li>
					 <li><a href="javascript:void(0);" class="act_ft">1</a></li>
					 <li><a href="javascript:void(0);">2</a></li>
					 <li><a href="javascript:void(0);">3</a></li>
					 <li><a href="javascript:void(0);">4</a></li>
					 <li><a href="javascript:void(0);">5</a></li>
					 <li><a href="javascript:void(0);"><i class="fa fa-angle-right"></i></a></li>
					</ul>
				   </div>
				  </div>
				 </div>
				</div>
				
            </div>
        </div>
    </div>
	
	
	<style>
	 .paginatiosss {display: inline-block; width: 100%; background: #c2e6fb; padding: 10px; border-radius: 4px;}
	 .paginatiosss .sho_liststs {display: flex; background: #fff; padding: 10px; border-radius: 4px;}
     .paginatiosss .sho_liststs span.cnt_showss {width: 30%; font-size: 14px; font-weight: 500;}
     .paginatiosss .sho_liststs span.cnt_showss:last-child {padding-left:6px;}
	 .paginatiosss .sho_liststs select.slt_areaa {width: 40%;}
	 
	 .paginatiosss .pgs_listtss {background: #fff; padding: 10px; border-radius: 4px; display: inline-block; width: 100%;}

	 .paginatiosss .pgs_listtss ul {list-style: none; padding: 0; display: table; margin: 0 auto;}
	 .paginatiosss .pgs_listtss ul li {float: left; margin-right: 10px;}
     .paginatiosss .pgs_listtss ul li:last-child {margin-right:0px;}
	 
     .paginatiosss .pgs_listtss ul li a {background:#0e3992; width:20px; height:20px; display:inline-block; text-align:center; font-size:12px; line-height:20px; color:#fff; border-radius: 100px;}
	 .paginatiosss .pgs_listtss ul li a:hover {background: #1076f8;}
     .paginatiosss .pgs_listtss ul li a.act_ft {background: #1076f8;}
	</style>

    @include('front.layouts.footer')

    @include('front.layouts.footer_new')
    <script>
        function deleteProperty(id){
            $('#prop_deleteid').val(id);
            $('#property_delete_modal').modal('show');
        }

        function archiveProperty(id){
            $('#prop_archiveid').val(id);
            $('#property_archive_modal').modal('show');
        }

        function restoreProperty(id){
            $('#prop_restoreid').val(id);
            $('#property_restore_modal').modal('show');
        }


        @if(Session::has('success'))
        function load(){
            $('#successModal').modal('show');
        }
        window.onload = load;
        @endif

        function getFilteredList(){

            alert('hello');
            var token = "{{ csrf_token() }}";
            var tags = $('#tags').val();
            var title = $('#searchfull').val();
            var sortby = $('#sortby').val();
            var property_type = "{{$property_type}}";
            var p_type = @json($type);
            $.ajax({
                type: "POST",
                url: "/getPropertyList",
                data: {
                    _token: token,
                    title: title,
                    prop_type : property_type,
                    tags : tags,
                    prop_parent_type : p_type,
                    sortby : sortby,
                },
                success: function(response) {
                    $("#property_data").html(response);
                }
            });

            $.ajax({
                type: "POST",
                url: "/getArchivePropertyList",
                data: {
                    _token: token,
                    title: title,
                    prop_type : property_type,
                    tags : tags,
                    prop_parent_type : p_type,
                    sortby : sortby,
                },
                success: function(response) {
                    $("#archive_property_data").html(response);
                }
            });


        }
    </script>



<style>
    #successModal .modal-lg {
      width: auto;
      max-width: fit-content;
    }

    button.btn.btn-clear.list-controls-btn-compact.blue {
        background: #0e3992;
        width: 100%;
        color: #fff;
    }
    button.btn.btn-clear.list-controls-btn-compact {
        background: #cccccc;
        width: 100%;
        color: #fff;
    }

    button.btn.btn-clear.list-controls-btn-compact:focus {
        outline: 0px auto-webkit-focus-ring-color !important;
    }

    .btn_sltss .ex_prt {
        background: #0e3992;
        width: 100%;
        padding: 4px 30px;
        color: #fff;
        font-size: 16px;
        border-radius: 3px;
        border: 0;
    }
</style>