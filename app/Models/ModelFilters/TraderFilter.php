<?php 

namespace App\Models\ModelFilters;

use EloquentFilter\ModelFilter;

class TraderFilter extends ModelFilter
{
    /**
    * Related Models that have ModelFilters as well as the method on the ModelFilter
    * As [relationMethod => [input_key1, input_key2]].
    *
    * @var array
    */
    public $relations = [];

    public function name($name)
    {
        return $this->where('name', 'LIKE', "%$name%");
    }

    public function regionId($regionId)
    {
        return $this->where('region_id', $regionId);
    }

    public function phone($phone)
    {
        return $this->where('phone', $phone);
    }

    public function moneyIndebtedness($moneyIndebtedness)
    {
        return $this->where('money_indebtedness', $moneyIndebtedness);
    }

    public function boxesIndebtedness($boxesIndebtedness)
    {
        return $this->where('boxes_indebtedness', $boxesIndebtedness);
    }
}
