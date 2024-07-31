<?php

namespace App\Repositories\User;

use App\Models\Activity;
use App\Enums\UserRoleEnums;
use App\Interfaces\Api\ActivityInterface;
use Hash;
use Auth;


class ActivityRepository implements ActivityInterface
{
    private $model;

    public function __construct(Activity $model)
    {
        $this->model = $model;
    }

    public function index()
    {
        $activity = $this->model::all();
        foreach($activity as $item)
        {
            if($item->image) {
                $item->image_url=$item->imagePath;
            }
        }
        return $activity;
    }


    public function show($id)
    {
        $activity = $this->model::findOrFail($id);
        if($activity->image){
            $activity->image_url=$activity->imagePath;
        }
        return $activity;
    }
    public function showBySlug($slug)
    {
        $activity = $this->model::where('slug',$slug)->first();
        if($activity->image){
            $activity->image_url=$activity->imagePath;
        }
        return $activity;
    }
}