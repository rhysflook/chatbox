<?php

namespace App\Http\Controllers;

use App\Models\Friendship;
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
        $user = Auth::user();
        $recipient = $profiles->getUser($request->friend);
        $friendship = $recipient ? $friends->getByFriend($recipient->id) : null;
        $response = [
            'loginUser' => $user,
            'recipient' => $friends->getFriend($friendship->id),
            'recipient_is_friend' => $recipient && $friends->isFriend($recipient->username),
            'friends' => $friends->getAllFriends(Auth::id()),
            'chat' => [
                'messages' => $friendship ? $messages->getByFriendship($friendship->id) : [],
                'id' => $friendship->id
            ],
            'total_unread' => $messages->getUnreadCount()
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
