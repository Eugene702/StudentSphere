<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;
use App\Models\StudentModel;
use Illuminate\Http\Request;
use Inertia\Inertia;

class HomeController extends Controller
{
    public function index(){
        $student = StudentModel::all();
        return Inertia::render("home/index", [
            "student" => $student
        ]);
    }

    public function store(StoreStudentRequest $request){
        StudentModel::create($request->all());
        return to_route("home.index");
    }

    public function delete($id){
        StudentModel::find($id)->delete();
        return to_route("home.index");
    }

    public function update(UpdateStudentRequest $request, $id){
        StudentModel::find($id)->update($request->all());
        return to_route("home.index");
    }
}
