<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use Illuminate\Http\Request;

class LikedEventController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request): View
    {
        $LikedEvents = auth()->user()->load('likedEvents')->likedEvents;

        return view('events.liked', compact('LikedEvents'));
    }
}
