<?php
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PricingController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\TriggerController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\WebController;
use App\Http\Controllers\CmsController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductServiceController;
use App\Http\Controllers\ResourceController;
use App\Http\Controllers\PropertymarketController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\PlanController;
use App\Http\Controllers\GiftController;
use App\Http\Controllers\ResourceandToolsController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\AssetsController;
use App\Http\Controllers\CDOController;
use App\Http\Controllers\BusinessCard;
use App\Http\Controllers\FormController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\FormLeadsController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EasytoshareController;
use App\Http\Controllers\EasytoUseController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\FeaturesController;
use App\Http\Controllers\SubscribeController;
use App\Http\Controllers\PassiveProfitController;
use App\Http\Controllers\AgentSettingController;
use App\Http\Controllers\WorkMatrixController;
use App\Http\Controllers\NeedHelpController;
use App\Http\Controllers\PropertyCategoryController;
use App\Http\Controllers\HowItWorkController;
use App\Http\Controllers\CalltoActionController;
use App\Http\Controllers\HeaderNavigationController;
use App\Http\Controllers\EmbedPageController;
use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\MeetTeamController;
use App\Http\Controllers\MeetCategoryController;
use App\Http\Controllers\TeamDetailController;
use App\Http\Controllers\WebSettingController;
use App\Http\Controllers\MediaController;
use App\Http\Controllers\JoinAsAffiliateController;
use App\Http\Controllers\LandingBannerController;
use App\Http\Controllers\LandingLocationController;
use App\Http\Controllers\BookingEventController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ProjectCategoryController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\ReviewsController;
use App\Http\Controllers\CDBPlansController;
use App\Http\Controllers\PlanTypeController;
use App\Http\Controllers\AppointmentThankyouController;
use App\Http\Controllers\AppointmentBookingHomeworkController;
use App\Http\Controllers\AppointmentBookingController;

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
// Route::group(['middleware' => 'auth', 'prefix' => 'web','name'=>'web.'], function () {


Route::get('/', function () {
    return redirect()->route('login');
});
Auth::routes(['register' => false]);
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/enquiry-list', [HomeController::class, 'enquiry_list'])->name('enquiry-list');
Route::get('/master-list', [HomeController::class, 'master_list'])->name('master-list');
Route::post('/next-step-data', [HomeController::class, 'next_step_data'])->name('next-step-data');
Route::post('/send-link-via-email', [FormLeadsController::class, 'send_link_via_email'])->name('send-link-via-email');
Route::post('/get-whatsapp-link', [HomeController::class, 'get_whatsapp_link'])->name('get-whatsapp-link');
Route::post('/update-enquiry-status', [HomeController::class, 'update_enquiry_status'])->name('update-enquiry-status');
Route::get('/delete-enquiry/{id}', [HomeController::class, 'delete_enquiry'])->name('delete-enquiry');
Route::post('/view-enquiry-message', [HomeController::class, 'view_enquiry_message'])->name('view-enquiry-message');
// Profile Routes
Route::prefix('profile')->name('profile.')->middleware(['auth'])->group(function(){
    Route::get('/', [HomeController::class, 'getProfile'])->name('detail');
    Route::post('/update', [HomeController::class, 'updateProfile'])->name('update');
    Route::post('/change-password', [HomeController::class, 'changePassword'])->name('change-password');
});
// Roles
Route::resource('roles', App\Http\Controllers\RolesController::class);
// Permissions
Route::resource('permissions', App\Http\Controllers\PermissionsController::class);
// Users
Route::middleware(['auth'])->prefix('users')->name('users.')->group(function(){
    Route::get('/', [UserController::class, 'index'])->name('index');
    Route::get('/create', [UserController::class, 'create'])->name('create');
    Route::post('/store', [UserController::class, 'store'])->name('store');
    Route::get('/edit/{user}', [UserController::class, 'edit'])->name('edit');
    Route::put('/update/{user}', [UserController::class, 'update'])->name('update');
    Route::delete('/delete/{user}', [UserController::class, 'delete'])->name('destroy');
    Route::get('/update/status/{user_id}/{status}/{reason?}', [UserController::class, 'updateStatus'])->name('status');
    Route::get('/import-users', [UserController::class, 'importUsers'])->name('import');
    Route::post('/upload-users', [UserController::class, 'uploadUsers'])->name('upload');
    Route::get('export/', [UserController::class, 'export'])->name('export');
    Route::get('testFunction/', [UserController::class, 'testFunction'])->name('testFunction');
    // update agents details
    Route::post('update-agent-details', [UserController::class, 'update_aagent_details'])->name('update-agent-details');
    Route::post('update-agent-company', [UserController::class, 'update_agent_company'])->name('update-agent-company');
    Route::post('update-agent-password', [UserController::class, 'update_agent_password'])->name('update-agent-password');
    Route::post('update-agent-social-networks', [UserController::class, 'update_agent_social_networks'])->name('update-agent-social-networks');

});
Route::middleware(['auth'])->prefix('agent')->name('agent.')->group(function(){
    Route::get('/', [UserController::class, 'index'])->name('index');
    Route::get('/create', [UserController::class, 'create'])->name('create');
    Route::post('/store', [UserController::class, 'store'])->name('store');
    Route::get('/edit/{user}', [UserController::class, 'edit'])->name('edit');
    Route::put('/update/{user}', [UserController::class, 'update'])->name('update');
    Route::delete('/delete/{user}', [UserController::class, 'delete'])->name('destroy');
    Route::get('/update/status/{user_id}/{status}/{reason?}', [UserController::class, 'updateStatus'])->name('status');
    Route::get('/import-users', [UserController::class, 'importUsers'])->name('import');
    Route::post('/upload-users', [UserController::class, 'uploadUsers'])->name('upload');
    Route::get('export/', [UserController::class, 'export'])->name('export');
    Route::get('testFunction/', [UserController::class, 'testFunction'])->name('testFunction');
    // update agents details
    Route::post('update-agent-details', [UserController::class, 'update_aagent_details'])->name('update-agent-details');
    Route::post('update-agent-company', [UserController::class, 'update_agent_company'])->name('update-agent-company');
    Route::post('update-agent-password', [UserController::class, 'update_agent_password'])->name('update-agent-password');
    Route::post('update-agent-social-networks', [UserController::class, 'update_agent_social_networks'])->name('update-agent-social-networks');
    
    // view current plan
    Route::get('/subscription/{id}', [UserController::class, 'subscription'])->name('subscription');

});
Route::middleware(['auth', 'plan_permission'])->prefix('domain')->name('domain.')->group(function(){

    Route::get('/edit/{user}', [UserController::class, 'edit_domain_details'])->name('edit');
    Route::post('/update', [UserController::class, 'update_domain_details'])->name('update');
});
// Customer Routes
Route::middleware(['auth','plan_permission'])->prefix('customer')->name('customer.')->group(function(){
    Route::get('/', [CustomerController::class, 'index'])->name('index');
    Route::get('/create', [CustomerController::class, 'create'])->name('create');
    Route::post('/store', [CustomerController::class, 'store'])->name('store');
    Route::get('/edit/{user}', [CustomerController::class, 'edit'])->name('edit');
    Route::put('/update/{user}', [CustomerController::class, 'update'])->name('update');
    Route::get('/delete/{user}', [CustomerController::class, 'delete'])->name('destroy');
    Route::get('/update/status/{user_id}/{status}/{reason?}', [CustomerController::class, 'updateStatus'])->name('status');
    Route::get('export/', [CustomerController::class, 'export'])->name('export');
	Route::get('/customers-edit', [UserController::class, 'customersedit'])->name('customersedit');
    // update customer details
    Route::post('update-customer-details', [CustomerController::class, 'update_customer_details'])->name('update-customer-details');
    Route::post('update-customer-company', [CustomerController::class, 'update_customer_company'])->name('update-customer-company');
    Route::post('update-customer-password', [CustomerController::class, 'update_customer_password'])->name('update-customer-password');
    Route::post('update-customer-social-networks', [CustomerController::class, 'update_customer_social_networks'])->name('update-customer-social-networks');
    Route::post('checkusername', [CustomerController::class, 'check_username'])->name('checkusername');
});
// Thanks Routes
Route::middleware(['auth'])->prefix('payment')->name('payment.')->group(function(){
    Route::get('/thanks', [UserController::class, 'thanks'])->name('thanks');
	Route::get('/payment-faild', [UserController::class, 'paymentfaild'])->name('paymentfaild');
});
// CMS
Route::middleware(['auth','plan_permission'])->prefix('cms')->name('cms.')->group(function(){
 /*   Route::get('/', [UserController::class, 'cmslist'])->name('cmslist');
	Route::get('/add-cms', [UserController::class, 'addcms'])->name('addcms');
	Route::get('/edit-cms', [UserController::class, 'editcms'])->name('editcms');
	*/
	Route::get('/', [CmsController::class, 'index'])->name('index');
    Route::get('/create', [CmsController::class, 'create'])->name('create');
    Route::post('/store', [CmsController::class, 'store'])->name('store');
    Route::get('/edit/{cms}', [CmsController::class, 'edit'])->name('edit');
    Route::put('/update/{cms}', [CmsController::class, 'update'])->name('update');
    Route::get('/delete/{cms}', [CmsController::class, 'delete'])->name('destroy');
});
// Referred Customer
Route::middleware(['auth','plan_permission'])->prefix('affiliatesmanagement')->name('affiliatesmanagement.')->group(function(){
	Route::post('/pay-reward', [TransactionController::class, 'payReward'])->name('payReward');
	Route::get('/affiliate-setting', [TransactionController::class, 'affiliateSetting'])->name('affiliateSetting');
});

