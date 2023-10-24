<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

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

    public function scopeWhereLatest($query)
    {
        $query->where(
            'created_at',
            DB::raw("(SELECT max(created_at)
            from friendship_statuses
            where \"friendships\".\"id\" = \"friendship_statuses\".\"friendship_id\")")
        );
    }
}
