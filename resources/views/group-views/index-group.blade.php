@extends('layouts.app')
@section('content')

<div class="container">
    <div class="card">
        <div class="card-header">
            <h1>Gruppenübersicht</h1>
        </div>
        <div class="card-body">
            <table class="table">
                <thead class="thead-dark">
                    <th>ID</th>
                    <th>Gruppe</th>
                    <th>Mitgliederzahl</th>
                    <th>Optionen</th>
                </thead>
                <tbody>
                    @foreach($groups AS $group)
                    <tr>
                        <td>{{ $group->group_id }}</td>
                        <td>{{ $group->group_name }}</td>
                        <td>{{ $group->userDataByType->count() }}</td>
                        <td>
                            <div class="dropdown">
                                <button class="btn bmd-btn-icon dropdown-toggle" type="button" id="ex1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="material-icons">more_vert</i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-left" aria-labelledby="ex1">
                                    <a href="/groups/{{ $group->group_id }}/update" class="dropdown-item">
                                        <i class="material-icons">settings</i>
                                        Bearbeiten
                                    </a>
                                </div>
                            </div> 
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <form method="POST" action="/groups">
                @csrf  
                <div class="row">
                    <div class="col-sm">
                        <div class="form-group">
                            <label for="name" class="bmd-label-floating"><span class="offline">This is not for Final</span></label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-outline-primary">Hinzufügen</button>
                        </div>
                    </div>
                </div>
            </form>
            <a href="/users" class="card-link btn">Zurück</a>
        </div>
    </div>
</div>

@endsection