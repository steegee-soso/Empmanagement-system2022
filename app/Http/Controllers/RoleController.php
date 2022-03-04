<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RoleController extends Controller
{

    public function __construct()
    {
    }

    public function index(){
        return view('role');
    }

    public function create(Request $request){}

    public function store() {}

    public function update() {}

    public function delete() {}
}
