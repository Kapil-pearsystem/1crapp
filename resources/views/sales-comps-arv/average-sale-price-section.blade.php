<div class="col-lg-6">
    <form action="#" method="post">
        <div class="pur_rdo_listtss als_show_ar rec_sale_areaea">
            
            @php
                $salePrices = array();
                $SqFtPrices = array();
                $count = 0;
                $totalSqFtPrice = 0;
                $array = array();
                $array1 = array();
                foreach ($propertyList as $key => $value) {
                    $count++;
                    // $totalSqFtPrice += $value['SqFtPrice'];
                    $array[] = $value['SqFtPrice'];
                    $floatValue = rtrim($value['SqFtPrice'],",");
                    $array1[] = $floatValue;
                    if(!is_null($value['prop_salePrice'])){
                        $salePrices[] = $value['prop_salePrice'];
                        $mainProp = App\Models\MainProperty::where('prop_id',$value['prop_id'])->first();
                        $totalSqFt = TotalSquareFoot($mainProp);
                        $salePrice = $value['prop_salePrice'];
                        try {
                            $SqFtPrice = number_format(($salePrice / $totalSqFt),2);
                        } catch (\Throwable $th) {
                            $SqFtPrice = 0;
                        }
                        if($SqFtPrice != 0){
                            $SqFtPrices[] = $SqFtPrice;
                        }
                    }
                }
                
                $minSalePrice = min($salePrices);
                $maxSalePrice = max($salePrices);
                $minSqFtPrice = min($SqFtPrices);
                $maxSqFtPrice = max($SqFtPrices);
                
                $totalSalePrice = array_sum($salePrices);
                $averageSalePrice = round($totalSalePrice / $count);
                $averageSqFtSalePrice = round($totalSqFtPrice / $count);

                $mainPropDesc = App\Models\PropertyDescription::where('prop_id',$value['prop_id'])->first();
                $ARVEstimated = 0;
                if(!is_null($mainPropDesc)){
                    $totalSqFt = TotalSquareFoot($MainProperty);
                    $ARVEstimated = $averageSqFtSalePrice * $totalSqFt;
                }
            @endphp

            <div class="slt_als_ck_bx" style="margin-left: 10rem !important;">
                <div class="lft_area_ck">
                    <h4>Average Sale Price</h4>
                    <h5>₹ {{$averageSalePrice}} <span>(₹ {{$averageSqFtSalePrice}} / sq.ft.)</span></h5>
                    <p>₹ {{$minSalePrice}}- <span>₹ {{$maxSalePrice}}</span></p>
                    <p>₹ {{$minSqFtPrice}}/sq.ft. - <span>₹ {{$maxSqFtPrice}}/sq.ft.</span></p>
                </div>
            </div>

            <div class="pur_rdo_listtss als_show_ar rec_sale_areaea partss">
                <div class="lft_area_ck bothss fullss">
                    <span class="heedingd">Estimated ARV Based on Average Price/Sq.Ft.</span>
                    <div class="con-tooltip top">
                        <p class="icoo"><i class="fa fa-question"></i></p>
                        <div class="tooltip">
                            <h5>Estimated ARV Based on Average Price/Sq.Ft.</h5>
                            <p>The amount you're paying to purchase a property.</p>
                        </div>
                    </div>
                </div>
                <h5>₹ {{ $ARVEstimated }}</h5>
                {{-- 
                    <p>Current ARV</p>
                    <div class="inp_vlueee">
                        <input type="text" value="" placeholder="$ 125,000">
                    </div> 
                --}}
            </div>
        </div>
    </form>
</div>