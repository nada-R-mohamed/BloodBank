<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\CommunicationRequest;
use Illuminate\Http\Request;

class CommunicationRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $contacts = CommunicationRequest::search($request)->with('client')->paginate();
        return view('dashboard.contacts.index', compact('contacts'));
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
//        $communicationRequest->delete(); this is not running
        $contact = CommunicationRequest::findOrFail($id);
        $contact->delete();
        return redirect()->route('contacts.index')
            ->with('success', 'The communication request was deleted successfully.');
    }
}
