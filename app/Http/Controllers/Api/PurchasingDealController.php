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
    public function index()
    {
        $purchasingDeals = PurchasingDeal::paginate(config('custom.items_per_page'));

        return PurchasingDealResource::collection($purchasingDeals);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PurchasingDealRequest $request)
    {
        $purchasingDeal = PurchasingDeal::create($request->only([
            'seller_name',
            'boxes_count',
        ]));

        return new PurchasingDealResource($purchasingDeal);
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
            'boxes_count',
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