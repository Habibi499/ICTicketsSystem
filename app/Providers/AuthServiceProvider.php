<?php

namespace App\Providers;

use App\Models\Ticket;

use App\Models\User;
use App\Policies\TicketPolicy;
use App\Policies\ApproverPolicy;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        Ticket::class => TicketPolicy::class,
        'App\Models\Ticket' => 'App\Policies\ApproverPolicy',
    ];


}
