<?php
if(!function_exists('SellingCosts')){
    function SellingCosts($MainProperty){
        $sellingCosts = App\Models\itemSellingCost::where('prop_id',$MainProperty->prop_id)->get();
        $sellingCostAmount = 0;
        $sellingCostData = array();
        foreach($sellingCosts as $item){
            if($item->paid_type == 'amount'){
                if($item->paid_inLoan == 0){
                    $sellingCostAmount += $item->paid_amount;
                }
                $sellingCostData[] = array(
                    'paid_name' => $item->paid_name,
                    'amount' => $item->paid_amount,
                    'paid_type' => $item->paid_type,
                    'paid_inLoan'   => $item->paid_inLoan
                );
            }else{
                if($item->paid_percentOf == 'price'){
                    if($item->paid_inLoan == 0){
                        $sellingCostAmount += $item->paid_amount * $MainProperty->prop_salePrice / 100;
                    }
                    $sellingCostData[] = array(
                        'paid_name' => $item->paid_name,
                        'amount' => $item->paid_amount * $MainProperty->prop_salePrice / 100,
                        'paid_type' => $item->paid_type,
                        'paid_inLoan'   => $item->paid_inLoan
                    );
                }else{
                    if($item->paid_inLoan == 0){
                        $sellingCostAmount += $item->paid_amount  / 100;
                    }
                    $sellingCostData[] = array(
                        'paid_name' => $item->paid_name,
                        'amount' => $item->paid_amount  / 100,
                        'paid_type' => $item->paid_type,
                        'paid_inLoan'   => $item->paid_inLoan
                    );
                }
            }
        }
        try {
            $percentOfPrice = round(($sellingCostAmount / $MainProperty->prop_salePrice) * 100, 2);
        } catch (\Throwable $th) {
            $percentOfPrice = 0;
        }

        $output = array(
            'percentOfPrice'         => $percentOfPrice,
            'TotalAmount'            => $sellingCostAmount,
            'Data'                   => $sellingCosts,
            'customeData'            => $sellingCostData,
            'SellingCostPercent'     => $MainProperty->prop_sellingCostPercent
        );
        return $output;
    }
}

if(!function_exists('RefinanceCost')){
    function RefinanceCost($MainProperty, $totalLoanAmount=null){
        $refinanceCost = App\Models\ItemRefinanceCost::where('prop_id',$MainProperty->prop_id)->get();
        $refinanceCostAmount = 0;
        $refinanceCostData = array();
        
        // calculate the Actual Purchase price of the property
        $salePrice = $MainProperty->prop_salePrice;
        
        foreach($refinanceCost as $item){
            if($item->paid_type == 'amount'){
                if($item->paid_inLoan == 0){
                    $refinanceCostAmount += $item->paid_amount;
                }
                $refinanceCostData[] = array(
                    'paid_name' => $item->paid_name,
                    'amount' => $item->paid_amount,
                    'paid_type' => $item->paid_type,
                    'paid_inLoan'   => $item->paid_inLoan
                );
            }else{
                if($item->paid_percentOf == 'price'){
                    if($item->paid_inLoan == 0){
                        $refinanceCostAmount += $item->paid_amount * $salePrice / 100;
                    }
                    $refinanceCostData[] = array(
                        'paid_name' => $item->paid_name,
                        'amount' => $item->paid_amount * $salePrice / 100,
                        'paid_type' => $item->paid_type,
                        'paid_inLoan'   => $item->paid_inLoan
                    );
                }else{
                    if($item->paid_inLoan == 0){
                        $refinanceCostAmount += $item->paid_amount * $totalLoanAmount / 100;
                    }
                    $refinanceCostData[] = array(
                        'paid_name' => $item->paid_name,
                        'amount' => $item->paid_amount / 100,
                        'paid_type' => $item->paid_type,
                        'paid_inLoan'   => $item->paid_inLoan
                    );
                }
            }
        }
        $output = array(
            'TotalAmount'            => $refinanceCostAmount,
            'Data'                   => $refinanceCost,
            'customeData'            => $refinanceCostData,
            'refinanceCostAmount'    => $MainProperty->prop_refinance_cost
        );
        return $output;
    }
}

