@extends('layout.layout')

@section('content')
<main>
    <h1>Bearbeiten</h1>
    <ul>
        @foreach($errors->all() AS $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
    
    <form method="POST" action="/products/{{ $product->product_id }}" required>
        @method('PATCH')
        @csrf
        <div class="row">
            <div class="input-field">
                <input type="text" name="product-name" value="{{ $product->product_name }}" required>
                <label for="product-name">Produkt</label>
            </div>

            <div class="input-field">
                <input type="text" name="price-wt" value="{{ $product->price_wo_tax }}" required>
                <label for="price-wt">Preis ohne Steuer</label>
            </div>

            <div class="input-field">
                <input type="text" name="product-description" value="{{ $product->product_description }}" required>
                <label for="price-description">Beschreibung</label>
            </div>

            <div class="input-field">
                <select name="product-category">
                    <option value="{{ $product->category_id }}" disabled selected>{{ $categorys->where('category_id' , $product->category_id)->first()->category_name }}</option>
                    @foreach($categorys AS $category)
                        <option value="{{ $category->category_id }}">{{ $category->category_name }}</option>
                    @endforeach
                </select>
                <label>Kategorie</label>
            </div>
            <p>
                <button type="submit" class="btn waves-effect waves-light">
                    <i class="material-icons right">settings</i>
                    Change
                </button>
            </p>
        </div>
    </form>
        
    <form method="POST" action="/products/{{ $product->product_id }}">
        @method('DELETE')
        @csrf
        <p>
            <button type="submit" class="btn waves-effect waves-light red accent-4">
                <i class="material-icons right">delete</i>
                Delete
            </button>
        </p>
    </form>
    <a href="/products" class="waves-effect waves-light btn-small">Zurück</a>
</main>
@endsection