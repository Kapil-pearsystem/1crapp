<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FaqCategoryModel;
use App\Models\FaqModel;
use Illuminate\Support\Facades\Auth;

class FaqController extends Controller
{
    public function index()
    {
        $faqs = FaqModel::select('tbl_faq.*', 'tbl_faqcategory.title as category')->join('tbl_faqcategory', 'tbl_faqcategory.id', '=', 'tbl_faq.category')->where('tbl_faq.created_by', Auth::id())->orderBy('id','DESC')->get();
        return view('faq.index', compact('faqs'));
    }

    public function create_faq()
    {
        $faqcategories = FaqCategoryModel::where(['status'=>1, 'created_by'=> Auth::id()])->orderBy('id','DESC')->get();
        return view('faq.add-faq', compact('faqcategories'));
    }

    public function store_faq(Request $request)
    {

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'status' => 'required|boolean',
            'category_id' => 'required|exists:tbl_faqcategory,id',
        ]);

        FaqModel::create([
            'title' => $request->title,
            'description' => $request->description,
            'status' => $request->status,
            'created_by' => Auth::id(), // Ensure the user is authenticated
            'category' => $request->category_id, // Use category_id here
        ]);

        return redirect()->route('faq.index')->with('success', 'FAQ added successfully!');
    }



    public function edit_faq($id)
    {
        // Retrieve the FAQ and categories
        $faq = FaqModel::findOrFail($id);
        $faqcategories = FaqCategoryModel::where(['status'=>1, 'created_by'=> Auth::id()])->orderBy('id','DESC')->get();

        return view('faq.faq-edit', compact('faq', 'faqcategories'));
    }


    public function update_faq(Request $request, $id)
    {
        // Validate the request data
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'status' => 'required|boolean',
            'category_id' => 'required|exists:tbl_faqcategory,id',
        ]);

        $faq = FaqModel::findOrFail($id);

        // Update the FAQ, excluding the category (it will not be updated)
        $faq->update([
            'title' => $request->title,
            'description' => $request->description,
            'status' => $request->status,
            'category' => $request->category_id,
        ]);

        return redirect()->route('faq.index')->with('success', 'FAQ updated successfully!');
    }

    public function destroy_faq($id)
    {
        $faq = FaqModel::findOrFail($id);
        $faq->delete();

        return redirect()->route('faq.index')->with('success', 'FAQ deleted successfully!');
    }




    public function category()
    {
        $faqCategories = FaqCategoryModel::where(['created_by'=> Auth::id()])->orderBy('id','DESC')->get();
        return view('faq.category-list', compact('faqCategories'));
    }

    public function create_category()
    {
        return view('faq.add-category');
    }

    public function store_category(Request $request)
    {

        $request->validate([
            'title' => 'required|string|max:255',
            'status' => 'required|boolean',
            'priority' => 'required|integer|min:1|max:100',
        ]);


        FaqCategoryModel::create([
            'title' => $request->title,
            'status' => $request->status,
            'created_by' => Auth::id(),
            'priority' => $request->priority,


        ]);

        return redirect()->route('faq.category.index')->with('success', 'Category added successfully.');
    }




    public function edit_category($id)
    {
        $category = FaqCategoryModel::findOrFail($id);
        return view('faq.edit', compact('category'));
    }


    public function update_category(Request $request, $id)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'status' => 'required|boolean',
            'priority' => 'required|integer|min:1|max:100',
        ]);

        $category = FaqCategoryModel::findOrFail($id);
        $category->update($validatedData);

        return redirect()->route('faq.category.index')->with('success', 'Category updated successfully!');
    }


    public function destroy_category($id)
    {
        $category = FaqCategoryModel::findOrFail($id);

        $category->delete();

        return redirect()->route('faq.category.index')->with('success', 'Category deleted successfully!');
    }
}
