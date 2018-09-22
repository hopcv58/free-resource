<?php
/**
 * Created by Co-well.
 * Date: 7/21/2017
 * Time: 2:05 PM
 */

namespace App\Http\Requests;

use App\Http\Requests\Request;
use App\Http\Requests\RequestTrait;

class ListEmployeeRequest extends Request
{
    use RequestTrait;

    /**
     * Get request contain only input in rule.
     * @var bool
     */
    protected $strict = true;

    /**
     * Get default inputs.
     * @return array
     */
    public function defaults()
    {
        return [
            'limit' => 0,
        ];
    }

    /**
     * Sanitize request.
     * @param Request $request
     */
    public function sanitize(Request $request)
    {
        // Group all inputs filter_ to array filters.
        $this->groupFilters();
    }

    /**
     * Get the validation rules that apply to the request.
     * @return array
     */
    public function rules()
    {
        return [
            'limit' => 'integer|min:0',
            'filters.name' => 'string|min:1|max:100',
            'filters.company_id' => 'integer|min:1',
            'filters.position' => 'string|min:1|position:100',
            'filters.age' => 'integer|min:18|max:100',
            'filters.level' => 'string|min:1',
            'filters.exp_num' => 'int|min:1|max:255|required_with:exp_unit',
            'filters.exp_unit' => 'string|in:month,year|required_with:exp_num',
            'filters.skill' => 'string|min:1',
            'filters.free_begin' => 'date_format:Y-m-d',
            'filters.min_price' => 'integer|min:1',
            'filters.max_price' => 'integer|min:1',
            'filters.free_end' => 'date_format:Y-m-d',
            'filters.certificate' => 'integer|in:0,1',
        ];
    }
}