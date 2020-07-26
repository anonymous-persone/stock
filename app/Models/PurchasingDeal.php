<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $seller_name
 * @property int $boxes_count
 * @property string $created_at
 * @property string $updated_at
 */
class PurchasingDeal extends Model
{
    /**
     * The "type" of the auto-incrementing ID.
     * 
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['seller_name', 'boxes_count', 'created_at', 'updated_at'];

}
