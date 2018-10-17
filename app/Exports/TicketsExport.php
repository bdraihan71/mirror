<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use App\Ticket;
use Maatwebsite\Excel\Concerns\Exportable;

class TicketsExport implements FromView
{
    use Exportable;
    private $query;

    public function __construct($query)
    {
        $this->query = $query;
    }

    public function view(): View
    {
        return view('exports.tickets', [
            'tickets' => Ticket::where('event_id', $this->query)->get()
        ]);
    }
}