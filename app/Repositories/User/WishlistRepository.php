<?php

namespace App\Repositories\User;

use App\Models\Wishlist;

class WishlistRepository implements WishlistRepositoryInterface
{
    public function addToWishlist(array $data)
    {
        $userId = $data['user_id'];
        $wishlistItem = Wishlist::where('user_id', $userId)
                                ->where('activity_id', $data['activity_id'])
                                ->first();

        if (!$wishlistItem) {
            Wishlist::create([
                'user_id' => $userId,
                'activity_id' => $data['activity_id'],
            ]);
        }

        return $this->showWishlist($userId);
    }

    public function showWishlist($userId)
    {
        return Wishlist::where('user_id', $userId)->with('activity')->get();
    }

    public function removeFromWishlist($userId, $activityId)
    {
        Wishlist::where('user_id', $userId)->where('activity_id', $activityId)->delete();
        return $this->showWishlist($userId);
    }

    public function clearWishlist($userId)
    {
        Wishlist::where('user_id', $userId)->delete();
        return $this->showWishlist($userId);
    }
}
