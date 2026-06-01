@php
$thankyou_card = \App\Models\ThankYouCardModel::where('status',1)->get();
@endphp
@foreach($thankyou_card as $card)
<div class="item col-lg-4 col-md-6 col-sm-12">
    <div class="it_emms giftts" id="bx1">
        <!---- Tages ---->
        <div class="ribbon-wrap">
            <div class="ribbon">Available</div>
        </div>
        <!---- End Tages ---->
        <div class="boths_gfts">
            <div class="giftss"><img src="{{url('admin')}}/img/gift_crd.png" alt="" /></div>
            <div id="tsts_mlts" class="gf_listst">
                <div class="radio">
                    <input 
                        class="tyc-id summary-item" 
                        id="thank_you_card" 
                        name="tyc_id[__SET_INDEX__]" 
                        value="{{ $card->id }}" 
                        data-price="{{ $card->price }}"
                        data-title="{{ $card->name }}"
                        data-discount="0"
                        data-type="TYC"
                        type="radio" />
                </div>
            </div>
            <div class="qerrst"><img src="{{url('admin')}}/img/b_qr_pay_1cr.png" alt="" /></div>
        </div>
        <div class="thk_arara">
            <h2>Thanks You</h2>
            <p class="grenss_tx">XXXXXX (Name)</p>
        </div>
        <p> {{ Str::words($card->description, 20) }}</p>
        <div class="usr_mgss tycimg"><img src="{{url('admin')}}/img/user_testi.jpg" /></div>
        <h5>Thanks You</h5>
        <h3>Mr. Amit Kumar Yadav</h3>
        <p class="blues_tx mb-0"><strong>www.ramjeemena.com</strong></p>
        <p class="red_tx mb-3"><strong>Ramjee Enterprises</strong></p>
        <div class="w_numbber">
            <a target="_blank" href="https://api.whatsapp.com/send/?phone=%2B911234567890&amp;text=Hi&amp;app_absent=0"> <i class="fa fa-whatsapp"></i> +91 1234 5678 90</a>
        </div>
        <div class="pric_txtx">Rs.{{ $card->price }}/Peice</div>
    </div>
</div>
@endforeach