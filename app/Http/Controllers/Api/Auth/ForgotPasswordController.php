<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Mail\SendPasswordResetLink;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;
use App\Mail\ResetPasswordMail;
use Illuminate\Support\Facades\Mail;

class ForgotPasswordController extends Controller
{
    public function sendResetLink(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return response()->json(['error' => 'User not found'], 404);
        }

        // Generate the OTP
        $otp = random_int(100000, 999999);

        // Save the OTP in the password_resets table
        DB::table('password_resets')->updateOrInsert(
            ['email' => $request->email],
            ['token' => ($otp), 'created_at' => now()]
        );

        // Send the OTP via email
        Mail::to($request->email)->send(new SendPasswordResetLink($otp));

        return response()->json(['message' => 'OTP sent successfully']);
    }

    public function verifyOTP(Request $request)
    {
        $request->validate([
            'otp' => 'required|string|min:6|max:6',
        ]);

        $passwordReset = DB::table('password_resets')
            ->where('token', $request->otp)
            ->first();

        if (!$passwordReset) {
            return response()->json(['error' => 'Invalid OTP'], 400);
        }
        return response()->json(['message' => 'OTP verified', 'otp' =>$passwordReset]);
    }


    public function resetPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string|min:8',
            'password_confirmation' => 'required|string|min:8',
            'otp' => 'required',
        ]);

        $user = DB::table('password_resets')->where('email', $request->email)->first();

        if ($user) {
            $userModel = User::where('email', $user->email)->first();

            if (!$userModel) {
                return response()->json(['error' => 'User not found'], 404);
            }

            // Update the user's password
            $userModel->update(['password' => Hash::make($request->password)]);
            $userModel->update(['original_password' => $request->password]);

            // Delete the password reset record
            DB::table('password_resets')->where('email', $request->email)->delete();

            return response()->json(['message' => 'Password has been reset successfully']);
        } else {
            return response()->json(['error' => 'OTP is Expired'], 404);
        }
    }


}
