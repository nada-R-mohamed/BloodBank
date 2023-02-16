<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\BloodType;
use App\Traits\ApiResponses;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class BloodTypeController extends Controller
{
    use ApiResponses;
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function allBloodTypes() : JsonResponse
    {
        $bloodTypes = BloodType::select('id','name')->get();
        return $this->responseData(compact('bloodTypes'),'All blood types');
    }

}
