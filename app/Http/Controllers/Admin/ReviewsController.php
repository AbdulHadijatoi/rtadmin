<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Review;
use App\Models\Activity;
use App\Models\User;

class ReviewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data=Review::all();
        return view('admin.modules.review.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $activities = Activity::all();
        $users = User::all();
        return view('admin.modules.review.create', compact('activities', 'users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'activity_id' => 'required|exists:activities,id',
            'comment' => 'required|string',
            'rating' => 'required|integer|min:1|max:5',
        ]);

        Review::create($request->all());

        return redirect()->route('reviews.index')->with('success', 'Review added successfully');
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data=Review::findOrFail($id);
        $data->delete();
        return back()->with('success','Review deleted successfully');
    }
}