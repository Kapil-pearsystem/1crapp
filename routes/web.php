<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\LoginWithoutPasswordController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\PropertyEditController;
use App\Http\Controllers\BuyHoldProjectionController;
use App\Http\Controllers\SalesCompsARVEstimatesController;
use App\Http\Controllers\RentalComparablesRentController;
use App\Http\Controllers\PropertyCompareController;
use App\Http\Controllers\ResourceController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PropertyAnalysisController;
use App\Http\Controllers\SummaryController;
use App\Http\Controllers\UpdatePropertyController;
use App\Http\Controllers\WebController;
use App\Http\Controllers\PropertyMarketController;
use App\Http\Controllers\PntController;
use App\Http\Controllers\PbmController;
use App\Http\Controllers\CdbFeaturesController;
use App\Models\BannerModel;
use App\Models\ServiceCategoryModel;
use App\Models\ServiceModel;
use App\Models\TestimonialsModel;
use App\Models\OurClientsModel;
use App\Models\QuicklyAnalyzeModel;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
/*Route::get('/', function () {
    return view('front.login');
});*/
Route::get('/', [WebController::class, 'index']);
Route::get('/features', [WebController::class, 'features'])->name('features');
Route::get('/about-us', [WebController::class, 'about_us'])->name('about-us');
Route::get('/faq', [WebController::class, 'faq'])->name('faq');
Route::get('/help', [WebController::class, 'help'])->name('help');
Route::get('/resources-tools', [WebController::class, 'resources_tools'])->name('resources-tools');
// Route::get('/investors', [WebController::class, 'investors'])->name('investors');
// Route::get('/realtors', [WebController::class, 'realtors'])->name('realtors');

Route::get('/market-place-list', [PropertyMarketController::class, 'market_place_list'])->name('market-place-list');
Route::post('/market-place-data', [PropertyMarketController::class, 'market_place_data'])->name('market-place-data');
Route::post('/market-place-popup-data', [PropertyMarketController::class, 'market_place_popup_data'])->name('market-place-popup-data');
Route::get('/meet-team', [WebController::class, 'meet_team'])->name('meet-team');
Route::post('/save-property-enquiry', [PropertyMarketController::class, 'save_property_enquiry'])->name('save-property-enquiry');

Route::get('/404', function () { return view('404'); })->name('404');

// Route::get('/market-place-list', function () {
//     return view('front.market-place-list');
// });
// Route::get('/buy-hold-projection', function () {
//     return view('front.buy-hold-projection');
// });

// Route::get('/careers', function () {
//     return view('front.careers');
// });
Route::get('/join-the-team', function () {
    return view('front.join-the-team');
});

Route::get('/how-it-works', [WebController::class,'how_it_works'])->name('how-it-works');

// Route::get('/inspired-by', function () {
//     return view('front.inspired-by');
// });
Route::get('/contact-us', function () {
    return view('front.contact-us');
});
Route::get('/testimonials', function () {
    return view('front.testimonials');
});
Route::get('/company', function () {
    return view('front.company');
});
Route::get('/plp-select-realtors', function () {
    return view('front.plp-select-realtors');
});
Route::get('/plp-introduction', function () {
    return view('front.plp-introduction');
});
Route::get('/plp-script', function () {
    return view('front.plp-script');
});
Route::get('/plp-submitted', function () {
    return view('front.plp-submitted');
});
Route::get('/media', function () {
    return view('front.media');
});


Route::get('/landing-page', function () {
    return view('front.landing-page');
});
Route::get('/join-as-affiliate', function () {
    return view('front.join-as-affiliate');
});
Route::post('/join-as-affiliate/save', [WebController::class, 'saveAffiliateEnquiry'])->name('affiliate.save');
Route::get('/thank-you-affiliates', function () {
    return view('front.thank-you-affiliates');
});
Route::get('/opt-in-page', function () {
    return view('front.opt-in-page');
});
Route::get('/aa-page', function () {
    return view('front.aa-page');
});
Route::get('/calendar-booking', function () {
    return view('front.calendar-booking');
});
Route::get('/call-booking-homework', function () {
    return view('front.call-booking-homework');
});
Route::get('/calendar-booking-typ', function () {
    return view('front.calendar-booking-typ');
});
Route::get('/partners-program-realtors', function () {
    return view('front.partners-program-realtors');
});

