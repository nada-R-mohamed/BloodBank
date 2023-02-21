<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * @return view
     */
    public function index() : view
    {
        return view('dashboard.index');
    }
}
