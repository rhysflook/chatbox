<?php

namespace App\Http\Controllers;

use App\Events\MessageRecieved;
use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\LoginRequest;
use App\Services\FriendshipService;
use App\Services\MessageService;
use App\Services\UserService;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Auth;

class UserController extends Controller
{
    public function register(CreateUserRequest $request, UserService $service)
    {
        $user = $service->registerUser($request->input());
        Auth::login($user);
        return to_route('chat');
    }

    public function loginPage()
    {
        return Inertia::render('Main/Login', []);
    }

    public function login(LoginRequest $request)
    {
        if (Auth::attempt($request->input())) {
            return to_route('chat');
        }
    }

    public function logout()
    {
        Auth::logout();
        return to_route('registration');
    }
}