Route::get('/bs-termsheet', function () {
    return view('front.bs-termsheet');
});
Route::get('/gift-list', function () {
    return view('front.gift-list');
});
Route::get('/add-personal', function () {
    return view('front.add-personal');
});
Route::get('/business-card', function () {
    return view('front.business-card');
});
Route::get('/business-card-new', function () {
    return view('front.business-card-new');
});
Route::get('/thank-you-card', function () {
    return view('front.thank-you-card');
});
Route::get('/form-design', function () {
    return view('front.form-design');
});
Route::get('/testimonials-campaign', function () {
    return view('front.testimonials-campaign');
});
Route::get('/testimonials-campaign-list', function () {
    return view('front.testimonials-campaign-list');
});
Route::get('/creaed-campaigns-list', function () {
    return view('front.creaed-campaigns-list');
});
Route::get('/testimonials-write', function () {
    return view('front.testimonials-write');
});
Route::get('/1crapp-feedback', function () {
    return view('front.1crapp-feedback');
});
Route::post('/1crapp-feedback', [WebController::class, 'submitForm'])->name('feedback.submit');
Route::get('/start-sequence', function () {
    return view('front.start-sequence');
});
Route::get('/create-sequence', function () {
    return view('front.create-sequence');
});
Route::get('/sequence-list', function () {
    return view('front.sequence-list');
});
Route::get('/campaigns-list', function () {
    return view('front.campaigns-list');
});
Route::get('/camping-report', function (){ 
    return view('front.camping-report');
});
Route::get('/sequence-details', function () {
    return view('front.sequence-details');
});
Route::get('/contact-list', function () {
    return view('front.contact-list');
});
Route::get('/contact-list-create', function () {
    return view('front.contact-list-create');
});
Route::get('/lead-magnet1', function () {
    return view('front.lead-magnet1');
});
Route::post('/lead-magnet1/store', [WebController::class, 'lead_magenet1'])->name('leadstore');

Route::get('/personal-financial-freedom-journey', function () {
    return view('front.personal-financial-freedom-journey');
});




Route::get('/personal-money-path', function () {
    return view('front.personal-money-path');
});
Route::get('/cdb-features', [CdbFeaturesController::class, 'index'])->name('cdb-features');


// pbm
Route::group(['middleware' => 'auth'], function () {
    Route::get('/pbm', [PbmController::class, 'index'])->name('pbm');
    Route::post('/pbm/save-income', [PbmController::class, 'save_income'])->name('pbm.save-income');
    Route::get('/pbm/get-income-by-id/{id}', [PbmController::class, 'getIncomeById'])->name('pbm.get-income-by-id');
    Route::delete('/pbm/delete-income/{id}', [PbmController::class, 'delete_income'])->name('pbm.delete-income');
    Route::get('/pbm/get-income', [PbmController::class, 'get_incomes'])->name('pbm.get-income');
    
    Route::post('/pbm/save-spandable-amount', [PbmController::class, 'save_spandable_amount'])->name('pbm.save-spandable-amount');
    Route::get('/pbm/get-spandable-amount', [PbmController::class, 'get_spandable_amount'])->name('pbm.get-spandable-amount');
    
    Route::post('/pbm/save-expenses', [PbmController::class, 'save_expenses'])->name('pbm.save-expenses');
    Route::get('/pbm/get-expenses', [PbmController::class, 'get_expenses'])->name('pbm.get-expenses');
    Route::get('/pbm/get-expenses-by-id/{id}', [PbmController::class, 'get_expenses_by_id'])->name('pbm.get-expenses-by-id');
    Route::delete('/pbm/delete-expenses/{id}', [PbmController::class, 'delete_expenses'])->name('pbm.delete-expenses');

    Route::get('/pbm/load-total', [PbmController::class, 'load_total'])->name('pbm.load-total');
});


Route::group(['middleware' => 'guest'], function () {
    
   
    Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [AuthController::class, 'registrerStore']);
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/forgot-password', [ForgotPasswordController::class, 'ShowForgotPassword'])->name('forgot-password');
    Route::post('/forgot_password', [ForgotPasswordController::class, 'forgot_password'])->name('forgot_password');
    Route::get('/reset-password', [ForgotPasswordController::class, 'ShowResetPassword'])->name('reset-password');
    Route::post('/reset_password', [ForgotPasswordController::class, 'reset_password'])->name('reset_password');
    Route::post('/update_password', [ForgotPasswordController::class, 'update_password'])->name('update_password');
    Route::get('/login-without-password', [LoginWithoutPasswordController::class, 'ShowloginWithoutPassword'])->name('login-without-password');
    Route::post('/login_without_password', [LoginWithoutPasswordController::class, 'login_without_password'])->name('login_without_password');
    Route::post('/login_by_otp', [LoginWithoutPasswordController::class, 'login_by_otp'])->name('login_by_otp');
});


