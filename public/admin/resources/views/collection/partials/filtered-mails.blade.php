@php 
$fieldkey = rand(1001, 9999);
use App\Models\CollectionItemModel;
$mailCost =  \App\Models\GiftConfigModel::where('key', 'mailcost')->value('price');
@endphp
@foreach($mailData as $key=>$mail)
    @php
        $radioId = 'ck_mail_' . $mail->id . '_' . $setIndex . '_' . $fieldkey;
        $selected = CollectionItemModel::where(['collection_id' => $collectionId, 'postal_type' => 1, 'item_id' => $mail->id, 'set_index' => $setIndex])->exists();
    @endphp

    <div class="col-lg-4">
        <div class="it_emms">
            <div class="ribbon-wrap">
                <div class="ribbon">Available</div>
            </div>
            <input type="hidden" class="old_item_id[]" value="{{ $mail->id }}">
            <input type="radio" 
                class="ck_bx_box summary-item" 
                value="{{ $mail->id }}" 
                id="{{ $radioId }}" 
                name="item_id[{{ $setIndex }}]"
                data-set="{{ $setIndex }}" 
                data-price="{{ $mailCost }}"
                data-title="{{ $mail->title }}"
                data-discount="0"
                data-type="Email"
                @if($selected) checked @endif />
            <label for="{{ $radioId }}"></label>
            <div class="usr_mgss othr_gf"><img src="{{url('uploads')}}/mail/1729910772_mail-thumbnail.png" /></div>
            <h3>{{ $mail->title }}</h3>
            {!! Str::words($mail->subject, 30)  !!}
            <p class="mb-2">Rs.{{ $mailCost }}</p>
            <!-- <p class="mb-2"><span class="red_tx cut_pricess">Rs.{{ $mailCost }}</span> FREE </p> -->
            <p class="mb-3 blues_tx"><strong>For Very Limited Time</strong></p>
            <!-- <div class="snd_btnns"><a href="javascript:void(0);" class="click_m">View Gallery & Video</a></div> -->
        </div>
    </div>
@endforeach
