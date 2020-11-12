@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Bilietai</div>

                    <div class="card-body">

                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Koncertas</th>
                                <th scope="col">Data</th>
                                <th scope="col">Tipas</th>
                                <th scope="col">Veiksmai</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($tickets as $ticket)
                                <tr>
                                    <th scope="row">{{$ticket->id}}</th>
                                    <td>{{$ticket->concert->name}}</td>
                                    <td>{{$ticket->concert->date}}</td>
                                    <td>{{$ticket->type}}</td>
                                    <td>

                                        <form action="{{route('tickets.destroy', $ticket)}}" method="POST" class="float-left">
                                            @csrf
                                            {{method_field('DELETE')}}
                                            <button type="submit" class="btn btn-warning">Šalinti</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <a href="{{route('home')}}">Atgal</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
