<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;
use Auth;
use App\Models\PageModel;
use App\Models\CDOCategoryModel;
use App\Models\CDOModel;
use App\Models\MainProperty;
use App\Models\ProductServiceCategory;
use App\Models\ProductService;
use App\Models\EmbedPageModel;
use App\Models\FormModel;

use function Adminer\redirect;

class PageController extends Controller
{
    public function index($slug = NULL){
        // $agent_id = app('currentAgent')->id;
        $agent_id = 78;
        $page_data = PageModel::where(['slug'=>$slug,'status'=>1, 'created_by'=>$agent_id])->first();
        // dd($page_data);
        
        if(!is_null($page_data)){
            if($page_data->addination_cta_type == 'custom_url'){
                $page_data->addination_url = $page_data->addination_url;
            }else{
                $asset = DB::table('tbl_assets')->where(['id'=>$page_data->asset_id])->first();
                // dd($asset);
                if($asset){
                    $page_data->addination_url = $asset->url;
                }else{
                    $page_data->addination_url = 'javascript:void(0)';
                }
            }
            return view('front.page',compact('page_data'));
        }
        return redirect()->route('404');
    }
    public function get_page_popup_info(Request $request){

        $request->validate(['id'=>'required|integer']);
        $page_data = PageModel::select('id','popup_content','popup_image','embed_form_code','embed_form_status','popup_image_status','popup_content_status')->where('id',$request->id)->first();
        $cdo_category = CDOCategoryModel::select('id','name')->where('status',1)->get();
        $product_category = ProductServiceCategory::select('id','name')->where('status',1)->get();
        // return $cdo_category;
        $id = $request->id;
        if(!is_null($page_data)){
            $data = view('front/page-popup-info',compact('page_data','cdo_category','product_category','id'))->render();
            return response()->json(['status'=>true,'data'=>$data,'message'=>'Success!']);
        }else{
            return response()->json(['status'=>false,'data'=>NULL,'message'=>'Failed!']);
        }
    }
    public function get_cdo_by_cat(Request $request){
        $request->validate(['id'=>'required|integer']);
        $cdo_data = CDOModel::select('id','name')->where('category',$request->id)->get();
        // return $cdo_category;
        if(!is_null($cdo_data)){
            return response()->json(['status'=>true,'data'=>$cdo_data,'message'=>'Success!']);
        }else{
            return response()->json(['status'=>false,'data'=>NULL,'message'=>'Failed!']);
        }
    }
    public function get_product_by_cat(Request $request){
        $request->validate(['id'=>'required|integer']);
        $product_data = ProductService::select('id','prod_name')->where('prod_category',$request->id)->get();
        // return $cdo_category;
        if(!is_null($product_data)){
            return response()->json(['status'=>true,'data'=>$product_data,'message'=>'Success!']);
        }else{
            return response()->json(['status'=>false,'data'=>NULL,'message'=>'Failed!']);
        }
    }
    public function save_page_popup_data(Request $request){
        $request->validate([
            'page_id'=>'required|integer',
            'name'=>'required',
            'source'=>'required',
            'email'=>'required',
            'cdo_category'=>'required',
            'phone'=>'required|numeric',
            'product_category'=>'required|integer',
            'message'=>'required',
        ]);
        $other_product = $request->other_product_and_service;
        $other_cod = $request->other_cod;
        $page_data = PageModel::where(['id'=>$request->page_id,'status'=>1, 'created_by'=>app('currentAgent')->id])->first();
        // dd($request->all());
        // dd($page_data);

        $product_data = ProductService::select('id','prod_name')->where('prod_category',$request->id)->get();
        // return $cdo_category;
        if(!is_null($product_data)){
            return redirect()->back()->with('success','Your information has been submitted successfully!');
            return response()->json(['status'=>true,'data'=>$product_data,'message'=>'Success!']);
        }else{
            return response()->json(['status'=>false,'data'=>NULL,'message'=>'Failed!']);
        }
    }
    public function embed_pages($slug = NULL){
        $user_id = Auth::id();
        $page_data = EmbedPageModel::where(['page_url'=>$slug,'status'=>'active', 'created_by'=> app('currentAgent')->id])->first();
        if(is_null($page_data)){
            return redirect()->route('404');
        }
        if($page_data->login_status == 1){
            return view('web.pages.embed-page',compact('page_data')); // before login
        }else{
            if(!$user_id){
                return redirect()->route('login');
            }
            return view('dashboard.embed-page',compact('page_data')); // after login
        }
        
    }
}