<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\DonationRequest;
use App\Models\Post;
use App\Traits\ApiResponses;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\Token;

class DonationController extends Controller
{
    use ApiResponses;
    public function createDonation(Request $request) : JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'patient_name' => 'required|string|max:255',
            'patient_age' => 'required|numeric|min:2',
            'patient_phone' =>'required|string|max:255',
            'hospital_name' => 'required|string|max:255',
            'hospital_address' => 'required|string|max:400',
            'city_id' => 'required|integer',['exists:cities,id'],
            'blood_type_id' => 'required|integer',['exists:blood_types,id'],
            'bags_num' => 'required|numeric|',
            'details' => 'required|string',
            'latitude' => 'required',
            'longitude' => 'required',
        ]);
        if ($validator->fails()) {
            return $this->responseError([$validator->errors()]);
        }
        $donationRequest = $request->user('sanctum')->donationRequests()->create($request->all());

//        //find clients suitable for this donation request
        $clientIds = $donationRequest->city->governorate->clients()
            ->whereHas('bloodTypes',function($q) use ($request){
                $q->where('blood_types.id', $request->blood_type_id);
            })->pluck('clients.id')->toArray();
        if(count($clientIds))
        {
            $notification = $donationRequest->notification()->create([
                'title' => 'There is a patient that needs a donation:',
                'content' => 'need donation for patient blood type: '. $donationRequest->bloodType->name,
            ]);
            // attach clients to notification
            $notification->clients()->attach($clientIds);

            $notificationTokens = Token::whereIn('client_id', $clientIds)
                ->where('token','!=',null)
                ->pluck('token')->toArray();
            if(count($notificationTokens))
            {
                $title = $notification->title;
                $body = $notification->content;
                $data = [
                    'donation_request_id' => $donationRequest->id,
                ];
                $send = notifyByFirebase($title, $body, $notificationTokens ,$data);
            }
        }
        return $this->responseData(compact('donationRequest'),"sunccess");

    }

    public function allDonationRequests() : JsonResponse
    {
        $donationRequests = DonationRequest::paginate();
        return $this->responseData([$donationRequests]);
    }

    public function getDonationRequest(Request $request) : JsonResponse
    {
        if (! $request->has('id')) {
            return $this->responseError(['id'=> 'not found post id']);
        }
        $validator = Validator::make([$request->query('id')], [
            'id'=>'integer',
            ['exists:donation_requests,id']]);
        if ($validator->fails()) {
            return $this->responseError(['id'=>$validator->errors()]);
        }
        $donationRequest = DonationRequest::with('bloodType','city')->find($request->query('id'));

        return $this->responseData(compact('donationRequest'),"the selected donation request");
    }
}
