<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{

    public function index()
    {
        $setting = Setting::first();

        return view('dashboard.settings.edit' , compact('setting'));

    }
    public function update(Request $request , Setting $setting)
    {
        $request->validate([
            'notification_setting_text'=> 'required|string',
            'about_app'=> 'required|string',
            'phone' => 'required|string',
            'email'=> 'required|string',
            'facebook_url' => 'required|string',
            'twitter_url' => 'required',
            'instagram_url' => 'required|string',
            'youtube_url' => 'required|string'
        ]);
        $setting->update($request->all());
        return redirect()->route('settings.index')->with('success', 'Setting Updated Successfully');
    }

}
