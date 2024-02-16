<?php

namespace App\Http\Controllers;
use App\Models\user;
use Illuminate\Http\Request;

class PolicyreinstatementController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $departmentName = $user->department
            ? $user->department->name
            : "Unknown Department";
        $headOfDepartment =
            $user->department && $user->department->head
                ? $user->department->head->name
                : "Unknown Head";
        $approvers = User::where("role_id", 2)
            ->where("department_id", $user->department_id)
            ->get();

        return view(
            "Ticket.Reinstate-Policy",
            compact("approvers", "departmentName", "headOfDepartment")
        );
    }
}
