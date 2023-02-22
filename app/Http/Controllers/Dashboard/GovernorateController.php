<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Governorate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GovernorateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $governorates = Governorate::paginate();
        return view('dashboard.governorates.index',compact('governorates'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.governorates.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validation
        $request->validate(Governorate::rules());
        // store in governorate model
        $governorate = Governorate::create($request->all());
        // return redirect to index page with success message
        return redirect()->route('dashboard.governorates.index')
            ->with('success','Governorate created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //find the governorate by id
        try{
            $governorate = Governorate::findOrFail($id);
        }catch (\Exception $e){
            return redirect()->route('dashboard.governorates.index')->with('error','Governorate not found');
        }
        //return view with governorate
        return view('dashboard.governorates.show',compact('governorate'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // check the id parameter is in model
        try{
            $governorate = Governorate::findOrFail($id);
        }catch (\Exception $e){
            return redirect()->route('dashboard.governorates.index')->with('error','Governorate not found');
        }
        //return view with the edit form by id parameter
        return view('dashboard.governorates.edit',compact('governorate'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // validation for update
        $request->validate(Governorate::rules());
        // find governorate
        $governorate = Governorate::findOrFail($id);
        //update governorate model
        $governorate->update($request->all());
        //return redirect to index page with success message
        return redirect()->route('dashboard.governorates.index')
            ->with('success','Governorate updated successfully.');
        // return redirect to index page with success message
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // find the governorate by id
        $governorate = Governorate::findOrFail($id);
        //delete the model
        $governorate->delete();
        //return redirect to index page with success message
        return redirect()->route('dashboard.governorates.index')
            ->with('success','Governorate deleted successfully.');
    }
}
