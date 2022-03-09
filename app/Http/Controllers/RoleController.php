<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;
use Illuminate\Support\Facades\Log;
use Exception;

class RoleController extends Controller
{

    private $flag=false;

    public function __construct()
    {
    }

    public function index(){

        $results = Role::orderBy('failed_at', 'DESC')->get();
        return view('role', ['data'=>$results]);
    }

    public function create(Request $request){

        $role= $request->role;
        $status= $request->status;
        $request->validate(['role'=>'required', 'status'=>'required']);
        $isRoleExists=Role::where(['name'=>$role])->count();

        if($isRoleExists > 0){
            $this->flag=true;
            return redirect('admin/role')->with('errormsg','Role already exists.Provide a unique username');
        }

        $addRole = Role::create(['name'=>$role, 'status'=>$status])->id;
        
        if($addRole > 0){
            return redirect('admin/role')->with('success', 'Role has been created successfully');
        }
        else{
            return redirect('admin/role')->with('errormsg', 'Oops error, Role  creation failed.Try again');
        }
    }

    public function update() {}

    public function delete() {}
}
