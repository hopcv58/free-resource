<?php
/**
 * Created by Co-well.
 * Date: 8/1/2017
 * Time: 11:44 AM
 */

namespace App\Models;


use Illuminate\Database\Query\Builder;

class AdvancedBuilder extends Builder
{
    /**
     * Where date with better performance.
     * @param string $column
     * @param string $value format Y-m-d
     * @return $this
     */
    public function whereOnDate ($column, $value)
    {
        $this->where($column, '>=', date('Y-m-d 00:00:00', strtotime($value)));
        $this->where($column, '<', date('Y-m-d 00:00:00', strtotime("{$value} +1 days")));

        return $this;
    }
}