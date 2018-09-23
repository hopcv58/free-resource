<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JobController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application job page.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jobs = Job::where('status', 0)
            ->where('company_id', '!=', Auth::user()->id)
            ->orderBy('id', 'DESC')->get();
        $colorAvt = ['#e1663f', '#558ed5', '#92d050'];
        $tabActive = 'job';

        $technicals = config('resources.technical_skill');
        $postions = config('resources.position');
        $levels = config('resources.level');
        return view('job.index', compact('jobs', 'colorAvt', 'tabActive', 'levels', 'postions', 'technicals'));
    }

    public function create()
    {
        $levels = config('resources.level');
        $postions = config('resources.position');
        $technicals = config('resources.technical_skill');
        $tabActive = 'resource';
        $status = -1;
        $titleForm = 'Create new job';
        return view('job.create', compact('levels', 'postions', 'tabActive', 'technicals', 'status', 'titleForm'));
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
        $input['company_id'] = Auth::user()->id;
        $result = Job::create($input);
        $jobs = Job::where('status', 0)->get();
        $colorAvt = ['#e1663f', '#558ed5', '#92d050'];
        $tabActive = 'job';
        $technicals = config('resources.technical_skill');
        $postions = config('resources.position');
        $levels = config('resources.level');
        return view('job.index', compact('jobs', 'colorAvt', 'tabActive', 'levels', 'postions', 'technicals'));
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
        $technicals = config('resources.technical_skill');
        $tabActive = 'resource';
        $status = -1;
        $titleForm = 'Update job jnfo';
        return view('job.edit', compact('job', 'levels', 'postions', 'tabActive', 'technicals', 'status', 'titleForm'));
    }

    public function update(Request $request, $id)
    {
        $levels = config('resources.level');
        $postions = config('resources.position');
        $job = Job::find($id);
        $job->position = $request->position;
        $job->level = $request->level;
        $job->title = $request->title;
        $job->skill = $request->skill;
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
