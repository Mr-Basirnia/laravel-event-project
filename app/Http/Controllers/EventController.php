<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Event;
use App\Models\Country;
use Illuminate\View\View;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Event\CreateEventRequest;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('events.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $countries = Country::all();
        $tags = Tag::all();

        return view('events.create', compact('countries', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateEventRequest $request)
    {
        if (!$request->hasFile('image'))
            return back();


        $data = $request->validated();
        $data['image'] = Storage::putFile('events', $request->file('image'));
        $data['user_id'] = auth()->id();
        $data['slug'] = $this->generateUniqueSlug($request->title);

        $event =  Event::create($data);
        $event->tags()->attach($request->tags);

        return to_route('events.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }


    function generateUniqueSlug($title): string
    {
        $slug = Str::slug($title);
        $uuid = Str::uuid();

        return "$slug-$uuid";
    }
}
