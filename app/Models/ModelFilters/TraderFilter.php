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
}