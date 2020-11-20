<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $title_en
 * @property string $title_ar
 * @property string $created_at
 * @property string $updated_at
 * @property Subregion[] $subregions
 */
class Region extends Model
{
    use \EloquentFilter\Filterable;
    
    public static $selledAt;

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
    public function subregions()
    {
        return $this->hasMany('App\Models\Subregion');
    }

    // customization

    protected $appends = ['money_indebtedness', 'sold_out', /*'selling'*/];

    public function getMoneyIndebtednessAttribute()
    {
        return  $this->join('subregions', 'regions.id', 'subregions.region_id')
                        ->join('traders', 'subregions.id', 'traders.subregion_id')
                        ->where('regions.id', $this->id)
                        ->selectRaw('sum(traders.money_indebtedness) as total_money_indebtedness')
                        ->get()
                        ->sum('total_money_indebtedness');
        /*
            $queryResults = \DB::select("
                SELECT res.money_indebtedness

                FROM regions, subregions,

                (select traders.subregion_id, sum(traders.money_indebtedness) as money_indebtedness From traders Group by traders.subregion_id) as res

                WHERE regions.id = subregions.region_id and subregions.id = res.subregion_id and regions.id = $this->id

                ");
            
            return array_sum(array_column($queryResults, 'money_indebtedness'));
        */
    }
    
    public function getSoldOutAttribute()
    {
        $results = $this->join('subregions', 'regions.id', 'subregions.region_id')
                        ->join('traders', 'subregions.id', 'traders.subregion_id')
                        ->join('selling_deals', 'traders.id', 'selling_deals.trader_id')
                        ->join('containers', 'containers.id', 'selling_deals.container_id')
                        ->whereDate('selling_deals.created_at', self::$selledAt ?? date('Y-m-d'))
                        ->where('regions.id', $this->id)
                        ->groupBy(
                            'selling_deals.container_id',
                            'containers.id',
                            'containers.title_en',
                            'containers.title_ar'
                        )
                        ->select(
                                 \DB::raw('sum(selling_deals.container_count) as container_count'),
                                 \DB::raw('sum(selling_deals.total_containers_price) as total_containers_price'),
                                 'containers.id as container_id',
                                 'containers.title_en as container_title_en',
                                 'containers.title_ar as container_title_ar'
                        )
                        ->get()
                        ->makeHidden('sold_out');
        return  [
                    'results' => $results,
                    'container_count' => $results->sum('container_count'),
                    'total_containers_price' => $results->sum('total_containers_price'),
                ];
        /*
            $queryResults = \DB::select("
                SELECT res.boxes_sold_out
                FROM regions, subregions, traders, 

                (select selling_deals.trader_id, sum(selling_deals.boxes_count) as boxes_sold_out From selling_deals Group by selling_deals.trader_id) as res

                WHERE regions.id = subregions.region_id and subregions.id = traders.subregion_id and  traders.id = res.trader_id and regions.id = $this->id

                ");
            
            return array_sum(array_column($queryResults, 'boxes_sold_out'));*/

            /*dd($this->whereHas('subregions', function($query){
                return $query->whereHas('traders', function($query){
                    return $query->whereHas('sellingDeals', function($query){
                        return $query->sum('boxes_count');
                    });
                });
            })->get());
        */
    }

    public function getSellingAttribute()
    {
        $regions = $this->join('subregions', 'regions.id', 'subregions.region_id')
                        ->join('traders', 'subregions.id' ,'traders.subregion_id')
                        ->join('selling_deals', 'traders.id' ,'selling_deals.trader_id')
                        ->join('containers', 'containers.id', 'selling_deals.container_id')
                        ->whereDate('selling_deals.created_at', self::$selledAt ?? date('Y-m-d'))
                        ->where('regions.id', $this->id)
                        ->groupBy('selling_deals.container_id',
                                  'containers.id',
                                  'containers.title_en',
                                  'containers.title_ar'
                              )
                        ->selectRaw('sum(selling_deals.container_count) as container_count,
                                     sum(selling_deals.total_containers_price) as total_containers_price')
                        ->get();
                        // ->toSql();

        return [
            'container_count' => $regions->sum('container_count'),
            'total_containers_price' => $regions->sum('total_containers_price'),
        ];
    }

    /*
        'SELECT r1.*, res.* 
        FROM `regions`as r1, regions as r2, traders, 

        (select selling_deals.trader_id, sum(selling_deals.boxes_count) as boxes_count From selling_deals Group by selling_deals.trader_id) as res

        WHERE r1.id = r2.parent_id and r2.id = traders.region_id and  traders.id = res.trader_id and r1.`parent_id` IS null'
    */


    /*
        SELECT regions.*, res.* 
        FROM regions, subregions, traders, 

        (select selling_deals.trader_id, sum(selling_deals.boxes_count) as boxes_count From selling_deals Group by selling_deals.trader_id) as res

        WHERE regions.id = subregions.region_id and subregions.id = traders.subregion_id and  traders.id = res.trader_id and regions.id = 2
    */
}
