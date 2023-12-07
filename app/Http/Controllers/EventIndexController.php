<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\View\View;

class EventIndexController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request): View
    {
        $events = Event::with('country', 'tags')->orderBy('created_at', 'desc')->paginate(12);

        return view('eventsIndex', compact('events'));
    }
}
