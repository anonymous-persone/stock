<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\SellingDeal;
use App\Http\Requests\SellingDealRequest;
use App\Http\Resources\SellingDealResource;
use App\Models\PurchasingDeal;

class SellingDealController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $request->validate([
            'trader_id' => 'exists:traders,id',
            'container_id' => 'exists:containers,id',
            'content_id' => 'exists:contents,id',
            'container_count' => 'integer|min:0',
            'container_price' => 'numeric|min:0',
            'container_kilos' => 'numeric|min:0',
            'kilo_price' => 'numeric|min:0',
            'total_containers_price' => 'numeric|min:0',
            'total_paid' => 'numeric|min:0',
            'bets' => 'numeric|min:0',
            'created_at' => 'date:Y-m-d',
        ]);

        $sellingDeals = SellingDeal::filter($request->all())->paginate(config('custom.items_per_page'));

        return SellingDealResource::collection($sellingDeals);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SellingDealRequest $request)
    {
        $sellingDeal = SellingDeal::create($request->only([
            'trader_id',
            'container_id',
            'content_id',
            'container_count',
            'container_price',
            'container_kilos',
            'kilo_price',
            'total_containers_price',
            'total_paid',
            'total_unpaid',
            'bets',
        ]));

        $sellingDeal->trader->calcIndebtednesses($request->total_unpaid, $request->container_count, $request->container_id, '+');

        PurchasingDeal::where('container_id', $request->container_id)
                        ->where('content_id', $request->content_id)
                        ->latest('created_at')
                        ->first()
                        ->subtractRemainingContainers($request->container_count);

        return new SellingDealResource($sellingDeal);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $sellingDeal = SellingDeal::find($id);

        if (!$sellingDeal)
            return entityNotFound();

        return new SellingDealResource($sellingDeal);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SellingDealRequest $request, $id)
    {
        $sellingDeal = SellingDeal::find($id);

        if (!$sellingDeal)
            return entityNotFound();

        $sellingDeal->update($request->only([
            'trader_id',
            'container_id',
            'content_id',
            'container_count',
            'container_price',
            'container_kilos',
            'kilo_price',
            'total_containers_price',
            'total_paid',
            'total_unpaid',
            'bets',
        ]));

        return new SellingDealResource($sellingDeal);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sellingDeal = SellingDeal::find($id);

        if (!$sellingDeal)
            return entityNotFound();

        $sellingDeal->delete();

        return new SellingDealResource($sellingDeal);
    }
}
