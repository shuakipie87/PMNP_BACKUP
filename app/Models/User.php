<?php

namespace App\Models;

use Illuminate\{
    Database\Eloquent\Factories\HasFactory,
    Database\Eloquent\Model,
    Database\Eloquent\Relations\HasOne,
    Database\Eloquent\Relations\HasMany,
    Database\Query\JoinClause,
    Contracts\Auth\CanResetPassword,
    Contracts\Auth\MustVerifyEmail,
    Contracts\Database\Eloquent\Builder,
    Foundation\Auth\User as Authenticatable,
    Notifications\Notifiable,
};
use Laravel\Sanctum\HasApiTokens;
use App\{
    Models\UserMeta,
    Models\Master\Regions
};
use Laravel\Fortify\TwoFactorAuthenticatable;

class User extends Authenticatable implements MustVerifyEmail, CanResetPassword
{
    use HasApiTokens, HasFactory, Notifiable, TwoFactorAuthenticatable;

    // master / super [admin] user_id
    public const ADMIN_ID = 1;

    // guard
    public const GUARD = 'user';

    // admin
    public const ADMIN = 'admin';

    // md5
    public const MD5 = 'user_api';

    // select row array
    public const SELECT = [
        'users.*',
        'users.name AS user_name',
        'usermeta.*',
        'usermeta.id AS usermeta_id',
        'usermeta.user_id AS usermeta_userid',
        'regions.*',
        'regions.id AS region_id',
        'regions.name AS region_name',
        'organizationals.*',
        'organizationals.id AS organizational_id'
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    // hasOne Callback

    /**
     * Get the phone associated with the user.
     */
    public function usermeta (): HasOne {
        return $this->hasOne(UserMeta::class);
    }

    public function regions (): HasMany {
        // return $this->hasMany(Regions::class, 'regions.id', 'usermeta.region_id');
    }

    /**
     * fetch query to get all data on a one function.
     *
     * @param integer $id default null
     * @var array<string, string>
     * 
     * @return object
     */
    public static function getData (int $id = null): mixed 
    {
        $query = self::query()->select(self::SELECT); // select

        if (!is_null($id) === true) {
            $query->where(['users.id' => $id]);
        }

        $query->join('usermeta', 'users.id', '=', 'usermeta.user_id');  
        $query->join('regions', 'usermeta.region_id', '=', 'regions.id');
        $query->join('organizationals', 'usermeta.organizational_id', '=', 'organizationals.id');
        
        // $query->joinRelationship('usermeta.user_id');
        // $query->joinRelationship('usermeta.region_id');
        // $query->joinRelationship('usermeta.organizational_id');

        // $query->join('usermeta', function (JoinClause $join) {
        //     $join->on('users.id', '=', 'usermeta.user_id');
        // });

        if (!is_null($id) === true) {
            return $query->groupBy('usermeta_id')->first();
        }

        return $query->groupBy('usermeta_id')
            ->orderBy('users.id', 'DESC')
            ->get();
    }

    /**
     * The attributes that should be cast.
     *
     * @param integer $id
     * @var array<string, string>
     * 
     * @return object
     */
    public static function getDataByToken (int $id, string $token): mixed
    {
        $query = self::query(); // select
        
        // join
        return $query->where(['id' => $id, 'remember_token' => $token])
            ->orderBy('users.id', 'DESC')
            ->get();
    }

    /**
     * The attributes that should be cast.
     *
     * @param integer $id
     * @var array<string, string>
     * 
     * @return object
     */
    public static function updateToken (int $id): mixed
    {
        $query = self::query(); // select
        
        // join -> personal_access_tokens
        $query->join('personal_access_tokens', 'users.id', '=', 'personal_access_tokens.tokenable_id');

        // where
        $query->where(['personal_access_tokens.id' => $id])
            ->orderBy('users.id', 'DESC');
        
        return $query->get();
    }
}
