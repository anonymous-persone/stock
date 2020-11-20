<?php 

namespace App\Models\ModelFilters;

use EloquentFilter\ModelFilter;

class SubregionFilter extends ModelFilter
{
    /**
    * Related Models that have ModelFilters as well as the method on the ModelFilter
    * As [relationMethod => [input_key1, input_key2]].
    *
    * @var array
    */
    public $relations = [];

    protected $drop_id = false;

    public function titleEn($titleEn)
    {
        return $this->where('title_en', 'LIKE', "%$titleEn%");
    }

    public function titleAr($titleAr)
    {
        return $this->where('title_ar', 'LIKE', "%$titleAr%");
    }

    public function regionId($regionId)
    {
        return $this->where('region_id', $regionId);
    }
}
