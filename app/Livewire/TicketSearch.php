<?php

namespace App\Livewire;
use Livewire\Component;


use App\Models\Ticket;


class TicketSearch extends Component
{
    public $search = '';
    public $tickets;
    
    public function mount()
    {
        $this->tickets = Ticket::all(); // Load all tickets initially
    }

    public function updatedSearch()
        {
            $this->tickets = Ticket::where('Record_No', 'like', '%' . $this->search . '%')->get();
        }

}
