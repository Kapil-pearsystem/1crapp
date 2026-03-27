<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PropertyCategoryModel;
use App\Models\PropertyTypeModel;
use Illuminate\Support\Facades\DB;

class PropertyCategoryController extends Controller
{
    // Show all records
    public function index()
    {
        $lists = PropertyCategoryModel::orderBy('id','DESC')->get();
        return view('property-category.index', compact('lists'));
    }

    // Show create form
    public function create()
    {
        return view('property-category.create');
    }

    // Store or update record
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'status' => 'required|in:0,1',
        ]);

        if ($request->id) {
            $record = PropertyCategoryModel::find($request->id);
            $message = 'Record updated successfully';
        } else {
            $record = new PropertyCategoryModel();
            $message = 'Record created successfully';
        }

        $record->title = $request->title;
        $record->status = $request->status;
        $record->created_by = auth()->id();

        $record->save();

        return redirect()->route('property-category.index')->with('success', $message);
    }

    // Edit record
    public function edit($id)
    {
        $details = PropertyCategoryModel::findOrFail($id);
        return view('property-category.create', compact('details'));
    }

    // Delete record
    public function destroy($id)
    {
        $record = PropertyCategoryModel::findOrFail($id);

        $record->delete();

        return redirect()->route('property-category.index')->with('success', 'Record deleted successfully.');
    }
    // Property Type
    public function index_Property_type()
    {
        $lists = DB::table('tbl_property_type')
        ->join('tbl_property_category', 'tbl_property_type.category_id', '=', 'tbl_property_category.id')
        ->select(
            'tbl_property_type.*',
            'tbl_property_category.title as category_title'
        )
        ->orderBy('tbl_property_type.id','DESC')->get();

    return view('property-type.index', compact('lists'));
    }

    // Show create form
    public function create_Property_type()
    {
        $categories = PropertyCategoryModel::all();
        return view('property-type.create', compact('categories'));
    }

    // Store or update record
    public function store_Property_type(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|exists:tbl_property_category,id',
            'status' => 'required|in:0,1',
        ]);

        if ($request->id) {
            $record = PropertyTypeModel::find($request->id);
            $message = 'Record updated successfully';
        } else {
            $record = new PropertyTypeModel();
            $message = 'Record created successfully';
        }

        $record->title = $request->title;
        $record->category_id = $request->category;
        $record->status = $request->status;
        $record->created_by = auth()->id();

        $record->save();

        return redirect()->route('property-type.index')->with('success', $message);
    }

    // Edit record
    public function edit_Property_type($id)
    {
        $categories = PropertyCategoryModel::all();
        $details = PropertyTypeModel::findOrFail($id);
        return view('property-type.create', compact('details','categories'));
    }

    // Delete record
    public function destroy_Property_type($id)
    {
        $record = PropertyTypeModel::findOrFail($id);

        $record->delete();

        return redirect()->route('property-type.index')->with('success', 'Record deleted successfully.');
    }
    
    public function get_by_category(Request $request)
    {
        $types = PropertyTypeModel::select('id','title')
                    ->where('category_id', $request->cat_id)
                    ->get();
    
        if ($types->isNotEmpty()) {
            return response()->json([
                'status' => true,
                'data' => $types,
                'msg' => 'Category Types Found!'
            ]);
        } else {
            return response()->json([
                'status' => false,
                'data' => [],
                'msg' => 'No Category Type Found!'
            ]);
        }
    }
}
