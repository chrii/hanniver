@extends('layouts.app')
@section('content')

<div class="container">
    <div class="card">
        <div class="card-header">
            <h1>Tisch {{ $table->table_id }}</h1>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-sm">
                    Hier folgen Tisch Details wie die Gesamtrechnung 
                </div>
                <div class="col-sm">
                    Gäste am Tisch
                    <ul class="list-group">
                        @foreach($table->userOnTable AS $userDetails)
                        <li class="list-group-item">
                            <i class="material-icons">person</i>
                            {{ $userDetails->name }}
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection