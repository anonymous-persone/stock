<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Container;
use App\Http\Requests\ContainerRequest;
use App\Http\Resources\ContainerResource;

class ContainerController extends Controller
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

        $containers = Container::filter($request->all())->paginate(config('custom.items_per_page'));

        return ContainerResource::collection($containers);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ContainerRequest $request)
    {
        $container = Container::create($request->only([
            'title_en',
            'title_ar',
        ]));

        return new ContainerResource($container);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $container = Container::find($id);

        if (!$container)
            return entityNotFound();

        return new ContainerResource($container);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ContainerRequest $request, $id)
    {
        $container = Container::find($id);

        if (!$container)
            return entityNotFound();

        $container->update($request->only([
            'title_en',
            'title_ar',
        ]));

        return new ContainerResource($container);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $container = Container::find($id);

        if (!$container)
            return entityNotFound();

        $container->delete();

        return new ContainerResource($container);
    }
}
