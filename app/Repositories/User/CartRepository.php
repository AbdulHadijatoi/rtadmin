<?php

namespace App\Repositories\User;
use App\Models\CartItem;

class CartRepository
{
    public function addToCart(array $data)
    {
        $userId = $data['user_id'];

            CartItem::create([
                'user_id' => $userId,
                'package_id' => $data['package_id'],
                'quantity' => $data['quantity'],
                'tour_date'=>$data['tour_date'],
                'adult'=>$data['adult'] ?? null,
                'child'=>$data['child'] ?? null,
                'infant'=>$data['infant'] ?? null,
                'price'=>$data['price'],
            ]);


        return $this->showCart($userId);
    }

    public function showCart($userId)
    {
        return CartItem::where('user_id', $userId)->with('package.activity')->get();
    }

    public function updateCart($userId, $itemId, array $data)
    {
        $cartItem = CartItem::where('user_id', $userId)->where('id', $itemId)->first();

        if ($cartItem) {
            $fieldsToUpdate = [
                'quantity' => $data['quantity'] ?? $cartItem->quantity,
                'tour_date' => $data['tour_date'] ?? $cartItem->tour_date,
                'adult' => $data['adult'] ?? $cartItem->adult,
                'child' => $data['child'] ?? $cartItem->child,
                'infant' => $data['infant'] ?? $cartItem->infant,
                'price' => $data['price'] ?? $cartItem->price,
            ];
            $cartItem->update($fieldsToUpdate);
        }

        return $this->showCart($userId);
    }

    public function removeFromCart($userId,$Id)
    {
        $item=CartItem::findOrFail($Id);
        $item->delete();
        return $this->showCart($userId);
    }

    public function clearCart($userId)
    {
        CartItem::where('user_id', $userId)->delete();
        return $this->showCart($userId);
    }
}