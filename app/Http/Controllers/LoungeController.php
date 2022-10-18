<?php

namespace App\Http\Controllers;

use App\Http\Requests\CampuRequest;
use App\Http\Requests\LoungeRequest;
use App\Models\Campu;
use App\Models\Lounge;
use App\Traits\ApiResponser;
use Illuminate\Http\Response;

class LoungeController extends Controller
{
    use ApiResponser;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }


    public function index()
    {
        $lounges = Lounge::all();
        return $this->successResponse($lounges);
    }

    public function show($lounges)
    {
        $lounge = Campu::findOrFail($lounges);
        return $this->successResponse($lounge);
    }


    public function store(LoungeRequest $request)
    {
        $item = Lounge::create($request->all());
        return $this->successResponse($item, Response::HTTP_CREATED);
    }


    public function update(LoungeRequest $request, $lounges)
    {
        $model = Lounge::findOrFail($lounges);
        $model->fill($request->all());
        $model->save();
        return $this->successResponse($request->all(), Response::HTTP_CREATED);

    }

    public function delete($lounges)
    {
        $lounges = Lounge::findOrFail($lounges);
        $lounges->delete();
        return $this->successResponse($lounges);
    }
}
