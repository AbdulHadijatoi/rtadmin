<?php

namespace App\Repositories\Admin;

use App\Models\Menu;
use App\Enums\UserRoleEnums;
use App\Interfaces\Api\ActivityInterface;
use Hash;
use Auth;


class MenuRepository
{
    private $model;

    public function __construct(Menu $model)
    {
        $this->model = $model;
    }

    public function index()
    {
        $menus = $this->model::all();
        return $menus;
    }

    public function store($request)
    {
        $menus = $this->model::create($request);
        return $menus;
    }

    public function edit($id)
    {
        $menu = $this->model::findOrFail($id);
        return $menu;
    }

    public function update($data, $id)
    {
        $menu = $this->model::findOrFail($id);
        $update = $menu->update([
            'route' => $data['route'] ?? $menu->route,
            'page_title' => $data['page_title'] ?? $menu->page_title,
            'status' => $data['status'] ?? $menu->status
        ]);
        return $menu;
    }

    public function destroy($id)
    {
        $menu = $this->model::findOrFail($id)->delete();
        return $menu;

    }

    public function allMenus()
    {
        $menu = $this->model::all();
        return $menu;
    }
}