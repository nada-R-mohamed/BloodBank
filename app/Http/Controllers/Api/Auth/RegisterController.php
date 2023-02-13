<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Models\Client;
use App\Traits\ApiResponses;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    use ApiResponses;
    public function register(RegisterRequest $request)
    {

        try{
            $data = $request->except('password');
            $data['password'] = Hash::make($request->password);
            $client = Client::create($data);
            $client->token = "Bearer " .$client->createToken($request->device_name)->plainTextToken;
            return $this->data(compact('client'),'registered',201);
        }catch (\Exception $e){

            return $this->error([$e->getMessage()],statusCode: 422);
        }

    }
}
