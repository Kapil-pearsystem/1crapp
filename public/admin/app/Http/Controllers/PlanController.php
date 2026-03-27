<?php
namespace App\Http\Controllers;
use App\Models\User;
use App\Models\PriceModuleCategory;
use App\Models\PriceModule;
use App\Models\SubscriptionPlan;
use App\Models\PlanFeature;
use App\Models\PlanPermissionModel;
use App\Exports\UsersExport;
use App\Imports\UsersImport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Route;
use App\Helper\Helper;

class PlanController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:plan-list|plan-create|plan-edit|plan-delete', ['only' => ['index']]);
        $this->middleware('permission:plan-create', ['only' => ['create','store', 'updateStatus']]);
        $this->middleware('permission:plan-edit', ['only' => ['edit','update']]);
       // $this->middleware('permission:user-delete', ['only' => ['delete']]);
    }
    /**
     * List User
     * @param Nill
     * @return Array $user
     * @author Shani Singh
     */
    public function index()
    {
        $subscription_plan = SubscriptionPlan::all();
        return view('planadd.index', ['admin' => 1,'subscription_plan'=>$subscription_plan]);
    }
    /**
     * Create User
     * @param Nill
     * @return Array $user
     * @author Shani Singh
     */
     
    public function create()
    {
        // Step 1: Collect unique route prefixes having auth + plan_permission
        $prefixes = collect(Route::getRoutes())
            ->filter(function ($route) {
    
                $middlewares = $route->middleware();
    
                return in_array('GET', $route->methods())
                    && in_array('web', $middlewares)
                    && in_array('auth', $middlewares)
                    && in_array('plan_permission', $middlewares)
                    && !empty($route->getPrefix());
            })
            ->map(function ($route) {
                return trim($route->getPrefix(), '/');
            })
            ->unique()
            ->values();
    
        // Step 2: Convert prefixes into feature structure
        $planFeatures = $prefixes
            ->map(function ($prefix) {
    
                // Only first segment as module
                $segments = explode('/', $prefix);
                $module = ucfirst(str_replace('-', ' ', $segments[0]));
    
                return [
                    'module'      => $module,
                    'feature_key' => $prefix,
                ];
            })
            ->groupBy('module');
    
        return view('planadd.add-plan', [
            'admin'            => 1,
            'planfeature'      => $planFeatures,
            'selectedFeatures' => [] // for edit case
        ]);
    }

    /**
     * Store User
     * @param Request $request
     * @return View Users
     * @author Shani Singh
     */
    // public function store(Request $request)
    // {
    //     // Validations
    //     $request->validate([
    //         'title'    => 'required',
    //         'monthly_price'     => 'required',
    //         'yearly_price'     => 'required',
    //         'trial_duration'     => 'required',
    //         'status'       =>  'required|numeric|in:0,1',
    //     ]);
    //     // dd($request->features);
    //     DB::beginTransaction();
    //     try {
    //         $sub_plan = new SubscriptionPlan;
    //         $sub_plan->title = $request->title;
    //         $sub_plan->sub_title = $request->sub_title;
    //         $sub_plan->monthly_price = $request->monthly_price;
    //         $sub_plan->yearly_price = $request->yearly_price;
    //         $sub_plan->trial_duration = $request->trial_duration;
    //         $sub_plan->added_by = Auth()->user()->id;
    //         $sub_plan->features = implode(',',$request->features);
    //         $sub_plan->status = $request->status;
    //         $sub_plan->mail_temp_status = $request->mail_temp_status;
    //         $sub_plan->total_mail_temp = $request->total_mail_temp;
    //         $sub_plan->priority = $request->priority;
    //         $sub_plan->created_at = now();
    //         $sub_plan->updated_at = now();
    //         $sub_plan->save();
    //         DB::commit();
    //         // Store Permissions
    //       $this->save_permissions($sub_plan->id, $request);

    //         return redirect()->route('planadd.index')->with('success','Plan Added Successfully.');
    //     } catch (\Throwable $th) {
    //         // Rollback and return with Error
    //         DB::rollBack();
    //         return redirect()->back()->withInput()->with('error', $th->getMessage());
    //     }
    // }
    // public function save_permissions($plan_id, $request)
    // {
    //     $planId = $plan_id;
    //     $selectedModules = $request->input('features', []); // E.g. ['Banner', 'Notification']

    //     $allGetRoutes = collect(Route::getRoutes())->filter(function ($route) {
    //         return in_array('web', $route->middleware()) &&
    //             in_array('plan_permission', $route->middleware()) &&
    //             in_array('GET', $route->methods()) &&
    //             isset($route->action['prefix']);
    //     })->map(function ($route) {
    //         $segments = explode('/', trim($route->uri(), '/'));
    //         $module = isset($segments[0]) ? ucfirst($segments[0]) : 'General';

    //         // Clean URI: remove dynamic segments like {id}, {slug}, etc.
    //         $cleanUri = collect($segments)->reject(function ($seg) {
    //             return str_starts_with($seg, '{') && str_ends_with($seg, '}');
    //         })->implode('/');

    //         return [
    //             'module' => $module,
    //             'uri' => $cleanUri,
    //             'name' => $route->getName() ?? 'no-name',
    //         ];
    //     });
    //     /** ✅ SAVE ALL MODULES IN FEATURES TABLE **/
    //     $allModules = $allGetRoutes->pluck('module')->unique();
    
    //     foreach ($allModules as $module) {
    //         PlanFeature::updateOrCreate(
    //             ['f_key' => strtolower($module)],
    //             ['title' => $module]
    //         );
    //     }
    //     // Get only selected modules
    //     $finalPermissions = $allGetRoutes->filter(function ($route) use ($selectedModules) {
    //         return in_array($route['module'], $selectedModules);
    //     })->pluck('uri')->unique()->values();

    //     // Remove old permissions
    //     PlanPermissionModel::where('plan_id', $planId)->delete();

    //     // Save new ones
    //     foreach ($finalPermissions as $uri) {
    //         PlanPermissionModel::create([
    //             'plan_id' => $planId,
    //             'permission' => $uri,
    //         ]);
    //     }

    //     return true;
    // }
    public function store(Request $request)
    {
        // Validations
        $request->validate([
            'title'           => 'required',
            'monthly_price'   => 'required',
            'trial_duration'  => 'required',
            'status'          => 'required|numeric|in:0,1',
            'features'        => 'required|array|min:1', // Ensure at least one feature selected
            'total_mail_temp' => 'nullable|numeric',
            'mail_temp_status'=> 'nullable|in:0,1'
        ]);
    
        DB::beginTransaction();
        try {
            $sub_plan = new SubscriptionPlan;
            $sub_plan->title           = $request->title;
            $sub_plan->sub_title       = $request->sub_title;
            $sub_plan->monthly_price   = $request->monthly_price;
            // $sub_plan->yearly_price    = $request->yearly_price;
            $sub_plan->discount    = $request->discount;
            $sub_plan->trial_duration  = $request->trial_duration;
            $sub_plan->added_by        = auth()->user()->id;
            $sub_plan->features        = implode(',', $request->features); // save feature keys
            $sub_plan->status          = $request->status;
            $sub_plan->priority        = $request->priority ?? 0;
            $sub_plan->mail_temp_status= $request->mail_temp_status ?? 0;
            $sub_plan->total_mail_temp = $request->total_mail_temp ?? 0;
            $sub_plan->created_at      = now();
            $sub_plan->updated_at      = now();
            $sub_plan->save();
    
            // Save permissions for selected features
            $this->save_permissions($sub_plan->id, $request->features);
    
            DB::commit();
            return redirect()->route('planadd.index')->with('success','Plan Added Successfully.');
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back()->withInput()->with('error', $th->getMessage());
        }
    }
    
    /**
     * Save selected permissions for the plan
     *
     * @param int $planId
     * @param array $selectedModules
     */
    public function save_permissions($planId, $selectedModules = [])
    {
        // dd($selectedModules);
        // Step 1: Get all GET routes with web + auth + plan_permission middleware
        $allRoutes = collect(Route::getRoutes())->filter(function ($route) {
            $middlewares = $route->middleware();
            return in_array('GET', $route->methods())
                && in_array('web', $middlewares)
                && in_array('auth', $middlewares)
                && in_array('plan_permission', $middlewares)
                && !empty($route->getPrefix());
        })->map(function ($route) {
            $segments = explode('/', trim($route->uri(), '/'));
    
            // Module name = first segment
            $module = ucfirst(str_replace('-', ' ', $segments[0]));
    
            // Clean URI: remove dynamic segments like {id}, {slug}, etc.
            $cleanUri = collect($segments)->reject(function ($seg) {
                return str_starts_with($seg, '{') && str_ends_with($seg, '}');
            })->implode('/');
    
            // Feature label with '>>' separator
            $featureLabel = ucwords(str_replace('/', ' >> ', $cleanUri));
    
            return [
                'module' => $module,
                'uri'    => $cleanUri,
                'label'  => $featureLabel,
            ];
        });
    
        // Step 2: Save all modules/features in PlanFeature table
        $allRoutes->each(function ($route) {
            PlanFeature::updateOrCreate(
                ['f_key' => strtolower($route['uri'])], // unique key
                ['title' => $route['label']]            // display label
            );
        });
    
        // Step 3: Filter only selected modules for this plan
       

        // dd($finalPermissions);
        // Step 4: Remove old permissions and save new ones
        PlanPermissionModel::where('plan_id', $planId)->delete();
        foreach ($selectedModules as $uri) {
            PlanPermissionModel::create([
                'agent_id'   => auth()->user()->id,
                'plan_id'    => $planId,
                'permission' => $uri,
            ]);
        }
    
        return true;
    }


    /**
     * Update Status Of User
     * @param Integer $status
     * @return List Page With Success
     * @author Shani Singh
     */
    public function updateStatus($pricing_id, $status)
    {
        // Validation
        $validate = Validator::make([
            'pricing_id'   => $pricing_id,
            'status'    => $status
        ], [
            'pricing_id'   =>  'required|exists:price_modules,id',
            'status'    =>  'required|in:0,1',
        ]);
        // If Validations Fails
        if($validate->fails()){
            return redirect()->route('pricing.index')->with('error', $validate->errors()->first());
        }
        try {
            DB::beginTransaction();
            // Update Status
            PriceModule::whereId($pricing_id)->update(['status' => $status]);
            // Commit And Redirect on index with Success Message
            
            DB::commit();
            return redirect()->route('pricing.index')->with('success','Pricing Status Updated Successfully!');
        } catch (\Throwable $th) {
            // Rollback & Return Error Message
            DB::rollBack();
            return redirect()->back()->with('error', $th->getMessage());
        }
    }
    /**
     * Edit User
     * @param Integer $user
     * @return Collection $user
     * @author Shani Singh
     */
    public function edit(SubscriptionPlan $plan)
    {
        // STEP 1: Collect routes with plan_permission middleware
        $prefixes = collect(Route::getRoutes())
            ->filter(function ($route) {
                return in_array('GET', $route->methods())
                    && in_array('web', $route->middleware())
                    && in_array('plan_permission', $route->middleware())
                    && !empty($route->getPrefix());
            })
            ->map(function ($route) {
                return trim($route->getPrefix(), '/');
            })
            ->unique()
            ->values();
    
        // STEP 2: Convert into SAME structure as Add page
        $planFeatures = $prefixes->map(function ($prefix) {
            $segments = explode('/', $prefix);
            $module = ucfirst(str_replace('-', ' ', $segments[0]));
    
            return [
                'module' => $module,
                'feature_key' => $prefix,
                'label' => ucwords(str_replace(['-', '/'], ' ', $prefix)),
            ];
        })->groupBy('module');
    
        // STEP 3: Selected features (FULL prefix)
        $selectedFeatures = PlanPermissionModel::where('plan_id', $plan->id)
            ->pluck('permission')
            ->toArray();
    
        return view('planadd.edit-plan', [
            'plan' => $plan,
            'admin' => 1,
            'planfeature' => $planFeatures,   // ✅ SAME AS ADD
            'selectedFeatures' => $selectedFeatures,
        ]);
    }


    // public function edit(SubscriptionPlan $plan)
    // {

    //     // dd(\App\Helper\Helper::hasPermission());
    //     // dd(\App\Helper\Helper::cleanUri());
    //     // Get all routes with 'plan_permission' middleware
    //     $routes = collect(Route::getRoutes())->filter(function ($route) {
    //         return in_array('web', $route->middleware()) &&
    //             in_array('plan_permission', $route->middleware()) &&
    //             in_array('GET', $route->methods()) &&
    //             isset($route->action['prefix']);
    //     })->map(function ($route) {
    //         $segments = explode('/', trim($route->uri(), '/'));
    //         $module = isset($segments[0]) ? ucfirst($segments[0]) : 'General';

    //         return [
    //             'module' => $module,
    //             'uri' => $route->uri(),
    //             'name' => $route->getName() ?? 'no-name',
    //         ];
    //     });

    //     // Group routes by module name
    //     $grouped = $routes->groupBy('module')->map(function ($items, $module) {
    //         return [
    //             'module' => $module,
    //             'routes' => $items->pluck('uri')->toArray(),
    //         ];
    //     });

    //     // Get selected permissions for this plan from DB
    //     $selectedPermissions = PlanPermissionModel::where('plan_id', $plan->id)
    //         ->pluck('permission')
    //         ->toArray();

    //     // Extract selected modules from URIs
    //     $selectedModules = collect($selectedPermissions)->map(function ($uri) {
    //         $segments = explode('/', trim($uri, '/'));
    //         return isset($segments[0]) ? ucfirst($segments[0]) : 'General';
    //     })->unique()->values()->toArray();

    //     return view('planadd.edit-plan')->with([
    //         'planfeature' => $grouped,
    //         'plan' => $plan,
    //         'admin' => 1,
    //         'selectedFeatures' => $selectedModules,
    //     ]);
    // }

    public function destroy($id)
    {
        $plan = SubscriptionPlan::find($id);
    
        if (!$plan) {
            return redirect()->back()->with('error', 'Plan not found.');
        }
    
        try {
            $plan->delete(); // Soft delete
            return redirect()->route('planadd.index')->with('success', 'Plan deleted successfully.');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }
    }


    /**
     * Update User
     * @param Request $request, User $user
     * @return View Users
     * @author Shani Singh
     */
    public function update(Request $request, SubscriptionPlan $plan)
    {
        // Validations
        $request->validate([
            'title'           => 'required',
            'monthly_price'   => 'required',
            'trial_duration'  => 'required',
            'status'          => 'required|numeric|in:0,1',
            'features'        => 'required|array|min:1', // Ensure at least one feature selected
            'total_mail_temp' => 'nullable|numeric',
            'mail_temp_status'=> 'nullable|in:0,1'
        ]);
    
        DB::beginTransaction();
        try {
            $sub_plan = SubscriptionPlan::findOrFail($plan->id);
    
            $sub_plan->title            = $request->title;
            $sub_plan->sub_title        = $request->sub_title;
            $sub_plan->monthly_price    = $request->monthly_price;
            // $sub_plan->yearly_price     = $request->yearly_price;
            $sub_plan->discount    = $request->discount;
            $sub_plan->trial_duration   = $request->trial_duration;
            $sub_plan->features         = implode(',', $request->features); // save selected module keys
            $sub_plan->status           = $request->status;
            $sub_plan->priority         = $request->priority ?? 0;
            $sub_plan->mail_temp_status = $request->mail_temp_status ?? 0;
            $sub_plan->total_mail_temp  = $request->total_mail_temp ?? 0;
            $sub_plan->updated_at       = now();
    
            $sub_plan->save();
            // dd($request->features);
            // Save permissions for selected modules
            $this->save_permissions($sub_plan->id, $request->features);
    
            DB::commit();
    
            return redirect()->route('planadd.index')->with('success', 'Plan Updated Successfully.');
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back()->withInput()->with('error', $th->getMessage());
        }
    }

    /**
     * Delete User
     * @param User $user
     * @return Index Users
     * @author Shani Singh
     */
    public function delete(PriceModule $pricing)
    {
        DB::beginTransaction();
        try {
            // Delete User
            //PriceModule::whereId($pricing->id)->delete();
            SubscriptionPlan::whereId($pricing->id)->delete();
            DB::commit();
            return redirect()->route('planadd.index')->with('success', 'Pricing Deleted Successfully!.');
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back()->with('error', $th->getMessage());
        }
    }
    /**
     * Import Users
     * @param Null
     * @return View File
     */
    public function importUsers()
    {
        return view('users.import');
    }
    public function uploadUsers(Request $request)
    {
        Excel::import(new UsersImport, $request->file);
        return redirect()->route('users.index')->with('success', 'User Imported Successfully');
    }
    public function export()
    {
        return Excel::download(new UsersExport, 'agents.xlsx');
    }
       /**
     * Edit User
     * @param Integer $user
     * @return Collection $user
     * @author Shani Singh
     */
    public function editCategoryPrices(Request $request)
    {
        $pricing = PriceModuleCategory::get();
        return view('pricing.edit-price-category')->with([
            'pricing'  => $pricing,
            'admin' => 1
        ]);
    }
    /**
     * Update User
     * @param Request $request, User $user
     * @return View Users
     * @author Shani Singh
     */
    public function updateCategoryPrices(Request $request)
    {
       /* // Validations
        $request->validate([
            'amount'    => 'required',
        ]);
*/
        DB::beginTransaction();
        try {
            foreach($request->amount as $key=>$amountlist){
                   // Store Data
            $user_updated = PriceModuleCategory::whereId($key)->update([
                 'amount'    => $amountlist,
            ]);
            }
            // Commit And Redirected To Listing
            DB::commit();
            return redirect()->route('pricing.editCategoryPrices')->with('success','Category Price Updated Successfully.');
        } catch (\Throwable $th) {
            // Rollback and return with Error
            DB::rollBack();
            return redirect()->back()->withInput()->with('error', $th->getMessage());
        }
    }


}