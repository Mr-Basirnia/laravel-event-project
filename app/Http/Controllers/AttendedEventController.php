<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use Illuminate\Http\Request;

class AttendedEventController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request): View
    {
        $attendedEvents = auth()->user()->load('attendedEvents')->attendedEvents;

        return view('events.attended', compact('attendedEvents'));
    }
}
