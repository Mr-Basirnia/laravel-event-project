<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\View\View;

class GalleryIndexController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request): View
    {
        $galleries = Gallery::orderBy('created_at', 'desc')->paginate(12);

        return view('galleryIndex', compact('galleries'));
    }
}
