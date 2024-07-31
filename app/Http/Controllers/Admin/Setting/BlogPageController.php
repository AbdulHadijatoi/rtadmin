<?php

namespace App\Http\Controllers\Admin\Setting;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SettingBlog;
use App\Helpers\UploadFiles;
use Illuminate\Support\Facades\Storage;


class BlogPageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data=SettingBlog::all();
        return view('admin.modules.setting.blog.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.modules.setting.blog.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if ($request->hasFile('image')) {
            $data['image'] = UploadFiles::upload($request->file('image'), 'image', 'images/blogPage');
        }
        SettingBlog::create($data);
        return redirect()->route('blogPage.index')->with('success','Blog Image added successfully');
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
        $data=SettingBlog::findOrFail($id);
        return view('admin.modules.setting.blog.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data=SettingBlog::findOrFail($id);
        if ($request->hasFile('image')) {
            if ($data->image) {
                $oldImagePath = str_replace(url('/').'/storage/', '', $data->image);
                Storage::disk('public')->delete($oldImagePath);
            }

            $data->image = UploadFiles::upload($request->file('image'), 'image', 'images/blogPage');
            $data->save();
        }
        return redirect()->route('blogPage.index')->with('success','Blog Image Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data=SettingBlog::findOrFail($id);
        if ($data->image) {
            $oldImagePath = str_replace(url('/').'/storage/', '', $data->image);
            Storage::disk('public')->delete($oldImagePath);
        }
        $data->delete();
        return back()->with('success','Blog Image deleted Successfully');
    }
}