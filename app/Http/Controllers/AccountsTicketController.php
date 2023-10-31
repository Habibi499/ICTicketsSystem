<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;
use App\Models\User;

class AccountsTicketController extends Controller
{
    public function create()
    {
        $user = auth()->user(); 
        $departmentName = $user->department ? $user->department->name : 'Unknown Department';
        $headOfDepartment = $user->department && $user->department->head ? $user->department->head->name : 'Unknown Head';
        $approvers=User::where('role_id',2)
                    ->where('department_id',$user->department_id)
                    ->get();
    
        return view('Ticket.accountsform',compact('approvers','departmentName', 'headOfDepartment'));
    }
}