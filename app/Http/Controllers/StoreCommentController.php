<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Http\Requests\StoreCommentRequest;

class StoreCommentController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(StoreCommentRequest $request, int $id)
    {
        $event = $this->getEvent($id);
        $this->createComment($event, $request);

        return back();
    }

    private function getEvent(int $id): Event
    {
        return Event::findOrFail($id);
    }

    private function createComment(Event $event, StoreCommentRequest $request): void
    {
        $event->comments()->create([
            'user_id' => auth()->id(),
            'content' => $request->content,
        ]);
    }
}
