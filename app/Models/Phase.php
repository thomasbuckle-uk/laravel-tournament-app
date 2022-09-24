<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Phase extends Model
{
    use HasFactory;


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
