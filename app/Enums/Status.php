<?php
namespace App\Enums;
enum Status: string {
    case REQUESTED = 'R';
    case ACCEPTED = 'A';
    case DECLINED = 'D';
    case BLOCKED = 'B';
}