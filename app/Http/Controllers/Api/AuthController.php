<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Repositories\Contracts\AuthRepositoryInterface;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller{

    public function login(Request $request, AuthRepositoryInterface $repository){
        try{
            return $repository->login($request->email,$request->password);
        }catch(Exception $e){
            return response()->json(['Error login access: '.$e->getMessage()],Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function logout(Request $request, AuthRepositoryInterface $repository){
        try{
            $repository->logout();
            return response()->json(['Logout success!'],Response::HTTP_OK);
        }catch(Exception $e){
            return response()->json(['Error logout access: '.$e->getMessage()],Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
