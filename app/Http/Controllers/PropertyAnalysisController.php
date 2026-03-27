<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;
use Auth;
use App\Models\Property;
use App\Models\MainProperty;
use App\Models\PropertyAddress;
use App\Models\PropertyDescription;
use App\Models\ItemPaidAmount;
use App\Models\ItemPurchaseCost;
use App\Models\PropertyLoan;
use App\Models\itemExtraCharge;
use App\Models\ItemOtherIncome;
use App\Models\ItemVacantRate;
use App\Models\ItemOperativeExpense;
use App\Models\PropertyRefinance;
use App\Models\ItemRefinanceCost;
use App\Models\UserTag;
use App\Models\itemImprovementCost;
use App\Models\itemHoldingCost;
use App\Models\itemSellingCost;
use App\Models\itemConvDeed;
use App\Models\ItemServicesMisclaniousCost;
use App\Models\MasterCritria;


class PropertyAnalysisController extends Controller
{
    function __construct()
    {
        $this->currency= '₹';
        $this->authid = Auth::id();
    }
    public function propertyAnalysis($category, $propertyID)
    {
        $type = $category;
        $propertyID = base64_decode($propertyID);
        $property_list_query = MainProperty::leftjoin('property_description','property_description.prop_id','main_properties.prop_id')
                            ->leftjoin('property_address','property_address.prop_id','main_properties.prop_id')
                            ->leftjoin('rk_cities','property_address.prop_city','rk_cities.id')
                            ->leftjoin('rk_states','property_address.prop_state','rk_states.id')
                            ->select('main_properties.*','property_description.desc_category_type','property_address.prop_street','rk_cities.name as prop_add_city','rk_states.name as prop_add_state','property_address.prop_zip','property_description.desc_lot','property_address.prop_unitno','desc_year','desc_parking')
                            ->where('user_id',Auth::id())
                            ->where('main_properties.prop_id',$propertyID);
        $property_list = $property_list_query->first();
        // dd($property_list);
        $propConvDeedPercent = $property_list->prop_ConvDeedPercent;

        $loanAmount = 0;
        $property_loan_query = PropertyLoan::where('property_id',$propertyID)->get();
        if(count($property_loan_query)){
            foreach($property_loan_query as $listloan){
                $loanAmount+= $property_list->prop_purchasePrice ? ($property_list->prop_purchasePrice * $listloan->price_financing / 100) : 0;
            }
        }
        $EMICosts = $this->getEMICosts($property_list,$property_loan_query);
        $EMICostsSum = 0;
        for ($i=0; $i < count($EMICosts); $i++) {
            $EMICostsSum += (int)$EMICosts[$i];
        }
        $vacancy_rate_amount  = $property_list->vacancy_rate * $property_list->grossrent/100;
        $operating_income = $property_list->grossrent - $vacancy_rate_amount;
        $net_operating_income = $operating_income - $property_list->operating_expense_price;

        $Expdata1 = array(
            'cash_needed' => $property_list->prop_purchasePrice - $loanAmount,
            'net_operating_income' => $net_operating_income,
            'loanAmount' => $loanAmount,
            'laon_payment' => $loanAmount / 12,
            'cash_flow' => $net_operating_income - ($loanAmount / 12),
            'vacancy_rate_amount' => $vacancy_rate_amount,
            'operating_income' => $operating_income,
            'cap_rate_pr' => '',
            'cap_rate_mr' => '',
            'cash_on_cash_return' => '',
            'return_on_equity' => '',
            'return_on_investment' => '',
            'internal_rate_of_return' => '',
            'rent_of_value' => ''
        );

        $ItemImprovementCost = ItemImprovementCost::where('prop_id', '=', $propertyID)->get();
        $FullImprovementCost = ItemImprovementCost::where('prop_id', '=', $propertyID)->sum('paid_amount');
        $ItemItemHoldingCost = ItemHoldingCost::where('prop_id', '=', $propertyID)->get();
        $FullItemHoldingCost = ItemHoldingCost::where('prop_id', '=', $propertyID)->sum('paid_amount');
        $PropertyLoan = PropertyLoan::where('property_id', '=', $propertyID)->get();
        $Expdata1['cash_needed'] =  $Expdata1['cash_needed'] + $FullImprovementCost + $FullItemHoldingCost;

        // $itemPaidAmount = $this->getPaidAmountCosts($property_list);
        // $itemConvDeedAmount = $this->getitemConvDeed($property_list);
        $itemHoldingCostAmount = $this->getItemHoldingCost($property_list);
        $itemExtraCharge = itemExtraCharge::where('prop_id',$propertyID)->get();
        $itemImprovementCost = itemImprovementCost::where('prop_id',$propertyID)->get();
        $itemHoldingCost = itemHoldingCost::where('prop_id',$propertyID)->get();
        $itemOperativeExpense = ItemOperativeExpense::where('prop_id',$propertyID)->get();
        $itemServicesMisclaniousCost = ItemServicesMisclaniousCost::where('prop_id',$propertyID)->get();
        // dd($itemServicesMisclaniousCost);
        $itemPaid = ItemPaidAmount::where('prop_id',$propertyID)->get();

        $purchaseCriterias = MasterCritria::where('type','Purchase Criterias')->get();
        $valuationCriterias = MasterCritria::where('type','Valuation Criterias')->get();
        $cashFlowCriterias = MasterCritria::where('type','Cash Flow Criterias')->get();
        $investmentReturnCriterias = MasterCritria::where('type','Investment Return Criterias')->get();
        $financialRatiosCriterias = MasterCritria::where('type','Financial Ratios Criterias')->get();
        $criteriasData = array(
            'purchaseCriterias'         => $purchaseCriterias,
            'valuationCriterias'        => $valuationCriterias,
            'cashFlowCriterias'         => $cashFlowCriterias,
            'investmentReturnCriterias' => $investmentReturnCriterias,
            'financialRatiosCriterias'  => $financialRatiosCriterias
        );
        // dd($purchaseCriterias,$valuationCriterias,$cashFlowCriterias,$investmentReturnCriterias,$financialRatiosCriterias);

        return view('dashboard.property-analysis')->with(
            ['propertyID' => $propertyID,
            'Expdata1' => $Expdata1,
            'type' => $type,
            'MainProperty'=> $property_list,
            // 'FullImprovementCost'=> $FullImprovementCost,
            'ItemImprovementCost'=>$ItemImprovementCost,
            'ItemItemHoldingCost'=> $ItemItemHoldingCost,
            'FullItemHoldingCost'=>$FullItemHoldingCost,
            'PropertyLoan'=>$PropertyLoan,
            'EMICosts'      => $EMICosts,
            'EMICostsSum'   => $EMICostsSum,
            // 'itemExtraChargeSum' => $itemExtraChargeSum,
            'itemExtraCharge'=> $itemExtraCharge,
            // 'itemPaidAmount'    => $itemPaidAmount,
            // 'itemConvDeedAmount'=> $itemConvDeedAmount,
            'itemHoldingCostAmount'=>$itemHoldingCostAmount,
            'itemExtraCharge'    => $itemExtraCharge,
            'itemImprovementCost' => $itemImprovementCost,
            'itemHoldingCost'   => $itemHoldingCost,
            'itemOperativeExpense'=> $itemOperativeExpense,
            'itemServicesMisclaniousCost' => $itemServicesMisclaniousCost,
            'itemPaid'    => $itemPaid,
            'criteriasData'=> $criteriasData
        ]);

    }

