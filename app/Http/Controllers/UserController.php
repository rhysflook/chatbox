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

        if ($user) {
            return to_route('users.top');
        }
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

    public function chat(Request $request, FriendshipService $friends, MessageService $messages)
    {
        $user = Auth::user();
        $friendship = $request->friendship;
        $response = [
            'user' => $user,
            'friends' => $friends->getAllFriends(Auth::id()),
            'chat' => [
                'messages' => $friendship ? $messages->getByFriendship($friendship) : [],
                'id' => $friendship
            ],
        ];

        return Inertia::render(
            'Main/Top',
            $response
        );
    }

    public function send(Request $request, MessageService $messages) {
        $message = $messages->createMessage(Auth::id(), $request);
        return to_route('chat', ['friendship' => $request->id]);
    }
}
