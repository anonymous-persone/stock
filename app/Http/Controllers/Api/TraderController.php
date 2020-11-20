<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Trader;
use App\Http\Requests\TraderRequest;
use App\Http\Resources\TraderResource;

class TraderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $request->validate([
            'name' => 'string|max:255',
            'subregion_id' => 'exists:subregions,id',
            'region_id' => 'exists:regions,id',
            'phone' => 'digits:11',
            'money_indebtedness' => 'numeric|min:0',
            'overdue_indebtedness' => 'integer|min:0',
        ]);

        $traders = Trader::filter($request->all())->orderBy('money_indebtedness', 'desc')->paginate(config('custom.items_per_page'));

        $overdueIndebtedness = $request->overdue_indebtedness;
        
        if ($overdueIndebtedness != null)
            $traders = $traders->filter(function($value, $key) use ($overdueIndebtedness) {
                return $value->overdue_indebtedness >= $overdueIndebtedness;
            });

        /*$request->overdue_indebtedness == null ?: $traders = $this->overdueIndebtedness($traders, $request->overdue_indebtedness);*/

        return TraderResource::collection($traders);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TraderRequest $request)
    {
        $trader = Trader::create($request->only([
            'subregion_id',
            'name',
            'phone',
            'money_indebtedness',
        ]));
        $trader->containers()->sync($request->containers);

        return new TraderResource($trader);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $trader = Trader::find($id);

        if (!$trader)
            return entityNotFound();

        return new TraderResource($trader);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TraderRequest $request, $id)
    {
        $trader = Trader::find($id);

        if (!$trader)
            return entityNotFound();

        $trader->update($request->only([
            'subregion_id',
            'name',
            'phone',
            'money_indebtedness',
        ]));
        $trader->containers()->sync($request->containers);

        return new TraderResource($trader);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $trader = Trader::find($id);

        if (!$trader)
            return entityNotFound();

        $trader->delete();

        return new TraderResource($trader);
    }

    /*public function overdueIndebtedness($traders, $overdueIndebtedness)
    {
        return $traders->filter(function($value, $key) use ($overdueIndebtedness) {
            $sellingDeal = $value->sellingDeals->last();
            $collectingDeal = $value->collectingDeals->last();

            return $sellingDeal && $collectingDeal ?
                    $sellingDeal->created_at->diffInDays(
                        $collectingDeal->created_at
                    ) == $overdueIndebtedness : 0;
        });
    }*/
}