    private function getEMICosts($propertyList,$loans){
        $loanAmount = 0;
        $EMIArray = array();
        if(!is_null($loans)){
            foreach($loans as $listloan){
                $loanAmount = $propertyList->prop_purchasePrice ? ($propertyList->prop_purchasePrice * $listloan->price_financing / 100) : 0;
                if($listloan->financingof == 'Purchase Price'){
                    $loanAmount = $propertyList->prop_purchasePrice ? ($propertyList->prop_purchasePrice * $listloan->price_financing / 100) : 0;
                }elseif($listloan->financingof == 'Improvement Cost'){
                    $loanAmount = $propertyList->prop_purchasePrice ? ($propertyList->prop_purchasePrice * $propertyList->prop_improvementCostPercent / 100) : 0;
                }elseif($listloan->financingof == 'Price and Improvement Cost'){
                    $itemPurchaseCost = ItemPurchaseCost::where('prop_id',$propertyList->prop_id)->first();
                    // dd($itemPurchaseCost,$propertyList->prop_id);
                    if(!is_null($itemPurchaseCost)){
                        // dd($itemPurchaseCost->paid_amount);
                        $loanAmount = $itemPurchaseCost->paid_amount ? ($itemPurchaseCost->paid_amount * $propertyList->price_financing / 100) : 0;
                    }else{
                        $loanAmount = $propertyList->prop_purchasePrice ? ($propertyList->prop_purchasePrice * $propertyList->price_financing / 100) : 0;
                    }
                    // dd($loanAmount);
                }elseif($listloan->financingof == 'Basic Sale Price'){
                    // prop_sellingCostPercent
                    $itemSellingCost = itemSellingCost::where('prop_id',$propertyList->prop_id)->first();
                    if(!is_null($itemSellingCost)){
                        $loanAmount = $itemSellingCost->paid_amount ? ($itemSellingCost->paid_amount * $propertyList->price_financing / 100) : 0;
                    }
                    $loanAmount = $propertyList->prop_purchasePrice ? ($propertyList->prop_purchasePrice * $listloan->price_financing / 100) : 0;
                }

                $interestRatePerMonth = $listloan->interest_rate;
                $loanTimePeriodInYear = $listloan->loan_term;

                // one month interest
                $p = $loanAmount;
                $r = $interestRatePerMonth / (12 * 100);

                // one month period
                $t = $loanTimePeriodInYear * 12;

                $emi = ($p * $r * pow(1 + $r, $t)) / (pow(1 + $r, $t) - 1);
                $emi = number_format($emi, 0, '.');
                $emi = str_replace(',', '', $emi);
                $EMIArray[] = $emi;
            }
        }
        return $EMIArray;
    }
    private function getItemHoldingCost($propertyList){
        $itemHoldingCost = itemHoldingCost::where('prop_id',$propertyList->prop_id)->get();
        $itemHoldingAmount = 0;
        foreach($itemHoldingCost as $item){
            if($item->paid_type == 'amount'){
                $itemHoldingAmount += $item->paid_amount;
            }else{
                if($item->paid_percentOf == 'price'){
                    $itemHoldingAmount += $item->paid_amount * $propertyList->prop_purchasePrice / 100;
                }
                else{
                    $itemHoldingAmount += $item->paid_amount * 0 / 100; // todo loan amount update
                }
            }
        }
        return $itemHoldingAmount;
    }

}