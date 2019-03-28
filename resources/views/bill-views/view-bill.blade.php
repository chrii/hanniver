@extends('layouts.app')

@section('content')

<div class="content">
    <div class="card">
        <div class="card-header">
            <h1>Rechnung Nummer {{ Auth::user()->active_bill }}</h1>
        </div>
        <div class="card-body">
            <p>Hallo {{ ucfirst(Auth::user()->name) }}!  <br> Das hast du bisher konsumiert:</p>
            <div class="row">
                <div class="col">
                    <table class="table ">
                        <tr>
                            <thead class="thead-dark">
                                <th>Produkt</th>
                                <th>Einzelpreis</th>
                                <th>Stück</th>
                                <th>Gesamt</th>
                            </thead>
                            <tbody>
                                @foreach( $bill AS $productName => $productValue)
                                <tr>
                                    @if($productName === 'summary')
                                    @continue
                                    @endif
                                    <td>{{ $productName }}</td>
                                    <td>{{ number_format($productValue['price'], 2, ',', '') }}</td>
                                    <td>{{ $productValue['quantity'] }}</td>
                                    <td>{{ number_format($productValue['quantity_price'], 2, ',', '') }}</td>
                                </tr>
                                @endforeach
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td>Gesamt:</td>
                                    <td>{{ number_format($bill['summary'], 2, ',', '') }}</td>
                                </tr>
                            </tbody>
                        </tr>
                    </table>
                </div>
                <div class="col">
                        <h1>Einzelrechnungen</h1>
                        <ul>
                            <!-- @TODO This gets an own Model Method -->
                            @foreach($bons->getBons AS $bon)
                            <li>
                                **Placeholder**
                                {{ $bon->product_string }}
                            </li>
                            @endforeach
                        </ul>
                </div>
            </div>
            <a href="/home" class="btn">Home</a>
            <a href="/table/{{ Auth::user()->active_table }}" class="btn btn-outline-primary">Zum Tisch</a>
        </div>
    </div>
</div>

@endsection