// SMTP
Route::middleware(['auth','plan_permission'])->prefix('smtp')->name('smtp.')->group(function(){
    Route::get('/{id}', [SettingController::class, 'smtpfrm'])->name('smtpfrm');
    Route::post('/update-smtp', [SettingController::class, 'updateSmtp'])->name('updateSmtp');
});
// Setting
Route::middleware(['auth'])->prefix('setting')->name('setting.')->group(function(){
    Route::get('/payment-gatways/{id}', [SettingController::class, 'paymentgatways'])->name('paymentgatways');
    Route::get('/brandings/{id}', [SettingController::class, 'brandingsfrm'])->name('brandingsfrm');
    Route::post('/update-payment-gateway', [SettingController::class, 'updatePaymentGateway'])->name('updatePaymentGateway');
    Route::post('/update-branding', [SettingController::class, 'updateBranding'])->name('updateBranding');
});
// My Account
Route::middleware(['auth'])->prefix('myaccount')->name('myaccount.')->group(function(){
    Route::get('/', [ProfileController::class, 'myaccountfrm'])->name('myaccountfrm');
    Route::get('/my-profile', [ProfileController::class, 'myaccountfrm'])->name('my-profile');
    Route::post('update', [ProfileController::class, 'update'])->name('update');
    Route::post('update-company', [ProfileController::class, 'updateCompany'])->name('updateCompany');
    Route::post('update-accounts', [ProfileController::class, 'updateAccounts'])->name('updateAccounts');
    Route::post('update-password', [ProfileController::class, 'updatePassword'])->name('updatePassword');
    Route::post('checkusername', [ProfileController::class, 'checkusername'])->name('checkusername');
});
// Billing
Route::middleware(['auth', 'plan_permission'])->prefix('billing')->name('billing.')->group(function(){
    Route::get('/', [TransactionController::class, 'billinglist'])->name('billinglist');
    Route::get('detail/{id}', [TransactionController::class, 'detail'])->name('detail');
    Route::get('planlist', [TransactionController::class, 'planlist'])->name('planlist');
    Route::post('buyfreeplan', [TransactionController::class, 'buyfreeplan'])->name('buyfreeplan');
    Route::post('upgrade', [TransactionController::class, 'upgrade'])->name('upgrade');
    Route::post('upgrade-agent-plan', [TransactionController::class, 'upgrade_agent_plan'])->name('upgrade-agent-plan');
});
// Billing
Route::middleware(['auth', 'plan_permission'])->prefix('transaction')->name('transaction.')->group(function(){
    Route::get('/', [TransactionController::class, 'index'])->name('index');
    Route::get('detail/{id}', [TransactionController::class, 'txndetail'])->name('detail');
});
// Affiliate Earning
Route::middleware(['auth', 'plan_permission'])->prefix('affiliateearning')->name('affiliateearning.')->group(function(){
    Route::get('/reward-listing', [UserController::class, 'afrewardlisting'])->name('afrewardlisting');
    Route::get('/referred-customer', [UserController::class, 'afreferredcustomer'])->name('afreferredcustomer');
});
// order list Management
Route::middleware(['auth', 'plan_permission'])->prefix('orderleadsmanagement')->name('orderleadsmanagement.')->group(function(){
    Route::get('/order-list', [UserController::class, 'orderlist'])->name('orderlist');
});
// Customer Management
Route::middleware(['auth'])->prefix('customermanagement')->name('customermanagement.')->group(function(){
    Route::get('/', [UserController::class, 'customerlist'])->name('customerlist');
    Route::get('/customers-edits', [UserController::class, 'editcustomer'])->name('editcustomer');
    Route::get('/add-customers', [UserController::class, 'addcustomer'])->name('addcustomer');
    Route::get('/customer-portfolio-list', [CustomerController::class, 'customerprolist'])->name('customerprolist');
});
// Product Services
Route::middleware(['auth', 'plan_permission'])->prefix('productservices')->name('productservices.')->group(function(){
   /* Route::get('/', [UserController::class, 'productsslist'])->name('productsslist');
    Route::get('/edit-product-services', [UserController::class, 'editproductservss'])->name('editproductservss');
    Route::get('/add-product-services', [UserController::class, 'addproductservss'])->name('addproductservss'); */
    Route::get('/', [ProductServiceController::class, 'index'])->name('productsslist');
    Route::get('/create', [ProductServiceController::class, 'create'])->name('addproductservss');
    Route::post('/store', [ProductServiceController::class, 'store'])->name('store');
    Route::get('/edit/{product}', [ProductServiceController::class, 'edit'])->name('editproductservss');
    Route::put('/update/{product}', [ProductServiceController::class, 'update'])->name('update');
    Route::get('/delete/{id}', [ProductServiceController::class, 'delete'])->name('destroy');
    Route::get('/category-list', [ProductServiceController::class, 'categorylist'])->name('categorylist');
    Route::get('/create-category', [ProductServiceController::class, 'addcategory'])->name('addcategory');
    Route::post('/store-category', [ProductServiceController::class, 'storecategory'])->name('storecategory');
    Route::get('/edit-category/{product}', [ProductServiceController::class, 'editcategory'])->name('editcategory');
    Route::get('/delete-category/{id}', [ProductServiceController::class, 'deletecategory'])->name('deletecategory');
    Route::put('/update-category/{product}', [ProductServiceController::class, 'updatecategory'])->name('updatecategory');
    // Listing
    Route::get('/inspection/{product_id}',[ProductServiceController::class, 'inspectionList'])->name('inspection.list');
    // Add form
    Route::get('/inspection/{product_id}/add',[ProductServiceController::class, 'inspectionForm'])->name('inspection.add');
    // Edit form
    Route::get('/inspection/{product_id}/edit/{id}',[ProductServiceController::class, 'inspectionForm'])->name('inspection.edit');
    // Store (ADD + UPDATE both)
    Route::post('/inspection/store',[ProductServiceController::class, 'inspectionStore'])->name('inspection.store');
    Route::delete('/inspection/{product_id}/delete/{id}',[ProductServiceController::class, 'inspectionDelete'])->name('inspection.delete');
});
// Resourses
Route::middleware(['auth', 'plan_permission'])->prefix('resources')->name('resources.')->group(function(){
  /*  Route::get('/', [UserController::class, 'resourseslist'])->name('resourseslist');
    Route::get('/edit-resourses', [UserController::class, 'editresourses'])->name('editresourses');
    Route::get('/add-resourses', [UserController::class, 'addresourses'])->name('addresourses'); */
    Route::get('/', [ResourceController::class, 'index'])->name('resourceslist');
    Route::get('/create', [ResourceController::class, 'create'])->name('addresources');
    Route::post('/store', [ResourceController::class, 'store'])->name('store');
    Route::get('/edit/{resource}', [ResourceController::class, 'edit'])->name('editresources');
    Route::put('/update/{resource}', [ResourceController::class, 'update'])->name('update');
    Route::delete('/delete/{resource}', [ResourceController::class, 'delete'])->name('destroy');
});
// Property Market
Route::middleware(['auth'])->prefix('propertymarket')->name('propertymarket.')->group(function(){
   // Route::get('/', [UserController::class, 'propertymarketlist'])->name('propertymarketlist');
  //  Route::get('/edit-propertymarket', [UserController::class, 'editpropertymarket'])->name('editpropertymarket');
    //Route::get('/add-propertymarket', [UserController::class, 'addpropertymarket'])->name('addpropertymarket');
   Route::get('/', [PropertymarketController::class, 'index'])->name('propertymarketlist');
    Route::get('/create', [PropertymarketController::class, 'create'])->name('addpropertymarket');
    Route::post('/store', [PropertymarketController::class, 'store'])->name('store');
    Route::get('/edit/{propertymarket}', [PropertymarketController::class, 'edit'])->name('editpropertymarket');
    Route::put('/update/{propertymarket}', [PropertymarketController::class, 'update'])->name('update');
    Route::get('/delete/{propertymarket}', [PropertymarketController::class, 'delete'])->name('destroy');
    Route::get('/status/{id}/{status}', [PropertymarketController::class, 'updateMarketStatus'])->name('updateMarketStatus');    
    Route::get('/popup-details/{id}', [PropertymarketController::class, 'popup_details'])->name('popup-details');
    Route::post('/popup-store', [PropertymarketController::class, 'popup_store'])->name('popup-store');
    Route::get('/cms', [PropertymarketController::class, 'cms'])->name('cms');
    Route::post('/cms-store', [PropertymarketController::class, 'cms_store'])->name('cms-store');
    Route::get('/enquiry-list', [PropertymarketController::class, 'enquiry_list'])->name('enquiry-list');
});
// tickets customer care
Route::middleware(['auth', 'plan_permission'])->prefix('triggernotification')->name('triggernotification.')->group(function(){
  /*  Route::get('/', [UserController::class, 'triggernotificationlist'])->name('triggernotificationlist');
    Route::get('/add-triggernotification', [UserController::class, 'addtriggernotification'])->name('addtriggernotification');
    Route::get('/edit-triggernotification', [UserController::class, 'edittriggernotification'])->name('edittriggernotification'); */
      Route::get('/', [TriggerController::class, 'index'])->name('triggernotificationlist');
    Route::get('/create', [TriggerController::class, 'create'])->name('addtriggernotification');
    Route::post('/store', [TriggerController::class, 'store'])->name('store');
    Route::get('/edit/{trigger}', [TriggerController::class, 'edit'])->name('edittriggernotification');
    Route::put('/update/{trigger}', [TriggerController::class, 'update'])->name('update');
   // Route::delete('/delete/{pricing}', [PricingController::class, 'delete'])->name('destroy');
    Route::get('/update/status/{trigger_id}/{status}', [TriggerController::class, 'updateStatus'])->name('status');
});
// tickets customer care
Route::middleware(['auth', 'plan_permission'])->prefix('ticketscustomercare')->name('ticketscustomercare.')->group(function(){
    Route::get('/', [TicketController::class, 'index'])->name('ticketscustomercarelist');
    Route::get('/create-tickets', [TicketController::class, 'createtickets'])->name('createtickets');
    Route::post('/compose', [TicketController::class, 'addTicket'])->name('addTicket');
    Route::post('/addTicketComment', [TicketController::class, 'addTicketComment'])->name('addTicketComment'); /*
    Route::get('/tickets-details', [TicketController::class, 'ticketsdetails'])->name('ticketsdetails'); */
    Route::get('/tickets-details/{id}', [TicketController::class, 'ticketsdetails'])->name('ticketsdetails');
    Route::get('/ticket-closed/{id}', [TicketController::class, 'ticketResolved'])->name('ticketResolved');
});
// Plan Add
Route::middleware(['auth'])->prefix('planadd')->name('planadd.')->group(function(){
    Route::get('/', [PlanController::class, 'index'])->name('index');
    Route::get('/add-plan', [PlanController::class, 'create'])->name('create');
    Route::post('/store-plan', [PlanController::class, 'store'])->name('store');
    Route::get('/edit-plan/{plan}', [PlanController::class, 'edit'])->name('edit');
    Route::put('/update-plan/{plan}', [PlanController::class, 'update'])->name('update');
    Route::get('/delete/{id}', [PlanController::class, 'destroy'])->name('delete');

});
// Purchase Cretirea
Route::middleware(['auth'])->prefix('purchasecretirea')->name('purchasecretirea.')->group(function(){
    Route::get('/', [UserController::class, 'mnpurchasecretirea'])->name('mnpurchasecretirea');
    Route::post('update-purchase-criteria', [UserController::class, 'updatePurchaseCriteria'])->name('updatePurchaseCriteria');
});
// Buy Hold Projection
Route::middleware(['auth', 'plan_permission'])->prefix('buyholdprojection')->name('buyholdprojection.')->group(function(){
    Route::get('/', [UserController::class, 'buyholdprojectionlist'])->name('buyholdprojectionlist');
});
// Admin
Route::middleware(['auth'])->prefix('admin-user')->name('admin.')->group(function(){
    Route::get('/', [AdminController::class, 'index'])->name('index');
    Route::get('/create', [AdminController::class, 'create'])->name('create');
    Route::post('/store', [AdminController::class, 'store'])->name('store');
    Route::get('/edit/{user}', [AdminController::class, 'edit'])->name('edit');
    Route::put('/update/{user}', [AdminController::class, 'update'])->name('update');
    Route::delete('/delete/{user}', [AdminController::class, 'delete'])->name('destroy');
    Route::get('/update/status/{user_id}/{status}', [AdminController::class, 'updateStatus'])->name('status');
    Route::get('export/', [AdminController::class, 'export'])->name('export');
});
// Pricing
Route::middleware(['auth', 'plan_permission'])->prefix('pricing')->name('pricing.')->group(function(){
    Route::get('/', [PricingController::class, 'index'])->name('index');
    Route::get('/create', [PricingController::class, 'create'])->name('create');
    Route::post('/store', [PricingController::class, 'store'])->name('store');
    Route::get('/edit/{pricing}', [PricingController::class, 'edit'])->name('edit');
    Route::put('/update/{pricing}', [PricingController::class, 'update'])->name('update');
   // Route::delete('/delete/{pricing}', [PricingController::class, 'delete'])->name('destroy');
    Route::get('/update/status/{pricing_id}/{status}', [PricingController::class, 'updateStatus'])->name('status');
    Route::get('/editCategoryPrices', [PricingController::class, 'editCategoryPrices'])->name('editCategoryPrices');
    Route::post('/updateCategoryPrices', [PricingController::class, 'updateCategoryPrices'])->name('updateCategoryPrices');
});
// notification
Route::middleware(['auth', 'plan_permission'])->prefix('notification')->name('notification.')->group(function(){
    Route::get('/', [NotificationController::class, 'index'])->name('index');
    Route::get('/create', [NotificationController::class, 'create'])->name('create');
    Route::post('/store', [NotificationController::class, 'store'])->name('store');
    Route::get('/edit/{notification}', [NotificationController::class, 'edit'])->name('edit');
    Route::put('/update/{notification}', [NotificationController::class, 'update'])->name('update');
    Route::get('/delete/{notification}', [NotificationController::class, 'delete'])->name('destroy');
    Route::get('/update/status/{notification_id}/{status}', [NotificationController::class, 'updateStatus'])->name('status');
     Route::get('/category-list', [NotificationController::class, 'categorylist'])->name('categorylist');
    Route::get('/create-category', [NotificationController::class, 'addcategory'])->name('addcategory');
    Route::post('/store-category', [NotificationController::class, 'storecategory'])->name('storecategory');
    Route::get('/edit-category/{product}', [NotificationController::class, 'editcategory'])->name('editcategory');
    Route::get('/delete-category/{id}', [NotificationController::class, 'deletecategory'])->name('deletecategory');
    Route::put('/update-category/{product}', [NotificationController::class, 'updatecategory'])->name('updatecategory');
});
// notification
Route::middleware(['auth', 'plan_permission'])->prefix('trigger')->name('trigger.')->group(function(){
    Route::get('/', [TriggerController::class, 'index'])->name('index');
    Route::get('/create', [TriggerController::class, 'create'])->name('create');
    Route::post('/store', [TriggerController::class, 'store'])->name('store');
    Route::get('/edit/{trigger}', [TriggerController::class, 'edit'])->name('edit');
    Route::put('/update/{trigger}', [TriggerController::class, 'update'])->name('update');
   // Route::delete('/delete/{pricing}', [PricingController::class, 'delete'])->name('destroy');
    Route::get('/update/status/{trigger_id}/{status}', [TriggerController::class, 'updateStatus'])->name('status');
});
// contacts
Route::middleware(['auth', 'plan_permission'])->prefix('lists')->name('lists.')->group(function(){
    Route::get('/', [HomeController::class, 'contact_list'])->name('index');
    Route::get('/create', [HomeController::class, 'add_contact'])->name('create');
    Route::post('/store', [HomeController::class, 'save_contact'])->name('store');
    Route::get('/edit/{trigger}', [HomeController::class, 'edit_contact'])->name('edit');
    Route::get('/delete/{trigger}', [HomeController::class, 'delete_contact'])->name('delete');
    Route::post('/update-status', [HomeController::class, 'update_contact_status'])->name('update-status');
});
// tags
Route::middleware(['auth', 'plan_permission'])->prefix('tags')->name('tags.')->group(function(){
    Route::get('/', [HomeController::class, 'tags_list'])->name('index');
    Route::get('/create', [HomeController::class, 'add_tags'])->name('create');
    Route::post('/store', [HomeController::class, 'save_tags'])->name('store');
    Route::get('/edit/{trigger}', [HomeController::class, 'edit_tags'])->name('edit');
    Route::get('/delete/{trigger}', [HomeController::class, 'delete_tags'])->name('delete');
    Route::post('/update-status', [HomeController::class, 'update_tags_status'])->name('update-status');
});
// source
Route::middleware(['auth', 'plan_permission'])->prefix('form-source')->name('form-source.')->group(function(){
    Route::get('/', [HomeController::class, 'form_source'])->name('index');
    Route::get('/create', [HomeController::class, 'create_form_source'])->name('create');
    Route::post('/store', [HomeController::class, 'save_form_source'])->name('store');
    Route::get('/edit/{id}', [HomeController::class, 'edit_form_source'])->name('edit');
    Route::get('/delete/{id}', [HomeController::class, 'delete_form_source'])->name('delete');
    // Route::post('/update-status', [HomeController::class, 'update_tags_status'])->name('update-status');
});
// source
Route::middleware(['auth', 'plan_permission'])->prefix('file-drive')->name('file-drive.')->group(function(){
    Route::get('/', [HomeController::class, 'file_drive'])->name('index');
    Route::get('/create', [HomeController::class, 'create_file_drive'])->name('create');
    Route::post('/store', [HomeController::class, 'save_file_drive'])->name('store');
    Route::get('/edit/{id}', [HomeController::class, 'edit_file_drive'])->name('edit');
    Route::get('/delete/{id}', [HomeController::class, 'delete_file_drive'])->name('delete');
    // Route::post('/update-status', [HomeController::class, 'update_tags_status'])->name('update-status');
});
// user referral commission
Route::middleware(['auth', 'plan_permission'])->prefix('user-referral-commission')->name('user-referral-commission.')->group(function(){
    Route::get('/', [HomeController::class, 'user_referral_commission_list'])->name('index');
    Route::get('/create', [HomeController::class, 'add_user_referral_commission'])->name('create');
    Route::post('/store', [HomeController::class, 'save_user_referral_commission'])->name('store');
    Route::get('/edit/{trigger}', [HomeController::class, 'edit_user_referral_commission'])->name('edit');
    Route::get('/delete/{trigger}', [HomeController::class, 'delete_user_referral_commission'])->name('delete');
    Route::post('/update-status', [HomeController::class, 'update_user_referral_commission_status'])->name('update-status');
});
Route::get('/get-country', [HomeController::class, 'get_country'])->name('get-country');
Route::get('/get-state-by-country/{id}', [HomeController::class, 'getStateByCountry'])->name('getStateByCountry');
Route::get('/get-city-by-state/{id}', [HomeController::class, 'getCityByState'])->name('getCityByState');
// gift
Route::middleware(['auth', 'plan_permission'])->prefix('gift')->name('gift.')->group(function(){
    Route::get('/', [GiftController::class, 'index'])->name('index');
    Route::get('/create', [GiftController::class, 'create'])->name('create');
    Route::post('/store', [GiftController::class, 'store'])->name('store');
    Route::get('/edit/{id}', [GiftController::class, 'edit'])->name('edit');
    Route::get('/delete/{id}', [GiftController::class, 'delete'])->name('delete');
    Route::post('/update-coupon-status', [GiftController::class, 'update_coupon_status'])->name('update-coupon-status');
    Route::post('/update-gift-status', [GiftController::class, 'update_gift_status'])->name('update-gift-status');
    Route::get('/category-list', [GiftController::class, 'gift_category_list'])->name('category-list');
    Route::get('/create-category', [GiftController::class, 'create_gift_category'])->name('create-category');
    Route::post('/store-category', [GiftController::class, 'store_gift_category'])->name('store-category');
    Route::get('/edit-category/{id}', [GiftController::class, 'edit_gift_category'])->name('edit-category');
    Route::get('/delete-category/{id}', [GiftController::class, 'delete_gift_category'])->name('delete-category');
    Route::get('/gallery', [GiftController::class, 'gallery'])->name('gallery');
    Route::post('/gallery-items', [GiftController::class, 'gallery_items'])->name('gallery-items');
    Route::post('/show-gift-images', [GiftController::class, 'show_gift_images'])->name('show-gift-images');
    Route::post('/get-selected-gifts', [GiftController::class, 'get_selected_gifts'])->name('get-selected-gifts');
    Route::post('/save-gift-collection', [GiftController::class, 'save_gift_collection'])->name('save-gift-collection');
    Route::get('/collection', [GiftController::class, 'collection'])->name('collection');
    Route::get('/gallery/edit/{id}', [GiftController::class, 'edit_gallery'])->name('gallery.edit');
    Route::get('/gallery/delete/{id}', [GiftController::class, 'delete_gallery'])->name('gallery.delete');
    Route::post('/get-gift-summary', [GiftController::class, 'get_gift_summary'])->name('get-gift-summary');
    Route::get('/thank-you', [GiftController::class, 'thank_you'])->name('thank-you');
    // thank you card
    Route::get('/thank-you-card', [GiftController::class, 'thank_you_card'])->name('thank-you-card');
    Route::get('/thank-you-card-list', [GiftController::class, 'thank_you_card_list'])->name('thank-you-card-list');
    Route::get('/create-thank-you-card', [GiftController::class, 'create_thank_you_card'])->name('create-thank-you-card');
    Route::get('/edit-thank-you-card/{id}', [GiftController::class, 'edit_thank_you_card'])->name('edit-thank-you-card');
    Route::get('/delete-thank-you-card/{id}', [GiftController::class, 'delete_thank_you_card'])->name('delete-thank-you-card');
    Route::post('/store-thank-you-card', [GiftController::class, 'store_thank_you_card'])->name('store-thank-you-card');

});
Route::middleware(['auth', 'plan_permission'])->prefix('gift/config')->name('gift.config.')->group(function(){
    Route::get('/', [GiftController::class, 'gift_config'])->name('index');
    Route::get('/create', [GiftController::class, 'create_gift_config'])->name('create');
    Route::post('/store', [GiftController::class, 'store_gift_config'])->name('store');
    Route::get('/edit/{id}', [GiftController::class, 'edit_gift_config'])->name('edit');
    Route::get('/delete/{id}', [GiftController::class, 'delete_gift_config'])->name('delete');
});
Route::middleware(['auth', 'plan_permission'])->prefix('mail-category')->name('mail-category.')->group(function(){
    Route::get('/', [MailController::class, 'mail_category'])->name('index');
    Route::get('/create', [MailController::class, 'create_mail_category'])->name('create');
    Route::post('/store', [MailController::class, 'store_mail_category'])->name('store');
    Route::get('/edit/{id}', [MailController::class, 'edit_mail_category'])->name('edit');
    Route::get('/delete/{id}', [MailController::class, 'delete_mail_category'])->name('delete');
});
Route::middleware(['auth', 'plan_permission'])->prefix('mail')->name('mail.')->group(function(){
    Route::get('/', [MailController::class, 'index'])->name('index');
    Route::get('/create', [MailController::class, 'create_gift_mail'])->name('create');
    Route::post('/store', [MailController::class, 'store_gift_mail'])->name('store');
    Route::get('/edit-mail/{id}', [MailController::class, 'edit_mail'])->name('edit-mail');
    Route::get('/view-mail/{id}', [MailController::class, 'view_mail'])->name('view-mail');
    Route::get('/delete-mail/{id}', [MailController::class, 'delete_mail'])->name('delete-mail');
    Route::get('/testmail', [MailController::class, 'testmail'])->name('testmail');
});
// user resource and tools
Route::middleware(['auth', 'plan_permission'])->prefix('resources-and-tools')->name('resources-and-tools.')->group(function() {
    Route::get('/', [ResourceandToolsController::class, 'index'])->name('index');
    Route::get('/create', [ResourceandToolsController::class, 'create'])->name('create');
    Route::post('/store', [ResourceandToolsController::class, 'store'])->name('store');
    Route::get('/edit/{id}', [ResourceandToolsController::class, 'edit'])->name('edit');
    Route::get('/delete/{id}', [ResourceandToolsController::class, 'delete'])->name('delete'); // Use DELETE method for deletion
    Route::post('/update-authorization-status', [ResourceandToolsController::class, 'update_authorization_status'])->name('update-authorization-status');
    Route::post('/update-resource-status', [ResourceandToolsController::class, 'update_resource_status'])->name('update-resource-status');
    // Category routes
    Route::get('/category-list', [ResourceandToolsController::class, 'category_list'])->name('category-list');
    Route::get('/create-category', [ResourceandToolsController::class, 'create_category'])->name('create-category');
    Route::post('/store-category', [ResourceandToolsController::class, 'store_category'])->name('store-category');
    Route::get('/edit-category/{id}', [ResourceandToolsController::class, 'edit_category'])->name('edit-category');
    Route::get('/delete-category/{id}', [ResourceandToolsController::class, 'delete_category'])->name('delete-category');
});
// page Module
Route::middleware(['auth', 'plan_permission'])->prefix('page')->name('page.')->group(function(){
    Route::get('/', [PageController::class, 'index'])->name('index');
    Route::get('/add', [PageController::class, 'add'])->name('add');
    Route::post('/store', [PageController::class, 'store'])->name('store');
    Route::get('/edit/{id}', [PageController::class, 'edit'])->name('edit');
    Route::get('/delete/{id}', [PageController::class, 'delete'])->name('delete');
    Route::post('/get-info', [PageController::class, 'get_info'])->name('get-info');
});
// Page Module
Route::middleware(['auth', 'plan_permission'])->prefix('assets')->name('assets.')->group(function(){
    Route::get('/', [AssetsController::class, 'index'])->name('index');
    Route::get('/add', [AssetsController::class, 'add'])->name('add');
    Route::post('/store', [AssetsController::class, 'store'])->name('store');
    Route::get('/edit/{id}', [AssetsController::class, 'edit'])->name('edit');
    Route::get('/delete/{id}', [AssetsController::class, 'delete'])->name('delete');
    Route::post('/update-status', [AssetsController::class, 'update_status'])->name('update-status');
    Route::get('/get-pages', [AssetsController::class, 'get_page'])->name('get-pages');
});
Route::middleware(['auth','plan_permission'])->prefix('cdo')->name('cdo.')->group(function() {
    Route::get('/', [CDOController::class, 'index'])->name('index');
    Route::get('/create', [CDOController::class, 'create'])->name('create');
    Route::post('/store', [CDOController::class, 'store'])->name('store');
    Route::get('/edit/{id}', [CDOController::class, 'edit'])->name('edit');
    Route::get('/delete/{id}', [CDOController::class, 'delete'])->name('delete'); // Use DELETE method for deletion
    Route::post('/update-authorization-status', [CDOController::class, 'update_authorization_status'])->name('update-authorization-status');
    Route::post('/update-resource-status', [CDOController::class, 'update_resource_status'])->name('update-resource-status');
    // Category routes
    Route::get('/category-list', [CDOController::class, 'category_list'])->name('category-list');
    Route::get('/create-category', [CDOController::class, 'create_category'])->name('create-category');
    Route::post('/store-category', [CDOController::class, 'store_category'])->name('store-category');
    Route::get('/edit-category/{id}', [CDOController::class, 'edit_category'])->name('edit-category');
    Route::get('/delete-category/{id}', [CDOController::class, 'delete_category'])->name('delete-category');
});
Route::middleware(['auth','plan_permission'])->prefix('business-card')->name('business-card.')->group(function() {
    Route::get('/', [BusinessCard::class, 'index'])->name('index');
    Route::post('/save', [BusinessCard::class, 'save'])->name('save');
    Route::get('/card', [BusinessCard::class, 'card'])->name('card');
});
// Banner
Route::middleware(['auth','plan_permission'])->controller(HomeController::class)->prefix('banner')->name('banner.')->group(function() {
    Route::get('/', 'banner_list')->name('index');
    Route::get('/create', 'create_banner')->name('create');
    Route::post('/store', 'store_banner')->name('store');
    Route::get('/edit/{id}', 'edit_banner')->name('edit');
    Route::get('/delete/{id}', 'delete_banner')->name('delete');
});
// Banner
Route::middleware(['auth','plan_permission'])->prefix('web')->name('web.')->group(function() {
    // Category
    Route::get('/service-category', [WebController::class, 'service_category'])->name('service-category.index');
    Route::get('/service-category/create', [WebController::class, 'add_service_category'])->name('service-category.create');
    Route::get('/service-category/edit/{id}', [WebController::class, 'edit_service_category'])->name('service-category.edit');
    Route::get('/service-category/delete/{id}', [WebController::class, 'delete_service_category'])->name('service-category.delete');
    Route::post('/service-category/store', [WebController::class, 'store_category'])->name('service-category.store');
    // Services
    Route::get('/services', [WebController::class, 'services'])->name('services.index');
    Route::get('/service/create', [WebController::class, 'add_service'])->name('service.create');
    Route::get('/service/edit/{id}', [WebController::class, 'edit_service'])->name('service.edit');
    Route::get('/service/delete/{id}', [WebController::class, 'delete_service'])->name('service.delete');
    Route::post('/service/store', [WebController::class, 'store_service'])->name('service.store');
    // Testimonials
    Route::get('/testimonials', [WebController::class, 'testimonials'])->name('testimonials.index');
    Route::get('/testimonial/create', [WebController::class, 'add_testimonial'])->name('testimonial.create');
    Route::get('/testimonial/edit/{id}', [WebController::class, 'edit_testimonial'])->name('testimonial.edit');
    Route::get('/testimonial/delete/{id}', [WebController::class, 'delete_testimonial'])->name('testimonial.delete');
    Route::post('/testimonial/store', [WebController::class, 'store_testimonial'])->name('testimonial.store');
    // Our Clients
    Route::get('/clients', [WebController::class, 'clients'])->name('clients.index');
    Route::get('/client/create', [WebController::class, 'add_client'])->name('client.create');
    Route::get('/client/edit/{id}', [WebController::class, 'edit_client'])->name('client.edit');
    Route::get('/client/delete/{id}', [WebController::class, 'delete_client'])->name('client.delete');
    Route::post('/client/store', [WebController::class, 'store_client'])->name('client.store');
    // Quickly Analyze
    Route::get('/quickly-analyze', [WebController::class, 'quickly_analyze'])->name('quickly-analyze.index');
    Route::get('/quickly-analyze/create', [WebController::class, 'create_quickly_analyze'])->name('quickly-analyze.create');
    Route::get('/quickly-analyze/edit/{id}', [WebController::class, 'edit_quickly_analyze'])->name('quickly-analyze.edit');
    Route::get('/quickly-analyze/delete/{id}', [WebController::class, 'delete_quickly_analyze'])->name('quickly-analyze.delete');
    Route::post('/quickly-analyze/store', [WebController::class, 'store_quickly_analyze'])->name('quickly-analyze.store');


});
// Form
Route::middleware(['auth','plan_permission'])->prefix('form')->name('form.')->group(function() {
    Route::get('/', [FormController::class, 'index'])->name('index');
    Route::get('/create', [FormController::class, 'create_form'])->name('create');
    Route::post('/store', [FormController::class, 'store_form'])->name('store');
    Route::get('/edit/{id}', [FormController::class, 'edit_form'])->name('edit');
    Route::get('/delete/{id}', [FormController::class, 'delete_form'])->name('delete');
    Route::post('/get-destination', [FormController::class, 'get_destination'])->name('get-destination');
    Route::post('/get-embeded-code', [FormController::class, 'get_embeded_code'])->name('get-embeded-code');
    // Route::post('/store', [FormController::class, 'store_form'])->name('store');
});


