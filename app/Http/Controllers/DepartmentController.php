<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{

    public function __construct(){
    }

    public function index(){
        $departments= Department::orderBy('created_at','DESC')->get();
        return view('department',['data'=>$departments]);
    }

    public function create(Request $request){
        $request->validate(['required'=>'department', 'required'=>'status']);
        $isExistDepart = Department::where(['name'=>$request->name])->count();

        if($isExistDepart > 0){
            return redirect('admin/department')->with('errormsg','Department already exists.Provide a unique username');
        }
        
        $saveDepart = Department::create(['name'=>$request->department, 'status'=>$request->status])->id;

        if($saveDepart > 0){
            return redirect('admin/department')->with('success','Department already exists.Provide a unique username');
        }
        else{
            return redirect('admin/department')->with('errormsg','Department already exists.Provide a unique username');
        }
    }

    public function delete(){
    }

    public function update(){
    }
}
