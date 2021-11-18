<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DesignController extends Controller
{
    //
    public function homePage()
    {
        return view("home");
    }

    public function servicesPage()
    {
        return view("services");
    }
}
