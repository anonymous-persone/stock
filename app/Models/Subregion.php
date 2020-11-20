<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $region_id
 * @property string $title_en
 * @property string $title_ar
 * @property string $created_at
 * @property string $updated_at
 * @property Region $region
 * @property Trader[] $traders
 */
class Subregion extends Model
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
    protected $fillable = ['region_id', 'title_en', 'title_ar', 'created_at', 'updated_at'];

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
    public function traders()
    {
        return $this->hasMany('App\Models\Trader');
    }

    protected $appends = ['money_indebtedness', 'container_indebtedness',];
    
    public function getMoneyIndebtednessAttribute()
    {
        return  $this->traders()->get()
                ->transform(function($trader, $key){
                    return $trader->money_indebtedness;
                })->sum();
    }

    public function getContainerIndebtednessAttribute()
    {
        $results =  $this->join('traders', 'subregions.id', 'traders.subregion_id')
                        ->join('container_traders', 'traders.id', 'container_traders.trader_id')
                        ->Join('containers', 'containers.id', 'container_traders.container_id')
                        ->where('subregions.id', $this->id)
                        ->groupBy('container_traders.container_id', 'containers.title_en', 'containers.title_ar')
                        ->select(
                            \DB::raw('sum(container_traders.container_indebtedness) as total_container_indebtedness'),
                            'container_traders.container_id', 'containers.title_en', 'containers.title_ar'
                        )
                        ->get()->makeHidden(['container_indebtedness', 'money_indebtedness']);
        return  [
                    'results' => $results,
                    'total_container_indebtedness' => $results->sum('total_container_indebtedness')
                ];
    }
}
