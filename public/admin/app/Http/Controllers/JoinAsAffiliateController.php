<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JoinAsAffiliateModel;
use Illuminate\Support\Facades\DB;

class JoinAsAffiliateController extends Controller
{
    // LIST PAGE
    public function index()
    {
        $lists = JoinAsAffiliateModel::where('created_by', auth()->id())
                                    ->orderBy('id', 'DESC')
                                    ->get();

        return view('join-as-affiliate.index', compact('lists'));
    }

    // CREATE FORM
    public function create()
    {
        return view('join-as-affiliate.create');
    }

    // STORE or UPDATE
    public function store(Request $request)
    {
        $request->validate([
            'title'             => 'required|string|max:255',
            'short_description' => 'nullable|string|max:500',
            'description'       => 'nullable|string',

            'image_title'       => 'nullable|string|max:255',
            'image'             => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:4096',

            'image_title1'      => 'nullable|string|max:255',
            'image1'            => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:4096',

            'image_title2'      => 'nullable|string|max:255',
            'image2'            => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:4096',

            'video_title'       => 'nullable|string|max:255',
            'video_subtitle'    => 'nullable|string|max:255',
            'video_url'         => 'nullable|string|max:500',

            'status'            => 'required|in:0,1',
        ]);

        // Check Add / Edit
        if ($request->id) {
            $record  = JoinAsAffiliateModel::findOrFail($request->id);
            $message = "Record updated successfully!";
        } else {
            $record  = new JoinAsAffiliateModel();
            $message = "Record created successfully!";
        }

        /* -----------------------
           COMMON IMAGE UPLOAD FUNCTION
        ------------------------- */
        function uploadImage($request, $fieldName, $record)
        {
            if ($request->hasFile($fieldName)) {

                // Delete old image
                if (!empty($record->$fieldName)) {
                    $old = parse_url($record->$fieldName, PHP_URL_PATH);
                    $oldFull = public_path($old);
                    if (file_exists($oldFull)) unlink($oldFull);
                }

                $file = $request->file($fieldName);
                $fileName = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('uploads/join_affiliate'), $fileName);

                return url('uploads/join_affiliate/' . $fileName);
            }

            return $record->$fieldName ?? null;
        }

        /* -----------------------
           IMAGE UPLOAD (3 IMAGES)
        ------------------------- */
        $record->image  = uploadImage($request, 'image', $record);
        $record->image1 = uploadImage($request, 'image1', $record);
        $record->image2 = uploadImage($request, 'image2', $record);

        /* -----------------------
           SAVE DATA
        ------------------------- */
        $record->title             = $request->title;
        $record->short_description = $request->short_description;
        $record->description       = $request->description;

        $record->image_title       = $request->image_title;
        $record->image_title1      = $request->image_title1;
        $record->image_title2      = $request->image_title2;

        // NEW VIDEO FIELDS
        $record->video_title       = $request->video_title;
        $record->video_subtitle    = $request->video_subtitle;
        $record->video_url         = $request->video_url;

        $record->status            = $request->status;
        $record->created_by        = auth()->id();

        $record->save();

        return redirect()->route('join-as-affiliate.index')->with('success', $message);
    }

    // EDIT FORM
    public function edit($id)
    {
        $details = JoinAsAffiliateModel::findOrFail($id);
        return view('join-as-affiliate.create', compact('details'));
    }

    // DELETE
    public function destroy($id)
    {
        $record = JoinAsAffiliateModel::findOrFail($id);

        $images = ['image', 'image1', 'image2'];

        foreach ($images as $img) {
            if (!empty($record->$img)) {
                $old = parse_url($record->$img, PHP_URL_PATH);
                $oldFull = public_path($old);
                if (file_exists($oldFull)) unlink($oldFull);
            }
        }

        $record->delete();

        return redirect()->route('join-as-affiliate.index')
                         ->with('success', 'Record deleted successfully.');
    }
    public function enquiry()
    {
        $lists = DB::table('tbl_affiliate_enquiry')
                    ->where('agent_id', auth()->id())
                    ->orderBy('id', 'DESC')
                    ->get();
     
        return view('join-as-affiliate.enquiry', compact('lists'));
    }
}
