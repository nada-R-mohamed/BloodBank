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
    public function logoutSpecificToken(Request $request)
    {
        $request->user('sanctum')->tokens()->where('id',$this->getTokenId($request->header('other-device-token')))->delete();
        return $this->success('This Acceess Token has been destroyed successfully');
    }


    public function logoutAllTokens(Request $request)
    {
        $request->user('sanctum')->tokens()->delete();
        return $this->success('All Of Your Acceess Token has been destroyed successfully');
    }

    private function getTokenId(string $token) :int
    {
        return explode(' ',explode('|',$token)[0])[1];
    }
    public function forgetPassword(Request $request)
    {
        try{

        }catch (\Exception $e){}
    }

    public function resetPassword()
    {

    }
}
