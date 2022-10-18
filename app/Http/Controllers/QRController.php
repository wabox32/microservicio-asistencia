<?php

namespace App\Http\Controllers;

use App\Http\Requests\AssistRequest;
use App\Models\Assist;
use App\Traits\ApiResponser;
use Illuminate\Http\Response;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class QRController extends Controller
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

        $qr = '';
        $qr .= 'Lounge: '.$request->lounge_id;
        $qr .= ' Matter: '.$request->matter_id;
        $qr .= ' Student: '.$request->student_id;
        $qr .= ' Code: '.$request->code_user;

        $file = base64_encode(QrCode::format('png')
            ->errorCorrection('Q')
            ->size(220)
            ->generate($qr));


        return $this->successResponse(['qr' => $qr], Response::HTTP_CREATED);
    }

}
