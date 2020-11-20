<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Region;
use App\Http\Requests\DashboardRequest;
use App\Http\Resources\DashboardResource;

class DashboardController extends Controller
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
            'parent_id' => 'exists:regions,id',
        ]);

        $regions = Region::filter($request->all())->paginate(config('custom.items_per_page'));

        return RegionResource::collection($regions);
    }
}
