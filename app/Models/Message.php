<?php

namespace App\Models;

use App\Events\MessageRecieved;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    protected $guarded = [];

    public static function booted()
    {
        static::created(function ($model) {
            MessageRecieved::dispatch($model->load('sender'));
        });
    }

    public function sender()
    {
        return $this->belongsTo(User::class, 'sender_id');
    }

    public function recipient()
    {
        return $this->belongsTo(User::class, 'recipient_id');
    }

    public function friendship() {
        return $this->belongsTo(Friendship::class);
    }

    public function messageAttachments() {
        return $this->hasMany(MessageAttachment::class);
    }
}
