<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\CollectingDeal;
use App\Http\Requests\CollectingDealRequest;
use App\Http\Resources\CollectingDealResource;

class CollectingDealController extends Controller
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
            'container_indebtedness_before' => 'integer|min:0',
            'container_indebtedness_after' => 'integer|min:0',
            'container_count' => 'integer|min:0',
            'paid' => 'numeric|min:0',
            'money_indebtedness_before' => 'numeric|min:0',
            'money_indebtedness_after' => 'numeric|min:0',
            'created_at' => 'date:Y-m-d',
        ]);

        $collectingDeals = CollectingDeal::filter($request->all())->paginate(config('custom.items_per_page'));

        return CollectingDealResource::collection($collectingDeals);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CollectingDealRequest $request)
    {
        $collectingDeal = CollectingDeal::create($request->only([
            'trader_id',
            'container_id',
            'container_indebtedness_before',
            'container_count',
            'container_indebtedness_after',
            'money_indebtedness_before',
            'paid',
            'money_indebtedness_after',
        ]));

        $collectingDeal->trader->calcIndebtednesses($request->paid, $request->container_count, $request->container_id, '-');

        return new CollectingDealResource($collectingDeal);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $collectingDeal = CollectingDeal::find($id);

        if (!$collectingDeal)
            return entityNotFound();

        return new CollectingDealResource($collectingDeal);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CollectingDealRequest $request, $id)
    {
        $collectingDeal = CollectingDeal::find($id);
        $collectingDealCopy = clone $collectingDeal;

        if (!$collectingDeal)
            return entityNotFound();

        $collectingDeal->trader->calcIndebtednesses($collectingDeal->paid, $collectingDeal->container_count, $collectingDeal->container_id, '+');
        
        $collectingDealCopy->update($request->only([
            'trader_id',
            'container_id',
            'container_indebtedness_before',
            'container_count',
            'container_indebtedness_after',
            'money_indebtedness_before',
            'paid',
            'money_indebtedness_after',
        ]));

        $collectingDealCopy->trader->calcIndebtednesses($request->paid, $request->container_count, $request->container_id, '-');

        return new CollectingDealResource($collectingDealCopy);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $collectingDeal = CollectingDeal::find($id);

        if (!$collectingDeal)
            return entityNotFound();

        $collectingDeal->trader->calcIndebtednesses($collectingDeal->paid, $collectingDeal->boxes_count, '+');
        
        $collectingDeal->delete();

        return new CollectingDealResource($collectingDeal);
    }
}
