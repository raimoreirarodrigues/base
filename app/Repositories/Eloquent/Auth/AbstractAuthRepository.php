<?php

namespace App\Repositories\Eloquent\Auth;

use App\Repositories\Contracts\AuthRepositoryInterface;
use Exception;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

abstract class AbstractAuthRepository implements AuthRepositoryInterface{

    protected $model;

    public function __construct(){
        $this->model = $this->resolveModel();
    }

    public function login(string $email, string $password){
     try{
        $data = ['email'=>$email,'password'=>$password];
        if (!auth()->attempt($data)) {
          return response()->json(['error_message' => 'Incorrect Details. Please try again'],Response::HTTP_UNAUTHORIZED);
        }

        $token = auth()->user()->createToken('Token User API')->accessToken;
        return response(['user' => auth()->user(), 'token' => $token]);
     }catch(Exception $e){
      throw $e;
     }
    }

    public function logout(){
      try{
        $user = Auth::user();
        $user->tokens()->delete();
      }catch(Exception $e){
        throw $e;
      }
    }

    protected function resolveModel(){
        return app($this->model);
    }
}