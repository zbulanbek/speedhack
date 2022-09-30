<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Hash;
use App\Models\User;


class LoginController extends Controller
{

    public function resetPassword(Request $request)
    {
        $email = $request->email;
        $token = $request->token;
        return inertia('Speedhack/Static/ResetPassword', compact('email', 'token'));
    }

    public function forgot_password()
    {
        return inertia('Speedhack/Static/ForgotPassword');
    }
}