// Faq
Route::middleware(['auth', 'plan_permission'])->prefix('faq')->name('faq.')->group(function(){
    Route::get('/',[FaqController::class,'index'])->name('index');
    Route::get('/create', [FaqController::class, 'create_faq'])->name('create.index');
    Route::post('/create/store', [FaqController::class, 'store_faq'])->name('create.store');
    Route::get('/{id}/edit', [FaqController::class, 'edit_faq'])->name('Faq.edit');
    Route::put('/{id}/update', [FaqController::class, 'update_faq'])->name('Faq.update');
    Route::delete('/{id}/delete', [FaqController::class, 'destroy_faq'])->name('Faq.destroy');

    Route::get('/category',[FaqController::class,'category'])->name('category.index');
    Route::get('/category/create', [FaqController::class, 'create_category'])->name('category.create');
    Route::post('/category/store', [FaqController::class, 'store_category'])->name('category.store');
    Route::get('/category/{id}/edit', [FaqController::class, 'edit_category'])->name('category.edit');
    Route::put('/category/{id}/update', [FaqController::class, 'update_category'])->name('category.update');
    Route::delete('/category/{id}/delete', [FaqController::class, 'destroy_category'])->name('category.destroy');

});
//Subscribe
Route::middleware(['auth', 'plan_permission'])->prefix('subscribe')->name('subscribe.')->group(function(){
    Route::get('/',[SubscribeController::class,'index'])->name('index');

});
//features
Route::middleware(['auth','plan_permission'])->prefix('features')->name('features.')->group(function(){
    Route::get('/',[FeaturesController::class,'index'])->name('index');
    Route::get('/create',[FeaturesController::class,'create_feature'])->name('create.index');
    Route::post('/create/store', [FeaturesController::class, 'store_feature'])->name('index.store');
    Route::get('/{id}/edit', [FeaturesController::class, 'edit_Feature'])->name('edit');
    Route::put('/{id}/update', [FeaturesController::class, 'update_Feature'])->name('update');
    Route::delete('/{id}/delete', [FeaturesController::class, 'destroy_Feature'])->name('destroy');


});
//Easy to share
Route::middleware(['auth','plan_permission'])->prefix('easytoshare')->name('easytoshare.')->group(function(){
    Route::get('/',[EasytoshareController::class,'index'])->name('index');
    Route::get('/create',[EasytoshareController::class,'create'])->name('create.index');
    Route::post('/create/store',[EasytoshareController::class,'store'])->name('store.index');
    Route::get('/{id}/edit', [EasytoShareController::class, 'edit'])->name('edit');
    Route::put('/{id}/update', [EasytoShareController::class, 'update'])->name('update');
    Route::delete('/{id}/destroy', [EasytoShareController::class, 'destroy'])->name('destroy');


});
//Easy to use
Route::middleware(['auth','plan_permission'])->prefix('easytouse')->name('easytouse.')->group(function(){
    Route::get('/',[EasytoUseController::class,'index'])->name('index');
    Route::get('/create',[EasytoUseController::class,'create'])->name('create.index');
    Route::post('/create/store',[EasytoUseController::class,'store'])->name('store.index');
    Route::get('/{id}/edit', [EasytoUseController::class, 'edit_use'])->name('edit.use');
    Route::put('/{id}/update', [EasytoUseController::class, 'update_use'])->name('update.use');
    Route::delete('/{id}/destroy', [EasytoUseController::class, 'destroy'])->name('destroy');

});

