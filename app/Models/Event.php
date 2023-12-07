<?php

namespace App\Models;

use App\Models\Tag;
use App\Models\City;
use App\Models\Like;
use App\Models\User;
use App\Models\Comment;
use App\Models\Country;
use App\Models\Attending;
use App\Models\SavedEvent;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'description',
        'start_date',
        'end_date',
        'start_time',
        'image',
        'address',
        'num_tickets',
        'user_id',
        'country_id',
        'city_id',
    ];

    protected $casts = [
        'start_date' => 'date:m/d/Y',
        'end_date' => 'date:m/d/Y',
    ];


    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }


    public function country(): BelongsTo
    {
        return $this->belongsTo(Country::class);
    }


    public function city(): BelongsTo
    {
        return $this->belongsTo(City::class);
    }


    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }


    public function likes(): HasMany
    {
        return $this->hasMany(Like::class);
    }


    public function attendings(): HasMany
    {
        return $this->hasMany(Attending::class);
    }


    public function savedEvents(): HasMany
    {
        return $this->hasMany(SavedEvent::class);
    }


    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class);
    }


    public function hasTag($tag): bool
    {
        return $this->tags->contains($tag);
    }
}
