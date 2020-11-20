<?php 

namespace App\Models\ModelFilters;

use EloquentFilter\ModelFilter;

class CollectingDealFilter extends ModelFilter
{
    /**
    * Related Models that have ModelFilters as well as the method on the ModelFilter
    * As [relationMethod => [input_key1, input_key2]].
    *
    * @var array
    */
    public $relations = [];

    protected $drop_id = false;

    public function traderId($traderId)
    {
        return $this->where('trader_id', $traderId);
    }

    public function containerId($containerId)
    {
        return $this->where('container_id', $containerId);
    }

    public function containerCount($containerCount)
    {
        return $this->where('container_count', $containerCount);
    }

    public function paid($paid)
    {
        return $this->where('paid', $paid);
    }

    public function createdAt($createdAt)
    {
        return $this->whereDate('created_at', $createdAt);
    }
}
