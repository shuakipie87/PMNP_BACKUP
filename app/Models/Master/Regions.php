<?php

namespace App\Models\Master;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\{
    Database\Eloquent\Factories\HasFactory,
    Database\Eloquent\Model,
    Database\Eloquent\Relations\BelongsTo,
    Foundation\Auth\User as Authenticatable,
    Notifications\Notifiable
};
use Laravel\Sanctum\HasApiTokens;
use App\{
    Models\User,
    Models\UserMeta
};

class Regions extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'regions';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'sector'
    ];

    /**
     * Get the user that owns the phone.
     */
    public function userMeta (): BelongsTo
    {
        return $this->belongsTo(UserMeta::class, foreignKey: 'region_id');
    }
}
