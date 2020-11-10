@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Users</div>

                    <div class="card-body">

                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">Vardas</th>
                                <th scope="col">Data</th>
                                <th scope="col">Stovimos vietos</th>
                                <th scope="col">Sėdimos vietos</th>
                                <th scope="col">Veiksmai</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($concerts as $concert)
                                <tr>
                                    <th scope="row">{{$concert->name}}</th>
                                    <td>{{$concert->date}}</td>
                                    <td>{{$concert->sitting}}</td>
                                    <td>{{$concert->standing}}</td>
                                    <td>
                                        <a href="{{route('tickets.show', $concert)}}"> <button type="button" class="btn btn-primary float-left">Redaguoti</button> </a>
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
