<?php

namespace App\Http\Controllers;

use App\Models\Device;
use App\Repositories\DeviceRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DeviceController extends Controller
{
    private $deviceRepository;

    public function __construct(DeviceRepository $deviceRepository)
    {
        $this->deviceRepository = $deviceRepository;
        $this->middleware('auth');
    }

    /**
     * Show the application device page.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $devices = Device::where('status', 0 )->get();
        $colorAvt = ['#e1663f', '#558ed5', '#92d050'];
        $tabActive = 'device';

        return view('device.index', compact('devices', 'colorAvt', 'tabActive'));
    }

    public function create()
    {
        $branches = config('resources.branch');
        $tabActive = 'device';
        return view('device.create', compact('branches', 'tabActive'));
    }

    public function store(Request $request)
    {
        //TODO: validate input
        $input = $request->all();
        $input['company_id'] = Auth::user()->id;
        $input['image'] = $this->deviceRepository->saveManyImg($request->file('image'), config('resources.upload_path'));
        $input['price'] = [
            'price_num' => $input['price_num'],
            'price_unit' => $input['price_unit'],
        ];
        $result = Device::create($input);
        $devices = Device::where('status', 0 )->get();
        $colorAvt = ['#e1663f', '#558ed5', '#92d050'];
        return view('device.index', compact('devices', 'colorAvt'));
    }

    public function show($id)
    {
        $device = Device::find($id);
        $branches = config('resources.branch');
        $tabActive = 'resource';
        return view('device.detail', compact('branches', 'device', 'tabActive'));
    }

    public function edit($id)
    {
        $device = Device::find($id);
        $branches = config('resources.branch');
        $tabActive = 'resource';
        return view('device.edit', compact('device','branches', 'tabActive'));
    }

    public function update(Request $request, $id)
    {
        $device = Device::find($id);
        //TODO: validate input
        $device->name = $request->name;
        $device->branch = $request->branch;
        $device->free_end = $request->free_end;
        $device->version = $request->version;
        $device->detail = $request->detail;
        $device->price = [
            "price_num" => $request->price_num,
            "price_unit" => $request->price_unit
        ];

        if ($request->hasFile('image')) {
            $imageNames = $this->deviceRepository->saveManyImg($request->file('image'), config('resources.upload_path'));
            $oldImage = $device->image;
            $device->image = $imageNames;
            if ($imageNames && $oldImage) {
                foreach ($oldImage as $img) {
                    if (($img != null) && (file_exists("upload/img_product/$img"))) {
                        unlink("upload/img_product/$img");
                    }
                }
            }
        }
        $result = $device->save();
        $branches = config('resources.branch');
        $tabActive = 'resource';
        return view('device.detail', compact('device', 'branches', 'tabActive'));
    }

    public function destroy()
    {
        return view('home');
    }
}
