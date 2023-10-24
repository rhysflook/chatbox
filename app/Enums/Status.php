<?php
namespace App\Enums;
enum Status: string {
    case REQUESTED = 'R';
    case ACCEPTED = 'A';
    case DECLINED = 'D';
    case BLOCKED = 'B';

    public function id() {
        return match($this)
        {
            Status::REQUESTED => 1,
            Status::ACCEPTED => 2,
            Status::DECLINED => 3,
            Status::BLOCKED => 4,
        };
    }
}