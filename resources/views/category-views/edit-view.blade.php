@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h1>Kategorie</h1>
        </div>
        <div class="card-body">
            <!--Start form-->
            <form method="POST" action="/categorys/{{ $categorys->category_id }}/update">
                @csrf
                @method('PATCH')
            <div class="row">
                <div class="col">
                    <!-- Name Input-->
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ $categorys->category_name }}">
                    </div>
                    <!-- Picture Dropdown -->
                    <div class="form-group">
                        <label for="picture">Bild</label>
                        <select class="form-control" id="picture" name="picture">
                            <option>{{ $categorys->picture_path }}</option>
                            @foreach($pictures AS $picture)
                                <option>{{ $picture }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col">
                    <!-- Descriptio Input -->
                    <div class="form-group">
                        <label for="textarea">Beschreibung</label>
                        <textarea class="form-control" id="textarea" name="description" rows="3">{{ $categorys->category_description }}</textarea>
                    </div>
                </div>
            </div>
            <button class="btn btn-outline-primary" type="submit">Ändern</button>
            <a class="btn btn-sm" href="/categorys">Zurück</a>
            </form>
        </div>
    </div>
</div>
@endsection