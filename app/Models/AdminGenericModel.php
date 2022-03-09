<?php 

namespace App\Models;

use Exception;
use Illuminate\Log\Logger;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class AdminGenericModele{

    private static $error_message;

    public static function fetch_user_details($username, $password){

        $result =null;

        try{
            $result=DB::select("Select * from adminmodels where username=? AND password=? LIMIT 1 ",[$username, $password]);
        }
        catch(Exception $ex){
             $error_message = $ex->getMessage();
             Log::critical($error_message);
        }
        return $result;
    }

    public static function register_user($uuid,$first_name, $last_name, $username, $password){

        $result = null;

        try{
        }
        catch(Exception $ex){
            $error_message = $ex->getMessage();
            Log::critical($error_message);
        }
        return $result;
    }

    public static function auth_logs($user_id, $username, $payload){
    }

    public static function update_user_details($first_name, $last_name, $username, $password, $id){}

    public static function delete_user($id){
        
    }

}

