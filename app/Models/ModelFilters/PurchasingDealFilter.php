<?php 

namespace App\Models\ModelFilters;

use EloquentFilter\ModelFilter;

class PurchasingDealFilter extends ModelFilter
{
    /**
    * Related Models that have ModelFilters as well as the method on the ModelFilter
    * As [relationMethod => [input_key1, input_key2]].
    *
    * @var array
    */
    public $relations = [];

    public function sellerName($sellerName)
    {
        return $this->where('seller_name', 'LIKE', "%$sellerName%");
    }

    public function boxesCount($boxesCount)
    {
        return $this->where('boxes_count', $boxesCount);
    }

    public function createdAt($createdAt)
    {
        return $this->whereDate('created_at', $createdAt);
    }
}
