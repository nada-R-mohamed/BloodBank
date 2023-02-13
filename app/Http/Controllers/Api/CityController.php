<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Traits\ApiResponses;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CityController extends Controller
{
    use ApiResponses;

    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function allCities(): JsonResponse
    {
        $cities = City::all();
        return $this->data(compact('cities'), 'all cities');
    }

}
