<?php
namespace App\Repositories;

use App\Models\Message;
use Auth;

class MessageRepository extends BaseRepository {
    public function __construct(Message $model) {
        parent::__construct($model);
    }

    public function findBySender($id)
    {
        return $this->model->query()->where('sender_id', $id)->get();
    }

    public function findByFriendship($id)
    {
        return $this->model->query()->with(['sender', 'messageAttachments'])->where('friendship_id', $id);

    }

    public function getUnreadCount()
    {
        return $this->model->query()->where(['recipient_id' => Auth::id(), 'read_flg' => 0])->count();
    }
}