<?php

namespace App\Http\Controllers;

use App\Http\Requests\CampuRequest;
use App\Models\Campu;
use App\Traits\ApiResponser;
use Illuminate\Http\Response;

class CampuController extends Controller
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
        $campus = Campu::all();
        return $this->successResponse($campus);
    }

    public function show($campus)
    {
        $campu = Campu::findOrFail($campus);
        return $this->successResponse($campu);
    }


    public function store(CampuRequest $request)
    {
        $item = Campu::create($request->all());
        return $this->successResponse($item, Response::HTTP_CREATED);
    }


    public function update(CampuRequest $request, $campus)
    {
        $model = Campu::findOrFail($campus);
        $model->fill($request->all());
        $model->save();
        return $this->successResponse($request->all(), Response::HTTP_CREATED);

    }

    public function delete($campus)
    {
        $campus = Campu::findOrFail($campus);
        $campus->delete();
        return $this->successResponse($campus);
    }
}
