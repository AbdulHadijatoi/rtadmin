<?php

namespace App\Http\Controllers\Admin\Setting;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Aboutus;
use Illuminate\Http\UploadedFile;

class AboutController extends Controller
{
    public function index()
    {
        $homeimages = Aboutus::all();
        return view('admin.modules.setting.about.list', compact('homeimages'));
    }

    public function create()
    {
        return view('admin.modules.setting.about.add');
    }


    public function store(Request $request)
    {
        try {
            $imagePath = $this->uploadImage($request->file('image'));
            $headerImagePath = $this->uploadImage($request->file('header_image'));
            $homeimage = Aboutus::create([
                'image' => $imagePath,
                'image_url' => url($imagePath),
                'header_image' => $headerImagePath,
                'header_image_url' => url($headerImagePath),
            ]);

            return redirect()->route('aboutimages.index');
        } catch (\Exception $e) {
            throw $e;
        }
    }

    public function edit($id)
    {
        $data = Aboutus::findOrFail($id);

        return view('admin.modules.setting.about.update', compact('data'));
    }

    public function update(Request $request, $id)
    {
        try {
            $homeimage = Aboutus::findOrFail($id);

            if (isset($request->image)) {
                $this->deleteImage($homeimage->image);
            }

            if (isset($request->image)) {
                $imagePath = $this->uploadImage($request->image);
                $homeimage->image = $imagePath;
                $homeimage->image_url = url($imagePath);
            }
            if (isset($request->header_image)) {
                $this->deleteImage($homeimage->header_image);
            }

            if (isset($request->header_image)) {
                $headerImagePath = $this->uploadImage($request->header_image);
                $homeimage->header_image = $headerImagePath;
                $homeimage->header_image_url = url($headerImagePath);
            }
            $homeimage->save();
            return redirect()->route('aboutimages.index');

        } catch (\Exception $e) {
            throw $e;
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function show($id)
    {
        try {
            $category = Aboutus::findOrFail($id);
            $this->deleteImage($category->image);
            $this->deleteImage($category->header_image);
            $category->delete();
            return back();
        } catch (\Exception $e) {
            throw $e;
        }
    }
    private function deleteImage($imagePath)
    {
        if (file_exists($imagePath)) {
            unlink(public_path($imagePath));
        }
    }
    private function uploadImage(UploadedFile $file)
    {
        $imageName = uniqid() . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('about_image/'), $imageName);
        return 'about_image/' . $imageName;
    }
}