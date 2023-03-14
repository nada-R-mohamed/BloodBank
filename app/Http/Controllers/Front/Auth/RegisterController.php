<?php

namespace App\Http\Controllers\Front\Auth;

use App\Http\Controllers\Controller;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function create()
    {
        return view('front.auth.register');
    }
    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required|string|min:3|max:100',
            'email' =>'required|email|unique:clients,email',
            'date_of_birth' => 'required|date',
            'blood_type_id' => 'required|integer|exists:blood_types,id',
            'phone' => ['regex:/^01[0125][0-9]{8}$/'],
            'password' => 'required|min:6|confirmed',
            'last_donation_date' => 'required|date',
            'city_id' => 'required|integer|exists:cities,id',
        ]);
        $request->merge([
            'device_name' => 'web',
        ]);
        $data = $request->except('password');
        $data['password'] = Hash::make($request->password);
        Client::create($data);
        return redirect()->route('home')->with('success','Register Success');
    }
}
