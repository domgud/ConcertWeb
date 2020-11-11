<?php

namespace App\Http\Controllers;

use App\Models\Concert;
use App\Models\Ticket;
use App\Models\User;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:buy-ticket')->only('show');
    }


    public function index()
    {
        $tickets = Ticket::all() -> where('user_id', auth()->user()->id);
        return view('tickets.index')->with('tickets', $tickets);
    }


    public function store(Request $request)
    {
        Ticket::create([
            'type' => $request->type,
            'user_id' => auth()->user()->id,
            'concert_id' => $request->id
        ]);
        return redirect() -> route('tickets.index');
    }


    public function show(Ticket $ticket)
    {
        abort(404);
    }



    public function destroy(Ticket $ticket)
    {
        $ticket->delete();

        return redirect()->route('tickets.index');
    }
}
