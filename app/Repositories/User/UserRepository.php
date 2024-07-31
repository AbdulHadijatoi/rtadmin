<?php

namespace App\Repositories\User;

use App\Models\User;
use App\Enums\UserRoleEnums;
use Illuminate\Http\UploadedFile;
use Hash;
use Auth;


class UserRepository
{
    private $model;

    public function __construct()
    {
        $this->model = new User();
    }

    public function register(array $data)
    {
        $user = $this->model::create([
            'first_name'   => $data['first_name'],
            'last_name'    => $data['last_name'],
            'email'        => $data['email'],
            'password'     => Hash::make($data['password']),
            'original_password' => $data['password'],
            'phone'        => $data['phone'],
            'visa_status'  => $data['visa_status'],
            'instagram'    => $data['instagram'],
            'twitter'      => $data['twitter'],
            'facebook'     => $data['facebook']
        ]);
        $user->assignRole(UserRoleEnums::USER);
        return $user;
    }

    public function login(array $data)
    {

        if (Auth::attempt(['email' => $data['email'], 'password' => $data['password']])) {
            $user = Auth::user();
            $success['token'] = $user->createToken('MyApp')->plainTextToken;
            $success['user'] = $user;
            return $success;
        }

    }

    public function update_profile($data)
    {
        $user = $this->model::find(auth()->user()->id);
        $imagePath=null;
        if (isset($data['profile_image']) && $user->profile_image) {
            $this->deleteImage($user->profile_image);
        }

        if (isset($data['profile_image'])) {

            $imagePath = $this->uploadImage($data['profile_image']);

        }
        $user->update([
            'first_name'   => $data['first_name'] ?? $user->first_name,
            'last_name'    => $data['last_name'] ?? $user->last_name,
            'phone'        => $data['phone'] ?? $user->phone,
            'visa_status'  => $data['visa_status'] ?? $user->visa_status,
            'instagram'    => $data['instagram'] ?? $user->instagram,
            'twitter'      => $data['twitter'] ?? $user->twitter,
            'facebook'     => $data['facebook'] ?? $user->facebook,
            'profile_image'=>$imagePath,
            'profile_image_url'=>asset($imagePath),
        ]);
        return $user;
    }

    public function update_password($data)
    {
        $user = $this->model::find(auth()->user()->id);
        $update = $user->update([
            'password'     => Hash::make($data['password']) ?? $user->password,
            'original_password' => $data['password'] ?? $user->original_password,
        ]);
        return $update;
    }

    private function uploadImage(UploadedFile $file)
    {
        $imageName = uniqid() . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('profile_image/'), $imageName);
        return 'profile_image/' . $imageName;
    }

    private function deleteImage($imagePath)
    {
        if (file_exists(public_path($imagePath))) {
            unlink(public_path($imagePath));
        }
    }
}