@extends('layouts.app')

@section('content')

<div class="container">
    <div class="card">
        <div class="card-header">
            <h1>Verwaltung</h1>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col">
                        <div id="accordion">
                            @foreach($bills AS $bill)
                            <div class="card">
                                <div class="card-header" id="heading{{ $bill->bill_id }}">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link" data-toggle="collapse" data-target="#collapse{{ $bill->bill_id }}" aria-expanded="true" aria-controls="collapse{{ $bill->bill_id }}">
                                            {{ $bill->owner }} - Tisch Nummer {{ $bill->table_id }}
                                        </button>
                                    </h5>
                                </div>
                                <div id="collapse{{ $bill->bill_id }}" class="collapse" aria-labelledby="heading{{ $bill->bill_id }}" data-parent="#accordion">
                                    <div class="card-body">
                                        
                                        @foreach($products[$bill->owner] AS $name => $details)
                                        <table class="table table-hover table-dark">
                                            <thead>
                                                <tr>
                                                    <td>Produkt</td>
                                                    <td>Einzelpreis</td>
                                                    <td>Menge</td>
                                                    <td>Gesamt</td>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($details AS $name => $detail)
                                                <tr>
                                                    <td>{{ $name }}</td>
                                                    <td>{{ $detail->price }}</td>
                                                    <td>{{ $detail->quantity }}</td>
                                                    <td>{{ $detail->quantity_price }}</td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                </div>
                <div class="col">

                </div>
            </div>
        </div>
    </div>
</div>

@endsection