// pnt
Route::group(['middleware' => 'auth'], function () {
    Route::get('/reviews', function () {
        return view('front.reviews');
    });
    Route::post('/submit-review', [WebController::class, 'review'])->name('submit-review');

    Route::get('/price', [WebController::class, 'price'])->name('price');
    Route::post('/upgrade-plan', [WebController::class, 'upgrade_plan'])->name('upgrade-plan');
    Route::post('/upgrade-cdb-plan', [WebController::class, 'upgrade_cdb_plan'])->name('upgrade-cdb-plan');
    Route::post('/create-order', [WebController::class,'create_order'])->name('create.order');
    Route::get('/pnt', [PntController::class, 'index'])->name('pnt');
    Route::post('/save-pnt', [PntController::class, 'save_pnt'])->name('save-pnt');
    Route::get('/pnt-assets', [PntController::class, 'pnt_assets'])->name('pnt-assets');
    Route::delete('/delete-pnt-asset/{id}', [PntController::class, 'delete_pnt_asset'])->name('delete-pnt-asset');
    Route::get('/get-pnt-asset/{id}', [PntController::class, 'getAssetById'])->name('get-pnt-asset');
    // save liability
    Route::post('/save-liability', [PntController::class, 'save_liability'])->name('save-liability');
    Route::get('/get-liability', [PntController::class, 'get_liability'])->name('get-liability');
    Route::get('/get-pnt-libility/{id}', [PntController::class, 'getLiabilityById'])->name('get-pnt-libility');
    Route::delete('/delete-pnt-liability/{id}', [PntController::class, 'delete_pnt_liability'])->name('delete-pnt-liability');

    // get networth
    Route::get('/get-networth', [PntController::class, 'get_networth'])->name('get-networth');

    // cash flow
    Route::post('/save-cashflow', [PntController::class, 'save_cashflow'])->name('save-cashflow');
    Route::get('/get-cashflow', [PntController::class, 'get_cashflow'])->name('get-cashflow');
    Route::get('/get-pnt-cashflow/{id}', [PntController::class, 'getCashflowById'])->name('get-pnt-cashflow');
    Route::delete('/delete-cashflow/{id}', [PntController::class, 'delete_cashflow'])->name('delete-cashflow');

    // pnt dates
    Route::post('/save-pnt-dates', [PntController::class, 'save_pnt_dates'])->name('save-pnt-dates');
    Route::get('/get-pnt-dates', [PntController::class, 'get_pnt_dates'])->name('get-pnt-dates');

    // get chart data
    Route::get('/get-chart-data', [PntController::class, 'getChartsData'])->name('get-chart-data');
});
Route::group(['middleware' => 'auth'], function () {
    
    
    // Route::get('/property-details', function () {
    //     return view('front.property-details');
    // });
    Route::get('/my-properties', [PropertyMarketController::class, 'index'])->name('my-properties');
    Route::get('/property-details', [PropertyMarketController::class, 'create'])->name('property-details');
    Route::get('/add-portfolio-property', [PropertyMarketController::class, 'create'])->name('add-portfolio-property');
    Route::get('/payment-details/{id}', [PropertyMarketController::class, 'payment_details'])->name('payment-details');
    Route::post('/savepayment-details', [PropertyMarketController::class, 'paymentstore'])->name('payment-details.save');
    Route::get('/payment-details/{id}/edit', [PropertyMarketController::class, 'edit'])->name('payment-details.edit');
    Route::delete('/payment-details/{id}', [PropertyMarketController::class, 'destroy'])->name('payment-details.destroy');
    Route::get('/get-property-types-by-id', [PropertyMarketController::class, 'getTypesByCategory'])->name('get-property-types-by-id');
    Route::post('/property-market/store', [PropertyMarketController::class, 'store'])->name('property-market.store');
    Route::post('/my-properties/status-update', [PropertyMarketController::class, 'updateStatus'])->name('myproperty.status.update');
    Route::get('/add-portfolio-property/edit/{id}', [PropertyMarketController::class, 'editmarketplace'])->name('add-portfolio-property.edit');
    Route::get('/delete-portfolio-property/{id}', [PropertyMarketController::class, 'deleteMarketplace'])->name('delete.marketplace');

});  


