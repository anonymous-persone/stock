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

    public function containerId($containerId)
    {
        return $this->where('container_id', $containerId);
    }

    public function contentId($contentId)
    {
        return $this->where('content_id', $contentId);
    }

    public function totalContainers($totalContainers)
    {
        return $this->where('total_containers', $totalContainers);
    }

    public function remainingContainers($remainingContainers)
    {
        return $this->where('remaining_containers', $remainingContainers);
    }

    public function createdAt($createdAt)
    {
        return $this->whereDate('created_at', $createdAt);
    }

    public function order($order)
    {
        return $this->orderBy('created_at', $order);
    }
}
