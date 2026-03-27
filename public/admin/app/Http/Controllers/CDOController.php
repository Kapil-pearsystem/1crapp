<?php
namespace App\Http\Controllers;
use App\Models\User;
use App\Models\CDOCategoryModel;
use App\Models\CDOModel;
use App\Models\EnquiryModel;
use App\Exports\UsersExport;
use App\Imports\UsersImport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Auth;
// use App\Helper\Helper as Helper;
class CDOController extends Controller
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
        $cdo = CDOModel::select('tbl_cdo.*','tbl_cdo_category.name as category')->leftjoin('tbl_cdo_category','tbl_cdo_category.id','=','tbl_cdo.category')->where(['tbl_cdo.created_by' => auth()->user()->id])->get();
        return view('cdo.cdo-list',compact('cdo'));
    }
    public function create_category(){
        return view('cdo.add-category');
    }
    public function store_category(Request $request){
        $validator = Validator::make($request->all(),['name'=>'required','status'=>'required']);
        if($request->id){
            $cdo_category = CDOCategoryModel::find($request->id);
            $msg = 'CDO Category Updated Successfully!';
        }else{
            $cdo_category = new CDOCategoryModel();
            $msg = 'CDO Category Created Successfully!';
        }
        $cdo_category->slug = Str::slug($request->name);
        $cdo_category->name = $request->name;
        $cdo_category->status = $request->status;
        $cdo_category->created_by = auth()->user()->id;
        if($cdo_category->save()){
            return redirect()->route('cdo.category-list')->with('success', $msg);
        }else{
            return redirect()->back()->withInput()->with('error', 'CDO Category Creating Error!');
        }
    }
    public function category_list(){
        // $cdo_category = CDOCategoryModel::all();
        $cdo_category = CDOCategoryModel::where(['created_by' => auth()->user()->id])->get();
        return view('cdo.category-list',compact('cdo_category'));
    }
    public function edit_category($id){
        $cdo_category = CDOCategoryModel::find($id);
        return view('cdo.add-category',compact('cdo_category'));
    }
    
    public function delete_category($id){
        $existing = CDOModel::where('category',$id)->exists();
        if($existing){
            return redirect()->back()->with('error','This cannot be deleted as it is already in use!');
        }
        $cdo= CDOCategoryModel::where(['id'=>$id,'created_by'=>auth()->user()->id])->first();
        if ($cdo) {
            $cdo->delete();
            return redirect()->back()->with('success','Category Deleted Successfully!');
        }
        return response()->back()->with(['error' => 'Category not found!'], 404);
    }
    
    public function create(){
        $cdo_category = CDOCategoryModel::where(['created_by' => auth()->user()->id,'status'=>1])->get();
        return view('cdo.add-cdo',compact('cdo_category'));
    }
    public function store(Request $request){
        // dd($request->all());
        $validator = Validator::make($request->all(),[
            'category'=>'required',
            'name'=>'required',
            'status'=>'required'
        ]);
        if($validator->fails()){
            return redirect()->back()->withInput()->with('error','Validation False!');
        }
        if($request->id){
            $cdo= CDOModel::find($request->id);
            $msg = 'Resource Updated Successfully!';
        }else{
            $cdo= new CDOModel();
            $msg = 'COD Created Successfully!';
        }
        $cdo->slug = Str::slug($request->name);
        $cdo->category = $request->category;
        $cdo->business = $request->business;
        $cdo->name = $request->name;
        $cdo->status = $request->status;
        $cdo->created_by = auth()->user()->id;
        if($cdo->save()){
            return redirect()->route('cdo.index')->with('success',$msg);
        }else{
            return redirect()->back()->withInput()->with('success','COD creating error!');
        }
    }
    public function edit($id)
    {
        $cdo = CDOModel::where(['id' => $id, 'created_by' => auth()->user()->id])->first();
        if ($cdo) {
            $cdo_category = CDOCategoryModel::where(['created_by' => auth()->user()->id])->get();
            return view('cdo.add-cdo', compact('cdo_category', 'cdo'));
        }
        return redirect()->back()->with('error', 'COD not found!');
    }
    public function delete($id){
        $existing = EnquiryModel::where('cdo_id',$id)->exists();
        if($existing){
            return redirect()->back()->with('error','This cannot be deleted as it is already in use!');
        }
        $cdo= CDOModel::where(['id'=>$id,'created_by'=>auth()->user()->id])->first();
        if ($cdo) {
            $cdo = CDOModel::find($id);
            $cdo->delete();
            return redirect()->back()->with('success','COD Deleted Successfully!');
        }
        return response()->back()->with(['error' => 'COD not found!'], 404);
    }
    // public function update_authorization_status(Request $request)
    // {
    //     $cdo= CDOModel::where(['id'=>$request->id,'created_by'=>auth()->user()->id])->first();
    //     if ($resources) {
    //         $cdo->authorization = $request->status;
    //         $cdo->save();
    //         return response()->json(['message' => 'Authorization status updated successfully!']);
    //     }
    //     return response()->json(['message' => 'COD not found!'], 404);
    // }
    // public function update_resource_status(Request $request)
    // {
    //     $cdo= CDOModel::where(['id'=>$request->id,'created_by'=>auth()->user()->id])->first();
    //     if ($resources) {
    //         $cdo->status = $request->status;
    //         $cdo->save();
    //         return response()->json(['message' => 'Status updated successfully!']);
    //     }
    //     return response()->json(['message' => 'COD not found!'], 404);
    // }
}