@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <!-- Begin Card One -->
            <div class="card">
                <div class="card-header"><strong>Hallo {{ ucfirst(Auth::user()->name) }}!</strong></div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <p>Hier sind deine persönlichen Daten die wir von dir gespeichert haben:</p>
                    <ul class="list-group">
                        <li class="list-group-item"><strong>Name:</strong> {{ Auth::user()->name }}</li>
                        <li class="list-group-item"><strong>E-Mail-Adresse:</strong> {{ Auth::user()->email }}</li>
                        <li class="list-group-item"><strong>Dabei seit:</strong> {{ Auth::user()->created_at }}</li>
                    </ul>
                </div>
            </div>
            <!-- Begin Card Two -->
            <div class="card">
                <div class="card-header">
                    <strong>Derzeit bist du an Tisch:</strong>
                </div>
                <div class="card-body">
                    @if (Auth::user()->has_table  !== 0)
                        <a href="/tables/{{ Auth::user()->has_table }}">Tisch Nummer {{ Auth::user()->has_table }}</a>
                    @else
                        Du bist derzeit an keinem Tisch
                    @endif
                </div>
            </div>
            <!-- begin Card Three -->
            <div class="card">
                <div class="card-header">
                        <strong>Aktuelle Rechnung:</strong>
                </div>
                <div class="card-body">
                        {{ Auth::user()->active_bill === 0 ? 'Derzeit keine offenen Rechnungen' : Auth::user()->active_bill }}
                </div>
            </div>
            <!-- Begin Card Four -->
            <div class="card">
                <div class="card-header">
                    <strong>Vergangene Rechnungen:</strong>
                </div>
                <div class="card-body">
                        {{ Auth::user()->active_bill === 0 ? 'Derzeit keine abgeschlossenen Rechnungen' : Auth::user()->active_bill }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection