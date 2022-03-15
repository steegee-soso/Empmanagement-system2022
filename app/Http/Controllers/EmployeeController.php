<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\Department;
use App\Models\Employee;
use Illuminate\Auth\Events\Validated;
use Illuminate\Support\Facades\Validator;


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

        $role= $request->role;
        $department= $request->department;
        $employee_desc= $request->desciption;
        $user_id = $request->user_id;
        $flag=true;

        $validator = Validator::make($request->all(),['job_role'=>'required|numeric',
        'email'=>'required|email','department'=>'required|numeric',
        'fullname'=>'required']);

        $errors = $validator->errors()->getMessages();
        $build_errors = "";

        if(!empty($errors)){
            foreach($errors as $key=>$error){
                 $errorMessage = $error[0];
                 $build_errors.="<li>$errorMessage</li>";
            }
            $flag=false;
            $jsonObject = $this->json_converter(array("Status"=>0,"message"=>"$build_errors", "StatusCode"=>"500"));
        }

        if($file=$request->file(('fileimage'))){
            $imgValidator=Validator::make(array("fileimage"=>$request->file('fileimage')), [
                'fileimage' => 'mimes:doc,pdf,docx,zip'
          ]);

          $errorsImg = $imgValidator->errors()->getMessages();

          if(!empty($errorsImg['fileimage'][0])){
              $jsonObject = $this->json_converter(array("Status"=>0, "message"=>$errorsImg['fileimage'][0], "StatusCode"=>500));
              $flag=false;
          }
          exit($jsonObject);
        }

        //test for multiple files upload record 

        if($flag){
            //save the ecord inti the db
        }
        //use switch case to handle the object

        print_r($errors);
        print_r($request->file());
        print_r($request->input());
        //write a middleware to handle the session invalidation 
    } 

    public function update() {}

    public function delete() {}

    public function  json_converter($object){
        return json_encode($object);
    }

    public function isFile_checksum($filename){
        $hashedFilename = md5($filename);
        return Employee::Where(['checksum_img'=>$filename])->count();
    }
    
}
