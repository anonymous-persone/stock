<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $subregion_id
 * @property string $name
 * @property string $phone
 * @property float $money_indebtedness
 * @property string $created_at
 * @property string $updated_at
 * @property Subregion $subregion
 * @property CollectingDeal[] $collectingDeals
 * @property ContainerTrader[] $containerTraders
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
    protected $fillable = ['subregion_id', 'name', 'phone', 'money_indebtedness', 'created_at', 'updated_at'];

    protected $hidden = ['sellingDeals', 'collectingDeals'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function subregion()
    {
        return $this->belongsTo('App\Models\Subregion');
    }

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
    public function containers()
    {
        return $this->belongsToMany('App\Models\Container', 'container_traders')
                    ->withPivot('container_indebtedness');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function sellingDeals()
    {
        return $this->hasMany('App\Models\SellingDeal');
    }

    // customization

    protected $appends = ['overdue_indebtedness'];

    public function getOverdueIndebtednessAttribute()
    {
        $sellingDeal = $this->sellingDeals()->orderBy('created_at', 'DESC')->first();
        $collectingDeal = $this->collectingDeals()->orderBy('created_at', 'DESC')->first();

        return $sellingDeal && $collectingDeal ?
                $sellingDeal->created_at->diffInDays(
                    $collectingDeal->created_at
                ) : 0;
    }

    public function calcIndebtednesses($moneyIndebtedness, $containerIndebtedness, $containerId, $operator = '+')
    {
        $containerTrader = $this->containers()->where('container_traders.container_id', $containerId)->first();

        switch($operator) {
            case "+":
                $this->money_indebtedness += $moneyIndebtedness;
                if ($containerTrader)
                    $this->containers()->updateExistingPivot(
                        $containerId,
                        [ 'container_traders.container_indebtedness' => $containerTrader->pivot->container_indebtedness + $containerIndebtedness]
                     );
                break;
            case "-":
                $this->money_indebtedness -= $moneyIndebtedness;
                if ($containerTrader)
                    $this->containers()->updateExistingPivot(
                        $containerId,
                        [ 'container_traders.container_indebtedness' => $containerTrader->pivot->container_indebtedness - $containerIndebtedness]
                     );
                break;
        }
        $this->save();
    }
}
