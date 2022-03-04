<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Adminmodel extends Model
{
    use HasFactory;

    /**
     * add fillable to this file
     * fIllables are fields needed to be filed 
     * by user/seeding
     */
     protected $table="adminmodels";
     public   $timestamps = false;
     protected $fillable =['name','firstname','lastname','username','password','status','role_id'];
}
