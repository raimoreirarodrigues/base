<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use OwenIt\Auditing\Contracts\Auditable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable implements Auditable
{
    use \OwenIt\Auditing\Auditable,HasApiTokens, HasFactory, Notifiable,HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */


    protected array $guard_name = ['web','api'];

    protected $fillable = ['name','email','password','active'];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = ['password','remember_token'];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = ['email_verified_at' => 'datetime'];

    // public function createToken(string $name, array $abilities = ['*']){
    //     $token = $this->tokens()->create([
    //         'name' => $name,
    //         'token' => hash('sha256', $plainTextToken = Str::random(256)),
    //         'abilities' => $abilities,
    //     ]);

    //     return new NewAccessToken($token, $token->getKey().'|'.$plainTextToken);
    // }
}
