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
        $this->authorizeResource(Ticket::class, 'ticket');
    }


    public function index()
    {
        $tickets = Ticket::all() -> where('user_id', auth()->user()->id);
        return view('tickets.index')->with('tickets', $tickets);
    }


    public function store(Request $request)
    {

        $concert = Concert::findorFail($request->id);
        if(($request->type==='sitting'&&$concert->freesit()>0)||($request->type==='standing'&&$concert->freestand()>0))
        {
            Ticket::create([
                'type' => $request->type,
                'user_id' => auth()->user()->id,
                'concert_id' => $request->id
            ]);
            $request->session()->flash('success', 'Bilietas užsakytas sėkmingai');
        }
        else
            {
                $request->session()->flash('error', 'Klaida užsakant bilietą');
        }

        return redirect() -> route('concerts.index');
    }


    public function show(Ticket $ticket)
    {
        abort(404);
    }



    public function destroy(Ticket $ticket, Request $request)
    {
        if($ticket->delete()){
            $request->session()->flash('success', 'Bilietas ištrintas sėkmingai');
        }
        else{
            $request->session()->flash('error', 'Klaida trinant bilietą');
        }

        return redirect()->route('tickets.index');
    }
}
