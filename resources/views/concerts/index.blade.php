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
                                <th scope="col"></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($concerts as $concert)
                                <tr>
                                    <th scope="row">{{$concert->name}}</th>
                                    <td>{{$concert->date}}</td>
                                    <td>{{$concert->freesit()}}</td>
                                    <td>{{$concert->freestand()}}</td>
                                    @if($concert->freesit()<=0&&$concert->freestand()<=0)

                                        <td style="color:red">
                                            Nebėra vietų
                                        </td>
                                    @else
                                        <td>
                                            @can('buy-ticket')
                                                <a href="{{route('concerts.show', $concert)}}"> <button type="button" class="btn btn-primary float-left">Užsakyti</button> </a>
                                            @endcan
                                        </td>
                                    @endif
                                </tr>


                            @endforeach
                            </tbody>
                        </table>
                        @can('create', App\Models\Concert::class)
                        <a href="{{route('concerts.create')}}"> <button type="button" class="btn btn-dark float-right">Pridėti koncertą</button> </a>
                        @endcan
                        @auth()
                        <a class="float-left" href="{{route('home')}}">Atgal</a>
                        @endcan
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
