<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateClassesRequest;
use App\Models\Classes;
use App\Models\Students;
use Illuminate\Http\Request;

class ClassesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $classes = Classes::all();

        return view("home", compact("classes"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateClassesRequest $request)
    {
        Classes::create($request->all());
        return redirect()->route("classes.home")->with(["message" => "Tạo lớp học thành công"]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $class = Classes::find($id);
        $students = $class->students;
        return view("class", compact("class", "students"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $class = Classes::find($id);
        return view("edit", compact("class"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CreateClassesRequest $request, string $id)
    {
        $class = Classes::findOrFail($id); // đây là instance
        $class->update($request->all());
        return redirect()->route("classes.home")->with(["message" => "Cập nhật lớp thành công"]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $class = Classes::find($id);
        if(!$class) {
            return redirect()->route("classes.home")->withErrors(["not_found" => "Lớp không tồn tại"]);
        }
        if(count($class->students) > 0){
            return redirect()->route("classes.home")->withErrors(["has_student" => "Không thể xoá lớp này"]);
        }

        Classes::destroy($id);

        return redirect()->route("classes.home")->with(["message" => "Xoá lớp thành công"]);
    }
}