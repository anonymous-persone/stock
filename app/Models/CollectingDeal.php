<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $trader_id
 * @property integer $container_id
 * @property int $container_indebtedness_before
 * @property int $container_count
 * @property int $container_indebtedness_after
 * @property float $money_indebtedness_before
 * @property float $paid
 * @property float $money_indebtedness_after
 * @property string $created_at
 * @property string $updated_at
 * @property Container $container
 * @property Trader $trader
 */
class CollectingDeal extends Model
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
    protected $fillable = ['trader_id', 'container_id', 'container_indebtedness_before', 'container_count', 'container_indebtedness_after', 'money_indebtedness_before', 'paid', 'money_indebtedness_after', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function container()
    {
        return $this->belongsTo('App\Models\Container');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function trader()
    {
        return $this->belongsTo('App\Models\Trader');
    }
}
