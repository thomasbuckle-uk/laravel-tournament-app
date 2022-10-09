<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Orchid\Access\RoleAccess;
use Orchid\Filters\Filterable;
use Orchid\Metrics\Chartable;
use Orchid\Screen\AsSource;

class Phase extends Model
{
    use Filterable, AsSource;


    protected $fillable = [
        'phase_name',
        'phase_name_slug',
        'icon_image_path',
        'description'
    ];


    public function settings(): HasMany
    {
        return $this->hasMany(PhaseSetting::class);
    }
}
