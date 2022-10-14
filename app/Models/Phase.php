<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Orchid\Filters\Filterable;
use Orchid\Screen\AsMultiSource;

class Phase extends Model
{
    use Filterable, AsMultiSource;


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
