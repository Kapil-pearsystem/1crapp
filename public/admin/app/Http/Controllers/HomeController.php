<?php
namespace App\Http\Controllers;
use App\Models\ContactModel;
use App\Models\TagsModel;
use App\Models\UserReferralCommission;
use App\Models\User;
use App\Models\Customer;
use App\Models\BannerModel;
use App\Models\EnquiryModel;
use App\Models\PassiveProfitModel;
use App\Models\GiftMailModel;
use App\Models\FormSourceModel;
use App\Models\FileDriveModel;
use Illuminate\Http\Request;
use App\Rules\MatchOldPassword;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        // $this->created_by = auth()->user()->id;
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        
        // dd(Auth()->user()->getRoleNames());
        return view('home');
    }
    /**
     * User Profile
     * @param Nill
     * @return View Profile
     * @author Shani Singh
     */
    public function getProfile()
    {
        return view('profile');
    }
    /**
     * Update Profile
     * @param $profileData
     * @return Boolean With Success Message
     * @author Shani Singh
     */
    public function updateProfile(Request $request)
    {
        #Validations
        $request->validate([
            'first_name'    => 'required',
            'last_name'     => 'required',
            'mobile_number' => 'required|numeric|digits:10',
        ]);
        try {
            DB::beginTransaction();
            #Update Profile Data
            User::whereId(auth()->user()->id)->update([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'mobile_number' => $request->mobile_number,
            ]);
            #Commit Transaction
            DB::commit();
            #Return To Profile page with success
            return back()->with('success', 'Profile Updated Successfully.');
        } catch (\Throwable $th) {
            DB::rollBack();
            return back()->with('error', $th->getMessage());
        }
    }
    /**
     * Change Password
     * @param Old Password, New Password, Confirm New Password
     * @return Boolean With Success Message
     * @author Shani Singh
     */
    public function changePassword(Request $request)
    {
        $request->validate([
            'current_password' => ['required', new MatchOldPassword],
            'new_password' => ['required'],
            'new_confirm_password' => ['same:new_password'],
        ]);
        try {
            DB::beginTransaction();
            #Update Password
            User::find(auth()->user()->id)->update(['password'=> Hash::make($request->new_password)]);
            #Commit Transaction
            DB::commit();
            #Return To Profile page with success
            return back()->with('success', 'Password Changed Successfully.');
        } catch (\Throwable $th) {
            DB::rollBack();
            return back()->with('error', $th->getMessage());
        }
    }
    // Contact module
    public function contact_list(){
        $contacts = DB::table('tbl_contact as c')
        ->leftJoin('users as u', DB::raw('FIND_IN_SET(c.id, u.contact_id)'), '>', DB::raw('0'))
        ->select(
            'c.id',
            'c.list_id',
            'c.name',
            'c.status',
            'c.created_by',
            'c.updated_by',
            'c.created_at',
            'c.updated_at'
        )
        ->where('c.created_by', auth()->user()->id)->groupBy('c.id', 'c.list_id', 'c.name', 'c.status', 'c.created_by', 'c.updated_by', 'c.created_at', 'c.updated_at')->orderBy('c.id')->get();
       

        // dd($contacts);
        $customers = Customer::where(['agent_id'=>auth()->user()->id,'type'=>1])->count();
        $passive_profit = PassiveProfitModel::where(['created_by'=>auth()->user()->id,'status'=>1])->count();
        
        $query = EnquiryModel::select('tbl_enquiry.id')
        ->join('users', 'users.id', '=', 'tbl_enquiry.customer_id')
        ->leftJoin('tbl_form', 'tbl_form.id', '=', 'tbl_enquiry.form_id')
        ->leftJoin('tbl_formsource', 'tbl_formsource.id', '=', 'tbl_form.source_id')
        ->leftJoin('product_services', 'product_services.id', '=', 'tbl_enquiry.ps_id')
        ->leftJoin('tbl_cdo', 'tbl_cdo.id', '=', 'tbl_enquiry.cdo_id')
        ->where('tbl_form.created_by', auth()->user()->id)
        ->where('users.type', 2);

        // Get the count of the results
        $leads = $query->count();
        return view('admin.contact-list', compact('contacts','customers','leads','passive_profit'));
    }
    public function add_contact(){
        return view('admin.add-contact');
    }
    public function save_contact(Request $request)
    {
        $request->validate([
            'name' => ['required'],
            'status' => ['required']
        ]);
        if($request->id){
            $contact = ContactModel::find($request->id);
            $msg = 'Contact Updated Successfully!';
            $contact->updated_by = auth()->user()->id;
            $contact->list_id = $contact->list_id?$contact->list_id:$this->getListId();
        }else{
            $contact = new ContactModel();
            $msg = 'Contact Created Successfully!';
            $contact->created_by = auth()->user()->id;
            $contact->list_id = $this->getListId();
        }
        $contact->name = $request->name;
        $contact->status = $request->status;
        if($contact->save()){
            return redirect()->route('lists.index')->with('success', $msg);
        }else{
            return redirect()->route('lists.create')->with('error', 'Contact creating error.');
        }
    }
    public function getListId(){
        $list_id = '1CRAPP-LIST'.rand(111111,999999);
        $contact = ContactModel::where('list_id',$list_id)->first();
        if(is_null($contact)){
            return $list_id;
        }else{
            $this->getListId();
        }
    }
    public function edit_contact($id)
    {
        $contact = ContactModel::where(['id'=>$id,'created_by'=>auth()->user()->id])->first();
        if (!$contact) {
            return redirect()->route('lists.index')->with('error', 'Contact not found.');
        }
        return view('admin.add-contact', compact('contact'));
    }
    public function delete_contact($id)
    {
        $contact = ContactModel::where(['id'=>$id,'created_by'=>auth()->user()->id])->first();
        if (!$contact) {
            return redirect()->route('lists.index')->with('error', 'Contact not found.');
        }
        $contact->delete();
        return redirect()->route('lists.index')->with('success', 'Contact deleted successfully!');
    }
    public function update_contact_status(Request $request)
    {
        $contact = ContactModel::where(['id'=>$id,'created_by'=>auth()->user()->id])->first();
        if ($contact) {
            $contact->status = $request->status;
            $contact->save();
            return response()->json(['message' => 'Contact status updated successfully!']);
        }
        return response()->json(['message' => 'Contact not found!'], 404);
    }
    // tags module
    public function tags_list(){
        $tags = TagsModel::where('created_by',auth()->user()->id)->get();
        return view('admin.tags-list', compact('tags'));
    }
    public function add_tags(){
        return view('admin.add-tags');
    }
    public function save_tags(Request $request)
    {
        $request->validate([
            'name' => ['required'],
            'status' => ['required']
        ]);
        if($request->id){
            $tags = TagsModel::find($request->id);
            $msg = 'Tags Updated Successfully!';
            $tags->updated_by = auth()->user()->id;
        }else{
            $tags = new TagsModel();
            $msg = 'Tags Created Successfully!';
            $tags->created_by = auth()->user()->id;
        }
        $tags->name = $request->name;
        $tags->status = $request->status;
        if($tags->save()){
            return redirect()->route('tags.index')->with('success', $msg);
        }else{
            return redirect()->route('tags.create')->with('error', 'Tags creating error.');
        }
    }
    public function edit_tags($id)
    {
        $tags = TagsModel::where(['id'=>$id,'created_by'=>auth()->user()->id])->first();
        if (!$tags) {
            return redirect()->route('tags.index')->with('error', 'Tags not found.');
        }
        return view('admin.add-tags', compact('tags'));
    }
    public function delete_tags($id)
    {
        $tags = TagsModel::where(['id'=>$id,'created_by'=>auth()->user()->id])->first();
        if (!$tags) {
            return redirect()->route('tags.index')->with('error', 'Tags not found.');
        }
        $tags->delete();
        return redirect()->route('tags.index')->with('success', 'Tags deleted successfully!');
    }
    public function update_tags_status(Request $request)
    {
        $tags = TagsModel::where(['id'=>$request->id,'created_by'=>auth()->user()->id])->first();
        if ($tags) {
            $tags->status = $request->status;
            $tags->save();
            return response()->json(['message' => 'Tags status updated successfully!']);
        }
        return response()->json(['message' => 'Tags not found!'], 404);
    }
    // User Referral commission
    public function user_referral_commission_list(){
        $r_commission = UserReferralCommission::where('agent_id',auth()->user()->id)->get();
        return view('admin.user-referral-commission-list', compact('r_commission'));
    }
    public function add_user_referral_commission(){
        $r_commission = UserReferralCommission::where('agent_id',auth()->user()->id)->first();
        if(!is_null($r_commission)){
            return redirect()->route('user-referral-commission.edit',[$r_commission->id]);
        }else{
            return view('admin.add-user-referral-commission');
        }
    }
    public function save_user_referral_commission(Request $request)
    {
        $request->validate([
            'points' => ['required'],
            'status' => ['required']
        ]);
        if($request->id){
            $r_commission = UserReferralCommission::find($request->id);
            $msg = 'User Referral Comission Updated Successfully!';
        }else{
            $r_commission = new UserReferralCommission();
            $msg = 'User Referral Comission Created Successfully!';
        }
        $r_commission->agent_id = auth()->user()->id;
        $r_commission->points = $request->points;
        $r_commission->status = $request->status;
        if($r_commission->save()){
            return redirect()->route('user-referral-commission.index')->with('success', $msg);
        }else{
            return redirect()->route('user-referral-commission.create')->with('error', 'User Referral Comission creating error.');
        }
    }
    public function edit_user_referral_commission($id)
    {
        $r_commission = UserReferralCommission::find($id);
        if (!$r_commission) {
            return redirect()->route('user-referral-commission.index')->with('error', 'User Referral Comission not found.');
        }
        return view('admin.add-user-referral-commission', compact('r_commission'));
    }
    public function delete_user_referral_commission($id)
    {
        $r_commission = UserReferralCommission::find($id);
        $r_commission->delete();
        return redirect()->route('user-referral-commission.index')->with('success', 'User Referral Comission deleted successfully!');
    }
    public function update_user_referral_commission_status(Request $request)
    {
        $r_commission = UserReferralCommission::find($request->id);
        if ($r_commission) {
            $r_commission->status = $request->status;
            $r_commission->save();
            return response()->json(['message' => 'User Referral Comission status updated successfully!']);
        }
        return response()->json(['message' => 'User Referral Comission not found!'], 404);
    }
    public function get_country()
    {
        $countries = DB::table('rk_countries')->select('id', 'name')->get();
        $optionset = '<option value="">N/A</option>';
        foreach($countries as $list){
            $optionset .= '<option value="'.$list->id.'">'.$list->name.'</option>';
        }
        return $optionset;
    }
    public function getStateByCountry($id)
    {
        $stateList = DB::table('rk_states')->where('country_id',$id)->get();
        $optionset = '<option value="">N/A</option>';
        foreach($stateList as $list){
            $optionset.= '<option value="'.$list->id.'">'.$list->name.'</option>';
        }
        return $optionset;
    }
    public function getCityByState($id)
    {
        $stateList = DB::table('rk_cities')->where('state_id',$id)->get();
        $optionset = '<option value="">N/A</option>';
        foreach($stateList as $list){
            $optionset.= '<option value="'.$list->id.'">'.$list->name.'</option>';
        }
        return $optionset;
    }
    // Enquiry List
    public function enquiry_list(Request $request)
    {
        $list_name = '';
        $lists = EnquiryModel::
        select('users.name',
        'tbl_enquiry.id',
        'tbl_enquiry.customer_id',
        'users.memberid',
        'users.email',
        'users.mobile as phone',
        'tbl_enquiry.message',
        'tbl_enquiry.created_at',
        'tbl_enquiry.status',
        'tbl_formsource.title as source',
        'product_services.prod_name as ps_name',
        'tbl_cdo.name as cdo_name',
        )
        ->join('users','users.id','=','tbl_enquiry.customer_id')
        ->leftjoin('tbl_form','tbl_form.id','=','tbl_enquiry.form_id')
        ->leftjoin('tbl_formsource','tbl_formsource.id','=','tbl_form.source_id')
        ->leftjoin('product_services','product_services.id','=','tbl_enquiry.ps_id')
        ->leftjoin('tbl_cdo','tbl_cdo.id','=','tbl_enquiry.cdo_id')
        ->where('tbl_form.created_by',auth()->user()->id)
        ->where('users.type',2);
        if($request->list){
            $contact = ContactModel::select('id','name')->where(['id'=>$request->list])->first();
            if ($contact) {
                $list_name = $contact->name;
            }
            $lists = $lists->where('tbl_enquiry.list_id',$request->list);

        }
        $lists = $lists->orderBy('tbl_enquiry.id','DESC')->get();
        // dd($lists);
        return view('admin.enquiry-list', compact('lists','list_name'));
    }
    public function update_enquiry_status(Request $request)
    {
        $enquiry = EnquiryModel::where(['id'=>$request->id])->first();
        if ($enquiry) {
            $enquiry->status = $request->status;
            $enquiry->save();
            return response()->json(['message' => 'Enquiry status updated successfully!']);
        }
        return response()->json(['message' => 'Enquiry not found!'], 404);
    }
    public function delete_enquiry($id)
    {
        $enquiry = EnquiryModel::find($id);
        $enquiry->delete();
        return redirect()->back()->with('error', 'Enquiry deleted successfully!');
    }
    public function view_enquiry_message(Request $request)
    {
        $id = $request->id;
        $enquiry = EnquiryModel::find($id);
        if ($enquiry->message) {
            return response()->json(['message' => $enquiry->message],200);
        }
        return response()->json(['message' => 'Message not found!'], 200);
    }
    // Manage Banner
    public function banner_list(){
        $lists = BannerModel::where('created_by', auth()->user()->id)->orderBy('id','DESC')->get();
        return view('banner.index',compact('lists'));
    }
    public function create_banner(){
        return view('banner.create');
    }
    public function store_banner(Request $request)
    {
        // dd($request->all());
        // Define validation rules
        $validation = [
            'title' => 'required|string|max:255',
            'start_free_trial_link' => 'nullable|url',
            'talk_to_expert_link' => 'nullable|url',
            'description' => 'required|string',
            'left_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // adjust image size as needed
            'right_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status' => 'required|in:0,1',
        ];
        $validatedData = $request->validate($validation);
        if($request->hasFile('left_image')) {
            $left_imageName = time() . '_' . $request->left_image->getClientOriginalName();
            $request->left_image->move(public_path('uploads/banners'), $left_imageName);
            $left_image_name = 'uploads/banners/'.$left_imageName;
        }else{
            $left_image_name = base64_decode($request->old_left_image);
        }
        if($request->hasFile('right_image')) {
            $right_imageName = time() . '_' . $request->right_image->getClientOriginalName();
            $request->right_image->move(public_path('uploads/banners'), $right_imageName);
            $right_image_name = 'uploads/banners/'.$right_imageName;
        }else{
            $right_image_name = base64_decode($request->old_right_image);
        }
        if($request->id){
            // die;
            $banner = BannerModel::find($request->id);
            $msg = 'Banner Updated Successfully!';
        }else{
            $banner = new BannerModel();
            $msg = 'Banner Created Successfully!';
        }
        $banner->title = $request->title;
        $banner->start_free_trial_link = $request->start_free_trial_link;
        $banner->start_link_new_tab = $request->start_link_new_tab??0;
        $banner->talk_to_expert_link = $request->talk_to_expert_link;
        $banner->talk_to_expert_link_new_tab = $request->talk_to_expert_link_new_tab??0;
        $banner->description = $request->description;
        $banner->left_image = $left_image_name;
        $banner->right_image = $right_image_name;
        $banner->created_by = auth()->user()->id;
        $banner->status = $request->status;
        $banner->save();
        return redirect()->route('banner.index')->with('success', $msg);
    }

    public function edit_banner($id){
        $details = BannerModel::find($id);
        return view('banner.create',compact('details'));
    }
    public function delete_banner($id){
        $details = BannerModel::find($id);
        $details->delete();
        return redirect()->back()->with('success','Banner Deleted Successfully!');
    }
    // form source
    public function form_source(){
        $lists = FormSourceModel::where('created_by', auth()->user()->id)->orderBy('id','DESC')->get();
        return view('form.source.index',compact('lists'));
    }
    public function create_form_source(){
        return view('form.source.create');
    }
    public function save_form_source(Request $request)
    {
        $validation = [
            'title' => 'required|string|max:255',
            'status' => 'required|in:0,1',
        ];
        $validatedData = $request->validate($validation);
        if($request->id){
            $form_source = FormSourceModel::find($request->id);
            $msg = 'Form Source Updated Successfully!';
        }else{
            $form_source = new FormSourceModel();
            $msg = 'Form Source Created Successfully!';
        }
        $form_source->title = $request->title;
        $form_source->slug = Str::slug($request->title);
        $form_source->created_by = auth()->user()->id;
        $form_source->status = $request->status;
        $form_source->save();
        return redirect()->route('form-source.index')->with('success', $msg);
    }
    public function edit_form_source($id){
        $details = FormSourceModel::find($id);
        return view('form.source.create',compact('details'));
    }
    public function delete_form_source($id){
        $details = FormSourceModel::find($id);
        $details->delete();
        return redirect()->back()->with('success','Form Source Deleted Successfully!');
    }
    // drive file
    public function file_drive(){
        $lists = FileDriveModel::where('created_by', auth()->user()->id)->orderBy('id','DESC')->get();
        return view('form.filedrive.index',compact('lists'));
    }
    public function create_file_drive(){
        return view('form.filedrive.create');
    }
    public function save_file_drive(Request $request)
    {
        $validation = [
            'title' => 'required|string|max:255',
            'doc_file' => $request->id
                    ? 'nullable|file|mimes:jpeg,jpg,png,mp4,pdf,xls,doc,docx,txt|max:4096'
                    : 'required|file|mimes:jpeg,jpg,png,mp4,pdf,xls,doc,docx,txt|max:4096',
            'status' => 'required|in:0,1',
        ];
        $validatedData = $request->validate($validation);
        // dd($request->all());
        if($request->hasFile('doc_file')) {
            $fileName = time() . '_' . $request->doc_file->getClientOriginalName();
            $request->doc_file->move(public_path('uploads/drive'), $fileName);
            $file_name = 'uploads/drive/'.$fileName;
            if ($request->id) {
                $old_data = FileDriveModel::find($request->id);
                $imagePath = public_path($old_data->path);
                if (File::exists($imagePath)) {
                    File::delete($imagePath);
                }
            }
        }else{
            $file_name = base64_decode($request->old_doc_file);
        }
        if($request->id){
            $file_drive = FileDriveModel::find($request->id);
            $msg = 'File Drive Updated Successfully!';
        }else{
            $file_drive = new FileDriveModel();
            $msg = 'File Drive Created Successfully!';
        }
        $file_drive->title = $request->title;
        $file_drive->path = $file_name;
        $file_drive->created_by = auth()->user()->id;
        $file_drive->status = $request->status;
        $file_drive->save();
        return redirect()->route('file-drive.index')->with('success', $msg);
    }
    public function edit_file_drive($id){
        $details = FileDriveModel::find($id);
        return view('form.filedrive.create',compact('details'));
    }
    public function delete_file_drive($id){
        $details = FileDriveModel::find($id);
        $imagePath = public_path($details->path);
        if (File::exists($imagePath)) {
            File::delete($imagePath);
        }
        $details->delete();
        return redirect()->back()->with('success','File Drive Deleted Successfully!');
    }
    public function next_step_data(Request $request)
    {
        $request->validate([
            'id' => 'required',
            'step' => 'required'
        ]);
        $customer = EnquiryModel::find($request->id);
        $step = $request->step;
        $mails = GiftMailModel::where(['category' => 3, 'status' => 1])->get();
        $html = '';
        if ($step == 1) {
            $csrfToken = csrf_token();
            $html .= '<form action="' . route('send-link-via-email') . '" method="post">
                    <input type="hidden" name="_token" value="' . $csrfToken . '">
                    <input type="hidden" name="customer_id" value="' . $request->id . '">
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Select Template</label>
                        <select class="form-control" id="exampleFormControlSelect1" name="mail_id" required>
                            <option value="" selected disabled>Select Mail</option>';
                            foreach ($mails as $mail) {
                                $html .= '<option value="' . $mail->id . '">' . $mail->temp_name . '</option>';
                            }
                $html .='</select>
                    </div>
                    <button type="submit" class="btn btn-primary mb-2">Send Mail</button>
                </form>';
            return response()->json(['status' => true, 'msg' => 'Mail Fetched Successfully!', 'data' => $html], 200);
        }else if($step == 2){
            $csrfToken = csrf_token();
            $html .= '<form action="#" method="post" onsubmit="return getWhatsappLink()" name="wf1">
                    <input type="hidden" name="_token" value="' . $csrfToken . '">
                    <input type="hidden" name="customer_id" value="' . $request->id . '">
                    <div class="form-group">
                        <label for="media_type">Select Type</label>
                        <select class="form-control" id="media_type" name="media_type" onchange="setDestination(this.value)" required>
                            <option value="assets">My Digital Assets</option>
                            <option value="page">Custom Page</option>
                            <option value="custom" selected>Custom URL</option>
                        </select>
                    </div>
                    <div class="form-group" id="destination_id">
                        <label for="media_type" >Enter Url</label>
                        <input type="url" id="success_destination" placeholder="Enter URL" name="success_destination" class="form-control form-control-user" />
                    </div>
                    <div class="form-group">
                        <label for="message" >Enter Message</label>
                       <textarea name="message" id="message" class="form-control" placeholder="Enter Message">Hey '.$customer->name.', here the Link for you too Book the Meeting. Click below and Book the Call.</textarea>
                    </div>
                    <button type="submit" class="btn btn-primary mb-2">Get Link</button>
                </form>';
            return response()->json(['status' => true, 'msg' => 'Mail Fetched Successfully!', 'data' => $html], 200);
        }
        return response()->json(['status' => false, 'msg' => 'Invalid Step!'], 400);
    }
    public function get_whatsapp_link(Request $request)
    {
        $link = $request->link;
        $customer = EnquiryModel::find($request->id);
        if (!$customer) {
            return response()->json(['status' => false, 'msg' => 'Customer not found!'], 404);
        }
        $whatsAppNumber = $customer->phone;
        $message = urlencode($request->message);
        $whatsAppLink = "https://wa.me/{$whatsAppNumber}?text={$message}";
        $html = '
            <div class="text-center text-primary border border-secondary bg-light p-3 rounded" style="max-width: 600px; margin: auto;">
                <p class="mb-3" style="font-size: 14px; font-weight: bold;">Scan to Share:</p>
                    <img src="https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=' . urlencode($whatsAppLink) . '" alt="QR Code" />
                <p class="mt-3 mb-3" style="font-size: 16px; font-weight: bold;">Your Link:</p>
                <div class="bg-white p-2 border rounded text-info" style="word-wrap: break-word;">
                    ' . $link . '
                </div>
            </div>
            <div class="text-center mt-4">
                <a href="' . $whatsAppLink . '" target="_blank" class="btn btn-success d-flex align-items-center justify-content-center" style="font-size: 14px; padding: 10px 20px; border-radius: 5px;">
                    <i class="fab fa-whatsapp" style="margin-right: 8px;"></i> Send Link via WhatsApp
                </a>
            </div>';



        return response()->json(['status' => true, 'msg' => 'WhatsApp link generated successfully!', 'data' => $html], 200);
    }
    public function master_list()
    {
        $lists = EnquiryModel::
            select(
                'users.email',
                DB::raw('MAX(users.name) as name'),
                DB::raw('MAX(users.memberid) as memberid'),
                DB::raw('MAX(tbl_enquiry.id) as id'),
                DB::raw('MAX(tbl_enquiry.customer_id) as customer_id'),
                DB::raw('MAX(users.mobile) as phone'),
                DB::raw('MAX(tbl_enquiry.message) as message'),
                DB::raw('MAX(tbl_enquiry.created_at) as created_at'),
                DB::raw('MAX(tbl_enquiry.status) as status'),
                DB::raw('MAX(tbl_formsource.title) as source'),
                DB::raw('MAX(product_services.prod_name) as ps_name'),
                DB::raw('MAX(tbl_cdo.name) as cdo_name'),
                DB::raw('MAX(user_details.address) as address')
            )
            ->join('users', 'users.id', '=', 'tbl_enquiry.customer_id')
            ->leftJoin('tbl_form', 'tbl_form.id', '=', 'tbl_enquiry.form_id')
            ->leftJoin('user_details', 'user_details.user_id', '=', 'users.id')
            ->leftJoin('tbl_formsource', 'tbl_formsource.id', '=', 'tbl_form.source_id')
            ->leftJoin('product_services', 'product_services.id', '=', 'tbl_enquiry.ps_id')
            ->leftJoin('tbl_cdo', 'tbl_cdo.id', '=', 'tbl_enquiry.cdo_id')
            ->groupBy('users.email') // Group by email
            ->orderBy('id', 'DESC')
            ->get();

        return view('admin.master-list', compact('lists'));
    }





}