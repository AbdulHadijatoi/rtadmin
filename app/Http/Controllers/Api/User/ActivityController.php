<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helpers\ExceptionHandlerHelper;
use App\Repositories\User\ActivityRepository;


class ActivityController extends Controller
{
    private $activityRepository;

    public function __construct(ActivityRepository $activityRepository)
    {
        $this->activityRepository = $activityRepository;
    }

    public function index()
    {
        return ExceptionHandlerHelper::tryCatch(function () {
            $activity = $this->activityRepository->index();
            return $this->sendResponse($activity, 'All Activity');
        });
    }


    public function show($id)
    {
        return ExceptionHandlerHelper::tryCatch(function () use($id) {
            $activity = $this->activityRepository->show($id);
            return $this->sendResponse($activity, 'single Activity');
        });
    }
    public function showBySlug($slug)
    {
        return ExceptionHandlerHelper::tryCatch(function () use($slug) {
            $activity = $this->activityRepository->showBySlug($slug);
            return $this->sendResponse($activity, 'single Activity');
        });
    }
}