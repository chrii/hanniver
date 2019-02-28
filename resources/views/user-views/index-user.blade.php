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
                        <th scope="col">Name</th>
                        <th scope="col">E-Mail-Adresse</th>
                        <th scope="col">Gruppe</th>
                        <th scope="col">Optionen</th>
                    </tr>
                </thead>
                @foreach($userdata AS $key => $user)
                    @foreach($user->userDataByType AS $userRow)
                    <tr>
                        <td>{{ $userRow->name }}</td>
                        <td>{{ $userRow->email }}</td>
                        <td>{{ $user->group_name }}</td>
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
            </table>
        </div>
    </div>
</div>

@endsection