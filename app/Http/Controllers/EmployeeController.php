<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmployeeController extends Controller
{

    public function __construct(){}

    public function index() {
        return view('employee');
    }

    public function store() {}

    public function create() {}

    public function update() {}

    public function delete() {}

}
