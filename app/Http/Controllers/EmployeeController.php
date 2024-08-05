<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    //
    public function employeeList()
    {
        return view('livewire.employee.employee-list');
    }
}