Route::group(['middleware' => 'auth'], function () {

    Route::get('property-compare/', [PropertyCompareController::class, 'index'])->name('property.compare.index');
    Route::post('property-compare/validate-property-compare', [PropertyCompareController::class, 'validatePropertyCompare'])->name('validate.property.compare');
    Route::post('property-compare/', [PropertyCompareController::class, 'compareProperty'])->name('property.compare.post');
    Route::get('/home', [AuthController::class, 'home'])->name('home');

    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
    // Route::get('/property-list/{type}', [PropertyEditController::class, 'property_list'])->name('property-list');
    Route::post('/properties/set-cat-session', [PropertyEditController::class, 'set_cat_session'])->name('properties.set-cat-session');
    Route::get('/properties/new-property', [PropertyEditController::class, 'new_property'])->name('properties.new-property');
    Route::get('/properties/new-property/landing-price', [PropertyController::class, 'landing_price'])->name('properties.new-property.landing-price');
    Route::get('/properties/new-property/description', [PropertyEditController::class, 'add_description'])->name('properties.new-property.description');
    Route::get('/properties/new-property/description/{id?}', [PropertyEditController::class, 'add_description'])->name('properties.new-property.description');
     // Edit Property
    Route::get('/properties/{category}/{id}/description', [UpdatePropertyController::class, 'edit_description'])->name('properties.description');
    Route::post('/update-property-description', [UpdatePropertyController::class, 'update_property_description'])->name('update-property-description');

    Route::get('/properties/{category}/{id}/worksheet', [UpdatePropertyController::class, 'edit_worksheet'])->name('properties.worksheet');
    Route::post('/update-worksheet', [UpdatePropertyController::class, 'update_worksheet'])->name('update-worksheet');

    Route::post('/save-property-description', [PropertyController::class, 'save_property_description'])->name('save-property-description');
    Route::post('/property-gallery/store', [PropertyController::class, 'store_property_gallery'])->name('store-property-gallery');
    Route::post('/property-gallery/delete', [PropertyController::class, 'delete_property_gallery_file'])->name('delete-property-gallery');
    Route::any('/properties/new-property/book-finance-payment/{id}', [PropertyController::class, 'book_finance_payment'])->name('properties.new-property.book-finance-payment');
    Route::post('update-finance-price', [PropertyController::class, 'update_finance_price'])->name('update-finance-price');
    Route::get('/properties/new-property/possession-improvement/{id}', [PropertyController::class, 'possession_improvement'])->name('properties.new-property.possession-improvement');
    Route::get('/properties/new-property/rentout-operate/{id}', [PropertyEditController::class, 'rentout_operate'])->name('properties.new-property.rentout-operate');
    Route::get('/properties/new-property/future-projection-sale/{propertyID}', [PropertyController::class, 'addPropertyType1Book6'])->name('addPropertyType1Book6');
    // Route::get('/rent-out-operate/{propertyID}', [PropertyEditController::class, 'addPropertyType1Book4'])->name('addPropertyType1Book4');
    Route::get('/properties/{type}/list', [PropertyEditController::class, 'property_list'])->name('properties.list');
    // Route::get('/properties/{type}/add', [PropertyEditController::class, 'add_property'])->name('add-property');
    Route::post('/property-filter-data', [PropertyController::class, 'property_filter_data'])->name('property-filter-data');
    Route::post('/getPropertyCriteria', [PropertyController::class, 'getPropertyCriteria'])->name('getPropertyCriteria');
    Route::post('/getPropertyList', [PropertyEditController::class, 'getPropertyList'])->name('getPropertyList');
    Route::post('/filterByTitle', [PropertyController::class, 'filterByTitle'])->name('filterByTitle');
    // Route::get('/add-property-buy-sell/description', [PropertyController::class, 'addPropertyType1'])->name('addPropertyType1');
    Route::post('/save-book-finance-payment', [PropertyController::class, 'save_book_finance_payment'])->name('save-book-finance-payment');
    Route::post('/addItemizedPaidAmount', [PropertyController::class, 'addItemizedPaidAmount'])->name('addItemizedPaidAmount');
    Route::post('/EditItemizedPaidAmount', [PropertyController::class, 'EditItemizedPaidAmount'])->name('EditItemizedPaidAmount');
    Route::post('/EditPaidAmountMainProperty', [PropertyController::class, 'EditPaidAmountMainProperty'])->name('EditPaidAmountMainProperty');
    Route::post('/deletePaidAmountMainProperty', [PropertyController::class, 'deletePaidAmountMainProperty'])->name('deletePaidAmountMainProperty');
    Route::post('/addItemizedPurchasedAmount', [PropertyController::class, 'addItemizedPurchasedAmount'])->name('addItemizedPurchasedAmount');
    Route::post('/EditItemizedPurchasedAmount', [PropertyController::class, 'EditItemizedPurchasedAmount'])->name('EditItemizedPurchasedAmount');
    Route::post('/EditPurchasedAmountMainProperty', [PropertyController::class, 'EditPurchasedAmountMainProperty'])->name('EditPurchasedAmountMainProperty');
    Route::post('/deletePurchasedAmountMainProperty', [PropertyController::class, 'deletePurchasedAmountMainProperty'])->name('deletePurchasedAmountMainProperty');
    Route::post('/addItemizedExtraCharge', [PropertyController::class, 'addItemizedExtraCharge'])->name('addItemizedExtraCharge');
    Route::post('/EditItemizedExtraCharge', [PropertyController::class, 'EditItemizedExtraCharge'])->name('EditItemizedExtraCharge');
    Route::post('/EditExtraChargeMainProperty', [PropertyController::class, 'EditExtraChargeMainProperty'])->name('EditExtraChargeMainProperty');
    Route::post('/deleteExtraChargeMainProperty', [PropertyController::class, 'deleteExtraChargeMainProperty'])->name('deleteExtraChargeMainProperty');
    Route::post('/savePropertyType1possession', [PropertyController::class, 'savePropertyType1possession'])->name('savePropertyType1possession');
    Route::get('/get-country', [PropertyController::class, 'get_country'])->name('get-country');
    Route::get('/get-state-by-country/{id}', [PropertyController::class, 'getStateByCountry'])->name('getStateByCountry');
    Route::get('/get-city-by-state/{id}', [PropertyController::class, 'getCityByState'])->name('getCityByState');
    Route::get('/get-new-loanblock/{id}', [PropertyController::class, 'getLoanBLock'])->name('getLoanBLock');
    Route::post('/addItemizedOtherIncome', [PropertyEditController::class, 'addItemizedOtherIncome'])->name('addItemizedOtherIncome');
    Route::post('/EditItemizedOtherIncome', [PropertyEditController::class, 'EditItemizedOtherIncome'])->name('EditItemizedOtherIncome');
    Route::post('/EditOtherIncomeMainProperty', [PropertyEditController::class, 'EditOtherIncomeMainProperty'])->name('EditOtherIncomeMainProperty');
    Route::post('/deleteOtherIncomeMainProperty', [PropertyEditController::class, 'deleteOtherIncomeMainProperty'])->name('deleteOtherIncomeMainProperty');
    Route::post('/loadOtherIncomeItemized', [PropertyEditController::class, 'loadOtherIncomeItemized'])->name('loadOtherIncomeItemized');

    Route::post('/addItemizedSellingCost', [PropertyController::class, 'addItemizedSellingCost'])->name('addItemizedSellingCost');
    Route::post('/EditItemizedSellingCost', [PropertyController::class, 'EditItemizedSellingCost'])->name('EditItemizedSellingCost');
    Route::post('/EditSellingCostMainProperty', [PropertyController::class, 'EditSellingCostMainProperty'])->name('EditSellingCostMainProperty');
    Route::post('/deleteSellingCostMainProperty', [PropertyController::class, 'deleteSellingCostMainProperty'])->name('deleteSellingCostMainProperty');
    Route::post('/savePropertyType1longTermProjection', [PropertyController::class, 'savePropertyType1longTermProjection'])->name('savePropertyType1longTermProjection');
    Route::post('/addItemizedOperativeExpense', [PropertyEditController::class, 'addItemizedOperativeExpense'])->name('addItemizedOperativeExpense');
    Route::post('/EditItemizedOperativeExpense', [PropertyEditController::class, 'EditItemizedOperativeExpense'])->name('EditItemizedOperativeExpense');
    Route::post('/EditOperativeExpenseMainProperty', [PropertyEditController::class, 'EditOperativeExpenseMainProperty'])->name('EditOperativeExpenseMainProperty');
    Route::post('/deleteOperativeExpenseMainProperty', [PropertyEditController::class, 'deleteOperativeExpenseMainProperty'])->name('deleteOperativeExpenseMainProperty');
    Route::post('/loadOperatingExpenseItemized', [PropertyEditController::class, 'loadOperatingExpenseItemized'])->name('loadOperatingExpenseItemized');
    Route::post('/savePropertyType1RentOutOperate', [PropertyEditController::class, 'savePropertyType1RentOutOperate'])->name('savePropertyType1RentOutOperate');
    /*re-financing route*/
    Route::post('/addItemizedReFinancing', [PropertyEditController::class, 'addItemizedReFinancing'])->name('addItemizedReFinancing');
    Route::post('/EditItemizedReFinancing', [PropertyEditController::class, 'EditItemizedReFinancing'])->name('EditItemizedReFinancing');
    Route::post('/EditReFinancingMainProperty', [PropertyEditController::class, 'EditReFinancingMainProperty'])->name('EditReFinancingMainProperty');
    Route::post('/deleteReFinancingMainProperty', [PropertyEditController::class, 'deleteReFinancingMainProperty'])->name('deleteReFinancingMainProperty');
    Route::post('/savePropertyType1ReFinancing', [PropertyEditController::class, 'savePropertyType1ReFinancing'])->name('savePropertyType1ReFinancing');
  /*re-financing cost route*/
    Route::post('/addItemizedReFinancingCost', [PropertyEditController::class, 'addItemizedReFinancingCost'])->name('addItemizedReFinancingCost');
    Route::post('/getItemizedReFinancingCost', [PropertyEditController::class, 'getItemizedReFinancingCost'])->name('getItemizedReFinancingCost');
    Route::post('/getItemizedReFinancingCostStep5', [PropertyEditController::class, 'getItemizedReFinancingCostStep5'])->name('getItemizedReFinancingCostStep5');
    Route::post('/EditItemizedReFinancingCost', [PropertyEditController::class, 'EditItemizedReFinancingCost'])->name('EditItemizedReFinancingCost');
    Route::post('/EditReFinancingCostMainProperty', [PropertyEditController::class, 'EditReFinancingCostMainProperty'])->name('EditOperativeExpenseMainProperty');
    Route::post('/deleteReFinancingCostMainProperty', [PropertyEditController::class, 'deleteReFinancingCostMainProperty'])->name('deleteReFinancingCostMainProperty');
    Route::post('/savePropertyType1ReFinancingCost', [PropertyEditController::class, 'savePropertyType1ReFinancingCost'])->name('savePropertyType1ReFinancingCost');
    Route::post('/addItemizedImprovementCost', [PropertyController::class, 'addItemizedImprovementCost'])->name('addItemizedImprovementCost');
    Route::post('/EditItemizedImprovementCost', [PropertyController::class, 'EditItemizedImprovementCost'])->name('EditItemizedImprovementCost');
    Route::post('/EditImprovementCostMainProperty', [PropertyController::class, 'EditImprovementCostMainProperty'])->name('EditImprovementCostMainProperty');
    Route::post('/deleteImprovementCostMainProperty', [PropertyController::class, 'deleteImprovementCostMainProperty'])->name('deleteImprovementCostMainProperty');
    Route::post('/addItemizedConvDeed', [PropertyController::class, 'addItemizedConvDeed'])->name('addItemizedConvDeed');
    Route::post('/EditItemizedConvDeed', [PropertyController::class, 'EditItemizedConvDeed'])->name('EditItemizedConvDeed');
    Route::post('/EditConvDeedMainProperty', [PropertyController::class, 'EditConvDeedMainProperty'])->name('EditConvDeedMainProperty');
    Route::post('/deleteConvDeedMainProperty', [PropertyController::class, 'deleteConvDeedMainProperty'])->name('deleteConvDeedMainProperty');
    Route::post('/addItemizedHoldingCost', [PropertyController::class, 'addItemizedHoldingCost'])->name('addItemizedHoldingCost');
    Route::post('/EditItemizedHoldingCost', [PropertyController::class, 'EditItemizedHoldingCost'])->name('EditItemizedHoldingCost');
    Route::post('/EditHoldingCostMainProperty', [PropertyController::class, 'EditHoldingCostMainProperty'])->name('EditHoldingCostMainProperty');
    Route::post('/deleteHoldingCostMainProperty', [PropertyController::class, 'deleteHoldingCostMainProperty'])->name('deleteHoldingCostMainProperty');
    Route::get('/properties/new-property/refinance-cashout/{propertyID}', [PropertyEditController::class, 'addPropertyType1Book5'])->name('addPropertyType1Book5');
    Route::get('/add-new-property/{type}', [PropertyEditController::class, 'addNewProperty'])->name('addNewProperty');
    Route::post('/addContractInitialData', [PropertyEditController::class, 'addContractInitialData'])->name('addContractInitialData');
    Route::post('delete-property', [PropertyEditController::class, 'deleteProperty'])->name('deleteProperty');
    Route::post('/archiveProperty', [PropertyEditController::class, 'archiveProperty'])->name('archiveProperty');
    Route::post('/getArchivePropertyList', [PropertyEditController::class, 'getArchivePropertyList'])->name('getArchivePropertyList');
    Route::post('/exportProperty', [PropertyEditController::class, 'exportProperty'])->name('exportProperty');
    
    // Summary pages
    Route::get('/properties/buy-sale/{id}/summary', [SummaryController::class, 'buy_sale_summary'])->name('property.summary');
    Route::get('/properties/buy-refinance-sale/{id}/summary', [SummaryController::class, 'buy_refinance_sale_summary'])->name('property.summary');
    Route::get('/properties/buy-hold/{id}/summary', [SummaryController::class, 'buy_hold_summary'])->name('property.summary');
    Route::get('/properties/buy-refinance-hold/{id}/summary', [SummaryController::class, 'buy_refinance_hold_summary'])->name('property.summary');
    
    // property anylysis
    Route::get('/properties/{category}/{id}/summary', [PropertyAnalysisController::class, 'propertyAnalysis'])->name('property.summary');

    // Property projection
    Route::get('/properties/{category}/{id}/projection', [BuyHoldProjectionController::class, 'index'])->name('properties.projection');

    // Property Photos
    Route::get('/properties/{category}/{id}/photos', [PropertyEditController::class, 'property_photos'])->name('properties.photos');

    // Property Map
    Route::get('/properties/{category}/{id}/map', [PropertyEditController::class, 'property_map'])->name('properties.map');

    // reports
    Route::get('/properties/{category}/{id}/reports-and-sharing', [PropertyEditController::class, 'reports_and_sharing'])->name('properties.reports-and-sharing');
    Route::get('/properties/{category}/{id}/reports', [PropertyEditController::class, 'property_reports'])->name('properties.reports');

    // BH-Term Sheet
    Route::get('/properties/{category}/{id}/termsheet', [PropertyEditController::class, 'property_termsheet'])->name('properties.termsheet');

    // compare
    Route::get('/properties/{category}/{id}/recent-comps-rent', [RentalComparablesRentController::class, 'index'])->name('properties.recent-comps-rent');
    Route::post('/recent-comps-rent/sort-by/', [RentalComparablesRentController::class, 'listSortBy'])->name('recent.comps.rent.sortby');

    Route::get('/properties/{category}/{id}/recent-sales-comps', [SalesCompsARVEstimatesController::class, 'index'])->name('properties.recent-sales-comps');
    Route::post('/recent-sales-comps/sort-by/', [SalesCompsARVEstimatesController::class, 'listSortBy'])->name('sales.comps.arv.sortby');

    Route::get('/my-profile', [AuthController::class, 'my_profile'])->name('my-profile');
    Route::get('/wallet', [HomeController::class, 'wallet'])->name('wallet');
    
    Route::get('/lead-magnet', [HomeController::class, 'lead_magnet'])->name('lead-magnet');
    Route::post('/lead-magnet/store', [WebController::class, 'lead_magnet'])->name('leadmagnet.store');
    Route::get('/lead-magnet-form', [HomeController::class, 'lead_magnet_form'])->name('lead-magnet-form');
    Route::get('/setting', [AuthController::class, 'setting'])->name('setting');

    Route::get('/user-home', [UserController::class, 'user_home'])->name('user-home');
	Route::get('/realtors', [UserController::class, 'realtors'])->name('realtors');
	Route::get('/investors', [UserController::class, 'investors'])->name('investors');
	
    Route::get('/realtors-menu-popup', [WebController::class, 'realtors_menu_popup'])->name('realtors-menu-popup');
    Route::get('/investors-menu-popup', [WebController::class, 'investors_menu_popup'])->name('investors-menu-popup');
    //18-11-2024
    Route::get('/notifications', [HomeController::class, 'notifications'])->name('notifications');
    Route::post('/notification/read', [HomeController::class, 'read_notification'])->name('notification.read');
    Route::get('/billing', [HomeController::class, 'billing'])->name('billing');
    Route::get('/earn-with-us', [HomeController::class, 'earn_with_us'])->name('earn-with-us');
    Route::get('/services-for-you', [HomeController::class, 'services_for_you'])->name('services-for-you');
    Route::post('/services-for-you/submit-enquiry', [HomeController::class, 'submitEnquiry'])->name('enquiry.submit');
    Route::get('/fetch-products', [HomeController::class, 'fetchProducts'])->name('fetch.products');
    Route::get('/fetch-inspection', [HomeController::class, 'fetch_inspection'])->name('fetch.inspection');
    // Route::get('/add-new-property', [PropertyController::class, 'new_property'])->name('add-new-property');

    Route::post('/addItemizedmiscellaneousCharges', [PropertyController::class, 'addItemizedmiscellaneousCharges'])->name('addItemizedmiscellaneousCharges');
    Route::post('/EditItemizedmiscellaneousCharges', [PropertyController::class, 'EditItemizedmiscellaneousCharges'])->name('EditItemizedmiscellaneousCharges');
    Route::post('/deletemiscellaneousChargesMainProperty', [PropertyController::class, 'deletemiscellaneousChargesMainProperty'])->name('deletemiscellaneousChargesMainProperty');
    Route::post('/loadmiscellaneousChargesItemized', [PropertyController::class, 'loadmiscellaneousChargesItemized'])->name('loadmiscellaneousChargesItemized');
    
    // property edit routes
    Route::any('/properties/edit/book-finance-payment/{id}', [UpdatePropertyController::class, 'book_finance_payment'])->name('properties.edit.book-finance-payment');
    Route::get('/properties/edit/possession-improvement/{id}', [UpdatePropertyController::class, 'possession_improvement'])->name('properties.edit.possession-improvement');
    Route::get('/properties/edit/rentout-operate/{id}', [UpdatePropertyController::class, 'rentout_operate'])->name('properties.edit.rentout-operate');
    Route::get('/properties/edit/refinance-cashout/{id}', [UpdatePropertyController::class, 'addPropertyType1Book5'])->name('properties.edit.refinance-cashout');
    Route::get('/properties/edit/future-projection-sale/{id}', [UpdatePropertyController::class, 'addPropertyType1Book6'])->name('properties.edit.future-projection-sale');
    
    // finance cost routes
    Route::post('/addItemizedFinancingCost', [PropertyEditController::class, 'addItemizedFinancingCost'])->name('addItemizedFinancingCost');
    Route::post('/getItemizedFinancingCost', [PropertyEditController::class, 'getItemizedFinancingCost'])->name('getItemizedFinancingCost');
    Route::post('/EditItemizedFinancingCost', [PropertyEditController::class, 'EditItemizedFinancingCost'])->name('EditItemizedFinancingCost');
    Route::post('/deleteFinancingCostMainProperty', [PropertyEditController::class, 'deleteFinancingCostMainProperty'])->name('deleteFinancingCostMainProperty');
    
    // generate pdf 
    Route::get('/download-property-pdf/{id}', [PropertyMarketController::class, 'downloadSinglePropertyPdf'])->name('download.property.pdf');
    Route::get('/property/{propertyId}/payment-pdf', [PropertyMarketController::class, 'generatePDF'])->name('payment.pdf');
});
Route::get('/clear', function () {
    Artisan::call('optimize:clear');
    Artisan::call('config:cache');
    Artisan::call('cache:clear');
    Artisan::call('view:clear');
    Artisan::call('route:clear');
    return 'Config cache cleared';
});
Route::post('/save-register', [AuthController::class, 'save_register'])->name('save-register');
Route::post('/send-code', [AuthController::class, 'sendCode'])->name('send.code');
// Facebook login
Route::get('auth/facebook', [AuthController::class, 'redirectToFacebook']);
Route::get('auth/facebook/callback', [AuthController::class, 'handleFacebookCallback']);
// Google Login
Route::get('auth/google', [AuthController::class, 'redirectToGoogle']);
Route::get('auth/google/callback', [AuthController::class, 'handleGoogleCallback'])->name('auth.google.callback');

