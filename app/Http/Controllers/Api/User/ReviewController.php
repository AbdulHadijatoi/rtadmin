<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helpers\ExceptionHandlerHelper;
use App\Repositories\User\ReviewRepository;
use App\Traits\ResponseTrait;
use App\Http\Requests\Api\User\ReviewRequest;

class ReviewController extends Controller
{
    private $reviewRepository;
    use ResponseTrait;

    public function __construct(ReviewRepository $reviewRepository)
    {
        $this->reviewRepository = $reviewRepository;
    }
    
   
    public function store(ReviewRequest $request)
    {
        return ExceptionHandlerHelper::tryCatch(function () use ($request) {
            $review = $this->reviewRepository->store($request->validated());
            return $this->sendResponse($review, 'Review added successfully');
        });
    }


    public function update(Request $request, string $id)
    {
        return ExceptionHandlerHelper::tryCatch(function () use ($request, $id) {
            $review = $this->reviewRepository->update($request->all(), $id);
            return $this->sendResponse($review, 'Review Updated successfully');
        });
    }


    public function delete(string $id)
    {
        return ExceptionHandlerHelper::tryCatch(function () use ($id) {
            $review = $this->reviewRepository->delete($id);
            return $this->sendResponse($review, 'Review deleted successfully');
        });
    }
}