<?php

namespace App\Http\Controllers;

use App\Components\Utilities\Responder;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Model;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    /**
     * Response success status with data.
     * @param Collection|Model|array|string|int $resource
     * @param string $message
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    protected function response($resource, $message = '')
    {
        // Check resource output empty.
        if (empty($resource) or (method_exists($resource, 'isEmpty') and $resource->isEmpty())) {
            return Responder::blank($message);
        }

        // Response data with success status.
        return Responder::data($resource, $message);
    }
}
