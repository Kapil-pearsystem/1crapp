<?php
namespace App\Http\Controllers;
use App\Models\FeatureModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
class FeaturesController extends Controller
{
    public function index()
    {
        $features = FeatureModel::where('created_by', auth()->user()->id)->orderBy('id','DESC')->get();
        return view('features.index', compact('features'));
    }
    public function create_feature()
    {
        return view('features.create');
    }
    public function store_feature(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status' => 'required|in:0,1',
        ]);
        if($request->hasFile('image')) {
            $imageName = time() . '_' . $request->image->getClientOriginalName();
            // dd($logoName);
            $request->image->move(public_path('uploads'), $imageName);
            $image_name = 'uploads/'.$imageName;
        }else{
            $image_name = base64_decode($request->old_image);
        }
        FeatureModel::create([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $image_name, // Store the image path
            'status' => $request->status,
            'created_by' => auth()->user()->id,
        ]);
        return redirect()->route('features.index')->with('success', 'Feature created successfully!');
    }
    public function edit_Feature($id)
    {
        $feature = FeatureModel::findOrFail($id);
        return view('features.edit', compact('feature'));
    }
    public function update_Feature(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'required|boolean',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Optional image validation
        ]);
        $feature = FeatureModel::findOrFail($id);
        $data = $request->only(['title', 'description', 'status']);
        if($request->hasFile('image')) {
            $imageName = time() . '_' . $request->image->getClientOriginalName();
            $request->image->move(public_path('uploads'), $imageName);
            $image_name = 'uploads/'.$imageName;
            $data['image'] = $image_name;
        }

        $feature->update($data);
        return redirect()->route('features.index')->with('success', 'Feature updated successfully!');
    }
    public function destroy_Feature($id)
    {
        $feature = FeatureModel::findOrFail($id);
        if ($feature->image && Storage::exists('public/' . $feature->image)) {
            Storage::delete('public/' . $feature->image);
        }
        $feature->delete();
        return redirect()->route('features.index')->with('success', 'Feature deleted successfully!');
    }
}
