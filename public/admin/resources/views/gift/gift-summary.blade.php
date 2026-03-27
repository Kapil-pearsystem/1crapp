<?php
    use App\Models\GiftConfigModel;
    $gst_tax = GiftConfigModel::where(['status'=>1,'key'=>'gst'])->first();
    $corier_charge = GiftConfigModel::where(['status'=>1,'key'=>'courier'])->first();
    $handing_charge = GiftConfigModel::where(['status'=>1,'key'=>'handing'])->first();
?>
<style>
/* Styling for the input group */
#dataadss {
    display: flex;
    align-items: center;
    justify-content: center;
}

.addbtns_plss {
    display: flex;
    align-items: center;
    gap: 5px;
}

.input-group-button .button {
    width: 30px;
    height: 30px;
    border: 1px solid #ddd;
    border-radius: 50%;
    background-color: #f5f5f5;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 16px;
    transition: background-color 0.3s ease;
}

.input-group-button .button:hover {
    background-color: #e0e0e0;
}

/* .input-group-field {
    width: 50px;
    text-align: center;
    border: 1px solid #ddd;
    border-radius: 4px;
    font-size: 16px;
} */
</style>
 <table class="table table-bordered">
    <thead>
        <tr>
            <th>S.No.</th>
            <th>Items</th>
            <th>QTY Per Customer <span class="ques_top" data-toggle="tooltip" data-placement="right" title="Hooray!">?</span></th>
            <!-- <th>No of Customer <span class="ques_top" data-toggle="tooltip" data-placement="right" title="Hooray!">?</span></th> -->
            <th>Item Prices <span class="ques_top" data-toggle="tooltip" data-placement="right" title="Hooray!">?</span></th>
        </tr>
    </thead>
    <tbody>
        <!-- Table List -->
        <tr>
            <td>1.</td>
            <td>Gifts</td>
            <td id="gift_quantity">{{ count($gift_ids) }}</td>

            <!-- <td>
                <span class="add_data">&nbsp;</span>
                <div id="dataadss">
                <div class="addbtns_plss">
                    <div class="input-group-button">
                        <button type="button" class="button hollow circle" data-quantity="minus" data-field="quantity">
                        <i class="fa fa-minus" aria-hidden="true"></i>
                        </button>
                    </div>
                    <input class="input-group-field" type="number" name="quantity" value="0">
                    <div class="input-group-button">
                        <button type="button" class="button hollow circle" data-quantity="plus" data-field="quantity">
                        <i class="fa fa-plus" aria-hidden="true"></i>
                        </button>
                    </div>
                    </div>
                </div>
            </td> -->
            <td id="total_price">
                Rs. {{ $total_price }}
            </td>
        </tr>
        <!-- End Table List -->

        <!-- Table List -->
         <?php
            $ct_mails = count(array_filter($mail_ids));
            if($ct_mails>0){
         ?>
        <tr>
            <td>2.</td>
            <td>Mails</td>
            <td>{{ $ct_mails }}</td>

            <!-- <td>
                &nbsp;
            </td> -->
            <td>
                FREE
            </td>
        </tr>
        <?php } ?>
        <!-- End Table List -->
        <!-- Table List -->
        <tr>
            <td>2</td>
            <td>Thank You Card</td>
            <td>{{ count($template_id) }}</td>

            <!-- <td>
                &nbsp;
            </td> -->
            <td>
                Rs. {{ $card_price?$card_price:0 }}
            </td>
        </tr>
        <!-- End Table List -->

        <!-- Table List -->
        <tr>
            <td colspan="3" align="right"><strong>Sub Total</strong></td>

            <!-- <td>
                &nbsp;
            </td> -->
            <td>
                Rs. {{ $sub_total }}
                <input type="hidden" name="sub_total" value="{{ $sub_total }}">
            </td>
        </tr>
        <!-- End Table List -->

        <!-- Table List -->
        <tr>
            <td colspan="3" align="right"><strong>Pay Now only (For Limited Time Offer) </strong></td>

            <td>
                <span class="p_cuss red_tx">Rs. {{ $sub_total }}</span> <span class=""><strong>Rs.{{ $sub_total-$total_discount }}</strong></span>
            </td>
        </tr>
        <!-- End Table List -->

        <!-- Table List -->
        <tr>
            <td colspan="3" align="right" class="red_tx"><strong>Your Total Saving for Today</strong></td>
            <td class="red_tx">
                <strong>Rs. {{ $total_discount }}</strong>
                <input type="hidden" name="discount" value="{{ $total_discount }}">
            </td>
        </tr>
        <!-- End Table List -->

        <!-- Table List -->
        <tr>
            <td colspan="3" align="right">GST Taxes (18%) <span class="ques_top" data-toggle="tooltip" data-placement="right" title="Hooray!">?</span></td>
            <td>
                Rs. {{ $gst_tax->price?$gst_tax->price:'0' }}
                <input type="hidden" name="gst_taxes" value="{{ $gst_tax->price?$gst_tax->price:'0' }}">
            </td>
        </tr>
        <!-- End Table List -->

        <!-- Table List -->
        <tr>
            <td colspan="3" align="right">Courier Charges <span class="ques_top" data-toggle="tooltip" data-placement="right" title="Hooray!">?</span></td>
            <td>
                Rs. {{ $corier_charge->price?$corier_charge->price:'0' }}
                <input type="hidden" name="courier_charges" value="{{ $corier_charge->price?$corier_charge->price:'0' }}">
            </td>
        </tr>
        <!-- End Table List -->

        <!-- Table List -->
        <tr>
            <td colspan="3" align="right">Handing Charges <span class="ques_top" data-toggle="tooltip" data-placement="right" title="Hooray!">?</span></td>
            <td>
                Rs. {{ $handing_charge->price?$handing_charge->price:'0' }}
                <input type="hidden" name="handing_charges" value="{{ $handing_charge->price?$handing_charge->price:'0' }}">
            </td>
        </tr>
        <!-- End Table List -->
        <!-- Table List -->
        <tr>
            <td colspan="3" align="right"><strong>No. of Customer</strong></td>

            <td>
                <div id="dataadss">
                    <div class="addbtns_plss">
                        <div class="input-group-button">
                            <button type="button" class="button hollow circle" data-quantity="minus" data-field="no_of_customers">
                                <i class="fa fa-minus" aria-hidden="true"></i>
                            </button>
                        </div>
                        <input class="input-group-field" type="number" name="no_of_customers" id="no_of_customers" value="{{ isset($collection) && isset($collection->no_of_customers) ? $collection->no_of_customers : 1 }}" min="1">
                        <div class="input-group-button">
                            <button type="button" class="button hollow circle" data-quantity="plus" data-field="no_of_customers">
                                <i class="fa fa-plus" aria-hidden="true"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </td>
            <tr>
            <td colspan="3" align="right"><strong>Enter Collection Title</strong></td>
            <td>

                <input class="input-group-field" type="text" name="title" value="{{ isset($collection) && isset($collection->title) ? $collection->title : '' }}" placeholder="Enter Collection Title" required>
            </td>
        </tr>
        <!-- End Table List -->

        <tr>
            <th colspan="3" class="text-right" align="right">Gross Amount Payable Now</th>
            <th>Rs. {{ $sub_total-$total_discount }}</th>
            <input type="hidden" name="payble_amount" value="{{ $sub_total-$total_discount }}">
        </tr>
    </tbody>
</table>
