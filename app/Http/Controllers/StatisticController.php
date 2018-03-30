<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StatisticController extends Controller
{
    public function index(Request $request)
    {
        return view('pages.statistic.index');
    }
}
