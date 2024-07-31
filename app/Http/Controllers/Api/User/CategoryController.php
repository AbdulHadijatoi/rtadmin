<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helpers\ExceptionHandlerHelper;
use App\Repositories\User\CategoryRepository;
use App\Models\Activity;



class CategoryController extends Controller
{
    private $categoryRepository;

    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function index()
    {
        return ExceptionHandlerHelper::tryCatch(function () {
            $category = $this->categoryRepository->index();
            return $this->sendResponse($category, 'All Category');
        });
    }

    public function getCategoryActivity($Id)
    {
        return ExceptionHandlerHelper::tryCatch(function () use ($Id) {
            $activity = Activity::where('category_id', $Id)->get();
            return $this->sendResponse($activity, 'All category with Activity');
        });
    }


    public function show(string $id)
    {
        return ExceptionHandlerHelper::tryCatch(function ()use($id) {
            $category = $this->categoryRepository->show($id);
            return $this->sendResponse($category, 'Category Details');
        });
    }
}