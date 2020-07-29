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


    public function traderId($traderId)
    {
        return $this->where('trader_id', $traderId);
    }

    public function boxesCount($boxesCount)
    {
        return $this->where('boxes_count', $boxesCount);
    }

    public function boxePrice($boxePrice)
    {
        return $this->where('boxe_price', $boxePrice);
    }

    public function totalPaid($totalPaid)
    {
        return $this->where('total_paid', $totalPaid);
    }

    public function bets($bets)
    {
        return $this->where('bets', $bets);
    }
}
