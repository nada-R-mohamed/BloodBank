<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Models\Client;
use App\Models\Token;
use App\Traits\ApiResponses;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\ResetPassword;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    use ApiResponses;

    public function login(LoginRequest $request) : JsonResponse
    {

        $client = Client::where('phone',$request->phone)->first();
        if(! $client || !  Hash::check($request->password,$client->password)){
            return $this->responseError([
                'email'=>'The provided credentials are incorrect.'
            ],statusCode:401);
        }
        $client->token = "Bearer " .$client->createToken($request->device_name)->plainTextToken;
        return $this->responseData(compact('client'));
    }

    public function logoutCurrentToken(Request $request) : JsonResponse
    {
        $request->user('sanctum')->currentAccessToken()->delete();
        return $this->responseSuccess('Your Current Acceess Token has been destroyed successfully');
    }

    public function logoutAllTokens(Request $request) : JsonResponse
    {
        $request->user('sanctum')->tokens()->delete();
        return $this->responseSuccess('All Of Your Acceess Token has been destroyed successfully');
    }

    public function resetPassword(Request $request) :JsonResponse
    {
        // validate phone
        $validator = Validator::make($request->all(),[
            'phone' =>'required|string',['exists:clients,phone'],
        ]);
        if ($validator->fails()) {
            return $this->responseError([$validator->errors()]);
        }
        // get client by phone
        $client = Client::where('phone',$request->phone)->first();
        if(! $client){
            return $this->responseError(['phone' => 'The provided phone is incorrect.'],statusCode:401);
        }
        // create pin_code
        $pin_code = rand(1000,9999);
        // update client with pin_code
        $client->pin_code = $pin_code;
        $client->save();
        // send it with email
        Mail::to($client->email)->send(new ResetPassword($pin_code));
        // return message
        return $this->responseSuccess("The Pin Code has ben send to your email");
    }

    public function newPassword(Request $request) : JsonResponse
    {
        // validate [phone - pin_code - password confirmed]
        $validator = Validator::make($request->all(),[
            'phone' =>'required|string|exists:clients,phone',
            'pin_code' =>'required|string|exists:clients,pin_code',
            'password' =>'required|string|confirmed|min:6',
        ]);
        if ($validator->fails()) {
            return $this->responseError([$validator->errors()]);
        }

        // get client by phone
        $client = Client::where('phone',$request->phone)->first();
        if(! $client){
            return $this->responseError(['phone' => 'The provided phone is incorrect.'],statusCode:401);
        }
        // check pin_code
        if($client->pin_code != $request->pin_code){
            return $this->responseError(['pin_code' => 'The provided pin code is incorrect.'],statusCode:401);
        }
        // update new password
        $client->update([
            'password' => Hash::make($request->password),
            'pin_code' => null,
        ]);
        // return success
        return $this->responseSuccess('password updated successfully');
    }

    public function registerToken(Request $request) : JsonResponse
    {
        $validator = Validator::make($request->all(),[
            'token' => 'required|string',
            'platform' => 'required|in:android,ios',
        ]);
        if ($validator->fails()) {
            return $this->responseError([$validator->errors()]);
        }
       Token::where('token',$request->token)->delete();
        $request->user('sanctum')->notificationTokens()->create($request->all());
        return $this->responseSuccess("registration token created successfully");
    }

    public function removeToken(Request $request) : JsonResponse
    {
        $validator = Validator::make($request->all(),[
            'token' => 'required|string',
        ]);
        if ($validator->fails()) {
            return $this->responseError([$validator->errors()]);
        }
        Token::where('token',$request->token)->delete();
        return $this->responseSuccess("registration token deleted successfully");
    }

}
