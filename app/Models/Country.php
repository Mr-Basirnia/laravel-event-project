<?php

namespace App\Models;

use App\Models\City;
use App\Models\Event;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Country extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];


    public function cities(): HasMany
    {
        return $this->hasMany(City::class);
    }


    public function events(): HasMany
    {
        return $this->hasMany(Event::class);
    }
}
