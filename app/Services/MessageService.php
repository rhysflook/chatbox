<?php
namespace App\Services;

use App\Repositories\MessageRepository;

class MessageService {
    public function __construct(public MessageRepository $repository, public MessageAttachmentService $attachmentService) {}

    public function createMessage($sender_id, $request)
    {
        $data = [
            'sender_id' => $sender_id,
            'recipient_id' => $request->friend_id,
            'friendship_id' => $request->id,
            'content' => $request->message,
        ];

        $message = $this->repository->create($data);
        if ($request->file()) {
            $this->attachmentService->saveAttachments($message, $request->file('files'), $request->id);
        }
        return $message;
    }

    public function getByFriendship($id)
    {
        return $this->repository->findByFriendship($id);
    }
}