<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Adminmodel;
use App\Models\AdminGenericModele;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Str;


class AdminController extends Controller
{
    private $flag=false;

    public function index(){
        return view('index');
    }

    public function login(){
        return view('login');
    }

    public function submit_login(Request $request){

        $request->validate(['username'=>'required','password'=>'required']);
        $username=$request->username;
        $password = $request->password;

        $user_exists=Adminmodel::where(['username'=>$username, 'password'=>$password])->count();

        if($user_exists > 0){
            $user_data= AdminGenericModele::fetch_user_details($username, $password);
            $fetch_firstname=$username;
            $fetched_lastname=$password;
            $array_data=json_encode([$fetch_firstname, $fetched_lastname]);
            Session(['userdata',$array_data]);
            return redirect('/admin');
        }
        else{
            return redirect('admin/login')->with('msg','Invalid username/password');
        }
    }

    public function register_user(Request $request){
        return view('register');
    }

    public function register(Request $request){

        $request->validate(['username'=>"required|max:70|min:5",
        'password'=>'required|max:20|min:8|confirmed',
        'firstname'=>'required|max:50|min:2',
        'lastname'=>'required|max:50|min:2',
        'password_confirmation'=>'required|max:20|min:8']);

        $user_exist= Adminmodel::where(['username'=>$request->username])->count();

        if($user_exist > 0){
            $this->flag=true;
            return redirect('admin/register')->with('errormsg','Username already exists.Provide a unique username');
        }

        $uuid = Str::uuid()->toString();

        $add_user = Adminmodel::create(['uuid'=>$uuid, 
        'firstname'=>$request->firstname,
        'lastname'=>$request->lastname,
        'username'=>$request->username,
        'password'=>bcrypt($request->password)])->id;

        if($add_user > 0){
            return redirect('admin/register')->with('success', 'User has been created successfully');
        }
        else{
            return redirect('admin/register')->with('errormsg', 'Oops error, User account creation failed.Try again');
        }
    }

    public function user_activation(Request $request){

    }

    public function logout(Request $request){

        if(isset($_SESSION)){
            $request->session()->invalidate();
        }
        return redirect('admin/login');
    }
}
