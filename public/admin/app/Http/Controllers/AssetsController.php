<?php



namespace App\Http\Controllers;



use Illuminate\Http\Request;

use App\Models\AssetsModel;

use Illuminate\Support\Str;

use Carbon\Carbon;
class AssetsController extends Controller

{

    public function index(){
        // dd(AssetsModel::all());

        $data = AssetsModel::where(['created_by'=>auth()->user()->id])->orderBy('id','DESC')->get();

        return view('assets/list',compact('data'));

    }

    public function add(){

        return view('assets/add');

    }

    public function store(Request $request)

    {

        $validationRules = [];

        $validationRules['title'] = 'required';

        $validationRules['url'] = 'required';
        
        $validationRules['page_type'] = 'required';

        $validatedData = $request->validate($validationRules);

        // $slug =  Str::slug($request->input('page_name'));

        if(!is_null($request->id)){

            $assets = AssetsModel::find($request->id);

            $msg = 'Assets Updated Successfully.';

        }else{

            $assets = new AssetsModel();

            $msg = 'Assets Created Successfully.';

        }

        $assets->title = $request->title;
        $assets->new_tab = $request->new_tab;

        $assets->url = $request->url;

        $assets->status = $request->status;
        $assets->page_type = $request->page_type;
        $assets->open_in_new_tab = $request->has('open_in_new_tab') ? 1 : 0;
     
        // ✅ Auto-set non_deletable only for Hero Page
        if ($request->page_type === 'Hero Page') {
            $assets->non_deletable = 1;
        } else {
            $assets->non_deletable = 0;
        }
        $assets->created_by = auth()->user()->id;

        $assets->save();

        return redirect()->route('assets.index')->with('success', $msg);

    }

    public function edit($id)

    {

        $details = AssetsModel::where(['id'=>$id,'created_by'=>auth()->user()->id])->first();

        if (!$details) {

            return redirect()->route('assets.index')->with('error', 'Assets not found.');

        }

        return view('assets/add',compact('details'));

    }

    public function delete($id)
    {
        $assets = AssetsModel::where(['id'=>$id,'created_by'=>auth()->user()->id])->first();
        if($assets->page_type == 'Hero Page'){
            return redirect()->route('assets.index')->with('error', 'You have not access to delete hero page.');
        }
        if (!$assets) {
            return redirect()->route('assets.index')->with('error', 'Assets not found.');
        }
        $assets->delete();
        return redirect()->route('assets.index')->with('success', 'Assets deleted successfully!');
    }

    

    public function update_status(Request $request)

    {

        $assets = AssetsModel::where(['id'=>$request->id,'created_by'=>auth()->user()->id])->first();

        if ($assets) {

            $assets->status = $request->status;

            $assets->save();

            return response()->json(['message' => 'Assets status updated successfully!']);

        }

        return response()->json(['message' => 'Assets not found!'], 404);

    }

    public function get_page(){

        $data = AssetsModel::select('id','title','url')->where(['created_by'=>auth()->user()->id,'status'=>1])->orderBy('id','desc')->get();

        // dd($data);

        if(!is_null($data)){

            return response()->json(['status'=>true,'message'=>'All Assets Fetched Successfully.','data'=>$data]);

        }else{

            return response()->json(['status'=>false,'message'=>'No Assets Found!','data'=>null]);

        }

    }

}

