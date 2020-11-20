<?php 

namespace App\Models\ModelFilters;

use EloquentFilter\ModelFilter;

class SellingDealFilter extends ModelFilter
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

    public function contentId($contentId)
    {
        return $this->where('content_id', $contentId);
    }

    public function containerCount($containerCount)
    {
        return $this->where('container_count', $containerCount);
    }

    public function containerPrice($containerPrice)
    {
        return $this->where('container_price', $containerPrice);
    }

    public function containerKilos($containerKilos)
    {
        return $this->where('container_kilos', $containerKilos);
    }

    public function kiloPrice($kiloPrice)
    {
        return $this->where('kilo_price', $kiloPrice);
    }

    public function totalPaid($totalPaid)
    {
        return $this->where('total_paid', $totalPaid);
    }

    public function bets($bets)
    {
        return $this->where('bets', $bets);
    }

    public function createdAt($createdAt)
    {
        return $this->whereDate('created_at', $createdAt);
    }
}
