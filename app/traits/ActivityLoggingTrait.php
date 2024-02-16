<?php
// app/Traits/ActivityLoggingTrait.php

namespace App\Traits;

use App\Models\ActivityLog;

trait ActivityLoggingTrait
{
    private function logActivity($user, $record, $action, $details = null)
    {
        ActivityLog::create([
            'user_id' => $user ? $user->id : null,
            'record_id' => $record->id,
            'action' => $action,
            'details' => $details,
        ]);
    }
}
