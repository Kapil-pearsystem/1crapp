<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\BottomFooterModel;
use App\Models\TopDefaultFooterModel;
use App\Models\CompliancesModel;


class FooterController extends Controller
{
    public function index()
    {
        // $bottom_footer = BottomFooterModel::where('created_by', auth()->user()->id)->first();
        $details = TopDefaultFooterModel::where('created_by', auth()->user()->id)->first();
        // $compliances = CompliancesModel::where('created_by', auth()->user()->id)->orderBy('priority', 'DESC')->get();

        return view('footer.footer-top', compact('details'));

    }
    public function save_top(Request $request){
        
        $data = $request->id ? TopDefaultFooterModel::find($request->id) : new TopDefaultFooterModel();
        if(!empty($request->logo))
		{
	    	$logofileName = time().rand().'.'.$request->logo->extension();		
            $request->logo->move(public_path('img'), $logofileName);
			$data->logo  = asset('img/'.$logofileName);
		}
        if(!empty($request->playstore_logo))
		{
	    	$playstore_logofileName = time().rand().'.'.$request->playstore_logo->extension();		
            $request->playstore_logo->move(public_path('img'), $playstore_logofileName);
			$data->playstore_logo  = asset('img/'.$playstore_logofileName);
		}
        if(!empty($request->promo_icon))
		{
	    	$promo_iconfileName = time().rand().'.'.$request->promo_icon->extension();		
            $request->promo_icon->move(public_path('img'), $promo_iconfileName);
			$data->promo_icon  = asset('img/'.$promo_iconfileName);
		}
        $data->logo_link     = $request->logo_link;
        $data->logo_enable     = $request->logo_enable??0;
        $data->playstore_link     = $request->playstore_link;
        $data->playstore_enable     = $request->playstore_enable??0;
        $data->promo_title     = $request->promo_title;
        $data->promo_subtitle     = $request->promo_subtitle;
        $data->promo_content     = $request->promo_content;
        $data->promo_btn_text     = $request->promo_btn_text;
        $data->promo_btn_link     = $request->promo_btn_link;
        $data->promo_enable     = $request->promo_enable??0;

        $data->status       = $request->status;
        $data->created_by   = auth()->user()->id;
        $data->save();
        return redirect()->back()->with('success', 'Top Footer Data Saved Successfully.');
    }
    public function footer_bottom()
    {
        $details = BottomFooterModel::where('created_by', auth()->user()->id)->first();
        return view('footer.footer-bottom', compact('details'));

    }
    public function compliances()
    {
        $compliances = CompliancesModel::where('created_by', auth()->user()->id)->orderBy('priority', 'DESC')->get();
        return view('footer.compliances', compact('compliances'));
    }
    public function save_compliances(Request $request)
    {
        $data = $request->id ? CompliancesModel::find($request->id) : new CompliancesModel();
        $data->title        = $request->title;
        $data->link         = $request->link;
        $data->priority     = $request->priority;
        $data->new_tab      = $request->new_tab??0;
        $data->status       = $request->status;
        $data->created_by   = auth()->user()->id;
        $data->save();
        return redirect()->back()->with('success', 'Compliance Saved Successfully.');
    }
    
    public function destroy_compliances($id)
    {
        $data = CompliancesModel::findOrFail($id);
        $data->delete();
        return redirect()->back()->with('success', 'Compliance deleted successfully!');
    }
}
