<?php

namespace App\Http\Controllers;

use App\Models\Friendship;
use App\Models\User;
use App\Services\FriendshipService;
use App\Services\MessageService;
use App\Services\ProfileService;
use Illuminate\Http\Request;
use Auth;
use Inertia\Inertia;

class MessagesController extends Controller
{

    public function chat(Request $request, FriendshipService $friends, MessageService $messages, ProfileService $profiles)
    {
        $recipient = $profiles->getUser($request->friend);
        $friendship = $recipient ? $friends->getByFriend($recipient->id) : null;
        $response = [
            'recipient' => $friendship ? $friends->getFriend($friendship->id) : null,
            'recipient_is_friend' => $recipient && $friends->isFriend($recipient->username),
            'chat' => [
                'messages' => $friendship ? $messages->getByFriendship($friendship->id) : [],
                'id' => $friendship ? $friendship->id : null,
            ],
        ];

        return Inertia::render(
            'Main/Top',
            $response
        );
    }

    public function send(Request $request, MessageService $messages) {
        $messages->createMessage(Auth::id(), $request);
        return to_route('chat', ['friend' => User::find($request->friend_id)->username]);
    }
}
