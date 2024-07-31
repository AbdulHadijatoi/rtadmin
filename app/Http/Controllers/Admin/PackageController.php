<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Package, Activity};

class PackageController extends Controller
{
    private $package = null;
    private $activity = null;

    public function __construct(Package $package, Activity $activity)
    {
        $this->package = $package;
        $this->activity = $activity;
    }

    public function index()
    {
        $package = $this->package::all();
        return view('admin.modules.package.index', compact('package'));
    }


    public function create()
    {
        $activity = $this->activity::all();
        return view('admin.modules.package.create', compact('activity'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'price' => [
                'sometimes',
                'required_if:category,private',
            ],
            'adult_price' => [
                'sometimes',
                'required_if:category,sharing',
            ],
            'child_price' => [
                'sometimes',
                'required_if:category,sharing',
            ],
            'highlight' => 'required|string',
            'category' => 'required|string',
            'activity_id' => 'required|exists:activities,id'
        ]);
        $package = $this->package::create([
            'title' => $request->title,
            'price' => $request->price,
            'adult_price' => $request->adult_price,
            'child_price' => $request->child_price,
            'highlight' => $request->highlight,
            'category' => $request->category,
            'activity_id' => $request->activity_id
        ]);
        if ($package) {
            return redirect()->route('packages.index')->with('success', 'Package created successfully');
        } else {
            return redirect()->back()->withErrors(['error', 'Failed to create package']);
        }
    }

    public function edit(string $id)
    {
        $package = $this->package::findOrFail($id);
        $activity = $this->activity::all();
        return view('admin.modules.package.update', compact('activity', 'package'));
    }

    public function update(Request $request, string $id)
    {
        $package = $this->package::findOrFail($id)->update([
            'title' => $request->title,
            'price' => $request->price,
            'adult_price' => $request->adult_price,
            'child_price' => $request->child_price,
            'highlight' => $request->highlight,
            'category' => $request->category,
            'activity_id' => $request->activity_id
        ]);
        if($package)
        {
            return redirect()->route('packages.index')->with('success', 'Package updated successfully');
        }
    }

    public function destroy(string $id)
    {
        try {
            $category = $this->package::findOrFail($id);
            $category->delete();
            return back()->with('success', 'Package deleted successfully.');
        } catch (\Exception $e) {
            return redirect()->route('packages.index')->with('error', 'Failed to delete category: ' . $e->getMessage());
        }
    }
}