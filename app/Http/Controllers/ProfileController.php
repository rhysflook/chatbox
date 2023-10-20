<?php

namespace App\Http\Controllers;

use App\Models\Friendship;
use App\Models\RelationshipStatus;
use App\Services\FriendshipService;
use App\Services\MessageService;
use App\Services\ProfileService;
use App\Services\UserService;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Auth;

class ProfileController extends Controller
{
    public function __invoke(Request $request, MessageService $messages, ProfileService $profile, FriendshipService $friends)
    {
        if ($request->user) {
            $user = $profile->getUser($request->user);
            $is_friend = $friends->isFriend($request->user);
        } else {
            $user = Auth::user();
            $is_friend = null;
        }

        return Inertia::render(
            'Main/Profile',
            [
                'user' => $user,
                'loginUser' => Auth::user(),
                'total_unread' => $messages->getUnreadCount(),
                'relationship_statuses' => RelationshipStatus::all()->all(),
                'is_friend' => $is_friend
            ]
        );
    }

    public function updateProfile(Request $request, UserService $user)
    {
        $user->updateProfile($request->only([
            'about', 'date_of_birth', 'relationship_status', 'is_visible'
        ]));

        return to_route('profile');
    }
}
