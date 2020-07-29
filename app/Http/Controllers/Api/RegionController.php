<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Region;
use App\Http\Requests\RegionRequest;
use App\Http\Resources\RegionResource;

class RegionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $request->validate([
            'title_en' => 'string|min:5',
            'title_ar' => 'string|min:5',
        ]);

        $regions = Region::filter($request->all())->paginate(config('custom.items_per_page'));

        return RegionResource::collection($regions);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RegionRequest $request)
    {
        $region = Region::create($request->only([
            'title_en',
            'title_ar',
        ]));

        return new RegionResource($region);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $region = Region::find($id);

        if (!$region)
            return entityNotFound();

        return new RegionResource($region);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RegionRequest $request, $id)
    {
        $region = Region::find($id);

        if (!$region)
            return entityNotFound();

        $region->update($request->only([
            'title_en',
            'title_ar',
        ]));

        return new RegionResource($region);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $region = Region::find($id);

        if (!$region)
            return entityNotFound();

        $region->delete();

        return new RegionResource($region);
    }
}
