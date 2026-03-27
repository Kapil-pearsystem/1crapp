<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;
use Auth;
use App\Models\ResourceCategoryModel;
use App\Models\ResourceModel;
use App\Models\User;

class ResourceController extends Controller
{
    
    public function get_resource_category()
    {
        $resources_category = ResourceCategoryModel::select('id','name')->where(['status'=> 1, 'created_by'=>app('currentAgent')->id])->get();
        return response()->json(['status'=>true,'data'=>$resources_category]);
    }
    public function get_resource_bycategory(Request $request)
    {
        $resources = ResourceModel::where(['category'=>$request->category_id,'status'=>1, 'created_by'=>app('currentAgent')->id])->get();
        return response()->json([
            'status' => true,
            'data' => $resources
        ]);
    }
    
    public function check_authorization($resource_id){
        $resources = ResourceModel::where(['id'=>$resource_id,'status'=>1])->first();
        // dd($resources);
        if($resources){
            if($resources->authorization == 1){
                if(Auth::id()){
                    return redirect()->away($resources->link);
                }else{
                    Session::put('redirect_link',$resources->link);
                    return redirect()->route('login');
                }
            }else{
                return redirect()->away($resources->link);
            }
        }else{
            return redirect()->back();
        }
    }
}