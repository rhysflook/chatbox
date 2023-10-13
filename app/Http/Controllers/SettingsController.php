<?php

namespace App\Http\Controllers;

use App\Models\ColorScheme;
use Illuminate\Http\Request;
use Auth;
use Inertia\Inertia;

class SettingsController extends Controller
{
    public function __invoke()
    {
        $user = Auth::user();
        return Inertia::render('Main/Settings', [
            'user' => $user,
            'schemes' => ColorScheme::all()
        ]);
    }
}
