<?php
namespace App\Repositories;

use App\Models\Message;

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
        return $this->model->query()->with('sender')->where('friendship_id', $id)->orderBy('created_at')->get();
    }
}