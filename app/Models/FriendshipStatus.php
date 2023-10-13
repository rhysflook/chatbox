<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FriendshipStatus extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function friendship() {
        return $this->belongsTo(Friendship::class);
    }

    public function user() {
        return $this->belongsTo(User::class, 'specifier_id');
    }
}
