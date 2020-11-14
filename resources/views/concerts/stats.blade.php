@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-16">
                <div class="card">
                    <div class="card-header">Koncertų duomenys</div>

                    <div class="card-body">

                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">Pavadinimas</th>
                                <th scope="col">Data</th>
                                <th scope="col">Sėdimos</th>
                                <th scope="col">Stovimos</th>
                                <th scope="col">Užimtos sėdimos vietos</th>
                                <th scope="col">Užimtos stovimos vietos</th>
                                <th scope="col">Laisvos sėdimos vietos</th>
                                <th scope="col">Laisvos stovimos vietos</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($concerts as $concert)
                                <tr>
                                    <th scope="row">{{$concert->name}}</th>
                                    <td>{{$concert->date}}</td>
                                    <td>{{$concert->sitting}}</td>
                                    <td>{{$concert->standing}}</td>
                                    <td>{{count($concert->spotssit)}}</td>
                                    <td>{{count($concert->spotsstand)}}</td>
                                    <td>{{$concert->freesit()}}</td>
                                    <td>{{$concert->freestand()}}</td>
                                </tr>


                            @endforeach
                            </tbody>
                        </table>
                        <a class="float-left" href="{{route('home')}}">Atgal</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
