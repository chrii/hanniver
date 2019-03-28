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
                    <table class="table">
                        <tr>
                            <th>Name:</th>
                            <td>{{ Auth::user()->name }}</td>
                        </tr>
                        <tr>
                            <th>E-Mail-Adresse</th>
                            <td>{{ Auth::user()->email }}</td>
                        </tr>
                        <tr>
                            <th>Dabei seit:</th>
                            <td>{{ Auth::user()->created_at }}</td>
                        </tr>
                    </table>
                </div>
            </div>
            <!-- Begin Card Two -->
            <div class="card">
                <div class="card-header">
                    <strong>Derzeit bist du an Tisch:</strong>
                </div>
                <!-- Get active Table -->
                <div class="card-body">
                    @if (Auth::user()->has_table  !== 0)
                        <a href="/tables/{{ Auth::user()->has_table }}">Tisch Nummer {{ Auth::user()->has_table }}</a>
                    @else
                        <a href="/tables">Du bist derzeit an keinem Tisch</a>
                    @endif
                </div>
            </div>
            <!-- begin Card Three -->
            <div class="card">
                <div class="card-header">
                        <strong>Aktuelle Rechnung:</strong>
                </div>
                <!-- Shows active Bill -->
                <div class="card-body">
                    <i class="material-icons">account_balance_wallet</i>
                    <a href="/bill"> 
                        {{ Auth::user()->active_bill === 0 ? 'Derzeit keine offenen Rechnungen' : 'Rechnung Nummer ' . Auth::user()->active_bill }}
                    </a>
                </div>
            </div>
            <!-- Begin Card Four -->
            <div class="card">
                <div class="card-header">
                    <strong>Vergangene Rechnungen:</strong>
                </div>
                <!-- Lists all Bills from the past -->
                <div class="card-body">
                    <ul class="list-group">
                        @foreach(App\User::find(Auth::user()->id)->allBills->where('completed', true) AS $bill)
                        <li class="list-group-item">
                            <a href="">Rechnung Nummer {{ $bill->bill_id }}</a>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection