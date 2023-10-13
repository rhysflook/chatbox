<?php
namespace App\Repositories;

use App\Models\FriendshipStatus;

class FriendshipStatusRepository extends BaseRepository {
    public function __construct(FriendshipStatus $model) {
        parent::__construct($model);
    }
}