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

class DonationController extends Controller
{
    use ApiResponses;
    public function createDonation(Request $request) : JsonResponse
    {
        //validation
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
        $donationRequest = $request->all();
        $donationRequest['client_id'] = Auth::guard('sanctum')->user()->id;
        $donation = DonationRequest::create($donationRequest);
        return $this->responseData([$donationRequest]);
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
