<?php

namespace App\Repositories\Eloquent\Auth;

use App\Models\User;
use Illuminate\Http\Response;

class AuthRepository extends AbstractAuthRepository{

    protected $model = User::class;

}