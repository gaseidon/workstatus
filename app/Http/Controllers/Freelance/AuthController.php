<?php

namespace App\Http\Controllers\Freelance;
use App\Http\Requests\StoreRegisterRequest;

class AuthController extends BaseController
{
    public function loginIndex(){

    }

    public function loginEvent(){

    }

    public function registerIndex(){
        return view('auth.register');
    }

    public function registerEvent(StoreRegisterRequest $request){
        $user = $request->validated();
        // print_r($user);
    }

    public function logout(){

    }
}
