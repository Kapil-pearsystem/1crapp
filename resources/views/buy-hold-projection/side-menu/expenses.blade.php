<tbody>
    <tr>
        <td class="text-left bg_bluess">3 EXPENSES</td>
    </tr>
    @php
        $OperatingExpenses = OperatingExpenses($MainProperty);
        $customeData = $OperatingExpenses['customeData'];
    @endphp
    @for ($i = 0; $i < count($customeData); $i++)
        <tr>
            <td class="text-left qr_tp_areaaa">
                <div class="con-tooltip top">
                    <p class="icoo"><i class="fa fa-question"></i></p>
                    <div class="tooltip">
                        <h5>{{$customeData[$i]['paid_name']}}</h5>
                        <p>The amount you're paying to purchase a property.</p>
                    </div>
                </div>
                <span class="hd_vluees">{{ $customeData[$i]['paid_name'] }}</span>
            </td>
        </tr>    
    @endfor   

    <tr>
        <td class="text-left qr_tp_areaaa">
            <div class="con-tooltip top">
                <p class="icoo"><i class="fa fa-question"></i></p>
                <div class="tooltip">
                    <h5>Purchase Price</h5>
                    <p>The amount you're paying to purchase a property.</p>
                </div>
            </div>
            <span class="hd_vluees redss">Operating Cost ( Yearly ) <span class="us_pl_area">=</span></span>
        </td>
    </tr>

    <tr>
        <td class="text-left qr_tp_areaaa">
            <div class="con-tooltip top">
                <p class="icoo"><i class="fa fa-question"></i></p>
                <div class="tooltip">
                    <h5>Purchase Price</h5>
                    <p>The amount you're paying to purchase a property.</p>
                </div>
            </div>
            <span class="hd_vluees blue">Operating Cost Increase ( Annual )?</span>
        </td>
    </tr>
</tbody>