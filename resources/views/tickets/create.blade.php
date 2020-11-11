@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Koncerto duomenys</div>
                    <div class="card-body">
                        <form action="{{route('tickets.store')}}" method="POST">
                            @csrf
                            <input id="id" type="text" class="form-control" name="id" value="{{$concert->id}}" hidden>

                            <div class="form-group row">
                                <label for="name" class="col-md-2 col-form-label text-md-right">Pavadinimas</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="name" value="{{$concert->name}}" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="date" class="col-md-2 col-form-label text-md-right">Data</label>

                                <div class="col-md-6">
                                    <input id="date" type="text" class="form-control" name="date" value="{{$concert->date}}" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="sitting" class="col-md-2 col-form-label text-md-right">Laisvų sėdimų vietų:</label>

                                <div class="col-md-6">
                                    <input id="sitting" type="text" class="form-control" name="sitting" value="{{$concert->sitting-count($concert->spotssit)}}" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="standing" class="col-md-2 col-form-label text-md-right">Laisvų stovimų vietų</label>

                                <div class="col-md-6">
                                    <input id="standing" type="text" class="form-control" name="standing" value="{{$concert->standing-count($concert->spotsstand)}}" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="type" class="col-md-2 col-form-label text-md-right">Pasirinkite vietą</label>

                                <select name="type" id="type">
                                    @if($concert->sitting-count($concert->spotssit)>0)
                                        <option value="sitting">sitting</option>
                                        @endif


                                    @if($concert->standing-count($concert->spotsstand)>0)
                                            <option value="standing">standing</option>>
                                        @endif
                                </select>
                            </div>

                            <button type="submit" class="btn btn-primary">
                                Registruotis
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
