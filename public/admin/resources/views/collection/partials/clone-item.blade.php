@php
$mailCategories = \App\Models\MailCategoryModel::select('id', 'title as name')->orderBy('id','DESC')->where('status', 1)->where('created_by', Auth::id())->get();
$giftCategories = \App\Models\GiftCategoryModel::select('id', 'name')->orderBy('id','DESC')->where('status', 1)->where('created_by', Auth::id())->get();
@endphp
<div class="CollectionCloneItems" data-set-index="__SET_INDEX__">

    <div class="postalsss">
        <h3>Postal</h3><span class="float-right close-button bg-danger"><i class="fa fa-times"></i></span>
        <div class="slt_partsss">
            <!-- Type -->
            <input type="hidden" class="filter-page" id="page" value="1" />
            <div class="un_slt_araea">
                <select class="slt_als type-selector" name="type[__SET_INDEX__]">
                    <option value="">Select Type</option>
                    <option value="1">Email</option>
                    <option value="2">Gift</option>
                </select>
            </div>
            <!-- Mail Category -->
            <div class="un_slt_araea mail-category" style="display:none;">
                <select class="slt_als mail-category-select get-filter-data" name="mail_category[__SET_INDEX__]">
                    <option value="">Select Mail Category</option>
                    @foreach($mailCategories as $category)
                    <option value="{{ $category->id }}">
                        {{ $category->name }}
                    </option>
                    @endforeach
                </select>
            </div>
            <!-- Gift Category -->
            <div class="un_slt_araea gift-category" style="display:none;">
                <select class="slt_als gift-category-select get-filter-data" name="gift_category[__SET_INDEX__]">
                    <option value="">Select Gift Category</option>
                    @foreach($giftCategories as $category)
                    <option value="{{ $category->id }}">
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
                    <div class="col-lg-9 col-sm-12">
                        <div class="it_emms sort_lisrtst">
                            <ul>
                                <li>
                                    <span class="titalss">Short By</span>
                                </li>
                                <li>
                                    <select class="al_slt_partss get-filter-data filter-availability" name="availability[__SET_INDEX__]">
                                        <option value="">Select Availability</option>
                                        <option value="1">In Stock</option>
                                        <option value="2">Out of Stock</option>
                                    </select>
                                </li>
                                <li>
                                    <select class="al_slt_partss get-filter-data filter-discount" name="discount[__SET_INDEX__]">
                                        <option value="">Select Discount</option>
                                        @for($i = 5; $i <=90; $i+=5)
                                            <option value="{{ $i }}">{{ $i }}%</option>
                                            @endfor
                                    </select>
                                </li>
                                <li>
                                    <select class="al_slt_partss schedule-day d-none" name="schedule_day[__SET_INDEX__]" value="0">
                                        <option value="">Select day(s)</option>
                                        @for($i = 1; $i <= 30; $i++)
                                        <option value="{{ $i }}">
                                            {{ $i }}
                                        </option>
                                        @endfor
                                    </select>
                                </li>
                                <li>
                                    <select class="al_slt_partss schedule-time" name="schedule_time[__SET_INDEX__]">
                                        <option value="">Select time</option>
                                        <option value="00:00:00">12:00 AM</option>
                                        <option value="04:00:00">04:00 AM</option>
                                        <option value="08:00:00">08:00 AM</option>
                                        <option value="12:00:00">12:00 PM</option>
                                        <option value="16:00:00">04:00 PM</option>
                                        <option value="20:00:00">08:00 PM</option>
                                    </select>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-12">
                        <div class="hd_listst">
                            <span class="srcc_barsss"><input type="text" class="sr_tabds filter-text" placeholder="Search.." /></span>
                            <!-- <span class="cartss"><i class="fa fa-shopping-cart"></i> <span class="countss">1</span></span> -->
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
        <div id="tsts_mlts" class="gift_bokkxx">
            <div class="row thankyoucard-container">
            </div>
        </div>
        <div id="req_input" class="datainputs price-container"></div>
    </div>
</div>