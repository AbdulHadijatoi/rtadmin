<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Requests\Api\User\GiftCardRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helpers\ExceptionHandlerHelper;
use App\Repositories\User\GiftCardRepository;
use App\Http\Requests\Api\User\VoucherRequest;


class GiftCardController extends Controller
{
    private $giftCardRepository;

    public function __construct(GiftCardRepository $giftCardRepository)
    {
        $this->giftCardRepository = $giftCardRepository;
    }

    public function sendGift(GiftCardRequest $request)
    {
        return ExceptionHandlerHelper::tryCatch(function () use($request) {
            $giftCard = $this->giftCardRepository->sendGift($request->validated());
            return $this->sendResponse($giftCard, 'Gift card send successflly');
        });
    }

    public function applyVoucher(VoucherRequest $request)
    {
        return ExceptionHandlerHelper::tryCatch(function () use($request) {
            $data = $this->giftCardRepository->applyVoucher($request->validated());
            return $this->sendResponse($data, 'voucher details');
        });
    }

    public function expireVoucher(VoucherRequest $request)
    {
        return ExceptionHandlerHelper::tryCatch(function () use($request) {
            $data = $this->giftCardRepository->expireVoucher($request->validated());
            return $this->sendResponse($data, 'voucher details');
        });
    }
}