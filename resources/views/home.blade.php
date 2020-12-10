@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                        @can('see-table')
                        <a href="{{route('concerts.index')}}">Koncertų tvarkaraštis</a>
                        @elsecan('see-stats')
                            <a href="{{route('concerts.viewStats')}}">Koncertų statistika</a>
                        @endcan
                        <br>
                        @can('buy-ticket')
                        <a href="{{route('tickets.index')}}">Mano bilietai</a>
                        @endcan
                </div>
            </div>
        </div>
    </div>
@endsection
