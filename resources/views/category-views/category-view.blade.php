@extends('layouts.layout')

@section('content')

<main>
    <div class="container">
        <h1>Kategorien</h1>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Kurzbeschreibung</th>
                    <th>Bearbeiten</th>
                    <th>Löschen</th>
                </tr>
            </thead>
            @foreach($categorys AS $category)
            <tr>
                <td>{{ $category->category_id }}</td>
                <td>{{ $category->category_name }}</td>
                <td>{{ $category->category_description }}</td>
                <td>
                    <a href="/category/{{ $category->category_id }}/edit" class="waves-effect waves-light btn-small">
                        <i class="material-icons">settings</i>
                    </a>
                </td>
                <td>
                    <form method="POST" action="/category/{{ $category->category_id }}">
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

        <div class="row">
            <form method="POST" action="/categorys">
                @csrf
                <div class="col s6 input-field">
                    <input type="text" name="category-name">
                    <label for="category-name">Kategorie</label>
                </div>
                <div class="col s6 input-field" >
                    <input type="text" name="category-description">
                    <label for="category-description">Beschreibung</label>
                </div>
                <button type="submit" class="btn waves-effect waves-light">Hinzufügen</button>
                <a href="/products" class="btn waves-effect waves-light btn-small">Zurück</a>
            </form>
        </div>
    </div>
</main>

@endsection