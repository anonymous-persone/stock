<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\PurchasingDeal;
use App\Http\Requests\PurchasingDealRequest;
use App\Http\Resources\PurchasingDealResource;

class PurchasingDealController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $request->validate([
            'seller_name' => 'string|max:255',
            'container_id' => 'exists:containers,id',
            'content_id' => 'exists:contents,id',
            'total_containers' => 'integer|min:0',
            'remaining_containers' => 'integer|min:0',
            'created_at' => 'date:Y-m-d',
            'order' => 'in:desc,asc',
        ]);

        $purchasingDeals = PurchasingDeal::filter($request->all())->paginate(config('custom.items_per_page'))->groupBy('car_number')
        ->mapToGroups(function($v, $k){
            return [ ['car_number' => $k, 'data' => $v] ];
        });

        return PurchasingDealResource::collection($purchasingDeals);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PurchasingDealRequest $request, PurchasingDeal $purchasingDeal)
    {
        $lastCar = $purchasingDeal->orderBy('created_at', 'desc')->first();
        $carNumber = $lastCar ? ++$lastCar->car_number : 1;
        
        foreach ($request->data as $key => $value) {
            $value['car_number'] = $carNumber;
            $results[] = PurchasingDeal::firstOrCreate([
                    ['container_id', $value['container_id']],
                    ['content_id', $value['content_id']],
                    ['remaining_containers', '!=', 0],
                ], $value);
        }

        return new PurchasingDealResource($results);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $purchasingDeal = PurchasingDeal::find($id);

        if (!$purchasingDeal)
            return entityNotFound();

        return new PurchasingDealResource($purchasingDeal);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PurchasingDealRequest $request, $id)
    {
        $purchasingDeal = PurchasingDeal::find($id);

        if (!$purchasingDeal)
            return entityNotFound();

        $purchasingDeal->update($request->only([
            'seller_name',
            'container_id',
            'content_id',
            'total_containers',
            'remaining_containers',
        ]));

        return new PurchasingDealResource($purchasingDeal);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $purchasingDeal = PurchasingDeal::find($id);

        if (!$purchasingDeal)
            return entityNotFound();

        $purchasingDeal->delete();

        return new PurchasingDealResource($purchasingDeal);
    }
}
