<?php

namespace App\Http\Controllers;

use App\Services\FriendshipService;
use App\Services\ProfileService;
use App\Services\UserService;
use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Auth;

class FriendshipController extends Controller
{
    public function __invoke(Request $request, FriendshipService $friends, UserService $users)
    {
        Inertia::share('friends', $friends->getAllFriends(Auth::id()));
        return Inertia::render(
            'Main/Friends',
            [
                'user_search' => $users->searchByUsername($request->search),
                'pending_sent' => $friends->getPendingRequests(),
                'pending_received' => $friends->getPendingRequests(false),
            ]
        );
    }

    public function createFriendRequest(Request $request, FriendshipService $friends, ProfileService $profiles)
    {
        $friends->makeFriendship(Auth::id(), $profiles->getUser($request->username)->id);
        return to_route("friends", ['search' => $request->searchTerm]);
    }

    public function answerRequest(Request $request, FriendshipService $friends)
    {
        $friends->answerFriendRequest($request->username, $request->accepted);
        return to_route("friends");
    }

    public function cancelRequest(FriendshipService $friends, User $user)
    {
        $friends->cancelFriendRequest($user);
        return to_route("friends");
    }
}
