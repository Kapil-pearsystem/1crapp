<?php
namespace App\Http\Controllers;
use App\Models\CorePageModel;
use App\Models\CorePageSecModel;
use App\Models\HeroSectionModel;
use App\Models\EmbedPageModel;
use App\Models\CalltoActionModel;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
class CorePageController extends Controller
{
    public function index()
    {
        $lists = CorePageModel::with('sections')->where('created_by', auth()->user()->id)->orderBy('created_at', 'desc')->get();
        return view('core-page.index', compact('lists'));
    }
    public function create()
    {
        $ctasections = CalltoActionModel::orderBy('id', 'desc')->where('created_by', auth()->user()->id)->get();
        $extsections = EmbedPageModel::where('status', 'active')->where('created_by', auth()->user()->id)->orderBy('title', 'asc')->get();
        $herosections = HeroSectionModel::where('status', 1)->orderBy('title', 'asc')->get();
        return view('core-page.create', compact('herosections', 'extsections', 'ctasections'));
    }
    public function save(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'page_name'      => 'required|string|max:255',
            'layout'         => 'required',
            'status'         => 'required',
            'section_type'   => 'required|array',
        ]);
        // Create or Update
        if ($request->id) {
            $page = CorePageModel::findOrFail($request->id);
        } else {
            $page = new CorePageModel();
            $page->created_by = auth()->user()->id;
        }
        $page->page_name = $request->page_name;
        $page->slug      = Str::slug($request->page_name);
        $page->layout    = $request->layout;
        $page->status    = $request->status;
        $page->save();
        // Remove old sections while update
        CorePageSecModel::where('cp_id', $page->id)->delete();
        // Save Sections
        if ($request->section_type) {
            foreach ($request->section_type as $key => $type) {
                $sectionValue = null;
                if ($type == 1) {
                    $sectionValue = $request->hero_section[$key] ?? null;
                }
                if ($type == 2) {
                    $sectionValue = $request->custom_section[$key] ?? null;
                }
                if ($type == 3) {
                    $sectionValue = $request->cta_section[$key] ?? null;
                }
                if ($sectionValue) {
                    CorePageSecModel::create([
                        'cp_id' => $page->id,
                        'type'  => $type,
                        'section_id'  => $sectionValue,
                    ]);
                }
            }
        }
        return redirect()->route('core-page.index')->with('success', 'Core Page saved successfully');
    }
    public function edit($id)
    {
        $details = CorePageModel::with('sections')->findOrFail($id);
        $ctasections = CalltoActionModel::orderBy('id', 'desc')->where('created_by', auth()->user()->id)->get();
        $extsections = EmbedPageModel::where('status', 'active')->where('created_by', auth()->user()->id)->orderBy('title', 'asc')->get();
        $herosections = HeroSectionModel::where('status', 1)->orderBy('title', 'asc')->get();
        return view('core-page.create', compact('herosections', 'extsections','ctasections', 'details'));
    }
    public function delete($id)
    {
        $page = CorePageModel::findOrFail($id);
        if ($page) {
            CorePageSecModel::where('cp_id', $id)->delete();
        }
        $page->delete();
        return redirect()->route('core-page.index')->with('success', 'Core Page deleted successfully.');
    }
    public function viewSection(Request $request)
    {
        $sections = CorePageSecModel::where('cp_id', $request->id)->get();
        $data = [];
        foreach ($sections as $sec) {
            $sectionName = '';
            if ($sec->type == 1) {
                $hero = HeroSectionModel::find($sec->section_id);
                $sectionName = $hero->title ?? '';
            } elseif ($sec->type == 2) {
                $custom = EmbedPageModel::find($sec->section_id);
                $sectionName = $custom->title ?? '';
            }
            $data[] = [
                'type' => ($sec->type == 1)?'Hero':'Custom',
                'section_name' => $sectionName,
            ];
        }
        return response()->json($data);
    }
}
