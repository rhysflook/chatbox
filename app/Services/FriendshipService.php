<?php
namespace App\Services;

use App\Enums\Status;
use App\Repositories\FriendshipRepository;
use Auth;

class FriendshipService {
    public function __construct(public FriendshipRepository $repository) {}

    public function makeFriendship($sender_id, $recipient_id)
    {
        $friendship = $this->repository->create([
            'sender_id' => $sender_id,
            'recipient_id' => $recipient_id,
        ]);
        $friendship_status_service = resolve(FriendshipStatusService::class);
        $friendship_status_service->createStatus($friendship->id, Status::REQUESTED->value, $sender_id);
    }

    public function getAllFriends($user_id)
    {
        return $this->repository->getAllFriends($user_id);
    }

    public function getFriend($id) {
        $friendship = $this->repository->find($id);
        if (!$friendship) return;
        $user_id = Auth::id();
        if ($friendship->sender_id == $user_id) {
            return $friendship->recipient;
        } else {
            return $friendship->sender;
        }
    }
}