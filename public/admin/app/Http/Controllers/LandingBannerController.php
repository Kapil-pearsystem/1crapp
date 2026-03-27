<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LandingBannerModel;
use App\Models\LandingBannerImageModel;
use Illuminate\Support\Facades\File;

class LandingBannerController extends Controller
{
    // Show list
    public function index()
    {
        $lists = LandingBannerModel::where('created_by', auth()->id())->get();
        return view('landing-banner.index', compact('lists'));
    }

    // Show create form
    public function create()
    {
        return view('landing-banner.create');
    }

    // Add + Edit
    public function store(Request $request)
    {
        // Validation
        $request->validate([
            'title'          => 'required|string|max:255',
            'subtitle'       => 'nullable|string|max:255',
            'launch_date'    => 'nullable|date',
            'expiry_date'    => 'nullable|date',
            'repa_number'    => 'nullable|string|max:50',
            'promo_video_url'=> 'nullable|string|max:255',
            'cta_button_text'=> 'nullable|string|max:255',
            'status'         => 'required|in:0,1',

            'main_image' => $request->id
                ? 'nullable|image|mimes:jpg,jpeg,png|max:2048'
                : 'required|image|mimes:jpg,jpeg,png|max:2048',

            'slider_images.*' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Handle main banner image
        if ($request->hasFile('main_image')) {

            $imageName = time() . '_' . $request->main_image->getClientOriginalName();
            $request->main_image->move(public_path('uploads/landing_banner/'), $imageName);

            $mainImagePath = url('uploads/landing_banner/' . $imageName);

            // Delete old image if update
            if ($request->id) {
                $old = LandingBannerModel::find($request->id);
                if ($old && $old->main_image) {
                    $oldPath = public_path(str_replace(url('/'), '', $old->main_image));
                    if (File::exists($oldPath)) File::delete($oldPath);
                }
            }
        } else {
            $mainImagePath = $request->old_main_image ?? null;
        }

        // Determine Add or Edit
        if ($request->id) {
            $record = LandingBannerModel::findOrFail($request->id);
            $message = "Landing Banner updated successfully!";
        } else {
            $record = new LandingBannerModel();
            $message = "Landing Banner created successfully!";
        }

        // Assign values
        $record->title           = $request->title;
        $record->subtitle        = $request->subtitle;
        $record->main_image      = $mainImagePath;
        $record->launch_date     = $request->launch_date;
        $record->expiry_date     = $request->expiry_date;
        $record->repa_number     = $request->repa_number;
        $record->promo_video_url = $request->promo_video_url;
        $record->cta_button_text = $request->cta_button_text;
        $record->status          = $request->status;
        $record->created_by      = auth()->id();
        $record->save();

        // Handle existing slider images priority update
        if ($request->old_priority) {
            foreach ($request->old_priority as $id => $priority) {
                $img = LandingBannerImageModel::find($id);
                if ($img) {
                    $img->priority = $priority;
                    $img->save();
                }
            }
        }

        // Handle new slider images
        if ($request->hasFile('slider_images')) {
            foreach ($request->slider_images as $key => $file) {

                $imgName = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('uploads/landing_banner/sliders/'), $imgName);

                $sliderPath = url('uploads/landing_banner/sliders/' . $imgName);

                LandingBannerImageModel::create([
                    'banner_id'  => $record->id,
                    'image_url'  => $sliderPath,
                    'priority'   => $request->priority_new[$key] ?? 0,
                    'created_by' => auth()->id(),
                ]);
            }
        }

        return redirect()->route('landing-banner.index')->with('success', $message);
    }

    // Edit page
    public function edit($id)
    {
        $details = LandingBannerModel::with('images')->findOrFail($id);
        return view('landing-banner.create', compact('details'));
    }

    // Delete record
    public function destroy($id)
    {
        $record = LandingBannerModel::findOrFail($id);

        // Delete main image
        if ($record->main_image) {
            $oldPath = public_path(str_replace(url('/'), '', $record->main_image));
            if (File::exists($oldPath)) File::delete($oldPath);
        }

        // Delete slider images
        foreach ($record->images as $img) {
            if ($img->image_url) {
                $path = public_path(str_replace(url('/'), '', $img->image_url));
                if (File::exists($path)) File::delete($path);
            }
            $img->delete();
        }

        $record->delete();

        return redirect()->route('landing-banner.index')
            ->with('success', 'Landing Banner deleted successfully.');
    }

    // Delete individual slider image
    public function deleteSliderImage($id)
    {
        $img = LandingBannerImageModel::findOrFail($id);
        if ($img->image_url) {
            $path = public_path(str_replace(url('/'), '', $img->image_url));
            if (File::exists($path)) File::delete($path);
        }
        $img->delete();

        return back()->with('success', 'Slider image deleted successfully.');
    }
}
