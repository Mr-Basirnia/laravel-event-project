<?php

namespace App\Models;

use App\Models\Event;
use App\Models\Country;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class City extends Model
{
    use HasFactory;

    protected $fillable = [
        'country_id',
        'name',
    ];


    public function country(): BelongsTo
    {
        return $this->belongsTo(Country::class);
    }


    public function events(): HasMany
    {
        return $this->hasMany(Event::class);
    }
}
