<?php

namespace App\Http\Controllers;

use App\Models\Concert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ConcertController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Concert::class, 'concert');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        if(Auth::user()!= null)
        if(Auth::user()->hasRole('director')) return redirect()->route('concerts.viewStats');
        $concerts = Concert::all();
        return view('concerts.index')->with('concerts', $concerts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('concerts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->validate([
            'name' => ['required', 'max:255'],
            'date' => ['required'],
            'sitting' => ['required', 'numeric', 'min:0'],
            'standing' => ['required','numeric', 'min:0']
        ])){
            Concert::create([
                'name' => $request->name,
                'date' => $request->date,
                'sitting' => $request->sitting,
                'standing' => $request->standing
            ]);

        }
        else{
            dd($request);
        }

        return redirect() -> route('concerts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Concert  $concert
     * @return \Illuminate\Http\Response
     */
    public function show(Concert $concert)
    {

        if($concert->sitting-count($concert->spotssit)<=0&&
            $concert->standing-count($concert->spotsstand)<=0) return redirect() -> route('tickets.index');
        return view ('tickets.create')->with('concert', $concert);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Concert  $concert
     * @return \Illuminate\Http\Response
     */
    public function edit(Concert $concert)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Concert  $concert
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Concert $concert)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Concert  $concert
     * @return \Illuminate\Http\Response
     */
    public function destroy(Concert $concert)
    {
        //
    }

    public function viewStats()
    {
        $concerts = Concert::all();
        return view('concerts.stats')->with('concerts', $concerts);
    }
}
