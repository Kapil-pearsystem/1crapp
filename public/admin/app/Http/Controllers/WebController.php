<?php
namespace App\Http\Controllers;
use App\Models\ServiceCategoryModel;
use App\Models\ServiceModel;
use App\Models\TestimonialsModel;
use App\Models\OurClientsModel;
use App\Models\QuicklyAnalyzeModel;
use App\Exports\UsersExport;
use App\Imports\UsersImport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class WebController extends Controller
{
    public function __construct(){

    }
    public function index(){
        
    }
    // Service Category
    public function service_category(){
        $lists = ServiceCategoryModel::where('created_by',auth()->user()->id)->orderBy('id','DESC')->get();
        // dd($lists);
        return view('website.services.category-list',compact('lists'));
    }
    public function add_service_category(){
        return view('website.services.add-category');
    }
    public function store_category(Request $request){
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'status' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }

        if($request->id){
            $service_category = ServiceCategoryModel::find($request->id);
            $msg = 'Category Updated Successfully';
        }else{
            $service_category = new ServiceCategoryModel();
            $msg = 'Category Created Successfully';
        }
        $service_category->title = $request->title;
        $service_category->slug = Str::slug($request->title);
        $service_category->status = $request->status;
        $service_category->created_by = auth()->user()->id;
        if($service_category->save()){
            return redirect()->route('web.service-category.index')->with('success', $msg);
        }else{
            return redirect()->back()->withInput()->with('error', 'Category Creating Error!');
        }
    }
   public function edit_service_category($id){
    $details = ServiceCategoryModel::find($id);
    return view('website.services.add-category',compact('details'));
   }
    public function delete_service_category($id){
        $service_category = ServiceCategoryModel::find($id);
        $service_category->delete();
        return redirect()->back()->with('success','Category Deleted Successfully!');
    }
    // Services

    public function services(){
        $lists = ServiceModel::select('ws_services.*','ws_servicecategory.title as category_name')
        ->join('ws_servicecategory','ws_servicecategory.id','=','ws_services.category_id')
        ->orderBy('ws_services.id','DESC')->where('ws_services.created_by',auth()->user()->id)->get();
        // dd($lists);
        return view('website.services.index',compact('lists'));
    }
    public function add_service(){
        $categories = ServiceCategoryModel::where(['status'=>1, 'created_by'=>auth()->user()->id])->get();
        return view('website.services.add',compact('categories'));
    }
    public function store_service(Request $request){
        $validator = $request->validate([
            'category_id' => 'required|exists:ws_servicecategory,id',
            'title' => 'required|string|max:255',
            'get_started_link' => 'nullable|url',
            'start_link_new_tab' => 'nullable|boolean',
            'explore_more_link' => 'nullable|url',
            'explore_more_link_new_tab' => 'nullable|boolean',
            'description' => 'required|string',
            'image' => $request->id ? 'nullable|image|mimes:jpg,png,jpeg|max:2048' : 'required|image|mimes:jpg,png,jpeg|max:2048',
            'status' => 'required|in:0,1',
        ]);
        if($request->hasFile('image')) {
            $imageName = time() . '_' . $request->image->getClientOriginalName();
            $request->image->move(public_path('uploads'), $imageName);
            $image_name = 'uploads/'.$imageName;
            if ($request->id) {
                $old_data = ServiceModel::find($request->id);
                $imagePath = public_path($old_data->image);
                if (File::exists($imagePath)) {
                    File::delete($imagePath);
                }
            }
        }else{
            $image_name = base64_decode($request->old_image);
        }
        if($request->id){
            $service = ServiceModel::find($request->id);
            $msg = 'Service Updated Successfully';
        }else{
            $service = new ServiceModel();
            $msg = 'Service Created Successfully';
        }
        $service->category_id = $request->category_id;
        $service->title = $request->title;
        $service->slug = Str::slug($request->title);
        $service->get_started_link = $request->get_started_link;
        $service->start_link_new_tab = $request->start_link_new_tab??0;
        $service->explore_more_link = $request->explore_more_link;
        $service->explore_more_link_new_tab = $request->explore_more_link_new_tab??0;
        $service->description = $request->description;
        $service->image = $image_name;
        $service->status = $request->status;
        $service->created_by = auth()->user()->id;
        // dd($service);
        if($service->save()){
            return redirect()->route('web.services.index')->with('success', $msg);
        }else{
            return redirect()->back()->withInput()->with('error', 'Category Creating Error!');
        }
    }
    public function edit_service($id){
        $details = ServiceModel::find($id);
        $categories = ServiceCategoryModel::where(['status'=>1, 'created_by'=>auth()->user()->id])->get();
        return view('website.services.add',compact('categories','details'));
    }
    public function delete_service($id){
        $service = ServiceModel::find($id);
        if ($id) {
            $imagePath = public_path($service->image);
            if (File::exists($imagePath)) {
                File::delete($imagePath);
            }
        }
        $service->delete();
        return redirect()->back()->with('success','Service Deleted Successfully!');
    }

    // Testimonials
    public function testimonials(){
        $lists = TestimonialsModel::where('created_by',auth()->user()->id)->orderBy('id','DESC')->get();
        return view('website.testimonial.index',compact('lists'));
    }
    public function add_testimonial(){
        return view('website.testimonial.add');
    }
    public function store_testimonial(Request $request)
    {
        $validator = $request->validate([
            'name' => 'required|string|max:255',
            'designation' => 'required|string|max:255',
            'company' => 'required|string|max:255',
            'location' => 'required|string|max:555',
            'about' => 'required|string',
            'rating' => 'required|integer|min:1|max:5',
            'contact' => 'required|string|max:55',
            'video' => 'nullable|url',
            'image' => $request->id ? 'nullable|image|mimes:jpg,png,jpeg|max:2048' : 'required|image|mimes:jpg,png,jpeg|max:2048',
            'status' => 'required|in:0,1',
        ]);

        if ($request->hasFile('image')) {
            $imageName = time() . '_' . $request->image->getClientOriginalName();
            $request->image->move(public_path('uploads'), $imageName);
            $image_name = 'uploads/' . $imageName;
            if ($request->id) {
                $old_data = TestimonialsModel::find($request->id);
                $imagePath = public_path($old_data->image);
                if (File::exists($imagePath)) {
                    File::delete($imagePath);
                }
            }
        } else {
            $image_name = $request->id ? base64_decode($request->old_image) : null;
        }

        if ($request->id) {
            $testimonial = TestimonialsModel::find($request->id);
            $msg = 'Testimonial Updated Successfully';
        } else {
            $testimonial = new TestimonialsModel();
            $msg = 'Testimonial Created Successfully';
        }

        $testimonial->name = $request->name;
        $testimonial->designation = $request->designation;
        $testimonial->company = $request->company;
        $testimonial->location = $request->location;
        $testimonial->about = $request->about;
        $testimonial->rating = $request->rating;
        $testimonial->contact = $request->contact;
        $testimonial->video = $request->video;
        $testimonial->image = $image_name;
        $testimonial->status = $request->status;
        $testimonial->created_by = auth()->user()->id;

        if ($testimonial->save()) {
            return redirect()->route('web.testimonials.index')->with('success', $msg);
        } else {
            return redirect()->back()->withInput()->with('error', 'Error saving testimonial!');
        }
    }
    public function edit_testimonial($id){
        $details = TestimonialsModel::find($id);
        return view('website.testimonial.add',compact('details'));
    }
    public function delete_testimonial($id){
        $testimonial = TestimonialsModel::find($id);
        if($id) {
            $imagePath = public_path($testimonial->image);
            if (File::exists($imagePath)) {
                File::delete($imagePath);
            }
        }
        $testimonial->delete();
        return redirect()->back()->with('success','Testimonial Deleted Successfully!');
    }
    // Our Clients
    public function clients()
    {
        $lists = OurClientsModel::where(['created_by' => auth()->user()->id])->orderBy('id', 'DESC')->get();
        return view('website.clients.index', compact('lists'));
    }

    public function add_client()
    {
        return view('website.clients.add');
    }

    public function store_client(Request $request)
    {
        $validator = $request->validate([
            'name' => 'required|string|max:255',
            'designation' => 'required|string|max:255',
            'company' => 'required|string|max:255',
            'location' => 'required|string|max:555',
            'about' => 'required|string',
            'rating' => 'required|integer|min:1|max:5',
            'contact' => 'required|string|max:55',
            'video' => 'nullable|url',
            'image' => $request->id ? 'nullable|image|mimes:jpg,png,jpeg|max:2048' : 'required|image|mimes:jpg,png,jpeg|max:2048',
            'status' => 'required|in:0,1',
        ]);

        if ($request->hasFile('image')) {
            $imageName = time() . '_' . $request->image->getClientOriginalName();
            $request->image->move(public_path('uploads'), $imageName);
            $image_name = 'uploads/' . $imageName;
            // delete old image
            if ($request->id) {
                $client = OurClientsModel::find($request->id);
                $imagePath = public_path($client->image);
                if (File::exists($imagePath)) {
                    File::delete($imagePath);
                }
            }
        } else {
            $image_name = $request->id ? base64_decode($request->old_image) : null;
        }

        if ($request->id) {
            $client = OurClientsModel::find($request->id);
            $msg = 'Client Updated Successfully';
        } else {
            $client = new OurClientsModel();
            $msg = 'Client Created Successfully';
        }

        $client->name = $request->name;
        $client->designation = $request->designation;
        $client->company = $request->company;
        $client->location = $request->location;
        $client->about = $request->about;
        $client->rating = $request->rating;
        $client->contact = $request->contact;
        $client->video = $request->video;
        $client->image = $image_name;
        $client->status = $request->status;
        $client->created_by = auth()->user()->id;
        if ($client->save()) {
            return redirect()->route('web.clients.index')->with('success', $msg);
        } else {
            return redirect()->back()->withInput()->with('error', 'Error saving client!');
        }
    }

    public function edit_client($id)
    {
        $details = OurClientsModel::find($id);
        return view('website.clients.add', compact('details'));
    }

    public function delete_client($id)
    {
        $client = OurClientsModel::find($id);
        if ($id) {
            $imagePath = public_path($client->image);
            if (File::exists($imagePath)) {
                File::delete($imagePath);
            }
        }
        $client->delete();
        return redirect()->back()->with('success', 'Client Deleted Successfully!');
    }

    // Quickly Analyze
    public function quickly_analyze()
    {
        $lists = QuicklyAnalyzeModel::orderBy('id', 'DESC')->get();
        return view('website.quickly_analyze.index', compact('lists'));
    }

    public function create_quickly_analyze()
    {
        return view('website.quickly_analyze.create');
    }

    public function store_quickly_analyze(Request $request)
    {
        $validator = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'required|in:0,1',
            'image' => $request->id ? 'nullable|image|mimes:jpg,png,jpeg|max:2048' : 'required|image|mimes:jpg,png,jpeg|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $imageName = time() . '_' . $request->image->getClientOriginalName();
            $request->image->move(public_path('uploads'), $imageName);
            $image_name = 'uploads/' . $imageName;
             // delete old image
            if ($request->id) {
                $old_data = QuicklyAnalyzeModel::find($request->id);
                $imagePath = public_path($old_data->image);
                if (File::exists($imagePath)) {
                    File::delete($imagePath);
                }
            }
        } else {
            $image_name = $request->id ? base64_decode($request->old_image) : null;
        }

        if ($request->id) {
            $entry = QuicklyAnalyzeModel::find($request->id);
            $msg = 'Entry Updated Successfully';
        } else {
            $entry = new QuicklyAnalyzeModel();
            $msg = 'Entry Created Successfully';
        }

        $entry->title = $request->title;
        // $entry->slug = Str::slug($request->title);
        $entry->description = $request->description;
        $entry->image = $image_name;
        $entry->status = $request->status;
        $entry->created_by = auth()->user()->id;

        if ($entry->save()) {
            return redirect()->route('web.quickly-analyze.index')->with('success', $msg);
        } else {
            return redirect()->back()->withInput()->with('error', 'Error saving entry!');
        }
    }

    public function edit_quickly_analyze($id)
    {
        $details = QuicklyAnalyzeModel::find($id);
        return view('website.quickly_analyze.create', compact('details'));
    }

    public function delete_quickly_analyze($id)
    {
        $entry = QuicklyAnalyzeModel::find($id);
        if ($id) {
            $imagePath = public_path($entry->image);
            if (File::exists($imagePath)) {
                File::delete($imagePath);
            }
        }
        $entry->delete();
        return redirect()->back()->with('success', 'Record Deleted Successfully!');
    }

}
