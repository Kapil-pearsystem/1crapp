<?php
namespace App\Http\Controllers;
use App\Models\TagsModel;
use App\Models\ContactModel;
use App\Models\FormSourceModel;
use App\Models\FileDriveModel;
use App\Models\FormModel;
use App\Models\GiftMailModel;
use App\Models\GiftCollectionModel;
use App\Models\AssetsModel;
use App\Models\PageModel;
use App\Models\User;
use App\Models\CDOModel;
use App\Models\ProductService;

use App\Exports\UsersExport;
use App\Imports\UsersImport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;
class FormController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }
    public function index()
    {
        $lists = FormModel::select(
            'tbl_form.*',
            'tbl_tags.name as tag_name',
            'tbl_contact.name as list_name',
            'tbl_formsource.title as source_name',
            'tbl_filedrive.title as filedrive_name',
            'tbl_giftcollection.title as sequence_name',
        )
        ->leftjoin('tbl_tags','tbl_tags.id','=','tbl_form.tag_id')
        ->leftjoin('tbl_contact','tbl_contact.id','=','tbl_form.list_id')
        ->leftjoin('tbl_formsource','tbl_formsource.id','=','tbl_form.source_id')
        ->leftjoin('tbl_filedrive','tbl_filedrive.id','=','tbl_form.drivefile_id')
        ->leftjoin('tbl_giftcollection','tbl_giftcollection.id','=','tbl_form.sequence_id')
        ->orderBy('tbl_form.id','DESC')
        ->get();
        // dd($lists);
        return view('form.index',compact('lists'));
    }
    public function create_form()
    {
        // return view('mail-temp.agent-lead-mail');
        // dd(auth()->user()->id);
        $lists = ContactModel::where(['status'=>1,'created_by'=>auth()->user()->id])->get();
        $tags = TagsModel::where(['status'=>1,'created_by'=>auth()->user()->id])->get();
        $sources = FormSourceModel::where(['status'=>1,'created_by'=>auth()->user()->id])->get();
        $filedrives = FileDriveModel::where(['status'=>1,'created_by'=>auth()->user()->id])->get();
        $sequences = GiftCollectionModel::select('id','title')->where(['created_by'=>auth()->user()->id])->get();
        $mails = GiftMailModel::where(['category'=>2, 'created_by'=>auth()->user()->id,'status'=>1])->get();
        $admins = User::select('first_name','middle_name','last_name','email')->where(['added_by'=>auth()->user()->id,'status'=>1])->get();
        // dd($admins);
        return view('form.create',compact('lists','tags','sources','filedrives','sequences','mails','admins'));
    }
    function store_form(Request $request){
        // dd($request->all());
        $request->validate([
            'form_name'=>'required|string',
            'tag_id'=>'required',
            'list_id'=>'required',
            'sequence_id'=>'required',
            'sts_visible' => 'nullable|in:1,0',
            'source_id' => 'required',
            'title' => 'required',
            'title_visible' => 'nullable|in:1,0',
            'welcome_email' => 'required',
            'we_visible' => 'nullable|in:1,0',
            'ps_visible' => 'nullable|in:1,0',
            'cod_visible' => 'nullable|in:1,0',
            'phone_visible' => 'nullable|in:1,0',
            'msgbox_visible' => 'nullable|in:1,0',
            'drivefile_id' => 'required',
            'df_visible' => 'nullable|in:1,0',
            'forword_email' => 'required',
            'fe_visible' => 'nullable|in:1,0',
            'cta_title' => 'required',
            'success_destination' => 'required',
            'status' => 'nullable|in:1,0'
        ]);
        if($request->id){
            $form = FormModel::find($request->id);
            $msg = 'Form Updated Successfully!';
        }else{
            $form = new FormModel();
            $msg = 'Form Created Successfully!';
        }
        $form->form_name = $request->form_name;
        $form->tag_id = $request->tag_id;
        $form->list_id = $request->list_id;
        $form->sequence_id = $request->sequence_id; //
        $form->sts_visible = $request->sts_visible??0;
        $form->source_id = $request->source_id;
        $form->title = $request->title;
        $form->title_visible = $request->title_visible??0;
        $form->welcome_email = $request->welcome_email;
        $form->we_visible = $request->we_visible??0;
        $form->cod_visible = $request->cod_visible??0;
        $form->ps_visible = $request->ps_visible??0;
        $form->phone_visible = $request->phone_visible??0;
        $form->msgbox_visible = $request->msgbox_visible??0;
        $form->drivefile_id = $request->drivefile_id;
        $form->df_visible = $request->df_visible??0;
        $form->forword_email = $request->forword_email;
        $form->fe_visible = $request->fe_visible??0;
        $form->cta_title = $request->cta_title;
        $form->success_destination = $request->success_destination;
        $form->status = $request->status??0;
        $form->created_by = auth()->user()->id;
        $form->save();
        return redirect()->route('form.index')->with('success',$msg);
        // dd($form);
    }
    public function edit_form($id){
        // dd(auth()->user()->id);
        $lists = ContactModel::where(['status'=>1,'created_by'=>auth()->user()->id])->get();
        $tags = TagsModel::where(['status'=>1,'created_by'=>auth()->user()->id])->get();
        $sources = FormSourceModel::where(['status'=>1,'created_by'=>auth()->user()->id])->get();
        $filedrives = FileDriveModel::where(['status'=>1,'created_by'=>auth()->user()->id])->get();
        $sequences = GiftCollectionModel::select('id','title')->where(['created_by'=>auth()->user()->id])->get();
        $mails = GiftMailModel::where(['category'=>2, 'created_by'=>auth()->user()->id,'status'=>1])->get();
        $admins = User::select('first_name','middle_name','last_name','email')->where(['added_by'=>auth()->user()->id,'status'=>1])->get();

        $details = FormModel::find($id);
        if(is_null($details)){
            return redirect()->back()->with('error','No Form Found!');
        }
        return view('form.create',compact('lists','tags','sources','filedrives','sequences','mails','admins','details'));
    }
    public function delete_form($id){
        $form = FormModel::find($id);
        $form->delete();
        return redirect()->back()->with('success','Form Deleted Successfully!');
    }
    public function get_destination(Request $request)
    {
        $type = $request->type;
        $html = '';

        if ($type == 'assets') {
            $data = AssetsModel::where(['created_by' => auth()->user()->id,'status' => 1])->get();

            $html .= 'Select Assets';
            $html .= '<select name="success_destination" id="success_destination" class="form-control form-control-user" required>';
            $html .= '<option selected="selected" disabled="disabled">Select Type</option>';
            foreach ($data as $asset) {
                // Escape output to prevent XSS
                $html .= '<option value="' . e($asset->url) . '">' . e($asset->title) . '</option>';
            }
            $html .= '</select>';
        } elseif ($type == 'page') {
            // Add logic for the 'page' type if needed
            $html .= 'Select Page';
            $html .= '<select name="success_destination" id="success_destination" class="form-control form-control-user" required>';
            $html .= '<option selected="selected" disabled="disabled">Select Page</option>';
            // Example data logic (replace with your actual query)
            $pages = PageModel::where(['created_by' => auth()->user()->id,'status' => 1])->get();
            foreach ($pages as $page) {
                $html .= '<option value="' . e(WEB_BASE_URL.'page/'.$page->slug) . '">' . e($page->page_name) . '</option>';
            }
            $html .= '</select>';
        } else {
            $html .= 'Enter Destination Page URL';
            $html .= '<input type="url" id="success_destination" placeholder="Enter Destination Page URL" name="success_destination" value="' . htmlspecialchars(old('success_destination') ?? ($details->success_destination ?? ''), ENT_QUOTES, 'UTF-8') . '" class="form-control form-control-user" />';
        }

        return response()->json(['status'=>true,'data' => $html,'msg'=>'Success!']);
    }
    public function get_embeded_code(Request $request)
    {
        $data = FormModel::find($request->form_id);
        $cdos = CDOModel::select('id','name')->where(['created_by' => auth()->user()->id, 'status' => 1])->get();
        $p_services = ProductService::select('id','prod_name')->where(['agent_id' => auth()->user()->id, 'status' => 1])->get();
        $html = view('form.form-embeded-code',compact('data','cdos','p_services'))->render();
        $escapedHtml = htmlspecialchars($html);
        return response()->json([
            'status' => true,
            'form' => $html,
            'html' => $escapedHtml,
            'msg' => 'Success!',
        ]);
    }
}