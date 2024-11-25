<?php

namespace App\Models;

use Illuminate\{
    Database\Eloquent\Factories\HasFactory,
    Notifications\Notifiable,
    Database\Eloquent\Model
};
use Laravel\Sanctum\{
    PersonalAccessToken as SanctumPersonalAccessToken,
    HasApiTokens
};

class PersonalAccessToken extends SanctumPersonalAccessToken
{
    use HasApiTokens, HasFactory, Notifiable;
}
