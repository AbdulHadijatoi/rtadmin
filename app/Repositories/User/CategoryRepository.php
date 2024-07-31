<?php

namespace App\Repositories\User;

use App\Models\Category;
use App\Enums\UserRoleEnums;
use App\Interfaces\Api\CategoryInterface;
use Hash;
use Auth;

class CategoryRepository implements CategoryInterface
{
    private $model;

    public function __construct(Category $model)
    {
        $this->model = $model;
    }

    public function index()
    {
        $category = $this->model::all();
        return $category;
    }


    public function show($id)
    {
        $category = $this->model::findOrFail($id);
        return $category;
    }
}