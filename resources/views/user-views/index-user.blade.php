@extends('layouts.app')
@section('content')

<div class="container">
    <div class="card">
        <div class="card-header">
            <h1>User</h1>
            <div class="btn-group navbar-right">
                <button class="btn bmd-btn-fab bmd-btn-fab-sm dropdown-toggle" type="button" id="ex3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="material-icons">more_vert</i>
                </button>
                <div class="dropdown-menu  dropdown-menu-left" aria-labelledby="ex3">
                    <a href="/users/create"  class="dropdown-item">Nutzer anlegen</a>
                    <a href="/groups"  class="dropdown-item">Gruppen</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        @isset(request()->tid)
                            <th scope="col"></th>
                        @endisset
                        <th scope="col">Name</th>
                        <th scope="col">E-Mail-Adresse</th>
                        <th scope="col">Active</th>
                        <th scope="col">Optionen</th>
                    </tr>
                </thead>
                <form action="/tables/checkin" method="POST">
                    @csrf
                    @isset(request()->tid)
                    <button class="btn" type="submit">Gäste zum Tisch hinzufügen</button>
                @endisset
                @foreach($userdata AS $key => $user)
                    @foreach($user->userDataByType AS $userRow)
                    <tr>
                        @isset(request()->tid)
                        <td>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="checkinTable-{{ $userRow->id }}" value="{{ request()->tid }}">
                            </div>
                        </td>
                        @endisset
                        <td>{{ ucfirst($userRow->name) }}</td>
                        <td>{{ $userRow->email }}</td>
                        <td>
                            <i class="material-icons {{ $userRow->has_table ? 'online' : 'offline'}}">person</i>
                        </td>
                        <td>
                            <div class="dropdown">
                                <button class="btn bmd-btn-icon dropdown-toggle" type="button" id="ex1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="material-icons">more_vert</i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-left" aria-labelledby="ex1">
                                    <a href="/users/{{ $userRow->id }}" class="dropdown-item">
                                        <i class="material-icons">view_module</i>
                                         Übersicht
                                    </a>
                                </div>
                            </div> 
                        </td>
                    </tr>
                    @endforeach
                @endforeach
                </form>
            </table>
        </div>
    </div>
</div>

@endsection