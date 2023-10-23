<?php

namespace App\Http\Controllers;

use App\Services\FriendshipService;
use App\Services\UserService;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Auth;

class FriendshipController extends Controller
{
    public function __invoke(Request $request, FriendshipService $friends, UserService $users)
    {
        Inertia::share('friends', $friends->getAllFriends(Auth::id()));
        Inertia::share('user_search', $users->searchByUsername($request->search));
        return Inertia::render(
            'Main/Friends',
        );
    }
}
