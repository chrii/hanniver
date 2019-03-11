@extends('layouts.app')

@section('content')

<div class="container">
    <div class="card">
        <div class="card-header">
            <h1>Produktliste hochladen</h1>
        </div>

        <div class="card-body">

            <div class="row">
                <div class="col">
                    <div class="card text-white bg-dark mb-3" style="max-width: 18rem;">
                        <div class="card-body">
                            <h5 class="card-title">Bitte beachten</h5>
                            <p class="card-text">Tabellen müssen im ".ods"-Format hochgeladen werden und dürfen nicht größer als 2MB groß sein. Bitte beachten Sie, dass die Kategorienamen alle in der Datenbank vorhanden sein müssen.</p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <form action="/upload" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <button class="btn btn-outline" type="submit">Hinzufügen</button>
                            </div>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="upload" id="inputUpload">
                                <label class="custom-file-label" for="inputUpload">Auswählen</label>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th>Name</th>
                        <th>Erstellungsdatum</th>
                        <th>Optionen</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($filenames AS $filename)
                        <tr>
                            <td>{{ $filename['filename'] }}</td>
                            <td>{{ $filename['modified'] }}</td>
                            <td>
                                <div class="dropdown">
                                    <button class="btn bmd-btn-icon dropdown-toggle" type="button" id="ex1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-left" aria-labelledby="ex1">
                                        <a href="/upload?d={{$filename['filename']}}" class="dropdown-item">
                                            <i class="material-icons">arrow_upward</i>
                                            Hochladen
                                        </a>
                                        <form method="POST" action="/upload">
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
                </tbody>
            </table>
            <a href="/products" class="card-link btn-sm">Zurück</a>
        </div>
    </div>
</div>
@endsection