<?php
namespace App\Repositories\User;
interface WishlistRepositoryInterface
{
    public function addToWishlist(array $data);
    public function showWishlist($userId);
    public function removeFromWishlist($userId, $activityId);
    public function clearWishlist($userId);
}
