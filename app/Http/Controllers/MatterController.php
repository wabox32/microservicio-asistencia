<?php

namespace App\Http\Controllers;

use App\Http\Requests\MatterRequest;
use App\Models\Matter;
use App\Traits\ApiResponser;
use Illuminate\Http\Response;

class MatterController extends Controller
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
        $matters = Matter::all();
        return $this->successResponse($matters);
    }

    public function show($matter)
    {
        $matter = Matter::findOrFail($matter);
        return $this->successResponse($matter);
    }


    public function store(MatterRequest $request)
    {
        $item = Matter::create($request->all());
        return $this->successResponse($item, Response::HTTP_CREATED);
    }


    public function update(MatterRequest $request, $matter)
    {
        $model = Matter::findOrFail($matter);
        $model->fill($request->all());
        $model->save();
        return $this->successResponse($request->all(), Response::HTTP_CREATED);

    }

    public function delete($matter)
    {
        $matter = Matter::findOrFail($matter);
        $matter->delete();
        return $this->successResponse($matter);
    }
}
