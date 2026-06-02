@extends('layouts.app')
@section('title', isset($collection)?'Edit':'Add'.' Collection')
@section('content')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<link rel="stylesheet" href="{{ asset('css/collection.css') }}">
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">{{ isset($collection)?'Edit':'Add' }} Collection</h1>
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <a href="{{ route('collection.index') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-arrow-left fa-sm text-white-50"></i> Back</a>
    </div>
    {{-- Alert Messages --}}
    @include('common.alert')
    <!-- Form for Creating OPC Resource -->
    <div class="card shadow mb-4">
        <div id="stap_fildess">
            <div class="multisteps-form">
                <div class="container">
                    <!--progress bar-->
                    <div class="row">
                        <div class="col-12 col-lg-12 ml-auto mr-auto mb-4">
                            <div class="multisteps-form__progress">
                                <button class="multisteps-form__progress-btn js-active" type="button" title="Select Gifts">Select Gifts <span class="cnt_numbbers">1</span></button>
                                <button class="multisteps-form__progress-btn" type="button" title="Than You Note">Than You Note <span class="cnt_numbbers">2</span></button>
                                <button class="multisteps-form__progress-btn" type="button" title="Than You Note">Select Data <span class="cnt_numbbers">3</span></button>
                            </div>
                        </div>
                    </div>
                    <!--form panels-->
                    <div class="row">
                        <div class="col-12 col-lg-12 m-auto">
                            <form class="multisteps-form__form" method="POST" action="{{ route('collection.save') }}" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="collection_id" value="{{ isset($collection) ? $collection->id : '' }}">
                                <!-- ONE STEP -->
                                <div class="multisteps-form__panel shadow p-4 rounded bg-white js-active" data-animation="scaleIn">
                                    <div class="multisteps-form__content">
                                        <div class="manag_box_partss">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>Name of the Sequence <span class="text-danger">*</span></label>
                                                        <input type="text" id="title" name="title" class="form-control" placeholder="Enter here" required="" value="{{ old('title', isset($collection) ? $collection->title : '') }}" />
                                                    </div>
                                                    <span class="text-danger titleError">{{ $errors->first('title') }}</span>
                                                </div>
                                                <div class="col-lg-12">
                                                    <div class="button-row d-flex mt-4">
                                                        <button class="btn btn-primary ml-auto js-btn-next" type="button" title="Next" onclick="return validateFirstStep(event)">Next</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End ONE STEP -->
                                <!-- SECEND STEP -->
                                <div class="multisteps-form__panel shadow p-4 rounded bg-white" data-animation="scaleIn">
                                    @if(isset($collection) && $collectionItems->isNotEmpty())
                                        @foreach($collectionItems as $ikey => $item)
                                            <div class="CollectionCloneItems" data-set-index="{{ $item->set_index }}">
                                                <div class="postalsss">
                                                    <h3>Postal</h3>
                                                    <div class="slt_partsss">
                                                        <!-- Type -->
                                                        <input type="hidden" id="tyc_status_{{ $item->set_index }}" class="tyc-status" name="tycs[{{ $item->set_index }}]" value="{{ $item->thankYouStatus }}" />
                                                        <input type="hidden" id="tyc_id_{{ $item->set_index }}" class="tyc-edit-id" name="tyc_id[{{ $item->set_index }}]" value="{{ $item->tyc_id }}" />
                                                        <input type="hidden" class="filter-page" id="item_id_{{ $item->set_index }}" value="{{ $item->id }}" />
                                                        <div class="un_slt_araea">
                                                            <select class="slt_als type-selector" name="type[{{ $item->set_index }}]">
                                                                <option value="">Select Type</option>
                                                                <option value="1" {{ $item->postal_type == '1' ? 'selected' : '' }}>Email</option>
                                                                <option value="2" {{ $item->postal_type == '2' ? 'selected' : '' }}>Gift</option>
                                                            </select>
                                                        </div>
                                                        <!-- Mail Category -->
                                                        <div class="un_slt_araea mail-category" @if($item->postal_type != '1') style="display:none;" @endif>
                                                            <select class="slt_als mail-category-select get-filter-data" name="mail_category[{{ $item->set_index }}]">
                                                                <option value="">Select Mail Category</option>
                                                                @foreach($mailCategories as $category)
                                                                    <option value="{{ $category->id }}" @if($item->postal_type == '1' && $item->category == $category->id) selected @endif>
                                                                        {{ $category->name }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <!-- Gift Category -->
                                                        <div class="un_slt_araea gift-category" @if($item->postal_type != '2') style="display:none;" @endif>
                                                            <select class="slt_als gift-category-select get-filter-data" name="gift_category[{{ $item->set_index }}]">
                                                                <option value="">Select Gift Category</option>
                                                                @foreach($giftCategories as $category)
                                                                    <option value="{{ $category->id }}" @if($item->postal_type == '2' && $item->category == $category->id) selected @endif>
                                                                        {{ $category->name }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="multisteps-form__content ">
                                                    <div class="plp_slt_readlt">
                                                        <div class="stp_contetnt" id="tsts_mlts">
                                                            <!--- Mobile View Filtter ---->
                                                            <div class="row">
                                                                <div class="col-lg-9 col-4">
                                                                    <div class="it_emms sort_lisrtst mb_view_none">
                                                                        <ul>
                                                                            <li>
                                                                                <span class="titalss">Short By</span>
                                                                            </li>
                                                                            <li>
                                                                                <select class="al_slt_partss get-filter-data filter-availability" name="availability[{{ $item->set_index }}]">
                                                                                    <option value="">Select Availability</option>
                                                                                    <option value="1" @if(isset($item) && $item->availability == '1') selected @endif>In Stock</option>
                                                                                    <option value="2" @if(isset($item) && $item->availability == '2') selected @endif>Out of Stock</option>
                                                                                </select>
                                                                            </li>
                                                                            <li>
                                                                                <select class="al_slt_partss get-filter-data filter-discount" name="discount[{{ $item->set_index }}]">
                                                                                    <option value="">Select Discount</option>
                                                                                    @for($i = 5; $i <=90; $i+=5)
                                                                                        <option value="{{ $i }}" @if(isset($item) && $item->discount == $i) selected @endif>{{ $i }}%</option>
                                                                                    @endfor
                                                                                </select>
                                                                            </li>
                                                                            
                                                                            <li>
                                                                                <select class="al_slt_partss schedule-day get-filter-data @if($ikey == 0) d-none @endif" name="schedule_day[{{ $item->set_index }}]">
                                                                                    <option value="">Select day(s)</option>
                                                                                    @for($i = 1; $i <= 30; $i++)
                                                                                    <option value="{{ $i }}" @if($item->schedule_day == $i) selected @endif>
                                                                                        {{ $i }}
                                                                                    </option>
                                                                                    @endfor
                                                                                </select>
                                                                            </li>
                                                                            <li>
                                                                                <select class="al_slt_partss schedule-time get-filter-data" name="schedule_time[{{ $item->set_index }}]">
                                                                                    <option value="">Select time</option>
                                                                                    <option value="00:00:00"  @if($item->schedule_time == '00:00:00') selected @endif>12:00 AM</option>
                                                                                    <option value="04:00:00"  @if($item->schedule_time == '04:00:00') selected @endif>04:00 AM</option>
                                                                                    <option value="08:00:00"  @if($item->schedule_time == '08:00:00') selected @endif>08:00 AM</option>
                                                                                    <option value="12:00:00"  @if($item->schedule_time == '12:00:00') selected @endif>12:00 PM</option>
                                                                                    <option value="16:00:00"  @if($item->schedule_time == '16:00:00') selected @endif>04:00 PM</option>
                                                                                    <option value="20:00:00"  @if($item->schedule_time == '20:00:00') selected @endif>08:00 PM</option>
                                                                                </select>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-3 col-8">
                                                                    <div class="hd_listst">
                                                                        <span class="srcc_barsss">Search: <input type="text" class="sr_tabds filter-text" placeholder="" /></span>
                                                                        <span class="cartss"><i class="fa fa-shopping-cart"></i> <span class="countss">1</span></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="mt-3">
                                                            <div class="mt-4" id="tsts_mlts">
                                                                <div class="qu_bx_partss">
                                                                    <div class="row filtered-results">
                                                                        <p class="text-center text-light">Please select type and category to see the results.</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--- Add More --->
                                                    <div class="add_itemsss"></div>
                                                    <div id="tsts_mlts" class="row gift_bokkxx thankyoucard-container"></div>
                                                    <div id="req_input" class="datainputs price-container"></div>
                                                </div>
                                            </div>
                                        @endforeach
                                    @else
                                        @include('collection.partials.clone-item')
                                    @endif
                                    <div class="CollectionContainer">
                                    </div>
                                    <div class="ad_more_araea">
                                        <a href="javascript:void(0);" id="addmore" class="add_input">Add Next Item</a>
                                        <div id="req_input" class="datainputs">
                                        </div>
                                    </div>
                                    <div class="button-row d-flex mt-4">
                                        <button class="btn btn-primary js-btn-prev" type="button" title="Prev">Prev</button>
                                        <button class="btn btn-primary ml-auto js-btn-next" type="button" title="Next">Next</button>
                                    </div>
                                </div>
                                <!-- End SECEND STEP -->
                                <!-- Three STEP -->
                                <div class="multisteps-form__panel shadow p-4 rounded bg-white" data-animation="scaleIn">
                                    <div class="t_data_data">
                                        <div class="table-responsive">
                                            <table class="table table-bordered craete_ttblss">
                                                <thead>
                                                    <tr>
                                                        <th>S.No</th>
                                                        <th>Type</th>
                                                        <th>Item Name</th>
                                                        <th>MRP</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="summary_table_body">
                                                    @if(isset($collection) && $collectionItems->isNotEmpty())
                                                        @foreach($collectionItems as $key => $item)
                                                            <tr>
                                                                <td>{{ $key + 1 }}</td>
                                                                <td>{{ $item->postal_type == '1' ? 'Email' : 'Gift' }}</td>
                                                                <td>
                                                                    @if($item->postal_type == '1')
                                                                        {{ \App\Models\GiftMailModel::where('id', $item->item_id)->value('title') }}
                                                                    @else
                                                                        {{ \App\Models\GiftModel::where('id', $item->item_id)->value('title') }}
                                                                    @endif
                                                                </td>
                                                                <td>
                                                                    @if($item->postal_type == '1')
                                                                        Rs.{{ \App\Models\GiftConfigModel::where('key', 'mailcost')->value('price') }}
                                                                    @else
                                                                        Rs.{{ \App\Models\GiftModel::where('id', $item->item_id)->value('mrp') }}
                                                                    @endif
                                                                </td>
                                                            </tr>
                                                            @if($item->thankYouStatus == 1)
                                                                <tr>
                                                                    <td>{{ $key + 1 }}</td>
                                                                    <td>TYC</td>
                                                                    <td>
                                                                        @if($item->tyc_id)
                                                                            {{ \App\Models\ThankYouCardModel::where('id', $item->tyc_id)->value('name') }}
                                                                        @endif
                                                                    </td>
                                                                    <td>
                                                                        @if($item->tyc_id)
                                                                            {{ \App\Models\ThankYouCardModel::where('id', $item->tyc_id)->value('price') }}
                                                                        @endif
                                                                    </td>
                                                                </tr>
                                                            @endif
                                                        @endforeach
                                                    @endif
                                                </tbody>
                                                <tbody>
                                                    <tr>
                                                        <th colspan="3" class="text-right">Total</th><th id="total-smr">{{ old('total', isset($collection) ? $collection->total : '0.00') }}</th>
                                                        <input type="hidden" name="total" id="total-smr-input" value="{{ old('total', isset($collection) ? $collection->total : '0') }}" />
                                                    </tr>
                                                    <tr>
                                                        <td colspan="3" align="right">Discount</td>
                                                        <td id="discount-smr">{{ old('discount', isset($collection) ? $collection->discount : '0.00') }}</td>
                                                        <input type="hidden" name="discount" id="discount-smr-input" value="{{ old('discount', isset($collection) ? $collection->discount : '0') }}" />
                                                    </tr>
                                                    <tr>
                                                        <td colspan="3" align="right">Total After Discount</td>
                                                        <td id="final-total-smr">{{ old('final_total', isset($collection) ? $collection->final_total : '0.00') }}</td>
                                                        <input type="hidden" name="final_total" id="final-total-smr-input" value="{{ old('final_total', isset($collection) ? $collection->final_total : '0') }}" />
                                                    </tr>
                                                    <tr>
                                                        <td colspan="3" align="right" id="courier-text-smr">Courier Charges (Rs. 30 / Item X 4 Gift Item)</td>
                                                        <td id="courier-smr">{{ old('courier', isset($collection) ? $collection->courier : '0.00') }}</td>
                                                        <input type="hidden" name="courier" id="courier-smr-input" value="{{ old('courier', isset($collection) ? $collection->courier : '0') }}" />
                                                    </tr>
                                                    <tr>
                                                        <td colspan="3" align="right">Handling & Packaging Charges</td>
                                                        <td id="handling-smr">{{ old('handling', isset($collection) ? $collection->handling : '0.00') }}</td>
                                                        <input type="hidden" name="handling" id="handling-smr-input" value="{{ old('handling', isset($collection) ? $collection->handling : '0') }}" />
                                                    </tr>
                                                    <tr>
                                                        <td colspan="3" align="right">Taxes (GST) : {{ $config['gst'] ?? 0 }}%</td>
                                                        <td id="gst-smr">{{ old('gst', isset($collection) ? $collection->gst : '0.00') }}</td>
                                                        <input type="hidden" name="gst" id="gst-smr-input" value="{{ old('gst', isset($collection) ? $collection->gst : '0') }}" />
                                                    </tr>
                                                    <tr>
                                                        <th colspan="3" class="text-right">Gross Amount Per Campaign / Clinet</th>
                                                        <th id="gross-amount-smr">{{ old('gross_amount', isset($collection) ? $collection->gross_amount : '0.00') }}</th>
                                                        <input type="hidden" name="gross_amount" id="gross-amount-smr-input" value="{{ old('gross_amount', isset($collection) ? $collection->gross_amount : '0') }}" />
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="button-row d-flex mt-4">
                                        <button class="btn btn-primary js-btn-prev" type="button" title="Prev">Prev</button>
                                        <button class="btn btn-primary ml-auto" type="submit" title="">{{ isset($collection)?'Update':'Save' }} Collection</button>
                                    </div>
                                </div>
                                <!-- End Three STEP -->
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<!-- <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script> -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $("input[name=action]").change(function() {
            var test = $(this).val();
            $(".show-hide").hide();
            $("#" + test).show();
        });
    });
