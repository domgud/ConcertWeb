@extends('layouts.app')

@section('content')
    @can('create', App\Models\Concert::class)
        <a href="{{route('concerts.create')}}"> <button type="button" class="btn btn-dark float-right">Pridėti koncertą</button> </a>
    @endcan
    @auth()
        <a class="float-left" href="{{route('home')}}">Atgal</a>
    @endcan
    <br>
    <br>
    <br>
    <div class="container">

        <div class="d-flex flex-wrap">
            @foreach ( $concerts as $data)
            <div class="col-sm-4" style="margin-bottom: 10px">
                    <div class="card  bg-transparent" style = "width: 100%; " >

                        <div class="card-body">
                            <h5 class="card-title"><b>{{$data->name}}</b></h5>
                            <p class="card-text"><b>{{$data->date}}</b></p>
                            <p class="card-text">Sėdimos: {{ $data->freesit()}}</p>
                            <p class="card-text">Stovimos: {{ $data->freestand()}}</p>
                            @if($data->freesit()<=0&&$data->freestand()<=0)

                                <p style="color:red">
                                    Nebėra vietų
                                </p>
                            @else
                                <td>
                                    @can('buy-ticket')
                                        <a href="{{route('concerts.show', $data)}}"> <button type="button" class="btn btn-primary float-left">Užsakyti</button> </a>
                                    @endcan
                                </td>
                            @endif
                        </div>
                    </div>
            </div>
            @endforeach
        </div>
    </div>

@endsection
