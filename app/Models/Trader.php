<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $region_id
 * @property string $name
 * @property string $phone
 * @property float $money_indebtedness
 * @property int $boxes_indebtedness
 * @property string $created_at
 * @property string $updated_at
 * @property Region $region
 * @property SellingDeal[] $sellingDeals
 */
class Trader extends Model
{
    use \EloquentFilter\Filterable;
    
    /**
     * The "type" of the auto-incrementing ID.
     * 
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['region_id', 'name', 'phone', 'money_indebtedness', 'boxes_indebtedness', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function region()
    {
        return $this->belongsTo('App\Models\Region');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function sellingDeals()
    {
        return $this->hasMany('App\Models\SellingDeal');
    }
}
