<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\DonationRequest;
use Illuminate\Http\Request;

class DonationRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $donations = DonationRequest::search($request)->with('bloodType','client','city')->paginate();
        return view('dashboard.donation-requests.index', compact('donations'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $donationDetails = DonationRequest::findOrFail($id);
        return view('dashboard.donation-requests.show', compact('donationDetails'));
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $donationRequest = DonationRequest::findOrFail($id);
        $donationRequest->delete();
        return redirect()->route('donation-requests.index')
            ->with('success', 'The Donation request was deleted successfully.');
    }
}
