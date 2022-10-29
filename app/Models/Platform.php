<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Orchid\Filters\Filterable;
use Orchid\Screen\AsMultiSource;

class Platform extends Model
{
    use HasFactory, Filterable, AsMultiSource;

    protected $fillable = [
        'platform_name',
    ];

    public function games(): HasMany
    {
     return $this->hasMany(Game::class);
    }

}
