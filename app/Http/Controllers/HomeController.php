<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
    /**
     * Show the application dashboard, login, ...
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return view('employ.index');
    }

    public function findJob()
    {
        return view('search');
    }

    public function myResource()
    {
        return view('resource.index');
    }


}
