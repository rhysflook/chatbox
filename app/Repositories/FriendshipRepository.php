<?php
namespace App\Repositories;

use App\Enums\Status;
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
            'users.username as username',
            'users.profile_pic as pic',
            'messages.unread_count',
        )
        ->whereCurrentUserIsParty()
        ->leftJoinSub($unread_count, 'messages'
        ,  'messages.friendship_id', '=', 'friendships.id')
        ->whereLatestStatus(Status::ACCEPTED->id())
        ->where(function ($query) use ($user_id) {
            $query->where('friendships.sender_id', $user_id)
                ->orWhere('friendships.recipient_id', $user_id);
        })
        ->get();
    }

    public function getByFriend($id)
    {
        $user_id = Auth::id();
        return $this->model->where(function ($query) use ($id, $user_id) {
            $query->where([
                'sender_id' => $id,
                'recipient_id' => $user_id,
            ]);
        })
        ->orWhere(
            function ($query) use ($id, $user_id) {
                $query->where([
                    'sender_id' => $user_id,
                    'recipient_id' => $id,
                ]);
            }
        );
    }

    public function checkIfFriend($id)
    {
        $this->getByFriend($id)->exists();
    }

    public function getPending($is_sender)
    {
        $col = $is_sender ? 'sender_id' : 'recipient_id';
        return $this->model->select('users.*')->where($col, Auth::id())
            ->whereLatestStatus(Status::REQUESTED->id())
            ->whereCurrentUserIsParty()
            ->get();
    }

}