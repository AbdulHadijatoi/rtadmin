<?php

namespace App\Http\Controllers\Admin\Setting;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SettingPrivacyPolicy;
use App\Http\Requests\Admin\PrivacyPolicyRequest;
use App\Helpers\UploadFiles;
use Illuminate\Support\Facades\Storage;

class PrivacyPolicyController extends Controller
{
      /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data=SettingPrivacyPolicy::all();
        return view('admin.modules.setting.privacypolicy.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.modules.setting.privacypolicy.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PrivacyPolicyRequest $request)
    {
        if ($request->hasFile('image')) {
            $data['image'] = UploadFiles::upload($request->file('image'), 'image', 'images/privacypolicy');
        }
        SettingPrivacyPolicy::create($data);
        return redirect()->route('privacypolicy.index')->with('success','Privacy Policy Image added successfully');
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
        $data=SettingPrivacyPolicy::findOrFail($id);
        return view('admin.modules.setting.privacypolicy.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data=SettingPrivacyPolicy::findOrFail($id);
        if ($request->hasFile('image')) {
            if ($data->image) {
                $oldImagePath = str_replace(url('/').'/storage/', '', $data->image);
                Storage::disk('public')->delete($oldImagePath);
            }

            $data->image = UploadFiles::upload($request->file('image'), 'image', 'images/privacypolicy');
            $data->save();
        }
        return redirect()->route('privacypolicy.index')->with('success','Privacy Policy Image Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data=SettingPrivacyPolicy::findOrFail($id);
        if ($data->image) {
            $oldImagePath = str_replace(url('/').'/storage/', '', $data->image);
            Storage::disk('public')->delete($oldImagePath);
        }
        $data->delete();
        return back()->with('success','Privacy Policy Image deleted Successfully');
    }
}