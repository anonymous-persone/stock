<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Subregion;
use App\Http\Requests\SubregionRequest;
use App\Http\Resources\SubregionResource;

class SubregionController extends Controller
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
            'region_id' => 'exists:regions,id',
        ]);

        $subregions = Subregion::filter($request->all())
                                ->paginate(config('custom.items_per_page'))
                                ->sortByDesc('money_indebtedness');

        return SubregionResource::collection($subregions);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SubregionRequest $request)
    {
        $subregion = Subregion::create($request->only([
            'region_id',
            'title_en',
            'title_ar',
        ]));

        return new SubregionResource($subregion);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $subregion = Subregion::find($id);

        if (!$subregion)
            return entityNotFound();

        return new SubregionResource($subregion);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SubregionRequest $request, $id)
    {
        $subregion = Subregion::find($id);

        if (!$subregion)
            return entityNotFound();

        $subregion->update($request->only([
            'region_id',
            'title_en',
            'title_ar',
        ]));

        return new SubregionResource($subregion);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $subregion = Subregion::find($id);

        if (!$subregion)
            return entityNotFound();

        $subregion->delete();

        return new SubregionResource($subregion);
    }
}
