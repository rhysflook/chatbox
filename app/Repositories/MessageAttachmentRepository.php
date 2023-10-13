<?php
namespace App\Repositories;

use App\Models\MessageAttachment;

class MessageAttachmentRepository extends BaseRepository {
    public function __construct(MessageAttachment $model) {
        parent::__construct($model);
    }

    public function createMany($message, $data)
    {
        $message->messageAttachments()->createMany($data);
    }
}