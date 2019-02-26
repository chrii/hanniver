@extends('layouts.app')

@section('content')

<table class="table">
    <thead class="thead-dark">
        <tr>
            <th scope="col">Name</th>
            <th scope="col">E-Mail-Adresse</th>
            <th scope="col">Gruppe</th>
        </tr>
    </thead>
    @foreach($userdata AS $user)
    <tr>
        <td>{{ $user->name }}</td>
        <td>{{ $user->email }}</td>
        <td>{{ $user->group }}</td>
    </tr>
    @endforeach
</table>

@endsection