//Passive Profit
Route::middleware(['auth','plan_permission'])->prefix('rc-management/reword-list')->name('rc-management.')->group(function(){
	Route::get('/', [UserController::class, 'rewardlisting'])->name('reward-list');
});
Route::middleware(['auth','plan_permission'])->prefix('rc-management/setting')->name('rc-management.')->group(function(){
	
    Route::get('/', [UserController::class, 'referralsetting'])->name('setting');
    Route::post('/setting/update', [UserController::class, 'updateReferralsetting'])->name('setting.update');
});
Route::middleware(['auth','plan_permission'])->prefix('rc-management/customer-list')->name('rc-management.')->group(function(){
    
    Route::get('/', [UserController::class, 'referredcustomer'])->name('customer-list');
});
Route::middleware(['auth','plan_permission'])->prefix('rc-management/passive-profit')->name('passive-profit.')->group(function(){
    Route::get('/',[PassiveProfitController::class,'index'])->name('index');
    Route::get('/create',[PassiveProfitController::class,'create'])->name('create');
    Route::post('/store',[PassiveProfitController::class,'store'])->name('store');
    Route::get('/commission-details/{id}', [PassiveProfitController::class, 'commission_details'])->name('commission-details');
    Route::get('/approve/{id}', [PassiveProfitController::class, 'approve'])->name('approve');
    Route::get('/edit/{id}', [PassiveProfitController::class, 'edit'])->name('edit');
    Route::get('/delete/{id}', [PassiveProfitController::class, 'delete'])->name('delete');

});
Route::middleware(['auth','plan_permission'])->prefix('agent-setting')->name('agent-setting.')->group(function() {
    Route::get('/', [AgentSettingController::class,'index'])->name('index');
    Route::get('/create', [AgentSettingController::class,'create'])->name('create');
    Route::post('/store', [AgentSettingController::class,'store'])->name('store');
    Route::get('/edit/{id}', [AgentSettingController::class,'edit'])->name('edit');
    Route::get('/delete/{id}', [AgentSettingController::class,'delete'])->name('delete');
});

