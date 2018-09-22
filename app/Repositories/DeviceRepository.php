<?php

namespace App\Repositories;

use App\Models\Device;
use Illuminate\Support\Collection;

class DeviceRepository extends Repository
{
    /**
     * @var Device
     */
    private $device;

    /**
     * NewsRepository constructor.
     */
    public function __construct()
    {
        $this->device = new Device();
    }

    /**
     * upload nhieu anh
     * @param array $imgs
     * @param string $path
     * @return array|\Illuminate\Http\RedirectResponse
     */
    public function saveManyImg($imgs, $path)
    {
        $names = [];
        if ($imgs == null) {
            return null;
        }
        foreach ($imgs as $img) {
            $err = null;
            $name = $img->getClientOriginalName();
            $ext = $img->getClientOriginalExtension();
            //kiem tra file trung ten
            while (file_exists($path . '/' . $name)) {
                $name = str_random(5) . "_" . $name;
            }
            $arr_ext = ['png', 'jpg', 'gif', 'jpeg'];
            if (!in_array($ext, $arr_ext)) {
                $names = null;
                return redirect()->back()->with('not_img', 'Chọn file ảnh png jpg gif jpeg có kích thước < 5Mb');
            } else {
                $img->move($path, $name);
                $names[] = $name;
            }
        }
        return $names;
    }
}