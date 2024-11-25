<?php

namespace App\Models;

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
    Models\User
};

class UserMeta extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'usermeta';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'gender',
        'address1',
        'address2',
        'phone'
    ];

    /**
     * Get the post that owns the comment.
     */
    public function userData (): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
