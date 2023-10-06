<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;
use App\models\User;

class AdminStatusController extends Controller
{
// app/Http/Controllers/AdminStatusController.php

public function edit(User $user)
{
    // Display the form to update status
    return view('admin.status.edit', compact('user'));
}

public function update(Request $request, User $user)
{
    // Validate and update the status
    $request->validate([
        'status' => 'required|in:present,absent',
    ]);

    $user->update([
        'LeaveStatus' => $request->input('status'),
    ]);

    return redirect()->route('admin.index')->with('success', 'Present/Absent Status updated successfully');
}

}
