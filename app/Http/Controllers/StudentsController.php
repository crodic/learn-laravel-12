<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateStudentsRequest;
use App\Models\Classes;
use App\Models\Students;
use Illuminate\Http\Request;

class StudentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($classId)
    {
        $class = Classes::find($classId);
        return view("students.create", compact("class"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateStudentsRequest $request)
    {
        $student = Students::create($request->except('_token'));
        $classId = $student->classes_id;

        return redirect()->route("classes.show", ["id" => $classId]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $student = Students::find($id);
        $class = Classes::find($student->classes_id);
        return view("students.edit", compact("class", "student"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CreateStudentsRequest $request, string $id)
    {
        $student = Students::find($id);
        $student->update($request->all());

        return redirect()->route("classes.show", ["id" => $student->classes_id])->with(["message" => "Cập nhật thành công"]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $student = Students::find($id);
        $class = $student->classes_id;
        Students::destroy($student->id);
        return redirect()->route("classes.show", ["id" => $class]);
    }
}