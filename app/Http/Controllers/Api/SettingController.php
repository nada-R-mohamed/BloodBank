<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use App\Traits\ApiResponses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SettingController extends Controller
{
    use ApiResponses;

    public function contactUs()
    {
        $contuct = Setting::select('phone','email','facebook_url','twitter_url','instagram_url','youtube_url')->get();
        return $this->data(compact('contuct'),"contact data");
    }
    public function notificationSetting()
    {
        $text = Setting::select('notification_setting_text')->get();
        $blood_types = Auth::guard('sanctum')->user()->bloodTypes;
        $governorates = Auth::guard('sanctum')->user()->governorates;
        return $this->data(compact('text','blood_types','governorates'),"notification setting text");
    }
}
