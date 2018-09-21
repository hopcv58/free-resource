<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{

    public function findJob()
    {
        return view('search');
    }

    public function myResource()
    {
        return view('resource.index');
    }


}
