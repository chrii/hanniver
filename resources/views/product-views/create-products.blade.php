@extends('layouts.app')

@section('content')
<div class="content">
    <div class="card">
        <div class="card-header">
            <h1>Neues Produkt</h1>
        </div>
        <div class="card-body">
            <ul>
                @foreach($errors->all() AS $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
            <form method="POST" action="/products">
                @csrf
                
                <div class="row">
                    <div class="col">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-sm"></span>
                            </div>
                            <input type="text" name="product-name" value="{{ old('product-name') }}" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" placeholder="Produktname" required>
                        </div>
    
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-sm"></span>
                            </div>
                            <input type="text" name="price-wt" value="{{ old('price-wt') }}" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" placeholder="Preis" required>
                        </div>
                    </div>

                    <div class="col">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-sm"></span>
                            </div>
                            <input type="text" name="product-description" value="{{ old('product-description') }}" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" placeholder="Beschreibung" required>
                        </div>
    
                        <div class="input-group mb-3">
                            <select class="custom-select" name="product-category">
                                <option selected disabled>Kategorie</option>
                                @foreach($categorys AS $category)
                                    <option name="product-category" value="{{ $category->category_id }}">{{ $category->category_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>            
                <p>
                    <button type="submit" class="card-link btn-primary btn">Submit</button>
                    <a href="/products" class="card-link btn-sm">Zurück</a>
                </p>
            </form>
        </div>
    </div>
</div>
@endsection