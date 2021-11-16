<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;


class AuthController extends Controller
{
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'string|required|max:70',
            'password' => 'string|required'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        if (Auth::attempt($validator->validated())) {
            return redirect()->back();
        }

        return redirect()->back()->withErrors($validator);
    }

    public function logout()
    {
        Auth::logout();
        Session::flush();
        return redirect()->back();
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'string|required|max:100',
            'email' => 'string|required|max:70|unique:users',
            'password' => 'string|required|min:6|confirmed'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $newUser = User::create($validator->validated());

        Auth::login($newUser);

        return redirect()->back();
    }
}
