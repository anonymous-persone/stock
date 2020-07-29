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
            'region_id' => 'exists:regions,id',
            'phone' => 'digits:11',
            'money_indebtedness' => 'numeric|min:0',
            'boxes_indebtedness' => 'integer|min:0',
        ]);

        $traders = Trader::filter($request->all())->paginate(config('custom.items_per_page'));

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
            'region_id',
            'name',
            'phone',
            'money_indebtedness',
            'boxes_indebtedness',
        ]));

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
            'region_id',
            'name',
            'phone',
            'money_indebtedness',
            'boxes_indebtedness',
        ]));

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
}