if(!function_exists('HoldingCost')){
    function HoldingCost($MainProperty){
        $holdingCost = App\Models\itemHoldingCost::where('prop_id',$MainProperty->prop_id)->get();
        $holdingCostAmount = 0;
        $holdingCostData = array();
        
        // calculate the Actual Purchase price of the property
        $actualPurchasePrice = $MainProperty->prop_purchasePrice * (1 - $MainProperty->prop_sale_discount / 100);
        
        foreach($holdingCost as $item){
            if($item->paid_type == 'amount'){
                if($item->paid_inLoan == 0){
                    $holdingCostAmount += $item->paid_amount;
                }
                $holdingCostData[] = array(
                    'paid_name' => $item->paid_name,
                    'amount' => $item->paid_amount,
                    'paid_type' => $item->paid_type,
                    'paid_inLoan'   => $item->paid_inLoan
                );
            }else{
                if($item->paid_percentOf == 'price'){
                    if($item->paid_inLoan == 0){
                        $holdingCostAmount += $item->paid_amount * $actualPurchasePrice / 100;
                    }
                    $holdingCostData[] = array(
                        'paid_name' => $item->paid_name,
                        'amount' => $item->paid_amount * $actualPurchasePrice / 100,
                        'paid_type' => $item->paid_type,
                        'paid_inLoan'   => $item->paid_inLoan
                    );
                }else{
                    if($item->paid_inLoan == 0){
                        $holdingCostAmount += $item->paid_amount  / 100;
                    }
                    $holdingCostData[] = array(
                        'paid_name' => $item->paid_name,
                        'amount' => $item->paid_amount  / 100,
                        'paid_type' => $item->paid_type,
                        'paid_inLoan'   => $item->paid_inLoan
                    );
                }
            }
        }
        try {
            $percentOfPrice = round(($holdingCostAmount / $actualPurchasePrice) * 100, 2);
        } catch (\Throwable $th) {
            $percentOfPrice = 0;
        }

        $output = array(
            'percentOfPrice'         => $percentOfPrice,
            'TotalAmount'            => $holdingCostAmount,
            'Data'                   => $holdingCost,
            'customeData'            => $holdingCostData,
            'HoldingCostPercent' => $MainProperty->prop_HoldingCostPercent
        );
        return $output;
    }
}

if(!function_exists('ConveyanceDeedCost')){
    function ConveyanceDeedCost($MainProperty){
        $conveyanceDeed = App\Models\itemConvDeed::where('prop_id',$MainProperty->prop_id)->get();
        $conveyanceDeedAmount = 0;
        $conveyanceDeedData = array();
        
        // calculate the Actual Purchase price of the property
        $actualPurchasePrice = $MainProperty->prop_purchasePrice * (1 - $MainProperty->prop_sale_discount / 100);
        
        foreach($conveyanceDeed as $item){
            if($item->paid_type == 'amount'){
                if($item->paid_inLoan == 0){
                    $conveyanceDeedAmount += $item->paid_amount;
                }
                $conveyanceDeedData[] = array(
                    'paid_name' => $item->paid_name,
                    'amount' => $item->paid_amount,
                    'paid_type' => $item->paid_type,
                    'paid_inLoan'   => $item->paid_inLoan
                );
            }else{
                if($item->paid_percentOf == 'price'){
                    if($item->paid_inLoan == 0){
                        $conveyanceDeedAmount += $item->paid_amount * $actualPurchasePrice / 100;
                    }
                    $conveyanceDeedData[] = array(
                        'paid_name' => $item->paid_name,
                        'amount' => $item->paid_amount * $actualPurchasePrice / 100,
                        'paid_type' => $item->paid_type,
                        'paid_inLoan'   => $item->paid_inLoan
                    );
                }else{
                    if($item->paid_inLoan == 0){
                        $conveyanceDeedAmount += $item->paid_amount / 100;
                    }
                    $conveyanceDeedData[] = array(
                        'paid_name' => $item->paid_name,
                        'amount' => $item->paid_amount  / 100,
                        'paid_type' => $item->paid_type,
                        'paid_inLoan'   => $item->paid_inLoan
                    );
                }
            }
        }
        try {
            $percentOfPrice = round(($conveyanceDeedAmount / $actualPurchasePrice) * 100, 2);
        } catch (\Throwable $th) {
            $percentOfPrice = 0;
        }

        $output = array(
            'percentOfPrice'         => $percentOfPrice,
            'TotalAmount'            => $conveyanceDeedAmount,
            'Data'                   => $conveyanceDeed,
            'customeData'            => $conveyanceDeedData,
            'ConveyanceDeedCostPercent' => $MainProperty->prop_ConvDeedPercent
        );
        return $output;
    }
}

