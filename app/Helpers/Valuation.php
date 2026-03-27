<?php
    if(!function_exists('TotalSquareFoot')){
        function TotalSquareFoot($MainProperty){
            try{
                $propertyDesc = App\Models\PropertyDescription::where('prop_id', $MainProperty->prop_id)->first();
                $squareFoot = $propertyDesc->desc_lot;
                $descLotType = $propertyDesc->desc_lot_type;
                if($descLotType == 'Square Yard'){
                    /*
                        To convert square yards to square feet, you can multiply the square unit by 9. For example, 1 square yard is equal to 9 square feet.
                    */
                    $totalSquareFeet = $squareFoot * 9;
                }elseif($descLotType == 'Square Feet'){
                    $totalSquareFeet = $squareFoot;
                }elseif($descLotType == 'Bigha'){
                    /*
                        To convert bigha to square feet, multiply the bigha figure by 27,000. For example, 5 bigha is 5 x 27,000, or 135,000 square feet.
                    */
                    $totalSquareFeet = $squareFoot * 27000;
                }elseif($descLotType == 'Acres'){
                    /*
                        1 Acre is equal to 43560 Square Feet. So multiply the number with 43560, in order to convert it into square feet.
                    */
                    $totalSquareFeet = $squareFoot * 43560;
                }elseif($descLotType == 'Hectre'){
                    /*
                        1 hectare is equal to 107,639.1042 square feet. To convert hectares to square feet, multiply the hectare figure by 107639.0.
                    */
                    $totalSquareFeet = $squareFoot * 107639;
                }elseif($descLotType == 'Meter Feet'){
                    /*
                        10.7639
                    */
                    $totalSquareFeet = $squareFoot * 10.7639;
                }
                
                if(!is_null($descLotType)){
                    // if(!isset($totalSquareFeet)){
                    //     dd($descLotType);
                    // }
                    return $totalSquareFeet;
                }else{
                    return 0;
                }
                
            }catch(\Throwable $th){
                return 0;
            }
        }
    }
    if(!function_exists('calculatePricePerSquareFoot')){
        function calculatePricePerSquareFoot($totalPrice, $totalSquareFeet) {
                try {
                    // Calculate the price per square foot
                    $pricePerSquareFoot = $totalPrice / $totalSquareFeet;
                    return $pricePerSquareFoot;
                } catch (\Throwable $th) {
                    return 0;
                }
        }
    }

    if(!function_exists('AfterRepairValue')){
        function AfterRepairValue($MainProperty){
            $totalSquareFeet = TotalSquareFoot($MainProperty);

            $purchasePrice = $MainProperty->prop_purchasePrice;
            $PricePerSquareFoot = calculatePricePerSquareFoot($purchasePrice, $totalSquareFeet);
            $PricePerSquareFoot = number_format($PricePerSquareFoot,2);
            return $PricePerSquareFoot;
        }
    }

    if(!function_exists('ARVPerSquareFoot')){
        function ARVPerSquareFoot($MainProperty){
            $totalSquareFeet = TotalSquareFoot($MainProperty);

            $ARV = $MainProperty->prop_salePrice;
            $ARVPerSquareFootPrice = calculatePricePerSquareFoot($ARV, $totalSquareFeet);
            // dd($ARVPerSquareFootPrice);
            // $ARVPerSquareFootPrice = number_format($ARVPerSquareFootPrice,2);
            $ARVPerSquareFootPrice = round($ARVPerSquareFootPrice);
            return $ARVPerSquareFootPrice;
        }
    }
    
    if(!function_exists('ImprovementPerSquareFoot')){
        function ImprovementPerSquareFoot($MainProperty){
            $totalSquareFeet = TotalSquareFoot($MainProperty);
            $improvementData = ImprovementCosts($MainProperty);
            $totalImprovementPrice = $improvementData['TotalAmount'];
            $perSquareFootImprovementPrice = calculatePricePerSquareFoot($totalImprovementPrice, $totalSquareFeet);
            $perSquareFootImprovementPrice = number_format($perSquareFootImprovementPrice,2);
            return $perSquareFootImprovementPrice;
        }
    }

    if(!function_exists('EstimatedARV')){
        function EstimatedARV($AverageSalePrice,$SqFtOfComps,$SqFtOfProperty){
            /*
                ARVEstimate  =  AverageSalePrice / SqFtOfComps  *  SqFtOfProperty
            */
            // $AverageSalePrice = 4843000;
            // $SqFtOfComps = 2435;
            // $SqFtOfProperty = 2000;

            // totalSqFt = 10094
        }
    }