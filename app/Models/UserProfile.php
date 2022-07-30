<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserProfile extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'user_profile';


    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'country', 'gamer_tag', 'discord_username', 'twitter_username', 'twitch_username', 'age', 'about_me', 'user_id'
    ];


    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
