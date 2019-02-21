@extends('layouts.layout')

@section('content')

    <main>
        <div class="container">
            <h1>Produktübersicht</h1>
            <a href="/products/create"  class="waves-effect waves-light btn-small right">Neues Produkt</a>
            <a href="/categorys"  class="waves-effect waves-light btn-small right">Kategorie</a>
            <table>
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Preis</th>
                        <th>Kategorie</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                @foreach($products AS $product)
                <tr>
                    <td>{{ $product->product_name }}</td>
                    <td>{{ $product->price_wo_tax }}€</td>
                    <td>{{ $product->category->category_name }}</td>
                    <td>
                        <a href="/products/{{ $product->product_id }}/edit" class="waves-effect waves-light btn-small"><i class="material-icons">settings</i></a>
                    </td>
                    <td>
                        <form method="POST" action="/products/{{ $product->product_id }}">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn waves-effect waves-light red accent-4">
                                <i class="material-icons">delete</i>
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </table>
        </div>
    </main>

@endsection