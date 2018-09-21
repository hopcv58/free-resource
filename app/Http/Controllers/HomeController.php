<?php

namespace App\Http\Controllers;

use App\Responsitory\Business;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    private $business;

    /**
     * Show the application dashboard.
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