</script>
<script>
    $(document).ready(function() {
        $('[data-toggle="tooltip"]').tooltip();
    });
</script>
<script>
    var $el = $(".fitter");
    var $ee = $(".show_data");
    $el.click(function(e) {
        e.stopPropagation();
        $(".show_data").toggleClass('active');
    });
    $(document).on('click', function(e) {
        if (($(e.target) != $el) && ($ee.hasClass('active'))) {
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
<script>
const baseClone = @json(view('collection.partials.clone-item')->render());
$(document).ready(function() {
    const isEditMode = {{ isset($collection) ? 'true' : 'false' }};
    if (!isEditMode) {
        let $baseClone = $(baseClone);
        $baseClone.find('.schedule-day').hide();
        let firstSet = $('<div>').append($baseClone.clone()).html();
        firstSet = firstSet.replaceAll('__SET_INDEX__', 0);
        $('.CollectionCloneItems').first().replaceWith(firstSet);
    }
    let setCounter = 1;
    if (isEditMode) {
        setCounter = parseInt($('.CollectionCloneItems').last().data('set-index')) + 1;
    }
    // $('#addmore').on('click', function() {
    //     let $newClone = $(baseClone);
    //     if (!isEditMode) {
    //         $newClone.find('.schedule-day').hide();
    //     }
    //     let newHtml = $('<div>').append($newClone.clone()).html();
    //     if($('.CollectionCloneItems').length > 0){
    //         newHtml.find('.schedule-day').removeClass('d-none');
    //     }
    //     newHtml = newHtml.replaceAll('__SET_INDEX__', setCounter);
    //     $('.CollectionContainer').append(newHtml);
    //     setCounter++;
    // });
    $('#addmore').on('click', function() {
        let $newClone = $(baseClone);
        if ($('.CollectionCloneItems').length > 0) {
            $newClone.find('.schedule-day').removeClass('d-none');
        }
        let newHtml = $('<div>').append($newClone.clone()).html();
        newHtml = newHtml.replaceAll('__SET_INDEX__', setCounter);
        $('.CollectionContainer').append(newHtml);
        setCounter++;
    });
});
</script>
<script>
$(document).ready(function () {
    $(document).on('change', '.type-selector', function () {
        let value = $(this).val();
        // Current parent wrapper
        let parentBox = $(this).closest('.slt_partsss');
        // Hide all first
        parentBox.find('.mail-category').hide();
        parentBox.find('.gift-category').hide();
        // Show according to selected value
        if (value == '1') {
            parentBox.find('.mail-category').show();
        } 
        else if (value == '2') {
            parentBox.find('.gift-category').show();
        }
    });
});
</script>
<script>
$(document).ready(function () {
    $(document).on('change', '.type-selector', function () {
        let value = $(this).val();
        let parent = $(this).closest('.CollectionCloneItems');
        if (value == '1') {
            parent.find('.mail-category').show();
            parent.find('.gift-category').hide();
        } else if (value == '2') {
            parent.find('.gift-category').show();
            parent.find('.mail-category').hide();
        } else {
            parent.find('.mail-category').hide();
            parent.find('.gift-category').hide();
        }
    });
});
$(document).ready(function () {
$('.CollectionCloneItems').each(function () {
    loadFilteredData($(this));
});
$(document).on(
    'change keyup',
    '.get-filter-data, .type-selector, .filter-text',
    function () {
        let parent = $(this).closest('.CollectionCloneItems');
        loadFilteredData(parent);
    }
);
});
function loadFilteredData(parent){
    let postal_type   = parent.find('.type-selector').val();
    let mail_category = parent.find('.mail-category-select').val();
    let gift_category = parent.find('.gift-category-select').val();
    let availability  = parent.find('.filter-availability').val();
    let discount      = parent.find('.filter-discount').val();
    let filter_text   = parent.find('.filter-text').val();
    let page          = parent.find('.filter-page').val();
    const setIndex    = parent.data('set-index');
    // alert(setIndex);
    let filterData = {
        _token: '{{ csrf_token() }}',
        collection_id: '{{ isset($collection) ? $collection->id : "" }}',
        set_index: setIndex,
        postal_type: postal_type,
        mail_category: mail_category,
        gift_category: gift_category,
        availability: availability,
        discount: discount,
        filter_text: filter_text,
        page: page
    };
    if(mail_category || gift_category){
        // alert(setIndex);
        $.ajax({
            url: "{{ route('collection.filter') }}",
            type: 'POST',
            data: filterData,
            success: function (response) {
                if(response.status == true){
                    if(response.count > 0){
                        parent.find('.filtered-results').html(response.data);
                    }else{
                        parent.find('.filtered-results').html(
                            '<p class="text-center text-light">No results found.</p>'
                        );
                    }
                }else{
                    parent.find('.filtered-results').html(response.message);
                }
            },
            error: function () {
                alert('Something went wrong!');
            }
        });
        loadSummaryForCheckedItems();
    }
}
</script>
<!-- // for appending summary on selection of item -->
<script>
const summaryTemplate = @json(view('collection.partials.item-summary')->render());
function appendSummary(element) {
    let currentPrice = $(element).data('price');
    let itemPriceElement = `
        <span class="t_red">Rs.${currentPrice}</span>
        <span class="t_grean">Rs.${currentPrice * 0.8}</span>
    `;
    let parent1 = $(element).closest('.CollectionCloneItems');
    let setCounter = parent1.data('set-index');
    let updatedTemplate = summaryTemplate.replaceAll('__SET_INDEX__', setCounter);
    let summaryClone = $(updatedTemplate);
    summaryClone.find('.item-price').html(itemPriceElement);
    parent1.find('.add_itemsss').html(summaryClone);
    if(parent1.find('.tyc-status').val() == 1){
        parent1.find('.thankyoucard-status').attr('checked', true);
    }
    loadThankYouItems();
}
// Change event
$(document).on('change', '.ck_bx_box', function () {
    appendSummary(this);
});
function loadSummaryForCheckedItems() {
    setTimeout(function () {
        $('.ck_bx_box:checked').each(function () {
            appendSummary(this);
        });
    }, 500);
}
function loadThankYouItems() {
    setTimeout(function () {
        $('.thankyoucard-status:checked').each(function () {
            appendThankyouCard(this);
        });
    }, 500);
}
</script>
<!-- for load thankyou cards -->
 <script>
    const thankYouCardTemplate = @json(view('collection.partials.thankyou-card')->render());
    $(document).on('change', '.thankyoucard-status', function () {
        appendThankyouCard(this);
    });
    function appendThankyouCard(element) {
        let parent1 = $(element).closest('.CollectionCloneItems');
        if($(element).is(':checked')){
            parent1.find('.tyc-status').val(1);
            let setCounter = parent1.data('set-index');
            let thankYouCardClone = $(thankYouCardTemplate);
            let updatedTemplate = thankYouCardTemplate.replaceAll('__SET_INDEX__', setCounter);
            parent1.find('.thankyoucard-container').html(updatedTemplate);
        }else{
            parent1.find('.tyc-status').val(0);
            parent1.find('.thankyoucard-container').empty();
        }
        var tyc_id = parent1.find('.tyc-edit-id').val();
        parent1.find('.tyc-id[value="' + tyc_id + '"]').prop('checked', true);
    }
</script>
<script>
    function calculateSummary() {

        var totalPrice = 0;
        var totalDiscount = 0;
        var rows = '';
        var srNo = 1;

        var gst = parseFloat("{{ $config['gst'] ?? 0 }}");
        var courierCost = parseFloat("{{ $config['courier'] ?? 0 }}");
        var handlingCost = parseFloat("{{ $config['handing'] ?? 0 }}");
        var mailcost = parseFloat("{{ $config['mailcost'] ?? 0 }}");

        var gstAmount = 0;
        var totalItems = 0;

        $('.summary-item:checked').each(function () {

            let price = parseFloat($(this).data('price')) || 0;
            let title = $(this).data('title');
            let type  = $(this).data('type');
            if (type == 'Gift') {
                totalItems++;
            }
            let discount = parseFloat($(this).data('discount')) || 0;
            let discountAmount = (price * discount) / 100;

            gstAmount += (price * gst) / 100;
            totalPrice += price;
            totalDiscount += discountAmount;

            rows += `
                <tr>
                    <td>${srNo++}</td>
                    <td>${type}</td>
                    <td>${title}</td>
                    <td>${price}</td>
                </tr>
            `;
        });
        console.log('Total gift items:', totalItems);
        $('#summary_table_body').html(rows);
        $('#total-smr').text(totalPrice.toFixed(2));
        $('#total-smr-input').val(totalPrice.toFixed(2));
        $('#discount-smr').text(totalDiscount.toFixed(2));
        $('#discount-smr-input').val(totalDiscount.toFixed(2));
        $('#final-total-smr').text((totalPrice - totalDiscount).toFixed(2));
        $('#final-total-smr-input').val((totalPrice - totalDiscount).toFixed(2));
        $('#gst-smr').text(gstAmount.toFixed(2));
        $('#gst-smr-input').val(gstAmount.toFixed(2));
        var courierText = `Courier Charges (Rs. {{ $config['courier'] ?? 0 }} / Item X ${totalItems} Item)`;
        let courierCostTotal = courierCost * totalItems;
        $('#courier-text-smr').text(courierText);
        $('#courier-smr').text(courierCostTotal.toFixed(2));
        $('#courier-smr-input').val(courierCostTotal.toFixed(2));
        $('#handling-smr').text(handlingCost.toFixed(2));
        $('#handling-smr-input').val(handlingCost.toFixed(2));
        let grossAmount = (totalPrice - totalDiscount) + gstAmount + courierCostTotal + handlingCost;
        $('#gross-amount-smr').text(grossAmount.toFixed(2));
        $('#gross-amount-smr-input').val(grossAmount.toFixed(2));
    }
    $(document).on('change', '.summary-item', function () {
        calculateSummary();
    });
    $(document).ready(function () {
        setTimeout(function () {
            calculateSummary();
        }, 2000);
    });
</script>
<script>
function validateFirstStep(e) {
    if (!$('#title').val().trim()) {
        $('.titleError').text('Please enter sequence name.');
        // alert('Please enter sequence name.');
        e.stopPropagation();
        return false;
    }
    return true;
}
function validateSecondStep() {
    let isValid = true;
    $('.CollectionCloneItems').each(function (index) {
        let type = $(this).find('.type-selector').val();
        if (!type) {
            alert('Please select type for all items.');
            isValid = false;
            return false;
        }
        if (type == '1') {
            let mailCategory = $(this).find('.mail-category-select').val();
            if (!mailCategory) {
                alert('Please select mail category for all email items.');
                isValid = false;
                return false;
            }
        } else if (type == '2') {
            let giftCategory = $(this).find('.gift-category-select').val();
            if (!giftCategory) {
                alert('Please select gift category for all gift items.');
                isValid = false;
                return false;
            }
        }
        // Skip days validation for first item
        if (index > 0) {
            let days = $(this).find('.schedule-day').val();
            if (!days) {
                alert('Please select schedule day for all items.');
                isValid = false;
                return false;
            }
        }
        // Validate item selection for current block
        if ($(this).find('.ck_bx_box:checked').length === 0) {
            alert('Please select at least one item.');
            isValid = false;
            return false;
        }
        let ScheduleTime = $(this).find('.schedule-time').val();
        if (!ScheduleTime) {
            alert('Please select schedule time for all items.');
            isValid = false;
            return false;
        }
    });
    return isValid;
}
</script>
@endsection