if(!function_exists('ImprovementCosts')){
    function ImprovementCosts($MainProperty){
        $improvementCost = App\Models\itemImprovementCost::where('prop_id',$MainProperty->prop_id)->get();
        $improvementCostAmount = 0;
        $improvementCostData = array();
        
        // calculate the Actual Purchase price of the property
        $actualPurchasePrice = $MainProperty->prop_purchasePrice * (1 - $MainProperty->prop_sale_discount / 100);
        
        foreach($improvementCost as $item){
            if($item->paid_type == 'amount'){
                if($item->paid_inLoan == 0){
                    $improvementCostAmount += $item->paid_amount;
                    $paidNameLabel = $item->paid_name;
                }else{
                    $paidNameLabel = $item->paid_name.' (Financed)';
                }
                $improvementCostData[] = array(
                    'paid_name_label' => $paidNameLabel,
                    'paid_name' => $item->paid_name,
                    'amount' => $item->paid_amount,
                    'paid_type' => $item->paid_type,
                    'paid_inLoan'   => $item->paid_inLoan
                );
            }else{
                if($item->paid_percentOf == 'price'){
                    if($item->paid_inLoan == 0){
                        $improvementCostAmount += $item->paid_amount * $actualPurchasePrice / 100;
                        $paidNameLabel = $item->paid_name;
                    }else{
                        $paidNameLabel = $item->paid_name.' (Financed)';
                    }
                    $improvementCostData[] = array(
                        'paid_name_label' => $paidNameLabel,
                        'paid_name' => $item->paid_name,
                        'amount' => $item->paid_amount * $actualPurchasePrice / 100,
                        'paid_type' => $item->paid_type,
                        'paid_inLoan'   => $item->paid_inLoan
                    );
                }else{
                    if($item->paid_inLoan == 0){
                        $improvementCostAmount += $item->paid_amount / 100;
                        $paidNameLabel = $item->paid_name;
                    }else{
                        $paidNameLabel = $item->paid_name.' (Financed)';
                    }
                    $improvementCostData[] = array(
                        'paid_name_label' => $paidNameLabel,
                        'paid_name' => $item->paid_name,
                        'amount' => $item->paid_amount / 100,
                        'paid_type' => $item->paid_type,
                        'paid_inLoan'   => $item->paid_inLoan
                    );
                }
            }
        }
        try {
            $percentOfPrice = round(($improvementCostAmount / $actualPurchasePrice) * 100, 2);
        } catch (\Throwable $th) {
            $percentOfPrice = 0;
        }

        $output = array(
            'percentOfPrice'         => $percentOfPrice,
            'TotalAmount'            => $improvementCostAmount,
            'Data'                   => $improvementCost,
            'customeData'            => $improvementCostData,
            'ImprovementCostPercent' => $MainProperty->prop_improvementCostPercent
        );
        return $output;

    }
}

