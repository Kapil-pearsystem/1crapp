<?php
if(!function_exists('ItemOperativeExpense')){
    function ItemOperativeExpense($mainProperty){
        $operatingExpenses = App\Models\ItemOperativeExpense::where('prop_id',$mainProperty->prop_id)->get();
        $totalOperatingExpenses = 0;
        foreach ($operatingExpenses as $value) {
            if($value->paid_type == 'amount'){
                if($value->paid_of == 'month'){
                    if($value->paid_infuture == 0){
                        $totalOperatingExpenses += round($value->paid_amount);
                    }
                }else{
                    if($value->paid_infuture == 0){
                        $totalOperatingExpenses += round($value->paid_amount / 12);
                    }
                    
                }
            }else{
                if($value->paid_infuture == 0){
                    if($value->paid_aftervacancy == 1){
                        $vacancy = round($mainProperty->grossrent * $mainProperty->vacancy_rate / 100);
                        $afterVacancy = round($vacancy * $value->paid_amount / 100);
                        $operatingExpensesValue = round($mainProperty->grossrent * $value->paid_amount / 100);
                        
                        $totalOperatingExpenses += $operatingExpensesValue - $afterVacancy;
                    }else{
                        $totalOperatingExpenses += round($value->paid_amount * $mainProperty->grossrent / 100);
                    }
                }
            }
        }
        $output = array('monthly' => $totalOperatingExpenses);
        return $output;
    }
}

if(!function_exists('TotalLoanAmount')){
    function TotalLoanAmount($mainProperty){
        $TotalLoanAmount = 0;
        $MortgageInsurance = 0;
        $loanWithMortgageIns = array();
        $loanAmountArray = array();
        $loanPercent = 0;
        $PropertyLoans = App\Models\PropertyLoan::where('property_id',$mainProperty->prop_id)->get();
        $count = 0;
        $monthlyPMI = 0;

        foreach ($PropertyLoans as $value) {
            $TotalLoanAmount += round($mainProperty->prop_purchasePrice * $value->price_financing / 100);
            $loanAmountArray[] = round($mainProperty->prop_purchasePrice * $value->price_financing / 100);
            $totalAmount = $mainProperty->prop_purchasePrice * $value->price_financing / 100;
            $MortgageInsurance += $totalAmount * $value->upfront / 100;

            $loanWithMortgageIns[] = ($totalAmount + round($totalAmount * $value->upfront / 100));

            $totalPMI = $totalAmount * $value->recurring / 100;
            $monthlyPMI = round($totalPMI / 12);
            $loanPercent += $value->price_financing;
            /*
                Home Inspection = 350 
                Appraisal = 550
                Loan Points = 84000 * 2 / 100 = 1680
                Closing Costs = 105,000 * 2 / 100 = 2100
                Developer testing = 105,000 * 20 / 100 = 21,000
            */
        }
        
        $output = array(
            'totalAmount'           => $TotalLoanAmount, 
            'loanPercent'           => $loanPercent,
            'loanAmountArray'       => $loanAmountArray, 
            'MortgageInsurance'     => $MortgageInsurance,
            'PMI'                   => $monthlyPMI,
            'loanWithMortgageIns'   => $loanWithMortgageIns
        );
        // dd($output);
        return $output;
    }
}

if(!function_exists('RefinanceTotalLoanAmount')){
    function RefinanceTotalLoanAmount($mainProperty){
        $TotalLoanAmount = 0;
        $MortgageInsurance = 0;
        $loanWithMortgageIns = array();
        $loanAmountArray = array();
        $loanPercent = 0;
        $PropertyLoans = App\Models\PropertyRefinance::where('property_id',$mainProperty->prop_id)->get();
        $count = 0;
        $monthlyPMI = 0;

        foreach ($PropertyLoans as $value) {
            $TotalLoanAmount += round($mainProperty->prop_purchasePrice * $value->price_financing / 100);
            $loanAmountArray[] = round($mainProperty->prop_purchasePrice * $value->price_financing / 100);
            $totalAmount = $mainProperty->prop_purchasePrice * $value->price_financing / 100;
            $MortgageInsurance += $totalAmount * $value->upfront / 100;

            $loanWithMortgageIns[] = ($totalAmount + round($totalAmount * $value->upfront / 100));

            $totalPMI = $totalAmount * $value->recurring / 100;
            $monthlyPMI = round($totalPMI / 12);
            $loanPercent += $value->price_financing;
            /*
                Home Inspection = 350 
                Appraisal = 550
                Loan Points = 84000 * 2 / 100 = 1680
                Closing Costs = 105,000 * 2 / 100 = 2100
                Developer testing = 105,000 * 20 / 100 = 21,000
            */
        }
        
        $output = array(
            'totalAmount'           => $TotalLoanAmount, 
            'loanPercent'           => $loanPercent,
            'loanAmountArray'       => $loanAmountArray, 
            'MortgageInsurance'     => $MortgageInsurance,
            'PMI'                   => $monthlyPMI,
            'loanWithMortgageIns'   => $loanWithMortgageIns
        );
        // dd($output);
        return $output;
    }
}

if(!function_exists('PurchaseCosts')){
    function PurchaseCosts($mainProperty){
        $TotalPurchaseCostsAmount = 0;
        $ItemsPurchaseCosts = App\Models\ItemPurchaseCost::where('prop_id',$mainProperty->prop_id)->get();
        
        foreach ($ItemsPurchaseCosts as $value) {
            if($value->paid_type == 'amount'){
                if($value->paid_inLoan == 1){
                    $TotalPurchaseCostsAmount += $value->paid_amount;
                }
            }elseif($value->paid_type == 'percent'){
                if($value->paid_inLoan == 1){
                    if($value->paid_percentOf == 'loan'){
                        if(is_null($value->loan_id)){
                            $TotalLoanAmount = TotalLoanAmount($mainProperty);
                            $TotalLoanAmount = $TotalLoanAmount['totalAmount'];
                            $TotalPurchaseCostsAmount += round($TotalLoanAmount * $value->paid_amount / 100);
                        }else{
                            $PropertyLoans = App\Models\PropertyLoan::where('property_id',$mainProperty->prop_id)->first();
                            $totalAmount = $mainProperty->prop_purchasePrice * $PropertyLoans->price_financing / 100;
                            $TotalPurchaseCostsAmount += round($totalAmount * $value->paid_amount / 100);
                        }
                        
                    }elseif($value->paid_percentOf == 'price'){
                        $TotalPurchaseCostsAmount += round($mainProperty->prop_purchasePrice * $value->paid_amount / 100);
                    }
                }
            }
        }
        return $TotalPurchaseCostsAmount;
    }
}