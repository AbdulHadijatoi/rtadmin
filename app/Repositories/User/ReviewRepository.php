<?php

namespace App\Repositories\User;

use App\Models\Review;
use App\Enums\UserRoleEnums;
use Auth;

class ReviewRepository
{
    private $model;

    public function __construct(Review $model)
    {
        $this->model = $model;
    }


    public function store(array $data)
    {
        $userId=Auth::id();
        $review = $this->model::create([
            'user_id'     => $userId,
            'activity_id' => $data['activity_id'],
            'comment'     => $data['comment'],
            'rating'      => $data['rating']
        ]);
        return $review;
    }

    public function update(array $data, $id)
    {
        $userId=Auth::id();
        $review = $this->model::findOrFail($id);
        $update = $review->update([
            'user_id'     => $userId ?? $review->user_id,
            'activity_id' => $data['activity_id'] ?? $review->activity_id,
            'comment'     => $data['comment'] ?? $review->comment,
            'rating'      => $data['rating'] ?? $review->rating
        ]);
        return $update;
    }

    public function delete($id)
    {
        $review = $this->model::findOrFail($id)->delete();
        return $review;
    }
}
