<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Traits\ApiResponses;
use Illuminate\Http\Request;

class CityController extends Controller
{
    use ApiResponses;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function allCities()
    {
        $cities = City::all();
        return $this->data(compact('cities'), 'all cities');
    }

}
