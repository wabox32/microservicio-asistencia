<?php

namespace App\Http\Controllers;

use App\Http\Requests\AssistRequest;
use App\Models\Assist;
use App\Traits\ApiResponser;
use Illuminate\Http\Response;

class AssistController extends Controller
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

    public function index($code)
    {
        $assits = Assist::where('code_user',$code)->get();
        return $this->successResponse($assits);
    }

    public function store(AssistRequest $request)
    {
        $request->all();
        $assist = new Assist();
        $assist->lounge_id      = $request->lounge_id;
        $assist->matter_id      = $request->matter_id;
        $assist->studient_id    = $request->studient_id;
        $assist->code_user      = $request->code_user;
        $assist->admission_date = date('Y-m-d H:i:s');
        $assist->departure_date = date('Y-m-d H:i:s');
        $assist->save();

        return $this->successResponse($assist, Response::HTTP_CREATED);
    }

}
