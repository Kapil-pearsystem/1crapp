<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AppointmentThankyouModel;
use App\Models\BookingClSocialLinkModel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class AppointmentThankyouController extends Controller
{
    // ⭐ List
    public function index()
    {
        $lists = AppointmentThankyouModel::where('created_by', auth()->id())->get();
        return view('appointment-thankyou.index', compact('lists'));
    }

    // ⭐ Create Page
    public function create()
    {
        $pages = DB::table('tbl_page')->pluck('page_name', 'id'); 
        return view('appointment-thankyou.create', compact('pages'));
    }

    // ⭐ Add + Edit
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'logo'  => $request->id
                ? 'nullable|image|mimes:jpg,jpeg,png|max:2048'
                : 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // ⭐ Logo Upload
        if ($request->hasFile('logo')) {
            $fileName = time().'_'.$request->logo->getClientOriginalName();
            $request->logo->move(public_path('uploads/calender/'), $fileName);

            $logoPath = url('uploads/calender/'.$fileName);

            // delete old
            if ($request->id) {
                $old = AppointmentThankyouModel::find($request->id);
                if ($old && $old->logo) {
                    $oldFile = public_path(str_replace(url('/').'/', '', $old->logo));
                    if (File::exists($oldFile)) {
                        File::delete($oldFile);
                    }
                }
            }
        } else {
            $logoPath = $request->old_logo ?? null;
        }

        // ⭐ Add / Update
        if ($request->id) {
            $record = AppointmentThankyouModel::findOrFail($request->id);
            $message = "Calender updated successfully!";
        } else {
            $record = new AppointmentThankyouModel();
            $message = "Calender created successfully!";
        }

        // ⭐ Save data
        $record->title = $request->title;
        // ✅ Page Name
$record->page_name = $request->page_name ?? $request->title;

// ✅ Slug generate
$baseSlug = Str::slug($record->page_name);

// ✅ Unique slug banane ka logic
$slug = $baseSlug;
$count = 1;

while (
    AppointmentThankyouModel::where('slug', $slug)
    ->when($request->id, function ($q) use ($request) {
        return $q->where('id', '!=', $request->id); // edit case ignore current
    })
    ->exists()
) {
    $slug = $baseSlug . '-' . $count++;
}

$record->slug = $slug;
        $record->logo = $logoPath;
        $record->logo_visible = $request->logo_visible ?? 0;
      if (!$request->id) {
    $record->calender_code = $this->generateUniqueCode();
} else {
    // keep old value
    $record->calender_code = $record->calender_code;
}
        $record->sub_title = $request->sub_title;
        $record->sub_title_color = $request->sub_title_color;
        $record->sortdescription = $request->sortdescription;

        $record->description1 = $request->description1;
        $record->des_is_visible1 = $request->des_is_visible1 ?? 0;

        $record->description2 = $request->description2;
        $record->des_is_visible2 = $request->des_is_visible2 ?? 0;

        $record->description3 = $request->description3;
        $record->des_is_visible3 = $request->des_is_visible3 ?? 0;

        $record->join_title = $request->join_title;
        $record->join_subtitle = $request->join_subtitle;

        $record->cta_text = $request->cta_text;
        $record->cta_page_id = $request->cta_page_id;

        $record->header_footer_cta_bg_color = $request->header_footer_cta_bg_color;
        $record->header_footer_cta_text_color = $request->header_footer_cta_text_color;
        
        $record->assets_title = $request->assets_title;
        $record->sm_visible = $request->sm_visible ?? 0;
        $record->nf_visible = $request->nf_visible ?? 0;

        $record->status = $request->status ?? 1;
        $record->created_by = auth()->id();

        $record->save();

        // ⭐ Save Social Links
        if ($request->social_title && is_array($request->social_title)) {

            // delete old links (edit case)
            BookingClSocialLinkModel::where('calender_id', $record->id)->delete();

            foreach ($request->social_title as $key => $title) {

                if (!empty($title)) {
                    BookingClSocialLinkModel::create([
                        'calender_id' => $record->id,
                        'title' => $title,
                        'url' => $request->social_url[$key] ?? '',
                        'status' => 1,
                        'created_by' => auth()->id()
                    ]);
                }
            }
        }

        return redirect()->route('appointment-thankyou.index')->with('success', $message);
    }

    // ⭐ Edit
    public function edit($id)
    {
        $details = AppointmentThankyouModel::with('socialLinks')->findOrFail($id);
        $pages = DB::table('tbl_page')->pluck('page_name', 'id'); 
        return view('appointment-thankyou.create', compact('details', 'pages'));
    }

    // ⭐ Delete
    public function destroy($id)
    {
        $record = AppointmentThankyouModel::findOrFail($id);

        // delete logo
        if ($record->logo) {
            $filePath = public_path(str_replace(url('/').'/', '', $record->logo));
            if (File::exists($filePath)) {
                File::delete($filePath);
            }
        }

        // delete social links
        BookingClSocialLinkModel::where('calender_id', $id)->delete();

        $record->delete();

        return redirect()->route('appointment-thankyou.index')
            ->with('success', 'Calender deleted successfully.');
    }
    private function generateUniqueCode()
    {
        do {
            $code = str_pad(mt_rand(0, 99999999), 8, '0', STR_PAD_LEFT);
        } while (AppointmentThankyouModel::where('calender_code', $code)->exists());

        return $code;
    }
    
    public function updateSmStatus($id, $status)
    {
        $validate = Validator::make([
            'user_id'   => $id,
            'status'    => $status
        ], [
            'user_id'   =>  'required|exists:tbl_appointment_thankyou,id',
            'status'    =>  'required|in:0,1',
        ]);
        // If Validations Fails
        if($validate->fails()){
            return 0;
        }
        try {
            DB::beginTransaction();
            // Update Status with reason
            AppointmentThankyouModel::whereId($id)->update(['sm_visible' => $status]);
            // Commit And Redirect on index with Success Message
            DB::commit();
            return 1;
        } catch (\Throwable $th) {
            // Rollback & Return Error Message
            DB::rollBack();
            return redirect()->back()->with('error', $th->getMessage());
        }
    }
    public function updateNfStatus($id, $status)
    {
        $validate = Validator::make([
            'user_id'   => $id,
            'status'    => $status
        ], [
            'user_id'   =>  'required|exists:tbl_appointment_thankyou,id',
            'status'    =>  'required|in:0,1',
        ]);
        // If Validations Fails
        if($validate->fails()){
            return 0;
        }
        try {
            DB::beginTransaction();
            // Update Status with reason
            AppointmentThankyouModel::whereId($id)->update(['nf_visible' => $status]);
            // Commit And Redirect on index with Success Message
            DB::commit();
            return 1;
        } catch (\Throwable $th) {
            // Rollback & Return Error Message
            DB::rollBack();
            return redirect()->back()->with('error', $th->getMessage());
        }
    }

}