if(!function_exists('ExtraChargesPossession')){
    function ExtraChargesPossession($MainProperty){
        $totalExtraChargeAmount = 0;
        $ExtraChargeData = array();
        $ItemExtraCharge = App\Models\ItemExtraCharge::where('prop_id',$MainProperty->prop_id)->get();
        
        // calculate the Actual Purchase price of the property
        $actualPurchasePrice = $MainProperty->prop_purchasePrice * (1 - $MainProperty->prop_sale_discount / 100);
        
        foreach($ItemExtraCharge as $item){
            if($item->paid_type == 'amount'){
                if($item->paid_inLoan == 0){
                    $totalExtraChargeAmount += $item->paid_amount;
                    $paidNameLabel = $item->paid_name;
                }else{
                    $paidNameLabel = $item->paid_name.' (Financed)';
                }
                $ExtraChargeData[] = array(
                    'paid_name_label' => $paidNameLabel,
                    'paid_name' => $item->paid_name,
                    'amount' => $item->paid_amount,
                    'paid_type' => $item->paid_type,
                    'paid_inLoan'   => $item->paid_inLoan
                );
            }else{
                if($item->paid_percentOf == 'price'){
                    if($item->paid_inLoan == 0){
                        $totalExtraChargeAmount += $item->paid_amount * $actualPurchasePrice / 100;
                        $paidNameLabel = $item->paid_name;
                    }else{
                        $paidNameLabel = $item->paid_name.' (Financed)';
                    }
                    $ExtraChargeData[] = array(
                        'paid_name_label' => $paidNameLabel,
                        'paid_name' => $item->paid_name,
                        'amount' => $item->paid_amount * $actualPurchasePrice / 100,
                        'paid_type' => $item->paid_type,
                        'paid_inLoan'   => $item->paid_inLoan
                    );
                }else{
                    if($item->paid_inLoan == 0){
                        $totalExtraChargeAmount += $item->paid_amount * $actualPurchasePrice / 100;
                        // $totalExtraChargeAmount += $item->paid_amount  /100;
                        $paidNameLabel = $item->paid_name;
                    }else{
                        $paidNameLabel = $item->paid_name.' (Financed)';
                    }
                    $ExtraChargeData = array(
                        'paid_name_label' => $paidNameLabel,
                        'paid_name' => $item->paid_name,
                        'amount' => $item->paid_amount * $actualPurchasePrice / 100,
                        // 'amount' => $item->paid_amount  / 100,
                        'paid_type' => $item->paid_type,
                        'paid_inLoan'   => $item->paid_inLoan
                    );
                }
            }
        }
        try {
            $percentOfPrice = round(($totalExtraChargeAmount / $actualPurchasePrice) * 100, 2);
        } catch (\Throwable $th) {
            $percentOfPrice = 0;
        }

        $output = array(
            'percentOfPrice'=> $percentOfPrice,
            'TotalAmount'   => $totalExtraChargeAmount,
            'Data'          => $ItemExtraCharge,
            'customeData'   => $ExtraChargeData
        );
        return $output;
    }
}

if(!function_exists('PurchaseCostsHelper')){
    function PurchaseCostsHelper($MainProperty, $totalLoanAmount=null){
        $totalPurchasedAmount = 0;
        $PurchaseCostData = array();
        $itemPurchaseCosts = App\Models\ItemPurchaseCost::where('prop_id',$MainProperty->prop_id)->get();
        
        // calculate the Actual Purchase price of the property
        $actualPurchasePrice = $MainProperty->prop_purchasePrice * (1 - $MainProperty->prop_sale_discount / 100);
        
        foreach($itemPurchaseCosts as $item){
            if($item->paid_type == 'amount'){
                if($item->paid_inLoan == 0){
                    $totalPurchasedAmount += $item->paid_amount;
                }
                $PurchaseCostData[] = array(
                    'paid_name' => $item->paid_name,
                    'amount' => $item->paid_amount,
                    'paid_type' => $item->paid_type,
                    'paid_inLoan'   => $item->paid_inLoan
                );
            }else{
                if($item->paid_percentOf == 'price'){
                    if($item->paid_inLoan == 0){
                        $totalPurchasedAmount += $item->paid_amount * $actualPurchasePrice / 100;
                    }
                    $PurchaseCostData[] = array(
                        'paid_name' => $item->paid_name,
                        'amount' => $item->paid_amount * $actualPurchasePrice / 100,
                        'paid_type' => $item->paid_type,
                        'paid_inLoan'   => $item->paid_inLoan
                    );
                }else{
                    if($item->paid_inLoan == 0){
                        $totalPurchasedAmount += $item->paid_amount * $totalLoanAmount / 100;
                    }
                    $PurchaseCostData = array(
                        'paid_name' => $item->paid_name,
                        'amount' => $item->paid_amount / 100,
                        'paid_type' => $item->paid_type,
                        'paid_inLoan'   => $item->paid_inLoan
                    );
                }
            }
        }
        $output = array(
            'TotalAmount' => $totalPurchasedAmount,
            'Data' => $itemPurchaseCosts,
            'customeData' => $PurchaseCostData
        );
        return $output;
    }
}

