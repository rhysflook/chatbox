<?php
namespace App\Repositories;

use App\Models\Friendship;
use Auth, DB;

class FriendshipRepository extends BaseRepository {
    public function __construct(Friendship $model) {
        parent::__construct($model);
    }

    public function getAllFriends($user_id)
    {
        return $this->model->query()->select('friendships.*', 'users.id as friend_id', 'users.name as friend', 'users.profile_pic as pic')
        ->join('users', function ($join) use ($user_id) {
            $join->on('users.id', '=', DB::raw(
                "(CASE
                WHEN friendships.sender_id = ? THEN friendships.recipient_id
                ELSE friendships.sender_id
                END)", [$user_id]
            ));
        })
            ->where('sender_id', $user_id)
            ->orWhere('recipient_id', $user_id)
            ->addBinding($user_id)
            ->get();
    }

}