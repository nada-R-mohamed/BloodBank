<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Models\Client;
use App\Traits\ApiResponses;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    use ApiResponses;
    public function register(RegisterRequest $request) : JsonResponse
    {

        try{
            $data = $request->except('password');
            $data['password'] = Hash::make($request->password);
            $client = Client::create($data);
            $client->token = "Bearer " .$client->createToken($request->device_name)->plainTextToken;
            return $this->responseData(compact('client'),'registered',201);
        }catch (\Exception $e){

            return $this->responseError([$e->getMessage()],statusCode: 422);
        }

    }
}
