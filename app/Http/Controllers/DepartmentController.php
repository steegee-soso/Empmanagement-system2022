<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    
    public function __construct()
    {}

    public function index(){
        return view('department');
    }

    public function store(){
    }

    public function create(){
    }

    public function delete(){
    }

    public function update(){
    }
}
