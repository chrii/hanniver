@extends('layouts.app')

@section('content')

<div class="container">    
    <div class="card">
        <div class="card-header">
            <h1>Produktübersicht</h1>
            <div class="btn-group navbar-right">
                <button class="btn bmd-btn-fab bmd-btn-fab-sm dropdown-toggle" type="button" id="ex3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="material-icons">more_vert</i>
                </button>
                <div class="dropdown-menu  dropdown-menu-left" aria-labelledby="ex3">
                    <a href="/products/create"  class="dropdown-item">Neues Produkt</a>
                    <a href="/categorys"  class="dropdown-item">Kategorien</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Preis</th>
                        <th scope="col">Kategorie</th>
                        <th scope="col">Optionen</th>
                    </tr>
                </thead>
                @foreach($products AS $product)
                <tr>
                    <td>{{ $product->product_name }}</td>
                    <td>{{ $product->price_wo_tax }}€</td>
                    <td>{{ $product->category->category_name }}</td>
                    <td>
                        <div class="dropdown">
                            <button class="btn bmd-btn-icon dropdown-toggle" type="button" id="ex1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="material-icons">more_vert</i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-left" aria-labelledby="ex1">
                                <a href="/products/{{ $product->product_id }}/edit" class="dropdown-item">
                                    <i class="material-icons">settings</i>
                                    Ändern
                                </a>
                                <form method="POST" action="/products/{{ $product->product_id }}">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="dropdown-item">
                                        <i class="material-icons icon-delete">delete</i>
                                        Delete
                                    </button>
                                </form>
                            </div>
                        </div>  
                    </td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>
@endsection