//how-it-works 
Route::middleware(['auth','plan_permission'])->prefix('how-it-works')->name('how-it-works.')->group(function(){
    Route::get('/',[HowItWorkController::class,'index'])->name('index');
    Route::get('/create',[HowItWorkController::class,'create'])->name('create');
    Route::post('/store',[HowItWorkController::class,'store'])->name('store');
    Route::get('/edit/{id}', [HowItWorkController::class, 'edit'])->name('edit');
    Route::get('/delete/{id}', [HowItWorkController::class, 'destroy'])->name('delete');

});

//Need-help 
Route::middleware(['auth','plan_permission'])->prefix('need-help')->name('need-help.')->group(function(){
    Route::get('/',[NeedHelpController::class,'index'])->name('index');
    Route::get('/create',[NeedHelpController::class,'create'])->name('create');
    Route::post('/store',[NeedHelpController::class,'store'])->name('store');
    Route::get('/edit/{id}', [NeedHelpController::class, 'edit'])->name('edit');
    Route::get('/delete/{id}', [NeedHelpController::class, 'destroy'])->name('delete');

});

//work-matrix 
Route::middleware(['auth','plan_permission'])->prefix('work-matrix')->name('work-matrix.')->group(function(){
    Route::get('/',[WorkMatrixController::class,'index'])->name('index');
    Route::get('/create',[WorkMatrixController::class,'create'])->name('create');
    Route::post('/store',[WorkMatrixController::class,'store'])->name('store');
    Route::get('/edit/{id}', [WorkMatrixController::class, 'edit'])->name('edit');
    Route::get('/delete/{id}', [WorkMatrixController::class, 'destroy'])->name('delete');

});
// property category
Route::middleware(['auth','plan_permission'])->prefix('property-category')->name('property-category.')->group(function(){
    Route::get('/',[PropertyCategoryController::class,'index'])->name('index');
    Route::get('/create',[PropertyCategoryController::class,'create'])->name('create');
    Route::post('/store',[PropertyCategoryController::class,'store'])->name('store');
    Route::get('/edit/{id}', [PropertyCategoryController::class, 'edit'])->name('edit');
    Route::get('/delete/{id}', [PropertyCategoryController::class, 'destroy'])->name('delete');
 
});
// Property Type
Route::middleware(['auth','plan_permission'])->prefix('property-type')->name('property-type.')->group(function(){
    Route::get('/',[PropertyCategoryController::class,'index_Property_type'])->name('index');
    Route::get('/create',[PropertyCategoryController::class,'create_Property_type'])->name('create');
    Route::post('/store',[PropertyCategoryController::class,'store_Property_type'])->name('store');
    Route::get('/edit/{id}', [PropertyCategoryController::class, 'edit_Property_type'])->name('edit');
    Route::get('/delete/{id}', [PropertyCategoryController::class, 'destroy_Property_type'])->name('delete');
    Route::post('/get-by-category', [PropertyCategoryController::class, 'get_by_category'])->name('get-by-category');
 
});