if(!function_exists('PaidCostsHelper')){
    function PaidCostsHelper($MainProperty, $totalLoanAmount=null){
        $totalPurchasedAmount = 0;
        $PaidCostData = array();
        $itemPurchaseCosts = App\Models\ItemPaidAmount::where('prop_id',$MainProperty->prop_id)->get();
        
        // calculate the Actual Purchase price of the property
        $actualPurchasePrice = $MainProperty->prop_purchasePrice * (1 - $MainProperty->prop_sale_discount / 100);
        
        foreach($itemPurchaseCosts as $item){
            if($item->paid_type == 'amount'){
                if($item->paid_inLoan == 0){
                    $totalPurchasedAmount += $item->paid_amount;
                }
                $PaidCostData[] = array(
                    'paid_name'     => $item->paid_name,
                    'amount'        => $item->paid_amount,
                    'paid_type'     => $item->paid_type,
                    'paid_inLoan'   => $item->paid_inLoan
                );
            }else{
                if($item->paid_percentOf == 'price'){
                    if($item->paid_inLoan == 0){
                    $totalPurchasedAmount += $item->paid_amount * $actualPurchasePrice / 100;
                    }
                    $PaidCostData[] = array(
                        'id'            => $item->id,
                        'paid_name' => $item->paid_name,
                        'amount' => $item->paid_amount * $actualPurchasePrice / 100,
                        'paid_type' => $item->paid_type,
                        'paid_inLoan'=> $item->paid_inLoan
                    );
                }else{
                    if($item->paid_inLoan == 0){
                        $totalPurchasedAmount += $item->paid_amount * $totalLoanAmount /100;
                    }
                    $PaidCostData = array(
                        'id'            => $item->id,
                        'paid_name' => $item->paid_name,
                        'amount'    => $item->paid_amount / 100,
                        'paid_type' => $item->paid_type,
                        'paid_inLoan'=>$item->paid_inLoan
                    );
                }
            }
        }
        $output = array(
            'TotalAmount' => $totalPurchasedAmount,
            'Data' => $itemPurchaseCosts,
            'customeData' => $PaidCostData
        );
        return $output;
    }
}

if(!function_exists('PropertyLoans')){
    function PropertyLoans($MainProperty){
        $propertyLoans = App\Models\PropertyLoan::where('property_id',$MainProperty->prop_id)->get();
        $loanData = array();
        $loanTotalAmount = 0;
        $loanRepaymentTotalAmount = 0;
        foreach($propertyLoans as $item){
            if(!is_null($item->total_number_payment)){
                $principal = $MainProperty->prop_purchasePrice * $item->price_financing / 100;
                $annualInterestRate = $item->interest_rate;
                $numberOfPaymentsMade = $item->number_payment_done;
                $totalNumberOfPayments = $item->total_number_payment;
                $loanTermYears = $item->loan_term;

                $loanBalance = loanBalance($principal, $annualInterestRate, $numberOfPaymentsMade, $totalNumberOfPayments);
                $loanRepayment = loanRepayment($principal, $annualInterestRate, $loanTermYears);
                $loanTotalAmount += $loanBalance;
                $loanRepaymentTotalAmount += $loanRepayment;
                $loanData[] = array(
                    'loan_label'             => $item->loan_label,
                    'financingof'            => $item->financingof,
                    'total_number_payment'   => $item->total_number_payment,
                    'number_payment_done'    => $item->number_payment_done,
                    'loan_amount'            => $loanBalance,
                    'monthly_loan_repayment' => $loanRepayment,
                );
            }
        }
        $output = array(
            'loanData'        => $loanData,
            'loanTotalAmount' => $loanTotalAmount,
            'total_monthly_loan_repayment' => $loanRepaymentTotalAmount
        );
        return $output;
    }
}

