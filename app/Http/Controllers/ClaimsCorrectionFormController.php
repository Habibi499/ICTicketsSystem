<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class ClaimsCorrectionFormController extends Controller
{
    public function create()
    {
        $user = auth()->user(); 
        $departmentName = $user->department ? $user->department->name : 'Unknown Department';
        $headOfDepartment = $user->department && $user->department->head ? $user->department->head->name : 'Unknown Head';
        $approvers = User::where(function ($query) use ($user) {
            $query->where("role_id", 2)
                ->where("department_id", $user->department_id);
        })
        ->orWhere(function ($query) {
            $query->where("role_id", 2)
                ->where("department_id", 3);
        })
        ->get();
        return view('Ticket.claimsform',compact('approvers','departmentName', 'headOfDepartment'));
    }
}
