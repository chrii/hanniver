@extends('layout.layout')

@section('content')

    <main>
        <div class="container">
            <h1>Produktübersicht</h1>
            <a href="/products/create"  class="waves-effect waves-light btn-small right">Neues Produkt</a>
            <a href="/category/create"  class="waves-effect waves-light btn-small right">Neue Kategorie</a>
            <table>
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Preis</th>
                        <th>Kategorie</th>
                        <th><i class="small material-icons">settings</i></th>
                    </tr>
                </thead>
                @foreach($products AS $product)
                <tr>
                    <td>{{ $product->product_name }}</td>
                    <td>{{ $product->price_wo_tax }}€</td>
                    <td>{{ $product->category->category_name }}</td>
                    <td><a href="/products/{{ $product->product_id }}/edit" class="waves-effect waves-light btn-small">Edit</a></td>
                </tr>
                @endforeach
            </table>
        </div>
    </main>

@endsection