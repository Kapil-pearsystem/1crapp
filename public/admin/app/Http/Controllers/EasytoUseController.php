<?php
namespace App\Http\Controllers;
use App\Models\EasytoShareModel;
use App\Models\EasytoUseModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
class EasytoUseController extends Controller
{
    public function index()
    {
       $easytouse = EasytoUseModel::where('created_by', auth()->user()->id)->orderBy('id','DESC')->get(); // Fetch all easy to use content from the database
        return view('easy-to-use.index', compact('easytouse'));
    }
    public function create()
    {
        return view('easy-to-use.create');
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
        EasytoUseModel::create([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $image_name, // Store the image path
            'status' => $request->status,
            'created_by' => auth()->user()->id,
        ]);
        return redirect()->route('easytouse.index')->with('success', 'Easy to use created successfully!');
    }
    public function edit_use($id)
    {
        $easytouse = EasytoUseModel::findOrFail($id);
    return view('easy-to-use.edit',compact('easytouse'));
    }
    public function update_use(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'required|boolean',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Optional image validation
        ]);
        $easytouse = EasytoUseModel::findOrFail($id);
        $data = $request->only(['title', 'description', 'status']);
        if($request->hasFile('image')) {
            $imageName = time() . '_' . $request->image->getClientOriginalName();
            $request->image->move(public_path('uploads'), $imageName);
            $data['image'] = 'uploads/'.$imageName;
        }
        $easytouse->update($data);
        return redirect()->route('easytouse.index')->with('success', 'Easy to use content updated successfully!');
    }
    public function destroy($id)
    {
        $easytouse = EasytoUseModel::findOrFail($id);
        if ($easytouse->image && Storage::exists('public/' . $easytouse->image)) {
            Storage::delete('public/' . $easytouse->image);
        }
        $easytouse->delete();
        return redirect()->route('easytouse.index')->with('success', 'Easy to Use content deleted successfully!');
    }
}
