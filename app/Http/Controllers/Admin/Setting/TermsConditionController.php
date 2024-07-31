<?php

namespace App\Http\Controllers\Admin\Setting;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helpers\UploadFiles;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Admin\TermsConditionRequest;
use App\Models\SettingTermsCondition;
class TermsConditionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data=SettingTermsCondition::all();
        return view('admin.modules.setting.termsconditions.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.modules.setting.termsconditions.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TermsConditionRequest $request)
    {
        if ($request->hasFile('image')) {
            $data['image'] = UploadFiles::upload($request->file('image'), 'image', 'images/termsconditions');
        }
        SettingTermsCondition::create($data);
        return redirect()->route('termsconditions.index')->with('success','Terms & Conditions Image added successfully');
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
        $data=SettingTermsCondition::findOrFail($id);
        return view('admin.modules.setting.termsconditions.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data=SettingTermsCondition::findOrFail($id);
        if ($request->hasFile('image')) {
            if ($data->image) {
                $oldImagePath = str_replace(url('/').'/storage/', '', $data->image);
                Storage::disk('public')->delete($oldImagePath);
            }

            $data->image = UploadFiles::upload($request->file('image'), 'image', 'images/termsconditions');
            $data->save();
        }
        return redirect()->route('termsconditions.index')->with('success','Terms & Conditions Image Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data=SettingTermsCondition::findOrFail($id);
        if ($data->image) {
            $oldImagePath = str_replace(url('/').'/storage/', '', $data->image);
            Storage::disk('public')->delete($oldImagePath);
        }
        $data->delete();
        return back()->with('success','Terms & Conditions Image deleted Successfully');
    }
}