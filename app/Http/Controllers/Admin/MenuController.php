<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\MenuRequest;
use App\Repositories\Admin\MenuRepository;
use App\Helpers\ExceptionHandlerHelper;

class MenuController extends Controller
{
    public $menuRepo ;

    public function __construct(MenuRepository $menuRepo)
    {
        $this->menuRepo = $menuRepo;
    }

    public function index()
    {
        $menus = $this->menuRepo->index();
        return view('admin.modules.setting.menu.list', compact('menus'));
    }


    public function create()
    {
        return view('admin.modules.setting.menu.add');
    }


    public function store(MenuRequest $request)
    {

        $menus = $this->menuRepo->store($request->validated());
        return redirect()->route('menus.index')->with('success', 'Menu Created Successfully');
    }


    public function edit(string $id)
    {
        $menu = $this->menuRepo->edit($id);
        return view('admin.modules.setting.menu.update', compact('menu'));
    }


    public function update(Request $request, string $id)
    {
        $menu = $this->menuRepo->update($request->all(), $id);
        return redirect()->route('menus.index')->with('success', 'Menu Updated Successfully');
    }


    public function destroy(string $id)
    {
        $menu = $this->menuRepo->destroy($id);
        return redirect()->route('menus.index')->with('success', 'Menu Deleted Successfully');
    }

    public function allMenus()
    {
        return ExceptionHandlerHelper::tryCatch(function () {
            $activity = $this->menuRepo->allMenus();
            return $this->sendResponse($activity, 'All Menu');
        });
    }
}
