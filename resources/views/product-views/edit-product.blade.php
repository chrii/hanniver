@extends('layouts.app')

@section('content')

<div class="card">
    <div class="card-header">
        <h1>Bearbeiten</h1>
    </div>
    <div class="card-body">
        <ul>
            @foreach($errors->all() AS $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
        
        <form method="POST" action="/products/{{ $product->product_id }}" required>
            @method('PATCH')
            @csrf
            <div class="row">
                <div class="col">
                    <div class="input-group mb-3">
                        <input type="text" name="product-name" value="{{ $product->product_name }}" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" placeholder="Produkt Name" required>
                    </div>
                    <div class="input-group mb-3">
                        <input type="text" name="price-wt" value="{{ $product->price_wo_tax }}" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" placeholder="Preis ohne Mehrwertsteuer" required>
                    </div>
                    
                </div>
                <div class="col" >
                    <div class="input-group mb-3">
                        <input type="text" name="product-description" value="{{ $product->product_description }}" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" placeholder="Beschreibung" required>
                    </div>

                    <div class="input-group mb-3">
                        <select class="custom-select" name="product-category">
                            <option value="{{ $product->category_id }}">{{ $categorys->where('category_id' , $product->category_id)->first()->category_name }}</option>
                            @foreach($categorys AS $category)
                                <option value="{{ $category->category_id }}">{{ $category->category_name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <p>
            </div>
            <button type="submit" class="btn btn-outline-primary">
                    <i class="material-icons float-left">settings</i>
                    Change
                </button>
                <a href="/products" class="btn btn-outline-primary btn-sm">Zurück</a>
            </p>
        </form>
    </div>  
</div>

@endsection