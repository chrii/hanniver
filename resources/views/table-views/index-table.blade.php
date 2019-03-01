@extends('layouts.app')
@section('content')

<div class="container">
    <div class="card">
        <div class="card-header">
            <h1>Tische</h1>
            <div class="btn-group navbar-right">
                <button class="btn bmd-btn-fab bmd-btn-fab-sm dropdown-toggle" type="button" id="ex3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="material-icons">more_vert</i>
                </button>
                <div class="dropdown-menu  dropdown-menu-left" aria-labelledby="ex3">
                    <form method="POST" action="/tables">
                        @csrf
                        <button class="dropdown-item" name="new" value="makeTable">Tisch erzeugen</button>
                    </form>
                    <a href="/users/create"  class="dropdown-item">Nutzer anlegen</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <table class="table">
                <thead class="thead-dark">
                    <th>Tisch Nummer</th>
                    <th>Geäste am Tisch</th>
                    <th>Details</th>
                </thead>
                <tbody>
                @foreach($tables AS $table)
                    <tr>
                        <td>
                            Tisch {{ $table->table_id }}
                        </td>
                        <td>
                            <i class="material-icons {{ $table->userOnTable->count() > 0 ? 'online' : 'offline' }}">person</i> 
                            {{ $table->userOnTable->count() }}
                        </td>
                        <td>
                            <div class="dropdown">
                                <button class="btn bmd-btn-icon dropdown-toggle" type="button" id="ex1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="material-icons">more_vert</i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-left" aria-labelledby="ex1">
                                    <a href="/tables/{{ $table->table_id }}" class="dropdown-item">
                                        <i class="material-icons">view_module</i>
                                            Übersicht
                                    </a>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection