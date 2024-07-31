<?php

namespace App\Http\Controllers\Admin;

use App\Models\{Activity, Category, ActivityPicture};
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Admin\ActivityRequest;
use App\Models\SubCategory;
use App\Models\ActivityInstruction;

class MostpopularActivityController extends Controller
{


    public function index()
    {
        $activity = Activity::where('most_popular_activity', 1)->get();
        return view('admin.modules.most-popular-activity.index',compact('activity'));
    }
    

    public function create()
    {
        $categories=Category::all();
        $subCategories=SubCategory::all();
        return view('admin.modules.most-popular-activity.create',compact('categories', 'subCategories'));
    }

    public function store(ActivityRequest $request)
    {

       $validatedData=$request->validated();
      $record= Activity::activity($validatedData);
      
      if($request->has('images'))
      {
        foreach($request->file('images') as $image)
        {
            $fileInfo = $image->getClientOriginalName();
            $filename = pathinfo($fileInfo, PATHINFO_FILENAME);
            $extension = pathinfo($fileInfo, PATHINFO_EXTENSION);
            $file_name= $filename.'-'.time().'.'.$extension;
            $image->move(public_path('uploads/gallery'),$file_name);
            // Create a new Portfolio record in the database
            $imageUpload = new ActivityPicture();
            $imageUpload->activity_id = $record->id;
            $imageUpload->original_filename = $image->getClientOriginalName();
            $imageUpload->filename = $file_name;
            $imageUpload->save();

        }

      }

       if (isset($request->image) && !empty($request->image)) {
        $imageData = $request->image;
        $imageInfo = json_decode($imageData, true);
        $imageName = date('YmdHis') . $imageInfo['name'];
        $imageData = base64_decode($imageInfo['data']);
        Storage::disk('public')->put(Activity::UPLOADS_IMAGE_PATH . $imageName, $imageData);
        Activity::updateImageName($record->id, ['image' => $imageName]);

    }

    if (isset($validatedData['instructions']) && is_array($validatedData['instructions'])) {
        foreach ($validatedData['instructions'] as $instructionData) {
            $instructionData['activity_id'] = $record->id;
            ActivityInstruction::create($instructionData);
        }
    }
       return redirect()->route('mostpopularactivities.index')->with('success','Activity added successfully');
    }

    public function destroy(string $id)
    {
        try {
            $activity = Activity::findOrFail($id);
            $activity->delete();
            return redirect()->back()->with('success', 'Activity deleted successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to delete subcategory: ' . $e->getMessage());
        }
    }

    public function edit(string $id)
    {
        $activity=Activity::findOrFail($id);
        $categories=Category::all();
        $subCategories=SubCategory::all();
        return view('admin.modules.most-popular-activity.edit',compact('activity', 'categories', 'subCategories'));
    }

    public function update(Request  $request, string $id)
    {

        $record=Activity::activityUpdate($id,$request->all());
        if (isset($request->image) && !empty($request->image)) {
            $imageData = $request->image;
            $imageInfo = json_decode($imageData, true);
            $imageName = date('YmdHis') . $imageInfo['name'];
            $imageData = base64_decode($imageInfo['data']);
            Storage::disk('public')->put(Activity::UPLOADS_IMAGE_PATH . $imageName, $imageData);
            Activity::updateImageName($record->id, ['image' => $imageName]);
        }

        if (isset($request->instructions) && is_array($request->instructions)) {
            foreach ($request->instructions as $instructionData) {
                if (isset($instructionData['instruction_id'])) {
                    $instruction = ActivityInstruction::findOrFail($instructionData['instruction_id']);
                    $instruction->update([
                        'instruction_title' => $instructionData['instruction_title'],
                        'instruction_description' => $instructionData['instruction_description'],
                    ]);
                } else {
                    $instructionData['activity_id'] = $record->id;
                    ActivityInstruction::create($instructionData);
                }
            }
        }

        return redirect()->route('mostpopularactivities.index')->with('success','Activity Updated successfully');
    }

    public function createActivityImages($id)
    {
        $activity = Activity::findOrFail($id);
        return view('admin.modules.activity.activity-images.create', compact('activity'));
    }

    public function getImages($id)
    {
        $images = ActivityPicture::where('activity_id', $id)->get();
        $data = [];
        foreach ($images as $image) {
            $obj['name'] = $image->filename;
            $obj['size'] = filesize(public_path('uploads/gallery/' . $image->filename));
            $obj['path'] = asset('uploads/gallery/' . $image->filename);
            $data[] = $obj;
        }
        // Return the JSON response
        return response()->json($data);
    }

    public function storeImages(Request $request)
    {
        $image = $request->file('file');
        $fileInfo = $image->getClientOriginalName();
        $filename = pathinfo($fileInfo, PATHINFO_FILENAME);
        $extension = pathinfo($fileInfo, PATHINFO_EXTENSION);
        $file_name= $filename.'-'.time().'.'.$extension;
        $image->move(public_path('uploads/gallery'),$file_name);
        // Create a new Portfolio record in the database
        $imageUpload = new ActivityPicture();
        $imageUpload->activity_id = $request->activity_id;
        $imageUpload->original_filename = $image->getClientOriginalName();
        $imageUpload->filename = $file_name;
        $imageUpload->save();
        // Return success response
        return response()->json(['success' => $file_name]);
    }

    public function destroyImages(Request $request, $id)
    {
         // Retrieve the filename from the request
        $filename = $request->get('filename');
        // Delete the image record from the database
        $deleted = ActivityPicture::where('filename', $filename)
                            ->where('activity_id', $id)
                            ->delete();
        if ($deleted) {

            $path = 'uploads/gallery/'. $filename;
            if (Storage::exists($path)) {
                Storage::delete($path);
                return response()->json(['success' => $filename]);
            } else {
                return response()->json(['error' => 'File not found'], 404);
            }
        } else {
            return response()->json(['error' => 'Image not found'], 404);
        }
    }
}