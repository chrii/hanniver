@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="card">
            <div class="card-header">
                <h1>Neuer Nutzer</h1>
            </div>
            <div class="card-body">
                <div class="row justify-content-center">
                    <div class="col-6">
                        <div class="card">
                            <div class="card-body">
                                <ul>
                                @foreach($errors->all() AS $error)
                                    <li>{{$error}}</li>
                                @endforeach
                                </ul>
                            </div>
                        </div>
                        <form method="POST" action="/users">
                            @csrf  
                            <div class="row">
                                <div class="col-sm">
                                    <div class="form-group">
                                        <label for="name" class="bmd-label-floating">Name</label>
                                        <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="password" class="bmd-label-floating">Passwort</label>
                                        <input type="password" class="form-control" id="password" name="password">
                                    </div>
                                    <div class="form-group">
                                        <label for="password-confirm" class="bmd-label-floating">Password bestätigen</label>
                                        <input type="password" class="form-control" id="password-confirm" name="password_confirmation">
                                    </div>
                                </div>
                                <div class="col-sm">
                                    <div class="form-group">
                                        <label for="email" class="bmd-label-floating">E-Mail-Adresse</label>
                                        <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="group" class="bmd-label-floating">Nutzergruppen</label>
                                        <select class="form-control" id="group" name="group" value="{{ old('group') }}">
                                            <option disabled selected>Gruppe Auswählen</option>
                                            @foreach($usertype AS $type)
                                                <option value="{{ $type->group_id }}">{{ $type->group_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-outline-primary">Hinzufügen</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <a href="/users" class="card-link btn btn-sm">Zurück</a>
            </div>
        </div>
    </div>

@endsection