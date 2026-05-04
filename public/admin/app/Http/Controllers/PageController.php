<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\PageModel;
use App\Models\ContactModel;
use App\Models\TagsModel;
use App\Models\AssetsModel;
use App\Models\FormModel;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Http;
class PageController extends Controller
{
    public function index(){
        $data = PageModel::select('tbl_page.*','tbl_tags.name as tag_name','tbl_contact.name as list_name')
        ->leftjoin('tbl_tags','tbl_tags.id','=','tbl_page.tag_id')
        ->leftjoin('tbl_contact','tbl_contact.id','=','tbl_page.list_id')
        ->where(['tbl_page.created_by'=>auth()->user()->id])->get();
        return view('page/list',compact('data'));
    }
    public function add(){
        $assets = AssetsModel::select('id','title','url')->where(['created_by'=>auth()->user()->id,'status'=>1])->orderBy('id','desc')->get();
        $tags = TagsModel::where('created_by',auth()->user()->id)->get();
        $lists = ContactModel::where('created_by',auth()->user()->id)->get();
        $forms = FormModel::select('id','form_name')->where(['created_by'=>auth()->user()->id])->get();
        // dd($forms);
        return view('page/add',compact('tags','lists','assets','forms'));
    }
    public function store(Request $request)
    {
        $admin_id = auth()->user()->id;
        $pageId = $request->id;
        $validationRules = [];
        $validationRules['page_name'] = [
            'required',
            Rule::unique('tbl_page')->where(function ($query) use ($admin_id) {
                return $query->where('created_by', $admin_id);
            })->ignore($pageId), 
        ];
        // $validationRules['tag_id'] = 'required|integer';
        // $validationRules['list_id'] = 'required|integer';
        $validationRules['pre_heading'] = 'nullable';
        $validationRules['pre_heading_status'] = 'nullable';
        $validationRules['title'] = 'nullable|string|max:555';
        $validationRules['title_status'] = 'nullable|integer';
        $validationRules['subtitle'] = 'nullable|string';
        $validationRules['subtitle_status'] = 'nullable|integer';
        $validationRules['bullet1'] = 'nullable|string|max:255';
        $validationRules['bullet2'] = 'nullable|string|max:255';
        $validationRules['bullet3'] = 'nullable|string|max:255';
        $validationRules['bullet4'] = 'nullable|string|max:255';
        $validationRules['bullet5'] = 'nullable|string|max:255';
        $validationRules['bullet6'] = 'nullable|string|max:255';
        $validationRules['bullet_status'] = 'nullable|integer';
        $validationRules['media_file_status'] = 'nullable|integer';
        $validationRules['countdown'] = 'nullable';
        $validationRules['countdown_status'] = 'nullable|integer';

        $validationRules['popup_status'] = 'nullable|integer';
        
        $validationRules['form_type'] = 'nullable|in:external,custom,embeded';
        $validationRules['form_id'] = 'nullable|integer';

        $validationRules['open_new_tab'] = 'nullable|integer';
        $validationRules['page_cta_url'] = 'nullable';
        $validationRules['popup_destination'] = 'nullable|string|max:255';
        $validationRules['addination_cta'] = 'nullable|string|max:555';
        $validationRules['addination_cta_new_tab'] = 'nullable|integer';
        $validationRules['popup_content'] = 'nullable|string';
        $validationRules['status'] = 'nullable|integer';
        $validationRules['media_link'] = [
            'nullable',
            'string',
            'max:555', 
            function ($attribute, $value, $fail) {
                if (!empty($value)) {
                    $oembedUrl = "https://www.youtube.com/oembed?url=" . urlencode($value) . "&format=json";
                    $response = Http::get($oembedUrl);
                    if (!$response->successful()) {
                    }else{
                        return redirect()->back()->withInput()->with('media_link_error','Please Enter valid media link or embed link!');
                    }
                }
            }
        ];
        // Validate request using the dynamic validation rules array
        $validatedData = $request->validate($validationRules);
        try {
            if ($request->hasFile('media_file')) {
                $file_name = time() . '.' . $request->media_file->getClientOriginalExtension();
                $request->media_file->move(public_path('uploads'), $file_name);
                $media_filename = 'uploads/' . $file_name;
                if (file_exists($request->old_media_file)) {
                   unlink($request->old_media_file);
                }
            } else {
                $media_filename = $request->old_media_file;
            }
        } catch (\Exception $e) {
            // Handle exception
            return redirect()->back()->withErrors(['error' => 'Upload failed: ' . $e->getMessage()]);
        }
        if ($request->hasFile('popup_image')) {
            $popup_image = time() . '.' . $request->popup_image->getClientOriginalExtension();
            $request->popup_image->move(public_path('uploads'), $popup_image);
            $popup_imagename = 'uploads/' . $popup_image;
        } else {
            $popup_imagename = $request->old_popup_image;
        }
        if($request->page_cta_url == 'other'){
            $page_cta_url = $request->other_page_cta_url;
            $other_page_cta_url_status = 1;
        }else{
            $page_cta_url = $request->page_cta_url;
            $other_page_cta_url_status = 0;
        }
        if($request->popup_destination == 'other'){
            $popup_destination = $request->other_popup_destination;
            $other_popup_destination_status = 1;
        }else{
            $popup_destination = $request->popup_destination;
            $other_popup_destination_status = 0; 
        }
        $slug =  Str::slug($request->input('page_name'));
        if(!is_null($request->id)){
            $page = PageModel::find($request->id);
            $msg = 'Page Updated Successfully.';
        }else{
            $page = new PageModel();
            $msg = 'Page Created Successfully.';
        }
        $page->page_name = $request->input('page_name');
        // $page->tag_id = $request->input('tag_id');
        // $page->list_id = $request->input('list_id');
        $page->pre_heading = $request->input('pre_heading');
        $page->pre_heading_status = $request->input('pre_heading_status');
        $page->title = $request->input('title');
        $page->slug = $slug;
        $page->title_status = $request->input('title_status');
        $page->subtitle = $request->input('subtitle');
        $page->subtitle_status = $request->input('subtitle_status');
        $page->bullet1 = $request->input('bullet1');
        $page->bullet2 = $request->input('bullet2');
        $page->bullet3 = $request->input('bullet3');
        $page->bullet4 = $request->input('bullet4');
        $page->bullet5 = $request->input('bullet5');
        $page->bullet6 = $request->input('bullet6');
        $page->bullet_status = $request->input('bullet_status');
        $page->media_type = $request->input('media_type');
        $page->media_file = $media_filename;
        $page->media_link = $request->input('media_link');
        $page->media_file_status = $request->input('media_file_status');
        $page->countdown = $request->input('countdown');
        $page->countdown_status = $request->input('countdown_status');

        $page->popup_status = $request->input('popup_status');
        $page->form_type = $request->input('form_type');
        $page->form_id = $request->input('form_id');
        $page->open_new_tab = $request->input('open_new_tab');
        $page->page_cta_url = $request->input('external_url');
        $page->embed_form_status = $request->input('embed_form_status');
        $page->embed_form_code = $request->input('embed_form_code');

        $page->popup_destination = $popup_destination;
        $page->other_popup_destination_status = $other_popup_destination_status;

        $page->addination_cta_status = $request->input('addination_cta_status');
        $page->addination_cta = $request->input('addination_cta');
        $page->addination_url = $request->input('addination_url');
        $page->addination_cta_new_tab = $request->input('addination_cta_new_tab');
        $page->addination_cta_type = $request->input('addination_cta_type');
        $page->asset_id = $request->input('asset_id');
        $page->addination_cta_title = $request->input('addination_cta_title');

        $page->popup_content = $request->input('popup_content');
        $page->popup_content_status = $request->input('popup_content_status');
        $page->popup_image = $popup_imagename;
        $page->popup_image_status = $request->input('popup_image_status');
        $page->popup_title = $request->input('popup_title');
        $page->popup_title_status = $request->input('popup_title_status')??0;

        $page->pre_cta = $request->input('pre_cta');
        $page->pre_cta_status = $request->input('pre_cta_status');
        $page->ps_text = $request->input('ps_text');
        $page->ps_text_status = $request->input('ps_text_status');
        $page->status = $request->input('status');
        $page->created_by = auth()->user()->id;
        $page->save();
        return redirect()->route('page.index')->with('success', $msg);
    }
    public function edit($id)
    {
        $details = PageModel::where(['id'=>$id,'created_by'=>auth()->user()->id])->first();
        if (!$details) {
            return redirect()->route('page.index')->with('error', 'Page not found.');
        }
        $assets = AssetsModel::select('id','title','url')->where(['created_by'=>auth()->user()->id,'status'=>1])->orderBy('id','desc')->get();
        $tags = TagsModel::where('created_by',auth()->user()->id)->get();
        $lists = ContactModel::where('created_by',auth()->user()->id)->get();
        $forms = FormModel::select('id','form_name')->where(['created_by'=>auth()->user()->id])->get();
        return view('page/add',compact('tags','lists','details','assets', 'forms'));
    }
    public function delete($id)
    {
        $page = PageModel::where(['id'=>$id,'created_by'=>auth()->user()->id])->first();
        if (!$page) {
            return redirect()->route('page.index')->with('error', 'Page not found.');
        }
        $page->delete();
        return redirect()->route('page.index')->with('success', 'Page deleted successfully!');
    }
    public function get_info(Request $request) {
        $details = PageModel::select('id', 'pre_heading_status','title_status','subtitle_status','bullet_status','media_file_status',
        'media_type','countdown_status','pre_cta_status','popup_status','ps_text_status', 'open_new_tab',
        'countdown','addination_cta_status','popup_destination','page_cta_url','addination_cta_new_tab')->where(['id' => $request->id, 'created_by' => auth()->user()->id])->first();
            if($details->countdown_status == 1){
                $details->countdown_time = $this->getTimeDifference($details->countdown);
            }
        if (is_null($details)) {
            return response()->json(['status' => false, 'message' => 'data not found', 'data' => null]);
        } else {
            $data = view('page.details', compact('details'))->render();
            return response()->json(['status' => true, 'message' => 'data found', 'data' => $data]);
        }
    }
    function getTimeDifference($date) {
        $dateToCompare = Carbon::parse($date);
        $now = Carbon::now();
        if ($dateToCompare->isPast()) {
            return "Expired";
        }
        $diffInDays = $now->diffInDays($dateToCompare);
        $remainingAfterDays = $now->copy()->addDays($diffInDays);
        $diffInHours = $remainingAfterDays->diffInHours($dateToCompare);
        $remainingAfterHours = $remainingAfterDays->addHours($diffInHours);
        $diffInMinutes = $remainingAfterHours->diffInMinutes($dateToCompare);
        $output = "Ends in: ";
        if ($diffInDays > 0) {
            $output .= "{$diffInDays} Days, ";
        }
        if ($diffInHours > 0) {
            $output .= "{$diffInHours} Hrs ";
        }
        if ($diffInMinutes > 0) {
            $output .= "& {$diffInMinutes} Mnts";
        }
        return $output;
    }
}
