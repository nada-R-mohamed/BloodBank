<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\BloodType;
use App\Traits\ApiResponses;
use Illuminate\Http\Request;

class BloodTypeController extends Controller
{
    use ApiResponses;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bloodTypes = BloodType::select('id','name')->get();
        return $this->data(compact('bloodTypes'),'All blood types');
    }

}
