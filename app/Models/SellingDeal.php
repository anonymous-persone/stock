<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $trader_id
 * @property int $boxes_count
 * @property float $boxe_price
 * @property float $total_paid
 * @property float $bets
 * @property string $created_at
 * @property string $updated_at
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
    protected $fillable = ['trader_id', 'boxes_count', 'boxe_price', 'total_paid', 'bets', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function trader()
    {
        return $this->belongsTo('App\Models\Trader');
    }
}
