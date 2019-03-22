@extends('layouts.app')
@section('content')

<div class="container">
    <div class="card">
        <div class="card-header">
            <h1>Nutzer Übersicht</h1>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-sm">
                    <ul class="list-group">
                        <li class="list-group-item">
                            <i class="material-icons left">account_circle</i>
                            ID: 
                            {{ $user->id }}
                        </li>
                        <li class="list-group-item">
                            <i class="material-icons left">contacts</i>
                            Name: 
                            {{ $user->name }}
                        </li>
                        <li class="list-group-item">
                            <i class="material-icons left">email</i>
                            E-Mail-Adresse: 
                            {{ $user->email }}
                        </li>
                        <li class="list-group-item">
                            <i class="material-icons left">group</i>
                            Gruppe: 
                            {{ $user->usertype->group_name }}
                        </li>
                        <li class="list-group-item">
                            <i class="material-icons left">add_circle</i>
                            Dabei seit: 
                            {{ $user->created_at }}
                        </li>
                    </ul>
                </div>
                <div class="col-sm">
                    <ul class="list-group">
                        <li class="list-group-item">
                            <i class="material-icons {{ $user->has_table ? 'online' : 'offline' }}">person</i>
                            <a href="/tables/{{ $user->has_table ? $user->has_table : '' }}">
                                {{ $user->has_table > 0 ? 'Tisch ' . $user->has_table : 'Ist noch keinem Tisch zugewiesen' }}
                            </a>
                        </li>
                        <li class="list-group-item">
                            <i class="material-icons">account_balance_wallet</i>
                                <a href="/bill/{{ Auth::user()->id }}">
                                {{ $user->active_bill ? 'Rechnung Nummer ' . $user->active_bill : 'Keine offene Rechnung' }}
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <a href="/users" class="card-link btn">Zurück</a>
        </div>
    </div>
</div>

@endsection