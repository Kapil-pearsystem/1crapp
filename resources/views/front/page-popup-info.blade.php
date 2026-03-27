@if($page_data->popup_content_status == 1)
    <p>{{ $page_data->popup_content }}</p>
@endif
<div class="row">
@if($page_data->popup_image_status == 1)
    <div class="col-lg-6">
        <div class="mdl_mg_arar"><img src="{{ ASSETS_PATH.$page_data->popup_image }}" alt="" /></div>
    </div>
    <div class="col-lg-6">
        @else
    <div class="col-lg-12">
@endif
    @if($page_data->embed_form_status == 1)
    <div class="frm_al_suprtsss">
        {!! $page_data->embed_form_code !!}
    </div>
    @else
<div class="frm_al_suprtsss">
    <form action="{{ route('save-page-popup-data') }}" method="post">
        @csrf
        <div class="form-group marges_ic">
            <i class="fa fa-user"></i>
            <input type="hidden" name="page_id" value="{{ $id }}"/>
            <input type="hidden" name="source" value="General Page"/>
            <input type="text" name="name" value="" class="form-control" placeholder="Enter Name" />
        </div>
        <div class="form-group marges_ic">
            <i class="fa fa-envelope"></i>
            <input type="text" name="email" value="" class="form-control" placeholder="Enail ID" />
        </div>
        <div class="form-group marges_ic">
            <i class="fa fa-building"></i>

            <select class="slt_al_arra" name="cdo_category" onchange="getCDO(this.value)" required>
                <option value="">Select Organisation Category</option>
                @foreach($cdo_category as $cdo_cat)
                    <option value="{{ $cdo_cat->id }}">{{ $cdo_cat->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group marges_ic" id="cod_list" style="display:none;">
            <i class="fa fa-building"></i>
            <select class="slt_al_arra" name="cdo_id" id="cdo_id"  onchange="OtherCod(this.value)" required>
                <option value="">Select Company / Organisation</option>
            </select>
        </div>
        <div class="form-group marges_ic" id="other_cod" style="display:none;">
            <i class="fa fa-building"></i>
            <input type="text" name="other_cod" value="" class="form-control" required placeholder="Enter Other Company / Organisation Name" />
        </div>
        <div class="form-group marges_ic">
            <i class="fa fa-phone"></i>
            <input type="text" name="phone" value="" class="form-control" required placeholder="Contact No" />
        </div>

        <div class="form-group marges_ic">
             <i class="fa fa-sitemap"></i>
            <select class="slt_al_arra" name="product_category" onchange="getProduct(this.value)">
                <option value="">Request Product & services</option>
                @foreach($product_category as $p_cat)
                    <option value="{{ $p_cat->id }}">{{ $p_cat->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group marges_ic" id="product_list" style="display:none;">
            <i class="fa fa-building"></i>
            <select class="slt_al_arra" name="product_id" id="product_id" onchange="OtherProduct(this.value)">
                <option value="">Select Product & services</option>
            </select>
        </div>
        <div class="form-group marges_ic" id="other_product" style="display:none;">
            <i class="fa fa-building"></i>
            <input type="text" name="other_product_and_service" value="" class="form-control" required placeholder="Enter Other Product or Service" />
        </div>

        <div class="form-group marges_ic">
            <i class="fa fa-server"></i>
            <textarea name="message" id="" cols="3" rows="3" class="form-control" placeholder="Message" ></textarea>
        </div>

        <div class="form-group">
            <button type="" value="Submit Now" class="btn-submit2">Yes Wisit To Apply Now!</button>
        </div>
    </form>
</div>
@endif
</div>
</div>