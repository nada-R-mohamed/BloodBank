<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index(Request $request)
    {
        $clients = Client::search($request)->with('bloodTypes','governorates')->paginate();
        return view('dashboard.clients.index', compact('clients'));
    }
    public function changeStatus(Request $request, $id)
    {
       //find client by id
       $client = Client::find($id);
       $client->status = !$client->status;
       $client->save();
       return redirect()->route('clients.index')->with('success', 'Client Updated Successfully');
    }
    public function destroy(Client $client)
    {
        $client->delete();
        return redirect()->route('clients.index')
            ->with('success','client deleted successfully.');
    }
}
