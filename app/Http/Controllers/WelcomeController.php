<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\View\View;

class WelcomeController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request): View
    {
        $events = Event::with('country', 'tags')->where('end_date', '>=', today())->orderBy('created_at', 'desc')->get();

        return view('welcome', compact('events'));
    }
}