// Call to action
Route::middleware(['auth','plan_permission'])->prefix('call-to-action')->name('call-to-action.')->group(function(){
    Route::get('/', [CalltoActionController::class, 'index'])->name('index');
    Route::get('/create', [CalltoActionController::class, 'create'])->name('create');
    Route::post('/store', [CalltoActionController::class, 'store'])->name('store');
    Route::get('/edit/{id}', [CalltoActionController::class, 'edit'])->name('edit');
    Route::get('/delete/{id}', [CalltoActionController::class, 'delete'])->name('delete');
});
// Call to action
Route::middleware(['auth','plan_permission'])->prefix('header-navigation')->name('header-navigation.')->group(function(){
    Route::get('/', [HeaderNavigationController::class, 'index'])->name('index');
    Route::get('/create', [HeaderNavigationController::class, 'create'])->name('create');
    Route::post('/store', [HeaderNavigationController::class, 'store'])->name('store');
    Route::get('/edit/{id}', [HeaderNavigationController::class, 'edit'])->name('edit');
    Route::get('/delete/{id}', [HeaderNavigationController::class, 'destroy'])->name('delete');
});

// embed page
Route::middleware(['auth','plan_permission'])->prefix('embed-page')->name('embed-page.')->group(function(){
    Route::get('/', [EmbedPageController::class, 'index'])->name('index');
    Route::get('/create', [EmbedPageController::class, 'create'])->name('create');
    Route::post('/store', [EmbedPageController::class, 'store'])->name('store');
    Route::get('/edit/{id}', [EmbedPageController::class, 'edit'])->name('edit');
    Route::delete('/delete/{id}', [EmbedPageController::class, 'destroy'])->name('delete');
});


