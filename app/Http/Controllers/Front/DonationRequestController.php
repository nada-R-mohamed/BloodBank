<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\DonationRequest;
use Illuminate\Http\Request;

class DonationRequestController extends Controller
{
    public function index(Request $request)
    {
        $donations = DonationRequest::Search($request)->with('city','bloodType')->paginate();
        return view('front.donation-requests.donation-requests',compact('donations'));
    }
    public function donationDetails($id)
    {
        $donation = DonationRequest::find($id);
        return view('front.donation-requests.donation-request-details',compact('donation'));
    }

}
