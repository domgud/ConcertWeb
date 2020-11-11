@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Koncerto duomenys</div>
                    <div class="card-body">
                        <form action="{{route('concerts.store')}}" method="POST">
                            @csrf

                            <div class="form-group row">
                                <label for="name" class="col-md-2 col-form-label text-md-right">Pavadinimas</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="date" class="col-md-2 col-form-label text-md-right">Data</label>

                                <div class="col-md-6">
                                    <input id="date" type="date" class="form-control" name="date" value="{{ old('date') }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="sitting" class="col-md-2 col-form-label text-md-right">Sėdimos vietos</label>

                                <div class="col-md-6">
                                    <input id="sitting" type="number" class="form-control" name="sitting" value={{ old('sitting') }} >
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="standing" class="col-md-2 col-form-label text-md-right">Stovimos vietos</label>

                                <div class="col-md-6">
                                    <input id="standing" type="number" class="form-control" name="standing" value={{ old('standing') }} >
                                </div>
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
