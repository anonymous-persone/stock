<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\SellingDeal;
use App\Http\Requests\SellingDealRequest;
use App\Http\Resources\SellingDealResource;

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
            'boxes_count' => 'integer|min:0',
            'boxe_price' => 'numeric|min:0',
            'total_paid' => 'numeric|min:0',
            'bets' => 'numeric|min:0',
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
            'boxes_count',
            'boxe_price',
            'total_paid',
            'bets',
        ]));

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
            'boxes_count',
            'boxe_price',
            'total_paid',
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
