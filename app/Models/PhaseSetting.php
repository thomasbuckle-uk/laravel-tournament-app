<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Orchid\Screen\AsMultiSource;

class PhaseSetting extends Model
{
    use HasFactory, AsMultiSource;

    protected $fillable = [
        'name',
        'data_type',
        'description',
        'values'
    ];

    public function phase(): BelongsTo
    {
        return $this->belongsTo(Phase::class );
    }
}
