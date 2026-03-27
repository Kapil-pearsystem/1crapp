@include('web.common.header')
<!---- Your Property Inspection Now Made Easy! ----->
<style>
    .fade{
        opacity: 1;
    }
</style>
<div class="modal fade" id="veioo_criteria" role="dialog">
    <div class="modal-dialog modal-lg" id="cent_screenss">
        <!-- Modal content-->

        <div class="modal-content" id="popup-content">
            
        </div>
    </div>
</div>

<!---- End Your Property Inspection Now Made Easy! ----->

<!-- Enquire Now -->

<div class="modal fade alss_frmss" id="enqryyees" role="dialog">
    <div class="modal-dialog" id="cent_screenss">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>

                <h4 class="modal-title">Enquire Now</h4>
            </div>

            <div class="modal-body">
                <form action="{{ route('save-property-enquiry') }}" method="post">
                    @csrf
                    <input type="hidden" name="prop_id" id="prop_id"/>
                    <div class="form-group">
                        <input type="text" name="name" placeholder="Enter Your Name" value="{{ optional(auth()->user())->name }}" class="inputt_frm" required="" />
                    </div>

                    <div class="form-group">
                        <input type="text" name="email" placeholder="Email ID" value="{{ optional(auth()->user())->email }}" class="inputt_frm" required="" />
                    </div>

                    <div class="form-group">
                        <select class="inputt_frm" required=""  name="company">
                            <option value="">Select Campany/Organisation</option>
                            @foreach($cdo_data as $cdo)
                                <option value="{{ $cdo->id }}">{{ $cdo->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <input type="text" name="mobile" placeholder="Phone No" value="{{ optional(auth()->user())->mobile }}" class="inputt_frm" required="" />
                    </div>

                    <div class="form-group">
                        <input type="text" name="requirement" placeholder="Brif of your requirment (optional)" value="" class="inputt_frm" />
                    </div>

                    <div class="form-group">
                        <textarea id="" name="message" rows="4" cols="4" placeholder="Message" class="inputt_frm" required="" ></textarea>
                    </div>

                    <div class="form-group">
                        <button type="submit" value="" class="inputt_frm">YES! I WISH TO APPLY NOW</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- End Enquire Now -->
<div class="container mt-5">
    <div class="row">
        <div class="col-lg-12 mb-5">
            <div class="row">
                <div class="col-lg-12">
                    <div class="lsting_proprty text-center mb-4">
                        <h3>{{ isset($cms_data)?$cms_data->title:'PSU`S PROPERTY MARKET' }}</h3>

                        <p>{{ isset($cms_data)?$cms_data->heading:'As Sson Market Place Tab Isopened Please Open a Video With Message That Can Easily Be Cloised This Should Be Opeed in Pop Up.' }}</p>
                    </div>
                </div>
            </div>

            <div class="row mt-5">
                <div class="col-lg-8 col-12">
                    <div class="makr_plc_lst">
                        <h4>{{ isset($cms_data)?$cms_data->sub_title:'Now Buy & sell Your Property with 100% Confidence. & Love' }}</h4>

                        <div class="row">
                            <div class="col-lg-3 col-3">
                                <div class="lgo_partss"><img src="{{ isset($cms_data)?$cms_data->varification_logo:url('home/img/verif_lgoo.jpg') }}" alt="" /></div>
                            </div>

                            <div class="col-lg-6 col-6">
                                <div class="md_areaa_cntts">
                                    <h5>PSU PROPERTY MARKET - PPM</h5>

                                    <p>IS</p>

                                    <span>YOUR FOR YOU BY YOUR'S</span>
                                </div>
                            </div>

                            <div class="col-lg-3 col-3">
                                <div class="lgo_partss"><img src="{{ isset($cms_data)?$cms_data->satisfaction_logo:url('home/img/sat_lgoo.jpg') }}" alt="" /></div>
                            </div>
                        </div>

                        <div class="row mt-4">
                            <div class="col-lg-12">
                                <div class="alls_tabsst">
                                    <form action="" method="GET" id="property_filter_form">
                                        <div class="tab-wrapper">
                                            <ul class="tabs">
                                                @foreach($category as $key=>$cat)
                                                <li class="tab-link @if(request()->category) @if(request()->category == $cat->id) active @endif @elseif($key == 0) active @endif category-id-tab" onclick="setCategory('{{ $cat->id }}')" data-tab="1">{{ $cat->title }}</li>
                                                @endforeach
                                            </ul>
                                        </div>

                                        <div class="content-wrapper">
                                            <input type="hidden" id="category_id" value="{{ request()->category }}" name="category">
                                            <input type="hidden" id="per_page_id" value="{{ request()->per_page }}" name="per_page">
                                            <div id="tab-1" class="tab-content active">

                                                <div class="frm_bothss">
                                                    <ul>
                                                        <li>
                                                            <div class="sear_ch">
                                                                <input type="text" name="search" value="{{ request()->search }}" placeholder="Search" />
                                                            </div>
                                                        </li>

                                                        <li>
                                                            <div class="filsts_srch">
                                                                <i class="fa fa-home"></i>

                                                                <select class="tb_bxxes" name="unit" onchange="this.form.submit();">
                                                                    <option value="">Property Unit</option>
                                                                    <option value="1" @if(request()->unit == 1) selected @endif>Flat 1 BHK</option>
                                                                    <option value="2" @if(request()->unit == 2) selected @endif>Flat 2 BHK</option>
                                                                    <option value="3" @if(request()->unit == 3) selected @endif>Flat 3 BHK</option>
                                                                    <option value="4" @if(request()->unit == 4) selected @endif>Flat 4 BHK</option>
                                                                    <option value="5" @if(request()->unit == 5) selected @endif>Flat 5 BHK</option>
                                                                </select>
                                                            </div>
                                                        </li>

                                                        <li>
                                                            <div class="filsts_srch">
                                                                <i class="fa fa-inr"></i>
                                                                <select class="tb_bxxes" name="budget" onchange="this.form.submit();">
                                                                    <option value="">Budget</option>
                                                                    <option value="1000000-2000000" @if(request()->budget == "1000000-2000000") selected @endif>10 Lac – 20 Lac</option>
                                                                    <option value="2000000-3000000" @if(request()->budget == "2000000-3000000") selected @endif>20 Lac – 30 Lac</option>
                                                                    <option value="3000000-4000000" @if(request()->budget == "3000000-4000000") selected @endif>30 Lac – 40 Lac</option>
                                                                    <option value="4000000-5000000" @if(request()->budget == "4000000-500000") selected @endif>40 Lac – 50 Lac</option>

                                                                    <option value="5000000-7500000" @if(request()->budget == "5000000-7500000") selected @endif>50 Lac – 75 Lac</option>
                                                                    <option value="7500000-10000000" @if(request()->budget == "7500000-10000000") selected @endif>75 Lac – 1 Crore</option>

                                                                    <option value="10000000-15000000" @if(request()->budget == "10000000-15000000") selected @endif>1 Crore – 1.5 Crore</option>
                                                                    <option value="15000000-20000000" @if(request()->budget == "15000000-20000000") selected @endif>1.5 Crore – 2 Crore</option>
                                                                    <option value="20000000-30000000" @if(request()->budget == "20000000-30000000") selected @endif>2 Crore – 3 Crore</option>
                                                                    <option value="30000000-40000000" @if(request()->budget == "30000000-40000000") selected @endif>3 Crore – 4 Crore</option>
                                                                    <option value="40000000-50000000" @if(request()->budget == "40000000-50000000") selected @endif>4 Crore – 5 Crore</option>
                                                                </select>
                                                            </div>
                                                        </li>

                                                        <li>
                                                            <button type="submit" valign="submit" class="submmt"><i class="fa fa-search"></i> <span class="textxtx">Search</span></button>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-12">
                    <div class="owl-carousel owl-theme" id="sliderssmain">
                        <!----- Slider Item ---->
                        @php
                            $images = !empty($cms_data->images) ? json_decode($cms_data->images, true) : [];
                        @endphp
                        
                        @if(!empty($images))
                            {{-- Dynamic Images --}}
                            @foreach($images as $img)
                                <div class="item">
                                    <img src="{{ $img }}" alt="Property Image" />
                                </div>
                            @endforeach
                        @else
                            {{-- Static Images --}}
                            <div class="item">
                                <img src="{{ url('home/img/propertys.jpg') }}" alt="Property Image" />
                            </div>
                        
                            <div class="item">
                                <img src="{{ url('home/img/propertys.jpg') }}" alt="Property Image" />
                            </div>
                        
                            <div class="item">
                                <img src="{{ url('home/img/propertys.jpg') }}" alt="Property Image" />
                            </div>
                        @endif

                        <!--<div class="item">-->
                        <!--    <img src="{{ url('home/img/propertys.jpg')}}" alt="" />-->
                        <!--</div>-->

                        <!----- End Slider Item ---->

                        <!----- Slider Item ---->

                        <!--<div class="item">-->
                        <!--    <img src="{{ url('home/img/propertys.jpg')}}" alt="" />-->
                        <!--</div>-->

                        <!----- End Slider Item ---->

                        <!----- Slider Item ---->

                        <!--<div class="item">-->
                        <!--    <img src="{{ url('home/img/propertys.jpg')}}" alt="" />-->
                        <!--</div>-->

                        <!----- End Slider Item ---->
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-12 col-sm-12">
            <div class="row" id="property_data">
                @foreach($properties as $property)
                <div class="col-lg-4">
                    <div class="list_box_area">
                        <div class="img_area">
                            <div class="ribbon-wrap">
                                <div class="ribbon">{{ ucwords($property->current_status) }}</div>
                            </div>
                            <div class="ribbon-wrap1">
                                <div class="ribbon1">By Owner</div>
                            </div>
                            @php
                            $images = explode(',', $property->images ?? '');
                            $videos = explode(',', $property->video_links ?? '');

                            @endphp
                            <div class="owl-carousel owl-theme slider-prop" id="slidersm">
                                <!----- Slider Item ---->
                                @foreach($images as $img)
                                @if(!empty($img))
                                <div class="item" id="vdo_playss">
                                    <!--<i class="fa fa-play-circle cursore"></i>-->
                                    <img src="{{ asset($img) }}" alt="" />
                                    <span class="play_lsts">
                                        <!--<img src="{{ url('home/img/live_tv.png')}}" alt="" />-->
                                    </span>
                                </div>
                                @endif
                                @endforeach
                                @foreach($videos as $video)
                                @if(!empty($video))
                                <div class="item vid" id="vdo_playss" onclick="window.open('{{ $video }}', '_blank')">
                                    <i class="fa fa-play-circle cursore"></i>
                                    <!--<iframe width="395" height="220" -->
                                    <!--                            src="{{ $video }}" -->
                                    <!--                            title="YouTube video player" -->
                                    <!--                            frameborder="0" -->
                                    <!--                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" -->
                                    <!--                            allowfullscreen>-->
                                    <!--                        </iframe>-->
                                    <img src="{{ url('home/img/vid-icon-dummy.jpeg')}}" alt="" />
                                    <span class="play_lsts">
                                        <img src="{{ url('home/img/live_tv.png')}}" alt="" />
                                    </span>
                                </div>
                                @endif
                                @endforeach
                                <!----- End Slider Item ---->

                            </div>
                        </div>

                        <div class="ic_area">
                            <div class="croosss" data-toggle="modal" data-target="#purchase_criteria">
                                <i class="fa fa-times"></i>
                            </div>

                            <ul>
                                <!-- <li>
                                    <a href="javascript:void(0);"><i class="fa fa-share"></i></a>
                                </li> -->

                                <li>
                                    <span class="flt_alsss">{{ ucfirst($property->property_type_title) }}</span>
                                </li>

                                <li>
                                    <span class="flt_alsss">{{ ucfirst($property->property_unit) }} BHK</span>
                                </li>
                            </ul>
                        </div>

                        <div class="cnt_boxxs">
                            <h4>{{ ucfirst($property->property_name) }}</h4>

                            <p><i class="fa fa-map-marker"></i>{{ $property->city_name.' '.$property->state_name.' ' .$property->country_name }}</p>

                            <p><i class="fa fa-street-view"></i> {{ ucfirst($property->location_area) }}</p>

                            <p><i class="fa fa-building"></i> {{ ucfirst($property->project_name) }}</p>

                            <p><i class="fa fa-inr"></i>{{ $property->price_from }} - {{ $property->price_to }}</p>

                            <div class="rd_likss boths_links">
                                @if($property->popdata_id)
                                    <a href="javascript:void(0);" class="rdm_link" onclick="openPopup('{{ $property->popdata_id }}', '{{ $property->id }}')">Read More</a>
                                @endif
                                
                                <a href="javascript:void(0);" class="clr_chnagess" onclick="shareOnWhatsApp()">
                                    <i class="fa fa-share"></i> Share
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>

            <div class="paginatiosss">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="sho_liststs">
                            <span class="cnt_showss">Show</span>
                            <select class="slt_areaa" onchange="setPerPage(this.value);">
                                <option value="6" {{ request('per_page') == 6 ? 'selected' : '' }}>6</option>
                                <option value="12" {{ request('per_page') == 12 ? 'selected' : '' }}>12</option>
                                <option value="24" {{ request('per_page') == 24 ? 'selected' : '' }}>24</option>
                            </select>
                            <span class="cnt_showss">Entries</span>
                        </div>
                    </div>
                    <div class="col-lg-9">
                        <div class="pgs_listtss">
                            <ul>
                                @if ($properties->onFirstPage())
                                <li><span><i class="fa fa-angle-left"></i></span></li>
                                @else
                                <li><a href="{{ $properties->previousPageUrl() }}"><i class="fa fa-angle-left"></i></a></li>
                                @endif

                                @foreach ($properties->getUrlRange(1, $properties->lastPage()) as $page => $url)
                                @if ($page == $properties->currentPage())
                                <li><a href="javascript:void(0);" class="act_ft">{{ $page }}</a></li>
                                @else
                                <li><a href="{{ $url }}">{{ $page }}</a></li>
                                @endif
                                @endforeach

                                @if ($properties->hasMorePages())
                                <li><a href="{{ $properties->nextPageUrl() }}"><i class="fa fa-angle-right"></i></a></li>
                                @else
                                <li><span><i class="fa fa-angle-right"></i></span></li>
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
            </div>



        </div>
    </div>
</div>
</div>
<script>
function setCategory(category) {
    document.getElementById('category_id').value = category;
    document.getElementById('property_filter_form').submit();
}
function setPerPage(perPage) {
    document.getElementById('per_page_id').value = perPage;
    document.getElementById('property_filter_form').submit();
}
function shareOnWhatsApp() {
    var url = window.location.href;
    var whatsappUrl = "https://wa.me/?text=" + encodeURIComponent(url);
    window.open(whatsappUrl, '_blank');
}
function openForm(prop_id){
    $('#prop_id').val(prop_id);
    var modalEl = document.getElementById('veioo_criteria');
    var modalInstance1 = bootstrap.Modal.getInstance(modalEl);
    
    if (modalInstance1) {
        modalInstance1.hide();
    }

    var modal = document.getElementById('enqryyees');
    var modalInstance = new bootstrap.Modal(modal);
    modalInstance.show();
}
function openPopup(popup_id, prop_id) {
    var URL = '{{ url("market-place-popup-data") }}';
    const data = {
        prop_id: prop_id,
        popup_id: popup_id,
        _token: '{{ csrf_token() }}' // Important for Laravel
    };

    $.ajax({
        url: URL,
        type: "POST",
        data: data,
        success: function(response) {
            if (response.status === true) {
                $('#popup-content').html(response.data);
                var modal = document.getElementById('veioo_criteria');
                var modalInstance = new bootstrap.Modal(modal);
                modalInstance.show();
                
            } else {
                $('#popup-content').html(`<h1 class="text-center">No Data found.</h1>`);
            }

            if (typeof callback === "function") {
                callback(response);
            }
        },
        error: function(xhr, status, error) {
            console.log("Ajax Error:", error);
            console.log(xhr.responseText);
        }
    });
}
    
</script>
<script>
document.addEventListener('click', function (e) {
    if (e.target.classList.contains('close')) {
        const modalEl = e.target.closest('.modal');
        const modalInstance = bootstrap.Modal.getInstance(modalEl);
        modalInstance.hide();
    }
});
</script>
@include('front.layouts.footer')