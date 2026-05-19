<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\BottomFooterModel;
use App\Models\TopDefaultFooterModel;
use App\Models\CompliancesModel;
use App\Models\FooterMenu;
use App\Models\FooterSocialLink;


class FooterController extends Controller
{
    public function index()
    {
        // $bottom_footer = BottomFooterModel::where('created_by', auth()->user()->id)->first();
        $details = TopDefaultFooterModel::where('created_by', auth()->user()->id)->first();
        $socialLinks = FooterSocialLink::where('created_by', auth()->user()->id)->get();
        // $compliances = CompliancesModel::where('created_by', auth()->user()->id)->orderBy('priority', 'DESC')->get();

        return view('footer.footer-top', compact('details', 'socialLinks'));

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
        FooterSocialLink::where('created_by', auth()->id())->delete();
        foreach($request->icon as $key => $icon){
            FooterSocialLink::create([
                'icon' => $icon,
                'link' => $request->link[$key],
                'created_by' => auth()->id()
            ]);
        }
        return redirect()->back()->with('success', 'Top Footer Data Saved Successfully.');
    }
    public function menu()
    {
        $lists = FooterMenu::where('created_by', auth()->user()->id)->orderBy('id', 'DESC')->get();
        return view('footer.footer-menu', compact('lists'));
    }
    public function save_menu(Request $request){
        $data = $request->id ? FooterMenu::find($request->id) : new FooterMenu();
        $data->category     = $request->category;
        $data->title     = $request->title;
        $data->link     = $request->link;
        $data->new_tab     = $request->new_tab??0;
        $data->status       = $request->status;
        $data->created_by   = auth()->user()->id;
        $data->save();
        return redirect()->back()->with('success', 'Menu Saved Successfully.');
    }
    
    public function destroy_menu($id)
    {
        $data = FooterMenu::findOrFail($id);
        $data->delete();
        return redirect()->back()->with('success', 'Menu deleted successfully!');
    }
    public function footer_bottom()
    {
        $details = BottomFooterModel::where('created_by', auth()->user()->id)->first();
        return view('footer.footer-bottom', compact('details'));
    }
    public function save_bottom(Request $request)
    {
       $data = $request->id ? BottomFooterModel::find($request->id) : new BottomFooterModel();
        if(!empty($request->image))
		{
	    	$imagefileName = time().rand().'.'.$request->image->extension();		
            $request->image->move(public_path('img'), $imagefileName);
			$data->image  = asset('img/'.$imagefileName);
		}
        if(!empty($request->google_review_image))
		{
	    	$google_review_imagefileName = time().rand().'.'.$request->google_review_image->extension();		
            $request->google_review_image->move(public_path('img'), $google_review_imagefileName);
			$data->google_review_image  = asset('img/'.$google_review_imagefileName);
		}
        if(!empty($request->trust_pilot_image))
		{
	    	$trust_pilot_imagefileName = time().rand().'.'.$request->trust_pilot_image->extension();		
            $request->trust_pilot_image->move(public_path('img'), $trust_pilot_imagefileName);
			$data->trust_pilot_image  = asset('img/'.$trust_pilot_imagefileName);
		}
        $data->image_visible     = $request->image_visible??0;
        $data->btn_text     = $request->btn_text;
        $data->btn_link     = $request->btn_link;
        $data->left_enable     = $request->left_enable??0;
        $data->title     = $request->title;
        $data->description     = $request->description;
        $data->google_review_enable     = $request->google_review_enable??0;
        $data->trust_pilot_enable     = $request->trust_pilot_enable??0;
        $data->google_review_url     = $request->google_review_url;
        $data->trust_pilot_url     = $request->trust_pilot_url;
        $data->subscribe_title     = $request->subscribe_title;
        $data->subscribe_content     = $request->subscribe_content;
        $data->subscribe_embededcode     = $request->subscribe_embededcode;
        $data->subscribe_enable     = $request->subscribe_enable??0;
        $data->status       = $request->status;
        $data->created_by   = auth()->user()->id;
        $data->save();
        return redirect()->back()->with('success', 'Bottom Footer Saved Successfully.');
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
