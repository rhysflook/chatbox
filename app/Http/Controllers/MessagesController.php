<?php

namespace App\Http\Controllers;

use App\Models\Friendship;
use App\Services\FriendshipService;
use App\Services\MessageService;
use Illuminate\Http\Request;
use Auth;
use Inertia\Inertia;

class MessagesController extends Controller
{

    public function chat(Request $request, FriendshipService $friends, MessageService $messages)
    {
        $user = Auth::user();
        $friendship = $request->friendship;
        $response = [
            'loginUser' => $user,
            'recipient' => $friends->getFriend($friendship),

            'friends' => $friends->getAllFriends(Auth::id()),
            'chat' => [
                'messages' => $friendship ? $messages->getByFriendship($friendship) : [],
                'id' => $friendship
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
