<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Content;
use App\Http\Requests\ContentRequest;
use App\Http\Resources\ContentResource;

class ContentController extends Controller
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

        $contents = Content::filter($request->all())->paginate(config('custom.items_per_page'));

        return ContentResource::collection($contents);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ContentRequest $request)
    {
        $content = Content::create($request->only([
            'title_en',
            'title_ar',
        ]));

        return new ContentResource($content);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $content = Content::find($id);

        if (!$content)
            return entityNotFound();

        return new ContentResource($content);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ContentRequest $request, $id)
    {
        $content = Content::find($id);

        if (!$content)
            return entityNotFound();

        $content->update($request->only([
            'title_en',
            'title_ar',
        ]));

        return new ContentResource($content);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $content = Content::find($id);

        if (!$content)
            return entityNotFound();

        $content->delete();

        return new ContentResource($content);
    }
}
