<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PasswordChangeFController extends Controller
{
    public function index(){

        $user = auth()->user();
        $departmentName = $user->department ? $user->department->name : 'Unknown Department';
        $headOfDepartment = $user->department && $user->department->head ? $user->department->head->name : 'Unknown Head';
    
    
       // return view('Ticket.create', compact('departmentName', 'headOfDepartment'));
        return view('Ticket.passwordchange',compact('departmentName', 'headOfDepartment'));
        
    }
}