Route::middleware(['auth','plan_permission'])->prefix('about-us')->name('about-us.')->group(function(){
    Route::get('/', [AboutUsController::class, 'index'])->name('index');
    Route::get('/create', [AboutUsController::class, 'create'])->name('create');
    Route::post('/store', [AboutUsController::class, 'store'])->name('store');
    Route::get('/edit/{id}', [AboutUsController::class, 'edit'])->name('edit');
    Route::get('/delete/{id}', [AboutUsController::class, 'destroy'])->name('delete');
});

Route::middleware(['auth','plan_permission'])->prefix('meet-team')->name('meet-team.')->group(function(){
    Route::get('/', [MeetTeamController::class, 'index'])->name('index');
    Route::get('/create', [MeetTeamController::class, 'create'])->name('create');
    Route::post('/store', [MeetTeamController::class, 'store'])->name('store');
    Route::get('/edit/{id}', [MeetTeamController::class, 'edit'])->name('edit');
    Route::get('/delete/{id}', [MeetTeamController::class, 'destroy'])->name('delete');
});
Route::middleware(['auth','plan_permission'])->prefix('meet-category')->name('meet-category.')->group(function(){
    Route::get('/', [MeetCategoryController::class, 'index'])->name('index');
    Route::get('/create', [MeetCategoryController::class, 'create'])->name('create');
    Route::post('/store', [MeetCategoryController::class, 'store'])->name('store');
    Route::get('/edit/{id}', [MeetCategoryController::class, 'edit'])->name('edit');
    Route::get('/delete/{id}', [MeetCategoryController::class, 'destroy'])->name('delete');
});
Route::middleware(['auth','plan_permission'])->prefix('team-detail')->name('team-detail.')->group(function(){
    Route::get('/', [TeamDetailController::class, 'index'])->name('index');
    Route::get('/create', [TeamDetailController::class, 'create'])->name('create');
    Route::post('/store', [TeamDetailController::class, 'store'])->name('store');
    Route::get('/edit/{id}', [TeamDetailController::class, 'edit'])->name('edit');
    Route::get('/delete/{id}', [TeamDetailController::class, 'destroy'])->name('delete');
});
Route::middleware(['auth','plan_permission'])->prefix('web-setting')->name('web-setting.')->group(function(){
    Route::get('/', [WebSettingController::class, 'index'])->name('index');
    Route::get('/create', [WebSettingController::class, 'create'])->name('create');
    Route::post('/store', [WebSettingController::class, 'store'])->name('store');
    Route::get('/edit/{id}', [WebSettingController::class, 'edit'])->name('edit');
    Route::get('/delete/{id}', [WebSettingController::class, 'destroy'])->name('delete');
});
Route::middleware('auth')->prefix('media')->name('media.')->group(function(){
    Route::get('/', [MediaController::class, 'index'])->name('index');
    Route::get('/create', [MediaController::class, 'create'])->name('create');
    Route::post('/store', [MediaController::class, 'store'])->name('store');
    Route::get('/edit/{id}', [MediaController::class, 'edit'])->name('edit');
    Route::get('/delete/{id}', [MediaController::class, 'destroy'])->name('delete');
});
Route::middleware(['auth','plan_permission'])->prefix('join-as-affiliate')->name('join-as-affiliate.')->group(function(){
    Route::get('/', [JoinAsAffiliateController::class, 'index'])->name('index');
    Route::get('/create', [JoinAsAffiliateController::class, 'create'])->name('create');
    Route::post('/store', [JoinAsAffiliateController::class, 'store'])->name('store');
    Route::get('/edit/{id}', [JoinAsAffiliateController::class, 'edit'])->name('edit');
    Route::get('/delete/{id}', [JoinAsAffiliateController::class, 'destroy'])->name('delete');
    Route::get('/enquiry', [JoinAsAffiliateController::class, 'enquiry'])->name('enquiry');
});

