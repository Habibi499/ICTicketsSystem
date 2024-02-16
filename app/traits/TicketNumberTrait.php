<?php
// app/Traits/TicketNumberTrait.php

namespace App\Traits;

trait TicketNumberTrait
{
    public function generateTicketNumber()
    {
        $latestTicket = \App\Models\TicketNumbers::latest('id')->first();
        $lastNumber = $latestTicket ? intval(preg_replace('/[^0-9]/', '', $latestTicket->ticket_No)) + 1 : 1;
        $formattedNumber = str_pad($lastNumber, 4, '0', STR_PAD_LEFT);
        $ticketNumber = "B" . $formattedNumber;
        $fullTicketNumber = "ITIK/CORF/" . $ticketNumber;

        return [
            'ticketCode' => "ITIK/CORF/",
            'ticketNumber' => $ticketNumber,
        ];
    }
}
