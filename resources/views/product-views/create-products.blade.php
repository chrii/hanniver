@extends('layouts.layout')


@section('content')

<main>
    <div class="row">
        <div class="col s6">
        <h1>Neues Produkt</h1>
        <ul>
            @foreach($errors->all() AS $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    <form method="POST" action="/products">
        @csrf
        <div class="row">
            <div class="input-field">
                <input type="text" name="product-name" value="{{ old('product-name') }}" required>
                <label for="product-name">Produkt</label>
            </div>
    
            <div class="input-field">
                <input type="text" name="price-wt" value="{{ old('price-wt') }}" required>
                <label for="price-wt">Preis ohne Steuer</label>
            </div>
    
            <div class="input-field">
                <input type="text" name="product-description" value="{{ old('product-description') }}" required>
                <label for="price-description">Beschreibung</label>
            </div>
    
            <div class="input-field">
                <select name="product-category">
                    <option value="" disabled selected>Auswählen...</option>
                    @foreach($categorys AS $category)
                    <option value="{{ $category->category_id }}">{{ $category->category_name }}</option>
                    @endforeach
                </select>
                <label>Kategorie</label>
            </div>
    
            <p>
                <button type="submit" class="btn waves-effect waves-light">Submit</button>
                <a href="/products" class="waves-effect waves-light btn-small">Zurück</a>
            </p>
        </div>
    </form>
    </div>
</div>
</main>

@endsection