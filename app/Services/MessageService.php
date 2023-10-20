<?php
namespace App\Services;

use App\Repositories\MessageRepository;
use Auth;
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
        $message_query = $this->repository->findByFriendship($id);
        $message_query->where('recipient_id', Auth::id())->update(['read_flg' => 1]);
        return $this->repository->findByFriendship($id)->orderBy('created_at')->get();
    }

    public function getUnreadCount()
    {
        return $this->repository->getUnreadCount();
    }
}