// common social login
Route::get('auth/google', [AuthController::class, 'redirectToGoogle']);
Route::get('/social-login/{google_id}', [AuthController::class, 'sociallogin'])->name('social-login');

Route::get('test-mail', [AuthController::class, 'test_mail']);
Route::get('view-temp', [AuthController::class, 'show_mail_templet']);
Route::post('/recover-password', [ForgotPasswordController::class, 'recover_password'])->name('recover-password');
Route::post('/email-verification', [AuthController::class, 'email_verification'])->name('email-verification');
Route::post('/save-user-details', [AuthController::class, 'save_user_details'])->name('save-user-details');
Route::post('/save-company-details', [AuthController::class, 'save_company_details'])->name('save-company-details');
Route::post('/update-password', [AuthController::class, 'update_password'])->name('update-password');
Route::post('/update-social-network', [AuthController::class, 'update_social_network'])->name('update-social-network');
Route::post('/check-username', [AuthController::class, 'check_username'])->name('check-username');
Route::get('/get-resource-category', [ResourceController::class, 'get_resource_category'])->name('get-resource-category');
Route::post('/get-resource-by-category', [ResourceController::class, 'get_resource_bycategory'])->name('get-resource-by-category');
Route::get('/check-authorization/{id}', [ResourceController::class, 'check_authorization'])->name('check-authorization');
Route::get('/page/{slug}', [PageController::class, 'index'])->name('page');
Route::post('/get-page-popup-info', [PageController::class, 'get_page_popup_info'])->name('get-page-popup-info');
Route::post('/get-cdo-by-cat', [PageController::class, 'get_cdo_by_cat'])->name('get-cdo-by-cat');
Route::post('/get-product-by-cat', [PageController::class, 'get_product_by_cat'])->name('get-product-by-cat');
Route::post('/save-page-popup-data', [PageController::class, 'save_page_popup_data'])->name('save-page-popup-data');
Route::post('/save-enquiry', [HomeController::class, 'save_enquiry'])->name('save-enquiry');
// subscribe
Route::post('/subscribe',[WebController::class,'Signup_subscribe'])->name('subscribe');


Route::get('/privacy-policy',[WebController::class,'privacy_policy'])->name('privacy-policy');
Route::get('/terms-conditions',[WebController::class,'terms_conditions'])->name('terms-conditions');
Route::get('/data-deletion',[WebController::class,'data_deletion'])->name('data-deletion');
Route::get('/editorial-policy',[WebController::class,'editorial_policy'])->name('editorial-policy');
Route::get('/cookie-policy',[WebController::class,'cookie_policy'])->name('cookie-policy');
Route::get('/disclaimers',[WebController::class,'disclaimers'])->name('disclaimers');
Route::get('/accessibility',[WebController::class,'accessibility'])->name('accessibility');

Route::get('/pages/{slug}', [PageController::class, 'embed_pages'])->name('pages');

Route::get('/pepm-enquiry-type', function () {
    return view('front.pepm-enquiry-type');
});
Route::get('/unsubscribe', function () {
    return view('front.unsubscribe');
});
Route::get('/360-vts', function () {
    return view('front.360-vts');
});
