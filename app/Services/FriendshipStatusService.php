<?php
namespace App\Services;

use App\Repositories\FriendshipStatusRepository;
use App\Models\Status;

class FriendshipStatusService {
    public function __construct(public FriendshipStatusRepository $repository) {}

    public function createStatus($friendship_id, $status_code, $specifier_id)
    {
        $this->repository->create([
            'friendship_id' => $friendship_id,
            'status_id' => Status::select('id')->where('code', $status_code)->first()->id,
            'specifier_id' => $specifier_id
        ]);
    }
}