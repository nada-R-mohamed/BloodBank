<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Traits\ApiResponses;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    use ApiResponses;
    public function getProfile()
    {
        $clientProfile = Auth::guard('sanctum')->user();
        return $this->data(compact('clientProfile'));
    }

}
