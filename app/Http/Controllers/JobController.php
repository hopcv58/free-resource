<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;

class JobController extends Controller
{
    /**
     * Show the application job page.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jobs = Job::where('status', 0 )->get();
        $colorAvt = ['#e1663f', '#558ed5', '#92d050'];
        $tabActive = 'job';

        return view('job.index', compact('jobs', 'colorAvt' , 'tabActive'));
    }

    public function create()
    {
        $levels = config('resources.level');
        $postions = config('resources.position');
        $tabActive = 'resource';
        return view('job.create', compact('levels', 'postions', 'tabActive'));
    }

    public function store(Request $request)
    {
        //TODO: validate input
        $input = $request->all();
        $input['experience'] = [
            'exp_num' => $input['exp_num'],
            'exp_unit' => $input['exp_unit']
        ];
        $input['price'] = [
            'price_num' => $input['price_num'],
            'price_unit' => $input['price_unit'],
        ];
        //hard fix company_id
        //TODO: remove hard fix
        $input['company_id'] = 1;
        $result = Job::create($input);
        $jobs = Job::where('status', 0 )->get();
        $colorAvt = ['#e1663f', '#558ed5', '#92d050'];
        $tabActive = 'job';
        return view('job.index', compact('jobs', 'colorAvt' , 'tabActive'));
    }

    public function show($id)
    {
        $job = Job::find($id);
        $levels = config('resources.level');
        $postions = config('resources.position');
        return view('job.detail', compact('job', 'levels', 'postions'));
    }

    public function edit($id)
    {
        $job = Job::find($id);
        $levels = config('resources.level');
        $postions = config('resources.position');
        $tabActive = 'resource';
        return view('job.edit', compact('job', 'levels', 'postions', 'tabActive'));
    }

    public function update(Request $request, $id)
    {
        $levels = config('resources.level');
        $postions = config('resources.position');
        $job = Job::find($id);
        $job->position = $request->position;
        $job->level = $request->level;
        $job->skill = $request->skill;
        $job->detail = $request->detail;
        $job->certificate = $request->certificate;
        $job->time_start = $request->time_start;
        $job->experience = [
            "exp_num" => $request->exp_num,
            "exp_unit" => $request->exp_unit
        ];
        $job->price = [
            "price_num" => $request->price_num,
            "price_unit" => $request->price_unit
        ];
        $job->quantity = $request->quantity;
        $result = $job->save();
        return view('job.detail', compact('job', 'levels', 'postions'));
    }

    public function destroy()
    {
        return view('home');
    }
}