// during update composer hide this
if (!function_exists('calculateLoanAmount')) {
    function calculateLoanAmount($MainProperty)
    {
        $totalLoanAmount = 0;

        // calculate the Actual Purchase price of the property
        $actualPurchasePrice = $MainProperty->prop_purchasePrice * (1 - $MainProperty->prop_sale_discount / 100);
        
        $salePrice = floatval($MainProperty->prop_salePrice ?? 0);

        // Fetch all loans related to the property
        $loans = PropertyLoan::where('property_id', $MainProperty->prop_id)->get();

        foreach ($loans as $index => $loan) {
            $financingPercent = floatval($loan->price_financing ?? 0);
            $loanType = $loan->financingof;

            $baseAmount = 0;

            switch ($loanType) {
                case 'Purchase Price':
                    $baseAmount = $actualPurchasePrice;
                    $loanAmount = ($baseAmount * $financingPercent) / 100;
                    break;

                case 'Improvement Cost':
                case 'Price and Improvement Cost':
                    \Log::warning("Loan {$index}: Improvement Cost calculation not implemented.");
                    continue 2;

                case 'Basic Sale Price':
                    $baseAmount = $salePrice;
                    $loanAmount = ($baseAmount * $financingPercent) / 100;
                    break;

                case 'Custom Amount':
                    $loanAmount = $financingPercent;
                    break;

                default:
                    \Log::warning("Loan {$index}: Unknown loan type '{$loanType}'.");
                    continue 2;
            }

            // Calculate loan amount
            $totalLoanAmount += $loanAmount;
        }

        return round($totalLoanAmount, 2);
    }
}

if (!function_exists('OtherIncomes')) {
    function OtherIncomes($MainProperty)
    {
        $otherIncomes = \App\Models\ItemOtherIncome::where('prop_id', $MainProperty->prop_id)->get();

        $yearlyTotal = 0;
        
        // Assume 0 if no vacancy value is set
        $vacancyPercent = isset($MainProperty->vacancy_rate) ? floatval($MainProperty->vacancy_rate) : 0;
        
        // calculate the Actual Purchase price of the property
        $actualPurchasePrice = $MainProperty->prop_purchasePrice * (1 - $MainProperty->prop_sale_discount / 100);
        

        foreach ($otherIncomes as $item) {
            // Skip if marked as a future expense
            if ($item->itemizedFutureExpense == 1) {
                continue;
            }
            
            $yearlyIncome = 0;

            if ($item->paid_type == 'amount') {
                $amount = floatval($item->paid_amount);
                $frequency = strtolower($item->paid_amountOf);

                switch ($frequency) {
                    case 'week':
                        $yearlyIncome = $amount * 52;
                        break;
                    case 'month':
                        $yearlyIncome = $amount * 12;
                        break;
                    case 'year':
                        $yearlyIncome = $amount;
                        break;
                    default:
                        // frequency not recognized, skip
                        continue 2;
                }

            } elseif ($item->paid_type == 'percent') {
                $percent = floatval($item->paid_amount);

                if ($item->paid_percentOf == 'price') {
                    $baseAmount = floatval($actualPurchasePrice);
                    $yearlyIncome = ($percent / 100) * $baseAmount;

                } elseif ($item->paid_percentOf == 'rent') {
                    $rentAmount = floatval($MainProperty->grossrent);
                    $rentFrequency = strtolower($MainProperty->grossrent_type);
                    
                    // Apply vacancy adjustment if selelcted
                    if ($item->itemizedAfterVacancy == 1) {
                        $rentAmount = $rentAmount * (1 - ($vacancyPercent / 100));
                    }

                    // Normalize rent to yearly amount first
                    switch ($rentFrequency) {
                        case 'day':
                            $annualRent = $rentAmount * 365;
                            break;
                        case 'week':
                            $annualRent = $rentAmount * 52;
                            break;
                        case 'month':
                            $annualRent = $rentAmount * 12;
                            break;
                        case 'quarter':
                            $annualRent = $rentAmount * 4;
                            break;
                        case 'year':
                            $annualRent = $rentAmount;
                            break;
                        default:
                            $annualRent = 0;
                    }

                    $yearlyIncome = ($percent / 100) * $annualRent;
                } else {
                    continue;
                }
            }

            // Add to total
            $yearlyTotal += $yearlyIncome;
        }

        return [
            'monthly' => round($yearlyTotal / 12, 2),
            'yearly' => round($yearlyTotal, 2)
        ];
    }
}

