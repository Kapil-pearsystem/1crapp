<?php
if(!function_exists('loanRepayment')){
    function loanRepayment($principal, $annualInterestRate, $loanTermYears) {
        // Convert annual interest rate to monthly rate
        $monthlyInterestRate = $annualInterestRate / 12 / 100;
    
        // Convert loan term years to months
        $loanTermMonths = $loanTermYears * 12;
    
        // Calculate the monthly payment
        $monthlyPayment = $monthlyInterestRate * $principal / (1 - pow(1 + $monthlyInterestRate, -$loanTermMonths));
        $monthlyPayment = round($monthlyPayment);
        return $monthlyPayment;
    }
}

if(!function_exists('loanBalance')){
    function loanBalance($principal, $annualInterestRate, $numberOfPaymentsMade, $totalNumberOfPayments) {
        try {
            // Convert annual interest rate to monthly rate
            $monthlyInterestRate = $annualInterestRate / 12 / 100;
            // Calculate the balance
            $balance = $principal * ((pow(1 + $monthlyInterestRate, $totalNumberOfPayments) - pow(1 + $monthlyInterestRate, $numberOfPaymentsMade)) / (pow(1 + $monthlyInterestRate, $totalNumberOfPayments) - 1));            
            $balance = round($balance);
            return $balance;
        } catch (\Throwable $th) {
            return 0;
        }
    }
}

if(!function_exists('calculateMonthlyInterest')){
    function calculateMonthlyInterest($remainingPrincipal, $annualInterestRate) {
        // Convert annual interest rate to monthly rate
        $monthlyInterestRate = $annualInterestRate / 12 / 100;

        // Calculate monthly interest
        $monthlyInterest = $remainingPrincipal * $monthlyInterestRate;

        return $monthlyInterest;
    }
}

if (!function_exists('EMIcalculate')) {
    function EMIcalculate($principal, $annualInterestRate, $loanTermInYears)
    {
        try{
            $interestRate = $annualInterestRate / 12 / 100;
            $numberOfPayments = $loanTermInYears * 12;
            // $numerator = $principal * $interestRate * pow(1 + $interestRate, $numberOfPayments);
            // $denominator = pow(1 + $interestRate, $numberOfPayments) - 1;

            $pmt = $principal * $interestRate / (1 - pow(1 + $interestRate, -$numberOfPayments));
            // $pmt = $principal * $monthlyInterestRate / (1 - pow(1 + $monthlyInterestRate, -$totalNumberOfPayments));

            // $emi = $numerator / $denominator;
            $emi = round($pmt);
            return $emi;
        }catch (\Throwable $th) {
            return 0;
        }
    }
}

if (!function_exists('calculateEMI')) {
    function calculateEMI($principal, $annualInterestRate, $loanTermInMonths){
        $monthlyInterestRate = $annualInterestRate / 12 / 100; // Convert annual interest rate to monthly rate
        $numerator = $principal * $monthlyInterestRate * pow(1 + $monthlyInterestRate, $loanTermInMonths);
        $denominator = pow(1 + $monthlyInterestRate, $loanTermInMonths) - 1;
        $emi = $numerator / $denominator;
        $emi = (int)$emi;
        return $emi;
    }
}

if (!function_exists('calculatePrincipalPart')) {
    function calculatePrincipalPart($principal, $annualInterestRate, $loanTermInYears){
        // Calculate monthly interest rate
        $monthlyInterestRate = $annualInterestRate / 12 / 100;
        // Calculate number of months in one year
        $numberOfMonths = $loanTermInYears * 12;

        // Calculate total payment for the year using EMI formula
        $totalPaymentForYear = $principal * $monthlyInterestRate * pow(1 + $monthlyInterestRate, $numberOfMonths) / (pow(1 + $monthlyInterestRate, $numberOfMonths) - 1);

        // Calculate total interest paid for the year
        $totalInterestPaidForYear = $totalPaymentForYear * $numberOfMonths - $principal;

        // Calculate principal part of EMI for one year
        $principalPartOfEMI = $totalPaymentForYear - $totalInterestPaidForYear;

        return number_format($principalPartOfEMI, 2);
    }
}