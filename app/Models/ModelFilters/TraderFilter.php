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
    
    protected $drop_id = false;

    public function name($name)
    {
        return $this->where('name', 'LIKE', "%$name%");
    }

    public function subregionId($subregionId)
    {
        return $this->where('subregion_id', $subregionId);
    }

    public function regionId($regionId)
    {
        return $this->whereHas('subregion', function($query) use ($regionId) {
            return $query->where('region_id', $regionId);
        });
    }

    public function phone($phone)
    {
        return $this->where('phone', $phone);
    }

    public function moneyIndebtedness($moneyIndebtedness)
    {
        return $this->where('money_indebtedness', $moneyIndebtedness);
    }

    public function containersTitle($containersTitle)
    {
        return $this->whereHas('containers', function($query) use ($containersTitle) {
            return $query->where(function($query){
                    return $query->where('title_en', 'LIKE', "%$containersTitle%")
                        ->orWhere('title_ar', 'LIKE', "%$containersTitle%");
            });
        });
    }
}