if (!function_exists('OperatingExpense')) {
    function OperatingExpense($MainProperty)
    {
        $operatingExpense = \App\Models\ItemOperativeExpense::where('prop_id', $MainProperty->prop_id)->get();

        $yearlyTotal = 0;
        
        // Assume 0 if no vacancy value is set
        $vacancyPercent = isset($MainProperty->vacancy_rate) ? floatval($MainProperty->vacancy_rate) : 0;
        
        // calculate the Actual Purchase price of the property
        $actualPurchasePrice = $MainProperty->prop_purchasePrice * (1 - $MainProperty->prop_sale_discount / 100);
        

        foreach ($operatingExpense as $item) {
            // Skip if marked as a future expense
            if ($item->paid_infuture == 1) {
                continue;
            }
            
            $yearlyIncome = 0;

            if ($item->paid_type == 'amount') {
                $amount = floatval($item->paid_amount);
                $frequency = strtolower($item->paid_of);

                switch ($frequency) {
                    case 'week':
                        $yearlyIncome = $amount * 52;
                        break;
                    case 'month':
                        $yearlyIncome = $amount * 12;
                        break;
                    case 'year':
                        $yearlyIncome = $amount;
                        break;
                    default:
                        // frequency not recognized, skip
                        continue 2;
                }

            } elseif ($item->paid_type == 'percent') {
                $percent = floatval($item->paid_amount);

                if ($item->paid_percentOf == 'price') {
                    $baseAmount = floatval($actualPurchasePrice);
                    $yearlyIncome = ($percent / 100) * $baseAmount;

                } elseif ($item->paid_percentOf == 'rent') {
                    $rentAmount = floatval($MainProperty->grossrent);
                    $rentFrequency = strtolower($MainProperty->grossrent_type);
                    
                    // Apply vacancy adjustment if selelcted
                    if ($item->paid_aftervacancy == 1) {
                        $rentAmount = $rentAmount * (1 - ($vacancyPercent / 100));
                    }

                    // Normalize rent to yearly amount first
                    switch ($rentFrequency) {
                        case 'day':
                            $annualRent = $rentAmount * 365;
                            break;
                        case 'week':
                            $annualRent = $rentAmount * 52;
                            break;
                        case 'month':
                            $annualRent = $rentAmount * 12;
                            break;
                        case 'quarter':
                            $annualRent = $rentAmount * 4;
                            break;
                        case 'year':
                            $annualRent = $rentAmount;
                            break;
                        default:
                            $annualRent = 0;
                    }

                    $yearlyIncome = ($percent / 100) * $annualRent;
                } else {
                    continue;
                }
            }

            // Add to total
            $yearlyTotal += $yearlyIncome;
        }
        
        if(isset($annualRent) && $annualRent > 0){
            $percentcalculation = round($yearlyTotal / $annualRent * 100, 2);
        }
        else {
            $percentcalculation = 0;
        }
        return [
            'monthly' => round($yearlyTotal / 12, 2),
            'yearly' => round($yearlyTotal, 2),
            'percent' => $percentcalculation
        ];
    }
}

