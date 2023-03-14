<?php

namespace App\Http\Controllers\Front\Auth;

use App\Http\Controllers\Controller;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function index()
    {
        return view('front.auth.login');
    }
    public function login(Request $request)
    {
        $data = $request->validate([
            'phone' => 'required|string',
            'password' => 'required|string|min:6',
        ]);
        $client = Client::where('phone', $request->phone)->first();
        if (!$client || !Hash::check($request->password, $client->password)) {
            return redirect()->back()->with('error', 'Invalid phone or password');
        }
        $request->session()->regenerate();
        return redirect()->route('home')->with('success','success');
    }
    public function logout()
    {
        auth('client')->logout();
        request()->session()->invalidate();
        return redirect()->route('login')->with('success','Logged out successfully');
    }
}
