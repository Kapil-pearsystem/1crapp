<?php
$priority = array();
if(isset($collection) && !empty($collection->priority)){
    $priority = explode(',',$collection->priority);
}
$tyc_design_ids = array();
if(isset($collection) && !empty($collection->tyc_design_ids)){
    $tyc_design_ids = explode(',',$collection->tyc_design_ids);
}
$intervals = array();
if(isset($collection) && !empty($collection->intervals)){
    $intervals = explode(',',$collection->intervals);
}
?>
@foreach(array_merge($gifts->toArray(), $mails->toArray()) as $key => $list)
    @php
        $isGift = isset($list['mrp']); // Check if item is from $gifts array
        $discountedPrice = $isGift ? $list['mrp'] - ($list['mrp'] * ($list['discount'] / 100)) : null;
    @endphp
    @if($isGift)
        <input type="hidden" name="gift_ids[]" value="{{ $list['id'] }}">
    @else
        <input type="hidden" name="mail_ids[]" value="{{ $list['id'] }}">
    @endif
    <tr>
        <td>{{ $key + 1 }}</td>
        <td>
            {{ $isGift ? $list['title'] : $list['subject'] }}
            <div class="slt_typess">
                <select name="priority[]">
                    @for ($i = 1; $i <= count($mails) + count($gifts); $i++)
                    <?php
                        if(isset($collection) && !empty($collection->priority)){
                            if (isset($priority[$key]) && $priority[$key] == $i) {
                                $selected = true;
                            } else {
                                $selected = false;
                            }
                        }else{
                            if ($key + 1 == $i) {
                                $selected = true;
                            } else {
                                $selected = false;
                            }
                        }
                    ?>
                    <option value="{{ $i }}" {{ $selected ? 'selected' : '' }}>{{ $i }}</option>
                    @endfor
                </select>
            </div>
        </td>
        <td>
            <span class="p_cuss">Rs.{{ $isGift ? $list['mrp'] : 199 }}</span>
            <span class="red_tx"><strong>{{ $isGift ? 'Rs.' . $discountedPrice : 'FREE' }}</strong></span>
        </td>
        @if($isGift)
            <td>
                TYC Design -
                <div class="slt_typess">
                    <select name="tyc_design[]">
                        @for ($j = 1; $j <= 6; $j++)
                            <?php
                                if(isset($collection) && !empty($collection->tyc_design_ids)){
                                    if (isset($tyc_design_ids[$key]) && $tyc_design_ids[$key] == $j) {
                                        $selected2 = true;
                                    } else {
                                        $selected2 = false;
                                    }
                                }else{
                                    if ($key + 1 == $j) {
                                        $selected2 = true;
                                    } else {
                                        $selected2 = false;
                                    }
                                }
                            ?>
                            <option value="{{ $j }}" {{ $selected2 ? 'selected' : '' }}>{{ $j }}</option>
                        @endfor
                    </select>
                </div>
            </td>
            <td>
                <span class="p_cuss"></span> <span class="red_tx"><strong>{{ $thankyou_card->price }}</strong></span>
            </td>
        @else
            <td></td>
            <td></td>
        @endif

        <td>
            <span class="add_data">&nbsp; After </span>
            <div id="dataadss">
                <div class="addbtns_plss multi_adds">
                    <div class="input-group-button">
                        <button type="button" class="button hollow circle" data-quantity="minus" data-field="quantity" data-index="{{ $key }}">
                            <i class="fa fa-minus" aria-hidden="true"></i>
                        </button>
                    </div>
                    <input class="input-group-field" type="number" name="days[]" value="{{ isset($intervals) && isset($intervals[$key]) ? $intervals[$key] : 0 }}">
                    <div class="input-group-button">
                        <button type="button" class="button hollow circle" data-quantity="plus" data-field="quantity" data-index="{{ $key }}">
                            <i class="fa fa-plus" aria-hidden="true"></i>
                        </button>
                    </div>
                </div>
            </div>
            <span class="add_data"> Days &nbsp;</span>
        </td>
    </tr>
@endforeach
