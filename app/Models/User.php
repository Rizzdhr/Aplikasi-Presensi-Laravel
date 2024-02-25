<?php

namespace App\Models;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasRoles, HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        // 'guru_id',
        'username',
        'email',
        'password'
        // 'role'

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


//     public function Guru()
//     {
//         return $this->belongsTo(Guru::class, 'guru_id');
//     }

//     /**
//      * The roles that belong to the User
//      *
//      * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
//      */
//     public function roles()
//     {
//         return $this->belongsToMany(Role::class, 'role_user', 'user_id', 'role_id');
//     }
}
