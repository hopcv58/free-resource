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
}