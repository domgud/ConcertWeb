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
                                <th scope="col">#</th>
                                <th scope="col">Vardas</th>
                                <th scope="col">El. Paštas</th>
                                <th scope="col">Rolė</th>
                                <th scope="col">Veiksmai</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <th scope="row">{{$user->id}}</th>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>{{$user->role->name}}</td>
                                    <td>
                                            <a href="{{route('admin.users.edit', $user->id)}}"> <button type="button" class="btn btn-primary float-left">Redaguoti</button> </a>

                                            <form action="{{route('admin.users.destroy', $user)}}" method="POST" class="float-left">
                                                @csrf
                                                {{method_field('DELETE')}}
                                                <button type="submit" class="btn btn-warning">Šalinti</button>
                                            </form>
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
