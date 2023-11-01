<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //verificar se o usuario está logado no sistema
    public function __construct()
    {
        $this->middleware('auth');
    }
}
