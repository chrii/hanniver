@extends('layouts.app')

@section('content')

<div class="container">
    <div class="card">
        <div class="card-header">
            <h1>Nutzer Übersicht</h1>
        </div>
        <div class="card-body">
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
            <a href="/users" class="card-link btn">Zurück</a>
        </div>
    </div>
</div>

@endsection