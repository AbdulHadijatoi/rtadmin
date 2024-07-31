<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\User\CartRepository;
use App\Helpers\ExceptionHandlerHelper;
use App\Traits\ResponseTrait;
use illuminate\Support\Facades\Auth;
use App\Http\Requests\Api\User\CartRequest;

class CartController extends Controller
{
    use ResponseTrait;
    private $cartRepository;

    public function __construct(CartRepository $cartRepository)
    {
        $this->cartRepository = $cartRepository;
    }

    public function addToCart(CartRequest $request)
    {
        return ExceptionHandlerHelper::tryCatch(function () use ($request) {

            $userId = Auth::id();
            $data = array_merge($request->all(), ['user_id' => $userId]);
            $cart = $this->cartRepository->addToCart($data);
            return $this->sendResponse($cart, 'Item added to cart successfully');
        });
    }

    public function showCart()
    {
        return ExceptionHandlerHelper::tryCatch(function () {
            $userId = Auth::id();
            $cart = $this->cartRepository->showCart($userId);
            return $this->sendResponse($cart, 'Cart retrieved successfully');
        });
    }

    public function updateCart(Request $request, $id)
    {
        return ExceptionHandlerHelper::tryCatch(function () use ($request, $id) {
            $userId = Auth::id();
            $data = $request->all();
            $cart = $this->cartRepository->updateCart($userId, $id, $data);
            return $this->sendResponse($cart, 'Cart updated successfully');
        });
    }

    public function removeFromCart($id)
    {
        return ExceptionHandlerHelper::tryCatch(function () use ($id) {
            $userId = Auth::id();
            $cart = $this->cartRepository->removeFromCart($userId, $id);
            return $this->sendResponse($cart, 'Item removed from cart successfully');
        });
    }

    public function clearCart()
    {
        return ExceptionHandlerHelper::tryCatch(function () {
            $userId = Auth::id();
            $cart = $this->cartRepository->clearCart($userId);
            return $this->sendResponse($cart, 'Cart cleared successfully');
    });
}

}
