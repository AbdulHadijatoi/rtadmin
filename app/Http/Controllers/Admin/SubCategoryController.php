<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Category, SubCategory};

class SubCategoryController extends Controller
{
    private $category = null;
    private $subcategory = null;
   
    public function __construct()
    {
        $this->category = new Category();
        $this->subcategory = new SubCategory();
    }
    public function index()
    {
        $subcategories = $this->subcategory::all();
        return view('admin.modules.subcategory.list', compact('subcategories'));
    }

    
    public function create()
    {
        $categories = $this->category::all();
        return view('admin.modules.subcategory.add', compact('categories'));
    }

    
    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'name' => 'required',
                'category_id' => 'required|integer|exists:categories,id'
            ]);

            $subCategoryName = $validatedData['name'];
                $this->subcategory::create([
                    'name' => $subCategoryName,
                    'category_id' => $validatedData['category_id']
                ]);

            return redirect()->route('subcategories.index')->with('success', 'SubCategories added successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    
    public function show(string $id)
    {
        try {
            $category = $this->subcategory::findOrFail($id);
            $category->delete();
            return redirect()->route('subcategories.index')->with('success', 'SubCategory deleted successfully.');
        } catch (\Exception $e) {
            return redirect()->route('subcategories.index')->with('error', 'Failed to delete subcategory: ' . $e->getMessage());
        }
    }

    
    public function edit(string $id)
    {
        $categories = $this->category::all();
        $subcategory = $this->subcategory::find($id);
        $subcategories = $this->subcategory::all();
        return view('admin.modules.subcategory.update', compact('categories', 'subcategory','subcategories'));
    }

    
    public function update(Request $request, string $id)
    {
        try {
            $category = $this->subcategory::find($id);
            $update = $category->update([
                'name' => $request->name,
                'category_id' => $request->category_id
            ]);
            if($update)
            {
                return redirect()->route('subcategories.index')->with('success', 'SubCategory updated successfully.');
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

}
