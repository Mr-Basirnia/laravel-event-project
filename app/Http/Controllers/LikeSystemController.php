<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class LikeSystemController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, int $id)
    {
        $event = Event::findOrFail($id);
        $like = $event->likes()->where('user_id', auth()->id());

        if ($like->exists()) {
            $like->delete();

            return null;
        } else {
            $like = $event->likes()->create([
                'user_id' => auth()->id(),
            ]);

            return $like;
        }
    }
}
