<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Client;
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
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function destroy($id)
    {
//        $communicationRequest->delete(); this is not running
        $contact = CommunicationRequest::findOrFail($id);
        $contact->delete();
        return redirect()->route('contacts.index')
            ->with('success', 'The communication request was deleted successfully.');
    }
    public function changeStatus(Request $request, $id)
    {
        //find communication request by id
        $contact = CommunicationRequest::findOrFail($id);
        if($contact->is_done == 1) {
            $contact->is_done = 0;
        }else{
            $contact->is_done = 1;
        }
        $contact->save();
        return redirect()->route('contacts.index')->with('success', 'contact Updated status Successfully');
    }
}