Route::middleware(['auth','plan_permission'])->prefix('landing-banner')->name('landing-banner.')->group(function(){
    Route::get('/', [LandingBannerController::class, 'index'])->name('index');
    Route::get('/create', [LandingBannerController::class, 'create'])->name('create');
    Route::post('/store', [LandingBannerController::class, 'store'])->name('store');
    Route::get('/edit/{id}', [LandingBannerController::class, 'edit'])->name('edit');
    Route::get('/delete/{id}', [LandingBannerController::class, 'destroy'])->name('delete');
//  Slider image delete route
    Route::get('/image/delete/{id}', [LandingBannerController::class, 'deleteSliderImage'])->name('image.delete');
});
Route::middleware(['auth','plan_permission'])->prefix('landing-location')->name('landing-location.')->group(function(){
    Route::get('/', [LandingLocationController::class, 'index'])->name('index');
    Route::get('/create', [LandingLocationController::class, 'create'])->name('create');
    Route::post('/store', [LandingLocationController::class, 'store'])->name('store');
    Route::get('/edit/{id}', [LandingLocationController::class, 'edit'])->name('edit');
    Route::get('/delete/{id}', [LandingLocationController::class, 'destroy'])->name('delete');
});
Route::middleware(['auth','plan_permission'])->prefix('reviews')->name('reviews.')->group(function(){
    Route::get('/', [ReviewsController::class, 'index'])->name('index');
    Route::get('/create', [ReviewsController::class, 'create'])->name('create');
    Route::post('/store', [ReviewsController::class, 'store'])->name('store');
    Route::get('/edit/{id}', [ReviewsController::class, 'edit'])->name('edit');
    Route::get('/delete/{id}', [ReviewsController::class, 'destroy'])->name('delete');
});
Route::middleware(['auth','plan_permission'])->prefix('app-feedback')->name('app-feedback.')->group(function(){
    Route::get('/', [FeedbackController::class, 'index'])->name('index');
   
});
Route::middleware(['auth','plan_permission'])->prefix('project-category')->name('project-category.')->group(function(){
    Route::get('/', [ProjectCategoryController::class, 'index'])->name('index');
    Route::get('/create', [ProjectCategoryController::class, 'create'])->name('create');
    Route::post('/store', [ProjectCategoryController::class, 'store'])->name('store');
    Route::get('/edit/{id}', [ProjectCategoryController::class, 'edit'])->name('edit');
    Route::get('/delete/{id}', [ProjectCategoryController::class, 'destroy'])->name('delete');
});
Route::middleware(['auth','plan_permission'])->prefix('project')->name('project.')->group(function(){
    Route::get('/', [ProjectController::class, 'index'])->name('index');
    Route::get('/create', [ProjectController::class, 'create'])->name('create');
    Route::post('/store', [ProjectController::class, 'store'])->name('store');
    Route::get('/edit/{id}', [ProjectController::class, 'edit'])->name('edit');
    Route::get('/delete/{id}', [ProjectController::class, 'destroy'])->name('delete');
});
Route::middleware(['auth','plan_permission'])->prefix('booking-event')->name('booking-event.')->group(function(){
    Route::get('/', [BookingEventController::class, 'index'])->name('index');
    Route::get('/create', [BookingEventController::class, 'create'])->name('create');
    Route::post('/store', [BookingEventController::class, 'store'])->name('store');
    Route::get('/edit/{id}', [BookingEventController::class, 'edit'])->name('edit');
    Route::get('/delete/{id}', [BookingEventController::class, 'destroy'])->name('delete');
});

// cdb plan permissionns
Route::middleware(['auth', 'plan_permission'])->prefix('cdb-plan')->name('cdb-plan.')->group(function(){
    Route::get('/', [CDBPlansController::class, 'index'])->name('index');
    Route::post('/store', [CDBPlansController::class, 'store'])->name('store');
    Route::get('/delete/{id}', [CDBPlansController::class, 'delete'])->name('delete');
    Route::get('/permissions/{id}', [CDBPlansController::class, 'permissions'])->name('permissions');
    Route::post('/update-permissions/', [CDBPlansController::class, 'updatePermissions'])->name('permissions.update');
    Route::get('/reload-permission/', [CDBPlansController::class, 'refreshPermission'])->name('reload-permission');
});
// cdb plan permissionns
Route::middleware(['auth', 'plan_permission'])->prefix('plan-type')->name('plan-type.')->group(function(){
    Route::get('/', [PlanTypeController::class, 'index'])->name('index');
    Route::post('/store', [PlanTypeController::class, 'store'])->name('store');
    Route::get('/delete/{id}', [PlanTypeController::class, 'delete'])->name('delete');
});

Route::middleware('auth')->prefix('appointment-booking')->name('appointment-booking.')->group(function(){
    Route::get('/', [AppointmentBookingController::class, 'index'])->name('index');
    Route::get('/create', [AppointmentBookingController::class, 'create'])->name('create');
    Route::post('/store', [AppointmentBookingController::class, 'store'])->name('store');
    Route::get('/edit/{id}', [AppointmentBookingController::class, 'edit'])->name('edit');
    Route::get('/delete/{id}', [AppointmentBookingController::class, 'destroy'])->name('delete');
    Route::get('/status/{id}/{status}', [AppointmentBookingController::class, 'updateStatus'])->name('updateStatus');    
});
Route::middleware('auth')->prefix('appointment-thankyou')->name('appointment-thankyou.')->group(function(){
    Route::get('/', [AppointmentThankyouController::class, 'index'])->name('index');
    Route::get('/create', [AppointmentThankyouController::class, 'create'])->name('create');
    Route::post('/store', [AppointmentThankyouController::class, 'store'])->name('store');
    Route::get('/edit/{id}', [AppointmentThankyouController::class, 'edit'])->name('edit');
    Route::get('/delete/{id}', [AppointmentThankyouController::class, 'destroy'])->name('delete');
    Route::get('/sm-status/{id}/{status}', [AppointmentThankyouController::class, 'updateSmStatus'])->name('updateSmStatus'); 
    Route::get('/nf-status/{id}/{status}', [AppointmentThankyouController::class, 'updateNfStatus'])->name('updateNfStatus'); 
    
});
Route::middleware('auth')->prefix('appointment-homework')->name('appointment-homework.')->group(function(){
    Route::get('/', [AppointmentBookingHomeworkController::class, 'index'])->name('index');
    Route::get('/create', [AppointmentBookingHomeworkController::class, 'create'])->name('create');
    Route::post('/store', [AppointmentBookingHomeworkController::class, 'store'])->name('store');
    Route::get('/edit/{id}', [AppointmentBookingHomeworkController::class, 'edit'])->name('edit');
    Route::get('/delete/{id}', [AppointmentBookingHomeworkController::class, 'destroy'])->name('delete');
    Route::get('/fd-status/{id}/{status}', [AppointmentBookingHomeworkController::class, 'updateFdStatus'])->name('updateFdStatus');    
});


