<?php
    if(!function_exists('findNOI')){
        function findNOI($MainProperty){
            /* 
                1.NOI  =  Operating Income  -  Operating Expenses
                    1. Operating Income  =  Gross Rent  -  Vacancy Expense  +  Other Income
                        1. Gross Rent = The total rent collected from your tenants, before subtracting any operating expenses or accounting for vacancy.
                        2. Vacancy Expense = Gross Rent  *  Vacancy Rate
                            1. Vacancy Rate = Time Vacant / Total Time
                        3. Other Income : 
                            NOTE :  1. Any miscellaneous income you expect to receive from a rental property, other than rent.
                                    2. Examples include: coin-operated laundry, parking fees and storage rental.
                                    3. You can enter other income sources as monthly or yearly amounts.
                    2. Operating Expenses  =  Expense 1  +  Expense 2  +  Expense 3
                        NOTE :  1. All expenses you will pay while renting out a property, excluding any loan payments.
                                2. Examples include: property taxes, insurance, property management fees, maintenance, capital expenditures and utilities.
                                3. You can enter operating expenses as a monthly or yearly amount, as a percentage of the purchase price, or as a percentage of the gross rent 
                                   that either accounts for vacancy or ignores it. 

                1. Net Operating Income : 
                    With Financing: Cash Flow  =  NOI  -  Loan Payment
                    Without Financing : Cash Flow  =  NOI
            */

            // Operating Income  =  Gross Rent  -  Vacancy Expense  +  Other Income
            // ==================================================================================================
                $GrossRent = 0;
                if($MainProperty->grossrent_type == 'day'){
                    $GrossRent =  $MainProperty->grossrent * 365;
                }elseif($MainProperty->grossrent_type == 'week'){
                    $currentDate = Carbon\Carbon::now();
                    $year = $currentDate->year;
                    $weekNumber = $currentDate->weekOfYear;
                    $GrossRent =  $MainProperty->grossrent * $weekNumber;
                }elseif($MainProperty->grossrent_type == 'month'){
                    $GrossRent =  $MainProperty->grossrent * 12;
                }else{
                    $GrossRent =  $MainProperty->grossrent;
                }
                $VacancyExpense = $GrossRent * $MainProperty->vacancy_rate / 100;

                $OtherIncomes = App\Models\ItemOtherIncome::where('prop_id',$MainProperty->prop_id)->get();
                $TotalOtherIncome = 0;
                foreach ($OtherIncomes as $item) {
                    if ($item->paid_type == 'month') {
                        $TotalOtherIncome += $item->paid_amount * 12;
                    }else{
                        $TotalOtherIncome += $item->paid_amount;
                    }                
                }
                $OperatingIncome = (int)$GrossRent - (int)$VacancyExpense + $TotalOtherIncome;
            // ====================================================================================================
            //Operating Expenses = Expense 1 + Expense 2 + Expense 3
            // ====================================================================================================
                $ItemOperativeExpense = App\Models\ItemOperativeExpense::where('prop_id',$MainProperty->prop_id)->get();
                $totalOperativeExpense = 0;
                foreach($ItemOperativeExpense as $item){
                    if($item->paid_type == 'amount'){
                        if($item->paid_of == 'month'){
                            $totalOperativeExpense += $item->paid_amount;
                        }else{
                            $totalOperativeExpense += $item->paid_amount/ 12; // todo loan amount update
                        }
                    }else{
                        if($item->paid_percentOf == 'price'){
                            $totalOperativeExpense += $item->paid_amount * $MainProperty->prop_purchasePrice / 100;
                        }
                        else{
                            $purchaseamount = $item->paid_amount * $MainProperty->grossrent / 100;
                            $purchaseamount = (int)$purchaseamount;
                            $totalOperativeExpense += $purchaseamount;
                        }
                    }
                }
                $totalOperativeExpense = $totalOperativeExpense;
                $OperatingExpenses = $totalOperativeExpense * 12;
                // ====================================================================================================
                // NOI  =  Operating Income  -  Operating Expenses
            $NOI = $OperatingIncome - $OperatingExpenses;
            return $NOI;
        }
    }

    if(!function_exists('PriceImprovementCostHelper')){
        function PriceImprovementCostHelper($MainProperty){
            $itemImprovementCost = App\Models\itemImprovementCost::where('prop_id',$propertyList->prop_id)->get();
            $ImprovementCostAmount = 0;
            $ImprovementCostData = array();
            foreach($itemImprovementCost as $item){
                if($item->paid_type == 'amount'){
                    $ImprovementCost += $item->paid_amount;
                    $ImprovementCostData[] = array('paid_name' => $item->paid_name, 'amount' => $item->paid_amount);
                }else{
                    if($item->paid_percentOf == 'price'){
                        $ImprovementCost += $item->paid_amount * $MainProperty->prop_purchasePrice / 100;
                        $ImprovementCostData[] = array(
                            'paid_name' => $item->paid_name, 
                            'amount' => $item->paid_amount * $MainProperty->prop_purchasePrice / 100, 
                            'paid_type' => $item->paid_type
                        );

                    }else{
                        $ImprovementCost += $item->paid_amount * 0 /100;
                        $ImprovementCostData = array('paid_name' => $item->paid_name, 'amount' => $item->paid_amount * 0 / 100);
                    }
                }
            }
            $output = array('TotalAmount' => $ImprovementCost, 'Data' => $ImprovementCostData);
            return $output;
        }
    }

    if(!function_exists('BasicSalePriceHelper')){
        function BasicSalePriceHelper($MainProperty){
            $itemSellingCost = App\Models\itemSellingCost::where('prop_id',$propertyList->prop_id)->get();
            $sellingCostAmount = 0;
            $sellingCostData = array();
            foreach ($itemSellingCost as $item) {
                if($item->paid_type == 'amount'){
                    $sellingCostAmount += $item->paid_amount;
                    $sellingCostData[] = array('paid_name' => $item->paid_name, 'amount' => $item->paid_amount);
                }else{
                    if($item->paid_percentOf == 'price'){
                        $sellingCostAmount += $item->paid_amount * $MainProperty->prop_purchasePrice / 100;
                        $sellingCostData[] = array(
                            'paid_name' => $item->paid_name, 
                            'amount' => $item->paid_amount * $MainProperty->prop_purchasePrice / 100, 
                            'paid_type' => $item->paid_type
                        );

                    }else{
                        $sellingCostAmount += $item->paid_amount * 0 /100;
                        $sellingCostData = array('paid_name' => $item->paid_name, 'amount' => $item->paid_amount * 0 / 100);
                    }
                }
            }
            $output = array('TotalAmount' => $sellingCostAmount, 'Data' => $sellingCostData);
            return $output;

        }
    }

    if(!function_exists('calculatePriorYearLoanBalance')){
        function calculatePriorYearLoanBalance($remainingPrincipal, $annualInterestRate, $emi) {
            try {
                // Convert annual interest rate to monthly rate
                $monthlyInterestRate = $annualInterestRate / 12 / 100;
            
                // Calculate total number of payments
                $totalNumberOfPayments = ceil($remainingPrincipal / $emi);
            
                // Calculate total interest paid
                $totalInterestPaid = $totalNumberOfPayments * ($remainingPrincipal * $monthlyInterestRate);
            
                // Calculate remaining principal after current year's payments
                $remainingPrincipalAfterYear = $remainingPrincipal - ($totalNumberOfPayments * $emi);
            
                // Calculate prior year loan balance
                $priorYearLoanBalance = $remainingPrincipalAfterYear + $totalInterestPaid;
            
                return $priorYearLoanBalance;
            } catch (\Throwable $th) {
                return 0;
            }
        }
    }

    if(!function_exists('calculateCurrentLoanBalance')){
        function calculateCurrentLoanBalance($initialPrincipal, $annualInterestRate, $emi, $currentPeriod) {
            // Convert annual interest rate to monthly rate
            $monthlyInterestRate = $annualInterestRate / 12 / 100;
        
            // Calculate remaining principal after current period's payments
            $remainingPrincipal = $initialPrincipal;
            for ($i = 1; $i <= $currentPeriod; $i++) {
                // Calculate principal portion of the loan payment
                $monthlyPrincipal = $emi - ($remainingPrincipal * $monthlyInterestRate);
        
                // Update remaining principal after payment
                $remainingPrincipal -= $monthlyPrincipal;
            }
        
            return $remainingPrincipal;
        }
    }
    
    if(!function_exists('yearlyLoanPayments')){
        function yearlyLoanPayments($principal, $annualInterestRate, $years) {
            // Convert annual interest rate to decimal
            $rate = $annualInterestRate / 100;
        
            // Convert years to number of payments
            $numberOfPayments = $years;
        
            // Calculate yearly payment
            $yearlyPayment = $rate * $principal / (1 - pow(1 + $rate, -$numberOfPayments));
        
            return $yearlyPayment;
        }
    }

    if(!function_exists('AmortizingLoansHelper')){
        function AmortizingLoansHelper($MainProperty){
            $loans = App\Models\PropertyLoan::where('property_id',$MainProperty->prop_id)->get();
            $loandAmount = 0;
            $loadData = array();
            $totalMonthlyLoanInterest = 0;
            $priorYearLoanBalance = 0;
            $currentLoanBalance = 0;
            $yearlyPayment = 0;
            foreach($loans as $item){
                if($item->financingof == 'Purchase Price'){
                    $loandAmount += $item->price_financing * $MainProperty->prop_purchasePrice / 100;

                    $remainingPrincipal = $item->price_financing * $MainProperty->prop_purchasePrice / 100;
                    $annualInterestRate = $item->interest_rate;
                    $loanInterest = calculateMonthlyInterest($remainingPrincipal, $annualInterestRate);
                    $priorYearLoanBalance += calculatePriorYearLoanBalance($remainingPrincipal,$annualInterestRate,$loanInterest);
                    $currentPeriod = $item->loan_term * 12;
                    $currentLoanBalance += calculateCurrentLoanBalance($remainingPrincipal, $annualInterestRate, $loanInterest, $currentPeriod);
                    $yearlyPayment += yearlyLoanPayments($remainingPrincipal,$annualInterestRate,$item->loan_term);
                    $totalMonthlyLoanInterest += $loanInterest;
                    $loandData[] = array(
                        'loan_label' => $item->loan_label, 
                        'loan_amount' => $remainingPrincipal, 
                        'monthlyLoanInterest' => $loanInterest,
                        'yearlyLoanPayments'    => yearlyLoanPayments($remainingPrincipal,$annualInterestRate,$item->loan_term)
                    );
                }elseif($item->financingof == 'Improvement Cost'){
                    $totalImprovementCost = ImprovementCosts($MainProperty);
                    $loandAmount += $totalImprovementCost['TotalAmount'];

                    $remainingPrincipal = $loandAmount;
                    $annualInterestRate = $item->interest_rate;
                    $loanInterest = calculateMonthlyInterest($remainingPrincipal, $annualInterestRate);
                    $priorYearLoanBalance += calculatePriorYearLoanBalance($remainingPrincipal,$annualInterestRate,$loanInterest);
                    $currentPeriod = $item->loan_term * 12;
                    $currentLoanBalance += calculateCurrentLoanBalance($remainingPrincipal, $annualInterestRate, $loanInterest, $currentPeriod);
                    $yearlyPayment += yearlyLoanPayments($remainingPrincipal,$annualInterestRate,$item->loan_term);
                    $totalMonthlyLoanInterest += $loanInterest;
                    $loandData[] = array(
                        'loan_label' => $item->loan_label, 
                        'loan_amount' => $remainingPrincipal, 
                        'monthlyLoanInterest' => $loanInterest,
                        'yearlyLoanPayments'    => yearlyLoanPayments($remainingPrincipal,$annualInterestRate,$item->loan_term)
                    );
                }elseif($item->financingof == 'Price and Improvement Cost'){
                    $PriceImprovementCost = PriceImprovementCostHelper($MainProperty);
                    $loandAmount += $PriceImprovementCost['TotalAmount'];

                    $remainingPrincipal = $loandAmount;
                    $annualInterestRate = $item->interest_rate;
                    $loanInterest = calculateMonthlyInterest($remainingPrincipal, $annualInterestRate);
                    $priorYearLoanBalance += calculatePriorYearLoanBalance($remainingPrincipal,$annualInterestRate,$loanInterest);
                    $currentPeriod = $item->loan_term * 12;
                    $currentLoanBalance += calculateCurrentLoanBalance($remainingPrincipal, $annualInterestRate, $loanInterest, $currentPeriod);
                    $yearlyPayment += yearlyLoanPayments($remainingPrincipal,$annualInterestRate,$item->loan_term);
                    $totalMonthlyLoanInterest += $loanInterest;
                    $loandData[] = array(
                        'loan_label' => $item->loan_label, 
                        'loan_amount' => $remainingPrincipal, 
                        'monthlyLoanInterest' => $loanInterest,
                        'yearlyLoanPayments'    => yearlyLoanPayments($remainingPrincipal,$annualInterestRate,$item->loan_term)
                    );
                }elseif($item->financingof == 'Basic Sale Price'){
                    $basicSalePrice = BasicSalePriceHelper($MainProperty);
                    $loandAmount += $basicSalePrice['TotalAmount'];

                    $remainingPrincipal = $loandAmount;
                    $annualInterestRate = $item->interest_rate;
                    $loanInterest = calculateMonthlyInterest($remainingPrincipal, $annualInterestRate);
                    $priorYearLoanBalance += calculatePriorYearLoanBalance($remainingPrincipal,$annualInterestRate,$loanInterest);
                    $currentPeriod = $item->loan_term * 12;
                    $currentLoanBalance += calculateCurrentLoanBalance($remainingPrincipal, $annualInterestRate, $loanInterest, $currentPeriod);
                    $yearlyPayment += yearlyLoanPayments($remainingPrincipal,$annualInterestRate,$item->loan_term);
                    $totalMonthlyLoanInterest += $loanInterest;
                    $loandData[] = array(
                        'loan_label' => $item->loan_label, 
                        'loan_amount' => $remainingPrincipal, 
                        'monthlyLoanInterest' => $loanInterest,
                        'yearlyLoanPayments'    => yearlyLoanPayments($remainingPrincipal,$annualInterestRate,$item->loan_term)
                    );
                }
            }
            $output = array(
                'loan_data'                 => $loadData, 
                'LoanPrincipal'             => $loandAmount, 
                'totalMonthlyLoanInterest'  => $totalMonthlyLoanInterest,
                'priorYearLoanBalance'      => $priorYearLoanBalance,
                'currentLoanBalance'        => $currentLoanBalance,
                'yearlyPayment'             => $yearlyPayment
            );
            return $output;
        }
    }

    if(!function_exists('YearlyCashFlow')){
        function YearlyCashFlow($MainProperty){
            /*
                1. YearlyCashFlow
                    1. CashFlow = NOI - LoanPayment (WITH FINANCING)
                        1. NOI
                        2. LoanPayment
                            1. AmortizingLoans
                                => LoanPayment  =  LoanPrincipal + LoanInterest + PMI (Optional)
                                1. LoanPrincipal
                                2. LoanInterest
                                    1. Yearly Loan Interest = Yearly Loan Payments - (Prior Year Loan Balance - Current Loan Balance)
                                        1. Yearly Loan Payments = Loan Payments
                                        2. Prior Year Loan Balance
                                        3. Current Loan Balance
                                3. PMI (Optional)
                                    NOTE :  1. Some lenders and loan programs require you to pay private mortgage insurance (PMI), which is typically calculated as a percentage 
                                               of the starting loan amount.
                                            2. In some cases, it is a one-time upfront payment or fee that is added to the starting loan amount.
                                            3. Other times it is a recurring payment or fee that is added to the monthly loan payment.
                            2. Interest-Only Loans
                                => Loan Payment  =  Loan Interest
                    2. Cash Flow = NOI (WITHOUT FINANCING)
            */
            $NOI = findNOI($MainProperty);
            $ItemPropertyLoan = App\Models\PropertyLoan::where('property_id',$MainProperty->prop_id)->count();
            if($ItemPropertyLoan > 0){
                $AmortizingLoans = AmortizingLoansHelper($MainProperty);
                $LoanPrincipal = $AmortizingLoans['LoanPrincipal'];
                $yearlyPayment = $AmortizingLoans['yearlyPayment'];
                $priorYearLoanBalance = $AmortizingLoans['priorYearLoanBalance'];
                $currentLoanBalance = $AmortizingLoans['currentLoanBalance'];

                $YearlyLoanInterest = $yearlyPayment - ($priorYearLoanBalance - $currentLoanBalance);
                $LoanPayment = (int)round(($LoanPrincipal + $YearlyLoanInterest));

                $CashFlow = $NOI - $LoanPayment;
            }else{
                $CashFlow = $NOI;
            }
            return $CashFlow;
        }
    }

    if (!function_exists('CapRatePurchasePrice')) {
        function CapRatePurchasePrice($MainProperty,$type)
        {
            try {
                $NOI = findNOI($MainProperty);
                // Cap Rate  =    Yearly NOI / Purchase Price
                if($type == 'Purchase Price'){
                    $CapRate = $NOI / $MainProperty->prop_purchasePrice * 100;
                }else{
                    $CapRate = $NOI / $MainProperty->prop_salePrice * 100;
                }
                
                return $CapRate;
            } catch (\Throwable $th) {
                return 0;
            }
        }
    }

    if(!function_exists('TotalCashNeededwithFinancing')){
        function TotalCashNeededwithFinancing($MainProperty){
            /*
                1. TotalCashNeeded = LoanDownPayment  +  PurchaseCosts  +  RehabCosts (WITH FINANCING)
            */
            $loanAmount = 0;
            $property_loan_query = App\Models\PropertyLoan::where('property_id',$MainProperty->prop_id)->get();
            if(count($property_loan_query)){
                foreach($property_loan_query as $listloan){
                    $loanAmount+= $MainProperty->prop_purchasePrice ? ($MainProperty->prop_purchasePrice * $listloan->price_financing / 100) : 0;
                }
            }
            $purchasePrice = $MainProperty->prop_purchasePrice;
            $LoanDownPayment = $purchasePrice - $loanAmount;
            $PurchaseCost = PurchaseCostsHelper($MainProperty);
            $TotalPurchaseCost = $PurchaseCost['TotalAmount'];

            $TotalCashNeeded = $LoanDownPayment + $TotalPurchaseCost;
            return $TotalCashNeeded;
        }
    }

    if(!function_exists('TotalCashNeededWithoutFinancing')){
        function TotalCashNeededWithoutFinancing($MainProperty){
            /*
                2. TotalCashNeeded = PurchasePrice  +  PurchaseCosts  +  RehabCosts (WITHOUT FINANCING)
            */
            $PurchasePrice = $MainProperty->prop_purchasePrice;
            $PurchaseCosts = PurchaseCostsHelper($MainProperty);

            $TotalCashNeeded = $PurchasePrice + $PurchaseCosts['TotalAmount'];
            return $TotalCashNeeded;
        }
    }

    if(!function_exists('TotalInvestedCash')){
        function TotalInvestedCash($MainProperty){
            /*
                1. Total Invested Cash
                    1. Rentals and Flips 
                        => Total Cash Invested = Total Cash Needed to Close
                        1. Total Cash Needed = Loan Down Payment  +  Purchase Costs  +  Rehab Costs (WITH FINANCING)
                        2. Total Cash Needed = Purchase Price  +  Purchase Costs  +  Rehab Costs (WITHOUT FINANCING)
                            1. Purchase Costs
                                NOTE :  1. All costs and fees associated with purchasing a property, sometimes also called closing costs.
                                        2. Examples include: appraisal fees, property inspection fees, finder's fees and loan points.
                            2. Rehab Costs
                                NOTE :  1. Expenses that you expect to pay after purchasing a property to improve its condition or perform repairs.
                                        2. Examples include: new paint, new appliances, new carpet, electrical repairs, landscaping and cleaning.
            */
            $ItemPropertyLoan = App\Models\PropertyLoan::where('property_id',$MainProperty->prop_id)->count();
            if($ItemPropertyLoan > 0){
                $totalCashNeeded = TotalCashNeededwithFinancing($MainProperty);
            }else{
                $totalCashNeeded = TotalCashNeededWithoutFinancing($MainProperty);
            }
            return $totalCashNeeded;
        }
    }

    if(!function_exists('CashOnCashReturn')){
        function CashOnCashReturn($MainProperty){
            /*
                COC = Yearly Cash Flow / Total Invested Cash
                1. YearlyCashFlow
                    1. Cash Flow = NOI - Loan Payment (WITH FINANCING)
                        1. NOI
                        2. Loan Payment
                            1. Amortizing Loans
                                => Loan Payment  =  Loan Principal + Loan Interest + PMI (Optional)
                                1. Loan Principal
                                2. Loan Interest
                                    1. Yearly Loan Interest = Yearly Loan Payments - (Prior Year Loan Balance - Current Loan Balance)
                                3. PMI (Optional)
                                    NOTE :  1. Some lenders and loan programs require you to pay private mortgage insurance (PMI), which is typically calculated as a percentage of the starting loan amount.
                                            2. In some cases, it is a one-time upfront payment or fee that is added to the starting loan amount.
                                            3. Other times it is a recurring payment or fee that is added to the monthly loan payment.
                            2. Interest-Only Loans
                                => Loan Payment  =  Loan Interest
                    2. Cash Flow = NOI (WITHOUT FINANCING)
                2. Total Invested Cash
                    1. Rentals and Flips 
                        => Total Cash Invested = Total Cash Needed to Close
                        1. Total Cash Needed = Loan Down Payment  +  Purchase Costs  +  Rehab Costs (WITH FINANCING)
                        2. Total Cash Needed = Purchase Price  +  Purchase Costs  +  Rehab Costs (WITHOUT FINANCING)
                            1. Purchase Costs
                                NOTE :  1. All costs and fees associated with purchasing a property, sometimes also called closing costs.
                                        2. Examples include: appraisal fees, property inspection fees, finder's fees and loan points.
                            2. Rehab Costs
                                NOTE :  1. Expenses that you expect to pay after purchasing a property to improve its condition or perform repairs.
                                        2. Examples include: new paint, new appliances, new carpet, electrical repairs, landscaping and cleaning.
                    2. BRRRRs
                        -> Total Cash Invested  = Invested Cash - (Refinance Loan Amount - Refinance Costs - Purchase Loan Repayment - Holding Costs )
                        1. Invested Cash
                            1. WITH FINANCING
                                ->Total Cash Needed  =  Loan Down Payment  +  Purchase Costs  +  Rehab Costs
                            2. WITHOUT FINANCING
                                -> Total Cash Needed  =  Purchase Price  +  Purchase Costs  +  Rehab Costs
                        2. Refinance Loan Amount
                        3. Refinance Costs
                            NOTE :  1. All costs and fees associated with refinancing a property, sometimes also called closing costs.
                                    2. Examples include: appraisal fees, lender fees, recording fees and loan points.
                        4. Purchase Loan Repayment
                        5. Holding Costs = Expense 1 + Expense 2 + Expense 3
            */
            try {
                $yearlyCashFlow = YearlyCashFlow($MainProperty);
                $TotalInvestedCash = TotalInvestedCash($MainProperty);

                $COC = ($yearlyCashFlow / $TotalInvestedCash) * 100;
                $COC = number_format($COC,2);
                // dd($COC);
                return $COC;
            } catch (\Throwable $th) {
                return 0;
            }
                
        }
    }
    
    if(!function_exists('ReturnOnEquity')){
        function ReturnOnEquity($MainProperty){
            /*
                ROE  =  YearlyCashFlow / EquityAtEndOfYear
                1. YearlyCashFlow
                    1. CashFlow =  NOI - LoanPayment (With Financing)
                    2. CashFlow =  NOI (Without Financing)
                2. EquityAtEndOfYear
                    1. TotalEquity  =  MarketValue - LoanBalance (With Financing)
                    2. TotalEquity  =  MarketValue (Without Financing)
            */
            $NOI = findNOI($MainProperty);
            $yearlyCashFlow = YearlyCashFlow($MainProperty);
            $propertyLoans = PropertyLoans($MainProperty);
            $LoanBalance = $propertyLoans['loanTotalAmount'];
            $MarketValue = $MainProperty->prop_salePrice;
            
            $propertyLoans = App\Models\PropertyLoan::where('property_id',$MainProperty->prop_id)->count();
            if($propertyLoans > 0){
                $TotalEquity = $MarketValue - $LoanBalance;
            }else{
                $TotalEquity = $MarketValue;
            }

            if($yearlyCashFlow < $TotalEquity){
                $ROE = 0;
            }else{
                $ROE = ($yearlyCashFlow - $TotalEquity) / 100;
            }
            return $ROE;
        }
    }

    if(!function_exists('TotalProfit')){
        function TotalProfit($MainProperty){
            /*
                1. TotalProfit = ARV  -  SellingCosts  -  LoanRepayment  -  HoldingCosts  -  TotalInvestedCash (With Financing)                        
                    1. AfterRepairValue (ARV)
                        => The estimated market value of a property after its rehab is complete. If no repairs are necessary, the after repair value is the same as the current market value.
                        => For BRRRR deals, the ARV is used to calculate the long-term loan amount during the refinance phase.
                        => When flipping a property, the ARV is usually equal to the sale price and is used to calculate the total profit from a flip.
                    2. SellingCosts
                        => All costs and fees associated with selling a property, sometimes also called closing costs.
                        => Examples include: real estate broker commissions, escrow fees, transfer taxes and a home warranty.
                        => You can enter selling costs as a set amount or as a percentage of the sale price.
                    3. LoanRepayment
                    4. HoldingCosts = Expense 1 + Expense 2 + Expense 3
                    5. TotalInvestedCash = TotalCashNeededToClose
                        1. TotalCashNeededToClose = LoanDownPayment  +  PurchaseCosts  +  RehabCosts (With Financing)
                            1. LoanDownPayment
                            2. PurchaseCosts
                            3. RehabCosts
                        2. TotalCashNeededToClose = PurchasePrice  +  PurchaseCosts  +  RehabCosts (Without Financing)
                            1. PurchasePrice
                            2. PurchaseCosts
                            3. RehabCosts
                2. TotalProfit = ARV  -  SellingCosts  -  HoldingCosts  -  TotalInvestedCash (Without Financing)
                    1. ARV
                    2. SellingCosts
                    3. HoldingCosts
                    4. TotalInvestedCash
            */
            $ARV = $MainProperty->prop_salePrice;
            $SellingCostsData = SellingCosts($MainProperty);
            $SellingCosts = $SellingCostsData['TotalAmount'];

            $propertyLoans = PropertyLoans($MainProperty);
            $LoanRepayment = $propertyLoans['total_monthly_loan_repayment'] * 12;

            $HoldingCostsData = HoldingCost($MainProperty);
            $HoldingCosts = $HoldingCostsData['TotalAmount'];

            $TotalInvestedCash = TotalInvestedCash($MainProperty);

            $PurchaseCostsData = PurchaseCostsHelper($MainProperty);
            $PurchaseCosts = $PurchaseCostsData['TotalAmount'];

            $PurchasePrice = $MainProperty->prop_purchasePrice;

            $ItemPropertyLoan = App\Models\PropertyLoan::where('property_id',$MainProperty->prop_id)->count();
            if($ItemPropertyLoan > 0){
                $TotalProfit = $ARV  -  $SellingCosts  -  $LoanRepayment  -  $HoldingCosts  -  $TotalInvestedCash;
            }else{
                $TotalProfit = $ARV  -  $SellingCosts  -  $HoldingCosts  -  $TotalInvestedCash;
            }
            return $TotalProfit;
        }
    }

    if(!function_exists('ReturnOnInvestment')){
        function ReturnOnInvestment($MainProperty){
            /*
                ROI = TotalProfit / TotalInvestedCash  +  HoldingCosts
                1. TotalProfit
                2. TotalInvestedCash
                    1. TotalCashInvested = TotalCashNeededToClose
                3. HoldingCosts
                    1. HoldingCosts  = Expense 1 + Expense 2 + Expense 3
            */
            try {
                $TotalProfit = TotalProfit($MainProperty);

                $TotalInvestedCash = TotalInvestedCash($MainProperty);

                $HoldingCostsData = HoldingCost($MainProperty);
                $HoldingCosts = $HoldingCostsData['TotalAmount'];

                $ROI = round($TotalProfit / $TotalInvestedCash  +  $HoldingCosts);
                // $ROI = round($ROI / 100);
                return $ROI;
            } catch (\Throwable $th) {
                return 0;
            }
                
        }
    }

    if(!function_exists('EquityMultiple')){
        function EquityMultiple($MainProperty){
            /*
                EquityMultiple = TotalEquity - SellingCosts + CumulativeCashFlow / TotalInvestedCash
                1. TotalEquity
                2. SellingCosts
                3. CumulativeCashFlow
                    1. CashFlow  =  NOI - LoanPayment (With Financing)
                    2. CashFlow  =  NOI (Without Financing)
                4. TotalInvestedCash
            */
            try {
                $propertyLoans = PropertyLoans($MainProperty);
                $LoanBalance = $propertyLoans['loanTotalAmount'];
                $MarketValue = $MainProperty->prop_salePrice;
                
                $propertyLoans = App\Models\PropertyLoan::where('property_id',$MainProperty->prop_id)->count();
                if($propertyLoans > 0){
                    $TotalEquity = $MarketValue - $LoanBalance;
                }else{
                    $TotalEquity = $MarketValue;
                }

                $SellingCostsData = SellingCosts($MainProperty);
                $SellingCosts = $SellingCostsData['TotalAmount'];

                $CumulativeCashFlow = YearlyCashFlow($MainProperty);
                $TotalInvestedCash = TotalInvestedCash($MainProperty);

                $EquityMultiple = (($TotalEquity - $SellingCosts) + $CumulativeCashFlow) / $TotalInvestedCash;
                $EquityMultiple = round($EquityMultiple);
                return $EquityMultiple;
            } catch (\Throwable $th) {
                return 0;
            }
        }
    }

    if(!function_exists('GrossRent')){
        function GrossRent($MainProperty){
            $grossRentAmount = $MainProperty->grossrent;
            $grossRentType = $MainProperty->grossrent_type;
            $yearlyGrossRent = 0;
            if($grossRentType == 'day'){
                $grossRentMonthlyAmount = $grossRentAmount * 31;
                $yearlyGrossRent = $grossRentAmount * 362;
            }elseif($grossRentType == 'week'){
                $grossRentMonthlyAmount = $grossRentAmount * 4;
                $yearlyGrossRent = $grossRentAmount * 362;
            }elseif($grossRentType == 'month'){
                $grossRentMonthlyAmount = $grossRentAmount;
                $yearlyGrossRent = $grossRentAmount * 12;
            }elseif($grossRentType == 'year'){
                $grossRentMonthlyAmount = $grossRentAmount / 12;
                $yearlyGrossRent = $grossRentAmount;
            }else{
                $grossRentMonthlyAmount = $grossRentAmount;
                $yearlyGrossRent = $grossRentAmount * 362;
            }
            $output = array('monthly_gross_rent' => $grossRentMonthlyAmount, 'yearly_gross_rent' => $yearlyGrossRent);
            return $output;
        }
    }

    if(!function_exists('RentToValue')){
        function RentToValue($MainProperty){
            /*
                RentToValue = MonthlyGrossRent / PurchasePrice
                1. MonthlyGrossRent 
                    => The total rent collected from your tenants, before subtracting any operating expenses or accounting for vacancy. 
                2. PurchasePrice
                    => The price of a property you are purchasing.
                    => The purchase price should not include purchase or rehab costs.
            */
            try {
                $grossRent = GrossRent($MainProperty);
                $MonthlyGrossRent = $grossRent['monthly_gross_rent'];
                $PurchasePrice = $MainProperty->prop_purchasePrice;
                $RentToValue = number_format(($MonthlyGrossRent / $PurchasePrice),2);
                return $RentToValue;
            } catch (\Throwable $th) {
                return 0;
            }
            
        }
    }

    if(!function_exists('GrossRentMultiplier')){
        function GrossRentMultiplier($MainProperty){
            /*
                GRM = PurchasePrice / YearlyGrossRent
                1. PurchasePrice
                    => The price of a property you are purchasing.
                    => The purchase price should not include purchase or rehab costs.
                2. YearlyGrossRent
                    => The total rent collected from your tenants, before subtracting any operating expenses or accounting for vacancy.
            */
            try {
                $PurchasePrice = $MainProperty->prop_purchasePrice;
                $grossRent = GrossRent($MainProperty);
                $YearlyGrossRent = $grossRent['yearly_gross_rent'];
                $GRM = number_format(($PurchasePrice / $YearlyGrossRent),2);
                return $GRM;
            } catch (\Throwable $th) {
                return 0;
            }
            
        }
    }

    if(!function_exists('OperatingExpenses')){
        function OperatingExpenses($MainProperty){
            $operatingExpenses = App\Models\ItemOperativeExpense::where('prop_id',$MainProperty->prop_id)->get();
            $monthlyOperatingExpenses = 0;
            $yearlyOperatingExpenses = 0;
            $customData = array();
            foreach($operatingExpenses as $item){
                $itemTotalAmount = 0;
                if($item->paid_of == 'month'){
                    $monthlyOperatingExpenses += $item->paid_amount;
                    $yearlyOperatingExpenses += $item->paid_amount * 12;
                    $itemTotalAmount = $item->paid_amount * 12;
                }

                if($item->paid_of == 'year'){
                    $monthlyOperatingExpenses += $item->paid_amount * 12;
                    $yearlyOperatingExpenses += $item->paid_amount;
                    $itemTotalAmount = $item->paid_amount;
                }

                $customData[] = array(
                    'paid_name' => $item->paid_name,
                    'paid_type' => $item->paid_type,
                    'paid_amount'=>$itemTotalAmount,
                );
            }
            $output = array(
                'monthly_operating_expenses'=> $monthlyOperatingExpenses,
                'yearly_operating_expenses' => $yearlyOperatingExpenses,
                'customeData'               => $customData,
                'Data'                      => $operatingExpenses
            );
            return $output;
        }
    }

    if(!function_exists('BreakEvenRatio')){
        function BreakEvenRatio($MainProperty){
            /*
                BER = (YearlyOperatingExpenses  +  YearlyDebtService) / YearlyGrossRent
                1. YearlyOperatingExpenses
                    1. OperatingExpenses = Expense1 + Expense2 + Expense3 
                2. YearlyDebtService
                    => If you are using financing to purchase a property, the loan payments are the recurring payments you will be required to make to your lender to repay your loan.
                    => For amortizing loans, the loan payments include principal and interest payment portions. They may also include a recurring PMI payment, if required by your lender.
                    => For interest-only loans, the loan payments consist of only the interest payment portion.
                    => The loan payment amount does not include any additional escrow payments, such as property taxes or insurance. Those costs are included in the operating expenses instead.

                    1. LoanPayment = LoanPrincipal  +  LoanInterest  +  PMI (Optional)
                    2. LoanPayment = LoanInterest
                3. YearlyGrossRent
            */
            try {
                $operatingExpenses = OperatingExpenses($MainProperty);
                $YearlyOperatingExpenses = $operatingExpenses['yearly_operating_expenses'];

                $AmortizingLoans = AmortizingLoansHelper($MainProperty);
                $LoanPrincipal = $AmortizingLoans['LoanPrincipal'];
                $yearlyPayment = $AmortizingLoans['yearlyPayment'];
                $priorYearLoanBalance = $AmortizingLoans['priorYearLoanBalance'];
                $currentLoanBalance = $AmortizingLoans['currentLoanBalance'];

                $YearlyLoanInterest = $yearlyPayment - ($priorYearLoanBalance - $currentLoanBalance);
                $YearlyDebtService = (int)round(($LoanPrincipal + $YearlyLoanInterest));

                $grossRent = GrossRent($MainProperty);
                $YearlyGrossRent = $grossRent['yearly_gross_rent'];
                
                $BER = ($YearlyOperatingExpenses  +  $YearlyDebtService) / $YearlyGrossRent;
                $BER = number_format($BER,2);
                return $BER;
            } catch (\Throwable $th) {
                return 0;
            }
                
        }
    }

    if(!function_exists('LoanCostRatio')){
        function LoanCostRatio($MainProperty){
            /*
                LCR = LoanAmount / PurchasePrice
            */
            try {
                $propertyLoans = PropertyLoans($MainProperty);
                $LoanAmount = $propertyLoans['loanTotalAmount'];

                $PurchasePrice = $MainProperty->prop_purchasePrice;

                $LCR = $LoanAmount / $PurchasePrice;
                $LCR = number_format($LCR,2);
                return $LCR;
            } catch (\Throwable $th) {
                return 0;
            }
        }
    }

    if(!function_exists('DebtCoverageRatio')){
        function DebtCoverageRatio($MainProperty){
            /*
                DCR = YearlyNOI / YearlyDebtService
                1.YearlyNOI
                    1. NOI  =  Operating Income  -  Operating Expenses
                2. YearlyDebtService
                    1. Amortizing Loans
                        1. Loan Payment  =  Loan Principal  +  Loan Interest  +  PMI (Optional)
                    2. Interest-Only Loans
                        1. Loan Payment  =  Loan Interest
            */

            try {
                $YearlyNOI = findNOI($MainProperty);

                /*
                * YearlyDebtService
                */
                $AmortizingLoans = AmortizingLoansHelper($MainProperty);
                $LoanPrincipal = $AmortizingLoans['LoanPrincipal'];
                $yearlyPayment = $AmortizingLoans['yearlyPayment'];
                $priorYearLoanBalance = $AmortizingLoans['priorYearLoanBalance'];
                $currentLoanBalance = $AmortizingLoans['currentLoanBalance'];

                $YearlyLoanInterest = $yearlyPayment - ($priorYearLoanBalance - $currentLoanBalance);
                $YearlyDebtService = (int)round(($LoanPrincipal + $YearlyLoanInterest));

                $DCR = $YearlyNOI / $YearlyDebtService;
                $DCR = number_format($DCR,2);
                return $DCR;
            } catch (\Throwable $th) {
                return 0;
            }
        }
    }

    if(!function_exists('DebtYield')){
        function DebtYield($MainProperty){
            /*
                DebtYield = YearlyNOI / LoanAmount
            */
            try {
                $YearlyNOI = findNOI($MainProperty);

                $propertyLoans = PropertyLoans($MainProperty);
                $LoanAmount = $propertyLoans['loanTotalAmount'];
                $DebtYield = $YearlyNOI / $LoanAmount;
                $DebtYield = number_format($DebtYield,2);
                return $DebtYield;
            } catch (\Throwable $th) {
                return 0;
            }
        }
    }

    if(!function_exists('HoldingPeriod')){
        function HoldingPeriod($MainProperty){
            $toDate = Carbon\Carbon::parse($MainProperty->prop_dateOfBooking);
            $fromDate = Carbon\Carbon::parse($MainProperty->prop_dateOfPossession);
            $HoldingDurationMonths = $toDate->diffInMonths($fromDate);
            return $HoldingDurationMonths;
        }
    }

    if(!function_exists('InternalRateOfReturn')){
        function InternalRateOfReturn($MainProperty){
            /*
                IRR = (12  *  ROI) / HoldingPeriod
                1. ROI
                2. HoldingPeriod 
                    => The amount of time you anticipate it will take to rehab a property, typically expressed in months.
                    => For flips, this period also includes the time it will take to sell the property.A longer holding period will increase your 
                       holding costs and reduce your total profit.
            */

            try {
                $ROI = ReturnOnInvestment($MainProperty);
                $HoldingPeriod = HoldingPeriod($MainProperty);

                $ROI = (12 * $ROI);
                $IRR = $ROI / $HoldingPeriod;
                $IRR = round($IRR);
                return $IRR;
            } catch (\Throwable $th) {
                return 0;
            }

            
        }
    }

    if(!function_exists('LoanToValueRatio')){
        function LoanToValueRatio($MainProperty){
            /*
                LTV = LoanAmount / MarketValue
                1. LoanAmount
                2. MarketValue
            */
            try {
                $propertyLoans = PropertyLoans($MainProperty);
                $LoanAmount = $propertyLoans['loanTotalAmount'];
                $MarketValue = $MainProperty->prop_purchasePrice;

                $LTV = $LoanAmount / $MarketValue;
                $LTV = number_format($LTV,2);
                return $LTV;
            } catch (\Throwable $th) {
                return 0;
            }
        }
    }

    if(!function_exists('OtherIncome')){
        function OtherIncome($MainProperty){
            $otherIncome = App\Models\ItemOtherIncome::where('prop_id',$MainProperty->prop_id)->get();
            $customeData = array();
            $totalAmount = 0;
            $success = false;
            $monthlyTotalAmount = 0;
            if(!is_null($otherIncome)){
                $success = true;
                foreach ($otherIncome as $value) {
                    $yearlyAmount = 0;
                    if($value->paid_type == 'month'){
                        $monthlyTotalAmount += $value->paid_amount;
                        $yearlyAmount = $value->paid_amount * 12;
                    }elseif($value->paid_type == 'year'){
                        $yearlyAmount = $value->paid_amount;
                        $monthlyTotalAmount += round($value->paid_amount / 12);
                    }
                    $totalAmount += $yearlyAmount;
                    $customeData[] = array(
                        'id'            => $value->id,
                        'paid_name'     => $value->paid_name,
                        'paid_type'     => $value->paid_type,
                        'paid_amount'   =>$value->paid_amount,
                        'yearly_amount' =>$yearlyAmount  
                    );
                }
            }
            $output = array(
                'success'       => $success,
                'customeData'   => $customeData,
                'Data'          => $otherIncome,
                'totalAmount'   => $totalAmount,
                'monthlyTotalAmount'=> $monthlyTotalAmount
            );
            return $output;
        }
    }