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
                            <input type="text" name="price-description" value="{{ old('price-description') }}" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" placeholder="Beschreibung" required>
                        </div>
    
                        <div class="input-group mb-3">
                            <select class="custom-select" id="inputGroupSelect01">
                                <option selected>Kategorie</option>
                                @foreach($categorys AS $category)
                                <option value="{{ $category->category_id }}">{{ $category->category_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>            
                <p>
                    <button type="submit" class="btn btn-primary active right">Submit</button>
                    <a href="/products" class="btn btn-primary active right">Zurück</a>
                </p>
            </form>
        </div>
    </div>
</div>
@endsection