if(!function_exists('miscellaneousCharges')){
    function miscellaneousCharges($MainProperty){
        $miscellaneousCharges = App\Models\ItemServicesMisclaniousCost::where('prop_id',$MainProperty->prop_id)->get();
        $miscellaneousChargesAmount = 0;
        $miscellaneousChargesData = array();
        $totalLoanAmount = calculateLoanAmount($MainProperty);
        
        // calculate the Actual Purchase price of the property
        $actualPurchasePrice = $MainProperty->prop_purchasePrice * (1 - $MainProperty->prop_sale_discount / 100);
        
        foreach($miscellaneousCharges as $item){
            if($item->paid_type == 'amount'){
                if($item->paid_inLoan == 0){
                    $miscellaneousChargesAmount += $item->paid_amount;
                }
                $miscellaneousChargesData[] = array(
                    'paid_name' => $item->paid_name,
                    'amount' => $item->paid_amount,
                    'paid_type' => $item->paid_type,
                    'paid_inLoan'   => $item->paid_inLoan
                );
            }else{
                if($item->paid_percentOf == 'price'){
                    if($item->paid_inLoan == 0){
                        $miscellaneousChargesAmount += $item->paid_amount * $actualPurchasePrice / 100;
                    }
                    $miscellaneousChargesData[] = array(
                        'paid_name' => $item->paid_name,
                        'amount' => $item->paid_amount * $actualPurchasePrice / 100,
                        'paid_type' => $item->paid_type,
                        'paid_inLoan'   => $item->paid_inLoan
                    );
                }else{
                    if($item->paid_inLoan == 0){
                        $miscellaneousChargesAmount += $item->paid_amount * $totalLoanAmount / 100;
                    }
                    $miscellaneousChargesData[] = array(
                        'paid_name' => $item->paid_name,
                        'amount' => $item->paid_amount  / 100,
                        'paid_type' => $item->paid_type,
                        'paid_inLoan'   => $item->paid_inLoan
                    );
                }
            }
        }
        try {
            $percentOfPrice = round(($miscellaneousChargesAmount / $actualPurchasePrice) * 100, 2);
        } catch (\Throwable $th) {
            $percentOfPrice = 0;
        }

        $output = array(
            'percentOfPrice'         => $percentOfPrice,
            'TotalAmount'            => $miscellaneousChargesAmount,
            'Data'                   => $miscellaneousCharges,
            'customeData'            => $miscellaneousChargesData,
            'miscellaneousChargesPercent'     => $MainProperty->prop_miscellaneousChargesPercent
        );
        return $output;
    }
}

if(!function_exists('financeCost')){
    function financeCost($MainProperty, $totalLoanAmount=null){
        $financeCost = App\Models\ItemfinanceCost::where('prop_id',$MainProperty->prop_id)->get();
        $financeCostAmount = 0;
        $financeCostData = array();
        
        // calculate the Actual Purchase price of the property
        $actualPurchasePrice = $MainProperty->prop_purchasePrice * (1 - $MainProperty->prop_sale_discount / 100);
        
        foreach($financeCost as $item){
            if($item->paid_type == 'amount'){
                if($item->paid_inLoan == 0){
                    $financeCostAmount += $item->paid_amount;
                }
                $financeCostData[] = array(
                    'paid_name' => $item->paid_name,
                    'amount' => $item->paid_amount,
                    'paid_type' => $item->paid_type,
                    'paid_inLoan'   => $item->paid_inLoan
                );
            }else{
                if($item->paid_percentOf == 'price'){
                    if($item->paid_inLoan == 0){
                        $financeCostAmount += $item->paid_amount * $actualPurchasePrice / 100;
                    }
                    $financeCostData[] = array(
                        'paid_name' => $item->paid_name,
                        'amount' => $item->paid_amount * $actualPurchasePrice / 100,
                        'paid_type' => $item->paid_type,
                        'paid_inLoan'   => $item->paid_inLoan
                    );
                }else{
                    if($item->paid_inLoan == 0){
                        $financeCostAmount += $item->paid_amount * $totalLoanAmount / 100;
                    }
                    $financeCostData[] = array(
                        'paid_name' => $item->paid_name,
                        'amount' => $item->paid_amount / 100,
                        'paid_type' => $item->paid_type,
                        'paid_inLoan'   => $item->paid_inLoan
                    );
                }
            }
        }
        $output = array(
            'TotalAmount'            => $financeCostAmount,
            'Data'                   => $financeCost,
            'customeData'            => $financeCostData,
            'refinanceCostAmount'    => $MainProperty->prop_refinance_cost
        );
        return $output;
    }
}
