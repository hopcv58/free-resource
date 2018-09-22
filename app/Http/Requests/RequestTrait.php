<?php

namespace App\Http\Requests;


trait RequestTrait
{
    /**
     * Group all param filter_ to array.
     */
    protected function groupFilters ()
    {
        $this->groupInputs('filter_', 'filters');
    }

    /**
     * Group all param filter_ to array.
     */
    protected function groupOrders ()
    {
        $this->groupInputs('order_', 'orders');
    }

    /**
     * Group all param prefix to array with group name.
     * @internal
     * @param string $inputPrefix
     * @param string $group
     */
    private function groupInputs ($inputPrefix, $group)
    {
        $inputs = $this->all();

        foreach ($this->all() as $key => $value) {
            if (self::begin_with($inputPrefix, $key)) {
                is_string($value) and $inputs[$group][substr($key, strlen($inputPrefix))] = $value;

                unset($inputs[$key]);
            }
        }

        $this->replace($inputs);
    }

    /**
     * Convert input to array by delimiter.
     * @param $target
     * @param string $delimiter
     */
    protected function inputToArray ($target, $delimiter = ',')
    {
        if ($this->has($target)) {
            $inputs = array_map('trim', explode($delimiter, $this->$target));

            $this[$target] = array_values(array_filter($inputs));
        }
    }

    /**
     *  Check string target is begin with match.
     * @param string $needle
     * @param string $haystack
     * @return bool
     */
    public static function begin_with($needle, $haystack)
    {
        return (substr($haystack, 0, strlen($needle)) === $needle);
    }
}