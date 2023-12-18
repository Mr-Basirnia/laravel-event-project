<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class SaveSystemController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, int $id)
    {
        $event = Event::findOrFail($id);

        $savedEvent = $event->savedEvents()->where('user_id', auth()->id());

        if ($savedEvent->exists()) {
            $savedEvent->delete();

            return null;
        } else {
            $savedEvent = $event->savedEvents()->create([
                'user_id' => auth()->id(),
            ]);

            return $savedEvent;
        }
    }
}
