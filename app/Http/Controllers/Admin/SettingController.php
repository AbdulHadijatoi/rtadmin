<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SettingContactUs;
use App\Http\Requests\Admin\ContactUsRequest;
use App\Models\SettingFindUs;
use App\Http\Requests\Admin\FindUsRequest;
use App\Helpers\UploadFiles;
use Illuminate\Support\Facades\Storage;
class SettingController extends Controller
{

    public function contactUsCreate()
    {
        return view('admin.modules.setting.contact.create');
    }
    public function contactUsStore(ContactUsRequest $request)
    {

        $data=$request->only('phone','email','address','facebook','instagram','twitter');

        if ($request->hasFile('image')) {
            $data['image'] = UploadFiles::upload($request->file('image'), 'image', 'images/contact-us');
        }
        SettingContactUs::create($data);
        return redirect()->route('setting.contact.index')->with('success','Contact-us details added successfully');

    }

    public function contactUsIndex()
    {
        $data=SettingContactUs::all();
        return view('admin.modules.setting.contact.index',compact('data'));
    }

    public function contactUsEdit($id)
    {
        $data=SettingContactUs::findOrFail($id);
        return view('admin.modules.setting.contact.edit',compact('data'));
    }
    public function contactUsUpdate(Request $request,$id)
    {
        $data=SettingContactUs::findOrFail($id);
        $data->update($request->only('phone', 'email', 'address', 'facebook', 'instagram', 'twitter'));
        if ($request->hasFile('image')) {
            if ($data->image) {
                $oldImagePath = str_replace(url('/').'/storage/', '', $data->image);
                Storage::disk('public')->delete($oldImagePath);
            }

            $data->image = UploadFiles::upload($request->file('image'), 'image', 'images/contact-us');
            $data->save();
        }
        return redirect()->route('setting.contact.index')->with('success','Contact-us details Updated successfully');
    }
    public function contactUsDestroy($id)
    {
        $data=SettingContactUs::findOrFail($id);
        if ($data->image) {
            $oldImagePath = str_replace(url('/').'/storage/', '', $data->image);
            Storage::disk('public')->delete($oldImagePath);
        }
        $data->delete();
        return back()->with('success','Contact-us details deleted Successfully');
    }


    public function findUsCreate()
    {
        return view('admin.modules.setting.find-us.create');
    }
    public function findUsStore(FindUsRequest $request)
    {
        $data = $request->only('phone', 'email', 'whatsapp', 'address', 'time_zone', 'booking_email', 'business_email', 'press_email', 'general_email');

        if ($request->hasFile('image')) {
            $data['image'] = UploadFiles::upload($request->file('image'), 'image', 'images/find-us');
        }
        if ($request->hasFile('header_image')) {
            $data['header_image'] = UploadFiles::upload($request->file('header_image'), 'image', 'images/find-us/header');
        }

        SettingFindUs::create($data);

        return redirect()->route('setting.find.index')->with('success', 'Find-us details added successfully');
    }


    public function findUsIndex()
    {
        $data=SettingFindUs::all();
        return view('admin.modules.setting.find-us.index',compact('data'));
    }

    public function findUsEdit($id)
    {
        $data=SettingFindUs::findOrFail($id);
        return view('admin.modules.setting.find-us.edit',compact('data'));
    }
    public function findUsUpdate(Request $request, $id)
    {
        $data = SettingFindUs::findOrFail($id);
        $data->update($request->only('phone', 'email', 'whatsapp', 'address', 'time_zone', 'booking_email', 'business_email', 'press_email', 'general_email'));
        if ($request->hasFile('image')) {
            if ($data->image) {
                $oldImagePath = str_replace(url('/').'/storage/', '', $data->image);
                Storage::disk('public')->delete($oldImagePath);
            }

            $data->image = UploadFiles::upload($request->file('image'), 'image', 'images/find-us');

        }
        if ($request->hasFile('header_image')) {
            if ($data->header_image) {
                $oldImagePath = str_replace(url('/').'/storage/', '', $data->header_image);
                Storage::disk('public')->delete($oldImagePath);
            }

            $data->header_image = UploadFiles::upload($request->file('header_image'), 'image', 'images/find-us/header');

        }

        $data->save();

        return redirect()->route('setting.find.index')->with('success', 'Find-us details updated successfully');
    }

    public function findUsDestroy($id)
    {
        $data=SettingFindUs::findOrFail($id);
        if ($data->image) {
            $imagePath = str_replace(url('/').'/storage/', '', $data->image);
            Storage::disk('public')->delete($imagePath);
        }
        if ($data->header_image) {
            $imagePath = str_replace(url('/').'/storage/', '', $data->header_image);
            Storage::disk('public')->delete($imagePath);
        }
        $data->delete();
        return back()->with('success','Find-us details deleted Successfully');
    }
}