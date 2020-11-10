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


    public function show($concertid)
    {
        $concert = Concert::findOrFail($concertid);
        if($concert->sitting-count($concert->spotssit)<=0&&
        $concert->standing-count($concert->spotsstand)<=0) return redirect() -> route('tickets.index');
        return view ('tickets.create')->with('concert', $concert);
    }



    public function destroy(Ticket $ticket)
    {
        $ticket->delete();

        return redirect()->route('tickets.index');
    }
}
