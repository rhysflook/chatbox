<?php
namespace App\Services;

use App\Enums\Status;
use App\Models\User;
use App\Repositories\FriendshipRepository;
use Auth;

class FriendshipService {
    public function __construct(
        public FriendshipRepository $repository,
        public ProfileService $profiles,
        public FriendshipStatusService $statuses,
    ) {}

    public function makeFriendship($sender_id, $recipient_id)
    {
        $friendship = $this->repository->create([
            'sender_id' => $sender_id,
            'recipient_id' => $recipient_id,
        ]);
        $this->statuses->createStatus($friendship->id, Status::REQUESTED->value, $sender_id);
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

    public function getByFriend($id)
    {
        return $this->repository->getByFriend($id)->first();
    }

    public function isFriend($name)
    {
        $id = $this->profiles->getUser($name)->id;
        return $this->repository->checkIfFriend($id);
    }

    public function getPendingRequests($is_sender=true)
    {
        return $this->repository->getPending($is_sender);
    }

    public function answerFriendRequest($username, $is_accepted)
    {
        $user = User::where('username', $username)->first();
        $friendship = $this->repository->getByFriend(
            $user->id
        )->first();

        $status = $is_accepted ? Status::ACCEPTED->value : Status::DECLINED->value;
        $this->statuses->createStatus($friendship->id, $status, $user->id);
    }

    public function cancelFriendRequest($user)
    {
        $friendship = $this->repository->getByFriend(
            $user->id
        )->first();

        $friendship->statuses()->delete();
        $friendship->delete();
    }
}