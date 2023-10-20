<?php

namespace App\Http\Controllers;

use App\Models\RelationshipStatus;
use App\Services\MessageService;
use App\Services\UserService;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Auth;

class ProfileController extends Controller
{
    public function __invoke(Request $request, MessageService $messages)
    {
        return Inertia::render(
            'Main/Profile',
            [
                'user' => Auth::user(),
                'total_unread' => $messages->getUnreadCount(),
                'relationship_statuses' => RelationshipStatus::all()->all()
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
