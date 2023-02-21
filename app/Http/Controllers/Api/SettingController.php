<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\Setting;
use App\Traits\ApiResponses;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SettingController extends Controller
{
    use ApiResponses;

    public function contactUs() : JsonResponse
    {
        $contuct = Setting::select('phone','email','facebook_url','twitter_url','instagram_url','youtube_url')->get();
        return $this->responseData(compact('contuct'),"contact data");
    }
    public function contactUsRequest(Request $request) : JsonResponse
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
            return $this->responseSuccess('success');
        }catch (\Exception $e){
            return $this->responseError([$e->getMessage()],statusCode: 422);
        }

    }
    public function getNotificationSetting() : JsonResponse
    {
        $text = Setting::select('notification_setting_text')->get();
        $blood_types = Auth::guard('sanctum')->user()->bloodTypes;
        $governorates = Auth::guard('sanctum')->user()->governorates()->pluck('governorates.id')->toArray();
        return $this->responseData(compact('text','blood_types','governorates'),"notification setting text");
    }

    public function setNotificationSetting(Request $request) : JsonResponse
    {
        try {
            $request->validate([
                'blood_type_id'=> ['nullable','exists:blood_types,id'],
                'governorate_id'=> ['nullable','exists:governorates,id'],
            ]);
            $client = Auth::guard('sanctum')->user();
            $client->bloodTypes()->sync([$request->blood_type_id]) ;
            $client->governorates()->sync([$request->governorate_id]) ;
            return $this->responseSuccess('Notification setting set successfully');

        }catch (\Exception $e){
            return $this->responseError([$e->getMessage()],statusCode: 422);
        }

    }

}
