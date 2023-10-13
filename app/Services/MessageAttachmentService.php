<?php
namespace App\Services;
use Storage;
use App\Repositories\MessageAttachmentRepository;

class MessageAttachmentService {
    public function __construct(public MessageAttachmentRepository $repository) {}
    public function saveAttachments($message, $files, $friendship_id) {
        $paths = [];
        foreach ($files as $file) {
            $path = Storage::disk(env('STORAGE_DISK', 'public'))->put("/friendships/$friendship_id", $file);
            array_push($paths, ['file' => $path]);
        }
        $this->repository->createMany($message, $paths);
    }
}