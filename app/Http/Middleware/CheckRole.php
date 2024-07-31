<?php

namespace App\Http\Middleware;

use Closure;
use App\Enums\UserRoleEnums;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;


class CheckRole
{

    public function handle(Request $request, Closure $next,$role): Response
    {
        $user = Auth::user();


        if ($user && $user->roles[0]->name == $role) {

            return $next($request);
        }
        return redirect()->route('admin.loginPage')->with('error', 'Unauthorized.');
    }
}
