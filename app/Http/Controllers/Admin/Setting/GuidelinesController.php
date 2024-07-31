<?php

namespace App\Http\Controllers\Admin\Setting;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\GuidelinesRequest;
use App\Models\SettingGuideline;
use App\Helpers\UploadFiles;
use Illuminate\Support\Facades\Storage;

class GuidelinesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data=SettingGuideline::all();
        return view('admin.modules.setting.guidelines.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.modules.setting.guidelines.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(GuidelinesRequest $request)
    {
        if ($request->hasFile('image')) {
            $data['image'] = UploadFiles::upload($request->file('image'), 'image', 'images/guidelines');
        }
        SettingGuideline::create($data);
        return redirect()->route('guidelines.index')->with('success','Guidelines Image added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data=SettingGuideline::findOrFail($id);
        return view('admin.modules.setting.guidelines.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data=SettingGuideline::findOrFail($id);
        if ($request->hasFile('image')) {
            if ($data->image) {
                $oldImagePath = str_replace(url('/').'/storage/', '', $data->image);
                Storage::disk('public')->delete($oldImagePath);
            }

            $data->image = UploadFiles::upload($request->file('image'), 'image', 'images/guidelines');
            $data->save();
        }
        return redirect()->route('guidelines.index')->with('success','Guidelines Image Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data=SettingGuideline::findOrFail($id);
        if ($data->image) {
            $oldImagePath = str_replace(url('/').'/storage/', '', $data->image);
            Storage::disk('public')->delete($oldImagePath);
        }
        $data->delete();
        return back()->with('success','Guidelines Image deleted Successfully');
    }
}