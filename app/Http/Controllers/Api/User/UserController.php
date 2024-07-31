<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\User\UpdateProfileRequest;
use Illuminate\Http\Request;
use App\Http\Requests\Api\User\{RegisterRequest, LoginRequest};
use App\Repositories\User\UserRepository;
use App\Helpers\ExceptionHandlerHelper;
use App\Traits\ResponseTrait;


class UserController extends Controller
{
    private $userRepository;
    use ResponseTrait;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function register(RegisterRequest $request)
    {
        return ExceptionHandlerHelper::tryCatch(function () use ($request) {
            $user = $this->userRepository->register($request->validated());
            return $this->sendResponse($user, 'User Register Successfully');
        });
    }

    public function login(LoginRequest $request)
    {
        return ExceptionHandlerHelper::tryCatch(function () use ($request) {
            $user = $this->userRepository->login($request->validated());
            if($user)
            {
                return $this->sendResponse($user, 'User Login Successfully');
            }
            else
            {
                return $this->sendError('Email or Password do not match!');
            }

        });
    }

    public function update_profile(Request $request)
    {
        return ExceptionHandlerHelper::tryCatch(function () use ($request) {
            $user = $this->userRepository->update_profile($request->all());
            return $this->sendResponse($user, 'User Profile Updated');
        });
    }

    public function update_password(Request $request)
    {
        $request=$request->validate([
        'password' =>'required'
        ]);
        return ExceptionHandlerHelper::tryCatch(function () use ($request) {
            $user = $this->userRepository->update_password($request);
            return $this->sendResponse($user, 'User Profile Password Updated');
        });
    }

    
}