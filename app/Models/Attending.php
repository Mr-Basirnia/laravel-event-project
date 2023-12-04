<?php

namespace App\Models;

use App\Models\User;
use App\Models\Event;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Attending extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'event_id',
        'num_tickets',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }


    public function event(): BelongsTo
    {
        return $this->belongsTo(Event::class);
    }
}
