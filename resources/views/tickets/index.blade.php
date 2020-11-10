@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">Koncertų tvarkaraštis</div>

                    <div class="card-body">

                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">Pavadinimas</th>
                                <th scope="col">Data</th>
                                <th scope="col">Laisvos sėdimos vietos</th>
                                <th scope="col">Laisvos stovimos vietos</th>
                                <th scope="col">Veiksmai</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($concerts as $concert)
                                <tr>
                                    <th scope="row">{{$concert->name}}</th>
                                    <td>{{$concert->date}}</td>
                                    <td>{{$concert->sitting-count($concert->spotssit)}}</td>
                                    <td>{{$concert->standing-count($concert->spotsstand)}}</td>
                                    <td>
                                        <a href="{{route('tickets.show', $concert)}}"> <button type="button" class="btn btn-primary float-left">Užsakyti</button> </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <a href="{{route('home')}}"> <button type="button" class="btn btn-warning float-left">Atgal</button> </a>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
