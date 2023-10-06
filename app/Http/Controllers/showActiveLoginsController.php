<?php

namespace App\Http\Controllers;
use App\Models\UserActivity;
use Illuminate\Http\Request;


class showActiveLoginsController extends Controller
{
    public function showActiveLogins()
    {
        $activeLogins = UserActivity::whereNull('logout_time')->get();
        
        return view('admin.active', compact('activeLogins'));
    }
    
}
