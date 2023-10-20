<?php
namespace App\Repositories;

use App\Models\Friendship;
use App\Models\Message;
use Auth, DB;

class FriendshipRepository extends BaseRepository {
    public function __construct(Friendship $model) {
        parent::__construct($model);
    }

    public function getAllFriends($user_id)
    {

        $unread_count = Message::select("friendship_id", DB::raw("count(read_flg) as unread_count"))
            ->where(['messages.read_flg' =>  0, 'messages.recipient_id' => Auth::id()])->groupBy('friendship_id');

        return $this->model->query()
        ->select(
            'friendships.*',
            'users.id as friend_id',
            'users.name as friend',
            'users.profile_pic as pic',
            'messages.unread_count'
        )
        ->leftJoin('users', function ($join) use ($user_id) {
            $join->on('users.id', '=', DB::raw(
                "(CASE
                WHEN friendships.sender_id = ? THEN friendships.recipient_id
                ELSE friendships.sender_id
                END)"
            ))->addBinding($user_id);
        })
        ->leftJoinSub($unread_count, 'messages'
        ,  'messages.friendship_id', '=', 'friendships.id')
        ->where('friendships.sender_id', $user_id)
        ->orWhere('friendships.recipient_id', $user_id)
        ->get();
    }

}