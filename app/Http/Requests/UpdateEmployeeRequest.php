<?php
/**
 * Created by Co-well.
 * Date: 7/21/2017
 * Time: 2:05 PM
 */

namespace App\Http\Requests;

use App\Http\Requests\Request;
use App\Http\Requests\RequestTrait;
use Illuminate\Foundation\Http\FormRequest;

class UpdateEmployeeRequest extends Request
{
    use RequestTrait;

    /**
     * Get request contain only input in rule.
     * @var bool
     */
    protected $strict = true;

    /**
     * Get the validation rules that apply to the request.
     * @return array
     */
    public function rules()
    {
        return [
            'id' => 'required|integer|exists:employee',
            'status' => 'required|integer|in:0,1,2,3,4',
            'company_id' => 'required|integer|exists:company,id',
        ];
    }
}