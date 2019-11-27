<?php

namespace App\Http\Controllers\Api\spa;

use App\Http\Controllers\Api\spa\BaseController;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class RegisterController extends BaseController
{
    /**
     * Login api
     *
     * @param Request $request
     *
     * @return Response
     */
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if ( Auth::attempt($credentials) ) {
            $user             = Auth::user();
            $success['token'] = $user->createToken('MyApp')->accessToken;
            $success['name']  = $user->name;

            return $this->sendResponse($success, 'User login successfully.');
        } else {
            return $this->sendError('Unauthorised.', ['error' => 'Unauthorised']);
        }
    }
}

