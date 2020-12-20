<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $container_id
 * @property integer $content_id
 * @property string $seller_name
 * @property int $total_containers
 * @property int $remaining_containers
 * @property string $created_at
 * @property string $updated_at
 * @property Container $container
 * @property Content $content
 */
class PurchasingDeal extends Model
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
    protected $fillable = ['car_number', 'container_id', 'content_id', 'seller_name', 'total_containers', 'remaining_containers', 'created_at', 'updated_at'];

    protected $with = ['container', 'content'];
    
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

    public function subtractRemainingContainers($containersCount)
    {
        $this->remaining_containers -= $containersCount;

        if ($this->remaining_containers < 0) 
            $this->remaining_containers = 0;
        
        $this->save();
    }
}
