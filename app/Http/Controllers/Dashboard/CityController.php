<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Governorate;
use Illuminate\Http\Request;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cities = City::paginate();
        return view('dashboard.cities.index', compact('cities'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $governorates = Governorate::all();
        return view('dashboard.cities.create',compact('governorates'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(City::rules($request->governorate_id));
        // store in governorate model
        $governorate = City::create($request->all());
        // return redirect to index page with success message
        return redirect()->route('cities.index')
            ->with('success','City created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //find the city by id
        try{
            $city = City::findOrFail($id);
        }catch (\Exception $e){
            return redirect()->route('cities.index')
                ->with('error','City not found');
        }
        $governorate = $city->governorate;
        //return view with cities
        return view('dashboard.cities.show',compact('city','governorate'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try{
            $city = City::findOrFail($id);
        }catch (\Exception $e){
            return redirect()->route('cities.index')->with('error','City not found');
        }
        $governorates = Governorate::all();
        return view('dashboard.cities.edit', compact('governorates','city'));
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
        $request->validate(City::rules($id));
        // find governorate
        $city = City::findOrFail($id);
        //update governorate model
        $city->update($request->all());
        //return redirect to index page with success message
        return redirect()->route('cities.index')
            ->with('success','City updated successfully.');
        // return redirect to index page with success message
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(City $city)
    {
        $city->delete();
        return redirect()->route('cities.index')
            ->with('success','City deleted successfully.');
    }
}
