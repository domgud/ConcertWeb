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

                            <div class="form-group row">
                                <label for="id" class="col-md-2 col-form-label text-md-right">ID</label>

                                <div class="col-md-6">
                                    <input id="id" type="text" class="form-control" name="id" value="{{$concert->id}}" readonly>
                                </div>
                            </div>
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
                                <label for="sitting" class="col-md-2 col-form-label text-md-right">Viso sėdimų vietų</label>

                                <div class="col-md-6">
                                    <input id="sitting" type="text" class="form-control" name="sitting" value="{{$concert->sitting}}" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="standting" class="col-md-2 col-form-label text-md-right">Viso sėdimų vietų</label>

                                <div class="col-md-6">
                                    <input id="standing" type="text" class="form-control" name="standing" value="{{$concert->standing}}" readonly>
                                </div>
                            </div>
                            <select name="type" id="type">
                                <option value="sitting">sitting</option>
                                <option value="standing">standing</option>>
                            </select>
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
