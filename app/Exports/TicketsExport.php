<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use App\Event;
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
            'event' => Event::find($query)
        ]);
    }
}