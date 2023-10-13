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
}