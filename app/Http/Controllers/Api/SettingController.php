<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Client;
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
    public function contactUsRequest(Request $request)
    {
        try{
            $request->validate([
                'title' => 'required|string',
                'content_text' => 'required|string',
            ]);
        $client = Auth::guard('sanctum')->user()->communicatioRequests()
            ->create([
                'title' => $request->title,
                'content' => $request->content_text,
                'client_id'=> Auth::guard('sanctum')->user()->id,
            ]);
            return $this->success('success');
        }catch (\Exception $e){
            return $this->error([$e->getMessage()],statusCode: 422);
        }

    }
    public function getNotificationSetting()
    {
        $text = Setting::select('notification_setting_text')->get();
        $blood_types = Auth::guard('sanctum')->user()->bloodTypes;
        $governorates = Auth::guard('sanctum')->user()->governorates()->pluck('id')->toArray();
        return $this->data(compact('text','blood_types','governorates'),"notification setting text");
    }

    public function setNotificationSetting(Request $request)
    {
        try {
            $request->validate([
                'blood_type_id'=> ['nullable','exists:blood_types,id'],
                'governorate_id'=> ['nullable','exists:governorates,id'],
            ]);
            $client = Auth::guard('sanctum')->user();
            $client->bloodTypes()->sync([$request->blood_type_id]) ;
            $client->governorates()->sync([$request->governorate_id]) ;
            return $this->success('Notification setting set successfully');

        }catch (\Exception $e){
            return $this->error([$e->getMessage()],statusCode: 422);
        }

    }

}
