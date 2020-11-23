<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RouteTestController extends Controller
{
    public function index()
    {
        return response(['created'=>true], 201);
    }
    
}
