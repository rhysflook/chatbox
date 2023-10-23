<?php

namespace App\Http\Controllers;

use App\Services\FriendshipService;
use Illuminate\Http\Request;
use Inertia\Inertia;

class FriendshipController extends Controller
{
    public function __invoke(Request $request, FriendshipService $friends)
    {
        return Inertia::render(
            'Main/Friends',
            [

            ]
        );
    }
}
