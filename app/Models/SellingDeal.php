<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $trader_id
 * @property integer $container_id
 * @property integer $content_id
 * @property int $container_count
 * @property float $container_price
 * @property int $container_kilos
 * @property float $kilo_price
 * @property float $total_containers_price
 * @property float $total_paid
 * @property float $total_unpaid
 * @property float $bets
 * @property string $created_at
 * @property string $updated_at
 * @property Container $container
 * @property Content $content
 * @property Trader $trader
 */
class SellingDeal extends Model
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
    protected $fillable = ['trader_id', 'container_id', 'content_id', 'container_count', 'container_price', 'container_kilos', 'kilo_price', 'total_containers_price', 'total_paid', 'total_unpaid', 'bets', 'created_at', 'updated_at'];

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
    public function content()
    {
        return $this->belongsTo('App\Models\Content');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function trader()
    {
        return $this->belongsTo('App\Models\Trader');
    }
}
