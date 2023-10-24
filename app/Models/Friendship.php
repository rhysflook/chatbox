<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Auth;
use DB;

class Friendship extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function sender() {
        return $this->belongsTo(User::class, 'sender_id');
    }

    public function recipient() {
        return $this->belongsTo(User::class, 'recipient_id');
    }

    public function messages() {
        return $this->hasMany(Message::class);
    }

    public function statuses() {
        return $this->hasMany(FriendshipStatus::class);
    }

    public function scopeWhereLatestStatus($query, $id)
    {
        $query->whereHas('statuses', function ($query) use ($id) {
            $query->whereLatest()->where('friendship_statuses.status_id', $id);
        });
    }

    public function scopeWhereCurrentUserIsParty($query)
    {
        $query->leftJoin('users', function ($join) {
            $join->on('users.id', '=', DB::raw(
                "(CASE
                WHEN friendships.sender_id = ? THEN friendships.recipient_id
                ELSE friendships.sender_id
                END)"
            ))->addBinding(Auth::id());
        });
    }
}
