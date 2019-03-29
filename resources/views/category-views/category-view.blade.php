@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h1>Kategorien</h1>
        </div>
        <div class="card-body">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Kurzbeschreibung</th>
                        <th scope="col">Bearbeiten</th>
                        <th scope="col">Löschen</th>
                    </tr>
                </thead>
                @foreach($categorys AS $category)
                <tr>
                    <td>{{ $category->category_id }}</td>
                    <td>{{ $category->category_name }}</td>
                    <td>{{ $category->category_description }}</td>
                    <td>
                        <a href="/categorys/{{ $category->category_id }}/edit" class="btn btn-dark">
                            <i class="material-icons">settings</i>
                        </a>
                    </td>
                    <td>
                        <form method="POST" action="/categorys/{{ $category->category_id }}">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-warning">
                                <i class="material-icons">delete</i>
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
    
    <form method="POST" action="/categorys">
        @csrf
        <div class="card">
            <h5 class="card-header">Neue Kategorie</h5>
            <div class="card-body">
                <p class="card-text">
                    <div class="row">
                        <div class="col">
                            <input type="text" name="category-name" value="{{ old('category-name') }}" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" placeholder="Kategorie Name" required>
                        </div>
                        <div class="col" >
                            <input type="text" name="category-description" value="{{ old('category-decription') }}" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" placeholder="Beschreibung" required>
                        </div>
                    </div>
                </p>
                <button type="submit" class="btn btn-outline-primary">Hinzufügen</button>
                <a href="/products" class="btn btn-outline-primary btn-sm">Zurück</a>
            </div>
        </div>
    </form>
</div>
@endsection