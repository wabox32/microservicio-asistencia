<?php

namespace App\Http\Controllers;

use App\Http\Requests\StudentRequest;
use App\Models\Student;
use Illuminate\Http\Request;
use App\Traits\ApiResponser;
use Illuminate\Http\Response;

class StudentController extends Controller
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
        $studients = Student::all();
        return $this->successResponse($studients);
    }

    public function show($student)
    {
        $student = Student::findOrFail($student);
        return $this->successResponse($student);
    }


    public function store(StudentRequest $request)
    {
        $item = Student::create($request->all());
        return $this->successResponse($item, Response::HTTP_CREATED);
    }


    public function update(StudentRequest $request, $student)
    {
        $model = Student::findOrFail($student);
        $model->fill($request->all());
        $model->save();
        return $this->successResponse($request->all(), Response::HTTP_CREATED);

    }

    public function delete($student)
    {
        $student = Student::findOrFail($student);
        $student->delete();
        return $this->successResponse($student);
    }
}
