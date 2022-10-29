<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Orchid\Filters\Filterable;
use Orchid\Screen\AsSource;

class Game extends Model
{
    use HasFactory, Filterable, AsSource;



    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'state_active' => 'boolean',
        'available_platforms' => 'array',
    ];


    protected $fillable = ["
    'game_title',
    'short_title',
    'available_platforms,
    'state_active'
    "];


}
