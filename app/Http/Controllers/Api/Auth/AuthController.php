<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Models\Client;
use App\Traits\ApiResponses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    use ApiResponses;

    public function login(LoginRequest $request)
    {

        $client = Client::where('phone',$request->phone)->first();
        if(! $client || !  Hash::check($request->password,$client->password)){
            return $this->error([
                'email'=>'The provided credentials are incorrect.'
            ],statusCode:401);
        }
        $client->token = "Bearer " .$client->createToken($request->device_name)->plainTextToken;
        return $this->data(compact('client'));
    }

    public function logoutCurrentToken(Request $request)
    {
        $request->user('sanctum')->currentAccessToken()->delete();
        return $this->success('Your Current Acceess Token has been destroyed successfully');
    }

    public function logoutAllTokens(Request $request)
    {
        $request->user('sanctum')->tokens()->delete();
        return $this->success('All Of Your Acceess Token has been destroyed successfully');
    }

    public function resetPassword(Request $request)
    {
        // validate phone
        // get client by phone
        // create pin_code rand(1000,9999)
        // update client with pin_code
        // send it with email
        // return message
    }

    public function newPassword(Request $request)
    {
        // validate [phone - pin_code - password confirmed]
        // get client by phone
        // check pin_code
        // update new password
        // update pin_code to null
        // return success
    }

}
