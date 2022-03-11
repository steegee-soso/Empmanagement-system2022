<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Role;
use App\Models\Department;

class EmployeeController extends Controller
{
    private $arrayObject=[];

    public function __construct(){}

    public function index() {
        $roles = Role::all();
        $departmemt = Department::all();
        $arrayObject = array('role'=>$roles, 'department'=>$departmemt);
        return view('employee', $arrayObject);
    }

    public function create(Request $request) {
        print_r($request->input());
        print_r($request->file());
    } 

    public function update() {}

    public function delete() {}
    

}
