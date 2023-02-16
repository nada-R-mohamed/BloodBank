<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Traits\ApiResponses;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    use ApiResponses;
    public function getProfile() : jsonResponse
    {
        $clientProfile = Auth::guard('sanctum')->user();

        return $this->responseData(compact('clientProfile'));
    }
    public function updateProfile(Request $request)
    {
        $client = Auth::guard('sanctum')->user();
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|min:3|max:100',
            'email' => "required|email|unique:clients,email,$client->id",
            'date_of_birth' => 'required|date',
            'blood_type_id' => 'required|integer|exists:blood_types,id',
            'phone' => ['regex:/^01[0125][0-9]{8}$/',],
            'password' => 'min:6',
            'last_donation_date' => 'required|date',
            'city_id' => 'integer|exists:cities,id',
        ]);

        if($validator->fails()){
            return $this->error(['errors'=>$validator->errors()],"validation error",422);
        }

        $clientProfile = $client->update([
            'name' => $request->name,
            'email' => $request->email,
            'date_of_birth' => $request->date_of_birth,
            'blood_type_id' => $request->blood_type_id,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
            'last_donation_date' => $request->last_donation_date,
            'city_id' => $request->city_id,

        ]);
        return $this->responseSuccess("updated successfully");
    }

}
