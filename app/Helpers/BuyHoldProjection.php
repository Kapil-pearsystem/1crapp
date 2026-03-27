<?php

    /*
        1. How to find Other Income
        2. How to find Operating Cost Yearly
        3. Need to integration or only for information (REFINANCE/ Optimize Analysis )
        4. How to find Property Management
    */
    /*
        M2 = (C2-(C2*D2))*(100%-E2)
    */
    /*
        C2 = Property Market Value
        C4 = Year count number
        F2 = BANK ROI
        L2 = SELLING COST
        N2 = TENURE
        M2 = LOAN AMOUNT
        I2 = APPRECIATION
        R2 = TOTAL SELF INVESTMENT
        ================================================
        B5 = SNAPSHOT OF PROPERTY PERFORMANCE
            C6 = Cash Flow (Annual)
            C7 = Year End Accumulated Equity
            C8 = RETURN ON INVESTMENT
            C9 = RETURN ON EQUITY 
            C10 = RATE OF GROSS RETURN 
            C11 = Total Profit 
        B16 = INCOME
            C17 = Gross Rent (Yearly)
            C18 = Vacancy
            C20 = Other income
            C21 = Operating Income (Yearly)
        B24 = EXPENSES
            C25 = TAXES
            C26 = UTILITIES CHARGES
            C27 = MAINTENANCE CHARGES
            C28 = PROPERTY MANAGEMENT
            C29 = Operating Cost (Yearly)
        B32 = CASH FLOW
            C33 = Operating Income
            C34 = Operating Cost
            C35 = Net Operating Income
            C36 = Loan EMI
            C37 = Cash Flow (Annual)
            C38 = Post Tax Cash Flow
            C39 = Cummulatice Cash Flow
        =========================================================
        B28 = EQUITY ACCUMULATIONS
            C29 = Market Value of Property
            C31 = Loan Balance
            C33 = Year End Accumulated Equity
        B34 = SALES & RETURN ANALYSIS
            C35 = Equity
            C36 = Selling Cost (3%) - L2
            C37 = Total Amount Received on Sale
            C38 = Total Cash Invested
            C39 = Total Profit
            C40 = Total Profit (In % of Investment)
        B42 = ANNUAL RETURN ANALYSIS
            C43 = Annual Price Appreciations
            C44 = Annual Principel Paydown
            C45 = Total Annual Return
        B47 = ROI ANALYSIS
            C48 = Total Annual Return
            C49 = Total Cash Invested
            C50 = RETURN ON INVESTMENT
        B52 = ROE ANALYSIS
            C53 = Total Annual Return
            C54 = Year End Accumulated Equity
            C55 = RETURN ON EQUITY
        B57 = GROSS RETURNS
            C58 = Total Return (Year End Equity)
            C59 = Total Cash Invested
            C60 = RATE OF GROSS RETURN 
        B61 = TAX BENEFITS & DEDUCTIONS
            C62 = Operating Cost
            C63 = Loan Interest Part
            C64 = Depreciation
            C65 = Total Deductions
        B67 = INVESTMENT RETURNS
            C68 = Cap Rate (Purchase Price)
            C69 = Cap Rate (Market Value)
            C70 = Cash on Cash Return
            C71 = Return on Equity
            C72 = Return on Investment
            C73 = Internal Rate of Return
        B75 = FINANCIAL RATIOS
            C76 = Rent to Value:
            C77 = Gross Rent Multiplier
            C78 = Equity Multiple
            C79 = Break Even Ratio
            C80 = Debt Coverage Ratio
            C81 = Debt Yield
    */
    
    
    if(!function_exists('AllCell')){
        function AllCell($MainProperty){
            $AllCell = array();
            $AllCell['loopCount'] = 20;
            $AllCell['C2'] = $MainProperty->prop_purchasePrice;
            $AllCell['D2'] = $MainProperty->prop_sale_discount;
            $AllCell['E2'] = 0;

            $PropertyLoans = App\Models\PropertyLoan::where('property_id',$MainProperty->prop_id)->first();
            $AllCell['F2'] = $PropertyLoans?->interest_rate;
            // $AllCell['G2'] = 
            $AllCell['H2'] = $MainProperty->vacancy_rate;
            $AllCell['I2'] = $MainProperty->prop_appreciationPercent;
            $AllCell['J2'] = $MainProperty->prop_incomeIncreasePercent;
            $AllCell['K2'] = $MainProperty->prop_expenseIncreasePercent;
            $AllCell['L2'] = $MainProperty->prop_sellingCostPercent;
            $LoanData = TotalLoanAmount($MainProperty);
            // $TotalPurchaseCostsAmount = PurchaseCosts($MainProperty);
            $totalLoanAmount = array_sum($LoanData['loanWithMortgageIns']);
            $AllCell['M2'] = $totalLoanAmount;
            $AllCell['N2'] = $PropertyLoans?->loan_term;
            $AllCell['O2'] = TotalEMI($MainProperty) / 12;

            $otherIncome = OtherIncome($MainProperty);
            $propertyLoans = PropertyLoans($MainProperty);
            
            
            // $AllCell['C20'] = $otherIncome['totalAmount'];
            $AllCell['S2'] = 30;
            $AllCell['T2'] = 20;
            $AllCell['W2'] = round(($AllCell['M2'] * $AllCell['F2'] / 12) / 100);
            $AllCell['U2'] = HoldingPeriod($MainProperty);

            $monthlyPrinciple = $AllCell['O2'] - $AllCell['W2'];
            $holdingTotalPrinciple = $monthlyPrinciple * $AllCell['U2'];
            // $AllCell['Y2'] = 2776232; /*($AllCell['M2'] - $holdingTotalPrinciple)*/
            $AllCell['Y2'] = ($AllCell['M2'] - $holdingTotalPrinciple);
            $AllCell['Y2'] = 2776232;

            $grossRent = GrossRent($MainProperty);
            $operatingExpenses = OperatingExpenses($MainProperty);
            $AllCell['C16'] = $grossRent['yearly_gross_rent'];
            $AllCell['C17'] = $AllCell['C16'] * $AllCell['H2'] / 100;
            $AllCell['C19'] = $otherIncome['totalAmount'];
            // $AllCell['C21'] = $AllCell['C17'] - $AllCell['C18'] + $AllCell['C20'];
            $AllCell['C28'] = $operatingExpenses['yearly_operating_expenses'];
            $AllCell['C29'] = $AllCell['K2'];
            // $AllCell['C29'] = $operatingExpenses['yearly_operating_expenses'];
            // $AllCell['C33'] = $AllCell['C21'];
            $AllCell['C20'] = $AllCell['C16'] - $AllCell['C17'] + $AllCell['C19'];
            $AllCell['C32'] = $AllCell['C20'];
            $AllCell['C33'] = $AllCell['C28'];
            $AllCell['C34'] = $AllCell['C32'] - $AllCell['C33'];
            // $AllCell['C35'] = $AllCell['C33'] - $AllCell['C34'];
            $AllCell['C35'] = TotalEMI($MainProperty);
            // $AllCell['C35'] = 53750;
            $AllCell['C36'] = $AllCell['C34'] - $AllCell['C35'];
            $AllCell['C37'] = round($AllCell['C36'] * (100 - $AllCell['T2']) / 100);
            $AllCell['C38'] = $AllCell['C36'];

            $AllCell['C168']= $AllCell['C2'] * (100 + $AllCell['I2']) / 100;

            $AllCell['G14'] = $AllCell['O2'];
            $AllCell['marketValueProperty'] = marketValueProperty($MainProperty,$AllCell['C168'],$AllCell['I2']);
            $PropertyRefinanceLoans = App\Models\PropertyRefinance::where('property_id',$MainProperty->prop_id)->first();
            // dd($PropertyRefinanceLoans);
            if(!is_null($PropertyRefinanceLoans)){
                $AllCell['D14'] = $AllCell['marketValueProperty'][$PropertyRefinanceLoans?->refinance_after - 1] * 80 / 100;
            }else{
                $AllCell['D14'] = 0;
            }
            
            // $AllCell['H14'] = RefinanceTotalEMI($MainProperty) / 12;
            $AllCell['H14'] = RefinanceTotalEMI($MainProperty,$AllCell['D14']) / 12;
            // $AllCell['C187']= round($AllCell['C2'] * $AllCell['I2'] / 12);
            // for ($i = 0; $i < $loopCount; $i++){
            //     if ($i == 0){
            //         $prevItemAmount = $AllCell['C168'];
            //     }else{
            //         $prevItemAmount = round($prevItemAmount * (100 + $I2) / 100);
            //     }
            //     $marketValueProperty[] = $prevItemAmount;
            // }
            
            return $AllCell;
        }
    }

    if(!function_exists('marketValueProperty')){
        function marketValueProperty($MainProperty,$C168,$I2){
            $buyHoldProjection = App\Models\BuyHoldProjection::where('property_id',$MainProperty->prop_id)->first();
            for ($i=0; $i < 21; $i++) { 
                if ($i == 0){
                    $prevItemAmount = $C168; 
                    $marketValueProperty[] = $prevItemAmount;
                }else{
                    $prevItemAmount = round($prevItemAmount * (100 + $I2) / 100);
                    $marketValueProperty[] = $prevItemAmount;
               }

            }
            $marketValuePropertyJson = json_encode($marketValueProperty);
            App\Models\BuyHoldProjection::where('id',$buyHoldProjection?->id)->update([
                'market_value_property' => $marketValuePropertyJson
            ]);
            return $marketValueProperty;
        }
    }

    /* U2 */
    if(!function_exists('HoldingPeriod')){
        function HoldingPeriod($MainProperty){
            $toDate = Carbon\Carbon::parse($MainProperty->prop_dateOfBooking);
            $fromDate = Carbon\Carbon::parse($MainProperty->prop_dateOfPossession);
            $HoldingDurationMonths = $toDate->diffInMonths($fromDate);
            return $HoldingDurationMonths;
        }
    }

    /* C34 */
    if(!function_exists('NetOperatingIncome')){
        function NetOperatingIncome($MainProperty){
            /*
                H2 = 5.0%

                C17 = 30000 * 12
                C18 = C17 * H2
                C20 = 500 * 12

                C21 = (C17 - C18 + C20)

                C25 = 500 * 12 (Taxes)
                C26 = 700 * 12 (Utilies Charges)
                C27 = 200 * 12 (Maintenance Charges)
                C28 = 300 * 12 (Property Management)

                C29 = (C25 + C26 + C27 + C28)
                C33 = C21
                C34 = C29
                C35 = C33 - C34
            */
            $AllCell = AllCell($MainProperty);
            $C35 = $AllCell['C35'];
            return $C35;
        }
    }
    
    /* C35 */
    if(!function_exists('TotalEMI')){
        function TotalEMI($MainProperty){
            $PropertyLoans = App\Models\PropertyLoan::where('property_id',$MainProperty->prop_id)->first();
            $loanAmount = $MainProperty?->prop_purchasePrice * $PropertyLoans?->price_financing / 100;
            if($PropertyLoans?->upfront != 0){
                // $loanWithMortgageIns = ($totalAmount + round($totalAmount * $PropertyLoans?->upfront / 100));
                // $loanAmount += $loanWithMortgageIns;
                $loanAmount = ($loanAmount + round($loanAmount * $PropertyLoans?->upfront / 100));
            }
            $emi = EMIcalculate($loanAmount, $PropertyLoans?->interest_rate, $PropertyLoans?->loan_term);
            return $emi * 12;
            /*$TotalPurchaseCostsAmount = PurchaseCosts($MainProperty);
            $count = 0;
            $emi = array();
            foreach ($PropertyLoans as $value) {
                $totalAmount = $MainProperty->prop_purchasePrice * $value->price_financing / 100;
                $loanWithMortgageIns = ($totalAmount + round($totalAmount * $value->upfront / 100));
                if($count == 0){
                    $loanAmount = $loanWithMortgageIns + $TotalPurchaseCostsAmount;
                    $count++;
                }else{
                    $loanAmount = $loanWithMortgageIns;
                }
                $emi[] = EMIcalculate(3220000, $value->interest_rate, $value->loan_term);
            }
            $totalEMI = array_sum($emi);
            return $totalEMI * 12;*/
        }
    }

    if(!function_exists('RefinanceTotalEMI')){
        function RefinanceTotalEMI($MainProperty,$refinanceLoanAmount){
            $PropertyLoans = App\Models\PropertyRefinance::where('property_id',$MainProperty->prop_id)->first();
            $loanAmount = $refinanceLoanAmount * $PropertyLoans?->price_financing / 100;
            if($PropertyLoans?->upfront != 0){
                $loanAmount = ($loanAmount + round($loanAmount * $PropertyLoans?->upfront / 100));
            }
            $emi = EMIcalculate($refinanceLoanAmount, $PropertyLoans?->interest_rate, $PropertyLoans?->loan_term);
            return $emi * 12;
        }
    }

    /* C6 */
    if(!function_exists('CashFlow')){
        function CashFlow(){
            /*
               C37 = (C35-C36)
            */
            $C35 = NetOperatingIncome();
            $C36 = calculateEMI($principal, $annualInterestRate, $loanTermInMonths);
        }
    }

    function YearEndAccumulatedEquity($MainProperty){
        /*
            YearEndAccumulatedEquity = MarketValueOfProperty - LoanBalance
        */
        $MarketValueOfProperty = $MainProperty->prop_salePrice;
        $propertyLoans = PropertyLoans($MainProperty);
        $LoanBalance = $propertyLoans['loanTotalAmount'];

        $YearEndAccumulatedEquity = $MarketValueOfProperty - $LoanBalance;
        return $YearEndAccumulatedEquity;
    }

    /*function PrinciplePartDebtPaydown($rate, $per, $nper, $pv) {
        // Convert rate to monthly interest rate
        $monthlyRate = $rate / 12 / 100;
        
        // Calculate the payment per period (PMT)
        $pmt = $pv * ($monthlyRate / (1 - pow(1 + $monthlyRate, -$nper)));
        
        // Calculate the interest payment for the given period (per)
        $interestPayment = $pv * $monthlyRate * (pow(1 + $monthlyRate, $per - 1) - 1);
        
        // Calculate the principal payment for the given period (per)
        $principalPayment = $pmt - $interestPayment;
        
        return $principalPayment;
    }*/

    /*function calculatePMT($rate, $nper, $pv) {
        // Convert annual interest rate to monthly rate
        $monthlyRate = $rate / 12 / 100;
        // $monthlyRate = $rate / 12;
        
        // Calculate PMT (payment)
        $pmt = $pv * ($monthlyRate / (1 - pow(1 + $monthlyRate, -$nper)));
        
        return $pmt;
    }*/

    /* C168 */
    if(!function_exists('MarketValueProperty')){
        function MarketValueProperty($MainProperty){
            $AllCell = AllCell($MainProperty);
            $MV = $AllCell['C2'];
            $marketValue = $MV * (100 + $AllCell['I2']) / 100;
            return $marketValue;
        }
    }

    /*function TotalProfit(){
        
            
            C2 = Property Market Value
            C4 = Year count number
            F2 = BANK ROI
            L2 = SELLING COST
            N2 = TENURE
            M2 = LOAN AMOUNT
            I2 = APPRECIATION
            R2 = TOTAL SELF INVESTMENT

            C25 = -PPMT(F2,C4,N2,M2)
            C26 = C25
            C29 = C2 * (100% + I2)
            C31 = M2 - C26
            C33 = C29 - C31
            C35 = C33
            C36 = C29 * L2
            C37 = C35 - C36
            C38 = R2
            C39 = C37 - C38
            TotalProfit = C39
        
    } */

    if(!function_exists('ToolTipHtml')){
        function ToolTipHtml($tital,$description){
            $toolTipHTML = '<div class="con-tooltip top">
                <p class="icoo"><i class="fa fa-question"></i></p>
                <div class="tooltip">
                    <h5>'.$tital.'</h5>
                    <p>'.$description.'</p>
                </div>
            </div>';
            return $toolTipHTML;
        }
    }
    if(!function_exists('NewBankLoanDebts')){
        function NewBankLoanDebts($MainProperty,$G14,$F2,$Y2,$loopCount){
            $loanRefinance = App\Models\PropertyRefinance::where('property_id',$MainProperty->prop_id)->first();
            $buyHoldProjection = App\Models\BuyHoldProjection::where('property_id',$MainProperty->prop_id)->first();
            $loanBalanceAtTheMonth = $Y2;
            $AllCell = AllCell($MainProperty);
            $PrincipleOutstanding = $AllCell['H14'];
            $D14 = $AllCell['D14'];
            $afterRefinance = 0;
            // $AllCell = AllCell($MainProperty);
            // $G14 = $AllCell['G14'];
            // $F2 = $AllCell['F2'];
            // $Y2 = $AllCell['Y2'];
            // $loopCount = $AllCell['loopCount'];

            // =(M2*$F$2/12*  (1+$F$2/12)^($N$2*12)/((1+$F$2/12)^($N$2*12)-1))
            // =(D14*$E$14/12*(1+$E$14/12)^($F$14*12)/((1+$E$14/12)^($F$14*12)-1))

            $loanBalanceAtTheMonth = $Y2;
            $InterestPaidArray = array();
            $PrinciplePaidArray = array();
            $BalanceAtTheEndMonthArray = array();
            $NetBalanceAtTheEndMonthArray = array();
            $H14 = 0;
            $yearCount = 1;
            $index = 1;
            for ($i = 1; $i < 13; $i++) {
                if(!is_null($loanRefinance)){
                    $afterRefinanceCount = 12 * $loanRefinance->refinance_after;
                    if($afterRefinanceCount == $index){
                        if($afterRefinance == 0){
                            $afterRefinance = $D14;
                            $loanBalanceAtTheMonth = $D14;
                            $G14 = $PrincipleOutstanding;
                            // $marketValuePropertyJson = json_decode($buyHoldProjection->market_value_property);
                            // $refinanceLoanAmount = $marketValuePropertyJson[$i-1] * 80 / 100;
                            // $EMI = RefinanceTotalEMI($MainProperty,$refinanceLoanAmount) / 12;
                            // $loanBalanceAtTheMonth = $EMI;
                        }
                    }
                }
                $interestPaid = round(round($loanBalanceAtTheMonth * $F2 / 12) / 100);
                if($interestPaid > 0){
                    $InterestPaidArray[$index] = $interestPaid;
                }
                
                $principlePaid = $G14 - $interestPaid;
                if($principlePaid > 0){
                    $PrinciplePaidArray[$index] = $principlePaid;
                }

                $BalanceAtTheEndMonth = $loanBalanceAtTheMonth - $principlePaid;
                if($BalanceAtTheEndMonth > 0){
                    $BalanceAtTheEndMonthArray[$index] = $BalanceAtTheEndMonth;
                }

                $extraDebtPaydown = 0;
                $NetBalanceAtTheEndMonth = $BalanceAtTheEndMonth - $extraDebtPaydown;
                if($NetBalanceAtTheEndMonth > 0){
                    $NetBalanceAtTheEndMonthArray[$index] = $NetBalanceAtTheEndMonth;
                }

                $loanBalanceAtTheMonth = $NetBalanceAtTheEndMonth;
                if($interestPaid < 0){
                    $i = 13;
                }
                if($i == 12){
                    $i = 1;
                }
                $yearCount++;
                if($index == 240){
                    $i = 250;
                }
                $index++;
            }
            
            $totalInterestOfTheYear = array();
            $index = 0;
            for ($i=0; $i < count($InterestPaidArray) / 12 ; $i++) { 
                $totalInterestOfTheYear[] = array_sum(array_slice($InterestPaidArray, $index, 12));
                $index += 12;
            }
            $totalPrinciplePaidYear = array();
            $index = 0;
            
            for ($i=0; $i < count($PrinciplePaidArray) / 12 ; $i++) { 
                $totalPrinciplePaidYear[] = array_sum(array_slice($PrinciplePaidArray, $index, 12));
                $index += 12;
            }

            $totalYear = round(count($InterestPaidArray) / 12);
            $monthlyInterestPaid = array();
            $totalMonthlyInterestPaid = 0;
            $monthlyPrinciplePaid = array();
            $monthlyBalanceAtTheEndMonth = array();
            $monthlyNetBalanceAtTheEndMonth = array();
            $index = 1;
            for ($i=0; $i < $totalYear; $i++) {
                // ============================ INTEREST PAID ==================================
                    if(isset($InterestPaidArray[$index])){
                        $monthlyInterestPaid['1month'][] = $InterestPaidArray[$index];
                        $totalMonthlyInterestPaid = array_sum($monthlyInterestPaid['1month']);
                    }
                    if(isset($InterestPaidArray[$index+1])){
                        $monthlyInterestPaid['2month'][] = $InterestPaidArray[$index+1];
                    }
                    if(isset($InterestPaidArray[$index+2])){
                        $monthlyInterestPaid['3month'][] = $InterestPaidArray[$index+2];
                    }
                    if(isset($InterestPaidArray[$index+3])){
                        $monthlyInterestPaid['4month'][] = $InterestPaidArray[$index+3];
                    }
                    if(isset($InterestPaidArray[$index+4])){
                        $monthlyInterestPaid['5month'][] = $InterestPaidArray[$index+4];
                    }
                    if(isset($InterestPaidArray[$index+5])){
                        $monthlyInterestPaid['6month'][] = $InterestPaidArray[$index+5];
                    }
                    if(isset($InterestPaidArray[$index+6])){
                        $monthlyInterestPaid['7month'][] = $InterestPaidArray[$index+6];
                    }
                    if(isset($InterestPaidArray[$index+7])){
                        $monthlyInterestPaid['8month'][] = $InterestPaidArray[$index+7];
                    }
                    if(isset($InterestPaidArray[$index+8])){
                        $monthlyInterestPaid['9month'][] = $InterestPaidArray[$index+8];
                    }
                    if(isset($InterestPaidArray[$index+9])){
                        $monthlyInterestPaid['10month'][] = $InterestPaidArray[$index+9];
                    }
                    if(isset($InterestPaidArray[$index+10])){
                        $monthlyInterestPaid['11month'][] = $InterestPaidArray[$index+10];
                    }
                    if(isset($InterestPaidArray[$index+11])){
                        $monthlyInterestPaid['12month'][] = $InterestPaidArray[$index+11];
                    }
                // ============================ INTEREST PAID ==================================
                // ============================ PRINCIPLE PAID ==================================
                    if(isset($PrinciplePaidArray[$index])){
                        $monthlyPrinciplePaid['1month'][] = $PrinciplePaidArray[$index];
                    }
                    if(isset($PrinciplePaidArray[$index+1])){
                        $monthlyPrinciplePaid['2month'][] = $PrinciplePaidArray[$index+1];
                    }
                    if(isset($PrinciplePaidArray[$index+2])){
                        $monthlyPrinciplePaid['3month'][] = $PrinciplePaidArray[$index+2];
                    }
                    if(isset($PrinciplePaidArray[$index+3])){
                        $monthlyPrinciplePaid['4month'][] = $PrinciplePaidArray[$index+3];
                    }
                    if(isset($PrinciplePaidArray[$index+4])){
                        $monthlyPrinciplePaid['5month'][] = $PrinciplePaidArray[$index+4];
                    }
                    if(isset($PrinciplePaidArray[$index+5])){
                        $monthlyPrinciplePaid['6month'][] = $PrinciplePaidArray[$index+5];
                    }
                    if(isset($PrinciplePaidArray[$index+6])){
                        $monthlyPrinciplePaid['7month'][] = $PrinciplePaidArray[$index+6];
                    }
                    if(isset($PrinciplePaidArray[$index+7])){
                        $monthlyPrinciplePaid['8month'][] = $PrinciplePaidArray[$index+7];
                    }
                    if(isset($PrinciplePaidArray[$index+8])){
                        $monthlyPrinciplePaid['9month'][] = $PrinciplePaidArray[$index+8];
                    }
                    if(isset($PrinciplePaidArray[$index+9])){
                        $monthlyPrinciplePaid['10month'][] = $PrinciplePaidArray[$index+9];
                    }
                    if(isset($PrinciplePaidArray[$index+10])){
                        $monthlyPrinciplePaid['11month'][] = $PrinciplePaidArray[$index+10];
                    }
                    if(isset($PrinciplePaidArray[$index+11])){
                        $monthlyPrinciplePaid['12month'][] = $PrinciplePaidArray[$index+11];
                    }
                // ============================ PRINCIPLE PAID ==================================
                // ============================ BALANCE AT THE END MONTH ==================================
                    if(isset($BalanceAtTheEndMonthArray[$index])){
                        $monthlyBalanceAtTheEndMonth['1month'][] = $BalanceAtTheEndMonthArray[$index];
                    }
                    if(isset($BalanceAtTheEndMonthArray[$index+1])){
                        $monthlyBalanceAtTheEndMonth['2month'][] = $BalanceAtTheEndMonthArray[$index+1];
                    }
                    if(isset($BalanceAtTheEndMonthArray[$index+2])){
                        $monthlyBalanceAtTheEndMonth['3month'][] = $BalanceAtTheEndMonthArray[$index+2];
                    }
                    if(isset($BalanceAtTheEndMonthArray[$index+3])){
                        $monthlyBalanceAtTheEndMonth['4month'][] = $BalanceAtTheEndMonthArray[$index+3];
                    }
                    if(isset($BalanceAtTheEndMonthArray[$index+4])){
                        $monthlyBalanceAtTheEndMonth['5month'][] = $BalanceAtTheEndMonthArray[$index+4];
                    }
                    if(isset($BalanceAtTheEndMonthArray[$index+5])){
                        $monthlyBalanceAtTheEndMonth['6month'][] = $BalanceAtTheEndMonthArray[$index+5];
                    }
                    if(isset($BalanceAtTheEndMonthArray[$index+6])){
                        $monthlyBalanceAtTheEndMonth['7month'][] = $BalanceAtTheEndMonthArray[$index+6];
                    }
                    if(isset($BalanceAtTheEndMonthArray[$index+7])){
                        $monthlyBalanceAtTheEndMonth['8month'][] = $BalanceAtTheEndMonthArray[$index+7];
                    }
                    if(isset($BalanceAtTheEndMonthArray[$index+8])){
                        $monthlyBalanceAtTheEndMonth['9month'][] = $BalanceAtTheEndMonthArray[$index+8];
                    }
                    if(isset($BalanceAtTheEndMonthArray[$index+9])){
                        $monthlyBalanceAtTheEndMonth['10month'][] = $BalanceAtTheEndMonthArray[$index+9];
                    }
                    if(isset($BalanceAtTheEndMonthArray[$index+10])){
                        $monthlyBalanceAtTheEndMonth['11month'][] = $BalanceAtTheEndMonthArray[$index+10];
                    }
                    if(isset($BalanceAtTheEndMonthArray[$index+11])){
                        $monthlyBalanceAtTheEndMonth['12month'][] = $BalanceAtTheEndMonthArray[$index+11];
                    }
                // ============================ BALANCE AT THE END MONTH ==================================
                // ============================ NET BALANCE AT THE END MONTH ==================================
                    if(isset($NetBalanceAtTheEndMonthArray[$index])){
                        $monthlyNetBalanceAtTheEndMonth['1month'][] = $NetBalanceAtTheEndMonthArray[$index];
                    }
                    if(isset($NetBalanceAtTheEndMonthArray[$index+1])){
                        $monthlyNetBalanceAtTheEndMonth['2month'][] = $NetBalanceAtTheEndMonthArray[$index+1];
                    }
                    if(isset($NetBalanceAtTheEndMonthArray[$index+2])){
                        $monthlyNetBalanceAtTheEndMonth['3month'][] = $NetBalanceAtTheEndMonthArray[$index+2];
                    }
                    if(isset($NetBalanceAtTheEndMonthArray[$index+3])){
                        $monthlyNetBalanceAtTheEndMonth['4month'][] = $NetBalanceAtTheEndMonthArray[$index+3];
                    }
                    if(isset($NetBalanceAtTheEndMonthArray[$index+4])){
                        $monthlyNetBalanceAtTheEndMonth['5month'][] = $NetBalanceAtTheEndMonthArray[$index+4];
                    }
                    if(isset($NetBalanceAtTheEndMonthArray[$index+5])){
                        $monthlyNetBalanceAtTheEndMonth['6month'][] = $NetBalanceAtTheEndMonthArray[$index+5];
                    }
                    if(isset($NetBalanceAtTheEndMonthArray[$index+6])){
                        $monthlyNetBalanceAtTheEndMonth['7month'][] = $NetBalanceAtTheEndMonthArray[$index+6];
                    }
                    if(isset($NetBalanceAtTheEndMonthArray[$index+7])){
                        $monthlyNetBalanceAtTheEndMonth['8month'][] = $NetBalanceAtTheEndMonthArray[$index+7];
                    }
                    if(isset($NetBalanceAtTheEndMonthArray[$index+8])){
                        $monthlyNetBalanceAtTheEndMonth['9month'][] = $NetBalanceAtTheEndMonthArray[$index+8];
                    }
                    if(isset($NetBalanceAtTheEndMonthArray[$index+9])){
                        $monthlyNetBalanceAtTheEndMonth['10month'][] = $NetBalanceAtTheEndMonthArray[$index+9];
                    }
                    if(isset($NetBalanceAtTheEndMonthArray[$index+10])){
                        $monthlyNetBalanceAtTheEndMonth['11month'][] = $NetBalanceAtTheEndMonthArray[$index+10];
                    }
                    if(isset($NetBalanceAtTheEndMonthArray[$index+11])){
                        $monthlyNetBalanceAtTheEndMonth['12month'][] = $NetBalanceAtTheEndMonthArray[$index+11];
                    }
                // ============================ NET BALANCE AT THE END MONTH ==================================                
                $index = $index + 12;
            }
            /*$index = 1;
            for ($i=0; $i < $totalYear; $i++) { 
                if(isset($PrinciplePaidArray[$index])){
                    $monthlyPrinciplePaid['1month'][] = $PrinciplePaidArray[$index];
                }
                if(isset($PrinciplePaidArray[$index+1])){
                    $monthlyPrinciplePaid['2month'][] = $PrinciplePaidArray[$index+1];
                }
                if(isset($PrinciplePaidArray[$index+2])){
                    $monthlyPrinciplePaid['3month'][] = $PrinciplePaidArray[$index+2];
                }
                if(isset($PrinciplePaidArray[$index+3])){
                    $monthlyPrinciplePaid['4month'][] = $PrinciplePaidArray[$index+3];
                }
                if(isset($PrinciplePaidArray[$index+4])){
                    $monthlyPrinciplePaid['5month'][] = $PrinciplePaidArray[$index+4];
                }
                if(isset($PrinciplePaidArray[$index+5])){
                    $monthlyPrinciplePaid['6month'][] = $PrinciplePaidArray[$index+5];
                }
                if(isset($PrinciplePaidArray[$index+6])){
                    $monthlyPrinciplePaid['7month'][] = $PrinciplePaidArray[$index+6];
                }
                if(isset($PrinciplePaidArray[$index+7])){
                    $monthlyPrinciplePaid['8month'][] = $PrinciplePaidArray[$index+7];
                }
                if(isset($PrinciplePaidArray[$index+8])){
                    $monthlyPrinciplePaid['9month'][] = $PrinciplePaidArray[$index+8];
                }
                if(isset($PrinciplePaidArray[$index+9])){
                    $monthlyPrinciplePaid['10month'][] = $PrinciplePaidArray[$index+9];
                }
                if(isset($PrinciplePaidArray[$index+10])){
                    $monthlyPrinciplePaid['11month'][] = $PrinciplePaidArray[$index+10];
                }
                if(isset($PrinciplePaidArray[$index+11])){
                    $monthlyPrinciplePaid['12month'][] = $PrinciplePaidArray[$index+11];
                }
                $index = $index + 12;
            }
            $index = 1;
            for ($i=0; $i < $totalYear; $i++) { 
                if(isset($BalanceAtTheEndMonthArray[$index])){
                    $monthlyBalanceAtTheEndMonth['1month'][] = $BalanceAtTheEndMonthArray[$index];
                }
                if(isset($BalanceAtTheEndMonthArray[$index+1])){
                    $monthlyBalanceAtTheEndMonth['2month'][] = $BalanceAtTheEndMonthArray[$index+1];
                }
                if(isset($BalanceAtTheEndMonthArray[$index+2])){
                    $monthlyBalanceAtTheEndMonth['3month'][] = $BalanceAtTheEndMonthArray[$index+2];
                }
                if(isset($BalanceAtTheEndMonthArray[$index+3])){
                    $monthlyBalanceAtTheEndMonth['4month'][] = $BalanceAtTheEndMonthArray[$index+3];
                }
                if(isset($BalanceAtTheEndMonthArray[$index+4])){
                    $monthlyBalanceAtTheEndMonth['5month'][] = $BalanceAtTheEndMonthArray[$index+4];
                }
                if(isset($BalanceAtTheEndMonthArray[$index+5])){
                    $monthlyBalanceAtTheEndMonth['6month'][] = $BalanceAtTheEndMonthArray[$index+5];
                }
                if(isset($BalanceAtTheEndMonthArray[$index+6])){
                    $monthlyBalanceAtTheEndMonth['7month'][] = $BalanceAtTheEndMonthArray[$index+6];
                }
                if(isset($BalanceAtTheEndMonthArray[$index+7])){
                    $monthlyBalanceAtTheEndMonth['8month'][] = $BalanceAtTheEndMonthArray[$index+7];
                }
                if(isset($BalanceAtTheEndMonthArray[$index+8])){
                    $monthlyBalanceAtTheEndMonth['9month'][] = $BalanceAtTheEndMonthArray[$index+8];
                }
                if(isset($BalanceAtTheEndMonthArray[$index+9])){
                    $monthlyBalanceAtTheEndMonth['10month'][] = $BalanceAtTheEndMonthArray[$index+9];
                }
                if(isset($BalanceAtTheEndMonthArray[$index+10])){
                    $monthlyBalanceAtTheEndMonth['11month'][] = $BalanceAtTheEndMonthArray[$index+10];
                }
                if(isset($BalanceAtTheEndMonthArray[$index+11])){
                    $monthlyBalanceAtTheEndMonth['12month'][] = $BalanceAtTheEndMonthArray[$index+11];
                }
                $index = $index + 12;
            }
            $index = 1;
            for ($i=0; $i < $totalYear; $i++) { 
                if(isset($NetBalanceAtTheEndMonthArray[$index])){
                    $monthlyNetBalanceAtTheEndMonth['1month'][] = $NetBalanceAtTheEndMonthArray[$index];
                }
                if(isset($NetBalanceAtTheEndMonthArray[$index+1])){
                    $monthlyNetBalanceAtTheEndMonth['2month'][] = $NetBalanceAtTheEndMonthArray[$index+1];
                }
                if(isset($NetBalanceAtTheEndMonthArray[$index+2])){
                    $monthlyNetBalanceAtTheEndMonth['3month'][] = $NetBalanceAtTheEndMonthArray[$index+2];
                }
                if(isset($NetBalanceAtTheEndMonthArray[$index+3])){
                    $monthlyNetBalanceAtTheEndMonth['4month'][] = $NetBalanceAtTheEndMonthArray[$index+3];
                }
                if(isset($NetBalanceAtTheEndMonthArray[$index+4])){
                    $monthlyNetBalanceAtTheEndMonth['5month'][] = $NetBalanceAtTheEndMonthArray[$index+4];
                }
                if(isset($NetBalanceAtTheEndMonthArray[$index+5])){
                    $monthlyNetBalanceAtTheEndMonth['6month'][] = $NetBalanceAtTheEndMonthArray[$index+5];
                }
                if(isset($NetBalanceAtTheEndMonthArray[$index+6])){
                    $monthlyNetBalanceAtTheEndMonth['7month'][] = $NetBalanceAtTheEndMonthArray[$index+6];
                }
                if(isset($NetBalanceAtTheEndMonthArray[$index+7])){
                    $monthlyNetBalanceAtTheEndMonth['8month'][] = $NetBalanceAtTheEndMonthArray[$index+7];
                }
                if(isset($NetBalanceAtTheEndMonthArray[$index+8])){
                    $monthlyNetBalanceAtTheEndMonth['9month'][] = $NetBalanceAtTheEndMonthArray[$index+8];
                }
                if(isset($NetBalanceAtTheEndMonthArray[$index+9])){
                    $monthlyNetBalanceAtTheEndMonth['10month'][] = $NetBalanceAtTheEndMonthArray[$index+9];
                }
                if(isset($NetBalanceAtTheEndMonthArray[$index+10])){
                    $monthlyNetBalanceAtTheEndMonth['11month'][] = $NetBalanceAtTheEndMonthArray[$index+10];
                }
                if(isset($NetBalanceAtTheEndMonthArray[$index+11])){
                    $monthlyNetBalanceAtTheEndMonth['12month'][] = $NetBalanceAtTheEndMonthArray[$index+11];
                }
                $index = $index + 12;
            }*/
            
            $output = array(
                'InterestPaid'              => $monthlyInterestPaid,
                'PrinciplePaid'             => $monthlyPrinciplePaid,
                'BalanceAtTheEndMonth'      => $monthlyBalanceAtTheEndMonth,
                'NetBalanceAtTheEndMonth'   => $monthlyNetBalanceAtTheEndMonth,
                'totalInterestOfTheYear'    => $totalInterestOfTheYear,
                'totalPrinciplePaidYear'    => $totalPrinciplePaidYear
            );
            return $output;
        }
    }   
    
    if(!function_exists('EquityAccumulationsMarketValueProperty')){
        function EquityAccumulationsMarketValueProperty($C168,$I2,$NetBalanceAtTheEndMonth){
            $marketValueProperty = array();
            $YearEndAccumulatedEquity = array();
            for ($i = 0; $i < 20; $i++){
                if ($i == 0){
                    $prevItemAmount = $C168;                    
                }else{
                    $prevItemAmount = round($prevItemAmount * (100 + $I2) / 100);
                }
                if(isset($NetBalanceAtTheEndMonth[$i])){
                    $YearEndAccumulatedEquity[] = $prevItemAmount - $NetBalanceAtTheEndMonth[$i];
                }
                $marketValueProperty[] = $prevItemAmount;
            }
            $output = array(
                'marketValueProperty'   => $marketValueProperty,
                'YearEndAccumulatedEquity'=> $YearEndAccumulatedEquity,
            );
            return $output;
        }
    }