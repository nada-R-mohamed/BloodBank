<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Governorate;
use App\Traits\ApiResponses;
use Illuminate\Http\Request;

class GovernorateController extends Controller
{
    use ApiResponses;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function AllGovernorates()
    {
        $governorates = Governorate::all();
        return $this->data(compact('governorates'),'all governorates');
    }


}
