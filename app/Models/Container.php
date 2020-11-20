<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $title_en
 * @property string $title_ar
 * @property string $created_at
 * @property string $updated_at
 * @property CollectingDeal[] $collectingDeals
 * @property ContainerTrader[] $containerTraders
 * @property PurchasingDeal[] $purchasingDeals
 * @property SellingDeal[] $sellingDeals
 */
class Container extends Model
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
    protected $fillable = ['title_en', 'title_ar', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function collectingDeals()
    {
        return $this->hasMany('App\Models\CollectingDeal');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function containerTraders()
    {
        return $this->hasMany('App\Models\ContainerTrader');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function purchasingDeals()
    {
        return $this->hasMany('App\Models\PurchasingDeal');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function sellingDeals()
    {
        return $this->hasMany('App\Models\SellingDeal');
    }
}
