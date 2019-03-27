@extends('layouts.app')

@section('content')

<div class="container">
    <div class="card">
        <div class="card-header">
            <h1>Deine aktuelle Bestellung</h1>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col">
                    <table class="table">
                        <thead>
                            <tr>
                                <td>Menge</td>
                                <td>Produkt</td>
                                <td>Einzelpreis</td>
                                <td>Gesamt</td>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- List all Products from bonString Cookie -->
                            @foreach($products AS $product)
                                <tr>
                                    <td>{{$product['quantity']}}</td>
                                    <td>{{$product['name']}}</td>
                                    <td>€ {{ number_format($product['price'], 2, ',', '')}}</td>
                                    <td>€ {{ number_format($product['price'] * $product['quantity'], 2, ',', '') }}</td>
                                </tr>
                            @endforeach
                            <!-- $summary contains the whole price of all Products -->
                            <tr>
                                <td></td>
                                <td></td>
                                <td>Gesamt:</td>
                                <td>€ {{ number_format($summary, 2, ',', '')}}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col"></div>
            </div>
            <a class="btn btn-outline-primary" id="send-order" href="/menu">Bestellen</a>
            <a class="btn btn-link" href="/menu">Zurück</a>
        </div>
    </div>
</div>
@endsection

@section('optional-javascript')
<script src="{{ asset('js/send-order.js') }}"></script>
@endsection