<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    public function store(Request $request)
    {
        dd($request);
    }

    /**
     * Display the specified resource.
     */
    public function show(Ticket $ticket)
    {
        $products = json_decode($ticket->products, true);

        return view('tickets.show', compact('ticket','products'));
    }
}
