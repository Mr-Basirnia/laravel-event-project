<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use Illuminate\Http\Request;

class SavedEventController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request): View
    {
        $savedEvents = auth()->user()->load('savedEvents')->savedEvents;

        return view('events.saved', compact('savedEvents'));
    }
}
