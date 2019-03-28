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
                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                                <th>Name</th>
                                <th>Einzelpreis</th>
                                <th>Stückzahl</th>
                                <th>Gesamt</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($summary AS $itemName => $item)
                            <tr>
                                @if($itemName === 'summary')
                                @continue
                                @endif
                                <td>{{ $itemName }}</td>
                                <td>€{{ number_format($item['price'], 2, ',', '') }}</td>
                                <td>{{ $item['quantity'] }}</td>
                                <td>€{{ number_format($item['quantity_price'], 2, ',', '') }}</td>
                            </tr>
                            @endforeach
                            <tr>
                                <td></td>
                                <td></td>
                                <td>Gesamt:</td>
                                <td>€{{ number_format($summary['summary'], 2, ',', '') }} </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-sm">
                    Gäste am Tisch
                    <ul class="list-group">
                        @foreach($table->userOnTable AS $userDetails)
                        <li class="list-group-item">
                                <i class="material-icons">person</i>
                                {{ ucfirst($userDetails->name) }}: <br>
                                <a href="/bill">
                                    Aktuelle Rechnung {{ $userDetails->active_bill }}
                                </a>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection