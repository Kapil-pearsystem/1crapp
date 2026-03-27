<?php
namespace App\Http\Controllers;
use App\Models\Customer;
use App\Models\User;
use App\Models\TagsModel;
use App\Models\ContactModel;
use App\Models\CustomerPortfolio;
use App\Models\UserDetails;
use App\Models\CDOModel;
use App\Models\UserCompanyDetails;
use App\Models\UserSocialNetworks;
use App\Exports\CustomerExport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\ValidationException;
class CustomerController extends Controller
{
    /**
     * CustomerController constructor.
     * Define middlewares for customer permissions.
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:customer-list|customer-create|customer-edit|customer-delete', ['only' => ['index']]);
        $this->middleware('permission:customer-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:customer-edit', ['only' => ['edit', 'update', 'updateStatus']]);
    }
    /**
     * List customers.
     *
     * @param Request $request
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $agentdetail = "";
        if (request('agent') || Auth()->user()->hasRole('Agent')) {
            $agentdetail = User::where('id', request('agent'))->first();
            // dd($agentdetail);
            if (Auth()->user()->hasRole('Agent')) {
                $users = Customer::where('agent_id', Auth()->user()->id)
                    ->join('agents', 'agents.id', 'users.agent_id')
                    ->leftJoin('tbl_contact', 'tbl_contact.id', '=', 'users.contact_id')
                    ->leftJoin('tbl_tags', 'tbl_tags.id', '=', 'users.tag_id')
                    ->select('users.*', 'agents.first_name', 'agents.last_name', 'agents.company_id', 'tbl_contact.name as list_name','tbl_tags.name as tag_name')
                    ->where('users.type', 1)
                    ->orderBy('users.id', 'DESC')
                    ->get();
            } else {
                $users = Customer::where('agent_id', request('agent'))
                    ->join('agents', 'agents.id', 'users.agent_id')
                    ->leftJoin('tbl_contact', 'tbl_contact.id', '=', 'users.contact_id')
                    ->leftJoin('tbl_tags', 'tbl_tags.id', '=', 'users.tag_id')
                    ->select('users.*', 'agents.first_name', 'agents.last_name', 'agents.company_id', 'tbl_contact.name as list_name','tbl_tags.name as tag_name')
                    ->where('users.type', 1)
                    ->orderBy('users.id', 'DESC')
                    ->get();
            }
        } else {
            $users = Customer::leftJoin('agents', 'agents.id', '=', 'users.agent_id')
                ->leftJoin('tbl_contact', 'tbl_contact.id', '=', 'users.contact_id')
                ->leftJoin('tbl_tags', 'tbl_tags.id', '=', 'users.tag_id')
                ->select('users.*', 'agents.first_name', 'agents.last_name', 'agents.company_id', 'tbl_contact.name as list_name','tbl_tags.name as tag_name')
                ->orderBy('users.id', 'DESC')
                ->get();
        }
        // dd('hello');
        return view('customer.index', ['users' => $users, 'agentdetail' => $agentdetail]);
    }
    /**
     * Show the form for creating a new customer.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $roles = Role::all();
        return view('users.add', ['roles' => $roles]);
    }
    /**
     * Store a new customer in the database.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        // Validations
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:agents,email',
            'mobile' => 'required|numeric|digits:10',
            'status' => 'required|numeric|in:0,1',
        ]);
        DB::beginTransaction();
        try {
            // Store Data
            $user = Customer::create([
                'name' => $request->name,
                'email' => $request->email,
                'mobile' => $request->mobile,
                'status' => $request->status,
                'password' => Hash::make($request->name . '@' . $request->number),
            ]);
            // Update Member ID
            $users = User::find($user->id);
            $users->memberid = 'MEM_' . $user->id;
            $users->save();
            DB::commit();
            return redirect()->route('customer.index')->with('success', 'Customer Added Successfully.');
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back()->withInput()->with('error', $th->getMessage());
        }
    }
    /**
     * Update the status of a customer.
     *
     * @param int $user_id
     * @param int $status
     * @param string|null $reason
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateStatus($user_id, $status, $reason = null)
    {
        // Validation
        $validate = Validator::make(
            [
                'user_id' => $user_id,
                'status' => $status,
            ],
            [
                'user_id' => 'required|exists:users,id',
                'status' => 'required|in:0,1',
            ]
        );
        if ($validate->fails()) {
            return redirect()->route('customer.index')->with('error', $validate->errors()->first());
        }
        DB::beginTransaction();
        try {
            // Update Status with or without reason
            Customer::whereId($user_id)->update([
                'status' => $status,
                'reason' => $reason ?? '',
            ]);
            DB::commit();
            return redirect()->route('customer.index')->with('success', 'Customer Status Updated Successfully!');
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back()->with('error', $th->getMessage());
        }
    }
    /**
     * Show the form for editing a customer.
     *
     * @param Customer $user
     * @return \Illuminate\View\View
     */
    public function edit(Customer $user)
    {
        $tags = TagsModel::where(['created_by'=>auth()->user()->id,'status'=>1])->get();
        $contacts = ContactModel::where(['created_by'=>auth()->user()->id,'status'=>1])->get();
        $cdos = CDOModel::select('name','id')->where(['created_by'=>auth()->user()->id,'status'=>1])->get();
        // Get customer details along with their associated details
        $customer = Customer::select('users.id as customer_id',
        'users.status as customer_status',
        'users.profile_image as user_profile',
        'users.*', 'user_details.*',
        'user_company_details.*',
        'user_social_networks.*')
            ->leftJoin('user_details', 'user_details.user_id', '=', 'users.id')
            ->leftJoin('user_company_details', 'user_company_details.user_id', '=', 'users.id')
            ->leftJoin('user_social_networks', 'user_social_networks.user_id', '=', 'users.id')
            ->where('users.id', $user->id) // Corrected the ID fetching
            ->first();
        // dd($cdo);
        if (!$customer) {
            return redirect()->back()->with('error', 'Customer not found');
        }
        // Break down the full name into first, middle, and last name
        $names = $this->get_all_name($customer->name); // Assuming 'name' is a full name
        $customer->first_name = $names['first_name'];
        $customer->middle_name = $names['middle_name'];
        $customer->last_name = $names['last_name'];
        // dd($customer);
        // Return the customer data to the view
        return view('customermanagement.edit-customer-profile', compact('customer','tags','contacts','cdos'));
    }
    public function check_username(Request $request){
        $request->validate([
            'username' => 'required',
            'customer_id' => 'required',
        ]);
        $user = DB::table('users')
        ->where('user_name', $request->username)
        ->where('id', '!=', $request->customer_id)
        ->first();
        // Check if user exists
        if (is_null($user)) {
            return response()->json([
                'status' => true,
            ]);
        }else{
            return response()->json([
                'status' => false,
            ]);
        }
    }
    public function update_customer_details(Request $request){
        $customer = Customer::findOrFail($request->user_id);
        if(is_null($customer)){
            return redirect()->back()->withInput()->with('password-error','Customer Not Found!');
        }
        $validator = Validator::make($request->all(),[
            'user_name'        => 'required|unique:users,user_name,' . $request->user_id, // Exclude the current user ID
            'email'           => 'required|email|unique:users,email,' . $request->user_id, // Exclude current user email
            'first_name'=>'required',
            'last_name'=>'required',
            'mobile'=>'required',
        ],[
            'user_name.unique' => 'This user name does not exist in our system. Or has already been taken.'
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        // ------------------user table---------------------
        if(!empty($request->profile)){
            $file = time().'.'.$request->profile->extension();
            $request->profile->move(public_path('uploads/profile/'), $file);
            $file_name = 'uploads/profile/'.$file;
        }else{
            $file_name = $request->input('old_profile');
        }
        $user = Customer::find($request->user_id);
        $user->user_name = $request->user_name;
        $user->email = $request->email;
        $user->name = trim($request->first_name).' '.trim($request->middle_name).' '.trim($request->last_name);
        $user->mobile = $request->mobile;
        $user->profile_image = $file_name; // need to work
        $user->status = $request->status;
        $user->tag_id = $request->tag_id;
        $user->contact_id = $request->contact_id;
        $user->save();
        $userDetails = UserDetails::updateOrCreate(
            ['user_id' => $request->user_id], // Condition to check
            [
                'official_email' => $request->official_email,
                'personal_website' => $request->personal_website,
                'country' => $request->country,
                'state' => $request->state,
                'city' => $request->city,
                'address' => $request->address,
                'zip' => $request->zip,
                'phone' => $request->phone,
                'dob' => $request->dob,
                'spouse_dob' => $request->spouse_dob,
                'anniversary' => $request->anniversary,
                'no_of_childrens' => $request->no_of_childrens,
                'worked_in' => $request->worked_in,
                'status' => $request->status,
            ]
        );
        return redirect()->back()->with('success','Customer details updated successfully!');
    }
    public function update_customer_company(Request $request){
        $customer = Customer::findOrFail($request->user_id);
        if(is_null($customer)){
            return redirect()->back()->withInput()->with('password-error','Customer Not Found!');
        }
        if(!empty($request->company_logo)){
            $file = time().'.'.$request->company_logo->extension();
            $request->company_logo->move(public_path('uploads/profile/'), $file);
            $file_name = 'uploads/profile/'.$file;
        }else{
            $file_name = $request->input('old_company_logo');
        }
        $res = UserCompanyDetails::updateOrCreate(
            ['user_id' => $request->user_id], // Condition to check
            [
                'company_name' => $request->company_name,
                'company_email' => $request->company_email,
                'company_email_type' => $request->company_email_type,
                'company_phone' => $request->company_phone,
                'company_phone_type' => $request->company_phone_type,
                'company_address' => $request->company_address,
                'company_website' => $request->company_website,
                'company_logo' => $file_name,
                'status' => 1,
            ]
        );
        return redirect()->back()->with('company-success','Company details updated successfully!');
    }
    public function update_customer_password(Request $request)
    {
        // Find customer or throw 404
        $customer = Customer::findOrFail($request->user_id);
        if(is_null($customer)){
            return redirect()->back()->withInput()->with('password-error','Customer Not Found!');
        }
        // Validate the input fields
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:6',
        ]);
        if($request->new_password != $request->new_confirm_password){
            return redirect()->back()->withInput()->with('password-error','The new password confirmation does not match.');
        }
        // Check if the current password matches the user's password
        if (!\Hash::check($request->current_password, $customer->password)) {
            throw ValidationException::withMessages([
                'current_password' => ['The current password is incorrect.'],
            ]);
        }
        // echo $request->new_password;
        // echo '<br>';
        // echo base64_encode($request->new_password); die;
        // Update the user's password
        $customer->update([
            'password' => \Hash::make($request->new_password),
            'recover_pass' => base64_encode($request->new_password)
        ]);
        // Optional: Send mail after password update
        // $data = [
        //     'name' => $customer->name,
        //     'email' => $customer->email,
        //     'password' => $request->new_password,
        // ];
        // Mail::to($customer->email)->send(new UpdatePasswordMail($data));
        return back()->with('password-success', 'Password updated successfully.');
    }
    public function update_customer_social_networks(Request $request){
        $customer = Customer::findOrFail($request->user_id);
        if(is_null($customer)){
            return redirect()->back()->withInput()->with('password-error','Customer Not Found!');
        }
        $res = UserSocialNetworks::updateOrCreate(
            ['user_id' => $request->user_id], // Condition to check
            [
                'facebook' => $request->facebook,
                'youtube' => $request->youtube,
                'linkedin' => $request->linkedin,
                'twitter' => $request->twitter,
                'telegram' => $request->telegram,
                'skype' => $request->skype,
                'instagram' => $request->instagram,
                'other' => $request->other,
                'status' => 1,
            ]
        );
        return redirect()->back()->with('social-success','Social Networks updated successfully!');
    }
    function get_all_name($name) {
        $words = explode(' ', $name);
        $first_name = "";
        $middle_name = "";
        $last_name = "";
        if (count($words) == 2) {
            $first_name = $words[0];
            $last_name = $words[1];
        } elseif (count($words) == 3) {
            $first_name = $words[0];
            $middle_name = $words[1];
            $last_name = $words[2];
        } elseif (count($words) >= 4) {
            $first_name = $words[0];
            $middle_name = $words[1];
            $last_name = implode(' ', array_slice($words, 2)); // Combine all remaining words into last name
        }else{
            $first_name = $name;
        }
        return [
            'first_name' => $first_name,
            'middle_name' => $middle_name,
            'last_name' => $last_name
        ];
    }
    /**
     * Update a customer in the database.
     *
     * @param Request $request
     * @param Customer $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Customer $user)
    {
        // Validations
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users,email,' . $user->id . ',id',
            'mobile' => 'required|numeric|digits:10',
            'status' => 'required|numeric|in:0,1',
        ]);
        DB::beginTransaction();
        try {
            // Update Data
            Customer::whereId($user->id)->update([
                'name' => $request->name,
                'email' => $request->email,
                'mobile' => $request->mobile,
                'status' => $request->status,
            ]);
            DB::commit();
            return redirect()->route('customer.index')->with('success', 'Customer Updated Successfully.');
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back()->withInput()->with('error', $th->getMessage());
        }
    }
    /**
     * Delete a customer.
     *
     * @param Customer $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete(Customer $user)
    {
        DB::beginTransaction();
        try {
            Customer::whereId($user->id)->delete();
            DB::commit();
            return redirect()->back()->with('success', 'Customer Deleted Successfully.');
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back()->with('error', $th->getMessage());
        }
    }
    /**
     * Import customers view.
     *
     * @return \Illuminate\View\View
     */
    public function importUsers()
    {
        return view('users.import');
    }
    /**
     * Handle customer upload.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function uploadUsers(Request $request)
    {
        Excel::import(new UsersImport(), $request->file);
        return redirect()->route('users.index')->with('success', 'User Imported Successfully');
    }
    /**
     * Export customers to Excel.
     *
     * @return \Symfony\Component\HttpFoundation\BinaryFileResponse
     */
    public function export()
    {
        return Excel::download(new CustomerExport(), 'customers.xlsx');
    }
    /**
     * Customer portfolio list.
     *
     * @return \Illuminate\View\View
     */
    public function customerprolist()
    {
        $users = CustomerPortfolio::join('users', 'users.id', 'customer_portfolios.user_id')
            ->join('agents', 'agents.id', 'users.agent_id')
            ->where('agents.id', Auth()->user()->id)
            ->select('customer_portfolios.*')
            ->orderBy('customer_portfolios.id', 'DESC')
            ->get();
        return view('customermanagement.customer-portfolio-list', ['admin' => 0, 'users' => $users]);
    }
}