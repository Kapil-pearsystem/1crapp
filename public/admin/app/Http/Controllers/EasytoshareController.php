<?php
namespace App\Http\Controllers;
use App\Models\EasytoShareModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
class EasytoshareController extends Controller
{
    public function index()
    {
        $items = EasytoShareModel::where('created_by', auth()->user()->id)->orderBy('id','DESC')->get();
        return view('easy-to-share.index', compact('items'));
    }
    public function create()
    {
        return view('easy-to-share.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status' => 'required|in:0,1',
        ]);
        if($request->hasFile('image')) {
            $imageName = time() . '_' . $request->image->getClientOriginalName();
            $request->image->move(public_path('uploads'), $imageName);
            $image_name = 'uploads/'.$imageName;
        }
        EasytoShareModel::create([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $image_name, // Store the image path
            'status' => $request->status,
            'created_by' => auth()->user()->id,
        ]);
        return redirect()->route('easytoshare.index')->with('success', 'EasyToShare created successfully!');
    }
    public function edit($id)
    {
        $item = EasytoShareModel::findOrFail($id);
        return view('easy-to-share.edit',compact('item'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'required|boolean',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Optional image validation
        ]);
        $item = EasytoShareModel::findOrFail($id);
        $data = $request->only(['title', 'description', 'status']);
        if($request->hasFile('image')) {
            $imageName = time() . '_' . $request->image->getClientOriginalName();
            $request->image->move(public_path('uploads'), $imageName);
            $data['image'] = 'uploads/'.$imageName;
        }
        $item->update($data);
        return redirect()->route('easytoshare.index')->with('success', 'Feature updated successfully!');
    }
    public function destroy($id)
    {
        $item = EasytoShareModel::findOrFail($id);
        if ($item->image && Storage::exists('public/' . $item->image)) {
            Storage::delete('public/' . $item->image);
        }
        $item->delete();
        return redirect()->route('easytoshare.index')->with('success', 'Easy to share content deleted successfully!');
    }
}
