<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\User\WishlistRepositoryInterface;
use App\Helpers\ExceptionHandlerHelper;
use App\Traits\ResponseTrait;
use illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    private $wishlistRepository;
    use ResponseTrait;

    public function __construct(WishlistRepositoryInterface $wishlistRepository)
    {
        $this->wishlistRepository = $wishlistRepository;
    }

    public function addToWishlist(Request $request)
    {
        return ExceptionHandlerHelper::tryCatch(function () use ($request) {
            $userId = Auth::id();
            $data = array_merge($request->all(), ['user_id' => $userId]);

            // Validate the request
            $request->validate([
                'activity_id' => 'required|exists:activities,id',
            ]);

            $wishlist = $this->wishlistRepository->addToWishlist($data);
            return $this->sendResponse($wishlist, 'Item added to wishlist successfully');
        });
    }

    public function showWishlist()
    {
        return ExceptionHandlerHelper::tryCatch(function () {
            $userId = Auth::id();
            $wishlist = $this->wishlistRepository->showWishlist($userId);

            return $this->sendResponse($wishlist, 'Wishlist retrieved successfully');
        });
    }

    public function removeFromWishlist($activityId)
    {
        return ExceptionHandlerHelper::tryCatch(function () use ($activityId) {
            $userId = Auth::id();
            $wishlist = $this->wishlistRepository->removeFromWishlist($userId, $activityId);
            return $this->sendResponse($wishlist, 'Item removed from wishlist successfully');
        });
    }

    public function clearWishlist()
    {
        return ExceptionHandlerHelper::tryCatch(function () {
            $userId = Auth::id();
            $wishlist = $this->wishlistRepository->clearWishlist($userId);
            return $this->sendResponse($wishlist, 'Wishlist cleared successfully');
        });
    }
}
