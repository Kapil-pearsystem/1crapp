<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\ResourceCategoryModel;
use App\Models\ResourceModel;
use App\Exports\UsersExport;
use App\Imports\UsersImport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Auth;
// use App\Helper\Helper as Helper;

class ResourceandToolsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        // $this->middleware('permission:gift-list|create|delete-gift|update-gift', ['only' => ['index']]);
        // $this->middleware('permission:create-gift', ['only' => ['create','store', 'updateStatus']]);
        // $this->middleware('permission:update-gift', ['only' => ['edit','update']]);
        // $this->middleware('permission:delete-gift', ['only' => ['delete']]);
    }
    public function index(){
        $resources = ResourceModel::select('tbl_resources.*','tbl_resource_category.name as category')
        ->leftjoin('tbl_resource_category','tbl_resource_category.id','=','tbl_resources.category')
        ->where(['tbl_resources.created_by' => auth()->user()->id])->get();
        return view('resources.resource-list',compact('resources'));
    }
    public function create_category(){
        return view('resources.add-category');
    }
    public function store_category(Request $request){
        $validator = Validator::make($request->all(),['name'=>'required','status'=>'required']);
        if($request->id){
            $resource_category = ResourceCategoryModel::find($request->id);
            $msg = 'Resource Category Updated Successfully!';
        }else{
            $resource_category = new ResourceCategoryModel();
            $msg = 'Resource Category Created Successfully!';
        }
        $resource_category->name = $request->name;
        $resource_category->status = $request->status;
        $resource_category->created_by = auth()->user()->id;
        if($resource_category->save()){
            return redirect()->route('resources-and-tools.category-list')->with('success', $msg);
        }else{
            return redirect()->back()->withInput()->with('error', 'Resource Category Creating Error!');
        }
    }
    public function category_list(){
        // $resource_category = ResourceCategoryModel::all();
        $resource_category = ResourceCategoryModel::where(['created_by' => auth()->user()->id])->get();
        return view('resources.category-list',compact('resource_category'));
    }
    public function edit_category($id){
        $resources_category = ResourceCategoryModel::find($id);
        return view('resources.add-category',compact('resources_category'));
    }
    public function create(){
        $resources_category = ResourceCategoryModel::where(['created_by' => auth()->user()->id])->get();
        return view('resources.add-resource',compact('resources_category'));
    }
    public function store(Request $request){
        // dd($request->all());
        $validator = Validator::make($request->all(),[
            'category'=>'required',
            'title'=>'required',
            'description'=>'required',
            'link'=>'required',
            'authorization'=>'required',
            'ribbon'=>'required',
            'status'=>'required'
        ]);
        if($validator->fails()){
            return redirect()->back()->withInput()->with('error','Validation False!');
        }
        if($request->id){
            $resources = ResourceModel::find($request->id);
            $msg = 'Resource Updated Successfully!';
        }else{
            $resources = new ResourceModel();
            $msg = 'Resource Created Successfully!';
        }
        $resources->category = $request->category;
        $resources->title = $request->title;
        $resources->description = $request->description;
        $resources->link = $request->link;
        $resources->authorization = $request->authorization;
        $resources->ribbon = $request->ribbon;
        $resources->status = $request->status;
        $resources->created_by = auth()->user()->id;
        if($resources->save()){
            return redirect()->route('resources-and-tools.index')->with('success',$msg);
        }else{
            return redirect()->back()->withInput()->with('success','Resource creating error!');
        }
    }
    public function edit($id)
    {
        $resource = ResourceModel::where(['id' => $id, 'created_by' => auth()->user()->id])->first();
        if ($resource) {
            $resources_category = ResourceCategoryModel::where(['created_by' => auth()->user()->id])->get();
            return view('resources.add-resource', compact('resources_category', 'resource'));
        }
        return redirect()->back()->with('error', 'Resource & Tools not found!');
    }

    public function delete($id){
        $resources = ResourceModel::where(['id'=>$id,'created_by'=>auth()->user()->id])->first();
        if ($resources) {
            $resources = ResourceModel::find($id);
            $resources->delete();
            return redirect()->back()->with('success','Resource & Tools Deleted Successfully!');
        }
        return response()->back()->with(['error' => 'Resource & Tools not found!'], 404);
    }
    public function update_authorization_status(Request $request)
    {
        $resources = ResourceModel::where(['id'=>$request->id,'created_by'=>auth()->user()->id])->first();
        if ($resources) {
            $resources->authorization = $request->status;
            $resources->save();
            return response()->json(['message' => 'Authorization status updated successfully!']);
        }
        return response()->json(['message' => 'Resource & Tools not found!'], 404);
    }
    public function update_resource_status(Request $request)
    {
        $resources = ResourceModel::where(['id'=>$request->id,'created_by'=>auth()->user()->id])->first();
        if ($resources) {
            $resources->status = $request->status;
            $resources->save();
            return response()->json(['message' => 'Status updated successfully!']);
        }
        return response()->json(['message' => 'Resource & Tools not found!'], 404);
    }
    public function delete_category($id){
        if(ResourceModel::where(['category'=>$id,'created_by'=>auth()->user()->id])->exists()){
            return redirect()->back()->with('error', 'This category already has a resource assigned to it, so it cannot be deleted.');
        }
            $resources_cat = ResourceCategoryModel::find($id);
        if ($resources_cat) {
            $resources_cat->delete();
            return redirect()->back()->with('success','Resource & Tools Category Deleted Successfully!');
        }
        return response()->back()->with(['error' => 'Resource & Tools Category not found!'], 404);
    }

}