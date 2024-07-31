<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Help;

class HelpController extends Controller
{
    public function index(){
        $data=Help::all();
        return view('admin.modules.help.index', compact('data'));
    }
}
